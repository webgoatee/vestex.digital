<div class="wrap wdt-datatables-admin-wrap">

    <input type="hidden" id="report_id" value="<?php if (!empty($report_id)) {
        echo $report_id;
    } ?>"/>

    <div class="container">

        <div class="row">

            <div class="card wdt-table-constructor">

                <!-- Preloader -->
                <?php include WDT_TEMPLATE_PATH . 'admin/common/preloader.inc.php'; ?>
                <!-- /Preloader -->

                <div class="card-header wdt-admin-card-header ch-alt">
                    <img id="wpdt-inline-logo" style="width: 60px;height: 50px;"
                         src="<?php echo WDT_RB_ROOT_URL; ?>assets/img/vc-icon.png"/>
                    <h2>
                    <span class="" id=""
                          title="<?php _e('Report Builder Wizard', 'wpdatatables'); ?>"><?php _e('Report Builder Wizard', 'wpdatatables'); ?></span>
                        <small><?php _e('Report Creation Wizard', 'wpdatatables'); ?></small>
                    </h2>
                    <ul class="actions p-t-5">
                        <li>
                            <button class="btn bgm-red btn-icon btn-lg waves-effect waves-circle waves-float wdt-rb-backend-close"
                                    title="<?php _e('Cancel', 'wpdatatables'); ?>" data-toggle="tooltip">
                                <i class="zmdi zmdi-close"></i>
                            </button>
                        </li>
                    </ul>
                </div>
                <!-- /.card-header -->

                <div class="card-body card-padding">

                    <ol class="breadcrumb wdt-rb-breadcrumb">
                        <li class="wdt-rb-breadcrumbs-block active"
                            data-step="1"><?php _e('Data Source', 'wpdatatables'); ?></li>
                        <li class="wdt-rb-breadcrumbs-block"
                            data-step="2"><?php _e('Settings and variables', 'wpdatatables'); ?></li>
                        <li class="wdt-rb-breadcrumbs-block" data-step="3"><?php _e('Template', 'wpdatatables'); ?></li>
                        <li class="wdt-rb-breadcrumbs-block"
                            data-step="4"><?php _e('Download preview', 'wpdatatables'); ?></li>
                        <li class="wdt-rb-breadcrumbs-block"
                            data-step="5"><?php _e('Get shortcodes', 'wpdatatables'); ?></li>
                    </ol>

                    <div class="steps m-t-20">

                        <?php include WDT_RB_ROOT_PATH . 'templates/steps/step_1.inc.php'; ?>

                        <?php include WDT_RB_ROOT_PATH . 'templates/steps/step_2.inc.php'; ?>

                        <?php include WDT_RB_ROOT_PATH . 'templates/steps/step_3.inc.php'; ?>

                        <?php include WDT_RB_ROOT_PATH . 'templates/steps/step_4.inc.php'; ?>

                        <?php include WDT_RB_ROOT_PATH . 'templates/steps/step_5.inc.php'; ?>

                        <?php include WDT_RB_ROOT_PATH . 'templates/custom_vars.tpl.php'; ?>

                        <?php include WDT_RB_ROOT_PATH . 'templates/shortcodes.tpl.php'; ?>

                        <?php include WDT_RB_ROOT_PATH . 'templates/close_modal.inc.php'; ?>

                    </div>

                    <div class="row m-t-15 m-b-5 p-l-15 p-r-15">
                        <button class="btn btn-success waves-effect pull-right m-l-5" style="display:none;"
                                id="wdt-rb-finish-report"><i
                                    class="zmdi zmdi-check"></i><?php _e(' Finish ', 'wpdatatables'); ?></button>
                        <button class="btn btn-success waves-effect pull-right m-l-5" style="display:none;"
                                id="wdt-rb-save-report"><?php _e('Save report ', 'wpdatatables'); ?></button>
                        <button class="btn btn-primary waves-effect pull-right m-l-5" id="wdt-rb-next-step">
                            <?php _e('Next ', 'wpdatatables'); ?></button>
                        <button class="btn btn-primary waves-effect pull-right" id="wdt-rb-previous-step"
                                disabled="disabled"><?php _e(' Previous', 'wpdatatables'); ?></button>
                        <a class="btn btn-default btn-icon-text waves-effect wdt-documentation"
                           data-doc-page="wizard">
                            <i class="zmdi zmdi-help-outline"></i> <?php _e('Documentation', 'wpdatatables'); ?>
                        </a>
                    </div>

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card /.wdt-table-constructor -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

</div>