<?php include 'header.php';  ?>


<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Visit's</th>
                      <th>Remark</th>
                      <th>Due Date</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php foreach ($due_date as $due) { ?>
                   
                
                    <tr>
                      <td> <?php echo $due->c_name  ?> </td>
                      <td><?php echo $due->c_visit  ?> </td>
                      <td><?php echo $due->c_remarkes ?> </td>
                      <td><?php echo $due->c_rem_date  ?></td>
                    </tr>
                <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>



<?php include 'footer.php';  ?>