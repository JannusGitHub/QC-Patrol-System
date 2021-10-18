// function SaveAuditResult() {
// 	$.ajax({
//         url: "save_audit_result",
//         method: "post",
//         data: $('#frmSaveAuditResult').serialize(),
//         dataType: "json",
//         beforeSend: function(){
//             $('.btnSaveAuditResult').prop('disabled', true);
//         },
//         success: function(data){
//             $('.btnSaveAuditResult').prop('disabled', false);
//             $("input[name='audit_result_id'", frmSaveAuditResult).val(data['audit_result_id']);
//             if(data['result'] == 1){
//                 $('.btnSendAuditResult').hide();
//                 $('#btnSendAuditResult').hide();
//                 Swal({
//                     position: 'top-end',
//                     type: 'success',
//                     title: 'Saved Successfully!',
//                     showConfirmButton: false,
//                     timer: 1500,
//                     customClass: 'swal-wide',
//                 });
//                 // $('#frmSaveAuditResult')[0].reset();
//             	// $("#mdlSaveAuditResult").modal('hide');

//                 $('.audit-result-input').prop('disabled', true);
//                 if($("select[name='select_layer'", frmSaveAuditResult).val() == 1){
//             	   dtAuditResults.draw();
//                 }
//                 else if($("select[name='select_layer'", frmSaveAuditResult).val() == 2){
//                     dtAuditResultsLayer2.draw();
//                 }
//                 else if($("select[name='select_layer'", frmSaveAuditResult).val() == 3){
//                     dtAuditResultsLayer3.draw();
//                 }
//                 $(".rowFindings").show();
//                 $('.btnSaveAuditResult').hide();
//                 $(".btnSendAuditResult").hide();
//                 $('.btnCancelEditAuditResultHeader').hide();
//                 $('.btnEditAuditResultHeader').show();
//                 $('.input-error').html('');
//             }
//             else{
//                 if(data['error'] != null){
//                     if(data['error']['audit_date'] != null){
//                         $("input[name='audit_date']", frmSaveAuditResult).addClass('border-danger');
//                         $("input[name='audit_date']", frmSaveAuditResult).siblings('.input-error').text(data['error']['audit_date']);
//                     }

//                     if(data['error']['issued_date'] != null){
//                         $("input[name='issued_date']", frmSaveAuditResult).addClass('border-danger');
//                         $("input[name='issued_date']", frmSaveAuditResult).siblings('.input-error').text(data['error']['issued_date']);
//                     }

//                     if(data['error']['due_date'] != null){
//                         $("input[name='due_date']", frmSaveAuditResult).addClass('border-danger');
//                         $("input[name='due_date']", frmSaveAuditResult).siblings('.input-error').text(data['error']['due_date']);
//                     }

//                     if(data['error']['checked_by'] != null){
//                         $("select[name='checked_by']", frmSaveAuditResult).addClass('border-danger');
//                         $("select[name='checked_by']", frmSaveAuditResult).siblings('.input-error').text(data['error']['checked_by']);
//                     }

//                     if(data['error']['product_line_id'] != null){
//                         $("select[name='product_line_id[]']", frmSaveAuditResult).addClass('border-danger');
//                         $("select[name='product_line_id[]']", frmSaveAuditResult).siblings('.input-error').text(data['error']['product_line_id']);
//                     }

//                     if(data['error']['section_id'] != null){
//                         $("select[name='section_id[]']", frmSaveAuditResult).addClass('border-danger');
//                         $("select[name='section_id[]']", frmSaveAuditResult).siblings('.input-error').text(data['error']['section_id']);
//                     }

//                     if(data['error']['auditors'] != null){
//                         $("select[name='auditors[]']", frmSaveAuditResult).addClass('border-danger');
//                         $("select[name='auditors[]']", frmSaveAuditResult).siblings('.input-error').text(data['error']['auditors']);
//                     }

