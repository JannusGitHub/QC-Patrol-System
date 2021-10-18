function SaveSchedDetails(){
	$.ajax({
        url: "add_audit_schedule_details",
        method: "post",
        data: $('#formSaveSched').serialize(),
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

                if($("#txtSaveSchedType").val() == 1){
            	   dataTableAQMSSchedules.draw();
                }
                else if($("#txtSaveSchedType").val() == 2){
                    dataTableEMSSchedules.draw();
                }
                else if($("#txtSaveSchedType").val() == 3){
                    dataTableProductSchedules.draw();
                }
                else if($("#txtSaveSchedType").val() == 4){
                    dataTableProcessSchedules.draw();
                }

            	$("#modalSaveAuditScheduleDetails").modal('hide');
            	$("#formSaveSched")[0].reset();
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

function GetSchedDetailsByIdToEdit(schedDetailsId){
    $.ajax({
        url: 'get_sched_details_by_id',
        method: 'get',
        data: {
            'id': schedDetailsId
        },
        dataType: 'json',
        beforeSend: function(){
            
        },
        success: function(JsonObject){
            if(JsonObject['aqms_schedule_details'] != null){
                $("#txtSaveSchedYear").val(JsonObject['aqms_schedule_details'].year);
                $("#txtSaveSchedTitle").val(JsonObject['aqms_schedule_details'].title);
                $("#txtSaveSchedScope").val(JsonObject['aqms_schedule_details'].scope);
                $("#txtSaveSchedReferenceStds").val(JsonObject['aqms_schedule_details'].reference_stds);
                $("#txtSaveSchedMethod").val(JsonObject['aqms_schedule_details'].method);
                $("#txtSaveSchedType").val(JsonObject['aqms_schedule_details'].schedule_type);
            }
            else{
                Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Retrieval Failed!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });  
                $("#txtSaveSchedYear").val('');
                $("#txtSaveSchedTitle").val('');
                $("#txtSaveSchedScope").val('');
                $("#txtSaveSchedReferenceStds").val('');
                $("#txtSaveSchedMethod").val('');
                $("#txtSaveSchedType").val('');
            }
        },
        error: function(data, xhr, status){
            $("#txtEditEmailRecepientName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function AuditScheduleDetailsAction(){
    $.ajax({
        url: "audit_sched_details_action",
        method: "post",
        data: $('#frmAuditSchedAction').serialize(),
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

                dataTableAQMSSchedules.draw();
                dataTableEMSSchedules.draw();
                dataTableProductSchedules.draw();
                dataTableProcessSchedules.draw();

                $("#mdlAuditSchedAction").modal('hide');
                $("#frmAuditSchedAction")[0].reset();
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