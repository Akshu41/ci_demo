<?php include 'header.php'; 

// echo '<pre>';
// print_r($user_sms);
// print_r($user_remark);
// print_r($user_info);

// foreach ($user_info as $key) {
//    echo $key->c_user_id;
// }

// foreach ($user_remark as $key1) {
//    echo $key1->c_user_id;
// }


// foreach ($user_sms as $key1) {
//    echo $key1->cust_id;
// }
  ?>
<style>
	.inner-class {
    margin-bottom: 3%;
}

.aks-card {
    height: 250px;
    overflow-y: scroll;
}
</style>

 <div class="container-fluid">
	  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User Profile</h6>
            </div>
            <div class="card-body">
				
				<div class="row">
					<div class="col-md-3 inner-class ">
						<h6>Name:- <?php echo $user_info->c_name; ?></h6>
					</div>
						
					<div class="col-md-3 inner-class ">
						<h6>Mobile:- <?php echo $user_info->mobile; ?></h6>
					</div>

					<div class="col-md-3 inner-class ">
						<h6>Date of Birth:- <?php echo $user_info->c_dob; ?></h6>
					</div>

					<div class="col-md-3 inner-class ">
						<h6>Religion:- <?php if ($user_info->c_religion == 1) {
						echo "Hindu";
						}elseif ($user_info->c_religion == 2) {
							echo "Muslim";
						} elseif ($user_info->c_religion == 3) {
							echo "Bohra";
						} elseif ($user_info->c_religion == 4) {
							echo "Panjabi";
						} elseif ($user_info->c_religion == 5) {
							echo "Christan";
						} elseif ($user_info->c_religion == 6) {
							echo "Other";
						}  ?></h6>
					</div>

					<div class="col-md-3 inner-class ">
						<h6>Email:- <?php echo $user_info->c_email; ?></h6>
					</div>

					<div class="col-md-3 inner-class ">
						<h6>Vehicle no:- <?php echo $user_info->c_vehicle_no; ?></h6>
					</div>

					<div class="col-md-3 inner-class ">
						<h6>Product Type:- <?php echo $user_info->c_product_type; ?></h6>
					</div>

					<div class="col-md-3 inner-class ">
						<h6>Latest visit remark:- <?php echo $user_info->c_remarkes; ?></h6>
					</div>

					<div class="col-md-3 inner-class ">
						<h6>Reminder Date:- <?php echo $user_info->c_rem_date; ?></h6>
					</div>


					<div class="col-md-3 inner-class ">
						<h6>Last filled Date:- <?php echo $user_info->c_last_fill_date; ?></h6>
					</div>

					<div class="col-md-3 inner-class ">
						<h6>Registration Date :- <?php echo $user_info->c_reg_date; ?></h6>
					</div>

					<div class="col-md-3 inner-class ">
						<h6>Total Visit :- <?php echo $user_info->c_visit; ?></h6>
					</div>

					<div class="col-md-6">
						<div class="card">
  <div class="card-header">
    All Message
  </div>
  <div class="card-body aks-card">
 <?php  foreach ($user_sms as $key1) {  ?>
    

    <label>Date:</label> <p> <?php echo $key1->c_reg_date;  ?></p>
    <label>Message:</label><p class="card-text"><?php echo $key1->message;  ?></p> 
    <hr>
   
   <?php  } ?>
  </div>
</div>
					</div>


					<div class="col-md-6">
						<div class="card">
  <div class="card-header">
    All Remarks
  </div>
  <div class="card-body aks-card">
     <?php  foreach ($user_remark as $key1) {  ?>
    

    <p class="card-text"><?php echo $key1->remark_date;  ?> : <?php echo $key1->remark;  ?></p>
    <p class="card-text"></p> 
    <hr>
   
   <?php  } ?>
    
  </div>
</div>
					</div>

					


					

				</div>

            </div>
        </div>
</div>





<?php include 'footer.php';  ?>