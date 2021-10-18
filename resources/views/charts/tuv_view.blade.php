<div class="row">
    <div class="col-sm-4">
        <div class="input-group">
            <span class="input-group-addon">Date Range</span>
            <input type="month" class="form-control form-control-sm" name="from" id="dateSearchTUVAuditFrom" value="<?php echo date('Y-m'); ?>" style="min-width: 70px;">
            <span class="input-group-addon">to</span>
            <input type="month" class="form-control form-control-sm" name="to" id="dateSearchTUVAuditTo" value="<?php echo date('Y-m'); ?>" style="min-width: 70px;">
            <span class="input-group-addon btn btn-info" id="btnSearchTUVAuditByYear"><i class="icon-search"></i></span>
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><span id="spanTUVAuditCategory"></span> AUDIT RESULTS</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li id="btnRefreshTUVAuditCategory" title="Refresh"><a data-action=""><i class="icon-reload"></i></a></li>
                        <li id="btnExportTUVAuditCategory" title="Export to PDF" class="btnExportTUVCharts"><a data-action=""><i class="icon-file-pdf-o"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block" style="overflow-x: auto;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon">Audit Category</span>

                                <select class="form-control" name="audit_category" id="selFilterTUVByAuditCategory">
                                    <option value="1">ISO9001 / IATF16949</option>
                                    <option value="2">ISO14001</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="barChartTUVByAuditCategory"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-block" style="overflow-x: auto;">
                    <div class="chart-container">
                        <div id="barChartTUVNC"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-block" style="overflow-x: auto;">
                    <div class="chart-container">
                        <div id="barChartTUVOFI"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block" style="overflow-x: auto;">
                    <div class="chart-container">
                        <div id="barChartTUVAFI"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>