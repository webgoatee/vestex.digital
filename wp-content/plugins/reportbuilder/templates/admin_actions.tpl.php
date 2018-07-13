<?php
/**
 * Actions that can be called for a table
 */
?>
<a type="button" class="rb-configure" data-report_id="<?php echo $item['id']; ?>" data-report_name="<?php echo $item['name']; ?>'" href="<?php echo admin_url('admin.php?page=wpdatareports-wizard&id='.$item['id']); ?>" data-toggle="tooltip" title="<?php _e('Configure', 'wpdatatables') ?>"><i class="zmdi zmdi zmdi-settings"></i></a>
<a type="button" class="download-rb-report" data-report_id="<?php echo $item['id']; ?>" data-report_name="<?php echo $item['name']; ?>'" data-toggle="tooltip" title="<?php _e('Download', 'wpdatatables') ?>"><i class="zmdi zmdi-download"></i></a>
<a type="button" class="get-rb-shortcodes" data-report_id="<?php echo $item['id']; ?>" data-report_name="<?php echo $item['name']; ?>'" data-toggle="tooltip" title="<?php _e('Shortcodes', 'wpdatatables') ?>"><i class="zmdi zmdi-code"></i></a>
<a type="button" class="delete-report" data-report_id="<?php echo $item['id']; ?>" data-report_name="<?php echo $item['name']; ?>'" href="admin.php?page=wpdatareports&action=delete&id=<?php echo $item['id']; ?>" data-toggle="tooltip" title="<?php _e('Delete', 'wpdatatables') ?>" ><i class="zmdi zmdi-delete"></i></a>