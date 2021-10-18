function CloseTUVAudit(){
	$.ajax({
		url: 'close_tuv_audit',
		method: 'post',
		data: $("#formCloseTUVAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			// alert(JSON.stringify(JsonObject));
			if(JsonObject['result'] == 1){
				$("#formCloseTUVAudit")[0].reset();
				$("#modalCloseTUVAudit").modal('hide');
				dataTableTUVAudits.ajax.reload( null, false );
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

function OpenTUVAudit(){
	$.ajax({
		url: 'open_tuv_audit',
		method: 'post',
		data: $("#formOpenTUVAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			// alert(JSON.stringify(JsonObject));
			if(JsonObject['result'] == 1){
				$("#formOpenTUVAudit")[0].reset();
				$("#modalOpenTUVAudit").modal('hide');
				dataTableTUVAudits.ajax.reload( null, false );
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

function DoneTUVAudit(){
	$.ajax({
		url: 'done_tuv_audit',
		method: 'post',
		data: $("#formDoneTUVAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['result'] == 1){
				$("#formDoneTUVAudit")[0].reset();
				$("#modalDoneTUVAudit").modal('hide');
				dataTableTUVAudits.ajax.reload( null, false );
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

function PendTUVAudit(){
	$.ajax({
		url: 'pend_tuv_audit',
		method: 'post',
		data: $("#formPendTUVAudit").serialize(),
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['result'] == 1){
				$("#formPendTUVAudit")[0].reset();
				$("#modalPendTUVAudit").modal('hide');
				dataTableTUVAudits.ajax.reload( null, false );
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

function ChangeAuditTUVStat() {
	$.ajax({
	    url: 'change_tuv_audit_stat',
	    method: 'post',
	    data: $("#formChangeAuditTUVStat").serialize(),
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
	            dataTableTUVAudits.ajax.reload( null, false );
	            $("#modalChangeTUVAuditStat").modal('hide');
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

// function SendTUVBatchMail(_token, arrTUVSendEmail){
// 	$.ajax({
// 		url: 'send_tuv_batch',
// 		method: 'post',
// 		data: {
// 			_token: _token,
// 			tuv_audit_id: arrTUVSendEmail
// 		},
// 		dataType: 'json',
// 		beforeSend: function(){
			
// 		},
// 		success: function(JsonObject){
// 			// alert(JSON.stringify(JsonObject));
// 			if(JsonObject['result'] == 1){
// 				arrTUVSendEmail = [];
//                 dataTableTUVAudits.ajax.reload( null, false );
//                 dataTableTUVBatchAudits.ajax.reload( null, false );
//                 $("#btnShowModalSendTUVBatchEmail").prop('disabled', 'disabled');
//                 $("#btnSendTUVBatchEmail").prop('disabled', 'disabled');
//                 $("#modalSendTUVBatchEmail").modal('hide');
//                 $("#lblTUVNoOfSendTUVBatch").text(arrTUVSendEmail.length);
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
// 	return arrTUVSendEmail;
// }

function GetCboSelUniqueTUVEvalItems(cboElement){
	let result = '';
	$.ajax({
		url: 'get_tuv_unique_evaluation_items',
		method: 'get',
		data: {},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['tuv_audits'].length > 0){
				result = '';
				for(let index = 0; index < JsonObject['tuv_audits'].length; index++){
					result += '<option value="' + JsonObject['tuv_audits'][index].evaluation_item + '">' + JsonObject['tuv_audits'][index].evaluation_item + '</option>';
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