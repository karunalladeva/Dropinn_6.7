<style>
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
	.res_table td:nth-of-type(1):before { content: "S. No"; }
	.res_table td:nth-of-type(2):before { content: "List Name" ; }
	.res_table td:nth-of-type(3):before { content: "Traveller Name (ID)"; }
	.res_table td:nth-of-type(4):before { content: "Total Prices"; }
	.res_table td:nth-of-type(5):before { content: "Status"; }
	.res_table td:nth-of-type(6):before { content: "Booked Date & Time"; }
	.res_table td:nth-of-type(7):before { content: "Options"; }
}
</style>


<div id="Reservation_List">

	<div class="container-fluid top-sp body-color">
	<div class="">
	<div class="col-xs-10 col-md-10 col-sm-10">
	 <h1 class="page-header1"><?php echo translate_admin('Paid Payments'); ?></h1>
	 <div class="but-set">
		<span3><input type="submit" onclick="window.location='<?php echo admin_url('payment/export_payed')?>'" value="<?php echo translate_admin('Export Excel File'); ?>"></span3>
		</div>
	 </div>
<?php echo form_open('administrator/payment/finance'); ?>

<?php  				
			//Show Flash Message
			if($msg = $this->session->flashdata('flash_message'))
			{
				echo $msg;
			}?>

	<?php	echo validation_errors();
		
				$tmpl = array (
                    'table_open'          => '<div class="col-xs-10 col-md-10 col-sm-10"><table class="table1 res_table" id="sort_list" cellpadding="2" cellspacing="0">
',

					'thead_open'		=>'<thead>',
					'thead_close'		=>'</thead>',
					
                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',
                    
					'tbody_open'		=>'<tbody>',
					'tbody_close'		=>'</tbody>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl); 
		
		$this->table->set_heading(translate_admin('S.No'), translate_admin('List Name'), translate_admin('Traveller Name(ID)'), translate_admin('Total Price'), translate_admin('Status'), translate_admin('Booked Date(yyyy-mm-dd) & Time'), translate_admin('Options'));
		
		if($result->num_rows() > 0)
		{
  		$i = 1;
		foreach ($result->result() as $row) 
		{
		$query          = $this->Users_model->get_user_by_id($row->userby);
		$booker_name    = $query->row()->username;
		
			$query1        = $this->Users_model->get_user_by_id($row->userto);
	 	
	 		//$hotelier_name = $query1->row()->username;
  	        //print_r($hotelier_name);
  	        //$hotelier_id   = $query1->row()->id;
			
			
			$check_list_id = $this->db->where('id',$row->list_id)->get('list');
			if($check_list_id->num_rows()!=0)
			{
			$this->table->add_row(
				form_checkbox('check[]', $row->id).' '.
				$i,
				get_list_by_id($row->list_id)->title,
				$row->username.'('.$row->userby.')', 
				$row->currency .' '.$row->price,
				$row->name,
				unix_to_human($row->book_date),
				anchor(admin_url('payment/details/'.$row->id), translate_admin('View Details'))
				);
				$i++;
			}
		}
		}
		else
		{
		$this->table->add_row(
		'',
		translate_admin('There is no reservation yet !'),
		''
		);
		
		}
		
		
		echo $this->table->generate(); 
		
		echo form_close();
		
		//echo $pagination;
			
	?>
	</div>
</div></div>