<div class="row">
<div class="col-sm-4">
    <div class="input-group">
        <span class="input-group-addon">Date Range</span>
        <input type="month" class="form-control" name="from" id="dateSearchCustomerAuditYearFrom" value="<?php echo date('Y-m'); ?>" style="min-width: 70px;">
        <span class="input-group-addon">to</span>
        <input type="month" class="form-control" name="to" id="dateSearchCustomerAuditYearTo" value="<?php echo date('Y-m'); ?>" style="min-width: 70px;">
        <span class="input-group-addon btn btn-info" id="btnSearchCustomerAuditByYear"><i class="icon-search"></i></span>
    </div>
</div>
</div>
<br><br>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">CUSTOMER AUDIT RESULTS</h4>
            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li id="btnRefreshCustomerAuditResults" title="Refresh"><a data-action=""><i class="icon-reload"></i></a></li>
                    <li id="btnExportCustomerAuditResults" title="Export to PDF" class="btnExportCustomerCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <center>
                <div class="card-block" style="overflow-x: auto;">
                    <div id="pieChartCustomerAreasForImprovement"></div>
                </div>
            </center>
        </div>
    </div>
</div>
</div>