<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Библиотека</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/script.js"></script>
	</head>
<body><div class="wrapper">
	<div class="header">
		Библиотека
	</div>
	<div class="menu">
		<span>Добавить новую книгу:</span>
		<form name="form_insert" action="bd_insert.php" method="POST">
			<table>
				<tr>
					<td>Автор</td>
					<td><input type="text" name="ins_author"></td>
				</tr>
				<tr>
					<td>Название</td>
					<td><input type="text" name="ins_book"></td>
				</tr>
				<tr>
					<td colspan=2><input type="submit" name="insert" value="Добавить"></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="content">
		<table>
			<tr>
				<th>Номер</th>
				<th>Автор</th>
				<th>Название</th>
			</tr>
			<?php
			$db=mysqli_connect("localhost", "u800658878_root", "qwaszxedc4321", "u800658878_bd");
			mysqli_set_charset($db, "utf8");
			$result = mysqli_query($db, "SELECT * FROM `books`");
			while($row = mysqli_fetch_assoc($result)){
			   $id = $row['id'];
			   $author = $row['author'];
			   $book_title = $row['book_title'];
			   echo "<tr><td>$id</td><td>$author</td><td>$book_title</td></tr>";
			   }
			?>
		</table>
	</div>
	<div class="form-update">
		<span>Форма правки и удаления</span>
		<img src="image/exit.png" alt="Exit">
		<form name="form_update" action="bd_update.php" method="POST">
			<table>
				<tr>
					<td>Номер</td>
					<td><input type="text" name="number" readonly></td>
				</tr>
				<tr>
					<td>Автор</td>
					<td><input type="text" name="book-author"></td>
				</tr>
				<tr>
					<td>Название</td>
					<td><input type="text" name="book-title"></td>
				</tr>
				<tr>
					<td colspan=2><input type="submit" name="save" value="Сохранить">
						<input type="submit" name="delete" value="Удалить"></td>
				</tr>
			</table>
		</form>
	</div>
</div>
</body>
</html>