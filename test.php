<?php

// URL del enlace HLS dinámico
$url = "https://focus4ca.com/deportivo.php?player=desktop&live=tntsportssd1";

// URL del sitio web que se usará en el encabezado Referer
$referer = "https://tucanaldeportivo.com/";

// Configurar la solicitud cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_REFERER, $referer);

// Ejecutar la solicitud cURL
$response = curl_exec($ch);

// Verificar si la solicitud fue exitosa
if ($response === false) {
    echo "Error al obtener el archivo m3u8: " . curl_error($ch);
} else {
    // Buscar la URL del archivo m3u8 en la respuesta
    if (preg_match('/https?:\/\/[^"]+\.m3u8[^"]*/', $response, $matches)) {
        $m3u8_url = $matches[0];
        echo "URL del archivo m3u8: $m3u8_url";
    } else {
        echo "No se pudo encontrar el archivo m3u8 en la respuesta.";
    }
}

// Cerrar la sesión cURL
curl_close($ch);

?>
