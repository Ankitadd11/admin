  <!-- page content -->

  <div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
                  <div class="x_title">
                    <h2>Tooltips <small>Hover to view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="col-md-2">Service Type</th>
                          <th class="col-md-2">Description</th>
                          <th class="col-md-1">Status</th>
                          <th class="col-md-2">Logo</th>
                          <th class="col-md-5">Action</th>
                        </tr>
                      </thead>
                      <tbody id="ListHtmlData">
                       
                      </tbody>
                    </table>
                  </div>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
      var ServiceListData = '<?php echo $ServiceData; ?>';
  </script>
  <script src="<?php echo base_url(); ?>assets/filejs/service.js?ssvs"></script>