<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/jquery-2.2.2.min.js"></script>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<?php
session_start();
if(isset($_SESSION['user_id']))
{
    echo $_SESSION['user_id'];
    echo "<br>";
    echo $_SESSION['password'];
    echo "<br>";
}
else{
    $url = 'login.php';
    header('Location:'. $url);
}
?>

<?php
if(isset($_POST['cart'])){
    $url = 'cart.php';
    header('Location:'. $url);
}

if(isset($_POST['buy'])){
    $url = 'order.php';
    header('Location:'. $url);
}
?>


<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/jquery-2.2.2.min.js"></script>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" >
    <center>
        <div>
            <a href="000001.php">
            <img src="image/000001.jpg" height="450px" width="400px" >
            </a>
            <a href="000002.php">
            <img src="image/000002.png" height="450px" width="400px">
            </a>
        </div>
        <br>
        <form method="post">
            <div class="btn-group btn-group-lg">
                <input type="submit" class="btn btn-primary " name="cart" value="购物车">
                <input type="submit" class="btn btn-primary " name="buy" value="订单">
            </div>
        </form>
    </center>
</div>
</body>

</html>
