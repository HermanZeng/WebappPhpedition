<?php
/**
 * Created by PhpStorm.
 * User: heming
 * Date: 3/26/2016
 * Time: 1:32 PM
 */
echo "success<br/>";
$link =mysql_connect("localhost","root", "123456789");
if(!$link){
    die("fail");
}
else{
    echo "success<br/>";
}
mysql_select_db("bookstore", $link) or die("fail");
echo "success <br/>";
$create = "create table if not exists user(
id CHAR(8) NOT NULL ,
username  VARCHAR (10) NOT NULL,
password VARCHAR (20) NOT NULL,
gender VARCHAR (10) NOT NULL,
phone VARCHAR (20) NOT  NULL,
email VARCHAR (20) NOT NULL,
address VARCHAR (40) NOT NULL,
PRIMARY KEY (id)
);";
$result = mysql_query($create);
if(!$result){
    die("fail");
}
else{
    echo "success<br/>";
}
$query = ("INSERT INTO user VALUES('3', 'tfyuy', 'uyfyu', 'dfgd', 'fyuk', 'ytr', 'tytr')");
mysql_query($query);
?>