@extends('layouts.master_layout')
@section('title', 'AQMS Audit Schedule Details')

@section('content')
    <style type="text/css">
        .center-table-cell {
            text-align: center;
        }
        .custom-modal-xl{
            width: 95%!important;
            min-width: 90%!important;
        }
        .custom-modal-lg{
            width: 75%!important;
            min-width: 70%!important;
        }
        .btn-blue{
            background-color: #007bff;
        }
    </style>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">AQMS Audit Schedule Details</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">AQMS Audit Schedule Details
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
                              <div class="card-block" id="divCardBlockAQMS">
                                <div class="row">
                                  <div class="col-md-3">
                                      <h2>{{ $aqms_schedule_details->title }}</h2>
                                      <h5>Scope : {{ $aqms_schedule_details->scope }}</h5>
                                      <h5>Reference Stds : {{ $aqms_schedule_details->reference_stds }}</h5>
                                      <h5>Method : {{ $aqms_schedule_details->method }}</h5>
                                  </div>
                                  <div class="col-md-7">
                                      <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-sm" id="tblRevisionHistories">
                                          <thead>
                                            <tr>
                                              <th colspan="2">Revision History</th>
                                              <th>Prepared</th>
                                              <th>Checked</th>
                                              <th>Approved</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <!-- Code generated -->
                                          </tbody>
                                        </table>
                                      </div>
                                  </div>
                                </div>

                                <div style="float: right;">
                                    <button class="btn btn-success" id="btnShowAddAQMSSchedModal" data-toggle="modal" data-target="#modalAddAQMSSched" data-keyboard="false"><i class=""></i> Add AQMS Schedule</button>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblAQMSchedules" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">
                                                    Organizational Unit / Process <br> 
                                                    OPERATIONS DIVISION 
                                                </th>
                                                <th rowspan="2" class="center-table-cell">Process Owner</th>
                                                <th rowspan="2" class="center-table-cell">Internal Auditor</th>

                                                <!-- Auto generate here -->
                                                <th colspan="4" class="center-table-cell">FY 2019</th>
                                            </tr>
                                            <tr>
                                                <th class="center-table-cell">Apr-June</th>
                                                <th class="center-table-cell">July-Sept</th>
                                                <th class="center-table-cell">Oct-Dec</th>
                                                <th class="center-table-cell">Jan-Mar</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <br><br>
                                </div>

                                <div style="float: right;" class="row">
                                  <div class="col-sm-2 table-responsive">
                                    <table class="table table-bordered table-xs">
                                      <thead>
                                        <tr>
                                          <th colspan="3" class="center-table-cell">Legends</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td><span class="tag btn-blue">Plan</span></td>
                                          <td><span class="tag tag-warning">Actual</span></td>
                                          <td><span class="tag tag-success">Reschedule</span></td>
                                        </tr>
                                      </tbody>
                                    </table>
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

    <!-- AQMS AUDIT SCHEDULE MODALS -->
    <div class="modal fade text-xs-left" id="modalAddAQMSSched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-lg custom-modal-lg" role="document">
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
                              <input type="hidden" class="form-control" name="audit_schedule_detail_id" id="txtAddAQMSSchedDEtailsId" value="{{ $aqms_schedule_details->id }}">
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
                      <button type="button" class="btn btn-success btn-sm" id="btnAddNewAQMSAuditSchedYear"><i class="icon icon-plus3"></i> Add New</button>
                  </div>
                  <br><br>

                  <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped table-sm" id="tblAddAQMSAuditSched">
                      <thead>
                        <th>Year</th>
                        <th>Plan</th>
                        <th>Actual</th>
                        <th>Reschedule</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <br>
                            <input type="number" name="year[]" class="form-control form-control-sm txtAddAQMSSchedYear">    
                          </td>
                          <td>
                            <div class="input-group">
                                <span class="input-group-addon">From</span>
                                <input type="date" name="plan_from[]" class="form-control form-control-sm txtAddAQMSSchedPlanFrom" required="true"> 
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">To</span>
                                <input type="date" name="plan_to[]" class="form-control form-control-sm txtAddAQMSSchedPlanTo" required="true">
                            </div>
                          </td>
                          <td>
                            <div class="input-group">
                                <span class="input-group-addon">From</span>
                                <input type="date" name="actual_from[]" class="form-control form-control-sm txtAddAQMSSchedActualFrom"> 
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">To</span>
                                <input type="date" name="actual_to[]" class="form-control form-control-sm txtAddAQMSSchedActualTo">
                            </div>
                          </td>
                          <td>
                            <div class="input-group">
                                <span class="input-group-addon">From</span>
                                <input type="date" name="reschedule_from[]" class="form-control form-control-sm txtAddAQMSSchedReSchedFrom"> 
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">To</span>
                                <input type="date" name="reschedule_to[]" class="form-control form-control-sm txtAddAQMSSchedReSchedTo">
                            </div>
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
@endsection

