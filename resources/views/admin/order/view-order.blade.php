@extends('admin.admin-master')

@section('order')
    active show-sub
@endsection

@section('all-order')
    active
@endsection

@section('admin-content')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Shipping Details</h6>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Firstname:</label>
                        <input class="form-control" value="{{ $shipping->s_first_name }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Lastname:</label>
                        <input class="form-control" value="{{ $shipping->s_last_name }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Email:</label>
                        <input class="form-control" value="{{ $shipping->s_email }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Phone:</label>
                        <input class="form-control" value="{{ $shipping->s_phone }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Country:</label>
                        <input class="form-control" value="{{ $shipping->s_country }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">City:</label>
                        <input class="form-control" value="{{ $shipping->s_city }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">State:</label>
                        <input class="form-control" value="{{ $shipping->s_state }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Zip:</label>
                        <input class="form-control" value="{{ $shipping->s_zip }}" readonly>
                    </div>
                </div><!-- col-4 -->


                <div class="col-lg-8">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Shipping Address:</label>
                        <input class="form-control" value="{{ $shipping->s_address }}" readonly>
                    </div>
                </div><!-- col-8 -->
                <div class="col-lg-8">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Shipping Address (Optional):</label>
                        <input class="form-control" value="{{ $shipping->address_optional }}" readonly>
                    </div>
                </div><!-- col-8 -->
            </div><!-- row -->
        </div><!-- form-layout -->
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Order Info</h6>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Username:</label>
                        <input class="form-control" value="{{ $order->user->name }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Email:</label>
                        <input class="form-control" value="{{ $order->email }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Phone:</label>
                        <input class="form-control" value="{{ $order->phone }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Amount:</label>
                        <input class="form-control" value="{{ $order->amount }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Invoice No:</label>
                        <input class="form-control" value="{{ $order->invoice_no }}" readonly>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Status:</label>
                        @if ($order->status == 'Paid')
                            <input class="form-control bg-success text-white text-bold" value="{{ $order->status }}"
                                readonly>
                        @else
                            <input class="form-control bg-danger text-white text-bold" value="{{ $order->status }}"
                                readonly>
                        @endif
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Currency:</label>
                        <input class="form-control" value="{{ $order->currency }}" readonly>
                    </div>
                </div><!-- col-4 -->


                <div class="col-lg-8">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Address:</label>
                        <input class="form-control" value="{{ $order->address }}" readonly>
                    </div>
                </div><!-- col-8 -->
            </div><!-- row -->
        </div><!-- form-layout -->
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Product Details</h6>
        <table class="table table-striped table-dark bg-white">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $amount = 0
                @endphp
                @foreach ($orderItem as $item)
                <tr>
                    @php
                        $i = 0
                    @endphp
                    @foreach ($item->service->images as $image)
                    <th scope="row"><img src="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }}" alt="" style="width:50px;height:50px"></th>
                    @if ($i == 1)
                    @php
                        break
                    @endphp
                    @endif
                    @php
                        $i++
                    @endphp
                    @endforeach
                    <td>{{ $item->service->service_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->service->price }}</td>
                    <td>{{ $item->quantity * $item->service->price }}</td>
                </tr>
                @php
                    $amount += $item->quantity * $item->service->price
                @endphp
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h3>Total: </h3></td>
                    <td><h3>{{ $amount }}</h3></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-layout-footer">
        <a href={{ route('order.all') }} class="btn btn-info mt-4 text-white">Back</a>
    </div><!-- form-layout-footer -->

@endsection
