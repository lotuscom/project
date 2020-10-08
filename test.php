<!DOCTYPE html>
<?php
include_once('functions.php')
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ค้นหาข้อมูล : itoffside.com</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<style>
body{
margin-top: 20px;
}
.loading{
background-image: url("ajax-loader.gif");
background-repeat: no-repeat;
display: none;
height: 100px;
width: 100px;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<form class="form-inline" name="searchform" id="searchform">
<div class="form-group">
<label for="textsearch" >ชื่อสินค้า</label>
<input type="text" name="itemname" id="itemname" class="form-control" placeholder="ข้อความ คำค้นหา!" autocomplete="off">
</div>
<button type="button" class="btn btn-primary" id="btnSearch">
<span class="glyphicon glyphicon-search"></span>
ค้นหา
</button>
</form>
</div>
</div>
<div class="loading"></div>
<div class="row" id="list-data" style="margin-top: 10px;">
</div>
</div>
<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
<script type="text/javascript">
$(function () {
$("#btnSearch").click(function () {
$.ajax({
url: "search.php",
type: "post",
data: {itemname: $("#itemname").val()},
beforeSend: function () {
$(".loading").show();
},
complete: function () {
$(".loading").hide();
},
success: function (data) {
$("#list-data").html(data);
}
});
});
$("#searchform").on("keyup keypress",function(e){
var code = e.keycode || e.which;
if(code==13){
$("#btnSearch").click();
return false;
}
});
});
</script>
</body>
</html>