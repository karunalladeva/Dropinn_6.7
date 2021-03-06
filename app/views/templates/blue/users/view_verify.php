<!-- Required css stylesheets -->
<!--<link href="<?php echo css_url().'/dashboard.css'; ?>" media="screen" rel="stylesheet" type="text/css" />-->
<!-- End of stylesheet inclusion -->
<style>
iframe[src^="https://apis.google.com"] {
  display: none;
}
select{
	width:100%;
}
.verify_me {
	margin-top:0px !important;
	margin-left:0px !important;
	margin-bottom: 10px !important;
}
.verify_em, .verify_ph{
    padding-left: 21px;
}
h2 .fa.fa-check-circle.icon-green {
    font-size: 30px !important;
}
.Box_Head.msgbg {
    padding-left: 7px;
}
#file1,#file2{
 margin-right: 10px;}
/*b.verifyid {
    margin-left: 0;
}*/
@media only screen and (max-width:480px){
	.msgbg h2 {
	    font-size: 13px;
	}
}
</style>
  <script type="text/javascript">
window.onbeforeunload = function(e){
  gapi.auth.signOut();
};
   var profile, email;

  function loginFinishedCallback(authResult) {
    if (authResult) {
      if (authResult['status']['signed_in']){
    
      	if(authResult['status']['method'] == 'AUTO')
      	{
      	 return false;
      	}
     
        //toggleElement('signin-button'); // Hide the sign-in button after successfully signing in the user.
        gapi.client.load('plus','v1', loadProfile);  // Trigger request to get the email address.
      } else {
        console.log('An error occurred');
      }
    } else {
      console.log('Empty authResult');  // Something went wrong
    }
  }

  function loadProfile(){
    var request = gapi.client.plus.people.get( {'userId' : 'me'} );
    request.execute(loadProfileCallback);
  }

 
  function loadProfileCallback(obj) {
    profile = obj;
    email = obj['emails'].filter(function(v) {
        return v.type === 'account'; // Filter out the primary email
    })[0].value; // get the email from the filtered results, should always be defined.
    displayProfile(profile);
  }


  function displayProfile(profile){
  	var name;
  	if(profile['displayName'] == '')
  	{
  		name = email.split('@');
  		name = name[0];
  	}
  	else
  	{
  		name = profile['displayName'];
  	}
  	var last_name = profile['name']['familyName'];
  	var first_name = profile['name']['givenName'];
 /*   document.getElementById('name').innerHTML = profile['displayName'];
    document.getElementById('pic').innerHTML = '<img src="' + profile['image']['url'] + '" />';
    document.getElementById('email').innerHTML = email; */
     toggleElement('profile');
   var PostData = 'name='+name+'&first_name='+first_name+'&last_name='+last_name+'&id='+profile['id']+'&url='+profile['url']+'&imageurl='+profile['image']['url']+'&email='+email;
           $.ajax({
            url: "<?php echo base_url()?>users/google_verify",            
            type: "POST",                       
            data:PostData,
            success: function (result) { 
            	//alert(result);return false;
              window.location.href = '<?php echo base_url();?>'+result;                  
            },
            error: function (thrownError)
            {
            	 //alert(thrownError);
            	//alert('error');
            },
           
            });
   
  }

 
  function toggleElement(id) {
   /* var el = document.getElementById(id);
    if (el.getAttribute('class') == 'hide') {
      el.setAttribute('class', 'show');
    } else {
      el.setAttribute('class', 'hide');
    }*/
  }
  </script>
  
  <script type="text/javascript">
  (function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/client:plusone.js?onload=render';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  })();

  function render() {
    gapi.signin.render('customBtn', {
      'callback': 'loginFinishedCallback',
      'clientid': '<?php echo $google_app_id;?>',
      'cookiepolicy': 'single_host_origin',
      'scope': 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
    });
  }
  </script>
<div class="clsShow_Notification" id='facebook_verify_error_msg' style="display: none"><p class="error"><span><?php echo translate("Your Facebook Account Not Verified");?></span></p></div>
<div class="clsShow_Notification" id='facebook_verify_success_msg' style="display: none"><p class="success"><span><?php echo translate("Your Facebook Account Successfully Verified");?></span></p></div>
<div class="clsShow_Notification" id='facebook_verify_disconnect_msg' style="display: none"><p class="success"><span><?php echo translate("Your Facebook Account Successfully Disconnected");?></span></p></div>

<div class="clsShow_Notification" id='google_verify_error_msg' style="display: none"><p class="error"><span><?php echo translate("Your Google Account Not Verified");?></span></p></div>
<div class="clsShow_Notification" id='google_verify_success_msg' style="display: none"><p class="success"><span><?php echo translate("Your Google Account Successfully Verified");?></span></p></div>
<div class="clsShow_Notification" id='google_verify_disconnect_msg' style="display: none"><p class="success"><span><?php echo translate("Your Google Account Successfully Disconnected");?></span></p></div>

<div class="clsShow_Notification" id='email_verify_error_msg' style="display: none"><p class="error"><span><?php echo translate("Your Email Address Not Verified");?></span></p></div>
<div class="clsShow_Notification" id='email_verify_success_msg' style="display: none"><p class="success"><span><?php echo translate("Your Email Address Successfully Verified");?></span></p></div>
<div class="clsShow_Notification" id='email_verify_disconnect_msg' style="display: none"><p class="success"><span><?php echo translate("Your Email Address Successfully Disconnected");?></span></p></div>

<?php $this->load->view(THEME_FOLDER.'/includes/dash_header'); ?>
<?php $this->load->view(THEME_FOLDER.'/includes/profile_header'); ?>
<div id="dashboard_container" class=" col-sm-9 col-md-9 col-xs-12">	
<div id="verify_container" class="view_verify_Common">
  <div class="Box_verify" id="View_verify">
<!--    <div class="Box_Head msgbg">
    	<h2><?php echo translate("Profile Verification"); ?></h2>
    </div>-->
	<div class="box_list" style="padding-right: 10px; padding-bottom: 10px;">
        <div class="verify">
        	<div class="Box_Content">
            <div class="verify_id">
                <p class="verify"><b class="verifyid"><?php echo translate('Verify Your ID');?></b></p>
                <p class="verify_content"><?php echo translate("Getting your Verified ID is the easiest way to help build trust in the")." ".$this->dx_auth->get_site_title()." ".translate("community. We'll verify you by matching information from an online account to an official ID.");?></p>
                <p class="verify_content">Or, you can choose to only add the verifications you want below.</p>
            </div>
            <div class="btn_dash verify_mebtn">
                <a href="<?php echo base_url().'home/verify'; ?>"><?php echo translate('verify me');?></a>
            </div>
           </div>
        </div>
    <div class="Box">
		<div class="Box_Head msgbg">
        	<h2> 
        		<i class="fa fa-check-circle icon-green" style="font-size: 1.1em;"></i>
        		<!--<img src='<?php echo base_url()."images/nott_success.png"?>' alt='close' width="20px" />-->
        		 <?php echo translate('Your Current Verifications');?></h2>
		</div>
   <div class="Box_Content">
  <div class="phone" id="phone_verify_disconnect" style="display: none">
                        <div class="verify_id">
                            <p class="verify verify_ph"><b><?php echo translate('Phone Number');?></b></p>
                            <p class="verify_content"><?php echo translate('Rest assured, your number is only shared with another Airbnb member once you have a confirmed booking.');?></p>
                        </div>
         </div>
         
        <div class="facebook" id="facebook_verify_disconnect" style="display: none">
                        <div class="verify_id">
                            <p class="verify verify_fb"><b><?php echo translate('Facebook');?></b></p>
                            <p class="verify_content"><?php echo translate('Sign in with Facebook and discover your trusted connections to hosts and guests all over the world.');?></p>
                        </div>
                        <div class="verify_me ">
                            <button class="btn_dash_green" id="facebook" class="facebook" onClick="facebook_disconnect()"><?php echo translate('Disconnect');?></button>
                        </div>
         </div>
		<div class="email" id="email_verify_disconnect" style="display: none">
			<div class="verify_id">
				<p class="verify verify_em"><b><?php echo translate('Email');?></b></p>
				<p class="verify_content"><?php echo translate('You have confirmed your email:');?> <?php echo $users->email; ?>. <?php echo translate('A confirmed email is important to allow us to securely communicate with you.');?></p>
            </div>
            <div class="verify_me">
				<button class="btn_dash_green" onclick="email_disconnect()"><?php echo translate('Disconnect');?></button>
            </div>
        </div>

        <div class="email" id="no_verify" style="display: none">
            <div class="verify_id">
                <p class="verify_content"><?php echo translate('You have no verifications yet. You can add more below.');?></p>
            </div>
        </div>
         <div class="google" id="google_verify_disconnect" style="display: none">
                    <div class="verify_id">
                        <p class="verify" style="padding:0px 20px;"><b><?php echo translate('Google');?></b></p>
                        <p class="verify_content"><?php echo translate('Connect your').' '.$this->dx_auth->get_site_title().' '.translate('account to your Google account for simplicity and ease.');?></p>
                    </div>
                    <div class="verify_me verifymeflolef">
						<button class="btn_dash_green" onclick="google_disconnect()"><?php echo translate('Disconnect');?></button>
                    </div>
        </div>
         </div>
      </div>
		<div class="Box">
		<div class="Box_Head msgbg">
			<h2> 
				<!--<img src='<?php echo base_url()."images/st-add-more.png"?>' alt='close' width="18px" />--> 
				<i class="fa fa-plus-circle icon-gray" style="font-size: 1.2em;"></i>
				<?php echo translate('Add More Verifications');?></h2>
    </div>
    <div class="Box_Content">
        <div class="google" id="google_verify" style="display: none">
                    <div class="verify_id">
                        <p class="verify"> <img src='<?php echo base_url()."images/follow-us-google-plus.png"?>' alt='close' /><b><?php echo translate('Google');?></b></p>
                        <p class="verify_content"><?php echo translate('Connect your').' '.$this->dx_auth->get_site_title().' '.translate('account to your Google account for simplicity and ease.');?></p>
                    </div>
                    <div class="verify_me verifymeflolef">
					<div id="gSignInWrapper">
                      <div id="customBtn" class="btn_dash"><?php echo translate('Connect');?></div>
                      <span class="icon"></span>
      				  <!--<span class="buttonText"></span>-->
				</div>
                      <!--<a href=""><?php echo translate('Connect');?></a>-->

                    </div>
        </div>
      
     <style>
     .phone
     {
     	padding-bottom: 20px;
     }
    .google_connect
     {
     -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #018fe1;
    background-image: -moz-linear-gradient(center top , #00aeff 0px, #018fe1 100%);
    border-color: #0195eb #0083c7 #0175b8;
    border-image: none;
    border-radius: 5px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 0 0.2em rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.2), 0 0 0 #000;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 12px;
    font-weight: 700;
    line-height: 18px;
    margin-bottom: 0;
    padding: 10px;
    text-align: center;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.2);
    text-transform: uppercase;
    vertical-align: middle;
    width: 130px;
    }
     </style>
