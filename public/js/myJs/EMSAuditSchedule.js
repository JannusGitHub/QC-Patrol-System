function AddEMSSched(){
	$.ajax({
        url: "add_ems_sched",
        method: "post",
        data: $('#formAddEMSSched').serialize(),
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
            	$("#modalAddEMSSched").modal('hide');
            	$("#formAddEMSSched")[0].reset();
                $('.selAddEMSSchedUsers').select2('val', 0);
                $('.selAddEMSSchedAreas').select2('val', 0);
            	dataTableEMSSchedules.draw();
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

function ArchiveEMSSched() {
    $.ajax({
        url: "archive_ems_sched",
        method: "post",
        data: $('#formArchiveEMSSched').serialize(),
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
                $("#modalArchiveEMSSched").modal('hide');
                $("#formArchiveEMSSched")[0].reset();
                dataTableEMSSchedules.draw();
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

function RestoreEMSSched() {
    $.ajax({
        url: "restore_ems_sched",
        method: "post",
        data: $('#formRestoreEMSSched').serialize(),
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
                $("#modalRestoreEMSSched").modal('hide');
                $("#formRestoreEMSSched")[0].reset();
                dataTableEMSSchedules.draw();
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

function GetEMSSchedByIdToEdit(EMSSchedId){
    $.ajax({
        url: "get_ems_sched_by_id",
        method: "get",
        data: {
            'ems_audit_schedule_id': EMSSchedId
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['ems_schedules'].length > 0){
               for(let index = 0; index < JsonObject['ems_schedules'].length; index++) {
                    $("#txtEditEMSSchedProc").val(JsonObject['ems_schedules'][index].process);
                    $("#txtEditEMSSchedYear").val(JsonObject['ems_schedules'][index].year);
                    $("#selEditEMSSchedQuarter").val(JsonObject['ems_schedules'][index].quarter);
                    $("#txtEditEMSSchedPlanFrom").val(JsonObject['ems_schedules'][index].plan_from);
                    $("#txtEditEMSSchedPlanTo").val(JsonObject['ems_schedules'][index].plan_to);
                    $("#txtEditEMSSchedActualFrom").val(JsonObject['ems_schedules'][index].actual_from);
                    $("#txtEditEMSSchedActualTo").val(JsonObject['ems_schedules'][index].actual_to);
                    $("#txtEditEMSSchedReSchedFrom").val(JsonObject['ems_schedules'][index].reschedule_from);
                    $("#txtEditEMSSchedReSchedTo").val(JsonObject['ems_schedules'][index].reschedule_to);
                    $("#selEditEMSSchedAreas").val(JsonObject['ems_schedules'][index].areas.split(',')).trigger('change');
                    $("#selEditEMSSchedProcOwner").val(JsonObject['ems_schedules'][index].process_owners.split(',')).trigger('change');
                    $("#selEditEMSSchedIntAuditors").val(JsonObject['ems_schedules'][index].internal_auditors.split(',')).trigger('change');    
               }
            }
            else{
                Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'No record found.',
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

function ArchiveEMSSched() {
    $.ajax({
        url: "archive_ems_sched",
        method: "post",
        data: $('#formArchiveEMSSched').serialize(),
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
                $("#modalArchiveEMSSched").modal('hide');
                $("#formArchiveEMSSched")[0].reset();
                dataTableEMSSchedules.draw();
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

function RestoreEMSSched() {
    $.ajax({
        url: "restore_ems_sched",
        method: "post",
        data: $('#formRestoreEMSSched').serialize(),
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
                $("#modalRestoreEMSSched").modal('hide');
                $("#formRestoreEMSSched")[0].reset();
                dataTableEMSSchedules.draw();
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

function EditEMSSched(){
    $.ajax({
        url: "edit_ems_sched",
        method: "post",
        data: $('#formEditEMSSched').serialize(),
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
                $("#modalEditEMSSched").modal('hide');
                $("#formEditEMSSched")[0].reset();
                $('.selEditEMSSchedUsers').select2('val', 0);
                dataTableEMSSchedules.draw();
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
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}