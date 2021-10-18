
<?php $__env->startSection('title', 'Classification by Phenomenon'); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Classification by Phenomenon</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Classification by Phenomenon
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
                                    <button class="btn btn-success" id="btnShowSaveClassificationModal"><i class="icon-plus"></i> Add Classification</button>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblClassifications" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Classification</th>
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

    <div class="modal fade text-xs-left" id="mdlSaveClassification" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmSaveClassification">
                <?php echo csrf_field(); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-info"></i> Classification Details</h4>
              </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="projectinput1">Classification</label>
                            <input type="text" class="form-control" placeholder="Classification ID" name="classification_id" style="display: none;">
                            <input type="text" class="form-control" placeholder="Classification" name="name">
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

    <div class="modal fade text-xs-left" id="mdlActionClassification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="form" method="post" id="frmActionClassification">
                <?php echo csrf_field(); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel3"><i class="icon-ini"></i> <span id="spanClassificationActionTitle">Archive Classification</span></h4>
              </div>
              <div class="modal-body">
                    <p>Please confirm to continue?</p>
                    <input type="text" name="classification_id" style="display: none;">
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
        let dtClassifications;
        let selectedClassificationId = null;
        let selectedClassificationName = '';

        $(document).ready(function() {
            dtClassifications = $("#tblClassifications").DataTable({
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_classifications",
                    "data": function (param){
                        param.status = 0;
                    }
                },
                
                "columns":[
                    { "data" : "name" },
                    { "data" : "raw_status" },
                    { "data" : "raw_action", orderable:false, searchable:false }
                ],
            });//end of dtClassifications
        });

        $("#btnShowSaveClassificationModal").click(function(){
          $("#mdlSaveClassification").modal('show');
        });

        $("#tblClassifications").on('click', '.btnEditClassification', function(){
          let id = $(this).attr('classification-id');
          $("input[name='classification_id'", $("#frmSaveClassification")).val(id);
          GetClassificationById(id);
          $("#mdlSaveClassification").modal('show');
        });

        $("#frmSaveClassification").submit(function(e){
          e.preventDefault();
          SaveClassification();
        });

        $("#tblClassifications").on('click', '.btnActionClassification', function(){
          let id = $(this).attr('classification-id');
          let status = $(this).attr('status');
          $("input[name='classification_id'", $("#frmActionClassification")).val(id);
          $("input[name='status'", $("#frmActionClassification")).val(status);
          $("#mdlActionClassification").modal('show');
        });

        $("#frmActionClassification").submit(function(e){
          e.preventDefault();
          ActionClassification();
        });


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.qc_patrol_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/qc_patrol/resources/views/qc_patrol/classifications.blade.php ENDPATH**/ ?>