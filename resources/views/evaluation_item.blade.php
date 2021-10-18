@extends('layouts.master_layout')
@section('title', 'Evaluation Items')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Evaluation Items</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Evaluation Items
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
                                    <button class="btn btn-success" id="btnShowAddEvaluationItemModal" data-toggle="modal" data-target="#modalAddEvaluationItem" data-keyboard="false"><i class=""></i> Add Evaluation Item</button>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblEvaluationItem" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Evaluation Item</th>
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
    <!-- ////////////////////////////////////////////////////////////////////////////-->

  <!-- EVALUATION ITEM MODALS -->
    <div class="modal fade text-xs-left" id="modalAddEvaluationItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddEvaluationItem">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Evaluation Item</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Evaluation Item</label>
                            <input type="text" id="txtAddStdClauseName" class="form-control" placeholder="Evaluation Item" name="evaluation_item_name">
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

    <!-- Modal Archive Evaluation Item -->
    <div class="modal fade text-xs-left" id="modalArchiveEvaluationItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formArchiveEvaluationItem">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Archive Evaluation Item</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to archive this selected evaluation item?</p>
                    <input type="hidden" name="evaluation_item_id" id="txtArchiveEvaluationItemId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Restore Evaluation Item -->
    <div class="modal fade text-xs-left" id="modalRestoreEvaluationItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreEvaluationItem">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore Evaluation Item</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected evaluation item?</p>
                    <input type="hidden" name="evaluation_item_id" id="txtRestoreEvaluationItemId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit Evaluation Item -->
    <div class="modal fade text-xs-left" id="modalEditEvaluationItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditEvaluationItem">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit Evaluation Item</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Evaluation Item Name</label>
                            <input type="hidden" id="txtEditEvaluationItemId" class="form-control" placeholder="Evaluation Item ID" name="evaluation_item_id">
                            <input type="text" id="txtEditEvaluationItemName" class="form-control" placeholder="Evaluation Item Name" name="evaluation_item_name">
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
    </div>


    <!-- EVALUATION ITEM CONTENT MODALS -->
    <div class="modal fade text-xs-left" id="modalAddEvaluationItemContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddEvaluationItemContent">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Evaluation Item Content</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Evaluation Item Content</label>
                            <input type="text" id="txtAddStdClauseContentName" class="form-control" placeholder="Evaluation Item Content" name="evaluation_item_content_name">
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">Evaluation Item</label>
                            <select class="form-control" id="selAddStdClauseId" name="evaluation_item_id">
                                <option disabled selected>-- Select Evaluation Item ---</option>
                            </select>
                        </div>
                        <div class="form-group">    
                            <input type="checkbox" id="chkAddStdClauseContentHeader" class="" name="is_header">
                            <label for="projectinput1">Header</label>
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

    <!-- Modal Archive Evaluation Item Content -->
    <div class="modal fade text-xs-left" id="modalArchiveEvaluationItemContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formArchiveEvaluationItemContent">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Archive Evaluation Item Content</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to archive this selected evaluation item content?</p>
                    <input type="hidden" name="evaluation_item_content_id" id="txtArchiveEvaluationItemContentId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Restore Evaluation Item Content -->
    <div class="modal fade text-xs-left" id="modalRestoreEvaluationItemContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreEvaluationItemContent">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore Evaluation Item Content</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected evaluation item content?</p>
                    <input type="hidden" name="evaluation_item_content_id" id="txtRestoreEvaluationItemContentId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit Evaluation Item Content -->
    <div class="modal fade text-xs-left" id="modalEditEvaluationItemContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditEvaluationItemContent">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit Evaluation Item Content</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Evaluation Item Name</label>
                            <input type="hidden" id="txtEditEvaluationItemContentId" class="form-control" placeholder="Evaluation Item ID" name="evaluation_item_content_id">
                            <input type="text" id="txtEditEvaluationItemContentName" class="form-control" placeholder="Evaluation Item Name" name="evaluation_item_content_name">
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">Evaluation Item</label>
                            <select class="form-control" id="selEditStdClauseId" name="evaluation_item_id">
                                <option disabled selected>-- Select Evaluation Item ---</option>
                            </select>
                        </div>
                        <div class="form-group">    
                            <input type="checkbox" id="chkEditStdClauseContentHeader" class="" name="is_header">
                            <label for="projectinput1">Header</label>
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
    </div>
@endsection

@section('js_content')
    <script type="text/javascript">
        // -------------------------- EVALUATION ITEM --------------------------
        let dataTableEvaluationItem;
        $(document).ready(function() {
            dataTableEvaluationItem = $("#tblEvaluationItem").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_evaluation_item_by_stat",
                    "data": function (param){
                        param.evaluation_item_stat = 0;
                    }
                },
                
                "columns":[
                    { "data" : "evaluation_item_name" },
                    // { "data" : function(d2){
                    //     return d2.lastname + ', ' + d2.firstname + ' ' + d2.middlename;
                    // } },
                    { "data" : "action1" },
                    { "data" : "label1", orderable:false, searchable:false }
                ],
            });//end of dataTableEvaluationItem

            $("#formAddEvaluationItem").submit(function(event){
                event.preventDefault();
                AddEvaluationItem();
            });

            $(document).on('click', '.aArchiveEvaluationItem', function(){
                let evaluationItemId = $(this).attr('evaluation-item-id');
                $("#txtArchiveEvaluationItemId").val(evaluationItemId);
            });

            $("#formArchiveEvaluationItem").submit(function(event){
                event.preventDefault();
                ArchiveEvaluationItem();
            });

            $(document).on('click', '.aRestoreEvaluationItem', function(){
                let evaluationItemId = $(this).attr('evaluation-item-id');
                $("#txtRestoreEvaluationItemId").val(evaluationItemId);
            });

            $("#formRestoreEvaluationItem").submit(function(event){
                event.preventDefault();
                RestoreEvaluationItem();
            });

            $(document).on('click', '.aEditEvaluationItem', function(){
                let evaluationItemId = $(this).attr('evaluation-item-id');
                $("#txtEditEvaluationItemId").val(evaluationItemId);
                GetEvaluationItemByIdToEdit(evaluationItemId);
            });

            $("#formEditEvaluationItem").submit(function(event){
                event.preventDefault();
                EditEvaluationItem();
            });
        });
    </script>
@endsection