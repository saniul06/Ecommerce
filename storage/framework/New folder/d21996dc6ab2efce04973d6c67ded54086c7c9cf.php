<?php $__env->startSection('order'); ?>
    active show-sub
<?php $__env->stopSection(); ?>

<?php $__env->startSection('all-order'); ?>
    active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Shipping Details</h6>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Firstname:</label>
                        <input class="form-control" value="<?php echo e($shipping->s_first_name); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Lastname:</label>
                        <input class="form-control" value="<?php echo e($shipping->s_last_name); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Email:</label>
                        <input class="form-control" value="<?php echo e($shipping->s_email); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Phone:</label>
                        <input class="form-control" value="<?php echo e($shipping->s_phone); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Country:</label>
                        <input class="form-control" value="<?php echo e($shipping->s_country); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">City:</label>
                        <input class="form-control" value="<?php echo e($shipping->s_city); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">State:</label>
                        <input class="form-control" value="<?php echo e($shipping->s_state); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Zip:</label>
                        <input class="form-control" value="<?php echo e($shipping->s_zip); ?>" readonly>
                    </div>
                </div><!-- col-4 -->


                <div class="col-lg-8">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Shipping Address:</label>
                        <input class="form-control" value="<?php echo e($shipping->s_address); ?>" readonly>
                    </div>
                </div><!-- col-8 -->
                <div class="col-lg-8">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Shipping Address (Optional):</label>
                        <input class="form-control" value="<?php echo e($shipping->address_optional); ?>" readonly>
                    </div>
                </div><!-- col-8 -->
            </div><!-- row -->
        </div><!-- form-layout -->
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Order Info</h6>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Username:</label>
                        <input class="form-control" value="<?php echo e($order->user->name); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Email:</label>
                        <input class="form-control" value="<?php echo e($order->email); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Phone:</label>
                        <input class="form-control" value="<?php echo e($order->phone); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Amount:</label>
                        <input class="form-control" value="<?php echo e($order->amount); ?>" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Status:</label>
                        <?php if($order->status == 'Paid'): ?>
                            <input class="form-control bg-success text-white text-bold" value="<?php echo e($order->status); ?>"
                                readonly>
                        <?php else: ?>
                            <input class="form-control bg-danger text-white text-bold" value="<?php echo e($order->status); ?>"
                                readonly>
                        <?php endif; ?>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Currency:</label>
                        <input class="form-control" value="<?php echo e($order->currency); ?>" readonly>
                    </div>
                </div><!-- col-4 -->


                <div class="col-lg-8">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Address:</label>
                        <input class="form-control" value="<?php echo e($order->address); ?>" readonly>
                    </div>
                </div><!-- col-8 -->
            </div><!-- row -->
        </div><!-- form-layout -->
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Product Details</h6>
        <table class="table table-striped table-dark bg-white">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $amount = 0
                ?>
                <?php $__currentLoopData = $orderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><img src="<?php echo e(asset('public/frontend/img/service/uploads')); ?>/<?php echo e($item->service->img_1); ?>" alt="" style="width:50px;height:50px"></th>
                    <td><?php echo e($item->service->service_name); ?></td>
                    <td><?php echo e($item->quantity); ?></td>
                    <td><?php echo e($item->service->price); ?></td>
                    <td><?php echo e($item->quantity * $item->service->price); ?></td>
                </tr>
                <?php
                    $amount += $item->quantity * $item->service->price
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h3>Total: </h3></td>
                    <td><h3><?php echo e($amount); ?></h3></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-layout-footer">
        <a href=<?php echo e(route('order.all')); ?> class="btn btn-info mt-4 text-white">Back</a>
    </div><!-- form-layout-footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/nn/resources/views/admin/order/view-order.blade.php ENDPATH**/ ?>