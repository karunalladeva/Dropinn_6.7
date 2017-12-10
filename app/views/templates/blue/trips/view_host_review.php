<link href="<?php echo css_url().'/reservation.css'; ?>" media="screen" rel="stylesheet" type="text/css" />
<div class="container_bg container">
<div id="View_Host_Review" class="clearfix">
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
          <h2><?php echo translate("Your Review"); ?> </h2>
        </div>
      <div class="Box_Content">

        
        <div id="View_Review_Blk" class="clearfix col-md-12 col-sm-12 col-xs-12 padding-zero">
        	<div class="clsVReview_Left clsFloatLeft col-md-3 col-sm-3 col-xs-12">
            	<p class="VReview_Pbc"><?php echo translate("Public"); ?> </p>
            </div>
            <div class="clsVReview_Right clsFloatRight clsFloatRight col-md-9 col-sm-9 col-xs-12">
            	<h3><?php echo translate("Your experience"); ?></h3>
            	<p><?php if(isset($result->review)) echo $result->review; ?></p>
            </div>
        </div>
        <div id="View_Review_Blk" class="clearfix col-md-12 col-sm-12 col-xs-12 padding-zero">
        	<div class="clsVReview_Left clsFloatLeft col-md-3 col-sm-3 col-xs-12">
            	<p class="VReview_Pvt"><?php echo translate("Private"); ?></p>
            </div>
            <div class="clsVReview_Right clsFloatRight col-md-9 col-sm-9 col-xs-12">
            	<h3><?php echo translate("Feedback to Guest"); ?></h3>
													<p><?php if(isset($result->feedback)) echo $result->feedback; ?></p>
            </div>
        </div>
        <div id="View_Review_Blk" class="clearfix clearfix col-md-12 col-sm-12 col-xs-12 padding-zero">
            <div class="clsVReview_Left clsFloatLeft col-md-3 col-sm-3 col-xs-12">
                <p class="VReview_Pvt"><?php echo translate("Private"); ?></p>
            </div>
            <div class="clsVReview_Right clsFloatRight col-md-9 col-sm-9 col-xs-12">
                <div class="clear">  <h3><?php echo translate("Cleanliness"); ?></h3>
                 <div>
																		<p><?php if(isset($result->cleanliness)) echo $result->cleanliness; ?></p>
																	 </div><div style="clear:both"></div>
                </div>
                <br />
                <div class="clear"> <h3><?php echo translate("Communication"); ?></h3>
                  <div>
																		<p><?php if(isset($result->communication)) echo $result->communication; ?></p>
																	
																				</div><div style="clear:both"></div>
                </div>
                <br />
                <div class="clear"> <h3><?php echo translate("Observations of house rules"); ?></h3>
                  <div>
																		<p><?php if(isset($result->house_rules)) echo $result->house_rules; ?></p>
																				
																				</div><div style="clear:both"></div>
                </div>

          </div>
      </div>
						<br />
						</div>
      
    </div>
  </div>
  <div style="clear:both"></div>
</div>
</div>