@extends('admin.admin-master')

@section('order')
    active show-sub
@endsection

@section('all-order')
    active
@endsection

@section('admin-content')
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Manage Services</h6>

        <div class="table-wrapper">
            <div class="table-responsive">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Order Id</th>
                            <th class="wd-15p">Invoice No</th>
                            <th class="wd-15p">User Name</th>
                            <th class="wd-15p">User Email</th>
                            <th class="wd-15p">User phone</th>
                            <th class="wd-20p">Amount</th>
                            <th class="wd-20p">Status</th>
                            <th class="wd-20p">Confirmation</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;

                        @endphp
                        @foreach ($order as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->invoice_no }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>
                                    @if ($item->status == 'Paid')
                                        <span class="badge badge-success" style="font-size: 14px">{{ $item->status }}</span>
                                    @else
                                        <span class="badge badge-danger" style="font-size: 14px">{{ $item->status }}</span>
                                    @endif
                                </td>
                                @if ($item->confirm == 0)
                                <td class="text-center text-danger" style="font-size:25px">
                                    <i class="fa fa-window-close"></i>
                                </td>
                                @else
                                <td class="text-center text-success" style="font-size:25px">
                                    <i class="fa fa-check"></i>
                                </td>
                                @endif

                                <td>
                                    <a href={{ route('order.view', [$item->id]) }} class="btn btn-sm btn-success mr-1"
                                        title="view"><i class='fa fa-pencil'></i></a>
                                    <a onclick="return confirm('Are You Sure To Delete');" href="{{ url('admin/order/delete/' . $item->id) }}"
                                        class="btn btn-sm btn-danger mr-1" title="delete"><i
                                            class='fa fa-trash text-white'></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- table-wrapper -->
    </div><!-- card -->

    <script>
        function deleteService(id) {
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
                    {
                        window.location.href = "<?php echo URL::to('admin/service/delete/" + id +
                            "'); ?>"
                    }

                }
            })
        }

    </script>
@endsection
