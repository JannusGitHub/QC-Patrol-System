function CloseSupplierAudit(){
	$.ajax({
		url: 'close_supplier_audit',
		method: 'post',
		data: $("#formCloseSuppAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			// alert(JSON.stringify(JsonObject));
			if(JsonObject['result'] == 1){
				$("#formCloseSuppAudit")[0].reset();
				$("#modalCloseSuppAudit").modal('hide');
				dataTableSupplierAudits.draw();
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

function OpenSupplierAudit(){
	$.ajax({
		url: 'open_supplier_audit',
		method: 'post',
		data: $("#formOpenSuppAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			// alert(JSON.stringify(JsonObject));
			if(JsonObject['result'] == 1){
				$("#formOpenSuppAudit")[0].reset();
				$("#modalOpenSuppAudit").modal('hide');
				dataTableSupplierAudits.draw();
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

function DoneSupplierAudit(){
	$.ajax({
		url: 'done_supplier_audit',
		method: 'post',
		data: $("#formDoneSuppAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['result'] == 1){
				$("#formDoneSuppAudit")[0].reset();
				$("#modalDoneSuppAudit").modal('hide');
				dataTableSupplierAudits.draw();
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

function PendSupplierAudit(){
	$.ajax({
		url: 'pend_supplier_audit',
		method: 'post',
		data: $("#formPendSuppAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['result'] == 1){
				$("#formPendSuppAudit")[0].reset();
				$("#modalPendSuppAudit").modal('hide');
				dataTableSupplierAudits.draw();
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

function GetSuppAuditByRepCtrlNoToAdd(suppAuditRepCtrlNo){
	$.ajax({
		url: 'get_supp_audit_by_rep_ctrl_no',
		method: 'get',
		data: {
			audit_report_control_no: suppAuditRepCtrlNo,
		},
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['supplier_audits'].length > 0){
				$("#selAddSuppAuditType").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].audit_type);
				$("#txtAddSuppAuditAuditors").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].auditors);
				$("#txtAddSuppAuditAuditees").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].auditees);
				$("#dateAddSuppAuditDateFrom").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].audit_date_from);
				$("#dateAddSuppAuditDateTo").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].audit_date_to);
				$("#txtAddSuppAuditBusProcSecSupp").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].business_process);
				$("#txtAddSuppAuditDeadSubDays").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].deadline_of_submission_days);
				$("#dateAddSuppAuditDeadSub").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].deadline_of_submission);
				$("#dateAddSuppAuditActDateSub").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].actual_date_of_submission);
				$("#dateAddSuppAuditFindIssDate").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].audit_findings_issued_date);
				$("#txtAddSuppAuditIsoAitfClause").val(JsonObject['supplier_audits'][JsonObject['supplier_audits'].length - 1].iso_iatf_clause);
			}
			else{
				$("#selAddSuppAuditType").val(0);
				$("#txtAddSuppAuditAuditors").val('');
				$("#txtAddSuppAuditAuditees").val('');
				$("#dateAddSuppAuditDateFrom").val('');
				$("#dateAddSuppAuditDateTo").val('');
				$("#txtAddSuppAuditBusProcSecSupp").val('');
				$("#txtAddSuppAuditDeadSubDays").val(0);
				$("#dateAddSuppAuditDeadSub").val('');
				$("#dateAddSuppAuditActDateSub").val('');
				$("#dateAddSuppAuditFindIssDate").val('');
				$("#txtAddSuppAuditIsoAitfClause").val('');
			}
		},
		error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function ChangeAuditSuppStat() {
	$.ajax({
	    url: 'change_supplier_audit_stat',
	    method: 'post',
	    data: $("#formChangeAuditSuppStat").serialize(),
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
	            dataTableSupplierAudits.draw();
	            $("#modalChangeSuppAuditStat").modal('hide');
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

// function SendSuppBatchMail(_token, arrSuppSendEmail){
// 	$.ajax({
// 		url: 'send_supplier_batch',
// 		method: 'post',
// 		data: {
// 			_token: _token,
// 			supplier_audit_id: arrSuppSendEmail
// 		},
// 		dataType: 'json',
// 		beforeSend: function(){
			
// 		},
// 		success: function(JsonObject){
// 			// alert(JSON.stringify(JsonObject));
// 			if(JsonObject['result'] == 1){
// 				arrSuppSendEmail = [];
//                 dataTableSupplierAudits.draw();
//                 dataTableSuppBatchAudits.draw();
//                 $("#btnShowModalSendSuppBatchEmail").prop('disabled', 'disabled');
//                 $("#btnSendSuppBatchEmail").prop('disabled', 'disabled');
//                 $("#modalSendSuppBatchEmail").modal('hide');
//                 $("#lblSuppNoOfSendSuppBatch").text(arrSuppSendEmail.length);
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
// 	return arrSuppSendEmail;
// }

function GetCboSelUniqueSuppEvalItems(cboElement){
	let result = '';
	$.ajax({
		url: 'get_supplier_unique_evaluation_items',
		method: 'get',
		data: {},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['supplier_audits'].length > 0){
				result = '';
				for(let index = 0; index < JsonObject['supplier_audits'].length; index++){
					result += '<option value="' + JsonObject['supplier_audits'][index].evaluation_item + '">' + JsonObject['supplier_audits'][index].evaluation_item + '</option>';
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