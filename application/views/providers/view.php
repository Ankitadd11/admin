
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><?php echo $PageTitle; ?> Event Type</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Provider details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#BusinessTab" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#ProfileTab" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>
                        <!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li> -->
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in " id="BusinessTab" aria-labelledby="home-tab">
                          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel">
                              <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#AccordionBusiness" aria-expanded="true" aria-controls="AccordionBusiness">
                              <h4 class="panel-title"><strong>Business</strong></h4>
                              </a>
                              <div id="AccordionBusiness" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body" id="BusinessAccordion">
                                </div>
                              </div>
                            </div>
                              <div class="panel">
                              <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#AccordionInsurance" aria-expanded="true" aria-controls="AccordionInsurance">
                              <h4 class="panel-title"><strong>Trust</strong></h4>
                              </a>
                              <div id="AccordionInsurance" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body" id="InsuenceAccordion">
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="ProfileTab" aria-labelledby="profile-tab">
                          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel">
                              <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#AccordionProfileDetails" aria-expanded="true" aria-controls="AccordionProfileDetails">
                              <h4 class="panel-title"><strong>Content</strong></h4>
                              </a>
                              <div id="AccordionProfileDetails" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body" id="BusinessAccordion">
                                </div>
                              </div>
                            </div>

                              <div class="panel">
                              <a class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#Category" aria-expanded="true" aria-controls="Category">
                              <h4 class="panel-title"><strong>Category</strong></h4>
                              </a>
                              <div id="Category" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body" id="CategoryProfile">
                                </div>
                              </div>
                            </div>
                           <!--    <div class="panel">
                              <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#AccordionFaq" aria-expanded="true" aria-controls="AccordionFaq">
                              <h4 class="panel-title">Providers Faq Details</h4>
                              </a>
                              <div id="AccordionFaq" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body" id="InsuenceAccordion">
                                </div>
                              </div>
                            </div> -->
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
        </div>
      </div>
    </div>
  </div>
 <script type="text/javascript">
    var action = "<?php echo $action; ?>";
    var BusinessDetails = <?=  $BusinessDetails; ?>;
    var ProfileDetails = <?=  $ProfileDetails; ?>;
    var ServiceType = <?=  $ServiceType; ?>;
    var EventType = <?=  $EventType; ?>;
    var Categories = <?=  $Categories; ?>;
  </script>
  <script src="<?php echo base_url(); ?>assets/filejs/provider.js"></script>