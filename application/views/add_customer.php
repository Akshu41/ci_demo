<?php include 'header.php';  ?>
<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">

	<h6 class="m-0 font-weight-bold text-primary">Add Customer</h6>
            </div>
            <div class="card-body">
             <?php echo  form_open('admin/add_customer',['class'=>'user']); ?>                	                 
             
              <div class="form-group row">                  
                  <div class="col-sm-3">
                     <label class="label label-default">Mobile<span style="color:red">*</span></label>
                    <?php echo  form_input(['name'=>'mobile', 'class'=>'form-control' , 'placeholder'=>'', 'value'=>set_value('mobile')]); ?>
                    <input type="hidden" name="c_visit" value="1">
                    <div class="error"> <?php echo form_error('mobile');  ?></div>
                  </div>
              </div>
                <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <label class="label label-default">Name</label>
                   <?php echo  form_input(['name'=>'c_name', 'class'=>'form-control' , 'placeholder'=>'', 'value'=>set_value('', 'Guest')]); ?>
                  </div>                  
                  <div class="col-sm-3">
                    <label class="label label-default">Email</label>
                    <?php $data_email = array('type' => 'email','name' => 'c_email','class' => 'form-control','placeholder' => '', 'value'=>set_value('c_email'));
                      echo form_input($data_email); ?>
                       <div class="error"> <?php echo form_error('c_email');  ?></div>
                  </div>                  
                  <div class="col-sm-3">
                  <label class="label label-default">Religion (For promo SMS)</label>
                    <?php 
                      $product_options = array (
                          ''    => '---Select---',
                          '1'   => 'Hindu',
                          '2'   => 'Muslim',
                          '3'   => 'Bohra',
                          '4'   => 'Punjabi',
                          '5'   => 'Christian',
                          '6'   => 'Other',
                      );
                      echo form_dropdown('c_religion', $product_options, 'Religion Type' ,'class="form-control" '); 
                    ?>                    
                  </div>
                  <div class="col-sm-3">
                    <label class="label label-default">Date of birth</label>
                     <?php $data_date = array('type' => 'date','name' => 'c_dob','class' => 'form-control','placeholder' => '' , 'value'=>set_value('c_dob'));
                      echo form_input($data_date); ?>
                  </div>
                </div>				
				        <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                     <label class="label label-default">Vehicle no.</label>
                     <?php echo  form_input(['name'=>'c_vehicle_no', 'class'=>'form-control' , 'placeholder'=>'', 'value'=>set_value('c_vehicle_no')]); ?>
                  </div>
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <label class="label label-default">Vehicle Type</label>
                      <?php 
                        $vehicle_options = array(
                          ''         => '---Select---',
                          'scooter'  => 'Scooter',
                          'bike'     => 'Bike',
                          'truck'    => 'Truck',
                          'bus'      => 'Bus',
                          'car'      => 'Car',
                          'muv'      => 'MUV',
                          'others'    => 'Others',
                      );
                      echo form_dropdown('c_vehicle_type', $vehicle_options, 'Vehicle Type' ,'class="form-control" ');
                      ?>                  
                  </div>
                  <!-- <div class="col-sm-3">
                    <label class="label label-default">Registration Date</label>
                    <?php $data_reg_date = array('type' => 'date','name' => 'c_reg_date','class' => 'form-control','placeholder' => '','value'=>set_value( '' , date("Y-m-d")));
                      echo form_input($data_reg_date); ?>                   
                  </div>                           -->
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <label class="label label-default">Product Type</label>
                      <?php $product_options = array(
                          ''         => '---Select',
                          'Petrol'   => 'Petrol',
                          'Diesel'   => 'Diesel',
                          'Oil'      => 'Oil',
                          'Other'    => 'Other',
                      );
                      echo form_dropdown('c_product_type', $product_options, 'Product Type' ,'class="form-control" '); ?>                  
                  </div>                 
                </div>                
                
                 <div class="form-group row">
                  <!-- <div class="col-sm-4">
                    <label class="label label-default">Last Filled Date</label>
                    <?php $data_date_last = array('type' => 'date','name' => 'c_last_fill_date','class' => 'form-control','placeholder' => 'Last Filled Date','value'=>set_value( '' , date("Y-m-d")));
                      echo form_input($data_date_last); ?>
                  </div>
                  <div class="col-sm-4">
                    <?php 
                    $Date = date("Y-m-d");
                    $rem_date =  date('Y-m-d', strtotime($Date. ' + 90 days')); ?>

                     <label class="label label-default">Reminder Date</label>
                     <?php $data_date_rem = array('type' => 'date','name' => 'c_rem_date','class' => 'form-control','placeholder' => 'Reminder Date','value'=>set_value('' , $rem_date));
                      echo form_input($data_date_rem); ?>
                  </div> -->
                  <div class="col-sm-4">

                    <!-- <a class= " btn btn-primary btn-block"  href="<?php echo base_url("/admin/dashboard")?>"> Cancel</a> -->


                    <!-- <input type="text" class="form-control" name="c_rem_date" placeholder="Reminder"> -->
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12">
                    <label class="label label-default">Remarks </label>
                     <?php  echo  form_input(['name'=>'c_remarkes', 'class'=>'form-control' , 'placeholder'=>'', 'value'=> set_value('', 'New Customer Registration 1st time filling')]); ?>                  
                    <!-- <input type="text" class="form-control" name="c_remarkes" placeholder="Remarkes"> -->
                  <!-- <input type="hidden" name="message" value="Thank you for registering with us"> -->
                  </div>
                  <div class="col-sm-3">
                     <label class="label label-default"></label>
                    <?php echo  form_submit(['name'=>'submit', 'value'=>'Save', 'class'=>'btn btn-primary btn-block']); ?>
                    <!-- <input type="submit" class="btn btn-primary btn-block" name="submit" value="submit"> -->
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
<?php include 'footer.php';  ?>