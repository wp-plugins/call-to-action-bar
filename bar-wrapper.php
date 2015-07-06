<div id="call-to-action-bar-wrapper" style="display:none;height:0px">
<?php include(CALL_TO_ACTION_BAR__PLUGIN_DIR . 'bar-template.php'); ?>	
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('body').prepend(jQuery('#call-to-action-bar-wrapper').html());
	jQuery('#call-to-action-bar-wrapper').remove();
});	
</script>
