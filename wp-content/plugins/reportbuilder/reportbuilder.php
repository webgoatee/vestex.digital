<?php

namespace WDTReportBuilder;

/**
 * @package Report Builder for wpDataTables
 * @version 1.1.2
 */
/*
Plugin Name: Report Builder for wpDataTables
Plugin URI: http://wpreportbuilder.com
Description: Generate DOCX and XLSX with realtime data from your wpDataTables
Version: 1.1.2
Author: TMS-Plugins
Author URI: http://tms-plugins.com
Text Domain: wpdatatables
Domain Path: /languages
*/

add_action( 'plugins_loaded', array ( 'WDTReportBuilder\Plugin', 'init' ), 10 );

define( 'WDT_RB_ROOT_PATH', plugin_dir_path(__FILE__) ); // full path to the Report Builder root directory
define( 'WDT_RB_ROOT_URL', plugin_dir_url(__FILE__) ); // URL of Report Builder plugin

// Activation hook to create the DB tables
register_activation_hook( __FILE__, array( 'WDTReportBuilder\Plugin', 'activationHook' ) );

// Uninstall hook to delete the reports
register_uninstall_hook(__FILE__, array( 'WDTReportBuilder\Plugin', 'uninstallHook' ) );

// Shortcode handler
add_shortcode( 'reportbuilder', array( 'WDTReportBuilder\Plugin', 'shortcodeHandler' ) );

class Plugin {

    public static $initialized = false;

    /**
     * Instantiates the class
     */
    public static function init(){
        // Check if wpDataTables is installed
        if( !defined( 'WDT_ROOT_PATH' ) ){
            add_action( 'admin_notices', array( 'WDTReportBuilder\Plugin', 'wdtNotInstalled' ) );
        }else{
            self::$initialized = true;
            // Initialize the core class
            require_once( WDT_RB_ROOT_PATH.'/source/class.reportbuilder.php' );

            // Initialize the download action handler
            add_action( 'wp_ajax_report_builder_download_report', array( 'WDTReportBuilder\Plugin', 'downloadReport' ) );
            add_action( 'wp_ajax_nopriv_report_builder_download_report', array( 'WDTReportBuilder\Plugin', 'downloadReport' ) );

            // Initialize the admin part for back-end area
            if( is_admin() ) {
                // Init PHPOffice
                self::initPhpOffice();
                // Init the admin zone
                require_once( WDT_RB_ROOT_PATH.'/source/class.admin.php' );
                \WDTReportBuilder\Admin::init();
                add_action( 'admin_menu', array ( 'WDTReportBuilder\Admin', 'wdtrbAdminMenu' ), 10 );

				// Optional Visual Composer integration
				if( function_exists( 'vc_map' ) ) {
				    require_once( WDT_RB_ROOT_PATH.'/source/class.admin.php' );
				    include(  WDT_RB_ROOT_PATH.'/source/class.vcintegration.php' );
				}
                
            }
        }

    }

    /**
     * Show message if wpDataTables is not installed
     */
    public static function wdtNotInstalled() {
        $message = __('Report Builder is an add-on for wpDataTables - please install and activate wpDataTables to be able to generate reports!','wpdatatables');
        echo "<div class=\"error\"><p>{$message}</p></div>";
    }

    /**
     * Initialize the PHPOffice Autoloaders
     * (only on necessary pages not to cause additional init)
     */
    public static function initPhpOffice(){
        require_once( WDT_ROOT_PATH.'/lib/phpExcel/PHPExcel.php' );
	    require_once( WDT_RB_ROOT_PATH.'/lib/ZendStdLib/autoloader.php' );
        require_once( WDT_RB_ROOT_PATH.'/lib/PHPWord/autoloader.php' );
        \PhpOffice\PhpWord\Autoloader::register();
		\Zend\Stdlib\Autoloader::register();
    }

