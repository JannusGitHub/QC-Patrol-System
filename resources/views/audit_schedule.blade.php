@extends('layouts.master_layout')
@section('title', 'Audit Schedule')

@section('content')
    <style type="text/css">
      .modal-xl{
        margin: 20px 50px;
      }

      .custom-modal-xl{
        width: 95%!important;
        min-width: 90%!important;
      }
    </style>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Audit Schedule</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Audit Schedule
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
                              <div class="card-body collapse in">
                              <div class="card-block">
                                  <ul class="nav nav-tabs nav-justified">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="linkTabAQMS" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">AQMS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabEMS" data-toggle="tab" href="#tabEMS" aria-controls="link" aria-expanded="false">EMS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabProduct" data-toggle="tab" href="#tabProduct" aria-controls="linkOpt">Product</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabProcess" data-toggle="tab" href="#tabProcess" aria-controls="linkOpt">Process</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content px-1 pt-1">
                                    <!-- TUV PANEL -->
                                    <div role="tabpanel" class="tab-pane fade active in" id="active" aria-labelledby="active-tab" aria-expanded="true">
                                        <h3 style="text-align: center;">AQMS Audit Schedule</h3>
                                        <div style="float: right;">
                                            <button class="btn btn-success btn-sm" id="btnShowAddAQMSSchedModal" data-toggle="modal" data-target="#modalSaveAuditScheduleDetails" data-keyboard="false"><i class="icon-plus3"></i> Add</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped table-sm" id="tblAQMSchedules" width="100%">
                                                <thead>
                                                    <tr>
                                                      <th>ID</th>
                                                      <th>Year</th>
                                                      <th>Title</th>
                                                      <th>Scope</th>
                                                      <th>Reference Stds.</th>
                                                      <th>Method</th>
                                                      <th>Status</th>
                                                      <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ TUV PANEL -->

                                    <!-- CUSTOMER PANEL -->
                                    <div class="tab-pane fade" id="tabEMS" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        <h3 style="text-align: center;">EMS Audit Schedule</h3>
                                        <div style="float: right;">
                                            <button class="btn btn-success btn-sm" id="btnShowAddEMSSchedModal" data-toggle="modal" data-target="#modalSaveAuditScheduleDetails" data-keyboard="false"><i class="icon-plus3"></i> Add</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped table-sm" id="tblEMSchedules" width="100%">
                                                <thead>
                                                    <tr>
                                                      <th>ID</th>
                                                      <th>Year</th>
                                                      <th>Title</th>
                                                      <th>Scope</th>
                                                      <th>Reference Stds.</th>
                                                      <th>Method</th>
                                                      <th>Status</th>
                                                      <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ CUSTOMER PANEL -->

                                    <!-- ../ Internal PANEL -->
                                    <div class="tab-pane fade" id="tabProduct" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <h3 style="text-align: center;">Product Audit Schedule</h3>
                                        <div style="float: right;">
                                            <button class="btn btn-success btn-sm" id="btnShowAddProductSchedModal" data-toggle="modal" data-target="#modalSaveAuditScheduleDetails" data-keyboard="false"><i class="icon-plus3"></i> Add</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped table-sm" id="tblProductSchedules" width="100%">
                                                <thead>
                                                    <tr>
                                                      <th>ID</th>
                                                      <th>Year</th>
                                                      <th>Title</th>
                                                      <th>Scope</th>
                                                      <th>Reference Stds.</th>
                                                      <th>Method</th>
                                                      <th>Status</th>
                                                      <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>

                                    <!-- ../ Supplier PANEL -->
                                    <div class="tab-pane fade" id="tabProcess" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                      <h3 style="text-align: center;">Process Audit Schedule</h3>
                                        <div style="float: right;">
                                            <button class="btn btn-success btn-sm" id="btnShowAddProcessSchedModal" data-toggle="modal" data-target="#modalSaveAuditScheduleDetails" data-keyboard="false"><i class="icon-plus3"></i> Add</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-hover table-striped table-sm" id="tblProcessSchedules" width="100%">
                                              <thead>
                                                  <tr>
                                                    <th>ID</th>
                                                    <th>Year</th>
                                                    <th>Title</th>
                                                    <th>Scope</th>
                                                    <th>Reference Stds.</th>
                                                    <th>Method</th>
                                                      <th>Status</th>
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

  <!-- AQMS AUDIT SCHEDULE MODALS -->
    <div class="modal fade text-xs-left" id="modalSaveAuditScheduleDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formSaveSched">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> <span id="spanAuditSchedType">Audit Schedule</span></h4>
              </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Year</label>
                              <input type="number" class="form-control"id="txtSaveSchedYear" name="year">

                              <input type="hidden" class="form-control"id="txtSaveSchedDetailId" name="audit_schedule_detail_id" placeholder="Schedule Detail ID">

                              <input type="hidden" class="form-control"id="txtSaveSchedType" name="schedule_type" placeholder="Schedule Type">
                          </div>
                          <div class="form-group">
                              <label for="projectinput1">Title</label>
                              <input type="text" class="form-control"id="txtSaveSchedTitle" name="title">
                          </div>
                          <div class="form-group">
                              <label for="projectinput1">Scope</label>
                              <input type="text" class="form-control"id="txtSaveSchedScope" name="scope">
                          </div>
                          <div class="form-group">
                              <label for="projectinput1">Reference Stds.</label>
                              <input type="text" class="form-control"id="txtSaveSchedReferenceStds" name="reference_stds">
                          </div>
                          <div class="form-group">
                              <label for="projectinput1">Method</label>
                              <input type="text" class="form-control"id="txtSaveSchedMethod" name="method">
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Save</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <div class="modal fade text-xs-left" id="mdlAuditSchedAction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmAuditSchedAction">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="text-icon icon-ini"></i> <span class="text-title">Audit Schedule Action</span></h4>
              </div>
                <div class="modal-body">
                  <label class="text-body">Please confirm to continue.</label>
                  <input type="hidden" name="audit_schedule_id">
                  <input type="hidden" name="status">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary" class="btnConfirmAuditSchedAction">Confirm</button>
              </div>
            </form>
        </div>
      </div>
    </div>
