<script src='<?php echo base_url().'js/jquery.rating.js'; ?>' type="text/javascript" language="javascript"></script>
<link href='<?php echo css_url().'/jquery.rating.css' ?>' type="text/css" rel="stylesheet"/>
<link href="<?php echo css_url().'/reservation.css'; ?>" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo  css_url();?>/dashboard.css" type="text/css">

<script type="text/javascript">
$(function(){
 $('.hover-star1').rating({
  focus: function(value, link){
    // 'this' is the hidden form element holding the current value
    // 'value' is the value selected
    // 'element' points to the link element that received the click.
    var tip = $('#hover-test1');
    tip[0].data = tip[0].data || tip.html();
    tip.html(link.title || 'value: '+value);
  },
  blur: function(value, link){
    var tip = $('#hover-test1');
    $('#hover-test1').html(tip[0].data || '');
  }
 });
});


$(function(){
 $('.hover-star2').rating({
  focus: function(value, link){
    // 'this' is the hidden form element holding the current value
    // 'value' is the value selected
    // 'element' points to the link element that received the click.
    var tip = $('#hover-test2');
    tip[0].data = tip[0].data || tip.html();
    tip.html(link.title || 'value: '+value);
  },
  blur: function(value, link){
    var tip = $('#hover-test2');
    $('#hover-test2').html(tip[0].data || '');
  }
 });
});

$(function(){
 $('.hover-star3').rating({
  focus: function(value, link){
    // 'this' is the hidden form element holding the current value
    // 'value' is the value selected
    // 'element' points to the link element that received the click.
    var tip = $('#hover-test3');
    tip[0].data = tip[0].data || tip.html();
    tip.html(link.title || 'value: '+value);
  },
  blur: function(value, link){
    var tip = $('#hover-test3');
    $('#hover-test3').html(tip[0].data || '');
  }
 });
});

$(function(){
 $('.hover-star4').rating({
  focus: function(value, link){
    // 'this' is the hidden form element holding the current value
    // 'value' is the value selected
    // 'element' points to the link element that received the click.
    var tip = $('#hover-test4');
    tip[0].data = tip[0].data || tip.html();
    tip.html(link.title || 'value: '+value);
  },
  blur: function(value, link){
    var tip = $('#hover-test4');
    $('#hover-test4').html(tip[0].data || '');
  }
 });
});

$(function(){
 $('.hover-star5').rating({
  focus: function(value, link){
    // 'this' is the hidden form element holding the current value
    // 'value' is the value selected
    // 'element' points to the link element that received the click.
    var tip = $('#hover-test5');
    tip[0].data = tip[0].data || tip.html();
    tip.html(link.title || 'value: '+value);
  },
  blur: function(value, link){
    var tip = $('#hover-test5');
    $('#hover-test5').html(tip[0].data || '');
  }
 });
});

$(function(){
 $('.hover-star6').rating({
  focus: function(value, link){
    // 'this' is the hidden form element holding the current value
    // 'value' is the value selected
    // 'element' points to the link element that received the click.
    var tip = $('#hover-test6');
    tip[0].data = tip[0].data || tip.html();
    tip.html(link.title || 'value: '+value);
  },
  blur: function(value, link){
    var tip = $('#hover-test6');
    $('#hover-test6').html(tip[0].data || '');
  }
 });
});
</script>
<div class="container_bg container">
<div id="Reserve_Continer">
<div id="View_Reivew_Host" class="clearfix">
  <div id="left" class="col-md-3 col-sm-3 col-xs-12 pad_rig">

    <!-- /user -->
    <div class="Box" id="quick_links">
      <div class="Box_Head">
        <h2><?php echo translate("Quick Links");?></h2>
      </div>
      <div class="Box_Content">
        <ul>
          <li><a href=<?php echo base_url().'listings'; ?>> <?php echo translate("View/Edit Listings"); ?></a></li>
          <li><a href="<?php echo site_url('listings/my_reservation'); ?>"><?php echo translate("Reservations"); ?></a></li>
        </ul>
      </div>
      <div style="clear:both"></div>
    </div>

