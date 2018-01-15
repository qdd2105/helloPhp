<?php
/**
 * User: sky
 * Date: 2018/1/14
 * Time: 17:34
 */
session_start();
if(isset($_SESSION['type'])){
    $a="<h1>曹慎凯的成绩单</h1><br>";
    if($_SESSION['type']=="NORMAL") {
        $file = fopen('../../data/score.csv','r');
        while ($data = fgetcsv($file)) {
            $a.= "<p>课程".$data[0].":成绩".$data[1]."</p><br>";
        }
    } else {
        echo "仅支持浏览者";
        die();
    }
} else {
    header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <title>成绩</title>
</head>
<body background="../../picture/wood.jpg">
<div id="title" align="center">
    <?php echo $a ?>
</div>
<div id="content">
    <h2>请输入要查找的课程</h2>
    <form name="showScore" action="helper.php" method="post">
        课程名：<input type="text" id="class_name" name="class_name" onblur="checkOut()"/>
        <br>
        <input type="hidden" name="type" value="searchScore">
        <input type="submit" value="提交" id="submit_button" onclick="doSubmit()" disabled/>
        <input type="reset" value="重置"/>
        <p style="color: rgb(255,0,0)" id="notice">填写后提交</p>
    </form>
</div>
<a href="list.php">< 返回</a>
</body>
<script>
    function doSubmit() {
        if(isInputEmpty()) {
            return;
        }
    }

    function checkOut() {
        var nodes = document.getElementById("class_name");
        if(nodes.value == null || nodes.value == "") {
            document.getElementById("notice").innerText=nodes[j].name+"未填写，请填写后提交";
            return true;
        }else{
            document.getElementById("notice").innerText="均已填写，请提交";
            document.getElementById("submit_button").disabled=false;
            return false;
        }
    }

    document.getElementById("submit_button").disabled=true;
</script>
</html>


