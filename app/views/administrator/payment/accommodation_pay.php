<script type="text/javascript">
		function startCallback() {
		document.getElementById('message').innerHTML = '<img src="<?php echo base_url().'images/loading.gif' ?>">';
		// make something useful before submit (onStart)
		return true;
	}

	function completeCallback(response) {
		if(response.length > 100 )
{
window.location.href = "<?php echo base_url().'administrator';?>";
}
else
{
document.getElementById('message').innerHTML = response;
}
	}
$(function () {
$(':text').keydown(function (e) {
if (e.shiftKey || e.ctrlKey || e.altKey) {
e.preventDefault();
} else {
var key = e.keyCode;  
if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
e.preventDefault();
}
}
});
});
</script>
    <div id="Accomondation">
    
     <div class="container-fluid top-sp body-color">
	<div class="">
	<div class="col-xs-12 col-md-12 col-sm-12">
     <h1 class="page-header3"><?php echo translate_admin('Edit Guest Booking commission'); ?></h1>
		<div class="but-set">
			<span3><input type="submit" onclick="window.location='<?php echo admin_url('payment/paymode'); ?>'" value="<?php echo translate_admin('View All'); ?>"></span3>
	 </div>
     </div>
   	 
  <?php 
		//Show Flash Message
		if($msg = $this->session->flashdata('flash_message'))
		{
			echo $msg;
		}
	 ?>
		
<form action="<?php echo admin_url('payment/paymode'); ?>" method="post" onsubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback})">	
	<div class="col-xs-12 col-md-12 col-sm-12">
<table class="table" cellpadding="2" cellspacing="0">
					<tr>
       <td style="padding:20px 0px 0px 8px;"><?php echo translate_admin('Is Active?'); ?><span class="clsRed">*</span></td>
							<td style="padding:20px 0px 0px 8px;">
							<select name="is_premium" class="usertype" id="is_premium" onchange="javascript:showpremium(this.value);">
							<option value="0"> No </option>
							<option value="1"> Yes </option>
							</select> 
							</td>
				</tr>
				
				<?php
				if($result->is_premium == 0)
				{ $show = 'none'; }
				else
				{ $show = 'block'; }
				?>
				
					<tr>
       <td><?php echo translate_admin('Promotion Type'); ?></td>
							<td style="padding: 0.6em 0 0.6em 4px;"> <input type="radio" <?php if($result->is_fixed == 1) echo 'checked="checked"'; ?> name="is_fixed" onclick="javacript:showhideF(this.value);" value="1"> Fixed Pay
							<p> <input type="radio" <?php if($result->is_fixed == 0) echo 'checked="checked"'; ?> name="is_fixed" onclick="javacript:showhideF(this.value);" value="0"> Percentage Pay</p></td>
				</tr>
				
				<?php
				if($result->is_fixed == 1)
				{ $showF = 'block'; $showP = 'none'; }
				else
				{ $showF = 'none'; $showP = 'block'; }
				?>	
                
				
				<tr id="fixed"> <!-- style="display:<?php echo $showF; ?>;width:165%">-->
       <td class="clsName accom_width1"><?php echo translate_admin('Fixed Amount'); ?><span class="clsRed">*</span>
       	<p class="recommend">(Recommend the Percentage Pay. Because of, Guest booking amount some times occurring in minus values.)</p>
       </td>
							<td> <input type="text" name="fixed_amount" value="<?php echo $result->fixed_amount; ?>"></td>
				</tr>	
				<tr id="currency"> <!-- style="display:<?php echo $showF; ?>;width:165%">-->
       <td class="clsName accom_width1"><?php echo translate_admin('Currency'); ?><span class="clsRed">*</span></td>
							<td> 
								<select name="currency">
								<?php
								foreach($currency->result() as $row)
								{
									if($result->currency == $row->currency_code)
									{
										$selected = "selected";
									}
									else {
										$selected = "";
									}
									?>
									<option value="<?php echo $row->currency_code;?>" <?php echo $selected; ?>><?php echo $row->currency_code;?></option>
									<?php
								}
								?>
								</select>
							</td>
				</tr>		
				
					<tr id="percentage"> <!-- style="display:<?php echo $showP; ?>;width:165%">-->
       <td class="clsName accom_width1"><?php echo translate_admin('Percentage Amount'); ?><span class="clsRed">*</span></td>
							<td style="padding: 0.6em 0 0 9px;"> <input type="text" name="percentage_amount" id="percentage_amount" value="<?php echo $result->percentage_amount; ?>">%</td>
				</tr>			
				<tr>
						<td></td>
						<td>
						<input type="hidden" name="payId" value="<?php echo $payId; ?>" />
						<div class="clearfix">
						<input class="clsSubmitBt1" type="submit" name="update" value="<?php echo translate_admin('Update'); ?>" style="width:90px;" />
						<p><div id="message"></div></p>
						</div>
						</td>
				</tr>
		</table>	
		<?php echo form_close(); ?>
		
    </div>
		
<script language="Javascript">
jQuery("#is_premium").val('<?php echo $result->is_premium; ?>');

function showpremium(id)
{
	if(id == 1)
	{
	document.getElementById("showhide").style.display = "block";
	}
	else
	{
	   document.getElementById("showhide").style.display = "none";
	}
}
function showhideF(id)
{
	if(id == 1)
	{
	document.getElementById("fixed").style.display      = "";
	document.getElementById("currency").style.display      = "";
	document.getElementById("percentage").style.display = "none";
	}
	else
	{
	document.getElementById("fixed").style.display      = "none";
	document.getElementById("currency").style.display      = "none";
	document.getElementById("percentage").style.display = "";	
	}
}
</script>
