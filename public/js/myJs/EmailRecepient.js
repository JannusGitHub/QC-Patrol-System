function AddEmailRecepient() {
	$.ajax({
        url: "add_email_recepient",
        method: "post",
        data: $('#formAddEmailRecepient').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
        	// alert(JSON.stringify(JsonObject));
        	// return;
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Saved Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            	$("#modalAddEmailRecepient").modal('hide');
            	$("#formAddEmailRecepient")[0].reset();
            	dataTableEmailRecepient.draw();
                $("#txtAddStdClauseName").removeClass('border-danger');
                $("#txtAddStdClauseName").removeAttr('title');
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

                if(JsonObject['error']['email_recepient_name'] != undefined){
                    $("#txtAddStdClauseName").addClass('border-danger');
                    $("#txtAddStdClauseName").attr('title', JsonObject['error']['email_recepient_name']);
                }
                else{
                    $("#txtAddStdClauseName").removeClass('border-danger');
                    $("#txtAddStdClauseName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ArchiveEmailRecepient() {
	$.ajax({
        url: "archive_email_recepient",
        method: "post",
        data: $('#formArchiveEmailRecepient').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Archived Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            	$("#modalArchiveEmailRecepient").modal('hide');
            	$("#formArchiveEmailRecepient")[0].reset();
            	dataTableEmailRecepient.draw();
            }
            else{
            	Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Archiving Failed!',
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

function RestoreEmailRecepient() {
	$.ajax({
        url: "restore_email_recepient",
        method: "post",
        data: $('#formRestoreEmailRecepient').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Restored Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            	$("#modalRestoreEmailRecepient").modal('hide');
            	$("#formRestoreEmailRecepient")[0].reset();
            	dataTableEmailRecepient.draw();
            }
            else{
            	Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Restoring Failed!',
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

function GetEmailRecepientByIdToEdit(recepientId){
	$.ajax({
		url: 'get_email_recepient_by_id',
		method: 'get',
		data: {
			'email_recepient_id': recepientId
		},
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['email_recepient'].length > 0){
				$("#txtEditEmailRecepientName").val(JsonObject['email_recepient'][0].email_recepient_name);
			}
			else{
				$("#txtEditEmailRecepientName").val("No record found!");
			}
		},
		error: function(data, xhr, status){
			$("#txtEditEmailRecepientName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function EditEmailRecepient(){
    $.ajax({
        url: "edit_email_recepient",
        method: "post",
        data: $('#formEditEmailRecepient').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Updated Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalEditEmailRecepient").modal('hide');
                $("#formEditEmailRecepient")[0].reset();
                dataTableEmailRecepient.draw();
                $("#txtEditEmailRecepientName").removeClass('border-danger');
                $("#txtEditEmailRecepientName").removeAttr('title');
            }
            else{
                Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Updating Failed!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });

                if(JsonObject['error']['email_recepient_name'] != undefined){
                    $("#txtEditEmailRecepientName").addClass('border-danger');
                    $("#txtEditEmailRecepientName").attr('title', JsonObject['error']['email_recepient_name']);
                }
                else{
                    $("#txtEditEmailRecepientName").removeClass('border-danger');
                    $("#txtEditEmailRecepientName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}