<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>QUADS | Auto Mailer</title>
    
    @include('shared.links.cssLinks')
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <!-- <div class="p-1"><img src="../../app-assets/images/logo/robust-logo-dark.png" alt="branding logo"></div> -->
                    <h1>QUADS Auto Mailer</h1>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size: 20px;"><i class="icon-warning"></i> <b>Please do not close!</b></span></h6>

                <center>
                    <i class="icon-spinner fa fa-pulse" style="font-size: 100px;" id="iSpinner"></i>
                </center>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <!-- <form class="form-horizontal form-simple" id="frmAutoMailer" method="get" novalidate> -->
                        <button type="button" id="btnSendEmail" class="btn btn-primary btn-md btn-block"><i class="icon-send"></i><span> Send All Email</span></button><br>
                        <div class="row">
                            <div class="col-sm-3">
                                <button type="button" id="btnSendTUVEmail" class="btn btn-danger btn-md btn-block"><i class="icon-send"></i><span> TUV</span></button>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" id="btnSendCustomerEmail" class="btn btn-success btn-md btn-block"><i class="icon-send"></i><span> Customer</span></button>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" id="btnSendInternalEmail" class="btn btn-info btn-md btn-block"><i class="icon-send"></i><span> Internal</span></button>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" id="btnSendSupplierEmail" class="btn btn-warning btn-md btn-block"><i class="icon-send"></i><span> Supplier</span></button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <!-- <p class="float-sm-left text-xs-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p> -->
                    <!-- <p class="float-sm-right text-xs-center m-0">New to QADS? <a href="register-simple.html" class="card-link">Sign Up</a></p> -->
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    @include('shared.links.jsLinks')

    <script type="text/javascript">
        // window.onbeforeunload = bunload;

        // function bunload(){
        //     dontleave="Are you sure you want to leave?";
        //     return dontleave;
        // }

        $(document).ready(function(){

            // $("#frmAutoMailer").submit(function(event){
            //     event.preventDefault();
            //     SendInternalAutoMailer();
            // });

            let scheduledTime = '07:30:00';

            setInterval(function(){
                let now = new Date();
                let timeNow = ("0" + now.getHours()).slice(-2) + ':' + ("0" + now.getMinutes()).slice(-2) + ':' + ("0" + now.getSeconds()).slice(-2);

                if(scheduledTime == timeNow){
                    console.log('Auto Mailer Run At: ' + timeNow);
                    SendInternalOverDueDate();
                    SendInternalDueDate();
                    SendInternalBeforeDueDate();
                }

            }, 1000);
        });


        // Internal
        function SendInternalOverDueDate(){
            $.ajax({
                url: 'get_internal_over_due_date',
                method: 'get',
                dataType: 'json',

                beforeSend: function(){
                    let now = new Date();
                    let timeNow = ("0" + now.getHours()).slice(-2) + ':' + ("0" + now.getMinutes()).slice(-2) + ':' + ("0" + now.getSeconds()).slice(-2);
                    console.log('Internal Over Due Auto Mailer Sending At: ' + timeNow);
                    
                },
                success: function(JsonObject){
                    let now = new Date();
                    let timeNow = ("0" + now.getHours()).slice(-2) + ':' + ("0" + now.getMinutes()).slice(-2) + ':' + ("0" + now.getSeconds()).slice(-2);

                    if(JsonObject['result'] == 1){
                        console.log('Internal Over Due Auto Mailer Sent At: ' + timeNow);
                    }
                    else{
                        console.log('Internal Over Due Auto Mailer Unsent At: ' + timeNow);   
                    }
                }
            });
        }

        function SendInternalDueDate(){
            $.ajax({
                url: 'get_internal_due_date',
                method: 'get',
                dataType: 'json',

                beforeSend: function(){
                    let now = new Date();
                    let timeNow = ("0" + now.getHours()).slice(-2) + ':' + ("0" + now.getMinutes()).slice(-2) + ':' + ("0" + now.getSeconds()).slice(-2);
                    console.log('Internal Due Auto Mailer Sending At: ' + timeNow);
                    
                },
                success: function(JsonObject){
                    let now = new Date();
                    let timeNow = ("0" + now.getHours()).slice(-2) + ':' + ("0" + now.getMinutes()).slice(-2) + ':' + ("0" + now.getSeconds()).slice(-2);

                    if(JsonObject['result'] == 1){
                        console.log('Internal Due Auto Mailer Sent At: ' + timeNow);
                    }
                    else{
                        console.log('Internal Due Auto Mailer Unsent At: ' + timeNow);   
                    }
                }
            });
        }

        function SendInternalBeforeDueDate(){
            $.ajax({
                url: 'get_internal_before_due_date',
                method: 'get',
                dataType: 'json',

                beforeSend: function(){
                    let now = new Date();
                    let timeNow = ("0" + now.getHours()).slice(-2) + ':' + ("0" + now.getMinutes()).slice(-2) + ':' + ("0" + now.getSeconds()).slice(-2);
                    console.log('Internal Before Due Auto Mailer Sending At: ' + timeNow);
                    
                },
                success: function(JsonObject){
                    let now = new Date();
                    let timeNow = ("0" + now.getHours()).slice(-2) + ':' + ("0" + now.getMinutes()).slice(-2) + ':' + ("0" + now.getSeconds()).slice(-2);

                    if(JsonObject['result'] == 1){
                        console.log('Internal Before Due Auto Mailer Sent At: ' + timeNow);
                    }
                    else{
                        console.log('Internal Before Due Auto Mailer Unsent At: ' + timeNow);   
                    }
                }
            });
        }
    </script>
  </body>
</html>