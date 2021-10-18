@extends('layouts.qc_patrol_layout')
@section('title', 'Audit Result Finding')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Audit Result Finding</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Audit Result Finding
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
                                    <button class="btn btn-success" id="btnShowSaveARFindingModal"><i class="icon-plus"></i> Add Audit Result Finding</button>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblARFindings" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Department</th>
                                                <th>Audit Result Finding</th>
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
              </div>
          </section>
          <!-- // Feather icons section end -->
        </div>
      </div>
    </div>

    <div class="modal fade text-xs-left" id="mdlSaveARFinding" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveARFinding">
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
                            <label for="projectinput1">Audit Result Finding</label>
                            <input type="text" class="form-control" placeholder="ARFinding ID" name="ar_finding_id" style="display: none;">
                            <input type="text" class="form-control" placeholder="ARFinding" name="name">
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
        let dtARFindings;
        let selectedARFindingId = null;
        let selectedARFindingName = '';

        $(document).ready(function() {
            dtARFindings = $("#tblARFindings").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_ar_findings",
                    "data": function (param){
                        param.status = 0;
                    }
                },
                
                "columns":[
                    { "data" : "raw_department" },
                    { "data" : "name" },
                    { "data" : "raw_status" },
                    { "data" : "raw_action", orderable:false, searchable:false }
                ],
            });//end of dtARFindings
        });

        $("#btnShowSaveARFindingModal").click(function(){
          $("#mdlSaveARFinding").modal('show');
        });

        $("#tblARFindings").on('click', '.btnEditARFinding', function(){
          let id = $(this).attr('ar_finding-id');
          $("input[name='ar_finding_id'", $("#frmSaveARFinding")).val(id);
          GetARFindingById(id);
          $("#mdlSaveARFinding").modal('show');
        });

        $("#frmSaveARFinding").submit(function(e){
          e.preventDefault();
          SaveARFinding();
        });

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


    </script>
@endsection