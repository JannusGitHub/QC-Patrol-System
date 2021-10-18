@extends('layouts.master_layout')
@section('title', 'Audit Plan')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Audit Plan</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Audit Plan
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
                                      <a class="nav-link active" id="linkTabTUV" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">AQMS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabCustomer" data-toggle="tab" href="#tabAuditSchedEMS" aria-controls="link" aria-expanded="false">EMS</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content px-1 pt-1">
                                    <!-- STANDARD CLAUSE PANEL -->
                                    <div role="tabpanel" class="tab-pane fade active in" id="active" aria-labelledby="active-tab" aria-expanded="true">
                                        <div style="float: left;">
                                          Year : <input type="number" id="txtFilAQMSSchedYear" style="width: 60px;"> <button class="btn btn-success" id="btnFilAQMSSched"><i class="icon-search5"></i></button>
                                        </div>

                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddAQMSSchedModal" data-toggle="modal" data-target="#modalAddAQMSSched" data-keyboard="false"><i class=""></i> Add AQMS Plan</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="tblAQMSchedules" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" style="text-align: center;">ID</th>
                                                        <th rowspan="2" style="text-align: center;">Organizational Unit</th>
                                                        <th rowspan="2" style="text-align: center;">Process Owners</th>
                                                        <th rowspan="2" style="text-align: center;">Internal Auditors</th>
                                                        <th style="text-align: center;" colspan="4" id="thAQMSYear">FY 2019</th>
                                                        <th rowspan="2" style="text-align: center;">Status</th>
                                                        <th rowspan="2" style="text-align: center;">Action</th>
                                                    </tr>
                                                    <tr>
                                                      <th>Apr-June</th>
                                                      <th>July-Sept</th>
                                                      <th>Oct-Dec</th>
                                                      <th>Jan-Mar</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ STANDARD CLAUSE PANEL -->

                                    <!-- STANDARD CLAUSE CONTENT PANEL -->
                                    <div class="tab-pane fade" id="tabAuditSchedEMS" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        
                                    </div>
                                    <!-- ../ STANDARD CLAUSE CONTENT PANEL -->
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
    <div class="modal fade text-xs-left" id="modalAddAQMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddAQMSSched">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add AQMS Audit Schedule</h4>
              </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Organization Unit</label>
                              <textarea class="form-control" cols="10" rows="10" id="txtAddAQMSSchedOrgUnit" name="organizational_unit"></textarea>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Process Owner</label>
                              <select class="form-control select2 selAddAQMSSchedUsers" id="selAddAQMSSchedProcOwner" name="process_owners[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Internal Auditors</label>
                              <select class="form-control select2 selAddAQMSSchedUsers" id="selAddAQMSSchedIntAuditors" name="internal_auditors[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Year</label>
                              <input type="number" name="year" class="form-control" id="txtAddAQMSSchedYear">
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Quarter</label>
                              <select class="form-control" id="selAddAQMSSchedQuarter" name="quarter" style="width: 100%;">
                                <option value="1">Apr-June</option>
                                <option value="2">July-Sept</option>
                                <option value="3">Oct-Dec</option>
                                <option value="4">Jan-Mar</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <div class="col-sm-12">
                                <label for="projectinput1">Plan</label>
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="plan_from" class="form-control" id="txtAddAQMSSchedPlanFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="plan_to" class="form-control" id="txtAddAQMSSchedPlanTo">
                              </div>
                          </div>
                      </div> <br>
                      <div class="form-body">
                          <div class="form-group">
                              <div class="col-sm-12">
                                <label for="projectinput1">Actual</label>
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="actual_from" class="form-control" id="txtAddAQMSSchedActualFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="actual_to" class="form-control" id="txtAddAQMSSchedActualTo">
                              </div>
                          </div>
                      </div> <br>
                      <div class="form-body">
                          <div class="form-group">
                              <div class="col-sm-12">
                                <label for="projectinput1">Reschedule</label>
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="reschedule_from" class="form-control" id="txtAddAQMSSchedReSchedFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="reschedule_to" class="form-control" id="txtAddAQMSSchedReSchedTo">
                              </div>
                          </div>
                      </div> <br>
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

    <!-- Modal Archive AQMS Audit Schedule -->
    <div class="modal fade text-xs-left" id="modalArchiveAQMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formArchiveAQMSSched">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Archive AQMS Audit Schedule</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to archive this selected AQMS Audit Schedule?</p>
                    <input type="hidden" name="aqms_audit_schedule_id" id="txtArchiveAQMSSchedId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Restore Standard Clause -->
    <div class="modal fade text-xs-left" id="modalRestoreAQMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreAQMSSched">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore AQMS Audit Schedule</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected standard clause?</p>
                    <input type="hidden" name="aqms_audit_schedule_id" id="txtRestoreAQMSSchedId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <div class="modal fade text-xs-left" id="modalEditAQMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditAQMSSched">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit AQMS Audit Schedule</h4>
              </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-body">
                          <input type="hidden" name="aqms_audit_schedule_id" id="txtEditAQMSSchedId">
                          <div class="form-group">
                              <label for="projectinput1">Organization Unit</label>
                              <textarea class="form-control" cols="10" rows="10" id="txtEditAQMSSchedOrgUnit" name="organizational_unit"></textarea>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Process Owner</label>
                              <select class="form-control select2 selEditAQMSSchedUsers" id="selEditAQMSSchedProcOwner" name="process_owners[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Internal Auditors</label>
                              <select class="form-control select2 selEditAQMSSchedUsers" id="selEditAQMSSchedIntAuditors" name="internal_auditors[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Year</label>
                              <input type="number" name="year" class="form-control" id="txtEditAQMSSchedYear">
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Quarter</label>
                              <select class="form-control" id="selEditAQMSSchedQuarter" name="quarter" style="width: 100%;">
                                <option value="1">Apr-June</option>
                                <option value="2">July-Sept</option>
                                <option value="3">Oct-Dec</option>
                                <option value="4">Jan-Mar</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <div class="col-sm-12">
                                <label for="projectinput1">Plan</label>
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="plan_from" class="form-control" id="txtEditAQMSSchedPlanFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="plan_to" class="form-control" id="txtEditAQMSSchedPlanTo">
                              </div>
                          </div>
                      </div> <br>
                      <div class="form-body">
                          <div class="form-group">
                              <div class="col-sm-12">
                                <label for="projectinput1">Actual</label>
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="actual_from" class="form-control" id="txtEditAQMSSchedActualFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="actual_to" class="form-control" id="txtEditAQMSSchedActualTo">
                              </div>
                          </div>
                      </div> <br>
                      <div class="form-body">
                          <div class="form-group">
                              <div class="col-sm-12">
                                <label for="projectinput1">Reschedule</label>
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="reschedule_from" class="form-control" id="txtEditAQMSSchedReSchedFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="reschedule_to" class="form-control" id="txtEditAQMSSchedReSchedTo">
                              </div>
                          </div>
                      </div> <br>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Save changes</button>
              </div>
            </form>
        </div>
      </div>
    </div>
