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
if(isset($_POST['add'])){
    $link =mysql_connect("localhost","root", "123456789");
    mysql_select_db("bookstore", $link) or die("fail");
    $id = $_SESSION['user_id'];
    $query = ("INSERT INTO cart VALUES('$id', '000001')");
    mysql_query($query);
}

if(isset($_POST['remove'])){
    $link =mysql_connect("localhost","root", "123456789");
    mysql_select_db("bookstore", $link) or die("fail");
    $id = $_SESSION['user_id'];
    $query = ("DELETE FROM cart WHERE id = '$id' and item_id='000001'");
    mysql_query($query);
}
?>


<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <title>000001</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/jquery-2.2.2.min.js"></script>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" align="center">
    <h1>Introduction to Algorithms</h1>
    <br>
    <p>
    <img src="image/000001.jpg" height="630px" width="560px">
    </p>
    <br>
    <h2>$60</h2> <br>
    <form method="post">
        <div class="btn-group btn-group-lg">
            <input type="submit" class="btn btn-primary " name="add" value="+">
            <input type="submit" class="btn btn-primary " name="remove" value="-">
        </div>
    </form>
</div>
</body>

</html>
