<?php include 'header.php';  ?>
<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">  
              <h6 class="m-0 font-weight-bold text-primary">Edit Customer</h6>
            </div>
            <div class="card-body">
            <?= form_open("admin/update_customer/{$edit_customer->c_user_id}",['class'=>'user']); ?>

            <div class="form-group row">
              
              <div class="col-sm-3">
                <label class="label label-default">Mobile<span style="color:red">*</span></label>
                <?php echo  form_input(['name'=>'mobile', 'class'=>'form-control' , 'readonly' => 'readonly', 'placeholder'=>'', 'value'=>set_value('mobile', $edit_customer->mobile)]); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <label class="label label-default">Name</label>
                <?php echo  form_input(['name'=>'c_name', 'class'=>'form-control' , 'placeholder'=>'', 'value'=>set_value('c_name', $edit_customer->c_name)]); ?>
              </div>
              <div class="col-sm-3">
                <label class="label label-default">Email</label>
                <?php $data_email = array('type' => 'email','name' => 'c_email','class' => 'form-control','placeholder' => '', 'value'=>set_value('c_email', $edit_customer->c_email));
                  echo form_input($data_email); ?>
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
                  echo form_dropdown('c_religion', $product_options, $edit_customer->c_religion ,'class="form-control" '); 
                ?>                    
              </div>
              <div class="col-sm-3">
                <label class="label label-default">Date of birth</label>
                  <?php $data_date = array('type' => 'date','name' => 'c_dob','class' => 'form-control','placeholder' => '' , 'value'=>set_value('c_dob', $edit_customer->c_dob));
                  echo form_input($data_date); ?>
              </div>
            </div>
				
				<div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                     <label class="label label-default">Vehicle no.</label>
                     <?php echo  form_input(['name'=>'c_vehicle_no', 'class'=>'form-control' , 'placeholder'=>'', 'value'=>set_value('c_vehicle_no', $edit_customer->c_vehicle_no)]); ?>
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
                      echo form_dropdown('c_vehicle_type', $vehicle_options, $edit_customer->c_vehicle_type ,'class="form-control" ');
                      ?>                  
                  </div>                 
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <label class="label label-default">Product Type</label>
                      <?php $product_options = array(
                          ''         => '---Select',
                          'Petrol'   => 'Petrol',
                          'Diesel'   => 'Diesel',
                          'Oil'      => 'Oil',
                          'Other'    => 'Other',
                      );
                      echo form_dropdown('c_product_type', $product_options, $edit_customer->c_product_type ,'class="form-control" '); ?>                  
                  </div>    
                  
                </div>                
                <div class="form-group row">                 
                  <div class="col-sm-3">
                     <label class="label label-default"></label>
                    <?php echo  form_submit(['name'=>'submit', 'value'=>'Edit Customer', 'class'=>'btn btn-primary btn-block']); ?>
                    <!-- <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="submit"> -->
                  </div>
                </div>

                </form>
              </div>
            </div>
          </div>
<?php include 'footer.php';  ?>