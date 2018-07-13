<?php if ( ! defined( 'ABSPATH' ) ) exit; 
 if(isset($_POST['submit'])) { 
		   $save = update_option('wp_file_manager_pro_git', $_POST);
		  if($save) {
			  echo '<script>';
			  echo 'window.location.href="?page=wp_file_manager_github&status=1"';
			  echo '</script>';
		  } else {
			  echo '<script>';
			  echo 'window.location.href="?page=wp_file_manager_github&status=2"';
			  echo '</script>';
		  }
	   }
$settings = get_option('wp_file_manager_pro_git');
?>
<div class="wrap">

<div class="section1_git">
	<div class="section1_git_head">
		<h3><img src="<?php echo plugins_url( 'images/git_icon.png', __FILE__ );?>"><?php _e('Git Hub', 'wp-file-manager-pro');?></h3>
	</div>
	<form action="" method="post">
		<table class="form-table">
			<div class="form-table-dv">
				<h3><?php _e('GIT EMAIL','wp-file-manager-pro')?></h3>
				<input name="ELFINDER_GIT_EMAIL" type="text" id="ELFINDER_GIT_EMAIL" placeholder="<?php _e('Enter github email','wp-file-manager-pro')?>" value="<?php echo isset($settings['ELFINDER_GIT_EMAIL']) && !empty($settings['ELFINDER_GIT_EMAIL']) ? $settings['ELFINDER_GIT_EMAIL'] : '';?>" class="regular-text">
			</div>

			<div class="form-table-dv">
				<h3><?php _e('GIT USERNAME','wp-file-manager-pro')?></h3>
				<input name="ELFINDER_GIT_USERNAME" type="text" id="ELFINDER_GIT_USERNAME" placeholder="<?php _e('Enter github username','wp-file-manager-pro')?>" value="<?php echo isset($settings['ELFINDER_GIT_USERNAME']) && !empty($settings['ELFINDER_GIT_USERNAME']) ? $settings['ELFINDER_GIT_USERNAME'] : '';?>" class="regular-text">				
			</div>			
			
			<div class="form-table-dv">
				<h3><?php _e('GIT PASSWORD','wp-file-manager-pro')?></h3>
				<input name="ELFINDER_GIT_PASSWORD" type="text" id="ELFINDER_GIT_PASSWORD" placeholder="<?php _e('Enter github password','wp-file-manager-pro')?>" value="<?php echo isset($settings['ELFINDER_GIT_PASSWORD']) && !empty($settings['ELFINDER_GIT_PASSWORD']) ? $settings['ELFINDER_GIT_PASSWORD'] : '';?>" class="regular-text">			
			</div>				
			
			<div class="form-table-dv">
				<h3><?php _e('GIT ACCESS DIRECTORY','wp-file-manager-pro')?></h3>
				<input name="ELFINDER_GIT_ACCESS_DIRECTORY" type="text" id="ELFINDER_GIT_ACCESS_DIRECTORY" placeholder="<?php _e('Enter folder path you want to use for git','wp-file-manager-pro')?>" value="<?php echo isset($settings['ELFINDER_GIT_ACCESS_DIRECTORY']) && !empty($settings['ELFINDER_GIT_ACCESS_DIRECTORY']) ? $settings['ELFINDER_GIT_ACCESS_DIRECTORY'] : str_replace('\\','/', ABSPATH);?>" class="regular-text">
			</div>

			<div class="form-table-dv">
				<h3><?php _e('GIT MASTER ACCESS DIRECTORY','wp-file-manager-pro')?></h3>
				<input name="ELFINDER_GIT_MASTER_ACCESS_DIRECTORY" type="text" id="ELFINDER_GIT_MASTER_ACCESS_DIRECTORY" placeholder="<?php _e('Enter master folder path you want to use for git','wp-file-manager-pro')?>" value="<?php echo isset($settings['ELFINDER_GIT_MASTER_ACCESS_DIRECTORY']) && !empty($settings['ELFINDER_GIT_MASTER_ACCESS_DIRECTORY']) ? $settings['ELFINDER_GIT_MASTER_ACCESS_DIRECTORY'] : str_replace('\\','/', ABSPATH);?>" class="regular-text">
			</div>

			<div class="form-table-dv">
				<h3><?php _e('GIT REPOSITORY URL','wp-file-manager-pro')?></h3>
				<input name="ELFINDER_GIT_ACCESS_URL" type="text" id="ELFINDER_GIT_ACCESS_URL" placeholder="<?php _e('e.g https://github.com/username/filename.git','wp-file-manager-pro')?>" value="<?php echo isset($settings['ELFINDER_GIT_ACCESS_URL']) && !empty($settings['ELFINDER_GIT_ACCESS_URL']) ? $settings['ELFINDER_GIT_ACCESS_URL'] : '';?>" class="regular-text">
			</div>
		</table>
		<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
	</form>
</div>

