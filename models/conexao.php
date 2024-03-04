<?php

$pdo = new PDO("mysql:host=127.0.0.1;
dbname=sistemacadastro","root", '');

$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "sistemacadastro";

$conexao = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conexao, $banco);
mysqli_set_charset($conexao, "UTF8");


