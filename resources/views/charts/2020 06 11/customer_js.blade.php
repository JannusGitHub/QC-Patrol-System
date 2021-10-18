<script type="text/javascript">
    let jsonObjectCustomerAuditAreasForImprovement = [];

    let customerPieChartByAuditAreasForImprovementImageUri = "";

    let customerFilterFrom = '';
    let customerFilterTo = '';

    customerFilterFrom = $("#dateSearchCustomerAuditYearFrom").val();
    customerFilterTo = $("#dateSearchCustomerAuditYearTo").val();

    function GetCustomerPieChartByAuditAreasForImprovement(from, to){
        $.ajax({
            url: 'get_customer_chart_by_areas_for_improvement',
            method: 'get',
            data: {
                'from': from,
                'to': to,
            },
            dataType: 'json',
            beforeSend: function(){
                jsonObjectCustomerAuditAreasForImprovement = [];
            },
            success: function(JsonObject){
                jsonObjectCustomerAuditAreasForImprovement = JsonObject['customer_audits'];

                GenerateCustomerPieChartByAuditAreasForImprovement(jsonObjectCustomerAuditAreasForImprovement, from, to);
            },
            error: function(data, xhr, status){
                console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            }
        });
    }

    function GenerateCustomerPieChartByAuditAreasForImprovement(JsonObject, from, to) {
        let fyText = "";;
        if(from == to){
            fyText = from;
        }
        else{
            fyText = from + " - " + to;
        }

        let jsonObjectData = [
            ['Section', 'No. of Audit']
        ];

        let colors = arrPieColors;

        if(JsonObject.length > 0){
            for(let index = 0; index < JsonObject.length; index++){
                let areasForImprovement = JsonObject[index].evaluation_item;

                if(areasForImprovement == ""){
                    areasForImprovement = "N/A";
                }

                jsonObjectData.push([areasForImprovement + ' = ' + JsonObject[index].total_count, JsonObject[index].total_count]);
            }
        }
        else{
            jsonObjectData.push(['No Record Found.', 1]);
            colors = ["#a3a3a3"];
        }

        let dateFrom = from + '-01';
        let dateTo = to + '-01';

        let momFrom = moment(dateFrom);
        let momTo = moment(dateTo);

        let titleRange = momFrom.format('MMM YYYY') + ' - ' + momTo.format('MMM YYYY');

        if(momFrom.format('MMM YYYY') == momTo.format('MMM YYYY')){
            titleRange = momFrom.format('MMM YYYY');
        }

        // Create the data table.
        var data = google.visualization.arrayToDataTable(jsonObjectData);


        // Set chart options
        var options_pie3d_exploded = {
            title: titleRange + ' Customer Areas for Improvement',
            titleTextStyle: {
                'fontSize': '12'
            },
            width: 1000,
            height: 600,
            is3D: true,
            // pieSliceText: 'percentage',
            // height: 400,
            fontSize: 12,
            colors: colors,
            chartArea: {
                left: '10%',
                width: '100%',
                height: 550
            },
            slices: {
                // '-1': {offset: 0.05},
                // 0: {offset: 0.05},
                // 1: {offset: 0.05},
                // 2: {offset: 0.05},
                // 3: {offset: 0.05},
                // 4: {offset: 0.05},
            },
            pieSliceText: 'percentage',
        };

        // Instantiate and draw our chart, passing in some options.
        var pie3dExploded = new google.visualization.PieChart($('#pieChartCustomerAreasForImprovement')[0]);
        pie3dExploded.draw(data, options_pie3d_exploded);
        customerPieChartByAuditAreasForImprovementImageUri = pie3dExploded.getImageURI();
    }

    $(function () {
        $("#btnSearchCustomerAuditByYear").click(function(){
            customerFilterFrom = $("#dateSearchCustomerAuditYearFrom").val();
            customerFilterTo = $("#dateSearchCustomerAuditYearTo").val();

            GetCustomerPieChartByAuditAreasForImprovement($("#dateSearchCustomerAuditYearFrom").val(), $("#dateSearchCustomerAuditYearTo").val());
        });
    });
</script>