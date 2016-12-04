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
					<td>
						<input type="text" name="ins_author[]" list="variants">
						<datalist id="variants">
							<?php
								$db=mysqli_connect("localhost", "u800658878_root", "qwaszxedc4321", "u800658878_bd");
								mysqli_set_charset($db, "utf8");
								$result = mysqli_query($db, "SELECT * FROM `authors`");
								while($row = mysqli_fetch_assoc($result)){
									$author = $row['name'];		
									echo "<option>$author</option>";
								}
							?>
						</datalist>
					</td>
				</tr>
				<tr>
					<td></td><td><input type="button" name="author_plus" value="+"></td>
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
				<th>Название</th>
				<th>Автор</th>
			</tr>
			<?php
				$db=mysqli_connect("localhost", "u800658878_root", "qwaszxedc4321", "u800658878_bd");		//подключение к бд
				mysqli_set_charset($db, "utf8");							//задаем кодировку
				$result = mysqli_query($db, "SELECT * FROM `books`");		//выбираем таблицу с книгами books
				while($row = mysqli_fetch_assoc($result)){					//запускаем цикл по строкам таблицы books
					$id = $row['id'];										//присваиваем $id и $book_title соответствующие значения из таблицы
					$book_title = $row['book_title'];		
					echo "<tr><td>$id</td><td>$book_title</td>";			//выводим переменные
					//далее переменной $id_authors_this_book присваиваем id авторов книги(которая обрабатывается в данной итерации цикла)
					//(значения берётся из связующей таблицы book_author)
					$id_authors_this_book = mysqli_query($db, "SELECT `book_author`.`author` FROM `book_author` WHERE `book_author`.`book`='".$id."';");
					//теперь проводим цикл по выбранным id данной книги
					//и для каждого id из таблицы authors выводим имя автора книги (name)
					echo "<td>";
					while ($row_author = mysqli_fetch_assoc($id_authors_this_book)){
						$authors_this_book = mysqli_query($db, "SELECT `authors`.`name` FROM `authors` WHERE `authors`.`id`=".$row_author['author'].";");
						echo mysqli_fetch_assoc($authors_this_book)['name']."<br>";
					}
					echo "</td></tr>";
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
					<td>Название</td>
					<td><input type="text" name="book-title"></td>
				</tr>
				<tr>
					<td colspan=2>
						<input type="submit" name="save" value="Сохранить">
						<input type="submit" name="delete" value="Удалить">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
</body>
</html>