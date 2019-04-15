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
            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>users/ResetPassword" autocomplete="off"> 
            <div class="control-group" style="display:none;">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Error!</strong> No reset password 'from' email address specified for this site. Please contact support.
                    </div>
                </div>
              <h1>Reset password</h1>
                <fieldset>
                    <div class="form-group row">
                        <div class="col-md-4">
                        <label class="control-label pull-left" for="inputEmail">Email</label>
                    </div>
                        <div class="col-md-8"> <input class="form-control " type="email" id="inputEmail" placeholder="Email" name="Email"></div>                       
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                        <label class="control-label pull-left" for="inputName">User Name</label></div>
                        <div class="col-md-8"><input class="form-control" type="text" id="inputName" placeholder="User Name" name="UserName"></div>     
                    </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-default submit btn-block" style="background-color: #73879C;color: #ffff;">Reset Password</button>
                </div>
                </fieldset>              
                <div class="form-group">  
                    <?php $class = isset( $class ) ? $class : ""; ?>
                     <div class="col-sm-offset-2 row <?php echo $class; ?>">
                           <?php echo isset($error_message) ? $error_message : ""; ?>
                    </div> 
                </div>      
              <div class="clearfix"></div>
              <div class="separator">
              <div class="row">
                    <div class="col-md-12 text-center change_link">
                        <small><a href="<?php echo base_url(); ?>users">Back to login</a></small>
                    </div>
                </div>
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
