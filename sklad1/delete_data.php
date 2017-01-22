<?php
	$base=file("base.txt");
	$counter = 0;
	foreach($base as $line)
	{
		$counter++;
		$parts=explode('|',$line);
		if ($parts[0]==$_POST['id']){
			unset($base[$counter-1]);
		}
	}
	$fp=fopen("base.txt","w"); 
	fputs($fp,implode("",$base));

	fclose($fp); 
?>