<?php

require 'vendor/autoload.php';
date_default_timezone_set('Asia/jakarta');

$api = new RestClient([
    'base_url' => "https://ibnux.github.io/BMKG-importer", 
    'format' => "json"
]);
$result = $api->get("cuaca/501320");
$data = $result->decode_response();

foreach((array) $data as $item) {
$date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                               @$item->jamCuaca);
        printf("Cuaca kota singkawang hari %s tanggal %s jam % adalah %s dengan suhu %s derajat celcius. \n", 
        	@$date->format('l'),@$date->format('d M Y'), 
        	@$date->format('H:i'), $item->cuaca, $item->tempC);
}
?>