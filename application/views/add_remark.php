<?php include 'header.php'; 

 ?>


<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">


              <h6 class="m-0 font-weight-bold text-primary">Add Visit</h6>
            </div>
            <div class="card-body">
             <?php  $id=$add_remark->c_user_id;
                    $visit=$add_remark->c_visit;
                    $visit++;
                    
             echo  form_open("admin/update_remark/{$id}",['class'=>'user']); ?>
                	
                 <input type="hidden" name="c_visit" value="<?php echo $visit; ?>">
                 <input type="hidden" name="c_user_id" value="<?php echo $id; ?>">

                 <div class="form-group row">
                  <div class="col-sm-4">
                    <label class="label label-default">Last visit/filled on:</label>
                    <?php $data_date_last = array('type' => 'date','name' => 'c_last_fill_date','class' => 'form-control','readonly' => 'Last Filled Date','value'=>set_value( '' , $add_remark->c_last_fill_date));
                      echo form_input($data_date_last); ?>
                      <div class="error"> <?php echo form_error('c_last_fill_date');  ?></div>
                    <!-- <input type="text" class="form-control" name="c_last_fill_date" placeholder="Last Filled Date"> -->
                  </div>
                  <!-- <div class="col-sm-4">
                     <?php 
                    $last_date= $add_remark->c_last_fill_date;
                    $Date = date("Y-m-d");
                     $rem_date =  date('Y-m-d', strtotime($Date. ' + 90 days')); ?>
                     <label class="label label-default">Reminder Date</label>
                     <?php $data_date_rem = array('type' => 'date','name' => 'c_rem_date','class' => 'form-control','placeholder' => 'Reminder Date','value'=>set_value('c_rem_date' , $rem_date));
                      echo form_input($data_date_rem); ?>
                       <div class="error"> <?php echo form_error('c_rem_date');  ?></div>
                  </div> -->
                  <!-- <div class="col-sm-4">                     
                    <label class="label label-default"> </label>
                    <?php 
                      $reset = array(
                        'name' => 'Reset',
                        'class' => 'btn-primary btn-user btn-block',
                        'value' => 'true',
                        'type' => 'reset',
                        'content' => 'Reset'
                      );
                      echo form_button($reset);
                    ?>
                  </div> -->
                </div>

                <div class="form-group row">
                  <div class="col-sm-8">
                      <label class="label label-default">Remarks*</label>
                     <?php  echo  form_textarea(['name'=>'c_remarkes', 'cols' => '50', 'rows' => '4', 'class'=>'form-control' , 'placeholder'=>'', 'value'=>set_value('', 'Thank you for your visit with us. We wish to serve you more in future.')]); ?>
                     <div class="error"> <?php echo form_error('c_remarkes');  ?></div>                    
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4">
                     <label class="label label-default"></label>
                    <?php echo  form_submit(['name'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-primary btn-block']); ?>
                    <!-- <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="submit"> -->
                  </div>
                </div>

                </form>
              </div>
            </div>
          </div>


<?php include 'footer.php';  ?>