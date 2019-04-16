<?php
    $event_id = isset($Event["event_id"]) ? $Event["event_id"] : 0;
    $event_parent_id = isset($Event["event_parent_id"]) ? $Event["event_parent_id"] : 0;
    $event_title = isset($Event["event_title"]) ? $Event["event_title"] : "";
    $event_description = isset($Event["event_description"]) ? $Event["event_description"] : "";
    $Status = (isset($Event["status"]) && $Event["status"] == 1) ? "checked" : ($PageTitle == "Add") ? "checked" : "unchecked";
    $image_path = (isset($Event["image_path"]) && !empty($Event["image_path"]) ) ? $Event["image_path"] : DEFAULT_IMAGE;
  ?>
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><?php echo $PageTitle; ?> Event Type</h3>
        </div>
       <!--  <div class="title_right">
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
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Event type <small></small></h2>
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
              <form id="EventForm"  class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data" onsubmit="window.onbeforeunload = null;">
                <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Title <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="event_title" required="required" name="event_title" class="form-control col-md-7 col-xs-12" value="<?php echo $event_title; ?>" disabled="disabled">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Event type description</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                   <textarea id="message" required="required" class="form-control" name="event_description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                      data-parsley-validation-threshold="10" disabled="disabled"><?php echo $event_description;  ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Parent Event Type</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="EventType" class="form-control" name="event_parent_id"  disabled="disabled">
                    </select>
                  </div>
                </div>
                <div class="form-group">
                   <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Image upload</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                         <img id="blah" src="<?php echo base_url().$image_path; ?>" alt="your image"  class="row image-height"/>                            
                  </div>
                </div>
                <div class="form-group">
                   <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Active</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="checkbox" class="js-switch" <?php echo $Status; ?> name="Status" disabled="disabled" />
                  </div>
                </div>                       
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="button" onclick="document.location.href='<?php echo base_url()?>events'">Return</button>
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
  var EventID = "<?php echo $event_parent_id; ?>";
  var ParentEventsObj = <?=  $ParentEvents; ?>;
</script>
<script src="<?php echo base_url(); ?>assets/js/extra/switchery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/filejs/events.js?adas"></script>