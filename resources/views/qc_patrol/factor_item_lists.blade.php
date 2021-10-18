@extends('layouts.master_layout')
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
                  <div class="col-xs-6">
                      <div class="card">
                          <div class="card-body collapse in">
                              <div class="card-block">
                                <div style="float: right;">
                                    <button class="btn btn-success" id="btnShowSaveFactorItemListModal"><i class="icon-plus"></i> Add Factor Item List</button>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblFactorItemList" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Factor</th>
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

    <div class="modal fade text-xs-left" id="mdlSaveFactorItemList" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveFactorItemList">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-info"></i> Factor Item List Details</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Item</label>
                            <input type="text" class="form-control" placeholder="Factor Item List ID" name="factor_item_list_id" style="display: none;">
                            <input type="text" class="form-control" placeholder="Item" name="name">
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
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> <span id="spanFactorActionTitle">Archive Factor Item List</span></h4>
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
        let dtFactorItemLists;
        $(document).ready(function() {
            dtFactorItemLists = $("#tblFactorItemList").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_factor_item_lists",
                    "data": function (param){
                        param.status = 0;
                    }
                },
                
                "columns":[
                    { "data" : "name" },
                    { "data" : "raw_status" },
                    { "data" : "raw_action", orderable:false, searchable:false }
                ],
            });//end of dtFactorItemLists
        });

        $("#btnShowSaveFactorItemListModal").click(function(){
          $("#mdlSaveFactorItemList").modal('show');
        });

        $("#tblFactorItemList").on('click', '.btnEditFactorItemList', function(){
          let id = $(this).attr('factor-item-list-id');
          $("input[name='factor_item_list_id'", $("#frmSaveFactorItemList")).val(id);
          GetFactorItemListById(id);
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

        
    </script>
@endsection