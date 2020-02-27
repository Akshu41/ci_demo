<?php include 'header.php';  ?>
<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">
  

              <h6 class="m-0 font-weight-bold text-primary">Edit Customer</h6>
            </div>
            <div class="card-body">
            <?php   $id=$edit_customer->c_user_id;
             echo  form_open("admin/update_customer/{$id}",['class'=>'user']); 
                   
             ?>
                	

                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <label class="label label-default">Name</label>
                   <?php echo  form_input(['name'=>'c_name', 'class'=>'form-control form-control-user' , 'placeholder'=>'', 'value'=>set_value('c_name', $edit_customer->c_name)]); ?>
                  </div>
                  <div class="col-sm-4">
                     <label class="label label-default">Mobile</label>
                    <?php echo  form_input(['name'=>'mobile', 'class'=>'form-control form-control-user' , 'placeholder'=>'', 'value'=>set_value('mobile', $edit_customer->mobile)]); ?>
                  </div>
                  <div class="col-sm-4">
                    <label class="label label-default">Date of birth</label>
                     <?php $data_date = array('type' => 'date','name' => 'c_dob','class' => 'form-control form-control-user','placeholder' => '' , 'value'=>set_value('c_dob', $edit_customer->c_dob));
                      echo form_input($data_date); ?>
                  </div>
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                     <label class="label label-default">Vehicle no.</label>
                     <?php echo  form_input(['name'=>'c_vehicle_no', 'class'=>'form-control form-control-user' , 'placeholder'=>'', 'value'=>set_value('c_vehicle_no', $edit_customer->c_vehicle_no)]); ?>
                  </div>
                  <div class="col-sm-4">
                    <label class="label label-default">Email</label>
                    <?php $data_email = array('type' => 'email','name' => 'c_email','class' => 'form-control form-control-user','placeholder' => '', 'value'=>set_value('c_email', $edit_customer->c_email));
                      echo form_input($data_email); ?>
                  </div>
                  <div class="col-sm-4">
                    <label class="label label-default">Regitration Date</label>
                    <?php $data_reg_date = array('type' => 'date','name' => 'c_reg_date','class' => 'form-control form-control-user','placeholder' => '', 'value'=>set_value('c_reg_date', $edit_customer->c_reg_date));
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
echo form_dropdown('c_vehicle_type', $vehicle_options, $edit_customer->c_vehicle_type ,'class="form-control" ' ); ?>

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
                    echo form_dropdown('c_product_type', $product_options, $edit_customer->c_product_type ,'class="form-control" '); ?>

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
                    echo form_dropdown('c_religion', $product_options, $edit_customer->c_religion ,'class="form-control" '); ?>
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
                    <?php $data_date_last = array('type' => 'date','name' => 'c_last_fill_date','class' => 'form-control form-control-user','placeholder' => 'Last Filled Date', 'value'=>set_value('c_last_fill_date', $edit_customer->c_last_fill_date));
                      echo form_input($data_date_last); 

                       
                         ?>
                    
                    <!-- <input type="text" class="form-control form-control-user" name="c_last_fill_date" placeholder="Last Filled Date"> -->
                  </div>
                  <div class="col-sm-4">

                     <?php 
                    $last_date= $edit_customer->c_last_fill_date;
                    $Date = date("Y-m-d");
                    $rem_date =  date('Y-m-d', strtotime($Date. ' + 90 days')); ?>
                     <label class="label label-default">Reminder Date</label>
                     <?php $data_date_rem = array('type' => 'date','name' => 'c_rem_date','class' => 'form-control form-control-user','placeholder' => 'Reminder Date', 'value'=>set_value('c_rem_date', $rem_date));
                      echo form_input($data_date_rem); ?>

                    <!-- <input type="text" class="form-control form-control-user" name="c_rem_date" placeholder="Reminder"> -->
                  </div>
                  <div class="col-sm-4">
                     
                      <label class="label label-default"> </label>
                    <?php $reset = array(
                                'name' => 'Reset',
                                'class' => 'btn-primary btn-user btn-block',
                                'value' => 'true',
                                'type' => 'reset',
                                'content' => 'Reset'
                            );

                              echo form_button($reset); ?>

                    <!-- <input type="text" class="form-control form-control-user" name="c_rem_date" placeholder="Reminder"> -->
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-8">
                      <label class="label label-default">Remarkes </label>
                     <?php  echo  form_input(['name'=>'c_remarkes', 'class'=>'form-control form-control-user' , 'placeholder'=>'', 'value'=>set_value('c_remarkes', $edit_customer->c_remarkes)]); ?>
                     


                    <!-- <input type="text" class="form-control form-control-user" name="c_remarkes" placeholder="Remarkes"> -->

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