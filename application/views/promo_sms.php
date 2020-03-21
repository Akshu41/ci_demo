<?php include 'header.php'; 
 ?>




<div class="container">
  <div class="row">
   <div class="col-md-8"> 

<div class="row">
    <div class="col-md-6">
         <select  name="religion" id="religion"  class="form-control" id="sel_reg">
           
           <option>Select Religion</option>
              <option value="1">Hindu</option> Hindu
              <option value="2">Muslim</option>Muslim
              <option value="3">Bohra</option>Bohra
              <option value="4">Panjabi</option>Panjabi
              <option value="5">Christan</option>Christian
              <option value="6">other</option>other

         </select>
       </div>
       
       <div class="col-md-6">
         <select name="festival" id="festival" class="form-control">
           <option>Select festival</option></select>
  
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
                            if(@$reg){
                               foreach ($reg as $reg1) { ?>
                          <li class="list-group-item"> <?php echo $reg1->mobile; ?> </li>

          <?php } }else{echo '<li class="list-group-item"> No Reminder Date For today </li> ';} ?>
              </ul>

    
  </div>

   </div>


  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script >
 $(document).ready(function(){
  // var promo_sms =['religion_id'];
 $('#religion').change(function(){
  var religion_id = $('#religion').val();
 
  if(religion_id != '')
  {
   $.ajax({
    url:"<?= base_url('admin/getReg_id') ?>",
    method:"POST",
    data:{religion_id:religion_id},
    success:function(data)
    {
      var obj = JSON.parse(data);
      console.log(obj);
      obj.forEach(function(value) {
          $('#festival').html('<option value="">'+value['festival_name'] +'</option>');
            });
      //$('#festival').html('<option value="">'+ obj +'</option>');
     //$('name="festival" id="festival"').html('<option value="' + data +'">'+ data +'</option>');
     
     //$('#festival_sms').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State</option>');
   $('#city').html('<option value="">Select City</option>');
  }
 });

 $('#state').change(function(){
  var state_id = $('#state').val();
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>dynamic_dependent/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#city').html(data);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City</option>');
  }
 });
 
});
</script>
<?php include 'footer.php';  ?>