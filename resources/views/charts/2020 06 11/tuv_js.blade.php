<script type="text/javascript">
    let jsonObjectTUVAuditCategory = [];
    let jsonObjectTUVAuditNC = [];
    let jsonObjectTUVAuditOFI = [];
    let jsonObjectTUVAuditAreasForImprovement = [];

    let TUVBarChartByAuditAuditCategoryImageUri = "";
    let TUVPieChartByAuditClassificationNCImageUri = "";
    let TUVPieChartByAuditClassificationOFIImageUri = "";
    let TUVPieChartByAuditAreasForImprovementImageUri = "";

    let tuvFilterFrom = '';
    let tuvFilterTo = '';

    let tuvFilterAuditCategory = '';

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
            url: 'get_tuv_chart_by_classification',
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
                jsonObjectTUVAuditNC = JsonObject['nc_tuv_departments'];
                jsonObjectTUVAuditOFI = JsonObject['ofi_tuv_departments'];

                GenerateTUVPieChartByAuditClassificationNC(jsonObjectTUVAuditNC, from, to, auditCategory);
                GenerateTUVPieChartByAuditClassificationOFI(jsonObjectTUVAuditOFI, from, to, auditCategory);
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

                GenerateTUVPieChartByAuditAreasForImprovement(jsonObjectTUVAuditAreasForImprovement, from, to, auditCategory);
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

    // 
    // TUV BY CLASSIFICATION NC
    function GenerateTUVPieChartByAuditClassificationNC(JsonObject, from, to, auditCategory) {
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
            ['Section', 'No. of Audit']
        ];

        let colors = arrPieColors;

        if(JsonObject.length > 0){
            for(let index = 0; index < JsonObject.length; index++){
                jsonObjectData.push([JsonObject[index].department_info.department_name + ' = ' + JsonObject[index].total_count, JsonObject[index].total_count]);
            }
        }
        else{
            jsonObjectData.push(['No Record Found.', 1]);
            colors = ["#a3a3a3"];
        }

        // Create the data table.
        var data = google.visualization.arrayToDataTable(jsonObjectData);

        // Set chart options
        var options_pie3d_exploded = {
            title: titleRange + ' ' + auditCategoryText + ' TUV (NC) Per Section',
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
                // 1: {offset: 0.05},
                // 2: {offset: 0.05},
                // 3: {offset: 0.05},
                // 4: {offset: 0.05},
            },
            pieSliceText: 'percentage',
        };

        // Instantiate and draw our chart, passing in some options.
        var pie3dExploded = new google.visualization.PieChart($('#pieChartTUVClassificationNC')[0]);
        pie3dExploded.draw(data, options_pie3d_exploded);
        TUVPieChartByAuditClassificationNCImageUri = pie3dExploded.getImageURI();
    }

    // TUV BY CLASSIFICATION OFI
    function GenerateTUVPieChartByAuditClassificationOFI(JsonObject, from, to, auditCategory) {
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
            ['Section', 'No. of Audit']
        ];

        let colors = arrPieColors;

        if(JsonObject.length > 0){
            for(let index = 0; index < JsonObject.length; index++){
                jsonObjectData.push([JsonObject[index].department_info.department_name + ' = ' + JsonObject[index].total_count, JsonObject[index].total_count]);
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
            title: titleRange + ' ' + auditCategoryText + ' TUV (OFI) Per Section',
            titleTextStyle: {
                'fontSize': '12'
            },
            width: 1000,
            height: 600,
            is3D: true,
            pieSliceText: 'label',
            // height: 400,
            fontSize: 12,
            colors: colors,
            chartArea: {
                left: '10%',
                width: '100%',
                height: 550
            },
            slices: {
                // 1: {offset: 0.05},
                // 2: {offset: 0.05},
                // 3: {offset: 0.05},
                // 4: {offset: 0.05},
            },
            pieSliceText: 'percentage'
        };

        // Instantiate and draw our chart, passing in some options.
        var pie3dExploded = new google.visualization.PieChart($('#pieChartTUVClassificationOFI')[0]);
        pie3dExploded.draw(data, options_pie3d_exploded);
        TUVPieChartByAuditClassificationOFIImageUri = pie3dExploded.getImageURI();
    }

    // TUV BY AREAS FOR IMPROVEMENT
    function GenerateTUVPieChartByAuditAreasForImprovement(JsonObject, from, to, auditCategory) {
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
            title: titleRange + ' ' + auditCategoryText + ' TUV Areas for Improvement',
            titleTextStyle: {
                'fontSize': '12'
            },
            width: 1000,
            height: 600,
            is3D: true,
            // pieSliceText: 'label',
            // height: 400,
            fontSize: 12,
            colors:colors,
            chartArea: {
                left: '10%',
                width: '100%',
                height: 550
            },
            slices: {
                // 1: {offset: 0.05},
                // 2: {offset: 0.05},
                // 3: {offset: 0.05},
                // 4: {offset: 0.05},
            },
            pieSliceText: 'percentage'
        };

        // Instantiate and draw our chart, passing in some options.
        var pie3dExploded = new google.visualization.PieChart($('#pieChartTUVClassificationAreasForImprovement')[0]);
        pie3dExploded.draw(data, options_pie3d_exploded);
        TUVPieChartByAuditAreasForImprovementImageUri = pie3dExploded.getImageURI();
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

        // $(".nav-item").on('click', function(){
        //     ResizeChart();
        //     console.log('wew');
        // });

        // $(".nav-item").on('click', function(){
        //     ResizeChart();
        //     console.log('wew');
        // });

        

        // Resize function
        function ResizeChart() {
            // console
            GenerateTUVBarChartByAuditCategory(jsonObjectTUVAuditCategory, $("#tuvAuditFrom").val(), $("#tuvAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GenerateTUVPieChartByAuditClassificationNC(jsonObjectTUVAuditNC, $("#tuvAuditFrom").val(), $("#tuvAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GenerateTUVPieChartByAuditClassificationOFI(jsonObjectTUVAuditOFI, $("#tuvAuditFrom").val(), $("#tuvAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GenerateTUVPieChartByAuditAreasForImprovement(jsonObjectTUVAuditAreasForImprovement, $("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            // // CUSTOMER
            // GenerateCustomerPieChartByAuditAreasForImprovement(jsonObjectCustomerAuditAreasForImprovement, $("#txtSearchCustomerAuditYearFrom").val(), $("#txtSearchCustomerAuditYearTo").val());
        }

        tuvFilterFrom = $("#dateSearchTUVAuditFrom").val();
        tuvFilterTo = $("#dateSearchTUVAuditTo").val();

        if($("#selFilterTUVByAuditCategory").val() == 1){
            tuvFilterAuditCategory = 'ISO9001 / IATF16949';
        }
        else{
            tuvFilterAuditCategory = 'ISO14001';
        }

        $("#btnSearchTUVAuditByYear").click(function(){
            tuvFilterFrom = $("#dateSearchTUVAuditFrom").val();
            tuvFilterTo = $("#dateSearchTUVAuditTo").val();

            GetTUVBarChartByAuditCategory($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditClassification($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditAreasForImprovement($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            if($("#selFilterTUVByAuditCategory").val() == 1){
                tuvFilterAuditCategory = 'ISO9001 / IATF16949';
            }
            else{
                tuvFilterAuditCategory = 'ISO14001';
            }
        });

        $("#selFilterTUVByAuditCategory").change(function(){
            GetTUVBarChartByAuditCategory($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditClassification($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditAreasForImprovement($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            if($("#selFilterTUVByAuditCategory").val() == 1){
                tuvFilterAuditCategory = 'ISO9001 / IATF16949';
            }
            else{
                tuvFilterAuditCategory = 'ISO14001';
            }
        });

        $("#btnRefreshTUVAuditCategory").click(function(){
            GetTUVBarChartByAuditCategory($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditClassification($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditAreasForImprovement($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            if($("#selFilterTUVByAuditCategory").val() == 1){
                tuvFilterAuditCategory = 'ISO9001 / IATF16949';
            }
            else{
                tuvFilterAuditCategory = 'ISO14001';
            }
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

        var doc = new jsPDF('l', 'in', [8.5, 11]);
        doc.setPage(1);
        doc.text(3, 0.75, titleRange + ' TUV Audit Results Graphical Report');
        doc.setFontSize(10);
        doc.text(0.7, 1.5, tuvFilterAuditCategory + ' Audit Results');
        doc.addImage(TUVBarChartByAuditAuditCategoryImageUri, 'PNG', 0.3, 2, 11, 4);
        
        doc.addPage('l', 'in', [8.5, 11]);
        doc.setPage(2);
        doc.addImage(TUVPieChartByAuditClassificationNCImageUri, 'PNG', 0.5, 1, 11, 6.8);

        doc.addPage('l', 'in', [8.5, 11]);
        doc.setPage(3);
        doc.addImage(TUVPieChartByAuditClassificationOFIImageUri, 'PNG', 0.5, 1, 11, 6.8);

        doc.addPage('l', 'in', [8.5, 11]);
        doc.setPage(4);
        doc.addImage(TUVPieChartByAuditAreasForImprovementImageUri, 'PNG', 0.5, 1, 11, 6.8);

        doc.save(filename + '.pdf');
    }
</script>