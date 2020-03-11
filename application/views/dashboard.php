<?php include 'header.php';  ?>





        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <a href="<?php echo base_url("admin/add_customer")?>" title="Add Customer" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-user"></i>
                    </span>
                    <span class="text">New Customer</span>
                  </a>
         <br>
         <br>

     <?php if(   $this->session->flashdata('success') || @$msg_success = $this->session->flashdata('success_send')){
                  $success = $this->session->flashdata('success');?>

              <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> <?php echo $success;   echo  @$msg_success;?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>
           
            <?php } elseif ($fail = $this->session->flashdata('error')) { ?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Failed!</strong> <?php echo $fail ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>
            <?php }?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Customers List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     
                      <th>Name</th>
                      <th>Mobile No.</th>
                      <!-- <th>Email</th> -->
                      <th>Vehicle No.</th>
                      <!-- <th>Vehicle Type</th> -->
                      <th>Reminder Date</th>
                      <th>Last Filled Date</th>
                      <th>Visits</th>
                      <th>Remarks</th>
                      <!-- <th>Edit</th>
                      <th>Send</th>
                      <th>Add Vist</th>
                      <th>Delete</th> -->
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>                      
                      <th>Name</th>
                      <th>Mobile No.</th>
                      <th>Email</th>
                      <th>Vehicle No.</th>
                      <th>Vehicle Type</th>
                      <th>Reminder Date</th>
                      <th>Last Filled Date</th>
                      <th>Visits</th>
                      <th>Remarks</th>
                      <th>Edit</th>
                      <th>Send</th>
                      <th>Add Remarks</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot> -->
                    <tbody>                  
            <?php
            if (count($userslist) ) {
                  foreach ($userslist as $userlist) { ?>                         
                      <tr>
                    <td><?php echo $userlist->c_name;  ?></td>
                    <td><?php echo $userlist->mobile;  ?></td>
                    <!-- <td><?php echo $userlist->c_email;  ?></td> -->
                    <td><?php echo $userlist->c_vehicle_no;  ?></td>
                    <!-- <td><?php echo $userlist->c_vehicle_type;  ?></td> -->
                    <td class="grid-item" data-date="<?php echo $userlist->c_rem_date;  ?>"><?php echo $userlist->c_rem_date;  ?></td>
                    <td><?php echo $userlist->c_last_fill_date;  ?></td>
                    <td><?php echo $userlist->c_visit + 1;  ?></td>
                    <td><?php echo $userlist->c_remarkes;  ?></td>
                    <td>
                      <?php $id = $userlist->c_user_id; ?>
                      <?php echo anchor("admin/edit_customer/{$id}",'<i class="fas fa-edit"></i>','class="btn btn-info" title="Edit Customer"'); ?>
                    <!-- </td><td> -->
                      <?php $id = $userlist->c_user_id; ?>
                      <?php echo anchor("admin/single_sms/{$id}",'<i class="fas fa-paper-plane"></i>','class="btn btn-info" title="Send Personal SMS"'); ?>
                    <!-- </td><td> -->
                      <?php $id = $userlist->c_user_id; ?>
                      <?php echo anchor("admin/add_remark/{$id}",'<i class="fas fa-envelope"></i>','class="btn btn-info" title="Add Customer\'s Visit"'); ?>
                    <!-- </td><td> -->

                      <div class="modal fade" id="delete_cus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this customer?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                            </div>
                              <div class="modal-body">Select "Delete" below if you are want to delete this customer.</div>
                              <div class="modal-footer">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                  <?php echo anchor("admin/delete_customer/{$id}",'Delete','class="btn btn-danger"'); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                              <a href="#" title="Delete Customer" class="btn btn-danger" data-toggle="modal" data-target="#delete_cus"><i class="fas fa-trash"></i></a>
                      </td>
                      
                     
                    
                    </tr>

                <?php  }
                 } ?> 


                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
  
 $(function() {
  var date = new Date(),
    currentDate = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
  $(".grid-item").each(function() {
    var specifiedDate = $(this).data('date');
    if (specifiedDate == currentDate) {
      $(this).addClass('today');
    } else if (currentDate > specifiedDate) {
      $(this).addClass('past');
    } else {
      $(this).addClass('future');
    }
  });
});
</script>
      

<?php include 'footer.php';  ?>