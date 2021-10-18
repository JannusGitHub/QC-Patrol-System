function AddIntBatch() {
	$.ajax({
        url: "add_internal_batch",
        method: "post",
        data: $('#formAddIntBatch').serialize(),
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
            	$("#modalAddIntBatch").modal('hide');
            	$("#formAddIntBatch")[0].reset();
            	dataTableInternalBatch.draw();
                $("#txtAddIntBatchName").removeClass('border-danger');
                $("#txtAddIntBatchName").removeAttr('title');

                $("#selAddIntBatchDept").val(0).trigger('change');
                $("#selAddIntBatchAuditor").val(-1).trigger('change');
                $("#selAddIntBatchAuditees").val(-1).trigger('change');
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

                if(JsonObject['error']['internal_batch_name'] != undefined){
                    $("#txtAddIntBatchName").addClass('border-danger');
                    $("#txtAddIntBatchName").attr('title', JsonObject['error']['internal_batch_name']);
                }
                else{
                    $("#txtAddIntBatchName").removeClass('border-danger');
                    $("#txtAddIntBatchName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ArchiveIntBatch() {
	$.ajax({
        url: "archive_internal_batch",
        method: "post",
        data: $('#formArchiveIntBatch').serialize(),
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
            	$("#modalArchiveIntBatch").modal('hide');
            	$("#formArchiveIntBatch")[0].reset();
            	dataTableInternalBatch.draw();
                // dataTableInternalAudits.draw();
                // dataTableIntResInBatch.draw();
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

function RestoreIntBatch() {
	$.ajax({
        url: "restore_internal_batch",
        method: "post",
        data: $('#formRestoreIntBatch').serialize(),
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
            	$("#modalRestoreIntBatch").modal('hide');
            	$("#formRestoreIntBatch")[0].reset();
            	dataTableInternalBatch.draw();
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

function GetIntBatchByIdToEdit(intBatchId){
	$.ajax({
		url: 'get_internal_batch_by_id',
		method: 'get',
		data: {
			'internal_batch_id': intBatchId
		},
		dataType: 'json',
		beforeSend: function(){
            $("#selAddIntBatchDept").val(0).trigger('change');
            $("#selAddIntBatchAuditor").val(-1).trigger('change');
            $("#selAddIntBatchAuditees").val(-1).trigger('change');
		},
		success: function(JsonObject){
			if(JsonObject['internal_batch'].length > 0){
				$("#txtEditIntBatchName").val(JsonObject['internal_batch'][0].internal_batch_name);
		        $("#dateEditIntBatchDateFrom").val(JsonObject['internal_batch'][0].audit_date_from);
                $("#dateEditIntBatchDateTo").val(JsonObject['internal_batch'][0].audit_date_to);
                $("#dateEditIntBatchIssuedDate").val(JsonObject['internal_batch'][0].issued_date);
                $("#dateEditIntBatchDueDate").val(JsonObject['internal_batch'][0].due_date);
                let arrDepartments = [];
                for(let index = 0; index < JsonObject['internal_batch'][0].internal_batch_departments.length; index++){
                    arrDepartments.push(JsonObject['internal_batch'][0].internal_batch_departments[index].department_id);
                }
                $("#selEditIntBatchDept").val(arrDepartments).trigger('change');

                let arrAuditors = [];
                for(let index = 0; index < JsonObject['internal_batch'][0].internal_batch_auditors.length; index++){
                    arrAuditors.push(JsonObject['internal_batch'][0].internal_batch_auditors[index].user_id);
                }
                $("#selEditIntBatchAuditor").val(arrAuditors).trigger('change');

                let arrAuditees = [];
                for(let index = 0; index < JsonObject['internal_batch'][0].internal_batch_auditees.length; index++){
                    arrAuditees.push(JsonObject['internal_batch'][0].internal_batch_auditees[index].user_id);
                }
                $("#selEditIntBatchAuditees").val(arrAuditees).trigger('change');
            }
			else{
				$("#txtEditIntBatchName").val("No record found!");
			}
		},
		error: function(data, xhr, status){
			$("#txtEditIntBatchName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function GetIntBatchByIdToView(intBatchId){
    $.ajax({
        url: 'get_internal_batch_by_id',
        method: 'get',
        data: {
            'internal_batch_id': intBatchId
        },
        dataType: 'json',
        beforeSend: function(){
            
        },
        success: function(JsonObject){
            if(JsonObject['internal_batch'].length > 0){
                $("#lblViewIntBatchName").text(JsonObject['internal_batch'][0].internal_batch_name);
                $("#lblViewIntBatchDateFrom").text(JsonObject['internal_batch'][0].audit_date_from);
                $("#lblViewIntBatchDateTo").text(JsonObject['internal_batch'][0].audit_date_to);
                $("#lblViewIntBatchIssuedDate").text(JsonObject['internal_batch'][0].issued_date);
                $("#lblViewIntBatchDueDate").text(JsonObject['internal_batch'][0].due_date);
                let savingStat = JsonObject['internal_batch'][0].saving_stat;
                let savingStatLabel = '<span class="tag tag-warning">Save as Draft</span>';
                if(savingStat == 2){
                    savingStatLabel = '<span class="tag tag-success">Save and Send</span>';
                }

                $("#lblViewIntBatchSavingStat").html(savingStatLabel);

                let arrDepartments = "";
                for(let index = 0; index < JsonObject['internal_batch'][0].internal_batch_departments.length; index++){
                    arrDepartments += JsonObject['internal_batch'][0].internal_batch_departments[index].department.department_name;
                    if(index < (JsonObject['internal_batch'][0].internal_batch_departments.length - 1)){
                        arrDepartments += " / ";
                    }
                }
                $("#lblViewIntBatchDepartments").text(arrDepartments);

                let arrAuditors = "";
                for(let index = 0; index < JsonObject['internal_batch'][0].internal_batch_auditors.length; index++){
                    arrAuditors += JsonObject['internal_batch'][0].internal_batch_auditors[index].auditor.name;
                    if(index < (JsonObject['internal_batch'][0].internal_batch_auditors.length - 1)){
                        arrAuditors += " / ";
                    }
                }
                $("#lblViewIntBatchAuditors").text(arrAuditors);

                let arrAuditees = "";
                for(let index = 0; index < JsonObject['internal_batch'][0].internal_batch_auditees.length; index++){
                    arrAuditees += JsonObject['internal_batch'][0].internal_batch_auditees[index].auditee.name;
                    if(index < (JsonObject['internal_batch'][0].internal_batch_auditees.length - 1)){
                        arrAuditees += " / ";
                    }
                }
                $("#lblViewIntBatchAuditees").text(arrAuditees);
            }
            else{
                $("#txtEditIntBatchName").val("No record found!");
            }
        },
        error: function(data, xhr, status){
            $("#txtEditIntBatchName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function EditIntBatch(){
    $.ajax({
        url: "edit_internal_batch",
        method: "post",
        data: $('#formEditIntBatch').serialize(),
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
                $("#modalEditIntBatch").modal('hide');
                $("#formEditIntBatch")[0].reset();
                dataTableInternalBatch.draw();
                $("#txtEditIntBatchName").removeClass('border-danger');
                $("#txtEditIntBatchName").removeAttr('title');
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

                if(JsonObject['error']['internal_batch_name'] != undefined){
                    $("#txtEditIntBatchName").addClass('border-danger');
                    $("#txtEditIntBatchName").attr('title', JsonObject['error']['internal_batch_name']);
                }
                else{
                    $("#txtEditIntBatchName").removeClass('border-danger');
                    $("#txtEditIntBatchName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function IntBatchSaveByStat(internal_batch_id, saving_status, _token) {
    $.ajax({
        url: "save_internal_batch_by_stat",
        method: "post",
        data: {
            _token: _token,
            internal_batch_id: internal_batch_id,
            saving_stat: saving_status
        },
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
                $("#modalResultsIntBatch").modal('hide');
                dataTableInternalBatch.draw();
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