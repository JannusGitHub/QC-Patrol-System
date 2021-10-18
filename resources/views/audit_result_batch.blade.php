@extends('layouts.master_layout')
@section('title', 'Audit Result Batch')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Audit Result Batch</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Audit Result Batch
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
                                      <a class="nav-link active" id="linkTabTUV" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">TUV Audit Batch</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabCustomer" data-toggle="tab" href="#tabCustomerAuditBatch" aria-controls="link" aria-expanded="false">Customer Audit Batch</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabInternal" data-toggle="tab" href="#tabInternalAuditBatch" aria-controls="link" aria-expanded="false">Internal Audit Batch</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabSupplier" data-toggle="tab" href="#tabSupplierAuditBatch" aria-controls="link" aria-expanded="false">Supplier Audit Batch</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content px-1 pt-1">
                                    <!-- TUV BATCH PANEL -->
                                    <div role="tabpanel" class="tab-pane fade active in" id="active" aria-labelledby="active-tab" aria-expanded="true">
                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddTUVBatchModal" data-toggle="modal" data-target="#modalAddTUVBatch" data-keyboard="false"><i class=""></i> Add TUV Batch</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="tblTUVAuditBatch" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>TUV Batch ID</th>
                                                        <th>TUV Batch Name</th>
                                                        <th>No. of Results</th>
                                                        <th>Saving Status</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ TUV AUDIT BATCH PANEL -->

                                    <!-- CUSTOMER AUDIT BATCH PANEL -->
                                    <div class="tab-pane fade" id="tabCustomerAuditBatch" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddCusBatchModal" data-toggle="modal" data-target="#modalAddCusBatch" data-keyboard="false"><i class=""></i> Add Customer Batch</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="tblCusAuditBatch" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Customer Batch ID</th>
                                                        <th>Customer Batch Name</th>
                                                        <th>No. of Results</th>
                                                        <th>Saving Status</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ CUSTOMER AUDIT BATCH PANEL -->

                                    <!-- INTERNAL AUDIT BATCH PANEL -->
                                    <div class="tab-pane fade" id="tabInternalAuditBatch" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddIntBatchModal" data-toggle="modal" data-target="#modalAddIntBatch" data-keyboard="false"><i class=""></i> Add Internal Batch</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="tblIntAuditBatch" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Internal Batch ID</th>
                                                        <th>Internal Batch Name</th>
                                                        <th>No. of Results</th>
                                                        <th>Status</th>
                                                        <th>Saving Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ INTERNAL AUDIT BATCH PANEL -->

                                    <!-- SUPPLIER AUDIT BATCH PANEL -->
                                    <div class="tab-pane fade" id="tabSupplierAuditBatch" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddSuppBatchModal" data-toggle="modal" data-target="#modalAddSuppBatch" data-keyboard="false"><i class=""></i> Add Supplier Batch</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="tblSuppAuditBatch" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Supplier Batch ID</th>
                                                        <th>Supplier Batch Name</th>
                                                        <th>No. of Results</th>
                                                        <th>Status</th>
                                                        <th>Saving Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ SUPPLIER AUDIT BATCH PANEL -->
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

    <!-- TUV BATCH MODALS -->
    <div class="modal fade text-xs-left" id="modalAddTUVBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddTUVBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add TUV Batch</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                      <div class="form-group">
                          <label for="projectinput1">Batch Name</label>
                          <input type="text" id="txtAddTUVBatchName" class="form-control" placeholder="Batch Name" name="tuv_batch_name">
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date From</label>
                              <input type="date" id="dateAddTUVBatchDateFrom" class="form-control" name="audit_date_from">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date To</label>
                              <input type="date" id="dateAddTUVBatchDateTo" class="form-control" name="audit_date_to">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Issued Date</label>
                              <input type="date" id="dateAddTUVBatchIssuedDate" class="form-control" name="issued_date">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Due Date</label>
                              <input type="date" id="dateAddTUVBatchDueDate" class="form-control" name="due_date">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Department(s)</label>
                          <select class="form-control select2 selectDepartment" id="selAddTUVBatchDept" name="tuv_batch_department_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditor(s)</label>
                          <select class="form-control select2 selectUser" id="selAddTUVBatchAuditor" name="tuv_batch_auditor_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditee(s)</label>
                          <select class="form-control select2 selectUser" id="selAddTUVBatchAuditees" name="tuv_batch_auditee_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
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

    <!-- Modal Archive TUV Batch -->
    <div class="modal fade text-xs-left" id="modalArchiveTUVBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formArchiveTUVBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Archive TUV Batch</h4>
              </div>
              <div class="modal-body">
                    <input type="hidden" name="tuv_batch_id" id="txtArchiveTUVBatchId">
                    <p>Are you sure to archive this selected TUV Batch?</p>
                    <i><strong>Note! </strong> All results within the batch will be removed upon saving.</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Restore TUV Batch -->
    <div class="modal fade text-xs-left" id="modalRestoreTUVBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreTUVBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore TUV Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected TUV Batch?</p>
                    <input type="hidden" name="tuv_batch_id" id="txtRestoreTUVBatch">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit TUV Batch -->
    <div class="modal fade text-xs-left" id="modalEditTUVBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditTUVBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit TUV Batch</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                      <div class="form-group">
                        <label for="projectinput1">TUV Batch Name</label>
                        <input type="hidden" id="txtEditTUVBatchId" class="form-control" placeholder="TUV Batch ID" name="tuv_batch_id">
                        <input type="text" id="txtEditTUVBatchName" class="form-control" placeholder="TUV Batch Name" name="tuv_batch_name">
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date From</label>
                              <input type="date" id="dateEditTUVBatchDateFrom" class="form-control" name="audit_date_from">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date To</label>
                              <input type="date" id="dateEditTUVBatchDateTo" class="form-control" name="audit_date_to">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Issued Date</label>
                              <input type="date" id="dateEditTUVBatchIssuedDate" class="form-control" name="issued_date">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Due Date</label>
                              <input type="date" id="dateEditTUVBatchDueDate" class="form-control" name="due_date">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Department(s)</label>
                          <select class="form-control select2 selectDepartment" id="selEditTUVBatchDept" name="tuv_batch_department_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditor(s)</label>
                          <select class="form-control select2 selectUser" id="selEditTUVBatchAuditor" name="tuv_batch_auditor_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditee(s)</label>
                          <select class="form-control select2 selectUser" id="selEditTUVBatchAuditees" name="tuv_batch_auditee_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
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

    <!-- Modal TUV Batch Results -->
    <div class="modal fade text-xs-left" id="modalResultsTUVBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-xl" role="document" style="margin: 20px 50px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> TUV Batch Results</h4>
          </div>
            <div class="modal-body">
              <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tabTUVBatchRes" aria-controls="active" aria-expanded="true"><i class="icon-th-list"></i> Results In Batch</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tabTUVAudits" aria-controls="link" aria-expanded="false"><i class="icon-plus"></i> Add TUV Results</a>
                </li>
              </ul>
              <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane fade active in" id="tabTUVBatchRes" aria-labelledby="active-tab" aria-expanded="true">

                  <div class="row">
                    <div class="col-sm-6">
                      <label><strong>Batch Name : </strong></label>
                      <label id="lblViewTUVBatchName">- - -</label>
                      <br>
                      <label><strong>Department(s) : </strong></label>
                      <label id="lblViewTUVBatchDepartments">- - -</label>
                      <br>
                      <label><strong>Auditor(s) : </strong></label>
                      <label id="lblViewTUVBatchAuditors">- - -</label>
                      <br>
                      <label><strong>Auditee(s) : </strong></label>
                      <label id="lblViewTUVBatchAuditees">- - -</label>
                      <!-- <br>
                      <label><strong>No. of Result(s) : </strong></label>
                      <label id="lblViewTUVBatchNoOfRes">- - -</label> -->
                    </div>

                    <div class="col-sm-6">
                      <label><strong>Audit Date From : </strong></label>
                      <label id="lblViewTUVBatchDateFrom">- - -</label>
                      <br>
                      <label><strong>Audit Date To : </strong></label>
                      <label id="lblViewTUVBatchDateTo">- - -</label>
                      <br>
                      <label><strong>Issued Date : </strong></label>
                      <label id="lblViewTUVBatchIssuedDate">- - -</label>
                      <br>
                      <label><strong>Due Date : </strong></label>
                      <label id="lblViewTUVBatchDueDate">- - -</label>
                      <br>
                      <label><strong>Saving Status : </strong></label>
                      <label id="lblViewTUVBatchSavingStat">- - -</label>
                      <br>
                    </div>
                  </div>

                  <br><br>
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="tblTUVResInBatch" width="100%">
                          <thead>
                              <tr>
                                  <th>ISO Clause</th>
                                  <th>Statement of Finding(s)</th>
                                  <th>Root Cause</th>
                                  <th>Correction</th>
                                  <th>Containment</th>
                                  <th>Systematic</th>
                                  <th>Commitment Date</th>
                                  <th>In-Charge</th>
                                  <th>Audit Stat</th>
                                  <th>Sending Stat</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                      </table>
                      <br><br>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tabTUVAudits" aria-labelledby="active-tab" aria-expanded="true">
                  <div class="row">
                      <div class="col-sm-12">
                          <fieldset>
                              <legend style="text-align: center;">Filter TUV Audit Result</legend>
                              <form method="get" id="formGenerateTuvAuditResult">
                                <table>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_date" id="chkGenTuvRepAuditDate"> <label>Audit Date</label></td>
                                        <td><input type="date" name="audit_date_from" class="form-control" title="Date From" id="dateGenTuvRepDateFrom" disabled></td>
                                        <td><input type="date" name="audit_date_to" class="form-control" title="Date To" id="dateGenTuvRepDateTo" disabled></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_category" id="chkGenTuvRepAuditCat"> <label>Audit Category</label></td>
                                        <td>
                                            <select name="audit_category" class="form-control" id="selGenTuvRepAuditCat" disabled>
                                                <option value="ISO9001">ISO9001</option>
                                                <option value="IATF16949">IATF16949</option>
                                                <option value="ISO14001">ISO14001</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_purpose_of_audit" id="chkGenTuvRepPurOfAudit"> <label>Purpose of Audit</label></td>
                                        <td>
                                            <select name="purpose_of_audit" class="form-control" id="selGenTuvRepPurOfAudit" disabled>
                                                <option value="Surveillance">Surveillance</option>
                                                <option value="Renewal">Renewal</option>
                                                <option value="Certification">Certification</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_classification" id="chkGenTuvRepClassification"> <label>Rank / Classification</label></td>
                                        <td>
                                            <select name="classification" class="form-control" id="selGenTuvRepClassification" disabled>
                                                <option value="NC">NC</option>
                                                <option value="OFI">OFI</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_responsible_department" id="chkGenTuvRepResDept"> <label>Responsible Department</label></td>
                                        <td>
                                            <select name="responsible_department" class="form-control" id="selGenTuvRepResDept" disabled>
                                                <!-- Code generated -->
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_stat" id="chkGenTuvRepAuditStat"> <label>Audit Status</label></td>
                                        <td>
                                            <select name="audit_stat" class="form-control" id="selGenTuvRepAuditStat" disabled>
                                                <option value="1">For Improvement Plan</option>
                                                <option value="2">For Corrective Action</option>
                                                <option value="3">Close</option>
                                            </select>
                                        </td>
                                        <td style="text-align: center;">
                                             <button type="submit" class="btn btn-success"><i class="icon-refresh2" title="Generate"></i> Generate</button>
                                            <!-- <button type="button" class="btn btn-success" title="Export to XLS" id="btnExportTuv"><i class="icon-file-excel-o"></i> Export</button> -->
                                        </td>
                                    </tr>
                                </table>
                            </form>
                          </fieldset>  
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="tblTUVAuditResults" width="100%">
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
          <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Done</button>
            <button type="button" class="btn grey btn-outline-warning" id="btnSaveAsDraftTUVBatch">Save as Draft</button>
            <button type="button" class="btn grey btn-outline-success" id="btnSaveAndSendTUVBatch">Save & Send</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Add TUV Result Batch -->
    <div class="modal fade text-xs-left" id="modalAddToBatchTUVAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddTUVResInBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add TUV Audit Result In Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to add this selected Audit Result to batch?</p>
                    <input type="hidden" name="tuv_batch_id" id="txtAddBatchIdTUVResInBatch">
                    <input type="hidden" name="tuv_audit_id" id="txtAddTUVAuditInBatchId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Remove TUV Result Batch -->
    <div class="modal fade text-xs-left" id="modalRemoveToBatchTUVAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRemoveTUVResInBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Remove TUV Audit Result In Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to remove this selected Audit Result to batch?</p>
                    <input type="hidden" name="res_in_tuv_batch_id" id="txtRemoveResInTUVBatch">
                    <input type="hidden" name="tuv_audit_id" id="txtRemoveTUVAuditInBatchId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- TUV AUDIT MODALS -->
    <!-- Modal Add TUV Audit -->
    <div class="modal fade text-xs-left" id="modalViewTUVAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="get" id="formViewTUVAudit" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3">View TUV Audit</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Category</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditCat">Audit Category</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Purpose of Audit</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditPurpose">Purpose of Audit</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Rank / Classification</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditRankClass">Rank / Classification</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Date</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditDate">Audit Date</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Deadline for Submission</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditDeadSub">Deadline for Submission</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Actual Date of Submission</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditActDateSub">Actual Date of Submission</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Auditors</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditAuditors">Auditors</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Standard Clause</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditStanClause">Standard Clause</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Responsible Department</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditResDept">Responsible Department</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Statement of NC</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditStmtOfNC">Statement of NC</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Objective Evidence</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditObjEvi">Objective Evidence</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Corrective Action</label> <br>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgViewTUVAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <label for="projectinput1" id="lblViewTUVAuditCorrAct">Corrective Action</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Root Cause Analysis</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditRootCause">Root Cause Analysis</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Person In Charge</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditPerInCharge">Person In Charge</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Commitment Date</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditCommDate">Commitment Date</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Correction</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditCorrection">Correction</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Containment</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditContainment">Containment</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Systematic</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditSystematic">Systematic</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Sending Status</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditSendingStat">Sending Status</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Status</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditAuditStat">Audit Status</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Created By</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditCreatedBy">Created By</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Last Updated By</label> <br>
                                    <label for="projectinput1" id="lblViewTUVAuditLastUpdatedBy">Last Updated By</label>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Done</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <!-- ../ Modal View TUV Audit -->

    <!-- Modal Edit TUV Audit -->
    <div class="modal fade text-xs-left" id="modalEditTUVAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditTUVAudit" enctype="multipart/form-data">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3">Edit TUV Audit</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="hidden" id="txtEditTUVAuditId" class="form-control" placeholder="TUV Audit ID" name="tuv_audit_id">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Category</label>
                                    <select class="form-control" id="selEditTUVAuditCat" name="audit_category">
                                        <option value="ISO9001">ISO9001</option>
                                        <option value="IATF16949">IATF16949</option>
                                        <option value="ISO14001">ISO14001</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Purpose of Audit</label>
                                    <select class="form-control" id="selEditTUVAuditPurpose" name="purpose_of_audit">
                                        <option value="Surveillance">Surveillance</option>
                                        <option value="Renewal">Renewal</option>
                                        <option value="Certification">Certification</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Rank / Classification</label>
                                    <select class="form-control" id="selEditTUVAuditRankClass" name="classification">
                                        <option value="NC">NC</option>
                                        <option value="OFI">OFI</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Date</label>
                                    <input type="date" id="dateEditTUVAuditDate" class="form-control" name="audit_date" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Deadline for Submission</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" id="txtEditTUVAuditDeadSubDays" class="form-control" name="deadline_for_submission_days" value="0" min="0" max="15">
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" id="dateEditTUVAuditDeadSub" class="form-control" name="deadline_for_submission" value="<?php echo date('Y-m-d'); ?>">
                                            <input style="display: none;" type="date" id="dateEditTUVAuditCreatedAt" class="form-control" name="created_at">

                                            <input style="display: none;" type="date" id="dateEditTUVAuditCurrDeadSub" class="form-control" name="current_deadline_of_submission">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Actual Date of Submission</label>
                                    <input type="date" id="dateEditTUVAuditDeadSub" class="form-control" name="actual_date_of_submission" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Auditors</label>
                                    <input type="text" id="txtEditTUVAuditAuditors" class="form-control" placeholder="Auditors" name="auditors">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Standard Clause</label>
                                    <input type="text" id="txtEditTUVAuditStanClause" class="form-control" placeholder="Standard Clause" name="standard_clause">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Responsible Department</label>
                                    <select class="form-control select2" id="selEditTUVAuditResDept" name="responsible_department[]" style="width: 100%;" multiple="multiple">
                                        <!-- <option value="0" disabled selected>--Select Responsible Department--</option> -->
                                        <!-- code generated -->
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Statement of NC</label>
                                    <textarea class="form-control" cols="10" rows="10" id="txtEditTUVAuditStmtOfNC" name="statement_of_nc"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Objective Evidence</label>
                                    <textarea class="form-control" cols="10" rows="10" id="txtEditTUVAuditObjEvi" name="objective_evidence"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Corrective Action</label>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgEditTUVAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <input type="file" class="form-control" id="fileEditTUVAuditCorrAct" name="img_corrective_action" accept=".jpg, .jpeg, .png">
                                    <input type="hidden" id="txtEditTUVAuditCurrCorrAct" class="form-control" placeholder="Current Image Corrective Action" name="current_img_corrective_action">
                                    <textarea class="form-control" cols="10" rows="4" id="txtEditTUVAuditCorrAct" name="corrective_action"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Root Cause Analysis</label>
                                    <input type="text" id="txtEditTUVAuditRootCause" class="form-control" placeholder="Root Cause" name="root_cause_analysis">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Person In Charge</label>
                                    <input type="text" id="txtEditTUVAuditPerInCharge" class="form-control" placeholder="Person In Charge" name="person_in_charge">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Commitment Date</label>
                                    <input type="date" id="dateEditTUVAuditCommDate" class="form-control" name="commitment_date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Correction</label>
                                    <input type="text" id="txtEditTUVAuditCorrection" class="form-control" placeholder="Correction" name="correction">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Containment</label>
                                    <input type="text" id="txtEditTUVAuditContainment" class="form-control" placeholder="Containment" name="containment">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Systematic</label>
                                    <input type="text" id="txtEditTUVAuditSystematic" class="form-control" placeholder="Systematic" name="systematic">
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <!-- ../ Modal Edit TUV Audit -->


    <!-- CUSTOMER BATCH MODALS -->
    <div class="modal fade text-xs-left" id="modalAddCusBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddCusBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Customer Batch</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                      <div class="form-group">
                          <label for="projectinput1">Batch Name</label>
                          <input type="text" id="txtAddCusBatchName" class="form-control" placeholder="Batch Name" name="customer_batch_name">
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date From</label>
                              <input type="date" id="dateAddCusBatchDateFrom" class="form-control" name="audit_date_from">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date To</label>
                              <input type="date" id="dateAddCusBatchDateTo" class="form-control" name="audit_date_to">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Issued Date</label>
                              <input type="date" id="dateAddCusBatchIssuedDate" class="form-control" name="issued_date">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Due Date</label>
                              <input type="date" id="dateAddCusBatchDueDate" class="form-control" name="due_date">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Department(s)</label>
                          <select class="form-control select2 selectDepartment" id="selAddCusBatchDept" name="customer_batch_department_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditor(s)</label>
                          <select class="form-control select2 selectUser" id="selAddCusBatchAuditor" name="customer_batch_auditor_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditee(s)</label>
                          <select class="form-control select2 selectUser" id="selAddCusBatchAuditees" name="customer_batch_auditee_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
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

    <!-- Modal Archive Customer Batch -->
    <div class="modal fade text-xs-left" id="modalArchiveCusBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formArchiveCusBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Archive Customer Batch</h4>
              </div>
              <div class="modal-body">
                    <input type="hidden" name="customer_batch_id" id="txtArchiveCusBatchId">
                    <p>Are you sure to archive this selected Customer Batch?</p>
                    <i><strong>Note! </strong> All results within the batch will be removed upon saving.</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Restore Cus Batch -->
    <div class="modal fade text-xs-left" id="modalRestoreCusBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreCusBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore Customer Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected Customer Batch?</p>
                    <input type="hidden" name="customer_batch_id" id="txtRestoreCusBatch">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit Customer Batch -->
    <div class="modal fade text-xs-left" id="modalEditCusBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditCusBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit Customer Batch</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                      <div class="form-group">
                        <label for="projectinput1">Customer Batch Name</label>
                        <input type="hidden" id="txtEditCusBatchId" class="form-control" placeholder="Customer Batch ID" name="customer_batch_id">
                        <input type="text" id="txtEditCusBatchName" class="form-control" placeholder="Customer Batch Name" name="customer_batch_name">
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date From</label>
                              <input type="date" id="dateEditCusBatchDateFrom" class="form-control" name="audit_date_from">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date To</label>
                              <input type="date" id="dateEditCusBatchDateTo" class="form-control" name="audit_date_to">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Issued Date</label>
                              <input type="date" id="dateEditCusBatchIssuedDate" class="form-control" name="issued_date">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Due Date</label>
                              <input type="date" id="dateEditCusBatchDueDate" class="form-control" name="due_date">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Department(s)</label>
                          <select class="form-control select2 selectDepartment" id="selEditCusBatchDept" name="customer_batch_department_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditor(s)</label>
                          <select class="form-control select2 selectUser" id="selEditCusBatchAuditor" name="customer_batch_auditor_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditee(s)</label>
                          <select class="form-control select2 selectUser" id="selEditCusBatchAuditees" name="customer_batch_auditee_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
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

    <!-- Modal Customer Batch Results -->
    <div class="modal fade text-xs-left" id="modalResultsCusBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-xl" role="document" style="margin: 20px 50px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Customer Batch Results</h4>
          </div>
            <div class="modal-body">
              <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tabCusBatchRes" aria-controls="active" aria-expanded="true"><i class="icon-th-list"></i> Results In Batch</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tabCusAudits" aria-controls="link" aria-expanded="false"><i class="icon-plus"></i> Add Customer Results</a>
                </li>
              </ul>
              <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane fade active in" id="tabCusBatchRes" aria-labelledby="active-tab" aria-expanded="true">

                  <div class="row">
                    <div class="col-sm-6">
                      <label><strong>Batch Name : </strong></label>
                      <label id="lblViewCusBatchName">- - -</label>
                      <br>
                      <label><strong>Department(s) : </strong></label>
                      <label id="lblViewCusBatchDepartments">- - -</label>
                      <br>
                      <label><strong>Auditor(s) : </strong></label>
                      <label id="lblViewCusBatchAuditors">- - -</label>
                      <br>
                      <label><strong>Auditee(s) : </strong></label>
                      <label id="lblViewCusBatchAuditees">- - -</label>
                      <!-- <br>
                      <label><strong>No. of Result(s) : </strong></label>
                      <label id="lblViewCusBatchNoOfRes">- - -</label> -->
                    </div>

                    <div class="col-sm-6">
                      <label><strong>Audit Date From : </strong></label>
                      <label id="lblViewCusBatchDateFrom">- - -</label>
                      <br>
                      <label><strong>Audit Date To : </strong></label>
                      <label id="lblViewCusBatchDateTo">- - -</label>
                      <br>
                      <label><strong>Issued Date : </strong></label>
                      <label id="lblViewCusBatchIssuedDate">- - -</label>
                      <br>
                      <label><strong>Due Date : </strong></label>
                      <label id="lblViewCusBatchDueDate">- - -</label>
                      <br>
                      <label><strong>Saving Status : </strong></label>
                      <label id="lblViewCusBatchSavingStat">- - -</label>
                      <br>
                    </div>
                  </div>

                  <br><br>
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="tblCusResInBatch" width="100%">
                          <thead>
                              <tr>
                                  <th>Customer</th>
                                  <th>Statement of Finding(s)</th>
                                  <th>Illustration</th>
                                  <th>Improvement Action</th>
                                  <th>Commitment Date</th>
                                  <th>In-Charge</th>
                                  <th>Audit Stat</th>
                                  <th>Sending Stat</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                      </table>
                      <br><br>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tabCusAudits" aria-labelledby="active-tab" aria-expanded="true">
                  <div class="row">
                      <div class="col-sm-12">
                          <fieldset>
                            <legend style="text-align: center;">Filter Customer Audit Result</legend>
                            <form method="get" id="formGenerateCusReport">
                                <table>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_date" id="chkGenCusRepAuditDate"> <label>Audit Date</label></td>
                                        <td><input type="date" name="audit_date_from" class="form-control" title="Date From" id="dateGenCusRepDateFrom" disabled></td>
                                        <td><input type="date" name="audit_date_to" class="form-control" title="Date To" id="dateGenCusRepDateTo" disabled></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_classification" id="chkGenCusRepClassification"> <label>Rank / Classification</label></td>
                                        <td>
                                            <select name="classification" class="form-control" id="selGenCusRepClassification" disabled>
                                                <option value="Major NC">Major NC</option>
                                                <option value="NC">NC</option>
                                                <option value="OFI">OFI</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_responsible_group" id="chkGenCusRepResGroup"> <label>Responsible Group</label></td>
                                        <td>
                                            <select name="classification" class="form-control" id="selGenCusRepResGroup" disabled>
                                                <option value="PMI">PMI</option>
                                                <option value="YEC">YEC</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_responsible_department" id="chkGenCusRepResDept"> <label>Responsible Department</label></td>
                                        <td>
                                            <select name="responsible_department" class="form-control" id="selGenCusRepResDept" disabled>
                                                <!-- Code generated -->
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_customer_name" id="chkGenCusRepCusName"> <label>Customer Name</label></td>
                                        <td>
                                            <select name="customer_name" class="form-control select2" id="selGenCusRepCusName" style="width: 100%;" disabled>
                                                <!-- Code generated -->
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_stat" id="chkGenCusRepAuditStat"> <label>Audit Status</label></td>
                                        <td>
                                            <select name="audit_stat" class="form-control" id="selGenCusRepAuditStat" disabled>
                                                <option value="1">For Improvement Plan</option>
                                                <option value="2">For Corrective Action</option>
                                                <option value="3">Close</option>
                                            </select>
                                        </td>
                                        <td style="text-align: center;">
                                             <button type="submit" class="btn btn-success"><i class="icon-refresh2" title="Generate"></i> Generate</button>
                                            <!-- <button type="button" class="btn btn-success" title="Export to XLS" id="btnExportCus"><i class="icon-file-excel-o"></i> Export</button> -->
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </fieldset> 
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="tblCustomerAuditResults" width="100%">
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
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Done</button>
            <button type="button" class="btn grey btn-outline-warning" id="btnSaveAsDraftIntBatch">Save as Draft</button>
            <button type="button" class="btn grey btn-outline-success" id="btnSaveAndSendIntBatch">Save & Send</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Add Customer Result Batch -->
    <div class="modal fade text-xs-left" id="modalAddToBatchCusAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddCusResInBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Customer Audit Result In Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to add this selected Audit Result to batch?</p>
                    <input type="hidden" name="customer_batch_id" id="txtAddBatchIdCusResInBatch">
                    <input type="hidden" name="customer_audit_id" id="txtAddCusAuditInBatchId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Remove Customer Result Batch -->
    <div class="modal fade text-xs-left" id="modalRemoveToBatchCusAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRemoveCusResInBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Remove Customer Audit Result In Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to remove this selected Audit Result to batch?</p>
                    <input type="hidden" name="res_in_customer_batch_id" id="txtRemoveResInCusBatch">
                    <input type="hidden" name="customer_audit_id" id="txtRemoveCusAuditInBatchId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- CUSTOMER AUDIT MODALS -->
    <!-- Modal View Customer Audit -->
    <div class="modal fade text-xs-left" id="modalViewCusAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formViewCusAudit">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3">View Customer Audit</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Customer Name</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditCusName">Customer Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Auditors</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditAuditors">Auditors</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Process</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditProcess">Process</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Audit Date</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditDate">Audit Date</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Deadline of Submission</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditDeadSub">Deadline of Submission</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Actual Date of Submission</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditActDateSub">Actual Date of Submission</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Evaluation Item</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditEvalItem">Evaluation Item</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Classification / Rank</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditClassRank">Classification / Rank</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Responsible Group</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditResGroup">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Responsible Department</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditResDept">Responsible Department</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Statement of Finding(s)</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditResStmtOfFin">Statement of Finding(s)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Illustration / Photo</label></strong> <br>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgViewCusAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <label for="projectinput1" id="lblViewCusAuditIllu">Illustration / Photo</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Corrective Action</label></strong> <br>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgViewCusAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <label for="projectinput1" id="lblViewCusAuditCorrAct">Corrective Action</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Root Cause</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditRootCause">Root Cause</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Improvement Plan</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditImpPlan">Improvement Plan</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Commitment Date</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditCommDate">Commitment Date</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Person In Charge</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditPerInCharge">Person In Charge</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Sending Status</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditSendingStat">Sending Status</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Audit Status</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditStat">Audit Status</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Created By</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditCreatedBy">Created By</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Last Updated By</label></strong> <br>
                                    <label for="projectinput1" id="lblViewCusAuditLastUpdatedBy">Last Updated By</label>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Done</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <!-- ../ Modal View Customer Audit -->

    <!-- Modal Edit Customer Audit -->
    <div class="modal fade text-xs-left" id="modalEditCusAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditCusAudit">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3">Edit Customer Audit</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="txtEditCusAuditId" name="customer_audit_id">
                                    <label for="projectinput1">Customer Name</label>
                                    <input type="text" id="txtEditCusAuditCusName" class="form-control" placeholder="Customer Name" name="customer_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Auditors</label>
                                    <input type="text" id="txtEditCusAuditAuditors" class="form-control" placeholder="Auditors" name="auditors">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Process</label>
                                    <input type="text" id="txtEditCusAuditProcess" class="form-control" placeholder="Process" name="process">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput2">Audit Date</label>
                                    <input type="date" id="dateEditCusAuditDate" class="form-control" name="audit_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- <div class="form-group">
                                    <label for="projectinput1">Deadline of Submission</label>
                                    <input type="date" id="txtEditCusAuditDeadSub" class="form-control" name="deadline_of_submission">
                                </div> -->

                                <label for="projectinput1">Deadline of Submission</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" id="txtEditCusAuditDeadSubDays" class="form-control" name="deadline_of_submission_days" value="0" min="0" max="5">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" id="dateEditCusAuditDeadSub" class="form-control" name="deadline_of_submission" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <input style="display: none;" type="date" id="dateEditCusAuditCreatedAt" class="form-control" name="created_at">
                                    <input style="display: none;" type="date" id="dateEditCusAuditCurrDeadSub" class="form-control" name="current_deadline_of_submission">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Actual Date of Submission</label>
                                    <input type="date" id="dateEditCusAuditActDateSub" class="form-control" name="actual_date_of_submission">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Evaluation Item</label>
                                    <input type="text" id="txtEditCusAuditEvalItem" class="form-control" placeholder="Evaluation Item" name="evaluation_item">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Classification / Rank</label>
                                    <select class="form-control" id="selEditCusAuditClassRank" name="classification">
                                        <option disabled selected>--Select Classification--</option>
                                        <!-- code generated -->
                                        <option value="Major NC">Major NC</option>
                                        <option value="NC">NC</option>
                                        <option value="OFI">OFI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Responsible Group</label>
                                    <select class="form-control" id="selEditCusAuditResGroup" name="responsible_group">
                                        <option disabled selected>--Select Responsible Group--</option>
                                        <!-- code generated -->
                                        <option value="PMI">PMI</option>
                                        <option value="YEC">YEC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Responsible Department</label>
                                    <select class="form-control select2" id="selEditCusAuditResDept" name="responsible_department[]" style="width: 100%;" multiple="multiple">
                                        <!-- <option disabled selected>--Select Responsible Department--</option> -->
                                        <!-- code generated -->
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Statement of Finding(s)</label>
                                    <textarea class="form-control" cols="10" rows="10" id="txtEditCusAuditStmtOfFin" name="statement_of_findings" placeholder="Statement of Finding(s)"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Illustration / Photo</label>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgEditCusAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <input type="file" class="form-control" id="fileEditCusAuditIllu" name="img_illustration" accept=".jpg, .jpeg, .png">
                                    <textarea class="form-control" cols="10" rows="4" id="txtEditCusAuditIllu" name="illustration" placeholder="Illustration / Photo"></textarea>
                                    <input type="hidden" id="txtEditCusAuditCurrIllu" class="form-control" placeholder="Current Image Illustration" name="current_img_illustration">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Corrective Action</label>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgEditCusAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <input type="file" class="form-control" id="fileEditCusAuditCorrAct" name="img_corrective_action" accept=".jpg, .jpeg, .png">
                                    <textarea class="form-control" cols="10" rows="4" id="txtEditCusAuditCorrAct" name="corrective_action" placeholder="Corrective Action"></textarea>
                                    <input type="hidden" id="txtEditCusAuditCurrCorrAct" class="form-control" placeholder="Current Image Corrective Action" name="current_img_corrective_action">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Root Cause</label>
                                    <input type="text" id="txtEditCusAuditRootCause" class="form-control" placeholder="Root Cause" name="root_cause">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Improvement Plan</label>
                                    <input type="text" id="txtEditCusAuditImpPlan" class="form-control" placeholder="Improvement Plan" name="improvement_plan">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Commitment Date</label>
                                    <input type="date" id="txtEditCusAuditCommDate" class="form-control" name="commitment_date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Person In Charge</label>
                                    <input type="text" id="txtEditCusAuditPerInCharge" class="form-control" placeholder="Person In Charge" name="person_in_charge">
                                </div>
                            </div>
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
    <!-- ../ Modal Edit Customer Audit -->

    <!-- INTERNAL BATCH MODALS -->
    <div class="modal fade text-xs-left" id="modalAddIntBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddIntBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Internal Batch</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                      <div class="form-group">
                          <label for="projectinput1">Batch Name</label>
                          <input type="text" id="txtAddIntBatchName" class="form-control" placeholder="Batch Name" name="internal_batch_name">
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date From</label>
                              <input type="date" id="dateAddIntBatchDateFrom" class="form-control" name="audit_date_from">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date To</label>
                              <input type="date" id="dateAddIntBatchDateTo" class="form-control" name="audit_date_to">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Issued Date</label>
                              <input type="date" id="dateAddIntBatchIssuedDate" class="form-control" name="issued_date">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Due Date</label>
                              <input type="date" id="dateAddIntBatchDueDate" class="form-control" name="due_date">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Department(s)</label>
                          <select class="form-control select2 selectDepartment" id="selAddIntBatchDept" name="internal_batch_department_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditor(s)</label>
                          <select class="form-control select2 selectUser" id="selAddIntBatchAuditor" name="internal_batch_auditor_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditee(s)</label>
                          <select class="form-control select2 selectUser" id="selAddIntBatchAuditees" name="internal_batch_auditee_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
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

    <!-- Modal Archive Internal Batch -->
    <div class="modal fade text-xs-left" id="modalArchiveIntBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formArchiveIntBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Archive Internal Batch</h4>
              </div>
              <div class="modal-body">
                    <input type="hidden" name="internal_batch_id" id="txtArchiveIntBatchId">
                    <p>Are you sure to archive this selected Internal Batch?</p>
                    <i><strong>Note! </strong> All results within the batch will be removed upon saving.</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Restore Int Batch -->
    <div class="modal fade text-xs-left" id="modalRestoreIntBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreIntBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore Internal Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected Internal Batch?</p>
                    <input type="hidden" name="internal_batch_id" id="txtRestoreIntBatch">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit Internal Batch -->
    <div class="modal fade text-xs-left" id="modalEditIntBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditIntBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit Internal Batch</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                      <div class="form-group">
                        <label for="projectinput1">Internal Batch Name</label>
                        <input type="hidden" id="txtEditIntBatchId" class="form-control" placeholder="Internal Batch ID" name="internal_batch_id">
                        <input type="text" id="txtEditIntBatchName" class="form-control" placeholder="Internal Batch Name" name="internal_batch_name">
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date From</label>
                              <input type="date" id="dateEditIntBatchDateFrom" class="form-control" name="audit_date_from">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date To</label>
                              <input type="date" id="dateEditIntBatchDateTo" class="form-control" name="audit_date_to">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Issued Date</label>
                              <input type="date" id="dateEditIntBatchIssuedDate" class="form-control" name="issued_date">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Due Date</label>
                              <input type="date" id="dateEditIntBatchDueDate" class="form-control" name="due_date">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Department(s)</label>
                          <select class="form-control select2 selectDepartment" id="selEditIntBatchDept" name="internal_batch_department_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditor(s)</label>
                          <select class="form-control select2 selectUser" id="selEditIntBatchAuditor" name="internal_batch_auditor_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditee(s)</label>
                          <select class="form-control select2 selectUser" id="selEditIntBatchAuditees" name="internal_batch_auditee_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
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

    <!-- Modal Internal Batch Results -->
    <div class="modal fade text-xs-left" id="modalResultsIntBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-xl" role="document" style="margin: 20px 50px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Internal Batch Results</h4>
          </div>
            <div class="modal-body">
              <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tabIntBatchRes" aria-controls="active" aria-expanded="true"><i class="icon-th-list"></i> Results In Batch</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tabIntAudits" aria-controls="link" aria-expanded="false"><i class="icon-plus"></i> Add Internal Results</a>
                </li>
              </ul>
              <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane fade active in" id="tabIntBatchRes" aria-labelledby="active-tab" aria-expanded="true">

                  <div class="row">
                    <div class="col-sm-6">
                      <label><strong>Batch Name : </strong></label>
                      <label id="lblViewIntBatchName">- - -</label>
                      <br>
                      <label><strong>Department(s) : </strong></label>
                      <label id="lblViewIntBatchDepartments">- - -</label>
                      <br>
                      <label><strong>Auditor(s) : </strong></label>
                      <label id="lblViewIntBatchAuditors">- - -</label>
                      <br>
                      <label><strong>Auditee(s) : </strong></label>
                      <label id="lblViewIntBatchAuditees">- - -</label>
                      <!-- <br>
                      <label><strong>No. of Result(s) : </strong></label>
                      <label id="lblViewIntBatchNoOfRes">- - -</label> -->
                    </div>

                    <div class="col-sm-6">
                      <label><strong>Audit Date From : </strong></label>
                      <label id="lblViewIntBatchDateFrom">- - -</label>
                      <br>
                      <label><strong>Audit Date To : </strong></label>
                      <label id="lblViewIntBatchDateTo">- - -</label>
                      <br>
                      <label><strong>Issued Date : </strong></label>
                      <label id="lblViewIntBatchIssuedDate">- - -</label>
                      <br>
                      <label><strong>Due Date : </strong></label>
                      <label id="lblViewIntBatchDueDate">- - -</label>
                      <br>
                      <label><strong>Saving Status : </strong></label>
                      <label id="lblViewIntBatchSavingStat">- - -</label>
                      <br>
                    </div>
                  </div>

                  <br><br>
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="tblIntResInBatch" width="100%">
                          <thead>
                              <tr>
                                  <th>ISO Clause</th>
                                  <th>Statement of Finding(s)</th>
                                  <th>Illustration</th>
                                  <th>Improvement Action</th>
                                  <th>Commitment Date</th>
                                  <th>In-Charge</th>
                                  <th>Audit Stat</th>
                                  <th>Sending Stat</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                      </table>
                      <br><br>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tabIntAudits" aria-labelledby="active-tab" aria-expanded="true">
                  <div class="row">
                      <div class="col-sm-12">
                          <fieldset>
                            <legend style="text-align: center;">Filter Internal Audit Result</legend>
                            <form method="get" id="formGenerateIntReport">
                                <table>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_date" id="chkGenIntRepAuditDate"> <label>Audit Date</label></td>
                                        <td><input type="date" name="audit_date_from" class="form-control" title="Date From" id="dateGenIntRepDateFrom" disabled></td>
                                        <td><input type="date" name="audit_date_to" class="form-control" title="Date To" id="dateGenIntRepDateTo" disabled></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_category" id="chkGenIntRepAuditType"> <label>Audit Type</label></td>
                                        <td>
                                            <select name="audit_type" class="form-control" id="selGenIntRepAuditType" disabled>
                                                <option value="System">System</option>
                                                <option value="Process">Process</option>
                                                <option value="Product or Supplier Audit">Product or Supplier Audit</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_classification" id="chkGenIntRepClassification"> <label>Rank / Classification</label></td>
                                        <td>
                                            <select name="classification" class="form-control" id="selGenIntRepClassification" disabled>
                                                <option value="NC">NC</option>
                                                <option value="OFI">OFI</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_category_of_findings" id="chkGenIntRepCatOfFin"> <label>Category of Findings</label></td>
                                        <td>
                                            <select name="category_of_findings" class="form-control" id="selGenIntRepCatOfFin" disabled>
                                                <option value="RD">RD</option>
                                                <option value="DD">DD</option>
                                                <option value="PD">PD</option>
                                                <option value="SOP">SOP</option>
                                                <option value="Calibration">Calibration</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_responsible_department" id="chkGenIntRepResDept"> <label>Responsible Department</label></td>
                                        <td>
                                            <select name="responsible_department" class="form-control" id="selGenIntRepResDept" disabled>
                                                <!-- Code generated -->
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_report_control_no" id="chkGenIntRepCtrlNo"> <label>Audit Report Control No.</label></td>
                                        <td>
                                            <input type="text" class="form-control" name="audit_report_control_no" id="txtGenIntRepCtrlNo" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_stat" id="chkGenIntRepAuditStat"> <label>Audit Status</label></td>
                                        <td>
                                            <select name="audit_stat" class="form-control" id="selGenIntRepAuditStat" disabled>
                                                <option value="1">For Improvement Plan</option>
                                                <option value="2">For Corrective Action</option>
                                                <option value="3">Close</option>
                                            </select>
                                        </td>
                                        <td style="text-align: center;">
                                             <button type="submit" class="btn btn-success"><i class="icon-refresh2" title="Generate"></i> Generate</button>
                                            <!-- <button type="button" class="btn btn-success" title="Export to XLS" id="btnExportInt"><i class="icon-file-excel-o"></i> Export</button> -->
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </fieldset> 
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="tblInternalAuditResults" width="100%">
                          <thead>
                              <tr>
                                  <th>Audit Date</th>
                                  <th>Audit Type</th>
                                  <th>Auditors</th>
                                  <th>Report Control No.</th>
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
          <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Done</button>
            <button type="button" class="btn grey btn-outline-warning" id="btnSaveAsDraftIntBatch">Save as Draft</button>
            <button type="button" class="btn grey btn-outline-success" id="btnSaveAndSendIntBatch">Save & Send</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Add Internal Result Batch -->
    <div class="modal fade text-xs-left" id="modalAddToBatchIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddIntResInBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Internal Audit Result In Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to add this selected Audit Result to batch?</p>
                    <input type="hidden" name="internal_batch_id" id="txtAddBatchIdIntResInBatch">
                    <input type="hidden" name="internal_audit_id" id="txtAddIntAuditInBatchId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Remove Internal Result Batch -->
    <div class="modal fade text-xs-left" id="modalRemoveToBatchIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRemoveIntResInBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Remove Internal Audit Result In Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to remove this selected Audit Result to batch?</p>
                    <input type="hidden" name="res_in_internal_batch_id" id="txtRemoveResInIntBatch">
                    <input type="hidden" name="internal_audit_id" id="txtRemoveIntAuditInBatchId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- INTERNAL AUDIT MODALS -->
    <!-- Modal View Internal Audit -->
    <div class="modal fade text-xs-left" id="modalViewIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="get" id="formViewIntAudit">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3">View Internal Audit</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Audit Type</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditType">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Auditors</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditAuditors">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Auditees</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditAuditees">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Audit Date</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditDate">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Deadline of Submission</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditDeadSub">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Actual Date of Submission</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditActDateSub">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Audit Findings Issued Date</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditFindIssDate">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Audit Report Control No.</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditRepConNo">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">ISO / AITF Clause</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditIsoAitfClause">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Classification / Rank</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditClassRank">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Category Of Findings</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditCatOfFin">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Responsible Department</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditResDept">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Business Process / Section / Supplier Name</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditBusProcSecSupp">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Statement of Finding(s)</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditStmtOfFin">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Illustration / Photo</label></strong> <br>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgViewIntAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <label for="projectinput2" id="lblViewIntAuditIllu">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Corrective Action</label></strong> <br>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgViewIntAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <label for="projectinput2" id="lblViewIntAuditCorrAct">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Root Cause</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditRootCause">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Improvement Plan</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditImpPlan">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Commitment Date</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditCommDate">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Person In Charge</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditPerInCharge">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Created By</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditCreatedBy">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Last Updated By</label></strong> <br>
                                    <label for="projectinput2" id="lblViewIntAuditLastUpdatedBy">There</label>
                                </div>
                            </div>
                        </div>

                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Done</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <!-- ../ Modal View Internal Audit -->

    <!-- Modal Edit Internal Audit -->
    <div class="modal fade text-xs-left" id="modalEditIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditIntAudit">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3">Edit Internal Audit</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Type</label>
                                    <input type="hidden" class="form-control" name="internal_audit_id" id="txtEditIntAuditId">
                                    <select class="form-control" id="selEditIntAuditType" name="audit_type">
                                        <option value="0" disabled selected>--Select Audit Type--</option>
                                        <option value="System">System</option>
                                        <option value="Process">Process</option>
                                        <option value="Product">Product</option>
                                        <option value="Supplier">Supplier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Auditors</label>
                                    <input type="text" id="txtEditIntAuditAuditors" class="form-control" placeholder="Auditors" name="auditors">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Auditees</label>
                                    <input type="text" id="txtEditIntAuditAuditees" class="form-control" placeholder="Auditees" name="auditees">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput2">Audit Date</label>
                                    <input type="date" id="dateEditIntAuditDate" class="form-control" name="audit_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- <div class="form-group">
                                    <label for="projectinput1">Deadline of Submission</label>
                                    <input type="date" id="txtEditCusAuditDeadSub" class="form-control" name="deadline_of_submission">
                                </div> -->

                                <label for="projectinput1">Deadline of Submission</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" id="txtEditIntAuditDeadSubDays" class="form-control" name="deadline_of_submission_days" value="0" min="0" max="7">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" id="dateEditIntAuditDeadSub" class="form-control" name="deadline_of_submission" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <input type="date" style="display: none;" class="form-control" name="current_deadline_of_submission" id="dateEditIntAuditCurrDeadSub">
                                    <input type="date" style="display: none;" class="form-control" name="created_at" id="dateEditIntAuditCreatedAt">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Actual Date of Submission</label>
                                    <input type="date" id="dateEditIntAuditActDateSub" class="form-control" name="actual_date_of_submission">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Findings Issued Date</label>
                                    <input type="date" id="dateEditIntAuditFindIssDate" class="form-control" placeholder="Audit Findings Issued Date" name="audit_findings_issued_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Report Control No.</label>
                                    <input type="text" id="txtEditIntAuditRepContNo" class="form-control" placeholder="Audit Report Control No." name="audit_report_control_no">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">ISO / AITF Clause</label>
                                    <input type="text" class="form-control" id="txtEditIntAuditIsoAitfClause" name="iso_iatf_clause" placeholder="ISO / AITF Clause">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Classification / Rank</label>
                                    <select class="form-control" id="selEditIntAuditClassRank" name="classification">
                                        <option disabled selected>--Select Classification--</option>
                                        <option value="NC">NC</option>
                                        <option value="OFI">OFI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Category Of Findings</label>
                                    <select class="form-control" id="selEditIntAuditCatOfFind" name="category_of_findings">
                                        <option disabled selected>--Select Category Of Findings--</option>
                                        <option value="RD">RD</option>
                                        <option value="DD">DDI</option>
                                        <option value="PD">PD</option>
                                        <option value="SOP">SOP</option>
                                        <option value="Calibration">Calibration</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Responsible Department</label>
                                    <select class="form-control select2" id="selEditIntAuditResDept" name="responsible_department[]" style="width: 100%;" multiple="multiple">
                                        <!-- <option disabled selected>--Select Responsible Department--</option> -->
                                        <!-- code generated -->
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Business Process / Section / Supplier Name</label>
                                    <input type="text" id="txtEditIntAuditBusProcSecSupp" class="form-control" placeholder="Business Process / Section / Supplier Name" name="business_process">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Statement of Finding(s)</label>
                                    <textarea class="form-control" cols="10" rows="10" id="txtEditIntAuditStmtOfFin" name="statement_of_findings" placeholder="Statement of Finding(s)"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Illustration / Photo</label>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgEditIntAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <input type="file" class="form-control" id="fileEditIntAuditIllu" name="img_illustration" accept=".jpg, .jpeg, .png">
                                    <input type="hidden" name="current_img_illustration" id="txtEditIntAuditCurrIllu">
                                    <textarea class="form-control" cols="10" rows="4" id="txtEditIntAuditIllu" name="illustration" placeholder="Illustration / Photo"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Corrective Action</label>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgEditIntAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <input type="file" class="form-control" id="fileEditIntAuditCorrAct" name="img_corrective_action" accept=".jpg, .jpeg, .png">
                                    <input type="hidden" name="current_img_corrective_action" id="txtEditIntAuditCurrCorrAct">
                                    <textarea class="form-control" cols="10" rows="4" id="txtEditIntAuditCorrAct" name="corrective_action" placeholder="Corrective Action"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Root Cause</label>
                                    <input type="text" id="txtEditIntAuditRootCause" class="form-control" placeholder="Root Cause" name="root_cause">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Improvement Plan</label>
                                    <input type="text" id="txtEditIntAuditImpPlan" class="form-control" placeholder="Improvement Plan" name="improvement_plan">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Commitment Date</label>
                                    <input type="date" id="txtEditIntAuditCommDate" class="form-control" name="commitment_date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Person In Charge</label>
                                    <input type="text" id="txtEditIntAuditPerInCharge" class="form-control" placeholder="Person In Charge" name="person_in_charge">
                                </div>
                            </div>
                        </div>

                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <!-- ../ Modal Edit Internal Audit -->

    <!-- SUPPLIER BATCH MODALS -->
    <div class="modal fade text-xs-left" id="modalAddSuppBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddSuppBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Supplier Batch</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                      <div class="form-group">
                          <label for="projectinput1">Batch Name</label>
                          <input type="text" id="txtAddSuppBatchName" class="form-control" placeholder="Batch Name" name="supplier_batch_name">
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Customer Name</label>
                          <input type="text" id="txtAddSuppBatchSuppCus" class="form-control" placeholder="Customer Name" name="supplier_customer">
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date From</label>
                              <input type="date" id="dateAddSuppBatchDateFrom" class="form-control" name="audit_date_from">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date To</label>
                              <input type="date" id="dateAddSuppBatchDateTo" class="form-control" name="audit_date_to">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Issued Date</label>
                              <input type="date" id="dateAddSuppBatchIssuedDate" class="form-control" name="issued_date">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Due Date</label>
                              <input type="date" id="dateAddSuppBatchDueDate" class="form-control" name="due_date">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Department(s)</label>
                          <select class="form-control select2 selectDepartment" id="selAddSuppBatchDept" name="supplier_batch_department_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditor(s)</label>
                          <select class="form-control select2 selectUser" id="selAddSuppBatchAuditor" name="supplier_batch_auditor_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditee(s)</label>
                          <select class="form-control select2 selectUser" id="selAddSuppBatchAuditees" name="supplier_batch_auditee_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
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

    <!-- Modal Archive Supplier Batch -->
    <div class="modal fade text-xs-left" id="modalArchiveSuppBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formArchiveSuppBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Archive Supplier Batch</h4>
              </div>
              <div class="modal-body">
                    <input type="hidden" name="supplier_batch_id" id="txtArchiveSuppBatchId">
                    <p>Are you sure to archive this selected Supplier Batch?</p>
                    <i><strong>Note! </strong> All results within the batch will be removed upon saving.</i>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Restore Supplier Batch -->
    <div class="modal fade text-xs-left" id="modalRestoreSuppBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreSuppBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore Supplier Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected Supplier Batch?</p>
                    <input type="hidden" name="supplier_batch_id" id="txtRestoreSuppBatch">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit Supplier Batch -->
    <div class="modal fade text-xs-left" id="modalEditSuppBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditSuppBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit Supplier Batch</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                      <div class="form-group">
                        <label for="projectinput1">Supplier Batch Name</label>
                        <input type="hidden" id="txtEditSuppBatchId" class="form-control" placeholder="Supplier Batch ID" name="supplier_batch_id">
                        <input type="text" id="txtEditSuppBatchName" class="form-control" placeholder="Supplier Batch Name" name="supplier_batch_name">
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Customer Name</label>
                          <input type="text" id="txtEditSuppBatchSuppCus" class="form-control" placeholder="Customer Name" name="supplier_customer">
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date From</label>
                              <input type="date" id="dateEditSuppBatchDateFrom" class="form-control" name="audit_date_from">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Date To</label>
                              <input type="date" id="dateEditSuppBatchDateTo" class="form-control" name="audit_date_to">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Issued Date</label>
                              <input type="date" id="dateEditSuppBatchIssuedDate" class="form-control" name="issued_date">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="projectinput1">Due Date</label>
                              <input type="date" id="dateEditSuppBatchDueDate" class="form-control" name="due_date">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Department(s)</label>
                          <select class="form-control select2 selectDepartment" id="selEditSuppBatchDept" name="supplier_batch_department_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditor(s)</label>
                          <select class="form-control select2 selectUser" id="selEditSuppBatchAuditor" name="supplier_batch_auditor_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="projectinput1">Auditee(s)</label>
                          <select class="form-control select2 selectUser" id="selEditSuppBatchAuditees" name="supplier_batch_auditee_id[]" style="width: 100%;" multiple="multiple">
                              <!-- code generated -->
                          </select>
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

    <!-- Modal Supplier Batch Results -->
    <div class="modal fade text-xs-left" id="modalResultsSuppBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-xl" role="document" style="margin: 20px 50px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Supplier Batch Results</h4>
          </div>
            <div class="modal-body">
              <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tabSuppBatchRes" aria-controls="active" aria-expanded="true"><i class="icon-th-list"></i> Results In Batch</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tabSuppAudits" aria-controls="link" aria-expanded="false"><i class="icon-plus"></i> Add Supplier Results</a>
                </li>
              </ul>
              <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane fade active in" id="tabSuppBatchRes" aria-labelledby="active-tab" aria-expanded="true">

                  <div class="row">
                    <div class="col-sm-6">
                      <label><strong>Batch Name : </strong></label>
                      <label id="lblViewSuppBatchName">- - -</label>
                      <br>
                      <label><strong>Department(s) : </strong></label>
                      <label id="lblViewSuppBatchDepartments">- - -</label>
                      <br>
                      <label><strong>Auditor(s) : </strong></label>
                      <label id="lblViewSuppBatchAuditors">- - -</label>
                      <br>
                      <label><strong>Auditee(s) : </strong></label>
                      <label id="lblViewSuppBatchAuditees">- - -</label>
                      <br>
                      <label><strong>Customer : </strong></label>
                      <label id="lblViewSuppBatchCust">- - -</label>
                      <!-- <br>
                      <label><strong>No. of Result(s) : </strong></label>
                      <label id="lblViewSuppBatchNoOfRes">- - -</label> -->
                    </div>

                    <div class="col-sm-6">
                      <label><strong>Audit Date From : </strong></label>
                      <label id="lblViewSuppBatchDateFrom">- - -</label>
                      <br>
                      <label><strong>Audit Date To : </strong></label>
                      <label id="lblViewSuppBatchDateTo">- - -</label>
                      <br>
                      <label><strong>Issued Date : </strong></label>
                      <label id="lblViewSuppBatchIssuedDate">- - -</label>
                      <br>
                      <label><strong>Due Date : </strong></label>
                      <label id="lblViewSuppBatchDueDate">- - -</label>
                      <br>
                      <label><strong>Saving Status : </strong></label>
                      <label id="lblViewSuppBatchSavingStat">- - -</label>
                      <br>
                    </div>
                  </div>

                  <br><br>
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="tblSuppResInBatch" width="100%">
                          <thead>
                              <tr>
                                  <th>ISO Clause</th>
                                  <th>Statement of Finding(s)</th>
                                  <th>Illustration</th>
                                  <th>Improvement Action</th>
                                  <th>Commitment Date</th>
                                  <th>In-Charge</th>
                                  <th>Audit Stat</th>
                                  <th>Sending Stat</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                      </table>
                      <br><br>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tabSuppAudits" aria-labelledby="active-tab" aria-expanded="true">
                  <div class="row">
                      <div class="col-sm-12">
                          <fieldset>
                            <legend style="text-align: center;">Filter Supplier Audit Result</legend>
                            <form method="get" id="formGenerateSuppReport">
                                <table>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_date" id="chkGenSuppRepAuditDate"> <label>Audit Date</label></td>
                                        <td><input type="date" name="audit_date_from" class="form-control" title="Date From" id="dateGenSuppRepDateFrom" disabled></td>
                                        <td><input type="date" name="audit_date_to" class="form-control" title="Date To" id="dateGenSuppRepDateTo" disabled></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_category" id="chkGenSuppRepAuditType"> <label>Audit Type</label></td>
                                        <td>
                                            <select name="audit_type" class="form-control" id="selGenSuppRepAuditType" disabled>
                                                <option value="System">System</option>
                                                <option value="Process">Process</option>
                                                <option value="Product or Supplier Audit">Product or Supplier Audit</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_classification" id="chkGenSuppRepClassification"> <label>Rank / Classification</label></td>
                                        <td>
                                            <select name="classification" class="form-control" id="selGenSuppRepClassification" disabled>
                                                <option value="NC">NC</option>
                                                <option value="OFI">OFI</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_category_of_findings" id="chkGenSuppRepCatOfFin"> <label>Category of Findings</label></td>
                                        <td>
                                            <select name="category_of_findings" class="form-control" id="selGenSuppRepCatOfFin" disabled>
                                                <option value="RD">RD</option>
                                                <option value="DD">DD</option>
                                                <option value="PD">PD</option>
                                                <option value="SOP">SOP</option>
                                                <option value="Calibration">Calibration</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_responsible_department" id="chkGenSuppRepResDept"> <label>Responsible Department</label></td>
                                        <td>
                                            <select name="responsible_department" class="form-control" id="selGenSuppRepResDept" disabled>
                                                <!-- Code generated -->
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="has_audit_stat" id="chkGenSuppRepAuditStat"> <label>Audit Status</label></td>
                                        <td>
                                            <select name="audit_stat" class="form-control" id="selGenSuppRepAuditStat" disabled>
                                                <option value="1">For Improvement Plan</option>
                                                <option value="2">For Corrective Action</option>
                                                <option value="3">Close</option>
                                            </select>
                                        </td>
                                        <td style="text-align: center;">
                                             <button type="submit" class="btn btn-success"><i class="icon-refresh2" title="Generate"></i> Generate</button>
                                            <!-- <button type="button" class="btn btn-success" title="Export to XLS" id="btnExportSupp"><i class="icon-file-excel-o"></i> Export</button> -->
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </fieldset>
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="tblSupplierAuditResults" width="100%">
                          <thead>
                              <tr>
                                  <th>Audit Date</th>
                                  <th>Audit Type</th>
                                  <th>Auditors</th>
                                  <th>Report Control No.</th>
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
          <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Done</button>
            <button type="button" class="btn grey btn-outline-warning" id="btnSaveAsDraftSuppBatch">Save as Draft</button>
            <button type="button" class="btn grey btn-outline-success" id="btnSaveAndSendSuppBatch">Save & Send</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Add Supplier Result Batch -->
    <div class="modal fade text-xs-left" id="modalAddToBatchSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddSuppResInBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Supplier Audit Result In Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to add this selected Audit Result to batch?</p>
                    <input type="hidden" name="supplier_batch_id" id="txtAddBatchIdSuppResInBatch">
                    <input type="hidden" name="supplier_audit_id" id="txtAddSuppAuditInBatchId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Remove Supplier Result Batch -->
    <div class="modal fade text-xs-left" id="modalRemoveToBatchSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRemoveSuppResInBatch">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Remove Supplier Audit Result In Batch</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to remove this selected Audit Result to batch?</p>
                    <input type="hidden" name="res_in_supplier_batch_id" id="txtRemoveResInSuppBatch">
                    <input type="hidden" name="supplier_audit_id" id="txtRemoveSuppAuditInBatchId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- INTERNAL AUDIT MODALS -->
    <!-- Modal View Supplier Audit -->
    <div class="modal fade text-xs-left" id="modalViewSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="get" id="formViewSuppAudit">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3">View Supplier Audit</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Audit Type</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditType">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Auditors</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditAuditors">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Auditees</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditAuditees">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Audit Date</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditDate">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Deadline of Submission</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditDeadSub">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Actual Date of Submission</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditActDateSub">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Audit Findings Issued Date</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditFindIssDate">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Audit Report Control No.</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditRepConNo">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">ISO / AITF Clause</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditIsoAitfClause">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Classification / Rank</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditClassRank">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Category Of Findings</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditCatOfFin">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Responsible Department</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditResDept">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Business Process / Section / Supplier Name</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditBusProcSecSupp">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Statement of Finding(s)</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditStmtOfFin">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Illustration / Photo</label></strong> <br>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgViewSuppAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <label for="projectinput2" id="lblViewSuppAuditIllu">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Corrective Action</label></strong> <br>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgViewSuppAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <label for="projectinput2" id="lblViewSuppAuditCorrAct">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Root Cause</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditRootCause">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Improvement Plan</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditImpPlan">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Commitment Date</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditCommDate">There</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Person In Charge</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditPerInCharge">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Created By</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditCreatedBy">There</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><label for="projectinput1">Last Updated By</label></strong> <br>
                                    <label for="projectinput2" id="lblViewSuppAuditLastUpdatedBy">There</label>
                                </div>
                            </div>
                        </div>

                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Done</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <!-- ../ Modal View Supplier Audit -->

    <!-- Modal Edit Supplier Audit -->
    <div class="modal fade text-xs-left" id="modalEditSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditSuppAudit">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3">Edit Supplier Audit</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Type</label>
                                    <input type="hidden" class="form-control" name="supplier_audit_id" id="txtEditSuppAuditId">
                                    <select class="form-control" id="selEditSuppAuditType" name="audit_type">
                                        <option value="0" disabled selected>--Select Audit Type--</option>
                                        <option value="System">System</option>
                                        <option value="Process">Process</option>
                                        <option value="Product">Product</option>
                                        <option value="Supplier">Supplier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Auditors</label>
                                    <input type="text" id="txtEditSuppAuditAuditors" class="form-control" placeholder="Auditors" name="auditors">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Auditees</label>
                                    <input type="text" id="txtEditSuppAuditAuditees" class="form-control" placeholder="Auditees" name="auditees">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput2">Audit Date</label>
                                    <input type="date" id="dateEditSuppAuditDate" class="form-control" name="audit_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- <div class="form-group">
                                    <label for="projectinput1">Deadline of Submission</label>
                                    <input type="date" id="txtEditCusAuditDeadSub" class="form-control" name="deadline_of_submission">
                                </div> -->

                                <label for="projectinput1">Deadline of Submission</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" id="txtEditSuppAuditDeadSubDays" class="form-control" name="deadline_of_submission_days" value="0" min="0" max="7">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" id="dateEditSuppAuditDeadSub" class="form-control" name="deadline_of_submission" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <input type="date" style="display: none;" class="form-control" name="current_deadline_of_submission" id="dateEditSuppAuditCurrDeadSub">
                                    <input type="date" style="display: none;" class="form-control" name="created_at" id="dateEditSuppAuditCreatedAt">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Actual Date of Submission</label>
                                    <input type="date" id="dateEditSuppAuditActDateSub" class="form-control" name="actual_date_of_submission">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Findings Issued Date</label>
                                    <input type="date" id="dateEditSuppAuditFindIssDate" class="form-control" placeholder="Audit Findings Issued Date" name="audit_findings_issued_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Audit Report Control No.</label>
                                    <input type="text" id="txtEditSuppAuditRepContNo" class="form-control" placeholder="Audit Report Control No." name="audit_report_control_no">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">ISO / AITF Clause</label>
                                    <input type="text" class="form-control" id="txtEditSuppAuditIsoAitfClause" name="iso_iatf_clause" placeholder="ISO / AITF Clause">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Classification / Rank</label>
                                    <select class="form-control" id="selEditSuppAuditClassRank" name="classification">
                                        <option disabled selected>--Select Classification--</option>
                                        <option value="NC">NC</option>
                                        <option value="OFI">OFI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Category Of Findings</label>
                                    <select class="form-control" id="selEditSuppAuditCatOfFind" name="category_of_findings">
                                        <option disabled selected>--Select Category Of Findings--</option>
                                        <option value="RD">RD</option>
                                        <option value="DD">DDI</option>
                                        <option value="PD">PD</option>
                                        <option value="SOP">SOP</option>
                                        <option value="Calibration">Calibration</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Responsible Department</label>
                                    <select class="form-control select2" id="selEditSuppAuditResDept" name="responsible_department[]" style="width: 100%;" multiple="multiple">
                                        <!-- <option disabled selected>--Select Responsible Department--</option> -->
                                        <!-- code generated -->
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Business Process / Section / Supplier Name</label>
                                    <input type="text" id="txtEditSuppAuditBusProcSecSupp" class="form-control" placeholder="Business Process / Section / Supplier Name" name="business_process">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Statement of Finding(s)</label>
                                    <textarea class="form-control" cols="10" rows="10" id="txtEditSuppAuditStmtOfFin" name="statement_of_findings" placeholder="Statement of Finding(s)"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Illustration / Photo</label>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgEditSuppAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <input type="file" class="form-control" id="fileEditSuppAuditIllu" name="img_illustration" accept=".jpg, .jpeg, .png">
                                    <input type="hidden" name="current_img_illustration" id="txtEditSuppAuditCurrIllu">
                                    <textarea class="form-control" cols="10" rows="4" id="txtEditSuppAuditIllu" name="illustration" placeholder="Illustration / Photo"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Corrective Action</label>
                                    <div style="height: 80px;">
                                        <center>
                                            <img class="commonAuditImg" id="imgEditSuppAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                        </center>
                                    </div>
                                    <input type="file" class="form-control" id="fileEditSuppAuditCorrAct" name="img_corrective_action" accept=".jpg, .jpeg, .png">
                                    <input type="hidden" name="current_img_corrective_action" id="txtEditSuppAuditCurrCorrAct">
                                    <textarea class="form-control" cols="10" rows="4" id="txtEditSuppAuditCorrAct" name="corrective_action" placeholder="Corrective Action"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Root Cause</label>
                                    <input type="text" id="txtEditSuppAuditRootCause" class="form-control" placeholder="Root Cause" name="root_cause">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Improvement Plan</label>
                                    <input type="text" id="txtEditSuppAuditImpPlan" class="form-control" placeholder="Improvement Plan" name="improvement_plan">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Commitment Date</label>
                                    <input type="date" id="txtEditSuppAuditCommDate" class="form-control" name="commitment_date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="projectinput1">Person In Charge</label>
                                    <input type="text" id="txtEditSuppAuditPerInCharge" class="form-control" placeholder="Person In Charge" name="person_in_charge">
                                </div>
                            </div>
                        </div>

                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <!-- ../ Modal Supplier Supplier Audit -->

    <!-- COMMON MODAL -->
    <div class="modal fade text-xs-left" id="modalViewCommonAuditImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" style="background-color: rgb(51, 51, 51, 0.8);">
        <div style="float: right; margin-right: 25px; margin-top: 10px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
          </button>
        </div>
        <div class="modal-dialog modal-lg" role="document">
          <center>
              <img id="imgPrevCommonAuditImage" style="min-width: 450px; min-height: 300px; max-width: 860px; max-height: 900px;">
            </center>
        </div>
      </div>
