<link rel="stylesheet" type="text/css" href="<?php echo css_url().'/jquery.fancybox-1.3.4.css' ?>" media="screen" />
<style>
iframe[src^="https://apis.google.com"] {
  display: none;
}
#fancybox-outer{
	padding: 0px !important;
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
            url: "<?php echo base_url()?>users/google_signin",            
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
$(document).ready(function(){

$("#signup #password1").focus(function(){
$(".hidden").show();
})

})
</script>
<script src="<?php echo base_url().'js/jquery.fancybox-1.3.4.pack.js'; ?>"></script>

<script type="text/javascript">
$(document).ready(function() {
			$("#forgot_password").fancybox({	});
});

FB.init({ 
       appId:'<?php echo $fb_app_id; ?>', 
       frictionlessRequests: true
     });
        
     function login()
     {
     	
  //  document.getElementById('light').style.display='block'; 
            FB.login(function(response) {
    if (response.authResponse) {
        FB.api("/me?fields=name,email,first_name,last_name", function(me){
            if (me.id) {
            	
            /*	var id = me.id; 
            	var email = me.email;
            	var first_name = me.first_name;
            	var last_name = me.last_name;*/
            	var id = me.id; 
            	var email = me.email;
            	var name = me.name;
            	var last_name = me.last_name;
            	
            	var live ='';
            	 if (me.hometown!= null)
        {
        	var live = me.hometown.name;
        }
            	
            	//alert(email);return false;
            	var picture = 'https://graph.facebook.com/'+id+'/picture?type=square';
            	var username = me.name;
            	
            	//alert('https://graph.facebook.com/'+id+'/picture?type=square'); return false;	
            	$.ajax({
            		cache: false,
  type: "POST",
  dataType : 'text',
  url: '<?php echo base_url()."facebook/success?";?>'+new Date().getTime(),
  data: { id: id, email: email, name: name, Lname: last_name, live: live, src: picture, username: username },
   success: function(data)
        { 
        	//alert(data);return false;
        	if(data)
        	{
		window.location.href = '<?php echo base_url();?>'+data;
			}  
               },
        error: function (req, text, error) {
    		    //alert(error);
    		}
});
            	  }
        });
    }
}, {scope: 'email,user_friends'});
}
  </script>
 <div class="container">
<div class="container_bg1 signup_head">
    <div id="section_signin" class="signup_h1">
        <h1>
          <?php echo translate("Sign in to your ". $this->dx_auth->get_site_title()." Account"); ?>
        </h1>
        <div class="clsSign_Top col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <div class="sign-fb-my-account">
               <!-- <p><?php echo translate("Sign in using Facebook:"); ?></p> -->
                <?php if ( !$this->facebook_lib->logged_in() ): ?>
                <a href="javascript:void(0)" onclick="login();" class="login_fb Sign_Fb_Bg col-md-12 col-sm-12 col-xs-12">
                	
                	<i class="fa fa-facebook signin" aria-hidden="true"></i>
                	<p class="fb_login">Log in With Facebook</p>
                	
                </a>
                <fb:facepile></fb:facepile>
                <?php else:?>
                <?php redirect('facebook/login'); ?>
                <?php endif;?>
                
                  <!-- Twitter sign in -->
                  
                 <a href="<?php echo base_url().'users/redirect';?>" class="login_twitter sign_up_tw_bg col-md-12 col-sm-12 col-xs-12">
                 	
                 		<i class="fa fa-twitter signin" aria-hidden="true"></i>
                  	<p class="fb_login">Log in With Twitter</p>
                 	
                 </a>
                 <!-- Twitter sign in -->
               
                 <!-- sign_up_google_bg -->

   		
                
                                
                	
                <!--<a href="javascript:void(0);" onclick="$('#section_signin').hide();$('#section_signup').show();return false;"><?php echo translate("Sign up");?>
                </a>-->
       <div id="customBtn" class="google_login_1 customGPlusSignIn col-xs-12 col-sm-12 col-md-12 no-padding">
							<img class="fa fa-googleplus" src="<?php echo base_url();?>images/Google-plus.png"/>
							<p class="fb_login">Log in With Google</p>
							</div>
           
                
            </div>
            <p class="Sign_Or_Row col-xs-12 col-sm-12 col-md-12"><span><?php echo translate("Or"); ?></span></p>
            <!--<p class="create_acc col-xs-12 col-sm-12 col-md-12"><span><?php echo translate("Create Your Account");?></span> &nbsp;-->
            
            <div class="clsSign_Email">

                  <?php echo form_open("users/signin", array('name' => 'signin', 'id' => 'signin')); ?>
                  <div id="Input_Mail" class="Txt_input">
                  	<i class="fa fa-envelope-o" aria-hidden="true"></i>
                  	<label class="labelBlur labelusername" for="username" id="lusername"><?php echo translate("Enter your username or email"); ?></label>
                     <input class="inputusername email_gray_text" type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" />
                  </div>
                  <?php echo form_error('username'); ?>
                  <div id="Input_Password" class="Txt_input">
                  	<i class="fa fa-lock fa-2x inputmail"></i>
                  	<label class="labelBlur labelusername" for="password" id="lpassword"><?php echo translate("Password"); ?></label>
                     <input class="inputusername" id="password" name="password" type="password" value="" />
                  </div>
                  <?php echo form_error('password'); ?>
                  <div class="forgot_password_cls">
                  <label class="Sign_Reminder_Me col-xs-8 col-sm-6 col-md-6"><input class="signinremainme" type="checkbox" name="remember_me" value="1"/>&nbsp;<span class="signinremainme_span"><?php echo translate("Remember me next time"); ?></span></label>
                   <p class="forgot_pass col-xs-4 col-sm-6 col-md-6"><?php //echo anchor('users/forgot_password','Forgot password?', array('id' => 'forgot_password'))
                  	echo anchor('users/forgot_password',translate('Forgot password'), array('id' => 'forgot_password')) ?></p>
                  <p>
                  </div>
                  	<button name="SignIn" class="btn_sign btn_sign_in sign_in_btn col-xs-12 col-sm-12 col-md-12" type="submit"><span><span><?php echo translate("Sign in"); ?></span></span></button>

                    
                  
                  </p>
           <?php echo form_close(); ?>
               </div>
                <div class="rem_forgot new_signup col-md-12 col-sm-12 col-xs-12" style="margin: 15px 0px !important;">
		        	
		          		
		          		<span class="col-md-6 col-sm-6 col-xs-8" style="float: left; font-size: 16px;">Don't have an account?</span>		
		    		&nbsp;&nbsp;
		        	<a style="right: 50%" href="<?php echo base_url().'users/signup';?>"><?php echo translate("Sign up"); ?></a>
		        	</div>
  
        </div>
        <div class="clsSign_Bottom">&nbsp;</div>

        <!-- End of form for the sign in feature -->
     
  </div>
 

</div>


 
</div>