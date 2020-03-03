<?php include 'header.php';  ?>


<div class="container-fluid">

          <!-- Page Heading -->
        

          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Bulk Message</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Select</th>
					  <th>Name</th>
                      <th>Mobile No.</th>
                      <th>Date of Birth</th>
                      <th>Religion</th>
                      <th>Reminder Date</th>
                      <th>Last Filled Date</th>
                      <th>Visits</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Select</th>
                      <th>Name</th>
                      <th>Mobile No.</th>
                      <th>Date of Birth</th>
                      <th>Religion</th>
                      <th>Reminder Date</th>
                      <th>Last Filled Date</th>
                      <th>Visits</th>
                    </tr>
                  </tfoot>
                    <tbody>

                  
            <?php
            if (count($bulk_sms) ) {
                  foreach ($bulk_sms as $bulk_sms_list) { ?>
              
           
                      <tr>
                    <td class="text-center"><input type="checkbox" value=""></td>
                    <td><?php echo $bulk_sms_list->c_name;  ?></td>
                    <td><?php echo $bulk_sms_list->mobile;  ?></td>
                    <td><?php echo $bulk_sms_list->c_dob;  ?></td>
                    <td><?php echo $bulk_sms_list->c_religion;  ?></td>
                    <td><?php echo $bulk_sms_list->c_rem_date;  ?></td>
                    <td><?php echo $bulk_sms_list->c_last_fill_date;  ?></td>
                    <td>1</td>                  
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
<?php include 'footer.php';  ?>