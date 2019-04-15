/*listing code */
var ServiceListDataObj = JSON.parse( ServiceListData );

// create html for service listing dynamically
generateListTableHtml( ServiceListDataObj );

    function  generateListTableHtml( ListJson ) {
       var HtmlStr = "";
       $.each(ListJson, function(i, Objval){
        var Status = "<div class='text-danger'>Inactive</div>";
        if(Objval["status"] == 1) Status = "<div class='text-success'>Active</div>";
            HtmlStr += '<tr>';
              HtmlStr += '<td>'+Objval["service_type_title"]+'</td>';
              HtmlStr += '<td>'+Objval["service_type_description"]+'</td>';
              HtmlStr += '<td>'+Status+'</td>';
              HtmlStr += '<td> </td>';
              HtmlStr += '<td>'+actionButtons(Objval["service_type_id"])+' </td>';
              // HtmlStr += '<td> <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a><a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a><a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>';
            HtmlStr += '</tr>';
       });

       $("#ListHtmlData").html( HtmlStr );
       $("#datatable").DataTable();
    }

    function actionButtons(ServiceTypeID, element) {
        var BtnStr = "";
        BtnStr += '<a href="#" class="btn btn-primary btn-xs" data-id="'+ServiceTypeID+'"><i class="fa fa-folder"></i> View </a>';
        BtnStr += '<a href="'+BASE_URL+'services/edit/'+ServiceTypeID+'" class="btn btn-info btn-xs" data-id="'+ServiceTypeID+'"><i class="fa fa-pencil"></i> Edit </a>';
        BtnStr += '<a href="#" class="btn btn-danger btn-xs" data-id="'+ServiceTypeID+'"><i class="fa fa-trash-o"></i> Delete </a>';
        return BtnStr;
    }

    $(".sorting").css("width", "");
