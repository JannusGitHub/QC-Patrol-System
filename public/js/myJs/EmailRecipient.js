function AddEmailRecipient() {
	$.ajax({
        url: "add_email_recipient",
        method: "post",
        data: $('#formAddEmailRecipient').serialize(),
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
            	$("#modalAddEmailRecipient").modal('hide');
            	$("#formAddEmailRecipient")[0].reset();
                $("#selAddEmailRecDept").val('0').trigger('change');
                $("#selAddEmailRecReceiver").val('0').trigger('change');
            	dataTableEmailRecipient.draw();
                // $("#txtAddStdClauseName").removeClass('border-danger');
                // $("#txtAddStdClauseName").removeAttr('title');
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

                // if(JsonObject['error']['email_recipient_name'] != undefined){
                //     $("#txtAddStdClauseName").addClass('border-danger');
                //     $("#txtAddStdClauseName").attr('title', JsonObject['error']['email_recipient_name']);
                // }
                // else{
                //     $("#txtAddStdClauseName").removeClass('border-danger');
                //     $("#txtAddStdClauseName").removeAttr('title');
                // }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function RemoveEmailRecipient() {
	$.ajax({
        url: "remove_email_recipient",
        method: "post",
        data: $('#formRemoveEmailRecipient').serialize(),
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
            	$("#modalRemoveEmailRecipient").modal('hide');
            	$("#formRemoveEmailRecipient")[0].reset();
            	dataTableEmailRecipient.draw();
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