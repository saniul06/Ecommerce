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
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success text-center" role="alert">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <?php echo $__env->make('user.inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-sm-8">
                <table class="table">
                    <thead class="table-dark">
                        <th scope="col">#</th>
                        <th scope="col">Status</th>
                        <th scope="col">Currency</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Received</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;

                        ?>
                        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($item->status); ?></td>
                                <td><?php echo e($item->currency); ?></td>
                                <td><?php echo e($item->amount); ?></td>
                                <?php if($item->confirm == 0): ?>
                                    <td class="text-danger">Not Received</td>
                                <?php else: ?>
                                    <td class="text-success">Received</td>
                                <?php endif; ?>
                                <td><a href=<?php echo e(route('user.order.view', [$item->id])); ?> class="btn btn-sm btn-success mr-1"
                                        title="view">View</a>
                                        <a href=<?php echo e(route('user.order.confirm', [$item->id])); ?> class="btn btn-sm btn-success mr-1"
                                            title="view">Confirm</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/nn/resources/views/user/user-order.blade.php ENDPATH**/ ?>