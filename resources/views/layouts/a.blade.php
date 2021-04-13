<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="  csrf_token()   ">
    <title>Document</title>

</head>

<body>
    @php
    //    a = 1;
    // (   a == 1) ? '1' : (   a == 2) ? 2 (   a ==3) ? "3" : "4";
    //    marks=40;
    // print (   marks>=40) ? "pass" : "Fail";
    //    a = 77;
    // if(   a ==1){
    // echo '1';
    // } elseif(   a == 2){
    // echo '2';
    // }elseif(   a ==3){
    // echo "3";
    // } else {
    // echo "4";
    // }
    @endphp
 --
    <form action="  url('aa')   " method="post">
        @csrf
        <input type="text" name="a" id="" value='aaaaaa'>
        <input type="text" name="b" id="" value='bbbb'>
        <input type="text" name="c" id="" value='c'>
        <div>
            <input type="text" name="n" id="">
            <input type="text" name="nn" id="" value='kkkkkk'>
            <input type="text" name="nnn" id="" value='lllllllll'>
        </div>
        <button type="submit">submit</button>
    </form>
    <form action="  url('aa')   " method="post">
        @csrf
        <input type="text" name="a" id="" value='1111'>
        <input type="text" name="b" id="" value='2222'>
        <input type="text" name="c" id="" value='3333'>
        <button type="submit" onclick="show()">submit</button>
    </form>
    <h1 onclick='show()'>Click me</h1>
    ============================================================
    <div>
        <input type="text" name="myvalue" class="form-control input_text" value="aaa" id='ii' />
        <input type="button" class="clickme" value="Get Value" onclick='aa(this)' />
    </div>
    <div>
        <input type="text" name="myvalue" class="form-control input_text" value="bbb" id='ii' />
        <input type="button" class="clickme" value="Get Value" />
    </div>
    <div>
        <input type="text" name="myvalue" class="form-control input_text" value="ccc" id='ii' />
        <input type="button" class="clickme" value="Get Value" />
    </div>
    <div>
        <input type="text" name="myvalue" class="form-control input_text" value="ddd" id='ii' />
        <input type="button" class="clickme" value="Get Value" />
    </div>
    <div>
        <input type="text" name="myvalue" class="form-control input_text" value="eee" id='ii' />
        <input type="button" class="clickme" value="Get Value" />
    </div>
    <div id='table'></div>
    <button type="button" class="minus decrease left">
        <span>-</span>
    </button>
    @Html.TextBoxFor(model => model.EnteredQuantity, new {@class = "qty-input left"})
    <button type="button" class="plus increase left">
        <span>+</span>
    </button> --
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order Id:</th>
                    <th scope="row">    order->id </th>
                </tr>
                <tr>
                    <th scope="col">Invoice No:</th>
                    <th>     order->invoice_no   </th>
                </tr>
                <tr>
                    <th scope="col">Name:</th>
                    <th>     order->name   </th>
                </tr>
                <tr>
                    <th scope="col">Email:</th>
                    <th>     order->email   </th>
                </tr>
                <tr>
                    <th scope="col">Address:</th>
                    <th>     order->name   </th>
                </tr>
                <tr>
                    <th scope="col">phone:</th>
                    <th>     order->phone   </th>
                </tr>
                <tr>
                    <th scope="col">Amount:</th>
                    <th>     order->amount   </th>
                </tr>

            </thead>
            <tbody>
                <tr>


                    <td>     order->name   </td>
                    <td>     order->address   </td>
                </tr>
            </tbody>
        </table>
    </body>

    </html>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
           (document).ready(function() {
            function incrementQuantityValue(event) {
                event.preventDefault();
                event.stopPropagation();
                var input =    (this).siblings('.qty-input');
                var value = parseInt(input.val());
                if (isNaN(value)) {
                    input.val(1);
                    return;
                }
                value++;
                input.val(value);

                input.trigger('input');
            }
            function decrementQuantityValue(event) {
                event.preventDefault();
                event.stopPropagation();
                var input =    (this).siblings('.qty-input');
                var value = parseInt(input.val());
                if (isNaN(value)) {
                    input.val(1);
                    return;
                }
                if (value <= 1) {
                    return;
                }
                value--;
                input.val(value);

                input.trigger('input');
            }
            function handlePurchaseQuantityValue() {
                   (document).on('click', '.add-to-cart .increase, .cart .increase', incrementQuantityValue);
                   (document).on('click', '.add-to-cart .decrease, .cart .decrease', decrementQuantityValue);
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        //    (document).ready(function() {
        //        ('.clickme').click(function() {
        //         var div =    (this).closest('div');
        //         alert(div.find('#ii').val());
        //     });
        // });
        function aa(){
            var div =    (this).closest('div');
                alert(div.find('#ii').val());
        }

    </script>
    <script>
           .ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':    ('meta[name="csrf-token"]').attr('content')
            }
        });

        function show() {
               .ajax({
                type: 'get',
                url: 'aa',
                success: function(data) {
                       ('#table').html(data);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Added to Cart',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                error: function(data) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Status changed successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }

        function s() {
               .ajax({
                type: 'get',
                url: 'aa',
                success: function(data) {
                       ('#table').html(data);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Added to Cart',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                error: function(data) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Status changed successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }

    </script>
</body>

</html>
