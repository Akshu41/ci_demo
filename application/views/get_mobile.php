<?php include 'header.php';  ?>


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
                    <input type="hidden" name="mobile[]" value="<?php echo $mobile->mobile?>" >
                    <li class="list-group-item"> <?php echo $mobile->mobile?></li>
                  <?php }} else{echo '<li class="list-group-item"> No Reminder Date For today </li> ';} ?>
                </ul>

              </ul>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
             <label class="label label-default"></label>
             <form action="" method="post">

              <input type="hidden" name="action" value="today" />
               
              <button type="submit" name="task" value="sendMsg" class="btn btn-primary btn-user msg-text-area btn-block">Send Message</button>
              <!-- <?php echo  form_submit(['name'=>'task', 'value'=>'sendMsg', 'class'=>'btn btn-primary btn-user msg-text-area btn-block']); ?> -->
             </form>
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
                <input type="hidden" name="mobile[]" value="<?php echo $mobile->mobile?>" >
                <li class="list-group-item"> <?php echo $mobile->mobile?></li>
              <?php }} else{echo '<li class="list-group-item"> No Reminder Date For today </li> ';} ?>
            </ul>

          </ul>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-4">
         <label class="label label-default"></label>

         <form action="" method="post">

          <input type="hidden" name="action" value="three_day" />

          <button type="submit" name="task" value="sendMsg" class="btn btn-primary btn-user msg-text-area btn-block">Send Message</button>
          <!-- <?php echo  form_submit(['name'=>'task', 'value'=>'sendMsg', 'class'=>'btn btn-primary btn-user msg-text-area btn-block']); ?> -->
        </form>

         <!-- <?php echo  form_submit(['name'=>'task', 'value'=>'sendMsg', 'class'=>'btn btn-primary btn-user msg-text-area btn-block']); ?> -->
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
              
              <input type="hidden" name="mobile[]" value="<?php echo $mobile->mobile?>" >
              <li class="list-group-item"> <?php echo $mobile->mobile?></li>
            <?php }} else{echo '<li class="list-group-item"> No Reminder Date For today </li> ';} ?>
          </ul>

        </ul>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4">
       <label class="label label-default"></label>

       <form action="" method="post">

          <input type="hidden" name="action" value="mobile_seven" />

          <button type="submit" name="task" value="sendMsg" class="btn btn-primary btn-user msg-text-area btn-block">Send Message</button>
          <!-- <?php echo  form_submit(['name'=>'task', 'value'=>'sendMsg', 'class'=>'btn btn-primary btn-user msg-text-area btn-block']); ?> -->
        </form>


       <!-- <?php echo form_submit(['name'=>'task', 'value'=>'sendMsg', 'class'=>'btn btn-primary btn-user msg-text-area btn-block']); ?> -->
       <!-- <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="submit"> -->
     </div>
   </div>

 </form></div>
</div>

</div>
</div>
</div>

<?php include 'footer.php';  ?>

