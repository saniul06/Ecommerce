@extends('admin.admin-master')

@section('service')
    active show-sub
@endsection

@section('manage-service')
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
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Title</th>
                            <th class="wd-20p">Category</th>
                            <th class="wd-15p">Price</th>
                            <th class="wd-10p">Status</th>
                            <th class="wd-25p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $item)
                            @php
                            $img = App\Multiimage::where('service_id', $item->id)->first()
                            @endphp
                            <tr>
                                @if ($img)
                                <td><img src="{{ asset('public/frontend/img/service/multi') }}/{{ $img->img }}" alt=""
                                    style="width:70px;height:70px"></td>
                                    @else
                                    <td>No image chosen</td>
                                @endif
                                <td>{{ $item->service_name }}</td>
                                <td>{{ $item->category->category_name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href={{ route('service.edit', [$item->id]) }} class="btn btn-sm btn-success mr-1"
                                        title="edit"><i class='fa fa-pencil'></i></a>
                                    <button class="btn btn-sm btn-danger mr-1" title="delete"
                                        onclick="deleteService({{ $item->id }})"><i class='fa fa-trash'></i></button>
                                    @if ($item->status == 1)
                                        <a href={{ route('service.status', [$item->id, $item->status]) }}
                                            class="btn btn-sm btn-warning mr-1" title="change status"><i
                                                class='fa fa-arrow-down'></i></a>
                                    @else
                                        <a href={{ route('service.status', [$item->id, $item->status]) }}
                                            class="btn btn-sm btn-success mr-1" title="change status"><i
                                                class='fa fa-arrow-up'></i></a>
                                    @endif
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
