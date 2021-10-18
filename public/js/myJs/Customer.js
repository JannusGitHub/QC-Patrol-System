function CloseCusAudit(){
	$.ajax({
		url: 'close_customer_audit',
		method: 'post',
		data: $("#formCloseCusAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			// alert(JSON.stringify(JsonObject));
			if(JsonObject['result'] == 1){
				$("#formCloseCusAudit")[0].reset();
				$("#modalCloseCusAudit").modal('hide');
				dataTableCusAudits.ajax.reload( null, false );
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

function ChangeCustomerAuditStat(){
	$.ajax({
		url: 'change_customer_audit_stat',
		method: 'post',
		data: $("#formChangeAuditStatCusAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			// alert(JSON.stringify(JsonObject));
			if(JsonObject['result'] == 1){
				$("#formChangeAuditStatCusAudit")[0].reset();
				$("#modalChangeAuditStatCusAudit").modal('hide');
				dataTableCusAudits.ajax.reload( null, false );
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

function OpenCusAudit(){
	$.ajax({
		url: 'open_customer_audit',
		method: 'post',
		data: $("#formOpenCusAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			// alert(JSON.stringify(JsonObject));
			if(JsonObject['result'] == 1){
				$("#formOpenCusAudit")[0].reset();
				$("#modalOpenCusAudit").modal('hide');
				dataTableCusAudits.ajax.reload( null, false );
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

function DoneCusAudit(){
	$.ajax({
		url: 'done_customer_audit',
		method: 'post',
		data: $("#formDoneCusAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['result'] == 1){
				$("#formDoneCusAudit")[0].reset();
				$("#modalDoneCusAudit").modal('hide');
				dataTableCusAudits.ajax.reload( null, false );
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

function PendCusAudit(){
	$.ajax({
		url: 'pend_customer_audit',
		method: 'post',
		data: $("#formPendCusAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['result'] == 1){
				$("#formPendCusAudit")[0].reset();
				$("#modalPendCusAudit").modal('hide');
				dataTableCusAudits.ajax.reload( null, false );
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

function GetCboSelUniqueCustomerNames(cboElement){
	let result = '';
	$.ajax({
		url: 'get_unique_customer_names',
		method: 'get',
		data: {},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['customer_audits'].length > 0){
				result = '';
				for(let index = 0; index < JsonObject['customer_audits'].length; index++){
					result += '<option value="' + JsonObject['customer_audits'][index].customer_name + '">' + JsonObject['customer_audits'][index].customer_name + '</option>';
				}
			}
			else{
				result = '<option value="0" disabled> -- No record found -- </option>';
			}
			cboElement.html(result);
		},
		error: function(data, xhr, status){
			result = '<option value="0" disabled> -- Reload Again -- </option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function ChangeAuditCusStat() {
	$.ajax({
	    url: 'change_customer_cus_audit_stat',
	    method: 'post',
	    data: $("#formChangeAuditCusCustomerStat").serialize(),
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
	            dataTableCusAudits.ajax.reload( null, false );
	            $("#modalChangeCusCustomerAuditStat").modal('hide');
	            $("#formChangeAuditCusCustomerStat")[0].reset();
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

// function SendCusBatchMail(_token, arrCusSendEmail){
// 	$.ajax({
// 		url: 'send_customer_batch',
// 		method: 'post',
// 		data: {
// 			_token: _token,
// 			customer_audit_id: arrCusSendEmail
// 		},
// 		dataType: 'json',
// 		beforeSend: function(){
			
// 		},
// 		success: function(JsonObject){
// 			// alert(JSON.stringify(JsonObject));
// 			if(JsonObject['result'] == 1){
// 				arrCusSendEmail = [];
//                 // dataTableCusAudits.ajax.reload( null, false );
//                 dataTableCusBatchAudits.ajax.reload( null, false );
//                 $("#btnShowModalSendCusBatchEmail").prop('disabled', 'disabled');
//                 $("#btnSendCusBatchEmail").prop('disabled', 'disabled');
//                 $("#modalSendCusBatchEmail").modal('hide');
//                 $("#lblCusNoOfSendCusBatch").text(arrCusSendEmail.length);
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
// 	return arrCusSendEmail;
// }

function GetCboSelUniqueCusEvalItems(cboElement){
	let result = '';
	$.ajax({
		url: 'get_customer_unique_evaluation_items',
		method: 'get',
		data: {},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['customer_audits'].length > 0){
				result = '';
				for(let index = 0; index < JsonObject['customer_audits'].length; index++){
					result += '<option value="' + JsonObject['customer_audits'][index].evaluation_item + '">' + JsonObject['customer_audits'][index].evaluation_item + '</option>';
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