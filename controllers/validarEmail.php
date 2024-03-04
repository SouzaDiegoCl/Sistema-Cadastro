<?php 
function validarEmail($email){
    //validação com php
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "*Email inválido";
    }

    //validação com api (Redundâcia )
    $api_key = "7c0773f8e40a484594f3286b757e25a9";
    // Inicia cURL.
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1?api_key=$api_key&email=$email",
        CURLOPT_RETURNTRANSFER => true
    ]);
    $responseEmail = curl_exec($ch);
    curl_close($ch);
    $dataEmail = json_decode($responseEmail, true);

    if ($dataEmail["is_valid_format"]["value"] == "false") {
        return "*Email inválido";
    }
    return "";
}