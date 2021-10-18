function AddSuppResInBatch() {
	$.ajax({
        url: "add_res_supp_in_batch",
        method: "post",
        data: $('#formAddSuppResInBatch').serialize(),
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
            	$("#modalAddToBatchSuppAudit").modal('hide');
            	$("#formAddSuppResInBatch")[0].reset();
                dataTableSupplierAudits.draw();
                dataTableSuppResInBatch.draw();
                dataTableSupplierBatch.draw();
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

function RemoveSuppResInBatch() {
    $.ajax({
        url: "remove_res_supp_in_batch",
        method: "post",
        data: $('#formRemoveSuppResInBatch').serialize(),
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
                $("#modalRemoveToBatchSuppAudit").modal('hide');
                $("#formRemoveSuppResInBatch")[0].reset();
                dataTableSupplierAudits.draw();
                dataTableSuppResInBatch.draw();
                dataTableSupplierBatch.draw();
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