function AddSuppBatch() {
	$.ajax({
        url: "add_supplier_batch",
        method: "post",
        data: $('#formAddSuppBatch').serialize(),
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
            	$("#modalAddSuppBatch").modal('hide');
            	$("#formAddSuppBatch")[0].reset();
            	dataTableSupplierBatch.draw();
                $("#txtAddSuppBatchName").removeClass('border-danger');
                $("#txtAddSuppBatchName").removeAttr('title');

                $("#selAddSuppBatchDept").val(0).trigger('change');
                $("#selAddSuppBatchAuditor").val(-1).trigger('change');
                $("#selAddSuppBatchAuditees").val(-1).trigger('change');
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

                if(JsonObject['error']['supplier_batch_name'] != undefined){
                    $("#txtAddSuppBatchName").addClass('border-danger');
                    $("#txtAddSuppBatchName").attr('title', JsonObject['error']['supplier_batch_name']);
                }
                else{
                    $("#txtAddSuppBatchName").removeClass('border-danger');
                    $("#txtAddSuppBatchName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ArchiveSuppBatch() {
    $.ajax({
        url: "archive_supplier_batch",
        method: "post",
        data: $('#formArchiveSuppBatch').serialize(),
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
                $("#modalArchiveSuppBatch").modal('hide');
                $("#formArchiveSuppBatch")[0].reset();
                dataTableSupplierBatch.draw();
                // dataTableSupplierAudits.draw();
                // dataTableSuppResInBatch.draw();
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

function RestoreSuppBatch() {
    $.ajax({
        url: "restore_supplier_batch",
        method: "post",
        data: $('#formRestoreSuppBatch').serialize(),
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
                $("#modalRestoreSuppBatch").modal('hide');
                $("#formRestoreSuppBatch")[0].reset();
                dataTableSupplierBatch.draw();
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

function GetSuppBatchByIdToEdit(suppBatchId){
    $.ajax({
        url: 'get_supplier_batch_by_id',
        method: 'get',
        data: {
            'supplier_batch_id': suppBatchId
        },
        dataType: 'json',
        beforeSend: function(){
            $("#selAddSuppBatchDept").val(0).trigger('change');
            $("#selAddSuppBatchAuditor").val(-1).trigger('change');
            $("#selAddSuppBatchAuditees").val(-1).trigger('change');
        },
        success: function(JsonObject){
            if(JsonObject['supplier_batch'].length > 0){
                $("#txtEditSuppBatchName").val(JsonObject['supplier_batch'][0].supplier_batch_name);
                $("#txtEditSuppBatchSuppCus").val(JsonObject['supplier_batch'][0].supplier_customer);
                $("#dateEditSuppBatchDateFrom").val(JsonObject['supplier_batch'][0].audit_date_from);
                $("#dateEditSuppBatchDateTo").val(JsonObject['supplier_batch'][0].audit_date_to);
                $("#dateEditSuppBatchIssuedDate").val(JsonObject['supplier_batch'][0].issued_date);
                $("#dateEditSuppBatchDueDate").val(JsonObject['supplier_batch'][0].due_date);
                let arrDepartments = [];
                for(let index = 0; index < JsonObject['supplier_batch'][0].supplier_batch_departments.length; index++){
                    arrDepartments.push(JsonObject['supplier_batch'][0].supplier_batch_departments[index].department_id);
                }
                $("#selEditSuppBatchDept").val(arrDepartments).trigger('change');

                let arrAuditors = [];
                for(let index = 0; index < JsonObject['supplier_batch'][0].supplier_batch_auditors.length; index++){
                    arrAuditors.push(JsonObject['supplier_batch'][0].supplier_batch_auditors[index].user_id);
                }
                $("#selEditSuppBatchAuditor").val(arrAuditors).trigger('change');

                let arrAuditees = [];
                for(let index = 0; index < JsonObject['supplier_batch'][0].supplier_batch_auditees.length; index++){
                    arrAuditees.push(JsonObject['supplier_batch'][0].supplier_batch_auditees[index].user_id);
                }
                $("#selEditSuppBatchAuditees").val(arrAuditees).trigger('change');
            }
            else{
                $("#txtEditSuppBatchName").val("No record found!");
            }
        },
        error: function(data, xhr, status){
            $("#txtEditSuppBatchName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetSuppBatchByIdToView(suppBatchId){
    $.ajax({
        url: 'get_supplier_batch_by_id',
        method: 'get',
        data: {
            'supplier_batch_id': suppBatchId
        },
        dataType: 'json',
        beforeSend: function(){
            
        },
        success: function(JsonObject){
            if(JsonObject['supplier_batch'].length > 0){
                $("#lblViewSuppBatchName").text(JsonObject['supplier_batch'][0].supplier_batch_name);
                $("#lblViewSuppBatchDateFrom").text(JsonObject['supplier_batch'][0].audit_date_from);
                $("#lblViewSuppBatchDateTo").text(JsonObject['supplier_batch'][0].audit_date_to);
                $("#lblViewSuppBatchIssuedDate").text(JsonObject['supplier_batch'][0].issued_date);
                $("#lblViewSuppBatchDueDate").text(JsonObject['supplier_batch'][0].due_date);
                $("#lblViewSuppBatchCust").text(JsonObject['supplier_batch'][0].supplier_customer);
                let savingStat = JsonObject['supplier_batch'][0].saving_stat;
                let savingStatLabel = '<span class="tag tag-warning">Save as Draft</span>';
                if(savingStat == 2){
                    savingStatLabel = '<span class="tag tag-success">Save and Send</span>';
                }

                $("#lblViewSuppBatchSavingStat").html(savingStatLabel);

                let arrDepartments = "";
                for(let index = 0; index < JsonObject['supplier_batch'][0].supplier_batch_departments.length; index++){
                    arrDepartments += JsonObject['supplier_batch'][0].supplier_batch_departments[index].department.department_name;
                    if(index < (JsonObject['supplier_batch'][0].supplier_batch_departments.length - 1)){
                        arrDepartments += " / ";
                    }
                }
                $("#lblViewSuppBatchDepartments").text(arrDepartments);

                let arrAuditors = "";
                for(let index = 0; index < JsonObject['supplier_batch'][0].supplier_batch_auditors.length; index++){
                    arrAuditors += JsonObject['supplier_batch'][0].supplier_batch_auditors[index].auditor.name;
                    if(index < (JsonObject['supplier_batch'][0].supplier_batch_auditors.length - 1)){
                        arrAuditors += " / ";
                    }
                }
                $("#lblViewSuppBatchAuditors").text(arrAuditors);

                let arrAuditees = "";
                for(let index = 0; index < JsonObject['supplier_batch'][0].supplier_batch_auditees.length; index++){
                    arrAuditees += JsonObject['supplier_batch'][0].supplier_batch_auditees[index].auditee.name;
                    if(index < (JsonObject['supplier_batch'][0].supplier_batch_auditees.length - 1)){
                        arrAuditees += " / ";
                    }
                }
                $("#lblViewSuppBatchAuditees").text(arrAuditees);
            }
            else{
                $("#txtEditSuppBatchName").val("No record found!");
            }
        },
        error: function(data, xhr, status){
            $("#txtEditSuppBatchName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function EditSuppBatch(){
    $.ajax({
        url: "edit_supplier_batch",
        method: "post",
        data: $('#formEditSuppBatch').serialize(),
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
                $("#modalEditSuppBatch").modal('hide');
                $("#formEditSuppBatch")[0].reset();
                dataTableSupplierBatch.draw();
                $("#txtEditSuppBatchName").removeClass('border-danger');
                $("#txtEditSuppBatchName").removeAttr('title');
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

                if(JsonObject['error']['supplier_batch_name'] != undefined){
                    $("#txtEditSuppBatchName").addClass('border-danger');
                    $("#txtEditSuppBatchName").attr('title', JsonObject['error']['supplier_batch_name']);
                }
                else{
                    $("#txtEditSuppBatchName").removeClass('border-danger');
                    $("#txtEditSuppBatchName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function SuppBatchSaveByStat(supplier_batch_id, saving_status, _token) {
    $.ajax({
        url: "save_supplier_batch_by_stat",
        method: "post",
        data: {
            _token: _token,
            supplier_batch_id: supplier_batch_id,
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
                $("#modalResultsSuppBatch").modal('hide');
                dataTableSupplierBatch.draw();
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
