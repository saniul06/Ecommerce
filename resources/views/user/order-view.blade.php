@extends('layouts.frontend-master')


@section('frontend-content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5">
        <div class="row">
            @include('user.inc.sidebar')
            <div class="col-sm-8">
                <table class="table table-striped table-dark bg-white text-dark">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col">Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $amount = 0
                        @endphp
                        @foreach ($orderItem as $item)
                            <tr>
                                <?php
                                $i = 0;
                                foreach ($item->service->images as $image) {
                                if ($i == 1) {
                                break;
                                } else {
                                ?>
                                <th scope="row"><img
                                        src="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}" alt=""
                                        style="width:50px;height:50px"></th>

                                <?php
                                }
                                $i++;
                                }
                                ?>
                                <td>{{ $item->service->service_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->service->price }}</td>
                                <td>{{ $item->quantity * $item->service->price }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                            @php
                            $amount += $item->quantity * $item->service->price
                            @endphp
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3>Total: </h3>
                            </td>
                            <td>
                                <h3>{{ $amount }}</h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
