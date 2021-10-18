function AddOtherSectionRecipient() {
	$.ajax({
        url: "add_other_section_recipient",
        method: "post",
        data: $('#formAddOtherSectionRecipient').serialize(),
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
            	$("#modalAddOtherSectionRecipient").modal('hide');
            	$("#formAddOtherSectionRecipient")[0].reset();
                $("#selAddOtherSecRecDept").val('0').trigger('change');
                $("#selAddOtherSecRecReceiver").val('0').trigger('change');
            	dataTableOtherSectionRecipient.draw();
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

                // if(JsonObject['error']['other_section_recipient_name'] != undefined){
                //     $("#txtAddStdClauseName").addClass('border-danger');
                //     $("#txtAddStdClauseName").attr('title', JsonObject['error']['other_section_recipient_name']);
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

function RemoveOtherSectionRecipient() {
	$.ajax({
        url: "remove_other_section_recipient",
        method: "post",
        data: $('#formRemoveOtherSectionRecipient').serialize(),
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
            	$("#modalRemoveOtherSectionRecipient").modal('hide');
            	$("#formRemoveOtherSectionRecipient")[0].reset();
            	dataTableOtherSectionRecipient.draw();
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

// function RestoreOtherSectionRecipient() {
// 	$.ajax({
//         url: "restore_other_section_recipient",
//         method: "post",
//         data: $('#formRestoreOtherSectionRecipient').serialize(),
//         dataType: "json",
//         beforeSend: function(){

//         },
//         success: function(JsonObject){
//             if(JsonObject['result'] == 1){
//                 Swal({
//                     position: 'top-end',
//                     type: 'success',
//                     title: 'Restored Successfully!',
//                     showConfirmButton: false,
//                     timer: 1500,
//                     customClass: 'swal-wide',
//                 });
//             	$("#modalRestoreOtherSectionRecipient").modal('hide');
//             	$("#formRestoreOtherSectionRecipient")[0].reset();
//             	dataTableOtherSectionRecipient.draw();
//             }
//             else{
//             	Swal({
//                     position: 'top-end',
//                     type: 'error',
//                     title: 'Restoring Failed!',
//                     showConfirmButton: false,
//                     timer: 1500,
//                     customClass: 'swal-wide',
//                 });
//             }
//         },
//         error: function(data, xhr, status){
//             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }
//     });
// }

// function GetOtherSectionRecipientByIdToEdit(recepientId){
// 	$.ajax({
// 		url: 'get_other_section_recipient_by_id',
// 		method: 'get',
// 		data: {
// 			'other_section_recipient_id': recepientId
// 		},
// 		dataType: 'json',
// 		beforeSend: function(){
			
// 		},
// 		success: function(JsonObject){
// 			if(JsonObject['other_section_recipient'].length > 0){
// 				$("#txtEditOtherSectionRecipientName").val(JsonObject['other_section_recipient'][0].other_section_recipient_name);
// 			}
// 			else{
// 				$("#txtEditOtherSectionRecipientName").val("No record found!");
// 			}
// 		},
// 		error: function(data, xhr, status){
// 			$("#txtEditOtherSectionRecipientName").val("Reload Again!");
//             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }
// 	});
// }

// function EditOtherSectionRecipient(){
//     $.ajax({
//         url: "edit_other_section_recipient",
//         method: "post",
//         data: $('#formEditOtherSectionRecipient').serialize(),
//         dataType: "json",
//         beforeSend: function(){

//         },
//         success: function(JsonObject){
//             if(JsonObject['result'] == 1){
//                 Swal({
//                     position: 'top-end',
//                     type: 'success',
//                     title: 'Updated Successfully!',
//                     showConfirmButton: false,
//                     timer: 1500,
//                     customClass: 'swal-wide',
//                 });
//                 $("#modalEditOtherSectionRecipient").modal('hide');
//                 $("#formEditOtherSectionRecipient")[0].reset();
//                 dataTableOtherSectionRecipient.draw();
//                 $("#txtEditOtherSectionRecipientName").removeClass('border-danger');
//                 $("#txtEditOtherSectionRecipientName").removeAttr('title');
//             }
//             else{
//                 Swal({
//                     position: 'top-end',
//                     type: 'error',
//                     title: 'Updating Failed!',
//                     showConfirmButton: false,
//                     timer: 1500,
//                     customClass: 'swal-wide',
//                 });

//                 if(JsonObject['error']['other_section_recipient_name'] != undefined){
//                     $("#txtEditOtherSectionRecipientName").addClass('border-danger');
//                     $("#txtEditOtherSectionRecipientName").attr('title', JsonObject['error']['other_section_recipient_name']);
//                 }
//                 else{
//                     $("#txtEditOtherSectionRecipientName").removeClass('border-danger');
//                     $("#txtEditOtherSectionRecipientName").removeAttr('title');
//                 }
//             }
//         },
//         error: function(data, xhr, status){
//             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }
//     });
// }