<?php $__env->startSection('service'); ?>
    active show-sub
<?php $__env->stopSection(); ?>

<?php $__env->startSection('manage-service'); ?>
    active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>
    <div class="card pd-20 pd-sm-40">
        <?php if(Session::has('success')): ?>
            <script>
                window.onload = function() {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Service added successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

            </script>
        <?php endif; ?>
        <h6 class="card-body-title">Update service</h6>
        <form action="<?php echo e(route('service.update', [$service->id])); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Service title: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="<?php echo e($service->service_name); ?>"
                                placeholder="Enter service title">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Chose category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose category" name='cat_id'>
                                <option label="Choose category" disabled></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"
                                        <?php echo e($service->category_id == $item->id ? 'selected' : ''); ?>>
                                        <?php echo e($item->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['cat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Service code <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="code" value="<?php echo e($service->service_code); ?>"
                                placeholder="Enter code">
                            <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Price (hourly): <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="price" value="<?php echo e($service->price); ?>"
                                placeholder="Enter price">
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                            <textarea name="short_desc" id="short_desc"
                                name="short_desc"><?php echo e($service->short_desc); ?></textarea>
                            <?php $__errorArgs = ['short_desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                            <textarea name="long_desc" id="long_desc"><?php echo e($service->long_desc); ?></textarea>
                            <?php $__errorArgs = ['long_desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Thumbnail image <span class="tx-danger">*</span></label>
                            <img src="<?php echo e(asset('public/frontend/img/service/uploads')); ?>/<?php echo e($service->img_1); ?> " alt=""
                                style="width:120px;height:120px">
                                <input type="hidden" name="prev_img_1" value=<?php echo e($service->img_1); ?> >
                        </div>
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Thumbnail image <span class="tx-danger">*</span></label>
                            <input type="file" name="img_1" id="">
                        </div>
                        <?php $__errorArgs = ['img_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <strong class="text-danger"><?php echo e($message); ?></strong>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Banner image <span class="tx-danger">*</span></label>
                            <img src="<?php echo e(asset('public/frontend/img/service/uploads')); ?>/<?php echo e($service->img_2); ?> " alt=""
                                style="width:120px;height:120px">
                                <input type="hidden" name="prev_img_2" value=<?php echo e($service->img_2); ?> >
                        </div>
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Banner image <span class="tx-danger">*</span></label>
                            <input type="file" name="img_2" id="">
                        </div>
                        <?php $__errorArgs = ['img_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <strong class="text-danger"><?php echo e($message); ?></strong>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" id='btn-submit' type="submit">Update Service</button>
                    <a href=<?php echo e(route('service.manage')); ?> class="btn btn-secondary">Back</a>
                </div><!-- form-layout-footer -->

            </div><!-- form-layout -->
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/nn/resources/views/admin/service/edit-service.blade.php ENDPATH**/ ?>