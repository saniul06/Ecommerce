<?php $__env->startSection('service'); ?>
    active show-sub
<?php $__env->stopSection(); ?>

<?php $__env->startSection('manage-service'); ?>
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
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Title</th>
                            <th class="wd-20p">Category</th>
                            <th class="wd-15p">Price</th>
                            <th class="wd-10p">Status</th>
                            <th class="wd-25p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;

                        ?>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e(asset('public/frontend/img/service/uploads')); ?>/<?php echo e($item->img_1); ?>" alt=""
                                        style="width:70px;height:70px"></td>
                                <td><?php echo e($item->service_name); ?></td>
                                <td><?php echo e($item->category->category_name); ?></td>
                                <td><?php echo e($item->price); ?></td>
                                <td>
                                    <?php if($item->status == 1): ?>
                                        <span class="badge badge-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href=<?php echo e(route('service.edit', [$item->id])); ?> class="btn btn-sm btn-success mr-1"
                                        title="edit"><i class='fa fa-pencil'></i></a>
                                    <button class="btn btn-sm btn-danger mr-1" title="delete"
                                        onclick="deleteService(<?php echo e($item->id); ?>)"><i class='fa fa-trash'></i></button>
                                    <?php if($item->status == 1): ?>
                                        <a href=<?php echo e(route('service.status', [$item->id, $item->status])); ?>

                                            class="btn btn-sm btn-warning mr-1" title="change status"><i
                                                class='fa fa-arrow-down'></i></a>
                                    <?php else: ?>
                                        <a href=<?php echo e(route('service.status', [$item->id, $item->status])); ?>

                                            class="btn btn-sm btn-success mr-1" title="change status"><i
                                                class='fa fa-arrow-up'></i></a>
                                    <?php endif; ?>
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

<?php echo $__env->make('admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/nn/resources/views/admin/service/manage-service.blade.php ENDPATH**/ ?>