<div class="section_push">
	<div class="push_pull_bg_contain">
		<img src="<?php echo plugins_url( 'images/push_web.jpg', __FILE__ );?>">
	</div>
	<div class="push_pull_abs">
		<div class="push_pull_tbl">
			<div class="push_pull_mdl">
				<div class="submit push_full_pro_dv">
					<h1><?php _e('Push Full Website to Git','wp-file-manager-pro')?></h1>
					<p><?php _e('By click this button your whole website will push to your git.','wp-file-manager-pro')?></p>
					<input type="button" name="push_full_project" id="push_full_project" class="button button-primary btn_input_bx1" value="Push Full Project"data-popup-open="popup-2" >
				</div>
			</div>
		</div>
	</div>
</div>
<!--section_push-->

<div class="section_pull">
	<div class="push_pull_bg_contain">
		<img src="<?php echo plugins_url( 'images/pull_web.jpg', __FILE__ );?>">
	</div>
	<div class="push_pull_abs">
		<div class="push_pull_tbl">
			<div class="push_pull_mdl">	
				<div class="pull_push_check">
					<h1><?php _e('Pull and Push to Git','wp-file-manager-pro')?></h1>
					<div class="submit">
						<p class="pull_push_check_Con"><?php _e('Pull the files from the Git.','wp-file-manager-pro')?></p>
						<input type="button" name="pull_from_repo" id="pull_from_repo" class="button button-primary btn_input_bx2" value="Pull From Git">
					</div>

					<div class="submit">
						<p><?php _e('Check changes status.','wp-file-manager-pro')?></p>
						<input type="button" name="check_git_changes" id="check_git_changes" class="button button-primary btn_input_bx3" value="Check Changes Status"><span id="git_changes"></span>
					</div>

					<div class="submit">
						<p class="pull_push_check_Con"><?php _e('Push all changes to Git.','wp-file-manager-pro')?></p>	
						<input type="button" name="git_push_ch" id="git_push_ch" class="button button-primary btn_input_bx4" data-popup-open="popup-1" value="GIT Push Changes">
					</div>
				</div>
				<!--pull_push_check-->
			</div>
		</div>
	</div>
</div>
<!--section_pull-->

<div class="popup" data-popup="popup-1">
<div class="popup-inner">
<h2><?php _e('GIT PUSH','wp-file-manager-pro')?></h2>
<p><?php _e('Git Message:','wp-file-manager-pro')?> <textarea id="git_push_status_message" rows="6" cols="100"></textarea></p>
<p><input type="button" name="git_push_changes" id="git_push_changes" class="button button-primary btn_input_bx5" value="GIT Push Changes"></p>
<a class="popup-close" data-popup-close="popup-1" href="#">x</a>
</div>
</div>

<div class="popup" data-popup="popup-2">
<div class="popup-inner">
<h2><?php _e('GIT PUSH','wp-file-manager-pro')?></h2>
<p><?php _e('Git Message:','wp-file-manager-pro')?> <textarea id="full_git_push_status_message" rows="6" cols="100"></textarea></p>
<p><input type="button" name="full_git_push_changes" id="full_git_push_changes" class="button button-primary btn_input_bx5" value="GIT Push Changes"></p>
<a class="popup-close" data-popup-close="popup-2" href="#">x</a>
</div>
</div>


</div>
<script>
jQuery(document).ready(function(e) {
	// pull repo
    jQuery('#pull_from_repo').click(function(e) {
        e.preventDefault();
		jQuery(this).val('Pulling please wait...');
		jQuery.ajax({
            url : '<?php echo admin_url('admin-ajax.php')?>',
            type : 'post',
            data : {
                action : 'mk_file_folder_manager_pull_git_request',
            },
            success : function( response ) {
				jQuery('#pull_from_repo').val('Pull From Git');
                if(response=='') {
					alert('Repository pulled successfully! Please check your desitnation folder.');
				} else {
					alert(response);
				}
            }
        });
    });
   // check git changes
   jQuery('#check_git_changes').click(function(e) {
        e.preventDefault();
		jQuery(this).val('Please wait...');
		jQuery.ajax({
            url : '<?php echo admin_url('admin-ajax.php')?>',
            type : 'post',
            data : {
                action : 'mk_file_folder_manager_check_git_changes',
            },
            success : function( response ) {
				jQuery('#check_git_changes').val('Check Changes');
                //jQuery('#git_changes').html(response);
				alert(response);
            }
        });
    });
	
	 // Push Changes to git
   jQuery('#git_push_changes').click(function(e) {
        e.preventDefault();
		var message = jQuery('#git_push_status_message').val();
		if(message == '') {
			alert('Please enter a commit message.');
		} else {
			   jQuery(this).val('Please wait...');
				jQuery.ajax({
					url : '<?php echo admin_url('admin-ajax.php')?>',
					type : 'post',
					data : {
						action : 'mk_file_folder_manager_push_git_changes',
						message: message
					},
					success : function( response ) {
						jQuery('#git_push_changes').val('GIT Push Changes');
						jQuery('[data-popup="popup-1"]').fadeOut(350);
						alert(response);
					}
				});
		}
    });
		 // Push Changes to git
   jQuery('#full_git_push_changes').click(function(e) {
        e.preventDefault();
		var message = jQuery('#full_git_push_status_message').val();
		if(message == '') {
			alert('Please enter a commit message.');
		} else {
			   jQuery(this).val('Please wait...');
				jQuery.ajax({
					url : '<?php echo admin_url('admin-ajax.php')?>',
					type : 'post',
					data : {
						action : 'mk_file_folder_manager_push_full_git_changes',
						message: message
					},
					success : function( response ) {
						jQuery('#full_git_push_changes').val('GIT Push Changes');
						jQuery('[data-popup="popup-2"]').fadeOut(350);
						alert(response);
					}
				});
		}
    });
});
</script>
<style>
/*section1_git*/
.section1_git {
    background: #fff;
    padding: 40px;
}
.section1_git .section1_git_head h3 img{
    position: absolute;
    left: 0px;
    top: -6px;
}
.section1_git .section1_git_head h3{
	position: relative;
    padding-left: 50px;
    padding-bottom: 16px;
    font-size: 30px;
	margin: 0px 0px 30px 0px;
    line-height: 24px;
    border-bottom: 1px solid #ddd;
}
.form-table-dv{
	margin-bottom:30px;
}
.form-table-dv h3{
	font-size: 16px;
    color: #404040;
    line-height: 24px;
	margin-top: 0px;
}
.form-table-dv input::placeholder{
	color:#bebebe;
	font-size:16px;
	line-height:24px;
}
.form-table-dv input{
	height: 54px;
    width: 570px;
	border:1px solid #ddd;
	font-size:16px;
	line-height:24px;
	box-shadow:none;
	padding-left:20px;
}
input#submit {
    width: 150px;
    height: 55px;
    background: #1774f0;
    border: none;
    box-shadow: none;
    border-radius: 0px;
}
p.submit{
	margin-top:10px;
}