    /**
     * Activation hook
     * This method generates the MySQL table needed to store the report metadata
     */
    public static function activationHook(){
        global $wpdb;
        $reports_table_name = $wpdb->prefix . 'wpdatareports';
        $reports_sql = "CREATE TABLE {$reports_table_name} (
						id INT( 11 ) NOT NULL AUTO_INCREMENT,
						table_id int(11) NULL,
						name varchar(255) NOT NULL,
                        report_config TEXT NOT NULL default '',
						UNIQUE KEY id (id)
						) DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta( $reports_sql );
    }

    /**
     * Shortcode handler
     */
    public static function shortcodeHandler( $atts, $content = null ){
        extract(
            shortcode_atts(
                array(
                        'id' => '0',
                        'element' => 'button',
                        'type' => 'download',
                        'text' => 'Download',
                        'class' => 'btn',
                        'name' => '',
                        'default' => ''
                ),
                $atts
            )
        );

        if( !$id ){ return ''; }

        $reportBuilder = new \WDTReportBuilder\ReportBuilder();
        $reportBuilder->setId( $id );
        if( !$reportBuilder->loadFromDB() ){
            return __( 'Report with ID '. $id .' does not exist', 'wpdatatables' );
        }

        // Enqueue the front-end JS
        wp_enqueue_script( 'reportbuilder', WDT_RB_ROOT_URL.'assets/js/frontend/report_builder.js' );
        wp_enqueue_script( 'reportbuilder_funcs', WDT_RB_ROOT_URL.'assets/js/common/report_builder_funcs.js' );
        wp_enqueue_script( 'jquery_redirect', WDT_RB_ROOT_URL.'assets/js/common/jquery.redirect.js' );

        // Enqueue Dashicons as we're using for preloader
        wp_enqueue_style( 'dashicons', get_stylesheet_uri(), 'dashicons' );

        // Front-end styles
        wp_enqueue_style( 'reportbuilder', WDT_RB_ROOT_URL.'assets/css/front/report_builder.css' );

        // Pass the needed variables to JS
        wp_localize_script(
            'reportbuilder',
            'reportbuilderobj',
            array(
            )
        );

        // Report-specific data
        wp_localize_script(
            'reportbuilder',
            'reportbuilder_'.$id,
            array(
                'follow_filtering' => (int) $reportBuilder->getFollowFiltering(),
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce' => wp_create_nonce( 'build_report_'.$id )
            )
        );

        switch( $element ){
            case 'varInput';
                return $reportBuilder->renderInput( $name, $text, $default, $class );
            break;
            case 'button';
                return $reportBuilder->renderButton( $type, $text, $class );
            break;
        }

    }

    /**
     * Download report handler
     */
    public static function downloadReport(){

        setcookie( 'wdtDownloadToken', $_POST['wdtDownloadToken'], time()+500, '/', $_SERVER['HTTP_HOST'] );
        $reportId = intval( $_POST['wdtReportConfig']['id'] );

        // Verify nonce in front-end area to avoid abusing
        if( is_admin() || wp_verify_nonce( $_POST['nonce'], 'build_report_'.$reportId ) ){

            $reportBuilder = new \WDTReportBuilder\ReportBuilder();
            $reportBuilder->setId( $reportId );
            $reportBuilder->loadFromDB();
            if( !empty( $_POST['wdtReportConfig']['additionalVars'] ) ){
                foreach( $_POST['wdtReportConfig']['additionalVars'] as $additionalVar ){
                    $reportBuilder->setAdditionalVar(
                        sanitize_text_field( urldecode( $additionalVar['name'] ) ),
                        sanitize_text_field( urldecode( $additionalVar['value'] ) )
                    );
                }
            }
            if( !empty( $_POST['wdtReportConfig']['filteredData'] ) ){
                $reportBuilder->setFilteredData(
                    json_decode(
                        urldecode(
                            stripslashes_deep( $_POST['wdtReportConfig']['filteredData'] )
                        )
                    )
                );
            }
            if( !empty( $_POST['downloadType'] ) ){
                if( sanitize_text_field( $_POST['downloadType'] ) == 'save' ){
                    $reportBuilder->setFileHandling( 'save' );
                }
            }
            $reportBuilder->build();
        }

        exit();

    }

    /**
     * Uninstall hook
     */
    function uninstallHook(){
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}wpdatareports");
    }

}
