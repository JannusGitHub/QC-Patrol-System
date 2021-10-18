@extends('layouts.qc_patrol_layout')
@section('title', 'Checksheet')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Checksheet</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Checksheet
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
                                    <button class="btn btn-success" id="btnShowSaveProductLineModal"><i class="icon-plus"></i> Add Checksheet</button>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblProductLines" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Checksheet</th>
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

    <div class="modal fade text-xs-left" id="mdlSaveProductLine" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveProductLine">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-info"></i> Checksheet Details</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Checksheet</label>
                            <input type="text" class="form-control" placeholder="ProductLine ID" name="product_line_id" style="display: none;">
                            <input type="text" class="form-control" placeholder="ProductLine" name="name">
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

    <div class="modal fade text-xs-left" id="mdlActionProductLine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmActionProductLine">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> <span id="spanProductLineActionTitle">Archive Checksheet</span></h4>
              </div>
              <div class="modal-body">
                    <p>Please confirm to continue?</p>
                    <input type="text" name="product_line_id" style="display: none;">
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
        let dtProductLines;
        let selectedProductLineId = null;
        let selectedProductLineName = '';

        $(document).ready(function() {
            dtProductLines = $("#tblProductLines").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_factors",
                    "data": function (param){
                        param.status = 0;
                    }
                },
                
                "columns":[
                    { "data" : "name" },
                    { "data" : "raw_status" },
                    { "data" : "raw_action", orderable:false, searchable:false }
                ],
            });//end of dtProductLines
        });

        $("#btnShowSaveProductLineModal").click(function(){
          $("#mdlSaveProductLine").modal('show');
        });

        $("#tblProductLines").on('click', '.btnEditProductLine', function(){
          let id = $(this).attr('product_line-id');
          $("input[name='product_line_id'", $("#frmSaveProductLine")).val(id);
          GetProductLineById(id);
          $("#mdlSaveProductLine").modal('show');
        });

        $("#frmSaveProductLine").submit(function(e){
          e.preventDefault();
          SaveProductLine();
        });

        $("#tblProductLines").on('click', '.btnActionProductLine', function(){
          let id = $(this).attr('product_line-id');
          let status = $(this).attr('status');
          $("input[name='product_line_id'", $("#frmActionProductLine")).val(id);
          $("input[name='status'", $("#frmActionProductLine")).val(status);
          $("#mdlActionProductLine").modal('show');
        });

        $("#frmActionProductLine").submit(function(e){
          e.preventDefault();
          ActionProductLine();
        });


    </script>
@endsection