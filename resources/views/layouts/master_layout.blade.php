@php
    session_start();
    $isLogin = false;
    if(isset($_SESSION['rapidx_user_id'])){
        $isLogin = true;
    }

    $isAuthorized = false;
    $user_level = 0;
@endphp
@if($isLogin)
    @if($_SESSION['rapidx_user_level_id'] == 3)
        @if(count($_SESSION['rapidx_user_accesses']) > 0)
            @for($index = 0; $index < count($_SESSION['rapidx_user_accesses']); $index++)
                @if($_SESSION['rapidx_user_accesses'][$index]['module_id'] == 2)
                    @php 
                        $isAuthorized = true; 
                        $user_level = $_SESSION['rapidx_user_accesses'][$index]['user_level_id'];
                    @endphp
                    @break
                @endif
            @endfor

            @if(!$isAuthorized)
                <script type="text/javascript">
                    window.location = '../RapidX/';
                </script>
            @endif
        @else
            <script type="text/javascript">
                window.location = '../RapidX/';
            </script>
        @endif
    @endif

<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>QC Patrol | @yield('title')</title>
    @include('shared.links.cssLinks')
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
    <style type="text/css">
        .swal-wide{
            width: 300px;
            height: 150px;
            font-size: 10px;
        }    
    </style>

    @include('shared.pages.header')

    @if($_SESSION['rapidx_user_level_id'] == 3)
        @if($user_level == 4)
            @include('shared.pages.navbar')
        @elseif($user_level == 5)
            @include('shared.pages.navbar_other_section')
        @endif
    @else
        @include('shared.pages.navbar')
    @endif
    <input type="hidden" value="{{ $user_level }}" id="txtGlobalUserAccessLevelId">
    @yield('content')

    @include('shared.pages.footer')

    @include('shared.links.jsLinks')

    @yield('js_content')

    <script type="text/javascript">
        $(document).ready(function(){
            $("#aLogout").click(function(event){
                UserLogout();
            });
        });

        function UserLogout(){
            $.ajax({
                url: "user_logout",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(JsonObject){
                    if(JsonObject['result'] == 1){
                        window.location = '../RapidX/';
                    }
                    else{
                        alert('Logout Error!');
                    }
                }
            });
        }
    </script>
  </body>
</html>
@else
    <script type="text/javascript">
        window.location = "../RapidX/";
    </script>
@endauth