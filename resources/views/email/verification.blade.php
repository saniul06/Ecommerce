<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Hello {{ $user->name }}</p>
    <p>Click below link to activate your account</p>
    <a
        href="{{ route('verify', $user->email_verification_token) }}">{{ route('verify', $user->email_verification_token) }}</a>
</body>

</html>
