@extends('layouts.frontend-master')

@section('banner')
    <div class="hero__item set-bg" data-setbg="{{ asset('public/frontend') }}/img/hero/banner.jpg">
        <div class="hero__text">
            <span>FRUIT FRESH</span>
            <h2>Vegetable <br />100% Organic</h2>
            <p>Free Pickup and Delivery Available</p>
            <a href="#" class="primary-btn">SHOP NOW</a>
        </div>
    </div>
@endsection

@section('frontend-content')
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($services as $item)
                        <div class="col-lg-3">
                            <?php
                            $i = 0;
                            foreach ($item->images as $image) {
                            if ($i == 1) {
                            break;
                            } else {
                            ?>
                            <div class="categories__item set-bg"
                                data-setbg="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}">
                                <h5><a href="{{ route('service.details', $item->id) }}">{{ $item->service_name }}</a></h5>
                            </div>
                            <?php
                            }
                            $i++;
                            }
                            ?>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($categories as $item)
                                <li data-filter=".f{{ $item->id }}">{{ $item->category_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($categories as $cat)
                    @php
                    $service = App\Service::where('status',1)->where('category_id', $cat->id)->latest()->get()
                    @endphp
                    @foreach ($service as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix f{{ $cat->id }}">
                            <div class="featured__item">
                                <?php
                                $i = 0;
                                foreach ($item->images as $image) {
                                if ($i == 1) {
                                break;
                                } else {
                                ?>
                                <div class="featured__item__pic set-bg"
                                    data-setbg="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}">
                                    <ul class="featured__item__pic__hover">
                                        <li><button href="#"><i class="fa fa-heart"></i></button></li>
                                        <li><button href="#"><i class="fa fa-retweet"></i></button></li>
                                        <li><button class="cart"
                                                onclick="singleCart({{ $item->id }}, '{{ $item->service_name }}', {{ $item->price }}, {{ $item->service_code }}, '{{ $item->category->category_name }}', '{{ $image->img }}')"><i
                                                    class="fa fa-shopping-cart"></i></button></li>
                                    </ul>
                                </div>
                                <?php
                                }
                                $i++;
                                }
                                ?>
                                <div class="featured__item__text">
                                    <h6><a href="{{ route('service.details', $item->id) }}">{{ $item->service_name }}</a>
                                    </h6>
                                    <h5>{{ $item->price }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('public/frontend') }}/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('public/frontend') }}/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($services_3 as $item)
                                    <a href="{{ route('service.details', $item->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <?php
                                            $i = 0;
                                            foreach ($item->images as $image) {
                                            if ($i == 1) {
                                            break;
                                            } else {
                                            ?>
                                            <img src="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}"
                                                alt="" style="width:110px;height:110px">
                                            <?php
                                            }
                                            $i++;
                                            }
                                            ?>
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $item->service_name }}</h6>
                                            <span>{{ $item->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($service_latest as $item)
                                    <a href="{{ route('service.details', $item->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <?php
                                            $i = 0;
                                            foreach ($item->images as $image) {
                                            if ($i == 1) {
                                            break;
                                            } else {
                                            ?>
                                            <img src="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}"
                                                alt="" style="width:110px;height:110px">
                                            <?php
                                            }
                                            $i++;
                                            }
                                            ?>
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $item->service_name }}</h6>
                                            <span>{{ $item->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($service_latest as $item)
                                    <a href="{{ route('service.details', $item->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <?php
                                            $i = 0;
                                            foreach ($item->images as $image) {
                                            if ($i == 1) {
                                            break;
                                            } else {
                                            ?>
                                            <img src="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}"
                                                alt="" style="width:110px;height:110px">
                                            <?php
                                            }
                                            $i++;
                                            }
                                            ?>

                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $item->service_name }}</h6>
                                            <span>{{ $item->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($services_3 as $item)
                                    <a href="{{ route('service.details', $item->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <?php
                                            $i = 0;
                                            foreach ($item->images as $image) {
                                            if ($i == 1) {
                                            break;
                                            } else {
                                            ?>
                                            <img src="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}"
                                                alt="" style="width:110px;height:110px">
                                            <?php
                                            }
                                            $i++;
                                            }
                                            ?>
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $item->service_name }}</h6>
                                            <span>{{ $item->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($services_3 as $item)
                                    <a href="{{ route('service.details', $item->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <?php
                                            $i = 0;
                                            foreach ($item->images as $image) {
                                            if ($i == 1) {
                                            break;
                                            } else {
                                            ?>
                                            <img src="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}"
                                                alt="" style="width:110px;height:110px">
                                            <?php
                                            }
                                            $i++;
                                            }
                                            ?>
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $item->service_name }}</h6>
                                            <span>{{ $item->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($service_latest as $item)
                                    <a href="{{ route('service.details', $item->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <?php
                                            $i = 0;
                                            foreach ($item->images as $image) {
                                            if ($i == 1) {
                                            break;
                                            } else {
                                            ?>
                                            <img src="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}"
                                                alt="" style="width:110px;height:110px">
                                            <?php
                                            }
                                            $i++;
                                            }
                                            ?>
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $item->service_name }}</h6>
                                            <span>{{ $item->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

@endsection
<script>
    //    window.onload =  jQuery("section.hero").removeClass("hero-normal");
    window.onload = function() {
        var element = document.getElementById("myDIV");
        element.classList.remove("hero-normal");
    }

</script>
