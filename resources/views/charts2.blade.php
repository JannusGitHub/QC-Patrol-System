@extends('layouts.master_layout')
@section('title', 'Charts')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Charts</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Charts
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Feather icons section start -->
          <section id="feather-icons">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="card">
                          <div class="card-body collapse in">
                              <div class="card-block">
                                  <ul class="nav nav-tabs nav-justified">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="linkTabTUV" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">TUV</a>
                                    </li>
                                    <li class="nav-item" id="linkTabCustomer">
                                      <a class="nav-link" data-toggle="tab" href="#tabCustomer" aria-controls="link" aria-expanded="false">Customer</a>
                                    </li>
                                    <li class="nav-item" id="linkTabInternal">
                                      <a class="nav-link" data-toggle="tab" href="#tabInternal" aria-controls="linkOpt">Internal</a>
                                    </li>
                                    <li class="nav-item" id="linkTabSupplier">
                                      <a class="nav-link" data-toggle="tab" href="#tabSupplier" aria-controls="linkOpt">Supplier</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content px-1 pt-1">
                                    <!-- TUV PANEL -->
                                    <div role="tabpanel" class="tab-pane fade active in" id="active" aria-labelledby="active-tab" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">FY Range</span>
                                                    <input type="number" class="form-control" name="from" id="txtSearchTUVAuditYearFrom" value="<?php echo date('Y'); ?>" style="min-width: 70px;">
                                                    <span class="input-group-addon">to</span>
                                                    <input type="number" class="form-control" name="to" id="txtSearchTUVAuditYearTo" value="<?php echo date('Y'); ?>" style="min-width: 70px;">
                                                    <span class="input-group-addon btn btn-info" id="btnSearchTUVAuditByYear"><i class="icon-search"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">TUV AUDIT RESULTS BY AUDIT CATEGORY</h4>
                                                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                        <div class="heading-elements">
                                                            <ul class="list-inline mb-0">
                                                                <li id="btnRefreshTUVAuditCategory" title="Refresh"><a data-action=""><i class="icon-reload"></i></a></li>
                                                                <li id="btnExportTUVAuditCategory" title="Export to PDF" class="btnExportTUVCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-block" style="overflow-x: auto;">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="input-group input-group-sm">
                                                                        <span class="input-group-addon">Audit Category</span>

                                                                        <select class="form-control" name="audit_category" id="selFilterTUVByAuditCategory">
                                                                            <option value="1">ISO9001 / IATF16949</option>
                                                                            <option value="2">ISO14001</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div id="barChartTUVByAuditCategory"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-block" style="overflow-x: auto;">
                                                            <div id="pieChartTUVClassificationNC"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-block" style="overflow-x: auto;">
                                                            <div id="pieChartTUVClassificationOFI"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-block" style="overflow-x: auto;">
                                                            <div id="pieChartTUVClassificationAreasForImprovement"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ../ TUV PANEL -->

                                    <!-- CUSTOMER PANEL -->
                                    <div class="tab-pane fade" id="tabCustomer" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">FY Range</span>
                                                    <input type="number" class="form-control" name="from" id="txtSearchCustomerAuditYearFrom" value="<?php echo date('Y'); ?>" style="min-width: 70px;">
                                                    <span class="input-group-addon">to</span>
                                                    <input type="number" class="form-control" name="to" id="txtSearchCustomerAuditYearTo" value="<?php echo date('Y'); ?>" style="min-width: 70px;">
                                                    <span class="input-group-addon btn btn-info" id="btnSearchCustomerAuditByYear"><i class="icon-search"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">CUSTOMER AUDIT RESULTS</h4>
                                                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                        <div class="heading-elements">
                                                            <ul class="list-inline mb-0">
                                                                <li id="btnRefreshCustomerAuditResults" title="Refresh"><a data-action=""><i class="icon-reload"></i></a></li>
                                                                <li id="btnExportCustomerAuditResults" title="Export to PDF" class="btnExportCustomerCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-block" style="overflow-x: auto;">
                                                            <div id="pieChartCustomerAreasForImprovement"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ../ CUSTOMER PANEL -->

                                    <!-- ../ Internal PANEL -->
                                    <div class="tab-pane fade" id="tabInternal" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">FY Range</span>
                                                <input type="number" class="form-control" name="from" id="txtSearchInternalAuditYearFrom" value="<?php echo date('Y'); ?>" style="min-width: 70px;">
                                                <span class="input-group-addon">to</span>
                                                <input type="number" class="form-control" name="to" id="txtSearchInternalAuditYearTo" value="<?php echo date('Y'); ?>" style="min-width: 70px;">
                                                <span class="input-group-addon btn btn-info" id="btnSearchInternalAuditByYear"><i class="icon-search"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ../ Supplier PANEL -->
                                    <div class="tab-pane fade" id="tabSupplier" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">FY Range</span>
                                                <input type="number" class="form-control" name="from" id="txtSearchSupplierAuditYearFrom" value="<?php echo date('Y'); ?>" style="min-width: 70px;">
                                                <span class="input-group-addon">to</span>
                                                <input type="number" class="form-control" name="to" id="txtSearchSupplierAuditYearTo" value="<?php echo date('Y'); ?>" style="min-width: 70px;">
                                                <span class="input-group-addon btn btn-info" id="btnSearchSupplierAuditByYear"><i class="icon-search"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- // Feather icons section end -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection

