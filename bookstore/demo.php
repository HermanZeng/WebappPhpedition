
<html>
<head>
    <script src="jquery-2.2.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("button").click(function(){
                $("button").css("background-color","red");
            });
        });
    </script>
    <script>
        $("button").css("background-color","red");
    </script>
</head>
<?php
echo "hello world";
?>
<body>
<button type="button">Click me</button>
</body>

</html>

