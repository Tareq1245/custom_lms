<html lang="<?php echo e(app()->getLocale()); ?>">
<?php
    $rtlLanguages = !empty($generalSettings['rtl_languages']) ? $generalSettings['rtl_languages'] : [];

    $isRtl = ((in_array(mb_strtoupper(app()->getLocale()), $rtlLanguages)) or (!empty($generalSettings['rtl_layout']) and $generalSettings['rtl_layout'] == 1));
?>
<head>
    <?php echo $__env->make('web.default.includes.metas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e($pageTitle ?? ''); ?> </title>

    <!-- General CSS File -->
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/fontawesome/css/all.min.css"/>
    <link rel="stylesheet" href="/assets/default/vendors/toast/jquery.toast.min.css">


    <?php echo $__env->yieldPushContent('libraries_top'); ?>

    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <link rel="stylesheet" href="/assets/admin/css/custom.css">
    <link rel="stylesheet" href="/assets/admin/css/components.css">
    <?php if($isRtl): ?>
        <link rel="stylesheet" href="/assets/admin/css/rtl.css">
    <?php endif; ?>
    <link rel="stylesheet" href="/assets/admin/vendor/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">

    <?php echo $__env->yieldPushContent('styles_top'); ?>
    <?php echo $__env->yieldPushContent('scripts_top'); ?>

    <style>
        <?php echo !empty(getCustomCssAndJs('css')) ? getCustomCssAndJs('css') : ''; ?>


        <?php echo getThemeColorsSettings(true); ?>

    </style>
</head>
<body class="<?php if($isRtl): ?> rtl <?php endif; ?>">


<div id="app" class="<?php echo e((!empty($floatingBar) and $floatingBar->position == 'top' and $floatingBar->fixed) ? 'has-fixed-top-floating-bar' : ''); ?>">
    <?php if(!empty($floatingBar) and $floatingBar->position == 'top'): ?>
        <?php echo $__env->make('web.default.includes.floating_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(!isset($appHeader)): ?>
        <?php echo $__env->make('web.default.includes.top_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('web.default.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(!empty($justMobileApp)): ?>
        <?php echo $__env->make('web.default.includes.mobile_app_top_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php if(!isset($appFooter)): ?>
        <?php echo $__env->make('web.default.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('web.default.includes.advertise_modal.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(!empty($floatingBar) and $floatingBar->position == 'bottom'): ?>
        <?php echo $__env->make('web.default.includes.floating_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>





<!-- General JS Scripts -->
<script src="/assets/admin/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="/assets/admin/vendor/poper/popper.min.js"></script>
<script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
<script src="/assets/admin/vendor/nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/admin/vendor/moment/moment.min.js"></script>
<script src="/assets/admin/js/stisla.js"></script>
<script src="/assets/default/vendors/toast/jquery.toast.min.js"></script>

<script>
    (function () {
        "use strict";

        window.csrfToken = $('meta[name="csrf-token"]');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        window.adminPanelPrefix = '<?php echo e(getAdminPanelUrl()); ?>';

        <?php if(session()->has('toast')): ?>
        $.toast({
            heading: '<?php echo e(session()->get('toast')['title'] ?? ''); ?>',
            text: '<?php echo e(session()->get('toast')['msg'] ?? ''); ?>',
            bgColor: '<?php if(session()->get('toast')['status'] == 'success'): ?> #43d477 <?php else: ?> #f63c3c <?php endif; ?>',
            textColor: 'white',
            hideAfter: 10000,
            position: 'bottom-right',
            icon: '<?php echo e(session()->get('toast')['status']); ?>'
        });
        <?php endif; ?>
    })(jQuery);
</script>

<script src="/assets/admin/vendor/daterangepicker/daterangepicker.min.js"></script>
<script src="/assets/default/vendors/select2/select2.min.js"></script>

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<!-- Template JS File -->
<script src="/assets/admin/js/scripts.js"></script>

<?php echo $__env->yieldPushContent('styles_bottom'); ?>
<?php echo $__env->yieldPushContent('scripts_bottom'); ?>

<script>
    var deleteAlertTitle = '<?php echo e(trans('public.are_you_sure')); ?>';
    var deleteAlertHint = '<?php echo e(trans('public.deleteAlertHint')); ?>';
    var deleteAlertConfirm = '<?php echo e(trans('public.deleteAlertConfirm')); ?>';
    var deleteAlertCancel = '<?php echo e(trans('public.cancel')); ?>';
    var deleteAlertSuccess = '<?php echo e(trans('public.success')); ?>';
    var deleteAlertFail = '<?php echo e(trans('public.fail')); ?>';
    var deleteAlertFailHint = '<?php echo e(trans('public.deleteAlertFailHint')); ?>';
    var deleteAlertSuccessHint = '<?php echo e(trans('public.deleteAlertSuccessHint')); ?>';
    var forbiddenRequestToastTitleLang = '<?php echo e(trans('public.forbidden_request_toast_lang')); ?>';
    var forbiddenRequestToastMsgLang = '<?php echo e(trans('public.forbidden_request_toast_msg_lang')); ?>';
    var generatedContentLang = '<?php echo e(trans('update.generated_content')); ?>';
    var copyLang = '<?php echo e(trans('public.copy')); ?>';
    var doneLang = '<?php echo e(trans('public.done')); ?>';
</script>

<script src="/assets/admin/js/custom.js"></script>
<script src="/assets/default/js/panel/ai-content-generator.min.js"></script>

<script>
    <?php echo !empty(getCustomCssAndJs('js')) ? getCustomCssAndJs('js') : ''; ?>

</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\rocketlms\resources\views/web/default/panel/layouts/apps.blade.php ENDPATH**/ ?>