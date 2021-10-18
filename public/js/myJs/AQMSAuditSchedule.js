function AddAQMSSched(){
	$.ajax({
        url: "../add_aqms_sched",
        method: "post",
        data: $('#formAddAQMSSched').serialize(),
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
            	$("#modalAddAQMSSched").modal('hide');
            	$("#formAddAQMSSched")[0].reset();
                $('.selAddAQMSSchedUsers').select2('val', 0);
            	dataTableAQMSSchedules.draw();
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

function ArchiveAQMSSched() {
    $.ajax({
        url: "archive_aqms_sched",
        method: "post",
        data: $('#formArchiveAQMSSched').serialize(),
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
                $("#modalArchiveAQMSSched").modal('hide');
                $("#formArchiveAQMSSched")[0].reset();
                dataTableAQMSSchedules.draw();
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

function RestoreAQMSSched() {
    $.ajax({
        url: "restore_aqms_sched",
        method: "post",
        data: $('#formRestoreAQMSSched').serialize(),
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
                $("#modalRestoreAQMSSched").modal('hide');
                $("#formRestoreAQMSSched")[0].reset();
                dataTableAQMSSchedules.draw();
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

function GetTableAQMSSchedByIdToEdit(AQMSSchedId){
    $.ajax({
        url: "../get_aqms_sched_by_id",
        method: "get",
        data: {
            'id': AQMSSchedId
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            let htmlHeaderContent =  '';
            let htmlBodyContent =  '';
            if(JsonObject['aqms_schedules'].length > 0){
                htmlBodyContent +=  '<tr>';
                for(let index = 0; index < JsonObject['aqms_schedules'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['aqms_schedules'][index]['aqms_sched_years'].length; index2++) {
                        htmlHeaderContent += '<th colspan="4" class="center-table-cell">FY ' + JsonObject['aqms_schedules'][index]['aqms_sched_years'][index2]['year'] + '</th>'; 
                        htmlBodyContent +=  '<th class="center-table-cell">Apr-June</th>';
                        htmlBodyContent +=  '<th class="center-table-cell">July-Sept</th>';
                        htmlBodyContent +=  '<th class="center-table-cell">Oct-Dec</th>';
                        htmlBodyContent +=  '<th class="center-table-cell">Jan-Mar</th>';
                    }
                }
                htmlBodyContent +=  '</tr>';

                htmlBodyContent +=  '<tr>';
                htmlBodyContent +=  '<td class="center-table-cell">' + JsonObject['aqms_schedules'][0]['organizational_unit'] + '</td>';
                htmlBodyContent +=  '<td class="center-table-cell">' + JsonObject['aqms_schedules'][0]['aqms_sched_process_owners'][0]['process_owner_info']['name'] + '</td>';
                htmlBodyContent +=  '<td class="center-table-cell">' + JsonObject['aqms_schedules'][0]['aqms_sched_internal_auditors'][0]['internal_auditor_info']['name'] + '</td>';
                for(let index = 0; index < JsonObject['aqms_schedules'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['aqms_schedules'][index]['aqms_sched_years'].length; index2++) {
                        htmlBodyContent +=  '<td class="center-table-cell">a</td>';
                        htmlBodyContent +=  '<td class="center-table-cell">s</td>';
                        htmlBodyContent +=  '<td class="center-table-cell">w</td>';
                        htmlBodyContent +=  '<td class="center-table-cell">d</td>';
                    }
                }
                htmlBodyContent +=  '</tr>';
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

            $("#tblAQMSchedules thead tr").find('.thInternalAuditor').after(htmlHeaderContent);
            $("#tblAQMSchedules thead tr").after(htmlBodyContent);

        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetAQMSSchedByIdToEdit(AQMSSchedId){
    $("#divContainerEditAQMSAuditSchedYears").html('');
    $.ajax({
        url: "get_aqms_sched_by_id",
        method: "get",
        data: {
            'aqms_audit_schedule_id': AQMSSchedId
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            let htmlContent =  '';
            if(JsonObject['aqms_schedules'].length > 0){
               for(let index = 0; index < JsonObject['aqms_schedules'].length; index++) {
                    $("#txtEditAQMSSchedOrgUnit").val(JsonObject['aqms_schedules'][index].organizational_unit);
                    $("#selEditAQMSSchedProcOwner").val(JsonObject['aqms_schedules'][index].process_owners.split(',')).trigger('change');
                    $("#selEditAQMSSchedIntAuditors").val(JsonObject['aqms_schedules'][index].internal_auditors.split(',')).trigger('change');
                    // $("#txtEditAQMSSchedYear").val(JsonObject['aqms_schedules'][index].year);
                    // $("#selEditAQMSSchedQuarter").val(JsonObject['aqms_schedules'][index].quarter);
                    // $("#txtEditAQMSSchedPlanFrom").val(JsonObject['aqms_schedules'][index].plan_from);
                    // $("#txtEditAQMSSchedPlanTo").val(JsonObject['aqms_schedules'][index].plan_to);
                    // $("#txtEditAQMSSchedActualFrom").val(JsonObject['aqms_schedules'][index].actual_from);
                    // $("#txtEditAQMSSchedActualTo").val(JsonObject['aqms_schedules'][index].actual_to);
                    // $("#txtEditAQMSSchedReSchedFrom").val(JsonObject['aqms_schedules'][index].reschedule_from);
                    // $("#txtEditAQMSSchedReSchedTo").val(JsonObject['aqms_schedules'][index].reschedule_to);

                    htmlContent += '<div class="divEditAQMSAuditSchedYear" id="divEditAQMSAuditSchedYear' + JsonObject['aqms_schedules'][index].aqms_audit_schedule_year_id + '" aqms-sched-year-no="' + JsonObject['aqms_schedules'][index].aqms_audit_schedule_year_id + '">'; 
                    if(index > 0){
                        htmlContent += '<hr>';
                    }
                    htmlContent += '<div class="form-body">';
                            htmlContent += '<div class="form-group">';
                                htmlContent += '<label for="projectinput1">Year</label>';
                                if(index > 0){
                                    htmlContent += '<button type="button" class="btn btn-danger btnRemoveEditAQMSAuditSchedYear" value="' + JsonObject['aqms_schedules'][index].aqms_audit_schedule_year_id + '" style="float: right; padding: 1px 3px;" title="Remove"><i class="icon-remove"></i></button>';
                                }
                                htmlContent += '<input type="hidden" name="aqms_audit_schedule_year_id[]" class="form-control txtEditAQMSSchedYearId" value="' + JsonObject['aqms_schedules'][index].aqms_audit_schedule_year_id + '">';
                                htmlContent += '<input type="number" name="year[]" class="form-control txtEditAQMSSchedYear" value="' + JsonObject['aqms_schedules'][index].year + '">';
                            htmlContent += '</div>';
                        htmlContent += '</div>';
                        htmlContent += '<div class="form-body">';
                            htmlContent += '<div class="form-group">';
                                htmlContent += '<label for="projectinput1">Quarter</label>';
                                htmlContent += '<select class="form-control selEditAQMSSchedQuarter" name="quarter[]" style="width: 100%;">';
                                    if(JsonObject['aqms_schedules'][index].quarter == 1)
                                        htmlContent += '<option value="1" selected>Apr-June</option>';
                                    else 
                                        htmlContent += '<option value="1">Apr-June</option>';
                                    if(JsonObject['aqms_schedules'][index].quarter == 2)
                                        htmlContent += '<option value="2" selected>July-Sept</option>';
                                    else
                                        htmlContent += '<option value="1">Apr-June</option>';
                                    if(JsonObject['aqms_schedules'][index].quarter == 3)
                                        htmlContent += '<option value="3" selected>Oct-Dec</option>';
                                    else
                                        htmlContent += '<option value="3">Oct-Dec</option>';
                                    if(JsonObject['aqms_schedules'][index].quarter == 4)
                                        htmlContent += '<option value="4" selected>Jan-Mar</option>';
                                    else
                                        htmlContent += '<option value="4">Jan-Mar</option>';

                                htmlContent += '</select>';
                            htmlContent += '</div>';
                        htmlContent += '</div>';
                        htmlContent += '<div class="form-body">';
                            htmlContent += '<div class="form-group">';
                                htmlContent += '<div class="col-sm-12">';
                                  htmlContent += '<label for="projectinput1">Plan</label>';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="plan_from[]" class="form-control txtEditAQMSSchedPlanFrom" value="' + JsonObject['aqms_schedules'][index].plan_from + '">';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="plan_to[]" class="form-control txtEditAQMSSchedPlanTo" value="' + JsonObject['aqms_schedules'][index].plan_to + '">';
                                htmlContent += '</div>';
                            htmlContent += '</div>';
                        htmlContent += '</div> <br>';
                        htmlContent += '<div class="form-body">';
                            htmlContent += '<div class="form-group">';
                                htmlContent += '<div class="col-sm-12">';
                                  htmlContent += '<label for="projectinput1">Actual</label>';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="actual_from[]" class="form-control txtEditAQMSSchedActualFrom" value="' + JsonObject['aqms_schedules'][index].actual_from + '">';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="actual_to[]" class="form-control txtEditAQMSSchedActualTo" value="' + JsonObject['aqms_schedules'][index].actual_to + '">';
                                htmlContent += '</div>';
                            htmlContent += '</div>';
                        htmlContent += '</div> <br>';
                        htmlContent += '<div class="form-body">';
                            htmlContent += '<div class="form-group">';
                                htmlContent += '<div class="col-sm-12">';
                                  htmlContent += '<label for="projectinput1">Reschedule</label>';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="reschedule_from[]" class="form-control txtEditAQMSSchedReSchedFrom" value="' + JsonObject['aqms_schedules'][index].reschedule_from + '">';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="reschedule_to[]" class="form-control txtEditAQMSSchedReSchedTo" value="' + JsonObject['aqms_schedules'][index].reschedule_to + '">';
                                htmlContent += '</div>';
                            htmlContent += '</div>';
                        htmlContent += '</div> <br>';
                      htmlContent += '</div>';

               }
                $("#divContainerEditAQMSAuditSchedYears").append(htmlContent);
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

function EditAQMSSched(){
    $.ajax({
        url: "edit_aqms_sched",
        method: "post",
        data: $('#formEditAQMSSched').serialize(),
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
                $("#modalEditAQMSSched").modal('hide');
                $("#formEditAQMSSched")[0].reset();
                $('.selEditAQMSSchedUsers').select2('val', 0);
                dataTableAQMSSchedules.draw();
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

// Start of new Codes 2020-05-09