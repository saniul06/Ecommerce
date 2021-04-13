@extends('layouts.frontend-master')
@section('frontend-content')
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            @php
                            $i = 0;
                            @endphp
                            @foreach ($service->images as $item)
                                @if ($i == 1)
                                    @php
                                    break;
                                    @endphp
                                @else
                                    @php
                                    $i++
                                    @endphp
                                @endif
                                <img class="product__details__pic__item--large"
                                    src="{{ asset('public/frontend/img/service/multi') }}/{{ $item->img }}" alt="">
                            @endforeach
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach ($service->images as $item)
                                <img data-imgbigurl="{{ asset('public/frontend/img/service/multi/') }}/{{ $item->img }}"
                                    src="{{ asset('public/frontend/img/service/multi/') }}/{{ $item->img }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $service->category->category_name }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">${{ $service->price }}</div>
                        <p>{{ $service->short_desc }}</p>
                        <div class="product__details__quantity">
                            @if ($cart == null)
                                <div class="quantity">
                                    <input id="cart_id" type="hidden" value=0>
                                    <input id="service_id" type="hidden" value={{ $service->id }}>
                                    <input id="price" type="hidden" value={{ $service->price }}>
                                    <div class="pro-qty">
                                        <input type="text" value=1 id='q' name="quantity">
                                    </div>
                                    <button type="submit" onclick="addCart()" class="btn btn-sm btn-success"
                                        style="backgroun: #7fad39">Add to Cart</button>
                                    <a href={{ route('cart-page') }} class="btn btn-sm btn-success"
                                        style="backgroun: #7fad39">Procced to checkout</a>

                                </div>
                            @else
                                <div class="quantity">
                                    <input id="cart_id" type="hidden" value={{ $cart->id }}>
                                    <input id="service_id" type="hidden" value={{ $service->id }}>
                                    <input id="price" type="hidden" value={{ $service->price }}>
                                    <div class="pro-qty">
                                        <input type="text" value="1" id='q' name="quantity">
                                    </div>
                                    <button type="submit" onclick="addCart()" class="btn btn-sm btn-success"
                                        style="backgroun: #7fad39">Add to Cart</button>
                                    <a href={{ route('cart-page') }} class="btn btn-sm btn-success"
                                        style="backgroun: #7fad39">Procced to checkout</a>
                                </div>
                            @endif
                        </div>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    {{ $service->long_desc }}
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
