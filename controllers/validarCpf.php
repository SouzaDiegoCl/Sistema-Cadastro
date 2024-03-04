<?php
function validarCpf($cpf)
{
    $cpfFormatado = preg_replace("/[^0-9]/", "", $cpf);
    if (strlen($cpfFormatado) < 11) {
        return "*Quantidade de caracteres é inválida";
    } else {
        $digitoUm = 0;
        $digitoDois = 0;
        for ($i = 0, $x = 10; $i <= 8; $i++, $x--) {
            $digitoUm += $cpfFormatado[$i] * $x;
        }
        for ($i = 0, $x = 11; $i <= 9; $i++, $x--) {
            $digitoDois += $cpfFormatado[$i] * $x;
        }

        $calculoUm = (($digitoUm % 11) < 2) ? 0 : 11 - ($digitoUm % 11);
        $calculoDois = (($digitoDois % 11) < 2) ? 0 : 11 - ($digitoDois % 11);
        if ($calculoUm <> $cpfFormatado[9] || $calculoDois <> $cpfFormatado[10]) {
            return "*CPF informado não é válido";
        }
    }
    return "";
}

