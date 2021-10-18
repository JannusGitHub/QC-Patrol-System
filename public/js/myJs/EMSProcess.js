function EMSSaveProcess(){
    $.ajax({
        url: "../ems_save_process",
        method: "post",
        data: frmSaveProcess.serialize(),
        dataType: "json",
        beforeSend: function(){
            btnSaveProcess.prop('disabled', true);
            btnSaveProcess.val('Saving...');
        },
        success: function(JsonObject){
            btnSaveProcess.prop('disabled', false);
            btnSaveProcess.val('Save');

            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Record Saved!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                mdlSaveProcess.modal('hide');
                frmSaveProcess[0].reset();
                $("input[name='process_id'", frmSaveProcess).val('');
                GetTableEMSSchedByAuditScheduleId(auditScheduleId, $("#selFilterEMSStat").val());
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
            btnSaveProcess.prop('disabled', false);
            btnSaveProcess.val('Save');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetTableEMSSchedByAuditScheduleId(auditScheduleId, status){
    $.ajax({
        url: "../get_ems_sched_by_audit_schedule_id",
        method: "get",
        data: {
            'audit_schedule_id': auditScheduleId,
            'status': status,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(data){
            let result =  '';
            if(data['ems_schedules'].length > 0){

                // For FY Heading Columns
                let resultTrHeader  = '';
                let startYear = data['ems_min_year'];
                let endYear = data['ems_max_year'];

                if(startYear == null || endYear == null){ 
                    startYear = 1;
                    endYear = 0;
                }
                for(let index = startYear; index <= endYear; index++){
                    resultTrHeader  += '<th colspan="4" class="center-table-cell">FY ' + index + '</th>';
                }
                $("#tblEMSchedules thead #trHeader").find('#thHeader').nextAll().remove();
                $("#tblEMSchedules thead #trHeader").find('#thHeader').after(resultTrHeader);

                // For FY Sub Heading Columns
                let resultThHeader  = '';
                // if(startYear != null || endYear != null){
                    resultThHeader += '<tr>';
                    for(let index = startYear; index <= endYear; index++){
                        resultThHeader  += '<td colspan="1" class="center-table-cell">Apr-June</td>';
                        resultThHeader  += '<td colspan="1" class="center-table-cell">July-Sept</td>';
                        resultThHeader  += '<td colspan="1" class="center-table-cell">Oct-Dec</td>';
                        resultThHeader  += '<td colspan="1" class="center-table-cell">Jan-Mar</td>';
                    }
                    resultThHeader += '<tr>';
                // }
                $("#tblEMSchedules thead").find('#trHeader').nextAll().remove();
                $("#tblEMSchedules thead").find('#trHeader').after(resultThHeader);


                // For tbody content
                for(let index = 0; index < data['ems_schedules'].length; index++) {
                    result +=  '<tr>';

                        let rowspan = 1;

                        if(data['ems_schedules'][index]['ems_schedule_details'].length > 0){
                            rowspan = data['ems_schedules'][index]['ems_schedule_details'].length;
                        }

                        result +=  '<td rowspan="' + rowspan + '">' + data['ems_schedules'][index]['no'] + '</td>';
                        if(data['ems_schedules'][index]['process'] == null){
                            result +=  '<td rowspan="' + rowspan + '" class="tdEditProcess" process-id="' + data['ems_schedules'][index]['id'] +  '" title="Double click for details."></td>';
                        }
                        else{
                            result +=  '<td rowspan="' + rowspan + '" class="tdEditProcess" process-id="' + data['ems_schedules'][index]['id'] +  '" title="Double click for details.">' + data['ems_schedules'][index]['process'] + '</td>';
                        }

                        if(data['ems_schedules'][index]['ems_schedule_details'].length > 0){
                            for(let index2 = 0; index2 < data['ems_schedules'][index]['ems_schedule_details'].length; index2++){

                                let arrProcessOwners = [];
                                for(let index3 = 0; index3 < data['ems_schedules'][index]['ems_schedule_details'][index2]['process_owner_details'].length; index3++){
                                    arrProcessOwners.push(data['ems_schedules'][index]['ems_schedule_details'][index2]['process_owner_details'][index3]['process_owner_info']['name']);
                                }

                                let arrInternalAuditors = [];
                                for(let index3 = 0; index3 < data['ems_schedules'][index]['ems_schedule_details'][index2]['internal_auditor_details'].length; index3++){
                                    arrInternalAuditors.push(data['ems_schedules'][index]['ems_schedule_details'][index2]['internal_auditor_details'][index3]['internal_auditor_info']['name']);
                                }

                                let arrAreas = [];
                                for(let index3 = 0; index3 < data['ems_schedules'][index]['ems_schedule_details'][index2]['area_details'].length; index3++){
                                    arrAreas.push(data['ems_schedules'][index]['ems_schedule_details'][index2]['area_details'][index3]['area_info']['department_name']);
                                }

                                if(index2 <= 0){
                                    result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + arrAreas.join(', ') + '</td>';   
                                    result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + arrProcessOwners.join(', ') + '</td>';   
                                    result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + arrInternalAuditors.join(', ') + '</td>';   

                                    for(let index3 = startYear; index3 <= endYear; index3++){
                                        let planQ1 = '';
                                        let planQ2 = '';
                                        let planQ3 = '';
                                        let planQ4 = '';

                                        let actualQ1 = '';
                                        let actualQ2 = '';
                                        let actualQ3 = '';
                                        let actualQ4 = '';

                                        let rescheduleQ1 = '';
                                        let rescheduleQ2 = '';
                                        let rescheduleQ3 = '';
                                        let rescheduleQ4 = '';

                                        if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'].length > 0){
                                            for(let index4 = 0; index4 < data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'].length; index4++){
                                                // if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'].split('-')[0] == index3){
                                                if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['year'] == index3){

                                                    // PLAN
                                                    if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] != null){
                                                        let plan = data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'];

                                                        if(plan.split('-')[1] >= 4 && plan.split('-')[1] <= 6){
                                                            planQ1 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan']){
                                                                planQ1 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + '</span>';
                                                            }
                                                        }
                                                        else if(plan.split('-')[1] >= 7 && plan.split('-')[1] <= 9){
                                                            planQ2 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan']){
                                                                planQ2 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + '</span>';
                                                            }
                                                        }
                                                        else if(plan.split('-')[1] >= 10 && plan.split('-')[1] <= 12){
                                                            planQ3 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan']){
                                                                planQ3 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + '</span>';
                                                            }
                                                        }
                                                        else if(plan.split('-')[1] >= 1 && plan.split('-')[1] <= 3){
                                                            planQ4 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan']){
                                                                planQ4 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + '</span>';
                                                            }
                                                        }
                                                    }

                                                    // ACTUAL
                                                    if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] != null){
                                                        let actual = data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'];

                                                        if(actual.split('-')[1] >= 4 && actual.split('-')[1] <= 6){
                                                            actualQ1 = '<span class="tag tag-warning" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual']){
                                                                actualQ1 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + '</span>';
                                                            }
                                                        }
                                                        else if(actual.split('-')[1] >= 7 && actual.split('-')[1] <= 9){
                                                            actualQ2 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual']){
                                                                actualQ2 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + '</span>';
                                                            }
                                                        }
                                                        else if(actual.split('-')[1] >= 10 && actual.split('-')[1] <= 12){
                                                            actualQ3 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual']){
                                                                actualQ3 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + '</span>';
                                                            }
                                                        }
                                                        else if(actual.split('-')[1] >= 1 && actual.split('-')[1] <= 3){
                                                            actualQ4 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual']){
                                                                actualQ4 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + '</span>';
                                                            }
                                                        }
                                                    }

                                                    // RESCHEDULE
                                                    if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] != null){
                                                        let reschedule = data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'];

                                                        if(reschedule.split('-')[1] >= 4 && reschedule.split('-')[1] <= 6){
                                                            rescheduleQ1 = '<span class="tag tag-success" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule']){
                                                                rescheduleQ1 = '<span class="tag tag-success" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + '</span>';
                                                            }
                                                        }
                                                        else if(reschedule.split('-')[1] >= 7 && reschedule.split('-')[1] <= 9){
                                                            rescheduleQ2 = '<span class="tag tag-success" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule']){
                                                                rescheduleQ2 = '<span class="tag tag-success" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + '</span>';
                                                            }
                                                        }
                                                        else if(reschedule.split('-')[1] >= 10 && reschedule.split('-')[1] <= 12){
                                                            rescheduleQ3 = '<span class="tag tag-success" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule']){
                                                                rescheduleQ3 = '<span class="tag tag-success" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + '</span>';
                                                            }
                                                        }
                                                        else if(reschedule.split('-')[1] >= 1 && reschedule.split('-')[1] <= 3){
                                                            rescheduleQ4 = '<span class="tag tag-success" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule']){
                                                                rescheduleQ4 = '<span class="tag tag-success" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + '</span>';
                                                            }
                                                        }
                                                    }
                                                    break;
                                                }
                                            }
                                        }

                                        result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + planQ1 + actualQ1 + rescheduleQ1 +'</td>';
                                        result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + planQ2 + actualQ2 + rescheduleQ2 +'</td>';
                                        result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + planQ3 + actualQ3 + rescheduleQ3 +'</td>';
                                        result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + planQ4 + actualQ4 + rescheduleQ4 +'</td>';
                                    }
                                    result +=  '</tr>';
                                }

                                else{
                                    result +=  '<tr>';                                       
                                    result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + arrAreas.join(', ') + '</td>';   
                                    result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + arrProcessOwners.join(', ') + '</td>';   
                                    result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + arrInternalAuditors.join(', ') + '</td>';   
                                    
                                    for(let index3 = startYear; index3 <= endYear; index3++){
                                        let planQ1 = '';
                                        let planQ2 = '';
                                        let planQ3 = '';
                                        let planQ4 = '';

                                        let actualQ1 = '';
                                        let actualQ2 = '';
                                        let actualQ3 = '';
                                        let actualQ4 = '';

                                        let rescheduleQ1 = '';
                                        let rescheduleQ2 = '';
                                        let rescheduleQ3 = '';
                                        let rescheduleQ4 = '';

                                        if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'].length > 0){
                                            for(let index4 = 0; index4 < data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'].length; index4++){
                                                // if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'].split('-')[0] == index3){
                                                if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['year'] == index3){

                                                    // PLAN
                                                    if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] != null){
                                                        let plan = data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'];

                                                        if(plan.split('-')[1] >= 4 && plan.split('-')[1] <= 6){
                                                            planQ1 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan']){
                                                                planQ1 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + '</span>';
                                                            }
                                                        }
                                                        else if(plan.split('-')[1] >= 7 && plan.split('-')[1] <= 9){
                                                            planQ2 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan']){
                                                                planQ2 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + '</span>';
                                                            }
                                                        }
                                                        else if(plan.split('-')[1] >= 10 && plan.split('-')[1] <= 12){
                                                            planQ3 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan']){
                                                                planQ3 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + '</span>';
                                                            }
                                                        }
                                                        else if(plan.split('-')[1] >= 1 && plan.split('-')[1] <= 3){
                                                            planQ4 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_plan']){
                                                                planQ4 = '<span class="tag btn-blue" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_plan'] + '</span>';
                                                            }
                                                        }
                                                    }

                                                    // ACTUAL
                                                    if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] != null){
                                                        let actual = data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'];

                                                        if(actual.split('-')[1] >= 4 && actual.split('-')[1] <= 6){
                                                            actualQ1 = '<span class="tag tag-warning" title="Plan">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual']){
                                                                actualQ1 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + '</span>';
                                                            }
                                                        }
                                                        else if(actual.split('-')[1] >= 7 && actual.split('-')[1] <= 9){
                                                            actualQ2 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual']){
                                                                actualQ2 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + '</span>';
                                                            }
                                                        }
                                                        else if(actual.split('-')[1] >= 10 && actual.split('-')[1] <= 12){
                                                            actualQ3 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual']){
                                                                actualQ3 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + '</span>';
                                                            }
                                                        }
                                                        else if(actual.split('-')[1] >= 1 && actual.split('-')[1] <= 3){
                                                            actualQ4 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_actual']){
                                                                actualQ4 = '<span class="tag tag-warning" title="Actual">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_actual'] + '</span>';
                                                            }
                                                        }
                                                    }

                                                    // RESCHEDULE
                                                    if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] != null){
                                                        let reschedule = data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'];

                                                        if(reschedule.split('-')[1] >= 4 && reschedule.split('-')[1] <= 6){
                                                            rescheduleQ1 = '<span class="tag tag-success" title="Reschedule">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule']){
                                                                rescheduleQ1 = '<span class="tag tag-success" title="Reschedule">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + '</span>';
                                                            }
                                                        }
                                                        else if(reschedule.split('-')[1] >= 7 && reschedule.split('-')[1] <= 9){
                                                            rescheduleQ2 = '<span class="tag tag-success" title="Reschedule">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule']){
                                                                rescheduleQ2 = '<span class="tag tag-success" title="Reschedule">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + '</span>';
                                                            }
                                                        }
                                                        else if(reschedule.split('-')[1] >= 10 && reschedule.split('-')[1] <= 12){
                                                            rescheduleQ3 = '<span class="tag tag-success" title="Reschedule">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule']){
                                                                rescheduleQ3 = '<span class="tag tag-success" title="Reschedule">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + '</span>';
                                                            }
                                                        }
                                                        else if(reschedule.split('-')[1] >= 1 && reschedule.split('-')[1] <= 3){
                                                            rescheduleQ4 = '<span class="tag tag-success" title="Reschedule">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + "<br>" + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule'] + '</span>';
                                                            if(data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] == data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['end_reschedule']){
                                                                rescheduleQ4 = '<span class="tag tag-success" title="Reschedule">' + data['ems_schedules'][index]['ems_schedule_details'][index2]['ems_year_details'][index4]['start_reschedule'] + '</span>';
                                                            }
                                                        }
                                                    }
                                                    break;
                                                }
                                            }
                                        }

                                        result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + planQ1 + actualQ1 + rescheduleQ1 +'</td>';
                                        result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + planQ2 + actualQ2 + rescheduleQ2 +'</td>';
                                        result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + planQ3 + actualQ3 + rescheduleQ3 +'</td>';
                                        result +=  '<td class="tdEditProcessDetails" ems-schedule-id="' + data['ems_schedules'][index]['ems_schedule_details'][index2]['id'] +  '" title="Double click for details.">' + planQ4 + actualQ4 + rescheduleQ4 +'</td>';
                                    }
                                    result +=  '</tr>';                                       
                                }


                            }
                        }
                        else{
                            result +=  '<td></td>';        
                            result +=  '<td></td>';        
                        }

                    result +=  '</tr>';

                }

            }
            else{ 
                $("#tblEMSchedules thead #trHeader").find('#thHeader').nextAll().remove();
                $("#tblEMSchedules thead").find('#trHeader').nextAll().remove();
                result ==  '<tr>';
                    result +=  '<td colspan="5">No record found.</td>';
                result +=  '</tr>';
            }

            $("#tblEMSchedules tbody").html(result);

        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            result ==  '<tr>';
                result +=  '<td>An error occured.</td>';
            result +=  '</tr>';
        }
    });
}

