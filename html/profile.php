<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Чапасов П.К.</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    	<link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container nav_bar">
		<div class="row">
			<div class="row">
				<div class="col-3 nav_logo"></div>
				<div class="col-9">
					<div class="nav_text">About me:</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-8"><h2>Я - творческая и целеустремленная личность. Я люблю заниматься творческими проектами, такими как рисование, дизайн и фотография, и всегда стараюсь развивать свои навыки в этих областях. Я также увлекаюсь музыкой и часто слушаю различные жанры, от классики до рока. Я ценю свое время и стараюсь максимально эффективно использовать его, но в то же время всегда нахожу время для друзей и семьи, которых я люблю и ценю.</h2></div>
			<div class="col-4">
				<div class="row my_photo"></div>
				<div class="row"><p class="title_photo">Чапасов П.К.</p></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 ezh_title">
				<h1>А какой ёжик сегодня ты?</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-6 ezh_size1"></div>
			<div class="col-6 ezh_size2"></div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="button_js col-12">
				<button id="myButton">Click me</button>
				<p id="demo"></p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="hello">
					Привет, <?php echo $_COOKIE['User']; ?>
				</h1>
			</dev>
			<div class="col-12">
				<form method='POST' action='profile.php' enctype="multipart/form-data" name="upload">
					<div class="row"><input type="text" class="form" name="name" placeholder="Заголовок вашего поста"></div>
					<div class="row"><textarea class="form" name="content" cols="30" rows="10" placeholder="Введите текст вашего поста"></textarea></div>
					<div class="row"><input type="file" name="file"></div>
					<button type="submit" class="btn_red" name="submit">Сохранить пост</button>
				</form>
			</dev>
		</dev>
	</dev>
	<div class="container">
		<div class="row">
			<div class="col-4"><p class="contacts">Почта: petr.chapasov2002@gmail.com</p></div>
			<div class="col-4"><p class="contacts">Telegram: @dear_cheap</p></div>
			<div class="col-4"><p class="contacts">VK: @dear_cheap</p></div>
		</div>
	</div>
	<script type="text/javascript" src="js/button.js"></script>
</body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('db','root','12345678', 'first');

if (isset($_POST['submit'])) {
	$title = $_POST['name'];
	$main_text = $_POST['content'];
	
	if (!$title || !$main_text) die ("Заполните все поля");
	
	if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
	
	$sql = "INSERT INTO posts (name, content) VALUES ('$title', '$main_text')";
	
	if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
}
?>
