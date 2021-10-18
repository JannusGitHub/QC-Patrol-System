@extends('layouts.qc_patrol_layout')
@section('title', 'Audit Results')

@section('content')
    <style type="text/css">
        /*table.table tbody td{
            padding-top: 3px; 
            padding-bottom: 1px;
            font-size: 12px;
        }*/

        table.table tbody td{
            /*background-color: black;*/
            padding-top: 3px; 
            padding-bottom: 1px;
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
        /*.page-item.active .page-link {
            background-color: lightgrey !important;
            border: 1px solid black;
        }
        .page-link {
            color: black !important;
        }*/
    </style>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Audit Results</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Audit Results
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
                                <div class="row">
                                  <div class="col-sm-12">
                                      <fieldset>
                                          <form method="get" id="formGenerateIntAuditResult">
                                              <table>
                                                  <!-- <tr>
                                                      <td><input type="checkbox" name="has_audit_date" id="chkGenIntRepAuditDate"> <label>Audit Date</label></td>
                                                      <td><input type="date" name="audit_date_from" class="form-control" title="Date From" id="dateGenIntRepDateFrom" disabled></td>
                                                      <td><input type="date" name="audit_date_to" class="form-control" title="Date To" id="dateGenIntRepDateTo" disabled></td>
                                                  </tr> -->
                                                  <tr>
                                                      <td><input type="checkbox" name="has_audit_id" id="chkGenIntAuditID"> <label>ID</label></td>
                                                      <td><input type="text" name="audit_id" class="form-control form-control-sm" title="Date From" id="txtGenIntAuditID" disabled></td>
                                                  </tr>
                                                  <tr>
                                                      <td><input type="checkbox" name="has_audit_date" id="chkGenIntRepAuditDate"> <label>Audit Date</label></td>
                                                      <td><input type="date" name="audit_date_from" class="form-control form-control-sm" title="Date From" id="dateGenIntRepDateFrom" disabled></td>
                                                      <td><input type="date" name="audit_date_to" class="form-control form-control-sm" title="Date To" id="dateGenIntRepDateTo" disabled></td>
                                                      <!-- <td>
                                                          <div id="drpGenIntRepAuditDate" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 400px">
                                                              <i class="fa fa-calendar"></i>&nbsp;
                                                              <span></span> <i class="fa fa-caret-down"></i>
                                                          </div>
                                                      </td> -->
                                                  </tr>
                                                  <!-- <tr>
                                                      <td><input type="checkbox" name="has_classification" id="chkGenIntRepClassification"> <label>Rank / Classification</label></td>
                                                      <td>
                                                          <select name="classification" class="form-control form-control-sm" id="selGenIntRepClassification" disabled>
                                                              <option value="NC">NC</option>
                                                              <option value="OFI">OFI</option>
                                                          </select>
                                                      </td>
                                                      <td>
                                                          <input type="text" class="form-control form-control-sm" name="nc_control_no" id="txtGenIntNCCtrlNo" placeholder="CPAR Ctrl No." disabled>
                                                      </td>
                                                  </tr> -->
                                                  <!-- <tr>
                                                      <td><input type="checkbox" name="has_category_of_findings" id="chkGenIntRepCatOfFin"> <label>Category of Findings</label></td>
                                                      <td>
                                                          <select name="category_of_findings" class="form-control form-control-sm" id="selGenIntRepCatOfFin" disabled>
                                                              <option value="RD">RD</option>
                                                              <option value="DD">DD</option>
                                                              <option value="PD">PD</option>
                                                              <option value="SOP">SOP</option>
                                                              <option value="Calibration">Calibration</option>
                                                              <option value="N/A">N/A</option>
                                                          </select>
                                                      </td>
                                                  </tr> -->
                                                  <tr>
                                                      <td><input type="checkbox" name="has_responsible_department" id="chkGenIntRepResDept"> <label>Responsible Department</label></td>
                                                      <td>
                                                          <select name="responsible_department[]" class="form-control form-control-sm select2 selectDepartment" multiple="multiple" style="width: 100%;" id="selGenIntRepResDept" disabled>
                                                              <!-- Code generated -->
                                                          </select>
                                                      </td>
                                                  </tr>
                                                  <!-- <tr>
                                                      <td><input type="checkbox" name="has_audit_report_control_no" id="chkGenIntRepCtrlNo"> <label>Audit Report Control No.</label></td>
                                                      <td>
                                                          <input type="text" class="form-control form-control-sm" name="audit_report_control_no" id="txtGenIntRepCtrlNo" disabled>
                                                      </td>
                                                  </tr> -->
                                                  <!-- <tr>
                                                      <td><input type="checkbox" name="has_item_no" id="chkGenIntItemNo"> <label>Item No.</label></td>
                                                      <td>
                                                          <input type="text" class="form-control form-control-sm" name="item_no" id="txtGenIntItemNo" disabled>
                                                      </td>
                                                  </tr> -->
                                                  
                                                  <tr>
                                                      <td><input type="checkbox" name="has_audit_stat" id="chkGenIntRepAuditStat"> <label>Audit Status</label></td>
                                                      <td>
                                                          <select name="audit_stat" class="form-control form-control-sm" id="selGenIntRepAuditStat" disabled>
                                                              <option value="1">For Improvement Plan</option>
                                                              <option value="2">For Closed-Out</option>
                                                              <option value="3">Close</option>
                                                          </select>
                                                      </td>
                                                      <td>
                                                           <button type="submit" class="btn btn-success"><i class="icon-refresh2" title="Generate" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Generate"></i></button>
                                                      </td>
                                                  </tr>
                                                  <!-- <tr>
                                                      <td><input type="checkbox" name="has_audit_stat" id="chkGenIntRepApprovalStat"> <label>Approval Status</label></td>
                                                      <td>
                                                          <select name="approval_status" class="form-control form-control-sm" id="selGenIntRepApprovalStat" disabled>
                                                              <option value="1">For QAD Approval</option>
                                                              <option value="2">For Section Head Approval</option>
                                                          </select>
                                                      </td>
                                                  </tr> -->
                                              </table>
                                          </form>
                                      </fieldset>
                                          
                                  </div>
                              </div>
                              <div class="float-right" style="float: right;">
                                  <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalSendIntBatchEmail" data-keyboard="false" id="btnShowModalSendIntBatchEmail" disabled>Send Batch Email (<span id="lblIntNoOfSendIntBatch">0</span>)</button>  -->

                                  <button class="btn btn-info btn-md" data-toggle="modal" data-target="#modalSendIntBatchEmail" data-keyboard="true" id="btnShowModalSendIntBatchEmail" disabled title="" ><i class="icon-mail6" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Send Internal Mail Batch" data-original-title=""></i> (<span id="lblIntNoOfSendIntBatch">0</span>)</button> 

                                  <button class="btn btn-success" data-toggle="modal" data-target="#modalAddIntAudit" data-keyboard="false" id="btnShowAddIntAuditModal"><i class="icon-plus" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Add Internal Audit"></i></button>
                              </div>
                              <br><br>
                              <div class="table-responsive">
                                  <table class="table table-bordered" id="tblInternalAuditResults" width="100%">
                                      <thead>
                                          <tr style="font-size: 12px;">
                                              <th>ID</th>
                                              <th><center><i class="icon-check-circle success darken-2" title="Check to Select"></i></center></th>
                                              <th>ID</th>
                                              <th>Report Control No.</th>
                                              <th>Audit Date</th>
                                              <th>Audit Type</th>
                                              <th>Auditors</th>
                                              <th>CPAR Ctrl No.</th>
                                              <th>Item No.</th>
                                              <th>Statement of Findings</th>
                                              <th>Responsible Department</th>
                                              <th>Sending Status</th>
                                              <th>Audit Status</th>
                                              <th>Approval Status</th>
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

          <!-- MODALS -->
            <!-- ------------------------ INTERNAL AUDIT -------------- -->
            <!-- Modal Add Internal Audit -->
            <div class="modal fade text-xs-left" id="modalAddIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-lg custom-modal-md" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formAddIntAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3">QC Patrol Details</h4>
                      </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <!-- <center><label for="projectinput1"><b>FOR QAD ADMIN</b></label></center> -->
                                <h5 class="form-section"><i class="icon-clipboard4"></i> For QC Patrol Admin</h5>
                                <!-- <div class="row"> -->
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Type</label>
                                            <select class="form-control" id="selAddIntAuditType" name="audit_type">
                                                <option value="0" disabled selected>--Select Audit Type--</option>
                                                <option value="1">EMS System</option>
                                                <option value="2">QMS System</option>
                                                <option value="3">Process</option>
                                                <option value="4">Product</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Business Process / Section / Supplier Name</label>
                                            <input type="text" id="txtAddIntAuditBusProcSecSupp" class="form-control" placeholder="Business Process / Section / Supplier Name" name="business_process">
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Product Line</label>
                                            <input type="text" id="txtAddIntAuditBusProcSecSupp" class="form-control" placeholder="Product Line" name="product_line">
                                        </div>
                                    </div> -->
                                <!-- </div> -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput2">Audit Date</label>
                                            <input type="date" id="dateAddIntAuditFrom" class="form-control" name="audit_date_from">
                                            <input type="date" id="dateAddIntAuditTo" class="form-control" name="audit_date_to">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Auditors</label>
                                            <input type="text" id="txtAddIntAuditAuditors" class="form-control" placeholder="Auditors" name="auditors">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Auditees</label>
                                            <input type="text" id="txtAddIntAuditAuditees" class="form-control" placeholder="Auditees" name="auditees">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Findings Issued Date</label>
                                            <input type="date" id="dateAddIntAuditFindIssDate" class="form-control" placeholder="Audit Findings Issued Date" name="audit_findings_issued_date">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="projectinput1">Deadline of Submission</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="number" id="txtAddIntAuditDeadSubDays" class="form-control" name="deadline_of_submission_days" value="0" min="0">
                                            </div>
                                            <div class="col-md-8">
                                                <input type="date" id="dateAddIntAuditDeadSub" class="form-control" name="deadline_of_submission" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Actual Date of Submission</label>
                                            <input type="date" id="dateAddIntAuditActDateSub" class="form-control" name="actual_date_of_submission" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Factors</label>
                                            <select class="form-control select2" id="" name="factor_id" style="width: 100%;">
                                                <!-- code generated -->
                                                <option>Man</option>
                                                <option>Machine</option>
                                                <option>Material</option>
                                                <option>Method</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Evaluation Item</label>
                                            <input type="text" class="form-control" id="selAddIntAuditCatOfFind" name="category_of_findings" placeholder="Evaluation Item">
                                        </div>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Item List</label>
                                            <select class="form-control select2" id="" name="factor_id" style="width: 100%;">
                                                <!-- code generated -->
                                                <option>1.1</option>
                                                <option>1.2</option>
                                                <option>1.3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Classification by Phenomenon</label>
                                            <select class="form-control select2" id="" name="factor_id" style="width: 100%;">
                                                <!-- code generated -->
                                                <option>Phenomenon 1</option>
                                                <option>Phenomenon 2</option>
                                                <option>Phenomenon 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">       
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">CPAR Control No.</label>
                                            <input type="text" class="form-control" id="txtAddIntAuditNCCtrlNo" name="nc_control_no" placeholder="CPAR Control No." disabled>
                                        </div>
                                    </div>    -->    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Product Line</label>
                                            <select class="form-control select2" id="" name="factor_id" style="width: 100%;">
                                                <!-- code generated -->
                                                <option>TS - Productin Line</option>
                                                <option>CN - Production Line</option>
                                                <option>YF - Production Line</option>
                                                <option>PPS - Production Line</option>
                                            </select>
                                        </div>
                                    </div>                      
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Responsible Section</label>
                                            <select class="form-control select2" id="selAddIntAuditResDept" name="responsible_department[]" style="width: 100%;" multiple="multiple">
                                                <!-- <option disabled selected>--Select Responsible Department--</option> -->
                                                <!-- code generated -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Item No.</label>
                                            <input type="text" id="txtAddIntAuditItemNo" class="form-control" placeholder="Item No." name="item_no">
                                        </div>
                                    </div> -->
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Status</label>
                                            <select class="form-control" id="selAddIntAuditStat" name="audit_stat">
                                                <option value="1">For Improvement Plan</option>
                                                <option value="2">For Close-Out Audit</option>
                                                <option value="3">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Sending Status</label>
                                            <select class="form-control" id="selAddIntAuditSendStat" name="sending_stat">
                                                <option value="1">Pending</option>
                                                <option value="2">Done</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Statement of Finding</label>
                                            <textarea class="form-control" cols="10" rows="6" id="txtAddIntAuditStmtOfFin" name="statement_of_findings" placeholder="..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">Illustration / Photo</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgAddIntAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <input type="file" class="form-control" id="fileAddIntAuditIllu" name="img_illustration" accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">PDF</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditPDF" id="imgPDFAddIntAuditIllu" src="{{ asset('public/storage/pdf-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <input type="file" class="form-control" id="filePDFAddIntAuditIllu" name="pdf_illustration" accept=".pdf">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">Remarks</label>
                                            <textarea class="form-control" cols="10" rows="6" id="txtAddIntAuditIllu" name="illustration" placeholder="..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <br><br>
                                            <input type="checkbox" id="chkAddIntAuditReqForApproval" class="" name="request_approval" checked="checked">
                                            <label for="projectinput1">Request for Approval</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <br><br>
                                            <input type="checkbox" id="chkAddIntAuditSendEmail" class="" name="send_email" disabled="disabled">
                                            <label for="projectinput1">Send Email</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- <hr> -->
                                <!-- <center><label for="projectinput1"><b>FOR OTHER SECTION</b></label></center> -->
                                <h5 class="form-section"><i class="icon-clipboard4"></i> For Other Section</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Root Cause</label>
                                            <!-- <input type="text" id="txtAddIntAuditRootCause" class="form-control" placeholder="Root Cause" name="root_cause">\ -->
                                            <textarea class="form-control" cols="10" rows="4" id="txtAddIntAuditRootCause" name="root_cause" placeholder="Root Cause"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Improvement Plan</label>
                                            <textarea class="form-control" cols="10" rows="6" id="txtAddIntAuditImpPlan" name="improvement_plan" placeholder="Improvement Plan"></textarea>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1">Correction</label>
                                            <!-- <input type="text" id="txtAddIntAuditCorrection" class="form-control" placeholder="Correction" name="correction"> -->
                                            <textarea class="form-control" cols="10" rows="5" id="txtAddIntAuditCorrection" name="correction"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <!-- <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <select class="form-control select2 selectUser" id="selAddIntAuditCorrPerInCharge" name="correction_person_in_charge[]" style="width: 100%;" multiple="multiple">
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <input type="text" id="txtAddIntAuditCorrCommDate" class="form-control" name="txt_correction_person_in_charge">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Commitment Date</label>
                                                    <input type="date" id="dateAddIntAuditCorrCommDate" class="form-control" name="correction_commitment_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1">Containment</label>
                                            <!-- <input type="text" id="txtAddIntAuditContainment" class="form-control" placeholder="Containment" name="containment"> -->
                                            <textarea class="form-control" cols="10" rows="5" id="txtAddIntAuditContainment" name="containment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <!-- <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <select class="form-control select2 selectUser" id="selAddIntAuditConPerInCharge" name="containment_person_in_charge[]" style="width: 100%;" multiple="multiple">
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <input type="text" class="form-control" id="txtAddIntAuditConPerInCharge" name="txt_containment_person_in_charge">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Commitment Date</label>
                                                    <input type="date" id="dateAddIntAuditConCommDate" class="form-control" name="containment_commitment_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1">Systemic</label>
                                            <!-- <input type="text" id="txtAddIntAuditSystematic" class="form-control" placeholder="Systematic" name="systematic"> -->
                                            <textarea class="form-control" cols="10" rows="5" id="txtAddIntAuditSystematic" name="systematic"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <!-- <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <select class="form-control select2 selectUser" id="selAddIntAuditSysPerInCharge" name="systematic_person_in_charge[]" style="width: 100%;" multiple="multiple">
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <input class="form-control" id="txtAddIntAuditSysPerInCharge" name="txt_systematic_person_in_charge">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Commitment Date</label>
                                                    <input type="date" id="dateAddIntAuditSysCommDate" class="form-control" name="systematic_commitment_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Person In Charge</label>
                                            <select class="form-control select2 selectUser" id="selAddIntAuditPerInCharge" name="person_in_charge[]" style="width: 100%;" multiple="multiple">
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Commitment Date</label>
                                            <input type="date" id="txtAddIntAuditCommDate" class="form-control" name="commitment_date">
                                        </div>
                                    </div>
                                </div> -->

                                <!-- <hr> -->
                                <!-- <center><label for="projectinput1"><b>For QC Patrol Admin</b></label></center> -->
                                <h5 class="form-section"><i class="icon-clipboard4"></i> For QC Patrol Admin</h5>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">Close-Out Audit</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgAddIntAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <input type="file" class="form-control" id="fileAddIntAuditCorrAct" name="img_corrective_action" accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">PDF</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditPDF" id="imgPDFAddIntAuditCorrAct" src="{{ asset('public/storage/pdf-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <input type="file" class="form-control" id="filePDFAddIntAuditCorrAct" name="pdf_corrective_action" accept=".pdf">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">Remarks</label>
                                            <textarea class="form-control" cols="10" rows="6" id="txtAddIntAuditCorrAct" name="corrective_action" placeholder="..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Status</label>
                                            <select class="form-control" id="selAddIntAuditStat" name="audit_stat">
                                                <option value="1">For Improvement Plan</option>
                                                <option value="2">For Close-Out Audit</option>
                                                <option value="3">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Sending Status</label>
                                            <select class="form-control" id="selAddIntAuditSendStat" name="sending_stat">
                                                <option value="1">Pending</option>
                                                <option value="2">Done</option>
                                            </select>
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
            <!-- ../ Modal Add Internal Audit -->

            <!-- Modal Edit Internal Audit -->
            <div class="modal fade text-xs-left" id="modalEditIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-lg custom-modal-md" role="document">
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
                                <h5 class="form-section"><i class="icon-clipboard4"></i> For QAD Admin <span style="float: right; margin-right: 100px;">ID # : <span class="spanEditIntAuditID"></span></span></h5>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Type</label>
                                            <input type="hidden" class="form-control" name="internal_audit_id" id="txtEditIntAuditId">
                                            <select class="form-control" id="selEditIntAuditType" name="audit_type">
                                                <option value="0" disabled selected>--Select Audit Type--</option>
                                                <option value="1">EMS System</option>
                                                <option value="2">QMS System</option>
                                                <option value="3">Process</option>
                                                <option value="4">Product</option>
                                            </select>
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
                                            <label for="projectinput1">Business Process / Section / Supplier Name</label>
                                            <input type="text" id="txtEditIntAuditBusProcSecSupp" class="form-control" placeholder="Business Process / Section / Supplier Name" name="business_process">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput2">Audit Date</label>
                                            <input type="date" id="dateEditIntAuditDateFrom" class="form-control" name="audit_date_from">
                                            <input type="date" id="dateEditIntAuditDateTo" class="form-control" name="audit_date_to">
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
                                            <label for="projectinput1">Audit Findings Issued Date</label>
                                            <input type="date" id="dateEditIntAuditFindIssDate" class="form-control" placeholder="Audit Findings Issued Date" name="audit_findings_issued_date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="projectinput1">Deadline of Submission</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="number" id="txtEditIntAuditDeadSubDays" class="form-control" name="deadline_of_submission_days" value="0" min="0">
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
                                            <input type="date" id="dateEditIntAuditActDateSub" class="form-control" name="actual_date_of_submission" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">ISO / IATF Clause</label>
                                            <input type="text" class="form-control" id="txtEditIntAuditIsoAitfClause" name="iso_iatf_clause" placeholder="ISO / IATF Clause">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Evaluation Item</label>
                                            <input type="text" class="form-control" id="selEditIntAuditCatOfFind" name="category_of_findings" placeholder="Evaluation Item">
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Evaluation Item</label>
                                            <select class="form-control select2 selectEvaluationItem" id="selEditIntAuditEvalItem" name="evaluation_item_id" style="width: 100%;">
                                                
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Classification by Phenomenon</label>
                                            <select class="form-control" id="selEditIntAuditClassRank" name="classification">
                                                <option disabled selected>--Select Classification--</option>
                                                <option value="NC">NC</option>
                                                <option value="OFI">OFI</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">CPAR Control No.</label>
                                            <input type="text" class="form-control" id="txtEditIntAuditNCCtrlNo" name="nc_control_no" placeholder="CPAR Control No." disabled>
                                        </div>
                                    </div>   

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Responsible Department</label>
                                            <select class="form-control select2" id="selEditIntAuditResDept" name="responsible_department[]" style="width: 100%;" multiple="multiple">
                                                <!-- code generated -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Item No.</label>
                                            <input type="text" id="txtEditIntAuditItemNo" class="form-control" placeholder="Item No." name="item_no">
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Status</label>
                                            <select class="form-control" id="selEditIntAuditStat" name="audit_stat">
                                                <option value="1">For Improvement Plan</option>
                                                <option value="2">For Close-Out Audit</option>
                                                <option value="3">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Sending Status</label>
                                            <select class="form-control" id="selEditIntAuditSendStat" name="sending_stat">
                                                <option value="1">Pending</option>
                                                <option value="2">Done</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Statement of Findings</label>
                                            <textarea class="form-control" cols="10" rows="10" id="txtEditIntAuditStmtOfFin" name="statement_of_findings" placeholder="Statement of Findings"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">Illustration / Photo</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgEditIntAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon" title="Check to Remove Image"><input type="checkbox" id="chkEditIntAuditIllu" name="remove_img_illustration" accept=".jpg, .jpeg, .png"></span>
                                                <input type="file" class="form-control" id="fileEditIntAuditIllu" name="img_illustration" accept=".jpg, .jpeg, .png"> 
                                            </div>

                                            <input type="hidden" name="current_img_illustration" id="txtEditIntAuditCurrIllu">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">PDF</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditPDF" id="imgEditIntAuditIlluPDF" src="{{ asset('public/storage/pdf-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon" title="Check to Remove PDF"><input type="checkbox" id="chkEditIntAuditIlluPDF" name="remove_pdf_illustration"></span>
                                                <input type="file" class="form-control" id="fileEditIntAuditIlluPDF" name="pdf_illustration" accept=".pdf">
                                            </div>

                                            <input type="hidden" name="current_pdf_illustration" id="txtEditIntAuditCurrIlluPDF">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br>
                                            <textarea class="form-control" cols="10" rows="6" id="txtEditIntAuditIllu" name="illustration" placeholder="Illustration / Photo"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="form-section"><i class="icon-clipboard4"></i> For Other Section</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Root Cause</label>
                                            <!-- <input type="text" id="txtEditIntAuditRootCause" class="form-control" placeholder="Root Cause" name="root_cause"> -->
                                            <textarea class="form-control" cols="10" rows="4" id="txtEditIntAuditRootCause" name="root_cause" placeholder="Root Cause"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1">Correction</label>
                                            <!-- <input type="text" id="txtEditIntAuditCorrection" class="form-control" placeholder="Correction" name="correction"> -->
                                            <textarea class="form-control" cols="10" rows="5" id="txtEditIntAuditCorrection" name="correction"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <!-- <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <select class="form-control select2 selectUser" id="selEditIntAuditCorrPerInCharge" name="correction_person_in_charge[]" style="width: 100%;" multiple="multiple">
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <input type="text" id="txtEditIntAuditCorrPerInCharge" class="form-control" name="txt_correction_person_in_charge">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Commitment Date</label>
                                                    <input type="date" id="dateEditIntAuditCorrCommDate" class="form-control" name="correction_commitment_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1">Containment</label>
                                            <!-- <input type="text" id="txtEditIntAuditContainment" class="form-control" placeholder="Containment" name="containment"> -->
                                            <textarea class="form-control" cols="10" rows="5" id="txtEditIntAuditContainment" name="containment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <!-- <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <select class="form-control select2 selectUser" id="selEditIntAuditConPerInCharge" name="containment_person_in_charge[]" style="width: 100%;" multiple="multiple">
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <input class="form-control" id="txtEditIntAuditConPerInCharge" name="txt_containment_person_in_charge">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Commitment Date</label>
                                                    <input type="date" id="dateEditIntAuditConCommDate" class="form-control" name="containment_commitment_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1">Systemic</label>
                                            <!-- <input type="text" id="txtEditIntAuditSystematic" class="form-control" placeholder="Systematic" name="systematic"> -->
                                            <textarea class="form-control" cols="10" rows="5" id="txtEditIntAuditSystematic" name="systematic"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <!-- <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <select class="form-control select2 selectUser" id="selEditIntAuditSysPerInCharge" name="systematic_person_in_charge[]" style="width: 100%;" multiple="multiple">
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Person In Charge</label>
                                                    <input class="form-control" id="txtEditIntAuditSysPerInCharge" name="txt_systematic_person_in_charge">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1">Commitment Date</label>
                                                    <input type="date" id="dateEditIntAuditSysCommDate" class="form-control" name="systematic_commitment_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Improvement Plan</label>
                                            <textarea class="form-control" cols="10" rows="6" id="txtEditIntAuditImpPlan" name="improvement_plan" placeholder="Improvement Plan"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Person In Charge</label>
                                            <select class="form-control select2 selectUser" id="selEditIntAuditPerInCharge" name="person_in_charge[]" multiple="multiple" style="width: 100%;">
                                            </select>
                                        </div>
                                    </div> -->
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
                                            <br><br>
                                            <input type="checkbox" id="chkEditIntAuditReqForApproval" class="" name="request_approval" checked="checked">
                                            <label for="projectinput1">Request for Approval</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <br><br>
                                            <input type="checkbox" id="chkEditIntAuditSendEmail" class="" name="send_email" disabled="disabled">
                                            <label for="projectinput1">Send Email</label>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="form-section"><i class="icon-clipboard4"></i> For QAD Admin</h5>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">Close-Out Audit</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgEditIntAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon" title="Check to Remove Image"><input type="checkbox" id="chkEditIntAuditCurrCorrAct" name="remove_img_corrective_action"></span>
                                                <input type="file" class="form-control" id="fileEditIntAuditCorrAct" name="img_corrective_action" accept=".jpg, .jpeg, .png"> 

                                                <input type="hidden" name="current_img_corrective_action" id="txtEditIntAuditCurrCorrAct">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">PDF</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditPDF" id="imgEditIntAuditCorrActPDF" src="{{ asset('public/storage/pdf-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon" title="Check to Remove PDF"><input type="checkbox" id="chkEditIntAuditCurrCorrActPDF" name="remove_pdf_corrective_action"></span>
                                                <input type="file" class="form-control" id="fileEditIntAuditCorrActPDF" name="pdf_corrective_action" accept=".pdf"> 

                                                <input type="hidden" name="current_pdf_corrective_action" id="txtEditIntAuditCurrCorrActPDF">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <br>
                                        <textarea class="form-control" cols="10" rows="6" id="txtEditIntAuditCorrAct" name="corrective_action" placeholder="Close-Out Audit"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Status</label>
                                            <select class="form-control" id="selEditIntAuditStat" name="audit_stat">
                                                <option value="1">For Improvement Plan</option>
                                                <option value="2">For Close-Out Audit</option>
                                                <option value="3">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Sending Status</label>
                                            <select class="form-control" id="selEditIntAuditSendStat" name="sending_stat">
                                                <option value="1">Pending</option>
                                                <option value="2">Done</option>
                                            </select>
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

            <!-- Modal View Int Batch Email Audit -->
            <div class="modal fade text-xs-left" id="modalSendIntBatchEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Internal Batch Email</h4>
                  </div>
                  <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tblSendIntBatchEmail">
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
                  <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary" id="btnSendIntBatchEmail">Send</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ../ Modal View TUV Batch Email Audit -->

            <!-- Modal Close Internal Audit -->
            <div class="modal fade text-xs-left" id="modalCloseIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formCloseIntAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Close Internal Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p>Are you sure to close this selected Internal Audit?</p>
                            <input type="hidden" name="internal_audit_id" id="txtCloseIntAuditId">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Close Internal Audit -->

            <!-- Modal Open Internal Audit -->
            <div class="modal fade text-xs-left" id="modalOpenIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formOpenIntAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Open Internal Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p>Are you sure to open this selected Internal Audit?</p>
                            <input type="hidden" name="internal_audit_id" id="txtOpenIntAuditId">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Close Internal Audit -->

            <!-- Modal Done Internal Audit -->
            <div class="modal fade text-xs-left" id="modalDoneIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formDoneIntAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Done Internal Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p>Are you sure to done this selected Internal Audit?</p>
                            <input type="hidden" name="internal_audit_id" id="txtDoneIntAuditId">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Done Customer Audit -->

            <!-- Modal Approval Int Audit -->
            <div class="modal fade text-xs-left" id="modalIntQADApproval" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formIntQADApproval">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="h4IntQADApprovalTitle"><i class=""></i> Internal Audit Approval</h4>
                      </div>
                      <div class="modal-body">
                            <p id="pIntQADApprovalBody">Are you sure to approve this selected Internal Audit?</p>
                            <input type="hidden" name="internal_audit_id" id="txtIntQADApprovalAuditId">
                            <input type="hidden" name="qad_approval" id="txtIntQADApproval">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Approval Internal Audit -->

            <!-- Modal Pend Internal Audit -->
            <div class="modal fade text-xs-left" id="modalPendIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formPendIntAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Pend Internal Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p>Are you sure to pend this selected Internal Audit?</p>
                            <input type="hidden" name="internal_audit_id" id="txtPendIntAuditId">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Pend Customer Audit -->

            <!-- Modal View Internal Audit -->
            <div class="modal fade text-xs-left" id="modalViewIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-lg custom-modal-md" role="document">
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
                                <!-- <center><label for="projectinput1"><b>FOR QAD ADMIN</b></label></center> -->
                                <h5 class="form-section"><i class="icon-clipboard4"></i> For QAD Admin <span style="float: right; margin-right: 100px;">ID # : <span class="spanViewIntAuditID"></span></span></h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Audit Type</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditType">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Audit Report Control No.</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditRepConNo">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Business Process / Section / Supplier Name</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditBusProcSecSupp">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Audit Date</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditDate">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Auditors</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditAuditors">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Auditees</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditAuditees">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Audit Findings Issued Date</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditFindIssDate">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Deadline of Submission</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditDeadSub">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Actual Date of Submission</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditActDateSub">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">ISO / IATF Clause</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditIsoAitfClause">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Evaluation Item</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditCatOfFin">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Classification / Rank</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditClassRank">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">CPAR Control No.</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditCPARCtrlNo">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Responsible Department</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditResDept">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Item No.</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditItemNo">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Statement of Findings</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditStmtOfFin">--</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Illustration / Photo</label></strong> <br>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgViewIntAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">PDF</label></strong> <br>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditPDF" id="pdfViewIntAuditIllu" src="{{ asset('public/storage/pdf-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="projectinput2" id="lblViewIntAuditIllu">--</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Sending Status</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditSendingStat">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Audit Status</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditStat">--</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- <hr> -->
                                <!-- <center><label for="projectinput1"><b>FOR OTHER SECTION</b></label></center> -->

                                <h5 class="form-section"><i class="icon-clipboard4"></i> For Other Section</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Root Cause</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditRootCause">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Correction</b></label><br>
                                            <label id="lblViewIntAuditCorrection">---</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Person In Charge</b></label><br>
                                                    <label id="lblViewIntAuditCorrPerInCharge">---</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Commitment Date</b></label><br>
                                                    <label id="lblViewIntAuditCorrCommDate">---</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Containment</b></label><br>
                                            <label id="lblViewIntAuditContainment">---</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Person In Charge</b></label><br>
                                                    <label id="lblViewIntAuditConPerInCharge">---</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Commitment Date</b></label><br>
                                                    <label id="lblViewIntAuditConCommDate">---</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Systemic</b></label><br>
                                            <label id="lblViewIntAuditSystemic">---</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Person In Charge</b></label><br>
                                                    <label id="lblViewIntAuditSysPerInCharge">---</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Commitment Date</b></label><br>
                                                    <label id="lblViewIntAuditSysCommDate">---</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Improvement Plan</label></strong><br>
                                            <label for="projectinput2" id="lblViewIntAuditImpPlan">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Person In Charge</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditPerInCharge">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Commitment Date</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditCommDate">--</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- <hr> -->
                                <!-- <center><label for="projectinput1"><b>FOR QAD ADMIN</b></label></center> -->
                                <h5 class="form-section"><i class="icon-clipboard4"></i> For QAD Admin</h5>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Close-Out Audit</label></strong> <br>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgViewIntAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">PDF</label></strong> <br>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditPDF" id="pdfViewIntAuditCorrAct" src="{{ asset('public/storage/pdf-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><label for="projectinput1">Remarks</label></strong> <br>
                                        <label for="projectinput2" id="lblViewIntAuditCorrAct">--</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Created By</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditCreatedBy">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Last Updated By</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditLastUpdatedBy">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Created At</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditCreatedAt">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Last Updated At</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditLastUpdatedAt">--</label>
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

            <!-- Modal ChangeIntAuditStat Internal Audit -->
            <div class="modal fade text-xs-left" id="modalChangeIntAuditStat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formChangeAuditIntStat">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="h4ChangeAuditIntStatTitle"><i class=""></i> Change Audit Stat Int Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p id="pChangeAuditIntStatBody">Are you sure to change audit stat this selected Int Audit?</p>
                            <input type="hidden" name="internal_audit_id" id="txtChangeAuditIntStatAuditId">
                            <input type="hidden" name="internal_audit_stat" id="txtChangeAuditIntStatAuditStat">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal ChangeSuppAuditStat Internal Audit -->

    <!-- COMMON MODAL -->
    <div class="modal fade text-xs-left" id="modalViewCommonAuditImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" style="background-color: rgb(51, 51, 51, 0.8);">
        <div style="float: right; margin-right: 25px; margin-top: 10px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
          </button>
        </div>
        <div class="modal-dialog modal-lg" role="document">
          <center>
              <img id="imgPrevCommonAuditImage" style="min-width: 600px; min-height: 600px; max-width: 860px; max-height: 900px;">
            </center>
        </div>
      </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection

@section('js_content')
    <script type="text/javascript">
        // let globalUserAccess = $("#txtGlobalUserAccessLevelId").val();
        
        // Required for modal scrollbar unlocking
        $("body").css({"overflow-y" : "auto"});
        $(document).on("hidden.bs.modal", function () {
            $("body").addClass("modal-open");
            $("body").css({"overflow-y" : "auto"});
        });
        $(document).on("show.bs.modal", function () {
            $("body").css({"overflow-y" : "hidden"});
        });

        let globalUserAccessLevelId = 0;
        // COMMON JAVASCRIPT CODES
        $(document).ready(function(){
          globalUserAccessLevelId = $("#txtGlobalUserAccessLevelId").val();
          $(".commonAuditImg").click(function(){
            $("#modalViewCommonAuditImage").modal('show');
            $("#imgPrevCommonAuditImage").attr('src', $(this).attr('src'));
          });

          $(".select2").select2();
          GetDepartmentByStat(1, $(".selectDepartment"));
          GetCboEvaluationItemByStat(1, $(".selectEvaluationItem"));

          $(document).on('click','#tblInternalAuditResults tbody tr',function(e){
            $(this).closest('tbody').find('tr').removeClass('table-active');
            $(this).closest('tr').addClass('table-active');
          });

          $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
              var target = $(e.target).attr("href") // activated tab              
              if(target == "#active"){
                dataTableTUVAudits.ajax.reload( null, false );
              }
              else if(target == "#tabCustomer"){
                dataTableCusAudits.ajax.reload( null, false );
              }
              else if(target == "#tabInternal"){
                dataTableInternalAudits.ajax.reload( null, false );
              }
              else if(target == "#tabSupplier"){
                dataTableSupplierAudits.ajax.reload( null, false );
              }
              
          });

          $(".commonAuditPDF").click(function(){
            let pdfLink = $(this).attr('pdfLink');
            if(pdfLink == "" || pdfLink == undefined || pdfLink == null){
            }
            else{
                window.open(pdfLink, '_blank');
            }
          });

          $(".menu-toggle").on('click', function(){
            dataTableTUVAudits.ajax.reload( null, false );
            dataTableCusAudits.ajax.reload( null, false );
            dataTableInternalAudits.ajax.reload( null, false );
            dataTableSupplierAudits.ajax.reload( null, false );
          });

          $(document).on('click','#tblSendIntBatchEmail tbody tr',function(e){
            $(this).closest('tbody').find('tr').removeClass('table-active');
            $(this).closest('tr').addClass('table-active');
          });

          $.fn.dataTable.ext.errMode = 'none'; //this is required to avoid alerting datatable error message
          // $.fn.dataTable.ext.classes.sPageButton = 'pagination pagination-sm';
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

        let internal_audit_id = 0;
        let internal_date_from = 0;
        let internal_date_to = 0;
        let internal_audit_type = 0;
        // let internal_audit_type_pref_rep_ctrl_no = 0;
        let internal_classification = 0;
        let internal_category_of_findings = 0;
        let internal_responsible_department = 0;
        let internal_audit_stat = 0;
        let audit_report_control_no = 0;
        let internal_item_no = 0;
        let internal_nc_control_no = 0;
        let internal_approval_stat = 0;
        let internal_evaluation_item = null;

        let dataTableIntBatchAudits;
        let arrIntSendEmail = [];

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
                "processing" : true,
                "serverSide" : true,
                "ajax" : {
                    url: "view_internal_audit_by_stat",
                    "data": function (param){
                        param.audit_id = internal_audit_id;
                        param.date_from = internal_date_from;
                        param.date_to = internal_date_to;
                        param.audit_type = internal_audit_type;
                        // param.audit_type_pref_rep_ctrl_no = internal_audit_type_pref_rep_ctrl_no;
                        param.classification = internal_classification;
                        param.category_of_findings = internal_category_of_findings;
                        param.responsible_department = internal_responsible_department;
                        param.audit_stat = internal_audit_stat;
                        param.approval_stat = internal_approval_stat;
                        param.item_no = internal_item_no;
                        param.nc_control_no = internal_nc_control_no;
                        param.audit_report_control_no = audit_report_control_no;
                        param.evaluation_item = internal_evaluation_item;
                        param.user_access = globalUserAccessLevelId;
                    }
                }, 
                "lengthMenu" : [[10,25,50,100,500],[10,25,50,100,500]],
                'columnDefs': [
                    { 'orderData':[0], 'targets': [0] },
                    {
                        'targets': [0],
                        'visible': false,
                        'searchable': false
                    },
                    {
                      "targets": [6, 7],
                      "data": null,
                      "defaultContent": "--"
                    },
                    {
                        "targets": '_all',
                        "createdCell": function (td, cellData, rowData, row, col) {
                            $(td).css('padding', '5px');
                        }
                    }
                ],   
                "columns":[
                    { "data" : "internal_audit_id", visible:false},
                    { "data" : "check_box_send", orderable:false, searchable:false },
                    { "data" : "internal_audit_id" },
                    { "data" : "audit_report_control_no" },
                    { "data" : "formatted_audit_date" },
                    { "data" : "audit_type" },
                    { "data" : "auditors" },
                    { "data" : "nc_control_no" },
                    { "data" : "item_no" },
                    { "data" : "statement_of_findings" },
                    { "data" : "internal_departments", "render" : "[, ].departments.0.department_name"},
                    { "data" : "label1" },
                    { "data" : "label2" },
                    { "data" : "approval_stat" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
               "stateSave": false,
                "pagingType": "full_numbers",
                scrollY:        "400px",
                scrollX:        true,
                scrollCollapse: true,
                paging:         false,
                fixedColumns:   {
                    leftColumns: 6,
                    rightColumns: 1
                },
                "lengthMenu" : [[10,25,50,100,-1],[10,25,50,100,"All"]],
                "paging": true,
                "scrollCollapse": true,
                "order":[[ 2, "desc" ]],
                "pageLength": 10,
                "initComplete": function(settings, json) {
                    $(".chkSendIntAudit").each(function(index){
                        if(arrIntSendEmail.includes($(this).attr('internal-id'))){
                            $(this).attr('checked', 'checked');
                        }
                    });
                },
                "drawCallback": function( settings ) {
                    $(".chkSendIntAudit").each(function(index){
                        if(arrIntSendEmail.includes($(this).attr('internal-id'))){
                            $(this).attr('checked', 'checked');
                        }
                    });
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
            });//end of dataTableInternalAudits

            dataTableIntBatchAudits = $("#tblSendIntBatchEmail").on( 'error.dt', function ( e, settings, techNote, message ) {
                Swal({
                      position: 'top-end',
                      type: 'error',
                      title: 'Internal Batch DataTable Failed!',
                      showConfirmButton: false,
                      timer: 1500,
                      customClass: 'swal-wide',
                  });
              }).DataTable({
                  "processing" : true,
                  "serverSide" : true,
                  "ajax" : {
                      url: "view_batch_internal_audit_by_stat",
                      "data": function (param){
                          param.internal_audit_id = arrIntSendEmail;
                      }
                  },            
                  "columns":[
                        { "data" : "formatted_audit_date" },
                        { "data" : "audit_type" },
                        { "data" : "auditors" },
                        { "data" : "audit_report_control_no" },
                        { "data" : "label1" },
                        { "data" : "label2" },
                        { "data" : "action1", orderable:false, searchable:false }
                  ],
              });//end of dataTableIntBatchAudits


          // GetDepartmentByStat(1, $("#selGenIntRepResDept"));

            // FOR DATETIME PICKER
            let start = 0;
            let end = 0;

            function cbGenInternalAudit(start, end) {
                if(start == 0 && end == 0){
                    $('#drpGenIntRepAuditDate span').html('All');
                }
                else{
                    $("#chkGenIntRepAuditDate").prop('checked', 'checked');
                    $('#drpGenIntRepAuditDate span').html(start.format('MMMM DD, YYYY') + ' - ' + end.format('MMMM DD, YYYY'));

                    internal_date_from = start.format('YYYY-MM-DD');
                    internal_date_to = end.format('YYYY-MM-DD');
                }
            }

            $('#drpGenIntRepAuditDate').daterangepicker({
                startDate: start,
                endDate: end,
                showDropdowns: true,
                // autoApply: true,
                ranges: {
                   'Today': [moment(), moment()],
                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                   'This Month': [moment().startOf('month'), moment().endOf('month')],
                   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cbGenInternalAudit);

            cbGenInternalAudit(start, end);
            // END OF DATETIME PICKER

            $("#formGenerateIntAuditResult").submit(function(event){
                event.preventDefault();
                if($("#txtGenIntAuditID").attr('disabled') != 'disabled' && $("#txtGenIntAuditID").val() != '') {
                    internal_audit_id = $("#txtGenIntAuditID").val();
                }
                else{
                    internal_audit_id = 0;
                }

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

                // alert(internal_date_from + ' - ' + internal_date_to);

                // if($("#chkGenIntRepAuditDate").prop('checked', 'checked')) {
                //     alert('Meron');
                // }
                // else{
                //     alert('Wala');
                // }

                if($("#selGenIntRepAuditType").attr('disabled') != 'disabled' && $("#selGenIntRepAuditType").val() != '') {
                    internal_audit_type = $("#selGenIntRepAuditType").val();
                    // internal_audit_type_pref_rep_ctrl_no = $("#selGenIntRepAuditTypePrefRepCtrlNo").val();
                }
                else{
                    internal_audit_type = 0;
                    // internal_audit_type_pref_rep_ctrl_no = 0;
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
                    internal_responsible_department = $("#selGenIntRepResDept").select2('val');
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

                if($("#selGenIntRepApprovalStat").attr('disabled') != 'disabled' && $("#selGenIntRepApprovalStat").val() != '' && $("#selGenIntRepApprovalStat").val() != null) {
                    internal_approval_stat = $("#selGenIntRepApprovalStat").val();
                }
                else {
                    internal_approval_stat = 0;
                }

                if($("#txtGenIntNCCtrlNo").attr('disabled') != 'disabled' && $("#txtGenIntNCCtrlNo").val() != '' && $("#txtGenIntNCCtrlNo").val() != null) {
                    internal_nc_control_no = $("#txtGenIntNCCtrlNo").val();
                }
                else {
                    internal_nc_control_no = 0;
                }

                if($("#txtGenIntItemNo").attr('disabled') != 'disabled' && $("#txtGenIntItemNo").val() != '' && $("#txtGenIntItemNo").val() != null) {
                    internal_item_no = $("#txtGenIntItemNo").val();
                }
                else {
                    internal_item_no = 0;
                }

                if($("#selGenIntRepEvalItem").attr('disabled') != 'disabled' && $("#selGenIntRepEvalItem").val() != '' && $("#selGenIntRepEvalItem").val() != null) {
                    internal_evaluation_item = $("#selGenIntRepEvalItem").val();
                }
                else {
                    internal_evaluation_item = null;
                }

                if($("#txtGenIntRepCtrlNo").attr('disabled') != 'disabled' && $("#txtGenIntRepCtrlNo").val() != '' && $("#txtGenIntRepCtrlNo").val() != null) {
                    audit_report_control_no = $("#txtGenIntRepCtrlNo").val();
                }
                else {
                    audit_report_control_no = 0;
                }
                // alert(audit_category);
                dataTableInternalAudits.ajax.reload( null, false );
            });

            // $("#selGenIntRepAuditType").change(function() {
            //     if($(this).val() == 1) {
            //         $("#selGenIntRepAuditTypePrefRepCtrlNo").removeAttr('disabled');
            //         $("#selGenIntRepAuditTypePrefRepCtrlNo").val('0');
            //     }
            //     else{
            //         $("#selGenIntRepAuditTypePrefRepCtrlNo").prop('disabled', 'disabled');
            //         $("#selGenIntRepAuditTypePrefRepCtrlNo").val('0');
            //     }
            // });

            $("#selGenIntRepClassification").change(function() {
                if($(this).val() == "NC") {
                    $("#txtGenIntNCCtrlNo").removeAttr('disabled');
                    $("#txtGenIntNCCtrlNo").val('');
                }
                else{
                    $("#txtGenIntNCCtrlNo").prop('disabled', 'disabled');
                    $("#txtGenIntNCCtrlNo").val('');
                }
            });

            // $("#chkGenIntRepAuditDate").click(function() {
            //     if($(this).prop('checked')) {
            //         // alert("Active");
            //         $("#drpGenIntRepAuditDate").removeAttr('disabled');
            //         // $("#dateGenIntRepDateTo").removeAttr('disabled');
            //     }
            //     else{
            //         // alert("Remove");
            //         $("#drpGenIntRepAuditDate").prop('disabled', 'disabled');
            //         // $("#dateGenIntRepDateTo").prop('disabled', 'disabled');
            //         $("#drpGenIntRepAuditDate").val('');
            //         // $("#dateGenIntRepDateTo").val('');
            //         $('#drpGenIntRepAuditDate span').html("All");
            //         internal_date_from = 0;
            //         internal_date_to = 0;
            //     }
            // });

            $("#chkGenIntAuditID").click(function() {
                if($(this).prop('checked')) {
                    $("#txtGenIntAuditID").prop('disabled', false);
                }
                else{
                    $("#txtGenIntAuditID").prop('disabled', true);
                    $("#txtGenIntAuditID").val('');
                }
            });

            $("#chkGenIntRepAuditDate").click(function() {
                if($(this).prop('checked')) {
                    $("#dateGenIntRepDateFrom").prop('disabled', false);
                    $("#dateGenIntRepDateTo").prop('disabled', false);
                }
                else{
                    $("#dateGenIntRepDateFrom").prop('disabled', true);
                    $("#dateGenIntRepDateFrom").val('');
                    $("#dateGenIntRepDateTo").prop('disabled', true);
                    $("#dateGenIntRepDateTo").val('');
                }
            });

            $("#chkGenIntRepAuditType").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenIntRepAuditType").removeAttr('disabled');
                    $("#selGenIntRepAuditTypePrefRepCtrlNo").removeAttr('disabled');
                    $("#selGenIntRepAuditTypePrefRepCtrlNo").val('0');
                }
                else{
                    $("#selGenIntRepAuditType").prop('disabled', 'disabled');
                    $("#selGenIntRepAuditType").val('System');
                    $("#selGenIntRepAuditTypePrefRepCtrlNo").prop('disabled', 'disabled');
                    $("#selGenIntRepAuditTypePrefRepCtrlNo").val('0');
                }
            });

            $("#chkGenIntRepClassification").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenIntRepClassification").removeAttr('disabled');
                    $("#txtGenIntNCCtrlNo").removeAttr('disabled');
                    $("#txtGenIntNCCtrlNo").val('');
                }
                else{
                    $("#selGenIntRepClassification").prop('disabled', 'disabled');
                    $("#selGenIntRepClassification").val('NC');
                    $("#txtGenIntNCCtrlNo").prop('disabled', 'disabled');
                    $("#txtGenIntNCCtrlNo").val('');
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
                    $("#selGenIntRepResDept").val('0').trigger('change');
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

            $("#chkGenIntRepApprovalStat").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenIntRepApprovalStat").removeAttr('disabled');
                }
                else{
                    $("#selGenIntRepApprovalStat").prop('disabled', 'disabled');
                    $("#selGenIntRepApprovalStat").val('1');
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

            $("#chkGenIntItemNo").click(function() {
                if($(this).prop('checked')) {
                    $("#txtGenIntItemNo").removeAttr('disabled');
                    $("#txtGenIntItemNo").val('');
                }
                else{
                    $("#txtGenIntItemNo").prop('disabled', 'disabled');
                    $("#txtGenIntItemNo").val('');
                }
            });

            $("#chkGenIntRepEvalItem").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenIntRepEvalItem").removeAttr('disabled');
                    $("#selGenIntRepEvalItem").select2('val', 0);
                }
                else{
                    $("#selGenIntRepEvalItem").prop('disabled', 'disabled');
                    $("#selGenIntRepEvalItem").select2('val', 0);
                }
            });

            $("#fileAddIntAuditCorrAct").change(function(){
                if($(this).val() != ""){
                    readCusImageUrl(this, $('#imgAddIntAuditCorrAct'));
                    // alert(Math.round(this.files[0].size / 1024) + " KB");
                }
                else{
                    $('#imgAddIntAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                }
            });

            $("#fileAddIntAuditIllu").change(function(){
                if($(this).val() != ""){
                    readCusImageUrl(this, $('#imgAddIntAuditIllu'));
                    // alert(Math.round(this.files[0].size / 1024) + " KB");
                }
                else{
                    $('#imgAddIntAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                }
            });

            $("#filePDFAddIntAuditIllu").change(function(){
                if($(this).val() != ""){
                    $('#imgPDFAddIntAuditIllu').attr('src', "{{ asset('public/storage/pdf-icon-red.png') }}");
                }
                else{
                    $('#imgPDFAddIntAuditIllu').attr('src', "{{ asset('public/storage/pdf-icon.png') }}");
                }
            });

            $("#filePDFAddIntAuditCorrAct").change(function(){
                if($(this).val() != ""){
                    $('#imgPDFAddIntAuditCorrAct').attr('src', "{{ asset('public/storage/pdf-icon-red.png') }}");
                }
                else{
                    $('#imgPDFAddIntAuditCorrAct').attr('src', "{{ asset('public/storage/pdf-icon.png') }}");
                }
            });

            $("#chkAddIntAuditReqForApproval").click(function(){
                if($(this).prop('checked')) {
                    $("#chkAddIntAuditSendEmail").prop('disabled', true);
                }
                else{
                    $("#chkAddIntAuditSendEmail").prop('disabled', false);
                    $("#chkAddIntAuditSendEmail").prop('checked', false);
                }
            });

            $("#chkEditIntAuditReqForApproval").click(function(){
                if($(this).prop('checked')) {
                    $("#chkEditIntAuditSendEmail").prop('disabled', true);
                }
                else{
                    $("#chkEditIntAuditSendEmail").prop('disabled', false);
                }
            });

            $(document).on('click', '.aViewIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');
                GetIntAuditByIdToView(intAuditId);
            });

            $(document).on('click', '.aCloseIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');
                $("#txtCloseIntAuditId").val(intAuditId);
            });

            $(document).on('click', '.aOpenIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');
                $("#txtOpenIntAuditId").val(intAuditId);
            });

            $(document).on('click', '.aDoneIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');
                $("#txtDoneIntAuditId").val(intAuditId);
            });

            $(document).on('click', '.aPendIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');
                $("#txtPendIntAuditId").val(intAuditId);
            });

            $(document).on('click', '.aEditInt', function(){
                let intAuditId = $(this).attr('internal-id');
                $("#txtEditIntAuditId").val(intAuditId);
                $("#selEditIntAuditEvalItem").val('0').trigger('change');
                GetIntAuditByIdToEdit(intAuditId);
            });

            $(document).on('click', '.aChangeIntAuditStat', function(){
                let intAuditId = $(this).attr('internal-id');
                let intAuditStat = $(this).attr('internal-audit-stat');
                $("#txtChangeAuditIntStatAuditId").val(intAuditId); // Enteng
                $("#txtChangeAuditIntStatAuditStat").val(intAuditStat);

                if(intAuditStat == 2) {
                    $("#h4ChangeAuditIntStatTitle").text('Archive Internal Audit');
                    $("#pChangeAuditIntStatBody").text('Are you sure to archive internal audit?');                    
                }
                else {
                    $("#h4ChangeAuditIntStatTitle").text('Restore Internal Audit');
                    $("#pChangeAuditIntStatBody").text('Are you sure to restore internal audit?');
                }
            });

            $(document).on('click', '.aQADApprovalIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');
                let qadApproval = $(this).attr('qad-approval');

                $("#modalIntQADApproval").modal('show');

                $("#txtIntQADApprovalAuditId").val(intAuditId); // Enteng
                $("#txtIntQADApproval").val(qadApproval);

                if(qadApproval == 1) {
                    $("#h4IntQADApprovalTitle").text('Approve Internal Audit');
                    $("#pIntQADApprovalBody").text('Are you sure to approve internal audit?');                    
                }
                else {
                    $("#h4IntQADApprovalTitle").text('Disapprove Internal Audit');
                    $("#pIntQADApprovalBody").text('Are you sure to disapprove internal audit?');
                }
            });
            

            $("#btnSearchARCNTooAddInt").click(function(){
                let intAuditRepCtrlNo = $("#txtAddIntAuditRepContNo").val();
                GetIntAuditByRepCtrlNoToAdd(intAuditRepCtrlNo);
            });

            $("#btnShowAddIntAuditModal").click(function() {
                GetDepartmentByStat(1, $("#selAddIntAuditResDept"));
                $("#selAddIntA").val('0').trigger('change');
                $("#chkAddIntAuditReqForApproval").prop('checked', true);
                $("#chkAddIntAuditSendEmail").prop('checked', false);
                $("#chkAddIntAuditSendEmail").prop('disabled', true);
            });

            $(document).on('click', '.chkSendIntAudit', function(){
                let intAuditId = $(this).attr('internal-id');

                if($(this).prop('checked')){
                    // Checked
                    if(!arrIntSendEmail.includes(intAuditId)){
                        arrIntSendEmail.push(intAuditId);
                    }
                }
                else{  
                    // Unchecked
                    let index = arrIntSendEmail.indexOf(intAuditId);
                    arrIntSendEmail.splice(index, 1);
                }
                $("#lblIntNoOfSendIntBatch").text(arrIntSendEmail.length);
                if(arrIntSendEmail.length <= 0){
                    $("#btnShowModalSendIntBatchEmail").prop('disabled', 'disabled');
                    $("#btnSendIntBatchEmail").prop('disabled', 'disabled');

                }
                else{
                    $("#btnShowModalSendIntBatchEmail").removeAttr('disabled');
                    $("#btnSendIntBatchEmail").removeAttr('disabled');

                }
            });

            $(document).on('click', '.aRemoveIntInBatch', function(){
                let intAuditId = $(this).attr('internal-id');
                let index = arrIntSendEmail.indexOf(intAuditId);
                arrIntSendEmail.splice(index, 1);
                $("#lblIntNoOfSendIntBatch").text(arrIntSendEmail.length);
                if(arrIntSendEmail.length <= 0){
                    $("#btnShowModalSendIntBatchEmail").prop('disabled', 'disabled');
                    $("#btnSendIntBatchEmail").prop('disabled', 'disabled');
                    $("#modalSendIntBatchEmail").modal('hide');
                }
                else{
                    $("#btnShowModalSendIntBatchEmail").removeAttr('disabled');
                    $("#btnSendIntBatchEmail").removeAttr('disabled');
                }

                dataTableInternalAudits.ajax.reload( null, false );
                dataTableIntBatchAudits.ajax.reload( null, false );
            });

            $("#selAddIntAuditClassRank").change(function(){
                if($(this).val() == "NC") {
                    $("#txtAddIntAuditNCCtrlNo").removeAttr('disabled');
                    $("#txtAddIntAuditNCCtrlNo").val('');
                }
                else{
                    $("#txtAddIntAuditNCCtrlNo").prop('disabled', 'disabled');
                    $("#txtAddIntAuditNCCtrlNo").val('');
                }
            });

            $("#selEditIntAuditClassRank").change(function(){
                if($(this).val() == "NC") {
                    $("#txtEditIntAuditNCCtrlNo").removeAttr('disabled');
                }
                else{
                    $("#txtEditIntAuditNCCtrlNo").prop('disabled', 'disabled');
                }
            });

            $("#btnShowModalSendIntBatchEmail").click(function(){
                dataTableIntBatchAudits.ajax.reload( null, false );
            });

            $("#btnSendIntBatchEmail").click(function(){
                $.ajax({
                    url: 'send_internal_batch',
                    method: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        internal_audit_id: arrIntSendEmail
                    },
                    dataType: 'json',
                    beforeSend: function(){
                        $("#btnSendIntBatchEmail").prop('disabled', true);
                        $("#btnSendIntBatchEmail").text('Sending...');
                    },
                    success: function(JsonObject){
                        $("#btnSendIntBatchEmail").prop('disabled', false);
                        $("#btnSendIntBatchEmail").text('Sending...');
                        if(JsonObject['result'] == 1){
                            arrIntSendEmail = [];
                            dataTableInternalAudits.ajax.reload( null, false );
                            dataTableIntBatchAudits.ajax.reload( null, false );
                            $("#btnShowModalSendIntBatchEmail").prop('disabled', 'disabled');
                            $("#modalSendIntBatchEmail").modal('hide');
                            $("#lblIntNoOfSendIntBatch").text(arrIntSendEmail.length);
                            Swal({
                                position: 'top-end',
                                type: 'success',
                                title: 'Email Sent!',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: 'swal-wide',
                            });
                        }
                        else{
                            Swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Sending Failed!',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: 'swal-wide',
                            });
                        }
                    },
                    error: function(data, xhr, status){
                        console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                });
            });

            $("#formChangeAuditIntStat").submit(function(event) {
                event.preventDefault();
                ChangeAuditIntStat();
            });

            $("#formAddIntAudit").submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'add_internal_audit',
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
                            $("#modalAddIntAudit").modal('hide');
                            $("#formAddIntAudit")[0].reset();
                            $('#imgAddIntAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            $('#imgAddIntAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            dataTableInternalAudits.ajax.reload( null, false );

                            $("#selAddIntAuditType").removeClass('border-danger');
                            $("#selAddIntAuditType").removeAttr('title');
                            $("#dateAddIntAuditFrom").removeClass('border-danger');
                            $("#dateAddIntAuditFrom").removeAttr('title');
                            $("#dateAddIntAuditTo").removeClass('border-danger');
                            $("#dateAddIntAuditTo").removeAttr('title');
                            $("#txtAddIntAuditBusProcSecSupp").removeClass('border-danger');
                            $("#txtAddIntAuditBusProcSecSupp").removeAttr('title');
                            $("#txtAddIntAuditAuditors").removeClass('border-danger');
                            $("#txtAddIntAuditAuditors").removeAttr('title');
                            $("#txtAddIntAuditAuditees").removeClass('border-danger');
                            $("#txtAddIntAuditAuditees").removeAttr('title');
                            $("#txtAddIntAuditRepContNo").removeClass('border-danger');
                            $("#txtAddIntAuditRepContNo").removeAttr('title');
                            $("#selAddIntAuditClassRank").removeClass('border-danger');
                            $("#selAddIntAuditClassRank").removeAttr('title');
                            $("#selAddIntAuditCatOfFind").removeClass('border-danger');
                            $("#selAddIntAuditCatOfFind").removeAttr('title');
                            $("#dateAddIntAuditFindIssDate").removeClass('border-danger');
                            $("#dateAddIntAuditFindIssDate").removeAttr('title');
                            $("#dateAddIntAuditDeadSub").removeClass('border-danger');
                            $("#dateAddIntAuditDeadSub").removeAttr('title');
                            $("#txtAddIntAuditDeadSubDays").removeClass('border-danger');
                            $("#txtAddIntAuditDeadSubDays").removeAttr('title');
                            $("#dateAddIntAuditActDateSub").removeClass('border-danger');
                            $("#dateAddIntAuditActDateSub").removeAttr('title');
                            $("#txtAddIntAuditIsoAitfClause").removeClass('border-danger');
                            $("#txtAddIntAuditIsoAitfClause").removeAttr('title');
                            $("#txtAddIntAuditStmtOfFin").removeClass('border-danger');
                            $("#txtAddIntAuditStmtOfFin").removeAttr('title');
                            $("#txtAddIntAuditIllu").removeClass('border-danger');
                            $("#txtAddIntAuditIllu").removeAttr('title');
                            $("#fileAddIntAuditIllu").removeClass('border-danger');
                            $("#fileAddIntAuditIllu").removeAttr('title');
                            $("#txtAddIntAuditCorrAct").removeClass('border-danger');
                            $("#txtAddIntAuditCorrAct").removeAttr('title');
                            $("#fileAddIntAuditCorrAct").removeClass('border-danger');
                            $("#fileAddIntAuditCorrAct").removeAttr('title');

                            $("#selAddIntAuditPerInCharge").select2('val', 0);
                            $("#selAddIntAuditResDept").select2('val', 0);
                            $("#selAddIntAuditCorrPerInCharge").select2('val', 0);
                            $("#selAddIntAuditConPerInCharge").select2('val', 0);
                            $("#selAddIntAuditSysPerInCharge").select2('val', 0);
                        }
                        else if(JsonObject['result'] == 0){
                            Swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Saving Failed!',
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
                            $("#selAddIntAuditType").addClass('border-danger');
                            $("#selAddIntAuditType").attr('title', JsonObject['error']['audit_type']);
                        }
                        else{
                            $("#selAddIntAuditType").removeClass('border-danger');
                            $("#selAddIntAuditType").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_date_from'] != undefined){
                            $("#dateAddIntAuditFrom").addClass('border-danger');
                            $("#dateAddIntAuditFrom").attr('title', JsonObject['error']['audit_date_from']);
                        }
                        else{
                            $("#dateAddIntAuditFrom").removeClass('border-danger');
                            $("#dateAddIntAuditFrom").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_date_to'] != undefined){
                            $("#dateAddIntAuditTo").addClass('border-danger');
                            $("#dateAddIntAuditTo").attr('title', JsonObject['error']['audit_date_to']);
                        }
                        else{
                            $("#dateAddIntAuditTo").removeClass('border-danger');
                            $("#dateAddIntAuditTo").removeAttr('title');
                        }

                        if(JsonObject['error']['business_process'] != undefined){
                            $("#txtAddIntAuditBusProcSecSupp").addClass('border-danger');
                            $("#txtAddIntAuditBusProcSecSupp").attr('title', JsonObject['error']['business_process']);
                        }
                        else{
                            $("#txtAddIntAuditBusProcSecSupp").removeClass('border-danger');
                            $("#txtAddIntAuditBusProcSecSupp").removeAttr('title');
                        }

                        if(JsonObject['error']['auditors'] != undefined){
                            $("#txtAddIntAuditAuditors").addClass('border-danger');
                            $("#txtAddIntAuditAuditors").attr('title', JsonObject['error']['auditors']);
                        }
                        else{
                            $("#txtAddIntAuditAuditors").removeClass('border-danger');
                            $("#txtAddIntAuditAuditors").removeAttr('title');
                        }

                        if(JsonObject['error']['auditees'] != undefined){
                            $("#txtAddIntAuditAuditees").addClass('border-danger');
                            $("#txtAddIntAuditAuditees").attr('title', JsonObject['error']['auditees']);
                        }
                        else{
                            $("#txtAddIntAuditAuditees").removeClass('border-danger');
                            $("#txtAddIntAuditAuditees").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_report_control_no'] != undefined){
                            $("#txtAddIntAuditRepContNo").addClass('border-danger');
                            $("#txtAddIntAuditRepContNo").attr('title', JsonObject['error']['audit_report_control_no']);
                        }
                        else{
                            $("#txtAddIntAuditRepContNo").removeClass('border-danger');
                            $("#txtAddIntAuditRepContNo").removeAttr('title');
                        }

                        if(JsonObject['error']['classification'] != undefined){
                            $("#selAddIntAuditClassRank").addClass('border-danger');
                            $("#selAddIntAuditClassRank").attr('title', JsonObject['error']['classification']);
                        }
                        else{
                            $("#selAddIntAuditClassRank").removeClass('border-danger');
                            $("#selAddIntAuditClassRank").removeAttr('title');
                        }

                        if(JsonObject['error']['category_of_findings'] != undefined){
                            $("#selAddIntAuditCatOfFind").addClass('border-danger');
                            $("#selAddIntAuditCatOfFind").attr('title', JsonObject['error']['category_of_findings']);
                        }
                        else{
                            $("#selAddIntAuditCatOfFind").removeClass('border-danger');
                            $("#selAddIntAuditCatOfFind").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_findings_issued_date'] != undefined){
                            $("#dateAddIntAuditFindIssDate").addClass('border-danger');
                            $("#dateAddIntAuditFindIssDate").attr('title', JsonObject['error']['audit_findings_issued_date']);
                        }
                        else{
                            $("#dateAddIntAuditFindIssDate").removeClass('border-danger');
                            $("#dateAddIntAuditFindIssDate").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission'] != undefined){
                            $("#dateAddIntAuditDeadSub").addClass('border-danger');
                            $("#dateAddIntAuditDeadSub").attr('title', JsonObject['error']['deadline_of_submission']);
                        }
                        else{
                            $("#dateAddIntAuditDeadSub").removeClass('border-danger');
                            $("#dateAddIntAuditDeadSub").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission_days'] != undefined){
                            $("#txtAddIntAuditDeadSubDays").addClass('border-danger');
                            $("#txtAddIntAuditDeadSubDays").attr('title', JsonObject['error']['deadline_of_submission_days']);
                        }
                        else{
                            $("#txtAddIntAuditDeadSubDays").removeClass('border-danger');
                            $("#txtAddIntAuditDeadSubDays").removeAttr('title');
                        }

                        if(JsonObject['error']['actual_date_of_submission'] != undefined){
                            $("#dateAddIntAuditActDateSub").addClass('border-danger');
                            $("#dateAddIntAuditActDateSub").attr('title', JsonObject['error']['actual_date_of_submission']);
                        }
                        else{
                            $("#dateAddIntAuditActDateSub").removeClass('border-danger');
                            $("#dateAddIntAuditActDateSub").removeAttr('title');
                        }

                        if(JsonObject['error']['iso_iatf_clause'] != undefined){
                            $("#txtAddIntAuditIsoAitfClause").addClass('border-danger');
                            $("#txtAddIntAuditIsoAitfClause").attr('title', JsonObject['error']['iso_iatf_clause']);
                        }
                        else{
                            $("#txtAddIntAuditIsoAitfClause").removeClass('border-danger');
                            $("#txtAddIntAuditIsoAitfClause").removeAttr('title');
                        }

                        if(JsonObject['error']['statement_of_findings'] != undefined){
                            $("#txtAddIntAuditStmtOfFin").addClass('border-danger');
                            $("#txtAddIntAuditStmtOfFin").attr('title', JsonObject['error']['statement_of_findings']);
                        }
                        else{
                            $("#txtAddIntAuditStmtOfFin").removeClass('border-danger');
                            $("#txtAddIntAuditStmtOfFin").removeAttr('title');
                        }

                        if(JsonObject['error']['illustration'] != undefined){
                            $("#txtAddIntAuditIllu").addClass('border-danger');
                            $("#txtAddIntAuditIllu").attr('title', JsonObject['error']['illustration']);
                        }
                        else{
                            $("#txtAddIntAuditIllu").removeClass('border-danger');
                            $("#txtAddIntAuditIllu").removeAttr('title');
                        }

                        if(JsonObject['error']['img_illustration'] != undefined){
                            $("#fileAddIntAuditIllu").addClass('border-danger');
                            $("#fileAddIntAuditIllu").attr('title', JsonObject['error']['img_illustration']);
                        }
                        else{
                            $("#fileAddIntAuditIllu").removeClass('border-danger');
                            $("#fileAddIntAuditIllu").removeAttr('title');
                        }

                        if(JsonObject['error']['corrective_action'] != undefined){
                            $("#txtAddIntAuditCorrAct").addClass('border-danger');
                            $("#txtAddIntAuditCorrAct").attr('title', JsonObject['error']['corrective_action']);
                        }
                        else{
                            $("#txtAddIntAuditCorrAct").removeClass('border-danger');
                            $("#txtAddIntAuditCorrAct").removeAttr('title');
                        }

                        if(JsonObject['error']['img_corrective_action'] != undefined){
                            $("#fileAddIntAuditCorrAct").addClass('border-danger');
                            $("#fileAddIntAuditCorrAct").attr('title', JsonObject['error']['img_corrective_action']);
                        }
                        else{
                            $("#fileAddIntAuditCorrAct").removeClass('border-danger');
                            $("#fileAddIntAuditCorrAct").removeAttr('title');
                        }
                    },
                    error: function(data, xhr, status){
                        console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                });
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
                            dataTableInternalAudits.ajax.reload( null, false );

                            $("#selEditIntAuditType").removeClass('border-danger');
                            $("#selEditIntAuditType").removeAttr('title');
                            $("#dateEditIntAuditDateFrom").removeClass('border-danger');
                            $("#dateEditIntAuditDateFrom").removeAttr('title');
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
                            $("#selEditIntAuditPerInCharge").select2('val', 0);
                            $("#selEditIntAuditResDept").select2('val', 0);
                            $("#selEditIntAuditCorrPerInCharge").select2('val', 0);
                            $("#selEditIntAuditConPerInCharge").select2('val', 0);
                            $("#selEditIntAuditSysPerInCharge").select2('val', 0);
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

                        if(JsonObject['error']['audit_date_from'] != undefined){
                            $("#dateEditIntAuditDateFrom").addClass('border-danger');
                            $("#dateEditIntAuditDateFrom").attr('title', JsonObject['error']['audit_date_from']);
                        }
                        else{
                            $("#dateEditIntAuditDateFrom").removeClass('border-danger');
                            $("#dateEditIntAuditDateFrom").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_date_to'] != undefined){
                            $("#dateEditIntAuditDateTo").addClass('border-danger');
                            $("#dateEditIntAuditDateTo").attr('title', JsonObject['error']['audit_date_to']);
                        }
                        else{
                            $("#dateEditIntAuditDateTo").removeClass('border-danger');
                            $("#dateEditIntAuditDateTo").removeAttr('title');
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

            $("#formCloseIntAudit").submit(function(event) {
                event.preventDefault();
                CloseInternalAudit();
            });
            $("#formOpenIntAudit").submit(function(event) {
                event.preventDefault();
                OpenInternalAudit();
            });
            $("#formDoneIntAudit").submit(function(event) {
                event.preventDefault();
                DoneInternalAudit();
            });
            $("#formPendIntAudit").submit(function(event) {
                event.preventDefault();
                PendInternalAudit();
            });
            $("#formIntQADApproval").submit(function(event) {
                event.preventDefault();
                InternalAuditQADApproval();
            });

            $("#fileEditIntAuditCorrAct").change(function(){
                if($(this).val() != ""){
                    readEditIntAudit(this, $('#imgEditIntAuditCorrAct'));
                }
                else{
                    if($("#txtEditIntAuditCurrCorrAct").val() != ""){
                        let imglink = "{{ asset('public/storage/audit_result_images/internal/img') }}";
                        imglink = imglink.replace("img", $("#txtEditIntAuditCurrCorrAct").val());
                        $('#imgEditIntAuditCorrAct').attr('src', imglink);
                    }
                    else {
                        $('#imgEditIntAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }
                }
            });

            $("#fileEditIntAuditCorrActPDF").change(function(){
                if($(this).val() != ""){
                    $('#imgEditIntAuditCorrActPDF').attr('src', "{{ asset('public/storage/pdf-icon-red.png') }}");
                }
                else{
                    if($("#txtEditIntAuditCurrCorrActPDF").val() != null ||$("#txtEditIntAuditCurrCorrActPDF").val() != ''){
                        $('#imgEditIntAuditCorrActPDF').attr('src', "{{ asset('public/storage/pdf-icon.png') }}");
                    }
                    else{
                        $('#imgEditIntAuditCorrActPDF').attr('src', "{{ asset('public/storage/pdf-icon-red.png') }}");
                    }
                }
            });

            $("#fileEditIntAuditIllu").change(function(){
                if($(this).val() != ""){
                    readEditIntAudit(this, $('#imgEditIntAuditIllu'));
                }
                else{
                    if($("#txtEditIntAuditCurrIllu").val() != ""){
                        var imglink = "{{ asset('public/storage/audit_result_images/internal/img') }}";
                        imglink = imglink.replace("img", $("#txtEditIntAuditCurrIllu").val());
                        $('#imgEditIntAuditIllu').attr('src', imglink);
                    }
                    else{
                        $('#imgEditIntAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }
                }
            });

            $("#fileEditIntAuditIlluPDF").change(function(){
                if($(this).val() != ""){
                    $('#imgEditIntAuditIlluPDF').attr('src', "{{ asset('public/storage/pdf-icon-red.png') }}");
                }
                else{
                    if($("#txtEditIntAuditCurrIlluPDF").val() != null ||$("#txtEditIntAuditCurrIlluPDF").val() != ''){
                        $('#imgEditIntAuditIlluPDF').attr('src', "{{ asset('public/storage/pdf-icon.png') }}");
                    }
                    else{
                        $('#imgEditIntAuditIlluPDF').attr('src', "{{ asset('public/storage/pdf-icon-red.png') }}");
                    }
                }
            });
        });

        function readEditIntAudit(input, element) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  element.attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

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
                    $(".spanViewIntAuditID").text('');
                },
                success: function(JsonObject){
                    if(JsonObject['internal_audits'][0]['audit_type'] == 1){
                        $("#lblViewIntAuditType").text('EMS System');
                    }
                    else if(JsonObject['internal_audits'][0]['audit_type'] == 2){
                        $("#lblViewIntAuditType").text('QMS System');
                    }
                    else if(JsonObject['internal_audits'][0]['audit_type'] == 3){
                        $("#lblViewIntAuditType").text('Process');
                    }
                    else if(JsonObject['internal_audits'][0]['audit_type'] == 4){
                        $("#lblViewIntAuditType").text('Product');
                    }

                    $(".spanViewIntAuditID").text(JsonObject['internal_audits'][0]['internal_audit_id']);

                    $("#lblViewIntAuditAuditors").text(JsonObject['internal_audits'][0]['auditors']);
                    $("#lblViewIntAuditAuditees").text(JsonObject['internal_audits'][0]['auditees']);
                    $("#lblViewIntAuditDate").text(JsonObject['internal_audits'][0]['audit_date_from'] + " to " + JsonObject['internal_audits'][0]['audit_date_to']);
                    $("#lblViewIntAuditDeadSub").text(JsonObject['internal_audits'][0]['deadline_of_submission_days'] + ' Day(s) - ' + JsonObject['internal_audits'][0]['deadline_of_submission']);
                    $("#lblViewIntAuditActDateSub").text(JsonObject['internal_audits'][0]['actual_date_of_submission']);
                    $("#lblViewIntAuditFindIssDate").text(JsonObject['internal_audits'][0]['audit_findings_issued_date']);
                    $("#lblViewIntAuditRepConNo").text(JsonObject['internal_audits'][0]['audit_report_control_no']);
                    $("#lblViewIntAuditIsoAitfClause").text(JsonObject['internal_audits'][0]['iso_iatf_clause']);
                    $("#lblViewIntAuditClassRank").text(JsonObject['internal_audits'][0]['classification']);
                    if(JsonObject['internal_audits'][0]['evaluation_item_info'] != null){
                        $("#lblViewIntAuditCatOfFin").text(JsonObject['internal_audits'][0]['evaluation_item_info']['evaluation_item_name']);
                    }
                    else{
                        $("#lblViewIntAuditCatOfFin").text('---');
                    }
                    $("#lblViewIntAuditBusProcSecSupp").text(JsonObject['internal_audits'][0]['business_process']);
                    $("#lblViewIntAuditStmtOfFin").html(JsonObject['internal_audits'][0]['statement_of_findings'].replace(/\n/g, '<br />'));
                    $("#lblViewIntAuditIllu").text(JsonObject['internal_audits'][0]['illustration']);
                    $("#lblViewIntAuditCPARCtrlNo").text(JsonObject['internal_audits'][0]['audit_report_control_no']);
                    $("#lblViewIntAuditItemNo").text(JsonObject['internal_audits'][0]['item_no']);

                    if(JsonObject['internal_audits'][0]['correction'] != null){
                        $("#lblViewIntAuditCorrection").text(JsonObject['internal_audits'][0]['correction']);
                    }
                    else{
                        $("#lblViewIntAuditCorrection").text('---');   
                    }
                    if(JsonObject['internal_audits'][0]['correction_person_in_charge'] != null){
                        $("#lblViewIntAuditCorrPerInCharge").text(JsonObject['internal_audits'][0]['correction_person_in_charge']);
                    }
                    else{
                        $("#lblViewIntAuditCorrPerInCharge").text('---');   
                    }
                    if(JsonObject['internal_audits'][0]['correction_commitment_date'] != null){
                        $("#lblViewIntAuditCorrCommDate").text(JsonObject['internal_audits'][0]['correction_commitment_date']);
                    }
                    else{
                        $("#lblViewIntAuditCorrCommDate").text('---');   
                    }

                    if(JsonObject['internal_audits'][0]['containment'] != null){
                        $("#lblViewIntAuditContainment").text(JsonObject['internal_audits'][0]['containment']);
                    }
                    else{
                        $("#lblViewIntAuditContainment").text('---');   
                    }
                    if(JsonObject['internal_audits'][0]['containment_person_in_charge'] != null){
                        $("#lblViewIntAuditConPerInCharge").text(JsonObject['internal_audits'][0]['containment_person_in_charge']);
                    }
                    else{
                        $("#lblViewIntAuditConPerInCharge").text('---');   
                    }
                    if(JsonObject['internal_audits'][0]['containment_commitment_date'] != null){
                        $("#lblViewIntAuditConCommDate").text(JsonObject['internal_audits'][0]['containment_commitment_date']);
                    }
                    else{
                        $("#lblViewIntAuditConCommDate").text('---');   
                    }

                    if(JsonObject['internal_audits'][0]['systematic'] != null){
                        $("#lblViewIntAuditSystemic").text(JsonObject['internal_audits'][0]['systematic']);
                    }
                    else{
                        $("#lblViewIntAuditSystemic").text('---');   
                    }
                    if(JsonObject['internal_audits'][0]['systematic_person_in_charge'] != null){
                        $("#lblViewIntAuditSysPerInCharge").text(JsonObject['internal_audits'][0]['systematic_person_in_charge']);
                    }
                    else{
                        $("#lblViewIntAuditSysPerInCharge").text('---');   
                    }
                    if(JsonObject['internal_audits'][0]['systematic_commitment_date'] != null){
                        $("#lblViewIntAuditSysCommDate").text(JsonObject['internal_audits'][0]['systematic_commitment_date']);
                    }
                    else{
                        $("#lblViewIntAuditSysCommDate").text('---');   
                    }

                    let resDept = "";
                    for(let index = 0; index < JsonObject['internal_audits'][0]['internal_departments'].length; index++){
                        resDept += JsonObject['internal_audits'][0]['internal_departments'][index]['departments'][0]['department_name'];
                        
                        if(index < JsonObject['internal_audits'][0]['internal_departments'].length - 1){
                            resDept += ", ";
                        }
                    }

                    $("#lblViewIntAuditResDept").text(resDept);

                    if(JsonObject['internal_audits'][0]['corrective_action'] != "" || JsonObject['internal_audits'][0]['corrective_action'] != null){
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

                    if(JsonObject['internal_audits'][0]['pdf_illustration'] == "" || JsonObject['internal_audits'][0]['pdf_illustration'] == null){
                        $("#pdfViewIntAuditIllu").attr('src', "{{ asset('public/storage/pdf-icon.png') }}");
                        $("#pdfViewIntAuditIllu").attr('pdfLink', '');
                    }
                    else{
                        let pdfIllulink = "{{ asset('public/storage/audit_result_pdf/internal/pdfLink') }}";
                        pdfIllulink = pdfIllulink.replace("pdfLink", JsonObject['internal_audits'][0]['pdf_illustration']);
                        $("#pdfViewIntAuditIllu").attr('src', "{{ asset('public/storage/pdf-icon-red.png') }}");
                        $("#pdfViewIntAuditIllu").attr('pdfLink', pdfIllulink);
                    }

                    if(JsonObject['internal_audits'][0]['img_corrective_action'] != "") {
                      let imgCorrActlink = "{{ asset('public/storage/audit_result_images/internal/img') }}";
                      imgCorrActlink = imgCorrActlink.replace("img", JsonObject['internal_audits'][0]['img_corrective_action']);
                      $("#imgViewIntAuditCorrAct").attr('src', imgCorrActlink);
                    }
                    else {
                      $("#imgViewIntAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}"); 
                    }

                    // console.log(JsonObject['internal_audits'][0]['img_corrective_action']);
                    if(JsonObject['internal_audits'][0]['img_corrective_action'] == "" || JsonObject['internal_audits'][0]['img_corrective_action'] == null) {
                      $("#pdfViewIntAuditCorrAct").attr('src', "{{ asset('public/storage/pdf-icon.png') }}"); 
                      $("#pdfViewIntAuditCorrAct").attr('pdfLink', '');
                    }
                    else {
                      let pdfCorrActlink = "{{ asset('public/storage/audit_result_pdf/internal/pdfLink') }}";
                      pdfCorrActlink = pdfCorrActlink.replace("pdfLink", JsonObject['internal_audits'][0]['pdf_corrective_action']);
                      $("#pdfViewIntAuditCorrAct").attr('src', "{{ asset('public/storage/pdf-icon-red.png') }}");
                      $("#pdfViewIntAuditCorrAct").attr('pdfLink', pdfCorrActlink);
                    }

                    if(JsonObject['internal_audits'][0]['root_cause'] != null){
                        $("#lblViewIntAuditRootCause").text(JsonObject['internal_audits'][0]['root_cause']);
                    }
                    else{
                        $("#lblViewIntAuditRootCause").text("---");
                    }
                    if(JsonObject['internal_audits'][0]['improvement_action'] != null){
                        $("#lblViewIntAuditImpPlan").html(JsonObject['internal_audits'][0]['improvement_action'].replace(/\n/g, '<br />'));
                    }
                    else{
                        $("#lblViewIntAuditImpPlan").text("---");
                    }

                    if(JsonObject['internal_audits'][0]['person_in_charges'].length > 0){
                        let perInCharges = "";
                        for(let index = 0; index < JsonObject['internal_audits'][0]['person_in_charges'].length; index++){
                            perInCharges += JsonObject['internal_audits'][0]['person_in_charges'][index]['person_in_charge_record']['name'];
                            
                            if(index < JsonObject['internal_audits'][0]['person_in_charges'].length - 1){
                                perInCharges += ", ";
                            }
                        }
                        $("#lblViewIntAuditPerInCharge").text(perInCharges);
                    }
                    else{
                        $("#lblViewIntAuditPerInCharge").text("N/A");
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
                        $("#lblViewIntAuditStat").text('For Closed-Out');
                    }
                    else{
                        $("#lblViewIntAuditStat").text('Closed');
                    }
                    $("#lblViewIntAuditCreatedBy").text(JsonObject['internal_audits'][0]['user_created_by']['name']);
                    $("#lblViewIntAuditLastUpdatedBy").text(JsonObject['internal_audits'][0]['user_last_updated_by']['name']);
                    $("#lblViewIntAuditCreatedAt").text(JsonObject['internal_audits'][0]['created_at']);
                    $("#lblViewIntAuditLastUpdatedAt").text(JsonObject['internal_audits'][0]['updated_at']);
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
                    $("#selEditIntAuditCorrPerInCharge").select2('val', 0);
                    $("#selEditIntAuditConPerInCharge").select2('val', 0);
                    $("#selEditIntAuditSysPerInCharge").select2('val', 0);
                    $(".spanEditIntAuditID").text('');
                },
                success: function(JsonObject){
                    $(".spanEditIntAuditID").text(JsonObject['internal_audits'][0]['internal_audit_id']);
                    $("#selEditIntAuditType").val(JsonObject['internal_audits'][0]['audit_type']);
                    $("#txtEditIntAuditAuditors").val(JsonObject['internal_audits'][0]['auditors']);
                    $("#txtEditIntAuditAuditees").val(JsonObject['internal_audits'][0]['auditees']);
                    $("#dateEditIntAuditDateFrom").val(JsonObject['internal_audits'][0]['audit_date_from']);
                    $("#dateEditIntAuditDateTo").val(JsonObject['internal_audits'][0]['audit_date_to']);
                    $("#dateEditIntAuditDeadSub").val(JsonObject['internal_audits'][0]['deadline_of_submission'])
                    $("#txtEditIntAuditDeadSubDays").val(JsonObject['internal_audits'][0]['deadline_of_submission_days']);
                    $("#dateEditIntAuditActDateSub").val(JsonObject['internal_audits'][0]['actual_date_of_submission']);
                    $("#dateEditIntAuditFindIssDate").val(JsonObject['internal_audits'][0]['audit_findings_issued_date']);
                    $("#txtEditIntAuditRepContNo").val(JsonObject['internal_audits'][0]['audit_report_control_no']);
                    $("#txtEditIntAuditIsoAitfClause").val(JsonObject['internal_audits'][0]['iso_iatf_clause']);
                    $("#selEditIntAuditClassRank").val(JsonObject['internal_audits'][0]['classification']);
                    $("#selEditIntAuditCatOfFind").val(JsonObject['internal_audits'][0]['category_of_findings']);
                    $("#selEditIntAuditEvalItem").val(JsonObject['internal_audits'][0]['evaluation_item_id']).trigger('change');
                    $("#txtEditIntAuditBusProcSecSupp").val(JsonObject['internal_audits'][0]['business_process']);
                    $("#txtEditIntAuditStmtOfFin").val(JsonObject['internal_audits'][0]['statement_of_findings']);
                    $("#txtEditIntAuditIllu").val(JsonObject['internal_audits'][0]['illustration']);
                    $("#txtEditIntAuditCorrAct").val(JsonObject['internal_audits'][0]['corrective_action']);

                    $("#txtEditIntAuditNCCtrlNo").val(JsonObject['internal_audits'][0]['nc_control_no']);

                    $("#txtEditIntAuditItemNo").val(JsonObject['internal_audits'][0]['item_no']);

                    $("#selEditIntAuditStat").val(JsonObject['internal_audits'][0]['audit_stat']);

                    $("#selEditIntAuditSendStat").val(JsonObject['internal_audits'][0]['sending_stat']);

                    $("#txtEditIntAuditCorrPerInCharge").val(JsonObject['internal_audits'][0]['correction_person_in_charge']);
                    $("#txtEditIntAuditConPerInCharge").val(JsonObject['internal_audits'][0]['containment_person_in_charge']);
                    $("#txtEditIntAuditSysPerInCharge").val(JsonObject['internal_audits'][0]['systematic_person_in_charge']);

                    if(JsonObject['internal_audits'][0]['classification'] == "NC") {
                        $("#txtEditIntAuditNCCtrlNo").removeAttr('disabled');
                    }
                    else{
                        $("#txtEditIntAuditNCCtrlNo").prop('disabled', 'disabled');
                    }

                    if(JsonObject['internal_audits'][0]['qad_approval'] == 1) {
                        $("#chkEditIntAuditReqForApproval").prop('checked', false);
                    }
                    else{
                        $("#chkEditIntAuditReqForApproval").prop('checked', true);
                    }

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

                    if(JsonObject['internal_audits'][0]['pdf_illustration'] == "" || JsonObject['internal_audits'][0]['pdf_illustration'] == null){
                        $("#imgEditIntAuditIlluPDF").attr('src', "{{ asset('public/storage/pdf-icon.png') }}");
                        $("#imgEditIntAuditIlluPDF").attr('pdfLink', '');
                    }
                    else{
                        let pdfLink = "{{ asset('public/storage/audit_result_pdf/internal/pdfLink') }}";
                        pdfLink = pdfLink.replace("pdfLink", JsonObject['internal_audits'][0]['pdf_illustration']);
                        $("#imgEditIntAuditIlluPDF").attr('src', "{{ asset('public/storage/pdf-icon-red.png') }}");
                        $("#imgEditIntAuditIlluPDF").attr('pdfLink', pdfLink);
                    }
                    
                    if(JsonObject['internal_audits'][0]['img_corrective_action'] != "") {
                        let imgCorrActlink = "{{ asset('public/storage/audit_result_images/internal/img') }}";
                        imgCorrActlink = imgCorrActlink.replace("img", JsonObject['internal_audits'][0]['img_corrective_action']);
                        $("#imgEditIntAuditCorrAct").attr('src', imgCorrActlink);
                    }
                    else {
                        $("#imgEditIntAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }

                    if(JsonObject['internal_audits'][0]['pdf_corrective_action'] == "" || JsonObject['internal_audits'][0]['pdf_corrective_action'] == null) {
                      $("#imgEditIntAuditCorrActPDF").attr('src', "{{ asset('public/storage/pdf-icon.png') }}"); 
                      $("#imgEditIntAuditCorrActPDF").attr('pdfLink', '');
                    }
                    else {
                      let pdfCorrActlink = "{{ asset('public/storage/audit_result_pdf/internal/pdfLink') }}";
                      pdfCorrActlink = pdfCorrActlink.replace("pdfLink", JsonObject['internal_audits'][0]['pdf_corrective_action']);
                      $("#imgEditIntAuditCorrActPDF").attr('src', "{{ asset('public/storage/pdf-icon-red.png') }}");
                      $("#imgEditIntAuditCorrActPDF").attr('pdfLink', pdfCorrActlink);
                    }

                    $("#txtEditIntAuditCurrIllu").val(JsonObject['internal_audits'][0]['img_illustration']);
                    $("#txtEditIntAuditCurrCorrAct").val(JsonObject['internal_audits'][0]['img_corrective_action']);

                    $("#txtEditIntAuditCurrIlluPDF").val(JsonObject['internal_audits'][0]['pdf_illustration']);
                    $("#txtEditIntAuditCurrCorrActPDF").val(JsonObject['internal_audits'][0]['pdf_corrective_action']);

                    $("#dateEditIntAuditCreatedAt").val(JsonObject['internal_audits'][0]['created_at'].split(' ')[0]);
                    $("#dateEditIntAuditCurrDeadSub").val(JsonObject['internal_audits'][0]['deadline_of_submission']);

                    $("#txtEditIntAuditRootCause").val(JsonObject['internal_audits'][0]['root_cause']);
                    $("#txtEditIntAuditImpPlan").val(JsonObject['internal_audits'][0]['improvement_action']);
                    $("#txtEditIntAuditCommDate").val(JsonObject['internal_audits'][0]['commitment_date']);

                    $("#dateEditIntAuditCorrCommDate").val(JsonObject['internal_audits'][0]['correction_commitment_date']);

                    $("#dateEditIntAuditConCommDate").val(JsonObject['internal_audits'][0]['containment_commitment_date']);

                    $("#txtEditIntAuditCorrection").val(JsonObject['internal_audits'][0]['correction']);
                    $("#txtEditIntAuditContainment").val(JsonObject['internal_audits'][0]['containment']);
                    $("#dateEditIntAuditSysCommDate").val(JsonObject['internal_audits'][0]['systematic_commitment_date']);
                    $("#txtEditIntAuditSystematic").val(JsonObject['internal_audits'][0]['systematic']);  

                    let person_in_charges = [];
                    for(let index = 0; index < JsonObject['internal_audits'][0]['person_in_charges'].length; index++){
                        person_in_charges.push(JsonObject['internal_audits'][0]['person_in_charges'][index]['person_in_charge_id']);
                    }

                    $("#selEditIntAuditPerInCharge").val(person_in_charges).trigger('change');

                    // $("#txtEditIntAuditCorrection").val(JsonObject['internal_audits'][0]['correction']);
                    // $("#txtEditIntAuditContainment").val(JsonObject['internal_audits'][0]['containment']);
                    // $("#txtEditIntAuditSystematic").val(JsonObject['internal_audits'][0]['systematic_commitment_date']);

                    let internalCorrPerInCharges = [];
                    for(let index = 0; index < JsonObject['internal_audits'][0]['internal_corr_per_in_charges'].length; index++){
                        internalCorrPerInCharges.push(JsonObject['internal_audits'][0]['internal_corr_per_in_charges'][index]['person_in_charge_id']);
                    }
                    $("#selEditIntAuditCorrPerInCharge").val(internalCorrPerInCharges).trigger('change');
                    // console.log(internalCorrPerInCharges);

                    let internalConPerInCharges = [];
                    for(let index = 0; index < JsonObject['internal_audits'][0]['internal_con_per_in_charges'].length; index++){
                        internalConPerInCharges.push(JsonObject['internal_audits'][0]['internal_con_per_in_charges'][index]['person_in_charge_id']);
                    }
                    $("#selEditIntAuditConPerInCharge").val(internalConPerInCharges).trigger('change');
                    // console.log(internalConPerInCharges);

                    let internalSysPerInCharges = [];
                    for(let index = 0; index < JsonObject['internal_audits'][0]['internal_sys_per_in_charges'].length; index++){
                        internalSysPerInCharges.push(JsonObject['internal_audits'][0]['internal_sys_per_in_charges'][index]['person_in_charge_id']);
                    }
                    $("#selEditIntAuditSysPerInCharge").val(internalSysPerInCharges).trigger('change');
                    // console.log(internalSysPerInCharges);

                    // $("#selEditIntAuditPerInCharge").val(JsonObject['internal_audits'][0]['person_in_charge']).trigger('change');
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }
    </script>
@endsection