@endsection

@section('js_content')
    <script type="text/javascript">
        // -------------------------- STANDARD CLAUSE --------------------------
        let dataTableAQMSSchedules;
        let currDate = new Date();
        let filAQMSSchedYear = currDate.getFullYear();
        $(document).ready(function() {
            dataTableAQMSSchedules = $("#tblAQMSchedules").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_aqms_sched",
                    "data": function (param){
                        // param.aqms_audit_schedule_stat = 0;
                        param.year = filAQMSSchedYear;
                    }
                },
                "order": [[ 0, "desc" ]],
                'columnDefs': [
                    { 'orderData':[0], 'targets': [0] },
                    {
                        'targets': [0],
                        'visible': false,
                        'searchable': false
                    },
                ],
                "columns":[
                    { "data" : "aqms_audit_schedule_id" },
                    { "data" : "organizational_unit" },
                    { "data" : "process_owners_name" },
                    { "data" : "internal_auditors_name" },
                    { "data" : "label1", orderable:true, searchable:true },
                    { "data" : "label2", orderable:true, searchable:true },
                    { "data" : "label3", orderable:true, searchable:true },
                    { "data" : "label4", orderable:true, searchable:true },
                    { "data" : "label5", orderable:true, searchable:true  },
                    { "data" : "action1", orderable:true, searchable:true  },
                    // { "data" : "label1", orderable:false, searchable:false }
                ],
            });//end of dataTableAQMSSchedules

            GetCboUsersByStat(1, $(".selAddAQMSSchedUsers"));
            GetCboUsersByStat(1, $(".selEditAQMSSchedUsers"));

            $("#txtFilAQMSSchedYear").val(filAQMSSchedYear);
            $("#thAQMSYear").text('FY ' + filAQMSSchedYear);

            $(".select2").select2();

            $("#btnFilAQMSSched").click(function(){
              filAQMSSchedYear = $("#txtFilAQMSSchedYear").val();
              $("#thAQMSYear").text('FY ' + filAQMSSchedYear);
              dataTableAQMSSchedules.draw();

              // $(".selAddAQMSSchedUsers").val([1, 2, 3]).trigger('change'); //working
            });

            $("#formAddAQMSSched").submit(function(event){
                event.preventDefault();
                AddAQMSSched();
            });

            $(document).on('click', '.aArchiveAQMSSched', function(){
                let AQMSSchedId = $(this).attr('aqms-sched-id');
                $("#txtArchiveAQMSSchedId").val(AQMSSchedId);
            });

            $("#formArchiveAQMSSched").submit(function(event){
                event.preventDefault();
                ArchiveAQMSSched();
            });

            $(document).on('click', '.aRestoreAQMSSched', function(){
                let AQMSSchedId = $(this).attr('aqms-sched-id');
                $("#txtRestoreAQMSSchedId").val(AQMSSchedId);
            });

            $("#formRestoreAQMSSched").submit(function(event){
                event.preventDefault();
                RestoreAQMSSched();
            });

            $(document).on('click', '.aEditAQMSSched', function(){
                let AQMSSchedId = $(this).attr('aqms-sched-id');
                $("#txtEditAQMSSchedId").val(AQMSSchedId);
                GetAQMSSchedByIdToEdit(AQMSSchedId);
            });

            $("#formEditAQMSSched").submit(function(event){
                event.preventDefault();
                EditAQMSSched();
            });
        });
    </script>
@endsection