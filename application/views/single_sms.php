<?php include 'header.php';  ?>

<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">


              <h6 class="m-0 font-weight-bold text-primary">Send One2One SMS</h6>
            </div>
            <div class="card-body">

              <?php 
                $id=$single_sms->c_user_id;
                $c_rem_date =$single_sms->c_rem_date;
                $c_reg_date = date('Y-m-d');
                echo form_open("admin/Send_single/{$id}",['class'=>'user']); 
              ?>                
              <input type="hidden" name="c_rem_date" value="<?php echo $c_rem_date ?>">
              <input type="hidden" name="cust_id" value="<?php echo $id ?>">
              <input type="hidden" name="c_reg_date" value="<?php echo $c_reg_date ?>">
 
                <div class="form-group row">
                  <div class="col-sm-3">
                     <label class="label label-default">Mobile</label>
                    <?php echo  form_input(['name'=>'mobile', 'class'=>'form-control' ,'readonly' => 'readonly' ,'placeholder'=>'', 'value'=>set_value('mobile', $single_sms->mobile)]); ?>
                  </div>     
                </div>     
                <div class="form-group row">           
                  <div class="col-sm-8">
                    <label class="label label-default">Message</label>
                     <?php echo form_textarea(['name'=>'single_msg', 'rows' => '4', 'cols' => '50', 'class'=>'form-control' , 'placeholder'=>'', 'value'=>set_value('single_msg')]); ?>
                    </div>
                </div>
				        <div class="form-group row">
                  <div class="col-sm-4">
                     <label class="label label-default"></label>
                    <?php echo  form_submit(['name'=>'submit', 'value'=>'Send', 'class'=>'btn btn-primary btn-block']); ?>
                    <!-- <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="submit"> -->
                  </div>
                </div>

                </form>
              </div>
            </div>
          </div>


  

<?php include 'footer.php';  ?>