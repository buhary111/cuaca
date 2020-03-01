<?php

require 'vendor/autoload.php';
use Carbon\Carbon;

date_default_timezone_set('Asia/jakarta');

$date = Carbon::createFromDate(2020, February, 30);
$date = Carbon::now();

printf("Tanggal berapakah sekarang? %s\n", $date);


$api = new RestClient([
	'base_url' => "https://ibnux.github.io/BMKG-importer",
	'format' => "json",
]);


$api = new RestClient([
    'base_url' => "https://ibnux.github.io/BMKG-importer", 
    'format' => "json", 
    'headers' => ['Authorization' => 'Bearer '.OAUTH_BEARER], 
]);
$result = $api->get("cuaca/501320", []);
if($result->info->http_code == 200)
    var_dump($result->decode_response());


$result = $api->get("cuaca/501320");
 echo "<pre>";
 print_r($result->decode_response());
$data = $result->decode_response();
 printf("Cuaca kota singkawang tanggal %s, adalah %s dengan suhu %s derajat celcius \n", $data[0]->jamCuaca, $data[0]->cuaca, $data[0]->tempC );

foreach((array) $data as $item) {
	printf("Cuaca kota singkawang tanggal %s, adalah <strong>%s</strong> dengan suhu %s derajat celcius. \n", $item->jamCuaca, $item->cuaca, $item->tempC );
}
