$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/////  ADD TO CART
function cart(id, price) {
    $.ajax({
        type: 'post',
        url: 'add-to-cart/' + id + '/' + price,
        success: function (data) {
            $("span#amount").html(data[0]);
            $("span#quantity").html(data[1]);
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Added to Cart',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function (data) {
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

function addCart() {
    var cart_id = $('#cart_id').val();
    var service_id = $('#service_id').val();
    var q = $('#q').val();
    var price = $('#price').val();
    $.ajax({
        type: 'post',
        data: {
            cart_id: cart_id,
            service_id: service_id,
            q: q,
            price: price,
        },
        url: 'add-cart',
        success: function (data) {
            $("span#amount").html(data[0]);
            $("span#span").html(data[0]);
            $("span#quantity").html(data[1]);
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Added to Cart',
                showConfirmButton: false,
                timer: 1000
            })
        },
        error: function (data) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: 'Please enter a positive value',
                showConfirmButton: false,
                timer: 3000
            })
        }
    })
}

$(document).on('click', '#update', function () {
    var div = $(this).closest('div');
    var cart_id = div.find('#cart_id').val();
    var q = div.find('#c-quantity').val();
    $.ajax({
        type: 'post',
        data: {
            id: cart_id,
            q: q,
        },
        url: 'cart-page/cart-update',
        success: function (data) {
            $("span#amount").html(data[0]);
            $("span#quantity").html(data[1]);
            showCart()
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Added to Cart',
                showConfirmButton: false,
                timer: 1000
            })
        },
        error: function (data) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: 'Please enter a positive value',
                showConfirmButton: false,
                timer: 3000
            })
        }
    })
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/////  ADD TO CART
function cart(id, price) {
    $.ajax({
        type: 'post',
        url: 'add-to-cart/' + id + '/' + price,
        success: function (data) {
            $("span#amount").html(data[0]);
            $("span#quantity").html(data[1]);
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Added to Cart',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function (data) {
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

// function addCart() {
//     var a = 0
//     var cart_id = $('#cart_id').val();
//     var service_id = $('#service_id').val();
//     var q = $('#q').val();
//     var price = $('#price').val();
//     console.log('show me')
//     $.ajax({
//         type: 'post',
//         data: {
//             cart_id: cart_id,
//             service_id: service_id,
//             q: q,
//             price: price,
//         },
//         url: 'add-cart',
//         success: function (data) {
//             $("span#amount").html(data[0]);
//             $("span#quantity").html(data[1]);
//             Swal.fire({
//                 toast: true,
//                 position: 'top-end',
//                 icon: 'success',
//                 title: 'Added to Cart',
//                 showConfirmButton: false,
//                 timer: 1000
//             })
//         },
//         error: function (data) {
//             Swal.fire({
//                 toast: true,
//                 position: 'top-end',
//                 icon: 'error',
//                 title: 'Please enter a positive value',
//                 showConfirmButton: false,
//                 timer: 3000
//             })
//         }
//     })
// }

$(document).on('click', '#update', function () {
    var div = $(this).closest('div');
    var cart_id = div.find('#cart_id').val();
    var q = div.find('#c-quantity').val();
    $.ajax({
        type: 'post',
        data: {
            id: cart_id,
            q: q,
        },
        url: 'cart-page/cart-update',
        success: function (data) {
            $("span#amount").html(data[0]);
            $("span#quantity").html(data[1]);
            showCart()
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Added to Cart',
                showConfirmButton: false,
                timer: 1000
            })
        },
        error: function (data) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: 'Please enter a positive value',
                showConfirmButton: false,
                timer: 3000
            })
        }
    })
});

function deleteCart(id) {
    $.ajax({
        type: 'get',
        url: 'cart-page/cart-delete/' + id,
        success: function (data) {
            $("span#amount").html(data[0]);
            $("span#quantity").html(data[1]);
            showCart()
            $("span#amount").html(data[0]);
            $("span#quantity").html(data[1]);
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Deleted successfully',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function (data) {
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





function updateCart(id, price) {
    $.ajax({
        type: 'post',
        url: 'add-to-cart/' + id + '/' + price,
        success: function (data) {
            $("span#amount").html(data[0]);
            $("span#quantity").html(data[1]);
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Added to Cart',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function (data) {
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

function deleteCart(id) {
    $.ajax({
        type: 'get',
        url: 'cart-page/cart-delete/' + id,
        success: function (data) {
            $("span#amount").html(data[0]);
            $("span#quantity").html(data[1]);
            showCart()
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Deleted successfully',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function (data) {
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



function showCart() {
    $.ajax({
        type: 'post',
        url: 'cart-page/update-cart',
        success: function (data) {
            $("#show-table").html(data);
        },
    })
}


showCart()

function singleCart(service_id, service_name, price, service_code, category_name, img) {
    $("#cart").css("width", "80%").css("height", "80%").css("opacity", "1");
    $("#overlay").css("width", "100%").css("height", "100%");
    $(".close").css("display", "block");
    $.ajax({
        type: 'post',
        url: 'single-cart/' + service_id + '/' + service_name + '/' + price + '/' + service_code + '/' + category_name + '/' + img,
        success: function (data) {
            $("#cart").html(data);
        },
    })
}

// function singleCartCategory(service_id, service_name, price, service_code, category_name, img) {
//     $("#cart").css("width", "80%").css("height", "80%").css("opacity", "1");
//     $("#overlay").css("width", "100%").css("height", "100%");
//     $(".close").css("display", "block");
//     $.ajax({
//         type: 'post',
//         url: 'single-cart/' + service_id + '/' + service_name + '/' + price + '/' + service_code + '/' + category_name + '/' + img,
//         success: function (data) {
//             $("#cart").html(data);
//         },
//     })
// }

$(document).on('click', '.close', function () {
    $("#cart").css("width", "0").css("height", "0").css("opacity", "0");
    $("#overlay").css("width", "0").css("height", "0");
    $(".close").css("display", "none");
    $('#cart').html("");
})

function showOrder() {
    $.ajax({
        type: 'get',
        url: 'order/show-order',
        success: function (data) {
            $("#order").html(data);
        },
    })
}

function orderConfirm(id) {
    $.ajax({
        type: 'post',
        url: 'order/confirm/' + id,
        success: function (data) {
            showOrder()
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Confirmation Successful',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function (data) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: 'Confirmation Failed',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
}

function orderDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'get',
                url: 'order/delete/' + id,
                success: function (data) {
                    showOrder()
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Order Deleted Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                error: function (data) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Order Deletion Failed',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })

        }
    })

}

showOrder()
