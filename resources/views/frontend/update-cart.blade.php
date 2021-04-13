<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('fail'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ session('fail') }}
                    </div>
                @endif
                <div class="shoping__cart__table">
                    @php
                    $total = 0;
                    @endphp
                    @if ($cart != null)

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
                                @foreach ($cart as $item)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            @php
                                            $i = 0
                                            @endphp
                                            @foreach ($item->service->images as $img)
                                                @if ($i == 1)
                                                    @php
                                                    break
                                                    @endphp
                                                @endif
                                                @php
                                                $i++
                                                @endphp
                                                <img src="{{ asset('public/frontend/img/service/multi') }}/{{ $img->img }}"
                                                    alt="" style="width:80px;height:80px">
                                            @endforeach
                                            <h5>{{ $item->service->service_name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            ${{ $item->price }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div>
                                                <input type="hidden" value={{ $item->id }} id="cart_id">

                                                <input type="number" value="{{ $item->quantity }}" id='c-quantity'>

                                                <button id='update' class="btn btn-sm btn-success"
                                                    style="backgroun: #7fad39">Update</button>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            ${{ $item->quantity * $item->price }}
                                            @php
                                            $total += $item->quantity * $item->price
                                            @endphp
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <button style="background: lightgray;border:none"><span class="icon_close"
                                                    style="color:red;font-weight:bold"
                                                    onclick="deleteCart({{ $item->id }})"></span></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-warning text-center" role="alert">
                                    <h3>You cart is empty</h3>
                                </div>
                    @endif
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span
                            class="icon_loading"></span>
                        Upadate Cart</a> --}}
                </div>
            </div>
            <div class="col-lg-6">
                {{-- <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>${{ $total }}</span></li>
                        <li>Total <span>${{ $total }}</span></li>
                    </ul>
                    @php
                    Session::put('total', $total);
                    @endphp
                    <a class="primary-btn" @if ($cart != null)
                        href="{{ route('checkout') }}"
                        @endif>PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
