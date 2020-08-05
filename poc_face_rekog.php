<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Aws\Rekognition\RekognitionClient([
    'version' => "latest",
    'region' => 'ap-southeast-1',
    'credentials' => [
        'key' => $_ENV['KEY_AWS'],
        'secret' => $_ENV['SECRET_AWS']
    ]
]);

$result = $client->compareFaces([
    'SimilarityTreshold' => 70,
    'SourceImage' => [
        'Bytes' => file_get_contents("./assets/no_mask.jpg")
    ],
    'TargetImage' => [
        'Bytes' => file_get_contents("./assets/no_mask_absen.jpeg")
    ]
]);

echo '<pre>',print_r($result),'</pre>';
exit();

?>