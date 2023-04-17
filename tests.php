<?php

$str = "Caton´s Burguer*`";
$str = str_replace("'", "", $str);
$str = str_replace("*", "", $str);
$str = str_replace("`", "", $str);
$str = str_replace("´", "", $str);


echo ("$str\n");




?>