@endsection

@section('js_content')
    <script type="text/javascript">
      // COMMON JAVASCRIPT CODES
        $(document).ready(function(){
          $(".select2").select2();
          GetCboUsersByStat(1, $(".selUsers"));
          GetDepartmentByStat(1, $(".selAreas"));
        });

        // -------------------------- AQMS AUDITSCHEDULE --------------------------

        let dataTableAQMSSchedules;
        let dataTableEMSSchedules;
        let dataTableProductSchedules;
        let dataTableProcessSchedules;
        // let currDate = new Date();
        // let filAQMSSchedYear = currDate.getFullYear();
        $(document).ready(function() {
          // COMMON

          $(document).on('click', '.aEditAuditSchedDet', function(){
            let schedDetId = $(this).attr('sched-details-id');
            GetSchedDetailsByIdToEdit(schedDetId);
            $("#txtSaveSchedDetailId").val(schedDetId);
          });

            let groupColumn = 0;
            dataTableAQMSSchedules = $("#tblAQMSchedules").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_schedule_details",
                    "data": function (param){
                        // param.aqms_audit_schedule_stat = 0;
                        // param.year = filAQMSSchedYear;
                        // param.status = 1;
                        param.schedule_type = 1;
                    }
                },
                "columns":[
                    { "data" : "id" },
                    { "data" : "year" },
                    { "data" : "title" },
                    { "data" : "scope" },
                    { "data" : "reference_stds" },
                    { "data" : "method" },
                    { "data" : "raw_status" },
                    { "data" : "action1" },
                ],
                "columnDefs": [
                    { "visible": false, "targets": 0 },
                    { "visible": true, "targets": 1 },
                    { "visible": true, "targets": 2 },
                    { "visible": true, "targets": 3 }
                ],
                "order": [[ 0, 'asc' ]],
                "displayLength": 10,
                "drawCallback": function( settings ) {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
            });//end of dataTableAQMSSchedules

            $("#btnShowAddAQMSSchedModal").click(function(){
              $("#txtSaveSchedType").val(1);
              $("#spanAuditSchedType").text("Add AQMS Audit Schedule");
              $("#txtSaveSchedDetailId").val('');
            });

            $("#btnShowAddEMSSchedModal").click(function(){
              $("#txtSaveSchedType").val(2);
              $("#spanAuditSchedType").text("Add EMS Audit Schedule");
              $("#txtSaveSchedDetailId").val('');
            });

            $("#btnShowAddProductSchedModal").click(function(){
              $("#txtSaveSchedType").val(3);
              $("#spanAuditSchedType").text("Add Product Audit Schedule");
              $("#txtSaveSchedDetailId").val('');
            });

            $("#btnShowAddProcessSchedModal").click(function(){
              $("#txtSaveSchedType").val(4);
              $("#spanAuditSchedType").text("Add Process Audit Schedule");
              $("#txtSaveSchedDetailId").val('');
            });

            $("#formSaveSched").submit(function(event){
                event.preventDefault();
                SaveSchedDetails();
            });

            dataTableEMSSchedules = $("#tblEMSchedules").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_schedule_details",
                    "data": function (param){
                        // param.status = 1;
                        param.schedule_type = 2;
                    }
                },
                "columns":[
                    { "data" : "id" },
                    { "data" : "year" },
                    { "data" : "title" },
                    { "data" : "scope" },
                    { "data" : "reference_stds" },
                    { "data" : "method" },
                    { "data" : "raw_status" },
                    { "data" : "action1" },
                ],
                "columnDefs": [
                    { "visible": false, "targets": 0 },
                    { "visible": true, "targets": 1 },
                    { "visible": true, "targets": 2 },
                    { "visible": true, "targets": 3 }
                ],
                "order": [[ 0, 'asc' ]],
                "displayLength": 10,
                "drawCallback": function( settings ) {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
            });//end of dataTableEMSSchedules

            dataTableProductSchedules = $("#tblProductSchedules").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_schedule_details",
                    "data": function (param){
                        // param.status = 1;
                        param.schedule_type = 3;
                    }
                },
                "columns":[
                    { "data" : "id" },
                    { "data" : "year" },
                    { "data" : "title" },
                    { "data" : "scope" },
                    { "data" : "reference_stds" },
                    { "data" : "method" },
                    { "data" : "raw_status" },
                    { "data" : "action1" },
                ],
                "columnDefs": [
                    { "visible": false, "targets": 0 },
                    { "visible": true, "targets": 1 },
                    { "visible": true, "targets": 2 },
                    { "visible": true, "targets": 3 }
                ],
                "order": [[ 0, 'asc' ]],
                "displayLength": 10,
                "drawCallback": function( settings ) {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
            });//end of dataTableProductSchedules

            dataTableProcessSchedules = $("#tblProcessSchedules").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_schedule_details",
                    "data": function (param){
                        // param.status = 1;
                        param.schedule_type = 4;
                    }
                },
                "columns":[
                    { "data" : "id" },
                    { "data" : "year" },
                    { "data" : "title" },
                    { "data" : "scope" },
                    { "data" : "reference_stds" },
                    { "data" : "method" },
                    { "data" : "raw_status" },
                    { "data" : "action1" },
                ],
                "columnDefs": [
                    { "visible": false, "targets": 0 },
                    { "visible": true, "targets": 1 },
                    { "visible": true, "targets": 2 },
                    { "visible": true, "targets": 3 }
                ],
                "order": [[ 0, 'asc' ]],
                "displayLength": 10,
                "drawCallback": function( settings ) {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
            });//end of dataTableProcessSchedules

            $(document).on('click', '.aAuditSchedAction', function(){
              let schedDetailsId = $(this).attr('sched-details-id');
              let status = $(this).attr('status');

              $("input[name='audit_schedule_id']", $("#frmAuditSchedAction")).val(schedDetailsId);
              $("input[name='status']", $("#frmAuditSchedAction")).val(status);

              if(status == 1){
                $(".text-title", $("#mdlAuditSchedAction")).text('Restore Audit Schedule');
              }
              else{
                $(".text-title", $("#mdlAuditSchedAction")).text('Archive Audit Schedule'); 
              }
            });

            $("#frmAuditSchedAction").submit(function(e){
              e.preventDefault();
              AuditScheduleDetailsAction();
            });
        });
    </script>
@endsection