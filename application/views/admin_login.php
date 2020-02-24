<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 
  <title>Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url("assest/vendor/fontawesome-free/css/all.min.css3");?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url("assest/css/sb-admin-2.min.css");?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Admin  Login!</h1>
                  </div>
                  
                    <?php echo  form_open('login/admin_login',['class'=>'user']); ?>

                    <?php if ($error = $this->session->set_flashdata('login_failed')); {?>
                      
                    
                    
           <?php  }?>       <div class="form-group">

                     <?php echo  form_input(['name'=>'username', 'class'=>'form-control form-control-user', 'id'=>'fexampleInputEmail' , 'placeholder'=>'Enter Username', 'value'=>set_value('username')]); ?>
                      <div class="error" >
                        <?php echo form_error('username');  ?>
                      </div>
        
                    </div>
                    <div class="form-group">

                       <?php echo  form_password(['name'=>'password', 'class'=>'form-control form-control-user', 'id'=>'exampleInputPassword' , 'placeholder'=>'Password','value'=>set_value('password') ]); ?>

                           <div class="error" >
                        <?php echo form_error('password');  ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                      </div>
                    </div>
                    <?php echo  form_submit(['name'=>'submit', 'value'=>'Login', 'class'=>'btn btn-primary btn-user btn-block']); ?>
                    </a>
                    <hr>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->

  <script src="<?php echo base_url("assest/vendor/jquery/jquery.min.js");?>"></script>
    <script src="<?php echo base_url("assest/vendor/bootstrap/js/bootstrap.bundle.min.js");?>
"></script>

  <!-- Core plugin JavaScript-->

  <script src="<?php echo base_url("assest/vendor/jquery-easing/jquery.easing.min.js");?>"></script>
  <!-- Custom scripts for all pages-->
  <script src=""></script>

</body>

</html>
