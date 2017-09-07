<?php //Ejemplo aprenderaprogramar.com, archivo escribir.php
$file = fopen("20k_c1.txt", "w");
$j=0;
$k=0;
for($x=1;$x<23;$x++){
	for($y=1;$y<20;$y++){
				//$k=$y+$j;
				$k++;
				if($k<=9){
					fwrite($file,'00'.$k.' '.' ');

				}
				else if($k<=100&&$k>9) {
					fwrite($file,'0'.$k.' '.' ');
				}
				else{

					fwrite($file,$k.' '.' ');
				}

		

	}
	$j++;
	//fwrite($file,PHP_EOL);
}


fclose($file);
?>