<?php include 'header.php'; ?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Send Reminder SMSs</h6>
    </div>
    <div class="card-body">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Today</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">3 Days</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">7 Days</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <br>
          <form action="#"  class="user" method="POST">
           <div class="form-group row">
            <div class="col-sm-8">
              <!-- <label class="label label-default">Message</label> -->
              <?php 
                $todays_sms = 'Dear Customer, Your Oil Refill is due by today. Please visit and refill at your latest. Thanks!';
                echo form_textarea(['name'=>'message', 'cols' => '50', 'rows' => '4', 'class'=>'form-control' , 'placeholder'=>'', 'value'=>set_value('message', $todays_sms)]); ?>
            </div>

            <div class="col-sm-4">
              <ul class="list-group text-center" style="height: 190px; overflow:auto">
                <li class="list-group-item active">Customer's List</li>
                <?php 
                  if(count($mobile_today) > 0) {
                    foreach ($mobile_today as $mobile) { ?>
                      <input type="hidden" name="mobile[]" value="<?php echo $mobile->mobile?>" >
                      <li class="list-group-item"> <?php echo $mobile->mobile?></li>
                    <?php }
                  } else { 
                    echo '<li class="list-group-item">No customers found</li> ';
                  } 
                ?>
                </ul>

              </ul>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
             <label class="label label-default"></label>
             <form action="" method="post">

              <input type="hidden" name="action" value="today" />
              <?php if(count($mobile_today) > 0) { ?>
                <button type="submit" name="task" value="sendMsg" class="btn btn-primary btn-block">Send Messages</button>
              <?php } ?>
              <!-- <?php echo  form_submit(['name'=>'task', 'value'=>'sendMsg', 'class'=>'btn btn-primary btn-block']); ?> -->
             </form>
             <!-- <input type="submit" class="btn btn-primary btn-block" name="submit" value="submit"> -->
           </div>
         </div>

       </form>

     </div>


     <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

      <br>
      <form action="#"  class="user" method="POST">
       <div class="form-group row">
        <div class="col-sm-8">
          <!-- <label class="label label-default">Message</label> -->
          <?php 
            $three_days_sms = 'Dear Customer, Your Oil Refill is due in 3 days. Please visit and refill at your latest. Thanks!';
            echo form_textarea(['name'=>'message', 'cols' => '50', 'rows' => '4', 'class'=>'form-control' , 'placeholder'=>'', 'value'=>set_value('message', $three_days_sms)]); ?>
        </div>

        <div class="col-sm-4">
          <ul class="list-group text-center" style="height: 190px; overflow:auto">
            <li class="list-group-item active">Customer's List</li>
            <?php 
              if(count($mobile_three) > 0) {

              foreach ($mobile_three as $mobile) { ?>
                <input type="hidden" name="mobile[]" value="<?php echo $mobile->mobile?>" >
                <li class="list-group-item"> <?php echo $mobile->mobile?></li>
              <?php }} else{echo '<li class="list-group-item"> No customers found </li> ';} ?>
            </ul>

          </ul>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-4">
         <label class="label label-default"></label>

         <form action="" method="post">

          <input type="hidden" name="action" value="three_day" />
          <?php if(count($mobile_three) > 0) { ?>
            <button type="submit" name="task" value="sendMsg" class="btn btn-primary btn-block">Send Messages</button>
          <?php } ?>
          <!-- <?php echo  form_submit(['name'=>'task', 'value'=>'sendMsg', 'class'=>'btn btn-primary btn-block']); ?> -->
        </form>

         <!-- <?php echo  form_submit(['name'=>'task', 'value'=>'sendMsg', 'class'=>'btn btn-primary btn-block']); ?> -->
         <!-- <input type="submit" class="btn btn-primary btn-block" name="submit" value="submit"> -->
       </div>
     </div>

   </form>

 </div>
 <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>


   <form action="#"  class="user" method="POST">



     <div class="form-group row">
      <div class="col-sm-8">
        <!-- <label class="label label-default">Message</label> -->
        <?php 
          $seven_days_sms = 'Dear Customer, Your Oil Refill is due in 7 days. Please visit and refill at your latest. Thanks!';
          echo form_textarea(['name'=>'message', 'cols' => '50', 'rows' => '4', 'class'=>'form-control' , 'placeholder'=>'', 'value'=>set_value('message', $seven_days_sms)]); ?>
      </div>

      <div class="col-sm-4">
        <ul class="list-group text-center" style="height: 190px; overflow:auto">
          <li class="list-group-item active">Customer's List</li>
          <?php 
          if(count($mobile_seven) > 0) {

            foreach ($mobile_seven as $mobile) { ?>
              
              <input type="hidden" name="mobile[]" value="<?php echo $mobile->mobile?>" >
              <li class="list-group-item"> <?php echo $mobile->mobile?></li>
            <?php }           
          } else{ echo '<li class="list-group-item"> No customers found </li> ';} ?>
          </ul>

        </ul>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4">
       <label class="label label-default"></label>

       <form action="" method="post">

          <input type="hidden" name="action" value="mobile_seven" />
          <?php if(count($mobile_seven) > 0) { ?>
            <button type="submit" name="task" value="sendMsg" class="btn btn-primary btn-block">Send Messages</button>
          <?php } ?>
          <!-- <?php echo  form_submit(['name'=>'task', 'value'=>'sendMsg', 'class'=>'btn btn-primary btn-block']); ?> -->
        </form>


       <!-- <?php echo form_submit(['name'=>'task', 'value'=>'sendMsg', 'class'=>'btn btn-primary btn-block']); ?> -->
       <!-- <input type="submit" class="btn btn-primary btn-block" name="submit" value="submit"> -->
     </div>
   </div>

 </form></div>
</div>

</div>
</div>
</div>

<?php include 'footer.php';  ?>

