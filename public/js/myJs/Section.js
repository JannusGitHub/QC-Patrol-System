function SaveSection() {
	$.ajax({
        url: "save_section",
        method: "post",
        data: $('#frmSaveSection').serialize(),
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
                $('#frmSaveSection')[0].reset()
            	$("#mdlSaveSection").modal('hide');
            	dtSections.draw();
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

function ActionSection() {
    $.ajax({
        url: "action_section",
        method: "post",
        data: $('#frmActionSection').serialize(),
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
                $("#mdlActionSection").modal('hide');
                $("#frmActionSection")[0].reset();
                dtSections.draw();
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

function GetSectionById(sectionId){
    $.ajax({
        url: 'get_section_by_id',
        method: 'get',
        data: {
            'section_id': sectionId
        },
        dataType: 'json',
        beforeSend: function(){
            $("input[name='name'", $("#frmSaveSection")).val('');
        },
        success: function(JsonObject){
            if(JsonObject['data'] != null){
                $("select[name='department'", $("#frmSaveSection")).val(JsonObject['data']['department']);
                $("input[name='name'", $("#frmSaveSection")).val(JsonObject['data']['name']);
            }
            else{
                $("select[name='department'", $("#frmSaveSection")).val('');
                $("input[name='name'", $("#frmSaveSection")).val('');
            }
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
            $("input[name='name'", $("#frmSaveSection")).val('');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}