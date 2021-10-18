@extends('layouts.master_layout')
@section('title', 'Audit Schedule')

@section('content')
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
                                        <div style="float: left;">
                                          Year : <input type="number" id="txtFilAQMSSchedYear" style="width: 60px;"> <button class="btn btn-success" id="btnFilAQMSSched"><i class="icon-search5"></i></button>
                                        </div>

                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddAQMSSchedModal" data-toggle="modal" data-target="#modalAddAQMSSched" data-keyboard="false"><i class=""></i> Add AQMS Schedule</button>
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
                                    <!-- ../ TUV PANEL -->

                                    <!-- CUSTOMER PANEL -->
                                    <div class="tab-pane fade" id="tabEMS" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        <div class="float-right" style="float: right;">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAddCustomerAudit" data-keyboard="false" id="btnShowAddCusCusAudModal">Add Customer Audit</button>
                                        </div>
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
                                    <div class="tab-pane fade" id="tabProduct" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="float-right" style="float: right;">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAddIntAudit" data-keyboard="false" id="btnShowAddIntAuditModal">Add Internal Audit</button>
                                        </div>
                                        <br><br>
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
                                    <div class="tab-pane fade" id="tabProcess" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                      <div class="float-right" style="float: right;">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAddSuppAudit" data-keyboard="false" id="btnShowAddSuppAuditModal">Add Supplier Audit</button>
                                        </div>
                                        <br><br>
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
                              <textarea class="form-control" cols="10" rows="5" id="txtAddAQMSSchedOrgUnit" name="organizational_unit"></textarea>
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
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
                    <div class="col-sm-6" style="overflow-y: auto; max-height: 500px;" id="divContainerAQMSAuditSchedYears">
                      <div class="divAQMSAuditSchedYear" aqms-sched-year-no="1">
                        <div class="form-body">
                            <div class="form-group">
                                <label for="projectinput1">Year</label>
                                <input type="number" name="year[]" class="form-control txtAddAQMSSchedYear" id="txtAddAQMSSchedYear">
                            </div>
                        </div>
                        <div class="form-body">
                            <div class="form-group">
                                <label for="projectinput1">Quarter</label>
                                <select class="form-control selAddAQMSSchedQuarter" id="selAddAQMSSchedQuarter" name="quarter[]" style="width: 100%;">
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
                                  <input type="date" name="plan_from[]" class="form-control txtAddAQMSSchedPlanFrom" id="txtAddAQMSSchedPlanFrom">
                                </div>
                                <div class="col-sm-6">
                                  <input type="date" name="plan_to[]" class="form-control txtAddAQMSSchedPlanTo" id="txtAddAQMSSchedPlanTo">
                                </div>
                            </div>
                        </div> <br>
                        <div class="form-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <label for="projectinput1">Actual</label>
                                </div>
                                <div class="col-sm-6">
                                  <input type="date" name="actual_from[]" class="form-control txtAddAQMSSchedActualFrom" id="txtAddAQMSSchedActualFrom">
                                </div>
                                <div class="col-sm-6">
                                  <input type="date" name="actual_to[]" class="form-control txtAddAQMSSchedActualTo" id="txtAddAQMSSchedActualTo">
                                </div>
                            </div>
                        </div> <br>
                        <div class="form-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <label for="projectinput1">Reschedule</label>
                                </div>
                                <div class="col-sm-6">
                                  <input type="date" name="reschedule_from[]" class="form-control txtAddAQMSSchedReSchedFrom" id="txtAddAQMSSchedReSchedFrom">
                                </div>
                                <div class="col-sm-6">
                                  <input type="date" name="reschedule_to[]" class="form-control txtAddAQMSSchedReSchedTo" id="txtAddAQMSSchedReSchedTo">
                                </div>
                            </div>
                        </div> <br>
                      </div>    
                    </div>
                    <div style="float: right;">
                      <button type="button" class="btn btn-success" id="btnAddNewAQMSAuditSchedYear">Add New</button>
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


    <!-- EMS AUDIT SCHEDULE MODALS -->
    <div class="modal fade text-xs-left" id="modalAddEMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddEMSSched">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add EMS Audit Schedule</h4>
              </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Process</label>
                              <textarea class="form-control" cols="10" rows="10" id="txtAddEMSSchedProc" name="process"></textarea>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Areas</label>
                              <select class="form-control select2 selAddEMSSchedAreas" id="selAddEMSSchedAreas" name="areas[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Process Owner</label>
                              <select class="form-control select2 selAddEMSSchedUsers" id="selAddEMSSchedProcOwner" name="process_owners[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Internal Auditors</label>
                              <select class="form-control select2 selAddEMSSchedUsers" id="selAddEMSSchedIntAuditors" name="internal_auditors[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Year</label>
                              <input type="number" name="year" class="form-control" id="txtAddEMSSchedYear">
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Quarter</label>
                              <select class="form-control" id="selAddEMSSchedQuarter" name="quarter" style="width: 100%;">
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
                                <input type="date" name="plan_from" class="form-control" id="txtAddEMSSchedPlanFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="plan_to" class="form-control" id="txtAddEMSSchedPlanTo">
                              </div>
                          </div>
                      </div> <br>
                      <div class="form-body">
                          <div class="form-group">
                              <div class="col-sm-12">
                                <label for="projectinput1">Actual</label>
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="actual_from" class="form-control" id="txtAddEMSSchedActualFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="actual_to" class="form-control" id="txtAddEMSSchedActualTo">
                              </div>
                          </div>
                      </div> <br>
                      <div class="form-body">
                          <div class="form-group">
                              <div class="col-sm-12">
                                <label for="projectinput1">Reschedule</label>
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="reschedule_from" class="form-control" id="txtAddEMSSchedReSchedFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="reschedule_to" class="form-control" id="txtAddEMSSchedReSchedTo">
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

    <!-- Modal Archive EMS Audit Schedule -->
    <div class="modal fade text-xs-left" id="modalArchiveEMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formArchiveEMSSched">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Archive EMS Audit Schedule</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to archive this selected EMS Audit Schedule?</p>
                    <input type="hidden" name="ems_audit_schedule_id" id="txtArchiveEMSSchedId">
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
    <div class="modal fade text-xs-left" id="modalRestoreEMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreEMSSched">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore EMS Audit Schedule</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected standard clause?</p>
                    <input type="hidden" name="ems_audit_schedule_id" id="txtRestoreEMSSchedId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <div class="modal fade text-xs-left" id="modalEditEMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditEMSSched">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit EMS Audit Schedule</h4>
              </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-body">
                          <div class="form-group">
                            <input type="text" name="ems_audit_schedule_id" id="txtEditEMSSchedId">
                              <label for="projectinput1">Process</label>
                              <textarea class="form-control" cols="10" rows="10" id="txtEditEMSSchedProc" name="process"></textarea>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Areas</label>
                              <select class="form-control select2 selEditEMSSchedAreas" id="selEditEMSSchedAreas" name="areas[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Process Owner</label>
                              <select class="form-control select2 selEditEMSSchedUsers" id="selEditEMSSchedProcOwner" name="process_owners[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Internal Auditors</label>
                              <select class="form-control select2 selEditEMSSchedUsers" id="selEditEMSSchedIntAuditors" name="internal_auditors[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Year</label>
                              <input type="number" name="year" class="form-control" id="txtEditEMSSchedYear">
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Quarter</label>
                              <select class="form-control" id="selEditEMSSchedQuarter" name="quarter" style="width: 100%;">
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
                                <input type="date" name="plan_from" class="form-control" id="txtEditEMSSchedPlanFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="plan_to" class="form-control" id="txtEditEMSSchedPlanTo">
                              </div>
                          </div>
                      </div> <br>
                      <div class="form-body">
                          <div class="form-group">
                              <div class="col-sm-12">
                                <label for="projectinput1">Actual</label>
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="actual_from" class="form-control" id="txtEditEMSSchedActualFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="actual_to" class="form-control" id="txtEditEMSSchedActualTo">
                              </div>
                          </div>
                      </div> <br>
                      <div class="form-body">
                          <div class="form-group">
                              <div class="col-sm-12">
                                <label for="projectinput1">Reschedule</label>
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="reschedule_from" class="form-control" id="txtEditEMSSchedReSchedFrom">
                              </div>
                              <div class="col-sm-6">
                                <input type="date" name="reschedule_to" class="form-control" id="txtEditEMSSchedReSchedTo">
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
@endsection

