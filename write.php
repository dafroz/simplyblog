<?
include("info.php");
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
<form action="" method="post">
<textarea name="text" placeholder="Текст поста"></textarea><br>
<textarea type="textarea" name="preview" placeholder="Превью поста"></textarea><br>
<input type="text" name="header" placeholder="Заголовок"><br>
<button type="submit" class="button">Отправить!</button>
</form>
</div>
<?
if($_POST['header'] != ""){
	$query = mysql_query("INSERT INTO `simplytest`.`posts` (`id`, `preview`, `header`, `content`) VALUES (NULL, '".$_POST['preview']."', '".$_POST['header']."', '".$_POST['text']."');");
	echo 'Пост успешно опубликован. <a href="index.php">На главную</a>';
}
?>