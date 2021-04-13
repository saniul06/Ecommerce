@extends('layouts.frontend-master')

@section('frontend-content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ url('/pay') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name='first_name'
                                            class="form-control @error('first_name') is-invalid @enderror">
                                        @error('first_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name='last_name'
                                            class="form-control @error('last_name') is-invalid @enderror">
                                        @error('last_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <select id="cars" name="country"
                                    class="w-100 form-control @error('country') is-invalid @enderror">
                                    <option disabled selected>Choose...</option>
                                    <option value="bangladesh">Bangladesh</option>
                                </select>
                                @error('country')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address"
                                    class="checkout__input__add form-control @error('address') is-invalid @enderror"
                                    name="address">
                                    @error('address')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)"
                                    name='address_optional'>

                            </div>
                            <div class="checkout__input" name="city"">
                                                                                <p>Town/City<span>*</span></p>
                                                                                <input type=" text" name="city"
                                class="form-control @error('city') is-invalid @enderror">
                                @error('city')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="state" class="form-control @error('state') is-invalid @enderror">
                                @error('state')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="zip" class="form-control @error('zip') is-invalid @enderror">
                                @error('zip')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                {{-- <label for="diff-acc"> --}}

                                    <input class="coupon_question" type="checkbox" name="coupon_question" value="1"
                                        onchange="valueChanged()" />
                                    Ship to a different address?
                                    {{-- </label> --}}
                            </div>
                            {{-- SHIPPING START --}}
                            <div id="ship" style="display:none">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Fist Name<span>*</span></p>
                                            <input type="text" name='s_first_name'
                                                class="form-control @error('s_first_name') is-invalid @enderror ">
                                            @error('s_first_name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Last Name<span>*</span></p>
                                            <input type="text" name='s_last_name'
                                                class="form-control @error('s_last_name') is-invalid @enderror">
                                            @error('s_last_name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="checkout__input">
                                    <p>Country<span>*</span></p>
                                    <select id="cars" name="s_country"
                                        class="w-100 form-control @error('s_country') is-invalid @enderror">
                                        <option disabled selected>Choose...</option>
                                        <option value="bangladesh">Bangladesh</option>
                                    </select>
                                    @error('s_country')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" placeholder="Street Address"
                                        class="checkout__input__add form-control @error('s_address') is-invalid @enderror"
                                        name="s_address">
                                    @error('s_address')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                    <input type="text" placeholder="Apartment, suite, unite ect (optinal)"
                                        name='address_optional'>
                                </div>
                                <div class="checkout__input">
                                    <p>Town/City<span>*</span></p>
                                    <input type=" text" name="s_city"
                                        class="form-control @error('s_city') is-invalid @enderror">
                                    @error('s_city')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror

                                </div>
                                <div class="checkout__input">
                                    <p>Country/State<span>*</span></p>
                                    <input type="text" name="s_state"
                                        class="form-control @error('s_state') is-invalid @enderror">
                                    @error('s_state')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="checkout__input">
                                    <p>Postcode / ZIP<span>*</span></p>
                                    <input type="text" name="s_zip"
                                        class="form-control @error('s_zip') is-invalid @enderror">
                                    @error('s_zip')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            <input type="text" name="s_phone"
                                                class="form-control @error('s_phone') is-invalid @enderror">
                                            @error('s_phone')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="text" name="s_email"
                                                class="form-control @error('s_email') is-invalid @enderror">
                                            @error('s_email')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- SHIPING END --}}
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @php
                                    $total = 0
                                    @endphp
                                    @foreach ($cart as $item)
                                        <li>{{ $item->service->service_name }}
                                            <span>${{ $item->price * $item->quantity }}</span>
                                        </li>
                                        @php
                                        $total += $item->quantity * $item->price
                                        @endphp
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>${{ $total }}</span></div>
                                <div class="checkout__order__total">Total <span>${{ $total }}</span></div>
                                @if ($total != 0)
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
<script type="text/javascript">
    function valueChanged() {
        if ($('.coupon_question').is(":checked"))
            $("#ship").show();
        else
            $("#ship").hide();
    }

</script>
