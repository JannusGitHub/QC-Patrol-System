@extends('layouts.master_layout')
@section('title', 'Approver')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Approver</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Approver
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
                                      <button class="btn btn-success" id="btnShowAddApproverModal" data-toggle="modal" data-target="#modalAddApprover" data-keyboard="false"><i class=""></i> Add Approver</button>
                                  </div>
                                  <br><br>
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-hover" id="tblApprover" width="100%">
                                          <thead>
                                              <tr>
                                                  <th>Department ID</th>
                                                  <th>Department Name</th>
                                                  <th>Approver Name</th>
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
    <!-- ////////////////////////////////////////////////////////////////////////////-->

  <!-- APPROVER MODALS -->
    <div class="modal fade text-xs-left" id="modalAddApprover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddApprover">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Approver</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Department</label>
                            <select class="form-control select2 selDepartments" id="selAddApproverDept" name="department_id" style="width: 100%;">
                                <!-- code generated -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="projectinput1">Approver</label>
                            <select class="form-control select2 selectUser" id="selAddApproverApprover" name="approver" style="width: 100%;">
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

    <!-- Modal Remove Approver -->
    <div class="modal fade text-xs-left" id="modalRemoveApprover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRemoveApprover">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Remove Approver</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to remove this selected Approver?</p>
                    <input type="hidden" name="approver_id" id="txtRemoveApproverId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
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
          GetDepartmentByStat(1, $(".selDepartments"));
          GetCboUsersByStatNullable(1, $(".selectUser"));
        });

        // -------------------------- APPROVER --------------------------
        let dataTableApprover;
        $(document).ready(function() {
            let groupColumn = 0;
            dataTableApprover = $("#tblApprover").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_approver_by_stat",
                },
                
                "columns":[
                    { "data" : "department.department_id", "title" : "Department ID" },
                    { "data" : "department.department_name", "title" : "Department Name" },
                    { "data" : "approver_info.name" },
                    { "data" : "action1", orderable:false, searchable:false }
                ],

                "columnDefs": [
                    { "visible": false, "targets": groupColumn },
                    { "visible": false, "targets": 1 }
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
                          departmentId = data.department.department_id;
                          departmentName = data.department.department_name;

                            $(rows).eq( i ).before(
                                '<tr class="group" style="background-color: #abc8d9;"><td colspan="3" style="text-align:center;"><b>' + departmentName + '</b></td></tr>'
                            );
         
                            last = group;
                        }
                    } );
                }
            });//end of dataTableApprover

            $("#formAddApprover").submit(function(event){
                event.preventDefault();
                AddApprover();
            });

            $(document).on('click', '.aRemoveApprover', function(){
                let approverId = $(this).attr('approver-id');
                $("#txtRemoveApproverId").val(approverId);
            });

            $("#formRemoveApprover").submit(function(event){
                event.preventDefault();
                RemoveApprover();
            });

            $(document).on('click', '.aRemoveApprover', function(){
              let approverId = $(this).attr('approver-id');
              $("#txtRemoveApproverId").val(approverId);
            });
        });
    </script>
@endsection