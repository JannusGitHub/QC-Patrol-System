function GetCboUsersByStat(userStat, cboElement){
	let result = '<option value="0" disabled>--Select User--</option>';
	$.ajax({
		url: 'get_users_by_stat',
		method: 'get',
		data: {
			'user_stat': userStat
		},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			let disabled = '';
			if(JsonObject['users'].length > 0){
				result = '<option value="0" disabled>--Select User--</option>';
				for(let index = 0; index < JsonObject['users'].length; index++){
					if(JsonObject['users'][index].user_stat == 2){
						disabled = 'disabled="disabled"';
					}
					result += '<option value="' + JsonObject['users'][index].id + '" ' + disabled + '>' + JsonObject['users'][index].name + '</option>';
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

function GetCboUsersByStat2(userStat, cboElement){
	let result = '<option value="0" disabled>--Select User--</option>';
	$.ajax({
		url: '../get_users_by_stat',
		method: 'get',
		data: {
			'user_stat': userStat
		},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			let disabled = '';
			if(JsonObject['users'].length > 0){
				result = '<option value="0" disabled>--Select User--</option>';
				for(let index = 0; index < JsonObject['users'].length; index++){
					if(JsonObject['users'][index].user_stat == 2){
						disabled = 'disabled="disabled"';
					}
					result += '<option value="' + JsonObject['users'][index].id + '" ' + disabled + '>' + JsonObject['users'][index].name + '</option>';
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

function GetCboUsersByStatNullable(userStat, cboElement){
	let result = '<option value="0">N/A</option>';
	$.ajax({
		url: 'get_users_by_stat',
		method: 'get',
		data: {
			'user_stat': userStat
		},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>--Loading--</option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['users'].length > 0){
				result = '<option value="0">N/A</option>';
				for(let index = 0; index < JsonObject['users'].length; index++){
					result += '<option value="' + JsonObject['users'][index].id + '">' + JsonObject['users'][index].name + '</option>';
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