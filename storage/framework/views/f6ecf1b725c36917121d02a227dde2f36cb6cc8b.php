<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <!-- Content Row -->
        <div class="row" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
            <div class="col-12">
                <div class="jumbotron" style="background: white">
                    <h1 class="display-4">Instructions : </h1>
                    <p> 1. Download the format file and fill it with proper data.</p>

                    <p>2. You can download the example file to understand how the data must be filled.</p>

                    <p>3. Once you have downloaded and filled the format file, upload it in the form below and submit.</p>

                    <p> 4. After uploading products you need to edit them and set product images and choices.</p>

                    <p> 5. You can get brand and category id from their list, please input the right ids.</p>

                </div>
            </div>

            <div class="col-md-12">
                <form class="product-form" action="/admin/webinars/bulk-imports" method="POST"
                      enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="card mt-2 rest-part">
                        <div class="card-header">
                            <h4> Import Products File</h4>

                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" name="products_file">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-footer">
                        <div class="row">
                            <div class="col-md-12" style="padding-top: 20px">
                                <button type="submit" class="btn btn-primary"> Submit </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rocketlms\resources\views/admin/webinars/bulk_import.blade.php ENDPATH**/ ?>