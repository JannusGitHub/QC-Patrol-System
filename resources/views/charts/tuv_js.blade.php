<script type="text/javascript">
    let jsonObjectTUVAuditCategory = [];
    let jsonObjectTUVAuditNC = [];
    let jsonObjectTUVAuditOFI = [];
    let jsonObjectTUVAuditAreasForImprovement = [];

    // ..No need
    // let TUVBarChartNCImageUri = "";
    // let TUVBarChartOFIImageUri = "";
    // let TUVBarChartAreasForImprovementImageUri = "";
    // No need..

    let TUVBarChartByAuditAuditCategoryImageUri = "";
    let TUVBarChartNCImageUri = "";
    let TUVBarChartOFIImageUri = "";
    let TUVBarChartAreasForImprovementImageUri = "";


    let tuvFilterFrom = '';
    let tuvFilterTo = '';

    let tuvFilterAuditCategory = '';

    // if($("#selFilterTUVByAuditCategory").val() == 1){
    //     tuvFilterAuditCategory = 'ISO9001 / IATF16949';
    // }
    // else{
    //     tuvFilterAuditCategory = 'ISO14001';
    // }

    tuvFilterAuditCategory = $("#selFilterTUVByAuditCategory option:selected").text();

    $("#spanTUVAuditCategory").text(tuvFilterAuditCategory);

    function GetTUVBarChartByAuditCategory(from, to, auditCategory){
        $.ajax({
            url: 'get_tuv_chart_by_audit_category',
            method: 'get',
            data: {
                'from': from,
                'to': to,
                'audit_category': auditCategory,
            },
            dataType: 'json',
            beforeSend: function(){
                jsonObjectTUVAuditCategory = [];
            },
            success: function(JsonObject){
                jsonObjectTUVAuditCategory = JsonObject;
                GenerateTUVBarChartByAuditCategory(jsonObjectTUVAuditCategory, from, to, auditCategory);
            },
            error: function(data, xhr, status){
                console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            }
        });
    }

    function GetTUVPieChartByAuditClassification(from, to, auditCategory){
        $.ajax({
            url: 'get_tuv_chart_by_classification2',
            method: 'get',
            data: {
                'from': from,
                'to': to,
                'audit_category': auditCategory,
            },
            dataType: 'json',
            beforeSend: function(){
                // jsonObjectTUVAuditCategory = [];
            },
            success: function(JsonObject){
                jsonObjectTUVAuditNC = JsonObject;
                jsonObjectTUVAuditOFI = JsonObject;
                
                // GenerateTUVBarChartByAuditClassificationNC(jsonObjectTUVAuditNC, from, to, auditCategory);
                // GenerateTUVBarChartByAuditClassificationOFI(jsonObjectTUVAuditOFI, from, to, auditCategory);
            },
            error: function(data, xhr, status){
                console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            }
        });
    }

    function GetTUVPieChartByAuditAreasForImprovement(from, to, auditCategory){
        $.ajax({
            url: 'get_tuv_chart_by_areas_for_improvement',
            method: 'get',
            data: {
                'from': from,
                'to': to,
                'audit_category': auditCategory,
            },
            dataType: 'json',
            beforeSend: function(){
                jsonObjectTUVAuditAreasForImprovement = [];
            },
            success: function(JsonObject){
                jsonObjectTUVAuditAreasForImprovement = JsonObject['tuv_audits'];
                GenerateTUVBarChartByAuditAreasForImprovement(jsonObjectTUVAuditAreasForImprovement, from, to, auditCategory);
            },
            error: function(data, xhr, status){
                console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            }
        });
    }

    function GenerateTUVBarChartByAuditCategory(JsonObject, from, to, auditCategory){
        let arrMonths = [];

        // console.log(JsonObject);
        let dateFrom = JsonObject['date_from'];
        let dateTo = JsonObject['date_to'];
        let monthFrom = parseInt(JsonObject['date_from'].split('-')[1]) - 1;
        let monthTo = parseInt(JsonObject['date_to'].split('-')[1]) + 1;
        let yearFrom = JsonObject['date_from'].split('-')[0];
        let yearTo = JsonObject['date_to'].split('-')[0];

        let momFrom = moment(dateFrom);
        let momTo = moment(dateTo);

        if(momFrom <= momTo){
            while(momFrom < momTo){
                arrMonths.push({
                    date: momFrom.format('YYYY-MM-DD'),
                    ncCount: 0,
                    ofiCount: 0,
                });
                momFrom.add(1, 'months');
            }
        }

        if(JsonObject['tuv_audits'].length > 0){
            for(let index = 0; index < arrMonths.length; index++){
                for(let index2 = 0; index2 < JsonObject['tuv_audits'].length; index2++){
                    let yearFrom = arrMonths[index].date.split('-')[0];
                    let monthFrom = arrMonths[index].date.split('-')[1];

                    let tuvAuditDateFromYear = JsonObject['tuv_audits'][index2]['audit_date_from'].split('-')[0];
                    let tuvAuditDateFromMonth = JsonObject['tuv_audits'][index2]['audit_date_from'].split('-')[1];

                    if(yearFrom == tuvAuditDateFromYear && monthFrom == tuvAuditDateFromMonth){
                        if(JsonObject['tuv_audits'][index2]['classification'] == "NC"){
                            arrMonths[index].ncCount = parseInt(arrMonths[index].ncCount) + 1;
                        }
                        else{
                            arrMonths[index].ofiCount = parseInt(arrMonths[index].ofiCount) + 1;
                        }
                    }
                }
            }
        }

        let jsonObjectData = [
            ['Genre', 'NC', { role: 'annotation' }, 'OFI', { role: 'annotation' } ],
        ];

        let recordCounter = 0;
        if(arrMonths.length > 0){
            for(let index = 0; index < arrMonths.length; index++){
                if(arrMonths[index].ncCount != 0 || arrMonths[index].ofiCount != 0){
                    jsonObjectData.push([moment(arrMonths[index].date).format('MMM YYYY'), arrMonths[index].ncCount, arrMonths[index].ncCount, arrMonths[index].ofiCount, arrMonths[index].ofiCount]);
                    recordCounter++;
                }
            }
        }
        else{
            jsonObjectData.push(['No Record Found', 0, '0', 0, '0']);
        }

        if(recordCounter <= 0){
            jsonObjectData.push(['No Record Found', 0, '0', 0, '0']);   
        }

        // console.log(arrMonths);

        var data = google.visualization.arrayToDataTable(jsonObjectData);


        var barChartTUVByAuditCategory = {
            // title: 'FY ' + tuvAuditDateFromText + ' : ' + tuvAuditCategory,
            height: 400,
            fontSize: 12,
            colors: ['#5c9bd5','#ed7e30'],
            chartArea: {
                left: '5%',
                width: '90%',
                height: 350
            },
            vAxis: {
                gridlines:{
                    color: '#e9e9e9',
                    count: 10
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 12
                }
            }
        };

        // Instantiate and draw our chart, passing in some options.
        var bar = new google.visualization.ColumnChart($("#barChartTUVByAuditCategory")[0]);
        bar.draw(data, barChartTUVByAuditCategory);
        TUVBarChartByAuditAuditCategoryImageUri = bar.getImageURI();
    }

    function GenerateTUVBarChartByAuditAreasForImprovement(JsonObject, from, to, auditCategory) {
        let fyText = "";
        let auditCategoryText = "";
        if(from == to){
            fyText = from;
        }
        else{
            fyText = from + " - " + to;
        }

        if(auditCategory == 1){
            auditCategoryText = 'ISO9001 / IATF16949';
        }
        else{
            auditCategoryText = 'ISO14001';
        }

        let jsonObjectData = [
            ['Section', 'No. of Audit Per Areas for Improvement', { role: 'annotation' }]
        ];

        let colors = arrPieColors;

        if(JsonObject.length > 0){
            for(let index = 0; index < JsonObject.length; index++){
                let areasForImprovement = JsonObject[index].evaluation_item;

                if(areasForImprovement == ""){
                    areasForImprovement = "N/A";
                }

                jsonObjectData.push([areasForImprovement, JsonObject[index].total_count, JsonObject[index].total_count]);
            }
        }
        else{
            jsonObjectData.push(['No Record Found.', 0, 0]);
            colors = ["#a3a3a3"];
        }

        var data = google.visualization.arrayToDataTable(jsonObjectData);

        let dateFrom = from + '-01';
        let dateTo = to + '-01';

        let momFrom = moment(dateFrom);
        let momTo = moment(dateTo);

        let titleRange = momFrom.format('MMM YYYY') + ' - ' + momTo.format('MMM YYYY');

        if(momFrom.format('MMM YYYY') == momTo.format('MMM YYYY')){
            titleRange = momFrom.format('MMM YYYY');
        }


        var barChartTUVByAFI = {
            title: titleRange + ' - ' + auditCategoryText + ' - Areas for Improvement',
            height: 400,
            fontSize: 12,
            colors: ['#5c9bd5','#ed7e30'],
            chartArea: {
                left: '5%',
                width: '90%',
                height: 350
            },
            vAxis: {
                gridlines:{
                    color: '#e9e9e9',
                    count: 10
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 8
                }
            }
        };

        // Instantiate and draw our chart, passing in some options.
        var bar = new google.visualization.ColumnChart($("#barChartTUVAFI")[0]);
        bar.draw(data, barChartTUVByAFI);
        TUVBarChartAreasForImprovementImageUri = bar.getImageURI();
    }

    // TUV BY CLASSIFICATION NC
    function GenerateTUVBarChartByAuditClassificationNC(JsonObject, from, to, auditCategory) {
        let dateFrom = from + '-01';
        let dateTo = to + '-01';

        let momFrom = moment(dateFrom);
        let momTo = moment(dateTo);

        let titleRange = momFrom.format('MMM YYYY') + ' - ' + momTo.format('MMM YYYY');

        if(momFrom.format('MMM YYYY') == momTo.format('MMM YYYY')){
            titleRange = momFrom.format('MMM YYYY');
        }

        let fyText = "";
        let auditCategoryText = "";
        if(from == to){
            fyText = from;
        }
        else{
            fyText = from + " - " + to;
        }

        if(auditCategory == 1){
            auditCategoryText = 'ISO9001 / IATF16949';
        }
        else{
            auditCategoryText = 'ISO14001';
        }

        let jsonObjectData = [
            // ['Department', 'Percentage']
            ['Department', 'Percentage', { role: 'annotation' } ],
        ];

        let colors = arrPieColors;

        if(JsonObject['nc_final_data'].length > 0){
            for(let index = 0; index < JsonObject['nc_final_data'].length; index++){
                let percentage = (parseFloat(JsonObject['nc_final_data'][index].count) / JsonObject['nc_total_count']) * 100;
                jsonObjectData.push([JsonObject['nc_final_data'][index].department_name, percentage, percentage.toFixed(2) + '%']);
            }
        }
        else{
            jsonObjectData.push(['No Record Found.', 0, 0]);
            colors = ["#a3a3a3"];
        }

        // Create the data table.
        var data = google.visualization.arrayToDataTable(jsonObjectData);

        // Set chart options
        var options_bar = {
            title: titleRange + ' ' + auditCategoryText + ' TUV (NC) Per Section',
            titleTextStyle: {
                'fontSize': '12'
            },
            width: 600,
            height: 400,
            fontSize: 12,
            colors: colors,
            chartArea: {
                left: '20%',
                width: '100%',
                height: 350
            },
            hAxis: {
                gridlines:{
                    color: '#e9e9e9',
                },
            },
            vAxis: {
                gridlines:{
                    count: 10
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 12,
                }
            }
        };

        // Instantiate and draw our chart, passing in some options.
        var bar = new google.visualization.BarChart($('#barChartTUVNC')[0]);
        bar.draw(data, options_bar);
        TUVBarChartNCImageUri = bar.getImageURI();
    }

    // TUV BY CLASSIFICATION OFI
    function GenerateTUVBarChartByAuditClassificationOFI(JsonObject, from, to, auditCategory) {
        let dateFrom = from + '-01';
        let dateTo = to + '-01';

        let momFrom = moment(dateFrom);
        let momTo = moment(dateTo);

        let titleRange = momFrom.format('MMM YYYY') + ' - ' + momTo.format('MMM YYYY');

        if(momFrom.format('MMM YYYY') == momTo.format('MMM YYYY')){
            titleRange = momFrom.format('MMM YYYY');
        }

        let fyText = "";
        let auditCategoryText = "";
        if(from == to){
            fyText = from;
        }
        else{
            fyText = from + " - " + to;
        }

        if(auditCategory == 1){
            auditCategoryText = 'ISO9001 / IATF16949';
        }
        else{
            auditCategoryText = 'ISO14001';
        }

        let jsonObjectData = [
            ['Department', 'Percentage', { role: 'annotation' } ],
        ];

        let colors = arrPieColors;

        if(JsonObject['ofi_final_data'].length > 0){
            for(let index = 0; index < JsonObject['ofi_final_data'].length; index++){
                let percentage = (parseFloat(JsonObject['ofi_final_data'][index].count) / JsonObject['ofi_total_count']) * 100;
                jsonObjectData.push([JsonObject['ofi_final_data'][index].department_name, percentage, percentage.toFixed(2) + '%']);
            }
        }
        else{
            jsonObjectData.push(['No Record Found.', 0, 0]);
            colors = ["#a3a3a3"];
        }

        // Create the data table.
        var data = google.visualization.arrayToDataTable(jsonObjectData);

        // Set chart options
        var options_bar = {
            title: titleRange + ' ' + auditCategoryText + ' TUV (OFI) Per Section',
            titleTextStyle: {
                'fontSize': '12'
            },
            width: 600,
            height: 400,
            fontSize: 12,
            colors: colors,
            chartArea: {
                left: '20%',
                width: '100%',
                height: 350
            },
            hAxis: {
                gridlines:{
                    color: '#e9e9e9',
                },
            },
            vAxis: {
                gridlines:{
                    count: 10
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 12,
                }
            }
        };

        // Instantiate and draw our chart, passing in some options.
        var bar = new google.visualization.BarChart($('#barChartTUVOFI')[0]);
        bar.draw(data, options_bar);
        TUVBarChartOFIImageUri = bar.getImageURI();
    }

    // Resize chart
    // ------------------------------

    $(function () {
        // Resize chart on menu width change and window resize
        $(window).on('resize', function(){
            ResizeChart();
        });

        $(".menu-toggle").on('click', function(){
            ResizeChart();
        });

        // Resize function
        function ResizeChart() {
            // console
            GenerateTUVBarChartByAuditCategory(jsonObjectTUVAuditCategory, $("#tuvAuditFrom").val(), $("#tuvAuditTo").val(), $("#selFilterTUVByAuditCategory").val());
        }

        tuvFilterFrom = $("#dateSearchTUVAuditFrom").val();
        tuvFilterTo = $("#dateSearchTUVAuditTo").val();

        tuvFilterAuditCategory = $("#selFilterTUVByAuditCategory option:selected").text();

        $("#btnSearchTUVAuditByYear").click(function(){
            tuvFilterFrom = $("#dateSearchTUVAuditFrom").val();
            tuvFilterTo = $("#dateSearchTUVAuditTo").val();

            GetTUVBarChartByAuditCategory($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditClassification($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditAreasForImprovement($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            tuvFilterAuditCategory = $("#selFilterTUVByAuditCategory option:selected").text();
            $("#spanTUVAuditCategory").text(tuvFilterAuditCategory);
        });

        $("#selFilterTUVByAuditCategory").change(function(){
            GetTUVBarChartByAuditCategory($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditClassification($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditAreasForImprovement($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            tuvFilterAuditCategory = $("#selFilterTUVByAuditCategory option:selected").text();

            console.log(tuvFilterAuditCategory);

            $("#spanTUVAuditCategory").text(tuvFilterAuditCategory);
        });

        $("#btnRefreshTUVAuditCategory").click(function(){
            GetTUVBarChartByAuditCategory($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());
            GetTUVPieChartByAuditClassification($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditAreasForImprovement($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            tuvFilterAuditCategory = $("#selFilterTUVByAuditCategory option:selected").text();
        });

        $('.btnExportTUVCharts').click(function() {
            DownloadTUVAuditResultChartsPDF('TUV Audit Result Charts ' + new Date().getTime());
        });    

    });

    function DownloadTUVAuditResultChartsPDF(filename) {
        let dateFrom = tuvFilterFrom + '-01';
        let dateTo = tuvFilterTo + '-01';

        let momFrom = moment(dateFrom);
        let momTo = moment(dateTo);

        let titleRange = momFrom.format('MMM YYYY') + ' - ' + momTo.format('MMM YYYY');

        if(momFrom.format('MMM YYYY') == momTo.format('MMM YYYY')){
            titleRange = momFrom.format('MMM YYYY');
        }

        var doc = new jsPDF('p', 'in', [11, 8.5]);
        doc.setPage(1);
        doc.text(1.5, 0.75, titleRange + ' TUV Audit Results Graphical Report');
        doc.setFontSize(10);
        doc.text(0.7, 1.5, tuvFilterAuditCategory + ' Audit Results');
        doc.addImage(TUVBarChartByAuditAuditCategoryImageUri, 'PNG', 0.3, 2, 8, 3);
        
        doc.addImage(TUVBarChartAreasForImprovementImageUri, 'PNG', 0.3, 6.5, 8, 3);
        // doc.addPage('p', 'in', [8.5, 11]);
        // doc.setPage(4);
        
        doc.addPage('p', 'in', [8.5, 11]);
        doc.setPage(2);
        doc.addImage(TUVBarChartNCImageUri, 'PNG', 0.3, 0.5, 7.5, 4.7);

        // doc.addPage('p', 'in', [8.5, 11]);
        // doc.setPage(3);
        doc.addImage(TUVBarChartOFIImageUri, 'PNG', 0.3, 5.5, 7.5, 4.7);


        doc.save(filename + '.pdf');
    }
</script>