@extends('layouts.master_layout')
@section('title', 'AQMS Audit Schedule Details')

@section('content')
    <style type="text/css">
        .center-table-cell {
            text-align: center;
        }
        .custom-modal-xl{
            width: 95%!important;
            min-width: 90%!important;
        }
        .custom-modal-lg{
            width: 75%!important;
            min-width: 70%!important;
        }
        .btn-blue{
            background-color: #007bff;
        }

        .text-center{
          text-align: center;
        }
    </style>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">AQMS Audit Schedule Details</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">AQMS Audit Schedule Details
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
                              <div class="card-block" id="divCardBlockAQMS">
                                <div class="row">
                                  <div class="col-md-5">
                                      <h3>{{ $aqms_schedule_details->title ?? '' }}</h3>
                                      <h6>Scope : {{ $aqms_schedule_details->scope ?? '' }}</h6>
                                      <h6>Reference Stds : {{ $aqms_schedule_details->reference_stds ?? '' }}</h6>
                                      <h6>Method : {{ $aqms_schedule_details->method ?? '' }}</h6>
                                  </div>
                                  <!-- <div class="col-md-7">
                                      <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-xs" id="tblRevisionHistories">
                                          <thead>
                                            <tr>
                                              <th colspan="2" class="text-center">Revision History</th>
                                              <th rowspan="2" class="text-center">Prepared</th>
                                              <th rowspan="2" class="text-center">Checked</th>
                                              <th rowspan="2" class="text-center">Approved</th>
                                            </tr>
                                            <tr>
                                              <th>Date</th>
                                              <th>Remarks</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            
                                          </tbody>
                                        </table>
                                      </div>
                                  </div> -->
                                </div>
                                <div style="float: left;" class="row">
                                  <div class="col-sm-2 table-responsive">
                                    <table class="table table-bordered table-xs">
                                      <thead>
                                        <tr>
                                          <th colspan="3" class="center-table-cell">Legends</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td><span class="tag btn-blue">Plan</span></td>
                                          <td><span class="tag tag-warning">Actual</span></td>
                                          <td><span class="tag tag-success">Reschedule</span></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <br><br>

                                <div style="float: right;">
                                  <span><i><b><i class="icon-info-circle"></i> Note: </b>Double click for details.</i></span> <br><br>
                                </div>
                                <br><br>
                                <div style="float: left;">  
                                      <select class="form-control" id="selFilterAQMSStat">
                                        <option value="">All</option>
                                        <option value="1" selected="true">Active</option>
                                        <option value="2">Inactive</option>
                                      </select>
                                </div>

                                <div style="float: right;">
                                    <button class="btn btn-success" id="btnAddProcess" data-toggle="modal" data-target="#mdlSaveProcess" data-keyboard="false"><i class=""></i> Add Process</button>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs" id="tblAQMSchedules" width="100%">
                                        <thead>
                                            <tr id="trHeader">
                                                <th rowspan="2">No.</th>
                                                <th rowspan="2">
                                                    Organizational Unit / Process <br> 
                                                    OPERATIONS DIVISION 
                                                </th>
                                                <th rowspan="2" class="center-table-cell">Process Owner</th>
                                                <th rowspan="2" class="center-table-cell" id="thHeader">Internal Auditor</th>
                                            </tr>
                                            <!-- <tr>
                                                <th class="center-table-cell">Apr-June</th>
                                                <th class="center-table-cell">July-Sept</th>
                                                <th class="center-table-cell">Oct-Dec</th>
                                                <th class="center-table-cell">Jan-Mar</th>
                                                
                                                <th class="center-table-cell">Apr-June</th>
                                                <th class="center-table-cell">July-Sept</th>
                                                <th class="center-table-cell">Oct-Dec</th>
                                                <th class="center-table-cell">Jan-Mar</th>
                                            </tr> -->
                                        </thead>
                                        <tbody>
                                          <!-- Auto generated -->
                                        </tbody>
                                    </table>
                                    <br><br>
                                </div>

                                <!-- <div style="float: right;" class="row">
                                  <div class="col-sm-2 table-responsive">
                                    <table class="table table-bordered table-xs">
                                      <thead>
                                        <tr>
                                          <th colspan="3" class="center-table-cell">Legends</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td><span class="tag btn-blue">Plan</span></td>
                                          <td><span class="tag tag-warning">Actual</span></td>
                                          <td><span class="tag tag-success">Reschedule</span></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div> -->
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

    <div class="modal fade text-xs-left" id="mdlSaveProcess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveProcess">
              @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Process</h4>
              </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">No.</label>
                              <input type="number" class="form-control" name="no">
                              <input type="hidden" class="form-control" name="process_id">
                          </div>

                          <div class="form-group">
                              <label for="projectinput1">Organizational Unit / Process</label>
                              <textarea class="form-control" cols="10" rows="5" name="process" style="width: 100%;"></textarea>
                              <input type="hidden" class="form-control" name="audit_schedule_id" value="{{ $aqms_schedule_details->id ?? '' }}">
                          </div>

                      </div>

                      <div style="float: left;">
                        <button type="button" class="btn btn-outline-info btnShowAQMSProcessDetails">Add Process Details</button>
                        <button type="button" class="btn btn-outline-danger btnHideAQMSProcessDetails" style="display: none;">Cancel</button>
                      </div>

                      <div style="float: right;">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary btnSaveProcess">Save</button>
                      </div>
                    </div>
                  </div>
              </div>
              </form>

              <hr>

              <div class="modal-body" id="divAddAQMSProcessDetails" style="display: none;">
                <!-- <h4>Add Process Details</h4> -->
                <!-- <hr> -->
                <form id="frmSaveProcessDetails" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Process Owner</label>
                              <input type="hidden" class="form-control" name="process_id">
                              <input type="hidden" class="form-control" name="process_detail_id">
                              <select class="form-control select2 selUsers selAddAQMSSchedUsers" name="process_owners[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="projectinput1">Internal Auditors</label>
                              <select class="form-control select2 selUsers selAddAQMSSchedUsers" name="internal_auditors[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>

                      <div style="float: right;">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary btnSaveProcessDetails">Save</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- <div class="modal-footer"> -->
                <!-- <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary btnSaveProcess">Save</button> -->
              <!-- </div> -->
        </div>
      </div>
    </div>

    <div class="modal fade text-xs-left" id="mdlSaveProcessDetailYear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog custom-modal-xl" role="document">
        <div class="modal-content">
              @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Process Details</h4>
              </div>

              <div class="row">
                <!-- PROCESS DETAILS -->
                <div class="col-sm-6">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <form id="frmEditProcess">
                          <div class="form-body">
                              <div class="form-group">
                                  <label for="projectinput1">No.</label>
                                  <input type="number" class="form-control" name="no" readonly="true">
                                  <input type="hidden" class="form-control" name="process_id">
                              </div>

                              <div class="form-group">
                                  <label for="projectinput1">Organizational Unit / Process</label>
                                  <textarea class="form-control" cols="10" rows="8" name="process" style="width: 100%;" readonly="true"></textarea>
                                  <input type="hidden" class="form-control" name="audit_schedule_id" value="{{ $aqms_schedule_details->id ?? '' }}">
                              </div>
                          </div>
                        </form>
                      </div>
                    </div>

                    <hr>
                    <!-- <h4>Edit Process Details</h4> -->
                    <div class="row">
                      <form id="frmEditProcessDetails" method="post">
                        @csrf
                        <div class="col-sm-12">
                          <div class="form-body">
                              <div class="form-group">
                                  <label for="projectinput1">Process Owner</label>
                                  <input type="hidden" class="form-control" name="aqms_schedule_id">
                                  <select class="form-control select2 selUsers selAddAQMSSchedUsers" name="process_owners[]" multiple="multiple" style="width: 100%;">
                                    <!-- Code generated -->
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label for="projectinput1">Internal Auditors</label>
                                  <select class="form-control select2 selUsers selAddAQMSSchedUsers" name="internal_auditors[]" multiple="multiple" style="width: 100%;">
                                    <!-- Code generated -->
                                  </select>
                              </div>
                          </div>

                          <div style="float: right;">
                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-primary btnEditProcessDetails">Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END PROCESS DETAILS -->

                <!-- YEARS -->
                  <div class="col-sm-6">
                    <br>
                    <div style="float: right;">
                      <button class="btn btn-success" id="btnShowAddYearModal" style="margin-right: 10px;">Add Year</button>
                    </div>

                    <div class="table-responsive" style="margin-right: 10px;">
                      <br>
                      <table class="table table-sm table-bordered table-striped" id="tblYears" style="width: 100%; margin-right: 10px;">
                        <thead>
                          <tr>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Year</th>
                            <th>Plan</th>
                            <th>Actual</th>
                            <th>Reschedule</th>
                          </tr>
                        </thead>
                      </table>
                    </div>  
                  </div>
                  <!-- END YEARS -->

              </div>
              <!-- END .row -->

        </div>
      </div>
    </div>

    <div class="modal fade text-xs-left" id="mdlSaveYear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveYear">
              @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Year</h4>
              </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Year</label>
                              <input type="hidden" class="form-control" name="year_id">
                              <input type="hidden" class="form-control" name="aqms_schedule_id">

                              <input type="number" class="form-control" name="year">
                          </div>

                          <div class="form-group">
                              <label for="projectinput1">Plan</label>
                              <div class="row">
                                <div class="col-sm-6">
                                  <input type="date" class="form-control" name="start_plan">
                                </div>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control" name="end_plan">
                                </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="projectinput1">Actual</label>
                              <div class="row">
                                <div class="col-sm-6">
                                  <input type="date" class="form-control" name="start_actual">
                                </div>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control" name="end_actual">
                                </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="projectinput1">Reschedule</label>
                              <div class="row">
                                <div class="col-sm-6">
                                  <input type="date" class="form-control" name="start_reschedule">
                                </div>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control" name="end_reschedule">
                                </div>
                              </div>
                          </div>

                      </div>

                      <div style="float: right;">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary btnSaveYear">Save</button>
                      </div>
                    </div>
                  </div>
              </div>
              </form>
        </div>
      </div>
    </div>
