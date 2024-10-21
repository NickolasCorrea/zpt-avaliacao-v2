<?php

use ipinfo\ipinfo\IPinfo;

require_once 'vendor/autoload.php';

$access_token = 'ea2af2bf4db1cd';
$client = new IPinfo($access_token);

function getPublicIP() {
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://api.ipify.org',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 5,
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    return curl_errno($curl) ? null : $response; 
}

$ip_address = getPublicIP();

$details = $client->getDetails($ip_address);
$response = isset($details->ip) ? ['ip' => $details->ip] : ['error' => 'Não foi possível obter os detalhes do IP.'];

echo json_encode($response);
?>
