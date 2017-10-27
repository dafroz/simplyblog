<html>
<head>
<meta charset="utf-8" />
<title>Установщик</title>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<span>Здравствуйте. На этой странице вы сможете установить SimplyBlog 0.1-alpha.1</span><br>
<form action="" method="get">
	<input type="text" name="blogname" placeholder="Название блога"><br>
	<input type="text" name="mysql_user" placeholder="Имя учётной записи пользователя MySQL"><br>
	<input type="text" name="mysql_host" placeholder="Хост MySQL"><br>
	<input type="text" name="mysql_pwd" placeholder="Пароль учётной записи пользователя MySQL"><br>
	<input type="text" name="mysql_basa" placeholder="Имя базы MySQL"><br>
	<button type="submit" class="button">Отправить!</button>
</form>
</div>
</body>

	<?
	if($_GET['blogname'] != ""){
	$file = fopen("info.php","w");
	$itext = '<?
	$blogname = "'.$_GET["blogname"].'";
    mysql_connect("'.$_GET["mysql_host"].'", "'.$_GET["mysql_user"].'", "'.$_GET["mysql_pwd"].'");
    mysql_select_db("'.$_GET["mysql_basa"].'");
    ?>
	';
	fwrite($file,$itext);
	fclose($file);
	mysql_connect($_GET['mysql_host'], $_GET['mysql_user'], $_GET['mysql_pwd']);
	mysql_query("CREATE DATABASE ".$_GET['mysql_basa']);
	mysql_select_db($_GET['mysql_basa']);
	mysql_query ("CREATE TABLE IF NOT EXISTS posts   
             (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
              preview TEXT,  
              header TEXT,  
              content TEXT)");
    echo "<meta charset='utf-8' /> Установка успешно завершена! Во избежания взлома, удалите файл install.php";

}
?>