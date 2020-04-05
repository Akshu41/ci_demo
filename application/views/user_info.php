<?php include 'header.php'; ?>
<style>
	.inner-class {
		margin-bottom: 3%;
	}

	.aks-card {
		min-height: 250px;
		max-height: 500px;
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
					<h6><b>Name: </b> <?php echo $user_info->c_name; ?></h6>
				</div>
					
				<div class="col-md-3 inner-class ">
					<h6><b>Mobile: </b> <?php echo $user_info->mobile; ?></h6>
				</div>

				<!-- <div class="col-md-3 inner-class ">
					<h6>Date of Birth:- <?php echo $user_info->c_dob; ?></h6>
				</div> -->

				<!-- <div class="col-md-3 inner-class ">
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
				</div>  -->

				<div class="col-md-3 inner-class ">
					<h6><b>Email: </b> <?php echo $user_info->c_email; ?></h6>
				</div>

				<div class="col-md-3 inner-class ">
					<h6><b>Vehicle no: </b> <?php echo $user_info->c_vehicle_no; ?></h6>
				</div>

				<div class="col-md-3 inner-class ">
					<h6><b>Product Type: </b> <?php echo $user_info->c_product_type; ?></h6>
				</div>

				<!-- <div class="col-md-3 inner-class ">
					<h6>Latest visit remark:- <?php echo $user_info->c_remarkes; ?></h6>
				</div> -->

				<div class="col-md-3 inner-class ">
					<h6><b>Reminder Date: </b> <?= date('d M Y', strtotime($user_info->c_rem_date)) ?></h6>
				</div>


				<div class="col-md-3 inner-class ">
					<h6><b>Last filled Date: </b> <?= date('d M Y', strtotime($user_info->c_last_fill_date)) ?></h6>
				</div>

				<!-- <div class="col-md-3 inner-class ">
					<h6>Registration Date :- <?php echo $user_info->c_reg_date; ?></h6>
				</div> -->

				<!-- <div class="col-md-3 inner-class ">
					<h6><b>Visits: </b> <?php echo $user_info->c_visit; ?></h6>
				</div> -->
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							Personal sms history (<b><?= count($user_sms) ?></b>)
						</div>
						<div class="card-body aks-card">
						<?php foreach ($user_sms as $key1) {  ?>								
							<p><b><?= date('d M Y', strtotime($key1->c_reg_date)) ?> : </b><?= $key1->message ?></p><hr/>							
						<?php  } ?>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							Visit history (<b><?= count($user_remark) ?></b>)
						</div>
						<div class="card-body aks-card">
						<?php  foreach ($user_remark as $key1) {  ?>							
							<p><b><?= date('d M Y', strtotime($key1->remark_date))  ?> : </b><?= $key1->remark ?></p><hr/>								
						<?php  } ?>								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';  ?>