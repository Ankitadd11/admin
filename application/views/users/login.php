<!DOCTYPE html>
<html lang="en">
  <head>
    <title>IB Admin</title>
  <?php echo $header; ?>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>users/login" autocomplete="off"> 
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="Name" required="" /><?php echo form_error('UserName', '<div class="text-danger">', '</div>'); ?>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
              </div>
                <div class="form-group">  
                    <?php $class = isset( $class ) ? $class : ""; ?>
                     <div class="col-sm-offset-2 row <?php echo $class; ?>">
                           <?php echo isset($error_message) ? $error_message : ""; ?>
                    </div> 
                </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button> 
                 <a href='<?php echo base_url(); ?>users/ResetPassword' id="ResetPassword" class="reset_pass"> Lost your password? </a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
      <!-- <footer> -->
      <?php echo $footer; ?>
  <!-- </footer> -->
  </body>

</html>