@endsection

@section('js_content')
    <script type="text/javascript">
        // COMMON JAVSCRIPT CODES
        $(document).ready(function(){
          $("body").css({"overflow-y" : "auto"});
          $(document).on("hidden.bs.modal", function () {
              $("body").addClass("modal-open");
              $("body").css({"overflow-y" : "auto"});
          });
          $(document).on("show.bs.modal", function () {
              $("body").css({"overflow-y" : "hidden"});
          });

          $(document).on('click', '.commonAuditImg', function(){
            $("#modalViewCommonAuditImage").modal('show');
            $("#imgPrevCommonAuditImage").attr('src', $(this).attr('src'));
          });

          $(".select2").select2();
          GetDepartmentByStat(1, $(".selectDepartment"));
          GetCboUsersByStat(1, $(".selectUser"));

          LoadDepartmentByStatInArray(1, [$("#selEditTUVAuditResDept"), $("#selEditCusAuditResDept"), $("#selEditIntAuditResDept"), $("#selEditSuppAuditResDept")]);
        });


        // -------------------------- TUV BATCH --------------------------
        let dataTableTUVBatch;
        $(document).ready(function() {
            dataTableTUVBatch = $("#tblTUVAuditBatch").DataTable({
                "order": [[ 0, "desc" ]],
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_tuv_batch_by_stat",
                    "data": function (param){
                        param.tuv_batch_stat = 0;
                    }
                },
                
                "columns":[
                    { "data" : "tuv_batch_id" },
                    { "data" : "tuv_batch_name" },
                    { "data" : "result_in_tuv_count" },
                    { "data" : "saving_stat_label" },
                    { "data" : "label1" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
            });//end of dataTableTUVBatch

            $("#formAddTUVBatch").submit(function(event){
                event.preventDefault();
                AddTUVBatch();
            });

            $(document).on('click', '.aArchiveTUVBatch', function(){
                let tuvBatchId = $(this).attr('tuv-batch-id');
                $("#txtArchiveTUVBatchId").val(tuvBatchId);
            });

            $("#formArchiveTUVBatch").submit(function(event){
                event.preventDefault();
                ArchiveTUVBatch();
            });

            $(document).on('click', '.aRestoreTUVBatch', function(){
                let tuvBatchId = $(this).attr('tuv-batch-id');
                $("#txtRestoreTUVBatch").val(tuvBatchId);
            });

            $("#formRestoreTUVBatch").submit(function(event){
                event.preventDefault();
                RestoreTUVBatch();
            });

            $(document).on('click', '.aEditTUVBatch', function(){
                let tuvBatchId = $(this).attr('tuv-batch-id');
                $("#txtEditTUVBatchId").val(tuvBatchId);
                GetTUVBatchByIdToEdit(tuvBatchId);
            });

            $("#formEditTUVBatch").submit(function(event){
                event.preventDefault();
                EditTUVBatch();
            });

            $(document).on('click', '.aResultsTUVBatch', function(){
                let tuvAuditBatchId = $(this).attr('tuv-batch-id');
                $("#txtAddBatchIdTUVResInBatch").val(tuvAuditBatchId);
                tuv_batch_id = tuvAuditBatchId;
                dataTableTUVResInBatch.draw();
                dataTableTUVAudits.draw();
                GetTUVBatchByIdToView(tuvAuditBatchId);
            });

            $(document).on('click', '.aAddToBatchTUVAudit', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                $("#txtAddTUVAuditInBatchId").val(tuvAuditId);
            });

            $("#formAddTUVResInBatch").submit(function(event){
                event.preventDefault();
                AddTUVResInBatch();
            });

            $(document).on('click', '.aRemoveToBatchTUVAudit', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                let resInTUVBatch = $(this).attr('res-in-tuv-batch-id');
                $("#txtRemoveResInTUVBatch").val(resInTUVBatch);
                $("#txtRemoveTUVAuditInBatchId").val(tuvAuditId);
            });

            $("#formRemoveTUVResInBatch").submit(function(event){
                event.preventDefault();
                RemoveTUVResInBatch();
            });
        });

        // ------------------ TUV AUDIT ------------------
        let dataTableTUVAudits;

        let date_from = 0;
        let date_to = 0;
        let audit_category = 0;
        let purpose_of_audit = 0;
        let classification = 0;
        let standard_clause = 0;
        let responsible_department = 0;
        let audit_stat = 0;

        let dataTableTUVResInBatch;
        let tuv_batch_id = 0;

        $(document).ready(function(){
          $.fn.dataTable.ext.errMode = 'none'; //this is required to avoid alerting datatable error message
          
          dataTableTUVAudits = $("#tblTUVAuditResults").on( 'error.dt', function ( e, settings, techNote, message ) {
            Swal({
                  position: 'top-end',
                  type: 'error',
                  title: 'TUV DataTable Failed!',
                  showConfirmButton: false,
                  timer: 1500,
                  customClass: 'swal-wide',
              });
          }).DataTable({
              "processing" : false,
              "serverSide" : true,
              "ajax" : {
                  url: "view_single_tuv_audit",
                  "data": function (param){
                      param.date_from = date_from;
                      param.date_to = date_to;
                      param.audit_category = audit_category;
                      param.purpose_of_audit = purpose_of_audit;
                      param.classification = classification;
                      param.standard_clause = standard_clause;
                      param.responsible_department = responsible_department;
                      param.audit_stat = audit_stat;
                  }
              },            
              "columns":[
                  { "data" : "formatted_audit_date" },
                  { "data" : "audit_category" },
                  { "data" : "auditors" },
                  { "data" : "label1" },
                  // { "data" : "audit_stat" },
                  { "data" : "label2" },
                  { "data" : "action1", orderable:false, searchable:false }
              ],
          });//end of dataTableTUVAudits

          dataTableTUVResInBatch = $("#tblTUVResInBatch").on( 'error.dt', function ( e, settings, techNote, message ) {
              Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Result TUV In Batch DataTable Failed!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            }).DataTable({
                  "processing" : false,
                  "serverSide" : true,
                  "ajax" : {
                      url: "view_tuv_audit_in_batch",
                      "data": function (param){
                        param.tuv_batch_id = tuv_batch_id;
                      }
                  },
                  "columns":[
                      { "data" : "tuv_audit.standard_clause" },
                      { "data" : "tuv_audit.statement_of_nc" },
                      { "data" : "tuv_audit.root_cause_analysis" },
                      { "data" : "tuv_audit.correction" },
                      { "data" : "tuv_audit.containment" },
                      { "data" : "tuv_audit.systematic" },
                      { "data" : "tuv_audit.commitment_date" },
                      { "data" : "tuv_audit.person_in_charge" },
                      { "data" : "audit_stat_label" },
                      { "data" : "sending_stat_label" },
                      { "data" : "action1", orderable:false, searchable:false }
                  ],
                  "columnDefs": [ 
                    {
                      "targets": [2, 3, 4, 5, 6, 7],
                      "data": null,
                      "defaultContent": "- - -"
                    } 
                  ]
              });//end of dataTableTUVAudits

          GetDepartmentByStat(1, $("#selGenTuvRepResDept"));

          $(document).on('click', '.aViewTUVAudit', function(){
              let tuvAuditId = $(this).attr('tuv-id');
              GetTUVAuditByIdToView(tuvAuditId);
          });

          $(document).on('click', '.aEditTUV', function(){
              let tuvAuditId = $(this).attr('tuv-id');
              $("#txtEditTUVAuditId").val(tuvAuditId);
              GetTUVAuditByIdToEdit(tuvAuditId);
          });

          $("#btnSaveAsDraftTUVBatch").click(function(){
            TUVBatchSaveByStat(tuv_batch_id, 1, "{{ csrf_token() }}");
          });

          $("#btnSaveAndSendTUVBatch").click(function(){
            TUVBatchSaveByStat(tuv_batch_id, 2, "{{ csrf_token() }}");
          });

          $("#formEditTUVAudit").submit(function(event){
            event.preventDefault();
            $.ajax({
                url: 'edit_tuv_audit',
                method: 'post',
                data: new FormData(this),
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    // alert('Loading...');
                },
                success: function(JsonObject){
                    // alert(JSON.stringify(JsonObject));
                    if(JsonObject['result'] == 1){
                        $("#modalEditTUVAudit").modal('hide');
                        $("#formEditTUVAudit")[0].reset();
                        $('#imgEditCusAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                        $('#imgEditTUVAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                        dataTableTUVAudits.draw();

                        $("#dateEditTUVAuditDate").removeClass('border-danger');
                        $("#dateEditTUVAuditDate").removeAttr('title');
                        $("#dateEditTUVAuditDeadSub").removeClass('border-danger');
                        $("#dateEditTUVAuditDeadSub").removeAttr('title');
                        $("#dateEditTUVAuditDeadSub").removeClass('border-danger');
                        $("#dateEditTUVAuditDeadSub").removeAttr('title');
                        $("#txtEditTUVAuditAuditors").removeClass('border-danger');
                        $("#txtEditTUVAuditAuditors").removeAttr('title');
                        $("#txtEditTUVAuditStanClause").removeClass('border-danger');
                        $("#txtEditTUVAuditStanClause").removeAttr('title');
                        $("#txtEditTUVAuditStmtOfNC").removeClass('border-danger');
                        $("#txtEditTUVAuditStmtOfNC").removeAttr('title');
                        $("#selEditTUVAuditResDept").removeClass('border-danger');
                        $("#selEditTUVAuditResDept").removeAttr('title');
                        $("#txtEditTUVAuditObjEvi").removeClass('border-danger');
                        $("#txtEditTUVAuditObjEvi").removeAttr('title');
                        $("#txtEditTUVAuditCorrAct").removeClass('border-danger');
                        $("#txtEditTUVAuditCorrAct").removeAttr('title');

                    }
                    else if(JsonObject['result'] == 0){
                        // alert('Failed');
                        Swal({
                            position: 'top-end',
                            type: 'error',
                            title: 'Updating Failed!',
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: 'swal-wide',
                        });
                    }
                    else if(JsonObject['upload_result'] == 0 && JsonObject['upload_result'] != 0){
                        Swal({
                            position: 'top-end',
                            type: 'error',
                            title: 'Uploading Failed!',
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: 'swal-wide',
                        });
                    }

                    if(JsonObject['error']['audit_date'] != undefined){
                        $("#dateEditTUVAuditDate").addClass('border-danger');
                        $("#dateEditTUVAuditDate").attr('title', JsonObject['error']['audit_date']);
                    }
                    else{
                        $("#dateEditTUVAuditDate").removeClass('border-danger');
                        $("#dateEditTUVAuditDate").removeAttr('title');
                    }

                    if(JsonObject['error']['deadline_for_submission'] != undefined){
                        $("#dateEditTUVAuditDeadSub").addClass('border-danger');
                        $("#dateEditTUVAuditDeadSub").attr('title', JsonObject['error']['deadline_for_submission']);
                    }
                    else{
                        $("#dateEditTUVAuditDeadSub").removeClass('border-danger');
                        $("#dateEditTUVAuditDeadSub").removeAttr('title');
                    }

                    if(JsonObject['error']['actual_date_of_submission'] != undefined){
                        $("#dateEditTUVAuditDeadSub").addClass('border-danger');
                        $("#dateEditTUVAuditDeadSub").attr('title', JsonObject['error']['actual_date_of_submission']);
                    }
                    else{
                        $("#dateEditTUVAuditDeadSub").removeClass('border-danger');
                        $("#dateEditTUVAuditDeadSub").removeAttr('title');
                    }

                    if(JsonObject['error']['auditors'] != undefined){
                        $("#txtEditTUVAuditAuditors").addClass('border-danger');
                        $("#txtEditTUVAuditAuditors").attr('title', JsonObject['error']['auditors']);
                    }
                    else{
                        $("#txtEditTUVAuditAuditors").removeClass('border-danger');
                        $("#txtEditTUVAuditAuditors").removeAttr('title');
                    }

                    if(JsonObject['error']['standard_clause'] != undefined){
                        $("#txtEditTUVAuditStanClause").addClass('border-danger');
                        $("#txtEditTUVAuditStanClause").attr('title', JsonObject['error']['standard_clause']);
                    }
                    else{
                        $("#txtEditTUVAuditStanClause").removeClass('border-danger');
                        $("#txtEditTUVAuditStanClause").removeAttr('title');
                    }

                    if(JsonObject['error']['statement_of_nc'] != undefined){
                        $("#txtEditTUVAuditStmtOfNC").addClass('border-danger');
                        $("#txtEditTUVAuditStmtOfNC").attr('title', JsonObject['error']['statement_of_nc']);
                    }
                    else{
                        $("#txtEditTUVAuditStmtOfNC").removeClass('border-danger');
                        $("#txtEditTUVAuditStmtOfNC").removeAttr('title');
                    }

                    if(JsonObject['error']['responsible_department'] != undefined){
                        $("#selEditTUVAuditResDept").addClass('border-danger');
                        $("#selEditTUVAuditResDept").attr('title', JsonObject['error']['responsible_department']);
                    }
                    else{
                        $("#selEditTUVAuditResDept").removeClass('border-danger');
                        $("#selEditTUVAuditResDept").removeAttr('title');
                    }

                    if(JsonObject['error']['objective_evidence'] != undefined){
                        $("#txtEditTUVAuditObjEvi").addClass('border-danger');
                        $("#txtEditTUVAuditObjEvi").attr('title', JsonObject['error']['objective_evidence']);
                    }
                    else{
                        $("#txtEditTUVAuditObjEvi").removeClass('border-danger');
                        $("#txtEditTUVAuditObjEvi").removeAttr('title');
                    }

                    if(JsonObject['error']['corrective_action'] != undefined){
                        $("#txtEditTUVAuditCorrAct").addClass('border-danger');
                        $("#txtEditTUVAuditCorrAct").attr('title', JsonObject['error']['corrective_action']);
                    }
                    else{
                        $("#txtEditTUVAuditCorrAct").removeClass('border-danger');
                        $("#txtEditTUVAuditCorrAct").removeAttr('title');
                    }

                    // if(JsonObject['error']['img_corrective_action'] != undefined){
                    //     $("#fileEditTUVAuditCorrAct").addClass('border-danger');
                    //     $("#fileEditTUVAuditCorrAct").attr('title', JsonObject['error']['img_corrective_action']);
                    // }
                    // else{
                    //     $("#fileEditTUVAuditCorrAct").removeClass('border-danger');
                    //     $("#fileEditTUVAuditCorrAct").removeAttr('title');
                    // }
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        });

          $("#formGenerateTuvAuditResult").submit(function(event){
              event.preventDefault();
              if($("#dateGenTuvRepDateFrom").attr('disabled') != 'disabled' && $("#dateGenTuvRepDateFrom").val() != '') {
                  date_from = $("#dateGenTuvRepDateFrom").val();
              }
              else{
                  date_from = 0;
              }

              if($("#dateGenTuvRepDateTo").attr('disabled') != 'disabled' && $("#dateGenTuvRepDateTo").val() != '') {
                  date_to = $("#dateGenTuvRepDateTo").val();
              }
              else{
                  date_to = 0;
              }

              if($("#selGenTuvRepAuditCat").attr('disabled') != 'disabled' && $("#selGenTuvRepAuditCat").val() != '') {
                  audit_category = $("#selGenTuvRepAuditCat").val();
              }
              else{
                  audit_category = 0;
              }

              if($("#selGenTuvRepPurOfAudit").attr('disabled') != 'disabled' && $("#selGenTuvRepPurOfAudit").val() != '') {
                  purpose_of_audit = $("#selGenTuvRepPurOfAudit").val();
              }
              else{
                  purpose_of_audit = 0;
              }

              if($("#selGenTuvRepClassification").attr('disabled') != 'disabled' && $("#selGenTuvRepClassification").val() != '') {
                  classification = $("#selGenTuvRepClassification").val();
              }
              else{
                  classification = 0;
              }

              if($("#selGenTuvRepResDept").attr('disabled') != 'disabled' && $("#selGenTuvRepResDept").val() != '' && $("#selGenTuvRepResDept").val() != null) {
                  responsible_department = $("#selGenTuvRepResDept").val();
              }
              else{
                  responsible_department = 0;
              }

              if($("#selGenTuvRepAuditStat").attr('disabled') != 'disabled' && $("#selGenTuvRepAuditStat").val() != '' && $("#selGenTuvRepAuditStat").val() != null) {
                  audit_stat = $("#selGenTuvRepAuditStat").val();
              }
              else {
                  audit_stat = 0;
              }
              // alert(audit_category);
              dataTableTUVAudits.draw();
          });

          $("#chkGenTuvRepAuditDate").click(function() {
                if($(this).prop('checked')) {
                    // alert("Active");
                    $("#dateGenTuvRepDateFrom").removeAttr('disabled');
                    $("#dateGenTuvRepDateTo").removeAttr('disabled');
                }
                else{
                    // alert("Remove");
                    $("#dateGenTuvRepDateFrom").prop('disabled', 'disabled');
                    $("#dateGenTuvRepDateTo").prop('disabled', 'disabled');
                    $("#dateGenTuvRepDateFrom").val('');
                    $("#dateGenTuvRepDateTo").val('');
                }
            });

            $("#chkGenTuvRepAuditCat").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenTuvRepAuditCat").removeAttr('disabled');
                }
                else{
                    $("#selGenTuvRepAuditCat").prop('disabled', 'disabled');
                    $("#selGenTuvRepAuditCat").val('ISO9001');
                }
            });

            $("#chkGenTuvRepPurOfAudit").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenTuvRepPurOfAudit").removeAttr('disabled');
                }
                else{
                    $("#selGenTuvRepPurOfAudit").prop('disabled', 'disabled');
                    $("#selGenTuvRepPurOfAudit").val('Surveillance');
                }
            });

            $("#chkGenTuvRepClassification").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenTuvRepClassification").removeAttr('disabled');
                }
                else{
                    $("#selGenTuvRepClassification").prop('disabled', 'disabled');
                    $("#selGenTuvRepClassification").val('NC');
                }
            });

            $("#chkGenTuvRepResDept").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenTuvRepResDept").removeAttr('disabled');
                }
                else{
                    $("#selGenTuvRepResDept").prop('disabled', 'disabled');
                }
            });

            $("#chkGenTuvRepAuditStat").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenTuvRepAuditStat").removeAttr('disabled');
                }
                else{
                    $("#selGenTuvRepAuditStat").prop('disabled', 'disabled');
                    $("#selGenTuvRepAuditStat").val('1');
                }
            });

          function GetTUVAuditByIdToView(tuvAuditId){
            $.ajax({
                url: 'get_tuv_audit_by_id',
                method: 'get',
                data: {
                    'tuv_audit_id': tuvAuditId
                },
                dataType: 'json',
                beforeSend: function(){
                    $("#imgViewTUVAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    
                },
                success: function(JsonObject){
                    $("#lblViewTUVAuditCat").text(JsonObject['tuv_audits'][0]['audit_category']);
                    $("#lblViewTUVAuditPurpose").text(JsonObject['tuv_audits'][0]['purpose_of_audit']);
                    $("#lblViewTUVAuditRankClass").text(JsonObject['tuv_audits'][0]['classification']);
                    $("#lblViewTUVAuditDate").text(JsonObject['tuv_audits'][0]['audit_date']);
                    $("#lblViewTUVAuditDeadSub").text(JsonObject['tuv_audits'][0]['deadline_for_submission_days'] + " Day(s) - " + JsonObject['tuv_audits'][0]['deadline_for_submission']);
                    $("#lblViewTUVAuditActDateSub").text(JsonObject['tuv_audits'][0]['actual_date_of_submission']);
                    $("#lblViewTUVAuditAuditors").text(JsonObject['tuv_audits'][0]['auditors']);
                    $("#lblViewTUVAuditStanClause").text(JsonObject['tuv_audits'][0]['standard_clause']);
                    let resDept = "";
                    for(let index = 0; index < JsonObject['tuv_audits'][0]['tuv_departments'].length; index++){
                        resDept += JsonObject['tuv_audits'][0]['tuv_departments'][index]['departments'][0]['department_name'];
                        
                        if(index < JsonObject['tuv_audits'][0]['tuv_departments'].length - 1){
                            resDept += ", ";
                        }
                    }
                    $("#lblViewTUVAuditResDept").text(resDept);
                    // $("#lblViewTUVAuditResDept").text(JsonObject['tuv_audits'][0]['department'][0]['department_name']);
                    $("#lblViewTUVAuditStmtOfNC").text(JsonObject['tuv_audits'][0]['statement_of_nc']);
                    $("#lblViewTUVAuditObjEvi").text(JsonObject['tuv_audits'][0]['objective_evidence']);
                    
                    if(JsonObject['tuv_audits'][0]['img_corrective_action'] != ""){
                        var imglink = "{{ asset('public/storage/audit_result_images/tuv/img') }}";
                        imglink = imglink.replace("img", JsonObject['tuv_audits'][0]['img_corrective_action']);
                        $("#imgViewTUVAuditCorrAct").attr('src', imglink);
                    }
                    else{
                        $("#imgViewTUVAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }

                    $("#lblViewTUVAuditCorrAct").text(JsonObject['tuv_audits'][0]['corrective_action']);

                    if(JsonObject['tuv_audits'][0]['root_cause_analysis'] != null){
                        $("#lblViewTUVAuditRootCause").text(JsonObject['tuv_audits'][0]['root_cause_analysis']);
                    }
                    else{
                        $("#lblViewTUVAuditRootCause").text("---");
                    }
                    if(JsonObject['tuv_audits'][0]['person_in_charge'] != null){
                        $("#lblViewTUVAuditPerInCharge").text(JsonObject['tuv_audits'][0]['person_in_charge']);
                    }
                    else{
                        $("#lblViewTUVAuditPerInCharge").text("---");
                    }
                    if(JsonObject['tuv_audits'][0]['commitment_date'] != null){
                        $("#lblViewTUVAuditCommDate").text(JsonObject['tuv_audits'][0]['commitment_date']);
                    }
                    else{
                        $("#lblViewTUVAuditCommDate").text("---");
                    }
                    if(JsonObject['tuv_audits'][0]['correction'] != null){
                        $("#lblViewTUVAuditCorrection").text(JsonObject['tuv_audits'][0]['correction']);
                    }
                    else{
                        $("#lblViewTUVAuditCorrection").text("---");
                    }
                    if(JsonObject['tuv_audits'][0]['containment'] != null){
                        $("#lblViewTUVAuditContainment").text(JsonObject['tuv_audits'][0]['containment']);
                    }
                    else{
                        $("#lblViewTUVAuditContainment").text("---");
                    }
                    if(JsonObject['tuv_audits'][0]['systematic'] != null){
                        $("#lblViewTUVAuditSystematic").text(JsonObject['tuv_audits'][0]['systematic']);
                    }
                    else{
                        $("#lblViewTUVAuditSystematic").text("---");
                    }

                    if(JsonObject['tuv_audits'][0]['sending_stat'] == 1){
                        $("#lblViewTUVAuditSendingStat").text('Pending');
                    }
                    else{
                        $("#lblViewTUVAuditSendingStat").text('Done');
                    }
                    if(JsonObject['tuv_audits'][0]['audit_stat'] == 1){
                        $("#lblViewTUVAuditAuditStat").text('For Improvement Plan');
                    }
                    else if(JsonObject['tuv_audits'][0]['audit_stat'] == 2){
                        $("#lblViewTUVAuditAuditStat").text('For Corrective Action');
                    }
                    else{
                        $("#lblViewTUVAuditAuditStat").text('Closed');
                    }

                    $("#lblViewTUVAuditCreatedBy").text(JsonObject['tuv_audits'][0]['user_created_by']['name']);
                    $("#lblViewTUVAuditLastUpdatedBy").text(JsonObject['tuv_audits'][0]['user_last_updated_by']['name']);
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
          }

          function GetTUVAuditByIdToEdit(tuvAuditId){
              $.ajax({
                  url: 'get_tuv_audit_by_id',
                  method: 'get',
                  data: {
                      'tuv_audit_id': tuvAuditId
                  },
                  dataType: 'json',
                  beforeSend: function(){
                      // $("#imgViewTUVAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                  },
                  success: function(JsonObject){
                      $("#selEditTUVAuditCat").val(JsonObject['tuv_audits'][0]['audit_category']);
                      $("#selEditTUVAuditPurpose").val(JsonObject['tuv_audits'][0]['purpose_of_audit']);
                      $("#selEditTUVAuditRankClass").val(JsonObject['tuv_audits'][0]['classification']);
                      $("#dateEditTUVAuditDate").val(JsonObject['tuv_audits'][0]['audit_date']);
                      $("#dateEditTUVAuditDeadSub").val(JsonObject['tuv_audits'][0]['deadline_for_submission']);
                      // $("#dateEditTUVAuditDeadSub").val(JsonObject['tuv_audits'][0]['actual_date_of_submission']);
                      $("#dateEditTUVAuditCurrDeadSub").val(JsonObject['tuv_audits'][0]['deadline_for_submission']);
                      $("#txtEditTUVAuditDeadSubDays").val(JsonObject['tuv_audits'][0]['deadline_for_submission_days']);
                      $("#dateEditTUVAuditCreatedAt").val(JsonObject['tuv_audits'][0]['created_at'].split(' ')[0]);
                      // alert(JsonObject['tuv_audits'][0]['created_at'].split(' ')[0]);
                      $("#txtEditTUVAuditAuditors").val(JsonObject['tuv_audits'][0]['auditors']);
                      $("#txtEditTUVAuditStanClause").val(JsonObject['tuv_audits'][0]['standard_clause']);
                      let responsible_department = [];
                      for(let index = 0; index < JsonObject['tuv_audits'][0]['tuv_departments'].length; index++){
                          responsible_department.push(JsonObject['tuv_audits'][0]['tuv_departments'][index]['departments'][0].department_id);
                      }
                      $("#selEditTUVAuditResDept").val(responsible_department).trigger('change');
                      // $("#selEditTUVAuditResDept").val(JsonObject['tuv_audits'][0]['responsible_department']).trigger('change');
                      $("#txtEditTUVAuditStmtOfNC").val(JsonObject['tuv_audits'][0]['statement_of_nc']);
                      $("#txtEditTUVAuditObjEvi").val(JsonObject['tuv_audits'][0]['objective_evidence']);
                      
                      if(JsonObject['tuv_audits'][0]['img_corrective_action'] != ""){
                          var imglink = "{{ asset('public/storage/audit_result_images/tuv/img') }}";
                          imglink = imglink.replace("img", JsonObject['tuv_audits'][0]['img_corrective_action']);
                          $("#imgEditTUVAuditCorrAct").attr('src', imglink);
                      }
                      else{
                          $("#imgEditTUVAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                      }

                      $("#txtEditTUVAuditCorrAct").val(JsonObject['tuv_audits'][0]['corrective_action']);
                      $("#txtEditTUVAuditCurrCorrAct").val(JsonObject['tuv_audits'][0]['img_corrective_action']);
                      $("#txtEditTUVAuditRootCause").val(JsonObject['tuv_audits'][0]['root_cause_analysis']);
                      $("#txtEditTUVAuditPerInCharge").val(JsonObject['tuv_audits'][0]['person_in_charge']);
                      $("#dateEditTUVAuditCommDate").val(JsonObject['tuv_audits'][0]['commitment_date']);
                      $("#txtEditTUVAuditCorrection").val(JsonObject['tuv_audits'][0]['correction']);
                      $("#txtEditTUVAuditContainment").val(JsonObject['tuv_audits'][0]['containment']);
                      $("#txtEditTUVAuditSystematic").val(JsonObject['tuv_audits'][0]['systematic']);                
                  },
                  error: function(data, xhr, status){
                      console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                  }
              });
          }

          function readAddTUVAuditCorrActURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  
                  reader.onload = function(e) {
                    $('#imgAddTUVAuditCorrAct').attr('src', e.target.result);
                  }
                  
                  reader.readAsDataURL(input.files[0]);
              }
          }

          function readEditTUVAuditCorrActURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  
                  reader.onload = function(e) {
                    $('#imgEditTUVAuditCorrAct').attr('src', e.target.result);
                  }
                  
                  reader.readAsDataURL(input.files[0]);
              }
          }
        });


        // -------------------------- CUSTOMER BATCH --------------------------
        let dataTableCustomerBatch;
        $(document).ready(function() {
            dataTableCustomerBatch = $("#tblCusAuditBatch").DataTable({
                "order": [[ 0, "desc" ]],
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_customer_batch_by_stat",
                    "data": function (param){
                        param.customer_batch_stat = 0;
                    }
                },
                
                "columns":[
                    { "data" : "customer_batch_id" },
                    { "data" : "customer_batch_name" },
                    { "data" : "result_in_customer_count" },
                    { "data" : "saving_stat_label" },
                    { "data" : "label1" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
            });//end of dataTableCustomerBatch

            $("#formAddCusBatch").submit(function(event){
                event.preventDefault();
                AddCusBatch();
            });

            $(document).on('click', '.aArchiveCusBatch', function(){
                let customerBatchId = $(this).attr('customer-batch-id');
                $("#txtArchiveCusBatchId").val(customerBatchId);
            });

            $("#formArchiveCusBatch").submit(function(event){
                event.preventDefault();
                ArchiveCusBatch();
            });

            $(document).on('click', '.aRestoreCusBatch', function(){
                let customerBatchId = $(this).attr('customer-batch-id');
                $("#txtRestoreCusBatch").val(customerBatchId);
            });

            $("#formRestoreCusBatch").submit(function(event){
                event.preventDefault();
                RestoreCusBatch();
            });

            $(document).on('click', '.aEditCusBatch', function(){
                let customerBatchId = $(this).attr('customer-batch-id');
                $("#txtEditCusBatchId").val(customerBatchId);
                GetCusBatchByIdToEdit(customerBatchId);
            });

            $("#formEditCusBatch").submit(function(event){
                event.preventDefault();
                EditCusBatch();
            });

            $(document).on('click', '.aResultsCusBatch', function(){
                let cusAuditBatchId = $(this).attr('customer-batch-id');
                $("#txtAddBatchIdCusResInBatch").val(cusAuditBatchId);
                customer_batch_id = cusAuditBatchId;
                GetCusBatchByIdToView(cusAuditBatchId);
                dataTableCusResInBatch.draw();
                dataTableCustomerAudits.draw();
            });

            $(document).on('click', '.aAddToBatchCusAudit', function(){
                let cusAuditId = $(this).attr('customer-id');
                $("#txtAddCusAuditInBatchId").val(cusAuditId);
            });

            $("#formAddCusResInBatch").submit(function(event){
                event.preventDefault();
                AddCusResInBatch();
            });

            $(document).on('click', '.aRemoveToBatchCusAudit', function(){
                let cusAuditId = $(this).attr('customer-id');
                let resInCusBatch = $(this).attr('res-in-customer-batch-id');
                $("#txtRemoveResInCusBatch").val(resInCusBatch);
                $("#txtRemoveCusAuditInBatchId").val(cusAuditId);
            });

            $("#formRemoveCusResInBatch").submit(function(event){
                event.preventDefault();
                RemoveCusResInBatch();
            });
        });

        // ------------------ CUSTOMER AUDIT ------------------

        function readCusImageUrl(input, imgElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  imgElement.attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        let dataTableCustomerAudits;

        let customer_date_from = 0;
        let customer_date_to = 0;
        let customer_audit_type = 0;
        let customer_classification = 0;
        let customer_category_of_findings = 0;
        let customer_responsible_group = 0;
        let customer_responsible_department = 0;
        let customer_audit_stat = 0;
        let customer_name = 0;
        // let audit_report_control_no = 0;

        let dataTableCusResInBatch;
        let customer_batch_id = 0;

        $(document).ready(function() {
          dataTableCustomerAudits = $("#tblCustomerAuditResults").on( 'error.dt', function ( e, settings, techNote, message ) {
            Swal({
                  position: 'top-end',
                  type: 'error',
                  title: 'Customer DataTable Failed!',
                  showConfirmButton: false,
                  timer: 1500,
                  customClass: 'swal-wide',
              });
          }).DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_single_customer_audit",
                    "data": function (param){
                        param.date_from = customer_date_from;
                        param.date_to = customer_date_to;
                        param.classification = customer_classification;
                        param.responsible_group = customer_responsible_group;
                        param.responsible_department = customer_responsible_department;
                        param.audit_stat = customer_audit_stat;
                        param.customer_name = customer_name;
                    }
                },            
                "columns":[
                    { "data" : "customer_name" },
                    { "data" : "formatted_audit_date" },
                    { "data" : "auditors" },
                    { "data" : "label1" },
                    // { "data" : "audit_stat" },
                    { "data" : "label2" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
            });//end of dataTableCustomerAudits

            dataTableCusResInBatch = $("#tblCusResInBatch").on( 'error.dt', function ( e, settings, techNote, message ) {
              Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Result Customer In Batch DataTable Failed!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            }).DataTable({
                  "processing" : false,
                  "serverSide" : true,
                  "ajax" : {
                      url: "view_customer_audit_in_batch",
                      "data": function (param){
                        param.customer_batch_id = customer_batch_id;
                      }
                  },
                  "columns":[
                      { "data" : "customer_audit.customer_name" },
                      { "data" : "customer_audit.statement_of_findings" },
                      { "data" : "img_illustration_image" },
                      { "data" : "customer_audit.improvement_plan" },
                      { "data" : "customer_audit.commitment_date" },
                      { "data" : "customer_audit.person_in_charge" },
                      { "data" : "audit_stat_label" },
                      { "data" : "sending_stat_label" },
                      { "data" : "action1", orderable:false, searchable:false }
                  ],
                  "columnDefs": [ 
                    {
                      "targets": [3, 4, 5],
                      "data": null,
                      "defaultContent": "- - -"
                    } 
                  ]
              });//end of dataTableCustomerAudits

            GetDepartmentByStat(1, $("#selGenCusRepResDept"));
            GetCboSelUniqueCustomerNames($("#selGenCusRepCusName"));

            $("#formGenerateCusReport").submit(function(event){
                event.preventDefault();
                if($("#dateGenCusRepDateFrom").attr('disabled') != 'disabled' && $("#dateGenCusRepDateFrom").val() != '') {
                    customer_date_from = $("#dateGenCusRepDateFrom").val();
                }
                else{
                    customer_date_from = 0;
                }

                if($("#dateGenCusRepDateTo").attr('disabled') != 'disabled' && $("#dateGenCusRepDateTo").val() != '') {
                    customer_date_to = $("#dateGenCusRepDateTo").val();
                }
                else{
                    customer_date_to = 0;
                }

                if($("#selGenCusRepClassification").attr('disabled') != 'disabled' && $("#selGenCusRepClassification").val() != '') {
                    customer_classification = $("#selGenCusRepClassification").val();
                }
                else{
                    customer_classification = 0;
                }

                if($("#selGenCusRepResGroup").attr('disabled') != 'disabled' && $("#selGenCusRepResGroup").val() != '' && $("#selGenCusRepResGroup").val() != null) {
                    customer_responsible_group = $("#selGenCusRepResGroup").val();
                }
                else{
                    customer_responsible_group = 0;
                }

                if($("#selGenCusRepResDept").attr('disabled') != 'disabled' && $("#selGenCusRepResDept").val() != '' && $("#selGenCusRepResDept").val() != null) {
                    customer_responsible_department = $("#selGenCusRepResDept").val();
                }
                else{
                    customer_responsible_department = 0;
                }

                if($("#selGenCusRepAuditStat").attr('disabled') != 'disabled' && $("#selGenCusRepAuditStat").val() != '' && $("#selGenCusRepAuditStat").val() != null) {
                    customer_audit_stat = $("#selGenCusRepAuditStat").val();
                }
                else {
                    customer_audit_stat = 0;
                }

                if($("#selGenCusRepCusName").attr('disabled') != 'disabled' && $("#selGenCusRepCusName").val() != '' && $("#selGenCusRepCusName").val() != null) {
                    customer_name = $("#selGenCusRepCusName").val();
                }
                else {
                    customer_name = 0;
                }
                // alert(audit_category);
                dataTableCustomerAudits.draw();
            });

            $("#chkGenCusRepAuditDate").click(function() {
                if($(this).prop('checked')) {
                    // alert("Active");
                    $("#dateGenCusRepDateFrom").removeAttr('disabled');
                    $("#dateGenCusRepDateTo").removeAttr('disabled');
                }
                else{
                    // alert("Remove");
                    $("#dateGenCusRepDateFrom").prop('disabled', 'disabled');
                    $("#dateGenCusRepDateTo").prop('disabled', 'disabled');
                    $("#dateGenCusRepDateFrom").val('');
                    $("#dateGenCusRepDateTo").val('');
                }
            });

            $("#chkGenCusRepClassification").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenCusRepClassification").removeAttr('disabled');
                }
                else{
                    $("#selGenCusRepClassification").prop('disabled', 'disabled');
                    $("#selGenCusRepClassification").val('Major NC');
                }
            });

            $("#chkGenCusRepResGroup").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenCusRepResGroup").removeAttr('disabled');
                }
                else{
                    $("#selGenCusRepResGroup").prop('disabled', 'disabled');
                    $("#selGenCusRepResGroup").val('PMI');
                }
            });

            $("#chkGenCusRepResDept").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenCusRepResDept").removeAttr('disabled');
                }
                else{
                    $("#selGenCusRepResDept").prop('disabled', 'disabled');
                }
            });

            $("#chkGenCusRepCusName").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenCusRepCusName").removeAttr('disabled');
                }
                else{
                    $("#selGenCusRepCusName").prop('disabled', 'disabled');
                }
            });

            $("#chkGenCusRepAuditStat").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenCusRepAuditStat").removeAttr('disabled');
                }
                else{
                    $("#selGenCusRepAuditStat").prop('disabled', 'disabled');
                    $("#selGenCusRepAuditStat").val('1');
                }
            });

            $(document).on('click', '.aViewCusAudit', function(){
                let cusAuditId = $(this).attr('customer-id');
                GetCusAuditByIdToView(cusAuditId);
            });

            $(document).on('click', '.aEditCusAudit', function(){
                let cusAuditId = $(this).attr('customer-id');
                $("#txtEditCusAuditId").val(cusAuditId);
                GetCusAuditByIdToEdit(cusAuditId);
            });

            $("#formEditCusAudit").submit(function(event){
                event.preventDefault();
                $.ajax({
                    url: 'edit_customer_audit',
                    method: 'post',
                    data: new FormData(this),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        // alert('Loading...');
                    },
                    success: function(JsonObject){
                        // alert(JSON.stringify(JsonObject));
                        if(JsonObject['result'] == 1){
                            $("#modalEditCusAudit").modal('hide');
                            $("#formEditCusAudit")[0].reset();
                            $('#imgEditCusAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            $('#imgEditCusAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            dataTableCusAudits.draw();
                            $("#dateEditCusAuditDate").removeClass('border-danger');
                            $("#dateEditCusAuditDate").removeAttr('title');
                            $("#txtEditCusAuditCusName").removeClass('border-danger');
                            $("#txtEditCusAuditProcess").removeClass('border-danger');
                            $("#txtEditCusAuditEvalItem").removeClass('border-danger');
                            $("#selEditCusAuditClassRank").removeClass('border-danger');
                            $("#dateEditCusAuditDeadSub").removeClass('border-danger');
                            $("#dateEditCusAuditActDateSub").removeClass('border-danger');
                            $("#txtEditCusAuditDeadSubDays").removeClass('border-danger');
                            $("#txtEditCusAuditAuditors").removeClass('border-danger');
                            $("#txtEditCusAuditStmtOfFin").removeClass('border-danger');
                            $("#selEditCusAuditResDept").removeClass('border-danger');
                            $("#selEditCusAuditResGroup").removeClass('border-danger');
                            $("#txtEditCusAuditCorrAct").removeClass('border-danger');
                            $("#fileEditCusAuditCorrAct").removeClass('border-danger');
                            $("#txtEditCusAuditIllu").removeClass('border-danger');
                            $("#txtEditCusAuditIllu").removeAttr('title');
                            $("#fileEditCusAuditIllu").removeClass('border-danger');
                            $("#fileEditCusAuditIllu").removeAttr('title');

                        }
                        else if(JsonObject['result'] == 0){
                            Swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Updating Failed!',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: 'swal-wide',
                            });
                        }
                        else if(JsonObject['upload_result'] == 0 && JsonObject['upload_result'] != 0){
                            Swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Uploading Failed!',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: 'swal-wide',
                            });
                        }

                        if(JsonObject['error']['audit_date'] != undefined){
                            $("#dateEditCusAuditDate").addClass('border-danger');
                            $("#dateEditCusAuditDate").attr('title', JsonObject['error']['audit_date']);
                        }
                        else{
                            $("#dateEditCusAuditDate").removeClass('border-danger');
                            $("#dateEditCusAuditDate").removeAttr('title');
                        }

                        if(JsonObject['error']['customer_name'] != undefined){
                            $("#txtEditCusAuditCusName").addClass('border-danger');
                            $("#txtEditCusAuditCusName").attr('title', JsonObject['error']['customer_name']);
                        }
                        else{
                            $("#txtEditCusAuditCusName").removeClass('border-danger');
                            $("#txtEditCusAuditCusName").removeAttr('title');
                        }

                        if(JsonObject['error']['process'] != undefined){
                            $("#txtEditCusAuditProcess").addClass('border-danger');
                            $("#txtEditCusAuditProcess").attr('title', JsonObject['error']['process']);
                        }
                        else{
                            $("#txtEditCusAuditProcess").removeClass('border-danger');
                            $("#txtEditCusAuditProcess").removeAttr('title');
                        }

                        if(JsonObject['error']['evaluation_item'] != undefined){
                            $("#txtEditCusAuditEvalItem").addClass('border-danger');
                            $("#txtEditCusAuditEvalItem").attr('title', JsonObject['error']['evaluation_item']);
                        }
                        else{
                            $("#txtEditCusAuditEvalItem").removeClass('border-danger');
                            $("#txtEditCusAuditEvalItem").removeAttr('title');
                        }

                        if(JsonObject['error']['classification'] != undefined){
                            $("#selEditCusAuditClassRank").addClass('border-danger');
                            $("#selEditCusAuditClassRank").attr('title', JsonObject['error']['classification']);
                        }
                        else{
                            $("#selEditCusAuditClassRank").removeClass('border-danger');
                            $("#selEditCusAuditClassRank").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission'] != undefined){
                            $("#dateEditCusAuditDeadSub").addClass('border-danger');
                            $("#dateEditCusAuditDeadSub").attr('title', JsonObject['error']['deadline_of_submission']);
                        }
                        else{
                            $("#dateEditCusAuditDeadSub").removeClass('border-danger');
                            $("#dateEditCusAuditDeadSub").removeAttr('title');
                        }

                        if(JsonObject['error']['actual_date_of_submission'] != undefined){
                            $("#dateEditCusAuditActDateSub").addClass('border-danger');
                            $("#dateEditCusAuditActDateSub").attr('title', JsonObject['error']['actual_date_of_submission']);
                        }
                        else{
                            $("#dateEditCusAuditActDateSub").removeClass('border-danger');
                            $("#dateEditCusAuditActDateSub").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission_days'] != undefined){
                            $("#txtEditCusAuditDeadSubDays").addClass('border-danger');
                            $("#txtEditCusAuditDeadSubDays").attr('title', JsonObject['error']['deadline_of_submission_days']);
                        }
                        else{
                            $("#txtEditCusAuditDeadSubDays").removeClass('border-danger');
                            $("#txtEditCusAuditDeadSubDays").removeAttr('title');
                        }

                        if(JsonObject['error']['auditors'] != undefined){
                            $("#txtEditCusAuditAuditors").addClass('border-danger');
                            $("#txtEditCusAuditAuditors").attr('title', JsonObject['error']['auditors']);
                        }
                        else{
                            $("#txtEditCusAuditAuditors").removeClass('border-danger');
                            $("#txtEditCusAuditAuditors").removeAttr('title');
                        }

                        if(JsonObject['error']['statement_of_findings'] != undefined){
                            $("#txtEditCusAuditStmtOfFin").addClass('border-danger');
                            $("#txtEditCusAuditStmtOfFin").attr('title', JsonObject['error']['statement_of_findings']);
                        }
                        else{
                            $("#txtEditCusAuditStmtOfFin").removeClass('border-danger');
                            $("#txtEditCusAuditStmtOfFin").removeAttr('title');
                        }

                        if(JsonObject['error']['responsible_department'] != undefined){
                            $("#selEditCusAuditResDept").addClass('border-danger');
                            $("#selEditCusAuditResDept").attr('title', JsonObject['error']['responsible_department']);
                        }
                        else{
                            $("#selEditCusAuditResDept").removeClass('border-danger');
                            $("#selEditCusAuditResDept").removeAttr('title');
                        }

                        if(JsonObject['error']['responsible_group'] != undefined){
                            $("#selEditCusAuditResGroup").addClass('border-danger');
                            $("#selEditCusAuditResGroup").attr('title', JsonObject['error']['responsible_group']);
                        }
                        else{
                            $("#selEditCusAuditResGroup").removeClass('border-danger');
                            $("#selEditCusAuditResGroup").removeAttr('title');
                        }

                        if(JsonObject['error']['corrective_action'] != undefined){
                            $("#txtEditCusAuditCorrAct").addClass('border-danger');
                            $("#txtEditCusAuditCorrAct").attr('title', JsonObject['error']['corrective_action']);
                        }
                        else{
                            $("#txtEditCusAuditCorrAct").removeClass('border-danger');
                            $("#txtEditCusAuditCorrAct").removeAttr('title');
                        }

                        if(JsonObject['error']['img_corrective_action'] != undefined){
                            $("#fileEditCusAuditCorrAct").addClass('border-danger');
                            $("#fileEditCusAuditCorrAct").attr('title', JsonObject['error']['img_corrective_action']);
                        }
                        else{
                            $("#fileEditCusAuditCorrAct").removeClass('border-danger');
                            $("#fileEditCusAuditCorrAct").removeAttr('title');
                        }

                        if(JsonObject['error']['illustration'] != undefined){
                            $("#txtEditCusAuditIllu").addClass('border-danger');
                            $("#txtEditCusAuditIllu").attr('title', JsonObject['error']['illustration']);
                        }
                        else{
                            $("#txtEditCusAuditIllu").removeClass('border-danger');
                            $("#txtEditCusAuditIllu").removeAttr('title');
                        }

                        if(JsonObject['error']['img_illustration'] != undefined){
                            $("#fileEditCusAuditIllu").addClass('border-danger');
                            $("#fileEditCusAuditIllu").attr('title', JsonObject['error']['img_illustration']);
                        }
                        else{
                            $("#fileEditCusAuditIllu").removeClass('border-danger');
                            $("#fileEditCusAuditIllu").removeAttr('title');
                        }
                    },
                    error: function(data, xhr, status){
                        console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                });
            });

            $("#btnSaveAsDraftCusBatch").click(function(){
              CusBatchSaveByStat(customer_batch_id, 1, "{{ csrf_token() }}");
            });

            $("#btnSaveAndSendCusBatch").click(function(){
              CusBatchSaveByStat(customer_batch_id, 2, "{{ csrf_token() }}");
            });

        });


        // -------------------------- INTERNAL BATCH --------------------------
        let dataTableInternalBatch;
        $(document).ready(function() {
            dataTableInternalBatch = $("#tblIntAuditBatch").DataTable({
                "order": [[ 0, "desc" ]],
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_internal_batch_by_stat",
                    "data": function (param){
                        param.internal_batch_stat = 0;
                    }
                },
                
                "columns":[
                    { "data" : "internal_batch_id" },
                    { "data" : "internal_batch_name" },
                    { "data" : "result_in_internal_count" },
                    { "data" : "saving_stat_label" },
                    { "data" : "label1" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
            });//end of dataTableInternalBatch

            $("#formAddIntBatch").submit(function(event){
                event.preventDefault();
                AddIntBatch();
            });

            $(document).on('click', '.aArchiveIntBatch', function(){
                let internalBatchId = $(this).attr('internal-batch-id');
                $("#txtArchiveIntBatchId").val(internalBatchId);
            });

            $("#formArchiveIntBatch").submit(function(event){
                event.preventDefault();
                ArchiveIntBatch();
            });

            $(document).on('click', '.aRestoreIntBatch', function(){
                let internalBatchId = $(this).attr('internal-batch-id');
                $("#txtRestoreIntBatch").val(internalBatchId);
            });

            $("#formRestoreIntBatch").submit(function(event){
                event.preventDefault();
                RestoreIntBatch();
            });

            $(document).on('click', '.aEditIntBatch', function(){
                let internalBatchId = $(this).attr('internal-batch-id');
                $("#txtEditIntBatchId").val(internalBatchId);
                GetIntBatchByIdToEdit(internalBatchId);
            });

            $("#formEditIntBatch").submit(function(event){
                event.preventDefault();
                EditIntBatch();
            });

            $(document).on('click', '.aResultsIntBatch', function(){
                let intAuditBatchId = $(this).attr('internal-batch-id');
                $("#txtAddBatchIdIntResInBatch").val(intAuditBatchId);
                internal_batch_id = intAuditBatchId;
                dataTableIntResInBatch.draw();
                dataTableInternalAudits.draw();
                GetIntBatchByIdToView(intAuditBatchId);
            });

            $(document).on('click', '.aAddToBatchIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');
                $("#txtAddIntAuditInBatchId").val(intAuditId);
            });

            $("#formAddIntResInBatch").submit(function(event){
                event.preventDefault();
                AddIntResInBatch();
            });

            $(document).on('click', '.aRemoveToBatchIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');
                let resInIntBatch = $(this).attr('res-in-internal-batch-id');
                $("#txtRemoveResInIntBatch").val(resInIntBatch);
                $("#txtRemoveIntAuditInBatchId").val(intAuditId);
            });

            $("#formRemoveIntResInBatch").submit(function(event){
                event.preventDefault();
                RemoveIntResInBatch();
            });
        });

        // ------------------ INTERNAL AUDIT ------------------

        function readIntImageUrl(input, imgElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  imgElement.attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        let dataTableInternalAudits;

        let internal_date_from = 0;
        let internal_date_to = 0;
        let internal_audit_type = 0;
        let internal_classification = 0;
        let internal_category_of_findings = 0;
        let internal_responsible_department = 0;
        let internal_audit_stat = 0;
        let audit_report_control_no = 0;

        let dataTableIntResInBatch;
        let internal_batch_id = 0;

        $(document).ready(function() {
          dataTableInternalAudits = $("#tblInternalAuditResults").on( 'error.dt', function ( e, settings, techNote, message ) {
            Swal({
                  position: 'top-end',
                  type: 'error',
                  title: 'Internal DataTable Failed!',
                  showConfirmButton: false,
                  timer: 1500,
                  customClass: 'swal-wide',
              });
          }).DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_single_internal_audit",
                    "data": function (param){
                        param.date_from = internal_date_from;
                        param.date_to = internal_date_to;
                        param.audit_type = internal_audit_type;
                        param.classification = internal_classification;
                        param.category_of_findings = internal_category_of_findings;
                        param.responsible_department = internal_responsible_department;
                        param.audit_stat = internal_audit_stat;
                        param.audit_report_control_no = audit_report_control_no;
                    }
                },            
                "columns":[
                    { "data" : "formatted_audit_date" },
                    { "data" : "audit_type" },
                    { "data" : "auditors" },
                    { "data" : "audit_report_control_no" },
                    { "data" : "label1" },
                    // { "data" : "audit_stat" },
                    { "data" : "label2" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
            });//end of dataTableInternalAudits

            dataTableIntResInBatch = $("#tblIntResInBatch").on( 'error.dt', function ( e, settings, techNote, message ) {
              Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Result Internal In Batch DataTable Failed!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            }).DataTable({
                  "processing" : false,
                  "serverSide" : true,
                  "ajax" : {
                      url: "view_internal_audit_in_batch",
                      "data": function (param){
                        param.internal_batch_id = internal_batch_id;
                      }
                  },
                  "columns":[
                      { "data" : "internal_audit.iso_iatf_clause" },
                      { "data" : "internal_audit.statement_of_findings" },
                      { "data" : "img_illustration_image" },
                      { "data" : "internal_audit.improvement_action" },
                      { "data" : "internal_audit.commitment_date" },
                      { "data" : "internal_audit.person_in_charge" },
                      { "data" : "audit_stat_label" },
                      { "data" : "sending_stat_label" },
                      { "data" : "action1", orderable:false, searchable:false }
                  ],
                  "columnDefs": [ 
                    {
                      "targets": [3, 4, 5],
                      "data": null,
                      "defaultContent": "- - -"
                    } 
                  ]
              });//end of dataTableInternalAudits

          GetDepartmentByStat(1, $("#selGenIntRepResDept"));

            $("#formGenerateIntReport").submit(function(event){
                event.preventDefault();
                if($("#dateGenIntRepDateFrom").attr('disabled') != 'disabled' && $("#dateGenIntRepDateFrom").val() != '') {
                    internal_date_from = $("#dateGenIntRepDateFrom").val();
                }
                else{
                    internal_date_from = 0;
                }

                if($("#dateGenIntRepDateTo").attr('disabled') != 'disabled' && $("#dateGenIntRepDateTo").val() != '') {
                    internal_date_to = $("#dateGenIntRepDateTo").val();
                }
                else{
                    internal_date_to = 0;
                }

                if($("#selGenIntRepAuditType").attr('disabled') != 'disabled' && $("#selGenIntRepAuditType").val() != '') {
                    internal_audit_type = $("#selGenIntRepAuditType").val();
                }
                else{
                    internal_audit_type = 0;
                }

                if($("#selGenIntRepClassification").attr('disabled') != 'disabled' && $("#selGenIntRepClassification").val() != '') {
                    internal_classification = $("#selGenIntRepClassification").val();
                }
                else{
                    internal_classification = 0;
                }

                if($("#selGenIntRepCatOfFin").attr('disabled') != 'disabled' && $("#selGenIntRepCatOfFin").val() != '') {
                    internal_category_of_findings = $("#selGenIntRepCatOfFin").val();
                }
                else{
                    internal_category_of_findings = 0;
                }

                if($("#selGenIntRepResDept").attr('disabled') != 'disabled' && $("#selGenIntRepResDept").val() != '' && $("#selGenIntRepResDept").val() != null) {
                    internal_responsible_department = $("#selGenIntRepResDept").val();
                }
                else{
                    internal_responsible_department = 0;
                }

                if($("#selGenIntRepAuditStat").attr('disabled') != 'disabled' && $("#selGenIntRepAuditStat").val() != '' && $("#selGenIntRepAuditStat").val() != null) {
                    internal_audit_stat = $("#selGenIntRepAuditStat").val();
                }
                else {
                    internal_audit_stat = 0;
                }

                if($("#txtGenIntRepCtrlNo").attr('disabled') != 'disabled' && $("#txtGenIntRepCtrlNo").val() != '' && $("#txtGenIntRepCtrlNo").val() != null) {
                    audit_report_control_no = $("#txtGenIntRepCtrlNo").val();
                }
                else {
                    audit_report_control_no = 0;
                }
                // alert(audit_category);
                dataTableInternalAudits.draw();
            });

            $("#chkGenIntRepAuditDate").click(function() {
                if($(this).prop('checked')) {
                    // alert("Active");
                    $("#dateGenIntRepDateFrom").removeAttr('disabled');
                    $("#dateGenIntRepDateTo").removeAttr('disabled');
                }
                else{
                    // alert("Remove");
                    $("#dateGenIntRepDateFrom").prop('disabled', 'disabled');
                    $("#dateGenIntRepDateTo").prop('disabled', 'disabled');
                    $("#dateGenIntRepDateFrom").val('');
                    $("#dateGenIntRepDateTo").val('');
                }
            });

            $("#chkGenIntRepAuditType").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenIntRepAuditType").removeAttr('disabled');
                }
                else{
                    $("#selGenIntRepAuditType").prop('disabled', 'disabled');
                    $("#selGenIntRepAuditType").val('System');
                }
            });

            $("#chkGenIntRepClassification").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenIntRepClassification").removeAttr('disabled');
                }
                else{
                    $("#selGenIntRepClassification").prop('disabled', 'disabled');
                    $("#selGenIntRepClassification").val('NC');
                }
            });

            $("#chkGenIntRepCatOfFin").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenIntRepCatOfFin").removeAttr('disabled');
                }
                else{
                    $("#selGenIntRepCatOfFin").prop('disabled', 'disabled');
                    $("#selGenIntRepCatOfFin").val('RD');
                }
            });

            $("#chkGenIntRepResDept").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenIntRepResDept").removeAttr('disabled');
                }
                else{
                    $("#selGenIntRepResDept").prop('disabled', 'disabled');
                }
            });

            $("#chkGenIntRepAuditStat").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenIntRepAuditStat").removeAttr('disabled');
                }
                else{
                    $("#selGenIntRepAuditStat").prop('disabled', 'disabled');
                    $("#selGenIntRepAuditStat").val('1');
                }
            });

            $("#chkGenIntRepCtrlNo").click(function() {
                if($(this).prop('checked')) {
                    $("#txtGenIntRepCtrlNo").removeAttr('disabled');
                    $("#txtGenIntRepCtrlNo").val('');
                }
                else{
                    $("#txtGenIntRepCtrlNo").prop('disabled', 'disabled');
                    $("#txtGenIntRepCtrlNo").val('');
                }
            });

            $(document).on('click', '.aViewIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');
                GetIntAuditByIdToView(intAuditId);
            });

            $(document).on('click', '.aEditInt', function(){
                let intAuditId = $(this).attr('internal-id');
                $("#txtEditIntAuditId").val(intAuditId);
                GetIntAuditByIdToEdit(intAuditId);
            });

            $("#btnSaveAsDraftIntBatch").click(function(){
              IntBatchSaveByStat(internal_batch_id, 1, "{{ csrf_token() }}");
            });

            $("#btnSaveAndSendIntBatch").click(function(){
              IntBatchSaveByStat(internal_batch_id, 2, "{{ csrf_token() }}");
            });

            $("#formEditIntAudit").submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'edit_internal_audit',
                    method: 'post',
                    data: new FormData(this),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        // alert('Loading...');
                    },
                    success: function(JsonObject){
                        // alert(JSON.stringify(JsonObject));
                        if(JsonObject['result'] == 1){
                            $("#modalEditIntAudit").modal('hide');
                            $("#formEditIntAudit")[0].reset();
                            $('#imgEditIntAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            $('#imgEditIntAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            dataTableInternalAudits.draw();

                            $("#selEditIntAuditType").removeClass('border-danger');
                            $("#selEditIntAuditType").removeAttr('title');
                            $("#dateEditIntAuditDate").removeClass('border-danger');
                            $("#dateEditIntAuditDate").removeAttr('title');
                            $("#txtEditIntAuditBusProcSecSupp").removeClass('border-danger');
                            $("#txtEditIntAuditBusProcSecSupp").removeAttr('title');
                            $("#txtEditIntAuditAuditors").removeClass('border-danger');
                            $("#txtEditIntAuditAuditors").removeAttr('title');
                            $("#txtEditIntAuditAuditees").removeClass('border-danger');
                            $("#txtEditIntAuditAuditees").removeAttr('title');
                            $("#txtEditIntAuditRepContNo").removeClass('border-danger');
                            $("#txtEditIntAuditRepContNo").removeAttr('title');
                            $("#selEditIntAuditClassRank").removeClass('border-danger');
                            $("#selEditIntAuditClassRank").removeAttr('title');
                            $("#selEditIntAuditCatOfFind").removeClass('border-danger');
                            $("#selEditIntAuditCatOfFind").removeAttr('title');
                            $("#dateEditIntAuditFindIssDate").removeClass('border-danger');
                            $("#dateEditIntAuditFindIssDate").removeAttr('title');
                            $("#dateEditIntAuditDeadSub").removeClass('border-danger');
                            $("#dateEditIntAuditDeadSub").removeAttr('title');
                            $("#txtEditIntAuditDeadSubDays").removeClass('border-danger');
                            $("#txtEditIntAuditDeadSubDays").removeAttr('title');
                            $("#dateEditIntAuditActDateSub").removeClass('border-danger');
                            $("#dateEditIntAuditActDateSub").removeAttr('title');
                            $("#txtEditIntAuditIsoAitfClause").removeClass('border-danger');
                            $("#txtEditIntAuditIsoAitfClause").removeAttr('title');
                            $("#txtEditIntAuditStmtOfFin").removeClass('border-danger');
                            $("#txtEditIntAuditStmtOfFin").removeAttr('title');
                            $("#txtEditIntAuditIllu").removeClass('border-danger');
                            $("#txtEditIntAuditIllu").removeAttr('title');
                            $("#filEditIntAuditIllu").removeClass('border-danger');
                            $("#fileEditIntAuditIllu").removeAttr('title');
                            $("#txtEditIntAuditCorrAct").removeClass('border-danger');
                            $("#txtEditIntAuditCorrAct").removeAttr('title');
                            $("#fileEditIntAuditCorrAct").removeClass('border-danger');
                            $("#fileEditIntAuditCorrAct").removeAttr('title');

                        }
                        else if(JsonObject['result'] == 0){
                            Swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Updating Failed!',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: 'swal-wide',
                            });
                        }
                        else if(JsonObject['upload_result'] == 0 && JsonObject['upload_result'] != 0){
                            Swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Uploading Failed!',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: 'swal-wide',
                            });
                        }

                        if(JsonObject['error']['audit_type'] != undefined){
                            $("#selEditIntAuditType").addClass('border-danger');
                            $("#selEditIntAuditType").attr('title', JsonObject['error']['audit_type']);
                        }
                        else{
                            $("#selEditIntAuditType").removeClass('border-danger');
                            $("#selEditIntAuditType").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_date'] != undefined){
                            $("#dateEditIntAuditDate").addClass('border-danger');
                            $("#dateEditIntAuditDate").attr('title', JsonObject['error']['audit_date']);
                        }
                        else{
                            $("#dateEditIntAuditDate").removeClass('border-danger');
                            $("#dateEditIntAuditDate").removeAttr('title');
                        }

                        if(JsonObject['error']['business_process'] != undefined){
                            $("#txtEditIntAuditBusProcSecSupp").addClass('border-danger');
                            $("#txtEditIntAuditBusProcSecSupp").attr('title', JsonObject['error']['business_process']);
                        }
                        else{
                            $("#txtEditIntAuditBusProcSecSupp").removeClass('border-danger');
                            $("#txtEditIntAuditBusProcSecSupp").removeAttr('title');
                        }

                        if(JsonObject['error']['auditors'] != undefined){
                            $("#txtEditIntAuditAuditors").addClass('border-danger');
                            $("#txtEditIntAuditAuditors").attr('title', JsonObject['error']['auditors']);
                        }
                        else{
                            $("#txtEditIntAuditAuditors").removeClass('border-danger');
                            $("#txtEditIntAuditAuditors").removeAttr('title');
                        }

                        if(JsonObject['error']['auditees'] != undefined){
                            $("#txtEditIntAuditAuditees").addClass('border-danger');
                            $("#txtEditIntAuditAuditees").attr('title', JsonObject['error']['auditees']);
                        }
                        else{
                            $("#txtEditIntAuditAuditees").removeClass('border-danger');
                            $("#txtEditIntAuditAuditees").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_report_control_no'] != undefined){
                            $("#txtEditIntAuditRepContNo").addClass('border-danger');
                            $("#txtEditIntAuditRepContNo").attr('title', JsonObject['error']['audit_report_control_no']);
                        }
                        else{
                            $("#txtEditIntAuditRepContNo").removeClass('border-danger');
                            $("#txtEditIntAuditRepContNo").removeAttr('title');
                        }

                        if(JsonObject['error']['classification'] != undefined){
                            $("#selEditIntAuditClassRank").addClass('border-danger');
                            $("#selEditIntAuditClassRank").attr('title', JsonObject['error']['classification']);
                        }
                        else{
                            $("#selEditIntAuditClassRank").removeClass('border-danger');
                            $("#selEditIntAuditClassRank").removeAttr('title');
                        }

                        if(JsonObject['error']['category_of_findings'] != undefined){
                            $("#selEditIntAuditCatOfFind").addClass('border-danger');
                            $("#selEditIntAuditCatOfFind").attr('title', JsonObject['error']['category_of_findings']);
                        }
                        else{
                            $("#selEditIntAuditCatOfFind").removeClass('border-danger');
                            $("#selEditIntAuditCatOfFind").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_findings_issued_date'] != undefined){
                            $("#dateEditIntAuditFindIssDate").addClass('border-danger');
                            $("#dateEditIntAuditFindIssDate").attr('title', JsonObject['error']['audit_findings_issued_date']);
                        }
                        else{
                            $("#dateEditIntAuditFindIssDate").removeClass('border-danger');
                            $("#dateEditIntAuditFindIssDate").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission'] != undefined){
                            $("#dateEditIntAuditDeadSub").addClass('border-danger');
                            $("#dateEditIntAuditDeadSub").attr('title', JsonObject['error']['deadline_of_submission']);
                        }
                        else{
                            $("#dateEditIntAuditDeadSub").removeClass('border-danger');
                            $("#dateEditIntAuditDeadSub").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission_days'] != undefined){
                            $("#txtEditIntAuditDeadSubDays").addClass('border-danger');
                            $("#txtEditIntAuditDeadSubDays").attr('title', JsonObject['error']['deadline_of_submission_days']);
                        }
                        else{
                            $("#txtEditIntAuditDeadSubDays").removeClass('border-danger');
                            $("#txtEditIntAuditDeadSubDays").removeAttr('title');
                        }

                        if(JsonObject['error']['actual_date_of_submission'] != undefined){
                            $("#dateEditIntAuditActDateSub").addClass('border-danger');
                            $("#dateEditIntAuditActDateSub").attr('title', JsonObject['error']['actual_date_of_submission']);
                        }
                        else{
                            $("#dateEditIntAuditActDateSub").removeClass('border-danger');
                            $("#dateEditIntAuditActDateSub").removeAttr('title');
                        }

                        if(JsonObject['error']['iso_iatf_clause'] != undefined){
                            $("#txtEditIntAuditIsoAitfClause").addClass('border-danger');
                            $("#txtEditIntAuditIsoAitfClause").attr('title', JsonObject['error']['iso_iatf_clause']);
                        }
                        else{
                            $("#txtEditIntAuditIsoAitfClause").removeClass('border-danger');
                            $("#txtEditIntAuditIsoAitfClause").removeAttr('title');
                        }

                        if(JsonObject['error']['statement_of_findings'] != undefined){
                            $("#txtEditIntAuditStmtOfFin").addClass('border-danger');
                            $("#txtEditIntAuditStmtOfFin").attr('title', JsonObject['error']['statement_of_findings']);
                        }
                        else{
                            $("#txtEditIntAuditStmtOfFin").removeClass('border-danger');
                            $("#txtEditIntAuditStmtOfFin").removeAttr('title');
                        }

                        if(JsonObject['error']['illustration'] != undefined){
                            $("#txtEditIntAuditIllu").addClass('border-danger');
                            $("#txtEditIntAuditIllu").attr('title', JsonObject['error']['illustration']);
                        }
                        else{
                            $("#txtEditIntAuditIllu").removeClass('border-danger');
                            $("#txtEditIntAuditIllu").removeAttr('title');
                        }

                        if(JsonObject['error']['img_illustration'] != undefined){
                            $("#fileEditIntAuditIllu").addClass('border-danger');
                            $("#filEditIntAuditIllu").attr('title', JsonObject['error']['img_illustration']);
                        }
                        else{
                            $("#filEditIntAuditIllu").removeClass('border-danger');
                            $("#fileEditIntAuditIllu").removeAttr('title');
                        }

                        if(JsonObject['error']['corrective_action'] != undefined){
                            $("#txtEditIntAuditCorrAct").addClass('border-danger');
                            $("#txtEditIntAuditCorrAct").attr('title', JsonObject['error']['corrective_action']);
                        }
                        else{
                            $("#txtEditIntAuditCorrAct").removeClass('border-danger');
                            $("#txtEditIntAuditCorrAct").removeAttr('title');
                        }

                        if(JsonObject['error']['img_corrective_action'] != undefined){
                            $("#fileEditIntAuditCorrAct").addClass('border-danger');
                            $("#fileEditIntAuditCorrAct").attr('title', JsonObject['error']['img_corrective_action']);
                        }
                        else{
                            $("#fileEditIntAuditCorrAct").removeClass('border-danger');
                            $("#fileEditIntAuditCorrAct").removeAttr('title');
                        }
                    },
                    error: function(data, xhr, status){
                        console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                });
            });

        });

        // this function will not allow to save in another file because of image retrieval failure
        function GetIntAuditByIdToView(intAuditId){
            $.ajax({
                url: 'get_internal_audit_by_id',
                method: 'get',
                data: {
                    'internal_audit_id': intAuditId
                },
                dataType: 'json',
                beforeSend: function(){
                    
                },
                success: function(JsonObject){
                    $("#lblViewIntAuditType").text(JsonObject['internal_audits'][0]['audit_type']);
                    $("#lblViewIntAuditAuditors").text(JsonObject['internal_audits'][0]['auditors']);
                    $("#lblViewIntAuditAuditees").text(JsonObject['internal_audits'][0]['auditees']);
                    $("#lblViewIntAuditDate").text(JsonObject['internal_audits'][0]['audit_date']);
                    $("#lblViewIntAuditDeadSub").text(JsonObject['internal_audits'][0]['deadline_of_submission_days'] + ' Day(s) - ' + JsonObject['internal_audits'][0]['deadline_of_submission']);
                    $("#lblViewIntAuditActDateSub").text(JsonObject['internal_audits'][0]['actual_date_of_submission']);
                    $("#lblViewIntAuditFindIssDate").text(JsonObject['internal_audits'][0]['audit_findings_issued_date']);
                    $("#lblViewIntAuditRepConNo").text(JsonObject['internal_audits'][0]['audit_report_control_no']);
                    $("#lblViewIntAuditIsoAitfClause").text(JsonObject['internal_audits'][0]['iso_iatf_clause']);
                    $("#lblViewIntAuditClassRank").text(JsonObject['internal_audits'][0]['classification']);
                    $("#lblViewIntAuditCatOfFin").text(JsonObject['internal_audits'][0]['category_of_findings']);
                    $("#lblViewIntAuditBusProcSecSupp").text(JsonObject['internal_audits'][0]['business_process']);
                    $("#lblViewIntAuditStmtOfFin").text(JsonObject['internal_audits'][0]['statement_of_findings']);
                    $("#lblViewIntAuditIllu").text(JsonObject['internal_audits'][0]['illustration']);
                    // $("#lblViewIntAuditResDept").text(JsonObject['internal_audits'][0]['department'][0]['department_name']);

                    let resDept = "";
                    for(let index = 0; index < JsonObject['internal_audits'][0]['internal_departments'].length; index++){
                        resDept += JsonObject['internal_audits'][0]['internal_departments'][index]['departments'][0]['department_name'];
                        
                        if(index < JsonObject['internal_audits'][0]['internal_departments'].length - 1){
                            resDept += ", ";
                        }
                    }

                    $("#lblViewIntAuditResDept").text(resDept);

                    if(JsonObject['internal_audits'][0]['corrective_action'] != ""){
                      $("#lblViewIntAuditCorrAct").text(JsonObject['internal_audits'][0]['corrective_action']);
                    }
                    else {
                      $("#lblViewIntAuditCorrAct").text("---"); 
                    }

                    if(JsonObject['internal_audits'][0]['img_illustration'] != ""){
                        let imgIllulink = "{{ asset('public/storage/audit_result_images/internal/img') }}";
                        imgIllulink = imgIllulink.replace("img", JsonObject['internal_audits'][0]['img_illustration']);
                        $("#imgViewIntAuditIllu").attr('src', imgIllulink);
                    }
                    else{
                        $("#imgViewIntAuditIllu").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }
                    

                    if(JsonObject['internal_audits'][0]['img_corrective_action'] != "") {
                      let imgCorrActlink = "{{ asset('public/storage/audit_result_images/internal/img') }}";
                      imgCorrActlink = imgCorrActlink.replace("img", JsonObject['internal_audits'][0]['img_corrective_action']);
                      $("#imgViewIntAuditCorrAct").attr('src', imgCorrActlink);
                    }
                    else {
                      $("#imgViewIntAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}"); 
                    }


                    // $("#lblViewIntAuditAuditors").text(JsonObject['internal_audits'][0]['auditors']);

                    if(JsonObject['internal_audits'][0]['root_cause'] != null){
                        $("#lblViewIntAuditRootCause").text(JsonObject['internal_audits'][0]['root_cause']);
                    }
                    else{
                        $("#lblViewIntAuditRootCause").text("---");
                    }
                    if(JsonObject['internal_audits'][0]['improvement_action'] != null){
                        $("#lblViewIntAuditImpPlan").text(JsonObject['internal_audits'][0]['improvement_action']);
                    }
                    else{
                        $("#lblViewIntAuditImpPlan").text("---");
                    }
                    if(JsonObject['internal_audits'][0]['person_in_charge'] != null){
                        $("#lblViewIntAuditPerInCharge").text(JsonObject['internal_audits'][0]['person_in_charge']);
                    }
                    else{
                        $("#lblViewIntAuditPerInCharge").text("---");
                    }
                    if(JsonObject['internal_audits'][0]['commitment_date'] != null){
                        $("#lblViewIntAuditCommDate").text(JsonObject['internal_audits'][0]['commitment_date']);
                    }
                    else{
                        $("#lblViewIntAuditCommDate").text("---");
                    }

                    if(JsonObject['internal_audits'][0]['sending_stat'] == 1){
                        $("#lblViewIntAuditSendingStat").text('Pending');
                    }
                    else{
                        $("#lblViewIntAuditSendingStat").text('Done');
                    }
                    if(JsonObject['internal_audits'][0]['audit_stat'] == 1){
                        $("#lblViewIntAuditStat").text('For Improvement Plan');
                    }
                    else if(JsonObject['internal_audits'][0]['audit_stat'] == 2){
                        $("#lblViewIntAuditStat").text('For Corrective Action');
                    }
                    else{
                        $("#lblViewIntAuditStat").text('Closed');
                    }
                    $("#lblViewIntAuditCreatedBy").text(JsonObject['internal_audits'][0]['user_created_by']['name']);
                    $("#lblViewIntAuditLastUpdatedBy").text(JsonObject['internal_audits'][0]['user_last_updated_by']['name']);
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }

        // this function will not allow to save in another file because of image retrieval failure
        function GetIntAuditByIdToEdit(intAuditId){
            $.ajax({
                url: 'get_internal_audit_by_id',
                method: 'get',
                data: {
                    'internal_audit_id': intAuditId
                },
                dataType: 'json',
                beforeSend: function(){
                    
                },
                success: function(JsonObject){
                    $("#selEditIntAuditType").val(JsonObject['internal_audits'][0]['audit_type']);
                    $("#txtEditIntAuditAuditors").val(JsonObject['internal_audits'][0]['auditors']);
                    $("#txtEditIntAuditAuditees").val(JsonObject['internal_audits'][0]['auditees']);
                    $("#dateEditIntAuditDate").val(JsonObject['internal_audits'][0]['audit_date']);
                    $("#dateEditIntAuditDeadSub").val(JsonObject['internal_audits'][0]['deadline_of_submission'])
                    $("#txtEditIntAuditDeadSubDays").val(JsonObject['internal_audits'][0]['deadline_of_submission_days']);
                    $("#dateEditIntAuditActDateSub").val(JsonObject['internal_audits'][0]['actual_date_of_submission']);
                    $("#dateEditIntAuditFindIssDate").val(JsonObject['internal_audits'][0]['audit_findings_issued_date']);
                    $("#txtEditIntAuditRepContNo").val(JsonObject['internal_audits'][0]['audit_report_control_no']);
                    $("#txtEditIntAuditIsoAitfClause").val(JsonObject['internal_audits'][0]['iso_iatf_clause']);
                    $("#selEditIntAuditClassRank").val(JsonObject['internal_audits'][0]['classification']);
                    $("#selEditIntAuditCatOfFind").val(JsonObject['internal_audits'][0]['category_of_findings']);
                    $("#txtEditIntAuditBusProcSecSupp").val(JsonObject['internal_audits'][0]['business_process']);
                    $("#txtEditIntAuditStmtOfFin").val(JsonObject['internal_audits'][0]['statement_of_findings']);
                    $("#txtEditIntAuditIllu").val(JsonObject['internal_audits'][0]['illustration']);
                    $("#txtEditIntAuditCorrAct").val(JsonObject['internal_audits'][0]['corrective_action']);
                    // $("#selEditIntAuditResDept").val(JsonObject['internal_audits'][0]['responsible_department']).trigger('change');

                    let responsible_department = [];
                    for(let index = 0; index < JsonObject['internal_audits'][0]['internal_departments'].length; index++){
                        responsible_department.push(JsonObject['internal_audits'][0]['internal_departments'][index]['departments'][0].department_id);
                    }

                    $("#selEditIntAuditResDept").val(responsible_department).trigger('change');

                    if(JsonObject['internal_audits'][0]['img_illustration'] != ""){
                        let imgIllulink = "{{ asset('public/storage/audit_result_images/internal/img') }}";
                        imgIllulink = imgIllulink.replace("img", JsonObject['internal_audits'][0]['img_illustration']);
                        $("#imgEditIntAuditIllu").attr('src', imgIllulink);
                    }
                    else{
                        $("#imgEditIntAuditIllu").attr('src', "{{ asset('public/storage/image-icon.png') }}");   
                    }
                    
                    if(JsonObject['internal_audits'][0]['img_corrective_action'] != "") {
                        let imgCorrActlink = "{{ asset('public/storage/audit_result_images/internal/img') }}";
                        imgCorrActlink = imgCorrActlink.replace("img", JsonObject['internal_audits'][0]['img_corrective_action']);
                        $("#imgEditIntAuditCorrAct").attr('src', imgCorrActlink);
                    }
                    else {
                        $("#imgEditIntAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }

                    $("#txtEditIntAuditCurrIllu").val(JsonObject['internal_audits'][0]['img_illustration']);
                    $("#txtEditIntAuditCurrCorrAct").val(JsonObject['internal_audits'][0]['img_corrective_action']);

                    $("#dateEditIntAuditCreatedAt").val(JsonObject['internal_audits'][0]['created_at'].split(' ')[0]);
                    $("#dateEditIntAuditCurrDeadSub").val(JsonObject['internal_audits'][0]['deadline_of_submission']);

                    $("#txtEditIntAuditRootCause").val(JsonObject['internal_audits'][0]['root_cause']);
                    $("#txtEditIntAuditImpPlan").val(JsonObject['internal_audits'][0]['improvement_action']);
                    $("#txtEditIntAuditPerInCharge").val(JsonObject['internal_audits'][0]['person_in_charge']);
                    $("#txtEditIntAuditCommDate").val(JsonObject['internal_audits'][0]['commitment_date']);
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }

        // ---------- SUPPLIER AUDIT BATCH --------------
        let dataTableSupplierBatch;
        $(document).ready(function() {
            dataTableSupplierBatch = $("#tblSuppAuditBatch").DataTable({
                "order": [[ 0, "desc" ]],
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_supplier_batch_by_stat",
                    "data": function (param){
                        param.supplier_batch_stat = 0;
                    }
                },
                
                "columns":[
                    { "data" : "supplier_batch_id" },
                    { "data" : "supplier_batch_name" },
                    { "data" : "result_in_supplier_count" },
                    { "data" : "saving_stat_label" },
                    { "data" : "label1" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
            });//end of dataTableSupplierBatch

            $("#formAddSuppBatch").submit(function(event){
                event.preventDefault();
                AddSuppBatch();
            });

            $(document).on('click', '.aArchiveSuppBatch', function(){
                let supplierBatchId = $(this).attr('supplier-batch-id');
                $("#txtArchiveSuppBatchId").val(supplierBatchId);
            });

            $("#formArchiveSuppBatch").submit(function(event){
                event.preventDefault();
                ArchiveSuppBatch();
            });

            $(document).on('click', '.aRestoreSuppBatch', function(){
                let supplierBatchId = $(this).attr('supplier-batch-id');
                $("#txtRestoreSuppBatch").val(supplierBatchId);
            });

            $("#formRestoreSuppBatch").submit(function(event){
                event.preventDefault();
                RestoreSuppBatch();
            });

            $(document).on('click', '.aEditSuppBatch', function(){
                let supplierBatchId = $(this).attr('supplier-batch-id');
                $("#txtEditSuppBatchId").val(supplierBatchId);
                GetSuppBatchByIdToEdit(supplierBatchId);
            });

            $("#formEditSuppBatch").submit(function(event){
                event.preventDefault();
                EditSuppBatch();
            });

            $(document).on('click', '.aResultsSuppBatch', function(){
                let SuppAuditBatchId = $(this).attr('supplier-batch-id');
                $("#txtAddBatchIdSuppResInBatch").val(SuppAuditBatchId);
                supplier_batch_id = SuppAuditBatchId;
                dataTableSuppResInBatch.draw();
                dataTableSupplierAudits.draw();
                GetSuppBatchByIdToView(SuppAuditBatchId);
            });

            $(document).on('click', '.aAddToBatchSuppAudit', function(){
                let suppAuditId = $(this).attr('supplier-id');
                $("#txtAddSuppAuditInBatchId").val(suppAuditId);
            });

            $("#formAddSuppResInBatch").submit(function(event){
                event.preventDefault();
                AddSuppResInBatch();
            });

            $(document).on('click', '.aRemoveToBatchSuppAudit', function(){
                let suppAuditId = $(this).attr('supplier-id');
                let resInSuppBatch = $(this).attr('res-in-supplier-batch-id');
                $("#txtRemoveResInSuppBatch").val(resInSuppBatch);
                $("#txtRemoveSuppAuditInBatchId").val(suppAuditId);
            });

            $("#formRemoveSuppResInBatch").submit(function(event){
                event.preventDefault();
                RemoveSuppResInBatch();
            });
        });

        // ------------------ SUPPLIER AUDIT ------------------

        function readSuppImageUrl(input, imgElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  imgElement.attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        let dataTableSupplierAudits;

        let supplier_date_from = 0;
        let supplier_date_to = 0;
        let supplier_audit_type = 0;
        let supplier_classification = 0;
        let supplier_category_of_findings = 0;
        let supplier_responsible_department = 0;
        let supplier_audit_stat = 0;
        let supp_audit_report_control_no = 0;

        let dataTableSuppResInBatch;
        let supplier_batch_id = 0;

        $(document).ready(function() {
          dataTableSupplierAudits = $("#tblSupplierAuditResults").on( 'error.dt', function ( e, settings, techNote, message ) {
            Swal({
                  position: 'top-end',
                  type: 'error',
                  title: 'Supplier DataTable Failed!',
                  showConfirmButton: false,
                  timer: 1500,
                  customClass: 'swal-wide',
              });
          }).DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_single_supplier_audit",
                    "data": function (param){
                        param.date_from = supplier_date_from;
                        param.date_to = supplier_date_to;
                        param.audit_type = supplier_audit_type;
                        param.classification = supplier_classification;
                        param.category_of_findings = supplier_category_of_findings;
                        param.responsible_department = supplier_responsible_department;
                        param.audit_stat = supplier_audit_stat;
                        param.audit_report_control_no = supp_audit_report_control_no;
                    }
                },            
                "columns":[
                    { "data" : "formatted_audit_date" },
                    { "data" : "audit_type" },
                    { "data" : "auditors" },
                    { "data" : "audit_report_control_no" },
                    { "data" : "label1" },
                    // { "data" : "audit_stat" },
                    { "data" : "label2" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
            });//end of dataTableSupplierAudits

            dataTableSuppResInBatch = $("#tblSuppResInBatch").on( 'error.dt', function ( e, settings, techNote, message ) {
              Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Result Supplier In Batch DataTable Failed!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            }).DataTable({
                  "processing" : false,
                  "serverSide" : true,
                  "ajax" : {
                      url: "view_supplier_audit_in_batch",
                      "data": function (param){
                        param.supplier_batch_id = supplier_batch_id;
                      }
                  },
                  "columns":[
                      { "data" : "supplier_audit.iso_iatf_clause" },
                      { "data" : "supplier_audit.statement_of_findings" },
                      { "data" : "img_illustration_image" },
                      { "data" : "supplier_audit.improvement_action" },
                      { "data" : "supplier_audit.commitment_date" },
                      { "data" : "supplier_audit.person_in_charge" },
                      { "data" : "audit_stat_label" },
                      { "data" : "sending_stat_label" },
                      { "data" : "action1", orderable:false, searchable:false }
                  ],
                  "columnDefs": [ 
                    {
                      "targets": [3, 4, 5],
                      "data": null,
                      "defaultContent": "- - -"
                    } 
                  ]
              });//end of dataTableSupplierAudits

          GetDepartmentByStat(1, $("#selGenSuppRepResDept"));

            $("#formGenerateSuppReport").submit(function(event){
                event.preventDefault();
                if($("#dateGenSuppRepDateFrom").attr('disabled') != 'disabled' && $("#dateGenSuppRepDateFrom").val() != '') {
                    supplier_date_from = $("#dateGenSuppRepDateFrom").val();
                }
                else{
                    supplier_date_from = 0;
                }

                if($("#dateGenSuppRepDateTo").attr('disabled') != 'disabled' && $("#dateGenSuppRepDateTo").val() != '') {
                    supplier_date_to = $("#dateGenSuppRepDateTo").val();
                }
                else{
                    supplier_date_to = 0;
                }

                if($("#selGenSuppRepAuditType").attr('disabled') != 'disabled' && $("#selGenSuppRepAuditType").val() != '') {
                    supplier_audit_type = $("#selGenSuppRepAuditType").val();
                }
                else{
                    supplier_audit_type = 0;
                }

                if($("#selGenSuppRepClassification").attr('disabled') != 'disabled' && $("#selGenSuppRepClassification").val() != '') {
                    supplier_classification = $("#selGenSuppRepClassification").val();
                }
                else{
                    supplier_classification = 0;
                }

                if($("#selGenSuppRepCatOfFin").attr('disabled') != 'disabled' && $("#selGenSuppRepCatOfFin").val() != '') {
                    supplier_category_of_findings = $("#selGenSuppRepCatOfFin").val();
                }
                else{
                    supplier_category_of_findings = 0;
                }

                if($("#selGenSuppRepResDept").attr('disabled') != 'disabled' && $("#selGenSuppRepResDept").val() != '' && $("#selGenSuppRepResDept").val() != null) {
                    supplier_responsible_department = $("#selGenSuppRepResDept").val();
                }
                else{
                    supplier_responsible_department = 0;
                }

                if($("#selGenSuppRepAuditStat").attr('disabled') != 'disabled' && $("#selGenSuppRepAuditStat").val() != '' && $("#selGenSuppRepAuditStat").val() != null) {
                    supplier_audit_stat = $("#selGenSuppRepAuditStat").val();
                }
                else {
                    supplier_audit_stat = 0;
                }

                if($("#txtGenSuppRepCtrlNo").attr('disabled') != 'disabled' && $("#txtGenSuppRepCtrlNo").val() != '' && $("#txtGenSuppRepCtrlNo").val() != null) {
                    supp_audit_report_control_no = $("#txtGenSuppRepCtrlNo").val();
                }
                else {
                    supp_audit_report_control_no = 0;
                }
                // alert(audit_category);
                dataTableSupplierAudits.draw();
            });

            $("#chkGenSuppRepAuditDate").click(function() {
                if($(this).prop('checked')) {
                    // alert("Active");
                    $("#dateGenSuppRepDateFrom").removeAttr('disabled');
                    $("#dateGenSuppRepDateTo").removeAttr('disabled');
                }
                else{
                    // alert("Remove");
                    $("#dateGenSuppRepDateFrom").prop('disabled', 'disabled');
                    $("#dateGenSuppRepDateTo").prop('disabled', 'disabled');
                    $("#dateGenSuppRepDateFrom").val('');
                    $("#dateGenSuppRepDateTo").val('');
                }
            });

            $("#chkGenSuppRepAuditType").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenSuppRepAuditType").removeAttr('disabled');
                }
                else{
                    $("#selGenSuppRepAuditType").prop('disabled', 'disabled');
                    $("#selGenSuppRepAuditType").val('System');
                }
            });

            $("#chkGenSuppRepClassification").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenSuppRepClassification").removeAttr('disabled');
                }
                else{
                    $("#selGenSuppRepClassification").prop('disabled', 'disabled');
                    $("#selGenSuppRepClassification").val('NC');
                }
            });

            $("#chkGenSuppRepCatOfFin").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenSuppRepCatOfFin").removeAttr('disabled');
                }
                else{
                    $("#selGenSuppRepCatOfFin").prop('disabled', 'disabled');
                    $("#selGenSuppRepCatOfFin").val('RD');
                }
            });

            $("#chkGenSuppRepResDept").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenSuppRepResDept").removeAttr('disabled');
                }
                else{
                    $("#selGenSuppRepResDept").prop('disabled', 'disabled');
                }
            });

            $("#chkGenSuppRepAuditStat").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenSuppRepAuditStat").removeAttr('disabled');
                }
                else{
                    $("#selGenSuppRepAuditStat").prop('disabled', 'disabled');
                    $("#selGenSuppRepAuditStat").val('1');
                }
            });

            $("#chkGenSuppRepCtrlNo").click(function() {
                if($(this).prop('checked')) {
                    $("#txtGenSuppRepCtrlNo").removeAttr('disabled');
                    $("#txtGenSuppRepCtrlNo").val('');
                }
                else{
                    $("#txtGenSuppRepCtrlNo").prop('disabled', 'disabled');
                    $("#txtGenSuppRepCtrlNo").val('');
                }
            });

            $(document).on('click', '.aViewSuppAudit', function(){
                let suppAuditId = $(this).attr('supplier-id');
                GetSuppAuditByIdToView(suppAuditId);
            });

            $(document).on('click', '.aEditSupp', function(){
                let suppAuditId = $(this).attr('supplier-id');
                $("#txtEditSuppAuditId").val(suppAuditId);
                GetSuppAuditByIdToEdit(suppAuditId);
            });

            $("#formEditSuppAudit").submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'edit_supplier_audit',
                    method: 'post',
                    data: new FormData(this),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        // alert('Loading...');
                    },
                    success: function(JsonObject){
                        // alert(JSON.stringify(JsonObject));
                        if(JsonObject['result'] == 1){
                            $("#modalEditSuppAudit").modal('hide');
                            $("#formEditSuppAudit")[0].reset();
                            $('#imgEditSuppAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            $('#imgEditSuppAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            dataTableSupplierAudits.draw();

                            $("#selEditSuppAuditType").removeClass('border-danger');
                            $("#selEditSuppAuditType").removeAttr('title');
                            $("#dateEditSuppAuditDate").removeClass('border-danger');
                            $("#dateEditSuppAuditDate").removeAttr('title');
                            $("#txtEditSuppAuditBusProcSecSupp").removeClass('border-danger');
                            $("#txtEditSuppAuditBusProcSecSupp").removeAttr('title');
                            $("#txtEditSuppAuditAuditors").removeClass('border-danger');
                            $("#txtEditSuppAuditAuditors").removeAttr('title');
                            $("#txtEditSuppAuditAuditees").removeClass('border-danger');
                            $("#txtEditSuppAuditAuditees").removeAttr('title');
                            $("#txtEditSuppAuditRepContNo").removeClass('border-danger');
                            $("#txtEditSuppAuditRepContNo").removeAttr('title');
                            $("#selEditSuppAuditClassRank").removeClass('border-danger');
                            $("#selEditSuppAuditClassRank").removeAttr('title');
                            $("#selEditSuppAuditCatOfFind").removeClass('border-danger');
                            $("#selEditSuppAuditCatOfFind").removeAttr('title');
                            $("#dateEditSuppAuditFindIssDate").removeClass('border-danger');
                            $("#dateEditSuppAuditFindIssDate").removeAttr('title');
                            $("#dateEditSuppAuditDeadSub").removeClass('border-danger');
                            $("#dateEditSuppAuditDeadSub").removeAttr('title');
                            $("#txtEditSuppAuditDeadSubDays").removeClass('border-danger');
                            $("#txtEditSuppAuditDeadSubDays").removeAttr('title');
                            $("#dateEditSuppAuditActDateSub").removeClass('border-danger');
                            $("#dateEditSuppAuditActDateSub").removeAttr('title');
                            $("#txtEditSuppAuditIsoAitfClause").removeClass('border-danger');
                            $("#txtEditSuppAuditIsoAitfClause").removeAttr('title');
                            $("#txtEditSuppAuditStmtOfFin").removeClass('border-danger');
                            $("#txtEditSuppAuditStmtOfFin").removeAttr('title');
                            $("#txtEditSuppAuditIllu").removeClass('border-danger');
                            $("#txtEditSuppAuditIllu").removeAttr('title');
                            $("#filEditSuppAuditIllu").removeClass('border-danger');
                            $("#fileEditSuppAuditIllu").removeAttr('title');
                            $("#txtEditSuppAuditCorrAct").removeClass('border-danger');
                            $("#txtEditSuppAuditCorrAct").removeAttr('title');
                            $("#fileEditSuppAuditCorrAct").removeClass('border-danger');
                            $("#fileEditSuppAuditCorrAct").removeAttr('title');
                        }
                        else if(JsonObject['result'] == 0){
                            Swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Updating Failed!',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: 'swal-wide',
                            });
                        }
                        else if(JsonObject['upload_result'] == 0 && JsonObject['upload_result'] != 0){
                            Swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Uploading Failed!',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: 'swal-wide',
                            });
                        }

                        if(JsonObject['error']['audit_type'] != undefined){
                            $("#selEditSuppAuditType").addClass('border-danger');
                            $("#selEditSuppAuditType").attr('title', JsonObject['error']['audit_type']);
                        }
                        else{
                            $("#selEditSuppAuditType").removeClass('border-danger');
                            $("#selEditSuppAuditType").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_date'] != undefined){
                            $("#dateEditSuppAuditDate").addClass('border-danger');
                            $("#dateEditSuppAuditDate").attr('title', JsonObject['error']['audit_date']);
                        }
                        else{
                            $("#dateEditSuppAuditDate").removeClass('border-danger');
                            $("#dateEditSuppAuditDate").removeAttr('title');
                        }

                        if(JsonObject['error']['business_process'] != undefined){
                            $("#txtEditSuppAuditBusProcSecSupp").addClass('border-danger');
                            $("#txtEditSuppAuditBusProcSecSupp").attr('title', JsonObject['error']['business_process']);
                        }
                        else{
                            $("#txtEditSuppAuditBusProcSecSupp").removeClass('border-danger');
                            $("#txtEditSuppAuditBusProcSecSupp").removeAttr('title');
                        }

                        if(JsonObject['error']['auditors'] != undefined){
                            $("#txtEditSuppAuditAuditors").addClass('border-danger');
                            $("#txtEditSuppAuditAuditors").attr('title', JsonObject['error']['auditors']);
                        }
                        else{
                            $("#txtEditSuppAuditAuditors").removeClass('border-danger');
                            $("#txtEditSuppAuditAuditors").removeAttr('title');
                        }

                        if(JsonObject['error']['auditees'] != undefined){
                            $("#txtEditSuppAuditAuditees").addClass('border-danger');
                            $("#txtEditSuppAuditAuditees").attr('title', JsonObject['error']['auditees']);
                        }
                        else{
                            $("#txtEditSuppAuditAuditees").removeClass('border-danger');
                            $("#txtEditSuppAuditAuditees").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_report_control_no'] != undefined){
                            $("#txtEditSuppAuditRepContNo").addClass('border-danger');
                            $("#txtEditSuppAuditRepContNo").attr('title', JsonObject['error']['audit_report_control_no']);
                        }
                        else{
                            $("#txtEditSuppAuditRepContNo").removeClass('border-danger');
                            $("#txtEditSuppAuditRepContNo").removeAttr('title');
                        }

                        if(JsonObject['error']['classification'] != undefined){
                            $("#selEditSuppAuditClassRank").addClass('border-danger');
                            $("#selEditSuppAuditClassRank").attr('title', JsonObject['error']['classification']);
                        }
                        else{
                            $("#selEditSuppAuditClassRank").removeClass('border-danger');
                            $("#selEditSuppAuditClassRank").removeAttr('title');
                        }

                        if(JsonObject['error']['category_of_findings'] != undefined){
                            $("#selEditSuppAuditCatOfFind").addClass('border-danger');
                            $("#selEditSuppAuditCatOfFind").attr('title', JsonObject['error']['category_of_findings']);
                        }
                        else{
                            $("#selEditSuppAuditCatOfFind").removeClass('border-danger');
                            $("#selEditSuppAuditCatOfFind").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_findings_issued_date'] != undefined){
                            $("#dateEditSuppAuditFindIssDate").addClass('border-danger');
                            $("#dateEditSuppAuditFindIssDate").attr('title', JsonObject['error']['audit_findings_issued_date']);
                        }
                        else{
                            $("#dateEditSuppAuditFindIssDate").removeClass('border-danger');
                            $("#dateEditSuppAuditFindIssDate").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission'] != undefined){
                            $("#dateEditSuppAuditDeadSub").addClass('border-danger');
                            $("#dateEditSuppAuditDeadSub").attr('title', JsonObject['error']['deadline_of_submission']);
                        }
                        else{
                            $("#dateEditSuppAuditDeadSub").removeClass('border-danger');
                            $("#dateEditSuppAuditDeadSub").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission_days'] != undefined){
                            $("#txtEditSuppAuditDeadSubDays").addClass('border-danger');
                            $("#txtEditSuppAuditDeadSubDays").attr('title', JsonObject['error']['deadline_of_submission_days']);
                        }
                        else{
                            $("#txtEditSuppAuditDeadSubDays").removeClass('border-danger');
                            $("#txtEditSuppAuditDeadSubDays").removeAttr('title');
                        }

                        if(JsonObject['error']['actual_date_of_submission'] != undefined){
                            $("#dateEditSuppAuditActDateSub").addClass('border-danger');
                            $("#dateEditSuppAuditActDateSub").attr('title', JsonObject['error']['actual_date_of_submission']);
                        }
                        else{
                            $("#dateEditSuppAuditActDateSub").removeClass('border-danger');
                            $("#dateEditSuppAuditActDateSub").removeAttr('title');
                        }

                        if(JsonObject['error']['iso_iatf_clause'] != undefined){
                            $("#txtEditSuppAuditIsoAitfClause").addClass('border-danger');
                            $("#txtEditSuppAuditIsoAitfClause").attr('title', JsonObject['error']['iso_iatf_clause']);
                        }
                        else{
                            $("#txtEditSuppAuditIsoAitfClause").removeClass('border-danger');
                            $("#txtEditSuppAuditIsoAitfClause").removeAttr('title');
                        }

                        if(JsonObject['error']['statement_of_findings'] != undefined){
                            $("#txtEditSuppAuditStmtOfFin").addClass('border-danger');
                            $("#txtEditSuppAuditStmtOfFin").attr('title', JsonObject['error']['statement_of_findings']);
                        }
                        else{
                            $("#txtEditSuppAuditStmtOfFin").removeClass('border-danger');
                            $("#txtEditSuppAuditStmtOfFin").removeAttr('title');
                        }

                        if(JsonObject['error']['illustration'] != undefined){
                            $("#txtEditSuppAuditIllu").addClass('border-danger');
                            $("#txtEditSuppAuditIllu").attr('title', JsonObject['error']['illustration']);
                        }
                        else{
                            $("#txtEditSuppAuditIllu").removeClass('border-danger');
                            $("#txtEditSuppAuditIllu").removeAttr('title');
                        }

                        if(JsonObject['error']['img_illustration'] != undefined){
                            $("#fileEditSuppAuditIllu").addClass('border-danger');
                            $("#filEditSuppAuditIllu").attr('title', JsonObject['error']['img_illustration']);
                        }
                        else{
                            $("#filEditSuppAuditIllu").removeClass('border-danger');
                            $("#fileEditSuppAuditIllu").removeAttr('title');
                        }

                        if(JsonObject['error']['corrective_action'] != undefined){
                            $("#txtEditSuppAuditCorrAct").addClass('border-danger');
                            $("#txtEditSuppAuditCorrAct").attr('title', JsonObject['error']['corrective_action']);
                        }
                        else{
                            $("#txtEditSuppAuditCorrAct").removeClass('border-danger');
                            $("#txtEditSuppAuditCorrAct").removeAttr('title');
                        }

                        if(JsonObject['error']['img_corrective_action'] != undefined){
                            $("#fileEditSuppAuditCorrAct").addClass('border-danger');
                            $("#fileEditSuppAuditCorrAct").attr('title', JsonObject['error']['img_corrective_action']);
                        }
                        else{
                            $("#fileEditSuppAuditCorrAct").removeClass('border-danger');
                            $("#fileEditSuppAuditCorrAct").removeAttr('title');
                        }
                    },
                    error: function(data, xhr, status){
                        console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                });
            });

            $("#btnSaveAsDraftSuppBatch").click(function(){
              SuppBatchSaveByStat(supplier_batch_id, 1, "{{ csrf_token() }}");
            });

            $("#btnSaveAndSendSuppBatch").click(function(){
              SuppBatchSaveByStat(supplier_batch_id, 2, "{{ csrf_token() }}");
            });

        });

        // this function will not allow to save in another file because of image retrieval failure
        function GetSuppAuditByIdToView(suppAuditId){
            $.ajax({
                url: 'get_supplier_audit_by_id',
                method: 'get',
                data: {
                    'supplier_audit_id': suppAuditId
                },
                dataType: 'json',
                beforeSend: function(){
                    
                },
                success: function(JsonObject){
                    $("#lblViewSuppAuditType").text(JsonObject['supplier_audits'][0]['audit_type']);
                    $("#lblViewSuppAuditAuditors").text(JsonObject['supplier_audits'][0]['auditors']);
                    $("#lblViewSuppAuditAuditees").text(JsonObject['supplier_audits'][0]['auditees']);
                    $("#lblViewSuppAuditDate").text(JsonObject['supplier_audits'][0]['audit_date']);
                    $("#lblViewSuppAuditDeadSub").text(JsonObject['supplier_audits'][0]['deadline_of_submission_days'] + ' Day(s) - ' + JsonObject['supplier_audits'][0]['deadline_of_submission']);
                    $("#lblViewSuppAuditActDateSub").text(JsonObject['supplier_audits'][0]['actual_date_of_submission']);
                    $("#lblViewSuppAuditFindIssDate").text(JsonObject['supplier_audits'][0]['audit_findings_issued_date']);
                    $("#lblViewSuppAuditRepConNo").text(JsonObject['supplier_audits'][0]['audit_report_control_no']);
                    $("#lblViewSuppAuditIsoAitfClause").text(JsonObject['supplier_audits'][0]['iso_iatf_clause']);
                    $("#lblViewSuppAuditClassRank").text(JsonObject['supplier_audits'][0]['classification']);
                    $("#lblViewSuppAuditCatOfFin").text(JsonObject['supplier_audits'][0]['category_of_findings']);
                    $("#lblViewSuppAuditBusProcSecSupp").text(JsonObject['supplier_audits'][0]['business_process']);
                    $("#lblViewSuppAuditStmtOfFin").text(JsonObject['supplier_audits'][0]['statement_of_findings']);
                    $("#lblViewSuppAuditIllu").text(JsonObject['supplier_audits'][0]['illustration']);
                    // $("#lblViewSuppAuditResDept").text(JsonObject['supplier_audits'][0]['department'][0]['department_name']);

                    let resDept = "";
                    for(let index = 0; index < JsonObject['supplier_audits'][0]['supplier_departments'].length; index++){
                        resDept += JsonObject['supplier_audits'][0]['supplier_departments'][index]['departments'][0]['department_name'];
                        
                        if(index < JsonObject['supplier_audits'][0]['supplier_departments'].length - 1){
                            resDept += ", ";
                        }
                    }

                    $("#lblViewSuppAuditResDept").text(resDept);

                    if(JsonObject['supplier_audits'][0]['corrective_action'] != ""){
                      $("#lblViewSuppAuditCorrAct").text(JsonObject['supplier_audits'][0]['corrective_action']);
                    }
                    else {
                      $("#lblViewSuppAuditCorrAct").text("---"); 
                    }

                    if(JsonObject['supplier_audits'][0]['img_illustration'] != ""){
                        let imgIllulink = "{{ asset('public/storage/audit_result_images/supplier/img') }}";
                        imgIllulink = imgIllulink.replace("img", JsonObject['supplier_audits'][0]['img_illustration']);
                        $("#imgViewSuppAuditIllu").attr('src', imgIllulink);
                    }
                    else{
                        $("#imgViewSuppAuditIllu").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }
                    

                    if(JsonObject['supplier_audits'][0]['img_corrective_action'] != "") {
                      let imgCorrActlink = "{{ asset('public/storage/audit_result_images/supplier/img') }}";
                      imgCorrActlink = imgCorrActlink.replace("img", JsonObject['supplier_audits'][0]['img_corrective_action']);
                      $("#imgViewSuppAuditCorrAct").attr('src', imgCorrActlink);
                    }
                    else {
                      $("#imgViewSuppAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}"); 
                    }


                    // $("#lblViewSuppAuditAuditors").text(JsonObject['supplier_audits'][0]['auditors']);

                    if(JsonObject['supplier_audits'][0]['root_cause'] != null){
                        $("#lblViewSuppAuditRootCause").text(JsonObject['supplier_audits'][0]['root_cause']);
                    }
                    else{
                        $("#lblViewSuppAuditRootCause").text("---");
                    }
                    if(JsonObject['supplier_audits'][0]['improvement_action'] != null){
                        $("#lblViewSuppAuditImpPlan").text(JsonObject['supplier_audits'][0]['improvement_action']);
                    }
                    else{
                        $("#lblViewSuppAuditImpPlan").text("---");
                    }
                    if(JsonObject['supplier_audits'][0]['person_in_charge'] != null){
                        $("#lblViewSuppAuditPerInCharge").text(JsonObject['supplier_audits'][0]['person_in_charge']);
                    }
                    else{
                        $("#lblViewSuppAuditPerInCharge").text("---");
                    }
                    if(JsonObject['supplier_audits'][0]['commitment_date'] != null){
                        $("#lblViewSuppAuditCommDate").text(JsonObject['supplier_audits'][0]['commitment_date']);
                    }
                    else{
                        $("#lblViewSuppAuditCommDate").text("---");
                    }

                    if(JsonObject['supplier_audits'][0]['sending_stat'] == 1){
                        $("#lblViewSuppAuditSendingStat").text('Pending');
                    }
                    else{
                        $("#lblViewSuppAuditSendingStat").text('Done');
                    }
                    if(JsonObject['supplier_audits'][0]['audit_stat'] == 1){
                        $("#lblViewSuppAuditStat").text('For Improvement Plan');
                    }
                    else if(JsonObject['supplier_audits'][0]['audit_stat'] == 2){
                        $("#lblViewSuppAuditStat").text('For Corrective Action');
                    }
                    else{
                        $("#lblViewSuppAuditStat").text('Closed');
                    }
                    $("#lblViewSuppAuditCreatedBy").text(JsonObject['supplier_audits'][0]['user_created_by']['name']);
                    $("#lblViewSuppAuditLastUpdatedBy").text(JsonObject['supplier_audits'][0]['user_last_updated_by']['name']);
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }
    </script>
@endsection