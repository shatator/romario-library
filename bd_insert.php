<?php
if (isset($_POST['insert'])){																				//проверка отправки формы
	$db=mysqli_connect("localhost", "u800658878_root", "qwaszxedc4321", "u800658878_bd");												//подключение к бд
	if ($_POST['ins_book'] != ""){																			//проверка заполнения поля "Название" 
		$sql = "INSERT INTO `u800658878_bd`.`books` (`book_title`) VALUES ('".$_POST['ins_book']."');";			//добавляем Книгу в таблицу books
		$res = mysqli_query($db,$sql);
		$select1 = "SELECT `books`.`id` FROM `books` WHERE `books`.`book_title`='".$_POST['ins_book']."';";	//выбираем id добавленной книги
		$result1 = mysqli_query($db,$select1);																//для добавления записи соответствия в таблице book_author
		$a = (int)mysqli_fetch_assoc($result1)['id'];														//присваиваем id переменной $a

		foreach ($_POST['ins_author'] as $value) {															//перебираем полученных авторов
			$k = 0;
			if ($value != ""){																				//если поле автор не пустое
				$sql3 = "SELECT * FROM `authors`;";															//берём полный список авторов
				$res3 = mysqli_query($db,$sql3);
				while($row = mysqli_fetch_assoc($res3)){													//проверяем не совпадает ли имя введённого автора
					if ($value == $row['name']) {															//с именем уже имеющихся в базе авторов
						$sql2 = "INSERT INTO `u800658878_bd`.`book_author` (`book`, `author`) VALUES (".$a.", ".$row['id'].");";
						$res2 = mysqli_query($db,$sql2);													//при совпадении используем автора из базы
						$k = 1;
						break;																				//создавая записи соответствия (book-author) в таблице book_author
					}
				}
				if ($k == 0) {
					$sql1 = "INSERT INTO `u800658878_bd`.`authors` (`name`) VALUES ('".$value."');";			//иначе добавляем нового автора в таблицу authors
					$res1 = mysqli_query($db,$sql1);
					$select2 = "SELECT `authors`.`id` FROM `authors` WHERE `authors`.`name`='".$value."';";
					$result2 = mysqli_query($db,$select2);												//и создаём запись соответствия (book-author) в таблице book_author
					$sql2 = "INSERT INTO `u800658878_bd`.`book_author` (`book`, `author`) VALUES (".$a.", ".(int)mysqli_fetch_assoc($result2)['id'].");";
					$res2 = mysqli_query($db,$sql2);
				}
			}
		}
	}
	header('Location: index.php');
}
else{
	header('Location: index.php');
}
?>