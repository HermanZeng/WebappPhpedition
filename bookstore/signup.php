<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/jquery-2.2.2.min.js"></script>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
// 定义变量并设置为空值
$nameErr = $emailErr = $genderErr = $idErr =  $passwordErr =  $phoneErr =  $addressErr = "";
$name = $email = $gender = $id = $password =  $phone =  $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        $idErr = "ID是必填的";
    } else {
        $id = test_input($_POST["id"]);
        // 检查ID是否包含字母和空白字符
        if (!preg_match("/^[0-9a-zA-Z ]*$/",$id)) {
            $idErr = "无效的ID";
            $id = "";
        }
    }

    if (empty($_POST["name"])) {
        $nameErr = "姓名是必填的";
    } else {
        $name = test_input($_POST["name"]);
        // 检查姓名是否包含字母和空白字符
        /*if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "只允许字母和空格";
        }*/
    }

    if (empty($_POST["password"])) {
        $passwordErr = "密码是必填的";
    } else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/^[0-9a-zA-Z ]*$/",$password)) {
            $passwordErr = "只允许字母和空格";
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "电话号码是必填的";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9a-zA-Z ]*$/",$phone)) {
            $phoneErr = "只允许字母数字和空格";
        }
    }

    if (empty($_POST["address"])) {
        $addressErr = "家庭住址是必填的";
    } else {
        $address = test_input($_POST["address"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "电邮是必填的";
    } else {
        $email = test_input($_POST["email"]);
        // 检查电子邮件地址语法是否有效
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $emailErr = "无效的 email 格式";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "性别是必选的";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

if(isset($_POST["submit"])){
    echo "postsuccess";
    $link =mysql_connect("localhost","root", "123456789");
    if(!$link){
        //die("fail");
    }
    echo $address;
    mysql_select_db("bookstore", $link) or die("fail");
    $result = mysql_query($create);
    $query = ("INSERT INTO user VALUES ('$id', '$name', '$password', '$gender', '$phone', '$email', '$address')");
    if(($id <> "") and ($name <> "") and ($password <> "") and ($gender <> "") and ($phone <> "") and ($email <> "") and ($address <> "")){
        //$result = mysql_query("INSERT INTO user VALUES ('$id', '$name', '$password', '$gender', '$phone', '$email', '$address')");
        $result = mysql_query($query);
        echo $query;

    }
    else{
        echo "fail<br/>";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<div style="padding: 0px 600px 10px;" align="center">
    <h1>注册</h1>
    <form class="bs-example bs-example-form" role = "form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon">ID</span>
            <input type="text" class = "form-control" name="id" placeholder="ID" >
            <span class="input-group-addon error">* <?php echo $idErr;?></span>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon">姓名</span>
            <input type="text" name="name"  class = "form-control" placeholder="name">
            <span class="input-group-addon error">* <?php echo $nameErr;?></span>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon">密码</span>
            <input type="password" name="password"  class = "form-control" placeholder="password">
            <span class="input-group-addon error">* <?php echo $passwordErr;?></span>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon">电话</span>
            <input type="text" name="phone"  class = "form-control" placeholder="phone">
            <span class="input-group-addon error">* <?php echo $phoneErr;?></span>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon">电邮</span>
            <input type="text" name="email"  class = "form-control" placeholder="email">
            <span class="input-group-addon error">* <?php echo $emailErr;?></span>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon">地址</span>
            <input type="text" name="address"  class = "form-control" placeholder="address">
            <span class="input-group-addon error">* <?php echo $addressErr;?></span>
        </div>
        <br>
        性别：
        <input type="radio" name="gender" value="female">女性
        <input type="radio" name="gender" value="male">男性
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        <input type="submit" class="btn btn-primary " name="submit" value="提交">
    </form>
</div>


<?php
function insert($id, $name, $password, $gender, $phone, $email, $address, $query){
    if(($id <> "") and ($name <> "") and ($password <> "") and ($gender <> "") and ($phone <> "") and ($email <> "") and ($address <> "")){
        $result = mysql_query(query);
    }
}
?>

<?php
/*$link =mysql_connect("localhost","root", "123456789");
if(!$link){
    //die("fail");
}
echo $address;
mysql_select_db("bookstore", $link) or die("fail");
$result = mysql_query($create);
$query = ("INSERT INTO user VALUES ('$id', '$name', '$password', '$gender', '$phone', '$email', '$address')");
if(($id <> "") and ($name <> "") and ($password <> "") and ($gender <> "") and ($phone <> "") and ($email <> "") and ($address <> "")){
    //$result = mysql_query("INSERT INTO user VALUES ('$id', '$name', '$password', '$gender', '$phone', '$email', '$address')");
    $result = mysql_query($query);
    echo $query;

}
else{
    echo "fail<br/>";
}
*/?>

</body>
</html>
