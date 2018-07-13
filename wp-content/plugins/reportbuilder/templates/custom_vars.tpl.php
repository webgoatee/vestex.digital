<script id="wdt-rb-custom-var-tmpl" type="text/x-jsrender">
    <div class="row wdt-rb-custom-var-block">
        <div class="col-sm-4">
            <div class="form-group">
                <div class="fg-line">
                    <input type="text" class="form-control input-sm" value="{{>name}}" id="wdt-rb-var-name" placeholder="<?php _e( 'Name of the variable', 'wpdatatables' ); ?>">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <div class="fg-line">
                    <input type="text" class="form-control input-sm" value="{{>value}}" id="wdt-rb-var-default-value" placeholder="<?php _e( 'Default value of the variable', 'wpdatatables' ); ?>">
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="btn bgm-gray btn-xs waves-effect p-5 m-t-5 m-b-5 wdt-copy-shortcode" data-toggle="tooltip" data-placement="top" title="" data-original-title="To use this shortcode you can click this button to copy it to the clipboard and then paste it to your template">${<span id="wdt-tb-var-definition">{{>name}}</span>}</div>
        </div>
        <div class="col-sm-1">
            <ul class="actions pull-right">
                <li id="wdt-rb-delete-custom-var">
                    <a>
                        <i class="zmdi zmdi-delete"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</script>