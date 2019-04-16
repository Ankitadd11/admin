  <!-- page content -->

  <div class="right_col" role="main">
     <div class="page-title">
              <div class="title_left">
                <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="<?php echo base_url().'events/add'?>" class="btn btn-primary"> <i class="fa fa-plus-circle"></i>  Add Event Type</a>
                </div>
              </div>
              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>Tooltips <small>Hover to view</small></h2> -->
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
                          <th class="col-md-2">event title</th>
                          <th class="col-md-1">event_description</th>
                          <th class="col-md-2">Parent event</th>
                          <th class="col-md-2">Logo</th>
                          <th class="col-md-1">Status</th>
                          <th class="col-md-6">Action</th>
                        </tr>
                      </thead>
                      <tbody id="ListHtmlData"> </tbody>
                    </table>
                  </div>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
    var action = "<?php echo $action; ?>";
    var EventTypeJson = <?=  $EventData; ?>;
  </script>
  <script src="<?php echo base_url(); ?>assets/filejs/events.js?ssvs"></script>