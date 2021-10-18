@extends('layouts.master_layout')
@section('title', 'Standard Clause')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Standard Clause</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Standard Clause
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
                                      <a class="nav-link active" id="linkTabTUV" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">Standard Clause</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="linkTabCustomer" data-toggle="tab" href="#tabStandardClauseContent" aria-controls="link" aria-expanded="false">Standard Clause Content</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content px-1 pt-1">
                                    <!-- STANDARD CLAUSE PANEL -->
                                    <div role="tabpanel" class="tab-pane fade active in" id="active" aria-labelledby="active-tab" aria-expanded="true">
                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddStandardClauseModal" data-toggle="modal" data-target="#modalAddStandardClause" data-keyboard="false"><i class=""></i> Add Standard Clause</button>
                                        </div>
                                    <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="tblStandardClause" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Standard Clause</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ STANDARD CLAUSE PANEL -->

                                    <!-- STANDARD CLAUSE CONTENT PANEL -->
                                    <div class="tab-pane fade" id="tabStandardClauseContent" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddStandardClauseContentModal" data-toggle="modal" data-target="#modalAddStandardClauseContent" data-keyboard="false"><i class=""></i> Add Standard Clause Content</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tblStandardClauseContent" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Standard Clause Content</th>
                                                        <th>Standard Clause</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                    <!-- ../ STANDARD CLAUSE CONTENT PANEL -->
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

  <!-- STANDARD CLAUSE MODALS -->
    <div class="modal fade text-xs-left" id="modalAddStandardClause" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddStandardClause">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Standard Clause</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Standard Clause</label>
                            <input type="text" id="txtAddStdClauseName" class="form-control" placeholder="Standard Clause" name="standard_clause_name">
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

    <!-- Modal Archive Standard Clause -->
    <div class="modal fade text-xs-left" id="modalArchiveStandardClause" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formArchiveStandardClause">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Archive Standard Clause</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to archive this selected standard clause?</p>
                    <input type="hidden" name="standard_clause_id" id="txtArchiveStandardClauseId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Restore Standard Clause -->
    <div class="modal fade text-xs-left" id="modalRestoreStandardClause" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreStandardClause">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore Standard Clause</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected standard clause?</p>
                    <input type="hidden" name="standard_clause_id" id="txtRestoreStandardClauseId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit Standard Clause -->
    <div class="modal fade text-xs-left" id="modalEditStandardClause" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditStandardClause">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit Standard Clause</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Standard Clause Name</label>
                            <input type="hidden" id="txtEditStandardClauseId" class="form-control" placeholder="Standard Clause ID" name="standard_clause_id">
                            <input type="text" id="txtEditStandardClauseName" class="form-control" placeholder="Standard Clause Name" name="standard_clause_name">
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


    <!-- STANDARD CLAUSE CONTENT MODALS -->
    <div class="modal fade text-xs-left" id="modalAddStandardClauseContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formAddStandardClauseContent">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Add Standard Clause Content</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Standard Clause Content</label>
                            <input type="text" id="txtAddStdClauseContentName" class="form-control" placeholder="Standard Clause Content" name="standard_clause_content_name">
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">Standard Clause</label>
                            <select class="form-control" id="selAddStdClauseId" name="standard_clause_id">
                                <option disabled selected>-- Select Standard Clause ---</option>
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

    <!-- Modal Archive Standard Clause Content -->
    <div class="modal fade text-xs-left" id="modalArchiveStandardClauseContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formArchiveStandardClauseContent">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Archive Standard Clause Content</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to archive this selected standard clause content?</p>
                    <input type="hidden" name="standard_clause_content_id" id="txtArchiveStandardClauseContentId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Restore Standard Clause Content -->
    <div class="modal fade text-xs-left" id="modalRestoreStandardClauseContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formRestoreStandardClauseContent">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" d`ata-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Restore Standard Clause Content</h4>
              </div>
              <div class="modal-body">
                    <p>Are you sure to restore this selected standard clause content?</p>
                    <input type="hidden" name="standard_clause_content_id" id="txtRestoreStandardClauseContentId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-outline-primary">Yes</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit Standard Clause Content -->
    <div class="modal fade text-xs-left" id="modalEditStandardClauseContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="formEditStandardClauseContent">
                @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> Edit Standard Clause Content</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Standard Clause Name</label>
                            <input type="hidden" id="txtEditStandardClauseContentId" class="form-control" placeholder="Standard Clause ID" name="standard_clause_content_id">
                            <input type="text" id="txtEditStandardClauseContentName" class="form-control" placeholder="Standard Clause Name" name="standard_clause_content_name">
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">Standard Clause</label>
                            <select class="form-control" id="selEditStdClauseId" name="standard_clause_id">
                                <option disabled selected>-- Select Standard Clause ---</option>
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
        // -------------------------- STANDARD CLAUSE --------------------------
        let dataTableStandardClause;
        $(document).ready(function() {
            dataTableStandardClause = $("#tblStandardClause").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_standard_clause_by_stat",
                    "data": function (param){
                        param.standard_clause_stat = 0;
                    }
                },
                
                "columns":[
                    { "data" : "standard_clause_name" },
                    // { "data" : function(d2){
                    //     return d2.lastname + ', ' + d2.firstname + ' ' + d2.middlename;
                    // } },
                    { "data" : "action1" },
                    { "data" : "label1", orderable:false, searchable:false }
                ],
            });//end of dataTableStandardClause

            $("#formAddStandardClause").submit(function(event){
                event.preventDefault();
                AddStandardClause();
            });

            $(document).on('click', '.aArchiveStandardClause', function(){
                let standardClauseId = $(this).attr('standard-clause-id');
                $("#txtArchiveStandardClauseId").val(standardClauseId);
            });

            $("#formArchiveStandardClause").submit(function(event){
                event.preventDefault();
                ArchiveStandardClause();
            });

            $(document).on('click', '.aRestoreStandardClause', function(){
                let standardClauseId = $(this).attr('standard-clause-id');
                $("#txtRestoreStandardClauseId").val(standardClauseId);
            });

            $("#formRestoreStandardClause").submit(function(event){
                event.preventDefault();
                RestoreStandardClause();
            });

            $(document).on('click', '.aEditStandardClause', function(){
                let standardClauseId = $(this).attr('standard-clause-id');
                $("#txtEditStandardClauseId").val(standardClauseId);
                GetStandardClauseByIdToEdit(standardClauseId);
            });

            $("#formEditStandardClause").submit(function(event){
                event.preventDefault();
                EditStandardClause();
            });
        });



        // ---------------------- STANDARD CLAUSE CONTENT ----------------------
        let dataTableStandardClauseContent;
        $(document).ready(function() {
            dataTableStandardClauseContent = $("#tblStandardClauseContent").DataTable({
                // "order": [[ 0, "asc" ]],
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_standard_clause_content_by_stat",
                    "data": function (param){
                        param.standard_clause_content_stat = 0;
                    }
                },
                
                "columns":[
                    { "data" : "label2" },
                    { "data" : "standard_clause_name" },
                    // { "data" : function(d2){
                    //     return d2.lastname + ', ' + d2.firstname + ' ' + d2.middlename;
                    // } },
                    { "data" : "action1" },
                    { "data" : "label1", orderable:false, searchable:false }
                ],
            });//end of dataTableStandardClauseContent

            GetCboStandardClauseByStat(1, $("#selEditStdClauseId"));

            $("#formAddStandardClauseContent").submit(function(event){
                event.preventDefault();
                AddStandardClauseContent();
            });

            $("#btnShowAddStandardClauseContentModal").click(function(){
                GetCboStandardClauseByStat(1, $("#selAddStdClauseId"));
            });

            $(document).on('click', '.aArchiveStandardClauseContent', function(){
                let standardClauseContentId = $(this).attr('standard-clause-content-id');
                $("#txtArchiveStandardClauseContentId").val(standardClauseContentId);
            });

            $("#formArchiveStandardClauseContent").submit(function(event){
                event.preventDefault();
                ArchiveStandardClauseContent();
            });

            $(document).on('click', '.aRestoreStandardClauseContent', function(){
                let standardClauseContentId = $(this).attr('standard-clause-content-id');
                $("#txtRestoreStandardClauseContentId").val(standardClauseContentId);
            });

            $("#formRestoreStandardClauseContent").submit(function(event){
                event.preventDefault();
                RestoreStandardClauseContent();
            });

            $(document).on('click', '.aEditStandardClauseContent', function(){
                let standardClauseContentId = $(this).attr('standard-clause-content-id');
                $("#txtEditStandardClauseContentId").val(standardClauseContentId);
                GetStandardClauseContentByIdToEdit(standardClauseContentId);
            });

            $("#formEditStandardClauseContent").submit(function(event){
                event.preventDefault();
                EditStandardClauseContent();
            });
        });
    </script>
@endsection