/* Outer */
.popup {
width:100%;
height:100%;
display:none;
position:fixed;
top:0px;
left:0px;
background:rgba(0,0,0,0.75);
}
/* Inner */
.popup-inner {
max-width:700px;
width:90%;
padding:40px;
position:absolute;
top:50%;
left:50%;
-webkit-transform:translate(-50%, -50%);
transform:translate(-50%, -50%);
box-shadow:0px 2px 6px rgba(0,0,0,1);
border-radius:3px;
background:#fff;
}
/* Close Button */
.popup-close {
width:30px;
height:30px;
padding: 4px 3px 0px 3px; 
display:inline-block;
position:absolute;
top:0px;
right:0px;
transition:ease 0.25s all;
-webkit-transform:translate(50%, -50%);
transform:translate(50%, -50%);
border-radius:1000px;
background:rgba(0,0,0,0.8);
font-family:Arial, Sans-Serif;
font-size:20px;
text-align:center;
line-height:100%;
color:#fff;
}
.popup-close:hover {
-webkit-transform:translate(50%, -50%) rotate(180deg);
transform:translate(50%, -50%) rotate(180deg);
background:rgba(0,0,0,1);
text-decoration:none;
}


/**/
.section_push{
	margin-top:30px;
}
.section_push,.section_pull {
    position: relative;
	margin-bottom:30px;
}
.push_pull_bg_contain img{
	width:100%;
	}
.push_pull_abs {
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
}
.push_pull_tbl {
    display: table;
    width: 100%;
    height: 100%;
}
.push_pull_mdl {
    display: table-cell;
    vertical-align: middle;
}
.btn_input_bx1, .btn_input_bx2, .btn_input_bx3, .btn_input_bx4{
    height: 55px !important;
    background: #1774f0 !important;
    border: none !important;
    box-shadow: none !important;
    border-radius: 0px !important;	
}
.btn_input_bx1{
    width: 190px;
}
.btn_input_bx2{
    width: 160px;
}
.btn_input_bx3{
    width: 240px;
}
.btn_input_bx4{
    width: 200px;
}
.submit{
	margin:0px;
	padding: 10px 0px;
}
.submit p{
	margin-top:0px;
    font-size: 16px;
	font-weight:600;
	line-height:24px;
}
.push_full_pro_dv{
	padding: 0px 40px;
}
.pull_push_check{
	padding: 0px 40px;
}
.pull_push_check h1{
    margin: 0px;
    padding: 10px 0px;
    font-size: 30px;
    font-weight: 700;
    color: #000;
}
.push_full_pro_dv h1{
    margin: 0px;
    padding: 10px 0px;
    font-size: 30px;
    font-weight: 700;
    color: #000;	
}
.btn_input_bx5{
 height:40px !important;
     width:auto;
    background: #1774f0 !important;
    border: none !important;
    box-shadow: none !important;
    border-radius: 0px !important;  
}
</style>
<script>
jQuery(function() {
//----- OPEN
jQuery('[data-popup-open]').on('click', function(e)  {
jQuery('#git_push_status_message').val('');
var targeted_popup_class = jQuery(this).attr('data-popup-open');
jQuery('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
e.preventDefault();
});
//----- CLOSE
jQuery('[data-popup-close]').on('click', function(e)  {
var targeted_popup_class = jQuery(this).attr('data-popup-close');
jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
e.preventDefault();
});
});
</script>
