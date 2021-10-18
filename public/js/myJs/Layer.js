function SaveProductLine() {
	$.ajax({
        url: "save_product_line",
        method: "post",
        data: $('#frmSaveProductLine').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Saved Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $('#frmSaveProductLine')[0].reset();
            	$("#mdlSaveProductLine").modal('hide');
            	dtProductLines.draw();
            }
            else{
            	Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Saving Failed!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ActionProductLine() {
    $.ajax({
        url: "action_product_line",
        method: "post",
        data: $('#frmActionProductLine').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Saved Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#mdlActionProductLine").modal('hide');
                $("#frmActionProductLine")[0].reset();
                dtProductLines.draw();
            }
            else{
                Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Saving Failed!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetProductLineById(product_lineId){
    $.ajax({
        url: 'get_product_line_by_id',
        method: 'get',
        data: {
            'product_line_id': product_lineId
        },
        dataType: 'json',
        beforeSend: function(){
            $("input[name='name'", $("#frmSaveProductLine")).val('');
        },
        success: function(JsonObject){
            if(JsonObject['data'] != null){
                $("input[name='name'", $("#frmSaveProductLine")).val(JsonObject['data']['name']);
            }
            else{
                $("input[name='name'", $("#frmSaveProductLine")).val('');
            }
        },
        error: function(data, xhr, status){
            Swal({
                position: 'top-end',
                type: 'error',
                title: 'An error occured!',
                showConfirmButton: false,
                timer: 1500,
                customClass: 'swal-wide',
            });
            $("input[name='name'", $("#frmSaveProductLine")).val('');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}