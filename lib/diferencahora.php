<?php

$dataAtual = date("Y-m-d G:i:s");
$dataFuturo = "2018-02-05 16:18:31";


$datatime1 = new DateTime($dataFuturo);
$datatime2 = new DateTime($dataAtual);


$diff = $datatime1->diff($datatime2);
$horas = $diff->h + ($diff->days * 24);

echo "A diferenca de horas e $horas horas";

?>