<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script type="text/javascript">
		function startCallback() {
		//$("#message").html('<img src="<?php echo base_url().'images/loading.gif' ?>">');
		// make something useful before submit (onStart)
		return true;
	}

	function completeCallback(response) {
		if(response.length > 50 )
{
window.location.href = "<?php echo base_url().'administrator';?>";
}
else
{
	 $('#message').show();
		$("#message").html(response);
		$("#message").delay(1800).fadeOut('slow');
	}}
	$(document).ready(function()
{
	$("#form").validate({
     rules: {
                sinch_name: { 
                	required: true, 
                	
                	},
                sinch_api_key: { 
                    required: true, 
               
                    },
                sinch_api_secret: { 
                	required: true, 
                	 
                	},
            },
     messages: {
                  sinch_name: {
                  	required: "Please enter the API ID.",
                  
                  	},
                  sinch_api_key: {
                    required: "Please enter the Secret Key.",
                 
                    },
                  sinch_api_secret: {
                  	required: "Please enter the Secret Key.",
                  	
                  	}
               }

});

jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9]*$/.test(value);
}, "Letters, numbers, and underscores only please");

});
</script>


<div id="Fb_Settings">
<div class="container-fluid top-sp body-color">
    <div class="">
        <div class="col-xs-12 col-md-12 col-sm-12">
 <h1 class="page-header1"><?php echo translate_admin('Sinch Connect Settings'); ?></h1>
</div>
<form action="<?php echo admin_url('social/sinch_settings'); ?>" method="post" id="form" onsubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback})">
<div class="col-xs-12 col-md-12 col-sm-12">
<table class="table tablet1" cellpadding="2" cellspacing="0">
 <tr>
  <td><?php echo translate_admin('Sinch Name'); ?><span style="color: red;">*</span></td>
  <td><input type="text" size="30" name="sinch_name" value="<?php if(isset($sinch_name)) echo $sinch_name; ?>"></td>
 </tr>
 <tr>
  <td><?php echo translate_admin('Sinch API key'); ?><span style="color: red;">*</span></td>
  <td><input type="text" size="55" name="sinch_api_key" value="<?php if(isset($sinch_api_key)) echo $sinch_api_key; ?>"></td>
 </tr>
 
 
  <tr>
  <td><?php echo translate_admin('Sinch API Secret'); ?><span style="color: red;">*</span></td>
  <td><input type="text" size="55" name="sinch_api_secret" value="<?php if(isset($sinch_api_secret)) echo $sinch_api_secret; ?>"></td>
 </tr>
 
 <tr>
  <td></td>
  <td><div class="clearfix"> 
    <input class="clsSubmitBt1" type="submit" name="update" value="<?php echo translate_admin('Update'); ?>" style="width:90px;" />
    <div>
    <div id="message"></div>
    </div> </div></td>
 </tr>
</table>
</form>
</div>