<?php include 'header.php';  

?>

<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">


              <h6 class="m-0 font-weight-bold text-primary">Add Customer</h6>
            </div>
            <div class="card-body">
             <?php echo  form_open('admin/add_customer',['class'=>'user']); ?>
                	
                 
             <input type="hidden" name="c_visit" value="1">

                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <label class="label label-default">Name</label>
                   <?php echo  form_input(['name'=>'c_name', 'class'=>'form-control form-control-user' , 'placeholder'=>'', 'value'=>set_value('c_name')]); ?>
                  </div>
                  <div class="col-sm-4">
                     <label class="label label-default">Mobile*</label>
                    <?php echo  form_input(['name'=>'mobile', 'class'=>'form-control form-control-user' , 'placeholder'=>'', 'value'=>set_value('mobile')]); ?>
                    <div class="error"> <?php echo form_error('mobile');  ?></div>
                  </div>
                  <div class="col-sm-4">
                    <label class="label label-default">Date of birth</label>
                     <?php $data_date = array('type' => 'date','name' => 'c_dob','class' => 'form-control form-control-user','placeholder' => '' , 'value'=>set_value('c_dob'));
                      echo form_input($data_date); ?>
                  </div>
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                     <label class="label label-default">Vehicle no.</label>
                     <?php echo  form_input(['name'=>'c_vehicle_no', 'class'=>'form-control form-control-user' , 'placeholder'=>'', 'value'=>set_value('c_vehicle_no')]); ?>
                  </div>
                  <div class="col-sm-4">
                    <label class="label label-default">Email*</label>
                    <?php $data_email = array('type' => 'email','name' => 'c_email','class' => 'form-control form-control-user','placeholder' => '', 'value'=>set_value('c_email'));
                      echo form_input($data_email); ?>
                       <div class="error"> <?php echo form_error('c_email');  ?></div>
                  </div>
                  <div class="col-sm-4">
                    <label class="label label-default">Registration Date</label>
                    <?php $data_reg_date = array('type' => 'date','name' => 'c_reg_date','class' => 'form-control form-control-user','placeholder' => '','value'=>set_value( '' , date("Y-m-d")));
                      echo form_input($data_reg_date); ?>

                    <!-- <input type="text" class="form-control form-control-user" name="c_reg_date" placeholder="Vehicle no."> -->
                  </div>
                </div>


				        <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
<?php $vehicle_options = array(
        'Vehicle Type'         => 'Vehicle Type',
        'Scooter'           => 'Scooter',
        'Bike'         => 'Bike',
        'Truck'        => 'Truck',
       'Bus'        => 'Bus',
       'Car'        => 'Car',
       'MUV'        => 'MUV',
       'Other'        => 'Other',
);
echo form_dropdown('c_vehicle_type', $vehicle_options, 'Vehicle Type' ,'class="form-control" '); ?>

                  <!--  <select class="form-control " name="c_vehicle_type" > 
                     <option>Vehicle Type</option>
                    <option>Scooter</option>
                    <option>Bike</option>
                    <option>Truck</option>
                    <option>Bus</option>
                   	<option>Car</option>
                   	<option>MUV</option>
                    <option>Other</option>
                   </select> -->
                  </div>

                 

                  <div class="col-sm-4 mb-3 mb-sm-0">
                     <?php $product_options = array(
                    'Product Type'         => 'Product Type',
                    'Petrol'           => 'Petrol',
                    'Diesel'         => 'Diesel',
                    'Oil'        => 'Oil',
                    'Other'        => 'Other',

                    );
                    echo form_dropdown('c_product_type', $product_options, 'Product Type' ,'class="form-control" '); ?>

                   <!-- <select class="form-control " name="c_product_type" >
                    <option>Product Type</option>
                   	<option>Petrol</option>
                   	<option>Diesel</option>
                    <option>Oil</option>
                   </select> -->
                  </div>
                  <div class="col-sm-4">
                     <?php $product_options = array(
                    'Religion Type'         => 'Religion Type',
                    'Hindu'           => 'Hindu',
                    'Muslim'         => 'Muslim',
                    'Bohra'        => 'Bohra',
                    'Other'        => 'Other',
                    );
                    echo form_dropdown('c_religion', $product_options, 'Religion Type' ,'class="form-control" '); ?>
                    <!-- <select class="form-control " name="c_religion" > 
                    <option>Religion Type</option>
                    <option>Hindu</option>
                    <option>Muslim</option>
                    <option>Bohra</option>
                    <option>Other</option>
                   </select> -->
                  </div>
                </div>                
                

                 <div class="form-group row">
                  <div class="col-sm-4">
                    <label class="label label-default">Last Filled Date</label>
                    <?php $data_date_last = array('type' => 'date','name' => 'c_last_fill_date','class' => 'form-control form-control-user','placeholder' => 'Last Filled Date','value'=>set_value( '' , date("Y-m-d")));
                      echo form_input($data_date_last); ?>

                    <!-- <input type="text" class="form-control form-control-user" name="c_last_fill_date" placeholder="Last Filled Date"> -->
                  </div>
                  <div class="col-sm-4">
                    <?php 
                    $Date = date("Y-m-d");
                    $rem_date =  date('Y-m-d', strtotime($Date. ' + 90 days')); ?>

                     <label class="label label-default">Reminder Date</label>
                     <?php $data_date_rem = array('type' => 'date','name' => 'c_rem_date','class' => 'form-control form-control-user','placeholder' => 'Reminder Date','value'=>set_value('' , $rem_date));
                      echo form_input($data_date_rem); ?>

                    <!-- <input type="text" class="form-control form-control-user" name="c_rem_date" placeholder="Reminder"> -->
                  </div>
                  <div class="col-sm-4">

                    <a class= " btn btn-primary btn-user btn-block"  href="<?php echo base_url("/admin/dashboard")?>"> Cancel</a>


                    <!-- <input type="text" class="form-control form-control-user" name="c_rem_date" placeholder="Reminder"> -->
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-8">
                      <label class="label label-default">Remarks </label>
                     <?php  echo  form_input(['name'=>'c_remarkes', 'class'=>'form-control form-control-user' , 'placeholder'=>'', 'value'=>set_value('c_remarkes')]); ?>
                     


                    <!-- <input type="text" class="form-control form-control-user" name="c_remarkes" placeholder="Remarkes"> -->
                  <input type="hidden" name="message" value="Thank you for register with us">
                  </div>
                  <div class="col-sm-4">
                     <label class="label label-default"></label>
                    <?php echo  form_submit(['name'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-primary btn-user btn-block']); ?>
                    <!-- <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="submit"> -->
                  </div>
                </div>

                </form>
              </div>
            </div>
          </div>
<?php include 'footer.php';  ?>