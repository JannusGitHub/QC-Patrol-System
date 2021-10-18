@extends('layouts.master_layout')
@section('title', 'Archived Audit Result')

@section('content')
    <style type="text/css">
        table.table tbody td{
            /*background-color: black;*/
            padding-top: 3px; 
            padding-bottom: 1px;
            font-size: 12px;
        }
    </style>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Archived Audit Result</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Archived Audit Result
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
                                                                    <select name="responsible_department" class="form-control select2 selectDepartment" id="selGenTuvRepResDept" multiple="multiple" disabled>
                                                                        <!-- Code generated -->
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_audit_stat" id="chkGenTuvRepAuditStat"> <label>Audit Status</label></td>
                                                                <td>
                                                                    <select name="audit_stat" class="form-control" id="selGenTuvRepAuditStat" disabled>
                                                                        <option value="1">For Improvement Plan</option>
                                                                        <option value="2">For Closed-Out</option>
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
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tblTUVAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Send</th>
                                                        <th>ID</th>
                                                        <th>Audit Date</th>
                                                        <th>Audit Category</th>
                                                        <th>Auditors</th>
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
                                    <!-- ../ TUV PANEL -->

                                    <!-- CUSTOMER PANEL -->
                                    <div class="tab-pane fade" id="tabCustomer" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
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
                                                                    <select name="responsible_department[]" class="form-control select2 selectDepartment" multiple="multiple" style="width: 100%;" id="selGenCusRepResDept" disabled>
                                                                        <!-- Code generated -->
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_customer_name" id="chkGenCusRepCusName"> <label>Customer Name</label></td>
                                                                <td>
                                                                    <select name="customer_name[]" class="form-control select2" id="selGenCusRepCusName" multiple="multiple" style="width: 100%;" disabled>
                                                                        <!-- Code generated -->
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="has_audit_stat" id="chkGenCusRepAuditStat"> <label>Audit Status</label></td>
                                                                <td>
                                                                    <select name="audit_stat" class="form-control" id="selGenCusRepAuditStat" disabled>
                                                                        <option value="1">For Improvement Plan</option>
                                                                        <option value="2">For Closed-Out</option>
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
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tblCusAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Send</th>
                                                        <th>ID</th>
                                                        <th>Customer Name</th>
                                                        <th>Audit Date</th>
                                                        <th>Auditors</th>
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
                                    <!-- ../ CUSTOMER PANEL -->

                                    <!-- ../ Internal PANEL -->
                                    <div class="tab-pane fade" id="tabInternal" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <legend style="text-align: center;">Filter Internal Audit Result</legend>
                                                    <form method="get" id="formGenerateIntAuditResult">
                                                        <table>
                                                            <!-- <tr>
                                                                <td><input type="checkbox" name="has_audit_date" id="chkGenIntRepAuditDate"> <label>Audit Date</label></td>
                                                                <td><input type="date" name="audit_date_from" class="form-control" title="Date From" id="dateGenIntRepDateFrom" disabled></td>
                                                                <td><input type="date" name="audit_date_to" class="form-control" title="Date To" id="dateGenIntRepDateTo" disabled></td>
                                                            </tr> -->
                                                            <tr>
                                                                <td><input type="checkbox" name="has_audit_date" id="chkGenIntRepAuditDate"> <label>Audit Date</label></td>
                                                                <td>
                                                                    <div id="drpGenIntRepAuditDate" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 400px">
                                                                        <i class="fa fa-calendar"></i>&nbsp;
                                                                        <span></span> <i class="fa fa-caret-down"></i>
                                                                    </div>
                                                                </td>
                                                            </tr>
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
                                                                    <input type="text" class="form-control" name="nc_control_no" id="txtGenIntNCCtrlNo" disabled>
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
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </fieldset>
                                                    
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tblInternalAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Send</th>
                                                        <th>ID</th>
                                                        <th>Audit Date</th>
                                                        <th>Audit Type</th>
                                                        <th>Auditors</th>
                                                        <th>Item No.</th>
                                                        <th>Report Control No.</th>
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

                                    <!-- ../ Supplier PANEL -->
                                    <div class="tab-pane fade" id="tabSupplier" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <legend style="text-align: center;">Filter Supplier Audit Result</legend>
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
                                                                    <!-- <button type="button" class="btn btn-success" title="Export to XLS" id="btnExportSupp"><i class="icon-file-excel-o"></i> Export</button> -->
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </fieldset>
                                                    
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tblSupplierAuditResults" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Send</th>
                                                        <th>ID</th>
                                                        <th>Audit Date</th>
                                                        <th>Audit Type</th>
                                                        <th>Auditors</th>
                                                        <th>Report Control No.</th>
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
          </section>
          <!-- // Feather icons section end -->

          <!-- MODALS -->
          <!-- ------------------------ TUV AUDIT -------------- -->
            <!-- Modal ChangeAuditStat TUV Audit -->
            <div class="modal fade text-xs-left" id="modalChangeAuditStatTUVAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formChangeAuditStatTUVAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Change Audit Stat TUV Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p id="pTUVChangeAuditStat">Are you sure to change audit stat this selected TUV Audit?</p>
                            <input type="hidden" name="tuv_audit_id" id="txtChangeAuditStatTUVAuditId"><input type="hidden" name="tuv_audit_stat" id="txtChangeTUVAuditStat">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Close TUV Audit -->

            <!-- Modal View TUV Audit -->
            <div class="modal fade text-xs-left" id="modalViewTUVAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
                                            <label for="projectinput1"><b>Audit Category</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditCat"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Purpose of Audit</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditPurpose"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Rank / Classification</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditRankClass"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Standard Clause</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditStanClause"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Audit Date</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditDateFrom"></label> to 
                                            <label for="projectinput1" id="lblViewTUVAuditDateTo"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Auditors</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditAuditors"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Deadline for Submission</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditDeadSub"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Actual Date of Submission</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditActDateSub"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Responsible Department</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditResDept"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Statement of NC</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditStmtOfNC"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Objective Evidence</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditObjEvi"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Root Cause Analysis</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditRootCause"></label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Correction</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditCorrection"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Person In Charge</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditCorrPerInCharge"></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Commitment Date</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditCorrCommDate"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Containment</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditContainment"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Person In Charge</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditConPerInCharge"></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Commitment Date</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditConCommDate"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Systemic</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditSystematic"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Person In Charge</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditSysPerInCharge"></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="projectinput1"><b>Commitment Date</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditSysCommDate"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Close-Out Audit</b></label>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div style="height: 80px;">
                                                        <center>
                                                            <img class="commonAuditImg" id="imgViewTUVAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="projectinput1" id="lblViewTUVAuditCorrAct"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Sending Status</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditSendingStat">Sending Status</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Audit Status</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditAuditStat">Audit Status</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Created By</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditCreatedBy">Created By</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Created At</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditCreatedAt">Last Created At</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Last Updated By</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditLastUpdatedBy">Last Updated By</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"><b>Last Updated At</b></label> <br>
                                            <label for="projectinput1" id="lblViewTUVAuditLastUpdatedAt">Last Updated By</label>
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

            <!-- Modal ChangeTUVAuditStat TUV Audit -->
            <div class="modal fade text-xs-left" id="modalChangeTUVAuditStat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formChangeAuditTUVStat">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="h4ChangeAuditTUVStatTitle"><i class=""></i> Change Audit Stat TUV Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p id="pChangeAuditTUVStatBody">Are you sure to change audit stat this selected TUV Audit?</p>
                            <input type="hidden" name="tuv_audit_id" id="txtChangeAuditTUVStatAuditId">
                            <input type="hidden" name="tuv_audit_stat" id="txtChangeAuditTUVStatAuditStat">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal ChangeTUVAuditStat TUV Audit -->

            <!-- ------------------------ CUSTOMER AUDIT -------------- -->
            <!-- Modal View Customer Audit -->
            <div class="modal fade text-xs-left" id="modalViewCusAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
                                <center><label for="projectinput1"><b>FOR QAD ADMIN</b></label></center>
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
                                            <strong><label for="projectinput1">Evaluation Item</label></strong> <br>
                                            <label for="projectinput1" id="lblViewCusAuditEvalItem">Evaluation Item</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Classification / Rank</label></strong> <br>
                                            <label for="projectinput1" id="lblViewCusAuditClassRank">Classification / Rank</label>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Statement of Finding(s)</label></strong> <br>
                                            <label for="projectinput1" id="lblViewCusAuditResStmtOfFin">Statement of Finding(s)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                </div>

                                <hr>
                                <center><label for="projectinput1"><b>FOR OTHER SECTION</b></label></center>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Root Cause</label></strong> <br>
                                            <label for="projectinput1" id="lblViewCusAuditRootCause">Root Cause</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Improvement Plan</label></strong> <br>
                                            <label for="projectinput1" id="lblViewCusAuditImpPlan">Improvement Plan</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Commitment Date</label></strong> <br>
                                            <label for="projectinput1" id="lblViewCusAuditCommDate">Commitment Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Person In Charge</label></strong> <br>
                                            <label for="projectinput1" id="lblViewCusAuditPerInCharge">Person In Charge</label>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <center><label for="projectinput1"><b>FOR QAD ADMIN</b></label></center>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Close-Out Audit</label></strong> <br>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgViewCusAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <label for="projectinput1" id="lblViewCusAuditCorrAct">Close-Out Audit</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
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

            <!-- Modal ChangeAuditStat Cus Audit -->
            <div class="modal fade text-xs-left" id="modalChangeAuditStatCusAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formChangeAuditStatCusAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="h3CusChangeStatHead"><i class=""></i> ChangeAuditStat Customer Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p id="pCusChangeAuditStat">Are you sure to change audit stat this selected customer Audit?</p>
                            <input type="hidden" name="customer_audit_id" id="txtChangeAuditStatCusAuditId"><input type="hidden" name="audit_stat" id="txtChangeCusAuditStat">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Close TUV Audit -->

            <!-- Modal ChangeCusAuditStat Customer Audit -->
            <div class="modal fade text-xs-left" id="modalChangeCusAuditStat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formChangeAuditCusStat">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="h4ChangeAuditCusStatTitle"><i class=""></i> Change Audit Stat Cus Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p id="pChangeAuditCusStatBody">Are you sure to change audit stat this selected Cus Audit?</p>
                            <input type="hidden" name="customer_audit_id" id="txtChangeAuditCusStatAuditId">
                            <input type="hidden" name="customer_audit_stat" id="txtChangeAuditCusStatAuditStat">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal ChangeSuppAuditStat Customer Audit -->

            <!-- Modal ChangeCusAuditStat Customer Audit -->
            <div class="modal fade text-xs-left" id="modalChangeCusCustomerAuditStat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formChangeAuditCusCustomerStat">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="h4ChangeAuditCusCustomerStatTitle"><i class=""></i> Change Audit Stat Cus Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p id="pChangeAuditCusCustomerStatBody">Are you sure to change audit stat this selected Cus Audit?</p>
                            <input type="hidden" name="customer_audit_id" id="txtChangeAuditCusCustomerStatAuditId">
                            <input type="hidden" name="customer_audit_stat" id="txtChangeAuditCusCustomerStatAuditStat">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal ChangeSuppAuditStat Supplier Audit -->

            <!-- ------------------------ INTERNAL AUDIT -------------- -->
            <!-- Modal Edit Internal Audit -->
            <div class="modal fade text-xs-left" id="modalEditIntAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
                                            <input type="date" id="dateEditIntAuditActDateSub" class="form-control" name="actual_date_of_submission">
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
                                            <label for="projectinput1">Classification / Rank</label>
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
                                            <label for="projectinput1">NC Control No.</label>
                                            <input type="text" class="form-control" id="txtEditIntAuditNCCtrlNo" name="nc_control_no" placeholder="NC Control No." disabled>
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

                                <div class="row">
                                    <div class="col-md-8">
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
                                </div>

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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Improvement Plan</label>
                                            <!-- <input type="text" id="txtEditIntAuditImpPlan" class="form-control" placeholder="Improvement Plan" name="improvement_plan"> -->
                                            <textarea class="form-control" cols="10" rows="6" id="txtEditIntAuditImpPlan" name="improvement_plan" placeholder="Improvement Plan"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Person In Charge</label>
                                            <select class="form-control select2 selectUser" id="selEditIntAuditPerInCharge" name="person_in_charge[]" multiple="multiple" style="width: 100%;">
                                                <!-- code generated -->
                                            </select>
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
                                            <label for="projectinput1">Close-Out Audit</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgEditIntAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <input type="file" class="form-control" id="fileEditIntAuditCorrAct" name="img_corrective_action" accept=".jpg, .jpeg, .png">
                                            <input type="hidden" name="current_img_corrective_action" id="txtEditIntAuditCurrCorrAct">
                                            <textarea class="form-control" cols="10" rows="4" id="txtEditIntAuditCorrAct" name="corrective_action" placeholder="Close-Out Audit"></textarea>
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
            <div class="modal fade text-xs-left" id="modalSendIntBatchEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
                            <table class="table table-bordered table-hover" id="tblSendIntBatchEmail">
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
                                <center><label for="projectinput1"><b>FOR QAD ADMIN</b></label></center>
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
                                            <strong><label for="projectinput1">Category Of Findings</label></strong> <br>
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
                                            <strong><label for="projectinput1">Responsible Department</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditResDept">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Statement of Finding(s)</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditStmtOfFin">--</label>
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
                                            <label for="projectinput2" id="lblViewIntAuditIllu">--</label>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <center><label for="projectinput1"><b>FOR OTHER SECTION</b></label></center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Root Cause</label></strong> <br>
                                            <label for="projectinput2" id="lblViewIntAuditRootCause">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Improvement Plan</label></strong> <br>
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

                                <hr>
                                <center><label for="projectinput1"><b>FOR QAD ADMIN</b></label></center>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Close-Out Audit</label></strong> <br>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgViewIntAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <label for="projectinput2" id="lblViewIntAuditCorrAct">--</label>
                                        </div>
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

            <!-- ------------------------ SUPPLIER AUDIT -------------- -->
            <!-- Modal Add Supplier Audit -->
            <div class="modal fade text-xs-left" id="modalAddSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formAddSuppAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3">Add Supplier Audit</h4>
                      </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <center><label for="projectinput1"><b>FOR QAD ADMIN</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Type</label>
                                            <select class="form-control" id="selAddSuppAuditType" name="audit_type">
                                                <option value="0" disabled selected>--Select Audit Type--</option>
                                                <option value="System">System</option>
                                                <option value="Process">Process</option>
                                                <option value="Product">Product</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Report Control No.</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="txtAddSuppAuditRepContNo" class="form-control" placeholder="Audit Report Control No." name="audit_report_control_no"> 
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-success" id="btnSearchARCNTooAddSupp"><i class="icon-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Business Process / Section / Supplier Name</label>
                                            <input type="text" id="txtAddSuppAuditBusProcSecSupp" class="form-control" placeholder="Business Process / Section / Supplier Name" name="business_process">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput2">Audit Date</label>
                                            <input type="date" id="dateAddSuppAuditDateFrom" class="form-control" name="audit_date_from">
                                            <input type="date" id="dateAddSuppAuditDateTo" class="form-control" name="audit_date_to">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Auditors</label>
                                            <input type="text" id="txtAddSuppAuditAuditors" class="form-control" placeholder="Auditors" name="auditors">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Auditees</label>
                                            <input type="text" id="txtAddSuppAuditAuditees" class="form-control" placeholder="Auditees" name="auditees">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Findings Issued Date</label>
                                            <input type="date" id="dateAddSuppAuditFindIssDate" class="form-control" placeholder="Audit Findings Issued Date" name="audit_findings_issued_date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="projectinput1">Deadline of Submission</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="number" id="txtAddSuppAuditDeadSubDays" class="form-control" name="deadline_of_submission_days" value="0" min="0">
                                            </div>
                                            <div class="col-md-8">
                                                <input type="date" id="dateAddSuppAuditDeadSub" class="form-control" name="deadline_of_submission" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Actual Date of Submission</label>
                                            <input type="date" id="dateAddSuppAuditActDateSub" class="form-control" name="actual_date_of_submission">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">QMS Criteria</label>
                                            <input type="text" class="form-control" id="txtAddSuppAuditIsoAitfClause" name="iso_iatf_clause" placeholder="QMS Criteria">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Category Of Findings</label>
                                            <select class="form-control" id="selAddSuppAuditCatOfFind" name="category_of_findings">
                                                <option disabled selected value="0">--Select Category Of Findings--</option>
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
                                            <label for="projectinput1">Classification / Rank</label>
                                            <select class="form-control" id="selAddSuppAuditClassRank" name="classification">
                                                <option disabled selected value="0">--Select Classification--</option>
                                                <option value="NC">NC</option>
                                                <option value="OFI">OFI</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Responsible Department</label>
                                            <select class="form-control select2" id="selAddSuppAuditResDept" name="responsible_department[]" style="width: 100%;" multiple="multiple">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Audit Status</label>
                                            <select class="form-control" id="selAddSuppAuditStat" name="audit_stat">
                                                <option value="1">For Improvement Plan</option>
                                                <option value="2">For Close-Out Audit</option>
                                                <option value="3">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1">Statement of Finding(s)</label>
                                            <textarea class="form-control" cols="10" rows="10" id="txtAddSuppAuditStmtOfFin" name="statement_of_findings" placeholder="Statement of Finding(s)"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Illustration / Photo</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgAddSuppAuditIllu" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <input type="file" class="form-control" id="fileAddSuppAuditIllu" name="img_illustration" accept=".jpg, .jpeg, .png">
                                            <textarea class="form-control" cols="10" rows="4" id="txtAddSuppAuditIllu" name="illustration" placeholder="Illustration / Photo"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <br><br>
                                            <input type="checkbox" id="chkAddSuppAuditReqForApproval" class="" name="request_approval" checked="checked">
                                            <label for="projectinput1">Request for Approval</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <br><br>
                                            <input type="checkbox" id="chkAddSuppAuditSendEmail" class="" name="send_email" disabled="disabled">
                                            <label for="projectinput1">Send Email</label>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <center><label for="projectinput1"><b>FOR OTHER SECTION</b></label></center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Root Cause</label>
                                            <!-- <input type="text" id="txtAddSuppAuditRootCause" class="form-control" placeholder="Root Cause" name="root_cause"> -->
                                            <textarea class="form-control" cols="10" rows="4" id="txtAddSuppAuditRootCause" name="root_cause" placeholder="Root Cause"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Improvement Plan</label>
                                            <!-- <input type="text" id="txtAddSuppAuditImpPlan" class="form-control" placeholder="Improvement Plan" name="improvement_plan"> -->
                                            <textarea class="form-control" cols="10" rows="6" id="txtAddSuppAuditImpPlan" name="improvement_plan" placeholder="Improvement Plan"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Person In Charge</label>
                                            <!-- <input type="text" id="txtAddSuppAuditPerInCharge" class="form-control" placeholder="Person In Charge" name="person_in_charge"> -->
                                            <select class="form-control select2 selectUser" id="selAddSuppAuditPerInCharge" name="person_in_charge[]" style="width: 100%;" multiple="multiple">
                                                  <!-- code generated -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Commitment Date</label>
                                            <input type="date" id="txtAddSuppAuditCommDate" class="form-control" name="commitment_date">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <center><label for="projectinput1"><b>FOR QAD ADMIN</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Close-Out Audit</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgAddSuppAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <input type="file" class="form-control" id="fileAddSuppAuditCorrAct" name="img_corrective_action" accept=".jpg, .jpeg, .png">
                                            <textarea class="form-control" cols="10" rows="4" id="txtAddSuppAuditCorrAct" name="corrective_action" placeholder="Close-Out Audit"></textarea>
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
            <!-- ../ Modal Add Supplier Audit -->

            <!-- Modal View Supp Batch Email Audit -->
            <div class="modal fade text-xs-left" id="modalSendSuppBatchEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Supplier Batch Email</h4>
                  </div>
                  <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tblSendSuppBatchEmail">
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
                    <button type="button" class="btn btn-outline-primary" id="btnSendSuppBatchEmail">Send</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ../ Modal View Supp Batch Email Audit -->

            <!-- Modal Edit Supplier Audit -->
            <div class="modal fade text-xs-left" id="modalEditSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
                                            </select>
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
                                            <label for="projectinput1">Business Process / Section / Supplier Name</label>
                                            <input type="text" id="txtEditSuppAuditBusProcSecSupp" class="form-control" placeholder="Business Process / Section / Supplier Name" name="business_process">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput2">Audit Date</label>
                                            <input type="date" id="dateEditSuppAuditDateFrom" class="form-control" name="audit_date_from">
                                            <input type="date" id="dateEditSuppAuditDateTo" class="form-control" name="audit_date_to">
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
                                            <label for="projectinput1">Audit Findings Issued Date</label>
                                            <input type="date" id="dateEditSuppAuditFindIssDate" class="form-control" placeholder="Audit Findings Issued Date" name="audit_findings_issued_date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="projectinput1">Deadline of Submission</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="number" id="txtEditSuppAuditDeadSubDays" class="form-control" name="deadline_of_submission_days" value="0" min="0">
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
                                            <label for="projectinput1">QMS Criteria</label>
                                            <input type="text" class="form-control" id="txtEditSuppAuditIsoAitfClause" name="iso_iatf_clause" placeholder="QMS Criteria">
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
                                            <label for="projectinput1">Classification / Rank</label>
                                            <select class="form-control" id="selEditSuppAuditClassRank" name="classification">
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
                                            <label for="projectinput1">Responsible Department</label>
                                            <select class="form-control select2" id="selEditSuppAuditResDept" name="responsible_department[]" style="width: 100%;" multiple="multiple">
                                                <!-- code generated -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
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
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Root Cause</label>
                                            <!-- <input type="text" id="txtEditSuppAuditRootCause" class="form-control" placeholder="Root Cause" name="root_cause"> -->
                                            <textarea class="form-control" cols="10" rows="4" id="txtEditSuppAuditRootCause" name="root_cause" placeholder="Root Cause"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">Improvement Plan</label>
                                            <!-- <input type="text" id="txtEditSuppAuditImpPlan" class="form-control" placeholder="Improvement Plan" name="improvement_plan"> -->
                                            <textarea class="form-control" cols="10" rows="6" id="txtEditSuppAuditImpPlan" name="improvement_plan" placeholder="Improvement Plan"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Commitment Date</label>
                                            <input type="date" id="txtEditSuppAuditCommDate" class="form-control" name="commitment_date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Person In Charge</label>
                                            <!-- <input type="text" id="selEditSuppAuditPerInCharge" class="form-control" placeholder="Person In Charge" name="person_in_charge"> -->
                                            <select class="form-control select2 selectUser" id="selEditSuppAuditPerInCharge" name="person_in_charge[]" style="width: 100%;" multiple="multiple">
                                                  <!-- code generated -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">Close-Out Audit</label>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgEditSuppAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <input type="file" class="form-control" id="fileEditSuppAuditCorrAct" name="img_corrective_action" accept=".jpg, .jpeg, .png">
                                            <input type="hidden" name="current_img_corrective_action" id="txtEditSuppAuditCurrCorrAct">
                                            <textarea class="form-control" cols="10" rows="4" id="txtEditSuppAuditCorrAct" name="corrective_action" placeholder="Close-Out Audit"></textarea>
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

            <!-- Modal Close Supplier Audit -->
            <div class="modal fade text-xs-left" id="modalCloseSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formCloseSuppAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Close Supplier Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p>Are you sure to close this selected Supplier Audit?</p>
                            <input type="hidden" name="supplier_audit_id" id="txtCloseSuppAuditId">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Close Supplier Audit -->

            <!-- Modal Open Supplier Audit -->
            <div class="modal fade text-xs-left" id="modalOpenSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formOpenSuppAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Open Supplier Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p>Are you sure to open this selected Supplier Audit?</p>
                            <input type="hidden" name="supplier_audit_id" id="txtOpenSuppAuditId">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Close Supplier Audit -->

            <!-- Modal Done Supplier Audit -->
            <div class="modal fade text-xs-left" id="modalDoneSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formDoneSuppAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Done Supplier Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p>Are you sure to done this selected Supplier Audit?</p>
                            <input type="hidden" name="supplier_audit_id" id="txtDoneSuppAuditId">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Close Supplier Audit -->

            <!-- Modal Done Supplier Audit -->
            <div class="modal fade text-xs-left" id="modalPendSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form class="form" method="post" id="formPendSuppAudit">
                        @csrf
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class=""></i> Pend Supplier Audit</h4>
                      </div>
                      <div class="modal-body">
                            <p>Are you sure to pend this selected Supplier Audit?</p>
                            <input type="hidden" name="supplier_audit_id" id="txtPendSuppAuditId">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- ../ Modal Close Supplier Audit -->

            <!-- Modal View Supplier Audit -->
            <div class="modal fade text-xs-left" id="modalViewSuppAudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
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
                                <center><label for="projectinput1"><b>FOR QAD ADMIN</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Audit Type</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditType">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Audit Report Control No.</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditRepConNo">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Business Process / Section / Supplier Name</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditBusProcSecSupp">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Audit Date</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditDate">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Auditors</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditAuditors">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Auditees</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditAuditees">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Audit Findings Issued Date</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditFindIssDate">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Deadline of Submission</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditDeadSub">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Actual Date of Submission</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditActDateSub">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">QMS Criteria</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditIsoAitfClause">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Classification / Rank</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditClassRank">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Category Of Findings</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditCatOfFin">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Responsible Department</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditResDept">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Statement of Finding(s)</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditStmtOfFin">--</label>
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
                                            <label for="projectinput2" id="lblViewSuppAuditIllu">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Root Cause</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditRootCause">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Improvement Plan</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditImpPlan">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Person In Charge</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditPerInCharge">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Commitment Date</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditCommDate">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Close-Out Audit</label></strong> <br>
                                            <div style="height: 80px;">
                                                <center>
                                                    <img class="commonAuditImg" id="imgViewSuppAuditCorrAct" src="{{ asset('public/storage/image-icon.png') }}" style="max-height: 75px; max-width: 250px;">
                                                </center>
                                            </div>
                                            <label for="projectinput2" id="lblViewSuppAuditCorrAct">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Sending Status</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditSendingStat">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Audit Status</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditStat">--</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Created By</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditCreatedBy">--</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong><label for="projectinput1">Last Updated By</label></strong> <br>
                                            <label for="projectinput2" id="lblViewSuppAuditLastUpdatedBy">--</label>
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

    <!-- Modal ChangeSuppAuditStat Supplier Audit -->
    <div class="modal fade text-xs-left" id="modalChangeSuppAuditStat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formChangeAuditSuppStat">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="h4ChangeAuditSuppStatTitle"><i class=""></i> Change Audit Stat Supp Audit</h4>
              </div>
              <div class="modal-body">
                    <p id="pChangeAuditSuppStatBody">Are you sure to change audit stat this selected Supp Audit?</p>
                    <input type="hidden" name="supplier_audit_id" id="txtChangeAuditSuppStatAuditId">
                    <input type="hidden" name="supplier_audit_stat" id="txtChangeAuditSuppStatAuditStat">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <!-- ../ Modal ChangeSuppAuditStat Supplier Audit -->

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

          $(document).on('click','#tblTUVAuditResults tbody tr',function(e){
            $(this).closest('tbody').find('tr').removeClass('table-active');
            $(this).closest('tr').addClass('table-active');
          });

          $(document).on('click','#tblCusAuditResults tbody tr',function(e){
            $(this).closest('tbody').find('tr').removeClass('table-active');
            $(this).closest('tr').addClass('table-active');
          });

          $(document).on('click','#tblInternalAuditResults tbody tr',function(e){
            $(this).closest('tbody').find('tr').removeClass('table-active');
            $(this).closest('tr').addClass('table-active');
          });

          // $(document).on('dblclick','#tblInternalAuditResults tbody tr',function(e){
          //   let dblSelectedIntAudit = $(this).closest('tbody tr.table-active').find('.chkSendIntAudit').attr('internal-id');
          //   alert(dblSelectedIntAudit);
          // });

          $(document).on('click','#tblSupplierAuditResults tbody tr',function(e){
            $(this).closest('tbody').find('tr').removeClass('table-active');
            $(this).closest('tr').addClass('table-active');
          });

          $(document).on('click','#tblSendTUVBatchEmail tbody tr',function(e){
            $(this).closest('tbody').find('tr').removeClass('table-active');
            $(this).closest('tr').addClass('table-active');
          });

          $(document).on('click','#tblSendCusBatchEmail tbody tr',function(e){
            $(this).closest('tbody').find('tr').removeClass('table-active');
            $(this).closest('tr').addClass('table-active');
          });

          $(document).on('click','#tblSendIntBatchEmail tbody tr',function(e){
            $(this).closest('tbody').find('tr').removeClass('table-active');
            $(this).closest('tr').addClass('table-active');
          });

          $(document).on('click','#tblSendSuppBatchEmail tbody tr',function(e){
            $(this).closest('tbody').find('tr').removeClass('table-active');
            $(this).closest('tr').addClass('table-active');
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

        let dataTableTUVBatchAudits;
        let arrTUVSendEmail = [];

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
                  url: "view_tuv_audit_by_stat",
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
                  { "data" : "check_box_send", orderable:false, searchable:false },
                  { "data" : "tuv_audit_id" },
                  { "data" : "formatted_audit_date" },
                  { "data" : "audit_category" },
                  { "data" : "auditors" },
                  { "data" : "label1" },
                  // { "data" : "audit_stat" },
                  { "data" : "label2" },
                  { "data" : "approval_stat" },
                  { "data" : "action1", orderable:false, searchable:false }
              ],
              "order": [[ 1, "desc" ]],
              "columnDefs": [
                { "width": "10px", "targets": 0 },
                { "width": "10px", "targets": 1 },
                { "width": "300px", "targets": 4 },
                { "width": "120px", "targets": 5 },
                { "width": "10px", "targets": 8 },
              ],
              "initComplete": function(settings, json) {
                    $(".chkSendTUVAudit").each(function(index){
                        if(arrTUVSendEmail.includes($(this).attr('tuv-id'))){
                            $(this).attr('checked', 'checked');
                        }
                    });
              },
              "drawCallback": function( settings ) {
                    $(".chkSendTUVAudit").each(function(index){
                        if(arrTUVSendEmail.includes($(this).attr('tuv-id'))){
                            $(this).attr('checked', 'checked');
                        }
                    });
                }
          });//end of dataTableTUVAudits

          dataTableTUVBatchAudits = $("#tblSendTUVBatchEmail").on( 'error.dt', function ( e, settings, techNote, message ) {
            Swal({
                  position: 'top-end',
                  type: 'error',
                  title: 'TUV Batch DataTable Failed!',
                  showConfirmButton: false,
                  timer: 1500,
                  customClass: 'swal-wide',
              });
          }).DataTable({
              "processing" : false,
              "serverSide" : true,
              "ajax" : {
                  url: "view_batch_tuv_audit_by_stat",
                  "data": function (param){
                      param.tuv_audit_id = arrTUVSendEmail;
                  }
              },            
              "columns":[
                  { "data" : "formatted_audit_date" },
                  { "data" : "audit_category" },
                  { "data" : "auditors" },
                  { "data" : "label1" },
                  { "data" : "label2" },
                  { "data" : "action1", orderable:false, searchable:false }
              ],
          });//end of dataTableTUVBatchAudits

          // GetDepartmentByStat(1, $("#selGenTuvRepResDept"));

          $("#lblTUVNoOfSendTUVBatch").text(arrTUVSendEmail.length);
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

            $("#chkGenTuvRepAuditStat").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenTuvRepAuditStat").removeAttr('disabled');
                }
                else{
                    $("#selGenTuvRepAuditStat").prop('disabled', 'disabled');
                    $("#selGenTuvRepAuditStat").val('1');
                }
            });

          // $.fn.dataTable.ext.errMode = function() {
          //     return Swal({
          //               position: 'top-end',
          //               type: 'error',
          //               title: 'DataTable Loading Failed!',
          //               showConfirmButton: false,
          //               timer: 1500,
          //               customClass: 'swal-wide',
          //           });
          // };

            LoadDepartmentByStatInArray(1, [$("#selEditTUVAuditResDept"), $("#selEditCusAuditResDept"), $("#selEditIntAuditResDept"), $("#selEditSuppAuditResDept")]);
            // $("#fileAddCusIlluPhoto").change(function(){
            //     if($(this).val() != ""){
            //         readURL(this);
            //         // alert(Math.round(this.files[0].size / 1024) + " KB");
            //     }
            //     else{
            //         $('#imgAddCusIlluImage').attr('src', "{{ asset('public/storage/image-icon.png') }}");
            //     }
            // });

            $("#fileAddTUVAuditCorrAct").change(function(){
                if($(this).val() != ""){
                    readAddTUVAuditCorrActURL(this);
                }
                else{
                    $('#imgAddTUVAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                }
            });

            $("#chkAddTUVAuditReqForApproval").click(function(){
                if($(this).prop('checked')) {
                    $("#chkAddTUVAuditSendEmail").prop('disabled', 'disabled');
                }
                else{
                    $("#chkAddTUVAuditSendEmail").removeAttr('disabled');
                    $("#chkAddTUVAuditSendEmail").removeAttr('checked');
                }
            });

            $("#fileEditTUVAuditCorrAct").change(function(){
                if($(this).val() != ""){
                    readEditTUVAuditCorrActURL(this);
                }
                else{
                    if($("#txtEditTUVAuditCurrCorrAct").val() != ""){
                        var imglink = "{{ asset('public/storage/audit_result_images/tuv/img') }}";
                        imglink = imglink.replace("img", $("#txtEditTUVAuditCurrCorrAct").val());

                        $('#imgEditTUVAuditCorrAct').attr('src', imglink);
                    }
                    else{
                        $('#imgEditTUVAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");   
                    }
                }
            });

            $("#btnShowAddTUVAuditModal").click(function(){
                GetDepartmentByStat(1, $("#selAddTUVAuditResDept"));
            });

            // $("#txtAddTUVAuditDeadSub").on({
            //     change: function(){
            //         if($(this).val() != ""){
            //             Date.prototype.addDays = function(days) {
            //                 let date = new Date();
            //                 date.setDate(parseInt(days) + date.getDate());
            //                 return date;
            //             }

            //             let date = new Date();

            //             let computedDate = date.addDays($("#txtAddTUVAuditDeadSub").val());

            //             let day = computedDate.getDate();
            //             let month = computedDate.getMonth();
            //             let year = computedDate.getFullYear();

            //             if(day < 10){
            //                 day = "0" + day;
            //             }
            //             if((month + 1) < 10){
            //                 month = "0" + (month + 1);
            //             }

            //             $("#dateAddTUVAuditDeadSub").val(year + "-" + month + "-" + day);
            //         }
            //         else{
            //             $("#dateAddTUVAuditDeadSub").val("");
            //         }
            //     },
            //     keyup: function(){
            //         if($(this).val() != ""){
            //             Date.prototype.addDays = function(days) {
            //                 let date = new Date();
            //                 date.setDate(parseInt(days) + date.getDate());
            //                 return date;
            //             }

            //             let date = new Date();

            //             let computedDate = date.addDays($("#txtAddTUVAuditDeadSub").val());

            //             let day = computedDate.getDate();
            //             let month = computedDate.getMonth();
            //             let year = computedDate.getFullYear();

            //             if(day < 10){
            //                 day = "0" + day;
            //             }
            //             if((month + 1) < 10){
            //                 month = "0" + (month + 1);
            //             }

            //             $("#dateAddTUVAuditDeadSub").val(year + "-" + month + "-" + day);
            //         }
            //         else{
            //             $("#dateAddTUVAuditDeadSub").val("");
            //         }
            //     }
            // });

            // $("#txtEditTUVAuditDeadSubDays").on({
            //     change: function(){
            //         if($(this).val() != ""){
            //             Date.prototype.addDays = function(days) {
            //                 let date = new Date();
            //                 date.setDate(parseInt(days) + date.getDate());
            //                 return date;
            //             }

            //             let date = new Date($("#dateEditTUVAuditCreatedAt").val());

            //             let computedDate = date.addDays($("#txtEditTUVAuditDeadSubDays").val());

            //             let day = computedDate.getDate();
            //             let month = computedDate.getMonth();
            //             let year = computedDate.getFullYear();

            //             if(day < 10){
            //                 day = "0" + day;
            //             }
            //             if((month + 1) < 10){
            //                 month = "0" + (month + 1);
            //             }

            //             $("#dateEditTUVAuditDeadSub").val(year + "-" + month + "-" + day);
            //         }
            //         else{
            //             $("#dateEditTUVAuditDeadSub").val($("#dateEditTUVAuditCurrDeadSub").val());
            //         }
            //     },
            //     keyup: function(){
            //         if($(this).val() != ""){
            //             Date.prototype.addDays = function(days) {
            //                 let date = new Date();
            //                 date.setDate(parseInt(days) + date.getDate());
            //                 return date;
            //             }

            //             let date = new Date($("#dateEditTUVAuditCreatedAt").val());

            //             let computedDate = date.addDays($("#txtEditTUVAuditDeadSubDays").val());

            //             let day = computedDate.getDate();
            //             let month = computedDate.getMonth();
            //             let year = computedDate.getFullYear();

            //             if(day < 10){
            //                 day = "0" + day;
            //             }
            //             if((month + 1) < 10){
            //                 month = "0" + (month + 1);
            //             }

            //             $("#dateEditTUVAuditDeadSub").val(year + "-" + month + "-" + day);
            //         }
            //         else{
            //             $("#dateEditTUVAuditDeadSub").val($("#dateEditTUVAuditCurrDeadSub").val());
            //         }
            //     }
            // });

            $(document).on('click', '.aViewTUVAudit', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                GetTUVAuditByIdToView(tuvAuditId);
            });

            $(document).on('click', '.aCloseTUVAudit', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                $("#txtCloseTUVAuditId").val(tuvAuditId);
            });

            $(document).on('click', '.aOpenTUVAudit', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                $("#txtOpenTUVAuditId").val(tuvAuditId);
            });

            $(document).on('click', '.aDoneTUVAudit', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                $("#txtDoneTUVAuditId").val(tuvAuditId);
            });

            $(document).on('click', '.aPendTUVAudit', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                $("#txtPendTUVAuditId").val(tuvAuditId);
            });

            $(document).on('click', '.aEditTUV', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                $("#txtEditTUVAuditId").val(tuvAuditId);
                GetTUVAuditByIdToEdit(tuvAuditId);
            });

            $(document).on('click', '.aChangeTUVAuditStat', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                let tuvAuditStat = $(this).attr('tuv-audit-stat');
                $("#txtChangeAuditTUVStatAuditId").val(tuvAuditId);
                $("#txtChangeAuditTUVStatAuditStat").val(tuvAuditStat);

                if(tuvAuditStat == 2) {
                    $("#h4ChangeAuditTUVStatTitle").text('Archive TUV Audit');
                    $("#pChangeAuditTUVStatBody").text('Are you sure to archive tuv audit?');                    
                }
                else {
                    $("#h4ChangeAuditTUVStatTitle").text('Restore TUV Audit');
                    $("#pChangeAuditTUVStatBody").text('Are you sure to restore tuv audit?');
                }
            });

            $(document).on('click', '.chkSendTUVAudit', function(){
                let tuvAuditId = $(this).attr('tuv-id');

                if($(this).prop('checked')){
                    // Checked
                    if(!arrTUVSendEmail.includes(tuvAuditId)){
                        arrTUVSendEmail.push(tuvAuditId);
                    }
                }
                else{  
                    // Unchecked
                    let index = arrTUVSendEmail.indexOf(tuvAuditId);
                    arrTUVSendEmail.splice(index, 1);
                }
                $("#lblTUVNoOfSendTUVBatch").text(arrTUVSendEmail.length);
                if(arrTUVSendEmail.length <= 0){
                    $("#btnShowModalSendTUVBatchEmail").prop('disabled', 'disabled');
                    $("#btnSendTUVBatchEmail").prop('disabled', 'disabled');

                }
                else{
                    $("#btnShowModalSendTUVBatchEmail").removeAttr('disabled');
                    $("#btnSendTUVBatchEmail").removeAttr('disabled');

                }
            });

            $(document).on('click', '.aRemoveTUVInBatch', function(){
                let tuvAuditId = $(this).attr('tuv-id');
                let index = arrTUVSendEmail.indexOf(tuvAuditId);
                arrTUVSendEmail.splice(index, 1);
                $("#lblTUVNoOfSendTUVBatch").text(arrTUVSendEmail.length);
                if(arrTUVSendEmail.length <= 0){
                    $("#btnShowModalSendTUVBatchEmail").prop('disabled', 'disabled');
                    $("#btnSendTUVBatchEmail").prop('disabled', 'disabled');
                    $("#modalSendTUVBatchEmail").modal('hide');
                }
                else{
                    $("#btnShowModalSendTUVBatchEmail").removeAttr('disabled');
                    $("#btnSendTUVBatchEmail").removeAttr('disabled');
                }

                dataTableTUVAudits.draw();
                dataTableTUVBatchAudits.draw();
            });

            $("#btnShowModalSendTUVBatchEmail").click(function(){
                dataTableTUVBatchAudits.draw();
            });

            $("#btnSendTUVBatchEmail").click(function(){
                // arrTUVSendEmail = SendTUVBatchMail("{{ csrf_token() }}" , arrTUVSendEmail);
                $.ajax({
                    url: 'send_tuv_batch',
                    method: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        tuv_audit_id: arrTUVSendEmail,
                        user_access: globalUserAccessLevelId
                    },
                    dataType: 'json',
                    beforeSend: function(){
                        
                    },
                    success: function(JsonObject){
                        if(JsonObject['result'] == 1){
                            arrTUVSendEmail = [];
                            dataTableTUVAudits.draw();
                            dataTableTUVBatchAudits.draw();
                            $("#btnShowModalSendTUVBatchEmail").prop('disabled', 'disabled');
                            $("#btnSendTUVBatchEmail").prop('disabled', 'disabled');
                            $("#modalSendTUVBatchEmail").modal('hide');
                            $("#lblTUVNoOfSendTUVBatch").text(arrTUVSendEmail.length);
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

            $(".select2").select2();
            GetCboUsersByStat(1, $(".selectUser"));

            $("#formChangeAuditTUVStat").submit(function(event) {
                event.preventDefault();
                ChangeAuditTUVStat();
            });

            $("#formAddTUVAudit").submit(function(event){
                event.preventDefault();
                $.ajax({
                    url: 'add_tuv_audit',
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
                        if(JsonObject['result'] == 1){
                            $("#modalAddTUVAudit").modal('hide');
                            $("#formAddTUVAudit")[0].reset();
                            $('#imgAddTUVAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            $("#imgAddCusAuditIllu").attr('src', "{{ asset('public/storage/image-icon.png') }}");

                            dataTableTUVAudits.draw();

                            $("#selAddTUVAuditResDept").select2('val', $("#selAddTUVAuditResDept option:eq(0)").val());

                            $("#dateAddTUVAuditDateFrom").removeClass('border-danger');
                            $("#dateAddTUVAuditDateFrom").removeAttr('title');
                            $("#dateAddTUVAuditDeadSub").removeClass('border-danger');
                            $("#dateAddTUVAuditDeadSub").removeAttr('title');
                            $("#dateAddTUVAuditActDateSub").removeClass('border-danger');
                            $("#dateAddTUVAuditActDateSub").removeAttr('title');
                            $("#txtAddTUVAuditDeadSub").removeClass('border-danger');
                            $("#txtAddTUVAuditDeadSub").removeAttr('title');
                            $("#txtAddTUVAuditAuditors").removeClass('border-danger');
                            $("#txtAddTUVAuditAuditors").removeAttr('title');
                            $("#txtAddTUVAuditStanClause").removeClass('border-danger');
                            $("#txtAddTUVAuditStanClause").removeAttr('title');
                            $("#txtAddTUVAuditStmtOfNC").removeClass('border-danger');
                            $("#txtAddTUVAuditStmtOfNC").removeAttr('title');
                            $("#selAddTUVAuditResDept").removeClass('border-danger');
                            $("#selAddTUVAuditResDept").removeAttr('title');
                            $("#txtAddTUVAuditObjEvi").removeClass('border-danger');
                            $("#txtAddTUVAuditObjEvi").removeAttr('title');
                            $("#txtAddTUVAuditCorrAct").removeClass('border-danger');
                            $("#txtAddTUVAuditCorrAct").removeAttr('title');
                            $("#fileAddTUVAuditCorrAct").removeClass('border-danger');
                            $("#fileAddTUVAuditCorrAct").removeAttr('title');
                            $("#selAddTUVAuditCorrPerInCharge").val('0').trigger('change');
                            $("#selAddTUVAuditConPerInCharge").val('0').trigger('change');
                            $("#selAddTUVAuditSysPerInCharge").val('0').trigger('change');
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

                        if(JsonObject['error']['audit_date_from'] != undefined){
                            $("#dateAddTUVAuditDateFrom").addClass('border-danger');
                            $("#dateAddTUVAuditDateFrom").attr('title', JsonObject['error']['audit_date_from']);
                        }
                        else{
                            $("#dateAddTUVAuditDateFrom").removeClass('border-danger');
                            $("#dateAddTUVAuditDateFrom").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_date_to'] != undefined){
                            $("#dateAddTUVAuditDateTo").addClass('border-danger');
                            $("#dateAddTUVAuditDateTo").attr('title', JsonObject['error']['audit_date_to']);
                        }
                        else{
                            $("#dateAddTUVAuditDateTo").removeClass('border-danger');
                            $("#dateAddTUVAuditDateTo").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_for_submission'] != undefined){
                            $("#dateAddTUVAuditDeadSub").addClass('border-danger');
                            $("#dateAddTUVAuditDeadSub").attr('title', JsonObject['error']['deadline_for_submission']);
                        }
                        else{
                            $("#dateAddTUVAuditDeadSub").removeClass('border-danger');
                            $("#dateAddTUVAuditDeadSub").removeAttr('title');
                        }

                        if(JsonObject['error']['actual_date_of_submission'] != undefined){
                            $("#dateAddTUVAuditActDateSub").addClass('border-danger');
                            $("#dateAddTUVAuditActDateSub").attr('title', JsonObject['error']['actual_date_of_submission']);
                        }
                        else{
                            $("#dateAddTUVAuditActDateSub").removeClass('border-danger');
                            $("#dateAddTUVAuditActDateSub").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_for_submission_days'] != undefined){
                            $("#txtAddTUVAuditDeadSub").addClass('border-danger');
                            $("#txtAddTUVAuditDeadSub").attr('title', JsonObject['error']['deadline_for_submission_days']);
                        }
                        else{
                            $("#txtAddTUVAuditDeadSub").removeClass('border-danger');
                            $("#txtAddTUVAuditDeadSub").removeAttr('title');
                        }

                        if(JsonObject['error']['auditors'] != undefined){
                            $("#txtAddTUVAuditAuditors").addClass('border-danger');
                            $("#txtAddTUVAuditAuditors").attr('title', JsonObject['error']['auditors']);
                        }
                        else{
                            $("#txtAddTUVAuditAuditors").removeClass('border-danger');
                            $("#txtAddTUVAuditAuditors").removeAttr('title');
                        }

                        if(JsonObject['error']['standard_clause'] != undefined){
                            $("#txtAddTUVAuditStanClause").addClass('border-danger');
                            $("#txtAddTUVAuditStanClause").attr('title', JsonObject['error']['standard_clause']);
                        }
                        else{
                            $("#txtAddTUVAuditStanClause").removeClass('border-danger');
                            $("#txtAddTUVAuditStanClause").removeAttr('title');
                        }

                        if(JsonObject['error']['statement_of_nc'] != undefined){
                            $("#txtAddTUVAuditStmtOfNC").addClass('border-danger');
                            $("#txtAddTUVAuditStmtOfNC").attr('title', JsonObject['error']['statement_of_nc']);
                        }
                        else{
                            $("#txtAddTUVAuditStmtOfNC").removeClass('border-danger');
                            $("#txtAddTUVAuditStmtOfNC").removeAttr('title');
                        }

                        if(JsonObject['error']['responsible_department'] != undefined){
                            $("#selAddTUVAuditResDept").addClass('border-danger');
                            $("#selAddTUVAuditResDept").attr('title', JsonObject['error']['responsible_department']);
                        }
                        else{
                            $("#selAddTUVAuditResDept").removeClass('border-danger');
                            $("#selAddTUVAuditResDept").removeAttr('title');
                        }

                        if(JsonObject['error']['objective_evidence'] != undefined){
                            $("#txtAddTUVAuditObjEvi").addClass('border-danger');
                            $("#txtAddTUVAuditObjEvi").attr('title', JsonObject['error']['objective_evidence']);
                        }
                        else{
                            $("#txtAddTUVAuditObjEvi").removeClass('border-danger');
                            $("#txtAddTUVAuditObjEvi").removeAttr('title');
                        }

                        if(JsonObject['error']['corrective_action'] != undefined){
                            $("#txtAddTUVAuditCorrAct").addClass('border-danger');
                            $("#txtAddTUVAuditCorrAct").attr('title', JsonObject['error']['corrective_action']);
                        }
                        else{
                            $("#txtAddTUVAuditCorrAct").removeClass('border-danger');
                            $("#txtAddTUVAuditCorrAct").removeAttr('title');
                        }

                        if(JsonObject['error']['img_corrective_action'] != undefined){
                            $("#fileAddTUVAuditCorrAct").addClass('border-danger');
                            $("#fileAddTUVAuditCorrAct").attr('title', JsonObject['error']['img_corrective_action']);
                        }
                        else{
                            $("#fileAddTUVAuditCorrAct").removeClass('border-danger');
                            $("#fileAddTUVAuditCorrAct").removeAttr('title');
                        }
                    },
                    error: function(data, xhr, status){
                        console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                });
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

            $("#formCloseTUVAudit").submit(function(event){
                event.preventDefault();
                CloseTUVAudit();
            });

            $("#formOpenTUVAudit").submit(function(event){
                event.preventDefault();
                OpenTUVAudit();
            });

            $("#formDoneTUVAudit").submit(function(event){
                event.preventDefault();
                DoneTUVAudit();
            });

            $("#formPendTUVAudit").submit(function(event){
                event.preventDefault();
                PendTUVAudit();
            });
        });

        // this function will not allow to save in another file because of image retrieval failure
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
                    $("#lblViewTUVAuditDateFrom").text(JsonObject['tuv_audits'][0]['audit_date_from']);
                    $("#lblViewTUVAuditDateTo").text(JsonObject['tuv_audits'][0]['audit_date_to']);
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

                    if(JsonObject['tuv_audits'][0]['correction'] != null){
                        $("#lblViewTUVAuditCorrection").text(JsonObject['tuv_audits'][0]['correction']);
                    }
                    else{
                        $("#lblViewTUVAuditCorrection").text("---");
                    }
                    if(JsonObject['tuv_audits'][0]['correction_commitment_date'] != null){
                        $("#lblViewTUVAuditCorrCommDate").text(JsonObject['tuv_audits'][0]['correction_commitment_date']);
                    }
                    else{
                        $("#lblViewTUVAuditCorrCommDate").text("---");
                    }
                    if(JsonObject['tuv_audits'][0]['tuv_corr_per_in_charge'] != null){
                        $("#lblViewTUVAuditCorrPerInCharge").text(JsonObject['tuv_audits'][0]['tuv_corr_per_in_charge'].name);
                    }
                    else{
                        $("#lblViewTUVAuditCorrPerInCharge").text("N/A");
                    }

                    if(JsonObject['tuv_audits'][0]['containment'] != null){
                        $("#lblViewTUVAuditContainment").text(JsonObject['tuv_audits'][0]['containment']);
                    }
                    else{
                        $("#lblViewTUVAuditContainment").text("---");
                    }
                    if(JsonObject['tuv_audits'][0]['containment_commitment_date'] != null){
                        $("#lblViewTUVAuditConCommDate").text(JsonObject['tuv_audits'][0]['containment_commitment_date']);
                    }
                    else{
                        $("#lblViewTUVAuditConCommDate").text("---");
                    }
                    if(JsonObject['tuv_audits'][0]['tuv_con_per_in_charge'] != null){
                        $("#lblViewTUVAuditConPerInCharge").text(JsonObject['tuv_audits'][0]['tuv_con_per_in_charge'].name);
                    }
                    else{
                        $("#lblViewTUVAuditConPerInCharge").text("N/A");
                    }

                    if(JsonObject['tuv_audits'][0]['systematic'] != null){
                        $("#lblViewTUVAuditSystematic").text(JsonObject['tuv_audits'][0]['systematic']);
                    }
                    else{
                        $("#lblViewTUVAuditSystematic").text("---");
                    }

                    if(JsonObject['tuv_audits'][0]['systematic_commitment_date'] != null){
                        $("#lblViewTUVAuditSysCommDate").text(JsonObject['tuv_audits'][0]['systematic_commitment_date']);
                    }
                    else{
                        $("#lblViewTUVAuditSysCommDate").text("---");
                    }
                    if(JsonObject['tuv_audits'][0]['tuv_sys_per_in_charge'] != null){
                        $("#lblViewTUVAuditSysPerInCharge").text(JsonObject['tuv_audits'][0]['tuv_sys_per_in_charge'].name);
                    }
                    else{
                        $("#lblViewTUVAuditSysPerInCharge").text("N/A");
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
                        $("#lblViewTUVAuditAuditStat").text('For Closed-Out');
                    }
                    else{
                        $("#lblViewTUVAuditAuditStat").text('Closed');
                    }

                    $("#lblViewTUVAuditCreatedBy").text(JsonObject['tuv_audits'][0]['user_created_by']['name']);
                    $("#lblViewTUVAuditLastUpdatedBy").text(JsonObject['tuv_audits'][0]['user_last_updated_by']['name']);
                    $("#lblViewTUVAuditLastUpdatedAt").text(JsonObject['tuv_audits'][0]['updated_at']);
                    $("#lblViewTUVAuditCreatedAt").text(JsonObject['tuv_audits'][0]['created_at']);

                    if(JsonObject['tuv_audits'][0]['tuv_corr_per_in_charges'].length > 0){
                        let tuvCorrPerInCharges = "";
                        for(let index = 0; index < JsonObject['tuv_audits'][0]['tuv_corr_per_in_charges'].length; index++){
                            tuvCorrPerInCharges += JsonObject['tuv_audits'][0]['tuv_corr_per_in_charges'][index]['tuv_corr_per_in_charge_record']['name'];
                            
                            if(index < JsonObject['tuv_audits'][0]['tuv_corr_per_in_charges'].length - 1){
                                tuvCorrPerInCharges += " / ";
                            }
                        }
                        $("#lblViewTUVAuditCorrPerInCharge").text(tuvCorrPerInCharges);
                    }
                    else{
                        $("#lblViewTUVAuditCorrPerInCharge").text("N/A");
                    }

                    if(JsonObject['tuv_audits'][0]['tuv_con_per_in_charges'].length > 0){
                        let tuvConPerInCharges = "";
                        for(let index = 0; index < JsonObject['tuv_audits'][0]['tuv_con_per_in_charges'].length; index++){
                            tuvConPerInCharges += JsonObject['tuv_audits'][0]['tuv_con_per_in_charges'][index]['tuv_con_per_in_charge_record']['name'];
                            
                            if(index < JsonObject['tuv_audits'][0]['tuv_con_per_in_charges'].length - 1){
                                tuvConPerInCharges += " / ";
                            }
                        }
                        $("#lblViewTUVAuditConPerInCharge").text(tuvConPerInCharges);
                    }
                    else{
                        $("#lblViewTUVAuditConPerInCharge").text("N/A");
                    }

                    if(JsonObject['tuv_audits'][0]['tuv_sys_per_in_charges'].length > 0){
                        let tuvSysPerInCharges = "";
                        for(let index = 0; index < JsonObject['tuv_audits'][0]['tuv_sys_per_in_charges'].length; index++){
                            tuvSysPerInCharges += JsonObject['tuv_audits'][0]['tuv_sys_per_in_charges'][index]['tuv_sys_per_in_charge_record']['name'];
                            
                            if(index < JsonObject['tuv_audits'][0]['tuv_sys_per_in_charges'].length - 1){
                                tuvSysPerInCharges += " / ";
                            }
                        }
                        $("#lblViewTUVAuditSysPerInCharge").text(tuvSysPerInCharges);
                    }
                    else{
                        $("#lblViewTUVAuditSysPerInCharge").text("N/A");
                    }
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
                    $("#dateEditTUVAuditDateFrom").val(JsonObject['tuv_audits'][0]['audit_date_from']);
                    $("#dateEditTUVAuditDateTo").val(JsonObject['tuv_audits'][0]['audit_date_to']);
                    $("#dateEditTUVAuditDeadSub").val(JsonObject['tuv_audits'][0]['deadline_for_submission']);
                    $("#dateEditTUVAuditCurrDeadSub").val(JsonObject['tuv_audits'][0]['deadline_for_submission']);
                    $("#txtEditTUVAuditDeadSubDays").val(JsonObject['tuv_audits'][0]['deadline_for_submission_days']);
                    $("#dateEditTUVAuditCreatedAt").val(JsonObject['tuv_audits'][0]['created_at'].split(' ')[0]);
                    $("#txtEditTUVAuditAuditors").val(JsonObject['tuv_audits'][0]['auditors']);
                    $("#txtEditTUVAuditStanClause").val(JsonObject['tuv_audits'][0]['standard_clause']);
                    $("#selEditTUVAuditStat").val(JsonObject['tuv_audits'][0]['audit_stat']);
                    $("#selEditTUVSendingStat").val(JsonObject['tuv_audits'][0]['sending_stat']);
                    let responsible_department = [];
                    for(let index = 0; index < JsonObject['tuv_audits'][0]['tuv_departments'].length; index++){
                        responsible_department.push(JsonObject['tuv_audits'][0]['tuv_departments'][index]['departments'][0].department_id);
                    }
                    $("#selEditTUVAuditResDept").val(responsible_department).trigger('change');
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
                    $("#dateEditTUVAuditCorrCommDate").val(JsonObject['tuv_audits'][0]['correction_commitment_date']);

                    $("#dateEditTUVAuditConCommDate").val(JsonObject['tuv_audits'][0]['containment_commitment_date']);

                    $("#txtEditTUVAuditCorrection").val(JsonObject['tuv_audits'][0]['correction']);
                    $("#txtEditTUVAuditContainment").val(JsonObject['tuv_audits'][0]['containment']);
                    $("#dateEditTUVAuditSysCommDate").val(JsonObject['tuv_audits'][0]['systematic_commitment_date']);
                    $("#txtEditTUVAuditSystematic").val(JsonObject['tuv_audits'][0]['systematic']);                
                    let tuvCorrPerInCharges = [];
                    for(let index = 0; index < JsonObject['tuv_audits'][0]['tuv_corr_per_in_charges'].length; index++){
                        tuvCorrPerInCharges.push(JsonObject['tuv_audits'][0]['tuv_corr_per_in_charges'][index]['person_in_charge_id']);
                    }
                    $("#selEditTUVAuditCorrPerInCharge").val(tuvCorrPerInCharges).trigger('change');

                    let tuvConPerInCharges = [];
                    for(let index = 0; index < JsonObject['tuv_audits'][0]['tuv_con_per_in_charges'].length; index++){
                        tuvConPerInCharges.push(JsonObject['tuv_audits'][0]['tuv_con_per_in_charges'][index]['person_in_charge_id']);
                    }
                    $("#selEditTUVAuditConPerInCharge").val(tuvConPerInCharges).trigger('change');

                    let tuvSysPerInCharges = [];
                    for(let index = 0; index < JsonObject['tuv_audits'][0]['tuv_sys_per_in_charges'].length; index++){
                        tuvSysPerInCharges.push(JsonObject['tuv_audits'][0]['tuv_sys_per_in_charges'][index]['person_in_charge_id']);
                    }
                    $("#selEditTUVAuditSysPerInCharge").val(tuvSysPerInCharges).trigger('change');
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

        function readEditCusAudit(input, element) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  element.attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        let dataTableCusAudits;

        let customer_date_from = 0;
        let customer_date_to = 0;
        let customer_classification = 0;
        let customer_responsible_group = 0;
        let customer_responsible_department = 0;
        let customer_audit_stat = 0;
        let customer_name = 0;

        let arrCusSendEmail = [];
        let dataTableCusBatchAudits;

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
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_customer_audit_by_stat",
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
                    { "data" : "check_box_send", orderable:false, searchable:false },
                    { "data" : "customer_audit_id" },
                    { "data" : "customer_name" },
                    { "data" : "formatted_audit_date" },
                    { "data" : "auditors" },
                    { "data" : "label1" },
                    { "data" : "label2" },
                    { "data" : "approval_stat" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
                "order": [[ 1, "desc" ]],
                "lengthMenu" : [[10,25,50,100,500],[10,25,50,100,500]],
                "initComplete": function(settings, json) {
                    $(".chkSendCusAudit").each(function(index){
                        if(arrCusSendEmail.includes($(this).attr('customer-id'))){
                            $(this).attr('checked', 'checked');
                        }
                    });
                },
                "drawCallback": function( settings ) {
                    $(".chkSendCusAudit").each(function(index){
                        if(arrCusSendEmail.includes($(this).attr('customer-id'))){
                            $(this).attr('checked', 'checked');
                        }
                    });
                }
            });//end of dataTableCusAudits

            dataTableCusBatchAudits = $("#tblSendCusBatchEmail").on( 'error.dt', function ( e, settings, techNote, message ) {
                Swal({
                      position: 'top-end',
                      type: 'error',
                      title: 'Customer Batch DataTable Failed!',
                      showConfirmButton: false,
                      timer: 1500,
                      customClass: 'swal-wide',
                  });
              }).DataTable({
                  "processing" : false,
                  "serverSide" : true,
                  "ajax" : {
                      url: "view_batch_customer_audit_by_stat",
                      "data": function (param){
                          param.customer_audit_id = arrCusSendEmail;
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
              });//end of dataTableCusBatchAudits

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

            $("#chkGenCusRepAuditStat").click(function() {
                if($(this).prop('checked')) {
                    $("#selGenCusRepAuditStat").removeAttr('disabled');
                }
                else{
                    $("#selGenCusRepAuditStat").prop('disabled', 'disabled');
                    $("#selGenCusRepAuditStat").val('1');
                }
            });

            $("#chkAddCusAuditReqForApproval").click(function(){
                if($(this).prop('checked')) {
                    $("#chkAddCusAuditSendEmail").prop('disabled', 'disabled');
                }
                else{
                    $("#chkAddCusAuditSendEmail").removeAttr('disabled');
                    $("#chkAddCusAuditSendEmail").removeAttr('checked');
                }
            });


            $("#fileAddCusAuditCorrAct").change(function(){
                if($(this).val() != ""){
                    readCusImageUrl(this, $('#imgAddCusAuditCorrAct'));
                    // alert(Math.round(this.files[0].size / 1024) + " KB");
                }
                else{
                    $('#imgAddCusAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                }
            });

            $("#fileAddCusAuditIllu").change(function(){
                if($(this).val() != ""){
                    readCusImageUrl(this, $('#imgAddCusAuditIllu'));
                    // alert(Math.round(this.files[0].size / 1024) + " KB");
                }
                else{
                    $('#imgAddCusAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                }
            });

            $("#fileEditCusAuditCorrAct").change(function(){
                if($(this).val() != ""){
                    readEditCusAudit(this, $('#imgEditCusAuditCorrAct'));
                }
                else{
                    if($("#txtEditCusAuditCurrCorrAct").val() != ""){
                        var imglink = "{{ asset('public/storage/audit_result_images/customer/img') }}";
                        imglink = imglink.replace("img", $("#txtEditCusAuditCurrCorrAct").val());
                        $('#imgEditCusAuditCorrAct').attr('src', imglink);
                    }
                    else{
                        $('#imgEditCusAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }
                }
            });

            $("#fileEditCusAuditIllu").change(function(){
                if($(this).val() != ""){
                    readEditCusAudit(this, $('#imgEditCusAuditIllu'));
                }
                else{
                    if($("#txtEditCusAuditCurrIllu").val() != ""){
                        var imglink = "{{ asset('public/storage/audit_result_images/customer/img') }}";
                        imglink = imglink.replace("img", $("#txtEditCusAuditCurrIllu").val());
                        $('#imgEditCusAuditIllu').attr('src', imglink);
                    }
                    else{
                        $('#imgEditCusAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");   
                    }
                }
            });

            $("#formChangeAuditCusCustomerStat").submit(function(event) {
                event.preventDefault();
                ChangeAuditCusStat();
            });

            $("#btnShowAddCusCusAudModal").click(function() {
                GetDepartmentByStat(1, $("#selAddCusAuditResDept"));
            });

            $("#formChangeAuditCusStat").submit(function(event) {
                event.preventDefault();
                ChangeAuditCusStat();
            });

            $("#formAddCusAudit").submit(function(event){
                event.preventDefault();
                $.ajax({
                    url: 'add_customer_audit',
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
                            $("#modalAddCustomerAudit").modal('hide');
                            $("#formAddCusAudit")[0].reset();
                            $('#imgAddCusAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            $('#imgAddCusAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            dataTableCusAudits.draw();

                            $("#dateAddCusAuditDate").removeClass('border-danger');
                            $("#dateAddCusAuditDate").removeAttr('title');
                            $("#txtAddCusAuditCusName").removeClass('border-danger');
                            $("#txtAddCusAuditCusName").removeAttr('title');
                            $("#txtAddCusAuditProcess").removeClass('border-danger');
                            $("#txtAddCusAuditProcess").removeAttr('title');
                            $("#txtAddCusAuditEvalItem").removeClass('border-danger');
                            $("#txtAddCusAuditEvalItem").removeAttr('title');
                            $("#selAddCusAuditClassRank").removeClass('border-danger');
                            $("#selAddCusAuditClassRank").removeAttr('title');
                            $("#dateAddCusAuditDeadSub").removeClass('border-danger');
                            $("#dateAddCusAuditDeadSub").removeAttr('title');
                            $("#dateAddCusAuditActDateSub").removeClass('border-danger');
                            $("#dateAddCusAuditActDateSub").removeAttr('title');
                            $("#txtAddCusAuditDeadSubDays").removeClass('border-danger');
                            $("#txtAddCusAuditDeadSubDays").removeAttr('title');
                            $("#txtAddCusAuditAuditors").removeClass('border-danger');
                            $("#txtAddCusAuditAuditors").removeAttr('title');
                            $("#txtAddCusAuditStmtOfFin").removeClass('border-danger');
                            $("#txtAddCusAuditStmtOfFin").removeAttr('title');
                            $("#selAddCusAuditResDept").removeClass('border-danger');
                            $("#selAddCusAuditResDept").removeAttr('title');
                            $("#selAddCusAuditResGroup").removeClass('border-danger');
                            $("#selAddCusAuditResGroup").removeAttr('title');
                            $("#txtAddCusAuditCorrAct").removeClass('border-danger');
                            $("#txtAddCusAuditCorrAct").removeAttr('title');
                            $("#fileAddCusAuditCorrAct").removeClass('border-danger');
                            $("#fileAddCusAuditCorrAct").removeAttr('title');
                            $("#txtAddCusAuditIllu").removeClass('border-danger');
                            $("#txtAddCusAuditIllu").removeAttr('title');
                            $("#fileAddCusAuditIllu").removeClass('border-danger');
                            $("#fileAddCusAuditIllu").removeAttr('title');
                            GetCboSelUniqueCustomerNames($("#selGenCusRepCusName"));
                            $("#selAddCusAuditPerInCharge").val('0').trigger('change')
                        }
                        else if(JsonObject['result'] == 0){
                            // alert('Failed');
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

                        if(JsonObject['error']['audit_date'] != undefined){
                            $("#dateAddCusAuditDate").addClass('border-danger');
                            $("#dateAddCusAuditDate").attr('title', JsonObject['error']['audit_date']);
                        }
                        else{
                            $("#dateAddCusAuditDate").removeClass('border-danger');
                            $("#dateAddCusAuditDate").removeAttr('title');
                        }

                        if(JsonObject['error']['customer_name'] != undefined){
                            $("#txtAddCusAuditCusName").addClass('border-danger');
                            $("#txtAddCusAuditCusName").attr('title', JsonObject['error']['customer_name']);
                        }
                        else{
                            $("#txtAddCusAuditCusName").removeClass('border-danger');
                            $("#txtAddCusAuditCusName").removeAttr('title');
                        }

                        if(JsonObject['error']['process'] != undefined){
                            $("#txtAddCusAuditProcess").addClass('border-danger');
                            $("#txtAddCusAuditProcess").attr('title', JsonObject['error']['process']);
                        }
                        else{
                            $("#txtAddCusAuditProcess").removeClass('border-danger');
                            $("#txtAddCusAuditProcess").removeAttr('title');
                        }

                        if(JsonObject['error']['evaluation_item'] != undefined){
                            $("#txtAddCusAuditEvalItem").addClass('border-danger');
                            $("#txtAddCusAuditEvalItem").attr('title', JsonObject['error']['evaluation_item']);
                        }
                        else{
                            $("#txtAddCusAuditEvalItem").removeClass('border-danger');
                            $("#txtAddCusAuditEvalItem").removeAttr('title');
                        }

                        if(JsonObject['error']['classification'] != undefined){
                            $("#selAddCusAuditClassRank").addClass('border-danger');
                            $("#selAddCusAuditClassRank").attr('title', JsonObject['error']['classification']);
                        }
                        else{
                            $("#selAddCusAuditClassRank").removeClass('border-danger');
                            $("#selAddCusAuditClassRank").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission'] != undefined){
                            $("#dateAddCusAuditDeadSub").addClass('border-danger');
                            $("#dateAddCusAuditDeadSub").attr('title', JsonObject['error']['deadline_of_submission']);
                        }
                        else{
                            $("#dateAddCusAuditDeadSub").removeClass('border-danger');
                            $("#dateAddCusAuditDeadSub").removeAttr('title');
                        }

                        if(JsonObject['error']['actual_date_of_submission'] != undefined){
                            $("#dateAddCusAuditActDateSub").addClass('border-danger');
                            $("#dateAddCusAuditActDateSub").attr('title', JsonObject['error']['actual_date_of_submission']);
                        }
                        else{
                            $("#dateAddCusAuditActDateSub").removeClass('border-danger');
                            $("#dateAddCusAuditActDateSub").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission_days'] != undefined){
                            $("#txtAddCusAuditDeadSubDays").addClass('border-danger');
                            $("#txtAddCusAuditDeadSubDays").attr('title', JsonObject['error']['deadline_of_submission_days']);
                        }
                        else{
                            $("#txtAddCusAuditDeadSubDays").removeClass('border-danger');
                            $("#txtAddCusAuditDeadSubDays").removeAttr('title');
                        }

                        if(JsonObject['error']['auditors'] != undefined){
                            $("#txtAddCusAuditAuditors").addClass('border-danger');
                            $("#txtAddCusAuditAuditors").attr('title', JsonObject['error']['auditors']);
                        }
                        else{
                            $("#txtAddCusAuditAuditors").removeClass('border-danger');
                            $("#txtAddCusAuditAuditors").removeAttr('title');
                        }

                        if(JsonObject['error']['statement_of_findings'] != undefined){
                            $("#txtAddCusAuditStmtOfFin").addClass('border-danger');
                            $("#txtAddCusAuditStmtOfFin").attr('title', JsonObject['error']['statement_of_findings']);
                        }
                        else{
                            $("#txtAddCusAuditStmtOfFin").removeClass('border-danger');
                            $("#txtAddCusAuditStmtOfFin").removeAttr('title');
                        }

                        if(JsonObject['error']['responsible_department'] != undefined){
                            $("#selAddCusAuditResDept").addClass('border-danger');
                            $("#selAddCusAuditResDept").attr('title', JsonObject['error']['responsible_department']);
                        }
                        else{
                            $("#selAddCusAuditResDept").removeClass('border-danger');
                            $("#selAddCusAuditResDept").removeAttr('title');
                        }

                        if(JsonObject['error']['responsible_group'] != undefined){
                            $("#selAddCusAuditResGroup").addClass('border-danger');
                            $("#selAddCusAuditResGroup").attr('title', JsonObject['error']['responsible_group']);
                        }
                        else{
                            $("#selAddCusAuditResGroup").removeClass('border-danger');
                            $("#selAddCusAuditResGroup").removeAttr('title');
                        }

                        // if(JsonObject['error']['objective_evidence'] != undefined){
                        //     $("#txtAddTUVAuditObjEvi").addClass('border-danger');
                        //     $("#txtAddTUVAuditObjEvi").attr('title', JsonObject['error']['objective_evidence']);
                        // }
                        // else{
                        //     $("#txtAddTUVAuditObjEvi").removeClass('border-danger');
                        //     $("#txtAddTUVAuditObjEvi").removeAttr('title');
                        // }

                        if(JsonObject['error']['corrective_action'] != undefined){
                            $("#txtAddCusAuditCorrAct").addClass('border-danger');
                            $("#txtAddCusAuditCorrAct").attr('title', JsonObject['error']['corrective_action']);
                        }
                        else{
                            $("#txtAddCusAuditCorrAct").removeClass('border-danger');
                            $("#txtAddCusAuditCorrAct").removeAttr('title');
                        }

                        if(JsonObject['error']['img_corrective_action'] != undefined){
                            $("#fileAddCusAuditCorrAct").addClass('border-danger');
                            $("#fileAddCusAuditCorrAct").attr('title', JsonObject['error']['img_corrective_action']);
                        }
                        else{
                            $("#fileAddCusAuditCorrAct").removeClass('border-danger');
                            $("#fileAddCusAuditCorrAct").removeAttr('title');
                        }

                        if(JsonObject['error']['illustration'] != undefined){
                            $("#txtAddCusAuditIllu").addClass('border-danger');
                            $("#txtAddCusAuditIllu").attr('title', JsonObject['error']['illustration']);
                        }
                        else{
                            $("#txtAddCusAuditIllu").removeClass('border-danger');
                            $("#txtAddCusAuditIllu").removeAttr('title');
                        }

                        if(JsonObject['error']['img_illustration'] != undefined){
                            $("#fileAddCusAuditIllu").addClass('border-danger');
                            $("#fileAddCusAuditIllu").attr('title', JsonObject['error']['img_illustration']);
                        }
                        else{
                            $("#fileAddCusAuditIllu").removeClass('border-danger');
                            $("#fileAddCusAuditIllu").removeAttr('title');
                        }
                    },
                    error: function(data, xhr, status){
                        console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                });
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
                            $("#dateEditCusAuditDatefrom").removeClass('border-danger');
                            $("#dateEditCusAuditDatefrom").removeAttr('title');
                            $("#dateEditCusAuditDateTo").removeClass('border-danger');
                            $("#dateEditCusAuditDateTo").removeAttr('title');
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
                            GetCboSelUniqueCustomerNames($("#selGenCusRepCusName"));
                            $("#selEditCusAuditPerInCharge").select2('val', 0);
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
                        if(JsonObject['result'] == 0 && JsonObject['upload_result'] == 0){
                            Swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'Uploading Failed!',
                                showConfirmButton: false,
                                timer: 1500,
                                customClass: 'swal-wide',
                            });
                        }

                        if(JsonObject['error']['audit_date_from'] != undefined){
                            $("#dateEditCusAuditDateFrom").addClass('border-danger');
                            $("#dateEditCusAuditDateFrom").attr('title', JsonObject['error']['audit_date_from']);
                        }
                        else{
                            $("#dateEditCusAuditDateFrom").removeClass('border-danger');
                            $("#dateEditCusAuditDateFrom").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_date_to'] != undefined){
                            $("#dateEditCusAuditDateTo").addClass('border-danger');
                            $("#dateEditCusAuditDateTo").attr('title', JsonObject['error']['audit_date_to']);
                        }
                        else{
                            $("#dateEditCusAuditDateTo").removeClass('border-danger');
                            $("#dateEditCusAuditDateTo").removeAttr('title');
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

            $(document).on('click', '.aViewCusAudit', function(){
                let cusAuditId = $(this).attr('customer-id');
                GetCusAuditByIdToView(cusAuditId);
            });

            // $(document).on('click', '.aCloseCusAudit', function(){
            //     let cusAuditId = $(this).attr('customer-id');
            //     $("#txtCloseCusAuditId").val(cusAuditId);
            // });

            // $(document).on('click', '.aOpenCusAudit', function(){
            //     let cusAuditId = $(this).attr('customer-id');
            //     $("#txtOpenCusAuditId").val(cusAuditId);
            // });

            $(document).on('click', '.aChangeCusAuditStat', function(){
                let cusAuditId = $(this).attr('customer-id');
                $("#txtChangeAuditStatCusAuditId").val(cusAuditId);

                let cusAuditStat = $(this).attr('audit-stat');
                $("#txtChangeCusAuditStat").val(cusAuditStat);

                if(cusAuditStat == 1){
                    $("#h3CusChangeStatHead").text('For Improvement Plan Customer Audit');
                    $("#pCusChangeAuditStat").text('Are you sure to change audit status to Improvement Plan?');
                }
                else if(cusAuditStat == 2){
                    $("#h3CusChangeStatHead").text('For Close-out Customer Audit');
                    $("#pCusChangeAuditStat").text('Are you sure to change audit status to Close-out Audit?');
                }
                else if(cusAuditStat == 3){
                    $("#h3CusChangeStatHead").text('Close Customer Audit');
                    $("#pCusChangeAuditStat").text('Are you sure to change audit status to Close Audit?');
                }
            });

            $(document).on('click', '.aDoneCusAudit', function(){
                let cusAuditId = $(this).attr('customer-id');
                $("#txtDoneCusAuditId").val(cusAuditId);
            });

            $(document).on('click', '.aPendCusAudit', function(){
                let cusAuditId = $(this).attr('customer-id');
                $("#txtPendCusAuditId").val(cusAuditId);
            });

            $(document).on('click', '.aEditCusAudit', function(){
                let cusAuditId = $(this).attr('customer-id');
                $("#txtEditCusAuditId").val(cusAuditId);
                GetCusAuditByIdToEdit(cusAuditId);
            });

            // $("#formCloseCusAudit").submit(function(event) {
            //     event.preventDefault();
            //     CloseCusAudit();
            // });

            // $("#formOpenCusAudit").submit(function(event) {
            //     event.preventDefault();
            //     OpenCusAudit();
            // });

            $(document).on('click', '.aChangeCusCustomerAuditStat', function(){
                let cusAuditId = $(this).attr('customer-id');
                let cusAuditStat = $(this).attr('customer-audit-stat');
                $("#txtChangeAuditCusCustomerStatAuditId").val(cusAuditId);
                $("#txtChangeAuditCusCustomerStatAuditStat").val(cusAuditStat);

                if(cusAuditStat == 2) {
                    $("#h4ChangeAuditCusCustomerStatTitle").text('Archive Customer Audit');
                    $("#pChangeAuditCusCustomerStatBody").text('Are you sure to customer supplier audit?');                    
                }
                else {
                    $("#h4ChangeAuditCusCustomerStatTitle").text('Restore Customer Audit');
                    $("#pChangeAuditCusCustomerStatBody").text('Are you sure to customer supplier audit?');
                }
            });

            $("#formChangeAuditStatCusAudit").submit(function(event) {
                event.preventDefault();
                ChangeCustomerAuditStat();
            });

            $("#formDoneCusAudit").submit(function(event) {
                event.preventDefault();
                DoneCusAudit();
            });

            $("#formPendCusAudit").submit(function(event) {
                event.preventDefault();
                PendCusAudit();
            });

            $(document).on('click', '.chkSendCusAudit', function(){
                let cusAuditId = $(this).attr('customer-id');

                if($(this).prop('checked')){
                    // Checked
                    if(!arrCusSendEmail.includes(cusAuditId)){
                        arrCusSendEmail.push(cusAuditId);
                    }
                }
                else{  
                    // Unchecked
                    let index = arrCusSendEmail.indexOf(cusAuditId);
                    arrCusSendEmail.splice(index, 1);
                }
                $("#lblCusNoOfSendCusBatch").text(arrCusSendEmail.length);
                if(arrCusSendEmail.length <= 0){
                    $("#btnShowModalSendCusBatchEmail").prop('disabled', 'disabled');
                    $("#btnSendCusBatchEmail").prop('disabled', 'disabled');

                }
                else{
                    $("#btnShowModalSendCusBatchEmail").removeAttr('disabled');
                    $("#btnSendCusBatchEmail").removeAttr('disabled');

                }
            });

            $(document).on('click', '.aRemoveCusInBatch', function(){
                let cusAuditId = $(this).attr('customer-id');
                let index = arrCusSendEmail.indexOf(cusAuditId);
                arrCusSendEmail.splice(index, 1);
                $("#lblCusNoOfSendCusBatch").text(arrCusSendEmail.length);
                if(arrCusSendEmail.length <= 0){
                    $("#btnShowModalSendCusBatchEmail").prop('disabled', 'disabled');
                    $("#btnSendCusBatchEmail").prop('disabled', 'disabled');
                    $("#modalSendCusBatchEmail").modal('hide');
                }
                else{
                    $("#btnShowModalSendCusBatchEmail").removeAttr('disabled');
                    $("#btnSendCusBatchEmail").removeAttr('disabled');
                }

                dataTableCusAudits.draw();
                dataTableCusBatchAudits.draw();
            });

            $("#btnShowModalSendCusBatchEmail").click(function(){
                dataTableCusBatchAudits.draw();
            });

            $("#btnSendCusBatchEmail").click(function(){
                // arrCusSendEmail = SendCusBatchMail("{{ csrf_token() }}" , arrCusSendEmail);
                // dataTableCusAudits.draw();
                $.ajax({
                    url: 'send_customer_batch',
                    method: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        customer_audit_id: arrCusSendEmail,
                        user_access: globalUserAccessLevelId
                    },
                    dataType: 'json',
                    beforeSend: function(){
                        
                    },
                    success: function(JsonObject){
                        if(JsonObject['result'] == 1){
                            arrCusSendEmail = [];
                            dataTableCusAudits.draw();
                            dataTableCusBatchAudits.draw();
                            $("#btnShowModalSendCusBatchEmail").prop('disabled', 'disabled');
                            $("#btnSendCusBatchEmail").prop('disabled', 'disabled');
                            $("#modalSendCusBatchEmail").modal('hide');
                            $("#lblCusNoOfSendCusBatch").text(arrCusSendEmail.length);
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
        });

        // this function will not allow to save in another file because of image retrieval failure
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
                    $("#lblViewCusAuditDate").text(JsonObject['customer_audits'][0]['audit_date_from'] + " to " + JsonObject['customer_audits'][0]['audit_date_to']);
                    $("#lblViewCusAuditDeadSub").text(JsonObject['customer_audits'][0]['deadline_of_submission_days'] + ' Day(s) - ' + JsonObject['customer_audits'][0]['deadline_of_submission']);
                    $("#lblViewCusAuditActDateSub").text(JsonObject['customer_audits'][0]['actual_date_of_submission']);
                    $("#lblViewCusAuditEvalItem").text(JsonObject['customer_audits'][0]['evaluation_item']);
                    $("#lblViewCusAuditClassRank").text(JsonObject['customer_audits'][0]['classification']);
                    $("#lblViewCusAuditResGroup").text(JsonObject['customer_audits'][0]['responsible_group']);
                    // $("#lblViewCusAuditResDept").text(JsonObject['customer_audits'][0]['department'][0]['department_name']);
                    let resDept = "";
                    for(let index = 0; index < JsonObject['customer_audits'][0]['customer_departments'].length; index++){
                        resDept += JsonObject['customer_audits'][0]['customer_departments'][index]['departments'][0]['department_name'];
                        
                        if(index < JsonObject['customer_audits'][0]['customer_departments'].length - 1){
                            resDept += ", ";
                        }
                    }
                    $("#lblViewCusAuditResDept").text(resDept);
                    $("#lblViewCusAuditResStmtOfFin").text(JsonObject['customer_audits'][0]['statement_of_findings']);
                    $("#lblViewCusAuditIllu").text(JsonObject['customer_audits'][0]['illustration']);
                    $("#lblViewCusAuditCorrAct").text(JsonObject['customer_audits'][0]['corrective_action']);

                    if(JsonObject['customer_audits'][0]['img_illustration'] != "") {
                        let imgIllulink = "{{ asset('public/storage/audit_result_images/customer/img') }}";
                        imgIllulink = imgIllulink.replace("img", JsonObject['customer_audits'][0]['img_illustration']);
                        $("#imgViewCusAuditIllu").attr('src', imgIllulink);
                    }
                    else{
                        $("#imgViewCusAuditIllu").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }
                    
                    if(JsonObject['customer_audits'][0]['img_corrective_action'] != "") {
                        let imgCorrActlink = "{{ asset('public/storage/audit_result_images/customer/img') }}";
                        imgCorrActlink = imgCorrActlink.replace("img", JsonObject['customer_audits'][0]['img_corrective_action']);
                        $("#imgViewCusAuditCorrAct").attr('src', imgCorrActlink);
                    }
                    else{
                        $("#imgViewCusAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }


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
                    // if(JsonObject['customer_audits'][0]['person_in_charge'] != 0){
                    //     $("#lblViewCusAuditPerInCharge").text(JsonObject['customer_audits'][0]['person_in_charge_record'].name);
                    // }
                    // else{
                    //     $("#lblViewCusAuditPerInCharge").text("N/A");
                    // }

                    if(JsonObject['customer_audits'][0]['person_in_charges'].length > 0){
                        let perInCharges = "";
                        for(let index = 0; index < JsonObject['customer_audits'][0]['person_in_charges'].length; index++){
                            perInCharges += JsonObject['customer_audits'][0]['person_in_charges'][index]['person_in_charge_record']['name'];
                            
                            if(index < JsonObject['customer_audits'][0]['person_in_charges'].length - 1){
                                perInCharges += ", ";
                            }
                        }
                        $("#lblViewCusAuditPerInCharge").text(perInCharges);
                    }
                    else{
                        $("#lblViewCusAuditPerInCharge").text("N/A");
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
                        $("#lblViewCusAuditStat").text('For Improvement Plan');
                    }
                    else if(JsonObject['customer_audits'][0]['audit_stat'] == 2){
                        $("#lblViewCusAuditStat").text('For Closed-Out');
                    }
                    else{
                        $("#lblViewCusAuditStat").text('Closed');
                    }

                    $("#lblViewCusAuditCreatedBy").text(JsonObject['customer_audits'][0]['user_created_by']['name']);
                    $("#lblViewCusAuditLastUpdatedBy").text(JsonObject['customer_audits'][0]['user_last_updated_by']['name']);
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }

        // this function will not allow to save in another file because of image retrieval failure
        function GetCusAuditByIdToEdit(cusAuditId){
            $.ajax({
                url: 'get_customer_audit_by_id',
                method: 'get',
                data: {
                    'customer_audit_id': cusAuditId
                },
                dataType: 'json',
                beforeSend: function(){
                    // $("#imgViewCusAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    
                },
                success: function(JsonObject){
                    $("#txtEditCusAuditCusName").val(JsonObject['customer_audits'][0]['customer_name']);
                    $("#txtEditCusAuditAuditors").val(JsonObject['customer_audits'][0]['auditors']);
                    $("#txtEditCusAuditProcess").val(JsonObject['customer_audits'][0]['process']);
                    $("#dateEditCusAuditDateFrom").val(JsonObject['customer_audits'][0]['audit_date_from']);
                    $("#dateEditCusAuditDateTo").val(JsonObject['customer_audits'][0]['audit_date_to']);
                    $("#txtEditCusAuditDeadSubDays").val(JsonObject['customer_audits'][0]['deadline_of_submission_days']);
                    $("#dateEditCusAuditDeadSub").val(JsonObject['customer_audits'][0]['deadline_of_submission']);
                    $("#dateEditCusAuditActDateSub").val(JsonObject['customer_audits'][0]['actual_date_of_submission']);
                    $("#txtEditCusAuditEvalItem").val(JsonObject['customer_audits'][0]['evaluation_item']);
                    $("#selEditCusAuditClassRank").val(JsonObject['customer_audits'][0]['classification']);
                    $("#selEditCusAuditResGroup").val(JsonObject['customer_audits'][0]['responsible_group']);
                    $("#txtEditCusAuditStmtOfFin").val(JsonObject['customer_audits'][0]['statement_of_findings']);
                    $("#txtEditCusAuditIllu").val(JsonObject['customer_audits'][0]['illustration']);
                    $("#txtEditCusAuditCorrAct").val(JsonObject['customer_audits'][0]['corrective_action']);
                    $("#dateEditCusAuditCreatedAt").val(JsonObject['customer_audits'][0]['created_at'].split(' ')[0]);
                    $("#dateEditCusAuditCurrDeadSub").val(JsonObject['customer_audits'][0]['deadline_of_submission']);
                    // $("#selEditCusAuditResDept").val(JsonObject['customer_audits'][0]['responsible_department']).trigger('change');

                    let responsible_department = [];
                    for(let index = 0; index < JsonObject['customer_audits'][0]['customer_departments'].length; index++){
                        responsible_department.push(JsonObject['customer_audits'][0]['customer_departments'][index]['departments'][0].department_id);
                    }

                    $("#selEditCusAuditResDept").val(responsible_department).trigger('change');

                    if(JsonObject['customer_audits'][0]['img_illustration'] != ""){
                        let imgIllulink = "{{ asset('public/storage/audit_result_images/customer/img') }}";
                        imgIllulink = imgIllulink.replace("img", JsonObject['customer_audits'][0]['img_illustration']);
                        $("#imgEditCusAuditIllu").attr('src', imgIllulink);
                    }
                    else{
                        $("#imgEditCusAuditIllu").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }
                    
                    if(JsonObject['customer_audits'][0]['img_corrective_action'] != ""){
                        let imgCorrActlink = "{{ asset('public/storage/audit_result_images/customer/img') }}";
                        imgCorrActlink = imgCorrActlink.replace("img", JsonObject['customer_audits'][0]['img_corrective_action']);
                        $("#imgEditCusAuditCorrAct").attr('src', imgCorrActlink);
                    }
                    else{
                        $("#imgEditCusAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }

                    $("#txtEditCusAuditCurrIllu").val(JsonObject['customer_audits'][0]['img_illustration']);
                    $("#txtEditCusAuditCurrCorrAct").val(JsonObject['customer_audits'][0]['img_corrective_action']);

                    $("#txtEditCusAuditRootCause").val(JsonObject['customer_audits'][0]['root_cause']);
                    $("#txtEditCusAuditImpPlan").val(JsonObject['customer_audits'][0]['improvement_plan']);
                    $("#txtEditCusAuditCommDate").val(JsonObject['customer_audits'][0]['commitment_date']);
                    
                    let person_in_charges = [];
                    for(let index = 0; index < JsonObject['customer_audits'][0]['person_in_charges'].length; index++){
                        person_in_charges.push(JsonObject['customer_audits'][0]['person_in_charges'][index]['person_in_charge_id']);
                    }

                    $("#selEditCusAuditPerInCharge").val(person_in_charges).trigger('change');
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }

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
        let internal_audit_type_pref_rep_ctrl_no = 0;
        let internal_classification = 0;
        let internal_category_of_findings = 0;
        let internal_responsible_department = 0;
        let internal_audit_stat = 0;
        let audit_report_control_no = 0;
        let internal_item_no = 0;
        let internal_nc_control_no = 0;

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
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_internal_audit_by_stat",
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
                    }
                }, 
                "order": [[ 2, "desc" ]],
                "lengthMenu" : [[10,25,50,100,500],[10,25,50,100,500]],
                'columnDefs': [
                    { 'orderData':[0], 'targets': [0] },
                    {
                        'targets': [0],
                        'visible': false,
                        'searchable': false
                    },
                ],   
                "columns":[
                    { "data" : "internal_audit_id", visible:false},
                    { "data" : "check_box_send", orderable:false, searchable:false },
                    { "data" : "internal_audit_id" },
                    { "data" : "formatted_audit_date" },
                    { "data" : "audit_type" },
                    { "data" : "auditors" },
                    { "data" : "item_no" },
                    { "data" : "audit_report_control_no" },
                    { "data" : "label1" },
                    { "data" : "label2" },
                    { "data" : "approval_stat" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
                "columnDefs": [ 
                    {
                      "targets": [6],
                      "data": null,
                      "defaultContent": "--"
                    }
               ],
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
                  "processing" : false,
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
                // if($("#dateGenIntRepDateFrom").attr('disabled') != 'disabled' && $("#dateGenIntRepDateFrom").val() != '') {
                //     internal_date_from = $("#dateGenIntRepDateFrom").val();
                // }
                // else{
                //     internal_date_from = 0;
                // }

                // if($("#dateGenIntRepDateTo").attr('disabled') != 'disabled' && $("#dateGenIntRepDateTo").val() != '') {
                //     internal_date_to = $("#dateGenIntRepDateTo").val();
                // }
                // else{
                //     internal_date_to = 0;
                // }

                // alert(internal_date_from + ' - ' + internal_date_to);

                // if($("#chkGenIntRepAuditDate").prop('checked', 'checked')) {
                //     alert('Meron');
                // }
                // else{
                //     alert('Wala');
                // }

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

                if($("#selGenIntItemNo").attr('disabled') != 'disabled' && $("#selGenIntItemNo").val() != '' && $("#selGenIntItemNo").val() != null) {
                    internal_item_no = $("#selGenIntItemNo").val();
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

            $("#chkGenIntRepAuditDate").click(function() {
                if($(this).prop('checked')) {
                    // alert("Active");
                    $("#drpGenIntRepAuditDate").removeAttr('disabled');
                    // $("#dateGenIntRepDateTo").removeAttr('disabled');
                }
                else{
                    // alert("Remove");
                    $("#drpGenIntRepAuditDate").prop('disabled', 'disabled');
                    // $("#dateGenIntRepDateTo").prop('disabled', 'disabled');
                    $("#drpGenIntRepAuditDate").val('');
                    // $("#dateGenIntRepDateTo").val('');
                    $('#drpGenIntRepAuditDate span').html("All");
                    internal_date_from = 0;
                    internal_date_to = 0;
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

            $("#chkAddIntAuditReqForApproval").click(function(){
                if($(this).prop('checked')) {
                    $("#chkAddIntAuditSendEmail").prop('disabled', 'disabled');
                }
                else{
                    $("#chkAddIntAuditSendEmail").removeAttr('disabled');
                    $("#chkAddIntAuditSendEmail").removeAttr('checked');
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

            $("#btnSearchARCNTooAddInt").click(function(){
                let intAuditRepCtrlNo = $("#txtAddIntAuditRepContNo").val();
                GetIntAuditByRepCtrlNoToAdd(intAuditRepCtrlNo);
            });

            $("#btnShowAddIntAuditModal").click(function() {
                GetDepartmentByStat(1, $("#selAddIntAuditResDept"));
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

                dataTableInternalAudits.draw();
                dataTableIntBatchAudits.draw();
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
                dataTableIntBatchAudits.draw();
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
                        
                    },
                    success: function(JsonObject){
                        if(JsonObject['result'] == 1){
                            arrIntSendEmail = [];
                            dataTableInternalAudits.draw();
                            dataTableIntBatchAudits.draw();
                            $("#btnShowModalSendIntBatchEmail").prop('disabled', 'disabled');
                            $("#btnSendIntBatchEmail").prop('disabled', 'disabled');
                            $("#modalSendIntBatchEmail").modal('hide');
                            $("#lblIntNoOfSendIntBatch").text(arrIntSendEmail.length);
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
                            dataTableInternalAudits.draw();

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
                            dataTableInternalAudits.draw();

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
                    
                },
                success: function(JsonObject){
                    $("#lblViewIntAuditType").text(JsonObject['internal_audits'][0]['audit_type']);
                    $("#lblViewIntAuditAuditors").text(JsonObject['internal_audits'][0]['auditors']);
                    $("#lblViewIntAuditAuditees").text(JsonObject['internal_audits'][0]['auditees']);
                    $("#lblViewIntAuditDate").text(JsonObject['internal_audits'][0]['audit_date_from'] + " to " + JsonObject['internal_audits'][0]['audit_date_to']);
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
                    // if(JsonObject['internal_audits'][0]['person_in_charge'] != null){
                    //     $("#lblViewIntAuditPerInCharge").text(JsonObject['internal_audits'][0]['person_in_charge_record'].name);
                    // }
                    // else{
                    //     $("#lblViewIntAuditPerInCharge").text("---");
                    // }
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
                    $("#txtEditIntAuditBusProcSecSupp").val(JsonObject['internal_audits'][0]['business_process']);
                    $("#txtEditIntAuditStmtOfFin").val(JsonObject['internal_audits'][0]['statement_of_findings']);
                    $("#txtEditIntAuditIllu").val(JsonObject['internal_audits'][0]['illustration']);
                    $("#txtEditIntAuditCorrAct").val(JsonObject['internal_audits'][0]['corrective_action']);

                    $("#txtEditIntAuditNCCtrlNo").val(JsonObject['internal_audits'][0]['nc_control_no']);

                    $("#txtEditIntAuditItemNo").val(JsonObject['internal_audits'][0]['item_no']);

                    $("#selEditIntAuditStat").val(JsonObject['internal_audits'][0]['audit_stat']);

                    $("#selEditIntAuditSendStat").val(JsonObject['internal_audits'][0]['sending_stat']);

                    if(JsonObject['internal_audits'][0]['classification'] == "NC") {
                        $("#txtEditIntAuditNCCtrlNo").removeAttr('disabled');
                    }
                    else{
                        $("#txtEditIntAuditNCCtrlNo").prop('disabled', 'disabled');
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
                    $("#txtEditIntAuditCommDate").val(JsonObject['internal_audits'][0]['commitment_date']);

                    let person_in_charges = [];
                    for(let index = 0; index < JsonObject['internal_audits'][0]['person_in_charges'].length; index++){
                        person_in_charges.push(JsonObject['internal_audits'][0]['person_in_charges'][index]['person_in_charge_id']);
                    }

                    $("#selEditIntAuditPerInCharge").val(person_in_charges).trigger('change');

                    // $("#selEditIntAuditPerInCharge").val(JsonObject['internal_audits'][0]['person_in_charge']).trigger('change');
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }


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

        let dataTableSuppBatchAudits;
        let arrSuppSendEmail = [];

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
                    url: "view_supplier_audit_by_stat",
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
                    { "data" : "check_box_send", orderable:false, searchable:false },
                    { "data" : "supplier_audit_id" },
                    { "data" : "formatted_audit_date" },
                    { "data" : "audit_type" },
                    { "data" : "auditors" },
                    { "data" : "audit_report_control_no" },
                    { "data" : "label1" },
                    { "data" : "label2" },
                    { "data" : "approval_stat" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],
                "order": [[ 1, "desc" ]],
                "lengthMenu" : [[10,25,50,100,500],[10,25,50,100,500]],
                "initComplete": function(settings, json) {
                    $(".chkSendSuppAudit").each(function(index){
                        if(arrSuppSendEmail.includes($(this).attr('supplier-id'))){
                            $(this).attr('checked', 'checked');
                        }
                    });
                },
                "drawCallback": function( settings ) {
                    $(".chkSendSuppAudit").each(function(index){
                        if(arrSuppSendEmail.includes($(this).attr('supplier-id'))){
                            $(this).attr('checked', 'checked');
                        }
                    });
                }
            });//end of dataTableSupplierAudits

          dataTableSuppBatchAudits = $("#tblSendSuppBatchEmail").on( 'error.dt', function ( e, settings, techNote, message ) {
            Swal({
                  position: 'top-end',
                  type: 'error',
                  title: 'Supplier Batch DataTable Failed!',
                  showConfirmButton: false,
                  timer: 1500,
                  customClass: 'swal-wide',
              });
          }).DataTable({
              "processing" : false,
              "serverSide" : true,
              "ajax" : {
                  url: "view_batch_supplier_audit_by_stat",
                  "data": function (param){
                      param.supplier_audit_id = arrSuppSendEmail;
                  }
              },            
              "columns":[
                    { "data" : "formatted_audit_date" },
                    { "data" : "audit_type" },
                    { "data" : "auditors" },
                    { "data" : "audit_report_control_no" },
                    { "data" : "label1" },
                    { "data" : "label2" },
                    { "data" : "action1", orderable: false, searchable: false },
              ],
          });//end of dataTableSuppBatchAudits

          // GetDepartmentByStat(1, $("#selGenSuppRepResDept"));

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


            $("#fileAddSuppAuditCorrAct").change(function(){
                if($(this).val() != ""){
                    readCusImageUrl(this, $('#imgAddSuppAuditCorrAct'));
                    // alert(Math.round(this.files[0].size / 1024) + " KB");
                }
                else{
                    $('#imgAddSuppAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                }
            });

            $("#fileAddSuppAuditIllu").change(function(){
                if($(this).val() != ""){
                    readCusImageUrl(this, $('#imgAddSuppAuditIllu'));
                    // alert(Math.round(this.files[0].size / 1024) + " KB");
                }
                else{
                    $('#imgAddSuppAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                }
            });

            $("#chkAddSuppAuditReqForApproval").click(function(){
                if($(this).prop('checked')) {
                    $("#chkAddSuppAuditSendEmail").prop('disabled', 'disabled');
                }
                else{
                    $("#chkAddSuppAuditSendEmail").removeAttr('disabled');
                    $("#chkAddSuppAuditSendEmail").removeAttr('checked');
                }
            });

            $(document).on('click', '.aViewSuppAudit', function(){
                let suppAuditId = $(this).attr('supplier-id');
                GetSuppAuditByIdToView(suppAuditId);
            });

            $(document).on('click', '.aCloseSuppAudit', function(){
                let suppAuditId = $(this).attr('supplier-id');
                $("#txtCloseSuppAuditId").val(suppAuditId);
            });

            $(document).on('click', '.aOpenSuppAudit', function(){
                let suppAuditId = $(this).attr('supplier-id');
                $("#txtOpenSuppAuditId").val(suppAuditId);
            });

            $(document).on('click', '.aDoneSuppAudit', function(){
                let suppAuditId = $(this).attr('supplier-id');
                $("#txtDoneSuppAuditId").val(suppAuditId);
            });

            $(document).on('click', '.aPendSuppAudit', function(){
                let suppAuditId = $(this).attr('supplier-id');
                $("#txtPendSuppAuditId").val(suppAuditId);
            });

            $(document).on('click', '.aEditSupp', function(){
                let suppAuditId = $(this).attr('supplier-id');
                $("#txtEditSuppAuditId").val(suppAuditId);
                GetSuppAuditByIdToEdit(suppAuditId);
            });

            $(document).on('click', '.aChangeSuppAuditStat', function(){
                let suppAuditId = $(this).attr('supplier-id');
                let suppAuditStat = $(this).attr('supplier-audit-stat');
                $("#txtChangeAuditSuppStatAuditId").val(suppAuditId);
                $("#txtChangeAuditSuppStatAuditStat").val(suppAuditStat);

                if(suppAuditStat == 2) {
                    $("#h4ChangeAuditSuppStatTitle").text('Archive Supplier Audit');
                    $("#pChangeAuditSuppStatBody").text('Are you sure to archive supplier audit?');                    
                }
                else {
                    $("#h4ChangeAuditSuppStatTitle").text('Restore Supplier Audit');
                    $("#pChangeAuditSuppStatBody").text('Are you sure to restore supplier audit?');
                }
            });

            $(document).on('click', '.chkSendSuppAudit', function(){
                let suppAuditId = $(this).attr('supplier-id');

                if($(this).prop('checked')){
                    // Checked
                    if(!arrSuppSendEmail.includes(suppAuditId)){
                        arrSuppSendEmail.push(suppAuditId);
                    }
                }
                else{  
                    // Unchecked
                    let index = arrSuppSendEmail.indexOf(suppAuditId);
                    arrSuppSendEmail.splice(index, 1);
                }
                $("#lblSuppNoOfSendSuppBatch").text(arrSuppSendEmail.length);
                if(arrSuppSendEmail.length <= 0){
                    $("#btnShowModalSendSuppBatchEmail").prop('disabled', 'disabled');
                    $("#btnSendSuppBatchEmail").prop('disabled', 'disabled');

                }
                else{
                    $("#btnShowModalSendSuppBatchEmail").removeAttr('disabled');
                    $("#btnSendSuppBatchEmail").removeAttr('disabled');

                }
            });

            $(document).on('click', '.aRemoveSuppInBatch', function(){
                let suppAuditId = $(this).attr('supplier-id');
                let index = arrSuppSendEmail.indexOf(suppAuditId);
                arrSuppSendEmail.splice(index, 1);
                $("#lblSuppNoOfSendSuppBatch").text(arrSuppSendEmail.length);
                if(arrSuppSendEmail.length <= 0){
                    $("#btnShowModalSendSuppBatchEmail").prop('disabled', 'disabled');
                    $("#btnSendSuppBatchEmail").prop('disabled', 'disabled');
                    $("#modalSendSuppBatchEmail").modal('hide');
                }
                else{
                    $("#btnShowModalSendSuppBatchEmail").removeAttr('disabled');
                    $("#btnSendSuppBatchEmail").removeAttr('disabled');
                }

                dataTableSupplierAudits.draw();
                dataTableSuppBatchAudits.draw();
            });

            $("#btnShowModalSendSuppBatchEmail").click(function(){
                dataTableSuppBatchAudits.draw();
                // console.log(arrSuppSendEmail);
            });

            $("#btnSendSuppBatchEmail").click(function(){
                // arrSuppSendEmail = SendSuppBatchMail("{{ csrf_token() }}" , arrSuppSendEmail);
                $.ajax({
                    url: 'send_supplier_batch',
                    method: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        supplier_audit_id: arrSuppSendEmail
                    },
                    dataType: 'json',
                    beforeSend: function(){
                        
                    },
                    success: function(JsonObject){
                        if(JsonObject['result'] == 1){
                            arrSuppSendEmail = [];
                            dataTableSupplierAudits.draw();
                            dataTableSuppBatchAudits.draw();
                            $("#btnShowModalSendSuppBatchEmail").prop('disabled', 'disabled');
                            $("#btnSendSuppBatchEmail").prop('disabled', 'disabled');
                            $("#modalSendSuppBatchEmail").modal('hide');
                            $("#lblSuppNoOfSendSuppBatch").text(arrSuppSendEmail.length);
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

            $("#btnShowAddSuppAuditModal").click(function() {
                GetDepartmentByStat(1, $("#selAddSuppAuditResDept"));
            });

            $("#btnSearchARCNTooAddSupp").click(function(){
                let suppAuditRepCtrlNo = $("#txtAddSuppAuditRepContNo").val();
                GetSuppAuditByRepCtrlNoToAdd(suppAuditRepCtrlNo);
            });

            $("#formAddSuppAudit").submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'add_supplier_audit',
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
                            $("#modalAddSuppAudit").modal('hide');
                            $("#formAddSuppAudit")[0].reset();
                            $('#imgAddSuppAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            $('#imgAddSuppAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                            dataTableSupplierAudits.draw();

                            $("#selAddSuppAuditType").removeClass('border-danger');
                            $("#selAddSuppAuditType").removeAttr('title');
                            $("#dateAddSuppAuditDateFrom").removeClass('border-danger');
                            $("#dateAddSuppAuditDateFrom").removeAttr('title');
                            $("#dateAddSuppAuditDateTo").removeClass('border-danger');
                            $("#dateAddSuppAuditDateTo").removeAttr('title');
                            $("#txtAddSuppAuditBusProcSecSupp").removeClass('border-danger');
                            $("#txtAddSuppAuditBusProcSecSupp").removeAttr('title');
                            $("#txtAddSuppAuditAuditors").removeClass('border-danger');
                            $("#txtAddSuppAuditAuditors").removeAttr('title');
                            $("#txtAddSuppAuditAuditees").removeClass('border-danger');
                            $("#txtAddSuppAuditAuditees").removeAttr('title');
                            $("#txtAddSuppAuditRepContNo").removeClass('border-danger');
                            $("#txtAddSuppAuditRepContNo").removeAttr('title');
                            $("#selAddSuppAuditClassRank").removeClass('border-danger');
                            $("#selAddSuppAuditClassRank").removeAttr('title');
                            $("#selAddSuppAuditCatOfFind").removeClass('border-danger');
                            $("#selAddSuppAuditCatOfFind").removeAttr('title');
                            $("#dateAddSuppAuditFindIssDate").removeClass('border-danger');
                            $("#dateAddSuppAuditFindIssDate").removeAttr('title');
                            $("#dateAddSuppAuditDeadSub").removeClass('border-danger');
                            $("#dateAddSuppAuditDeadSub").removeAttr('title');
                            $("#txtAddSuppAuditDeadSubDays").removeClass('border-danger');
                            $("#txtAddSuppAuditDeadSubDays").removeAttr('title');
                            $("#dateAddSuppAuditActDateSub").removeClass('border-danger');
                            $("#dateAddSuppAuditActDateSub").removeAttr('title');
                            $("#txtAddSuppAuditIsoAitfClause").removeClass('border-danger');
                            $("#txtAddSuppAuditIsoAitfClause").removeAttr('title');
                            $("#txtAddSuppAuditStmtOfFin").removeClass('border-danger');
                            $("#txtAddSuppAuditStmtOfFin").removeAttr('title');
                            $("#txtAddSuppAuditIllu").removeClass('border-danger');
                            $("#txtAddSuppAuditIllu").removeAttr('title');
                            $("#fileAddSuppAuditIllu").removeClass('border-danger');
                            $("#fileAddSuppAuditIllu").removeAttr('title');
                            $("#txtAddSuppAuditCorrAct").removeClass('border-danger');
                            $("#txtAddSuppAuditCorrAct").removeAttr('title');
                            $("#fileAddSuppAuditCorrAct").removeClass('border-danger');
                            $("#fileAddSuppAuditCorrAct").removeAttr('title');

                            $("#selAddSuppAuditPerInCharge").select2('val', 0);
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
                            $("#selAddSuppAuditType").addClass('border-danger');
                            $("#selAddSuppAuditType").attr('title', JsonObject['error']['audit_type']);
                        }
                        else{
                            $("#selAddSuppAuditType").removeClass('border-danger');
                            $("#selAddSuppAuditType").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_date_from'] != undefined){
                            $("#dateAddSuppAuditDateFrom").addClass('border-danger');
                            $("#dateAddSuppAuditDateFrom").attr('title', JsonObject['error']['audit_date_from']);
                        }
                        else{
                            $("#dateAddSuppAuditDateFrom").removeClass('border-danger');
                            $("#dateAddSuppAuditDateFrom").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_date_to'] != undefined){
                            $("#dateAddSuppAuditDateTo").addClass('border-danger');
                            $("#dateAddSuppAuditDateTo").attr('title', JsonObject['error']['audit_date_to']);
                        }
                        else{
                            $("#dateAddSuppAuditDateTo").removeClass('border-danger');
                            $("#dateAddSuppAuditDateTo").removeAttr('title');
                        }

                        if(JsonObject['error']['business_process'] != undefined){
                            $("#txtAddSuppAuditBusProcSecSupp").addClass('border-danger');
                            $("#txtAddSuppAuditBusProcSecSupp").attr('title', JsonObject['error']['business_process']);
                        }
                        else{
                            $("#txtAddSuppAuditBusProcSecSupp").removeClass('border-danger');
                            $("#txtAddSuppAuditBusProcSecSupp").removeAttr('title');
                        }

                        if(JsonObject['error']['auditors'] != undefined){
                            $("#txtAddSuppAuditAuditors").addClass('border-danger');
                            $("#txtAddSuppAuditAuditors").attr('title', JsonObject['error']['auditors']);
                        }
                        else{
                            $("#txtAddSuppAuditAuditors").removeClass('border-danger');
                            $("#txtAddSuppAuditAuditors").removeAttr('title');
                        }

                        if(JsonObject['error']['auditees'] != undefined){
                            $("#txtAddSuppAuditAuditees").addClass('border-danger');
                            $("#txtAddSuppAuditAuditees").attr('title', JsonObject['error']['auditees']);
                        }
                        else{
                            $("#txtAddSuppAuditAuditees").removeClass('border-danger');
                            $("#txtAddSuppAuditAuditees").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_report_control_no'] != undefined){
                            $("#txtAddSuppAuditRepContNo").addClass('border-danger');
                            $("#txtAddSuppAuditRepContNo").attr('title', JsonObject['error']['audit_report_control_no']);
                        }
                        else{
                            $("#txtAddSuppAuditRepContNo").removeClass('border-danger');
                            $("#txtAddSuppAuditRepContNo").removeAttr('title');
                        }

                        if(JsonObject['error']['classification'] != undefined){
                            $("#selAddSuppAuditClassRank").addClass('border-danger');
                            $("#selAddSuppAuditClassRank").attr('title', JsonObject['error']['classification']);
                        }
                        else{
                            $("#selAddSuppAuditClassRank").removeClass('border-danger');
                            $("#selAddSuppAuditClassRank").removeAttr('title');
                        }

                        if(JsonObject['error']['category_of_findings'] != undefined){
                            $("#selAddSuppAuditCatOfFind").addClass('border-danger');
                            $("#selAddSuppAuditCatOfFind").attr('title', JsonObject['error']['category_of_findings']);
                        }
                        else{
                            $("#selAddSuppAuditCatOfFind").removeClass('border-danger');
                            $("#selAddSuppAuditCatOfFind").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_findings_issued_date'] != undefined){
                            $("#dateAddSuppAuditFindIssDate").addClass('border-danger');
                            $("#dateAddSuppAuditFindIssDate").attr('title', JsonObject['error']['audit_findings_issued_date']);
                        }
                        else{
                            $("#dateAddSuppAuditFindIssDate").removeClass('border-danger');
                            $("#dateAddSuppAuditFindIssDate").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission'] != undefined){
                            $("#dateAddSuppAuditDeadSub").addClass('border-danger');
                            $("#dateAddSuppAuditDeadSub").attr('title', JsonObject['error']['deadline_of_submission']);
                        }
                        else{
                            $("#dateAddSuppAuditDeadSub").removeClass('border-danger');
                            $("#dateAddSuppAuditDeadSub").removeAttr('title');
                        }

                        if(JsonObject['error']['deadline_of_submission_days'] != undefined){
                            $("#txtAddSuppAuditDeadSubDays").addClass('border-danger');
                            $("#txtAddSuppAuditDeadSubDays").attr('title', JsonObject['error']['deadline_of_submission_days']);
                        }
                        else{
                            $("#txtAddSuppAuditDeadSubDays").removeClass('border-danger');
                            $("#txtAddSuppAuditDeadSubDays").removeAttr('title');
                        }

                        if(JsonObject['error']['actual_date_of_submission'] != undefined){
                            $("#dateAddSuppAuditActDateSub").addClass('border-danger');
                            $("#dateAddSuppAuditActDateSub").attr('title', JsonObject['error']['actual_date_of_submission']);
                        }
                        else{
                            $("#dateAddSuppAuditActDateSub").removeClass('border-danger');
                            $("#dateAddSuppAuditActDateSub").removeAttr('title');
                        }

                        if(JsonObject['error']['iso_iatf_clause'] != undefined){
                            $("#txtAddSuppAuditIsoAitfClause").addClass('border-danger');
                            $("#txtAddSuppAuditIsoAitfClause").attr('title', JsonObject['error']['iso_iatf_clause']);
                        }
                        else{
                            $("#txtAddSuppAuditIsoAitfClause").removeClass('border-danger');
                            $("#txtAddSuppAuditIsoAitfClause").removeAttr('title');
                        }

                        if(JsonObject['error']['statement_of_findings'] != undefined){
                            $("#txtAddSuppAuditStmtOfFin").addClass('border-danger');
                            $("#txtAddSuppAuditStmtOfFin").attr('title', JsonObject['error']['statement_of_findings']);
                        }
                        else{
                            $("#txtAddSuppAuditStmtOfFin").removeClass('border-danger');
                            $("#txtAddSuppAuditStmtOfFin").removeAttr('title');
                        }

                        if(JsonObject['error']['illustration'] != undefined){
                            $("#txtAddSuppAuditIllu").addClass('border-danger');
                            $("#txtAddSuppAuditIllu").attr('title', JsonObject['error']['illustration']);
                        }
                        else{
                            $("#txtAddSuppAuditIllu").removeClass('border-danger');
                            $("#txtAddSuppAuditIllu").removeAttr('title');
                        }

                        if(JsonObject['error']['img_illustration'] != undefined){
                            $("#fileAddSuppAuditIllu").addClass('border-danger');
                            $("#fileAddSuppAuditIllu").attr('title', JsonObject['error']['img_illustration']);
                        }
                        else{
                            $("#fileAddSuppAuditIllu").removeClass('border-danger');
                            $("#fileAddSuppAuditIllu").removeAttr('title');
                        }

                        if(JsonObject['error']['corrective_action'] != undefined){
                            $("#txtAddSuppAuditCorrAct").addClass('border-danger');
                            $("#txtAddSuppAuditCorrAct").attr('title', JsonObject['error']['corrective_action']);
                        }
                        else{
                            $("#txtAddSuppAuditCorrAct").removeClass('border-danger');
                            $("#txtAddSuppAuditCorrAct").removeAttr('title');
                        }

                        if(JsonObject['error']['img_corrective_action'] != undefined){
                            $("#fileAddSuppAuditCorrAct").addClass('border-danger');
                            $("#fileAddSuppAuditCorrAct").attr('title', JsonObject['error']['img_corrective_action']);
                        }
                        else{
                            $("#fileAddSuppAuditCorrAct").removeClass('border-danger');
                            $("#fileAddSuppAuditCorrAct").removeAttr('title');
                        }
                    },
                    error: function(data, xhr, status){
                        console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                });
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
                            $("#dateEditSuppAuditDateFrom").removeClass('border-danger');
                            $("#dateEditSuppAuditDateFrom").removeAttr('title');
                            $("#dateEditSuppAuditDateTo").removeClass('border-danger');
                            $("#dateEditSuppAuditDateTo").removeAttr('title');
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

                            $("#selEditSuppAuditResDept").select2('val', 0);
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

                        if(JsonObject['error']['audit_date_from'] != undefined){
                            $("#dateEditSuppAuditDateFrom").addClass('border-danger');
                            $("#dateEditSuppAuditDateFrom").attr('title', JsonObject['error']['audit_date_from']);
                        }
                        else{
                            $("#dateEditSuppAuditDateFrom").removeClass('border-danger');
                            $("#dateEditSuppAuditDateFrom").removeAttr('title');
                        }

                        if(JsonObject['error']['audit_date_to'] != undefined){
                            $("#dateEditSuppAuditDateTo").addClass('border-danger');
                            $("#dateEditSuppAuditDateTo").attr('title', JsonObject['error']['audit_date_to']);
                        }
                        else{
                            $("#dateEditSuppAuditDateTo").removeClass('border-danger');
                            $("#dateEditSuppAuditDateTo").removeAttr('title');
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

            $("#formCloseSuppAudit").submit(function(event) {
                event.preventDefault();
                CloseSupplierAudit();
            });
            $("#formOpenSuppAudit").submit(function(event) {
                event.preventDefault();
                OpenSupplierAudit();
            });
            $("#formDoneSuppAudit").submit(function(event) {
                event.preventDefault();
                DoneSupplierAudit();
            });
            $("#formPendSuppAudit").submit(function(event) {
                event.preventDefault();
                PendSupplierAudit();
            });

            $("#fileEditSuppAuditCorrAct").change(function(){
                if($(this).val() != ""){
                    readEditSuppAudit(this, $('#imgEditSuppAuditCorrAct'));
                }
                else{
                    if($("#txtEditSuppAuditCurrCorrAct").val() != ""){
                        var imglink = "{{ asset('public/storage/audit_result_images/supplier/img') }}";
                        imglink = imglink.replace("img", $("#txtEditSuppAuditCurrCorrAct").val());
                        $('#imgEditSuppAuditCorrAct').attr('src', imglink);
                    }
                    else{
                        $('#imgEditSuppAuditCorrAct').attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }
                }
            });

            $("#fileEditSuppAuditIllu").change(function(){
                if($(this).val() != ""){
                    readEditSuppAudit(this, $('#imgEditSuppAuditIllu'));
                }
                else{
                    if($("#txtEditSuppAuditCurrIllu").val() != ""){
                        var imglink = "{{ asset('public/storage/audit_result_images/supplier/img') }}";
                        imglink = imglink.replace("img", $("#txtEditSuppAuditCurrIllu").val());
                        $('#imgEditSuppAuditIllu').attr('src', imglink);
                    }
                    else{
                        $('#imgEditSuppAuditIllu').attr('src', "{{ asset('public/storage/image-icon.png') }}");   
                    }
                }
            });

            $("#formChangeAuditSuppStat").submit(function(event) {
                event.preventDefault();
                ChangeAuditSuppStat();
            });

            // $("#txtEditSuppAuditDeadSubDays").on({
            //     change: function(){
            //         if($(this).val() != ""){
            //             Date.prototype.addDays = function(days) {
            //                 let date = new Date($("#dateEditSuppAuditCreatedAt").val().split(' ')[0]);
            //                 date.setDate(parseInt(days) + date.getDate());
            //                 return date;
            //             }

            //             let date = new Date($("#dateEditSuppAuditCreatedAt").val());

            //             let computedDate = date.addDays($("#txtEditSuppAuditDeadSubDays").val());

            //             let day = computedDate.getDate();
            //             let month = computedDate.getMonth();
            //             let year = computedDate.getFullYear();

            //             if(day < 10){
            //                 day = "0" + day;
            //             }
            //             if((month + 1) < 10){
            //                 month = "0" + (month + 1);
            //             }

            //             $("#dateEditSuppAuditDeadSub").val(year + "-" + month + "-" + day);
            //         }
            //         else{
            //             $("#dateEditSuppAuditDeadSub").val($("#dateEditSuppAuditCurrDeadSub").val());
            //         }
            //     },
            //     keyup: function(){
            //         if($(this).val() != ""){
            //             Date.prototype.addDays = function(days) {
            //                 let date = new Date($("#dateEditSuppAuditCreatedAt").val().split(' ')[0]);
            //                 date.setDate(parseInt(days) + date.getDate());
            //                 return date;
            //             }

            //             let date = new Date($("#dateEditSuppAuditCreatedAt").val());

            //             let computedDate = date.addDays($("#txtEditSuppAuditDeadSubDays").val());

            //             let day = computedDate.getDate();
            //             let month = computedDate.getMonth();
            //             let year = computedDate.getFullYear();

            //             if(day < 10){
            //                 day = "0" + day;
            //             }
            //             if((month + 1) < 10){
            //                 month = "0" + (month + 1);
            //             }

            //             $("#dateEditSuppAuditDeadSub").val(year + "-" + month + "-" + day);
            //         }
            //         else{
            //             $("#dateEditSuppAuditDeadSub").val($("#dateEditSuppAuditCurrDeadSub").val());
            //         }
            //     }
            // });
        });

        function readEditSuppAudit(input, element) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  element.attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

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
                    $("#lblViewSuppAuditDate").text(JsonObject['supplier_audits'][0]['audit_date_from'] + " to " + JsonObject['supplier_audits'][0]['audit_date_to']);
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
                    $("#lblViewSuppAuditCorrAct").text(JsonObject['supplier_audits'][0]['corrective_action']);
                    // $("#lblViewSuppAuditResDept").text(JsonObject['supplier_audits'][0]['department'][0]['department_name']);

                    let resDept = "";
                    for(let index = 0; index < JsonObject['supplier_audits'][0]['supplier_departments'].length; index++){
                        resDept += JsonObject['supplier_audits'][0]['supplier_departments'][index]['departments'][0]['department_name'];
                        
                        if(index < JsonObject['supplier_audits'][0]['supplier_departments'].length - 1){
                            resDept += ", ";
                        }
                    }
                    $("#lblViewSuppAuditResDept").text(resDept);

                    if(JsonObject['supplier_audits'][0]['img_illustration'] != ""){
                        let imgIllulink = "{{ asset('public/storage/audit_result_images/supplier/img') }}";
                        imgIllulink = imgIllulink.replace("img", JsonObject['supplier_audits'][0]['img_illustration']);
                        $("#imgViewSuppAuditIllu").attr('src', imgIllulink);
                    }
                    else{
                        $("#imgViewSuppAuditIllu").attr('src', "{{ asset('public/storage/image-icon.png') }}");   
                    }
                    
                    if(JsonObject['supplier_audits'][0]['img_corrective_action'] != ""){
                        let imgCorrActlink = "{{ asset('public/storage/audit_result_images/supplier/img') }}";
                        imgCorrActlink = imgCorrActlink.replace("img", JsonObject['supplier_audits'][0]['img_corrective_action']);
                        $("#imgViewSuppAuditCorrAct").attr('src', imgCorrActlink);
                    }
                    else{
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
                    // if(JsonObject['supplier_audits'][0]['person_in_charge'] != null){
                    //     $("#lblViewSuppAuditPerInCharge").text(JsonObject['supplier_audits'][0]['person_in_charge_record'].name);
                    // }
                    // else{
                    //     $("#lblViewSuppAuditPerInCharge").text("---");
                    // }

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
                        $("#lblViewSuppAuditStat").text('For Closed-Out');
                    }
                    else{
                        $("#lblViewSuppAuditStat").text('Closed');
                    }
                    $("#lblViewSuppAuditCreatedBy").text(JsonObject['supplier_audits'][0]['user_created_by']['name']);
                    $("#lblViewSuppAuditLastUpdatedBy").text(JsonObject['supplier_audits'][0]['user_last_updated_by']['name']);

                    if(JsonObject['supplier_audits'][0]['person_in_charges'].length > 0){
                        let perInCharges = "";
                        for(let index = 0; index < JsonObject['supplier_audits'][0]['person_in_charges'].length; index++){
                            perInCharges += JsonObject['supplier_audits'][0]['person_in_charges'][index]['person_in_charge_record']['name'];
                            
                            if(index < JsonObject['supplier_audits'][0]['person_in_charges'].length - 1){
                                perInCharges += ", ";
                            }
                        }
                        $("#lblViewSuppAuditPerInCharge").text(perInCharges);
                    }
                    else{
                        $("#lblViewSuppAuditPerInCharge").text("N/A");
                    }
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }

        // this function will not allow to save in another file because of image retrieval failure
        function GetSuppAuditByIdToEdit(suppAuditId){
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
                    $("#selEditSuppAuditType").val(JsonObject['supplier_audits'][0]['audit_type']);
                    $("#txtEditSuppAuditAuditors").val(JsonObject['supplier_audits'][0]['auditors']);
                    $("#txtEditSuppAuditAuditees").val(JsonObject['supplier_audits'][0]['auditees']);
                    $("#dateEditSuppAuditDateFrom").val(JsonObject['supplier_audits'][0]['audit_date_from']);
                    $("#dateEditSuppAuditDateTo").val(JsonObject['supplier_audits'][0]['audit_date_to']);
                    $("#dateEditSuppAuditDeadSub").val(JsonObject['supplier_audits'][0]['deadline_of_submission'])
                    $("#txtEditSuppAuditDeadSubDays").val(JsonObject['supplier_audits'][0]['deadline_of_submission_days']);
                    $("#dateEditSuppAuditActDateSub").val(JsonObject['supplier_audits'][0]['actual_date_of_submission']);
                    $("#dateEditSuppAuditFindIssDate").val(JsonObject['supplier_audits'][0]['audit_findings_issued_date']);
                    $("#txtEditSuppAuditRepContNo").val(JsonObject['supplier_audits'][0]['audit_report_control_no']);
                    $("#txtEditSuppAuditIsoAitfClause").val(JsonObject['supplier_audits'][0]['iso_iatf_clause']);
                    $("#selEditSuppAuditClassRank").val(JsonObject['supplier_audits'][0]['classification']);
                    $("#selEditSuppAuditCatOfFind").val(JsonObject['supplier_audits'][0]['category_of_findings']);
                    $("#txtEditSuppAuditBusProcSecSupp").val(JsonObject['supplier_audits'][0]['business_process']);
                    $("#txtEditSuppAuditStmtOfFin").val(JsonObject['supplier_audits'][0]['statement_of_findings']);
                    $("#txtEditSuppAuditIllu").val(JsonObject['supplier_audits'][0]['illustration']);
                    $("#txtEditSuppAuditCorrAct").val(JsonObject['supplier_audits'][0]['corrective_action']);
                    // $("#selEditSuppAuditResDept").val(JsonObject['supplier_audits'][0]['responsible_department']).trigger('change');

                    let responsible_department = [];
                    for(let index = 0; index < JsonObject['supplier_audits'][0]['supplier_departments'].length; index++){
                        responsible_department.push(JsonObject['supplier_audits'][0]['supplier_departments'][index]['departments'][0].department_id);
                    }

                    $("#selEditSuppAuditResDept").val(responsible_department).trigger('change');

                    if(JsonObject['supplier_audits'][0]['img_illustration'] != ""){
                        let imgIllulink = "{{ asset('public/storage/audit_result_images/supplier/img') }}";
                        imgIllulink = imgIllulink.replace("img", JsonObject['supplier_audits'][0]['img_illustration']);
                        $("#imgEditSuppAuditIllu").attr('src', imgIllulink);
                    }
                    else{
                        $("#imgEditSuppAuditIllu").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }
                    
                    if(JsonObject['supplier_audits'][0]['img_corrective_action'] != ""){
                        let imgCorrActlink = "{{ asset('public/storage/audit_result_images/supplier/img') }}";
                        imgCorrActlink = imgCorrActlink.replace("img", JsonObject['supplier_audits'][0]['img_corrective_action']);
                        $("#imgEditSuppAuditCorrAct").attr('src', imgCorrActlink);
                    }
                    else{
                        $("#imgEditSuppAuditCorrAct").attr('src', "{{ asset('public/storage/image-icon.png') }}");
                    }

                    $("#txtEditSuppAuditCurrIllu").val(JsonObject['supplier_audits'][0]['img_illustration']);
                    $("#txtEditSuppAuditCurrCorrAct").val(JsonObject['supplier_audits'][0]['img_corrective_action']);

                    $("#dateEditSuppAuditCreatedAt").val(JsonObject['supplier_audits'][0]['created_at'].split(' ')[0]);
                    $("#dateEditSuppAuditCurrDeadSub").val(JsonObject['supplier_audits'][0]['deadline_of_submission']);

                    $("#txtEditSuppAuditRootCause").val(JsonObject['supplier_audits'][0]['root_cause']);
                    $("#txtEditSuppAuditImpPlan").val(JsonObject['supplier_audits'][0]['improvement_action']);
                    $("#txtEditSuppAuditCommDate").val(JsonObject['supplier_audits'][0]['commitment_date']);
                    
                    let person_in_charges = [];
                    for(let index = 0; index < JsonObject['supplier_audits'][0]['person_in_charges'].length; index++){
                        person_in_charges.push(JsonObject['supplier_audits'][0]['person_in_charges'][index]['person_in_charge_id']);
                    }

                    $("#selEditSuppAuditPerInCharge").val(person_in_charges).trigger('change');
                },
                error: function(data, xhr, status){
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }
    </script>
@endsection