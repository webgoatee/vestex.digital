<?php
/**
 * Template for the shortcodes block
 * @author Alexander Gilmanov
 * @since 06.04.2016
 */
?>
<script type="text/jsrender" id="wdt-rb-shortcodes-template">
<div>
    <div class="alert alert-info" role="alert">
        <span class="wdt-alert-title f-600">Here are the shortcodes that will allow you to use this report.<br></span>
        <span class="wdt-alert-subtitle"><?php _e('You can generate all these shortcodes later from', 'wpdatatables'); ?>
            <a href="http://wpreportbuilder.com/documentation/insert-report-builder-controls-visual-editor/" target="_blank"><?php _e('Visual editor ', 'wpdatatables'); ?></a><?php _e('or from', 'wpdatatables'); ?>
            <a href="http://wpreportbuilder.com/documentation/insert-report-builder-controls-visual-composer/" target="_blank"><?php _e('Visual Composer.', 'wpdatatables'); ?></a>
        </span>
    </div>
    <div class="col-sm-12 p-b-20">
        <label>
            <?php _e('Download report button shortcode', 'wpdatatables'); ?>
        </label>
        <div class="col-sm-12 p-0">
            <button class="btn bgm-gray btn-xs waves-effect p-5 m-t-5 m-b-5 wdt-copy-shortcode" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to copy shortcode">[reportbuilder id={{>id}} text="Download report" class="btn"]</button>
        </div>
        <div class="col-sm-12 p-0">
            <?php _e('Use this shortcode to insert a download button in your post or page. Change the value in "text" attribute to change what will be displayed on the button, using the "class" attribute you can assign CSS classes to your button to make it look nice in your theme.', 'wpdatatables'); ?>
        </div>
    </div>
    <div class="col-sm-12 p-b-20">
        <label>
            <?php _e('Save report to Media Library button shortcode', 'wpdatatables'); ?>
        </label>
        <div class="col-sm-12 p-0">
            <button class="btn bgm-gray btn-xs waves-effect p-5 m-t-5 m-b-5 wdt-copy-shortcode" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to copy shortcode">[reportbuilder id={{>id}} type="save" text="Save report"]</button>
            </div>
        <div class="col-sm-12 p-0">
            <?php _e('Use this shortcode to insert a button in your post or page that will trigger a "save to WP Media Library" action for this report. Change the value in "text" attribute to change what will be displayed on the button, using the "class" attribute you can assign CSS classes to your button to make it look nice in your theme.', 'wpdatatables'); ?>
        </div>
    </div>
    {{if additionalVars.length != 0}}
    <div class="col-sm-12 p-b-20">
        <label>
            <?php _e('Custom variables input fields', 'wpdatatables'); ?>
        </label>
        <div class="col-sm-12 p-0">
            <?php _e('Use the shortcodes below to generate front-end inputs for the additional variables. "Text" attribute allows to change the label, "default" can override the predefined value, "class" allows to set CSS classes.', 'wpdatatables'); ?>
        </div>
    </div>
    {{props additionalVars ~id=id}}
    <div class="col-sm-12 p-b-10">
        <label>
           "{{>key}}":
        </label>
        <div class="com-sm-12">
            <button class="btn bgm-gray btn-xs waves-effect p-5 m-t-5 m-b-5 wdt-copy-shortcode" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to copy shortcode">[reportbuilder id={{:~id}} element="varInput" name="{{>key}}" text="Please enter the {{>key}}" default="{{>prop}}" class=""]</button>
        </div>
    </div>
    {{/props}}
    {{/if}}
</div>
</script>

