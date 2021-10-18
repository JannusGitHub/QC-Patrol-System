@extends('layouts.qc_patrol_layout')
@section('title', 'Audit Result')

@section('content')
      <style type="text/css">
        /*table.table tbody td{
            padding-top: 3px; 
            padding-bottom: 1px;
            font-size: 12px;
        }*/

        table{
          color: black;
        }

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
                                <div style="float: right;">
                                    <button class="btn btn-success" id="btnShowSaveAuditResultModal"><i class="icon-plus"></i> Add Audit Result</button>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblAuditResults" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Audit Date</th>
                                                <th>Auditors</th>
                                                <th>Statement of Findings</th>
                                                <th>Responsible Section</th>
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
          </section>
          <!-- // Feather icons section end -->
        </div>
      </div>
    </div>

    <div class="modal fade text-xs-left" id="mdlSaveAuditResult" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg custom-modal-md" role="document">
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
                      <h5 class="form-section"><i class="icon-clipboard4"></i> For QC Patrol Admin</h5>
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
                                  <select class="form-control select2" name="factor_id" style="width: 100%;">
                                      
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="projectinput1">Item List</label>
                                  <select class="form-control select2" name="factor_item_list_id" style="width: 100%;">
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="projectinput1">Classification by Phenomenon</label>
                                  <select class="form-control select2" name="classification_id" style="width: 100%;">
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
                                  <select class="form-control select2" name="product_line_id" style="width: 100%;">
                                  </select>
                              </div>
                          </div>                      
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="projectinput1">Responsible Section</label>
                                  <select class="form-control select2" id="selAddIntAuditResDept" name="section_id[]" style="width: 100%;" multiple="multiple">
                                  </select>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="projectinput1">Statement of Finding</label>
                                  <textarea class="form-control" cols="10" rows="6" id="txtAddIntAuditStmtOfFin" name="statement_of_findings" placeholder="..."></textarea>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <!-- <div class="col-md-3">
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
                          </div> -->
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="projectinput1">Illustration Remarks</label>
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

                          <div class="col-md-4" style="display: none;">
                              <div class="form-group">
                                  <br><br>
                                  <input type="checkbox" id="chkAddIntAuditSendEmail" class="" name="send_email" disabled="disabled">
                                  <label for="projectinput1">Send Email</label>
                              </div>
                          </div>
                      </div>

                      <h5 class="form-section"><i class="icon-clipboard4"></i> For Other Section</h5>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="projectinput1">Root Cause</label>
                                  <textarea class="form-control" cols="10" rows="4" id="txtAddIntAuditRootCause" name="root_cause" placeholder="Root Cause"></textarea>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-8">
                              <div class="form-group">
                                  <label for="projectinput1">Correction</label>
                                  <textarea class="form-control" cols="10" rows="5" id="txtAddIntAuditCorrection" name="correction"></textarea>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <div class="form-group">
                                          <label for="projectinput1">Person In Charge</label>
                                          <input type="text" id="txtAddIntAuditCorrCommDate" class="form-control" name="correction_person_in_charge">
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
                                  <textarea class="form-control" cols="10" rows="5" id="txtAddIntAuditContainment" name="containment"></textarea>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <div class="form-group">
                                          <label for="projectinput1">Person In Charge</label>
                                          <input type="text" class="form-control" id="txtAddIntAuditConPerInCharge" name="containment_person_in_charge">
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
                                  <textarea class="form-control" cols="10" rows="5" id="txtAddIntAuditSystematic" name="systematic"></textarea>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <div class="form-group">
                                          <label for="projectinput1">Person In Charge</label>
                                          <input class="form-control" id="txtAddIntAuditSysPerInCharge" name="systematic_person_in_charge">
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

                      <h5 class="form-section"><i class="icon-clipboard4"></i> For QC Patrol Admin</h5>

                      <div class="row">
                          <!-- <div class="col-md-3">
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
                          </div> -->

                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="projectinput1">Close-Out Audit Remarks</label>
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

@endsection

@section('js_content')
    <script type="text/javascript">
        // -------------------------- FACTOR --------------------------
        let dtAuditResults;
        let selectedAuditResultId = null;
        let selectedAuditResultName = '';

        $(document).ready(function() {
            dtAuditResults = $("#tblAuditResults").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_audit_results",
                    "data": function (param){
                        param.status = 0;
                    }
                },
                
                "columns":[
                    { "data" : "id" },
                    { "data" : "formatted_audit_date" },
                    { "data" : "auditors" },
                    { "data" : "statement_of_findings" },
                    { "data" : "section_details", "render" : "[ / ].section_info.name"},
                    { "data" : "raw_sending_stat" },
                    { "data" : "raw_status" },
                    { "data" : "approval_stat" },
                    { "data" : "raw_action", orderable:false, searchable:false }
                ],
            });//end of dtAuditResults

        $(".select2").select2();

        $("#btnShowSaveAuditResultModal").click(function(){
          $("#mdlSaveAuditResult").modal('show');
          $("#frmSaveAuditResult")[0].reset();
        });

        $("#tblAuditResults").on('click', '.btnEditAuditResult', function(){
          let id = $(this).attr('audit_result-id');
          $("input[name='audit_result_id'", $("#frmSaveAuditResult")).val(id);
          GetAuditResultById(id);
          $("#mdlSaveAuditResult").modal('show');
        });

        $("#frmSaveAuditResult").submit(function(e){
          e.preventDefault();
          SaveAuditResult();
        });

        $("#tblAuditResults").on('click', '.btnActionAuditResult', function(){
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

        $('select[name="factor_id"]', $("#frmSaveAuditResult")).select2({
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

        $('select[name="factor_item_list_id"]', $("#frmSaveAuditResult")).select2({
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
                  factor_id: $('select[name="factor_id"]', $("#frmSaveAuditResult")).val(),
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

        // $('select[name="factor_item_list_id"]', $("#frmSaveAuditResult")).select2({
        //   tags: true,
        //   multiple: true,
        //   createSearchChoice: function(term, data) {
        //     if (!data.length)
        //       return { id: term, text: term };
        //     },
        //   ajax: {
        //     url: 'get_cbo_factor_item_lists_by_stat',
        //     dataType: 'json'
        //   }
        // });

        $('select[name="classification_id"]', $("#frmSaveAuditResult")).select2({
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

        $('select[name="product_line_id"]', $("#frmSaveAuditResult")).select2({
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

      });

    </script>
@endsection