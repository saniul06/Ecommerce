<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
//     $a = 1;
//     ($a == 1) ?  '1' : ($a == 2) ? 2  ($a ==3) ?  "3" :  "4";
//     $marks=40;
// print ($marks>=40) ? "pass" : "Fail";
    //      $a = 77;
    // if($a ==1){
    //     echo '1';
    // } elseif($a == 2){
    //     echo '2';
    // }elseif($a ==3){
    //     echo "3";
    // } else {
    //     echo "4";
    // }
    ?>

<form action="<?php echo e(url('aa')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="a" id="" value='aaaaaa'>
    <input type="text" name="b" id="" value='bbbb'>
    <input type="text" name="c" id=""  value='c'>
    <div>
        <input type="text" name="n" id="" >
        <input type="text" name="nn" id="" value='kkkkkk'>
        <input type="text" name="nnn" id=""  value='lllllllll'>
    </div>
    <button type="submit">submit</button>
</form>
<form action="<?php echo e(url('aa')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="a" id="" value='1111'>
    <input type="text" name="b" id="" value='2222'>
    <input type="text" name="c" id=""  value='3333'>
    <button type="submit">submit</button>
</form>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/nn/resources/views/layouts/a.blade.php ENDPATH**/ ?>