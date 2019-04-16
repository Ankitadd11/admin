/*listing code */
if(action == "list") {
   generateListTableHtml( CategoryDataObj );
} else {
      // var ServiceTypeListObj = JSON.parse( ServiceTypeList );
      // var ActiveCategoryListObj = JSON.parse( ActiveCategoryList );
      generateServiceDropDown( ServiceTypeListObj );
      // set value in edit case
      $("#ServiceType").val(service_type_id);

      if(service_type_id != 0) {
        setTimeout(function(){ 
          // set value in edit case
          $("#ServiceType").trigger("change");
          $("#CategoryDropDown").val(parent_category_id); 
        }, 10);
      }
      
}

    function  generateListTableHtml( ListJson ) {
      var HtmlStr = "";
      $.each(ListJson, function(i, obj){
        HtmlStr += '<tr>';
        HtmlStr += '<td>'+obj["category_title"]+'</td>';
        HtmlStr += '<td>'+obj["category_description"]+'</td>';
        HtmlStr += '<td>'+obj["ParentCategory"]+'</td>';
        HtmlStr += '<td>'+obj["service_type_title"]+'</td>';
        HtmlStr += '<td>'+actionButtons(obj)+'</td>';
        HtmlStr += '</tr>';
      });
      
       $("#ListHtmlData").html( HtmlStr );
       $("#datatable").DataTable();
    }

    // generate action buttons html string
    function actionButtons(obj) {
        var BtnStr = "";
        BtnStr += '<a href="'+BASE_URL+'categories/view/'+obj["category_id"]+'" class="btn btn-primary btn-xs" data-id="'+obj["category_id"]+'"><i class="fa fa-folder"></i> View </a>';
        BtnStr += '<a href="'+BASE_URL+'categories/edit/'+obj["category_id"]+'" class="btn btn-info btn-xs" data-id="'+obj["category_id"]+'"><i class="fa fa-pencil"></i> Edit </a>';

        var Class = ( obj["status"] == 1 ) ? "btn-danger" : "btn-success";
        var BtnText = ( obj["status"] == 1 ) ? '<i class="fa fa-close"></i> Inactive' : '<i class="fa fa-check"></i> Active';
        var ChangeStatus = ( obj["status"] == 1 ) ? 0 : 1;
        BtnStr += '<a href="'+BASE_URL+'categories/StatusUpdate/'+obj["category_id"]+'/'+ChangeStatus+'" class="btn '+Class+' btn-xs" data-id="'+obj["category_id"]+'"> '+BtnText+' </a>';
        return BtnStr;
    }

    $(".sorting").css("width", "");


/** Add & edit category changes**/

  function generateServiceDropDown( ServiceObj ) {
    var OptionStr = '<option value=""> -- select -- </option>';
    $.each(ServiceObj, function(i, obj){
        OptionStr += '<option value="'+obj["service_type_id"]+'">'+obj["service_type_title"]+'</option>';
    });
    $("#ServiceType").html( OptionStr );
  }

  // change service type
  $(document).on("change", "#ServiceType",  function() {
        filterServiceCategories( ActiveCategoryListObj, $(this).val() );
  });

  // on change of service type filter the category object based on selected service type
  function filterServiceCategories( categoryObj, ServiceID ) {
    var data = $.grep(categoryObj, function(e){ return e.service_type_id == ServiceID; });
    generateCategoryDropDown( data );
  }

  // generate the html string of category object selected service type
  function generateCategoryDropDown( SelectedCatObj  ) {
    var optionStr = '<option value=""> -- select -- </option>';
      $.each(SelectedCatObj, function(i, catObj ){
          optionStr += '<option value="'+catObj["category_id"]+'"   parent_category_id="'+catObj["parent_category_id"]+'" service_type_id="'+catObj["service_type_id"]+'"">'+catObj["category_title"]+'</option>';
      });

      $("#CategoryDropDown").html( optionStr );
  }