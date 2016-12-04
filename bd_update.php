<?php
if (isset($_POST['save'])){
	$db=mysqli_connect('localhost', 'root', '', 'library');
	$sql="UPDATE `library`.`books` SET  `book_title`='".$_POST['book-title']."' WHERE  `id`= '".$_POST['number']."';";
	$res=mysqli_query($db,$sql);
}
else if (isset($_POST['delete'])){
	$db=mysqli_connect('localhost', 'root', '', 'library');
	$sql="DELETE FROM `library`.`book_author` WHERE  `book`='".$_POST['number']."';";
	$res=mysqli_query($db,$sql);
	$sql="DELETE FROM `library`.`books` WHERE  `id`='".$_POST['number']."';";
	$res=mysqli_query($db,$sql);
}
	header('Location: index.php');
?>