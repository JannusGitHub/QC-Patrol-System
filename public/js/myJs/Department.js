function GetDepartmentByStat(departmentStat, cboElement){
	let result = '';
	$.ajax({
		url: 'get_department_by_stat',
		method: 'get',
		data: {
			'department_stat': departmentStat
		},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['departments'].length > 0){
				result = '';
				for(let index = 0; index < JsonObject['departments'].length; index++){
					result += '<option value="' + JsonObject['departments'][index].department_id + '">' + JsonObject['departments'][index].department_name + '</option>';
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

function GetDepartmentByStat2(departmentStat, cboElement){
	let result = '';
	$.ajax({
		url: '../get_department_by_stat',
		method: 'get',
		data: {
			'department_stat': departmentStat
		},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['departments'].length > 0){
				result = '';
				for(let index = 0; index < JsonObject['departments'].length; index++){
					result += '<option value="' + JsonObject['departments'][index].department_id + '">' + JsonObject['departments'][index].department_name + '</option>';
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

function GetCboSelDepartmentByStat(departmentStat, cboElement){
	let result = '';
	$.ajax({
		url: 'get_department_by_stat',
		method: 'get',
		data: {
			'department_stat': departmentStat
		},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['departments'].length > 0){
				result = '';
				for(let index = 0; index < JsonObject['departments'].length; index++){
					result += '<option value="' + JsonObject['departments'][index].department_id + '">' + JsonObject['departments'][index].department_name + '</option>';
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

function LoadDepartmentByStatInArray(departmentStat, cboElement){
	let result = '';
	$.ajax({
		url: 'get_department_by_stat',
		method: 'get',
		data: {
			'department_stat': departmentStat
		},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled selected>--Loading--</option>';
			for(let index = 0; index < cboElement.length; index++){
				cboElement[index].html(result);
			}
		},
		success: function(JsonObject){
			if(JsonObject['departments'].length > 0){
				result = '';
				for(let index = 0; index < JsonObject['departments'].length; index++){
					result += '<option value="' + JsonObject['departments'][index].department_id + '">' + JsonObject['departments'][index].department_name + '</option>';
				}
			}
			else{
				result = '<option value="0" selected disabled> -- No record found -- </option>';
			}

			for(let index = 0; index < cboElement.length; index++){
				cboElement[index].html(result);
			}
		},
		error: function(data, xhr, status){
			result = '<option value="0" selected disabled> -- Reload Again -- </option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}