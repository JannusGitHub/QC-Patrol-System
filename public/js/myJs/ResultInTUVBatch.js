function AddTUVResInBatch() {
	$.ajax({
        url: "add_res_tuv_in_batch",
        method: "post",
        data: $('#formAddTUVResInBatch').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Added Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            	$("#modalAddToBatchTUVAudit").modal('hide');
            	$("#formAddTUVResInBatch")[0].reset();
                dataTableTUVAudits.draw();
                dataTableTUVResInBatch.draw();
                dataTableTUVBatch.draw();
            }
            else{
            	Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Adding Failed!',
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

function RemoveTUVResInBatch() {
    $.ajax({
        url: "remove_res_tuv_in_batch",
        method: "post",
        data: $('#formRemoveTUVResInBatch').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Removed Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalRemoveToBatchTUVAudit").modal('hide');
                $("#formRemoveTUVResInBatch")[0].reset();
                dataTableTUVAudits.draw();
                dataTableTUVResInBatch.draw();
                dataTableTUVBatch.draw();
            }
            else{
                Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Removing Failed!',
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