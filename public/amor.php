<?php
header('Content-Type: application/json; charset=UTF-8');

$archivo = 'frases_amor.json';

if (!file_exists($archivo)) {
    http_response_code(500);
    echo json_encode(["error" => "Archivo no encontrado"], JSON_UNESCAPED_UNICODE);
    exit;
}

$contenido = file_get_contents($archivo);
$frases = json_decode($contenido, true);

if (!is_array($frases)) {
    http_response_code(500);
    echo json_encode(["error" => "Formato JSON inválido"], JSON_UNESCAPED_UNICODE);
    exit;
}

$frase = $frases[array_rand($frases)];

echo json_encode([
    "frase" => $frase['frase'],
    "autor" => $frase['autor'],
    "categoria" => "amor"
], JSON_UNESCAPED_UNICODE);
