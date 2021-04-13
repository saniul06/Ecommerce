<?php $__env->startSection('frontend-content'); ?>
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('public/frontend')); ?>/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo e(url('/')); ?>">Home</a>
                            <span>Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5">
        <div class="row">
            <?php echo $__env->make('user.inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-sm-8">
                <table class="table table-striped table-dark bg-white text-dark">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col">Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $amount = 0
                        ?>
                        <?php $__currentLoopData = $orderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><img
                                        src="<?php echo e(asset('public/frontend/img/service/uploads')); ?>/<?php echo e($item->service->img_1); ?>"
                                        alt="" style="width:50px;height:50px"></th>
                                <td><?php echo e($item->service->service_name); ?></td>
                                <td><?php echo e($item->quantity); ?></td>
                                <td><?php echo e($item->service->price); ?></td>
                                <td><?php echo e($item->quantity * $item->service->price); ?></td>
                                <td><?php echo e($item->created_at); ?></td>
                            </tr>
                            <?php
                            $amount += $item->quantity * $item->service->price
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3>Total: </h3>
                            </td>
                            <td>
                                <h3><?php echo e($amount); ?></h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/nn/resources/views/user/order-view.blade.php ENDPATH**/ ?>