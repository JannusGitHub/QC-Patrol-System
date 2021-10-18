@extends('layouts.qc_patrol_layout')
@section('title', 'Audit Result')

@section('content')

    <style type="text/css">
      table{
        color: black;
      }

      table.table tbody td{
          /*background-color: black;*/
          /*padding-top: 3px; 
          padding-bottom: 1px;*/
          padding: 1px 1px;
          margin: 1px 1px;
          font-size: 12px;
      }

      table .btn-actions{
          margin-bottom: 5px;
          width: 15px;
      }

      table.table thead th{
          /*background-color: black;*/
          padding-top: 5px; 
          padding-bottom: 5px;
          padding-right: 5px;
          padding-left: 5px;
          font-size: 14px;
          text-align: center;
          white-space:nowrap;
          padding: 1px 1px;
          margin: 1px 1px;
      }

      div.dataTables_wrapper{
          margin: 0 auto;
      }

      .custom-modal-xl {
          min-width: 90% !important;
      }

      .custom-modal-md {
          min-width: 70% !important;
      }
    </style>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Audit Result</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Audit Result
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
                                  <a class="nav-link active" id="linkTabLayer1" data-toggle="tab" href="#tabLayer1" aria-controls="active" aria-expanded="true">Layer 1</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="linkTabLayer2" data-toggle="tab" href="#tabLayer2" aria-controls="link" aria-expanded="false">Layer 2</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="linkTabLayer3" data-toggle="tab" href="#tabLayer3" aria-controls="linkOpt">Layer 3</a>
                                </li>
                              </ul>
                              <div class="tab-content px-1 pt-1">
                                <!-- LAYER 1 PANEL -->
                                <div role="tabpanel" class="tab-pane fade active in" id="tabLayer1" aria-labelledby="active-tab" aria-expanded="true">
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <div class="card-block">
                                          <div style="float: right;">
                                              <button class="btn btn-success btnShowSaveAuditResultModal" layer="1"><i class="icon-plus"></i> Add Audit Result</button>
                                          </div>
                                          <br><br>
                                          <div class="table-responsive">
                                              <table class="table table-bordered table-hover table-striped table-xs" id="tblAuditResultsLayer1" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th>Layer</th>
                                                          <th>Audit Date</th>
                                                          <th>Dep't / Section</th>
                                                          <th>Issued Date</th>
                                                          <th>Due Date</th>
                                                          <th>Checked By</th>
                                                          <th>Auditors</th>
                                                          <th>Auditees</th>
                                                          <th>Commendation</th>
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

                                <!-- LAYER 2 PANEL -->
                                <div role="tabpanel" class="tab-pane fade" id="tabLayer2" aria-labelledby="active-tab" aria-expanded="true">
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <div class="card-block">
                                          <div style="float: right;">
                                              <button class="btn btn-success btnShowSaveAuditResultModal" layer="2"><i class="icon-plus"></i> Add Audit Result</button>
                                          </div>
                                          <br><br>
                                          <div class="table-responsive">
                                              <table class="table table-bordered table-hover table-striped table-xs" id="tblAuditResultsLayer2" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th>Layer</th>
                                                          <th>Audit Date</th>
                                                          <th>Dep't / Section</th>
                                                          <th>Issued Date</th>
                                                          <th>Due Date</th>
                                                          <!-- <th>Checked By</th> -->
                                                          <th>Auditors</th>
                                                          <th>Auditees</th>
                                                          <th>Commendation</th>
                                                          <!-- <th>Status</th> -->
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

                                <!-- LAYER 3 PANEL -->
                                <div role="tabpanel" class="tab-pane fade" id="tabLayer3" aria-labelledby="active-tab" aria-expanded="true">
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <div class="card-block">
                                          <div style="float: right;">
                                              <button class="btn btn-success btnShowSaveAuditResultModal" layer="3"><i class="icon-plus"></i> Add Audit Result</button>
                                          </div>
                                          <br><br>
                                          <div class="table-responsive">
                                              <table class="table table-bordered table-hover table-striped table-xs" id="tblAuditResultsLayer3" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th>Layer</th>
                                                          <th>Audit Date</th>
                                                          <th>Dep't / Section</th>
                                                          <th>Issued Date</th>
                                                          <th>Due Date</th>
                                                          <!-- <th>Checked By</th> -->
                                                          <th>Auditors</th>
                                                          <th>Auditees</th>
                                                          <th>Commendation</th>
                                                          <!-- <th>Status</th> -->
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
                  </div>
              </div>
          </section>
          <!-- // Feather icons section end -->
        </div>
      </div>
    </div>

    <div class="modal fade text-xs-left" id="mdlSaveAuditResult" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog custom-modal-xl" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveAuditResult">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-info"></i> Audit Result Details</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Layer</label>
                              <input type="input" class="form-control form-control-sm audit-result-input" placeholder="Layer" name="layer" style="display: none;">
                              <select class="form-control" name="select_layer" id="selFilByLayer" disabled="true">
                                <option value="1" selected="true">Layer 1</option>
                                <option value="2">Layer 2</option>
                                <option value="3">Layer 3</option>
                              </select>
                              <span class="text-danger input-error"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Audit Date</label>
                              <input type="text" class="form-control form-control-sm audit-result-input" placeholder="AuditResult ID" name="audit_result_id" style="display: none;">
                              <input type="date" class="form-control form-control-sm audit-result-input" placeholder="Audit Date" name="audit_date">
                              <span class="text-danger input-error"></span>
                          </div>
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Issued Date</label>
                              <input type="date" class="form-control form-control-sm audit-result-input" placeholder="Issued Date" name="issued_date">
                              <span class="text-danger input-error"></span>
                          </div>
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Checked By</label>
                              <select class="form-control select2 audit-result-input" name="checked_by" style="width: 100%;">
                                      
                              </select>
                              <span class="text-danger input-error"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Product Line</label>
                              <select class="form-control select2 audit-result-input" name="product_line_id[]" style="width: 100%; border: 2px solid red !important;" multiple="true">
                                      
                              </select>
                              <span class="text-danger input-error"></span>
                          </div>
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Due Date</label>
                              <input type="date" class="form-control form-control-sm audit-result-input" placeholder="Due Date" name="due_date">
                              <span class="text-danger input-error"></span>
                          </div>
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Responsible Section</label>
                              <select class="form-control select2 audit-result-input" name="section_id[]" style="width: 100%; border: 2px solid red !important;" multiple="true">
                                      
                              </select>
                              <span class="text-danger input-error"></span>
                          </div>                          
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Auditors</label>
                              <select class="form-control select2 audit-result-input" name="auditors[]" style="width: 100%;" multiple="true">
                                      
                              </select>
                              <span class="text-danger input-error"></span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Auditees</label>
                              <select class="form-control select2 audit-result-input" name="auditees[]" style="width: 100%;" multiple="true">
                                      
                              </select>
                              <span class="text-danger input-error"></span>
                          </div>
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Auditees</label>
                              <select class="form-control select2 audit-result-input" name="auditee_manual[]" style="width: 100%;" multiple="true">
                                <option value="1">Technician</option>
                                <option value="2">QC</option>
                                <option value="3">MH</option>
                                <option value="4">Operator</option>
                              </select>
                              <span class="text-danger input-error"></span>
                          </div>

                          <!-- For Corrective Action -->
                          <!--  -->

                          <!-- Not Yet Closed -->
                          <!-- For Close-out Audit -->
                          <!-- Closed -->

                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Audit Report Status</label>
                              <select class="form-control audit-result-input" name="audit_status" style="width: 100%;">
                                <option value="1">For Checking</option>
                                <option value="2">For CAPA</option>
                                <option value="3">For Close Out</option>
                                <option value="4">Closed</option>
                                <option value="5">Unclosed</option>
                              </select>
                              <span class="text-danger input-error"></span>
                          </div>

                        </div>

                        <div class="row">
                          <div class="form-group col-sm-8">
                              <label for="projectinput1">Commendation</label>
                              <textarea class="form-control form-control-sm audit-result-input" placeholder="Commendation" name="commendation" rows="4"></textarea>
                              <span class="text-danger input-error"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Email Recipient (Attention)</label>
                              <select class="form-control select2 audit-result-input" name="email_recepient_attention[]" style="width: 100%;" multiple="true">
                                      
                              </select>
                              <span class="text-danger input-error"></span>
                          </div>
                          <div class="form-group col-sm-4">
                              <label for="projectinput1">Email Recipient (CC)</label>
                              <select class="form-control select2Tags audit-result-input" name="email_recepient_cc[]" style="width: 100%;" multiple="true">
                              </select>
                              <span class="text-danger input-error"></span>
                          </div>

                          <div class="form-group col-sm-4" style="padding-top: 10px;">
                            <br>
                            <button type="submit" class="btn btn-success btnSaveAuditResult"><i class="fa fa-check"></i> Save</button>
                            <button type="button" class="btn btn-success btnSendAuditResult" id="btnSendAuditResult"><i class="fa fa-check"></i> Send</button>
                            <button type="button" class="btn btn-info btnEditAuditResultHeader" style="display: none;"><i class="fa fa-edit"></i> Edit</button>
                            <button type="button" class="btn btn-danger btnCancelEditAuditResultHeader" style="display: none;"><i class="fa fa-times"></i> Cancel</button>
                          </div>

                        </div>

                        <div class="row rowFindings" style="display: none;">
                          <div class="col-sm-12">
                            <hr>
                            <div class="table-responsive">
                              
                              <div style="float: left;">
                                <h4><i class="icon-list"></i> Audit Findings</h4>
                              </div>

                              <div style="float: right;">
                                  <button type="button" class="btn btn-success" id="btnShowSaveARFindingModal"><i class="icon-plus"></i> Add Findings</button>
                              </div>
                              <br><br>
                              <table class="table table-bordered table-hover table-striped table-xs" id="tblARFindings" width="100%">
                                <thead>
                                  <tr>
                                    <th>Action</th>
                                    <th>NO.</th>
                                    <th>Classification By Phenomenon</th>
                                    <th>Process / Station</th>
                                    <th>Statement of Findings</th>
                                    <th>Actual Illustration</th>
                                    <th>In-charge</th>
                                    <th>Countermeasures</th>
                                    <th>Commitment Date</th>
                                    <th>Close-out Audit Result</th>
                                    <th>Close-out Audit Image</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <!-- <tr>
                                    <td colspan="10"> <center>No data available in table </center></td>
                                  </tr> -->
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" style="float: left;">Close</button>
                <button type="button" class="btn btn-success btnExportToExcel"><i class="fa fa-file-excel-o"></i> Export to Excel</button>
                <!-- <button type="button" class="btn btn-outline-primary btnEditAuditResultHeader" style="display: none;">Edit</button> -->
              </div>
            </form>
        </div>
      </div>
    </div>

    <div class="modal fade text-xs-left" id="mdlActionAuditResult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmActionAuditResult">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> <span id="spanAuditResultActionTitle">Archive Audit Result</span></h4>
              </div>
              <div class="modal-body">
                    <p>Please confirm to continue?</p>
                    <input type="text" name="audit_result_id" style="display: none;">
                    <input type="text" name="status" style="display: none;">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline-primary">Confirm</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Audit Result Details -->
    <div class="modal fade text-xs-left" id="mdlSaveAuditFindings" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveAuditFindings">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-info"></i> Product Line Details</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Department</label>
                            <select class="form-control" name="department">
                              <option value="1" selected="true">TS</option>
                              <option value="2">PPS</option>
                              <option value="3">CN</option>
                              <option value="4">YF</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="projectinput1">Product Line</label>
                            <input type="text" class="form-control" placeholder="AuditFindings ID" name="product_line_id" style="display: none;">
                            <input type="text" class="form-control" placeholder="AuditFindings" name="name">
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

    <!-- AR FINDINGS -->
    <div class="modal fade text-xs-left" id="mdlSaveARFinding" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveARFinding" enctype="multipart/form-data">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-info"></i> Audit Result Finding Details</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                          <label for="projectinput1">No.</label>
                          <input type="text" class="form-control" placeholder="Audit Result ID" name="audit_result_id" style="display: none;">
                          <input type="text" class="form-control" placeholder="ARFinding ID" name="ar_finding_id" style="display: none;">
                          <input type="text" class="form-control" placeholder="No." name="no">
                          <span class="text-danger input-error"></span>
                        </div>

                        <div class="form-group">
                          <label for="projectinput1">Classification by Phenomenon</label>
                          <select class="form-control select2" name="classification_id" style="width: 100%;">
                                  
                          </select>
                          <span class="text-danger input-error"></span>
                        </div>

                        <div class="form-group">
                          <label for="projectinput1">Process / Station</label>
                          <input type="text" class="form-control" placeholder="Process / Station" name="station">
                          <span class="text-danger input-error"></span>
                        </div>

                        <div class="form-group">
                          <label for="projectinput1">Statement of Findings</label>
                          <textarea class="form-control" placeholder="Statement of Findings" name="statement_of_findings" rows="4"></textarea>
                          <span class="text-danger input-error"></span>
                        </div>

                        <div class="form-group">
                          <label for="projectinput1">Factor</label>
                          <select class="form-control select2" name="factor_id" style="width: 100%;">
                                  
                          </select>
                          <span class="text-danger input-error"></span>
                        </div>

                        <div class="form-group">
                          <label for="projectinput1">Factor Item List</label>
                          <select class="form-control select2" name="factor_item_list_id" style="width: 100%;">
                                  
                          </select>
                          <span class="text-danger input-error"></span>
                        </div>

                        <div class="form-group actualIllustration">
                          <input type="checkbox" id="chkEditActualIllustration" name="chkEditActualIllustration">
                          <label class="font-weight-normal" id="labelEditActualIllustration" for="chkEditActualIllustration">Re-upload Actual Illustration</label>
                          <label class="font-weight-normal" id="labelActualIllustration">Actual Illustration</label>
                          <input type="file" accept="image/png, image/jpeg" class="form-control" id="inputEditActualIllustration" disabled placeholder="Actual Illustration" name="actual_illustration[]" multiple="true">
                          <span class="text-danger input-error input-error-validation"></span>
                        </div>

                        <div class="form-group editActualIllustration d-none">
                          <label for="projectinput1">Current Actual Illustration</label>
                          <div class="actual-illustration-images d-flex">
                            <!-- Code generated -->
                          </div>
                          <span class="text-danger input-error"></span>
                        </div>

                        <div class="form-group">
                          <label for="projectinput1">In-Charge</label>
                          <select class="form-control select2" name="in_charge[]" style="width: 100%;" multiple="true">
                                  
                          </select>
                          <span class="text-danger input-error"></span>
                        </div>

                        <div class="form-group">
                          <label for="projectinput1">Counter Measures</label>
                          <textarea class="form-control" placeholder="Counter Measures" name="counter_measures" rows="4"></textarea>
                          <span class="text-danger input-error"></span>
                        </div>

                        <div class="form-group">
                          <label for="projectinput1">Commitment Date</label>
                          <input type="date" class="form-control" placeholder="Commitment Date" name="commitment_date">
                          <span class="text-danger input-error"></span>
                        </div>

                        <div class="form-group">
                          <label for="projectinput1">Close-out Audit Result</label>
                          <input type="file" accept="image/png, image/jpeg" class="form-control" placeholder="Close-out Audit Result" name="close_out_image"><br>
                          <textarea class="form-control" placeholder="Close-out Audit Result" name="close_out" rows="4"></textarea>
                          <span class="text-danger input-error"></span>
                        </div>

                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary btnSaveARFinding">Save</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <div class="modal fade text-xs-left" id="mdlActionARFinding" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmActionARFinding">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> <span id="spanARFindingActionTitle">Archive Audit Result Finding</span></h4>
              </div>
              <div class="modal-body">
                    <p>Please confirm to continue?</p>
                    <input type="text" name="ar_finding_id" style="display: none;">
                    <input type="text" name="status" style="display: none;">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline-primary">Confirm</button>
              </div>
            </form>
        </div>
      </div>
    </div>