<!--<script src="<?php echo base_url().'js/facebook_invite.js'; ?>"> </script>--> 

<script>
 FB.init({ 
       appId:'<?php echo $fb_app_id; ?>', 
       frictionlessRequests: true
     });
     function facebook()
     { 
     	FB.login(function(response) {
    if (response.authResponse) {
        FB.api("/me?fields=name,email,first_name,last_name,hometown", function(me){
            	 $.ajax({
  type: "POST",
  url: '<?php echo base_url()."users/facebook_verify";?>',
   data: { fb_id: me.id, email: me.email },
   success: function(data)
        {
        if(data == 'verified')
        {
        	 $('#no_verify').hide();
       $("#facebook_verify").hide();
       $("#facebook_verify_disconnect").show();
       $("#facebook_verify_success_msg").fadeIn(2000);
        $("#facebook_verify_success_msg").fadeOut();  
        }
        else
        {
        	 $("#facebook_verify_error_msg").fadeIn(2000);
        	 $("#facebook_verify_error_msg").fadeOut();
        }
        }
});
   
    });
     }
     },{scope: 'email'});
    }
</script>

        <div class="email" id="email_verify" style="display: none">
            <div class="verify_id">
                <p class="verify">
                	<!--<img src='<?php echo base_url()."images/follow-us-email-plus.png"?>' alt='close' />-->
                	<i class="icon-gray fa fa-envelope-o"></i>
                	<b><?php echo translate('Email');?></b></p>
                <p class="verify_content"><?php echo translate('Please verify your email address by clicking the link in the message we just sent to:').' '.$email;?></p>
            </div>
            <div class="verify_me">

                    <a class="btn_dash" href="<?php echo base_url().'users/email_verify';?>"><?php echo translate('Connect');?></a>

            </div>
        </div>
 
	 	<div class="facebook" id="facebook_verify" style="display: none">
                    <div class="verify_id">
                        <p class="verify">
                        	<!--<img src='<?php echo base_url()."images/follow-us-facebook-plus.png"?>' alt='close' />-->
                        	<i class="icon-gray fa fa-facebook"></i>
                        	<b class="verifyfacbok"><?php echo translate('Facebook');?></b></p>
                        <p class="verify_content"><?php echo translate('Sign in with Facebook and discover your trusted connections to hosts and guests all over the world.');?></p>
                    </div>
                <div class="verify_me">
                    <!--<a id="facebook_disconnect">connect</a>-->
                      <a class="btn_dash" id="facebook" class="facebook" onClick="facebook()"><?php echo translate('Connect');?></a>
                </div>
        </div>
    
    <div class="phone" id="phone_verify" style="display: none">
                    <div class="verify_id">
                        <p class="verify">
                        	<!--<img width="15" src='<?php echo base_url()."images/Cell-Phone.png"?>' alt='' />-->
                        	<i class="icon-gray fa fa-mobile-phone"></i>
                        	<b class="verifyfacbok"><?php echo translate('Phone Number');?></b></p>
                        <p class="verify_content"><?php echo translate('Make it easier to communicate with a verified phone number. We’ll send you a code by SMS or read it to you over the phone. Enter the code below to confirm that you’re the person on the other end.');?></p>
                    </div>
                    <div id="pre_add_phone_no" class="nophone1">
                    	No phone number entered<br>
                    	<a id="add_phone_no">Add a Phone number</a></div>
                    
													<div class="phone-number-verify-widget" style="display: none;">
  <p class="pnaw-verification-error iconcolor"></p>
  <div class="pnaw-step1">
    <div id="phone-number-input-widget-9d95625f" class="phone-number-input-widget">
  <label for="phone_country">Choose a country:</label>
  <div class="select">
     <select name="country" id="country">
                                           	<?php 
                                           	
                                           	foreach($country->result() as $row)
											{
												if($row->country_name == $this->session->userdata('locale_country'))
												{
													$s = 'selected';
												}
												else {
													$s = '';
												}
												echo '<option value="'.$row->id.'"'.$s.'>'.$row->country_name.'</option>';
											}
                                           	?>
     </select>
  </div>

  <label for="phone_number">Add a phone number:</label>
  <div class="pniw-number-container clearfix">
    <div class="pniw-number-prefix">+91</div>
    <input type="text" id="phone_number" class="pniw-number" maxlength="15">
  </div>
  <input type="hidden" name="phone" data-role="phone_number" value="91" maxlength="15">
  <input type="hidden" value="10346170" name="user_id">
