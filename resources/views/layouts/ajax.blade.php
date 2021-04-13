{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> --}}
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($service as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->service_name }}</td>
            <td>{{ $item->price }}</td>
          </tr>
          @endforeach

        </tbody>
      </table>
{{-- </body>
</html> --}}
