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
      
      <form action="<?= base_url('admin/getReg') ?>"  class="user" method="POST">
       
        <div class="form-group row">
          <label class="label label-default">Message</label>
              <input id="message" name="message" value=""  class="form-control form-control-user msg-text-area">
             </div>
                   
                   <input type="submit" name="Send" value="Send">  
        </div>

    <div class="col-sm-4">
                        <ul  id="reg_no" class="list-group text-center">
                          <li value="aks" class="list-group-item active">Customer's Mobile No. List</li>
                       
              </ul>

  
    
  </div>
</form> 
   </div>


  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script >
 var festivals = [];
 $(document).ready(function(){
  
 $('#religion').change(function(){
  var religion_id = $('#religion').val();
 
  if(religion_id != '')
  {
  $('#festival').html('');  
   $.ajax({
    url:"<?= base_url('admin/getReg_id') ?>",
    method:"POST",
    data:{religion_id:religion_id},
    success:function(data)
    {
      var obj = JSON.parse(data); 
      //console.log('obj-',obj)     
      var options = '<option value="">---Select--</option>';
      obj.forEach(function(value) {          
          console.log(festivals[value.id] = value.festival_sms);
          //console.log('f-', festivals);
          options += '<option value="'+value.id+'">'+value.festival_name +'</option>';
          $('#festival').html(options);
      });
      //console.log(festivals);
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



  $('#religion').change(function(){
  var religion_id = $('#religion').val();
 
  if(religion_id != '')
  {
  $('#reg_no').html('');  
   $.ajax({
    url:"<?= base_url('admin/getReg_no') ?>",
    method:"POST",
    data:{religion_id:religion_id},
    success:function(data1)
    {

      var obj1 = JSON.parse(data1);
      //console.log('obj_reg-',obj1)     
      var list = '<li class="list-group-item active"> Customer\'s Mobile No List</li>';
      obj1.forEach(function(value1) {          
          console.log(reg_no[value1.mobile] = value1.mobile);
          list += '<input name="mobile" value="'+value1.mobile +'" disabled>';
          $('#reg_no').html(list);
      });
      //console.log(festivals);
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



  $('#festival').change(function(){
    var festival_id = $('#festival').val();
    if(festival_id != '')
    {
      $('#message').val(festivals[festival_id]);
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