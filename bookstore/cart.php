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

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/jquery-2.2.2.min.js"></script>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

<center>

    <table class="table table-striped">
        <caption>购物车</caption>
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
        $query = "select *  from user natural join (cart natural join book) WHERE id = '$id'";
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
        if(isset($_POST['submit']))
        {
            $link =mysql_connect("localhost","root", "123456789");
            mysql_select_db("bookstore", $link) or die("fail");
            $id = $_SESSION['user_id'];
            $query = "select id, item_id  from user natural join cart  WHERE id = '$id'";
            $result = mysql_query($query);
            while($row = mysql_fetch_array($result))
            {
                $item_id = $row[item_id];
                $insert = "INSERT INTO orders VALUES ('$row[id]', '$row[item_id]')";
                $delete = "DELETE FROM cart WHERE id = '$id' AND item_id = '$item_id'";
                mysql_query($insert);
                mysql_query($delete);
            }
        }
        ?>
        </tbody>
    </table>
    <br>
    <form method="post" role = "form">
        <input type="submit" class="btn btn-primary " name="submit" value="提交订单">
    </form>

</center>

</body>