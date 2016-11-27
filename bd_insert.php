<?php
if (isset($_POST['insert'])){
	$db=mysqli_connect('localhost', 'u800658878_root', 'qwaszxedc4321', 'u800658878_bd');
	$sql="INSERT INTO `u800658878_bd`.`books` (`author`, `book_title`) VALUES ('".$_POST['ins_author']."', '".$_POST['ins_book']."');";
	$res=mysqli_query($db,$sql);
	header('Location: index.php');
}
else{
	header('Location: index.php');
}
?>