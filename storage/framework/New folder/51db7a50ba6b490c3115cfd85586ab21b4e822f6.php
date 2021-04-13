<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Hello <?php echo e($user->name); ?></p>
    <p>Click below link to activate your account</p>
    <a
        href="<?php echo e(route('verify', $user->email_verification_token)); ?>"><?php echo e(route('verify', $user->email_verification_token)); ?></a>
</body>

</html>
<?php /**PATH /opt/lampp/htdocs/nn/resources/views/email/verification.blade.php ENDPATH**/ ?>