</div>
  <div id="main_reserve" class="col-md-9 col-sm-9 col-xs-12 padding-zero pad_list_req">
    <div class="Box">
      <div class="Box_Head">
          <h2 class="req_head"><?php echo translate("Review"); ?> </h2>
        </div>
      <div class="Box_Content res_cent col-md-12 col-sm-12 col-xs-12">
						<?php echo form_open('trips/review_by_traveller',array('id' => 'ReviewTraveler','name' => 'review_by_traveller')); ?>
        
        <div id="View_Review_Blk" class="clearfix col-md-12 col-sm-12 col-xs-12 padding-zero">
        	<div class="clsVReview_Left clsFloatLeft col-md-3 col-sm-3 col-xs-12">
            	<p class="VReview_Pbc"><?php echo translate("Public"); ?> </p>
            </div>
            <div class="clsVReview_Right clsFloatRight col-md-9 col-sm-9 col-xs-12">
            	<h3><?php echo translate("Share your experience"); ?></h3>
													<p><?php echo translate("Please review the guest. This will appear on their profile page."); ?></p>
            	<textarea name="review" id="review" class="VR_TxtAreaBg"></textarea>
            </div>
        </div>
        <div id="View_Review_Blk" class="clearfix col-md-12 col-sm-12 col-xs-12 padding-zero">
        	<div class="clsVReview_Left clsFloatLeft col-md-3 col-sm-3 col-xs-12">
            	<p class="VReview_Pvt"><?php echo translate("Private"); ?></p>
            </div>
            <div class="clsVReview_Right clsFloatRight col-md-9 col-sm-9 col-xs-12">
            	<h3><?php echo translate("Feedback to Guest"); ?></h3>
													<p><?php echo translate("How can this person be a better guest? Only they will see your feedback."); ?></p>
            	<textarea name="feedback" id="feedback" class="VR_TxtAreaBg"></textarea>
            </div>
        </div>
        <div id="View_Review_Blk" class="clearfix col-md-12 col-sm-12 col-xs-12 padding-zero">
            <div class="clsVReview_Left clsFloatLeft col-md-3 col-sm-3 col-xs-12">
                <p class="VReview_Pvt"><?php echo translate("Private"); ?></p>
            </div>
            <div class="clsVReview_Right clsFloatRight col-md-9 col-sm-9 col-xs-12">
                <div class="clear clean_text">  <h3><?php echo translate("Cleanliness"); ?></h3>
                  <div>
                    <input class="hover-star1" type="radio" name="cleanliness" value="1" title="<?php echo translate("Very poor"); ?>"/>
                    <input class="hover-star1" type="radio" name="cleanliness" value="2" title="<?php echo translate("Poor"); ?>"/>
                    <input class="hover-star1" type="radio" name="cleanliness" value="3" title="<?php echo translate("OK"); ?>"/>
                    <input class="hover-star1" type="radio" name="cleanliness" value="4" title="<?php echo translate("Good"); ?>"/>
                    <input class="hover-star1" type="radio" name="cleanliness" value="5" title="<?php echo translate("Very Good"); ?>"/>
                    <span id="hover-test1" style="margin:0 0 0 20px;"></span> </div><div style="clear:both"></div>
                </div>
                <br />
                <div class="clear clean_text"> <h3><?php echo translate("Communication"); ?></h3>
                  <div>
                    <input class="hover-star2" type="radio" name="communication" value="1" title="<?php echo translate("Very poor"); ?>"/>
                    <input class="hover-star2" type="radio" name="communication" value="2" title="<?php echo translate("Poor"); ?>"/>
                    <input class="hover-star2" type="radio" name="communication" value="3" title="<?php echo translate("OK"); ?>"/>
                    <input class="hover-star2" type="radio" name="communication" value="4" title="<?php echo translate("Good"); ?>"/>
                    <input class="hover-star2" type="radio" name="communication" value="5" title="<?php echo translate("Very Good"); ?>"/>
                    <span id="hover-test2" style="margin:0 0 0 20px;"></span> </div><div style="clear:both"></div>
                </div>
                <br />
                <div class="clear clean_text"> <h3><?php echo translate("Accuracy"); ?></h3>
                  <div>
                    <input class="hover-star3" type="radio" name="accuracy" value="1" title="<?php echo translate("Very poor"); ?>"/>
                    <input class="hover-star3" type="radio" name="accuracy" value="2" title="<?php echo translate("Poor"); ?>"/>
                    <input class="hover-star3" type="radio" name="accuracy" value="3" title="<?php echo translate("OK"); ?>"/>
                    <input class="hover-star3" type="radio" name="accuracy" value="4" title="<?php echo translate("Good"); ?>"/>
                    <input class="hover-star3" type="radio" name="accuracy" value="5" title="<?php echo translate("Very Good"); ?>"/>
                    <span id="hover-test3" style="margin:0 0 0 20px;"></span> </div><div style="clear:both"></div>
                </div>
                 <br />
																<div class="clear"> <h3><?php echo translate("Checkin"); ?></h3>
                  <div>
                    <input class="hover-star4" type="radio" name="checkin" value="1" title="<?php echo translate("Very poor"); ?>"/>
                    <input class="hover-star4" type="radio" name="checkin" value="2" title="<?php echo translate("Poor"); ?>"/>
                    <input class="hover-star4" type="radio" name="checkin" value="3" title="<?php echo translate("OK"); ?>"/>
                    <input class="hover-star4" type="radio" name="checkin" value="4" title="<?php echo translate("Good"); ?>"/>
                    <input class="hover-star4" type="radio" name="checkin" value="5" title="<?php echo translate("Very Good"); ?>"/>
                    <span id="hover-test4" style="margin:0 0 0 20px;"></span> </div><div style="clear:both"></div>
                </div>
                 <br />
																	<div class="clear"> <h3><?php echo translate("Location"); ?></h3>
                  <div>
                    <input class="hover-star5" type="radio" name="location" value="1" title="<?php echo translate("Very poor"); ?>"/>
                    <input class="hover-star5" type="radio" name="location" value="2" title="<?php echo translate("Poor"); ?>"/>
                    <input class="hover-star5" type="radio" name="location" value="3" title="<?php echo translate("OK"); ?>"/>
                    <input class="hover-star5" type="radio" name="location" value="4" title="<?php echo translate("Good"); ?>"/>
                    <input class="hover-star5" type="radio" name="location" value="5" title="<?php echo translate("Very Good"); ?>"/>
                    <span id="hover-test5" style="margin:0 0 0 20px;"></span> </div><div style="clear:both"></div>
                </div>
                 <br />
																<div class="clear"> <h3><?php echo translate("Value"); ?></h3>
                  <div>
                    <input class="hover-star6" type="radio" name="value" value="1" title="<?php echo translate("Very poor"); ?>"/>
                    <input class="hover-star6" type="radio" name="value" value="2" title="<?php echo translate("Poor"); ?>"/>
                    <input class="hover-star6" type="radio" name="value" value="3" title="<?php echo translate("OK"); ?>"/>
                    <input class="hover-star6" type="radio" name="value" value="4" title="<?php echo translate("Good"); ?>"/>
                    <input class="hover-star6" type="radio" name="value" value="5" title="<?php echo translate("Very Good"); ?>"/>
                    <span id="hover-test6" style="margin:0 0 0 20px;"></span> </div><div style="clear:both"></div>
                </div>
                 <br />
																	<div class="clear">
																	<p> 
																	<input type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>" >
					
																		<button name="submit" type="submit" class="btn_dash"><span><span><?php echo translate("Submit"); ?></span></span></button>
																	</p>
																	<br />
            </div>
          </div>
      </div>
						</div>
      
						<?php echo form_close(); ?>
    </div>
  </div>
  <div style="clear:both"></div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	
	 $('.button1').click(function()
	{
	
	var message = $('#review').val();
		 if(/\b(\w)+\@(\w)+\.(\w)+\b/g.test(message))
            {
            	alert('Sorry! Email or Phone number is not allowed');return false;
            }
            else if(message.match('@') || message.match('hotmail') || message.match('gmail') || message.match('yahoo'))
				{
					alert('Sorry! Email or Phone number is not allowed');return false;
				}
         	if(/\+?[0-9() -]{7,18}/.test(message))
            {
            	alert('Sorry! Email or Phone number is not allowed');return false;
            }
            
            var message1 = $('#feedback').val();
		 if(/\b(\w)+\@(\w)+\.(\w)+\b/g.test(message1))
            {
            	alert('Sorry! Email or Phone number is not allowed');return false;
            }
            else if(message1.match('@') || message1.match('hotmail') || message1.match('gmail') || message1.match('yahoo'))
				{
					alert('Sorry! Email or Phone number is not allowed');return false;
				}
         	if(/\+?[0-9() -]{7,18}/.test(message1))
            {
            	alert('Sorry! Email or Phone number is not allowed');return false;
            }
     	
	})
	
$("#ReviewTraveler").validate({
   errorElement:"p",
			errorClass:"Frm_Error_Msg",
			focusInvalid: false,
			rules: {
							review       : "required",
							feedback     : "required",
							cleanliness  : "required",
							communication: "required",
							accuracy     : "required", 
							checkin      : "required", 
							location     : "required", 
							value        : "required",       
							},
			messages: {
										review       : "Review field is required",
										feedback     : "Feedback field is required",
										cleanliness  : "Please give the rating for cleanliness",
										communication: "Please give the rating for communication",
										accuracy     : "Please give the rating for accuracy", 
										checkin      : "Please give the rating for checkin", 
										location     : "Please give the rating for location", 
										value        : "Please give the rating for value",  
										},
			submitHandler: function(form) 
			{
			 this.submit();
			}
			});
})

</script>