<div class="sidebar__item">
    <h4>Categories</h4>
    <ul>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(route('category.page', $item->id)); ?>"><?php echo e($item->category_name); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH /opt/lampp/htdocs/nn/resources/views/frontend/inc/sidebar.blade.php ENDPATH**/ ?>