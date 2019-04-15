<html>
    <head>
         <?php $this->load->view('templates/header'); ?>
    </head>
    <header>
      <title> IB Admin</title>
    </header>
    <body class="nav-md">
        <div id='whateverworks'>
            <div class="container body">
                <div class="main_container">
                  <div class="main_container">
                    <?php $this->load->view('templates/sidebar'); ?>
                    <?php $this->load->view('templates/topnav'); ?>
                    <?= $contents ?>
                 </div>
                </div>
            </div>
        </div>

        <footer>
         <?php $this->load->view('templates/footer'); ?>
         <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
     </footer>
    </body>

</html>