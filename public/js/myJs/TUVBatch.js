function AddTUVBatch() {
    $.ajax({
        url: "add_tuv_batch",
        method: "post",
        data: $('#formAddTUVBatch').serialize(),
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
                $("#modalAddTUVBatch").modal('hide');
                $("#formAddTUVBatch")[0].reset();
                dataTableTUVBatch.draw();
                $("#txtAddTUVBatchName").removeClass('border-danger');
                $("#txtAddTUVBatchName").removeAttr('title');

                $("#selAddTUVBatchDept").val(0).trigger('change');
                $("#selAddTUVBatchAuditor").val(-1).trigger('change');
                $("#selAddTUVBatchAuditees").val(-1).trigger('change');
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

                if(JsonObject['error']['tuv_batch_name'] != undefined){
                    $("#txtAddTUVBatchName").addClass('border-danger');
                    $("#txtAddTUVBatchName").attr('title', JsonObject['error']['tuv_batch_name']);
                }
                else{
                    $("#txtAddTUVBatchName").removeClass('border-danger');
                    $("#txtAddTUVBatchName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ArchiveTUVBatch() {
    $.ajax({
        url: "archive_tuv_batch",
        method: "post",
        data: $('#formArchiveTUVBatch').serialize(),
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
                $("#modalArchiveTUVBatch").modal('hide');
                $("#formArchiveTUVBatch")[0].reset();
                dataTableTUVBatch.draw();
                // dataTableTUVernalAudits.draw();
                // dataTableTUVResInBatch.draw();
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

function RestoreTUVBatch() {
    $.ajax({
        url: "restore_tuv_batch",
        method: "post",
        data: $('#formRestoreTUVBatch').serialize(),
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
                $("#modalRestoreTUVBatch").modal('hide');
                $("#formRestoreTUVBatch")[0].reset();
                dataTableTUVBatch.draw();
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

function GetTUVBatchByIdToEdit(tuvBatchId){
    $.ajax({
        url: 'get_tuv_batch_by_id',
        method: 'get',
        data: {
            'tuv_batch_id': tuvBatchId
        },
        dataType: 'json',
        beforeSend: function(){
            $("#selAddTUVBatchDept").val(0).trigger('change');
            $("#selAddTUVBatchAuditor").val(-1).trigger('change');
            $("#selAddTUVBatchAuditees").val(-1).trigger('change');
        },
        success: function(JsonObject){
            if(JsonObject['tuv_batch'].length > 0){
                $("#txtEditTUVBatchName").val(JsonObject['tuv_batch'][0].tuv_batch_name);
                $("#dateEditTUVBatchDateFrom").val(JsonObject['tuv_batch'][0].audit_date_from);
                $("#dateEditTUVBatchDateTo").val(JsonObject['tuv_batch'][0].audit_date_to);
                $("#dateEditTUVBatchIssuedDate").val(JsonObject['tuv_batch'][0].issued_date);
                $("#dateEditTUVBatchDueDate").val(JsonObject['tuv_batch'][0].due_date);
                let arrDepartments = [];
                for(let index = 0; index < JsonObject['tuv_batch'][0].tuv_batch_departments.length; index++){
                    arrDepartments.push(JsonObject['tuv_batch'][0].tuv_batch_departments[index].department_id);
                }
                $("#selEditTUVBatchDept").val(arrDepartments).trigger('change');

                let arrAuditors = [];
                for(let index = 0; index < JsonObject['tuv_batch'][0].tuv_batch_auditors.length; index++){
                    arrAuditors.push(JsonObject['tuv_batch'][0].tuv_batch_auditors[index].user_id);
                }
                $("#selEditTUVBatchAuditor").val(arrAuditors).trigger('change');

                let arrAuditees = [];
                for(let index = 0; index < JsonObject['tuv_batch'][0].tuv_batch_auditees.length; index++){
                    arrAuditees.push(JsonObject['tuv_batch'][0].tuv_batch_auditees[index].user_id);
                }
                $("#selEditTUVBatchAuditees").val(arrAuditees).trigger('change');
            }
            else{
                $("#txtEditTUVBatchName").val("No record found!");
            }
        },
        error: function(data, xhr, status){
            $("#txtEditTUVBatchName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetTUVBatchByIdToView(tuvBatchId){
    $.ajax({
        url: 'get_tuv_batch_by_id',
        method: 'get',
        data: {
            'tuv_batch_id': tuvBatchId
        },
        dataType: 'json',
        beforeSend: function(){
            
        },
        success: function(JsonObject){
            if(JsonObject['tuv_batch'].length > 0){
                $("#lblViewTUVBatchName").text(JsonObject['tuv_batch'][0].tuv_batch_name);
                $("#lblViewTUVBatchDateFrom").text(JsonObject['tuv_batch'][0].audit_date_from);
                $("#lblViewTUVBatchDateTo").text(JsonObject['tuv_batch'][0].audit_date_to);
                $("#lblViewTUVBatchIssuedDate").text(JsonObject['tuv_batch'][0].issued_date);
                $("#lblViewTUVBatchDueDate").text(JsonObject['tuv_batch'][0].due_date);
                let savingStat = JsonObject['tuv_batch'][0].saving_stat;
                let savingStatLabel = '<span class="tag tag-warning">Save as Draft</span>';
                if(savingStat == 2){
                    savingStatLabel = '<span class="tag tag-success">Save and Send</span>';
                }

                $("#lblViewTUVBatchSavingStat").html(savingStatLabel);

                let arrDepartments = "";
                for(let index = 0; index < JsonObject['tuv_batch'][0].tuv_batch_departments.length; index++){
                    arrDepartments += JsonObject['tuv_batch'][0].tuv_batch_departments[index].department.department_name;
                    if(index < (JsonObject['tuv_batch'][0].tuv_batch_departments.length - 1)){
                        arrDepartments += " / ";
                    }
                }
                $("#lblViewTUVBatchDepartments").text(arrDepartments);

                let arrAuditors = "";
                for(let index = 0; index < JsonObject['tuv_batch'][0].tuv_batch_auditors.length; index++){
                    arrAuditors += JsonObject['tuv_batch'][0].tuv_batch_auditors[index].auditor.name;
                    if(index < (JsonObject['tuv_batch'][0].tuv_batch_auditors.length - 1)){
                        arrAuditors += " / ";
                    }
                }
                $("#lblViewTUVBatchAuditors").text(arrAuditors);

                let arrAuditees = "";
                for(let index = 0; index < JsonObject['tuv_batch'][0].tuv_batch_auditees.length; index++){
                    arrAuditees += JsonObject['tuv_batch'][0].tuv_batch_auditees[index].auditee.name;
                    if(index < (JsonObject['tuv_batch'][0].tuv_batch_auditees.length - 1)){
                        arrAuditees += " / ";
                    }
                }
                $("#lblViewTUVBatchAuditees").text(arrAuditees);
            }
            else{
                $("#txtEditTUVBatchName").val("No record found!");
            }
        },
        error: function(data, xhr, status){
            $("#txtEditTUVBatchName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function EditTUVBatch(){
    $.ajax({
        url: "edit_tuv_batch",
        method: "post",
        data: $('#formEditTUVBatch').serialize(),
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
                $("#modalEditTUVBatch").modal('hide');
                $("#formEditTUVBatch")[0].reset();
                dataTableTUVBatch.draw();
                $("#txtEditTUVBatchName").removeClass('border-danger');
                $("#txtEditTUVBatchName").removeAttr('title');
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

                if(JsonObject['error']['tuv_batch_name'] != undefined){
                    $("#txtEditTUVBatchName").addClass('border-danger');
                    $("#txtEditTUVBatchName").attr('title', JsonObject['error']['tuv_batch_name']);
                }
                else{
                    $("#txtEditTUVBatchName").removeClass('border-danger');
                    $("#txtEditTUVBatchName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function TUVBatchSaveByStat(tuv_batch_id, saving_status, _token) {
    $.ajax({
        url: "save_tuv_batch_by_stat",
        method: "post",
        data: {
            _token: _token,
            tuv_batch_id: tuv_batch_id,
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
                $("#modalResultsTUVBatch").modal('hide');
                dataTableTUVBatch.draw();
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