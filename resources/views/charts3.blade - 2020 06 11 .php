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
                                        @include('charts.tuv_view')
                                    </div>
                                    <!-- ../ TUV PANEL -->

                                    <!-- CUSTOMER PANEL -->
                                    <div class="tab-pane fade" id="tabCustomer" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        @include('charts.customer_view')
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

<script type="text/javascript">
    let arrPieColors = [
        '#5c9bd5',
        '#ed7e30',
        '#99B898',
        '#FECEA8',
        '#FF847C',
        '#E84A5F',
        '#474747',
        '#6c757d',
        '#17a2b8',
        '#28a745',
        '#ffc107',
        '#dc3545',
        '#343a40',
        '#6610f2',
        '#001f3f',
        '#f012be',
        '#20c997',
        '#e83e8c',
        '#3d9970',
        '#fd7e14',
        '#01ff70',
        '#cc6699',
        '#cc6666',
        '#cc7f66',
        '#cc9966',
        '#b3cc66',
        '#66cccc',
        '#9966cc',
        '#ccb366',
        '#0000cc',
        '#99cc66',
        '#cccc66',
        '#cc0000',
        '#ffd966',
        '#66cc66',
        '#b366cc',
        '#cc9900',
        '#9900cc',
        '#7fcc66',
        '#00cccc',
        '#cc66cc',
        '#666600',
        '#66b3cc',
        '#006633',
        '#cc667f',
        '#66cc99',
        '#6666ff',
        '#3399ff',
        '#66ccb3',
    ];

    google.load('visualization', '1.0', {'packages':['corechart']});

    google.setOnLoadCallback(function(){
        GetTUVBarChartByAuditCategory($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());
        GetTUVPieChartByAuditClassification($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

        GetTUVPieChartByAuditAreasForImprovement($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

        GetCustomerPieChartByAuditAreasForImprovement($("#dateSearchCustomerAuditYearFrom").val(), $("#dateSearchCustomerAuditYearTo").val());
    });

    $(function(){
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
          var target = $(e.target).attr("href") // activated tab          
          if(target == "#active"){
            GetTUVBarChartByAuditCategory($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());
            GetTUVPieChartByAuditClassification($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());

            GetTUVPieChartByAuditAreasForImprovement($("#dateSearchTUVAuditFrom").val(), $("#dateSearchTUVAuditTo").val(), $("#selFilterTUVByAuditCategory").val());
          }
          else if(target == "#tabCustomer"){
            GetCustomerPieChartByAuditAreasForImprovement($("#dateSearchCustomerAuditYearFrom").val(), $("#dateSearchCustomerAuditYearTo").val());
          }
          else if(target == "#tabInternal"){
            
          }
          else if(target == "#tabSupplier"){
            
          }
          
        });
    });
</script>

@include('charts.tuv_js')
@include('charts.customer_js')
@endsection