@endsection

@section('js_content')
    <script type="text/javascript">
        let frmSaveProcess = $("#frmSaveProcess");
        let mdlSaveProcess = $("#mdlSaveProcess");
        let btnSaveProcess = $(".btnSaveProcess");

        // PROCESS DETAILS
        let frmSaveProcessDetails = $("#frmSaveProcessDetails");
        let btnSaveProcessDetails = $(".btnSaveProcessDetails");

        let frmEditProcessDetails = $("#frmEditProcessDetails");
        let btnEditProcessDetails = $(".btnEditProcessDetails");
        let frmEditProcess = $("#frmEditProcess");
        // ..PROCESS DETAILS

        // PROCESS DETAIL YEARS
        let frmSaveProcessDetailYear = $("#frmSaveProcessDetailYear");
        let btnSaveProcessDetailYear = $(".btnSaveProcessDetailYear");
        let mdlSaveProcessDetailYear = $("#mdlSaveProcessDetailYear");

        let dtYears;
        let mdlSaveYear = $("#mdlSaveYear");
        let frmSaveYear = $("#frmSaveYear");
        let btnSaveYear = $(".btnSaveYear");
        // ..PROCESS DETAIL YEARS

        let auditScheduleId = "{{ $aqms_schedule_details->id ?? '' }}";
        $(document).ready(function(){
            $(".select2").select2();
            
            // Add Process
            $("#btnAddProcess").click(function(){
              frmSaveProcess[0].reset();
              $(".modal-title", mdlSaveProcess).text('Add Process');
              $("input[name='process_id'", frmSaveProcess).val('');
              $("input[name='process_id'", frmSaveProcessDetails).val('');

              $("#divAddAQMSProcessDetails").hide();
              $(".btnShowAQMSProcessDetails").hide();
              $(".btnHideAQMSProcessDetails").hide();
            });

            frmSaveProcess.submit(function(e){
              e.preventDefault();
              AQMSSaveProcess();
            });

            GetTableAQMSSchedByAuditScheduleId(auditScheduleId, $("#selFilterAQMSStat").val());

            $("#selFilterAQMSStat").change(function(){
              GetTableAQMSSchedByAuditScheduleId(auditScheduleId, $("#selFilterAQMSStat").val());              
            });

            $(document).on('dblclick', '.tdEditProcess', function(){
              let processId = $(this).attr('process-id');
              mdlSaveProcess.modal('show');
              $(".modal-title", mdlSaveProcess).text('Process Details');
              frmSaveProcess[0].reset();
              $("input[name='process_id'", frmSaveProcess).val(processId);
              $("input[name='process_id'", frmSaveProcessDetails).val(processId);
              $("#divAddAQMSProcessDetails").hide();
              $(".btnShowAQMSProcessDetails").show();
              $(".btnHideAQMSProcessDetails").hide();
              GetAQMSProcessById(processId);

            });

            $(".btnShowAQMSProcessDetails").click(function(){
              $("#divAddAQMSProcessDetails").show();
              $(".btnHideAQMSProcessDetails").show();
              $(this).hide();

              $("select[name='process_owners[]'", frmSaveProcessDetails).val('-1').trigger('change');
              $("select[name='internal_auditors[]'", frmSaveProcessDetails).val('-1').trigger('change');
            });

            $(".btnHideAQMSProcessDetails").click(function(){
              $("#divAddAQMSProcessDetails").hide();
              $(".btnShowAQMSProcessDetails").show();
              $(this).hide();
            });

            // PROCESS DETAILS
            $(".select2").select2();
            GetCboUsersByStat2(1, $(".selUsers"));

            frmSaveProcessDetails.submit(function(e){
              e.preventDefault();
              AQMSSaveProcessDetails(frmSaveProcessDetails, btnSaveProcessDetails);
            });

            // PROCESS DETAIL YEARS

            $(document).on('dblclick', '.tdEditProcessDetails', function(){
              let aqmsScheduleId = $(this).attr('aqms-schedule-id');
              mdlSaveProcessDetailYear.modal('show');
              $(".modal-title", mdlSaveProcessDetailYear).text('Process Details');
              // frmSaveProcessDetailYear[0].reset();
              $("input[name='aqms_schedule_id'", frmEditProcessDetails).val(aqmsScheduleId);
              $("input[name='aqms_schedule_id'", frmSaveYear).val(aqmsScheduleId);
              // $("input[name='process_id'", frmSaveProcess).val(processId);
              GetAQMSProcessDetailsById(aqmsScheduleId);
              frmEditProcess[0].reset();
              dtYears.draw();
            });

            frmEditProcessDetails.submit(function(e){
              e.preventDefault();
              AQMSSaveProcessDetails(frmEditProcessDetails, btnEditProcessDetails);
            });

            // YEARS
            dtYears = $("#tblYears").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "../view_aqms_years_by_schedule_id",
                    "data": function (param){
                        param.aqms_schedule_id = $("input[name='aqms_schedule_id'", frmEditProcessDetails).val();
                    }
                },
                "columns":[
                    { "data" : "raw_action", orderable: false, },
                    { "data" : "raw_status", orderable: false, },
                    { "data" : "year" },
                    { "data" : "raw_plan" },
                    { "data" : "raw_actual" },
                    { "data" : "raw_reschedule" },
                ],
                "columnDefs": [
                    // { "visible": false, "targets": 0 },
                ],
                "order": [[ 0, 'asc' ]],
                "displayLength": 10,
                "drawCallback": function( settings ) {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
            });//end of dataTableProcessSchedules

            $("#btnShowAddYearModal").click(function(){
              mdlSaveYear.modal('show');
              frmSaveYear[0].reset();
              $("input[name='year_id'", frmSaveYear).val('');
              $(".modal-title", mdlSaveYear).text('Add Year');
            });

            frmSaveYear.submit(function(e){
              e.preventDefault();
              AQMSSaveYear();
            });

            $(document).on('click', '.aEditYear', function(){
              let yearId = $(this).attr('year-id');
              mdlSaveYear.modal('show');
              frmSaveYear[0].reset();
              $("input[name='year_id'", frmSaveYear).val(yearId);
              $(".modal-title", mdlSaveYear).text('Edit Year');
              GetAQMSYearById(yearId);
            });
        });

    </script>
@endsection