//                     if(data['error']['auditees'] != null){
//                         $("select[name='auditees[]']", frmSaveAuditResult).addClass('border-danger');
//                         $("select[name='auditees[]']", frmSaveAuditResult).siblings('.input-error').text(data['error']['auditees']);
//                     }

//                     if(data['error']['auditee_manual'] != null){
//                         $("select[name='auditee_manual[]']", frmSaveAuditResult).addClass('border-danger');
//                         $("select[name='auditee_manual[]']", frmSaveAuditResult).siblings('.input-error').text(data['error']['auditee_manual']);
//                     }

//                     if(data['error']['commendation'] != null){
//                         $("textarea[name='commendation']", frmSaveAuditResult).addClass('border-danger');
//                         $("textarea[name='commendation']", frmSaveAuditResult).siblings('.input-error').text(data['error']['commendation']);
//                     }
//                 }


//             	Swal({
//                     position: 'top-end',
//                     type: 'error',
//                     title: 'Saving Failed!',
//                     showConfirmButton: false,
//                     timer: 1500,
//                     customClass: 'swal-wide',
//                 });
//             }
//         },
//         error: function(data, xhr, status){
//             $('.btnSaveAuditResult').prop('disabled', false);
//             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }
//     });
// }

function ActionAuditResult() {
    $.ajax({
        url: "action_audit_result",
        method: "post",
        data: $('#frmActionAuditResult').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(data){
            if(data['result'] == 1){
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

// function GetAuditResultById(audit_resultId){
//     $.ajax({
//         url: 'get_audit_result_by_id',
//         method: 'get',
//         data: {
//             'audit_result_id': audit_resultId
//         },
//         dataType: 'json',
//         beforeSend: function(){
//             frmSaveAuditResult[0].reset();
//         },
//         success: function(data){
//             if(data['data'] != null){
//                 $(".rowFindings").show();
//                 $('.btnSaveAuditResult').hide();
//                 $('.btnEditAuditResultHeader').show();
//                 $('.audit-result-input').prop('disabled', true);
//                 $('.btnCancelEditAuditResultHeader').hide();

//                 $("input[name='audit_result_id'", frmSaveAuditResult).val(data['data']['id']);
//                 $("select[name='select_layer'", frmSaveAuditResult).val(data['data']['layer']);
//                 $("input[name='layer'", $("#frmSaveAuditResult")).val(data['data']['layer']);   
//                 $("input[name='audit_date'", frmSaveAuditResult).val(data['data']['audit_date']);
//                 $("input[name='issued_date'", frmSaveAuditResult).val(data['data']['issued_date']);

//                 $('select[name="product_line_id[]"]', frmSaveAuditResult).html('');
//                 $('select[name="section_id[]"]', frmSaveAuditResult).html('');
//                 $('select[name="auditors[]"]', frmSaveAuditResult).html('');
//                 $('select[name="auditees[]"]', frmSaveAuditResult).html('');
//                 $('select[name="email_recepient_attention[]"]', frmSaveAuditResult).html('');
//                 $('select[name="email_recepient_cc[]"]', frmSaveAuditResult).html('');

//                 $('select[name="product_line_id[]"]', frmSaveAuditResult).val(0).trigger('change');
//                 $('select[name="section_id[]"]', frmSaveAuditResult).val(0).trigger('change');
//                 $('select[name="auditors[]"]', frmSaveAuditResult).val(0).trigger('change');
//                 $('select[name="auditees[]"]', frmSaveAuditResult).val(0).trigger('change');

//                 $('select[name="audit_status"]', frmSaveAuditResult).val(data['data']['audit_status']);

//                 $("input[name='due_date'", frmSaveAuditResult).val(data['data']['due_date']);
//                 $("textarea[name='commendation'", frmSaveAuditResult).val(data['data']['commendation']);

//                 // if(data['data']['layer'] == 1){
//                 //     $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().show();
//                 // }
//                 //   else if(data['data']['layer'] == 2){
//                 //     $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().hide();
//                 // }
//                 //   else if(data['data']['layer'] == 3){
//                 //     $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().hide();
//                 // }

//                 if(data['data']['checked_by_info'] != null){
//                     let checkedByInfo = '<option selected value="' + data['data']['checked_by_info']['id'] + '">' + data['data']['checked_by_info']['name'] + '</option>';
//                     $('select[name="checked_by"]', frmSaveAuditResult).append(checkedByInfo);
//                     $('select[name="checked_by"]', frmSaveAuditResult).val(data['data']['checked_by_info']['id']).trigger('change');
//                 }
//                 else{
//                     $('select[name="checked_by"]', frmSaveAuditResult).val(0).trigger('change');
//                 }

//                 if(data['data']['product_line_details'].length > 0){
//                     let productLineIds = [];
//                     for(let index = 0; index < data['data']['product_line_details'].length; index++){
//                         productLineIds.push(data['data']['product_line_details'][index]['product_line_id']);
//                         let productLineDetail = '<option selected value="' + data['data']['product_line_details'][index]['product_line_id'] + '">' + data['data']['product_line_details'][index]['product_line_info']['name'] + '</option>';
//                         $('select[name="product_line_id[]"]', frmSaveAuditResult).append(productLineDetail);
//                         $('select[name="product_line_id[]"]', frmSaveAuditResult).val(data['data']['product_line_details'][index]['product_line_id']).trigger('change');
//                     }
//                     $('select[name="product_line_id[]"]', frmSaveAuditResult).val(productLineIds).trigger('change');
//                 }
//                 else{
//                     $('select[name="product_line_id[]"]', frmSaveAuditResult).val(0).trigger('change');
//                 }

//                 if(data['data']['section_details'].length > 0){
//                     let productLineIds = [];
//                     for(let index = 0; index < data['data']['section_details'].length; index++){
//                         productLineIds.push(data['data']['section_details'][index]['section_id']);
//                         let department = "";

//                         if(data['data']['section_details'][index]['section_info']['department'] == 1){
//                             department = 'TS';
//                         }
//                         else if(data['data']['section_details'][index]['section_info']['department'] == 2){
//                             department = 'PPS';
//                         }
//                         else if(data['data']['section_details'][index]['section_info']['department'] == 3){
//                             department = 'CN';
//                         }
//                         else{
//                             department = 'YF';
//                         }
//                         let productLineDetail = '<option selected value="' + data['data']['section_details'][index]['section_id'] + '">' + department + ' - ' + data['data']['section_details'][index]['section_info']['name'] + '</option>';
//                         $('select[name="section_id[]"]', frmSaveAuditResult).append(productLineDetail);
//                         $('select[name="section_id[]"]', frmSaveAuditResult).val(data['data']['section_details'][index]['section_id']).trigger('change');
//                     }
//                     $('select[name="section_id[]"]', frmSaveAuditResult).val(productLineIds).trigger('change');
//                 }
//                 else{
//                     $('select[name="section_id[]"]', frmSaveAuditResult).val(0).trigger('change');
//                 }

//                 if(data['data']['auditor_details'].length > 0){
//                     let auditorsId = [];
//                     for(let index = 0; index < data['data']['auditor_details'].length; index++){
//                         auditorsId.push(data['data']['auditor_details'][index]['user_id']);
//                         let checkedByInfo = '<option selected value="' + data['data']['auditor_details'][index]['user_id'] + '">' + data['data']['auditor_details'][index]['user_info']['name'] + '</option>';
//                         $('select[name="auditors[]"]', frmSaveAuditResult).append(checkedByInfo);
//                         $('select[name="auditors[]"]', frmSaveAuditResult).val(data['data']['auditor_details'][index]['user_id']).trigger('change');
//                     }
//                     $('select[name="auditors[]"]', frmSaveAuditResult).val(auditorsId).trigger('change');
//                 }
//                 else{
//                     $('select[name="auditors[]"]', frmSaveAuditResult).val(0).trigger('change');
//                 }

//                 if(data['data']['auditee_details'].length > 0){
//                     let auditeesId = [];
//                     for(let index = 0; index < data['data']['auditee_details'].length; index++){
//                         auditeesId.push(data['data']['auditee_details'][index]['user_id']);
//                         let checkedByInfo = '<option selected value="' + data['data']['auditee_details'][index]['user_id'] + '">' + data['data']['auditee_details'][index]['user_info']['name'] + '</option>';
//                         $('select[name="auditees[]"]', frmSaveAuditResult).append(checkedByInfo);
//                         $('select[name="auditees[]"]', frmSaveAuditResult).val(data['data']['auditee_details'][index]['user_id']).trigger('change');
//                     }
//                     $('select[name="auditees[]"]', frmSaveAuditResult).val(auditeesId).trigger('change');
//                 }
//                 else{
//                     $('select[name="auditees[]"]', frmSaveAuditResult).val(0).trigger('change');
//                 }

//                 if(data['data']['auditee_manual'] != null){
//                     let auditeeManual = data['data']['auditee_manual'].split(',');
//                     $('select[name="auditee_manual[]"]', frmSaveAuditResult).val(auditeeManual).trigger('change');
//                 }
//                 else{
//                     $('select[name="auditee_manual[]"]', frmSaveAuditResult).val(0).trigger('change');
//                 }

//                 if(data['data']['ar_email_recipient_details'].length > 0){
//                     let emailRecipientsAttention = [];
//                     let emailRecipientsCC = [];
//                     for(let index = 0; index < data['data']['ar_email_recipient_details'].length; index++){
//                         if(data['data']['ar_email_recipient_details'][index]['type'] == 1){
//                             emailRecipientsAttention.push(data['data']['ar_email_recipient_details'][index]['user_id']);
//                             let emailRecipientsInfo = '<option selected value="' + data['data']['ar_email_recipient_details'][index]['user_id'] + '">' + data['data']['ar_email_recipient_details'][index]['user_info']['name'] + '</option>';
//                             $('select[name="email_recepient_attention[]"]', frmSaveAuditResult).append(emailRecipientsInfo);
//                             $('select[name="email_recepient_attention[]"]', frmSaveAuditResult).val(data['data']['ar_email_recipient_details'][index]['user_id']).trigger('change');
//                         }
//                         else{
//                             emailRecipientsCC.push(data['data']['ar_email_recipient_details'][index]['user_id']);
//                             let emailRecipientsInfo = '<option selected value="' + data['data']['ar_email_recipient_details'][index]['user_id'] + '">' + data['data']['ar_email_recipient_details'][index]['user_info']['name'] + '</option>';
//                             $('select[name="email_recepient_cc[]"]', frmSaveAuditResult).append(emailRecipientsInfo);
//                             $('select[name="email_recepient_cc[]"]', frmSaveAuditResult).val(data['data']['ar_email_recipient_details'][index]['user_id']).trigger('change');
//                         }
//                     }
//                     $('select[name="email_recepient_attention[]"]', frmSaveAuditResult).val(emailRecipientsAttention).trigger('change');
//                     $('select[name="email_recepient_cc[]"]', frmSaveAuditResult).val(emailRecipientsCC).trigger('change');
//                 }
//                 else{
//                     $('select[name="email_recepient_attention[]"]', frmSaveAuditResult).val(0).trigger('change');
//                     $('select[name="email_recepient_cc[]"]', frmSaveAuditResult).val(0).trigger('change');
//                 }


//                 $("select[name='layer'", frmSaveAuditResult).prop('disabled', true);

//             }
//             else{
//                 Swal({
//                     position: 'top-end',
//                     type: 'error',
//                     title: 'No record found.',
//                     showConfirmButton: false,
//                     timer: 1500,
//                     customClass: 'swal-wide',
//                 });    
//             }
//         },
//         error: function(data, xhr, status){
//             Swal({
//                 position: 'top-end',
//                 type: 'error',
//                 title: 'An error occured!',
//                 showConfirmButton: false,
//                 timer: 1500,
//                 customClass: 'swal-wide',
//             });
//             $("input[name='name'", frmSaveAuditResult).val('');
//             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }
//     });
// }