<?php $__env->startSection('frontend-content'); ?>
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('public/frontend')); ?>/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?php echo e(session('fail')); ?>

                      </div>
                    <?php endif; ?>
                    <div class="shoping__cart__table">
                        <?php
                        $total = 0;
                        ?>
                        <?php if($cart != null): ?>

                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="<?php echo e(asset('public/frontend/img/service/uploads')); ?>/<?php echo e($item->service->img_1); ?>"
                                                    alt="" style="width:80px;height:80px">
                                                <h5><?php echo e($item->service->service_name); ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                $<?php echo e($item->price); ?>

                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <form action="<?php echo e(url('cart-update')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" value=<?php echo e($item->id); ?>>
                                                        <div class="pro-qty">
                                                            <input type="text" value="<?php echo e($item->quantity); ?>"
                                                                name="quantity">
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            style="backgroun: #7fad39">Update</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                $<?php echo e($item->quantity * $item->price); ?>

                                                <?php
                                                $total += $item->quantity * $item->price
                                                ?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="<?php echo e(url('cart-delete/' . $item->id)); ?>"><span
                                                        class="icon_close"></span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <h2 style='text-align:center;color:red'>You have no item</h2>
                        <?php endif; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="<?php echo e(url('/')); ?>" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$<?php echo e($total); ?></span></li>
                            <li>Total <span>$<?php echo e($total); ?></span></li>
                        </ul>
                        <?php
                         Session::put('total', $total);
                        ?>
                        <a  class="primary-btn" <?php if($cart != null): ?>
                        href="<?php echo e(route('checkout')); ?>"
                            <?php endif; ?>>PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/nn/resources/views/frontend/cart-page.blade.php ENDPATH**/ ?>