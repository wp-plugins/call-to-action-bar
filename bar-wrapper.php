<div id="call-to-action-bar-wrapper" style="display:none;height:0px">
<?php include(CALL_TO_ACTION_BAR__PLUGIN_DIR . 'bar-template.php'); ?>	
</div>
<script type="text/javascript">
jQuery(document).ready(function(){

	var can_dismiss_bar = <?php echo($ctab_able_to_dismiss ? 'true' : 'false'); ?>;

	// check if user did dismiss the bar
	if(jQuery.cookie('ctab_user_did_dismiss_bar') === undefined || can_dismiss_bar == false)
	{
		jQuery('body').prepend(jQuery('#call-to-action-bar-wrapper').html());
		jQuery('#call-to-action-bar-wrapper').remove();

		jQuery('#ctab_user_did_dismiss_bar_link').click(function(){
			jQuery('#call-to-action-bar-spacer').remove();
			jQuery('#call-to-action-bar-container').remove();

			// Set cookie
			jQuery.cookie('ctab_user_did_dismiss_bar', 'true', {expires: 7, path: '/'});

			return false;
		});
	}
});	
</script>
