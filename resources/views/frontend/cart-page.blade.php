@extends('layouts.frontend-master')

@section('frontend-content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend') }}/img/breadcrumb.jpg">
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
    @if (Session::has('fail'))
        <div class="container mt-5">
            <div class="alert alert-danger text-center" role="alert">
                {{ session('fail') }}
            </div>
        </div>
    @endif
    <div id="show-table">

    </div>
@endsection
