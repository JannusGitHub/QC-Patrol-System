@extends('layouts.master_layout')
@section('title', 'Report')

@section('content')
    <style type="text/css">
        table.table tbody td{
            /*background-color: black;*/
            padding-top: 3px; 
            padding-bottom: 1px;
            font-size: 12px;
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
    </style>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Report</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Report
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
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <legend style="text-align: center;">Filter TUV Report</legend>
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
                                                                    <select name="responsible_department" class="form-control select2 selectDepartment" id="selGenTuvRepResDept" multiple="multiple" disabled>
                                                                        <!-- Code generated -->
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_evaluation_item" id="chkGenTuvRepEvalItem"> <label>Evaluation Item</label></td>
                                                                <td>
                                                                    <select name="evaluation_item" class="form-control form-control-sm select2 selTUVEvalItem" id="selGenTuvRepEvalItem" disabled style="width: 100%;">
                                                                        <!-- Code generated -->
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_audit_stat" id="chkGenTuvRepAuditStat"> <label>Audit Status</label></td>
                                                                <td>
                                                                    <select name="audit_stat" class="form-control" id="selGenTuvRepAuditStat" disabled>
                                                                        <option value="1">For Improvement_Plan</option>
                                                                        <option value="2">For Closed-Out</option>
                                                                        <option value="3">Close</option>
                                                                    </select>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                     <button type="submit" class="btn btn-success"><i class="icon-refresh2" title="Generate"></i> Generate</button> 
                                                                     <button type="button" class="btn btn-success" title="Export to XLS" id="btnExportTuv"><i class="icon-file-excel-o"></i> Export</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </fieldset>
                                                    
                                            </div>
                                        </div>
                                        <br><br>
                                        <!-- <div class="table-responsive"> -->
                                            <table class="table table-bordered table-striped stripe row-border order-column" id="tblTUVAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Audit Date</th>
                                                        <th>Purpose of Audit</th>
                                                        <th>Item No.</th>
                                                        <th>Statement_of_NC</th>
                                                        <th>Objective Evidence</th>
                                                        <th>Responsible Department</th>
                                                        <th>Audit Category</th>
                                                        <th>Rank / Classification</th>
                                                        <th>Standard Clause</th>
                                                        <th>Auditors</th>
                                                        <th>Evaluation Item</th>
                                                        <th>Deadline of Submission</th>
                                                        <th>Actual Date of Submission</th>
                                                        <th>Root Cause Analysis</th>
                                                        <th>Correction</th>
                                                        <th>Person In-charge</th>
                                                        <th>Commitment Date</th>
                                                        <th>Containment</th>
                                                        <th>Person In-charge</th>
                                                        <th>Commitment Date</th>
                                                        <th>Systemic</th>
                                                        <th>Person In-charge</th>
                                                        <th>Commitment Date</th>
                                                        <th>Close-Out Audit</th>
                                                        <th>Image</th>
                                                        <th>Sending Status</th>
                                                        <th>Audit Status</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        <!-- </div> -->
                                    </div>
                                    <!-- ../ TUV PANEL -->

                                    <!-- CUSTOMER PANEL -->
                                    <div class="tab-pane fade" id="tabCustomer" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                      <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <legend style="text-align: center;">Filter Customer Report</legend>
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
                                                                    <select name="responsible_department[]" class="form-control select2 selectDepartment" multiple="multiple" style="width: 100%;" id="selGenCusRepResDept" disabled>
                                                                        <!-- Code generated -->
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_customer_name" id="chkGenCusRepCusName"> <label>Customer Name</label></td>
                                                                <td>
                                                                    <select name="customer_name" class="form-control select2" id="selGenCusRepCusName" multiple="multiple" style="width: 100%;" disabled>
                                                                        <!-- Code generated -->
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_evaluation_item" id="chkGenCusRepEvalItem"> <label>Evaluation Item</label></td>
                                                                <td>
                                                                    <select name="evaluation_item" class="form-control form-control-sm select2 selCusEvalItem" id="selGenCusRepEvalItem" disabled style="width: 100%;">
                                                                        <!-- Code generated -->
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_audit_stat" id="chkGenCusRepAuditStat"> <label>Audit Status</label></td>
                                                                <td>
                                                                    <select name="audit_stat" class="form-control" id="selGenCusRepAuditStat" disabled>
                                                                        <option value="1">For Improvement_Plan</option>
                                                                        <option value="2">For Closed-Out</option>
                                                                        <option value="3">Close</option>
                                                                    </select>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                     <button type="submit" class="btn btn-success"><i class="icon-refresh2" title="Generate"></i> Generate</button> 
                                                                     <button type="button" class="btn btn-success" title="Export to XLS" id="btnExportCus"><i class="icon-file-excel-o"></i> Export</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <br><br>
                                        <!-- <div class="table-responsive"> -->
                                            <table class="table table-bordered table-striped stripe row-border order-column" id="tblCusAuditResults" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Customer Name</th>
                                                        <th>Auditors</th>
                                                        <th>Item No.</th>
                                                        <th>Process</th>
                                                        <th>Evaluation Item</th>
                                                        <th>Rank / Classification</th>
                                                        <th>Audit_Date</th>
                                                        <th>Deadline of Submission</th>
                                                        <th>Actual Date of Submission</th>
                                                        <th>Responsible Group</th>
                                                        <th>Responsible Department</th>
                                                        <th>Statement_of_Findings</th>
                                                        <th>Illustration</th>
                                                        <th>Image</th>
                                                        <th>Root Cause</th>
                                                        <th>Improvement_Plan</th>
                                                        <th>Commitment Date</th>
                                                        <th>Person In-charge</th>
                                                        <th>Close-Out Audit</th>
                                                        <th>Image</th>
                                                        <th>Sending Status</th>
                                                        <th>Audit Status</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        <!-- </div> -->
                                    </div>
                                    <!-- ../ CUSTOMER PANEL -->

                                    <!-- ../ Internal PANEL -->
                                    <div class="tab-pane fade" id="tabInternal" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <legend style="text-align: center;">Filter Internal Report</legend>
                                                    <form method="get" id="formGenerateIntAuditResult">
                                                        <table>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_audit_date" id="chkGenIntRepAuditDate"> <label>Audit Date</label></td>
                                                                <td><input type="date" name="audit_date_from" class="form-control" title="Date From" id="dateGenIntRepDateFrom" disabled></td>
                                                                <td><input type="date" name="audit_date_to" class="form-control" title="Date To" id="dateGenIntRepDateTo" disabled></td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td><input type="checkbox" name="has_audit_date" id="chkGenIntRepAuditDate"> <label>Audit Date</label></td>
                                                                <td>
                                                                    <div id="drpGenIntRepAuditDate" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 400px">
                                                                        <i class="fa fa-calendar"></i>&nbsp;
                                                                        <span></span> <i class="fa fa-caret-down"></i>
                                                                    </div>
                                                                </td>
                                                            </tr> -->
                                                            <tr>
                                                                <td><input type="checkbox" name="has_audit_category" id="chkGenIntRepAuditType"> <label>Audit Type</label></td>
                                                                <td>
                                                                    <select name="audit_type" class="form-control" id="selGenIntRepAuditType" disabled>
                                                                        <option value="System">System</option>
                                                                        <option value="Process">Process</option>
                                                                        <option value="Product">Product</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select name="audit_type_pref_rep_ctrl_no" class="form-control" id="selGenIntRepAuditTypePrefRepCtrlNo" disabled>
                                                                        <option value="0">All</option>
                                                                        <option value="AQMS">AQMS</option>
                                                                        <option value="EMS">EMS</option>
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
                                                                <td>
                                                                    <input type="text" class="form-control" name="nc_control_no" id="txtGenIntNCCtrlNo" placeholder="CPAR Ctrl No." disabled>
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
                                                                    <select name="responsible_department[]" class="form-control select2 selectDepartment" multiple="multiple" style="width: 100%;" id="selGenIntRepResDept" disabled>
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
                                                                <td><input type="checkbox" name="has_item_no" id="chkGenIntItemNo"> <label>Item No.</label></td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="item_no" id="txtGenIntItemNo" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_evaluation_item" id="chkGenIntRepEvalItem"> <label>Evaluation Item</label></td>
                                                                <td>
                                                                    <select name="evaluation_item" class="form-control form-control-sm select2 selIntEvalItem" id="selGenIntRepEvalItem" disabled style="width: 100%;">
                                                                        <!-- Code generated -->
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_audit_stat" id="chkGenIntRepAuditStat"> <label>Audit Status</label></td>
                                                                <td>
                                                                    <select name="audit_stat" class="form-control" id="selGenIntRepAuditStat" disabled>
                                                                        <option value="1">For Improvement Plan</option>
                                                                        <option value="2">For Closed-Out</option>
                                                                        <option value="3">Close</option>
                                                                    </select>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                     <button type="submit" class="btn btn-success"><i class="icon-refresh2" title="Generate"></i> Generate</button>
                                                                    <!-- <button type="button" class="btn btn-success" title="Export to XLS" id="btnExportInt"><i class="icon-file-excel-o"></i> Export</button> -->
                                                                     <button type="button" class="btn btn-success" title="Export to XLS" id="btnExportInt"><i class="icon-file-excel-o"></i> Export</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </fieldset>
                                                    
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tblInternalAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Audit_Date</th>
                                                        <th>Audit Report Control No.</th>
                                                        <th>Item No.</th>
                                                        <th>Statement of Findings</th>
                                                        <th>Responsible Department</th>
                                                        <th>Audit Type</th>
                                                        <th>Business Process</th>
                                                        <th>Auditors</th>
                                                        <th>Auditees</th>
                                                        <th>Issued Date</th>
                                                        <th>Deadline of Submission</th>
                                                        <th>Actual Date of Submission</th>
                                                        <th>ISO / IATF Clause</th>
                                                        <th>Evaluation Item</th>
                                                        <th>Classification / Rank</th>
                                                        <th>CPAR Ctrl No.</th>
                                                        <th>Illustration</th>
                                                        <th>Root Cause</th>
                                                        <!-- <th>Improvement_Plan</th> -->
                                                        <!-- <th>Person In-charge</th> -->
                                                        <!-- <th>Commitment Date</th> -->
                                                        <th>Correction</th>
                                                        <th>Person In-charge</th>
                                                        <th>Commitment Date</th>
                                                        <th>Containment</th>
                                                        <th>Person In-charge</th>
                                                        <th>Commitment Date</th>
                                                        <th>Systemic</th>
                                                        <th>Person In-charge</th>
                                                        <th>Commitment Date</th>
                                                        <th>Close-Out Audit</th>
                                                        <th>Sending Status</th>
                                                        <th>Audit Status</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>

                                    <!-- ../ Supplier PANEL -->
                                    <div class="tab-pane fade" id="tabSupplier" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <legend style="text-align: center;">Filter Supplier Report</legend>
                                                    <form method="get" id="formGenerateSuppAuditResult">
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
                                                                        <option value="Product">Product</option>
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
                                                                    <select name="responsible_department[]" class="form-control select2 selectDepartment" multiple="multiple" style="width: 100%;" id="selGenSuppRepResDept" disabled>
                                                                        <!-- Code generated -->
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_audit_stat" id="chkGenSuppRepAuditStat"> <label>Audit Status</label></td>
                                                                <td>
                                                                    <select name="audit_stat" class="form-control" id="selGenSuppRepAuditStat" disabled>
                                                                        <option value="1">For Improvement Plan</option>
                                                                        <option value="2">For Closed-Out</option>
                                                                        <option value="3">Close</option>
                                                                    </select>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                     <button type="submit" class="btn btn-success"><i class="icon-refresh2" title="Generate"></i> Generate</button> 
                                                                     <button type="button" class="btn btn-success" title="Export to XLS" id="btnExportSupp"><i class="icon-file-excel-o"></i> Export</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </fieldset>
                                                    
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tblSupplierAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Audit Type</th>
                                                        <th>Audit Report Control No.</th>
                                                        <th>Business Process</th>
                                                        <th>Audit_Date</th>
                                                        <th>Auditors</th>
                                                        <th>Auditees</th>
                                                        <th>Issued Date</th>
                                                        <th>Deadline of Submission</th>
                                                        <th>Actual Date of Submission</th>
                                                        <th>ISO / IATF Clause</th>
                                                        <th>Category of Findings</th>
                                                        <th>Classification / Rank</th>
                                                        <th>Responsible Department</th>
                                                        <th>Statement_of_Findings</th>
                                                        <th>Illustration</th>
                                                        <th>Root Cause</th>
                                                        <th>Improvement_Plan</th>
                                                        <th>Person In-charge</th>
                                                        <th>Commitment Date</th>
                                                        <th>Close-Out Audit</th>
                                                        <th>Sending Status</th>
                                                        <th>Audit Status</th>
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
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection

@section('js_content')
    <script type="text/javascript">
        // COMMON JAVASCRIPT CODES
        $(document).ready(function(){
          $(".select2").select2();
          GetDepartmentByStat(1, $(".selectDepartment"));

          // $(".commonAuditImg").click(function(){
          //   alert('wew');
          //   $("#modalViewCommonAuditImage").modal('show');
          //   $("#imgPrevCommonAuditImage").attr('src', $(this).attr('src'));
          // });

          $('#tblTUVAuditResults').on('click', '.commonAuditImg', function () {
                $("#modalViewCommonAuditImage").modal('show');
                $("#imgPrevCommonAuditImage").attr('src', $(this).attr('src'));
          });

          $('#tblCusAuditResults').on('click', '.commonAuditImg', function () {
                $("#modalViewCommonAuditImage").modal('show');
                $("#imgPrevCommonAuditImage").attr('src', $(this).attr('src'));
          });

          $('#tblInternalAuditResults').on('click', '.commonAuditImg', function () {
                $("#modalViewCommonAuditImage").modal('show');
                $("#imgPrevCommonAuditImage").attr('src', $(this).attr('src'));
          });

          $('#tblSupplierAuditResults').on('click', '.commonAuditImg', function () {
                $("#modalViewCommonAuditImage").modal('show');
                $("#imgPrevCommonAuditImage").attr('src', $(this).attr('src'));
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
        let item_no = 0;
        let evaluation_item = null;

        GetCboSelUniqueTUVEvalItems($(".selTUVEvalItem"));
        GetCboSelUniqueCusEvalItems($(".selCusEvalItem"));
        GetCboSelUniqueIntEvalItems($(".selIntEvalItem"));

        $(document).ready(function(){

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
              var target = $(e.target).attr("href") // activated tab
              // alert(target);
              
              if(target == "#active"){
                dataTableTUVAudits.draw();
              }
              else if(target == "#tabCustomer"){
                dataTableCusAudits.draw();
              }
              else if(target == "#tabInternal"){
                dataTableInternalAudits.draw();
              }
              else if(target == "#tabSupplier"){
                dataTableSupplierAudits.draw();
              }
              
            });

          $.fn.dataTable.ext.errMode = 'none'; //this is required to avoid alerting datatable error message
          // $.fn.dataTable.ext.classes.sPageButton = 'pagination pagination-sm';
          
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
              "processing" : true,
              "serverSide" : true,
              "ajax" : {
                  url: "view_report_tuv_audit_by_stat",
                  "data": function (param){
                      param.date_from = date_from;
                      param.date_to = date_to;
                      param.audit_category = audit_category;
                      param.purpose_of_audit = purpose_of_audit;
                      param.classification = classification;
                      param.standard_clause = standard_clause;
                      param.responsible_department = responsible_department;
                      param.audit_stat = audit_stat;
                      param.evaluation_item = evaluation_item;
                  }
              },
              "columns":[
                  { "data" : "tuv_audit_id" },
                  { "data" : "formatted_audit_date" },
                  { "data" : "purpose_of_audit" },
                  { "data" : "item_no" },
                  { "data" : "statement_of_nc"},
                  { "data" : "objective_evidence" },
                  { "data" : "tuv_departments", "render" : "[, ].departments.0.department_name"},
                  { "data" : "lbl_audit_category" },
                  { "data" : "classification" },
                  { "data" : "standard_clause" },
                  { "data" : "auditors" },
                  { "data" : "evaluation_item" },
                  { "data" : "deadline_for_submission" },
                  { "data" : "actual_date_of_submission" },
                  { "data" : "root_cause_analysis" },
                  { "data" : "correction" },
                  // { "data" : "tuv_corr_per_in_charges" },
                  { "data" : "tuv_corr_per_in_charges", "render" : "[, ].tuv_corr_per_in_charge_record.name"},
                  { "data" : "correction_commitment_date" },
                  { "data" : "containment" },
                  { "data" : "tuv_con_per_in_charges", "render" : "[, ].tuv_con_per_in_charge_record.name"},
                  { "data" : "systematic" },
                  { "data" : "containment_commitment_date" },
                  { "data" : "tuv_sys_per_in_charges", "render" : "[, ].tuv_sys_per_in_charge_record.name"},
                  { "data" : "systematic_commitment_date" },
                  { "data" : "corrective_action" },
                  { "data" : "closed_out_audit_image" },
                  { "data" : "label1" },
                  { "data" : "label2" },
              ],
              "columnDefs": [ 
                    {
                      "targets": [8, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
                      "data": null,
                      "defaultContent": "- - -"
                    },
                    {
                        "targets": '_all',
                        "createdCell": function (td, cellData, rowData, row, col) {
                            $(td).css('padding', '5px');
                        }
                    }
               ],
               "stateSave": false,
                "pagingType": "full_numbers",
                scrollY:        "400px",
                scrollX:        true,
                scrollCollapse: true,
                paging:         false,
                fixedColumns:   {
                    leftColumns: 6,
                    rightColumns: 0
                },
                "lengthMenu" : [[10,25,50,100,-1],[10,25,50,100,"All"]],
                "paging": true,
                "scrollCollapse": true,
                "order":[[ 0, "desc" ]],
                "pageLength": 10,
                "drawCallback": function( settings ) {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
          });//end of dataTableTUVAudits

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
                  responsible_department = $("#selGenTuvRepResDept").select2('val');
              }
              else{
                  responsible_department = 0;
              }

              if($("#selGenTuvRepEvalItem").attr('disabled') != 'disabled' && $("#selGenTuvRepEvalItem").val() != '' && $("#selGenTuvRepEvalItem").val() != null) {
                  evaluation_item = $("#selGenTuvRepEvalItem").select2('val');
              }
              else{
                  evaluation_item = null;
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
                    $("#selGenTuvRepResDept").val('0').trigger('change');
                }
            });

            $("#chkGenTuvRepEvalItem").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenTuvRepEvalItem").removeAttr('disabled');
                }
                else{
                    $("#selGenTuvRepEvalItem").prop('disabled', 'disabled');
                    $("#selGenTuvRepEvalItem").val('0').trigger('change');
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

            $("#btnExportTuv").click(function(){
                window.open('tuv_export?date_from=' + date_from + '&date_to=' + date_to + '&audit_category=' + audit_category + '&purpose_of_audit=' + purpose_of_audit + '&classification=' + classification + '&responsible_department=' + responsible_department + '&audit_stat=' + audit_stat, '_blank');
            });
        });

        // ------------------ CUSTOMER REPORT ------------------
        let dataTableCusAudits;

        let customer_date_from = 0;
        let customer_date_to = 0;
        let customer_classification = 0;
        let customer_responsible_group = 0;
        let customer_responsible_department = 0;
        let customer_audit_stat = 0;
        let customer_name = 0;
        let customer_item_no = 0;
        let customer_evaluation_item = null;

        $(document).ready(function() {
            dataTableCusAudits = $("#tblCusAuditResults").on( 'error.dt', function ( e, settings, techNote, message ) {
            Swal({
                  position: 'top-end',
                  type: 'error',
                  title: 'Customer DataTable Failed!',
                  showConfirmButton: false,
                  timer: 1500,
                  customClass: 'swal-wide',
              });
          }).DataTable({
                "processing" : true,
                "serverSide" : true,
                "ajax" : {
                    url: "view_report_customer_audit_by_stat",
                    "data": function (param){
                        param.date_from = customer_date_from;
                        param.date_to = customer_date_to;
                        param.classification = customer_classification;
                        param.responsible_group = customer_responsible_group;
                        param.responsible_department = customer_responsible_department;
                        param.audit_stat = customer_audit_stat;
                        param.customer_name = customer_name;
                        param.item_no = customer_item_no;
                        param.evaluation_item = customer_evaluation_item;
                    }
                },
                "columns":[
                    { "data" : "customer_audit_id" },
                    { "data" : "customer_name" },
                    { "data" : "auditors" },
                    { "data" : "item_no" },
                    { "data" : "process" },
                    { "data" : "evaluation_item" },
                    { "data" : "classification" },
                    { "data" : "formatted_audit_date" },
                    { "data" : "deadline_of_submission" },
                    { "data" : "actual_date_of_submission" },
                    { "data" : "responsible_group" },
                    { "data" : "customer_departments", "render" : "[, ].departments.0.department_name"},
                    { "data" : "statement_of_findings" },
                    { "data" : "illustration" },
                    { "data" : "illustration_image" },
                    { "data" : "root_cause" },
                    { "data" : "improvement_plan" },
                    { "data" : "commitment_date" },
                    { "data" : "person_in_charges", "render" : "[, ].person_in_charge_record.name"},
                    { "data" : "corrective_action" },
                    { "data" : "closed_out_audit_image" },
                    { "data" : "label1" },
                    { "data" : "label2" },
                ],
                "columnDefs": [ 
                    {
                      "targets": [7, 10, 11, 12, 13, 14, 15, 16, 17],
                      "data": null,
                      "defaultContent": "- - -"
                    },
                    {
                        "targets": '_all',
                        "createdCell": function (td, cellData, rowData, row, col) {
                            $(td).css('padding', '5px');
                        }
                    }
                ],
                "stateSave": false,
                "pagingType": "full_numbers",
                scrollY:        "400px",
                scrollX:        true,
                scrollCollapse: true,
                paging:         false,
                fixedColumns:   {
                    leftColumns: 6,
                    rightColumns: 0
                },
                "lengthMenu" : [[10,25,50,100,-1],[10,25,50,100,"All"]],
                "paging": true,
                "scrollCollapse": true,
                "order":[[ 1, "asc" ]],
                "pageLength": 10,
                "drawCallback": function( settings ) {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
                // "dom": '<"top"i>rt<"bottom"flp><"clear">',
                // "dom": '<"top"f>rt<"bottom"flp><"clear">',
            });//end of dataTableCusAudits
            
            // GetDepartmentByStat(1, $("#selGenCusRepResDept"));
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
                    customer_responsible_department = $("#selGenCusRepResDept").select2('val');
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

                if($("#txtGenCusRepItemNo").attr('disabled') != 'disabled' && $("#txtGenCusRepItemNo").val() != '' && $("#txtGenCusRepItemNo").val() != null) {
                    customer_item_no = $("#txtGenCusRepItemNo").val();
                }
                else {
                    customer_item_no = 0;
                }

                if($("#selGenCusRepEvalItem").attr('disabled') != 'disabled' && $("#selGenCusRepEvalItem").val() != '' && $("#selGenCusRepEvalItem").val() != null) {
                    customer_evaluation_item = $("#selGenCusRepEvalItem").val();
                }
                else {
                    customer_evaluation_item = null;
                }
                // alert(audit_category);
                dataTableCusAudits.draw();
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
                    $("#selGenCusRepResDept").val('0').trigger('change');
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

            $("#chkGenCusRepEvalItem").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenCusRepEvalItem").removeAttr('disabled');
                }
                else{
                    $("#selGenCusRepEvalItem").prop('disabled', 'disabled');
                    $("#selGenCusRepEvalItem").val('0').trigger('change');
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

            $("#btnExportCus").click(function(){
                window.open('customer_export?date_from=' + customer_date_from + '&date_to=' + customer_date_to + '&classification=' + customer_classification + '&responsible_group=' + customer_responsible_group + '&responsible_department=' + customer_responsible_department + '&audit_stat=' + customer_audit_stat, '_blank');
            });
        });

        // ------------------ INTERNAL AUDIT ------------------
        let dataTableInternalAudits;

        let internal_date_from = 0;
        let internal_date_to = 0;
        let internal_audit_type = 0;
        let internal_audit_type_pref_rep_ctrl_no = 0;
        let internal_classification = 0;
        let internal_category_of_findings = 0;
        let internal_responsible_department = 0;
        let internal_audit_stat = 0;
        let audit_report_control_no = 0;
        let internal_item_no = 0;
        let internal_nc_control_no = 0;
        let internal_evaluation_item = null;

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
                    url: "view_report_internal_audit_by_stat",
                    "data": function (param){
                        param.date_from = internal_date_from;
                        param.date_to = internal_date_to;
                        param.audit_type = internal_audit_type;
                        param.audit_type_pref_rep_ctrl_no = internal_audit_type_pref_rep_ctrl_no;
                        param.classification = internal_classification;
                        param.category_of_findings = internal_category_of_findings;
                        param.responsible_department = internal_responsible_department;
                        param.audit_stat = internal_audit_stat;
                        param.item_no = internal_item_no;
                        param.nc_control_no = internal_nc_control_no;
                        param.audit_report_control_no = audit_report_control_no;
                        param.evaluation_item = internal_evaluation_item;
                    }
                }, 
                "columns":[
                    { "data" : "internal_audit_id" },
                    { "data" : "formatted_audit_date" },
                    { "data" : "audit_report_control_no" },
                    { "data" : "item_no" },
                    { "data" : "statement_of_findings" },
                    { "data" : "internal_departments", "render" : "[, ].departments.0.department_name"},
                    { "data" : "audit_type" },
                    { "data" : "business_process" },
                    { "data" : "auditors" },
                    { "data" : "auditees" },
                    { "data" : "audit_findings_issued_date" },
                    { "data" : "deadline_of_submission" },
                    { "data" : "actual_date_of_submission" },
                    { "data" : "iso_iatf_clause" },
                    { "data" : "category_of_findings" },
                    { "data" : "classification" },
                    { "data" : "nc_control_no" },
                    { "data" : "illustration" },
                    { "data" : "root_cause" },
                    // { "data" : "improvement_action" },
                    // { "data" : "person_in_charges", "render" : "[, ].person_in_charge_record.name"},
                    // { "data" : "commitment_date" },
                    { "data" : "correction" },
                    { "data" : "correction_person_in_charge" },
                    { "data" : "correction_commitment_date" },
                    { "data" : "containment" },
                    { "data" : "containment_person_in_charge" },
                    { "data" : "containment_commitment_date" },
                    { "data" : "systematic" },
                    { "data" : "systematic_person_in_charge" },
                    { "data" : "systematic_commitment_date" },
                    { "data" : "corrective_action" },
                    { "data" : "label1" },
                    { "data" : "label2" }
                ],
                "columnDefs": [ 
                    {
                      "targets": [9, 3, 13, 14, 15, 16, 17, 18, 19, 20, 21],
                      "data": null,
                      "defaultContent": "- - -"
                    },
                    {
                        "targets": '_all',
                        "createdCell": function (td, cellData, rowData, row, col) {
                            $(td).css('padding', '5px');
                        }
                    }
                ],
                "stateSave": false,
                "pagingType": "full_numbers",
                scrollY:        "400px",
                scrollX:        true,
                scrollCollapse: true,
                paging:         false,
                fixedColumns:   {
                    leftColumns: 6,
                    rightColumns: 0
                },
                "lengthMenu" : [[10,25,50,100,-1],[10,25,50,100,"All"]],
                "paging": true,
                "scrollCollapse": true,
                "order":[[ 1, "asc" ]],
                "pageLength": 10,
                "drawCallback": function( settings ) {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
            });//end of dataTableInternalAudits

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

                if($("#selGenIntRepAuditType").attr('disabled') != 'disabled' && $("#selGenIntRepAuditType").val() != '') {
                    internal_audit_type = $("#selGenIntRepAuditType").val();
                    internal_audit_type_pref_rep_ctrl_no = $("#selGenIntRepAuditTypePrefRepCtrlNo").val();
                }
                else{
                    internal_audit_type = 0;
                    internal_audit_type_pref_rep_ctrl_no = 0;
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

                if($("#txtGenIntNCCtrlNo").attr('disabled') != 'disabled' && $("#txtGenIntNCCtrlNo").val() != '' && $("#txtGenIntNCCtrlNo").val() != null) {
                    internal_nc_control_no = $("#txtGenIntNCCtrlNo").val();
                }
                else {
                    internal_nc_control_no = 0;
                }

                if($("#selGenIntRepEvalItem").attr('disabled') != 'disabled' && $("#selGenIntRepEvalItem").val() != '' && $("#selGenIntRepEvalItem").val() != null) {
                    internal_evaluation_item = $("#selGenIntRepEvalItem").val();
                }
                else {
                    internal_evaluation_item = null;
                }

                if($("#txtGenIntItemNo").attr('disabled') != 'disabled' && $("#txtGenIntItemNo").val() != '' && $("#txtGenIntItemNo").val() != null) {
                    internal_item_no = $("#txtGenIntItemNo").val();
                }
                else {
                    internal_item_no = 0;
                }

                if($("#txtGenIntRepCtrlNo").attr('disabled') != 'disabled' && $("#txtGenIntRepCtrlNo").val() != '' && $("#txtGenIntRepCtrlNo").val() != null) {
                    audit_report_control_no = $("#txtGenIntRepCtrlNo").val();
                }
                else {
                    audit_report_control_no = 0;
                }
                // alert(audit_category);

                if($("#dateGenIntRepDateFrom").attr('disabled') != 'disabled' && $("#dateGenIntRepDateFrom").val() != '' && $("#dateGenIntRepDateFrom").val() != null) {
                    internal_date_from = $("#dateGenIntRepDateFrom").val();
                }
                else {
                    internal_date_from = 0;
                }

                if($("#dateGenIntRepDateTo").attr('disabled') != 'disabled' && $("#dateGenIntRepDateTo").val() != '' && $("#dateGenIntRepDateTo").val() != null) {
                    internal_date_to = $("#dateGenIntRepDateTo").val();
                }
                else {
                    internal_date_to = 0;
                }

                dataTableInternalAudits.draw();
            });

            $("#selGenIntRepAuditType").change(function() {
                if($(this).val() == "System") {
                    $("#selGenIntRepAuditTypePrefRepCtrlNo").removeAttr('disabled');
                    $("#selGenIntRepAuditTypePrefRepCtrlNo").val('0');
                }
                else{
                    $("#selGenIntRepAuditTypePrefRepCtrlNo").prop('disabled', 'disabled');
                    $("#selGenIntRepAuditTypePrefRepCtrlNo").val('0');
                }
            });

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

            $("#chkAddIntAuditReqForApproval").click(function(){
                if($(this).prop('checked')) {
                    $("#chkAddIntAuditSendEmail").prop('disabled', 'disabled');
                }
                else{
                    $("#chkAddIntAuditSendEmail").removeAttr('disabled');
                    $("#chkAddIntAuditSendEmail").removeAttr('checked');
                }
            });

            $("#btnExportInt").click(function(){
                window.open('internal_export?date_from=' + internal_date_from + '&date_to=' + internal_date_to + '&audit_type=' + internal_audit_type + '&classification=' + internal_classification + '&category_of_findings=' + internal_category_of_findings + '&responsible_department=' + internal_responsible_department + '&audit_stat=' + internal_audit_stat + '&item_no=' + internal_item_no + '&nc_control_no=' + internal_nc_control_no + '&audit_type_pref_rep_ctrl_no=' + internal_audit_type_pref_rep_ctrl_no + '&audit_report_control_no=' + audit_report_control_no, '_blank');
            });
        });


        // ------------------ SUPPLIER REPORT ------------------
        let dataTableSupplierAudits;

        let supplier_date_from = 0;
        let supplier_date_to = 0;
        let supplier_audit_type = 0;
        let supplier_classification = 0;
        let supplier_category_of_findings = 0;
        let supplier_responsible_department = 0;
        let supplier_audit_stat = 0;

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
                "processing" : true,
                "serverSide" : true,
                "ajax" : {
                    url: "view_report_supplier_audit_by_stat",
                    "data": function (param){
                        param.date_from = supplier_date_from;
                        param.date_to = supplier_date_to;
                        param.audit_type = supplier_audit_type;
                        param.classification = supplier_classification;
                        param.category_of_findings = supplier_category_of_findings;
                        param.responsible_department = supplier_responsible_department;
                        param.audit_stat = supplier_audit_stat;
                    }
                },            
                "columns":[
                    { "data" : "supplier_audit_id" },
                    { "data" : "audit_type" },
                    { "data" : "audit_report_control_no" },
                    { "data" : "business_process" },
                    { "data" : "formatted_audit_date" },
                    { "data" : "auditors" },
                    { "data" : "auditees" },
                    { "data" : "audit_findings_issued_date" },
                    { "data" : "deadline_of_submission" },
                    { "data" : "actual_date_of_submission" },
                    { "data" : "iso_iatf_clause" },
                    { "data" : "category_of_findings" },
                    { "data" : "classification" },
                    { "data" : "supplier_departments", "render" : "[, ].departments.0.department_name"},
                    { "data" : "statement_of_findings" },
                    { "data" : "illustration" },
                    { "data" : "root_cause" },
                    { "data" : "improvement_action" },
                    // { "data" : "person_in_charge_record.name" },
                    { "data" : "person_in_charges", "render" : "[, ].person_in_charge_record.name"},
                    { "data" : "commitment_date" },
                    { "data" : "corrective_action" },
                    { "data" : "label1" },
                    { "data" : "label2" }
                ],
                "columnDefs": [
                    {
                      "targets": [9, 13, 14, 15, 16, 17, 18, 19, 20],
                      "data": null,
                      "defaultContent": "- - -"
                    },
                    {
                        "targets": '_all',
                        "createdCell": function (td, cellData, rowData, row, col) {
                            $(td).css('padding', '5px');
                        }
                    }
                ],
                "stateSave": false,
                "pagingType": "full_numbers",
                scrollY:        "400px",
                scrollX:        true,
                scrollCollapse: true,
                paging:         false,
                fixedColumns:   {
                    leftColumns: 6,
                    rightColumns: 0
                },
                "lengthMenu" : [[10,25,50,100,-1],[10,25,50,100,"All"]],
                "paging": true,
                "scrollCollapse": true,
                "order":[[ 1, "asc" ]],
                "pageLength": 10,
                "drawCallback": function( settings ) {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
            });//end of dataTableSupplierAudits

            $("#formGenerateSuppAuditResult").submit(function(event){
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
                    supplier_responsible_department = $("#selGenSuppRepResDept").select2('val');
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
                    $("#selGenSuppRepResDept").val('0').trigger('change');
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

            $("#btnExportSupp").click(function(){
                window.open('supplier_export?date_from=' + date_from + '&date_to=' + date_to + '&audit_type=' + supplier_audit_type + '&classification=' + supplier_classification + '&category_of_findings=' + supplier_category_of_findings + '&responsible_department=' + supplier_responsible_department + '&audit_stat=' + supplier_audit_stat, '_blank');
            });
        });
        // setTimeout(function(){ 
        //     $("#formGenerateCusReport").submit();
        // }, 3000);
    </script>
@endsection