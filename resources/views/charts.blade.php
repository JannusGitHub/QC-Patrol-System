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
                                        <div class="col-sm-6">
                                            <label>FY : </label> <input type="number" name="year" id="txtFilterTUVChartYear" value="<?php echo date('Y'); ?>" style ="width: 60px;">
                                            <button class="btn btn-success" id="btnFilterTUVChartByYear"><i class="icon-search"></i></button>
                                        </div>
                                        <br><br>

                                        <div class="col-md-126 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><label class="yearToday"></label> TUV Audit Results Bar Chart</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshBarChartTuvProcAuditResult" title="Refresh" class="refreshTUVCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportBarChartTuvProcAuditResult" title="Export to PDF" class="btnExportTUVCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="barChartTuvProcAuditResult"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> TUV Non Conformance (NC)</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartResDeptNCTuv" title="Refresh" class="refreshTUVCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartResDeptNCTuv" title="Export to PDF" class="btnExportTUVCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChartResDeptNC3dTUVContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dTUVResDeptNC"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dTUV"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> TUV Opportunity for Improvement (OFI)</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartResDeptOFITuv" title="Refresh" class="refreshTUVCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartResDeptOFITuv" title="Export to PDF" class="btnExportTUVCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChartResDeptOFI3dTUVContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dTUVResDeptOFI"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dTUV"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> TUV Classification / Rank Pie Chart</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartTuv" title="Refresh" class="refreshTUVCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartTuv" title="Export to PDF" class="btnExportTUVCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChart3dTUVContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dTUV"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dTUV"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- ../ TUV PANEL -->

                                    <!-- CUSTOMER PANEL -->
                                    <div class="tab-pane fade" id="tabCustomer" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        <div class="col-sm-6">
                                            <label>FY : </label> <input type="number" name="year" id="txtFilterCusChartYear" value="<?php echo date('Y'); ?>" style ="width: 60px;">
                                            <button class="btn btn-success" id="btnFilterCusChartByYear"><i class="icon-search"></i></button>
                                        </div>
                                        <br><br>

                                        <div class="col-md-126 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><label class="yearToday"></label> Customer Audit Results Bar Chart</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshBarChartCusProcAuditResult" title="Refresh" class="refreshCusCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportBarChartCusProcAuditResult" title="Export to PDF" class="btnExportCusCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="barChartCusProcAuditResult"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> Customer Major Non Conformance (Major NC)</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartResDeptMajorNCCus" title="Refresh" class="refreshCusCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartResDeptMajorNCCus" title="Export to PDF" class="btnExportCusCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChartResDeptMajorNC3dCusContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dCusResDeptMajorNC"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dCus"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> Customer Non Conformance (NC)</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartResDeptNCCus" title="Refresh" class="refreshCusCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartResDeptNCCus" title="Export to PDF" class="btnExportCusCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChartResDeptNC3dCusContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dCusResDeptNC"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dCus"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> Customer Opportunity for Improvement (OFI)</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartResDeptOFICus" title="Refresh" class="refreshCusCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartResDeptOFICus" title="Export to PDF" class="btnExportCusCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChartResDeptOFI3dCusContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dCusResDeptOFI"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dCus"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> Customer Classification / Rank Pie Chart</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartCus" title="Refresh" class="refreshCusCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartCus" title="Export to PDF" class="btnExportCusCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChart3dCusContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dCus"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dCus"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- ../ CUSTOMER PANEL -->

                                    <!-- ../ Internal PANEL -->
                                    <div class="tab-pane fade" id="tabInternal" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="col-sm-6">
                                            <label>FY : </label> <input type="number" name="year" id="txtFilterIntChartYear" value="<?php echo date('Y'); ?>" style ="width: 60px;">
                                            <button class="btn btn-success" id="btnFilterIntChartByYear"><i class="icon-search"></i></button>
                                        </div>
                                        <br><br>

                                        <div class="col-md-126 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><label class="yearToday"></label> Internal Audit Results Bar Chart</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshBarChartIntProcAuditResult" title="Refresh" class="refreshIntCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportBarChartIntProcAuditResult" title="Export to PDF" class="btnExportIntCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="barChartIntProcAuditResult"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> Internal Non Conformance (NC)</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartResDeptNCInt" title="Refresh" class="refreshIntCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartResDeptNCInt" title="Export to PDF" class="btnExportIntCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChartResDeptNC3dIntContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dIntResDeptNC"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dInt"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> Internal Opportunity for Improvement (OFI)</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartResDeptOFIInt" title="Refresh" class="refreshIntCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartResDeptOFIInt" title="Export to PDF" class="btnExportIntCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChartResDeptOFI3dIntContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dIntResDeptOFI"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dInt"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> Internal Classification / Rank Pie Chart</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartInt" title="Refresh" class="refreshIntCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartInt" title="Export to PDF" class="btnExportIntCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChart3dIntContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dInt"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dTUV"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ../ Supplier PANEL -->
                                    <div class="tab-pane fade" id="tabSupplier" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="col-sm-6">
                                            <label>FY : </label> <input type="number" name="year" id="txtFilterSuppChartYear" value="<?php echo date('Y'); ?>" style ="width: 60px;">
                                            <button class="btn btn-success" id="btnFilterSuppChartByYear"><i class="icon-search"></i></button>
                                        </div>
                                        <br><br>

                                        <div class="col-md-126 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><label class="yearToday"></label> Supplier Audit Results Bar Chart</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshBarChartSuppProcAuditResult" title="Refresh" class="refreshSuppCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportBarChartSuppProcAuditResult" title="Export to PDF" class="btnExportSuppCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="barChartSuppProcAuditResult"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> Supplier Non Conformance (NC)</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartResDeptNCSupp" title="Refresh" class="refreshSuppCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartResDeptNCSupp" title="Export to PDF" class="btnExportSuppCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChartResDeptNC3dSuppContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dSuppResDeptNC"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dSupp"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> Supplier Opportunity for Improvement (OFI)</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartResDeptOFISupp" title="Refresh" class="refreshSuppCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartResDeptOFISupp" title="Export to PDF" class="btnExportSuppCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChartResDeptOFI3dSuppContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dSuppResDeptOFI"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dSupp"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">FY <label class="yearToday"></label> Supplier Classification / Rank Pie Chart</h4>
                                                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li id="btnRefreshPieChartSupp" title="Refresh" class="refreshSuppCharts"><a data-action=""><i class="icon-reload"></i></a></li>
                                                            <li id="btnExportPieChartSupp" title="Export to PDF" class="btnExportSuppCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-block" id="pieChart3dSuppContainer">
                                                        <!-- <p class="card-text">You can separate 3d pie slices from the rest of the chart with the offset property of the slices option:</p> -->
                                                        <div id="pieChart3dSupp"></div>
                                                        <!-- <img style="display: none;" src="" id="imgPieChart3dTUV"> -->
                                                    </div>
                                                </div>
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
    <script type="text/javascript">
        // --------------- TUV ------------------

        // let JsonTUVObject = [];
        let TUVBarImageUri;
        let TUVPie3dImageUri;
        let TUVPie3dResDeptNCImageUri;
        let TUVPie3dResDeptOFIImageUri;

        let TUVFilteredYear = $("#txtFilterTUVChartYear").val();
        // ---------------------- TUV GOOGLE CHART -------------------------------
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(function() {
            DrawTUVPie3dExploded("Loading...");
            DrawTUVPieChart3dTUVResDeptNC("Loading...");
            DrawTUVPieChart3dTUVResDeptOFI("Loading...");
        });

        // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
        function DrawTUVPie3dExploded(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);

            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + TUVFilteredYear + ' TUV Audit By Classification / Rank',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dTUV'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            TUVPie3dImageUri = pie3dExploded.getImageURI();
        }

        function DrawTUVPieChart3dTUVResDeptNC(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + TUVFilteredYear + ' TUV Non Conformance (NC)',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dTUVResDeptNC'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            TUVPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
        }

        function DrawTUVPieChart3dTUVResDeptOFI(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + TUVFilteredYear + ' TUV Opportunity for Improvement (OFI)',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dTUVResDeptOFI'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            TUVPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
        }


        // Resize chart
        // ------------------------------

        // $(function () {

        //     // Resize chart on menu width change and window resize
        //     $(window).on('resize', resize);
        //     $(".menu-toggle").on('click', resize);

        //     // Resize function
        //     function resize() {
        //         DrawTUVPie3dExploded();
        //     }
        // });

        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
              var target = $(e.target).attr("href") // activated tab
              
              if(target == "#active"){
                GetTUVDataCharts();
              }
              else if(target == "#tabCustomer"){
                GetCusDataCharts();
              }
              else if(target == "#tabInternal"){
                GetIntDataCharts();
              }
              else if(target == "#tabSupplier"){
                GetSuppDataCharts();
              }
              
            });

            // LoadTUVChart(1);
            GetTUVDataCharts();
            $(".refreshTUVCharts").click(function(){
                GetTUVDataCharts();
            });
            $('.btnExportTUVCharts').click(function() {
                // ExportTuvChartToPDF();
                DownloadTUVAuditResultChartsPDF(new Date().getTime() + 'TUV Audit Result Charts');
            });            

            $("#btnFilterTUVChartByYear").click(function(){
                TUVFilteredYear = $("#txtFilterTUVChartYear").val();
                $(".yearToday").text(TUVFilteredYear);
                GetTUVDataCharts();
            });
            // for all
            $(".yearToday").text(TUVFilteredYear);
        });

        function DownloadTUVAuditResultChartsPDF(filename) {
            var doc = new jsPDF('l', 'in', [8.5, 11]);
            // doc.addImage($("#imgPieChart3dTUV").attr('src'), 'PNG', 40, 10, 250, 200);
            doc.setPage(1);
            doc.addImage(TUVBarImageUri, 'PNG', 0.3, 1.5, 11, 4);
            // doc.addImage(TUVPie3dImageUri, 'PNG', 0, 4.5, 6, 5);
            // doc.addImage(TUVPie3dImageUri, 'PNG', 5, 4.5, 6, 5);
            doc.text(4, 0.3, TUVFilteredYear + ' TUV Audit Results Bar Chart');
            
            doc.addPage('l', 'in', [8.5, 11]);
            doc.setPage(2);
            doc.text(4, 0.3, TUVFilteredYear + ' TUV Audit Results Pie Charts');
            doc.addImage(TUVPie3dResDeptNCImageUri, 'PNG', -0.5, 0.5, 6, 5);
            doc.addImage(TUVPie3dResDeptOFIImageUri, 'PNG', 5.3, 0.5, 6, 5);
            doc.addImage(TUVPie3dImageUri, 'PNG', -0.5, 4.5, 6, 5);
            doc.save(filename + '.pdf');
        }

        function GetTUVDataCharts() {
            $.ajax({
                url: 'get_chart_tuv_audit_by_stat',
                method: 'get',
                data: {
                    tuv_audit_stat: 1,
                    year: TUVFilteredYear
                },
                dataType: 'json',
                beforeSend: function() {
                    DrawTUVPie3dExploded("Loading...");
                    DrawTUVPieChart3dTUVResDeptNC("Loading...");
                    DrawTUVPieChart3dTUVResDeptOFI("Loading...");
                    DrawTUVProcAuditResultsBarChart();
                },
                success: function(JsonObject){
                    LoadTUVPie3dGoogleChart(JsonObject);
                    LoadTUVProcAuditResultsBarChart(JsonObject);
                    LoadTUVPieChart3dTUVResDeptNC(JsonObject);
                    LoadTUVPieChart3dTUVResDeptOFI(JsonObject);
                },
                error: function(data, status, xhr) {

                }
            });
        }

        function LoadTUVPie3dGoogleChart(JsonObject) {
            let arrLabels = ["Loading..."];
            let arrData = [100, 0];
            let arrBackgroundColor = ["#E84A5F", "#99B898"];

            if(JsonObject['tuvs'].length > 0){
                // JsonTUVObject = JsonObject;

                arrLabels = [];
                arrData[0] = 0;
                arrData[1] = 0;

                for(let index = 0; index < JsonObject['tuvs'].length; index++) {
                    if(JsonObject['tuvs'][index].classification == "NC") {
                        arrData[0] += 1;
                    }
                    else{
                        arrData[1] += 1;
                    }
                }

                let arrDatas = [
                    ['Type', 'Classification / Rank'],
                    ['NC = ' + arrData[0],     arrData[0]],
                    ['OFI = ' + arrData[1],    arrData[1]],
                ];
                
                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + TUVFilteredYear + ' TUV Audit By Classification / Rank',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dTUV'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                // console.log(pie3dExploded.getImageURI());
                TUVPie3dImageUri = pie3dExploded.getImageURI();
                // $("#imgPieChart3dTUV").attr('src', pie3dExploded.getImageURI());
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Classification / Rank'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + TUVFilteredYear + ' TUV Audit By Classification / Rank',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dTUV'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                TUVPie3dImageUri = pie3dExploded.getImageURI();
            }
        }

        function LoadTUVPieChart3dTUVResDeptNC(JsonObject) {
            let arrLabels = [];
            let arrDatas = [
                ['Type', 'Non Conformance (NC)'],
            ];

            let arrBackgroundColor = ['#99B898', '#FF847C', '#E84A5F', '#474747', '#FECEA8', '#E84A5F', '#7c7272', '#a9b7ae', '#39364b', '#794044', '#003366', '#133337', '#ffda9e', '#8bf329', '#1e0059', '#96cc60', '#e8ef07', '#b81233', '#d5ca6a', '#141918', '#ca1b74', '#625ad9', '#4a0b69', '#ea6112', '#f7f4e8', '#f7f4e8', '#05464f', '#f4d171', '#d8dfa1', '#e5d8c0', '#5f4d3d', '#be9b7b', '#ebeae5', '#ec5686', '#9bc2db'];

            let arrDepartmentId = [];
            let arrDepartmentNames = [];
            let arrNoOfTUVAudit = [];
            let noOfTUVAudit = 0;

            if(JsonObject['tuvs'].length > 0){
                for(let index = 0; index < JsonObject['tuvs'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['tuvs'][index]['tuv_departments'].length; index2++){
                        arrDepartmentId.push(JsonObject['tuvs'][index]['tuv_departments'][index2]['departments'][0].department_id);
                        arrDepartmentNames.push(JsonObject['tuvs'][index]['tuv_departments'][index2]['departments'][0].department_name);
                    }
                }

                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }

                arrDepartmentId = arrDepartmentId.filter(distinct);
                arrDepartmentNames = arrDepartmentNames.filter(distinct);
                
                for(let index = 0; index < arrDepartmentId.length; index++) {
                    noOfTUVAudit = 0;
                    for(let index2 = 0; index2 < JsonObject['tuvs'].length; index2++) {
                        for(let index3 = 0; index3 < JsonObject['tuvs'][index2]['tuv_departments'].length; index3++){
                            if(arrDepartmentId[index] == JsonObject['tuvs'][index2]['tuv_departments'][index3]['departments'][0].department_id && JsonObject['tuvs'][index2].classification == "NC") {
                                noOfTUVAudit++;
                            }
                        }

                    }

                    arrNoOfTUVAudit.push(noOfTUVAudit);
                }
                // console.log(arrDepartmentId);

                // console.log(arrNoOfTUVAudit);

                // console.log(arrDepartmentNames);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    arrDatas.push([arrDepartmentNames[index] + " = " + arrNoOfTUVAudit[index], arrNoOfTUVAudit[index]]);
                }

                // console.log(arrDatas);

                let totalNumOfAudits = 0;
                for(let index = 1; index < arrDatas.length; index++) {
                    totalNumOfAudits += arrDatas[index][1];
                    // console.log(arrDatas[index][1]);
                }

                if(totalNumOfAudits <= 0) {
                    arrDatas = [
                        ['Type', 'Non Conformance (NC)'],
                        ['No record found.', 1],
                    ];
                }

                //Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + TUVFilteredYear + ' TUV Non Conformance (NC)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        0: {offset: 0.02},
                        1: {offset: 0.02},
                        2: {offset: 0.02},
                        3: {offset: 0.02},
                        4: {offset: 0.02},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dTUVResDeptNC'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                TUVPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Non Conformance (NC)'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + TUVFilteredYear + ' TUV Non Conformance (NC)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dTUVResDeptNC'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                TUVPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
            }
        }

        function LoadTUVPieChart3dTUVResDeptOFI(JsonObject) {
            let arrLabels = [];
            let arrDatas = [
                ['Type', 'Opportunity For Improvement (OFI)'],
            ];

            let arrBackgroundColor = ['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'];

            let arrDepartmentId = [];
            let arrDepartmentNames = [];
            let arrNoOfTUVAudit = [];
            let noOfTUVAudit = 0;

            if(JsonObject['tuvs'].length > 0){
                for(let index = 0; index < JsonObject['tuvs'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['tuvs'][index]['tuv_departments'].length; index2++){
                        arrDepartmentId.push(JsonObject['tuvs'][index]['tuv_departments'][index2]['departments'][0].department_id);
                        arrDepartmentNames.push(JsonObject['tuvs'][index]['tuv_departments'][index2]['departments'][0].department_name);
                    }
                }

                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }

                arrDepartmentId = arrDepartmentId.filter(distinct);
                arrDepartmentNames = arrDepartmentNames.filter(distinct);
                
                for(let index = 0; index < arrDepartmentId.length; index++) {
                    noOfTUVAudit = 0;
                    for(let index2 = 0; index2 < JsonObject['tuvs'].length; index2++) {
                        for(let index3 = 0; index3 < JsonObject['tuvs'][index2]['tuv_departments'].length; index3++){
                            if(arrDepartmentId[index] == JsonObject['tuvs'][index2]['tuv_departments'][index3]['departments'][0].department_id && JsonObject['tuvs'][index2].classification == "OFI") {
                                noOfTUVAudit++;
                            }
                        }

                    }

                    arrNoOfTUVAudit.push(noOfTUVAudit);
                }
                // console.log(arrDepartmentId);

                // console.log(arrNoOfTUVAudit);

                // console.log(arrDepartmentNames);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    arrDatas.push([arrDepartmentNames[index] + " = " + arrNoOfTUVAudit[index], arrNoOfTUVAudit[index]]);
                }

                // console.log(arrDatas);

                let totalNumOfAudits = 0;
                for(let index = 1; index < arrDatas.length; index++) {
                    totalNumOfAudits += arrDatas[index][1];
                    // console.log(arrDatas[index][1]);
                }

                if(totalNumOfAudits <= 0) {
                    arrDatas = [
                        ['Type', 'Opportunity For Improvement (OFI)'],
                        ['No record found.', 1],
                    ];
                }

                //Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + TUVFilteredYear + ' TUV Opportunity For Improvement (OFI)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        0: {offset: 0.02},
                        1: {offset: 0.02},
                        2: {offset: 0.02},
                        3: {offset: 0.02},
                        4: {offset: 0.02},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dTUVResDeptOFI'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                TUVPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Opportunity For Improvement (OFI)'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + TUVFilteredYear + ' TUV Opportunity For Improvement (OFI)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dTUVResDeptOFI'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                TUVPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
            }
        }

        // -------------------- BAR CHARTS --------------------------------
        // Load the Visualization API and the corechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(DrawTUVProcAuditResultsBarChart);

        // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
        function DrawTUVProcAuditResultsBarChart() {

            let arrColors = ['#99B898','#E84A5F'];

            let arrDatas = [
                ['Classification', 'NC', { role: 'annotation'} ,'OFI', { role: 'annotation'}],
                ['FY ' + TUVFilteredYear,  0,'0',      0, '0'],
                ['April',  0,'0',      0,'0'],
                ['May',  0,'0',      0,'0'],
                ['June',  0,'0',       0,'0'],
                ['July',  0,'0',      0,'0'],
                ['August',  0,'0',      0,'0'],
                ['September',  0,'0',      0,'0'],
                ['October',  0,'0',       0,'0'],
                ['November',  0,'0',      0,'0'],
                ['December',  0,'0',      0,'0'],
                ['January',  0,'0',      0,'0'],
                ['February',  0,'0',       0,'0'],
                ['March',  0,'0',      0,'0'],
            ];

            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_column_stacked = {
                // title: '2019 Process Audit Results',
                // titleTextStyle: {
                //   color: '333333',
                //   fontName: 'Arial',
                //   fontSize: 20,
                // },
                height: 400,
                fontSize: 12,
                colors: arrColors,
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
            let bar = new google.visualization.ColumnChart(document.getElementById('barChartTuvProcAuditResult'));
            bar.draw(data, options_column_stacked);
        }

        function LoadTUVProcAuditResultsBarChart(JsonObject) {
            let arrColors = ['#E84A5F', '#99B898'];
            let currDate = new Date();

            let arrDatas = [
                ['Classification', 'NC', { role: 'annotation'} ,'OFI', { role: 'annotation'}],
                ['FY ' + SuppFilteredYear,  0,'0',      0, '0'],
                ['April',  0,'0',      0,'0'],
                ['May',  0,'0',      0,'0'],
                ['June',  0,'0',       0,'0'],
                ['July',  0,'0',      0,'0'],
                ['August',  0,'0',      0,'0'],
                ['September',  0,'0',      0,'0'],
                ['October',  0,'0',       0,'0'],
                ['November',  0,'0',      0,'0'],
                ['December',  0,'0',      0,'0'],
                ['January',  0,'0',      0,'0'],
                ['February',  0,'0',       0,'0'],
                ['March',  0,'0',      0,'0'],
            ];

            // arrDatas[7][1] = 100;


            if(JsonObject['tuvs'].length > 0){
                for(let index = 0; index < JsonObject['tuvs'].length; index++) {
                    let auditDateFrom = new Date(JsonObject['tuvs'][index].audit_date_from);
                    let auditMonthFrom = auditDateFrom.getMonth(); 
                    let auditYearFrom = auditDateFrom.getFullYear();
                    let auditClassification = JsonObject['tuvs'][index].classification;

                    if(auditMonthFrom <= 2){
                        if(auditYearFrom == parseInt(currDate.getFullYear()) + 1 && auditClassification == 'NC') {
                            // alert('nc');
                            arrDatas[auditMonthFrom + 11][1] = parseInt(arrDatas[auditMonthFrom + 11][1]) + 1;
                            arrDatas[auditMonthFrom + 11][2] = parseInt(arrDatas[auditMonthFrom + 11][2]) + 1;

                            arrDatas[1][1] = parseInt(arrDatas[1][1]) + 1;
                            arrDatas[1][2] = parseInt(arrDatas[1][2]) + 1;
                        }
                        else {
                            // alert('ofi');   
                            arrDatas[auditMonthFrom + 11][3] = parseInt(arrDatas[auditMonthFrom + 11][3]) + 1;
                            arrDatas[auditMonthFrom + 11][4] = parseInt(arrDatas[auditMonthFrom + 11][4]) + 1;

                            arrDatas[1][3] = parseInt(arrDatas[1][3]) + 1;
                            arrDatas[1][4] = parseInt(arrDatas[1][4]) + 1;
                        }
                    }
                    else{
                        if(auditYearFrom == currDate.getFullYear() && auditClassification == 'NC') {
                            // console.log(auditMonthFrom + ' = ' + currDate.getMonth());
                            // console.log(auditYearFrom + ' = ' + currDate.getFullYear());
                            // console.log(arrDatas[7][1]);
                            arrDatas[auditMonthFrom - 1][1] = parseInt(arrDatas[auditMonthFrom - 1][1]) + 1;
                            arrDatas[auditMonthFrom - 1][2] = parseInt(arrDatas[auditMonthFrom - 1][2]) + 1;
                            // alert('nc');

                            arrDatas[1][1] = parseInt(arrDatas[1][1]) + 1;
                            arrDatas[1][2] = parseInt(arrDatas[1][2]) + 1;
                        }
                        else if(auditYearFrom == currDate.getFullYear() && auditClassification == 'OFI') {
                            arrDatas[auditMonthFrom - 1][3] = parseInt(arrDatas[auditMonthFrom - 1][3]) + 1;
                            arrDatas[auditMonthFrom - 1][4] = parseInt(arrDatas[auditMonthFrom - 1][4]) + 1;
                            // alert('ofi');

                            arrDatas[1][3] = parseInt(arrDatas[1][3]) + 1;
                            arrDatas[1][4] = parseInt(arrDatas[1][4]) + 1;
                        }
                    }

                }
            }
            else {
                // alert('No record');
            }


            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_column_stacked = {
                // title: '2019 Process Audit Results',
                // titleTextStyle: {
                //   color: '333333',
                //   fontName: 'Arial',
                //   fontSize: 20,
                // },
                height: 400,
                fontSize: 12,
                colors: arrColors,
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
            let bar = new google.visualization.ColumnChart(document.getElementById('barChartTuvProcAuditResult'));
            bar.draw(data, options_column_stacked);
            TUVBarImageUri = bar.getImageURI();
        }
    </script>

    <!-- CUSTOMER CHARTS -->
    <script type="text/javascript">
        // --------------- Customer ------------------

        // let JsonTUVObject = [];
        let CusBarImageUri;
        let CusPie3dImageUri;
        let CusPie3dResDeptMajorNCImageUri;
        let CusPie3dResDeptNCImageUri;
        let CusPie3dResDeptOFIImageUri;

        let CusFilteredYear = $("#txtFilterCusChartYear").val();
        // ---------------------- Cus GOOGLE CHART -------------------------------
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(function() {
            DrawCusPie3dExploded("Loading...");
            DrawCusPieChart3dCusResDeptMajorNC("Loading...");
            DrawCusPieChart3dCusResDeptNC("Loading...");
            DrawCusPieChart3dCusResDeptOFI("Loading...");
        });

        // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
        function DrawCusPie3dExploded(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);

            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + CusFilteredYear + ' Customer Audit By Classification / Rank',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCus'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            CusPie3dImageUri = pie3dExploded.getImageURI();
        }

        function DrawCusPieChart3dCusResDeptMajorNC(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + CusFilteredYear + ' Customer Major Non Conformance (Major NC)',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCusResDeptMajorNC'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            CusPie3dResDeptMajorNCImageUri = pie3dExploded.getImageURI();
        }

        function DrawCusPieChart3dCusResDeptNC(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + CusFilteredYear + ' Customer Non Conformance (NC)',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCusResDeptNC'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            CusPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
        }

        function DrawCusPieChart3dCusResDeptOFI(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + CusFilteredYear + ' Customer Opportunity for Improvement (OFI)',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCusResDeptOFI'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            CusPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
        }


        // Resize chart
        // ------------------------------

        // $(function () {

        //     // Resize chart on menu width change and window resize
        //     $(window).on('resize', resize);
        //     $(".menu-toggle").on('click', resize);

        //     // Resize function
        //     function resize() {
        //         DrawCusPie3dExploded();
        //     }
        // });

        $(document).ready(function() {
            // LoadCusChart(1);
            GetCusDataCharts();
            $(".refreshCusCharts").click(function(){
                GetCusDataCharts();
            });
            $(document).on('click', '#linkTabCustomer', function(){
                GetCusDataCharts();
            });
            $('.btnExportCusCharts').click(function() {
                // ExportCusChartToPDF();
                DownloadCusAuditResultChartsPDF(new Date().getTime() + 'Customer Audit Result Charts');
            });            

            $("#btnFilterCusChartByYear").click(function(){
                CusFilteredYear = $("#txtFilterCusChartYear").val();
                $(".yearToday").text(CusFilteredYear);
                GetCusDataCharts();
            });
            // for all
            $(".yearToday").text(CusFilteredYear);
        });

        function DownloadCusAuditResultChartsPDF(filename) {
            var doc = new jsPDF('l', 'in', [8.5, 13]);
            // doc.addImage($("#imgPieChart3dCus").attr('src'), 'PNG', 40, 10, 250, 200);
            doc.setPage(1);
            doc.addImage(CusBarImageUri, 'PNG', 0, 1.5, 13, 4);
            // doc.addImage(CusPie3dImageUri, 'PNG', 0, 4.5, 6, 5);
            // doc.addImage(CusPie3dImageUri, 'PNG', 5, 4.5, 6, 5);
            doc.text(4.5, 1, 'FY ' + CusFilteredYear + ' Customer Audit Results Charts');
            
            doc.addPage('l', 'in', [8.5, 13]);
            doc.setPage(2);
            // doc.text(4, 0.3, CusFilteredYear + ' Cus Audit Results Pie Charts');
            doc.addImage(CusPie3dResDeptMajorNCImageUri, 'PNG', -0.5, 0, 6, 5);
            doc.addImage(CusPie3dResDeptNCImageUri, 'PNG', 5.25, 0, 6, 5);
            doc.addImage(CusPie3dResDeptOFIImageUri, 'PNG', -0.5, 4, 6, 5);
            doc.addImage(CusPie3dImageUri, 'PNG', 5.25, 4, 6, 5);
            doc.save(filename + '.pdf');
        }

        function GetCusDataCharts() {
            $.ajax({
                url: 'get_chart_customer_audit_by_stat',
                method: 'get',
                data: {
                    customer_audit_stat: 1,
                    year: CusFilteredYear
                },
                dataType: 'json',
                beforeSend: function() {
                    DrawCusPie3dExploded("Loading...");
                    DrawCusPieChart3dCusResDeptNC("Loading...");
                    DrawCusPieChart3dCusResDeptMajorNC("Loading...");
                    DrawCusPieChart3dCusResDeptOFI("Loading...");
                    DrawCusProcAuditResultsBarChart();
                },
                success: function(JsonObject){
                    LoadCusPie3dGoogleChart(JsonObject);
                    LoadCusProcAuditResultsBarChart(JsonObject);
                    LoadCusPieChart3dCusResDeptMajorNC(JsonObject);
                    LoadCusPieChart3dCusResDeptNC(JsonObject);
                    LoadCusPieChart3dCusResDeptOFI(JsonObject);
                },
                error: function(data, status, xhr) {

                }
            });
        }

        function LoadCusPie3dGoogleChart(JsonObject) {
            let arrLabels = ["Loading..."];
            let arrData = [100, 0];
            let arrBackgroundColor = ['#e84a5f','#99b898', '#fecea8'];

            if(JsonObject['customers'].length > 0){
                // JsonCusObject = JsonObject;

                arrLabels = [];
                arrData[0] = 0;
                arrData[1] = 0;
                arrData[2] = 0;

                for(let index = 0; index < JsonObject['customers'].length; index++) {
                    if(JsonObject['customers'][index].classification == "NC") {
                        arrData[0] += 1;
                    }
                    else if(JsonObject['customers'][index].classification == "OFI") {
                        arrData[1] += 1;
                    }
                    else{
                        arrData[2] += 1;
                    }
                }

                let arrDatas = [
                    ['Type', 'Classification / Rank'],
                    ['Major NC = ' + arrData[2],    arrData[2]],
                    ['NC = ' + arrData[0],     arrData[0]],
                    ['OFI = ' + arrData[1],    arrData[1]],
                ];
                
                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + CusFilteredYear + ' Customer Audit By Classification / Rank',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCus'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                // console.log(pie3dExploded.getImageURI());
                CusPie3dImageUri = pie3dExploded.getImageURI();
                // $("#imgPieChart3dCus").attr('src', pie3dExploded.getImageURI());
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Classification / Rank'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + CusFilteredYear + ' Customer Audit By Classification / Rank',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCus'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                CusPie3dImageUri = pie3dExploded.getImageURI();
            }
        }

        function LoadCusPieChart3dCusResDeptMajorNC(JsonObject) {
            let arrLabels = [];
            let arrDatas = [
                ['Type', 'Major Non Conformance (Major NC)'],
            ];

            let arrBackgroundColor = ['#FF847C'];

            let arrDepartmentId = [];
            let arrDepartmentNames = [];
            let arrNoOfCusAudit = [];
            let noOfCusAudit = 0;

            if(JsonObject['customers'].length > 0){
                for(let index = 0; index < JsonObject['customers'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['customers'][index]["customer_departments"].length; index2++) {
                        arrDepartmentId.push(JsonObject['customers'][index]['customer_departments'][index2]['departments'][0].department_id);
                        arrDepartmentNames.push(JsonObject['customers'][index]['customer_departments'][index2]['departments'][0].department_name);
                    }
                }

                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }

                arrDepartmentId = arrDepartmentId.filter(distinct);
                arrDepartmentNames = arrDepartmentNames.filter(distinct);
                
                for(let index = 0; index < arrDepartmentId.length; index++) {
                    noOfCusAudit = 0;
                    for(let index2 = 0; index2 < JsonObject['customers'].length; index2++) {
                        for(let index3 = 0; index3 < JsonObject['customers'][index2]["customer_departments"].length; index3++) {
                            if(arrDepartmentId[index] == JsonObject['customers'][index2]["customer_departments"][index3]['departments'][0].department_id && JsonObject['customers'][index2].classification == "Major NC") {
                                noOfCusAudit++;
                            }
                        }
                    }

                    arrNoOfCusAudit.push(noOfCusAudit);

                    // console.log(noOfCusAudit);
                }
                // console.log(arrDepartmentId);

                // console.log(arrNoOfCusAudit);

                // console.log(arrDepartmentNames);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    arrDatas.push([arrDepartmentNames[index] + " = " + arrNoOfCusAudit[index], arrNoOfCusAudit[index]]);
                }

                // console.log(arrDatas);

                let totalNumOfAudits = 0;
                for(let index = 1; index < arrDatas.length; index++) {
                    totalNumOfAudits += arrDatas[index][1];
                    // console.log(arrDatas[index][1]);
                }

                if(totalNumOfAudits <= 0) {
                    arrDatas = [
                        ['Type', 'Major Non Conformance (Major NC)'],
                        ['No record found.', 1],
                    ];
                }

                //Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + CusFilteredYear + ' Customer Major Non Conformance (Major NC)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        0: {offset: 0.02},
                        1: {offset: 0.02},
                        2: {offset: 0.02},
                        3: {offset: 0.02},
                        4: {offset: 0.02},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCusResDeptMajorNC'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                CusPie3dResDeptMajorNCImageUri = pie3dExploded.getImageURI();
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Major Non Conformance (Major NC)'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + CusFilteredYear + ' Customer Major Non Conformance (Major NC)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCusResDeptMajorNC'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                CusPie3dResDeptMajorNCImageUri = pie3dExploded.getImageURI();
            }
        }

        function LoadCusPieChart3dCusResDeptNC(JsonObject) {
            let arrLabels = [];
            let arrDatas = [
                ['Type', 'Non Conformance (NC)'],
            ];

            let arrBackgroundColor = ['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747', '#FECEA8', '#E84A5F', '#7c7272', '#a9b7ae', '#39364b', '#794044', '#003366', '#133337', '#ffda9e', '#8bf329', '#1e0059', '#96cc60', '#e8ef07', '#b81233', '#d5ca6a', '#141918', '#ca1b74', '#625ad9', '#4a0b69', '#ea6112', '#f7f4e8', '#f7f4e8', '#05464f', '#f4d171', '#d8dfa1', '#e5d8c0', '#5f4d3d', '#be9b7b', '#ebeae5', '#ec5686', '#9bc2db'];

            let arrDepartmentId = [];
            let arrDepartmentNames = [];
            let arrNoOfCusAudit = [];
            let noOfCusAudit = 0;

            if(JsonObject['customers'].length > 0){
                for(let index = 0; index < JsonObject['customers'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['customers'][index]["customer_departments"].length; index2++) {
                        arrDepartmentId.push(JsonObject['customers'][index]['customer_departments'][index2]['departments'][0].department_id);
                        arrDepartmentNames.push(JsonObject['customers'][index]['customer_departments'][index2]['departments'][0].department_name);
                    }
                }

                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }

                arrDepartmentId = arrDepartmentId.filter(distinct);
                arrDepartmentNames = arrDepartmentNames.filter(distinct);
                
                for(let index = 0; index < arrDepartmentId.length; index++) {
                    noOfCusAudit = 0;
                    for(let index2 = 0; index2 < JsonObject['customers'].length; index2++) {
                        for(let index3 = 0; index3 < JsonObject['customers'][index2]["customer_departments"].length; index3++) {
                            if(arrDepartmentId[index] == JsonObject['customers'][index2]["customer_departments"][index3]['departments'][0].department_id && JsonObject['customers'][index2].classification == "NC") {
                                noOfCusAudit++;
                            }
                        }
                    }

                    arrNoOfCusAudit.push(noOfCusAudit);

                    // console.log(noOfCusAudit);
                }
                // console.log(arrDepartmentId);

                // console.log(arrNoOfCusAudit);

                // console.log(arrDepartmentNames);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    arrDatas.push([arrDepartmentNames[index] + " = " + arrNoOfCusAudit[index], arrNoOfCusAudit[index]]);
                }

                // console.log(arrDatas);

                let totalNumOfAudits = 0;
                for(let index = 1; index < arrDatas.length; index++) {
                    totalNumOfAudits += arrDatas[index][1];
                    // console.log(arrDatas[index][1]);
                }

                if(totalNumOfAudits <= 0) {
                    arrDatas = [
                        ['Type', 'Non Conformance (NC)'],
                        ['No record found.', 1],
                    ];
                }

                //Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + CusFilteredYear + ' Customer Non Conformance (NC)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        0: {offset: 0.02},
                        1: {offset: 0.02},
                        2: {offset: 0.02},
                        3: {offset: 0.02},
                        4: {offset: 0.02},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCusResDeptNC'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                CusPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Non Conformance (NC)'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + CusFilteredYear + ' Customer Non Conformance (NC)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCusResDeptNC'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                CusPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
            }
        }

        function LoadCusPieChart3dCusResDeptOFI(JsonObject) {
            let arrLabels = [];
            let arrDatas = [
                ['Type', 'Opportunity For Improvement (OFI)'],
            ];

            let arrBackgroundColor = ['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747', '#FECEA8', '#E84A5F', '#7c7272', '#a9b7ae', '#39364b', '#794044', '#003366', '#133337', '#ffda9e', '#8bf329', '#1e0059', '#96cc60', '#e8ef07', '#b81233', '#d5ca6a', '#141918', '#ca1b74', '#625ad9', '#4a0b69', '#ea6112', '#f7f4e8', '#f7f4e8', '#05464f', '#f4d171', '#d8dfa1', '#e5d8c0', '#5f4d3d', '#be9b7b', '#ebeae5', '#ec5686', '#9bc2db'];

            let arrDepartmentId = [];
            let arrDepartmentNames = [];
            let arrNoOfCusAudit = [];
            let noOfCusAudit = 0;

            if(JsonObject['customers'].length > 0){
                for(let index = 0; index < JsonObject['customers'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['customers'][index]["customer_departments"].length; index2++) {
                        arrDepartmentId.push(JsonObject['customers'][index]['customer_departments'][index2]['departments'][0].department_id);
                        arrDepartmentNames.push(JsonObject['customers'][index]['customer_departments'][index2]['departments'][0].department_name);
                    }
                }

                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }

                arrDepartmentId = arrDepartmentId.filter(distinct);
                arrDepartmentNames = arrDepartmentNames.filter(distinct);
                
                for(let index = 0; index < arrDepartmentId.length; index++) {
                    noOfCusAudit = 0;
                    for(let index2 = 0; index2 < JsonObject['customers'].length; index2++) {
                        for(let index3 = 0; index3 < JsonObject['customers'][index2]["customer_departments"].length; index3++) {
                            if(arrDepartmentId[index] == JsonObject['customers'][index2]["customer_departments"][index3]['departments'][0].department_id && JsonObject['customers'][index2].classification == "OFI") {
                                noOfCusAudit++;
                            }
                        }
                    }

                    arrNoOfCusAudit.push(noOfCusAudit);

                    // console.log(noOfCusAudit);
                }
                // console.log(arrDepartmentId);

                // console.log(arrNoOfCusAudit);

                // console.log(arrDepartmentNames);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    arrDatas.push([arrDepartmentNames[index] + " = " + arrNoOfCusAudit[index], arrNoOfCusAudit[index]]);
                }

                // console.log(arrDatas);

                let totalNumOfAudits = 0;
                for(let index = 1; index < arrDatas.length; index++) {
                    totalNumOfAudits += arrDatas[index][1];
                    // console.log(arrDatas[index][1]);
                }

                if(totalNumOfAudits <= 0) {
                    arrDatas = [
                        ['Type', 'Opportunity For Improvement (OFI)'],
                        ['No record found.', 1],
                    ];
                }

                //Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + CusFilteredYear + ' Customer Opportunity For Improvement (OFI)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        0: {offset: 0.02},
                        1: {offset: 0.02},
                        2: {offset: 0.02},
                        3: {offset: 0.02},
                        4: {offset: 0.02},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCusResDeptOFI'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                CusPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Opportunity For Improvement (OFI)'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + CusFilteredYear + ' Customer Opportunity For Improvement (OFI)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dCusResDeptOFI'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                CusPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
            }
        }

        // -------------------- BAR CHARTS --------------------------------
        // Load the Visualization API and the corechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(DrawCusProcAuditResultsBarChart);

        // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
        function DrawCusProcAuditResultsBarChart() {

            let arrColors = ['#E84A5F', '#99B898', '#FECEA8'];

            let arrDatas = [
                ['Classification', 'NC', { role: 'annotation'} ,'OFI', { role: 'annotation'} ,'Major NC', { role: 'annotation'}],
                ['FY ' + CusFilteredYear,  0,'0',      0,'0', 0, '0'],
                ['April',  0,'0',      0,'0', 0, '0'],
                ['May',  0,'0',      0,'0', 0, '0'],
                ['June',  0,'0',       0,'0', 0, '0'],
                ['July',  0,'0',      0,'0', 0, '0'],
                ['August',  0,'0',      0,'0', 0, '0'],
                ['September',  0,'0',      0,'0', 0, '0'],
                ['October',  0,'0',       0,'0', 0, '0'],
                ['November',  0,'0',      0,'0', 0, '0'],
                ['December',  0,'0',      0,'0', 0, '0'],
                ['January',  0,'0',      0,'0', 0, '0'],
                ['February',  0,'0',       0,'0', 0, '0'],
                ['March',  0,'0',      0,'0', 0, '0'],
            ];

            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_column_stacked = {
                // title: '2019 Process Audit Results',
                // titleTextStyle: {
                //   color: '333333',
                //   fontName: 'Arial',
                //   fontSize: 20,
                // },
                height: 400,
                fontSize: 12,
                colors: arrColors,
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
            let bar = new google.visualization.ColumnChart(document.getElementById('barChartCusProcAuditResult'));
            bar.draw(data, options_column_stacked);
        }

        function LoadCusProcAuditResultsBarChart(JsonObject) {
            let arrColors = ['#E84A5F', '#99B898', '#FECEA8'];
            let currDate = new Date();

            let arrDatas = [
                ['Classification', 'NC', { role: 'annotation'} ,'OFI', { role: 'annotation'} ,'Major NC', { role: 'annotation'}],
                ['FY ' + SuppFilteredYear,  0,'0', 0,'0', 0,'0'],
                ['April',  0,'0',      0,'0',      0,'0'],
                ['May',  0,'0',      0,'0',      0,'0'],
                ['June',  0,'0',       0,'0',      0,'0'],
                ['July',  0,'0',      0,'0',      0,'0'],
                ['August',  0,'0',      0,'0',      0,'0'],
                ['September',  0,'0',      0,'0',      0,'0'],
                ['October',  0,'0',       0,'0',      0,'0'],
                ['November',  0,'0',      0,'0',      0,'0'],
                ['December',  0,'0',      0,'0',      0,'0'],
                ['January',  0,'0',      0,'0',      0,'0'],
                ['February',  0,'0',       0,'0',      0,'0'],
                ['March',  0,'0',      0,'0',      0,'0'],
            ];

            // arrDatas[7][1] = 100;


            if(JsonObject['customers'].length > 0){
                for(let index = 0; index < JsonObject['customers'].length; index++) {
                    let auditDateFrom = new Date(JsonObject['customers'][index].audit_date_from);
                    let auditMonthFrom = auditDateFrom.getMonth(); 
                    let auditYearFrom = auditDateFrom.getFullYear();
                    let auditClassification = JsonObject['customers'][index].classification;

                    if(auditMonthFrom <= 2){
                        if(auditYearFrom == parseInt($("#txtFilterCusChartYear").val()) + 1 && auditClassification == 'NC') {
                            // alert('nc');
                            arrDatas[auditMonthFrom + 11][1] = parseInt(arrDatas[auditMonthFrom + 11][1]) + 1;
                            arrDatas[auditMonthFrom + 11][2] = parseInt(arrDatas[auditMonthFrom + 11][2]) + 1;

                            arrDatas[1][1] = parseInt(arrDatas[1][1]) + 1;
                            arrDatas[1][2] = parseInt(arrDatas[1][2]) + 1;
                        }
                        else if(auditYearFrom == parseInt($("#txtFilterCusChartYear").val()) + 1 && auditClassification == 'OFI') {
                            // alert('ofi');   
                            arrDatas[auditMonthFrom + 11][3] = parseInt(arrDatas[auditMonthFrom + 11][3]) + 1;
                            arrDatas[auditMonthFrom + 11][4] = parseInt(arrDatas[auditMonthFrom + 11][4]) + 1;

                            arrDatas[1][3] = parseInt(arrDatas[1][3]) + 1;
                            arrDatas[1][4] = parseInt(arrDatas[1][4]) + 1;
                        }
                        else if(auditYearFrom == parseInt($("#txtFilterCusChartYear").val()) + 1 && auditClassification == 'Major NC') {
                            // alert('major nc');
                            arrDatas[auditMonthFrom + 11][5] = parseInt(arrDatas[auditMonthFrom + 11][5]) + 1;
                            arrDatas[auditMonthFrom + 11][6] = parseInt(arrDatas[auditMonthFrom + 11][6]) + 1;

                            arrDatas[1][5] = parseInt(arrDatas[1][5]) + 1;
                            arrDatas[1][6] = parseInt(arrDatas[1][6]) + 1;
                        }
                    }
                    else{
                        if(auditYearFrom == $("#txtFilterCusChartYear").val() && auditClassification == 'NC') {
                            // console.log(auditMonthFrom + ' = ' + currDate.getMonth());
                            // console.log(auditYearFrom + ' = ' + $("#txtFilterCusChartYear").val());
                            // console.log(arrDatas[7][1]);
                            arrDatas[auditMonthFrom - 1][1] = parseInt(arrDatas[auditMonthFrom - 1][1]) + 1;
                            arrDatas[auditMonthFrom - 1][2] = parseInt(arrDatas[auditMonthFrom - 1][2]) + 1;
                            // alert('nc');

                            arrDatas[1][1] = parseInt(arrDatas[1][1]) + 1;
                            arrDatas[1][2] = parseInt(arrDatas[1][2]) + 1;
                        }
                        else if(auditYearFrom == $("#txtFilterCusChartYear").val() && auditClassification == 'OFI') {
                            arrDatas[auditMonthFrom - 1][3] = parseInt(arrDatas[auditMonthFrom - 1][3]) + 1;
                            arrDatas[auditMonthFrom - 1][4] = parseInt(arrDatas[auditMonthFrom - 1][4]) + 1;
                            // alert('ofi');

                            arrDatas[1][3] = parseInt(arrDatas[1][3]) + 1;
                            arrDatas[1][4] = parseInt(arrDatas[1][4]) + 1;
                        }
                        else if(auditYearFrom == $("#txtFilterCusChartYear").val() && auditClassification == 'Major NC') {
                            // alert('major nc');
                            arrDatas[auditMonthFrom - 1][5] = parseInt(arrDatas[auditMonthFrom - 1][5]) + 1;
                            arrDatas[auditMonthFrom - 1][6] = parseInt(arrDatas[auditMonthFrom - 1][6]) + 1;

                            arrDatas[1][5] = parseInt(arrDatas[1][5]) + 1;
                            arrDatas[1][6] = parseInt(arrDatas[1][6]) + 1;
                        }
                    }

                }
            }
            else {
                // alert('No record');
            }


            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_column_stacked = {
                // title: '2019 Process Audit Results',
                // titleTextStyle: {
                //   color: '333333',
                //   fontName: 'Arial',
                //   fontSize: 20,
                // },
                height: 400,
                fontSize: 12,
                colors: arrColors,
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
            let bar = new google.visualization.ColumnChart(document.getElementById('barChartCusProcAuditResult'));
            bar.draw(data, options_column_stacked);
            CusBarImageUri = bar.getImageURI();
        }
    </script>

    <script type="text/javascript">
        // --------------- Internal ------------------
        let IntBarImageUri;
        let IntPie3dImageUri;
        let IntPie3dResDeptNCImageUri;
        let IntPie3dResDeptOFIImageUri;

        let IntFilteredYear = $("#txtFilterIntChartYear").val();
        // ---------------------- Int GOOGLE CHART -------------------------------
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(function() {
            DrawIntPie3dExploded("Loading...");
            DrawIntPieChart3dIntResDeptNC("Loading...");
            DrawIntPieChart3dIntResDeptOFI("Loading...");
        });

        // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
        function DrawIntPie3dExploded(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);

            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + IntFilteredYear + ' Internal Audit By Classification / Rank',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dInt'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            IntPie3dImageUri = pie3dExploded.getImageURI();
        }

        function DrawIntPieChart3dIntResDeptNC(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + IntFilteredYear + ' Internal Non Conformance (NC)',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dIntResDeptNC'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            IntPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
        }

        function DrawIntPieChart3dIntResDeptOFI(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + IntFilteredYear + ' Internal Opportunity for Improvement (OFI)',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dIntResDeptOFI'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            IntPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
        }


        // Resize chart
        // ------------------------------

        // $(function () {

        //     // Resize chart on menu width change and window resize
        //     $(window).on('resize', resize);
        //     $(".menu-toggle").on('click', resize);

        //     // Resize function
        //     function resize() {
        //         DrawIntPie3dExploded();
        //     }
        // });

        $(document).ready(function() {
            // LoadIntChart(1);
            GetIntDataCharts();
            $(".refreshIntCharts").click(function(){
                GetIntDataCharts();
            });
            $(document).on('click', '#linkTabInternal', function(){
                GetIntDataCharts();
            });
            $('.btnExportIntCharts').click(function() {
                // ExportIntChartToPDF();
                DownloadIntAuditResultChartsPDF(new Date().getTime() + 'Internal Audit Result Charts');
            });            

            $("#btnFilterIntChartByYear").click(function(){
                IntFilteredYear = $("#txtFilterIntChartYear").val();
                $(".yearToday").text(IntFilteredYear);
                GetIntDataCharts();
            });
            // for all
            $(".yearToday").text(IntFilteredYear);
        });

        function DownloadIntAuditResultChartsPDF(filename) {
            var doc = new jsPDF('l', 'in', [8.5, 11]);
            // doc.addImage($("#imgPieChart3dInt").attr('src'), 'PNG', 40, 10, 250, 200);
            doc.setPage(1);
            doc.addImage(IntBarImageUri, 'PNG', 0.3, 1.5, 11, 4);
            // doc.addImage(IntPie3dImageUri, 'PNG', 0, 4.5, 6, 5);
            // doc.addImage(IntPie3dImageUri, 'PNG', 5, 4.5, 6, 5);
            doc.text(4, 0.3, IntFilteredYear + ' Internal Audit Results Bar Chart');
            
            doc.addPage('l', 'in', [8.5, 11]);
            doc.setPage(2);
            doc.text(4, 0.3, IntFilteredYear + ' Internal Audit Results Pie Charts');
            doc.addImage(IntPie3dResDeptNCImageUri, 'PNG', -0.5, 0.5, 6, 5);
            doc.addImage(IntPie3dResDeptOFIImageUri, 'PNG', 5.3, 0.5, 6, 5);
            doc.addImage(IntPie3dImageUri, 'PNG', -0.5, 4.5, 6, 5);
            doc.save(filename + '.pdf');
        }

        function GetIntDataCharts() {
            $.ajax({
                url: 'get_chart_internal_audit_by_stat',
                method: 'get',
                data: {
                    internal_audit_stat: 1,
                    year: IntFilteredYear
                },
                dataType: 'json',
                beforeSend: function() {
                    DrawIntPie3dExploded("Loading...");
                    DrawIntPieChart3dIntResDeptNC("Loading...");
                    DrawIntPieChart3dIntResDeptOFI("Loading...");
                    DrawIntProcAuditResultsBarChart();
                },
                success: function(JsonObject){
                    LoadIntPie3dGoogleChart(JsonObject);
                    LoadIntProcAuditResultsBarChart(JsonObject);
                    LoadIntPieChart3dIntResDeptNC(JsonObject);
                    LoadIntPieChart3dIntResDeptOFI(JsonObject);
                },
                error: function(data, status, xhr) {

                }
            });
        }

        function LoadIntPie3dGoogleChart(JsonObject) {
            let arrLabels = ["Loading..."];
            let arrData = [100, 0];
            let arrBackgroundColor = ["#E84A5F", "#99B898"];

            if(JsonObject['internals'].length > 0){
                // JsonTUVObject = JsonObject;

                arrLabels = [];
                arrData[0] = 0;
                arrData[1] = 0;

                for(let index = 0; index < JsonObject['internals'].length; index++) {
                    if(JsonObject['internals'][index].classification == "NC") {
                        arrData[0] += 1;
                    }
                    else{
                        arrData[1] += 1;
                    }
                }

                let arrDatas = [
                    ['Type', 'Classification / Rank'],
                    ['NC = ' + arrData[0],     arrData[0]],
                    ['OFI = ' + arrData[1],    arrData[1]],
                ];
                
                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + IntFilteredYear + ' Internal Audit By Classification / Rank',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dInt'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                // console.log(pie3dExploded.getImageURI());
                IntPie3dImageUri = pie3dExploded.getImageURI();
                // $("#imgPieChart3dInt").attr('src', pie3dExploded.getImageURI());
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Classification / Rank'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + IntFilteredYear + ' Internal Audit By Classification / Rank',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dInt'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                IntPie3dImageUri = pie3dExploded.getImageURI();
            }
        }

        function LoadIntPieChart3dIntResDeptNC(JsonObject) {
            let arrLabels = [];
            let arrDatas = [
                ['Type', 'Non Conformance (NC)'],
            ];

            let arrBackgroundColor = ['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'];

            let arrDepartmentId = [];
            let arrDepartmentNames = [];
            let arrNoOfIntAudit = [];
            let noOfIntAudit = 0;

            if(JsonObject['internals'].length > 0){
                for(let index = 0; index < JsonObject['internals'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['internals'][index]['internal_departments'].length; index2++){
                        arrDepartmentId.push(JsonObject['internals'][index]['internal_departments'][index2]['departments'][0].department_id);
                        arrDepartmentNames.push(JsonObject['internals'][index]['internal_departments'][index2]['departments'][0].department_name);
                    }
                }

                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }

                arrDepartmentId = arrDepartmentId.filter(distinct);
                arrDepartmentNames = arrDepartmentNames.filter(distinct);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    noOfIntAudit = 0;
                    for(let index2 = 0; index2 < JsonObject['internals'].length; index2++) {
                        for(let index3 = 0; index3 < JsonObject['internals'][index2]['internal_departments'].length; index3++){
                            if(arrDepartmentId[index] == JsonObject['internals'][index2]['internal_departments'][index3]['departments'][0].department_id && JsonObject['internals'][index2].classification == "NC") {
                                noOfIntAudit++;
                            }
                        }

                    }

                    arrNoOfIntAudit.push(noOfIntAudit);
                }
                // console.log(arrDepartmentId);

                // console.log(arrNoOfIntAudit);

                // console.log(arrDepartmentNames);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    arrDatas.push([arrDepartmentNames[index] + " = " + arrNoOfIntAudit[index], arrNoOfIntAudit[index]]);
                }

                // console.log(arrDatas);

                let totalNumOfAudits = 0;
                for(let index = 1; index < arrDatas.length; index++) {
                    totalNumOfAudits += arrDatas[index][1];
                    // console.log(arrDatas[index][1]);
                }

                if(totalNumOfAudits <= 0) {
                    arrDatas = [
                        ['Type', 'Non Conformance (NC)'],
                        ['No record found.', 1],
                    ];
                }

                //Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + IntFilteredYear + ' Internal Non Conformance (NC)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        0: {offset: 0.02},
                        1: {offset: 0.02},
                        2: {offset: 0.02},
                        3: {offset: 0.02},
                        4: {offset: 0.02},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dIntResDeptNC'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                IntPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Non Conformance (NC)'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + IntFilteredYear + ' Internal Non Conformance (NC)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dIntResDeptNC'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                IntPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
            }
        }

        function LoadIntPieChart3dIntResDeptOFI(JsonObject) {
            let arrLabels = [];
            let arrDatas = [
                ['Type', 'Opportunity For Improvement (OFI)'],
            ];

            let arrBackgroundColor = ['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'];

            let arrDepartmentId = [];
            let arrDepartmentNames = [];
            let arrNoOfIntAudit = [];
            let noOfIntAudit = 0;

            if(JsonObject['internals'].length > 0){
                for(let index = 0; index < JsonObject['internals'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['internals'][index]['internal_departments'].length; index2++){
                        arrDepartmentId.push(JsonObject['internals'][index]['internal_departments'][index2]['departments'][0].department_id);
                        arrDepartmentNames.push(JsonObject['internals'][index]['internal_departments'][index2]['departments'][0].department_name);
                    }
                }

                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }

                arrDepartmentId = arrDepartmentId.filter(distinct);
                arrDepartmentNames = arrDepartmentNames.filter(distinct);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    noOfIntAudit = 0;
                    for(let index2 = 0; index2 < JsonObject['internals'].length; index2++) {
                        for(let index3 = 0; index3 < JsonObject['internals'][index2]['internal_departments'].length; index3++){
                            if(arrDepartmentId[index] == JsonObject['internals'][index2]['internal_departments'][index3]['departments'][0].department_id && JsonObject['internals'][index2].classification == "OFI") {
                                noOfIntAudit++;
                            }
                        }

                    }

                    arrNoOfIntAudit.push(noOfIntAudit);
                }
                // console.log(arrDepartmentId);

                // console.log(arrNoOfIntAudit);

                // console.log(arrDepartmentNames);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    arrDatas.push([arrDepartmentNames[index] + " = " + arrNoOfIntAudit[index], arrNoOfIntAudit[index]]);
                }

                // console.log(arrDatas);

                let totalNumOfAudits = 0;
                for(let index = 1; index < arrDatas.length; index++) {
                    totalNumOfAudits += arrDatas[index][1];
                    // console.log(arrDatas[index][1]);
                }

                if(totalNumOfAudits <= 0) {
                    arrDatas = [
                        ['Type', 'Opportunity For Improvement (OFI)'],
                        ['No record found.', 1],
                    ];
                }

                //Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + IntFilteredYear + ' Internal Opportunity For Improvement (OFI)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        0: {offset: 0.02},
                        1: {offset: 0.02},
                        2: {offset: 0.02},
                        3: {offset: 0.02},
                        4: {offset: 0.02},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dIntResDeptOFI'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                IntPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Opportunity For Improvement (OFI)'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + IntFilteredYear + ' Internal Opportunity For Improvement (OFI)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dIntResDeptOFI'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                IntPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
            }
        }

        // -------------------- BAR CHARTS --------------------------------
        // Load the Visualization API and the corechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(DrawIntProcAuditResultsBarChart);

        // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
        function DrawIntProcAuditResultsBarChart() {

            let arrColors = ['#99B898','#E84A5F'];

            let arrDatas = [
                ['Classification', 'NC', { role: 'annotation'} ,'OFI', { role: 'annotation'}],
                ['FY ' + IntFilteredYear,  0,'0',      0, '0'],
                ['April',  0,'0',      0,'0'],
                ['May',  0,'0',      0,'0'],
                ['June',  0,'0',       0,'0'],
                ['July',  0,'0',      0,'0'],
                ['August',  0,'0',      0,'0'],
                ['September',  0,'0',      0,'0'],
                ['October',  0,'0',       0,'0'],
                ['November',  0,'0',      0,'0'],
                ['December',  0,'0',      0,'0'],
                ['January',  0,'0',      0,'0'],
                ['February',  0,'0',       0,'0'],
                ['March',  0,'0',      0,'0'],
            ];

            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_column_stacked = {
                // title: '2019 Process Audit Results',
                // titleTextStyle: {
                //   color: '333333',
                //   fontName: 'Arial',
                //   fontSize: 20,
                // },
                height: 400,
                fontSize: 12,
                colors: arrColors,
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
            let bar = new google.visualization.ColumnChart(document.getElementById('barChartIntProcAuditResult'));
            bar.draw(data, options_column_stacked);
        }

        function LoadIntProcAuditResultsBarChart(JsonObject) {
            let arrColors = ['#E84A5F', '#99B898'];
            let currDate = new Date();

            let arrDatas = [
                ['Classification', 'NC', { role: 'annotation'} ,'OFI', { role: 'annotation'}],
                ['FY ' + SuppFilteredYear,  0,'0',      0, '0'],
                ['April',  0,'0',      0,'0'],
                ['May',  0,'0',      0,'0'],
                ['June',  0,'0',       0,'0'],
                ['July',  0,'0',      0,'0'],
                ['August',  0,'0',      0,'0'],
                ['September',  0,'0',      0,'0'],
                ['October',  0,'0',       0,'0'],
                ['November',  0,'0',      0,'0'],
                ['December',  0,'0',      0,'0'],
                ['January',  0,'0',      0,'0'],
                ['February',  0,'0',       0,'0'],
                ['March',  0,'0',      0,'0'],
            ];

            // arrDatas[7][1] = 100;


            if(JsonObject['internals'].length > 0){
                for(let index = 0; index < JsonObject['internals'].length; index++) {
                    let auditDateFrom = new Date(JsonObject['internals'][index].audit_date_from);
                    let auditMonthFrom = auditDateFrom.getMonth(); 
                    let auditYearFrom = auditDateFrom.getFullYear();
                    let auditClassification = JsonObject['internals'][index].classification;

                    if(auditMonthFrom <= 2){
                        if(auditYearFrom == parseInt(currDate.getFullYear()) + 1 && auditClassification == 'NC') {
                            // alert('nc');
                            arrDatas[auditMonthFrom + 11][1] = parseInt(arrDatas[auditMonthFrom + 11][1]) + 1;
                            arrDatas[auditMonthFrom + 11][2] = parseInt(arrDatas[auditMonthFrom + 11][2]) + 1;

                            arrDatas[1][1] = parseInt(arrDatas[1][1]) + 1;
                            arrDatas[1][2] = parseInt(arrDatas[1][2]) + 1;
                        }
                        else {
                            // alert('ofi');   
                            arrDatas[auditMonthFrom + 11][3] = parseInt(arrDatas[auditMonthFrom + 11][3]) + 1;
                            arrDatas[auditMonthFrom + 11][4] = parseInt(arrDatas[auditMonthFrom + 11][4]) + 1;

                            arrDatas[1][3] = parseInt(arrDatas[1][3]) + 1;
                            arrDatas[1][4] = parseInt(arrDatas[1][4]) + 1;
                        }
                    }
                    else{
                        if(auditYearFrom == currDate.getFullYear() && auditClassification == 'NC') {
                            // console.log(auditMonthFrom + ' = ' + currDate.getMonth());
                            // console.log(auditYearFrom + ' = ' + currDate.getFullYear());
                            // console.log(arrDatas[7][1]);
                            arrDatas[auditMonthFrom - 1][1] = parseInt(arrDatas[auditMonthFrom - 1][1]) + 1;
                            arrDatas[auditMonthFrom - 1][2] = parseInt(arrDatas[auditMonthFrom - 1][2]) + 1;
                            // alert('nc');

                            arrDatas[1][1] = parseInt(arrDatas[1][1]) + 1;
                            arrDatas[1][2] = parseInt(arrDatas[1][2]) + 1;
                        }
                        else if(auditYearFrom == currDate.getFullYear() && auditClassification == 'OFI') {
                            arrDatas[auditMonthFrom - 1][3] = parseInt(arrDatas[auditMonthFrom - 1][3]) + 1;
                            arrDatas[auditMonthFrom - 1][4] = parseInt(arrDatas[auditMonthFrom - 1][4]) + 1;
                            // alert('ofi');

                            arrDatas[1][3] = parseInt(arrDatas[1][3]) + 1;
                            arrDatas[1][4] = parseInt(arrDatas[1][4]) + 1;
                        }
                    }

                }
            }
            else {
                // alert('No record');
            }


            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_column_stacked = {
                // title: '2019 Process Audit Results',
                // titleTextStyle: {
                //   color: '333333',
                //   fontName: 'Arial',
                //   fontSize: 20,
                // },
                height: 400,
                fontSize: 12,
                colors: arrColors,
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
            let bar = new google.visualization.ColumnChart(document.getElementById('barChartIntProcAuditResult'));
            bar.draw(data, options_column_stacked);
            IntBarImageUri = bar.getImageURI();
        }
    </script>

    <script type="text/javascript">
        // --------------- Supplier ------------------
        let SuppBarImageUri;
        let SuppPie3dImageUri;
        let SuppPie3dResDeptNCImageUri;
        let SuppPie3dResDeptOFIImageUri;

        let SuppFilteredYear = $("#txtFilterSuppChartYear").val();
        // ---------------------- Supp GOOGLE CHART -------------------------------
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(function() {
            DrawSuppPie3dExploded("Loading...");
            DrawSuppPieChart3dSuppResDeptNC("Loading...");
            DrawSuppPieChart3dSuppResDeptOFI("Loading...");
        });

        // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
        function DrawSuppPie3dExploded(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);

            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + SuppFilteredYear + ' Supplier Audit By Classification / Rank',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dSupp'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            SuppPie3dImageUri = pie3dExploded.getImageURI();
        }

        function DrawSuppPieChart3dSuppResDeptNC(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + SuppFilteredYear + ' Supplier Non Conformance (NC)',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dSuppResDeptNC'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            SuppPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
        }

        function DrawSuppPieChart3dSuppResDeptOFI(label) {
            let arrBackgroundColor = ["#99B898"];

            let arrDatas = [
                ['Type', 'Classification / Rank'],
                [label, 1],
            ];

            // Create the data table.
            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_pie3d_exploded = {
                title: 'FY ' + SuppFilteredYear + ' Supplier Opportunity for Improvement (OFI)',
                is3D: true,
                pieSliceText: 'label',
                height: 450,
                width: 550,
                fontSize: 12,
                colors: arrBackgroundColor,
                chartArea: {
                    left: '20%',
                    width: '90%',
                    height: 350
                },
                slices: {
                    1: {offset: 0.07},
                    2: {offset: 0.07},
                    3: {offset: 0.07},
                    4: {offset: 0.07},
                }
            };

            // Instantiate and draw our chart, passing in some options.
            let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dSuppResDeptOFI'));
            pie3dExploded.draw(data, options_pie3d_exploded);
            SuppPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
        }


        // Resize chart
        // ------------------------------

        // $(function () {

        //     // Resize chart on menu width change and window resize
        //     $(window).on('resize', resize);
        //     $(".menu-toggle").on('click', resize);

        //     // Resize function
        //     function resize() {
        //         DrawSuppPie3dExploded();
        //     }
        // });

        $(document).ready(function() {
            // LoadSuppChart(1);
            GetSuppDataCharts();
            $(".refreshSuppCharts").click(function(){
                GetSuppDataCharts();
            });
            $(document).on('click', '#linkTabSupplier', function(){
                GetSuppDataCharts();
            });
            $('.btnExportSuppCharts').click(function() {
                // ExportSuppChartToPDF();
                DownloadSuppAuditResultChartsPDF(new Date().getTime() + 'Supplier Audit Result Charts');
            });            

            $("#btnFilterSuppChartByYear").click(function(){
                SuppFilteredYear = $("#txtFilterSuppChartYear").val();
                $(".yearToday").text(SuppFilteredYear);
                GetSuppDataCharts();
            });
            // for all
            $(".yearToday").text(SuppFilteredYear);
        });

        function DownloadSuppAuditResultChartsPDF(filename) {
            var doc = new jsPDF('l', 'in', [8.5, 11]);
            // doc.addImage($("#imgPieChart3dSupp").attr('src'), 'PNG', 40, 10, 250, 200);
            doc.setPage(1);
            doc.addImage(SuppBarImageUri, 'PNG', 0.3, 1.5, 11, 4);
            // doc.addImage(SuppPie3dImageUri, 'PNG', 0, 4.5, 6, 5);
            // doc.addImage(SuppPie3dImageUri, 'PNG', 5, 4.5, 6, 5);
            doc.text(4, 0.3, SuppFilteredYear + ' Supplier Audit Results Bar Chart');
            
            doc.addPage('l', 'in', [8.5, 11]);
            doc.setPage(2);
            doc.text(4, 0.3, SuppFilteredYear + ' Supplier Audit Results Pie Charts');
            doc.addImage(SuppPie3dResDeptNCImageUri, 'PNG', -0.5, 0.5, 6, 5);
            doc.addImage(SuppPie3dResDeptOFIImageUri, 'PNG', 5.3, 0.5, 6, 5);
            doc.addImage(SuppPie3dImageUri, 'PNG', -0.5, 4.5, 6, 5);
            doc.save(filename + '.pdf');
        }

        function GetSuppDataCharts() {
            $.ajax({
                url: 'get_chart_supplier_audit_by_stat',
                method: 'get',
                data: {
                    supplier_audit_stat: 1,
                    year: SuppFilteredYear
                },
                dataType: 'json',
                beforeSend: function() {
                    DrawSuppPie3dExploded("Loading...");
                    DrawSuppPieChart3dSuppResDeptNC("Loading...");
                    DrawSuppPieChart3dSuppResDeptOFI("Loading...");
                    DrawSuppProcAuditResultsBarChart();
                },
                success: function(JsonObject){
                    LoadSuppPie3dGoogleChart(JsonObject);
                    LoadSuppProcAuditResultsBarChart(JsonObject);
                    LoadSuppPieChart3dSuppResDeptNC(JsonObject);
                    LoadSuppPieChart3dSuppResDeptOFI(JsonObject);
                },
                error: function(data, status, xhr) {

                }
            });
        }

        function LoadSuppPie3dGoogleChart(JsonObject) {
            let arrLabels = ["Loading..."];
            let arrData = [100, 0];
            let arrBackgroundColor = ["#E84A5F", "#99B898"];

            if(JsonObject['suppliers'].length > 0){
                // JsonTUVObject = JsonObject;

                arrLabels = [];
                arrData[0] = 0;
                arrData[1] = 0;

                for(let index = 0; index < JsonObject['suppliers'].length; index++) {
                    if(JsonObject['suppliers'][index].classification == "NC") {
                        arrData[0] += 1;
                    }
                    else{
                        arrData[1] += 1;
                    }
                }

                let arrDatas = [
                    ['Type', 'Classification / Rank'],
                    ['NC = ' + arrData[0],     arrData[0]],
                    ['OFI = ' + arrData[1],    arrData[1]],
                ];
                
                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + SuppFilteredYear + ' Supplier Audit By Classification / Rank',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dSupp'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                // console.log(pie3dExploded.getImageURI());
                SuppPie3dImageUri = pie3dExploded.getImageURI();
                // $("#imgPieChart3dSupp").attr('src', pie3dExploded.getImageURI());
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Classification / Rank'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + SuppFilteredYear + ' Supplier Audit By Classification / Rank',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dSupp'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                SuppPie3dImageUri = pie3dExploded.getImageURI();
            }
        }

        function LoadSuppPieChart3dSuppResDeptNC(JsonObject) {
            let arrLabels = [];
            let arrDatas = [
                ['Type', 'Non Conformance (NC)'],
            ];

            let arrBackgroundColor = ['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'];

            let arrDepartmentId = [];
            let arrDepartmentNames = [];
            let arrNoOfSuppAudit = [];
            let noOfSuppAudit = 0;

            if(JsonObject['suppliers'].length > 0){
                for(let index = 0; index < JsonObject['suppliers'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['suppliers'][index]['supplier_departments'].length; index2++){
                        arrDepartmentId.push(JsonObject['suppliers'][index]['supplier_departments'][index2]['departments'][0].department_id);
                        arrDepartmentNames.push(JsonObject['suppliers'][index]['supplier_departments'][index2]['departments'][0].department_name);
                    }
                }

                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }

                arrDepartmentId = arrDepartmentId.filter(distinct);
                arrDepartmentNames = arrDepartmentNames.filter(distinct);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    noOfSuppAudit = 0;
                    for(let index2 = 0; index2 < JsonObject['suppliers'].length; index2++) {
                        for(let index3 = 0; index3 < JsonObject['suppliers'][index2]['supplier_departments'].length; index3++){
                            if(arrDepartmentId[index] == JsonObject['suppliers'][index2]['supplier_departments'][index3]['departments'][0].department_id && JsonObject['suppliers'][index2].classification == "NC") {
                                noOfSuppAudit++;
                            }
                        }

                    }

                    arrNoOfSuppAudit.push(noOfSuppAudit);
                }
                // console.log(arrDepartmentId);

                // console.log(arrNoOfSuppAudit);

                // console.log(arrDepartmentNames);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    arrDatas.push([arrDepartmentNames[index] + " = " + arrNoOfSuppAudit[index], arrNoOfSuppAudit[index]]);
                }

                // console.log(arrDatas);

                let totalNumOfAudits = 0;
                for(let index = 1; index < arrDatas.length; index++) {
                    totalNumOfAudits += arrDatas[index][1];
                    // console.log(arrDatas[index][1]);
                }

                if(totalNumOfAudits <= 0) {
                    arrDatas = [
                        ['Type', 'Non Conformance (NC)'],
                        ['No record found.', 1],
                    ];
                }

                //Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + SuppFilteredYear + ' Supplier Non Conformance (NC)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        0: {offset: 0.02},
                        1: {offset: 0.02},
                        2: {offset: 0.02},
                        3: {offset: 0.02},
                        4: {offset: 0.02},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dSuppResDeptNC'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                SuppPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Non Conformance (NC)'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + SuppFilteredYear + ' Supplier Non Conformance (NC)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dSuppResDeptNC'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                SuppPie3dResDeptNCImageUri = pie3dExploded.getImageURI();
            }
        }

        function LoadSuppPieChart3dSuppResDeptOFI(JsonObject) {
            let arrLabels = [];
            let arrDatas = [
                ['Type', 'Opportunity For Improvement (OFI)'],
            ];

            let arrBackgroundColor = ['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'];

            let arrDepartmentId = [];
            let arrDepartmentNames = [];
            let arrNoOfSuppAudit = [];
            let noOfSuppAudit = 0;

            if(JsonObject['suppliers'].length > 0){
                for(let index = 0; index < JsonObject['suppliers'].length; index++) {
                    for(let index2 = 0; index2 < JsonObject['suppliers'][index]['supplier_departments'].length; index2++){
                        arrDepartmentId.push(JsonObject['suppliers'][index]['supplier_departments'][index2]['departments'][0].department_id);
                        arrDepartmentNames.push(JsonObject['suppliers'][index]['supplier_departments'][index2]['departments'][0].department_name);
                    }
                }

                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }

                arrDepartmentId = arrDepartmentId.filter(distinct);
                arrDepartmentNames = arrDepartmentNames.filter(distinct);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    noOfSuppAudit = 0;
                    for(let index2 = 0; index2 < JsonObject['suppliers'].length; index2++) {
                        for(let index3 = 0; index3 < JsonObject['suppliers'][index2]['supplier_departments'].length; index3++){
                            if(arrDepartmentId[index] == JsonObject['suppliers'][index2]['supplier_departments'][index3]['departments'][0].department_id && JsonObject['suppliers'][index2].classification == "OFI") {
                                noOfSuppAudit++;
                            }
                        }

                    }

                    arrNoOfSuppAudit.push(noOfSuppAudit);
                }
                // console.log(arrDepartmentId);

                // console.log(arrNoOfSuppAudit);

                // console.log(arrDepartmentNames);

                for(let index = 0; index < arrDepartmentId.length; index++) {
                    arrDatas.push([arrDepartmentNames[index] + " = " + arrNoOfSuppAudit[index], arrNoOfSuppAudit[index]]);
                }

                // console.log(arrDatas);

                let totalNumOfAudits = 0;
                for(let index = 1; index < arrDatas.length; index++) {
                    totalNumOfAudits += arrDatas[index][1];
                    // console.log(arrDatas[index][1]);
                }

                if(totalNumOfAudits <= 0) {
                    arrDatas = [
                        ['Type', 'Opportunity For Improvement (OFI)'],
                        ['No record found.', 1],
                    ];
                }

                //Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + SuppFilteredYear + ' Supplier Opportunity For Improvement (OFI)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        0: {offset: 0.02},
                        1: {offset: 0.02},
                        2: {offset: 0.02},
                        3: {offset: 0.02},
                        4: {offset: 0.02},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dSuppResDeptOFI'));
                pie3dExploded.draw(data, options_pie3d_exploded);

                SuppPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
            }
            else{
                let arrBackgroundColor = ["#99B898"];

                let arrDatas = [
                    ['Type', 'Opportunity For Improvement (OFI)'],
                    ['No record found.', 1],
                ];

                // Create the data table.
                let data = google.visualization.arrayToDataTable(arrDatas);


                // Set chart options
                let options_pie3d_exploded = {
                    title: 'FY ' + SuppFilteredYear + ' Supplier Opportunity For Improvement (OFI)',
                    is3D: true,
                    pieSliceText: 'label',
                    height: 450,
                    width: 550,
                    fontSize: 12,
                    colors: arrBackgroundColor,
                    chartArea: {
                        left: '20%',
                        width: '90%',
                        height: 350
                    },
                    slices: {
                        1: {offset: 0.07},
                        2: {offset: 0.07},
                        3: {offset: 0.07},
                        4: {offset: 0.07},
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                let pie3dExploded = new google.visualization.PieChart(document.getElementById('pieChart3dSuppResDeptOFI'));
                pie3dExploded.draw(data, options_pie3d_exploded);
                SuppPie3dResDeptOFIImageUri = pie3dExploded.getImageURI();
            }
        }

        // -------------------- BAR CHARTS --------------------------------
        // Load the Visualization API and the corechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(DrawSuppProcAuditResultsBarChart);

        // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
        function DrawSuppProcAuditResultsBarChart() {

            let arrColors = ['#99B898','#E84A5F'];

            let arrDatas = [
                ['Classification', 'NC', { role: 'annotation'} ,'OFI', { role: 'annotation'}],
                ['FY ' + SuppFilteredYear,  0,'0',      0, '0'],
                ['April',  0,'0',      0,'0'],
                ['May',  0,'0',      0,'0'],
                ['June',  0,'0',       0,'0'],
                ['July',  0,'0',      0,'0'],
                ['August',  0,'0',      0,'0'],
                ['September',  0,'0',      0,'0'],
                ['October',  0,'0',       0,'0'],
                ['November',  0,'0',      0,'0'],
                ['December',  0,'0',      0,'0'],
                ['January',  0,'0',      0,'0'],
                ['February',  0,'0',       0,'0'],
                ['March',  0,'0',      0,'0'],
            ];

            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_column_stacked = {
                // title: '2019 Process Audit Results',
                // titleTextStyle: {
                //   color: '333333',
                //   fontName: 'Arial',
                //   fontSize: 20,
                // },
                height: 400,
                fontSize: 12,
                colors: arrColors,
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
            let bar = new google.visualization.ColumnChart(document.getElementById('barChartSuppProcAuditResult'));
            bar.draw(data, options_column_stacked);
        }

        function LoadSuppProcAuditResultsBarChart(JsonObject) {
            let arrColors = ['#E84A5F', '#99B898'];
            let currDate = new Date();

            let arrDatas = [
                ['Classification', 'NC', { role: 'annotation'} ,'OFI', { role: 'annotation'}],
                ['FY ' + SuppFilteredYear,  0,'0',      0, '0'],
                ['April',  0,'0',      0,'0'],
                ['May',  0,'0',      0,'0'],
                ['June',  0,'0',       0,'0'],
                ['July',  0,'0',      0,'0'],
                ['August',  0,'0',      0,'0'],
                ['September',  0,'0',      0,'0'],
                ['October',  0,'0',       0,'0'],
                ['November',  0,'0',      0,'0'],
                ['December',  0,'0',      0,'0'],
                ['January',  0,'0',      0,'0'],
                ['February',  0,'0',       0,'0'],
                ['March',  0,'0',      0,'0'],
            ];

            // arrDatas[7][1] = 100;


            if(JsonObject['suppliers'].length > 0){
                for(let index = 0; index < JsonObject['suppliers'].length; index++) {
                    let auditDateFrom = new Date(JsonObject['suppliers'][index].audit_date_from);
                    let auditMonthFrom = auditDateFrom.getMonth(); 
                    let auditYearFrom = auditDateFrom.getFullYear();
                    let auditClassification = JsonObject['suppliers'][index].classification;

                    if(auditMonthFrom <= 2){
                        if(auditYearFrom == parseInt(currDate.getFullYear()) + 1 && auditClassification == 'NC') {
                            // alert('nc');
                            arrDatas[auditMonthFrom + 11][1] = parseInt(arrDatas[auditMonthFrom + 11][1]) + 1;
                            arrDatas[auditMonthFrom + 11][2] = parseInt(arrDatas[auditMonthFrom + 11][2]) + 1;

                            arrDatas[1][1] = parseInt(arrDatas[1][1]) + 1;
                            arrDatas[1][2] = parseInt(arrDatas[1][2]) + 1;
                        }
                        else {
                            // alert('ofi');   
                            arrDatas[auditMonthFrom + 11][3] = parseInt(arrDatas[auditMonthFrom + 11][3]) + 1;
                            arrDatas[auditMonthFrom + 11][4] = parseInt(arrDatas[auditMonthFrom + 11][4]) + 1;

                            arrDatas[1][3] = parseInt(arrDatas[1][3]) + 1;
                            arrDatas[1][4] = parseInt(arrDatas[1][4]) + 1;
                        }
                    }
                    else{
                        if(auditYearFrom == currDate.getFullYear() && auditClassification == 'NC') {
                            // console.log(auditMonthFrom + ' = ' + currDate.getMonth());
                            // console.log(auditYearFrom + ' = ' + currDate.getFullYear());
                            // console.log(arrDatas[7][1]);
                            arrDatas[auditMonthFrom - 1][1] = parseInt(arrDatas[auditMonthFrom - 1][1]) + 1;
                            arrDatas[auditMonthFrom - 1][2] = parseInt(arrDatas[auditMonthFrom - 1][2]) + 1;
                            // alert('nc');

                            arrDatas[1][1] = parseInt(arrDatas[1][1]) + 1;
                            arrDatas[1][2] = parseInt(arrDatas[1][2]) + 1;
                        }
                        else if(auditYearFrom == currDate.getFullYear() && auditClassification == 'OFI') {
                            arrDatas[auditMonthFrom - 1][3] = parseInt(arrDatas[auditMonthFrom - 1][3]) + 1;
                            arrDatas[auditMonthFrom - 1][4] = parseInt(arrDatas[auditMonthFrom - 1][4]) + 1;
                            // alert('ofi');

                            arrDatas[1][3] = parseInt(arrDatas[1][3]) + 1;
                            arrDatas[1][4] = parseInt(arrDatas[1][4]) + 1;
                        }
                    }

                }
            }
            else {
                // alert('No record');
            }


            let data = google.visualization.arrayToDataTable(arrDatas);


            // Set chart options
            let options_column_stacked = {
                // title: '2019 Process Audit Results',
                // titleTextStyle: {
                //   color: '333333',
                //   fontName: 'Arial',
                //   fontSize: 20,
                // },
                height: 400,
                fontSize: 12,
                colors: arrColors,
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
            let bar = new google.visualization.ColumnChart(document.getElementById('barChartSuppProcAuditResult'));
            bar.draw(data, options_column_stacked);
            SuppBarImageUri = bar.getImageURI();
        }
    </script>
@endsection