if(action == "list") {
    generateListHtml( EventTypeJson );
} else {
    generateEventDropDown( ParentEventsObj );
    $("#EventType").val( EventID ); 
}

/*index page code*/
  function  generateListHtml( EventObj ) {
    var HtmlStr ="";
    $.each(EventObj, function(i, EventVal){
        var Status = '<div class="text-danger">Inactive</div>';
        if(EventVal["status"] == 1) Status = '<div class="text-success">Active</div>';
        HtmlStr += '<tr>';
        HtmlStr += '<td>'+EventVal["event_title"]+'</td>';
        HtmlStr += '<td>'+EventVal["event_description"]+'</td>';
        HtmlStr += '<td>'+EventVal["ParentEvent"]+'</td>';
        if(EventVal['image_path'] != "") HtmlStr += '<td><img src="'+BASE_URL+EventVal['image_path']+'" class="image-height-50"> </td>';
              else HtmlStr += '<td></td>';
        HtmlStr += '<td>'+Status+'</td>';
        HtmlStr += '<td>'+actionButtons(EventVal["event_id"],EventVal["status"] )+'</td>';
        HtmlStr += '</tr>';
    });

    $("#ListHtmlData").html( HtmlStr );
    $("#datatable").DataTable();
  }

    // generate action buttons html string
    function actionButtons(EventID, Status) {
        var BtnStr = "";
        BtnStr += '<a href="'+BASE_URL+'events/view/'+EventID+'" class="btn btn-primary btn-xs" data-id="'+EventID+'"><i class="fa fa-folder"></i> View </a>';
        BtnStr += '<a href="'+BASE_URL+'events/edit/'+EventID+'" class="btn btn-info btn-xs" data-id="'+EventID+'"><i class="fa fa-pencil"></i> Edit </a>';

        var Class = ( Status == 1 ) ? "btn-danger" : "btn-success";
        var BtnText = ( Status == 1 ) ? '<i class="fa fa-close"></i> Inactive' : '<i class="fa fa-check"></i> Active';
        var ChangeStatus = ( Status == 1 ) ? 0 : 1;
        BtnStr += '<a href="'+BASE_URL+'events/StatusUpdate/'+EventID+'/'+ChangeStatus+'" class="btn '+Class+' btn-xs" data-id="'+EventID+'"> '+BtnText+' </a>';
        return BtnStr;
    }

/*add edit page code*/
  // drop down html parent event type
   function generateEventDropDown( EventsObj ) {
    var dropDownStr ="<option value=''>-- select -- </option>";
    $.each(EventsObj , function(i, JsonObj ){
      console.log(JsonObj);
      dropDownStr += '<option value="'+JsonObj["event_id"]+'">'+JsonObj["event_title"]+'</option>';
    });

    $("#EventType").html( dropDownStr );
   }

function displayImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(75)
                .height(75);
        };

        reader.readAsDataURL(input.files[0]);
    }
}