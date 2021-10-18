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
                                        <!-- <div style="float: left;">
                                          Year : <input type="number" id="txtFilAQMSSchedYear" style="width: 60px;"> <button class="btn btn-success" id="btnFilAQMSSched"><i class="icon-search5"></i></button>
                                        </div> -->
                                        <h3 style="text-align: center;">AQMS Audit Schedule</h3>
                                        <div style="float: left;" class="row">
                                          <div class="col-sm-2 table-responsive">
                                            <table class="table table-bordered">
                                              <thead>
                                                <tr>
                                                  <th colspan="3" style="text-align: center;">Legends</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td><span class="tag" style="background-color: #007bff;">Plan</span></td>
                                                  <td><span class="tag tag-warning">Actual</span></td>
                                                  <td><span class="tag tag-success">Reschedule</span></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddAQMSSchedModal" data-toggle="modal" data-target="#modalAddAQMSSched" data-keyboard="false"><i class=""></i> Add AQMS Schedule</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="tblAQMSchedules" width="100%">
                                                <thead>
                                                  <tr>
                                                    <th style="text-align: center; background-color: #abc8d9;" colspan="6">Organizational Unit</th>
                                                    <th style="text-align: center; background-color: #abc8d9;">Process Owners</th>
                                                    <th style="text-align: center; background-color: #abc8d9;">Internal Auditors</th>
                                                    <th style="text-align: center; background-color: #abc8d9;">Action</th>
                                                  </tr>
                                                    <tr>
                                                      <th>ID</th>
                                                      <th>Organizational Unit</th>
                                                      <th>Process Owners</th>
                                                      <th>Internal Auditors</th>
                                                      <th>Year</th>
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
                                        <h3 style="text-align: center;">EMS Audit Schedule</h3>
                                        <div style="float: left;" class="row">
                                          <div class="col-sm-2 table-responsive">
                                            <table class="table table-bordered">
                                              <thead>
                                                <tr>
                                                  <th colspan="3" style="text-align: center;">Legends</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td><span class="tag" style="background-color: #007bff;">Plan</span></td>
                                                  <td><span class="tag tag-warning">Actual</span></td>
                                                  <td><span class="tag tag-success">Reschedule</span></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddEMSSchedModal" data-toggle="modal" data-target="#modalAddEMSSched" data-keyboard="false"><i class=""></i> Add EMS Schedule</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="tblEMSchedules" width="100%">
                                                <thead>
                                                  <tr>
                                                    <th style="text-align: center; background-color: #abc8d9;" colspan="7">Process</th>
                                                    <th style="text-align: center; background-color: #abc8d9;">Areas</th>
                                                    <th style="text-align: center; background-color: #abc8d9;">Process Owners</th>
                                                    <th style="text-align: center; background-color: #abc8d9;">Internal Auditors</th>
                                                    <th style="text-align: center; background-color: #abc8d9;">Action</th>
                                                  </tr>
                                                    <tr>
                                                      <th>ID</th>
                                                      <th>Process</th>
                                                      <th>Areas</th>
                                                      <th>Process Owners</th>
                                                      <th>Internal Auditors</th>
                                                      <th>Year</th>
                                                      <th>Apr-June</th>
                                                      <th>July-Sept</th>
                                                      <th>Oct-Dec</th>
                                                      <th>Jan-Mar</th>
                                                      <th></th>
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
    <div class="modal fade text-xs-left" id="modalAddAQMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-lg custom-modal-xl" role="document">
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
                              <select class="form-control select2 selUsers selAddAQMSSchedUsers" id="selAddAQMSSchedProcOwner" name="process_owners[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Internal Auditors</label>
                              <select class="form-control select2 selUsers selAddAQMSSchedUsers" id="selAddAQMSSchedIntAuditors" name="internal_auditors[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div style="float: right;">
                      <button type="button" class="btn btn-success btn-sm" id="btnAddNewAQMSAuditSchedYear">Add New</button>
                  </div>
                  <br><br>

                  <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped table-sm" id="tblAddAQMSAuditSched">
                      <thead>
                        <th>Year</th>
                        <!-- <th>Quarter</th> -->
                        <th>Plan</th>
                        <th>Actual</th>
                        <th>Reschedule</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <tr class="trAddAQMSAuditSchedYear" aqms-sched-year-no="1">
                          <td><input type="number" name="year[]" class="form-control txtAddAQMSSchedYear" id="txtAddAQMSSchedYear1"></td>
                          <!-- <td>
                            <select class="form-control selAddAQMSSchedQuarter" id="selAddAQMSSchedQuarter1" name="quarter[]" style="width: 100%;">
                                <option value="1">Apr-June</option>
                                <option value="2">July-Sept</option>
                                <option value="3">Oct-Dec</option>
                                <option value="4">Jan-Mar</option>
                              </select>
                          </td> -->
                          <td>
                            <input type="date" name="plan_from[]" class="form-control txtAddAQMSSchedPlanFrom" id="txtAddAQMSSchedPlanFrom1"> 
                            <input type="date" name="plan_to[]" class="form-control txtAddAQMSSchedPlanTo" id="txtAddAQMSSchedPlanTo1">
                          </td>
                          <td>
                            <input type="date" name="actual_from[]" class="form-control txtAddAQMSSchedActualFrom" id="txtAddAQMSSchedActualFrom1"> 
                            <input type="date" name="actual_to[]" class="form-control txtAddAQMSSchedActualTo" id="txtAddAQMSSchedActualTo1">
                          </td>
                          <td>
                            <input type="date" name="reschedule_from[]" class="form-control txtAddAQMSSchedReSchedFrom" id="txtAddAQMSSchedReSchedFrom1"> 
                            <input type="date" name="reschedule_to[]" class="form-control txtAddAQMSSchedReSchedTo" id="txtAddAQMSSchedReSchedTo1">
                          </td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- <div style="float: right;">
                      <button type="button" class="btn btn-success btn-sm" id="btnAddNewAQMSAuditSchedYear">Add New</button>
                  </div>
                  <br><br> -->
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
    <div class="modal fade text-xs-left" id="modalArchiveAQMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
    <div class="modal fade text-xs-left" id="modalRestoreAQMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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

    <div class="modal fade text-xs-left" id="modalEditAQMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
                              <!-- <label for="projectinput1">Quarter</label> -->
                              <!-- <select class="form-control" id="selEditAQMSSchedQuarter" name="quarter" style="width: 100%;">
                                <option value="1">Apr-June</option>
                                <option value="2">July-Sept</option>
                                <option value="3">Oct-Dec</option>
                                <option value="4">Jan-Mar</option>
                              </select> -->
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
    <div class="modal fade text-xs-left" id="modalAddEMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
                    </div>
                    <div class="col-sm-6">
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Areas</label>
                              <select class="form-control select2 selAreas selAddEMSSchedAreas" id="selAddEMSSchedAreas" name="areas[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Process Owners</label>
                              <select class="form-control select2 selUsers selAddEMSSchedUsers" id="selAddEMSSchedProcOwner" name="process_owners[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Internal Auditors</label>
                              <select class="form-control select2 selUsers selAddEMSSchedUsers" id="selAddEMSSchedIntAuditors" name="internal_auditors[]" multiple="multiple" style="width: 100%;">
                                <!-- Code generated -->
                              </select>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br><br>

                  <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped" id="tblAddEMSAuditSched">
                      <thead>
                        <th>Year</th>
                        <!-- <th>Quarter</th> -->
                        <th>Plan</th>
                        <th>Actual</th>
                        <th>Reschedule</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <tr class="trAddEMSAuditSchedYear" ems-sched-year-no="1">
                          <td><input type="number" name="year[]" class="form-control txtAddEMSSchedYear" id="txtAddEMSSchedYear1"></td>
                          <!-- <td>
                            <select class="form-control selAddEMSSchedQuarter" id="selAddEMSSchedQuarter1" name="quarter[]" style="width: 100%;">
                                <option value="1">Apr-June</option>
                                <option value="2">July-Sept</option>
                                <option value="3">Oct-Dec</option>
                                <option value="4">Jan-Mar</option>
                              </select>
                          </td> -->
                          <td>
                            <input type="date" name="plan_from[]" class="form-control txtAddEMSSchedPlanFrom" id="txtAddEMSSchedPlanFrom1"> 
                            <input type="date" name="plan_to[]" class="form-control txtAddEMSSchedPlanTo" id="txtAddEMSSchedPlanTo1">
                          </td>
                          <td>
                            <input type="date" name="actual_from[]" class="form-control txtAddEMSSchedActualFrom" id="txtAddEMSSchedActualFrom1"> 
                            <input type="date" name="actual_to[]" class="form-control txtAddEMSSchedActualTo" id="txtAddEMSSchedActualTo1">
                          </td>
                          <td>
                            <input type="date" name="reschedule_from[]" class="form-control txtAddEMSSchedReSchedFrom" id="txtAddEMSSchedReSchedFrom1"> 
                            <input type="date" name="reschedule_to[]" class="form-control txtAddEMSSchedReSchedTo" id="txtAddEMSSchedReSchedTo1">
                          </td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div style="float: right;">
                      <button type="button" class="btn btn-success" id="btnAddNewEMSAuditSchedYear">Add New</button>
                  </div>
                  <br><br>
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
    <div class="modal fade text-xs-left" id="modalArchiveEMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
    <div class="modal fade text-xs-left" id="modalRestoreEMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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

    <div class="modal fade text-xs-left" id="modalEditEMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
                      <!-- <div class="form-body">
                          <div class="form-group">
                              <label for="projectinput1">Quarter</label>
                              <select class="form-control" id="selEditEMSSchedQuarter" name="quarter" style="width: 100%;">
                                <option value="1">Apr-June</option>
                                <option value="2">July-Sept</option>
                                <option value="3">Oct-Dec</option>
                                <option value="4">Jan-Mar</option>
                              </select>
                          </div>
                      </div> -->
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
      // COMMON JAVASCRIPT CODES
        $(document).ready(function(){
          $(".select2").select2();
          GetCboUsersByStat(1, $(".selUsers"));
          GetDepartmentByStat(1, $(".selAreas"));
        });

        // -------------------------- AQMS AUDITSCHEDULE --------------------------

        let dataTableAQMSSchedules;
        // let currDate = new Date();
        // let filAQMSSchedYear = currDate.getFullYear();
        $(document).ready(function() {
            let groupColumn = 0;
            dataTableAQMSSchedules = $("#tblAQMSchedules").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_aqms_sched",
                    "data": function (param){
                        // param.aqms_audit_schedule_stat = 0;
                        // param.year = filAQMSSchedYear;
                    }
                },
                "columns":[
                    { "data" : "aqms_audit_schedule.aqms_audit_schedule_id" },
                    { "data" : "aqms_audit_schedule.organizational_unit" },
                    { "data" : "aqms_audit_schedule.aqms_sched_process_owners", "render" : "[, ].process_owner_info.name" },
                    { "data" : "aqms_audit_schedule.aqms_sched_internal_auditors", "render" : "[, ].internal_auditor_info.name" },
                    { "data" : "year" },
                    { "data" : "label1" },
                    { "data" : "label2" },
                    { "data" : "label3" },
                    { "data" : "label4" },
                ],
                "columnDefs": [
                    { "visible": false, "targets": groupColumn },
                    { "visible": false, "targets": 1 },
                    { "visible": false, "targets": 2 },
                    { "visible": false, "targets": 3 }
                ],
                "order": [[ groupColumn, 'asc' ]],
                "displayLength": 25,
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;
         
                    api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {

                          let data = api.row(i).data();
                          let aqms_audit_schedule_id = data.aqms_audit_schedule.aqms_audit_schedule_id;
                          let organizational_unit = data.aqms_audit_schedule.organizational_unit;
                          let process_owners = data.aqms_audit_schedule.aqms_sched_process_owners[0].process_owner_info.name;
                          let internal_auditors = data.aqms_audit_schedule.aqms_sched_internal_auditors[0].internal_auditor_info.name;

                          let process_owner_names = '';

                          for(let index = 0; index < data.aqms_audit_schedule.aqms_sched_process_owners.length; index++){
                            process_owner_names += data.aqms_audit_schedule.aqms_sched_process_owners[index].process_owner_info.name;
                            if(index <= (data.aqms_audit_schedule.aqms_sched_process_owners.length - 2)){
                              process_owner_names += ', ';
                            }
                          }

                          let internal_auditor_names = '';

                          for(let index = 0; index < data.aqms_audit_schedule.aqms_sched_internal_auditors.length; index++){
                            internal_auditor_names += data.aqms_audit_schedule.aqms_sched_internal_auditors[index].internal_auditor_info.name;
                            if(index <= (data.aqms_audit_schedule.aqms_sched_internal_auditors.length - 2)){
                              internal_auditor_names += ', ';
                            }
                          }

                            $(rows).eq( i ).before(
                                '<tr class="group" style="background-color: #abc8d9;"><td colspan="2" style="text-align:center;"><b>' + organizational_unit + '</b></td> <td style="text-align:center;"><b>' + process_owner_names + '</b></td> <td style="text-align:center;"><b>' + internal_auditor_names + '</b></td> <td><button class="btn btn-primary">Edit</button></td></tr>'
                            );
         
                            last = group;
                        }
                    } );
                }
            });//end of dataTableAQMSSchedules


            $("#formAddAQMSSched").submit(function(event){
                event.preventDefault();
                AddAQMSSched();
            });

            $("#btnAddNewAQMSAuditSchedYear").click(function(){
                let noOfTrAQMSSchedYear = $(".trAddAQMSAuditSchedYear");
                let generatedAQMSSchedYearNo = $(".trAddAQMSAuditSchedYear:eq(" + (noOfTrAQMSSchedYear.length - 1) + ")").attr('aqms-sched-year-no');
                generatedAQMSSchedYearNo = parseInt(generatedAQMSSchedYearNo) + 1;
                
                let htmlContent = '';

                htmlContent += '<tr class="trAddAQMSAuditSchedYear" id="trAddAQMSAuditSchedYear' + generatedAQMSSchedYearNo + '" aqms-sched-year-no="' + generatedAQMSSchedYearNo + '">';
                  htmlContent += '<td><input type="number" name="year[]" class="form-control txtAddAQMSSchedYear" id="txtAddAQMSSchedYear' + generatedAQMSSchedYearNo + '"></td>';
                  // htmlContent += '<td>';
                  //   htmlContent += '<select class="form-control selAddAQMSSchedQuarter" id="selAddAQMSSchedQuarter' + generatedAQMSSchedYearNo + '" name="quarter[]" style="width: 100%;">';
                  //       htmlContent += '<option value="1">Apr-June</option>';
                  //       htmlContent += '<option value="2">July-Sept</option>';
                  //       htmlContent += '<option value="3">Oct-Dec</option>';
                  //       htmlContent += '<option value="4">Jan-Mar</option>';
                  //     htmlContent += '</select>';
                  // htmlContent += '</td>';
                  htmlContent += '<td>';
                    htmlContent += '<input type="date" name="plan_from[]" class="form-control txtAddAQMSSchedPlanFrom" id="txtAddAQMSSchedPlanFrom' + generatedAQMSSchedYearNo + '"> ';
                    htmlContent += '<input type="date" name="plan_to[]" class="form-control txtAddAQMSSchedPlanTo" id="txtAddAQMSSchedPlanTo' + generatedAQMSSchedYearNo + '">';
                  htmlContent += '</td>';
                  htmlContent += '<td>';
                    htmlContent += '<input type="date" name="actual_from[]" class="form-control txtAddAQMSSchedActualFrom" id="txtAddAQMSSchedActualFrom' + generatedAQMSSchedYearNo + '"> ';
                    htmlContent += '<input type="date" name="actual_to[]" class="form-control txtAddAQMSSchedActualTo" id="txtAddAQMSSchedActualTo' + generatedAQMSSchedYearNo + '">';
                  htmlContent += '</td>';
                  htmlContent += '<td>';
                    htmlContent += '<input type="date" name="reschedule_from[]" class="form-control txtAddAQMSSchedReSchedFrom" id="txtAddAQMSSchedReSchedFrom' + generatedAQMSSchedYearNo + '"> ';
                    htmlContent += '<input type="date" name="reschedule_to[]" class="form-control txtAddAQMSSchedReSchedTo" id="txtAddAQMSSchedReSchedTo' + generatedAQMSSchedYearNo + '">';
                  htmlContent += '</td>';
                  htmlContent += '<td><button type="button" class="btn btn-danger btnRemoveAQMSAuditSchedYear" value="' + generatedAQMSSchedYearNo + '" title="Remove"><i class="icon-remove"></i> Remove</button></td>';
                htmlContent += '</tr>';

                $("#tblAddAQMSAuditSched tbody").append(htmlContent);
                $("#txtAddAQMSSchedYear" + generatedAQMSSchedYearNo).focus();
            });
            
            $(document).on('click', '.btnRemoveAQMSAuditSchedYear', function(){
              let aqmsSchedYearNo = $(this).val();
              $("#trAddAQMSAuditSchedYear" + aqmsSchedYearNo).remove();
            });
        });

        let dataTableEMSSchedules;
        // let currDate = new Date();
        // let filAQMSSchedYear = currDate.getFullYear();
        $(document).ready(function() {
            let groupColumn = 0;
            dataTableEMSSchedules = $("#tblEMSchedules").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_ems_sched",
                    "data": function (param){
                        // param.ems_audit_schedule_stat = 0;
                        // param.year = filAQMSSchedYear;
                    }
                },
                "columns":[
                    { "data" : "ems_audit_schedule.ems_audit_schedule_id" },
                    { "data" : "ems_audit_schedule.process" },
                    { "data" : "ems_audit_schedule.ems_sched_areas", "render" : "[, ].area_info.department_name" },
                    { "data" : "ems_audit_schedule.ems_sched_process_owners", "render" : "[, ].process_owner_info.name" },
                    { "data" : "ems_audit_schedule.ems_sched_internal_auditors", "render" : "[, ].internal_auditor_info.name" },
                    { "data" : "year" },
                    { "data" : "label1" },
                    { "data" : "label2" },
                    { "data" : "label3" },
                    { "data" : "label4" },
                    { "data" : "blank" },
                ],
                "columnDefs": [
                    { "visible": false, "targets": groupColumn },
                    { "visible": false, "targets": 1 },
                    { "visible": false, "targets": 2 },
                    { "visible": false, "targets": 3 },
                    { "visible": false, "targets": 4 }
                ],
                "order": [[ groupColumn, 'asc' ]],
                "displayLength": 25,
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;
         
                    api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {

                          let data = api.row(i).data();
                          let ems_audit_schedule_id = data.ems_audit_schedule.ems_audit_schedule_id;
                          let process = data.ems_audit_schedule.process;
                          let process_owners = data.ems_audit_schedule.ems_sched_process_owners[0].process_owner_info.name;
                          let internal_auditors = data.ems_audit_schedule.ems_sched_internal_auditors[0].internal_auditor_info.name;
                          let areas = data.ems_audit_schedule.ems_sched_areas[0].area_info.department_name;

                          let process_owner_names = '';

                          for(let index = 0; index < data.ems_audit_schedule.ems_sched_process_owners.length; index++){
                            process_owner_names += data.ems_audit_schedule.ems_sched_process_owners[index].process_owner_info.name;
                            if(index <= (data.ems_audit_schedule.ems_sched_process_owners.length - 2)){
                              process_owner_names += ', ';
                            }
                          }

                          let internal_auditor_names = '';

                          for(let index = 0; index < data.ems_audit_schedule.ems_sched_internal_auditors.length; index++){
                            internal_auditor_names += data.ems_audit_schedule.ems_sched_internal_auditors[index].internal_auditor_info.name;
                            if(index <= (data.ems_audit_schedule.ems_sched_internal_auditors.length - 2)){
                              internal_auditor_names += ', ';
                            }
                          }

                          let area_names = '';

                          for(let index = 0; index < data.ems_audit_schedule.ems_sched_areas.length; index++){
                            area_names += data.ems_audit_schedule.ems_sched_areas[index].area_info.department_name;
                            if(index <= (data.ems_audit_schedule.ems_sched_areas.length - 2)){
                              area_names += ', ';
                            }
                          }

                            $(rows).eq( i ).before(
                                '<tr class="group" style="background-color: #abc8d9;"><td colspan="2" style="text-align:center;"><b>' + process + '</b></td> <td style="text-align:center;"><b>' + area_names + '</b></td> <td style="text-align:center;"><b>' + process_owner_names + '</b></td> <td style="text-align:center;"><b>' + internal_auditor_names + '</b></td> <td><button class="btn btn-primary">Edit</button></td></tr>'
                            );
         
                            last = group;
                        }
                    } );
                }
            });//end of dataTableEMSSchedules

             $("#formAddEMSSched").submit(function(event){
                event.preventDefault();
                AddEMSSched();
            });

            $("#btnAddNewEMSAuditSchedYear").click(function(){
                let noOfTrEMSSchedYear = $(".trAddEMSAuditSchedYear");
                let generatedEMSSchedYearNo = $(".trAddEMSAuditSchedYear:eq(" + (noOfTrEMSSchedYear.length - 1) + ")").attr('ems-sched-year-no');
                generatedEMSSchedYearNo = parseInt(generatedEMSSchedYearNo) + 1;
                
                let htmlContent = '';

                htmlContent += '<tr class="trAddEMSAuditSchedYear" id="trAddEMSAuditSchedYear' + generatedEMSSchedYearNo + '" ems-sched-year-no="' + generatedEMSSchedYearNo + '">';
                  htmlContent += '<td><input type="number" name="year[]" class="form-control txtAddEMSSchedYear" id="txtAddEMSSchedYear' + generatedEMSSchedYearNo + '"></td>';
                  // htmlContent += '<td>';
                  //   htmlContent += '<select class="form-control selAddEMSSchedQuarter" id="selAddEMSSchedQuarter' + generatedEMSSchedYearNo + '" name="quarter[]" style="width: 100%;">';
                  //       htmlContent += '<option value="1">Apr-June</option>';
                  //       htmlContent += '<option value="2">July-Sept</option>';
                  //       htmlContent += '<option value="3">Oct-Dec</option>';
                  //       htmlContent += '<option value="4">Jan-Mar</option>';
                  //     htmlContent += '</select>';
                  // htmlContent += '</td>';
                  htmlContent += '<td>';
                    htmlContent += '<input type="date" name="plan_from[]" class="form-control txtAddEMSSchedPlanFrom" id="txtAddEMSSchedPlanFrom' + generatedEMSSchedYearNo + '"> ';
                    htmlContent += '<input type="date" name="plan_to[]" class="form-control txtAddEMSSchedPlanTo" id="txtAddEMSSchedPlanTo' + generatedEMSSchedYearNo + '">';
                  htmlContent += '</td>';
                  htmlContent += '<td>';
                    htmlContent += '<input type="date" name="actual_from[]" class="form-control txtAddEMSSchedActualFrom" id="txtAddEMSSchedActualFrom' + generatedEMSSchedYearNo + '"> ';
                    htmlContent += '<input type="date" name="actual_to[]" class="form-control txtAddEMSSchedActualTo" id="txtAddEMSSchedActualTo' + generatedEMSSchedYearNo + '">';
                  htmlContent += '</td>';
                  htmlContent += '<td>';
                    htmlContent += '<input type="date" name="reschedule_from[]" class="form-control txtAddEMSSchedReSchedFrom" id="txtAddEMSSchedReSchedFrom' + generatedEMSSchedYearNo + '"> ';
                    htmlContent += '<input type="date" name="reschedule_to[]" class="form-control txtAddEMSSchedReSchedTo" id="txtAddEMSSchedReSchedTo' + generatedEMSSchedYearNo + '">';
                  htmlContent += '</td>';
                  htmlContent += '<td><button type="button" class="btn btn-danger btnRemoveEMSAuditSchedYear" value="' + generatedEMSSchedYearNo + '" title="Remove"><i class="icon-remove"></i> Remove</button></td>';
                htmlContent += '</tr>';

                $("#tblAddEMSAuditSched tbody").append(htmlContent);
                $("#txtAddEMSSchedYear" + generatedEMSSchedYearNo).focus();
            });
            
            $(document).on('click', '.btnRemoveEMSAuditSchedYear', function(){
              let emsSchedYearNo = $(this).val();
              $("#trAddEMSAuditSchedYear" + emsSchedYearNo).remove();
            });
        });
    </script>
@endsection