<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            /* background-color: #4CAF50; */
        }

    </style>
</head>

<body>
    <table id="customers" style="color:#000">
        <tbody>
            <tr>
                <th scope="col">Order Id:</th>
                <th scope="row">{{ $order->id }}</th>
            </tr>
            <tr>
                <th scope="col">Invoice No:</th>
                <th>{{ $order->invoice_no }}</th>
            </tr>
            <tr>
                <th scope="col">Name:</th>
                <th>{{ $order->name }}</th>
            </tr>
            <tr>
                <th scope="col">Email:</th>
                <th>{{ $order->email }}</th>
            </tr>
            <tr>
                <th scope="col">Address:</th>
                <th>{{ $order->name }}</th>
            </tr>
            <tr>
                <th scope="col">phone:</th>
                <th>{{ $order->phone }}</th>
            </tr>
            <tr>
                <th scope="col">Amount:</th>
                <th>{{ $order->amount }}</th>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{ $order->address }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ url('/') }}">Visit Site</a>
</body>

</html>
