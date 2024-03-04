<?php
function validarCep($cepData)
{
    if ($cepData->erro == true) {
        return '*CEP inválido!';
    }
}
function procurarCep($cep)
{
    $cepFormatado = preg_replace("/[^0-9]/", "", $cep);
    $url = 'http://viacep.com.br/ws/' . $cepFormatado . '/xml/';
    $cepData = simplexml_load_file($url);
    return $cepData;
}
