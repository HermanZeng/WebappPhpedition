
<?php
//$savePath = "./session/";
$lifeTime = 3600;
//session_save_path($savePath);
session_set_cookie_params($lifeTime);
session_start();
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

<?php

if(!isset($_SESSION['user_id'])){
    if(isset($_POST['submit'])) {
        $user_id = trim($_POST['user_id']);
        $password = trim($_POST['password']);
        $link =mysql_connect("localhost","root", "123456789");
        mysql_select_db("bookstore", $link) or die("fail");
        if((!empty($user_id)) && (!empty($password))){
            $query = "SELECT id, username FROM user WHERE id = '$user_id' AND password = '$password'";
            $data = mysql_query($query);
            echo $data;
            if(mysql_num_rows($data) == 1){
                $row = mysql_fetch_array($data);
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $url = 'loged.php';
                header('Location:'. $url);
            }
            else{
                die("登录失败") ;
            }
        }
        else{
            die("登录失败");
        }
    }
}
else{
    $url = 'loged.php';
    header('Location:'. $url);
}

/*if(!isset($_SESSION['user_id'])){
    if(isset($_POST['submit'])){//用户提交登录表单时执行如下代码
        $dbc = mysqli_connect("localhost","root", "123456789");
        mysqli_select_db("bookstore", $dbc) or die("fail");
        $user_userid = mysqli_real_escape_string($dbc,trim($_POST['user_id']));
        $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));

        if(!empty($user_userid)&&!empty($user_password)){
            //MySql中的SHA()函数用于对字符串进行单向加密
            //$query = "SELECT user_id, username FROM mismatch_user WHERE username = '$user_username' AND "."password = SHA('$user_password')";
            //用用户名和密码进行查询
            $query = "SELECT id, username FROM user WHERE id = '$user_userid' AND password = '$user_password'";
            $data = mysqli_query($dbc,$query);
            //echo '$data';
            //若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
            if(mysqli_num_rows($data)==1){
                $row = mysqli_fetch_array($data);
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['username']=$row['username'];
                $home_url = 'loged.php';
                //header('Location: '.$home_url);
            }else{//若查到的记录不对，则设置错误信息
                $error_msg = 'Sorry, you must enter a valid username and password to log in.';
            }
        }else{
            $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
    }
}else{//如果用户已经登录，则直接跳转到已经登录页面
    $home_url = 'loged.php';
    //header('Location: '.$home_url);
}*/
?>

<div class="container" >
    <div class="jumbotron"   align="center">
        <h1 style="text-align: center">登录</h1>
        <form method="post" role = "form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group" align="center">
                <label for = "user_id">用户ID</label>
                <input type="text" class = "form-control" name="user_id" placeholder="user_id" style = "width: 15%; height: 5%;" >
                <br><br>
            </div>
            <div class="form-group" align="center">
                <label for = "password">密码</label>
                <input type="password" class = "form-control" name="password" placeholder="password" style = "width: 15%; height: 5%;" >
                <br><br>
            </div>
            <input type="submit" name="submit" value="提交">
        </form>
    </div>
</div>

</body>

</html>
