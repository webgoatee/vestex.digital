<?php if ( ! defined( 'ABSPATH' ) ) exit; 
 if(isset($_POST['submit'])) { 
		   $save = update_option('wp_file_manager_pro_3rd_party', $_POST);
		  if($save) {
			  echo '<script>';
			  echo 'window.location.href="?page=wp_file_manager_3rd_party&status=1"';
			  echo '</script>';
		  } else {
			  echo '<script>';
			  echo 'window.location.href="?page=wp_file_manager_3rd_party&status=2"';
			  echo '</script>';
		  }
	   }
$settings = get_option('wp_file_manager_pro_3rd_party');
?>			
						
<div class="wrap">

			<div class="notice_saved_unsaved"><?php
			if(isset($_GET['status']) && $_GET['status'] == 2){
			?>	
				<div id="setting-error-settings_updated" class="error_updated_red error_updated is-dismissible"> 
					<p><strong><?php _e('Settings not saved.','wp-file-manager-pro')?></strong></p>
					<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php _e('Dismiss this notice.','wp-file-manager-pro')?></span></button>
				</div>
			<?php }
			if(isset($_GET['status']) && $_GET['status'] == 1){
			?>			
				<div id="setting-error-settings_updated" class="error_updated error_updated_green is-dismissible"> 
					<p><strong><?php _e('Settings saved.','wp-file-manager-pro')?></strong></p>
					<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php _e('Dismiss this notice.','wp-file-manager-pro')?></span></button>
				</div>
			<?php }?>
			</div>


	<!--wrap_heading-->
	<form action="" method="post" class="wrap_form">

		<?php wp_enqueue_script("jquery-ui-tabs"); ?>
		<script>
		jQuery("document").ready(function() {
			jQuery( "#tabs" ).tabs();
			jQuery('.notice-dismiss').click(function(){
				jQuery('.notice_saved_unsaved').hide();
			});
		});
		</script>

	<div id="tabs">
			
		<ul class="tab_ul_list_contain">
			<li><a href="#tabs-1">Dropbox</a></li>
			<li><a href="#tabs-2">Google Drive</a></li>
		</ul>
		<div id="tabs-1" class="tab_setting">
			<div class="wrap_heading"><h1><?php _e('Dropbox', 'wp-file-manager-pro');?></h1></div>
			<div class="wrap_tbl1">
				<table class="form-table">
					<tr>
						<th><?php _e('ENABLE DROPBOX','wp-file-manager-pro')?></th>
						<td>
						<input name="ELFINDER_ENABLE_DROPBOX" type="checkbox" id="ELFINDER_ENABLE_DROPBOX" value="1" class="regular-text" <?php echo isset($settings['ELFINDER_ENABLE_DROPBOX']) && ($settings['ELFINDER_ENABLE_DROPBOX'] == 1) ? 'checked="checked"' : '';?>>
						<p class="description"><?php _e('Check to enable Dropbox','wp-file-manager-pro')?></p>
						</td>
					</tr>
					<tr>
						<th><?php _e('DROPBOX APP KEY','wp-file-manager-pro')?></th>
						<td>
						<input name="ELFINDER_DROPBOX_APPKEY" type="text" id="ELFINDER_DROPBOX_APPKEY" value="<?php echo isset($settings['ELFINDER_DROPBOX_APPKEY']) && !empty($settings['ELFINDER_DROPBOX_APPKEY']) ? $settings['ELFINDER_DROPBOX_APPKEY'] : '';?>" class="regular-text">
						<p class="description"><?php _e('Enter Dropbox APP Key','wp-file-manager-pro')?></p>
						</td>
					</tr>
					<tr>
						<th><?php _e('DROPBOX APP SECRET','wp-file-manager-pro')?></th>
						<td>
						<input name="ELFINDER_DROPBOX_APPSECRET" type="text" id="ELFINDER_DROPBOX_APPSECRET" value="<?php echo isset($settings['ELFINDER_DROPBOX_APPSECRET']) && !empty($settings['ELFINDER_DROPBOX_APPSECRET']) ? $settings['ELFINDER_DROPBOX_APPSECRET'] : '';?>" class="regular-text">
						<p class="description"><?php _e('Enter Dropbox APP Secret','wp-file-manager-pro')?></p>
						</td>
					</tr>
					<tr>
						<th><?php _e('DROPBOX ACCESS TOKEN','wp-file-manager-pro')?></th>
						<td>
						<input name="ELFINDER_ACCESS_TOKEN" type="text" id="ELFINDER_ACCESS_TOKEN" value="<?php echo isset($settings['ELFINDER_ACCESS_TOKEN']) && !empty($settings['ELFINDER_ACCESS_TOKEN']) ? $settings['ELFINDER_ACCESS_TOKEN'] : '';?>" class="regular-text">
						<p class="description"><?php _e('Enter Dropbox Access Token','wp-file-manager-pro')?></p>
						</td>
					</tr>
				</table>
				<!--table-->
				<p><?php _e('You can get above settings at <a href="https://www.dropbox.com/developers/apps" target="_blank">https://www.dropbox.com/developers/apps</a>','wp-file-manager-pro')?></p>
			</div>
		</div>
		
		<div id="tabs-2" class="tab_setting">
			<div class="wrap_heading"><h1><?php _e('Google Drive', 'wp-file-manager-pro');?></h1></div>
			<div class="wrap_tbl2">
				<table class="form-table">
					<tr>
						<th><?php _e('ENABLE GOOGLE DRIVE','wp-file-manager-pro')?></th>
						<td>
						<input name="ELFINDER_ENABLE_GOOGLE_DRIVE" type="checkbox" id="ELFINDER_ENABLE_GOOGLE_DRIVE" value="1" class="regular-text" <?php echo isset($settings['ELFINDER_ENABLE_GOOGLE_DRIVE']) && ($settings['ELFINDER_ENABLE_GOOGLE_DRIVE'] == 1) ? 'checked="checked"' : '';?>>
						<p class="description"><?php _e('Check to enable Google Drive','wp-file-manager-pro')?></p>
						</td>
					</tr>
					<tr>
						<th><?php _e('GOOGLE DRIVE CLIENT ID','wp-file-manager-pro')?></th>
						<td>
						<input name="ELFINDER_GOOGLEDRIVE_CLIENTID" type="text" id="ELFINDER_GOOGLEDRIVE_CLIENTID" value="<?php echo isset($settings['ELFINDER_GOOGLEDRIVE_CLIENTID']) && !empty($settings['ELFINDER_GOOGLEDRIVE_CLIENTID']) ? $settings['ELFINDER_GOOGLEDRIVE_CLIENTID'] : '';?>" class="regular-text">
						<p class="description"><?php _e('Enter Google Drive Client ID','wp-file-manager-pro')?></p>
						</td>
					</tr>
					<tr>
						<th><?php _e('GOOGLE DRIVE CLIENT SECRET','wp-file-manager-pro')?></th>
						<td>
						<input name="ELFINDER_GOOGLEDRIVE_CLIENTSECRET" type="text" id="ELFINDER_GOOGLEDRIVE_CLIENTSECRET" value="<?php echo isset($settings['ELFINDER_GOOGLEDRIVE_CLIENTSECRET']) && !empty($settings['ELFINDER_GOOGLEDRIVE_CLIENTSECRET']) ? $settings['ELFINDER_GOOGLEDRIVE_CLIENTSECRET'] : '';?>" class="regular-text">
						<p class="description"><?php _e('Enter Google Drive Client ID Secret','wp-file-manager-pro')?></p>
						</td>
					</tr>
				</table>
				<!--table-->		
				<p><?php _e('You can get above settings at <a href="https://console.developers.google.com" target="_blank">https://console.developers.google.com</a>.','wp-file-manager-pro')?></p>
                <p class="description"><?php _e('Put the given link in redirect url of google drive API <code>'.admin_url('admin-ajax.php?action=mk_file_folder_manager&cmd=netmount&protocol=googledrive&host=1').'</code>','wp-file-manager-pro')?></p>

				
			</div>
		</div>
         <p class="description"><a href="https://filemanager.webdesi9.com/documentation/integrations/" target="_blank"><?php _e('For more info and support see','wp-file-manager-pro'); ?></a></p>
		<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
	</div>	
	</form>
    
