
<?php $__env->startSection('title', 'Responsible Section'); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Responsible Section</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Responsible Section
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
                                    <button class="btn btn-success" id="btnShowSaveSectionModal"><i class="icon-plus"></i> Add Section</button>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblSections" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Department</th>
                                                <th>Section</th>
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

    <div class="modal fade text-xs-left" id="mdlSaveSection" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveSection">
                <?php echo csrf_field(); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-info"></i> Section Details</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Department</label>
                            <select class="form-control" name="department">
                              <option value="1" selected="true">TS</option>
                              <option value="2">PPS</option>
                              <option value="3">CN</option>
                              <option value="4">YF</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">Section</label>
                            <input type="text" class="form-control" placeholder="Section ID" name="section_id" style="display: none;">
                            <input type="text" class="form-control" placeholder="Section" name="name">
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

    <div class="modal fade text-xs-left" id="mdlActionSection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmActionSection">
                <?php echo csrf_field(); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> <span id="spanSectionActionTitle">Archive Section</span></h4>
              </div>
              <div class="modal-body">
                    <p>Please confirm to continue?</p>
                    <input type="text" name="section_id" style="display: none;">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_content'); ?>
    <script type="text/javascript">
        // -------------------------- FACTOR --------------------------
        let dtSections;
        let selectedSectionId = null;
        let selectedSectionName = '';

        $(document).ready(function() {
            dtSections = $("#tblSections").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_sections",
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
            });//end of dtSections
        });

        $("#btnShowSaveSectionModal").click(function(){
          $("#mdlSaveSection").modal('show');
          $("#frmSaveSection")[0].reset();
        });

        $("#tblSections").on('click', '.btnEditSection', function(){
          let id = $(this).attr('section-id');
          $("input[name='section_id'", $("#frmSaveSection")).val(id);
          GetSectionById(id);
          $("#mdlSaveSection").modal('show');
        });

        $("#frmSaveSection").submit(function(e){
          e.preventDefault();
          SaveSection();
        });

        $("#tblSections").on('click', '.btnActionSection', function(){
          let id = $(this).attr('section-id');
          let status = $(this).attr('status');
          $("input[name='section_id'", $("#frmActionSection")).val(id);
          $("input[name='status'", $("#frmActionSection")).val(status);
          $("#mdlActionSection").modal('show');
        });

        $("#frmActionSection").submit(function(e){
          e.preventDefault();
          ActionSection();
        });


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.qc_patrol_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/qc_patrol/resources/views/qc_patrol/sections.blade.php ENDPATH**/ ?>