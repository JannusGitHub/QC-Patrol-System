@extends('layouts.master_layout')
@section('title', 'Email Recipient')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Email Recipient</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Email Recipient
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
                                      <button class="btn btn-success" id="btnShowAddEmailRecipientModal" data-toggle="modal" data-target="#modalAddEmailRecipient" data-keyboard="false"><i class=""></i> Add Email Recipient</button>
                                  </div>
                                  <br><br>
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-hover" id="tblEmailRecipient" width="100%">
                                          <thead>
                                              <tr>
                                                  <th>Department ID</th>
                                                  <th>Department Name</th>
                                                  <th>Receiver</th>
                                                  <th>Email</th>
                                                  <th>Address Type</th>
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

  <!-- EMAIL RECIPIENT MODALS -->
    <div class="modal fade text-xs-left" id="modalAddEmailRecipient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddEmailRecipient">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Email Recipient</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Section</label>
                            <select class="form-control select2 selDepartments" id="selAddEmailRecDept" name="section_id" style="width: 100%;">
                                <!-- code generated -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="projectinput1">Receiver</label>
                            <select class="form-control select2 selectUser" id="selAddEmailRecReceiver" name="receiver" style="width: 100%;">
                                <!-- code generated -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="projectinput1">Address Type</label>
                            <select class="form-control" id="selAddEmailRecAddType" name="address_type">
                              <option value="0" disabled="disabled" selected>-- Select Address Type --</option>
                              <option value="1">Attention To</option>
                              <option value="2">Carbon Copy</option>
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

    <!-- Modal Remove Email Recipient -->
    <div class="modal fade text-xs-left" id="modalRemoveEmailRecipient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRemoveEmailRecipient">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Remove Email Recipient</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to remove this selected Email Recipient?</p>
                    <input type="hidden" name="email_recipient_id" id="txtRemoveEmailRecipientId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Restore Email Recipient -->
    <!-- <div class="modal fade text-xs-left" id="modalRestoreEmailRecipient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreEmailRecipient">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore Email Recipient</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected Email Recipient?</p>
                    <input type="hidden" name="quads_recipient_id" id="txtRestoreEmailRecipientId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div> -->

    <!-- Modal Edit Email Recipient -->
    <!-- <div class="modal fade text-xs-left" id="modalEditEmailRecipient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditEmailRecipient">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit Email Recipient</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Email Recipient Name</label>
                            <input type="hidden" id="txtEditEmailRecipientId" class="form-control" placeholder="Email Recipient ID" name="quads_recipient_id">
                            <input type="text" id="txtEditEmailRecipientName" class="form-control" placeholder="Email Recipient Name" name="quads_recipient_name">
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
    </div> -->
@endsection

@section('js_content')
    <script type="text/javascript">
        // COMMON JAVASCRIPT CODES
        $(document).ready(function(){
          $(".select2").select2();
          GetDepartmentByStat(1, $(".selDepartments"));
          GetCboUsersByStatNullable(1, $(".selectUser"));
        });

        // -------------------------- EMAIL RECIPIENT --------------------------
        let dataTableEmailRecipient;
        $(document).ready(function() {
            let groupColumn = 0;
            dataTableEmailRecipient = $("#tblEmailRecipient").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_email_recipient_by_stat",
                },
                
                "columns":[
                    { "data" : "department.department_id", "title" : "Department ID" },
                    { "data" : "department.department_name", "title" : "Department Name" },
                    { "data" : "receiver_info.name" },
                    { "data" : "receiver_info.email" },
                    { "data" : "address_type_label" },
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
                                '<tr class="group" style="background-color: #abc8d9;"><td colspan="4" style="text-align:center;"><b>' + departmentName + '</b></td></tr>'
                            );
         
                            last = group;
                        }
                    } );
                }
            });//end of dataTableEmailRecipient

            $("#formAddEmailRecipient").submit(function(event){
                event.preventDefault();
                AddEmailRecipient();
            });

            $(document).on('click', '.aRemoveEmailRecipient', function(){
                let emailRecipientId = $(this).attr('email-recipient-id');
                $("#txtRemoveEmailRecipientId").val(emailRecipientId);
            });

            $("#formRemoveEmailRecipient").submit(function(event){
                event.preventDefault();
                RemoveEmailRecipient();
            });

            $('select[name="section_id"]', $("#formAddEmailRecipient")).select2({
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

            $('select[name="receiver"]', $("#formAddEmailRecipient")).select2({
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
        });
    </script>
@endsection