@extends('layouts.frontend-master')

@section('frontend-content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Category</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        @include('frontend.inc.sidebar')
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="row">
                        @foreach ($services as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <?php
                                    $i = 0;
                                    foreach ($item->images as $image) {
                                    if ($i == 1) {
                                    break;
                                    } else {
                                    ?>
                                    <div class="product__item__pic set-bg"
                                        data-setbg="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}">
                                        <ul class="product__item__pic__hover">
                                            <li><button href="#"><i class="fa fa-heart"></i></button></li>
                                            <li><button href="#"><i class="fa fa-retweet"></i></button></li>
                                            {{-- <li><button onclick="cart({{ $item->id }}, {{ $item->price }})"><i
                                                        class="fa fa-shopping-cart"></i></button></li> --}}
                                                        <li><button class="cart" onclick="singleCart({{ $item->id }}, '{{ $item->service_name }}', {{ $item->price }}, {{ $item->service_code }}, '{{ $item->category->category_name }}', '{{ $image->img }}')"><i
                                                            class="fa fa-shopping-cart"></i></button></li>
                                        </ul>
                                    </div>
                                    <?php
                                    }
                                    $i++;
                                    }
                                    ?>
                                    <div class="product__item__text">
                                        <h6><a
                                                href="{{ route('service.details', $item->id) }}">{{ $item->service_name }}</a>
                                        </h6>
                                        <h5>${{ $item->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $services->links() }}
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
