<?php
    session_start();
    $isLogin = false;
    if(isset($_SESSION['rapidx_user_id'])){
        $isLogin = true;
    }

    $isAuthorized = false;
    $user_level = 0;
?>
<?php if($isLogin): ?>
    <?php if($_SESSION['rapidx_user_level_id'] == 3): ?> 
        <?php if(count($_SESSION['rapidx_user_accesses']) > 0): ?> 
            <?php for($index = 0; $index < count($_SESSION['rapidx_user_accesses']); $index++): ?> 
                <?php if($_SESSION['rapidx_user_accesses'][$index]['module_id'] == 2): ?> 
                    <?php 
                        $isAuthorized = true; 
                        $user_level = $_SESSION['rapidx_user_accesses'][$index]['user_level_id'];
                    ?>
                    <?php break; ?>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if(!$isAuthorized): ?>
                <script type="text/javascript">
                    window.location = '../RapidX/';
                </script>
            <?php endif; ?>
        <?php else: ?>
            <script type="text/javascript">
                window.location = '../RapidX/';
            </script>
        <?php endif; ?>
    <?php endif; ?>

<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>QC Patrol | <?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->make('shared.links.cssLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
    <style type="text/css">
        .swal-wide{
            width: 300px;
            height: 150px;
            font-size: 10px;
        }    
    </style>

    <?php echo $__env->make('shared.pages.qc_patrol_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($_SESSION['rapidx_user_level_id'] == 3): ?>
        <?php if($user_level == 4): ?>
            <?php echo $__env->make('shared.pages.qc_patrol_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($user_level == 5): ?>
            <?php echo $__env->make('shared.pages.navbar_other_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php else: ?>
        <?php echo $__env->make('shared.pages.qc_patrol_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <input type="hidden" value="<?php echo e($user_level); ?>" id="txtGlobalUserAccessLevelId">
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('shared.pages.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('shared.links.jsLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('js_content'); ?>

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
<?php else: ?>
    <script type="text/javascript">
        window.location = "../RapidX/";
    </script>
<?php endif; ?><?php /**PATH /var/www/qc_patrol/resources/views/layouts/qc_patrol_layout.blade.php ENDPATH**/ ?>