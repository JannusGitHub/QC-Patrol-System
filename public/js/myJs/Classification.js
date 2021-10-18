function SaveClassification() {
	$.ajax({
        url: "save_classification",
        method: "post",
        data: $('#frmSaveClassification').serialize(),
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
                $('#frmSaveClassification')[0].reset()
            	$("#mdlSaveClassification").modal('hide');
            	dtClassifications.draw();
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

function ActionClassification() {
    $.ajax({
        url: "action_classification",
        method: "post",
        data: $('#frmActionClassification').serialize(),
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
                $("#mdlActionClassification").modal('hide');
                $("#frmActionClassification")[0].reset();
                dtClassifications.draw();
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

function GetClassificationById(classificationId){
    $.ajax({
        url: 'get_classification_by_id',
        method: 'get',
        data: {
            'classification_id': classificationId
        },
        dataType: 'json',
        beforeSend: function(){
            $("input[name='name'", $("#frmSaveClassification")).val('');
        },
        success: function(JsonObject){
            if(JsonObject['data'] != null){
                $("input[name='name'", $("#frmSaveClassification")).val(JsonObject['data']['name']);
            }
            else{
                $("input[name='name'", $("#frmSaveClassification")).val('');
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
            $("input[name='name'", $("#frmSaveClassification")).val('');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}