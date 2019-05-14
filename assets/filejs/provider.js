/*listing code */
if(action == "list") {
    // create html for provider listing dynamically
    generateHtmlData( ProviderDataJson );
    // console.log( ProviderDataJson );
} else {
  generateBusinessHtml( BusinessDetails );
  ProviderPorfileHtml( ProfileDetails );
  providerCategoryHtml( ServiceType,EventType,Categories );
  //   // console.log(BusinessDetails);
    // console.log(ProfileDetails);
}


//list data
function  generateHtmlData( JSonData ) {
    var TbodyStr = "";
    $.each(JSonData, function(i, val){
      var IsProvider = '<label class="text-danger"> No </label>';
      if(val["is_provider"] == 1) IsProvider = '<label class="text-success"> yes </label>';
      TbodyStr += '<tr>';
      TbodyStr += '<td>'+val["provider_email"]+'</td>';
      TbodyStr += '<td class="text-center">'+IsProvider+'</td>';
      TbodyStr += '<td>'+val["signup_method"]+'</td>';
      TbodyStr += '<td>'+val["last_login_time"]+'</td>';
      TbodyStr += '<td>'+actionButtons(val["provider_id"], val["status"])+'</td>';
      TbodyStr += '</tr>';
        console.log(val);
    });   
       $("#ListHtmlData").html( TbodyStr );
       $("#datatable").DataTable();
}

  //listing page action buttons
   function actionButtons(ProviderID, Status) {
        var BtnStr = "";
        BtnStr += '<a href="'+BASE_URL+'providers/view/'+ProviderID+'" class="btn btn-primary btn-xs provider-view" data-id="'+ProviderID+'"><i class="fa fa-folder"></i> View </a>';
        BtnStr += '<a href="'+BASE_URL+'providers/edit/'+ProviderID+'" class="btn btn-info btn-xs" data-id="'+ProviderID+'"><i class="fa fa-pencil"></i> Edit </a>';

        var Class = ( Status == 1 ) ? "btn-danger" : "btn-success";
        var BtnText = ( Status == 1 ) ? '<i class="fa fa-close"></i> Inactive' : '<i class="fa fa-check"></i> Active';
        var ChangeStatus = ( Status == 1 ) ? 0 : 1;
        BtnStr += '<a href="'+BASE_URL+'providers/StatusUpdate/'+ProviderID+'/'+ChangeStatus+'" class="btn '+Class+' btn-xs" data-id="'+ProviderID+'"> '+BtnText+' </a>';
        return BtnStr;
    }

    $(".sorting").css("width", "");

 /*view content*/

  // 
   function generateBusinessHtml( BusinessObj ){
    var BusStr = InsuranceStr = "";
    if(BusinessObj.length > 0 ){
      BusStr = getBusinessContent( BusinessObj[0] );
      InsuranceStr = getInsurenceContent( BusinessObj[0] );
    } else {
        BusStr = " There is no provider business details entered. "
    }

     $("#BusinessAccordion").html( BusStr );
     $("#InsuenceAccordion").html( InsuranceStr );
   }
   

 

   function getBusinessContent( BusJsonObj ) {
       var businessDataStr = "";
       businessDataStr += '<div class="row row-margin-lr-0">';
       businessDataStr += '<div class="col-md-3"><label>Business Name</label></div>';
       businessDataStr += '<div class="col-md-9">'+BusJsonObj["business_name"]+'</div>';
       businessDataStr += '</div>';
       businessDataStr += '<div class="row row-margin-lr-0">';
       businessDataStr += '<div class="col-md-3"><label>Business Email</label></div>';
       businessDataStr += '<div class="col-md-9">'+BusJsonObj["business_email"]+'</div>';
       businessDataStr += '</div>';
       businessDataStr += '<div class="row row-margin-lr-0">';
       businessDataStr += '<div class="col-md-3"><label>Business Address</label></div>';
       businessDataStr += '<div class="col-md-9">'+BusJsonObj["business_address"]+'</div>';
       businessDataStr += '</div>';
       businessDataStr += '<div class="row row-margin-lr-0">';
       businessDataStr += '<div class="col-md-3"><label>Business Number</label></div>';
       businessDataStr += '<div class="col-md-9">'+BusJsonObj["business_number"]+'</div>';
       businessDataStr += '</div>';
       businessDataStr += '<div class="row row-margin-lr-0">';
       businessDataStr += '<div class="col-md-3"><label>Contact Name</label></div>';
       businessDataStr += '<div class="col-md-9">'+BusJsonObj["contact_name"]+'</div>';
       businessDataStr += '</div>';
       businessDataStr += '<div class="row row-margin-lr-0">';
       businessDataStr += '<div class="col-md-3"><label>ABN</label></div>';
       businessDataStr += '<div class="col-md-9">'+BusJsonObj["ABN"]+'</div>';
       businessDataStr += '</div>';
       var gstStr = (BusJsonObj["GST"] == 1 ) ? "yes" : "No";
       businessDataStr += '<div class="row row-margin-lr-0">';
       businessDataStr += '<div class="col-md-3"><label> GST</label></div>';
       businessDataStr += '<div class="col-md-9">'+gstStr+' </div>';
       businessDataStr += '</div>';
       return businessDataStr;
   }

   function getInsurenceContent( InsurenceObj ) {
      var insurenceStr = "";
      insurenceStr += '<div class="row row-margin-lr-0">';
      insurenceStr += '<div class="col-md-3"><label> Insurance Underwriter</label></div>';
      insurenceStr += '<div class="col-md-9">'+InsurenceObj["insurance_underwriter"]+'</div>';
      insurenceStr += '</div>';
      insurenceStr += '<div class="row row-margin-lr-0">';
      insurenceStr += '<div class="col-md-3"><label> Insurance Limit</label></div>';
      insurenceStr += '<div class="col-md-9">'+InsurenceObj["insurance_limit"]+'</div>';
      insurenceStr += '</div>';
      insurenceStr += '<div class="row row-margin-lr-0">';
      insurenceStr += '<div class="col-md-3"><label> Insurance Type</label></div>';
      insurenceStr += '<div class="col-md-9">'+InsurenceObj["insurance_type"]+'</div>';
      insurenceStr += '</div>';
      insurenceStr += '<div class="row row-margin-lr-0">';
      insurenceStr += '<div class="col-md-3"><label>Special Conditions</label></div>';
      insurenceStr += '<div class="col-md-9">'+InsurenceObj["special_conditions"]+'</div>';
      insurenceStr += '</div>';
      insurenceStr += '<div class="row row-margin-lr-0">';
      insurenceStr += '<div class="col-md-3"><label>Insurance Copy</label></div>';
      insurenceStr += '<div class="col-md-9"> <a href="http://localhost/instant-booking-v1/portal/'+InsurenceObj["insurance_copy_name"]+'" download><i class="fa fa-download" style="font-size:16px"></i></a></div>';
      insurenceStr += '</div>';
      return insurenceStr;
   }

   // provider profile html
   function ProviderPorfileHtml( ProfileObj ) {
      var profileStr = "";
      if(ProfileObj.length > 0 ){
        generateProviderProfileHtml( ProfileObj[0] );
      } else {
       $("#ProfileTab").html( "profile details are empty. " );
      }      
   }

 
   // generate provider profile html accordion
  function generateProviderProfileHtml( ProfileObj ) {
    var profileStr = "";
    var VerticalTabObject = {"Information":"Profile information","FAQ" : "Providers FAQ Details"};
    profileStr += '<div class="row">';
      profileStr += CreateVerticalTabs( VerticalTabObject );

      profileStr += '<div class="col-xs-9">';
      profileStr += '<div class="tab-content">';
      profileStr += '<div class="tab-pane active" id="Information">';  
       profileStr += getContentInformationTabHtml( ProfileObj );

      profileStr +='</div>';
       profileStr += '<div class="tab-pane" id="FAQ">';  
       profileStr += generateFaqHtml( ProfileObj );
      profileStr +='</div>';
      profileStr +='</div>';
      profileStr +='</div>';
      profileStr +='</div>';

      $("#AccordionProfileDetails").html( profileStr );
   }

   // get the content tab html 
   function getContentInformationTabHtml( ProfileObj ) {
      var profileStrs = "";
      profileStrs += '<div class="row row-margin-lr-0">';
      profileStrs += '<div class="col-md-3"><label> profile name</label></div>';
      profileStrs += '<div class="col-md-9">'+ProfileObj["profile_name"]+'</div>';
      profileStrs += '</div>';
      profileStrs += '<div class="row row-margin-lr-0">';
      profileStrs += '<div class="col-md-3"><label> profile short description</label></div>';
      profileStrs += '<div class="col-md-9">'+ProfileObj["profile_short_description"]+'</div>';
      profileStrs += '</div>';
      profileStrs += '<div class="row row-margin-lr-0">';
      profileStrs += '<div class="col-md-3"><label> profile description</label></div>';
      profileStrs += '<div class="col-md-9">'+ProfileObj["profile_description"]+'</div>';
      profileStrs += '</div>';
      profileStrs += '<div class="row row-margin-lr-0">';
      profileStrs += '<div class="col-md-3"><label> profile special requirements</label></div>';
      profileStrs += '<div class="col-md-9">'+ProfileObj["profile_special_requirements"]+'</div>';
      profileStrs += '</div>';
      profileStrs += '<div class="row row-margin-lr-0">';
      profileStrs += '<div class="col-md-3"><label> profile url</label></div>';
      profileStrs += '<div class="col-md-9">'+ProfileObj["profile_url"]+'</div>';
      profileStrs += '</div>';

      return profileStrs;
   }



   // common function to create vertical tabs for each object
   function CreateVerticalTabs( VerticalObj ) {
      var tabStr = ""; var j = 0;
      tabStr += '<div class="col-xs-3">';
      tabStr += '<ul class="nav nav-tabs tabs-left">';
     
      $.each(VerticalObj, function(i, TabVal){
         if(j == 0 ) tabStr += '<li class="active"><a href="#'+i+'" data-toggle="tab" aria-expanded="false">'+TabVal+'</a></li>';
         else tabStr += '<li class=""><a href="#'+i+'" data-toggle="tab" aria-expanded="false">'+TabVal+'</a></li>';
         j ++;
      });

      tabStr += '</ul>';
      tabStr += '</div>';
      return tabStr;
   }

 

   // function generateProviderBookingHtml(ProfileObj) {
   //    var bookingStr = "";
   //    bookingStr += '<div class="row row-margin-lr-0">';
   //    bookingStr += '<div class="col-md-3"><label> Advance Booking num of days</label></div>';
   //    bookingStr += '<div class="col-md-9">'+ProfileObj["advance_booking_num_days"]+'</div>';
   //    bookingStr += '</div>';
   //    bookingStr += '<div class="row row-margin-lr-0">';
   //    bookingStr += '<div class="col-md-3"><label>Proir to event booking days</label></div>';
   //    bookingStr += '<div class="col-md-9">'+ProfileObj["prior_to_event_booking_days"]+'</div>';
   //    bookingStr += '</div>';
   //    $("#AccordionBooking").html( bookingStr );
   // }

   // generate faq vertical tab html
   function generateFaqHtml(ProfileObj) {
      var faqStr = '';
      if(typeof ProfileObj["profile_faq"] != "undefined") {
          var ProfileFaq = JSON.parse( ProfileObj["profile_faq"] ); 
          $.each(ProfileFaq, function(i,val){
            faqStr += '<div class="row row-margin-lr-0">';
            faqStr += '<div class="col-md-3"><label>'+val[0]+'</label></div>';
            faqStr += '<div class="col-md-9">'+val[1]+'</div>';
            faqStr += '</div>';
          });
      }
       
      return faqStr;
   }

     // generate the category html
   function providerCategoryHtml( ServiceType, EventType,Categories ) {
    var VerticalTabObject = {"ServiceType" : "Service Type","EventType":"Event Type","Categories":"Categories"};
    var CategoryStr = "";
        CategoryStr += '<div class="row">';
          CategoryStr += CreateVerticalTabs( VerticalTabObject );
          CategoryStr +='<div  class="col-xs-9">';
            CategoryStr += '<div class="tab-content">';
            CategoryStr += '<div class="tab-pane active" id="ServiceType">';
              CategoryStr += getServiceTypeHtml( ServiceType[0] );
            CategoryStr += '</div>';
            CategoryStr += '<div class="tab-pane" id="EventType">';
              CategoryStr += getEventTypeHtml( EventType );
            CategoryStr += '</div>';
            CategoryStr += '<div class="tab-pane" id="Categories">';
              CategoryStr += getTabCategoriesHtml( Categories );
            CategoryStr += '</div>';
            CategoryStr += '</div>';
          CategoryStr += '</div>';
        CategoryStr += '</div>';

    $("#CategoryProfile").html(CategoryStr);
    console.log(ServiceType);
    console.log(EventType);
    console.log(Categories);
   }

   // generate service type vertical tab html
   function getServiceTypeHtml( ServiceType ) {
      var serviceStr = "";
        serviceStr += '<div class="row">';
          serviceStr += '<div  class="col-xs-3">';
            serviceStr += '<div>'+ServiceType["service_type_title"]+'</div>';
          serviceStr += '</div>';
          serviceStr += '<div  class="col-xs-9">';
          serviceStr += '<div class="row"><img src="'+BASE_URL+ServiceType["image_path"]+'" /></div>';
          serviceStr += '</div>';
        serviceStr += '</div>';
      return serviceStr;
   }

    // generate event type vertical tab html
    function getEventTypeHtml( EventType ) {
      var eventStr = "";
      eventStr += '<div class="row">';
        $.each(EventType, function(i, EveVal){
            eventStr += '<div  class="col-xs-2">';
              eventStr += EveVal["event_title"];
            eventStr += '</div>';
        });
      eventStr += '</div>';
      return eventStr;
   }

   // generate categories vertical tab html
    function getTabCategoriesHtml( Categories ) {
      var CatStr = "";
      var className = "";
      CatStr += '<div class="row">';
        $.each(Categories, function(i, CatVal){
          if( i%2 == 0 ) className =  "bg-info margin-1";
          else className =  "text-danger";
            CatStr += '<div  class="col-xs-2 '+className+'">';
              CatStr += CatVal["category_title"];
            CatStr += '</div>';
        });
      CatStr += '</div>';
      return CatStr;
   }
