function AddCusResInBatch() {
    $.ajax({
        url: "add_res_cus_in_batch",
        method: "post",
        data: $('#formAddCusResInBatch').serialize(),
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
                $("#modalAddToBatchCusAudit").modal('hide');
                $("#formAddCusResInBatch")[0].reset();
                dataTableCustomerAudits.draw();
                dataTableCusResInBatch.draw();
                dataTableCustomerBatch.draw();
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

function RemoveCusResInBatch() {
	$.ajax({
        url: "remove_res_cus_in_batch",
        method: "post",
        data: $('#formRemoveCusResInBatch').serialize(),
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
            	$("#modalRemoveToBatchCusAudit").modal('hide');
            	$("#formRemoveCusResInBatch")[0].reset();
                dataTableCustomerAudits.draw();
                dataTableCusResInBatch.draw();
                dataTableCustomerBatch.draw();
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