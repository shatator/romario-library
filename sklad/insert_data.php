<?php
	$base = file("base.txt");
	$lastline = $base[count($base)-1];
	$parts = explode('|',$lastline);					//определяем номер последней записи
	
	$current = file_get_contents("base.txt");
	
	$current .= ($parts[0]+1)."|".$_POST['manufacturer']."|".$_POST['name']."|". $_POST['price']."|".$_POST['col'].PHP_EOL;
	
	file_put_contents('base.txt', $current);
?>