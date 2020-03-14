<?php include 'header.php';  ?>

<?php
 


      foreach ($mobile_today as $key => $val) {
         @$a_arr[] =  $val->mobile;

         
      }

  @$a_arr;

$no_obj = json_encode(@$a_arr);
 
?>


<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Send Message to Customer</h6>
            </div>
            <div class="card-body">
             
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> Today</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Three Day before</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Seven day before</a>
  </li>
</ul>


<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <br>


       <form action="#"  class="user" method="POST">
                  
 

                 <div class="form-group row">
                  <div class="col-sm-8">
                    <label class="label label-default">Message</label>
                     <?php echo form_textarea(['name'=>'message', 'class'=>'form-control form-control-user msg-text-area' , 'placeholder'=>'', 'value'=>set_value('message', 'Dear Customer, Your Oil Refill is due. Please visit and refill today. Thanks!')]); ?>
                    </div>

                    <div class="col-sm-4">
                        <ul class="list-group text-center">
                          <li class="list-group-item active">Customer's Mobile No. List</li>
                       <?php 
                            if($mobile_today){

                            foreach ($mobile_today as $mobile) { ?>
                       
                          <li class="list-group-item"> <?php echo $mobile->mobile?></li>
                <?php }} else{echo '<li class="list-group-item"> No Reminder Date For today </li> ';} ?>
              </ul>
                          
                        </ul>
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


  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
<br>
  <form action="#"  class="user" method="POST">
               <div class="form-group row">
                  <div class="col-sm-8">
                    <label class="label label-default">Message</label>
                     <?php echo form_textarea(['name'=>'message', 'class'=>'form-control form-control-user msg-text-area' , 'placeholder'=>'', 'value'=>set_value('message', 'Dear Customer, Your Oil Refill is due. Please visit and refill today. Thanks!')]); ?>
                    </div>

                    <div class="col-sm-4">
                        <ul class="list-group text-center">
                          <li class="list-group-item active">Customer's Mobile No. List</li>
                       <?php 
                            if($mobile_three){

                            foreach ($mobile_three as $mobile) { ?>
                       
                          <li class="list-group-item"> <?php echo $mobile->mobile?></li>
                <?php }} else{echo '<li class="list-group-item"> No Reminder Date For today </li> ';} ?>
              </ul>
                          
                        </ul>
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
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>


       <form action="#"  class="user" method="POST">
                  
 

                 <div class="form-group row">
                  <div class="col-sm-8">
                    <label class="label label-default">Message</label>
                     <?php echo form_textarea(['name'=>'message', 'class'=>'form-control form-control-user msg-text-area' , 'placeholder'=>'', 'value'=>set_value('message', 'Dear Customer, Your Oil Refill is due. Please visit and refill today. Thanks!')]); ?>
                    </div>

                    <div class="col-sm-4">
                        <ul class="list-group text-center">
                          <li class="list-group-item active">Customer's Mobile No. List</li>
                       <?php 
                            if($mobile_seven){

                            foreach ($mobile_seven as $mobile) { ?>
                       
                          <li class="list-group-item"> <?php echo $mobile->mobile?></li>
                <?php }} else{echo '<li class="list-group-item"> No Reminder Date For today </li> ';} ?>
              </ul>
                          
                        </ul>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4">
                     <label class="label label-default"></label>
                    <?php echo  form_submit(['name'=>'submit', 'value'=>'Send', 'class'=>'btn btn-primary btn-user msg-text-area btn-block']); ?>
                    <!-- <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="submit"> -->
                  </div>
                </div>

                </form></div>
</div>
            
              </div>
            </div>
          </div>


<?php

@$msg = $_POST['message'];
$msg1 = json_encode($msg);


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
        CURLOPT_POSTFIELDS => "{ \"sender\": \"SOCKET\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": ".$msg1.", \"to\": ".$no_obj." } ] }",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => array(
          "authkey: 323134AzdHLwxwWVZ5e6c5429P1",
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