@section('js_content')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2();
            GetCboUsersByStat2(0, $(".selUsers"));
            // GetDepartmentByStat(1, $(".selAreas"));

            $("#btnAddNewAQMSAuditSchedYear").click(function(){                
                let htmlContent = '';

                htmlContent += '<tr>';
                  htmlContent += '<td>';
                    htmlContent += '<br>';
                    htmlContent += '<input type="number" name="year[]" class="form-control form-control-sm txtAddAQMSSchedYear">';
                  htmlContent += '</td>';
                  htmlContent += '<td>';
                    htmlContent += '<div class="input-group">';
                        htmlContent += '<span class="input-group-addon">From</span>';
                        htmlContent += '<input type="date" name="plan_from[]" class="form-control form-control-sm txtAddAQMSSchedPlanFrom" required="true"> ';
                    htmlContent += '</div>';
                    htmlContent += '<div class="input-group">';
                        htmlContent += '<span class="input-group-addon">To</span>';
                        htmlContent += '<input type="date" name="plan_to[]" class="form-control form-control-sm txtAddAQMSSchedPlanTo" required="true">';
                    htmlContent += '</div>';
                  htmlContent += '</td>';
                  htmlContent += '<td>';
                    htmlContent += '<div class="input-group">';
                        htmlContent += '<span class="input-group-addon">From</span>';
                        htmlContent += '<input type="date" name="actual_from[]" class="form-control form-control-sm txtAddAQMSSchedActualFrom"> ';
                    htmlContent += '</div>';
                    htmlContent += '<div class="input-group">';
                        htmlContent += '<span class="input-group-addon">To</span>';
                        htmlContent += '<input type="date" name="actual_to[]" class="form-control form-control-sm txtAddAQMSSchedActualTo">';
                    htmlContent += '</div>';
                  htmlContent += '</td>';
                  htmlContent += '<td>';
                    htmlContent += '<div class="input-group">';
                        htmlContent += '<span class="input-group-addon">From</span>';
                        htmlContent += '<input type="date" name="reschedule_from[]" class="form-control form-control-sm txtAddAQMSSchedReSchedFrom"> ';
                    htmlContent += '</div>';
                    htmlContent += '<div class="input-group">';
                        htmlContent += '<span class="input-group-addon">To</span>';
                        htmlContent += '<input type="date" name="reschedule_to[]" class="form-control form-control-sm txtAddAQMSSchedReSchedTo">';
                    htmlContent += '</div>';
                  htmlContent += '</td>';
                  htmlContent += '<td><center><button type="button" class="btn btn-danger btn-sm btnRemoveAQMSAuditSchedYear" title="Remove"><i class="icon-remove"></i></button></center></td>';
                htmlContent += '</tr>';

                $("#tblAddAQMSAuditSched tbody").append(htmlContent);
                $(".txtAddAQMSSchedYear").focus();
            });

            $("#tblAddAQMSAuditSched tbody").on('click', '.btnRemoveAQMSAuditSchedYear', function(){
                $(this).closest('tr').remove();
                $(".txtAddAQMSSchedYear").focus();
            });
        });
    </script>
@endsection