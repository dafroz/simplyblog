<!DOCTYPE html>
<?
if(file_exists("info.php")){
include("info.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><? if(file_exists("info.php")){ echo $blogname; } ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="header">
<text id="headertitle"><? if(file_exists("info.php")){ ?> Блог <? echo $blogname; } ?></text>

</div>
<div style="padding-top: 65px;"></div>
<div id="main-content">
<?
if(!file_exists("info.php")){
include("install.php");
die();
}
$query = mysql_query("SELECT * FROM posts ORDER BY id DESC");
if(mysql_num_rows($query) != '0'){
while($array = mysql_fetch_array($query, MYSQL_ASSOC)){
    ?>
<h1><? echo $array['header']; ?></h1>
<p><? echo $array['preview']; ?></p><br><a href="post<? echo $array['id']; ?>" class="button">Открыть полностью</a>
<br>
<br>
<?
}
} else {
    echo 'Тут пусто. Накормите свой блог чем-нибудь.<br><br><br><a class="button" href="write">Накормить</a>';
}
?>
</div>
<div id="footer">
	<center style="margin-top: 15px; margin-bottom: 15px;">
		 <? echo $blogname; ?>
	</center>

</div>

</body></html>