function AddEvaluationItem() {
	$.ajax({
        url: "add_evaluation_item",
        method: "post",
        data: $('#formAddEvaluationItem').serialize(),
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
            	$("#modalAddEvaluationItem").modal('hide');
            	$("#formAddEvaluationItem")[0].reset();
            	dataTableEvaluationItem.draw();
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

                if(JsonObject['error']['evaluation_item_name'] != undefined){
                    $("#txtAddStdClauseName").addClass('border-danger');
                    $("#txtAddStdClauseName").attr('title', JsonObject['error']['evaluation_item_name']);
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

function ArchiveEvaluationItem() {
	$.ajax({
        url: "archive_evaluation_item",
        method: "post",
        data: $('#formArchiveEvaluationItem').serialize(),
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
            	$("#modalArchiveEvaluationItem").modal('hide');
            	$("#formArchiveEvaluationItem")[0].reset();
            	dataTableEvaluationItem.draw();
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

function RestoreEvaluationItem() {
	$.ajax({
        url: "restore_evaluation_item",
        method: "post",
        data: $('#formRestoreEvaluationItem').serialize(),
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
            	$("#modalRestoreEvaluationItem").modal('hide');
            	$("#formRestoreEvaluationItem")[0].reset();
            	dataTableEvaluationItem.draw();
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

function GetEvaluationItemByIdToEdit(evaluationItemId){
	$.ajax({
		url: 'get_evaluation_item_by_id',
		method: 'get',
		data: {
			'evaluation_item_id': evaluationItemId
		},
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['evaluation_item'].length > 0){
				$("#txtEditEvaluationItemName").val(JsonObject['evaluation_item'][0].evaluation_item_name);
			}
			else{
				$("#txtEditEvaluationItemName").val("No record found!");
			}
		},
		error: function(data, xhr, status){
			$("#txtEditEvaluationItemName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function EditEvaluationItem(){
    $.ajax({
        url: "edit_evaluation_item",
        method: "post",
        data: $('#formEditEvaluationItem').serialize(),
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
                $("#modalEditEvaluationItem").modal('hide');
                $("#formEditEvaluationItem")[0].reset();
                dataTableEvaluationItem.draw();
                $("#txtEditEvaluationItemName").removeClass('border-danger');
                $("#txtEditEvaluationItemName").removeAttr('title');
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

                if(JsonObject['error']['evaluation_item_name'] != undefined){
                    $("#txtEditEvaluationItemName").addClass('border-danger');
                    $("#txtEditEvaluationItemName").attr('title', JsonObject['error']['evaluation_item_name']);
                }
                else{
                    $("#txtEditEvaluationItemName").removeClass('border-danger');
                    $("#txtEditEvaluationItemName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetCboEvaluationItemByStat(evaluationItemStat, cboElement){
	let result = '<option value="0" selected disabled> -- Select Evaluation Item -- </option>';
	$.ajax({
		url: 'get_evaluation_item_by_stat',
		method: 'get',
		data: {
			'evaluation_item_stat': evaluationItemStat
		},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" selected disabled> -- Loading -- </option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['evaluation_items'].length > 0){
				result = '<option value="0" selected disabled> -- Select Evaluation Item -- </option>';
				for(let index = 0; index < JsonObject['evaluation_items'].length; index++){
					result += '<option value="' + JsonObject['evaluation_items'][index].evaluation_item_id + '">' + JsonObject['evaluation_items'][index].evaluation_item_name + '</option>';
				}
			}
			else{
				result = '<option value="0" selected disabled> -- No record found -- </option>';
			}
			cboElement.html(result);
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
			result = '<option value="0" selected disabled> -- Reload Again -- </option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}