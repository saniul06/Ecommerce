@if ($order != null)
    <table class="table">
        <thead class="table-dark text-center">
            <th scope="col">#</th>
            <th scope="col">Invoice No</th>
            <th scope="col">Status</th>
            <th scope="col">Currency</th>
            <th scope="col">Amount</th>
            <th scope="col">Received</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @php
            $i = 1;

            @endphp
            @foreach ($order as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->invoice_no }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->currency }}</td>
                    <td>{{ $item->amount }}</td>
                    @if ($item->confirm == 0)
                        <td class="text-danger">Not Received</td>
                    @else
                        <td class="text-success">Received</td>
                    @endif
                    <td><a href={{ route('user.order.view', [$item->id]) }} class="btn btn-sm btn-info mr-1"
                            title="view">View</a>
                        @if ($item->confirm == 1)
                        <button class="btn btn-sm btn-success mr-1" onclick="orderConfirm({{ $item->id }})"
                            title="view">Confirm</button>
                            @else
                            <button class="btn btn-sm btn-warning mr-1" onclick="orderConfirm({{ $item->id }})"
                                title="view">Confirm</button>
                        @endif
                        <button class="btn btn-sm btn-danger mr-1" onclick="orderDelete({{ $item->id }})"
                            title="view">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-warning text-center" role="alert">
        <h3>You do not have any orders</h3>
    </div>
@endif