@section('js_content')
    <script type="text/javascript">
        // -------------------------- AQMS AUDITSCHEDULE --------------------------
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

            $("#btnAddNewAQMSAuditSchedYear").click(function(){
              let conAQMSSchedYear = $(".divAQMSAuditSchedYear");
              // alert(conAQMSSchedYear.length);
              // alert($(".divAQMSAuditSchedYear")[conAQMSSchedYear.length - 1]);
              let generatedAQMSSchedYearNo = $(".divAQMSAuditSchedYear:eq(" + (conAQMSSchedYear.length - 1) + ")").attr('aqms-sched-year-no');
              generatedAQMSSchedYearNo = parseInt(generatedAQMSSchedYearNo) + 1;

              // alert(generatedAQMSSchedYearNo);

              let htmlContent = '<div class="divAQMSAuditSchedYear" id="divAQMSAuditSchedYear' + generatedAQMSSchedYearNo + '" aqms-sched-year-no="' + generatedAQMSSchedYearNo + '">'; 
                    htmlContent += '<hr><div class="form-body">';
                            htmlContent += '<div class="form-group">';
                                htmlContent += '<label for="projectinput1">Year</label>';
                                htmlContent += '<button type="button" class="btn btn-danger btnRemoveAQMSAuditSchedYear" value="' + generatedAQMSSchedYearNo + '" style="float: right; padding: 1px 3px;" title="Remove"><i class="icon-remove"></i></button>';
                                htmlContent += '<input type="number" name="year[]" class="form-control txtAddAQMSSchedYear">';
                            htmlContent += '</div>';
                        htmlContent += '</div>';
                        htmlContent += '<div class="form-body">';
                            htmlContent += '<div class="form-group">';
                                htmlContent += '<label for="projectinput1">Quarter</label>';
                                htmlContent += '<select class="form-control selAddAQMSSchedQuarter" name="quarter[]" style="width: 100%;">';
                                  htmlContent += '<option value="1">Apr-June</option>';
                                  htmlContent += '<option value="2">July-Sept</option>';
                                  htmlContent += '<option value="3">Oct-Dec</option>';
                                  htmlContent += '<option value="4">Jan-Mar</option>';
                                htmlContent += '</select>';
                            htmlContent += '</div>';
                        htmlContent += '</div>';
                        htmlContent += '<div class="form-body">';
                            htmlContent += '<div class="form-group">';
                                htmlContent += '<div class="col-sm-12">';
                                  htmlContent += '<label for="projectinput1">Plan</label>';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="plan_from[]" class="form-control txtAddAQMSSchedPlanFrom">';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="plan_to[]" class="form-control txtAddAQMSSchedPlanTo">';
                                htmlContent += '</div>';
                            htmlContent += '</div>';
                        htmlContent += '</div> <br>';
                        htmlContent += '<div class="form-body">';
                            htmlContent += '<div class="form-group">';
                                htmlContent += '<div class="col-sm-12">';
                                  htmlContent += '<label for="projectinput1">Actual</label>';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="actual_from[]" class="form-control txtAddAQMSSchedActualFrom">';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="actual_to[]" class="form-control txtAddAQMSSchedActualTo">';
                                htmlContent += '</div>';
                            htmlContent += '</div>';
                        htmlContent += '</div> <br>';
                        htmlContent += '<div class="form-body">';
                            htmlContent += '<div class="form-group">';
                                htmlContent += '<div class="col-sm-12">';
                                  htmlContent += '<label for="projectinput1">Reschedule</label>';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="reschedule_from[]" class="form-control txtAddAQMSSchedReSchedFrom">';
                                htmlContent += '</div>';
                                htmlContent += '<div class="col-sm-6">';
                                  htmlContent += '<input type="date" name="reschedule_to[]" class="form-control txtAddAQMSSchedReSchedTo">';
                                htmlContent += '</div>';
                            htmlContent += '</div>';
                        htmlContent += '</div> <br>';
                      htmlContent += '</div>';

                    $("#divContainerAQMSAuditSchedYears").append(htmlContent);
                    $(".txtAddAQMSSchedYear:eq(" + (conAQMSSchedYear.length) + ")").focus();
            });
            
            $(document).on('click', '.btnRemoveAQMSAuditSchedYear', function(){
              let aqmsSchedYearNo = $(this).val();
              // alert(aqmsSchedYearNo);
              $("#divAQMSAuditSchedYear" + aqmsSchedYearNo).remove();
            });
        });


        // -------------------------- EMS AUDIT SCHEDULE --------------------------
        let dataTableEMSSchedules;
        let filEMSSchedYear = currDate.getFullYear();
        $(document).ready(function() {
            dataTableEMSSchedules = $("#tblEMSchedules").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_ems_sched",
                    "data": function (param){
                        // param.ems_audit_schedule_stat = 0;
                        param.year = filEMSSchedYear;
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
                    { "data" : "ems_audit_schedule_id" },
                    { "data" : "process" },
                    { "data" : "area_names" },
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
            });//end of dataTableEMSSchedules

            GetCboUsersByStat(1, $(".selAddEMSSchedUsers"));
            GetCboUsersByStat(1, $(".selEditEMSSchedUsers"));
            GetCboSelDepartmentByStat(1, $("#selAddEMSSchedAreas"));
            GetCboSelDepartmentByStat(1, $("#selEditEMSSchedAreas"));

            $("#txtFilEMSSchedYear").val(filEMSSchedYear);
            $("#thEMSYear").text('FY ' + filEMSSchedYear);

            $(".select2").select2();

            $("#btnFilEMSSched").click(function(){
              filEMSSchedYear = $("#txtFilEMSSchedYear").val();
              $("#thEMSYear").text('FY ' + filEMSSchedYear);
              dataTableEMSSchedules.draw();
            });

            $("#formAddEMSSched").submit(function(event){
                event.preventDefault();
                AddEMSSched();
            });

            $(document).on('click', '.aArchiveEMSSched', function(){
                let EMSSchedId = $(this).attr('ems-sched-id');
                $("#txtArchiveEMSSchedId").val(EMSSchedId);
            });

            $("#formArchiveEMSSched").submit(function(event){
                event.preventDefault();
                ArchiveEMSSched();
            });

            $(document).on('click', '.aRestoreEMSSched', function(){
                let EMSSchedId = $(this).attr('ems-sched-id');
                $("#txtRestoreEMSSchedId").val(EMSSchedId);
            });

            $("#formRestoreEMSSched").submit(function(event){
                event.preventDefault();
                RestoreEMSSched();
            });

            $(document).on('click', '.aEditEMSSched', function(){
                let EMSSchedId = $(this).attr('ems-sched-id');
                $("#txtEditEMSSchedId").val(EMSSchedId);
                GetEMSSchedByIdToEdit(EMSSchedId);
            });

            $("#formEditEMSSched").submit(function(event){
                event.preventDefault();
                EditEMSSched();
            });
        });
    </script>
@endsection