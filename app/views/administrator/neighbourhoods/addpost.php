<?php
	if($msg = $this->session->flashdata('flash_message'))
				{
					echo $msg;
				}
?>
		<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
    <script type="text/javascript"> 
      
    function get_cities(city){
     $.ajax({
     	type: 'GET',
     	data: "city="+city,
         url : "<?php echo base_url().'administrator/neighbourhoods/place_drop'?>",
         success : function($data){
                 $('#place').html($data);

         },	
         error : function ($responseObj){
             alert("Something went wrong while processing your request.\n\nError => "
                 + $responseObj.responseText);
         }
     }); 
    }
    function visitors(value)
    {
    	if(value != 'none')
    	{
    	$('#vis_name').show();
    	$('#vis_review').show();
        }
        else
        {
        $('#vis_name').hide();
    	$('#vis_review').hide();
        }
    }
 </script>

	<script>
    $(document).ready(function()
    {
    	$('#form').submit(function()
    	{
    	var city = $('#city').val();
    	var place = $('#place').val();
    	if(city == 'none')
    	{
    		alert('Please choose city');return false;
    	}
    	if(place == 'none')
    	{
    		alert('Please choose place');return false;
    	}
    	})
    })
    </script>
<div id="Add_Email_Template">

<div class="container-fluid top-sp body-color">
	<div class="">
	<div class="col-xs-12 col-md-12 col-sm-12">
				<h1 class="page-header3"><?php echo translate_admin("Add Neighbourhood Place Posts"); ?></h1>
				<div class="but-set">
			 <span3><input type="submit" onclick="window.location='<?php echo admin_url('neighbourhoods/viewpost'); ?>'" value="<?php echo translate_admin('Manage Posts'); ?>"></span3>
          <?php /*?><h3><?php echo translate_admin("Manage Neighborhood Places"); ?></h3><?php */?>
      </div>
	  <div>
<form method="post" id="form" action="<?php echo admin_url('neighbourhoods/addpost')?>" enctype="multipart/form-data">					
  <div class="col-xs-12 col-md-12 col-sm-12">
  <table class="table1" cellpadding="2" cellspacing="0">
<tr>
  <td><?php echo translate_admin('City'); ?><span style="color: red;">*</span></td>
		<td>
				<select name='city' style="width:292px" id="city" onChange='get_cities(this.value)'>
				<option value='none' selected="selected"><?php echo translate_admin('Select City');?></option>
				<?php 
				foreach($cities->result() as $row)
				{
					echo '<option value="'.$row->city_name.'">'.$row->city_name.'</option>';
				}
				?>
				</select>
		</td>
</tr>		
<tr>
  <td><?php echo translate_admin('Place'); ?><span style="color: red;">*</span></td>
		<td id="place">
				<select name='place' id="place" style="width:292px">
				<option value='none' selected="selected"><?php echo translate_admin('No Place');?></option>	
				</select>
		</td>
</tr>
<tr>
  <td><?php echo translate_admin('Title'); ?><span style="color: red;">*</span></td>
		<td>
				<input class="clsTextBox" size="30" type="text" name="image_title" id="image_title" value=""/>
				<?php echo form_error('image_title'); ?>
		</td>
</tr>
<tr>
  <td><?php echo translate_admin('Description'); ?><span style="color: red;">*</span></td>
		<td>
				<textarea class="clsTextBox" name="image_desc" id="image_desc" value="" style="height: 162px; width: 282px;" ></textarea>
				<?php echo form_error('image_desc'); ?>
		</td>
</tr>
<tr>
			<td><?php echo translate_admin('Banner Image'); ?>-1<span style="color: red;">*</span></td>
<td>
<input id="big_image1" name="big_image1"  size="24" type="file"/>
<span style="color:#9c9c9c; text-style:italic; font-size:11px; "><?php echo translate_admin("Resolution"); ?>: 995x663</span>
</td>
</tr>
<tr>
			<td><?php echo translate_admin('Small Image'); ?>-1<span style="color: red;">*</span></td>
<td>
<input id="small_image1" name="small_image1"  size="24" type="file"/>
<span style="color:#9c9c9c; text-style:italic; font-size:11px; "><?php echo translate_admin("Resolution"); ?>: 485x304</span>
</td>
</tr>
<tr>
			<td><?php echo translate_admin('Small Image'); ?>-2<span style="color: red;">*</span></td>
<td>
<input id="small_image2" name="small_image2"  size="24" type="file"/>
<span style="color:#9c9c9c; text-style:italic; font-size:11px; "><?php echo translate_admin("Resolution"); ?>: 483x304</span>
</td>
</tr>
<tr>
			<td><?php echo translate_admin('Small Image'); ?>-3<span style="color: red;">*</span></td>
<td>
<input id="small_image3" name="small_image3"  size="24" type="file"/>
<span style="color:#9c9c9c; text-style:italic; font-size:11px; "><?php echo translate_admin("Resolution"); ?>: 315x286</span>
</td>
</tr>
<tr>
			<td><?php echo translate_admin('Small Image'); ?>-4<span style="color: red;">*</span></td>
<td>
<input id="small_image4" name="small_image4"  size="24" type="file"/>
<span style="color:#9c9c9c; text-style:italic; font-size:11px; "><?php echo translate_admin("Resolution"); ?>: 315x286</span>
</td>
</tr>
<tr>
			<td><?php echo translate_admin('Small Image'); ?>-5<span style="color: red;">*</span></td>
<td>
<input id="small_image5" name="small_image5"  size="24" type="file"/>
<span style="color:#9c9c9c; text-style:italic; font-size:11px; "><?php echo translate_admin("Resolution"); ?>: 315x286</span>
</td>
</tr>
<tr>
			<td><?php echo translate_admin('Banner Image'); ?>-2<span style="color: red;">*</span></td>
<td>
<input id="big_image2" name="big_image2"  size="24" type="file"/>
<span style="color:#9c9c9c; text-style:italic; font-size:11px; "><?php echo translate_admin("Resolution"); ?>: 485x304</span>
</td>
</tr>
<tr>
			<td><?php echo translate_admin('Banner Image'); ?>-3<span style="color: red;">*</span></td>
<td>
<input id="big_image3" name="big_image3"  size="24" type="file"/>
<span style="color:#9c9c9c; text-style:italic; font-size:11px; "><?php echo translate_admin("Resolution"); ?>: 483x304</span>
</td>
</tr>

<tr>
		     <td><?php echo translate_admin('Is Featured'); ?>?</td>
		     <td>
							<select name="is_home" id="is_home" >
							<option value="0"> <?php echo translate_admin('No'); ?> </option>
							<option value="1"> <?php echo translate_admin('Yes'); ?> </option>
							</select> 
							</td>
		  </tr>
		
<tr>
	<td></td>
	<td>
	<input  name="submit" type="submit" id="submit" value="<?php echo translate_admin('Submit'); ?>">
	</td>
</tr>
		
</table>
</form>	
</div>
</div>
</div>




            
