
<?php $__env->startSection('title', 'Reports'); ?>

<?php $__env->startSection('content'); ?>
    <style type="text/css">
      table.table thead th{
          /*background-color: black;*/
          padding-top: 5px; 
          padding-bottom: 5px;
          padding-right: 1px !important;
          padding-left: 1px !important;
          font-size: 14px;
          text-align: center;
          white-space:nowrap;
      }
    </style>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Reports</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Reports
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
                                <div style="float: left;">

                                    <div class="row">
                                      <div class="form-group col-sm-4">
                                          <div class="input-group">
                                              <span class="input-group-addon">Enter year: </span>
                                              <input type="number" class="form-control" placeholder="Enter year: " name="year" id="txtSearchByYear" value="<?php echo date('Y'); ?>"> 
                                              <span class="input-group-addon btn btn-success" id="btnSearchByYear"><i class="icon-search"></i></span>
                                          </div>
                                      </div>
                                    </div>

                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblClassifications" width="100%" style="margin: 1px 1px; padding: 1px 1px;">
                                        <thead>
                                            <tr>
                                              <th style="border-top: 1px solid white; border-left: 1px solid white;"></th>
                                              <th colspan="10" style="text-align: center; background-color: #9bc2e6;"><span class="spanYear1"><?php echo date('Y'); ?></span></th>
                                              <th colspan="3" style="text-align: center; background-color: #ffff00;"><span class="spanYear2"><?php echo date('Y') + 1; ?></span></th>
                                            </tr>
                                            <tr>
                                                <th>Classification by Phenomenon</th>
                                                <th>March</th>
                                                <th>April</th>
                                                <th>May</th>
                                                <th>June</th>
                                                <th>July</th>
                                                <th>August</th>
                                                <th>September</th>
                                                <th>October</th>
                                                <th>November</th>
                                                <th>December</th>
                                                <th>January</th>
                                                <th>February</th>
                                                <th>March</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                        </tbody>
                                    </table>
                                    <br><br>
                                </div>

                                <br><br>

                                <!-- CHART JS PIE -->
                                <!-- <div class="col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Simple Pie Chart</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in">
                                            <div class="card-block">
                                                <canvas id="simple-pie-chart" height="400"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- CHART GOOGLE PIE -->

                                <div class="col-xl-6 col-lg-12">
                                    <div class="card">
                                        <!-- <div class="card-header">
                                            <h4 class="card-title">Classification of Phenomenon</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a> -->
                                            <!-- <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                                </ul>
                                            </div> -->
                                        <!-- </div> -->
                                        <div class="card-body">
                                            <div class="card-block">
                                                <!-- <p class="card-text">A pie chart that is rendered within the browser using SVG or VML. Displays tooltips when hovering over slices.</p> -->
                                                <div id="pie-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-xs" id="tblFactors" width="100%" style="margin: 1px 1px; padding: 1px 1px;">
                                        <thead>
                                            <tr>
                                              <th style="border-top: 1px solid white; border-left: 1px solid white;"></th>
                                              <th colspan="10" style="text-align: center; background-color: #9bc2e6;"><span class="spanYear1"><?php echo date('Y'); ?></span></th>
                                              <th colspan="3" style="text-align: center; background-color: #ffff00;"><span class="spanYear2"><?php echo date('Y') + 1; ?></span></th>
                                            </tr>
                                            <tr>
                                                <th>Classification by 4M</th>
                                                <th>March</th>
                                                <th>April</th>
                                                <th>May</th>
                                                <th>June</th>
                                                <th>July</th>
                                                <th>August</th>
                                                <th>September</th>
                                                <th>October</th>
                                                <th>November</th>
                                                <th>December</th>
                                                <th>January</th>
                                                <th>February</th>
                                                <th>March</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                        </tbody>
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

    <!-- <div class="modal fade text-xs-left" id="mdlSaveClassification" tabindex="-1" role="dialog" aria-hidden="true">
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
    </div> -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_content'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
          Report1($('#txtSearchByYear').val());
          Chart1($('#txtSearchByYear').val());
          Report2($('#txtSearchByYear').val());

          $('#btnSearchByYear').click(function(){
            $('.spanYear1').html($('#txtSearchByYear').val());
            $('.spanYear2').html(parseFloat($('#txtSearchByYear').val()) + 1);
            $('.filteredYear').html($('#txtSearchByYear').val());
            Report1($('#txtSearchByYear').val());
            Chart1($('#txtSearchByYear').val());
            Report2($('#txtSearchByYear').val());
          });

          // Load the Visualization API and the corechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawPie);

          // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
          function drawPie(chartData) {
              var chartData = [
                  ['Task', 'Hours per Day'],
                  ['Loading...',     1],
              ];
              // Create the data table.
              var data = google.visualization.arrayToDataTable(chartData);


              // Set chart options
              var options_bar = {
                  title: 'Classification of Phenomenon',
                  height: 400,
                  fontSize: 12,
                  is3D: true,
                  // colors:['#99B898','#FECEA8', '#FF847C', '#E84A5F', '#474747'],
                  chartArea: {
                      left: '5%',
                      width: '90%',
                      height: 350
                  },
              };

              // Instantiate and draw our chart, passing in some options.
              var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
              chart.draw(data, options_bar);

          }

          // function ChartJSPie(){
          //   //Get the context of the Chart canvas element we want to select
          //   var ctx = $("#simple-pie-chart");

          //   // Chart Options
          //   var chartOptions = {
          //       responsive: true,
          //       maintainAspectRatio: false,
          //       responsiveAnimationDuration:500,
          //   };

          //   // Chart Data
          //   var chartData = {
          //       labels: ["January", "February", "March", "April", "May"],
          //       datasets: [{
          //           label: "My First dataset",
          //           data: [85, 65, 34, 45, 35],
          //           backgroundColor: ["#99B898","#FECEA8","#FF847C","#E84A5F","#2A363B"],
          //       }]
          //   };

          //   var config = {
          //       type: 'pie',

          //       // Chart Options
          //       options : chartOptions,

          //       data : chartData
          //   };

          //   // Create the chart
          //   var pieSimpleChart = new Chart(ctx, config);

          // }
        });
        // -------------------------- FACTOR --------------------------
        // let dtClassifications;
        // let selectedClassificationId = null;
        // let selectedClassificationName = '';

        // $(document).ready(function() {
        //     dtClassifications = $("#tblClassifications").DataTable({
        //         "processing" : false,
        //         "serverSide" : true,
        //         "ajax" : {
        //             url: "view_classifications",
        //             "data": function (param){
        //                 param.status = 0;
        //             }
        //         },
                
        //         "columns":[
        //             { "data" : "name" },
        //             { "data" : "raw_status" },
        //             { "data" : "raw_action", orderable:false, searchable:false }
        //         ],
        //     });//end of dtClassifications
        // });

        // $("#btnShowSaveClassificationModal").click(function(){
        //   $("#mdlSaveClassification").modal('show');
        // });

        // $("#tblClassifications").on('click', '.btnEditClassification', function(){
        //   let id = $(this).attr('classification-id');
        //   $("input[name='classification_id'", $("#frmSaveClassification")).val(id);
        //   GetClassificationById(id);
        //   $("#mdlSaveClassification").modal('show');
        // });

        // $("#frmSaveClassification").submit(function(e){
        //   e.preventDefault();
        //   SaveClassification();
        // });

        // $("#tblClassifications").on('click', '.btnActionClassification', function(){
        //   let id = $(this).attr('classification-id');
        //   let status = $(this).attr('status');
        //   $("input[name='classification_id'", $("#frmActionClassification")).val(id);
        //   $("input[name='status'", $("#frmActionClassification")).val(status);
        //   $("#mdlActionClassification").modal('show');
        // });

        // $("#frmActionClassification").submit(function(e){
        //   e.preventDefault();
        //   ActionClassification();
        // });


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.qc_patrol_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/qc_patrol/resources/views/qc_patrol/reports.blade.php ENDPATH**/ ?>