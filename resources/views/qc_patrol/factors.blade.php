@extends('layouts.qc_patrol_layout')
@section('title', 'Factors')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Factors & Item List</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Factors & Item List
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Feather icons section start -->
          <section id="feather-icons">
              <div class="row">
                  <div class="col-xs-5">
                      <div class="card">
                          <div class="card-body collapse in">
                              <div class="card-block">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Layer</span>
                                        <select class="form-control" name="layer" id="selFilByLayer">
                                          <option value="1" selected="true">Layer 1</option>
                                          <option value="2">Layer 2</option>
                                          <option value="3">Layer 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div style="float: right;">
                                        <button class="btn btn-success" id="btnShowSaveFactorModal"><i class="icon-plus"></i> Add Factor</button>
                                    </div>
                                  </div>
                                </div>

                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblFactors" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 70%;">Factor</th>
                                                <!-- <th>Status</th> -->
                                                <th style="width: 30%;">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <br><br>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-xs-7">
                      <div class="card">
                          <div class="card-body collapse in">

                              <div class="card-block">
                                <div style="float: left;">
                                    <label><b>Selected Factor: <u><span id="spanSelFactor">No selected</span></u></b></label>
                                </div>
                                <div style="float: right;">
                                    <button class="btn btn-success" id="btnShowSaveFactorItemListModal"><i class="icon-plus"></i> Add Item</button>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblFactorItemList" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 60%">Item</th>
                                                <!-- <th>Status</th> -->
                                                <th style="width: 15%"><i class="fa fa-check-circle text-success" style="font-size: 20px;"></i> or <i class="fa fa-times-circle text-danger" style="font-size: 20px;"></i></th>
                                                <th style="width: 15%">Remarks</th>
                                                <th style="width: 10%">Action</th>
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

    <div class="modal fade text-xs-left" id="mdlSaveFactor" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveFactor">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-info"></i> Factor Details</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Factor</label>
                            <input type="text" class="form-control" placeholder="Factor ID" name="factor_id" style="display: none;">
                            <input type="text" class="form-control" placeholder="Factor" name="name">
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

    <div class="modal fade text-xs-left" id="mdlActionFactor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmActionFactor">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> <span id="spanFactorActionTitle">Archive Factor</span></h4>
              </div>
              <div class="modal-body">
                    <p>Please confirm to continue?</p>
                    <input type="text" name="factor_id" style="display: none;">
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

    <!-- ITEM LIST  -->
    <div class="modal fade text-xs-left" id="mdlSaveFactorItemList" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveFactorItemList">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-info"></i> Item Details</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                      <div class="form-group">
                            <label for="projectinput1">Factor</label>
                            <input type="text" class="form-control" placeholder="Factor ID" name="factor_id" style="display: none;" readonly="true">
                            <input type="text" class="form-control" placeholder="Layer" name="layer" style="display: none;" readonly="true">
                            <input type="text" class="form-control" placeholder="Factor Name" name="factor_name" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">Item</label>
                            <input type="text" class="form-control" placeholder="Factor Item List ID" name="factor_item_list_id" style="display: none;">
                            <input type="text" class="form-control" placeholder="Item" name="name">
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">Remarks</label>
                            <div class="input-group">
                                <span class="input-group-addon"><input type="checkbox" name="item_status" value="1" checked="true" title="Uncheck to enable remarks"></span>
                                <input type="text" class="form-control" placeholder="Remarks" name="remarks" readonly="true">
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

    <div class="modal fade text-xs-left" id="mdlActionFactorItemList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmActionFactorItemList">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> <span id="spanFactorActionTitle">Archive Item</span></h4>
              </div>
              <div class="modal-body">
                    <p>Please confirm to continue?</p>
                    <input type="text" name="factor_item_list_id" style="display: none;">
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
        let dtFactors;
        let selectedFactorId = null;
        let selectedFactorName = '';

        $(document).ready(function() {
            dtFactors = $("#tblFactors").DataTable({
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
                    // { "data" : "raw_status" },
                    { "data" : "raw_action", orderable:false, searchable:false }
                ],
            });//end of dtFactors
        });

        $("#btnShowSaveFactorModal").click(function(){
          $("#mdlSaveFactor").modal('show');
        });

        $("#tblFactors").on('click', '.btnEditFactor', function(){
          let id = $(this).attr('factor-id');
          $("input[name='factor_id'", $("#frmSaveFactor")).val(id);
          GetFactorById(id);
          $("#mdlSaveFactor").modal('show');
        });

        $("#frmSaveFactor").submit(function(e){
          e.preventDefault();
          SaveFactor();
        });

        $("#tblFactors").on('click', '.btnActionFactor', function(){
          let id = $(this).attr('factor-id');
          let status = $(this).attr('status');
          $("input[name='factor_id'", $("#frmActionFactor")).val(id);
          $("input[name='status'", $("#frmActionFactor")).val(status);
          $("#mdlActionFactor").modal('show');
        });

        $("#frmActionFactor").submit(function(e){
          e.preventDefault();
          ActionFactor();
        });


    </script>

    <!-- ITEM LIST -->
    <script type="text/javascript">
        let dtFactorItemLists;
        $(document).ready(function() {
            dtFactorItemLists = $("#tblFactorItemList").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_factor_item_lists",
                    data: function (param){
                        param.factor_id = selectedFactorId;
                        param.layer = $('#selFilByLayer').val();
                    }
                },
                
                "columns":[
                    { "data" : "name" },
                    { "data" : "raw_item_status" },
                    { "data" : "remarks" },
                    { "data" : "raw_action", orderable:false, searchable:false }
                ],
                'order': [[0, 'asc']]
            });//end of dtFactorItemLists
        });

        $("#btnShowSaveFactorItemListModal").click(function(){
          $("input[name='remarks'", $("#frmSaveFactorItemList")).attr('text-value', '');
          $("input[name='remarks'", $("#frmSaveFactorItemList")).val('');
          if(selectedFactorId != null){
            $("#mdlSaveFactorItemList").modal('show');
            $("input[name='factor_id'", $("#frmSaveFactorItemList")).val(selectedFactorId);
            $("input[name='factor_name'", $("#frmSaveFactorItemList")).val(selectedFactorName);
            $("input[name='layer'", $("#frmSaveFactorItemList")).val($('#selFilByLayer').val());
          }
          else{
            Swal({
                position: 'top-end',
                type: 'warning',
                title: 'Please select factor first.',
                showConfirmButton: false,
                timer: 1500,
                customClass: 'swal-wide',
            });
          }
          $("input[name='factor_name'", $("#frmSaveFactorItemList")).val(selectedFactorName);
        });

        $("#tblFactorItemList").on('click', '.btnEditFactorItemList', function(){
          let id = $(this).attr('factor-item-list-id');
          $("input[name='factor_item_list_id'", $("#frmSaveFactorItemList")).val(id);
          GetFactorItemListById(id);
          $("input[name='factor_name'", $("#frmSaveFactorItemList")).val(selectedFactorName);
          $("#mdlSaveFactorItemList").modal('show');
        });

        $("#frmSaveFactorItemList").submit(function(e){
          e.preventDefault();
          SaveFactorItemList();
        });

        $("#tblFactorItemList").on('click', '.btnActionFactorItemList', function(){
          let id = $(this).attr('factor-item-list-id');
          let status = $(this).attr('status');
          $("input[name='factor_item_list_id'", $("#frmActionFactorItemList")).val(id);
          $("input[name='status'", $("#frmActionFactorItemList")).val(status);
          $("#mdlActionFactorItemList").modal('show');
        });

        $("#frmActionFactorItemList").submit(function(e){
          e.preventDefault();
          ActionFactorItemList();
        });

        $("#tblFactors").on('click', '.btnSelectFactor', function(){
          let id = $(this).attr('factor-id');
          let factorName = $(this).attr('factor-name'); 
          selectedFactorId = id;
          selectedFactorName = factorName;
          $("#spanSelFactor").text(selectedFactorName);
          dtFactorItemLists.draw();

        });

        $('#selFilByLayer').change(function(){
          dtFactorItemLists.draw();
        });

        $("input[name='item_status'", $("#frmSaveFactorItemList")).click(function(){
          if($(this).prop('checked')){
            $("input[name='remarks'", $("#frmSaveFactorItemList")).prop('readonly', true);
            $("input[name='remarks'", $("#frmSaveFactorItemList")).val('');
          }
          else{
            $("input[name='remarks'", $("#frmSaveFactorItemList")).prop('readonly', false);
            $("input[name='remarks'", $("#frmSaveFactorItemList")).val($("input[name='remarks'", $("#frmSaveFactorItemList")).attr('text-value'));
          }
        });

    </script>
@endsection