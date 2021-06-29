<?php
/**
 * Script Name - ZigKart - Multivendor Products Marketplace
 * Version - 13.2
 * Author - Codecanor
 */
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="author" content="<?php echo e($allsettings->site_title); ?>">
<?php if($view_name != 'product'): ?>
<meta name="description" content="<?php echo e($allsettings->site_desc); ?>">
<meta name="keywords" content="<?php echo e($allsettings->site_keywords); ?>">
<?php endif; ?>
<?php if($allsettings->site_favicon != ''): ?>
<link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<link rel="shortcut icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<?php endif; ?>

<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/bootstrap.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/responsive.css')); ?>">
<?php echo $__env->make('dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link href="<?php echo e(URL::to('resources/views/template/css/carousel.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/font-awesome.min.css')); ?>">
<!-- Our Custom CSS -->
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/menu/style3.css')); ?>">
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<!--- scroller -->
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/scroller/swiper.css')); ?>">
<!--- scroller -->
<!--- quick-view -->
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/quick-view/quick.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/quick-view/style.css')); ?>">
<!--- quick-view -->
<!--- auto search -->
<?php /*?><link rel="stylesheet" href="{{ URL::to('resources/views/template/autosearch/jquery-ui.css') }}"><?php */?>
<!--- auto search -->
<!--- brands -->
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('resources/views/template/brands/style.css')); ?>">
<!--- brands -->
<!-- pagination -->
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/pagination/pagination.css')); ?>">
<!-- pagination -->
<!-- datatable -->
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>">
<!-- datatable -->
<!-- picker -->
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/admin/template/picker/jquery-ui-timepicker-addon.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/admin/template/picker/jquery-ui.css')); ?>" />
<!-- picker -->
<!--- filter -->
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/filter/jplist.core.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/filter/jplist.jquery-ui-bundle.min.css')); ?>">
<?php /*?><link rel="stylesheet" href="{{ URL::to('resources/views/template/filter/jquery-ui.css') }}" /><?php */?>
<!--- filter -->
<!--- product slider -->
<link rel="stylesheet"  href="<?php echo e(URL::to('resources/views/template/product-carousel/css/lightslider.css')); ?>">
<!--- product slider -->
<!--- video popup -->
<link rel="stylesheet"  href="<?php echo e(URL::to('resources/views/template/video/YouTubePopUp.css')); ?>">
<!--- video popup -->
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php if($translate == 'ar'): ?>
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/template/css/rtl.css')); ?>" />
<?php endif; ?>
<!-- cookie -->
<link href="<?php echo e(URL::to('resources/views/template/cookie/cookiealert.css')); ?>" rel="stylesheet" type="text/css"/>
<!-- cookie -->





 <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('public/new_assets/css/style.css')); ?>">

<style>
.button-color{
    background:#ff9900 !important;
    color:#fff !important;
}
#LoginForm{
    margin-top: -89px !important;
}
.loginform{
    margin-top: -34px;
}
#demo{
    padding-bottom: 40px;
}
#coupon_form .table td, .table th{
    padding: 0.25rem;
}
.container, .container-lg, .container-md, .container-sm, .container-xl{
    overflow:hidden;
}
.sectin1{
    padding: 20px 0px 40px 0px;
    padding-bottom: 20px;
    width: 100%;
    background-color: #1fc8db;
    background-image: linear-gradient( 
140deg
 , #9db2c2 0%, #ffffff 50%, #d452256b 75%);
    color: white;
}
.myprofile{
    background: #aabdcc;
    padding-top: 10px;
    padding-bottom: 10px;
    background-size: cover;
    background-position: center center;
}
.myprofile h2,span,.mb-0{
        text-align: center !important;
    color: #222f3e !important;
}
.mb-0 a{
        text-align: center !important;
    color: Red !important;
}
.mb-0 a:hover{
        text-align: center !important;
    color: Blue !important;
}
.setting_form{
       padding: 21px 6px 35px 6px !important; 
}
.list-group2{
    margin-top: 30px;
        border-top: 3px solid #007bff;
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    margin-bottom: 1rem;
}
.social_footer_ul{
    padding-bottom: 20px;
}
.float-right{
    margin-bottom: 27px;
}
.list-group-item {
   1px solid #d8d8d8 !important;
}
.container-full{
    padding: 0px 30px;
}
.page-white-box{
        background: #aabdcc17 !important;
    -webkit-box-shadow: 1px 1px 3px 3px #e2e2e200 !important;
    -moz-box-shadow: 1px 1px 3px 3px #E2E2E2 !important;
    box-shadow: 1px 1px 3px 3px #e2e2e200 !important;
    padding: 30px !important;
    margin-top: -20px !important;
}
.RTFT{
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    margin-bottom: 1rem;
    background: #fff !important;
    margin-top: 29px;
}
</style><?php /**PATH E:\ritesh\htdocs\Office\office\office\zigkart\zigkart\resources\views/style.blade.php ENDPATH**/ ?>