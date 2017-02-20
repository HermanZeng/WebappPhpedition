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

if(isset($_POST['delete'])){
    //$id = $_SESSION['user_id'];
    if(isset($_POST['item'])){
        $id = $_SESSION['user_id'];
        $item_id = $_POST['item'];
        $link =mysql_connect("localhost","root", "123456789");
        mysql_select_db("bookstore", $link) or die("fail");
        $query = ("DELETE FROM orders WHERE id = '$id' and item_id='$item_id'");
        mysql_query($query);
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>订单</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/jquery-2.2.2.min.js"></script>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

<center>

    <table class="table table-striped">
        <caption>订单</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>性别</th>
                <th>电话</th>
                <th>电邮</th>
                <th>地址</th>
                <th>书号</th>
                <th>书名</th>
                <th>价钱</th>
            </tr>
        </thead>
            <tbody>
            <?php
            $link =mysql_connect("localhost","root", "123456789");
            mysql_select_db("bookstore", $link) or die("fail");
            $id = $_SESSION['user_id'];
            $query = "select *  from user natural join (orders natural join book) WHERE id = '$id';";
            $result = mysql_query($query);
            while($row = mysql_fetch_array($result))
            {
                echo "<tr>";
                echo"<td>$row[id]</td>";
                echo"<td>$row[username]</td>";
                echo"<td>$row[gender]</td>";
                echo"<td>$row[phone]</td>";
                echo"<td>$row[email]</td>";
                echo"<td>$row[address]</td>";
                echo"<td>$row[item_id]</td>";
                echo"<td>$row[bookname]</td>";
                echo"<td>$row[price]</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
    </table>

    <div style="padding: 0px 600px 10px;" align="center">
        <form class="bs-example bs-example-form" role = "form" method="post">
            <div class="input-group input-group-lg">
                <span class="input-group-addon">删除订单</span>
                <input type="text" class = "form-control" name="item" placeholder="书号" >
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="delete">
                        删除
                    </button>
                </span>
            </div>
        </form>
    </div>

</center>

</body>