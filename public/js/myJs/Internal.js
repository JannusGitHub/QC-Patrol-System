function CloseInternalAudit(){
	$.ajax({
		url: 'close_internal_audit',
		method: 'post',
		data: $("#formCloseIntAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			// alert(JSON.stringify(JsonObject));
			if(JsonObject['result'] == 1){
				$("#formCloseIntAudit")[0].reset();
				$("#modalCloseIntAudit").modal('hide');
				dataTableInternalAudits.ajax.reload( null, false );
			}
			else{
				alert('Failed!');
			}
		},
		error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function OpenInternalAudit(){
	$.ajax({
		url: 'open_internal_audit',
		method: 'post',
		data: $("#formOpenIntAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			// alert(JSON.stringify(JsonObject));
			if(JsonObject['result'] == 1){
				$("#formOpenIntAudit")[0].reset();
				$("#modalOpenIntAudit").modal('hide');
				dataTableInternalAudits.ajax.reload( null, false );
			}
			else{
				alert('Failed!');
			}
		},
		error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function DoneInternalAudit(){
	$.ajax({
		url: 'done_internal_audit',
		method: 'post',
		data: $("#formDoneIntAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['result'] == 1){
				$("#formDoneIntAudit")[0].reset();
				$("#modalDoneIntAudit").modal('hide');
				dataTableInternalAudits.ajax.reload( null, false );
			}
			else{
				alert('Failed!');
			}
		},
		error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function PendInternalAudit(){
	$.ajax({
		url: 'pend_internal_audit',
		method: 'post',
		data: $("#formPendIntAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['result'] == 1){
				$("#formPendIntAudit")[0].reset();
				$("#modalPendIntAudit").modal('hide');
				dataTableInternalAudits.ajax.reload( null, false );
			}
			else{
				alert('Failed!');
			}
		},
		error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function InternalAuditQADApproval(){
	$.ajax({
		url: 'internal_qad_approval',
		method: 'post',
		data: $("#formIntQADApproval").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['result'] == 1){
				Swal({
	                position: 'top-end',
	                type: 'success',
	                title: 'Success!',
	                showConfirmButton: false,
	                timer: 1500,
	                customClass: 'swal-wide',
	            });
				$("#formIntQADApproval")[0].reset();
				$("#modalIntQADApproval").modal('hide');
				dataTableInternalAudits.ajax.reload( null, false );
			}
			else{
				Swal({
	                position: 'top-end',
	                type: 'error',
	                title: 'Failed!',
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

function InternalAuditOSApproval(){
	$.ajax({
		url: 'internal_os_approval',
		method: 'post',
		data: $("#formIntOSApproval").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['result'] == 1){
				Swal({
	                position: 'top-end',
	                type: 'success',
	                title: 'Success!',
	                showConfirmButton: false,
	                timer: 1500,
	                customClass: 'swal-wide',
	            });
				$("#formIntOSApproval")[0].reset();
				$("#modalIntOSApproval").modal('hide');
				dataTableInternalAudits.ajax.reload( null, false );
			}
			else{
				Swal({
	                position: 'top-end',
	                type: 'error',
	                title: 'Failed!',
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

function GetIntAuditByRepCtrlNoToAdd(intAuditRepCtrlNo){
	$.ajax({
		url: 'get_int_audit_by_rep_ctrl_no',
		method: 'get',
		data: {
			audit_report_control_no: intAuditRepCtrlNo,
		},
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['internal_audits'] != null){
				$("#selAddIntAuditType").val(JsonObject['internal_audits'].audit_type);
				$("#txtAddIntAuditAuditors").val(JsonObject['internal_audits'].auditors);
				$("#txtAddIntAuditAuditees").val(JsonObject['internal_audits'].auditees);
				$("#dateAddIntAuditFrom").val(JsonObject['internal_audits'].audit_date_from);
				$("#dateAddIntAuditTo").val(JsonObject['internal_audits'].audit_date_to);
				$("#txtAddIntAuditDeadSubDays").val(JsonObject['internal_audits'].deadline_of_submission_days);
				$("#dateAddIntAuditDeadSub").val(JsonObject['internal_audits'].deadline_of_submission);
				$("#dateAddIntAuditActDateSub").val(JsonObject['internal_audits'].actual_date_of_submission);
				$("#dateAddIntAuditFindIssDate").val(JsonObject['internal_audits'].audit_findings_issued_date);
				$("#txtAddIntAuditIsoAitfClause").val(JsonObject['internal_audits'].iso_iatf_clause);
				$("#txtAddIntAuditBusProcSecInt").val(JsonObject['internal_audits'].business_process);
				$("#selAddIntAuditCatOfFind").val(JsonObject['internal_audits'].category_of_findings);
				$("#selAddIntAuditClassRank").val(JsonObject['internal_audits'].classification);
				$("#txtAddIntAuditBusProcSecInt").val(JsonObject['internal_audits'].business_process);
				$("#selAddIntAuditCatOfFind").val(JsonObject['internal_audits'].category_of_findings);
				$("#selAddIntAuditClassRank").val(JsonObject['internal_audits'].classification);
				$("#txtAddIntAuditBusProcSecSupp").val(JsonObject['internal_audits'].business_process);
				$("#selAddIntAuditEvalItem").val(JsonObject['internal_audits'].evaluation_item_id).trigger('change');
			}
			else{
				$("#selAddIntAuditType").val('0');
				$("#txtAddIntAuditAuditors").val('');
				$("#txtAddIntAuditAuditees").val('');
				$("#dateAddIntAuditFrom").val('');
				$("#dateAddIntAuditTo").val('');
				$("#txtAddIntAuditDeadSubDays").val(0);
				$("#dateAddIntAuditDeadSub").val('');
				$("#dateAddIntAuditActDateSub").val('');
				$("#dateAddIntAuditFindIssDate").val('');
				$("#txtAddIntAuditIsoAitfClause").val('');
				$("#txtAddIntAuditBusProcSecInt").val('');
				$("#selAddIntAuditCatOfFind").val(0);
				$("#selAddIntAuditClassRank").val(0);
				$("#txtAddIntAuditBusProcSecInt").val('');
				$("#selAddIntAuditCatOfFind").val(0);
				$("#selAddIntAuditClassRank").val(0);
				$("#txtAddIntAuditBusProcSecSupp").val('');
				$("#selAddIntAuditEvalItem").val(0).trigger('change');
			}
		},
		error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function ChangeAuditIntStat() {
	$.ajax({
	    url: 'change_internal_audit_stat',
	    method: 'post',
	    data: $("#formChangeAuditIntStat").serialize(),
	    dataType: 'json',
	    beforeSend: function(){
	        // alert('Loading...');
	    },
	    success: function(JsonObject){
	        if(JsonObject['result'] == 1){
	            Swal({
	                position: 'top-end',
	                type: 'success',
	                title: 'Success!',
	                showConfirmButton: false,
	                timer: 1500,
	                customClass: 'swal-wide',
	            });
	            dataTableInternalAudits.ajax.reload( null, false );
	            $("#modalChangeIntAuditStat").modal('hide');
	        }
	        else{
	            Swal({
	                position: 'top-end',
	                type: 'error',
	                title: 'Failed!',
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

// function SendIntBatchMail(_token, arrIntSendEmail){
// 	$.ajax({
// 		url: 'send_internal_batch',
// 		method: 'post',
// 		data: {
// 			_token: _token,
// 			internal_audit_id: arrIntSendEmail
// 		},
// 		dataType: 'json',
// 		beforeSend: function(){
			
// 		},
// 		success: function(JsonObject){
// 			// alert(JSON.stringify(JsonObject));
// 			if(JsonObject['result'] == 1){
// 				arrIntSendEmail = [];
//                 dataTableInternalAudits.ajax.reload( null, false );
//                 dataTableIntBatchAudits.ajax.reload( null, false );
//                 $("#btnShowModalSendIntBatchEmail").prop('disabled', 'disabled');
//                 $("#btnSendIntBatchEmail").prop('disabled', 'disabled');
//                 $("#modalSendIntBatchEmail").modal('hide');
//                 $("#lblIntNoOfSendIntBatch").text(arrIntSendEmail.length);
// 			}
// 			else{
// 				Swal({
//                     position: 'top-end',
//                     type: 'error',
//                     title: 'Sending Failed!',
//                     showConfirmButton: false,
//                     timer: 1500,
//                     customClass: 'swal-wide',
//                 });
// 			}
// 		},
// 		error: function(data, xhr, status){
//             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }
// 	});
// 	return arrIntSendEmail;
// }

function GetCboSelUniqueIntEvalItems(cboElement){
	let result = '';
	$.ajax({
		url: 'get_internal_unique_evaluation_items',
		method: 'get',
		data: {},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['internal_audits'].length > 0){
				result = '';
				for(let index = 0; index < JsonObject['internal_audits'].length; index++){
					result += '<option value="' + JsonObject['internal_audits'][index].category_of_findings + '">' + JsonObject['internal_audits'][index].category_of_findings + '</option>';
				}
			}
			else{
				result = '<option value="0" disabled> -- No record found -- </option>';
			}
			cboElement.html(result);
			cboElement.val('0').trigger('change');
		},
		error: function(data, xhr, status){
			result = '<option value="0" disabled> -- Reload Again -- </option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}