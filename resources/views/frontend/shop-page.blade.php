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
                            <span>Shop</span>
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
                    @include('frontend.inc.sidebar')
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($services as $item)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <?php
                                            $i = 0;
                                            foreach ($item->images as $image) {
                                                if($i == 1){
                                                    break;
                                                } else { ?>
                                                    <div class="product__discount__item__pic set-bg"
                                                    data-setbg="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}">
                                                    <ul class="product__item__pic__hover">
                                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                        <li><button class="cart" onclick="singleCart({{ $item->id }}, '{{ $item->service_name }}', {{ $item->price }}, {{ $item->service_code }}, '{{ $item->category->category_name }}', '{{ $image->img }}')"><i
                                                            class="fa fa-shopping-cart"></i></button></li>
                                                    </ul>
                                                    </div>

                                            <?php    }
                                            $i++;
                                            }
                                            ?>
                                            <div class="product__discount__item__text">
                                                <span class='text-dark'>{{ $item->service_name }}</span>
                                                <h5><a href="{{ route('category.page', $item->category->id) }}">{{ $item->category->category_name }}</a></h5>
                                                <div class="product__item__price">{{ $item->price }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($services as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <?php
                                    $i = 0;
                                    foreach ($item->images as $image) {
                                        if($i == 1){
                                            break;
                                        } else { ?>
                                            <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                {{-- <li><button onclick="cart({{ $item->id }}, {{ $item->price }})"><i
                                                            class="fa fa-shopping-cart"></i></button></li> --}}
                                                            <li><button class="cart" onclick="singleCart({{ $item->id }}, '{{ $item->service_name }}', {{ $item->price }}, {{ $item->service_code }}, '{{ $item->category->category_name }}', '{{ $image->img }}')"><i
                                                                class="fa fa-shopping-cart"></i></button></li>
                                            </ul>
                                            </div>
                                        <?php }
                                        $i++;
                                    }
                                    ?>
                                    <div class="product__item__text">
                                        <h6><a href="{{ route('service.details', $item->id) }}">{{ $item->service_name }}</a></h6>
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
