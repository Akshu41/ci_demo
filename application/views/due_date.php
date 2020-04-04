<?php include 'header.php';  ?>


<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Expired Fillings</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Mobile No.</th>
                      <th>Visits</th>
                      <th>Last filled on</th>
                      <th>Latest remark</th>
                    </tr>
                  </thead>                  
                  <tbody>
                    <?php foreach ($due_date as $due) { ?>                                  
                    <tr>
                      <td><?php echo $due->c_name  ?> </td>
                      <td>
                      <a target="_blank" href="<?= base_url("admin/single_sms/{$due->c_user_id}") ?>" title="One2One SMS">  
                        <?php echo $due->mobile  ?>
                      </a>
                       </td>
                       <td>
                        <a target="_blank" href="<?= base_url("admin/add_remark/{$due->c_user_id}") ?>" title="Add Visit">   
                          <?php echo $due->c_visit;  ?>                  
                        </a>
                      </td>
                      <td><?php echo $due->c_rem_date  ?></td>
                      <td><?php echo $due->c_remarkes ?> </td>
                    </tr>
                <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>



<?php include 'footer.php';  ?>