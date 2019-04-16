<?php
    $category_id = isset($Category["category_id"]) ? $Category["category_id"] : 0;
    $category_title = isset($Category["category_title"]) ? $Category["category_title"] : "";
    $category_description = isset($Category["category_description"]) ? $Category["category_description"] : "";
    $service_type_id = isset($Category["service_type_id"]) ? $Category["service_type_id"] : "";
    $parent_category_id = isset($Category["parent_category_id"]) ? $Category["parent_category_id"] : 0;
     $status = (isset($Category["status"]) && $Category["status"] == 1) ? "checked" : ($PageTitle == "Add") ? "checked" : "unchecked";
  ?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $PageTitle; ?> Provider category</h3>
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
                    <h2>provider Category <small></small></h2>
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
                    <form id="CategoryForm"  class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data" onsubmit="window.onbeforeunload = null;">
                      <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="service_type_title" required="required" name="category_title" class="form-control col-md-7 col-xs-12" value="<?php echo $category_title; ?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea id="message" required="required" class="form-control" name="category_description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10" disabled="disabled"><?php echo $category_description; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Service Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="ServiceType" class="form-control" name="service_type_id" disabled="disabled" >
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Parent Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="CategoryDropDown" class="form-control" name="parent_category_id" disabled="disabled" ></select>
                        </div>
                      </div> 
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">IsParentCategory</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="checkbox" class="flat" name="Status" <?php echo $status; ?> disabled="disabled">
                        </div>
                      </div>                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button" onclick="document.location.href='<?php echo base_url()?>categories'">Return</button>
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
  var action = "";  
  var ServiceTypeListObj = <?=  $ServiceTypeList; ?>;
  var ActiveCategoryListObj = <?=  $ActiveCategoryList; ?>;
  var service_type_id = '<?php echo $service_type_id; ?>';
  var parent_category_id = '<?php echo $parent_category_id; ?>';
 
</script>
<script src="<?php echo base_url(); ?>assets/filejs/category.js?adas"></script>