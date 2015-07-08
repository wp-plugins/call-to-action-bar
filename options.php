<div class="wrap">
<div class="row">
<div class="col-md-12" style="background-color:#ffffff;">
<h2>Call-To-Action Bar Settings</h2>
<p></p>

<form method="post" action="options.php" class="form-horizontal"> 
<?php
settings_fields('call-to-action-bar-settings-group');
do_settings_sections('call-to-action-bar-settings-group');
?>

	<fieldset>
		<legend>General settings</legend>
		<div class="form-group">
			<label for="active" class="col-sm-2 control-label">Active</label>
			<div class="col-sm-10">
			  <input type="checkbox" id="active" name="ctab_active" value="1" <?php checked( '1', get_option( 'ctab_active' ) ); ?> class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="general_text" class="col-sm-2 control-label">Bar text</label>
			<div class="col-sm-10 col-md-8">
			  <input type="text" id="general_text" name="ctab_general_text" value="<?php echo esc_attr( get_option('ctab_general_text') ); ?>" class="form-control" />
			  <span class="help-block">Provide a short teaser of your product/project/article/etc. HTML elements <code>strong</code>, <code>b</code>, <code>i</code>, <code>em</code>, <code>u</code> are allowed.</span>
			</div>
		</div>
		<div class="form-group">
			<label for="call_to_action_text" class="col-sm-2 control-label">Call-to-Action text</label>
			<div class="col-sm-8  col-md-6">
			  <input type="text" id="call_to_action_text" name="ctab_call_to_action_text" value="<?php echo esc_attr( get_option('ctab_call_to_action_text') ); ?>" class="form-control" />
			  <span class="help-block">Name your call-to-action with a very short phrase <small><samp>[e.g. Visit now]</samp></small>.</span>
			</div>
		</div>
		<div class="form-group">
			<label for="call_to_action_url" class="col-sm-2 control-label">Call-to-Action URL</label>
			<div class="col-sm-10 col-md-8">
			  <input type="text" id="call_to_action_url" name="ctab_call_to_action_url" value="<?php echo esc_attr( get_option('ctab_call_to_action_url') ); ?>" class="form-control" />
			  <span class="help-block">Provide a URL to your call-to-action site.</span>
			</div>
		</div>
		<div class="form-group">
			<label for="able_to_dismiss" class="col-sm-2 control-label">Dismiss bar</label>
			<div class="col-sm-10">
			  <input type="checkbox" id="able_to_dismiss" name="ctab_able_to_dismiss" value="1" <?php checked( '1', get_option( 'ctab_able_to_dismiss' ) ); ?> class="form-control" />
			  <span class="help-block">Specify whether the visitor can dismiss the bar or not.</span>
			</div>
		</div>
	</fieldset>


	<fieldset>
		<legend>Bar styling</legend>
		<div class="form-group">
			<label for="bar_background_color" class="col-sm-2 control-label">Background color</label>
			<div class="col-sm-10">
				<input type="text" id="bar_background_color" name="ctab_bar_background_color" value="<?php echo esc_attr( get_option('ctab_bar_background_color') ); ?>" class="form-control minicolors" maxlength="7" />
			</div>
		</div>
		<div class="form-group">
			<label for="bar_text_color" class="col-sm-2 control-label">Text color</label>
			<div class="col-sm-10">
				<input type="text" id="bar_text_color" name="ctab_bar_text_color" value="<?php echo esc_attr( get_option('ctab_bar_text_color') ); ?>" class="form-control minicolors" maxlength="7" />
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Call-To-Action styling</legend>
		<div class="form-group">
			<label for="call_to_action_background_color" class="col-sm-2 control-label">Background color</label>
			<div class="col-sm-10">
				<input type="text" id="call_to_action_background_color" name="ctab_call_to_action_background_color" value="<?php echo esc_attr( get_option('ctab_call_to_action_background_color') ); ?>" class="form-control minicolors" maxlength="7" />
			</div>
		</div>
		<div class="form-group">
			<label for="call_to_action_text_color" class="col-sm-2 control-label">Text color</label>
			<div class="col-sm-10">
				<input type="text" id="call_to_action_text_color" name="ctab_call_to_action_text_color" value="<?php echo esc_attr( get_option('ctab_call_to_action_text_color') ); ?>" class="form-control minicolors" maxlength="7" />
			</div>
		</div>
	</fieldset>

	<div class="form-actions">
		<?php
		submit_button();
		?>
	</div>
</form>
</div>
</div>
</div>