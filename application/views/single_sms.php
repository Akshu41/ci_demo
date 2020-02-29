<?php include 'header.php';  ?>

<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">


              <h6 class="m-0 font-weight-bold text-primary">Send Message to Customer</h6>
            </div>
            <div class="card-body">

              <?php $id=$single_sms->c_user_id;
                    $c_rem_date =$single_sms->c_rem_date;


              echo  form_open("admin/Send_single/{$id}",['class'=>'user']); ?>                
                	
 
                <div class="form-group row">
                  <div class="col-sm-8">
                     <label class="label label-default">Mobile</label>
                    <?php echo  form_input(['name'=>'mobile', 'class'=>'form-control form-control-user' ,'readonly' => 'readonly' ,'placeholder'=>'', 'value'=>set_value('mobile', $single_sms->mobile)]); ?>
                  </div>
                </div>

                <input type="hidden" name="c_rem_date" value="<?php echo $c_rem_date ?>">
                <input type="hidden" name="cust_id" value="<?php echo $id ?>">

                 <div class="form-group row">
                  <div class="col-sm-8">
                    <label class="label label-default">Message</label>
                     <?php echo form_textarea(['name'=>'single_msg', 'class'=>'form-control form-control-user msg-text-area' , 'placeholder'=>'', 'value'=>set_value('single_msg')]); ?>
                    </div>
                </div>
				        <div class="form-group row">
                  <div class="col-sm-4">
                     <label class="label label-default"></label>
                    <?php echo  form_submit(['name'=>'submit', 'value'=>'Send', 'class'=>'btn btn-primary btn-user msg-text-area btn-block']); ?>
                    <!-- <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="submit"> -->
                  </div>
                </div>

                </form>
              </div>
            </div>
          </div>


  

<?php include 'footer.php';  ?>