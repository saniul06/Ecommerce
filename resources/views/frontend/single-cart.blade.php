<button type="button" class="close text-right" aria-label="Close">
    <span class="cart-box-close" aria-hidden="true">&times;</span>
</button>
<div class="container">
    <div class="row my-5">
        <div class="d-none d-md-block col-md-6">
            <img src="{{ asset('public/frontend/img/service/multi') }}/{{ $img }}" alt="" style="width:100%;height:auto">
        </div>
        <div class="col-12 col-md-6">
            <div class="row mb-3">
                <div class="col-md-3 f-13">Service Title:</div>
                <div class="col-md-9 f-13">{{ $service_name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 f-13">Price:</div>
                <div class="col-md-9 f-13">{{ $price }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 f-13">Service code:</div>
                <div class="col-md-9 f-13">{{ $service_code }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 f-13">Category:</div>
                <div class="col-md-9 f-13">{{ $category_name }}</div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-md-2 f-13">
                    Total Price:
                </div>
                <div class="col-md-10">
                    <span style="color:red;font-size:30px" id='span'>{{ $total }}</span>
                </div>
            </div>

            {{-- ============================ --}}
            @if ($cart == null)

                <input id="cart_id" type="hidden" value=0>
                <input id="service_id" type="hidden" value={{ $id }}>
                <input id="price" type="hidden" value={{ $price }}>
                <input type="number" value=1 id='q' name="quantity" style="background:gainsboro">
                <button type="submit" onclick="addCart()" class="btn btn-sm btn-success" style="backgroun: #7fad39">Add
                    to
                    Cart</button>
                <br>
                <br>
                <a href={{ route('cart-page') }} class="btn btn-sm btn-success" style="backgroun: #7fad39">Procced to
                    checkout</a>


            @else

                <input id="cart_id" type="hidden" value={{ $cart->id }}>
                <input id="service_id" type="hidden" value={{ $id }}>
                <input id="price" type="hidden" value={{ $price }}>
                <input type="number" value="1" id='q' name="quantity">
                <button type="submit" onclick="addCart()" class="btn btn-sm btn-success" style="backgroun: #7fad39">Add
                    to
                    Cart</button>
                <br>
                <br>
                <a href={{ route('cart-page') }} class="btn btn-sm btn-success" style="backgroun: #7fad39">Procced to
                    checkout</a>

            @endif
            {{-- ============================ --}}
        </div>
    </div>
</div>
