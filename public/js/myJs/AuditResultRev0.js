function SaveAuditResult() {
	$.ajax({
        url: "save_audit_result",
        method: "post",
        data: $('#frmSaveAuditResult').serialize(),
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
                $('#frmSaveAuditResult')[0].reset();
            	$("#mdlSaveAuditResult").modal('hide');
            	dtAuditResults.draw();
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

                let arrInputTextValidator = [
                    'audit_date_from',
                    'audit_date_to',
                    'auditors',
                    'auditees',
                    'audit_findings_issued_date',
                    'deadline_of_submission',
                    'deadline_of_submission_days',
                    'actual_date_of_submission',
                ];

                for(let index = 0; index < arrInputTextValidator.length; index++){
                    if(JsonObject['error'][arrInputTextValidator[index]] != undefined){
                        $("input[name='" + arrInputTextValidator[index] + "']", $("#frmSaveAuditResult")).addClass('border-danger');
                        $("input[name='" + arrInputTextValidator[index] + "']", $("#frmSaveAuditResult")).attr('title', JsonObject['error'][arrInputTextValidator[index]]);
                    }
                    else{
                        $("input[name='" + arrInputTextValidator[index] + "']", $("#frmSaveAuditResult")).removeClass('border-danger');
                        $("input[name='" + arrInputTextValidator[index] + "']", $("#frmSaveAuditResult")).removeAttr('title');
                    }
                }

                let arrSelect2Validator = [
                    'factor_id',
                ];
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ActionAuditResult() {
    $.ajax({
        url: "action_audit_result",
        method: "post",
        data: $('#frmActionAuditResult').serialize(),
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
                $("#mdlActionAuditResult").modal('hide');
                $("#frmActionAuditResult")[0].reset();
                dtAuditResults.draw();
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

function GetAuditResultById(audit_resultId){
    $.ajax({
        url: 'get_audit_result_by_id',
        method: 'get',
        data: {
            'audit_result_id': audit_resultId
        },
        dataType: 'json',
        beforeSend: function(){
            $("input[name='name'", $("#frmSaveAuditResult")).val('');
        },
        success: function(JsonObject){
            // if(JsonObject['data'] != null){
                // $("input[name='audit_date_from'", $("#frmSaveAuditResult")).val(JsonObject['data']['audit_date_from']);
            // }
            // else{
            //     $("input[name='name'", $("#frmSaveAuditResult")).val('');
            // }

            $("input[name='audit_date_from'", $("#frmSaveAuditResult")).val(JsonObject['data']['audit_date_from']);
            $("input[name='audit_date_to'", $("#frmSaveAuditResult")).val(JsonObject['data']['audit_date_to']);
            $("input[name='auditors'", $("#frmSaveAuditResult")).val(JsonObject['data']['auditors']);
            $("input[name='auditees'", $("#frmSaveAuditResult")).val(JsonObject['data']['auditees']);
            $("input[name='audit_findings_issued_date'", $("#frmSaveAuditResult")).val(JsonObject['data']['audit_findings_issued_date']);
            $("input[name='deadline_of_submission'", $("#frmSaveAuditResult")).val(JsonObject['data']['deadline_of_submission']);
            $("input[name='deadline_of_submission_days'", $("#frmSaveAuditResult")).val(JsonObject['data']['deadline_of_submission_days']);
            $("input[name='actual_date_of_submission'", $("#frmSaveAuditResult")).val(JsonObject['data']['actual_date_of_submission']);
            $("select[name='factor_id'", $("#frmSaveAuditResult")).val(JsonObject['data']['factor_id']);
            $("select[name='factor_item_list_id'", $("#frmSaveAuditResult")).val(JsonObject['data']['factor_item_list_id']);
            $("select[name='classification_id'", $("#frmSaveAuditResult")).val(JsonObject['data']['classification_id']);
            $("select[name='product_line_id'", $("#frmSaveAuditResult")).val(JsonObject['data']['product_line_id']);
            $("textarea[name='statement_of_findings'", $("#frmSaveAuditResult")).val(JsonObject['data']['statement_of_findings']);
            $("textarea[name='illustration'", $("#frmSaveAuditResult")).val(JsonObject['data']['illustration']);
            $("textarea[name='root_cause'", $("#frmSaveAuditResult")).val(JsonObject['data']['root_cause']);
            $("textarea[name='correction'", $("#frmSaveAuditResult")).val(JsonObject['data']['correction']);
            $("textarea[name='containment'", $("#frmSaveAuditResult")).val(JsonObject['data']['containment']);
            $("textarea[name='systematic'", $("#frmSaveAuditResult")).val(JsonObject['data']['systematic']);
            $("input[name='correction_commitment_date'", $("#frmSaveAuditResult")).val(JsonObject['data']['correction_commitment_date']);
            $("input[name='containment_commitment_date'", $("#frmSaveAuditResult")).val(JsonObject['data']['containment_commitment_date']);
            $("input[name='systematic_commitment_date'", $("#frmSaveAuditResult")).val(JsonObject['data']['systematic_commitment_date']);
            $("input[name='improvement_action'", $("#frmSaveAuditResult")).val(JsonObject['data']['improvement_action']);
            $("input[name='commitment_date'", $("#frmSaveAuditResult")).val(JsonObject['data']['commitment_date']);
            $("input[name='corrective_action'", $("#frmSaveAuditResult")).val(JsonObject['data']['corrective_action']);
            $("input[name='corrective_action'", $("#frmSaveAuditResult")).val(JsonObject['data']['corrective_action']);
            $("input[name='correction_person_in_charge'", $("#frmSaveAuditResult")).val(JsonObject['data']['correction_person_in_charge']);
            $("input[name='containment_person_in_charge'", $("#frmSaveAuditResult")).val(JsonObject['data']['containment_person_in_charge']);
            $("input[name='systematic_person_in_charge'", $("#frmSaveAuditResult")).val(JsonObject['data']['systematic_person_in_charge']);

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
            $("input[name='name'", $("#frmSaveAuditResult")).val('');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}