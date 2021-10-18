function AddStandardClause() {
	$.ajax({
        url: "add_standard_clause",
        method: "post",
        data: $('#formAddStandardClause').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
        	// alert(JSON.stringify(JsonObject));
        	// return;
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Saved Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            	$("#modalAddStandardClause").modal('hide');
            	$("#formAddStandardClause")[0].reset();
            	dataTableStandardClause.draw();
                $("#txtAddStdClauseName").removeClass('border-danger');
                $("#txtAddStdClauseName").removeAttr('title');
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

                if(JsonObject['error']['standard_clause_name'] != undefined){
                    $("#txtAddStdClauseName").addClass('border-danger');
                    $("#txtAddStdClauseName").attr('title', JsonObject['error']['standard_clause_name']);
                }
                else{
                    $("#txtAddStdClauseName").removeClass('border-danger');
                    $("#txtAddStdClauseName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ArchiveStandardClause() {
	$.ajax({
        url: "archive_standard_clause",
        method: "post",
        data: $('#formArchiveStandardClause').serialize(),
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
            	$("#modalArchiveStandardClause").modal('hide');
            	$("#formArchiveStandardClause")[0].reset();
            	dataTableStandardClause.draw();
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

function RestoreStandardClause() {
	$.ajax({
        url: "restore_standard_clause",
        method: "post",
        data: $('#formRestoreStandardClause').serialize(),
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
            	$("#modalRestoreStandardClause").modal('hide');
            	$("#formRestoreStandardClause")[0].reset();
            	dataTableStandardClause.draw();
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

function GetStandardClauseByIdToEdit(standardClauseId){
	$.ajax({
		url: 'get_standard_clause_by_id',
		method: 'get',
		data: {
			'standard_clause_id': standardClauseId
		},
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['standard_clause'].length > 0){
				$("#txtEditStandardClauseName").val(JsonObject['standard_clause'][0].standard_clause_name);
			}
			else{
				$("#txtEditStandardClauseName").val("No record found!");
			}
		},
		error: function(data, xhr, status){
			$("#txtEditStandardClauseName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function EditStandardClause(){
    $.ajax({
        url: "edit_standard_clause",
        method: "post",
        data: $('#formEditStandardClause').serialize(),
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
                $("#modalEditStandardClause").modal('hide');
                $("#formEditStandardClause")[0].reset();
                dataTableStandardClause.draw();
                $("#txtEditStandardClauseName").removeClass('border-danger');
                $("#txtEditStandardClauseName").removeAttr('title');
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

                if(JsonObject['error']['standard_clause_name'] != undefined){
                    $("#txtEditStandardClauseName").addClass('border-danger');
                    $("#txtEditStandardClauseName").attr('title', JsonObject['error']['standard_clause_name']);
                }
                else{
                    $("#txtEditStandardClauseName").removeClass('border-danger');
                    $("#txtEditStandardClauseName").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetCboStandardClauseByStat(standardClauseStat, cboElement){
	let result = '<option value="0" selected disabled> -- Select Standard Clause -- </option>';
	$.ajax({
		url: 'get_standard_clause_by_stat',
		method: 'get',
		data: {
			'standard_clause_stat': standardClauseStat
		},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" selected disabled> -- Loading -- </option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['standard_clauses'].length > 0){
				result = '<option value="0" selected disabled> -- Select Standard Clause -- </option>';
				for(let index = 0; index < JsonObject['standard_clauses'].length; index++){
					result += '<option value="' + JsonObject['standard_clauses'][index].standard_clause_id + '">' + JsonObject['standard_clauses'][index].standard_clause_name + '</option>';
				}
			}
			else{
				result = '<option value="0" selected disabled> -- No record found -- </option>';
			}
			cboElement.html(result);
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
			result = '<option value="0" selected disabled> -- Reload Again -- </option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}