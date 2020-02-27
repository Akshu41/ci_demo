<?php include 'header.php';  ?>

<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">


              <h6 class="m-0 font-weight-bold text-primary">Send Message to Customer</h6>
            </div>
            <div class="card-body">
              <form action="#"  class="user" method="POST">
                	
 
                <div class="form-group row">
                  <div class="col-sm-8">
                     <label class="label label-default">Mobile</label>
                    <?php echo  form_input(['name'=>'mobile', 'class'=>'form-control form-control-user' ,'readonly' => 'readonly' ,'placeholder'=>'', 'value'=>set_value('mobile', $single_sms->mobile)]); ?>
                  </div>
                </div>

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


  <?php

@$msg = $_POST['single_msg'];
$msg1 = json_encode($msg);
 echo $msg1;
@$mobile = $single_sms->mobile;
  $mobile_no = json_encode($mobile);
 echo $mobile_no;


 if(isset($_POST['submit'])){
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{ \"sender\": \"SOCKET\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": ".$msg1.", \"to\": [".$mobile."] } ] }",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => array(
          "authkey: 317629AFIKHndv85e415d4bP1",
          "content-type: application/json"
        ),
      ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

            


      if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            echo $response;
          }

  }
      

  ?>

<?php include 'footer.php';  ?>