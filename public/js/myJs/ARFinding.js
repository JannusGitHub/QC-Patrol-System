// function SaveARFinding() {
// 	$.ajax({
//         url: "save_ar_finding",
//         method: "post",
//         data: new FormData($("#frmSaveARFinding")[0]),
//         dataType: 'json',
//         cache: false,
//         contentType: false,
//         processData: false,

//         beforeSend: function(){

//         },
//         success: function(JsonObject){
//             if(JsonObject['validation'] == 'hasError'){
//                 if(JsonObject['error']['actual_illustration'] === undefined){
//                     $(".editActualIllustration").removeClass('is-invalid');
//                     $(".editActualIllustration").attr('title', '');
//                 }
//                 else{
//                     $(".editActualIllustration").addClass('is-invalid');
//                     $(".input-error-validation").text(JsonObject['error']['actual_illustration']);
//                     $(".editActualIllustration").attr('title', JsonObject['error']['actual_illustration']);
//                 }
//                 Swal({
//                     position: 'top-end',
//                     type: 'error',
//                     title: 'Saving Failed! Please check the fields',
//                     showConfirmButton: false,
//                     timer: 1500,
//                     customClass: 'swal-wide',
//                 });
//             }
//             else{
//                 if(JsonObject['result'] == 1){
//                     Swal({
//                         position: 'top-end',
//                         type: 'success',
//                         title: 'Saved Successfully!',
//                         showConfirmButton: false,
//                         timer: 1500,
//                         customClass: 'swal-wide',
//                     });
//                     $('#frmSaveARFinding')[0].reset();
//                     $("#mdlSaveARFinding").modal('hide');
//                     dtARFindings.draw();
//                 }
//                 else{
//                     Swal({
//                         position: 'top-end',
//                         type: 'error',
//                         title: 'Saving Failed!',
//                         showConfirmButton: false,
//                         timer: 1500,
//                         customClass: 'swal-wide',
//                     });
//                 }
                
//             }
            
//         },
//         error: function(data, xhr, status){
//             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }
//     });
// }

