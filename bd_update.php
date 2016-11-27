<?php
if (isset($_POST['save'])){
	$db=mysqli_connect('localhost', 'u800658878_root', 'qwaszxedc4321', 'u800658878_bd');
	$sql="UPDATE `u800658878_bd`.`books` SET `author`='".$_POST['book-author']."', `book_title`='".$_POST['book-title']."' WHERE  `id`= '".$_POST['number']."';";
	$res=mysqli_query($db,$sql);
}
else if (isset($_POST['delete'])){
	$db=mysqli_connect('localhost', 'u800658878_root', 'qwaszxedc4321', 'u800658878_bd');
	$sql="DELETE FROM `u800658878_bd`.`books` WHERE  `id`='".$_POST['number']."';";
	$res=mysqli_query($db,$sql);
}
	header('Location: index.php');
?>