@endsection

@section('js_content')
    <script type="text/javascript">
        // -------------------------- FACTOR --------------------------
        let dtAuditResults;
        let selectedAuditResultId = null;
        let selectedAuditResultName = '';
        
        let dtAuditResultsLayer2;
        let dtAuditResultsLayer3;

        let frmSaveAuditResult = $('#frmSaveAuditResult');

        $(document).ready(function() {

            $("body").css({"overflow-y" : "auto"});
            $(document).on("hidden.bs.modal", function () {
                $("body").addClass("modal-open");
                $("body").css({"overflow-y" : "auto"});
            });
            $(document).on("show.bs.modal", function () {
                $("body").css({"overflow-y" : "hidden"});
            });
            
            dtAuditResults = $("#tblAuditResultsLayer1").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_audit_results",
                    "data": function (param){
                        param.status = 0;
                        param.layer = 1;
                    }
                },
                "order": [1, "desc" ],
                "columns":[
                    { "data" : "layer" },
                    { "data" : "audit_date" },
                    { "data" : "product_line_details", "render" : "[, <br>].product_line_info.name"}, //Dep't / Section
                    { "data" : "issued_date" },
                    { "data" : "due_date" },
                    { "data" : "checked_by_info.name" },
                    { "data" : "auditor_details", "render" : "[, <br>].user_info.name"},
                    { "data" : "auditee_details", "render" : "[, <br>].user_info.name"},
                    { "data" : "commendation" },
                    { "data" : "raw_audit_status", orderable:false, searchable:false },
                    { "data" : "raw_action", orderable:false, searchable:false },
                ],
            });//end of dtAuditResults

            dtAuditResultsLayer2 = $("#tblAuditResultsLayer2").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_audit_results",
                    "data": function (param){
                        param.status = 0;
                        param.layer = 2;
                    }
                },
                "order": [1, "desc" ],
                "columns":[
                    { "data" : "layer" },
                    { "data" : "audit_date" },
                    { "data" : "product_line_details", "render" : "[, <br>].product_line_info.name"},
                    { "data" : "issued_date" },
                    { "data" : "due_date" },
                    // { "data" : "checked_by_info.name" },
                    { "data" : "auditor_details", "render" : "[, <br>].user_info.name"},
                    { "data" : "auditee_details", "render" : "[, <br>].user_info.name"},
                    { "data" : "commendation" },
                    // { "data" : "raw_audit_status", orderable:false, searchable:false },
                    { "data" : "raw_action", orderable:false, searchable:false },
                ],
            });//end of dtAuditResults

            dtAuditResultsLayer3 = $("#tblAuditResultsLayer3").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_audit_results",
                    "data": function (param){
                        param.status = 0;
                        param.layer = 3;
                    }
                },
                "order": [1, "desc" ],
                "columns":[
                    { "data" : "layer" },
                    { "data" : "audit_date" },
                    { "data" : "product_line_details", "render" : "[, <br>].product_line_info.name"},
                    { "data" : "issued_date" },
                    { "data" : "due_date" },
                    // { "data" : "checked_by_info.name" },
                    { "data" : "auditor_details", "render" : "[, <br>].user_info.name"},
                    { "data" : "auditee_details", "render" : "[, <br>].user_info.name"},
                    { "data" : "commendation" },
                    // { "data" : "raw_audit_status", orderable:false, searchable:false },
                    { "data" : "raw_action", orderable:false, searchable:false },
                ],
            });//end of dtAuditResults

        });

        $(".select2").select2();

        $('select[name="product_line_id[]"]', $("#frmSaveAuditResult")).select2({
            // dropdownParent: $('#mdlSaveItemRegistration'),
            placeholder: "",
            minimumInputLength: 1,
            allowClear: true,
            ajax: { 
               url: "{{ route('get_cbo_product_lines_by_stat') }}",
               type: "get",
               dataType: 'json',
               delay: 250,
               // quietMillis: 100,
               data: function (params) {
                return {
                  search: params.term // search term
                  // status: cboDeviceStat // search status
                };
               },
               processResults: function (response) {
                 return {
                    results: response
                 };
               },
               cache: true
            },
        });

        $('select[name="section_id[]"]', $("#frmSaveAuditResult")).select2({
            // dropdownParent: $('#mdlSaveItemRegistration'),
            placeholder: "",
            minimumInputLength: 1,
            allowClear: true,
            ajax: { 
               url: "{{ route('get_cbo_sections_by_stat') }}",
               type: "get",
               dataType: 'json',
               delay: 250,
               // quietMillis: 100,
               data: function (params) {
                return {
                  search: params.term // search term
                  // status: cboDeviceStat // search status
                };
               },
               processResults: function (response) {
                 return {
                    results: response
                 };
               },
               cache: true
            },
        });

        $('select[name="checked_by"]', $("#frmSaveAuditResult")).select2({
            // dropdownParent: $('#mdlSaveItemRegistration'),
            placeholder: "",
            minimumInputLength: 1,
            allowClear: true,
            ajax: { 
               url: "{{ route('get_cbo_rapidx_users_by_stat') }}",
               type: "get",
               dataType: 'json',
               delay: 250,
               // quietMillis: 100,
               data: function (params) {
                return {
                  search: params.term // search term
                  // status: cboDeviceStat // search status
                };
               },
               processResults: function (response) {
                 return {
                    results: response 
                 };
               },
               cache: true
            },
        });

        $('select[name="auditees[]"]', $("#frmSaveAuditResult")).select2({
            // dropdownParent: $('#mdlSaveItemRegistration'),
            placeholder: "",
            minimumInputLength: 1,
            allowClear: true,
            ajax: { 
               url: "{{ route('get_cbo_rapidx_users_by_stat') }}",
               type: "get",
               dataType: 'json',
               delay: 250,
               // quietMillis: 100,
               data: function (params) {
                return {
                  search: params.term // search term
                  // status: cboDeviceStat // search status
                };
               },
               processResults: function (response) {
                 return {
                    results: response
                 };
               },
               cache: true
            },
        });

        $('select[name="email_recepient_attention[]"]', $("#frmSaveAuditResult")).select2({
            // dropdownParent: $('#mdlSaveItemRegistration'),
            placeholder: "",
            minimumInputLength: 1,
            allowClear: true,
            ajax: { 
               url: "{{ route('get_cbo_rapidx_users_by_stat') }}",
               type: "get",
               dataType: 'json',
               delay: 250,
               // quietMillis: 100,
               data: function (params) {
                return {
                  search: params.term // search term
                  // status: cboDeviceStat // search status
                };
               },
               processResults: function (response) {
                 return {
                    results: response
                 };
               },
               cache: true
            },
        });

        $('select[name="email_recepient_cc[]"]', $("#frmSaveAuditResult")).select2({
            // dropdownParent: $('#mdlSaveItemRegistration'),
            placeholder: "",
            minimumInputLength: 1,
            allowClear: true,
            ajax: { 
               url: "{{ route('get_cbo_rapidx_users_by_stat') }}",
               type: "get",
               dataType: 'json',
               delay: 250,
               // quietMillis: 100,
               data: function (params) {
                return {
                  search: params.term // search term
                  // status: cboDeviceStat // search status
                };
               },
               processResults: function (response) {
                 return {
                    results: response
                 };
               },
               cache: true
            },
        });

        // $('select[name="email_group_recepient[]"]', $("#frmSaveAuditResult")).select2({
        //     // dropdownParent: $('#mdlSaveItemRegistration'),
        //     placeholder: "",
        //     // minimumInputLength: 1,
        //     allowClear: true,
        //     tags: true,
        // });

        $('select[name="auditors[]"]', $("#frmSaveAuditResult")).select2({
            // dropdownParent: $('#mdlSaveItemRegistration'),
            placeholder: "",
            minimumInputLength: 1,
            allowClear: true,
            ajax: {
               url: "{{ route('get_cbo_rapidx_users_by_stat') }}",
               type: "get",
               dataType: 'json',
               delay: 250,
               // quietMillis: 100,
               data: function (params) {
                return {
                  search: params.term // search term
                  // status: cboDeviceStat // search status
                };
               },
               processResults: function (response) {
                 return {
                    results: response
                 };
               },
               cache: true
            },
        });


        $(".btnShowSaveAuditResultModal").click(function(){
          $("#mdlSaveAuditResult").modal('show');
          $(".rowFindings").hide();
          $('.audit-result-input').prop('disabled', false);
          $('.audit-result-input').removeClass('border-danger');
          $('#frmSaveAuditResult')[0].reset();
          $("select[name='checked_by'", $("#frmSaveAuditResult")).val('0').trigger('change');
          $("select[name='product_line_id[]'", $("#frmSaveAuditResult")).val('0').trigger('change');
          $("select[name='auditors[]'", $("#frmSaveAuditResult")).val('0').trigger('change');
          $("select[name='auditees[]'", $("#frmSaveAuditResult")).val('0').trigger('change');
          $("select[name='auditee_manual[]'", $("#frmSaveAuditResult")).val('0').trigger('change');
          $('.btnSaveAuditResult').show();
          $('.btnSendAuditResult').hide();
          $('.btnEditAuditResultHeader').hide();
          $('.btnCancelEditAuditResultHeader').hide();
          $('.btnExportToExcel').hide();
          $('.input-error').html('');

          let layer = $(this).attr('layer');

          $("select[name='select_layer'", $("#frmSaveAuditResult")).val(layer).trigger('change'); // select_layer dropdown on frmSaveAuditResult(form) when +Add Audit Result(button) is clicked
          $("input[name='layer'", $("#frmSaveAuditResult")).val(layer); // layer attribute of the btnShowSaveAuditResultModal(button)

          /*
            start
            10-16-2021 - Jannus
          */
          if(layer == 1){
            $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().show();
          }
          // else if(layer == 2){
          //   $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().show();
          // }
          // else if(layer == 3){
          //   $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().show();
          // }
          else if(layer == 2){
            $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().hide();
          }
          else if(layer == 3){
            $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().hide();
          }
        });
        /*
          end
        */

        $("#tblAuditResultsLayer1").on('click', '.btnEditAuditResult', function(){
          $('.btnSendAuditResult').hide();
          $('.btnExportToExcel').show();
          let id = $(this).attr('audit_result-id');
          $("input[name='audit_result_id'", $("#frmSaveAuditResult")).val(id);
          dtARFindings.draw();
          GetAuditResultById(id);
          $("#mdlSaveAuditResult").modal('show');
        });

        $("#tblAuditResultsLayer2").on('click', '.btnEditAuditResult', function(){
          $('.btnSendAuditResult').hide();
          $('.btnExportToExcel').show();
          $("select[name='checked_by'", $("#frmSaveAuditResult")).show();
          let id = $(this).attr('audit_result-id');
          $("input[name='audit_result_id'", $("#frmSaveAuditResult")).val(id);
          dtARFindings.draw();
          GetAuditResultById(id);
          $("#mdlSaveAuditResult").modal('show');
        });

        $("#tblAuditResultsLayer3").on('click', '.btnEditAuditResult', function(){
          $('.btnSendAuditResult').hide();
          $('.btnExportToExcel').show();
          $("select[name='checked_by'", $("#frmSaveAuditResult")).show();
          let id = $(this).attr('audit_result-id');
          $("input[name='audit_result_id'", $("#frmSaveAuditResult")).val(id);
          dtARFindings.draw();
          GetAuditResultById(id);
          $("#mdlSaveAuditResult").modal('show');
        });

        $("#frmSaveAuditResult").submit(function(e){
          e.preventDefault();
          SaveAuditResult();
        });


        function SaveAuditResult() {
          $.ajax({
                url: "save_audit_result",
                method: "post",
                data: $('#frmSaveAuditResult').serialize(),
                dataType: "json",
                beforeSend: function(){
                    $('.btnSaveAuditResult').prop('disabled', true);
                },
                success: function(data){
                    $('.btnSaveAuditResult').prop('disabled', false);
                    $("input[name='audit_result_id'", frmSaveAuditResult).val(data['audit_result_id']).trigger('change');
                    if(data['result'] == 1){
                        $('.btnSendAuditResult').hide();
                        $('#btnSendAuditResult').hide();
                        Swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Saved Successfully!',
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: 'swal-wide',
                        });
                        // $('#frmSaveAuditResult')[0].reset();
                      // $("#mdlSaveAuditResult").modal('hide');

                        $('.audit-result-input').prop('disabled', true);
                        if($("select[name='select_layer'", frmSaveAuditResult).val() == 1){
                        dtAuditResults.draw();
                        }
                        else if($("select[name='select_layer'", frmSaveAuditResult).val() == 2){
                            dtAuditResultsLayer2.draw();
                        }
                        else if($("select[name='select_layer'", frmSaveAuditResult).val() == 3){
                            dtAuditResultsLayer3.draw();
                        }
                        $(".rowFindings").show();
                        $('.btnSaveAuditResult').hide();
                        $(".btnSendAuditResult").hide();
                        $('.btnCancelEditAuditResultHeader').hide();
                        $('.btnEditAuditResultHeader').show();
                        $('.input-error').html('');
                    }
                    else{
                        if(data['error'] != null){
                            if(data['error']['audit_date'] != null){
                                $("input[name='audit_date']", frmSaveAuditResult).addClass('border-danger');
                                $("input[name='audit_date']", frmSaveAuditResult).siblings('.input-error').text(data['error']['audit_date']);
                            }

                            if(data['error']['issued_date'] != null){
                                $("input[name='issued_date']", frmSaveAuditResult).addClass('border-danger');
                                $("input[name='issued_date']", frmSaveAuditResult).siblings('.input-error').text(data['error']['issued_date']);
                            }

                            if(data['error']['due_date'] != null){
                                $("input[name='due_date']", frmSaveAuditResult).addClass('border-danger');
                                $("input[name='due_date']", frmSaveAuditResult).siblings('.input-error').text(data['error']['due_date']);
                            }

                            if(data['error']['checked_by'] != null){
                                $("select[name='checked_by']", frmSaveAuditResult).addClass('border-danger');
                                $("select[name='checked_by']", frmSaveAuditResult).siblings('.input-error').text(data['error']['checked_by']);
                            }

                            if(data['error']['product_line_id'] != null){
                                $("select[name='product_line_id[]']", frmSaveAuditResult).addClass('border-danger');
                                $("select[name='product_line_id[]']", frmSaveAuditResult).siblings('.input-error').text(data['error']['product_line_id']);
                            }

                            if(data['error']['section_id'] != null){
                                $("select[name='section_id[]']", frmSaveAuditResult).addClass('border-danger');
                                $("select[name='section_id[]']", frmSaveAuditResult).siblings('.input-error').text(data['error']['section_id']);
                            }

                            if(data['error']['auditors'] != null){
                                $("select[name='auditors[]']", frmSaveAuditResult).addClass('border-danger');
                                $("select[name='auditors[]']", frmSaveAuditResult).siblings('.input-error').text(data['error']['auditors']);
                            }

                            if(data['error']['auditees'] != null){
                                $("select[name='auditees[]']", frmSaveAuditResult).addClass('border-danger');
                                $("select[name='auditees[]']", frmSaveAuditResult).siblings('.input-error').text(data['error']['auditees']);
                            }

                            if(data['error']['auditee_manual'] != null){
                                $("select[name='auditee_manual[]']", frmSaveAuditResult).addClass('border-danger');
                                $("select[name='auditee_manual[]']", frmSaveAuditResult).siblings('.input-error').text(data['error']['auditee_manual']);
                            }

                            if(data['error']['commendation'] != null){
                                $("textarea[name='commendation']", frmSaveAuditResult).addClass('border-danger');
                                $("textarea[name='commendation']", frmSaveAuditResult).siblings('.input-error').text(data['error']['commendation']);
                            }
                        }


                      Swal({
                            position: 'top-end',
                            type: 'error',
                            title: 'Saving Failed!',
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: 'swal-wide',
                        });
                    }
                },
                error: function(data, xhr, status){
                    $('.btnSaveAuditResult').prop('disabled', false);
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }


        $("#tblAuditResultsLayer1").on('click', '.btnActionAuditResult', function(){
          let id = $(this).attr('audit_result-id');
          let status = $(this).attr('status');
          $("input[name='audit_result_id'", $("#frmActionAuditResult")).val(id);
          $("input[name='status'", $("#frmActionAuditResult")).val(status);
          $("#mdlActionAuditResult").modal('show');
        });

        $("#frmActionAuditResult").submit(function(e){
          e.preventDefault();
          ActionAuditResult();
        });

        $(".btnEditAuditResultHeader").click(function(){
          $('.audit-result-input').prop('disabled', false);
          $('.btnSaveAuditResult').show();
          $('.btnSendAuditResult').show();
          $('.btnCancelEditAuditResultHeader').show();
          $('.btnEditAuditResultHeader').hide();
        });

        $(".btnCancelEditAuditResultHeader").click(function(){
          $('.btnSaveAuditResult').hide();
          $('.btnSendAuditResult').hide();
          $('.btnCancelEditAuditResultHeader').hide();
          $('.btnEditAuditResultHeader').show();
          $('.audit-result-input').prop('disabled', true);
          $('.audit-result-input').removeClass('border-danger');
          $('.input-error').html('');
        });

        $(".btnExportToExcel").click(function(){
          window.open('export_audit_result?audit_result_id=' + $('input[name="audit_result_id"]', frmSaveAuditResult).val(), '_blank');
        });


        $(".btnSendAuditResult").click(function(){
          var auditResultId = $('input[name="audit_result_id"]', frmSaveAuditResult).val();
          console.log(auditResultId);
          $.ajax({
            type: "get",
            url: "btn_send_audit_result_email",
            data: {
              audit_result_id: auditResultId,
            },
            dataType: "json",
            success: function (response) {
              if(response['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Send Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });

                $('.btnSaveAuditResult').hide();
                $('.btnSendAuditResult').hide();
                $('.btnCancelEditAuditResultHeader').hide();
                $('.btnEditAuditResultHeader').show();
                $('.audit-result-input').prop('disabled', true);
                $('.audit-result-input').removeClass('border-danger');
                $('.input-error').html('');
              }
            }
          });
        });


        function GetAuditResultById(audit_resultId){
          $.ajax({
              url: 'get_audit_result_by_id',
              method: 'get',
              data: {
                  'audit_result_id': audit_resultId
              },
              dataType: 'json',
              beforeSend: function(){
                  frmSaveAuditResult[0].reset();
              },
              success: function(data){
                  if(data['data'] != null){
                      $(".rowFindings").show();
                      $('.btnSaveAuditResult').hide();
                      $('.btnEditAuditResultHeader').show();
                      $('.audit-result-input').prop('disabled', true);
                      $('.btnCancelEditAuditResultHeader').hide();

                      $("input[name='audit_result_id'", frmSaveAuditResult).val(data['data']['id']);
                      $("select[name='select_layer'", frmSaveAuditResult).val(data['data']['layer']);
                      $("input[name='layer'", $("#frmSaveAuditResult")).val(data['data']['layer']);   
                      $("input[name='audit_date'", frmSaveAuditResult).val(data['data']['audit_date']);
                      $("input[name='issued_date'", frmSaveAuditResult).val(data['data']['issued_date']);

                      $('select[name="product_line_id[]"]', frmSaveAuditResult).html('');
                      $('select[name="section_id[]"]', frmSaveAuditResult).html('');
                      $('select[name="auditors[]"]', frmSaveAuditResult).html('');
                      $('select[name="auditees[]"]', frmSaveAuditResult).html('');
                      $('select[name="email_recepient_attention[]"]', frmSaveAuditResult).html('');
                      $('select[name="email_recepient_cc[]"]', frmSaveAuditResult).html('');

                      $('select[name="product_line_id[]"]', frmSaveAuditResult).val(0).trigger('change');
                      $('select[name="section_id[]"]', frmSaveAuditResult).val(0).trigger('change');
                      $('select[name="auditors[]"]', frmSaveAuditResult).val(0).trigger('change');
                      $('select[name="auditees[]"]', frmSaveAuditResult).val(0).trigger('change');

                      $('select[name="audit_status"]', frmSaveAuditResult).val(data['data']['audit_status']);

                      $("input[name='due_date'", frmSaveAuditResult).val(data['data']['due_date']);
                      $("textarea[name='commendation'", frmSaveAuditResult).val(data['data']['commendation']);

                      // if(data['data']['layer'] == 1){
                      //     $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().show();
                      // }
                      //   else if(data['data']['layer'] == 2){
                      //     $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().hide();
                      // }
                      //   else if(data['data']['layer'] == 3){
                      //     $("select[name='checked_by'", $("#frmSaveAuditResult")).parent().hide();
                      // }

                      if(data['data']['checked_by_info'] != null){
                          let checkedByInfo = '<option selected value="' + data['data']['checked_by_info']['id'] + '">' + data['data']['checked_by_info']['name'] + '</option>';
                          $('select[name="checked_by"]', frmSaveAuditResult).append(checkedByInfo);
                          $('select[name="checked_by"]', frmSaveAuditResult).val(data['data']['checked_by_info']['id']).trigger('change');
                      }
                      else{
                          $('select[name="checked_by"]', frmSaveAuditResult).val(0).trigger('change');
                      }

                      if(data['data']['product_line_details'].length > 0){
                          let productLineIds = [];
                          for(let index = 0; index < data['data']['product_line_details'].length; index++){
                              productLineIds.push(data['data']['product_line_details'][index]['product_line_id']);
                              let productLineDetail = '<option selected value="' + data['data']['product_line_details'][index]['product_line_id'] + '">' + data['data']['product_line_details'][index]['product_line_info']['name'] + '</option>';
                              $('select[name="product_line_id[]"]', frmSaveAuditResult).append(productLineDetail);
                              $('select[name="product_line_id[]"]', frmSaveAuditResult).val(data['data']['product_line_details'][index]['product_line_id']).trigger('change');
                          }
                          $('select[name="product_line_id[]"]', frmSaveAuditResult).val(productLineIds).trigger('change');
                      }
                      else{
                          $('select[name="product_line_id[]"]', frmSaveAuditResult).val(0).trigger('change');
                      }

                      if(data['data']['section_details'].length > 0){
                          let productLineIds = [];
                          for(let index = 0; index < data['data']['section_details'].length; index++){
                              productLineIds.push(data['data']['section_details'][index]['section_id']);
                              let department = "";

                              if(data['data']['section_details'][index]['section_info']['department'] == 1){
                                  department = 'TS';
                              }
                              else if(data['data']['section_details'][index]['section_info']['department'] == 2){
                                  department = 'PPS';
                              }
                              else if(data['data']['section_details'][index]['section_info']['department'] == 3){
                                  department = 'CN';
                              }
                              else{
                                  department = 'YF';
                              }
                              let productLineDetail = '<option selected value="' + data['data']['section_details'][index]['section_id'] + '">' + department + ' - ' + data['data']['section_details'][index]['section_info']['name'] + '</option>';
                              $('select[name="section_id[]"]', frmSaveAuditResult).append(productLineDetail);
                              $('select[name="section_id[]"]', frmSaveAuditResult).val(data['data']['section_details'][index]['section_id']).trigger('change');
                          }
                          $('select[name="section_id[]"]', frmSaveAuditResult).val(productLineIds).trigger('change');
                      }
                      else{
                          $('select[name="section_id[]"]', frmSaveAuditResult).val(0).trigger('change');
                      }

                      if(data['data']['auditor_details'].length > 0){
                          let auditorsId = [];
                          for(let index = 0; index < data['data']['auditor_details'].length; index++){
                              auditorsId.push(data['data']['auditor_details'][index]['user_id']);
                              let checkedByInfo = '<option selected value="' + data['data']['auditor_details'][index]['user_id'] + '">' + data['data']['auditor_details'][index]['user_info']['name'] + '</option>';
                              $('select[name="auditors[]"]', frmSaveAuditResult).append(checkedByInfo);
                              $('select[name="auditors[]"]', frmSaveAuditResult).val(data['data']['auditor_details'][index]['user_id']).trigger('change');
                          }
                          $('select[name="auditors[]"]', frmSaveAuditResult).val(auditorsId).trigger('change');
                      }
                      else{
                          $('select[name="auditors[]"]', frmSaveAuditResult).val(0).trigger('change');
                      }

                      if(data['data']['auditee_details'].length > 0){
                          let auditeesId = [];
                          for(let index = 0; index < data['data']['auditee_details'].length; index++){
                              auditeesId.push(data['data']['auditee_details'][index]['user_id']);
                              let checkedByInfo = '<option selected value="' + data['data']['auditee_details'][index]['user_id'] + '">' + data['data']['auditee_details'][index]['user_info']['name'] + '</option>';
                              $('select[name="auditees[]"]', frmSaveAuditResult).append(checkedByInfo);
                              $('select[name="auditees[]"]', frmSaveAuditResult).val(data['data']['auditee_details'][index]['user_id']).trigger('change');
                          }
                          $('select[name="auditees[]"]', frmSaveAuditResult).val(auditeesId).trigger('change');
                      }
                      else{
                          $('select[name="auditees[]"]', frmSaveAuditResult).val(0).trigger('change');
                      }

                      if(data['data']['auditee_manual'] != null){
                          let auditeeManual = data['data']['auditee_manual'].split(',');
                          $('select[name="auditee_manual[]"]', frmSaveAuditResult).val(auditeeManual).trigger('change');
                      }
                      else{
                          $('select[name="auditee_manual[]"]', frmSaveAuditResult).val(0).trigger('change');
                      }

                      if(data['data']['ar_email_recipient_details'].length > 0){
                          let emailRecipientsAttention = [];
                          let emailRecipientsCC = [];
                          for(let index = 0; index < data['data']['ar_email_recipient_details'].length; index++){
                              if(data['data']['ar_email_recipient_details'][index]['type'] == 1){
                                  emailRecipientsAttention.push(data['data']['ar_email_recipient_details'][index]['user_id']);
                                  let emailRecipientsInfo = '<option selected value="' + data['data']['ar_email_recipient_details'][index]['user_id'] + '">' + data['data']['ar_email_recipient_details'][index]['user_info']['name'] + '</option>';
                                  $('select[name="email_recepient_attention[]"]', frmSaveAuditResult).append(emailRecipientsInfo);
                                  $('select[name="email_recepient_attention[]"]', frmSaveAuditResult).val(data['data']['ar_email_recipient_details'][index]['user_id']).trigger('change');
                              }
                              else{
                                  emailRecipientsCC.push(data['data']['ar_email_recipient_details'][index]['user_id']);
                                  let emailRecipientsInfo = '<option selected value="' + data['data']['ar_email_recipient_details'][index]['user_id'] + '">' + data['data']['ar_email_recipient_details'][index]['user_info']['name'] + '</option>';
                                  $('select[name="email_recepient_cc[]"]', frmSaveAuditResult).append(emailRecipientsInfo);
                                  $('select[name="email_recepient_cc[]"]', frmSaveAuditResult).val(data['data']['ar_email_recipient_details'][index]['user_id']).trigger('change');
                              }
                          }
                          $('select[name="email_recepient_attention[]"]', frmSaveAuditResult).val(emailRecipientsAttention).trigger('change');
                          $('select[name="email_recepient_cc[]"]', frmSaveAuditResult).val(emailRecipientsCC).trigger('change');
                      }
                      else{
                          $('select[name="email_recepient_attention[]"]', frmSaveAuditResult).val(0).trigger('change');
                          $('select[name="email_recepient_cc[]"]', frmSaveAuditResult).val(0).trigger('change');
                      }


                      $("select[name='layer'", frmSaveAuditResult).prop('disabled', true);

                  }
                  else{
                      Swal({
                          position: 'top-end',
                          type: 'error',
                          title: 'No record found.',
                          showConfirmButton: false,
                          timer: 1500,
                          customClass: 'swal-wide',
                      });    
                  }
              },
              error: function(data, xhr, status){
                  Swal({
                      position: 'top-end',
                      type: 'error',
                      title: 'An error occured!',
                      showConfirmButton: false,
                      timer: 1500,
                      customClass: 'swal-wide',
                  });
                  $("input[name='name'", frmSaveAuditResult).val('');
                  console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
              }
          });
      }

    </script>

    <!-- AR FINDINGS -->
    <script type="text/javascript">
        // -------------------------- FACTOR --------------------------
        let dtARFindings;
        let selectedARFindingId = null;
        let selectedARFindingName = '';

        let mdlSaveARFinding = $('#mdlSaveARFinding');
        let frmSaveARFinding = $('#frmSaveARFinding');
        let btnSaveARFinding = $('.btnSaveARFinding');

        $(document).ready(function() {
            dtARFindings = $("#tblARFindings").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_ar_findings",
                    "data": function (param){
                        param.status = 0;
                        param.audit_result_id = $('input[name="audit_result_id"]', $("#frmSaveAuditResult")).val();
                    }
                },
                
                "columns":[
                    { "data" : "raw_action", orderable:false, searchable:false },
                    { "data" : "no" },
                    { "data" : "classification_info.name" },
                    { "data" : "station" },
                    { "data" : "raw_statement_of_findings" },
                    { "data" : "raw_actual_illustration" },
                    { "data" : "in_charge_details", "render" : "[, <br>].user_info.name"},
                    { "data" : "counter_measures" },
                    { "data" : "commitment_date" },
                    { "data" : "close_out" },
                    { "data" : "raw_close_out_image" },
                    { "data" : "raw_status" },
                ],
            });//end of dtARFindings

            $('select[name="classification_id"]', frmSaveARFinding).select2({
              // dropdownParent: $('#mdlSaveItemRegistration'),
                placeholder: "",
                minimumInputLength: 1,
                allowClear: true,
                ajax: { 
                   url: "{{ route('get_cbo_classifications_by_stat') }}",
                   type: "get",
                   dataType: 'json',
                   delay: 250,
                   // quietMillis: 100,
                   data: function (params) {
                    return {
                      search: params.term // search term
                      // status: cboDeviceStat // search status
                    };
                   },
                   processResults: function (response) {
                     return {
                        results: response
                     };
                   },
                   cache: true
                },
            });

            $('select[name="factor_id"]', frmSaveARFinding).select2({
              // dropdownParent: $('#mdlSaveItemRegistration'),
                placeholder: "",
                minimumInputLength: 1,
                allowClear: true,
                ajax: { 
                   url: "{{ route('get_cbo_factors_by_stat') }}",
                   type: "get",
                   dataType: 'json',
                   delay: 250,
                   // quietMillis: 100,
                   data: function (params) {
                    return {
                      search: params.term // search term
                      // status: cboDeviceStat // search status
                    };
                   },
                   processResults: function (response) {
                     return {
                        results: response
                     };
                   },
                   cache: true
                },
            });

            $('select[name="factor_item_list_id"]', frmSaveARFinding).select2({
              // dropdownParent: $('#mdlSaveItemRegistration'),
                placeholder: "",
                minimumInputLength: 1,
                allowClear: true,
                ajax: { 
                   url: "{{ route('get_cbo_factor_item_lists_by_stat') }}",
                   type: "get",
                   dataType: 'json',
                   delay: 250,
                   // quietMillis: 100,
                   data: function (params) {
                    return {
                      search: params.term, // search term
                      // status: cboDeviceStat // search status
                      factor_id: $('select[name="factor_id"]', frmSaveARFinding).val(),
                    };
                   },
                   processResults: function (response) {
                     return {
                        results: response
                     };
                   },
                   cache: true
                },
            });

            $('select[name="in_charge[]"]', frmSaveARFinding).select2({
                // dropdownParent: $('#mdlSaveItemRegistration'),
                placeholder: "",
                minimumInputLength: 1,
                allowClear: true,
                ajax: { 
                   url: "{{ route('get_cbo_rapidx_users_by_stat') }}",
                   type: "get",
                   dataType: 'json',
                   delay: 250,
                   // quietMillis: 100,
                   data: function (params) {
                    return {
                      search: params.term // search term
                      // status: cboDeviceStat // search status
                    };
                   },
                   processResults: function (response) {
                     return {
                        results: response
                     };
                   },
                   cache: true
                },
            });

            //============================== On Going 16-08-21 START -Jannus ==============================
            $("#btnShowSaveARFindingModal").click(function(){ // +Add Findings(btn)
              frmSaveARFinding[0].reset();
              $('input[name="audit_result_id"]', frmSaveARFinding).val($('input[name="audit_result_id"]', frmSaveAuditResult).val());
              $("#mdlSaveARFinding").modal('show');
              
              $('select[name="classification_id"]', frmSaveARFinding).val(0).trigger('change');
              $('select[name="factor_id"]', frmSaveARFinding).val(0).trigger('change');
              $('select[name="factor_item_list_id"]', frmSaveARFinding).val(0).trigger('change');
              $('select[name="in_charge[]"]', frmSaveARFinding).val(0).trigger('change');
              $('select[name="classification_id"]', frmSaveARFinding).val(0).trigger('change');
              
              $('#chkEditActualIllustration').hide(); // hide the checkbox
              $('#labelEditActualIllustration').hide(); // hide the label
              $('#labelActualIllustration').show(); // hide the label
              $('.actualIllustration').removeAttr('name'); // remove attribute
              $('#inputEditActualIllustration').prop('disabled', false); // enabled input type file
              $('.editActualIllustration').hide(); // hide the images
              
              $('#chkEditActualIllustration').removeAttr('checked'); // remove checked
              $(".input-error-validation").text(''); // reset the error of editActualIllustration input type file
              
              // debug the ids
              console.log('audit_result_id: '+ $('input[name="audit_result_id"]', frmSaveARFinding).val());
              console.log('ar_finding_id: '+ $('input[name="ar_finding_id"]', frmSaveARFinding).val());
            });
            
            $("#tblARFindings").on('click', '.btnEditARFinding', function(){
              let id = $(this).attr('ar_finding-id');
              $("input[name='ar_finding_id'", $("#frmSaveARFinding")).val(id);
              GetARFindingById(id);
              $("#mdlSaveARFinding").modal('show');
              
              $('#chkEditActualIllustration').show(); // show the checkbox
              $('#labelEditActualIllustration').show(); // show the label
              $('#labelActualIllustration').hide(); // hide the label
              $('.actualIllustration').removeAttr('name'); // remove attribute
              $('#inputEditActualIllustration').prop('disabled', true); // disabled input type file
              $('.editActualIllustration').show(); // show the images
              
              $('#chkEditActualIllustration').removeAttr('checked'); // remove checked
              $(".input-error-validation").text(''); // reset the error of editActualIllustration input type file

              // debug the ids
              console.log('audit_result_id: '+ $('input[name="audit_result_id"]', frmSaveARFinding).val());
              console.log('ar_finding_id: '+ $('input[name="ar_finding_id"]', frmSaveARFinding).val());
            });


            function GetARFindingById(ar_findingId){
              $.ajax({
                  url: 'get_ar_finding_by_id',
                  method: 'get',
                  data: {
                      'ar_finding_id': ar_findingId
                  },
                  dataType: 'json',
                  beforeSend: function(){
                      $("input[name='no'", frmSaveARFinding).val('');
                  },
                  success: function(data){
                      frmSaveARFinding[0].reset();
                      $('#chkEditActualIllustration').on('click', function(){
                        // add checked attribute when #chkEditFile is clicked
                        $('#chkEditActualIllustration').attr('checked', 'checked');
                        // check if checkbox is checked, if it is checked then remove the disabled on input file
                        if($('#chkEditActualIllustration').is(':checked')){
                          $('#inputEditActualIllustration').removeAttr('disabled'); // enabled input type file
                          $('.actualIllustration').attr('name', 'hasActualIllustration');
                        }
                        else{
                          $('#chkEditActualIllustration').removeAttr('checked');
                          $('#inputEditActualIllustration').prop('disabled', true); // disabled #editActualIllustration input type file
                          $('#inputEditActualIllustration').val('');
                          $('.actualIllustration').removeAttr('name');
                          $(".input-error-validation").text('');
                        }
                      });
                      
                      if(data['data'] != null){
                          $("select[name='department'", frmSaveARFinding).val(data['data']['department']);
                          $("input[name='no'", frmSaveARFinding).val(data['data']['name']);

                          $("input[name='audit_result_id'", frmSaveARFinding).val(data['data']['audit_result_id']);
                          $("input[name='ar_finding_id'", frmSaveARFinding).val(data['data']['id']);
                          $("input[name='no'", frmSaveARFinding).val(data['data']['no']);
                          $("input[name='station'", frmSaveARFinding).val(data['data']['station']);
                          $("textarea[name='counter_measures'", frmSaveARFinding).val(data['data']['counter_measures']);
                          $("input[name='commitment_date'", frmSaveARFinding).val(data['data']['commitment_date']);
                          // $("input[name='close_out_image'", frmSaveARFinding).val(data['data']['close_out_image']);
                          $("textarea[name='close_out'", frmSaveARFinding).val(data['data']['close_out']);
                          $("textarea[name='statement_of_findings'", frmSaveARFinding).val(data['data']['statement_of_findings']);

                          if(data['data']['actual_illustration'].length > 0){
                              let splitted = data['data']['actual_illustration'].split(', ');
                              // console.log('<img src="'+ splitted[0] +'" style="max-width: 100px; max-height: 200px; min-width: 50px; min-height: 50px;" class="commonAuditImg">');
                              let image = '';
                              for (let index = 0; index < splitted.length; index++) {
                                var path = "public/storage/images/actual_illustration/" + splitted[index];
                                image += '<a class="image" href="'+ path +'" target="_blank"><img src="'+ path +'" style="max-width: 100px; max-height: 200px; min-width: 80px; min-height: auto;" class="image"></a>';
                              }
                              $('.actual-illustration-images').html(image);
                          }
                          
                          $("select[name='factor_id'", frmSaveARFinding).val(data['data']['factor_id']);
                          $("select[name='factor_item_list_id'", frmSaveARFinding).val(data['data']['factor_item_list_id']);
                          // $("select[name='in_charge[]'", frmSaveARFinding).val(data['data']['in_charge']);
                          $("select[name='classification_id'", frmSaveARFinding).val(data['data']['classification_id']);

                          if(data['data']['classification_info'] != null){
                              let classificationInfo = '<option selected value="' + data['data']['classification_info']['id'] + '">' + data['data']['classification_info']['name'] + '</option>';
                              $('select[name="classification_id"]', frmSaveARFinding).append(classificationInfo);
                              $('select[name="classification_id"]', frmSaveARFinding).val(data['data']['classification_info']['id']).trigger('change');
                          }
                          else{
                              $('select[name="classification_id"]', frmSaveARFinding).val(0).trigger('change');
                          }

                          if(data['data']['factor_info'] != null){
                              let factorInfo = '<option selected value="' + data['data']['factor_info']['id'] + '">' + data['data']['factor_info']['name'] + '</option>';
                              $('select[name="factor_id"]', frmSaveARFinding).append(factorInfo);
                              $('select[name="factor_id"]', frmSaveARFinding).val(data['data']['factor_info']['id']).trigger('change');
                          }
                          else{
                              $('select[name="factor_id"]', frmSaveARFinding).val(0).trigger('change');
                          }

                          if(data['data']['factor_item_list_info'] != null){
                              let factorItemListInfo = '<option selected value="' + data['data']['factor_item_list_info']['id'] + '">' + data['data']['factor_item_list_info']['name'] + '</option>';
                              $('select[name="factor_item_list_id"]', frmSaveARFinding).append(factorItemListInfo);
                              $('select[name="factor_item_list_id"]', frmSaveARFinding).val(data['data']['factor_item_list_info']['id']).trigger('change');
                          }
                          else{
                              $('select[name="factor_item_list_id"]', frmSaveARFinding).val(0).trigger('change');
                          }

                          $("select[name='in_charge[]'", frmSaveARFinding).html('');

                          if(data['data']['in_charge_details'].length > 0){
                              let inCharge = [];
                              for(let index = 0; index < data['data']['in_charge_details'].length; index++){
                                  inCharge.push(data['data']['in_charge_details'][index]['user_id']);
                                  let inChargeInfo = '<option selected value="' + data['data']['in_charge_details'][index]['user_id'] + '">' + data['data']['in_charge_details'][index]['user_info']['name'] + '</option>';
                                  $('select[name="in_charge[]"]', frmSaveARFinding).append(inChargeInfo);
                                  $('select[name="in_charge[]"]', frmSaveARFinding).val(data['data']['in_charge_details'][index]['user_id']).trigger('change');
                              }
                              // alert(inCharge);
                              $('select[name="in_charge[]"]', frmSaveARFinding).val(inCharge).trigger('change');
                          }
                          else{
                              $('select[name="in_charge[]"]', frmSaveARFinding).val(0).trigger('change');
                          }
                      }
                      // else{
                      //     $("select[name='department'", frmSaveARFinding).val('');
                      //     $("input[name='no'", frmSaveARFinding).val('');
                      // }
                  },
                  error: function(data, xhr, status){
                      Swal({
                          position: 'top-end',
                          type: 'error',
                          title: 'An error occured!',
                          showConfirmButton: false,
                          timer: 1500,
                          customClass: 'swal-wide',
                      });
                      $("input[name='no'", frmSaveARFinding).val('');
                      console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                  }
              });
            }
          //============================== On Going 16-08-21 END -Jannus ==============================


            $("#frmSaveARFinding").submit(function(e){
              e.preventDefault();
              SaveARFinding();
            });
            //============================== On Going 16-08-21 Start -Jannus ==============================
            function SaveARFinding() {
              $.ajax({
                    url: "save_ar_finding",
                    method: "post",
                    data: new FormData($("#frmSaveARFinding")[0]),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,

                    beforeSend: function(){

                    },
                    success: function(JsonObject){
                        if(JsonObject['validation'] == 'hasError'){
                            if(JsonObject['error']['actual_illustration'] === undefined){
                                $(".editActualIllustration").removeClass('is-invalid');
                                $(".editActualIllustration").attr('title', '');
                                $(".input-error-validation").text('');
                            }
                            else{
                                $(".editActualIllustration").addClass('is-invalid');
                                $(".input-error-validation").text(JsonObject['error']['actual_illustration'] + ' Note: This will remove the current actual illustration when you re-upload.');
                                $(".editActualIllustration").attr('title', JsonObject['error']['actual_illustration']);
                            }
                            Swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Saving Failed, Please check input fields!',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: 'swal-wide',
                            });
                        }
                        else{
                            if(JsonObject['result'] == 1){
                                Swal({
                                    position: 'top-end',
                                    type: 'success',
                                    title: 'Saved Successfully!',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    customClass: 'swal-wide',
                                });
                                $('#frmSaveARFinding')[0].reset();
                                $("#mdlSaveARFinding").modal('hide');
                                dtARFindings.draw();
                            }
                            else{
                                Swal({
                                    position: 'top-end',
                                    type: 'error',
                                    title: 'Saving Failed!',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    customClass: 'swal-wide',
                                });
                            }
                            
                        }
                        
                    },
                    error: function(data, xhr, status){
                        console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        console.log('SAVE AR FINDING');
                    }
                });
            }
            //============================== On Going 16-08-21 END -Jannus ==============================

            $("#tblARFindings").on('click', '.btnActionARFinding', function(){
              let id = $(this).attr('ar_finding-id');
              let status = $(this).attr('status');
              $("input[name='ar_finding_id'", $("#frmActionARFinding")).val(id);
              $("input[name='status'", $("#frmActionARFinding")).val(status);
              $("#mdlActionARFinding").modal('show');
            });

            $("#frmActionARFinding").submit(function(e){
              e.preventDefault();
              ActionARFinding();
            });
        });


    </script>
@endsection