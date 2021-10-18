function SaveFactor() {
	$.ajax({
        url: "save_factor",
        method: "post",
        data: $('#frmSaveFactor').serialize(),
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
                $('#frmSaveFactor')[0].reset()
            	$("#mdlSaveFactor").modal('hide');
            	dtFactors.draw();
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

function ActionFactor() {
    $.ajax({
        url: "action_factor",
        method: "post",
        data: $('#frmActionFactor').serialize(),
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
                $("#mdlActionFactor").modal('hide');
                $("#frmActionFactor")[0].reset();
                dtFactors.draw();
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

function GetFactorById(factorId){
    $.ajax({
        url: 'get_factor_by_id',
        method: 'get',
        data: {
            'factor_id': factorId
        },
        dataType: 'json',
        beforeSend: function(){
            $("input[name='name'", $("#frmSaveFactor")).val('');
        },
        success: function(JsonObject){
            if(JsonObject['data'] != null){
                $("input[name='name'", $("#frmSaveFactor")).val(JsonObject['data']['name']);
            }
            else{
                $("input[name='name'", $("#frmSaveFactor")).val('');
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
            $("input[name='name'", $("#frmSaveFactor")).val('');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}