<?php /* Vendor Install Popup */
$file_path = FILEMANEGERPROPATH.'lib/vendor/autoload.php';
if(!file_exists($file_path)) { ?>

<div class="vendorPopupWrap">
<div class="vendorPopupOverlay"></div>
<div class="vendorPopupTbl">
<div class="vendorPopupCel">
<div class="vendorPopupInner">
<h2><span> <?php _e('Install Required Libraries','wp-file-manager-pro'); ?> </span></h2>
<p><?php _e('We recommend you to install the required library to get Dropbox and Google Drive working','wp-file-manager-pro'); ?></p>
<div class="btnDv"> <a href="javascript:void(0)" id="wp_file_manager_pro_vendor" class="button button-primary"><?php _e('Install','wp-file-manager-pro'); ?></a> </div>
<span class="timeTxt description"><?php _e('Please be patient it can take some time','wp-file-manager-pro'); ?></span>
</div>
</div>
</div>
</div>

<?php } 
/* end Vendor Install Popup */
?>        
</div>

<style>
.vendorPopupWrap{
	position:fixed;
	top:0;
	left:0;
	right:0;
	bottom:0;
}
.vendorPopupOverlay{
	position:fixed;
	top:0;
	left:0;
	right:0;
	bottom:0;
	background:rgba(0,0,0,0.6);
}
.vendorPopupWrap .vendorPopupTbl{
	display:table;
	width:100%;
	height:100%;
}
.vendorPopupWrap .vendorPopupTbl .vendorPopupCel{
	display:table-cell;
	vertical-align:middle;
}
.vendorPopupWrap .vendorPopupInner{
	max-width:500px;
	margin:0 auto;
	background:#fff;
	padding:30px;
	position:relative;
	text-align:center;
	font-family: 'Arial';
	color: #010101;
	border-radius: 5px;
	box-shadow: 0px 10px 10px #383838;
}
.vendorPopupWrap .vendorPopupInner h2{
	margin:0;
	margin-bottom:30px;
	text-transform:uppercase;
}
.vendorPopupWrap .vendorPopupInner h2 span{
	display:inline-block;
	position:relative;
}
.vendorPopupWrap .vendorPopupInner h2 span::after {
	content: "";
	position: absolute;
	height: 3px;
	width: 60px;
	background: #3390f9;
	bottom: -10px;
	left: 35%;
}
.vendorPopupWrap .vendorPopupInner p{
	font-size:14px;
}
.vendorPopupWrap .vendorPopupInner .timeTxt{
	display:block;
	color: #0b6dff;
}
.vendorPopupWrap .vendorPopupInner .button {
	font-size: 14px;
	background: #3390f9;
	border: none;
	border-radius: 0px;
	padding: 4px 30px;
	height: inherit;
	font-family: Arial;
}
.vendorPopupWrap .vendorPopupInner .btnDv{
	margin-bottom:15px;
}
.wrap_heading{
	border-bottom: 2px solid #d2d2d2;
}
.wrap_heading h1{
    margin: 0px;
    padding: 2% 0px;
    font-weight: 600;
    color: #000000b8;	
}
/*form.wrap_form {
    padding: 3% 4%;
    background: #e2e2e2b5;
}*/
.ui-tabs{
	margin:50px 0px;
}
.tab_ul_list_contain li {
    margin: 0px;
    width: 50%;
    background: #e2e2e2b5;
    /* background: #000000b8; */
    float: left;
	text-align:center;
	box-sizing:border-box;
	-webkit-box-sizing:border-box;
}
.tab_ul_list_contain{
	overflow:auto;
	margin:0px;	
}
.tab_ul_list_contain *{
	outline:none;
}
.tab_ul_list_contain li a{
    text-decoration: none;
    font-weight: 600;
    color: #000;
    font-size: 14px;
    width: 86%;
    padding: 15px 20px;
    display: block;
}
.tab_ul_list_contain li:hover{
	background:#e2e2e2b5;
}
.tab_ul_list_contain li a:focus{
	box-shadow:none;	
}
.tab_setting{
	clear: both;
    background: #e2e2e2b5;
    padding: 0px 30px 20px 30px;
}
.ui-corner-top {
    border-bottom: 1px solid #d4d4d4;
    border-top: 1px solid #e2e2e2b5;
}
.tab_ul_list_contain .ui-tabs-active{
	border:0px;
	border-left:1px solid #d4d4d4;
	border-right:1px solid #d4d4d4;
	border-top:2px solid #3390f9;
}
.tab_ul_list_contain li:first-child {
    border-left: none;
}
.tab_ul_list_contain li:nth-child(2) {
    border-right: none;
}

.notice_saved_unsaved{
    margin-top: 20px;
}
.error_updated{
    padding-right: 38px;
    position: relative;
    margin: 5px 0 15px;
    background: #fff;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    padding: 1px 12px;	
}
.error_updated p{
	margin: 8px 0px;	
}
.error_updated_red{
    border-left: 4px solid #dc3232;	
}
.error_updated_green{
    border-left: 4px solid #46b450;
}

</style>
<script>
jQuery(document).ready(function(e) {
    jQuery('#wp_file_manager_pro_vendor').click(function(e) {
        jQuery(this).text('Installing Please wait...');
		jQuery.ajax({
            url : '<?php echo admin_url('admin-ajax.php')?>',
            type : 'post',
            data : {
                action : 'mk_file_folder_manager_install_vendor',
            },
            success : function( response ) {
			  jQuery('#wp_file_manager_pro_vendor').text('Install');
               alert(response);
			   window.location.href="<?php echo admin_url('admin.php?page=wp_file_manager_3rd_party')?>";
            }
        });
    });
});
</script>