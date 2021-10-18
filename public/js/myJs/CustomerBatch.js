function AddCusBatch() {
	$.ajax({
        url: "add_customer_batch",
        method: "post",
        data: $('#formAddCusBatch').serialize(),
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
            	$("#modalAddCusBatch").modal('hide');
            	$("#formAddCusBatch")[0].reset();
            	dataTableCustomerBatch.draw();
                $("#txtAddCusBatchName").removeClass('border-danger');
                $("#txtAddCusBatchName").removeAttr('title');

                $("#selAddCusBatchDept").val(0).trigger('change');
                $("#selAddCusBatchAuditor").val(-1).trigger('change');
                $("#selAddCusBatchAuditees").val(-1).trigger('change');
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

                if(JsonObject['error']['customer_batch_name'] != undefined){
                    $("#txtAddCusBatchName").addClass('border-danger');
                    $("#txtAddCusBatchName").attr('title', JsonObject['error']['customer_batch_name']);
                }
                else{
                    $("#txtAddCusBatchName").removeClass('border-danger');
                    $("#txtAddCusBatchName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ArchiveCusBatch() {
    $.ajax({
        url: "archive_customer_batch",
        method: "post",
        data: $('#formArchiveCusBatch').serialize(),
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
                $("#modalArchiveCusBatch").modal('hide');
                $("#formArchiveCusBatch")[0].reset();
                dataTableCustomerBatch.draw();
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

function RestoreCusBatch() {
    $.ajax({
        url: "restore_customer_batch",
        method: "post",
        data: $('#formRestoreCusBatch').serialize(),
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
                $("#modalRestoreCusBatch").modal('hide');
                $("#formRestoreCusBatch")[0].reset();
                dataTableCustomerBatch.draw();
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

function GetCusBatchByIdToEdit(cusBatchId){
    $.ajax({
        url: 'get_customer_batch_by_id',
        method: 'get',
        data: {
            'customer_batch_id': cusBatchId
        },
        dataType: 'json',
        beforeSend: function(){
            $("#selAddCusBatchDept").val(0).trigger('change');
            $("#selAddCusBatchAuditor").val(-1).trigger('change');
            $("#selAddCusBatchAuditees").val(-1).trigger('change');
        },
        success: function(JsonObject){
            if(JsonObject['customer_batch'].length > 0){
                $("#txtEditCusBatchName").val(JsonObject['customer_batch'][0].customer_batch_name);
                $("#dateEditCusBatchDateFrom").val(JsonObject['customer_batch'][0].audit_date_from);
                $("#dateEditCusBatchDateTo").val(JsonObject['customer_batch'][0].audit_date_to);
                $("#dateEditCusBatchIssuedDate").val(JsonObject['customer_batch'][0].issued_date);
                $("#dateEditCusBatchDueDate").val(JsonObject['customer_batch'][0].due_date);
                let arrDepartments = [];
                for(let index = 0; index < JsonObject['customer_batch'][0].customer_batch_departments.length; index++){
                    arrDepartments.push(JsonObject['customer_batch'][0].customer_batch_departments[index].department_id);
                }
                $("#selEditCusBatchDept").val(arrDepartments).trigger('change');

                let arrAuditors = [];
                for(let index = 0; index < JsonObject['customer_batch'][0].customer_batch_auditors.length; index++){
                    arrAuditors.push(JsonObject['customer_batch'][0].customer_batch_auditors[index].user_id);
                }
                $("#selEditCusBatchAuditor").val(arrAuditors).trigger('change');

                let arrAuditees = [];
                for(let index = 0; index < JsonObject['customer_batch'][0].customer_batch_auditees.length; index++){
                    arrAuditees.push(JsonObject['customer_batch'][0].customer_batch_auditees[index].user_id);
                }
                $("#selEditCusBatchAuditees").val(arrAuditees).trigger('change');
            }
            else{
                $("#txtEditCusBatchName").val("No record found!");
            }
        },
        error: function(data, xhr, status){
            $("#txtEditCusBatchName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetCusBatchByIdToView(cusBatchId){
    $.ajax({
        url: 'get_customer_batch_by_id',
        method: 'get',
        data: {
            'customer_batch_id': cusBatchId
        },
        dataType: 'json',
        beforeSend: function(){
            
        },
        success: function(JsonObject){
            if(JsonObject['customer_batch'].length > 0){
                $("#lblViewCusBatchName").text(JsonObject['customer_batch'][0].customer_batch_name);
                $("#lblViewCusBatchDateFrom").text(JsonObject['customer_batch'][0].audit_date_from);
                $("#lblViewCusBatchDateTo").text(JsonObject['customer_batch'][0].audit_date_to);
                $("#lblViewCusBatchIssuedDate").text(JsonObject['customer_batch'][0].issued_date);
                $("#lblViewCusBatchDueDate").text(JsonObject['customer_batch'][0].due_date);
                let savingStat = JsonObject['customer_batch'][0].saving_stat;
                let savingStatLabel = '<span class="tag tag-warning">Save as Draft</span>';
                if(savingStat == 2){
                    savingStatLabel = '<span class="tag tag-success">Save and Send</span>';
                }

                $("#lblViewCusBatchSavingStat").html(savingStatLabel);

                let arrDepartments = "";
                for(let index = 0; index < JsonObject['customer_batch'][0].customer_batch_departments.length; index++){
                    arrDepartments += JsonObject['customer_batch'][0].customer_batch_departments[index].department.department_name;
                    if(index < (JsonObject['customer_batch'][0].customer_batch_departments.length - 1)){
                        arrDepartments += " / ";
                    }
                }
                $("#lblViewCusBatchDepartments").text(arrDepartments);

                let arrAuditors = "";
                for(let index = 0; index < JsonObject['customer_batch'][0].customer_batch_auditors.length; index++){
                    arrAuditors += JsonObject['customer_batch'][0].customer_batch_auditors[index].auditor.name;
                    if(index < (JsonObject['customer_batch'][0].customer_batch_auditors.length - 1)){
                        arrAuditors += " / ";
                    }
                }
                $("#lblViewCusBatchAuditors").text(arrAuditors);

                let arrAuditees = "";
                for(let index = 0; index < JsonObject['customer_batch'][0].customer_batch_auditees.length; index++){
                    arrAuditees += JsonObject['customer_batch'][0].customer_batch_auditees[index].auditee.name;
                    if(index < (JsonObject['customer_batch'][0].customer_batch_auditees.length - 1)){
                        arrAuditees += " / ";
                    }
                }
                $("#lblViewCusBatchAuditees").text(arrAuditees);
            }
            else{
                $("#txtEditCusBatchName").val("No record found!");
            }
        },
        error: function(data, xhr, status){
            $("#txtEditCusBatchName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function EditCusBatch(){
    $.ajax({
        url: "edit_customer_batch",
        method: "post",
        data: $('#formEditCusBatch').serialize(),
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
                $("#modalEditCusBatch").modal('hide');
                $("#formEditCusBatch")[0].reset();
                dataTableCustomerBatch.draw();
                $("#txtEditCusBatchName").removeClass('border-danger');
                $("#txtEditCusBatchName").removeAttr('title');
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

                if(JsonObject['error']['customer_batch_name'] != undefined){
                    $("#txtEditCusBatchName").addClass('border-danger');
                    $("#txtEditCusBatchName").attr('title', JsonObject['error']['customer_batch_name']);
                }
                else{
                    $("#txtEditCusBatchName").removeClass('border-danger');
                    $("#txtEditCusBatchName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function CusBatchSaveByStat(customer_batch_id, saving_status, _token) {
    $.ajax({
        url: "customer_batch_by_stat",
        method: "post",
        data: {
            _token: _token,
            customer_batch_id: customer_batch_id,
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
                $("#modalResultsCusBatch").modal('hide');
                dataTableCustomerBatch.draw();
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