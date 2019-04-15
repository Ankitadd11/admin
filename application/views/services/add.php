<?php
    $service_type_id = isset($Service["service_type_id"]) ? $Service["service_type_id"] : 0;
    $service_type_title = isset($Service["service_type_title"]) ? $Service["service_type_title"] : "";
    $service_type_description = isset($Service["service_type_description"]) ? $Service["service_type_description"] : "";
    $Status = (isset($Service["status"]) && $Service["status"] == 1) ? "checked" : ($PageTitle == "Add") ? "checked" : "unchecked";
    $image_path = isset($Service["image_path"]) ? $Service["image_path"] : DEFAULT_IMAGE;
  ?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $PageTitle; ?> Serivce Type</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Service type <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="ServiceForm"  class="form-horizontal form-label-left" action="<?php echo base_url().$action; ?>" method="post" enctype="multipart/form-data" onsubmit="window.onbeforeunload = null;">
                      <input type="hidden" name="service_type_id" value="<?php echo $service_type_id; ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="service_type_title" required="required" name="service_type_title" class="form-control col-md-7 col-xs-12" value="<?php echo $service_type_title; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Service type description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea id="message" required="required" class="form-control" name="service_type_description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"><?php echo $service_type_description;  ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                         <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image upload</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" name="image_path" value="<?php echo $image_path; ?>"  onchange="displayImg(this);" class="row" />
                               <img id="blah" src="<?php echo base_url().$image_path; ?>" alt="your image"  class="row image-height"/>
                            
                        </div>
                      </div>
                      <div class="form-group">
                         <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Active</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="checkbox" class="js-switch" <?php echo $Status; ?> name="Status" />
                        </div>
                      </div>
                       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button" onclick="document.location.href='<?php echo base_url()?>services'">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<script type="text/javascript">
  var action = "<?php echo $action; ?>";
</script>
<script src="<?php echo base_url(); ?>assets/js/extra/switchery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/filejs/service.js?adas"></script>