</div>

  

    <div class="pnaw-verify-container">
      <a id="verify_sms" rel="sms" href="javascript:void(0);" class="btn_dash">Verify via SMS</a>
      <!--<a rel="call" href="javascript:void(0);" class="btn btn-primary">Verify via Call</a>-->
      <a href="javascript:void(0);" rel="cancel" class="cancel" style="display: none;">Cancel</a>
      <a target="_blank" href="<?php echo base_url();?>home/help/17" class="why-verify">Why Verify?</a>
    </div>
  </div>
  <div class="pnaw-step2" style="display:none;">
    <p class="message iconcolor" ></p>
    <label for="phone_number_verification">Please enter the 4-digit code:</label>
    <input type="text" id="phone_number_verification2" maxlength="4">

    <div class="pnaw-verify-container">
      <a id="verify_code2" rel="verify" href="javascript:void(0);" class="btn_dash">
        Verify
      </a>
      <a href="javascript:void(0);" rel="cancel" class="cancel">
        Cancel
      </a>
    </div>
    <p class="cancel-message">If it doesn't arrive, click cancel and try again.</p>
  </div>
</div>
													<?php
											//	}
                                             ?>
                                             <div class="pnaw-step3 messageverify">
    <p class="message iconcolor"></p>
    <label for="phone_number_verification">Please enter the 4-digit code:</label>
    <input type="text" id="phone_number_verification" maxlength="4">

    <div class="pnaw-verify-container">
      <a id="verify_code" rel="verify" href="javascript:void(0);" class="btn_dash">
        Verify
      </a>
      <a href="javascript:void(0);" rel="cancel" class="cancel">
        Cancel
      </a>
    </div>
    <p class="cancel-message">If it doesn't arrive, click cancel and try again.</p>
  </div>
             <?php
                                           //	if($profile->phnum != '')
											//{
												?>
												
												<div id="verified" class="verifyremove">
													
                                        <span id="phone_no" class="verifyyes">  <?php  echo '+'.$profile->phnum; ?></span>
                                          <?php
                                          
                                           if($users->phone_verify == 'yes')
										  { ?>
                                           <span id="verified_success" class="verifiedcolor"> Verified </span>
                                           <a id="close" title="Remove">
                                           	<!--<img width="15" style="margin-top:-3px; margin-left: 0px;" src="<?php echo base_url().'images/close_red.png';?>" />-->
                                           	<i class="fa fa-close iconcolor"></i>
                                           	</a>
                                           
                                           <?php }
											else {
												
												?>
												<a id="verify_sms2" rel="sms" href="javascript:void(0);">Verify via SMS</a>
												<span id="verified_success" class="iconcolor" style="display: none;"> Verified </span>
												<a id="close" title="Remove">
													<!--<img width="15" style="margin-top:-3px; margin-left: 0px;" src="<?php echo base_url().'images/close_red.png';?>" />-->
                                           	<i class="fa fa-close iconcolor"></i>
													</a>
												<?php
											} ?>
                                            </div>
                                             <?php //} 
										//	else
											//	{
													?>   
        </div>
    
    
    </div>
    </div>
    
    
    
    
    <!-- ID verification 1 start -->


  <?php if($status==0){ ?>
  	    <div class="Box">
        <div class="Box_Head msgbg">
        	
			<h2> <img src='<?php echo base_url()."images/st-add-more.png"?>' alt='close' width="18px" /> <?php echo translate('ID Verification');?></h2>
    </div>
    <div class="Box_Content"> 
    <form action="<?php echo site_url('users/passport'); ?>" name="passport" id="passport" method="post" enctype="multipart/form-data">                 		
									<p>
									<input id="file1" class="col-md-5 col-sm-4 col-xs-12" name="file1" type="file"  style="font-size: 15px;" /> <?php echo form_error('file1'); ?>
									
								
									<?php if($view !=''){ ?>
										
										<?php
									$user_id    = $this->dx_auth->get_user_id();
			  						$row =  $this->Common_model->view_file1($user_id);
									?>
										
									<a class="linkviewcolr" href="<?php echo base_url()."verify/".$row; ?>" target="_blank"><?php echo translate("View file"); ?></a> <a class="linkviewcolr" href="<?php echo site_url('users/delete/'); ?>"><?php echo translate("Delete file"); ?></a> 
									<?php }?>
									</p><br />
									
									<p>
									<input id="file2" class="col-md-5 col-sm-4 col-xs-12" name="file2" type="file"  style="font-size: 15px;" /> <?php echo form_error('file2'); ?>
									
									<?php if($viewf !=''){ ?>
										
										<?php
									$user_id    = $this->dx_auth->get_user_id();
			  						$row1 =  $this->Common_model->view_file2($user_id);									
									?>
										
						
										
									<a class="linkviewcolr" href="<?php echo base_url()."verify/".$row1; ?>" target="_blank"><?php echo translate("View file"); ?></a> <a class="linkviewcolr" href="<?php echo site_url('users/deletef/'); ?>"><?php echo translate("Delete file"); ?></a> 
									<?php } ?>
									</p><br />
									
									<p><button type="submit" id="upload" class="upload_button btn_dash"  name="upload"><span><span><?php echo translate("Upload photo"); ?></span></span></button>
								    <?php if($viewf !='' && $view !=''&& $status==0){ ?>
									<a id="request" class="reqbtn"  href="<?php echo base_url().'users/passport_verification';?>"><span><span><?php echo translate("Request to Verify ID"); ?></span></span></a></p>
                        	        <?php } ?>
             </form>	</div></div>
								
		<?php } ?>
		 <div class="Box">
        <div class="Box_Head msgbg">
		<h2><?php echo translate("Verification Status"); ?></h2>
		</div>
		<div class="Box_Content">
        <input type="radio" class="no-check" name="check" id="check0" value="0" <?php if($status == 0) {echo "checked='checked'";} else  { echo "disabled='disabled'"; }?> /> 
        <label class="inner_text" ><?php echo translate("No, Not verified"); ?></label>
      
      </p>                                           
      <p>
       <input type="radio" class="no-check" name="check" id="check1" value="1" <?php if($status == 1) {echo "checked='checked'";} else  {echo "disabled='disabled'";}?>/> 
        <label class="inner_text" ><?php echo translate("Yes, Verified"); ?></label> 
      </p>
