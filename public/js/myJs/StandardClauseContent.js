function AddStandardClauseContent() {
	$.ajax({
        url: "add_standard_clause_content",
        method: "post",
        data: $('#formAddStandardClauseContent').serialize(),
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
            	$("#modalAddStandardClauseContent").modal('hide');
            	$("#formAddStandardClauseContent")[0].reset();
            	dataTableStandardClauseContent.draw();
                $("#txtAddStdClauseContentName").removeClass('border-danger');
                $("#txtAddStdClauseContentName").removeAttr('title');
                $("#selAddStdClauseId").removeClass('border-danger');
                $("#selAddStdClauseId").removeAttr('title');
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

                if(JsonObject['error']['standard_clause_content_name'] != undefined){
                    $("#txtAddStdClauseContentName").addClass('border-danger');
                    $("#txtAddStdClauseContentName").attr('title', JsonObject['error']['standard_clause_name']);
                }
                else{
                    $("#txtAddStdClauseContentName").removeClass('border-danger');
                    $("#txtAddStdClauseContentName").removeAttr('title');
                }

                if(JsonObject['error']['standard_clause_id'] != undefined){
                    $("#selAddStdClauseId").addClass('border-danger');
                    $("#selAddStdClauseId").attr('title', JsonObject['error']['standard_clause_id']);
                }
                else{
                    $("#selAddStdClauseId").removeClass('border-danger');
                    $("#selAddStdClauseId").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ArchiveStandardClauseContent() {
    $.ajax({
        url: "archive_standard_clause_content",
        method: "post",
        data: $('#formArchiveStandardClauseContent').serialize(),
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
                $("#modalArchiveStandardClauseContent").modal('hide');
                $("#formArchiveStandardClauseContent")[0].reset();
                dataTableStandardClauseContent.draw();
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

function RestoreStandardClauseContent() {
    $.ajax({
        url: "restore_standard_clause_content",
        method: "post",
        data: $('#formRestoreStandardClauseContent').serialize(),
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
                $("#modalRestoreStandardClauseContent").modal('hide');
                $("#formRestoreStandardClauseContent")[0].reset();
                dataTableStandardClauseContent.draw();
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

function GetStandardClauseContentByIdToEdit(standardClauseContentId){
    $.ajax({
        url: 'get_standard_clause_content_by_id',
        method: 'get',
        data: {
            'standard_clause_content_id': standardClauseContentId
        },
        dataType: 'json',
        beforeSend: function(){
            
        },
        success: function(JsonObject){
            if(JsonObject['standard_clause_content'].length > 0){
                $("#txtEditStandardClauseContentName").val(JsonObject['standard_clause_content'][0].standard_clause_content_name);
                $("#selEditStdClauseId").val(JsonObject['standard_clause_content'][0].standard_clause_id);
                if(JsonObject['standard_clause_content'][0].is_header == 1) {
                    $("#chkEditStdClauseContentHeader").prop('checked', 'true');
                }
                else {
                    $("#chkEditStdClauseContentHeader").removeAttr('checked');
                }
            }
            else{
                $("#txtEditStandardClauseContentName").val("No record found!");
            }
        },
        error: function(data, xhr, status){
            $("#txtEditStandardClauseName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function EditStandardClauseContent(){
    $.ajax({
        url: "edit_standard_clause_content",
        method: "post",
        data: $('#formEditStandardClauseContent').serialize(),
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
                $("#modalEditStandardClauseContent").modal('hide');
                $("#formEditStandardClauseContent")[0].reset();
                dataTableStandardClauseContent.draw();
                $("#txtEditStandardClauseContentName").removeClass('border-danger');
                $("#txtEditStandardClauseContentName").removeAttr('title');
                $("#selEditStdClauseId").removeClass('border-danger');
                $("#selEditStdClauseId").removeAttr('title');
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

                if(JsonObject['error']['standard_clause_content_name'] != undefined){
                    $("#txtEditStandardClauseContentName").addClass('border-danger');
                    $("#txtEditStandardClauseContentName").attr('title', JsonObject['error']['standard_clause_content_name']);
                    
                }
                else{
                    $("#txtEditStandardClauseContentName").removeClass('border-danger');
                    $("#txtEditStandardClauseContentName").removeAttr('title');
                }

                if(JsonObject['error']['standard_clause_id'] != undefined){
                    $("#selEditStdClauseId").addClass('border-danger');
                    $("#selEditStdClauseId").attr('title', JsonObject['error']['standard_clause_id']);
                }
                else{
                    $("#selEditStdClauseId").removeClass('border-danger');
                    $("#selEditStdClauseId").removeAttr('title');
                }
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}