<?php include 'header.php'; ?>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Festival SMS</h6>
    </div>
    <div class="card-body"> 
      <?php if($success = $this->session->flashdata('success') ) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> <?php echo $success;   echo  @$msg_success;?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php } elseif ($fail = $this->session->flashdata('error')) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> <?php echo $fail ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php } ?>     
      <form action="<?= base_url('admin/getReg') ?>"  class="user" method="POST">
        <div class="row">
          <div class="col-md-8"> 
            <div class="row">
              <div class="col-md-6">
                <select  name="religion" id="religion"  class="form-control" id="sel_reg">           
                    <option>---Select Religion---</option>
                    <option value="1">Hindu</option>
                    <option value="2">Muslim</option>
                    <option value="3">Bohra</option>
                    <option value="4">Punjabi</option>
                    <option value="5">Christian</option>
                    <option value="6">Others</option>
                </select>
              </div>       
              <div class="col-md-6">
                <select name="festival" id="festival" class="form-control">
                  <option>---Select Festival---</option>
                </select>
              </div>
              <div class="col-md-12 mt-3">
                <!-- <label class="label label-default">Message</label> -->
                <textarea id="message" name="message" value=""  class="form-control" > </textarea>
              </div>
            </div>                   
            <div class="row">
              <div class="col-md-12 mt-3">
                <input type="submit" class="btn btn-primary col-md-4" name="Send" id="send_button" onclick="return validate_form()" value="Send to All">  
                </div>
              </div>
          </div>
          <div class="col-sm-4">
            <ul id="reg_no" class="list-group text-center">
              <li value="aks" class="list-group-item active">Customer's List</li>                     
            </ul>                           
          </div>        
        </div>
      </form> 
    </div>
  </div>
</div>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script >
$('#send_button').hide();
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
      var options = '<option value="">---Select Festival--</option>';
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
      if(Object.keys(obj1).length > 0) {
        $('#send_button').show();
        obj1.forEach(function(value1) {          
            console.log(reg_no[value1.mobile] = value1.mobile);

            // <input type="hidden" name="mobile[]" value="<?php // echo $mobile->mobile?>" >
            // <li class="list-group-item"> <?php // echo $mobile->mobile?></li>

            list += '<li class="list-group-item"> '+value1.mobile +'</li><input name="mobile" type="hidden" value="'+value1.mobile +'">';          
        });
      } else {
        $('#send_button').hide();
        list += '<li class="list-group-item">No customers found</li>';          
      }
      $('#reg_no').html(list);
      //console.log(festivals);
    //$('#festival').html('<option value="">'+ obj +'</option>');
    //$('name="festival" id="festival"').html('<option value="' + data +'">'+ data +'</option>');     
    //$('#festival_sms').html(data);
    } 
   });
  }
  // else
  // {
  //  $('#state').html('<option value="">Select State</option>');
  //  $('#city').html('<option value="">Select City</option>');
  // }
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

function validate_form() {
  var textBox =  $.trim( $('#send_button').val() );
    if (textBox == "") {
        alert('Please enter a SMS');
        return false;
    }
}

</script>
<?php include 'footer.php';  ?>