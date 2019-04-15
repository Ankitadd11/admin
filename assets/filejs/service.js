/*listing code */
if(action == "list") {
    var ServiceListDataObj = JSON.parse( ServiceListData );
    // create html for service listing dynamically
    generateListTableHtml( ServiceListDataObj );
}


    function  generateListTableHtml( ListJson ) {
       var HtmlStr = "";
       $.each(ListJson, function(i, Objval){
        var Status = "<div class='text-danger'>Inactive</div>";
        if(Objval["status"] == 1) Status = "<div class='text-success'>Active</div>";
            HtmlStr += '<tr>';
              HtmlStr += '<td>'+Objval["service_type_title"]+'</td>';
              HtmlStr += '<td>'+Objval["service_type_description"]+'</td>';
              HtmlStr += '<td>'+Status+'</td>';
              if(Objval['image_path'] != "") HtmlStr += '<td><img src="'+BASE_URL+Objval['image_path']+'" class="image-height-50"> </td>';
              else HtmlStr += '<td></td>';
              
              HtmlStr += '<td>'+actionButtons(Objval["service_type_id"],Objval["status"] )+' </td>';
            HtmlStr += '</tr>';
       });

       $("#ListHtmlData").html( HtmlStr );
       $("#datatable").DataTable();
    }

    // generate action buttons html string
    function actionButtons(ServiceTypeID, Status) {
        var BtnStr = "";
        BtnStr += '<a href="'+BASE_URL+'services/view/'+ServiceTypeID+'" class="btn btn-primary btn-xs" data-id="'+ServiceTypeID+'"><i class="fa fa-folder"></i> View </a>';
        BtnStr += '<a href="'+BASE_URL+'services/edit/'+ServiceTypeID+'" class="btn btn-info btn-xs" data-id="'+ServiceTypeID+'"><i class="fa fa-pencil"></i> Edit </a>';

        var Class = ( Status == 1 ) ? "btn-danger" : "btn-success";
        var BtnText = ( Status == 1 ) ? '<i class="fa fa-close"></i> Inactive' : '<i class="fa fa-check"></i> Active';
        var ChangeStatus = ( Status == 1 ) ? 0 : 1;
        BtnStr += '<a href="'+BASE_URL+'services/StatusUpdate/'+ServiceTypeID+'/'+ChangeStatus+'" class="btn '+Class+' btn-xs" data-id="'+ServiceTypeID+'"> '+BtnText+' </a>';
        return BtnStr;
    }

    $(".sorting").css("width", "");


/** Add & edit service changes**/



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