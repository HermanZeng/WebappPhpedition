<?php
/**
 * Created by PhpStorm.
 * User: heming
 * Date: 5/18/2016
 * Time: 8:53 PM
 */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>表格</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <!--<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="bs-example" data-example-id="hoverable-table">
        <table class="table table-hover editable">
            <thead>
            <tr>
                <th>#</th>
                <th>Test</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td></td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><!--<a href="javascript:void(0)" class="edit"></a>--></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td></td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td><!--<a href="javascript:void(0)" class="edit"></a>--></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td></td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td><!--<a href="javascript:void(0)" class="edit"></a>--></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="editTable.js"></script>
<script>
    $(function() {
        //$('.edit').handleTable({"cancel" : "<span class='glyphicon glyphicon-remove'></span>"});
        $('.editable').handleTable({
            "handleFirst" : true,
            "cancel" : " <span class='glyphicon glyphicon-remove'></span> ",
            "edit" : " <span class='glyphicon glyphicon-edit'></span> ",
            "add" : " <span class='glyphicon glyphicon-plus'></span> ",
            "save" : " <span class='glyphicon glyphicon-saved'></span> ",
            "confirm" : " <span class='glyphicon glyphicon-ok'></span> ",
            "operatePos" : -1,
            "editableCols" : [2,3,4],
            "order": ["add","edit"],
            "saveCallback" : function(data, isSuccess) { //这里可以写ajax内容，用于保存编辑后的内容
                //data: 返回的数据
                //isSucess: 方法，用于保存数据成功后，将可编辑状态变为不可编辑状态
                var flag = true; //ajax请求成功（保存数据成功），才回调isSuccess函数（修改保存状态为编辑状态）
                if(flag) {
                    isSuccess();
                    alert(data + " 保存成功");
                } else {
                    alert(data + " 保存失败");
                }

                return true;
            },
            "addCallback" : function(data,isSuccess) {
                var flag = true;
                if(flag) {
                    isSuccess();
                    alert(data + " 增加成功");
                } else {
                    alert(data + " 增加失败");
                }
            },
            "delCallback" : function(isSuccess) {
                var flag = true;
                if(flag) {
                    isSuccess();
                    alert("删除成功");
                } else {
                    alert("删除失败");
                }
            }
        });
    });
</script>
</body>
</html>