<!-- ID verification 1 end-->
        </div>
        </div>
        
        </div>
		</div>
	</div>
</div> 
     </div>
    
		</div></div>
   </div>
   
<style type="text/css">
.phone-number-verify-widget {
    border-radius: 2px;
    clear: both;
   /* float: left;*/
    line-height: 26px;
    margin: 10px 0;
    padding: 15px;
    text-align: left;
    width:50%;
}
.phone-number-input-widget .pniw-number-container .pniw-number-prefix {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: #bbb;
    border-image: none;
    border-radius: 2px 0 0 2px;
    border-style: solid;
    border-width: 1px 0 1px 1px;
    color: #393c3d;
    float: left;
    line-height: 30px;
    min-width: 30px;
    padding: 0 4px;
    text-align: center;
    margin-bottom:8px;
}
#phone_number{
	height:32px;
}
</style>

    <!-- JS Start For Phone number Verification -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/additional-methods.js"></script>
   <script>
   
   $(document).ready(function() {
	

 	$("#passport").validate({
        rules: 
	        {
		 file1:
			 {
			 required: true,
			 extension: "png|jpeg|jpg|pdf"
			 },
		 file2:
			 {
			 required: true,
			 extension: "png|jpeg|jpg|pdf"
			 }	 			
				 
			},
    errorClass:'error_msg',
    errorElement: 'div',
    errorPlacement: function(error, element)
    {
        error.appendTo(element.parent());
    }
    });				

	
	
	$('#phone_number').keypress(function(event) {
    if (event.keyCode == 13) {
        event.preventDefault();
    }
 });
    $('#phone_number_verification2').keypress(function(event) {
    if (event.keyCode == 13) {
        event.preventDefault();
    }
});

  $('#phone_number_verification').keypress(function(event) {
    if (event.keyCode == 13) {
        event.preventDefault();
    }
});

});

    <?php if($users->phone_verify != 'yes')
	 {?>
	 	$('#phone_verify').show();
	 	<?php }
