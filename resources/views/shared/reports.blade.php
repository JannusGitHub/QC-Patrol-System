@extends('layouts.master_layout')
@section('title', 'Reports')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Reports</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Reports
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
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabCustomer" data-toggle="tab" href="#tabCustomer" aria-controls="link" aria-expanded="false">Customer</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabInternal" data-toggle="tab" href="#tabInternal" aria-controls="linkOpt">Internal</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabSupplier" data-toggle="tab" href="#tabSupplier" aria-controls="linkOpt">Supplier</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content px-1 pt-1">
                                    <!-- TUV PANEL -->
                                    <div role="tabpanel" class="tab-pane fade active in" id="active" aria-labelledby="active-tab" aria-expanded="true">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="tblTUVAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Audit Date</th>
                                                        <th>Audit Category</th>
                                                        <th>Auditors</th>
                                                        <th>Sending Status</th>
                                                        <th>Audit Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ TUV PANEL -->

                                    <!-- CUSTOMER PANEL -->
                                    <div class="tab-pane fade" id="tabCustomer" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tblCusAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Customer Name</th>
                                                        <th>Audit Date</th>
                                                        <th>Auditors</th>
                                                        <th>Sending Status</th>
                                                        <th>Audit Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ CUSTOMER PANEL -->

                                    <!-- ../ Internal PANEL -->
                                    <div class="tab-pane fade" id="tabInternal" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tblInternalAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Audit Date</th>
                                                        <th>Audit Type</th>
                                                        <th>Auditors</th>
                                                        <th>Sending Status</th>
                                                        <th>Audit Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>

                                    <!-- ../ Supplier PANEL -->
                                    <div class="tab-pane fade" id="tabSupplier" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tblSupplierAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Audit Date</th>
                                                        <th>Audit Type</th>
                                                        <th>Auditors</th>
                                                        <th>Sending Status</th>
                                                        <th>Audit Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
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
        // ------------------ TUV AUDIT ------------------
        let dataTableTUVAudits;

        dataTableTUVAudits = $("#tblTUVAuditResults").DataTable({
            "processing" : false,
            "serverSide" : true,
            "ajax" : {
                url: "view_tuv_audit_by_stat",
                "data": function (param){
                    param.tuv_audit_stat = 0;
                }
            },            
            "columns":[
                { "data" : "audit_date" },
                { "data" : "audit_category" },
                { "data" : "auditors" },
                { "data" : "label1" },
                // { "data" : "audit_stat" },
                { "data" : "label2" },
                { "data" : "action1", orderable:false, searchable:false }
            ],
        });//end of dataTableTUVAudits


        // ------------------ CUSTOMER AUDIT ------------------
        let dataTableCusAudits;

        dataTableCusAudits = $("#tblCusAuditResults").DataTable({
            "processing" : false,
            "serverSide" : true,
            "ajax" : {
                url: "view_customer_audit_by_stat",
                "data": function (param){
                    param.tuv_audit_stat = 0;
                }
            },            
            "columns":[
                { "data" : "customer_name" },
                { "data" : "audit_date" },
                { "data" : "auditors" },
                { "data" : "label1" },
                // { "data" : "audit_stat" },
                { "data" : "label2" },
                { "data" : "action1", orderable:false, searchable:false }
            ],
        });//end of dataTableCusAudits


        // ------------------ INTERNAL AUDIT ------------------
        let dataTableInternalAudits;

        dataTableInternalAudits = $("#tblInternalAuditResults").DataTable({
            "processing" : false,
            "serverSide" : true,
            "ajax" : {
                url: "view_internal_audit_by_stat",
                "data": function (param){
                    param.tuv_audit_stat = 0;
                }
            },            
            "columns":[
                { "data" : "audit_date" },
                { "data" : "audit_type" },
                { "data" : "auditors" },
                { "data" : "label1" },
                // { "data" : "audit_stat" },
                { "data" : "label2" },
                { "data" : "action1", orderable:false, searchable:false }
            ],
        });//end of dataTableInternalAudits


        // ------------------ SUPPLIER AUDIT ------------------
        let dataTableSupplierAudits;

        dataTableSupplierAudits = $("#tblSupplierAuditResults").DataTable({
            "processing" : false,
            "serverSide" : true,
            "ajax" : {
                url: "view_supplier_audit_by_stat",
                "data": function (param){
                    param.tuv_audit_stat = 0;
                }
            },            
            "columns":[
                { "data" : "audit_date" },
                { "data" : "audit_type" },
                { "data" : "auditors" },
                { "data" : "label1" },
                // { "data" : "audit_stat" },
                { "data" : "label2" },
                { "data" : "action1", orderable:false, searchable:false }
            ],
        });//end of dataTableSupplierAudits
    </script>
@endsection