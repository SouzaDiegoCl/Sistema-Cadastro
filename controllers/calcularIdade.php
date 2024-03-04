<?php
$dataNascimento = $_POST["inputBirthDate"];
$dataAtual = date('Y-m-d');
$diferençaDatasAnos = date_diff(date_create($dataNascimento), date_create($dataAtual))->format('%y');
$idade = $diferençaDatasAnos;
echo $idade;
