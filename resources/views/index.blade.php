@extends('layouts.qc_patrol_layout')
@section('title', 'Dashboard')

@section('content')
  <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body"><!-- stats -->
        <div class="row" id="divRowQADAdmin" style="display: none;">
            <!-- <div class="col-xl-3 col-lg-6 col-xs-12">
                <a href="{{ route('audit_results') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <span>Audit Result</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-paper deep-orange font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->
        </div>

        <div class="row" id="divRowOtherSec" style="display: none;">
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <a href="{{ route('audit_results') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <!-- <h3 class="deep-orange">0</h3> -->
                                        <span>Audit Result</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-paper deep-orange font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-xs-12">
                <a href="{{ route('sections') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <!-- <h3 class="deep-orange">0</h3> -->
                                        <span>Responsible Section</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-paper deep-orange font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-xs-12">
                <a href="{{ route('classifications') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <!-- <h3 class="deep-orange">0</h3> -->
                                        <span>Classification</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-paper deep-orange font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>


      </div>
    </div>
  </div>

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

@section('js_content')
    <script type="text/javascript">
        $(document).ready(function(){
            let globalUserAccessLevelId = $("#txtGlobalUserAccessLevelId").val();

            if(globalUserAccessLevelId == 0) {
                $("#divRowQADAdmin").css('display', 'block');
                $("#divRowOtherSec").css('display', 'block');
            }
            else if(globalUserAccessLevelId == 4) {
                $("#divRowQADAdmin").css('display', 'block');
                $("#divRowOtherSec").css('display', 'none');
            }
            else if(globalUserAccessLevelId == 5) {
                $("#divRowQADAdmin").css('display', 'none');
                $("#divRowOtherSec").css('display', 'block');
            }
        });
    </script>
@endsection