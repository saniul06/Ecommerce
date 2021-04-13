@php
$i = 1
@endphp
@foreach ($category as $item)
    <tr>
        <td>' {{ $i++ }} </td>
        <td>{{ $item->category_name }}</td>
        <td>

            @if ($item->status == 1)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">Iactive</span>
            @endif
        </td>
        <td>
            <button class="btn btn-sm btn-primary mr-1" onclick="editCat({{ $item->id }})" title="edit"><i
                    class="fa fa-pencil"></i></button>
            <button class="btn btn-sm btn-danger mr-1" onclick="deleteCat({{ $item->id }})" title="delete"><i
                    class="fa fa-trash"></i></button>

            @if ($item->status == 1)
                <button class="btn btn-sm btn-warning mr-1" onclick="status({{ $item->id }}  ,{{ $item->status }})"
                    title="change status"><i class="fa fa-arrow-down"></i></button>
            @else
                <button class="btn btn-sm btn-success mr-1" onclick="status({{ $item->id }} , {{ $item->status }})"
                    title="change status"><i class="fa fa-arrow-up"></i></button>
            @endif

        </td>
    </tr>
@endforeach
