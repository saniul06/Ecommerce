$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function allCat() {
    $.ajax({
        url: 'category/all',
        success: function (data) {
            $('#category-table').html(data)
        }
    })
}
allCat();

function addCat() {
    $('#cat_error').html('');
    var name = $('#category_name').val();
    var status = $('#status').val();
    if (name.length <= 0) {
        $('#cat_error').html('Please insert a name')
        return false;
    }
    $.ajax({
        type: 'post',
        data: {
            n: name,
            s: status
        },
        url: 'category/store',
        success: function (data) {
            allCat();
            $('#category_name').val("")
            $('#changed').html(
                '<button type="submit" class="btn btn-primary" onclick="addCat()">Add</button>')
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Category added successfully',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })

}


function deleteCat(id) {
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
                data: {
                    i: id
                },
                url: 'category/delete',
                success: function (data) {
                    allCat();
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Category deleted successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                error: function (data) {
                    allCat();
                    Swal.fire({
                        icon: 'error',
                        title: 'Can not be deleted',
                        text: 'Category is in Use'
                    })
                }
            })

        }
    })
}

function editCat(id) {
    var add = "";
    $.ajax({
        data: {
            i: id
        },
        url: 'category/edit',
        success: function (data) {
            $('#category_name').val(data.category_name)
            if (data.status == 0) {
                add +=
                    '<option value="1" >Active</option><option value="0" selected>Inactive</option>';
            } else {
                add +=
                    '<option value="1" selected>Active</option><option value="0">Inactive</option>';
            }
            $('#status').html(add)
            $('#changed').html('<button type="submit" class="btn btn-primary mr-2" onclick="addCat()">Add</button><button type="submit" class="btn btn-primary" onclick="updateCat(' +
                data.id + ')">Update</button>')
        }
    })
}

function updateCat(id) {
    $('#cat_error').html('');
    var name = $('#category_name').val();
    var status = $('#status').val();
    if (name.length <= 0) {
        $('#cat_error').html('Please insert a name')
        return false;
    }
    $.ajax({
        type: 'post',
        data: {
            i: id,
            n: name,
            s: status
        },
        url: 'category/update',
        success: function (data) {
            $('#category_name').val("")
            $('#changed').html(
                '<button type="submit" class="btn btn-primary" onclick="addCat()">Add</button>')
            allCat()
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Category edited successfully',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
}

function status(id, status) {
    $.ajax({
        type: 'post',
        url: 'category/status/' + id + '/' + status,
        success: function (data) {
            allCat();
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Status changed successfully',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
}

/////  ADD TO CART
function cart(id, price) {
    $.ajax({
        type: 'post',
        url: 'add-to-cart/' + id + '/' + price,
        success: function (data) {
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

