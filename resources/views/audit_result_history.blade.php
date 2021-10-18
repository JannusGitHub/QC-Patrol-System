@extends('layouts.master_layout')
@section('title', 'Audit Result History')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Audit Result History</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Audit Result History
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

          <!-- MODALS -->
          <!-- ------------------------ CUSTOMER AUDIT -------------- -->
            <!-- Modal View TUV Audit -->
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
                                                    <img id="imgViewTUVAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
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

            <!-- ------------------------ CUSTOMER AUDIT -------------- -->

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
                                                    <img id="imgViewCusAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
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
                                                    <img id="imgViewCusAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
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

            <!-- ------------------------ INTERNAL AUDIT -------------- -->
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
                                                    <img id="imgViewIntAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
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
                                                    <img id="imgViewIntAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
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

            <!-- ------------------------ SUPPLIER AUDIT -------------- -->
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
                                                    <img id="imgViewSuppAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
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
                                                    <img id="imgViewSuppAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
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
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection

@section('js_content')
    <script type="text/javascript">
        // ------------------ TUV AUDIT ------------------
        let dataTableTUVAudits;


        $(document).ready(function(){            
            dataTableTUVAudits = $("#tblTUVAuditResults").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_tuv_audit_history",
                    // "data": function (param){
                    //     param.audit_stat = 1;
                    // }
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
            
            $(document).on('click', '.aViewTUVAudit', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                GetTUVAuditByIdToView(tuvAuditId);
            });
        });

        // this function will not allow to save in another file because of image retrieval
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
                    $("#lblViewTUVAuditResDept").text(JsonObject['tuv_audits'][0]['department_name']);
                    $("#lblViewTUVAuditStmtOfNC").text(JsonObject['tuv_audits'][0]['statement_of_nc']);
                    $("#lblViewTUVAuditObjEvi").text(JsonObject['tuv_audits'][0]['objective_evidence']);
                    
                    var imglink = "{{ asset('public/storage/audit_result_images/tuv/img') }}";
                    imglink = imglink.replace("img", JsonObject['tuv_audits'][0]['img_corrective_action']);
                    $("#imgViewTUVAuditCorrAct").attr('src', imglink);

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
                        $("#lblViewTUVAuditAuditStat").text('Open');
                    }
                    else{
                        $("#lblViewTUVAuditAuditStat").text('Closed');
                    }
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }


        // ------------------ CUSTOMER AUDIT ------------------
        let dataTableCusAudits;

        $(document).ready(function() {
            dataTableCusAudits = $("#tblCusAuditResults").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_customer_audit_history",
                    // "data": function (param){
                    //     param.audit_stat = 1;
                    // }
                },            
                "columns":[
                    { "data" : "customer_name" },
                    { "data" : "audit_date" },
                    { "data" : "auditors" },
                    { "data" : "label1" },
                    { "data" : "label2" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
            });//end of dataTableCusAudits

            $(document).on('click', '.aViewCusAudit', function(){
                let cusAuditId = $(this).attr('customer-id');
                GetCusAuditByIdToView(cusAuditId);
            });
        });

        // this function will not allow to save in another file because of image retrieval
        function GetCusAuditByIdToView(cusAuditId){
            $.ajax({
                url: 'get_customer_audit_by_id',
                method: 'get',
                data: {
                    'customer_audit_id': cusAuditId
                },
                dataType: 'json',
                beforeSend: function(){
                    $("#imgViewCusAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    
                },
                success: function(JsonObject){
                    $("#lblViewCusAuditCusName").text(JsonObject['customer_audits'][0]['customer_name']);
                    $("#lblViewCusAuditAuditors").text(JsonObject['customer_audits'][0]['auditors']);
                    $("#lblViewCusAuditProcess").text(JsonObject['customer_audits'][0]['process']);
                    $("#lblViewCusAuditDate").text(JsonObject['customer_audits'][0]['audit_date']);
                    $("#lblViewCusAuditDeadSub").text(JsonObject['customer_audits'][0]['deadline_of_submission_days'] + ' Day(s) - ' + JsonObject['customer_audits'][0]['deadline_of_submission']);
                    $("#lblViewCusAuditActDateSub").text(JsonObject['customer_audits'][0]['actual_date_of_submission']);
                    $("#lblViewCusAuditEvalItem").text(JsonObject['customer_audits'][0]['evaluation_item']);
                    $("#lblViewCusAuditClassRank").text(JsonObject['customer_audits'][0]['classification']);
                    $("#lblViewCusAuditResGroup").text(JsonObject['customer_audits'][0]['responsible_group']);
                    $("#lblViewCusAuditResDept").text(JsonObject['customer_audits'][0]['department_name']);
                    $("#lblViewCusAuditResStmtOfFin").text(JsonObject['customer_audits'][0]['statement_of_findings']);
                    $("#lblViewCusAuditIllu").text(JsonObject['customer_audits'][0]['illustration']);
                    $("#lblViewCusAuditCorrAct").text(JsonObject['customer_audits'][0]['corrective_action']);

                    let imgIllulink = "{{ asset('public/storage/audit_result_images/customer/img') }}";
                    imgIllulink = imgIllulink.replace("img", JsonObject['customer_audits'][0]['img_illustration']);
                    $("#imgViewCusAuditIllu").attr('src', imgIllulink);
                    
                    let imgCorrActlink = "{{ asset('public/storage/audit_result_images/customer/img') }}";
                    imgCorrActlink = imgCorrActlink.replace("img", JsonObject['customer_audits'][0]['img_corrective_action']);
                    $("#imgViewCusAuditCorrAct").attr('src', imgCorrActlink);


                    // $("#lblViewCusAuditAuditors").text(JsonObject['customer_audits'][0]['auditors']);

                    if(JsonObject['customer_audits'][0]['root_cause'] != null){
                        $("#lblViewCusAuditRootCause").text(JsonObject['customer_audits'][0]['root_cause']);
                    }
                    else{
                        $("#lblViewCusAuditRootCause").text("---");
                    }
                    if(JsonObject['customer_audits'][0]['improvement_plan'] != null){
                        $("#lblViewCusAuditImpPlan").text(JsonObject['customer_audits'][0]['improvement_plan']);
                    }
                    else{
                        $("#lblViewCusAuditImpPlan").text("---");
                    }
                    if(JsonObject['customer_audits'][0]['person_in_charge'] != null){
                        $("#lblViewCusAuditPerInCharge").text(JsonObject['customer_audits'][0]['person_in_charge']);
                    }
                    else{
                        $("#lblViewCusAuditPerInCharge").text("---");
                    }
                    if(JsonObject['customer_audits'][0]['commitment_date'] != null){
                        $("#lblViewCusAuditCommDate").text(JsonObject['customer_audits'][0]['commitment_date']);
                    }
                    else{
                        $("#lblViewCusAuditCommDate").text("---");
                    }

                    if(JsonObject['customer_audits'][0]['sending_stat'] == 1){
                        $("#lblViewCusAuditSendingStat").text('Pending');
                    }
                    else{
                        $("#lblViewCusAuditSendingStat").text('Done');
                    }
                    if(JsonObject['customer_audits'][0]['audit_stat'] == 1){
                        $("#lblViewCusAuditStat").text('Open');
                    }
                    else{
                        $("#lblViewCusAuditStat").text('Closed');
                    }
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }

        // ------------------ INTERNAL AUDIT ------------------
        let dataTableInternalAudits;

        $(document).ready(function() {
            dataTableInternalAudits = $("#tblInternalAuditResults").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_internal_audit_history",
                    // "data": function (param){
                    //     param.audit_stat = 1;
                    // }
                },            
                "columns":[
                    { "data" : "audit_date" },
                    { "data" : "audit_type" },
                    { "data" : "auditors" },
                    { "data" : "label1" },
                    { "data" : "label2" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
            });//end of dataTableInternalAudits

            $(document).on('click', '.aViewIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');
                GetIntAuditByIdToView(intAuditId);
            });
        });

        // this function will not allow to save in another file because of image retrieval
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
                    $("#lblViewIntAuditResDept").text(JsonObject['internal_audits'][0]['department_name']);
                    $("#lblViewIntAuditBusProcSecSupp").text(JsonObject['internal_audits'][0]['business_process']);
                    $("#lblViewIntAuditStmtOfFin").text(JsonObject['internal_audits'][0]['statement_of_findings']);
                    $("#lblViewIntAuditIllu").text(JsonObject['internal_audits'][0]['illustration']);
                    $("#lblViewIntAuditCorrAct").text(JsonObject['internal_audits'][0]['corrective_action']);

                    let imgIllulink = "{{ asset('public/storage/audit_result_images/internal/img') }}";
                    imgIllulink = imgIllulink.replace("img", JsonObject['internal_audits'][0]['img_illustration']);
                    $("#imgViewIntAuditIllu").attr('src', imgIllulink);
                    
                    let imgCorrActlink = "{{ asset('public/storage/audit_result_images/internal/img') }}";
                    imgCorrActlink = imgCorrActlink.replace("img", JsonObject['internal_audits'][0]['img_corrective_action']);
                    $("#imgViewIntAuditCorrAct").attr('src', imgCorrActlink);


                    // $("#lblViewIntAuditAuditors").text(JsonObject['internal_audits'][0]['auditors']);

                    if(JsonObject['internal_audits'][0]['root_cause'] != null){
                        $("#lblViewIntAuditRootCause").text(JsonObject['internal_audits'][0]['root_cause']);
                    }
                    else{
                        $("#lblViewIntAuditRootCause").text("---");
                    }
                    if(JsonObject['internal_audits'][0]['improvement_plan'] != null){
                        $("#lblViewIntAuditImpPlan").text(JsonObject['internal_audits'][0]['improvement_plan']);
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
                        $("#lblViewIntAuditStat").text('Open');
                    }
                    else{
                        $("#lblViewIntAuditStat").text('Closed');
                    }
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }


        // ------------------ SUPPLIER AUDIT ------------------
        let dataTableSupplierAudits;

        $(document).ready(function() {
            dataTableSupplierAudits = $("#tblSupplierAuditResults").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_supplier_audit_history",
                    // "data": function (param){
                    //     param.audit_stat = 1;
                    // }
                },            
                "columns":[
                    { "data" : "audit_date" },
                    { "data" : "audit_type" },
                    { "data" : "auditors" },
                    { "data" : "label1" },
                    { "data" : "label2" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
            });//end of dataTableSupplierAudits

            $(document).on('click', '.aViewSuppAudit', function(){
                let suppAuditId = $(this).attr('supplier-id');
                GetSuppAuditByIdToView(suppAuditId);
            });
        });

        // this function will not allow to save in another file because of image retrieval
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
                    $("#lblViewSuppAuditResDept").text(JsonObject['supplier_audits'][0]['department_name']);
                    $("#lblViewSuppAuditBusProcSecSupp").text(JsonObject['supplier_audits'][0]['business_process']);
                    $("#lblViewSuppAuditStmtOfFin").text(JsonObject['supplier_audits'][0]['statement_of_findings']);
                    $("#lblViewSuppAuditIllu").text(JsonObject['supplier_audits'][0]['illustration']);
                    $("#lblViewSuppAuditCorrAct").text(JsonObject['supplier_audits'][0]['corrective_action']);

                    let imgIllulink = "{{ asset('public/storage/audit_result_images/supplier/img') }}";
                    imgIllulink = imgIllulink.replace("img", JsonObject['supplier_audits'][0]['img_illustration']);
                    $("#imgViewSuppAuditIllu").attr('src', imgIllulink);
                    
                    let imgCorrActlink = "{{ asset('public/storage/audit_result_images/supplier/img') }}";
                    imgCorrActlink = imgCorrActlink.replace("img", JsonObject['supplier_audits'][0]['img_corrective_action']);
                    $("#imgViewSuppAuditCorrAct").attr('src', imgCorrActlink);


                    // $("#lblViewSuppAuditAuditors").text(JsonObject['supplier_audits'][0]['auditors']);

                    if(JsonObject['supplier_audits'][0]['root_cause'] != null){
                        $("#lblViewSuppAuditRootCause").text(JsonObject['supplier_audits'][0]['root_cause']);
                    }
                    else{
                        $("#lblViewSuppAuditRootCause").text("---");
                    }
                    if(JsonObject['supplier_audits'][0]['improvement_plan'] != null){
                        $("#lblViewSuppAuditImpPlan").text(JsonObject['supplier_audits'][0]['improvement_plan']);
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
                        $("#lblViewSuppAuditStat").text('Open');
                    }
                    else{
                        $("#lblViewSuppAuditStat").text('Closed');
                    }
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }
    </script>
@endsection