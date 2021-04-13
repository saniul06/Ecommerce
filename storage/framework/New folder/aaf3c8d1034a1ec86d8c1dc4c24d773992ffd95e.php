<?php $__env->startSection('order'); ?>
    active show-sub
<?php $__env->stopSection(); ?>

<?php $__env->startSection('all-order'); ?>
    active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Manage Services</h6>

        <div class="table-wrapper">
            <div class="table-responsive">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Order Id</th>
                            <th class="wd-15p">User Name</th>
                            <th class="wd-15p">User Email</th>
                            <th class="wd-15p">User phone</th>
                            <th class="wd-20p">Amount</th>
                            <th class="wd-20p">Status</th>
                            <th class="wd-20p">Confirmation</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;

                        ?>
                        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->user->name); ?></td>
                                <td><?php echo e($item->user->email); ?></td>
                                <td><?php echo e($item->phone); ?></td>
                                <td><?php echo e($item->amount); ?></td>
                                <td>
                                    <?php if($item->status == 'Paid'): ?>
                                        <span class="badge badge-success" style="font-size: 14px"><?php echo e($item->status); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-danger" style="font-size: 14px"><?php echo e($item->status); ?></span>
                                    <?php endif; ?>
                                </td>
                                <?php if($item->confirm == 0): ?>
                                <td class="text-center text-danger" style="font-size:25px">
                                    <i class="fa fa-window-close"></i>
                                </td>
                                <?php else: ?>
                                <td class="text-center text-success" style="font-size:25px">
                                    <i class="fa fa-check"></i>
                                </td>
                                <?php endif; ?>

                                <td>
                                    <a href=<?php echo e(route('order.view', [$item->id])); ?> class="btn btn-sm btn-success mr-1"
                                        title="view"><i class='fa fa-pencil'></i></a>
                                    <a onclick="return confirm('Are You Sure To Delete');" href="<?php echo e(url('admin/order/delete/' . $item->id)); ?>"
                                        class="btn btn-sm btn-danger mr-1" title="delete"><i
                                            class='fa fa-trash text-white'></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div><!-- table-wrapper -->
    </div><!-- card -->

    <script>
        function deleteService(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    {
                        window.location.href = "<?php echo URL::to('admin/service/delete/" + id +
                            "'); ?>"
                    }

                }
            })
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/nn/resources/views/admin/order/all-order.blade.php ENDPATH**/ ?>