@section('js_content')
    <!-- TUV -->
<script type="text/javascript">
    let jsonObjectTUVAuditCategory = [];
    let jsonObjectTUVAuditNC = [];
    let jsonObjectTUVAuditOFI = [];
    let jsonObjectTUVAuditAreasForImprovement = [];

    let TUVBarChartByAuditAuditCategoryImageUri = "";
    let TUVPieChartByAuditClassificationNCImageUri = "";
    let TUVPieChartByAuditClassificationOFIImageUri = "";
    let TUVPieChartByAuditAreasForImprovementImageUri = "";

    google.load('visualization', '1.0', {'packages':['corechart']});

    google.setOnLoadCallback(function(){
        GetTUVBarChartByAuditCategory($("#txtSearchTUVAuditYearFrom").val(), $("#txtSearchTUVAuditYearTo").val(), $("#selFilterTUVByAuditCategory").val());
        GetTUVPieChartByAuditClassification($("#txtSearchTUVAuditYearFrom").val(), $("#txtSearchTUVAuditYearTo").val(), $("#selFilterTUVByAuditCategory").val());

        GetTUVPieChartByAuditAreasForImprovement($("#txtSearchTUVAuditYearFrom").val(), $("#txtSearchTUVAuditYearTo").val(), $("#selFilterTUVByAuditCategory").val());

        GetCustomerPieChartByAuditAreasForImprovement($("#txtSearchCustomerAuditYearFrom").val(), $("#txtSearchCustomerAuditYearTo").val());
    });

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
        let tuvAuditFrom = from;
        let tuvAuditTo = to;
        let tuvAuditCategory = auditCategory;
        let tuvAuditDateFromText = "";

        if(tuvAuditCategory == 1){
            tuvAuditCategory = 'ISO9001 / IATF16949';
        }
        else{
            tuvAuditCategory = 'ISO14001';
        }

        if(tuvAuditFrom == tuvAuditTo){
            tuvAuditDateFromText = tuvAuditFrom;
        }
        else{
            tuvAuditDateFromText = tuvAuditFrom + " - " + tuvAuditTo;
        }

        let jsonObjectData = [
            ['Genre', 'NC', { role: 'annotation' }, 'OFI', { role: 'annotation' } ],
        ];

        if(JsonObject['tuv_audits'].length > 0) {
            let ncCounter = 0;
            let ofiCounter = 0;
            for(let index = tuvAuditFrom; index <= tuvAuditTo; index++){
                ncCounter = 0;
                ofiCounter = 0;
                for(let index2 = 0; index2 < JsonObject['tuv_audits'].length; index2++){
                    // let auditDateFrom = new Date(JsonObject['tuv_audits'][index2].audit_date_from);
                    // let auditMonthFrom = auditDateFrom.getMonth(); 
                    // let auditYearFrom = auditDateFrom.getFullYear();
                    
                    let auditDateFrom = new Date(JsonObject['tuv_audits'][index2].audit_date_from);
                    let auditDateTo = new Date(JsonObject['tuv_audits'][index2].audit_date_from);
                    let auditClassification = JsonObject['tuv_audits'][index2].classification;
                    let filterYearFrom = new Date(index + '-04-01');
                    let filterYearTo = new Date((parseInt(index) + 1) + '-03-31');

                    if(JsonObject['tuv_audits'][index2].audit_date_from.split('-')[0] == index){
                    // if(auditDateFrom >= filterYearFrom && auditDateTo <= filterYearTo){
                        // if(index == '2018'){
                        //     console.log(auditDateFrom + " >= " + filterYearFrom + " && " + auditDateTo + " >= " + filterYearTo);
                        // }

                        if(JsonObject['tuv_audits'][index2].classification == "NC"){
                            ncCounter++;
                        }
                        else{
                            ofiCounter++;
                        }
                    }

                    // if(JsonObject['tuv_audits'][index2].audit_date_from == index){
                    //     if(JsonObject['tuv_audits'][index2].classification == "NC"){
                    //         ncCounter++;
                    //     }
                    //     else{
                    //         ofiCounter++;
                    //     }
                    // }
                }
                jsonObjectData.push([index, ncCounter, ncCounter, ofiCounter, ofiCounter]);    
            }
        }
        else{
            jsonObjectData.push(['No Record Found', 0, '0', 0, '0']);
        }

        var data = google.visualization.arrayToDataTable(jsonObjectData);


        var barChartTUVByAuditCategory = {
            // title: 'FY ' + tuvAuditDateFromText + ' : ' + tuvAuditCategory,
            height: 400,
            fontSize: 12,
            colors: ['#E84A5F','#99B898'],
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
    }

    // 
    // TUV BY CLASSIFICATION NC
    function GenerateTUVPieChartByAuditClassificationNC(JsonObject, from, to, auditCategory) {
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

        if(JsonObject.length > 0){
            for(let index = 0; index < JsonObject.length; index++){
                jsonObjectData.push([JsonObject[index].department_info.department_name + ' = ' + JsonObject[index].total_count, JsonObject[index].total_count]);
            }
        }
        else{
            jsonObjectData.push(['No Record Found.', 1]);
        }

        // Create the data table.
        var data = google.visualization.arrayToDataTable(jsonObjectData);


        // Set chart options
        var options_pie3d_exploded = {
            title: 'FY ' + fyText + ' ' + auditCategoryText + ' TUV (NC) Per Section',
            titleTextStyle: {
                'fontSize': '12'
            },
            width: 550,
            height: 450,
            is3D: true,
            pieSliceText: 'label',
            // height: 400,
            fontSize: 12,
            colors:['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'],
            chartArea: {
                left: '20%',
                width: '90%',
                height: 350
            },
            slices: {
                1: {offset: 0.05},
                2: {offset: 0.05},
                3: {offset: 0.05},
                4: {offset: 0.05},
            }
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

        if(JsonObject.length > 0){
            for(let index = 0; index < JsonObject.length; index++){
                jsonObjectData.push([JsonObject[index].department_info.department_name + ' = ' + JsonObject[index].total_count, JsonObject[index].total_count]);
            }
        }
        else{
            jsonObjectData.push(['No Record Found.', 1]);
        }

        // Create the data table.
        var data = google.visualization.arrayToDataTable(jsonObjectData);


        // Set chart options
        var options_pie3d_exploded = {
            title: 'FY ' + fyText + ' ' + auditCategoryText + ' TUV (OFI) Per Section',
            titleTextStyle: {
                'fontSize': '12'
            },
            width: 550,
            height: 450,
            is3D: true,
            pieSliceText: 'label',
            // height: 400,
            fontSize: 12,
            colors:['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'],
            chartArea: {
                left: '20%',
                width: '90%',
                height: 350
            },
            slices: {
                1: {offset: 0.05},
                2: {offset: 0.05},
                3: {offset: 0.05},
                4: {offset: 0.05},
            }
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
        }

        // Create the data table.
        var data = google.visualization.arrayToDataTable(jsonObjectData);


        // Set chart options
        var options_pie3d_exploded = {
            title: 'FY ' + fyText + ' ' + auditCategoryText + ' TUV Areas for Improvement',
            titleTextStyle: {
                'fontSize': '12'
            },
            width: 550,
            height: 450,
            is3D: true,
            pieSliceText: 'label',
            // height: 400,
            fontSize: 12,
            colors:['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'],
            chartArea: {
                left: '20%',
                width: '90%',
                height: 350
            },
            slices: {
                1: {offset: 0.05},
                2: {offset: 0.05},
                3: {offset: 0.05},
                4: {offset: 0.05},
            }
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
        $(window).on('resize', ResizeChart);
        $(".menu-toggle").on('click', ResizeChart);

        // Resize function
        function ResizeChart() {
            // console
            GenerateTUVBarChartByAuditCategory(jsonObjectTUVAuditCategory[0], $("#tuvAuditFrom").val(), $("#tuvAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GenerateTUVPieChartByAuditClassificationNC(jsonObjectTUVAuditNC, $("#tuvAuditFrom").val(), $("#tuvAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GenerateTUVPieChartByAuditClassificationOFI(jsonObjectTUVAuditOFI, $("#tuvAuditFrom").val(), $("#tuvAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GenerateTUVPieChartByAuditAreasForImprovement(jsonObjectTUVAuditAreasForImprovement, $("#txtSearchTUVAuditYearFrom").val(), $("#txtSearchTUVAuditYearTo").val(), $("#selFilterTUVByAuditCategory").val());

            // CUSTOMER
            GenerateCustomerPieChartByAuditAreasForImprovement(jsonObjectCustomerAuditAreasForImprovement, $("#txtSearchCustomerAuditYearFrom").val(), $("#txtSearchCustomerAuditYearTo").val());
        }

        $("#btnSearchTUVAuditByYear").click(function(){
            GetTUVBarChartByAuditCategory($("#txtSearchTUVAuditYearFrom").val(), $("#txtSearchTUVAuditYearTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditClassification($("#txtSearchTUVAuditYearFrom").val(), $("#txtSearchTUVAuditYearTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditAreasForImprovement($("#txtSearchTUVAuditYearFrom").val(), $("#txtSearchTUVAuditYearTo").val(), $("#selFilterTUVByAuditCategory").val());
        });

        $("#selFilterTUVByAuditCategory").change(function(){
            GetTUVBarChartByAuditCategory($("#txtSearchTUVAuditYearFrom").val(), $("#txtSearchTUVAuditYearTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditClassification($("#txtSearchTUVAuditYearFrom").val(), $("#txtSearchTUVAuditYearTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditAreasForImprovement($("#txtSearchTUVAuditYearFrom").val(), $("#txtSearchTUVAuditYearTo").val(), $("#selFilterTUVByAuditCategory").val());
        });

        // CUSTOMER

    });
</script>

    <!-- CUSTOMER -->
<script type="text/javascript">
    let jsonObjectCustomerAuditAreasForImprovement = [];
    let customerPieChartByAuditAreasForImprovementImageUri = "";

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
        }

        // Create the data table.
        var data = google.visualization.arrayToDataTable(jsonObjectData);


        // Set chart options
        var options_pie3d_exploded = {
            title: 'FY ' + fyText + ' Customer Areas for Improvement',
            titleTextStyle: {
                'fontSize': '12'
            },
            width: 550,
            height: 450,
            is3D: true,
            pieSliceText: 'label',
            // height: 400,
            fontSize: 12,
            colors:['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'],
            chartArea: {
                left: '20%',
                width: '90%',
                height: 350
            },
            slices: {
                1: {offset: 0.05},
                2: {offset: 0.05},
                3: {offset: 0.05},
                4: {offset: 0.05},
            }
        };

        // Instantiate and draw our chart, passing in some options.
        var pie3dExploded = new google.visualization.PieChart($('#pieChartCustomerAreasForImprovement')[0]);
        pie3dExploded.draw(data, options_pie3d_exploded);
        customerPieChartByAuditAreasForImprovementImageUri = pie3dExploded.getImageURI();
    }

    $(function () {
        $("#btnSearchCustomerAuditByYear").click(function(){
            GetCustomerPieChartByAuditAreasForImprovement($("#txtSearchCustomerAuditYearFrom").val(), $("#txtSearchCustomerAuditYearTo").val());
        });
    });
</script>
@endsection