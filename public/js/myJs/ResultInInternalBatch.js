function AddIntResInBatch() {
	$.ajax({
        url: "add_res_int_in_batch",
        method: "post",
        data: $('#formAddIntResInBatch').serialize(),
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
            	$("#modalAddToBatchIntAudit").modal('hide');
            	$("#formAddIntResInBatch")[0].reset();
                dataTableInternalAudits.draw();
                dataTableIntResInBatch.draw();
                dataTableInternalBatch.draw();
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

function RemoveIntResInBatch() {
	$.ajax({
        url: "remove_res_int_in_batch",
        method: "post",
        data: $('#formRemoveIntResInBatch').serialize(),
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
            	$("#modalRemoveToBatchIntAudit").modal('hide');
            	$("#formRemoveIntResInBatch")[0].reset();
                dataTableInternalAudits.draw();
                dataTableIntResInBatch.draw();
                dataTableInternalBatch.draw();
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