function GetEMSProcessById(emsProcessId){
    $.ajax({
        url: "../get_ems_process_by_id",
        method: "get",
        data: {
            'ems_process_id': emsProcessId,
        },
        dataType: "json",
        beforeSend: function(){
            btnSaveProcess.prop('disabled', true);
            btnSaveProcess.val('Loading Details');
        },
        success: function(data){
            let result =  '';
            if(data['ems_process'] != null){
                $("input[name='no'", frmSaveProcess).val(data['ems_process']['no']);
                $("textarea[name='process'", frmSaveProcess).val(data['ems_process']['process']);
            }
            else{ 
            }
            btnSaveProcess.prop('disabled', false);
            btnSaveProcess.val('Save');

        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            btnSaveProcess.prop('disabled', false);
            btnSaveProcess.val('Save');
        }
    });
}

function EMSSaveProcessDetails(form, btnSave){
    $.ajax({
        url: "../ems_save_process_details",
        method: "post",
        data: form.serialize(),
        dataType: "json",
        beforeSend: function(){
            btnSave.prop('disabled', true);
            btnSave.val('Saving...');
        },
        success: function(JsonObject){
            btnSave.prop('disabled', false);
            btnSave.val('Save');

            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Record Saved!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                mdlSaveProcess.modal('hide');
                frmSaveProcess[0].reset();
                $("input[name='process_id'", frmSaveProcess).val('');
                $("input[name='process_id'", frmSaveProcessDetails).val('');
                GetTableEMSSchedByAuditScheduleId(auditScheduleId, $("#selFilterEMSStat").val());
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
            btnSave.prop('disabled', false);
            btnSave.val('Save');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetEMSProcessDetailsById(auditScheduleId){
    $.ajax({
        url: "../get_ems_process_details_by_id",
        method: "get",
        data: {
            'audit_schedule_id': auditScheduleId,
        },
        dataType: "json",
        beforeSend: function(){
            btnEditProcessDetails.prop('disabled', true);
            btnEditProcessDetails.val('Loading Details');
        },
        success: function(data){
            let result =  '';
            if(data['ems_process_details'] != null){
                if(data['ems_process_details']['ems_process_info'] != null){
                    $("input[name='no'", frmEditProcess).val(data['ems_process_details']['ems_process_info']['no']);
                    $("textarea[name='process'", frmEditProcess).val(data['ems_process_details']['ems_process_info']['process']);
                }

                if(data['ems_process_details']['process_owner_details'].length > 0){
                    let arrProcessOwners = [];
                    for(let index = 0; index < data['ems_process_details']['process_owner_details'].length; index++){
                        arrProcessOwners.push(data['ems_process_details']['process_owner_details'][index]['process_owner_id']);
                    }

                    $("select[name='process_owners[]'", frmEditProcessDetails).val(arrProcessOwners).trigger('change');
                }

                if(data['ems_process_details']['internal_auditor_details'].length > 0){
                    let arrInternalAuditors = [];
                    for(let index = 0; index < data['ems_process_details']['internal_auditor_details'].length; index++){
                        arrInternalAuditors.push(data['ems_process_details']['internal_auditor_details'][index]['internal_auditor_id']);
                    }

                    $("select[name='internal_auditors[]'", frmEditProcessDetails).val(arrInternalAuditors).trigger('change');
                }

                if(data['ems_process_details']['area_details'].length > 0){
                    let arrAreas = [];
                    for(let index = 0; index < data['ems_process_details']['area_details'].length; index++){
                        arrAreas.push(data['ems_process_details']['area_details'][index]['area_id']);
                    }

                    $("select[name='areas[]'", frmEditProcessDetails).val(arrAreas).trigger('change');
                }
            }
            else{ 
            }
            btnEditProcessDetails.prop('disabled', false);
            btnEditProcessDetails.val('Save');

        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            btnEditProcessDetails.prop('disabled', false);
            btnEditProcessDetails.val('Save');
        }
    });
}

function EMSSaveYear(){
    $.ajax({
        url: "../ems_save_year",
        method: "post",
        data: frmSaveYear.serialize(),
        dataType: "json",
        beforeSend: function(){
            btnSaveYear.prop('disabled', true);
            btnSaveYear.val('Saving...');
        },
        success: function(JsonObject){
            btnSaveYear.prop('disabled', false);
            btnSaveYear.val('Save');

            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Record Saved!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                mdlSaveYear.modal('hide');
                frmSaveYear[0].reset();
                $("input[name='year_id'", frmSaveYear).val('');
                dtYears.draw();
                GetTableEMSSchedByAuditScheduleId(auditScheduleId, $("#selFilterEMSStat").val());
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
            btnSaveYear.prop('disabled', false);
            btnSaveYear.val('Save');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetEMSYearById(yearId){
    $.ajax({
        url: "../get_ems_year_by_id",
        method: "get",
        data: {
            'ems_year_id': yearId,
        },
        dataType: "json",
        beforeSend: function(){
            btnSaveYear.prop('disabled', true);
            btnSaveYear.val('Loading Details');
        },
        success: function(data){
            let result =  '';
            if(data['ems_year'] != null){
                $("input[name='year'", frmSaveYear).val(data['ems_year']['year']);
                $("input[name='start_plan'", frmSaveYear).val(data['ems_year']['start_plan']);
                $("input[name='end_plan'", frmSaveYear).val(data['ems_year']['end_plan']);
                $("input[name='start_actual'", frmSaveYear).val(data['ems_year']['start_actual']);
                $("input[name='end_actual'", frmSaveYear).val(data['ems_year']['end_actual']);
                $("input[name='start_reschedule'", frmSaveYear).val(data['ems_year']['start_reschedule']);
                $("input[name='end_reschedule'", frmSaveYear).val(data['ems_year']['end_reschedule']);
            }
            else{ 
            }
            btnSaveYear.prop('disabled', false);
            btnSaveYear.val('Save');

        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            btnSaveYear.prop('disabled', false);
            btnSaveYear.val('Save');
        }
    });
}