function ActionARFinding() {
    $.ajax({
        url: "action_ar_finding",
        method: "post",
        data: $('#frmActionARFinding').serialize(),
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
                $("#mdlActionARFinding").modal('hide');
                $("#frmActionARFinding")[0].reset();
                dtARFindings.draw();
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


// function GetARFindingById(ar_findingId){
//     $.ajax({
//         url: 'get_ar_finding_by_id',
//         method: 'get',
//         data: {
//             'ar_finding_id': ar_findingId
//         },
//         dataType: 'json',
//         beforeSend: function(){
//             $("input[name='no'", frmSaveARFinding).val('');
//         },
//         success: function(data){
//             alert('asd');
//             console.log('Data: ' + data)
//             frmSaveARFinding[0].reset();
//             if(data['data'] != null){
//                 $("select[name='department'", frmSaveARFinding).val(data['data']['department']);
//                 $("input[name='no'", frmSaveARFinding).val(data['data']['name']);

//                 $("input[name='audit_result_id'", frmSaveARFinding).val(data['data']['audit_result_id']);
//                 $("input[name='ar_finding_id'", frmSaveARFinding).val(data['data']['id']);
//                 $("input[name='no'", frmSaveARFinding).val(data['data']['no']);
//                 $("input[name='station'", frmSaveARFinding).val(data['data']['station']);
//                 $("textarea[name='counter_measures'", frmSaveARFinding).val(data['data']['counter_measures']);
//                 $("input[name='commitment_date'", frmSaveARFinding).val(data['data']['commitment_date']);
//                 // $("input[name='close_out_image'", frmSaveARFinding).val(data['data']['close_out_image']);
//                 $("textarea[name='close_out'", frmSaveARFinding).val(data['data']['close_out']);
//                 $("textarea[name='statement_of_findings'", frmSaveARFinding).val(data['data']['statement_of_findings']);

//                 if(data['data']['actual_illustration'].length > 0){
//                     console.log('qwe: ' + data['actual_illustration']['actual_illustration']);
//                     let splitted = data['data']['actual_illustration'].split(', ');
//                     splitted.forEach(actualImage => {
//                         console.log(actualImage);
//                         var image = $('<img src="'+ actualImage +'" style="max-width: 100px; max-height: 200px; min-width: 50px; min-height: 50px;" class="commonAuditImg">').appendTo('.actual-illustration-images');
//                         $('.actual-illustration-images', frmSaveARFinding).append(image);
//                     });
//                 }
                
//                 // $(".editActualIllustration", frmSaveARFinding).val(data['data']['actual_illustration']);
                
//                 $("select[name='factor_id'", frmSaveARFinding).val(data['data']['factor_id']);
//                 $("select[name='factor_item_list_id'", frmSaveARFinding).val(data['data']['factor_item_list_id']);
//                 // $("select[name='in_charge[]'", frmSaveARFinding).val(data['data']['in_charge']);
//                 $("select[name='classification_id'", frmSaveARFinding).val(data['data']['classification_id']);

//                 if(data['data']['classification_info'] != null){
//                     let classificationInfo = '<option selected value="' + data['data']['classification_info']['id'] + '">' + data['data']['classification_info']['name'] + '</option>';
//                     $('select[name="classification_id"]', frmSaveARFinding).append(classificationInfo);
//                     $('select[name="classification_id"]', frmSaveARFinding).val(data['data']['classification_info']['id']).trigger('change');
//                 }
//                 else{
//                     $('select[name="classification_id"]', frmSaveARFinding).val(0).trigger('change');
//                 }

//                 if(data['data']['factor_info'] != null){
//                     let factorInfo = '<option selected value="' + data['data']['factor_info']['id'] + '">' + data['data']['factor_info']['name'] + '</option>';
//                     $('select[name="factor_id"]', frmSaveARFinding).append(factorInfo);
//                     $('select[name="factor_id"]', frmSaveARFinding).val(data['data']['factor_info']['id']).trigger('change');
//                 }
//                 else{
//                     $('select[name="factor_id"]', frmSaveARFinding).val(0).trigger('change');
//                 }

//                 if(data['data']['factor_item_list_info'] != null){
//                     let factorItemListInfo = '<option selected value="' + data['data']['factor_item_list_info']['id'] + '">' + data['data']['factor_item_list_info']['name'] + '</option>';
//                     $('select[name="factor_item_list_id"]', frmSaveARFinding).append(factorItemListInfo);
//                     $('select[name="factor_item_list_id"]', frmSaveARFinding).val(data['data']['factor_item_list_info']['id']).trigger('change');
//                 }
//                 else{
//                     $('select[name="factor_item_list_id"]', frmSaveARFinding).val(0).trigger('change');
//                 }

//                 $("select[name='in_charge[]'", frmSaveARFinding).html('');

//                 if(data['data']['in_charge_details'].length > 0){
//                     let inCharge = [];
//                     for(let index = 0; index < data['data']['in_charge_details'].length; index++){
//                         inCharge.push(data['data']['in_charge_details'][index]['user_id']);
//                         let inChargeInfo = '<option selected value="' + data['data']['in_charge_details'][index]['user_id'] + '">' + data['data']['in_charge_details'][index]['user_info']['name'] + '</option>';
//                         $('select[name="in_charge[]"]', frmSaveARFinding).append(inChargeInfo);
//                         $('select[name="in_charge[]"]', frmSaveARFinding).val(data['data']['in_charge_details'][index]['user_id']).trigger('change');
//                     }
//                     // alert(inCharge);
//                     $('select[name="in_charge[]"]', frmSaveARFinding).val(inCharge).trigger('change');
//                 }
//                 else{
//                     $('select[name="in_charge[]"]', frmSaveARFinding).val(0).trigger('change');
//                 }

//                 // dtARFindings.draw();
//             }
//             // else{
//             //     $("select[name='department'", frmSaveARFinding).val('');
//             //     $("input[name='no'", frmSaveARFinding).val('');
//             // }
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
//             $("input[name='no'", frmSaveARFinding).val('');
//             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }
//     });
// }

function Report1(year){
    $.ajax({
        url: 'report1',
        method: 'get',
        data: {
            'year': year,
        },
        dataType: 'json',
        beforeSend: function(){
            // $("input[name='no'", frmSaveARFinding).val('');
        },
        success: function(data){
            let result = '';
            // frmSaveARFinding[0].reset();
            if(data['data'].length > 0){
                let totalCounts = [];
                for(let index = 0; index < data['data'].length; index++){
                    result += '<tr>';
                    result += '<td>' + data['data'][index]['classification_name'] + '</td>';
                    for(let index2 = 0; index2 < data['data'][index]['data'].length; index2++){
                        if(index <= 0){
                            totalCounts.push(0);
                        }

                        result += '<td>' + data['data'][index]['data'][index2]['count'] + '</td>';
                        totalCounts[index2] += data['data'][index]['data'][index2]['count'];
                    }
                    result += '</tr>';
                }

                result += '<tr>';
                result += '<td><b>Total</b></td>';

                for(let index = 0; index < totalCounts.length; index++){
                    result += '<td><b>' + totalCounts[index] + '</b></td>';
                }
                result += '</tr>';
            }
            else{
                result += '<tr>';
                    result += '<td colspan="14"><center>No record found.</center></td>';
                result += '</tr>';
            }
            $('#tblClassifications tbody').html(result);
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
            // $("input[name='no'", frmSaveARFinding).val('');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function Chart1(year){
    $.ajax({
        url: 'chart1',
        method: 'get',
        data: {
            'year': year,
        },
        dataType: 'json',
        beforeSend: function(){
            // $("input[name='no'", frmSaveARFinding).val('');
        },
        success: function(data){
            let result = '';
            // frmSaveARFinding[0].reset();
            let chartData = [];
            chartData.push(['Classification of Phenomenon', 'Total Number']);

            if(data['data'].length > 0){
                for(let index = 0; index < data['data'].length; index++){

                    // chartData.push([
                    //     [data['data'][index]['classification_info']['name'], data['data'][index]['classification_count']],
                    // ]);
                    chartData.push([data['data'][index]['classification_info']['name'], data['data'][index]['classification_count']]);
                    // chartData.push([data['data'][index]['classification_count'] + ' = ' + data['data'][index]['classification_info']['name'], data['data'][index]['classification_count']]);
                    // chartData.push(['5S', 1]);
                }
            }
            else{
                chartData.push(['No Data', 1]);
            }
            // console.log(chartData[0]);
                // Load the Visualization API and the corechart package.
              google.load('visualization', '1.0', {'packages':['corechart']});

              // Set a callback to run when the Google Visualization API is loaded.
              google.setOnLoadCallback(function(){
                drawPie(chartData);
              });

              // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
              function drawPie(chartData) {
                  // var chartData = [
                  //     ['Task', 'Hours per Day'],
                  //     ['Loading...',     1],
                  // ];
                  // Create the data table.
                  // console.log(chartData);
                  var data = google.visualization.arrayToDataTable(chartData);


                  // Set chart options
                  var options_bar = {
                      title: 'Classification of Phenomenon FY ' + $('#txtSearchByYear').val(),
                      height: 400,
                      fontSize: 12,
                      is3D: true,
                      // colors:['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'],
                      chartArea: {
                          left: '5%',
                          width: '90%',
                          height: 350
                      },
                      // slices: {
                      //       1: {offset: 0.07},
                      //       2: {offset: 0.07},
                      //       3: {offset: 0.07},
                      //       4: {offset: 0.07},
                      //  }
                  };

                  // Instantiate and draw our chart, passing in some options.
                  var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
                  chart.draw(data, options_bar);

              }

            // $('#tblClassifications tbody').html(result);
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
            // $("input[name='no'", frmSaveARFinding).val('');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function Report2(year){
    $.ajax({
        url: 'report2',
        method: 'get',
        data: {
            'year': year,
        },
        dataType: 'json',
        beforeSend: function(){
            // $("input[name='no'", frmSaveARFinding).val('');
        },
        success: function(data){
            let result = '';
            // frmSaveARFinding[0].reset();
            if(data['data'].length > 0){
                let totalCounts = [];
                for(let index = 0; index < data['data'].length; index++){
                    result += '<tr>';
                    result += '<td>' + data['data'][index]['factor_name'] + '</td>';
                    for(let index2 = 0; index2 < data['data'][index]['data'].length; index2++){
                        if(index <= 0){
                            totalCounts.push(0);
                        }

                        result += '<td>' + data['data'][index]['data'][index2]['count'] + '</td>';
                        totalCounts[index2] += data['data'][index]['data'][index2]['count'];
                    }
                    result += '</tr>';
                }

                result += '<tr>';
                result += '<td><b>Total</b></td>';

                for(let index = 0; index < totalCounts.length; index++){
                    result += '<td><b>' + totalCounts[index] + '</b></td>';
                }
                result += '</tr>';
            }
            $('#tblFactors tbody').html(result);
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
            // $("input[name='no'", frmSaveARFinding).val('');
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}