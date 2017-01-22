<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Список товаров</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/script.js"></script>
		<script src="js/sort.js"></script>
	</head>
<body>
<div class="wrapper">
	<div class="hdr">
		<span>Список товаров</span>
	</div>
	<div class="menu">
		<span>Добавить новую запись:</span>
		<form name="form_insert" action="insert_data.php" method="POST">
			<table>
				<tr>
					<td>Производитель</td>
					<td>
						<input type="text" name="manufacturer">
					</td>
				</tr>
				<tr>
					<td>Наименование</td>
					<td>
						<input type="text" name="name">
					</td>
				</tr>
				<tr>
					<td>Цена</td>
					<td>
						<input type="text" name="price">
					</td>
				</tr>
				<tr>
					<td>Количество</td>
					<td>
						<input type="text" name="col">
					</td>
				</tr>
				<tr>
					<td align="center"><input type="submit" name="insert" value="Добавить"></td>
					<td align="center"><input type="button" name="clear" value="Очистить"></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="content">

	</div>
</div>
</body>
</html>