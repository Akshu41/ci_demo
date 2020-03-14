<?php include 'header.php';  ?>




<div class="container">
  <div class="row">
   <div class="col-md-8"> 

<div class="row">
    <div class="col-md-6">
         <select class="form-control">
           <option>Select Religion</option>
           <option>Hindu</option>
           <option>Panjabi</option>
         </select>
       </div>
       
       <div class="col-md-6">
         <select class="form-control">
           <option>Select festival</option>
           <option>Hindu</option>
           <option>Panjabi</option>
         </select>
       </div>
     </div>

      <br>
      
      <form action="#"  class="user" method="POST">
       
        <div class="form-group row">
          <label class="label label-default">Message</label>
               <?php echo form_textarea(['name'=>'message', 'class'=>'form-control form-control-user msg-text-area' , 'placeholder'=>'', 'value'=>set_value('message', 'Dear Customer, Your Oil Refill is due. Please visit and refill today. Thanks!')]); ?>
             </div>
          </form>            
        </div>

    <div class="col-sm-4">
                        <ul class="list-group text-center">
                          <li class="list-group-item active">Customer's Mobile No. List</li>
                       <?php 
                            if(@$mobile_today){

                            foreach ($mobile_today as $mobile) { ?>
                       
                          <li class="list-group-item"> <?php echo $mobile->mobile?></li>
                <?php }} else{echo '<li class="list-group-item"> No Reminder Date For today </li> ';} ?>
              </ul>

    
  </div>

   </div>


  
</div>

<?php include 'footer.php';  ?>