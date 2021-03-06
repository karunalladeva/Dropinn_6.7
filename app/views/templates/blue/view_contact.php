<link href="<?php echo css_url(); ?>/home.css" media="screen" rel="stylesheet" type="text/css" />
<div class="container">
<div id="View_Contact" class="container_bg">
<!-- BEGIN STATIC LAYOUT -->

<div class="Box">
    <div class="Box_Head">
        <h2><?php echo translate("Contact us"); ?></h2>
    </div>
<div class="Box_Content">

<div class="clearfix" id="Contact_content">

			<div class="clsFloatLeft col-md-6 col-sm-6 col-xs-12 padding-zero" id="Contact_Left">
								<p class="col-md-12 col-sm-12 col-xs-12"><label class="col-md-5 col-sm-6 col-xs-6 padding-zero"><?php echo translate("Phone Support"); ?> <span style="float: right;">:</span></label> <label class="col-md-6 col-sm-6 col-xs-6 cont_nor"><?php if(isset($row->phone) && $row->phone != '') echo $row->phone; else echo "-"; ?> </label></p>
								<p class="col-md-12 col-sm-12 col-xs-12"><label class="col-md-5 col-sm-6 col-xs-6 padding-zero"><?php echo translate("Email Support"); ?> <span style="float: right;">:</span></label> <label class="col-md-6 col-sm-6 col-xs-6 cont_nor" style="word-wrap: break-word; padding-right: 10px;"> <?php if(isset($row->email) && $row->email != '') echo $row->email; else echo "-" ?> </label></p>
			<p class="col-md-12 col-sm-12 col-xs-12"><label class="col-md-5 col-sm-6 col-xs-6 padding-zero"><?php echo translate("Meet us at"); ?> <span style="float: right;">:</span></label>
	<label class="col-md-6 col-sm-6 col-xs-6 cont_nor" style="line-height: 14px;"> <?php if(isset($row->name) && $row->name != '') echo '<label class="cont_nor">'. $row->name .'</label>' .'</br>'; else echo "-" ?>
			<?php if(isset($row->street)) echo '<label class="cont_nor">'.$row->street.'</label>' .'</br>'; ?>
			<?php if(isset($row->city)) echo '<label class="cont_nor">'.$row->city.'</label>' .'</br>'; ?>
			<?php if(isset($row->pincode) && $row->pincode != '0') echo '<label class="cont_nor">'. $row->pincode .'</label>' .'</br>'; else "-"; ?>
			<?php if(isset($row->state)) echo '<label class="cont_nor">'. $row->state .'</label>' .'</br>'; ?>
     <?php if(isset($row->country)) echo '<label class="cont_nor">'.$row->country.'</label> </br>'; ?>
     </label>
    </p>
             </div>
             <style>
	.padding-zero {
    padding-left: 0px !important;
    padding-right: 0px !important;
   }
</style>
<div class="clsFloatRight col-md-6 col-sm-6 col-xs-12 padding-zero" id="Contact_Right">

<!-- Feedback Form start -->


     <form action="<?php echo site_url('pages/contact'); ?>" id="submit_message_form" method="post" style="overflow:hidden;">                 

      <div class="col-md-12 col-xs-12 col-sm-12 error-sign padding-zero" style="padding-bottom: 15px !important;overflow:hidden;">
        <label class="inner_text col-md-4 col-sm-5 col-xs-12 " for="name"><?php echo translate("Name"); ?><sup>*</sup> <span style="float: right;padding-right:10px;">:</span></label> 
       <label class="col-md-6 col-sm-6 col-xs-12">
       <input class="col-md-12 col-sm-12 col-xs-12 name-input-dash" style="border-color: #bbbbbb;" id="name" name="name" placeholder="Name" type="text" value="<?php echo set_value('name'); ?>" />
       <?php echo  form_error('name') ?>
       </label>
      </div>
                                                    
      <div class="col-md-12 col-xs-12 col-sm-12 error-sign padding-zero" style="padding-bottom: 15px !important;">
        <label class="inner_text col-md-4 col-sm-5 col-xs-12" for="email"><?php echo translate("Email Address"); ?><sup>*</sup> <span style="float: right;padding-right:10px;">:</span></label>
        <label class="col-md-6 col-sm-6 col-xs-12">
        <input class="col-md-12 col-sm-12 col-xs-12 name-input-dash" style="border-color: #bbbbbb;" id="email" name="email" placeholder="Email Address" type="text" value="<?php echo set_value('email'); ?>" />
       <?php echo form_error('email'); ?>
       </label>
      </div>
						
      <div class="col-md-12 col-xs-12 col-sm-12 error-sign padding-zero" style="padding-bottom: 15px !important">
        <label class="inner_text col-md-4 col-sm-5 col-xs-12 " for="message"><?php echo translate("Feedback"); ?> <span style="float: right;padding-right:10px;">:</span><sup>*</sup></label>
        <label class="col-md-6 col-sm-6 col-xs-12">
        <textarea class="col-md-12 col-sm-12 col-xs-12" id="message" name="message" value="Feedback" rows="4"><?php echo set_value('message'); ?></textarea>
        <?php echo form_error('message'); ?>
        </label>
      </div>
      			
      <div  class="col-md-12 col-xs-12 col-sm-12 padding-zero">
        <label>&nbsp;</label>
        <button id="message_submit" name="commit" class="btn_sta finish" type="submit"><span><span><?php echo translate("Send"); ?></span></span></button>
      </div>
    </form>
                                    


<!-- End of feedback form  -->

</div>
            <div style="clear:both"></div>
</div>
</div>

</div>
  <!-- END STATIC LAYOUT -->
</div>
</div>