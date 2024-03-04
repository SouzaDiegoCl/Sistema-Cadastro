<?php
include('./validarCep.php');
if (strlen($_POST["inputCep"]) == 9) {
    $a = procurarCep($_POST["inputCep"]);
    echo $a->localidade;
}