else {
	 	 ?>
	 	 $('#no_verify').hide();
	 	 $('#phone_verify_disconnect').show();
	 	 <?php } ?>
	 	$(document).ready(function()
	 	{
	 	 $.ajax({
            url: "<?php echo base_url()?>users/phone_code",            
            type: "POST",                       
            data:"id="+$(this).val(),
            success: function (result) { 
                   
                   $('.pniw-number-prefix').text('+'+result);          
            }
            });
	 	
	 $('#country').change(function()
{
	 $.ajax({
            url: "<?php echo base_url()?>users/phone_code",            
            type: "POST",                       
            data:"id="+$(this).val(),
            success: function (result) { 
                   
                   $('.pniw-number-prefix').text('+'+result);          
            }
            });
})	    
$('#verify_sms').click(function()
{
	if($('#phone_number').val() == '' || isNaN($('#phone_number').val()))
	{
		$('.pnaw-verification-error').show();
		$('.pnaw-verification-error').text('Please enter a phone number.');return false;
	}
	
	if($('#phone_number').val().length < 4)
	{
		$('.pnaw-verification-error').show();
		$('.pnaw-verification-error').text('The phone number you entered was too short.');return false;
	}
	 $.ajax({
            url: "<?php echo base_url()?>users/mobile_verification",            
            type: "POST",                       
            data:"phone_number="+$('.pniw-number-prefix').text()+$('#phone_number').val(),
            success: function (result) { 
            	$('.pnaw-verification-error').hide();
            	$('.message').hide();
            	$('.pnaw-step1').hide();
                $('.pnaw-step2').show();   
                $('#phone_number_verification').val('');
	$('#phone_number_verification2').val('');
	$('#phone_number').val('');
            }
            });
})

$('#close').click(function()
{
	 $.ajax({
            url: "<?php echo base_url()?>users/close_phone",            
            type: "POST",                       
            success: function (result) { 
            	$('#pre_add_phone_no').show();
                $('#verified').hide();   
            }
            });
})

$('#verify_sms2').click(function()
{
	$.ajax({
            url: "<?php echo base_url()?>users/mobile_verification",            
            type: "POST",                       
            data:"phone_number="+$('#phone_no').text(),
            success: function (result) { 
            	$('.pnaw-verification-error').hide();
            	$('.message').hide();
            	$('.pnaw-step1').hide();
                $('.pnaw-step2').show(); 
                $('#phone_number_verification').val('');
	$('#phone_number_verification2').val('');
	$('#phone_number').val('');  
            }
            });
	$('#verified').hide();
	$('.message').hide();
	 $('.pnaw-step3').show();
})
$('#verify_code').click(function()
{
	 $.ajax({
            url: "<?php echo base_url()?>users/check_mobile_verification",            
            type: "POST",                       
            data:"phone_code="+$('#phone_number_verification').val(),
            success: function (result) { 
            	if(result == 'failed')
            	{
            		//alert('We were unable to validate your phone number. Please try again.');
            		$('.pnaw-verification-error').show();
					$('.pnaw-verification-error').text('We were unable to validate your phone number. Please try again.');
					$('.message').show();
            		$('.message').text('We were unable to validate your phone number. Please try again.');return false;
            	} 
            	
            	if(result == 'success')
            	{
            		 $.ajax({
            url: "<?php echo base_url()?>users/get_phone_no",            
            type: "POST",                       
            success: function (result) { 
            	if($(result).length == 1)
            	{
            		window.location.reload();
            	}
            	else
            	{
            		$('#phone_no').text('+'+result);
            	}
            }
            });
            		$('.phone-number-verify-widget').hide();
            		$('.pnaw-step2').hide();
            		$('.pnaw-step3').hide();
            		$('#verified').show();
            		$('#verified_success').show();
            		$('#verify_sms2').hide();
            		$('#phone_number_verification').val('');
	$('#phone_number_verification2').val('');
	$('#phone_number').val('');
            	}
            }
            });
})

$('#verify_code2').click(function()
{
	 $.ajax({
            url: "<?php echo base_url()?>users/check_mobile_verification",            
            type: "POST",                       
            data:"phone_code="+$('#phone_number_verification2').val(),
            success: function (result) { 
            	if(result == 'failed')
            	{
            		//alert('We were unable to validate your phone number. Please try again.');
            		$('.pnaw-verification-error').show();
					$('.pnaw-verification-error').text('We were unable to validate your phone number. Please try again.');
					//$('.message').show();
             		//$('.message').text('We were unable to validate your phone number. Please try again.');return false;
            	} 
            	
            	if(result == 'success')
            	{
            		 $.ajax({
            url: "<?php echo base_url()?>users/get_phone_no",            
            type: "POST",                       
            success: function (result) { 
            	$('#phone_no').text('+'+result);
            }
            });
            		$('.phone-number-verify-widget').hide();
            		$('.pnaw-step2').hide();
            		$('.pnaw-step3').hide();
            		$('#verified').show();
            		$('#verified_success').show();
            		$('#verify_sms2').hide();
            		$('#phone_number_verification').val('');
	$('#phone_number_verification2').val('');
	$('#phone_number').val('');
            	}
            }
            });
})

$('.cancel').click(function()
{
		 $.ajax({
            url: "<?php echo base_url()?>users/get_phone_no",            
            type: "POST",                       
            success: function (result) { 
            	if($(result).length == 1)
            	{
            		window.location.reload();
            	}
            	else
            	{
            		$('#phone_no').text('+'+result);
            	}
            }
            });
	$('.phone-number-verify-widget').hide();
	$('.pnaw-step3').hide();
	$('#verified').show();
	$('#verify_sms2').show();
	$('#verified_success').hide();
	$('#phone_number_verification').val('');
	$('#phone_number_verification2').val('');
	$('#phone_number').val('');
})

<?php if($profile->phnum != '' || $users->phone_verify == 'yes')
{?>
//$('.phone-number-verify-widget').show();
$('#pre_add_phone_no').hide();
<?php } ?>

<?php if($profile->phnum != '' && $users->phone_verify != 'yes')
{?>
//$('.phone-number-verify-widget').show();
$('#verified').show();
<?php } ?>

$('#add_phone_no').click(function()
{
	$('#pre_add_phone_no').hide();
	$('.message').hide();
	$('.pnaw-verification-error').hide();
	$('.pnaw-step2').hide();
	$('.pnaw-step1').show();
	$('.pnaw-step3').hide();
	$('.phone-number-verify-widget').show();
	$('#phone_number_verification').val('');
	$('#phone_number_verification2').val('');
	$('#phone_number').val('');
})

});	
	 	
   </script>
   
   <!-- JS Start For Facebook Verification -->
   <script>
    <?php if($users->facebook_verify != 'yes')
	 {?>
	 	
	 	$("#facebook_verify").show();
	 	<?php } else {
	 		?>
	 		$("#facebook_verify_disconnect").show();
	 		<?php
	 	} ?>
   function facebook_disconnect()
   { 
   	 	$.ajax({
  type: "POST",
  url: '<?php echo base_url()."users/facebook_verify_disconnect";?>',
   success: function(data)
        {  
        	$("#facebook_verify_disconnect").hide();
        	
        	$.getJSON('<?php echo base_url()."users/facebook_verify_disconnect";?>', function(data) {
  if(data.google != 'yes' && data.email != 'yes')
  {
  	 $('#no_verify').show();
  }
});

setTimeout(function(){
	$("#facebook_verify").show();
});
$('#facebook_verify_disconnect_msg').fadeIn(2000);
$('#facebook_verify_disconnect_msg').fadeOut();

        }
});
   }
   	</script>
   	  <!-- JS End For Facebook Verification -->
   	  
   	    <!-- JS Start For Google Verification -->
   	    <script>
   	    	<?php if($users->google_verify != 'yes') { ?>
   	    		
   	    		$("#google_verify_disconnect").hide();
   	    		$("#google_verify").show();
   	    		   <?php } else {
   	    		   	?>$('#no_verify').hide(); 
        	$("#google_verify").hide();
         $("#google_verify_disconnect").show();
 	
   <?php } ?>
   function google_disconnect()
   {
   	$.ajax({
  type: "POST",
  url: '<?php echo base_url()."users/google_verify_disconnect";?>',
   success: function(data)
        {
        	$("#google_verify_disconnect").hide();
        
         $.getJSON('<?php echo base_url()."users/google_verify_disconnect";?>', function(data) {
  if(data.fb != 'yes' && data.email != 'yes')
  {
  	 $('#no_verify').show();
  	  
  }
});
$('#google_verify_disconnect_msg').fadeIn(2000);
$('#google_verify_disconnect_msg').fadeOut();
$("#google_verify").show();
        }
});
   } 
   	    </script>
   	      	      
      <!-- JS Start For Email Verification -->
      <script>
      <?php if($users->email_verify != 'yes')
	 {?>
	
	 	$("#email_verify").show();
	 	$("#email_verify_disconnect").hide();
	 	<?php } else {
	 		?>
	 		$("#email_verify").hide();
	 		$("#email_verify_disconnect").show();
	 		<?php
	 	} ?>
   	    function email_disconnect()
   {
   	$.ajax({
  type: "POST",
  url: '<?php echo base_url()."users/email_verify_disconnect";?>',
   success: function(data)
        {
        	
        	$("#email_verify_disconnect").hide();
          
$.getJSON('<?php echo base_url()."users/email_verify_disconnect";?>', function(data) {
  if(data.fb != 'yes' && data.google != 'yes')
  {
  	 $('#no_verify').show();
  	 
  }
}); 
$('#email_verify_disconnect_msg').fadeIn(2000);
$('#email_verify_disconnect_msg').fadeOut();
 $("#email_verify").show();
        }
});
   } 
   </script>
   	  <!-- JS End For Email Verification -->
   	  
   	  <script>
   	  <?php if($users->email_verify != 'yes' && $users->facebook_verify != 'yes' && $users->google_verify != 'yes' && $users->phone_verify != 'yes')
	  {
	  	?>
	  	$('#no_verify').show();
	  	<?php
	  } ?>
   	  </script>
</div>
