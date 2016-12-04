<?php
if (isset($_POST['insert'])){																			//проверка отправки формы
	$db=mysqli_connect("localhost", "u800658878_root", "qwaszxedc4321", "u800658878_bd");											//подключение к бд
	if ($_POST['ins_book'] != ""){																		//проверка заполнения поля "Название" 
		$sql = "INSERT INTO `u800658878_bd`.`books` (`book_title`) VALUES ('".$_POST['ins_book']."');";		//добавляем Книгу в таблицу books
		$res = mysqli_query($db,$sql);
		$select1 = "SELECT `books`.`id` FROM `books` WHERE `books`.`book_title`='".$_POST['ins_book']."';";	//выбираем id добавленной книги
		$result1 = mysqli_query($db,$select1);																//для добавления записи соответствия в таблице book_author
		$a = (int)mysqli_fetch_assoc($result1)['id'];														//присваиваем id переменной $a

		foreach ($_POST['ins_author'] as $value) {															//перебираем полученных авторов
			if ($value != ""){						
				$sql1 = "INSERT INTO `u800658878_bd`.`authors` (`name`) VALUES ('".$value."');";					//добавляя их в таблицу authors
				$res1 = mysqli_query($db,$sql1);															//и создавая записи соответствия (book-author) в таблице book_author
				$select2 = "SELECT `authors`.`id` FROM `authors` WHERE `authors`.`name`='".$value."';";
				$result2 = mysqli_query($db,$select2);
				$sql2 = "INSERT INTO `u800658878_bd`.`book_author` (`book`, `author`) VALUES (".$a.", ".(int)mysqli_fetch_assoc($result2)['id'].");";
				$res2 = mysqli_query($db,$sql2);
			}
		}
	}
	header('Location: index.php');
}
else{
	header('Location: index.php');
}
?>