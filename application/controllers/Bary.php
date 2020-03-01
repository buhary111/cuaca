<?php
class Bary extends CI_Controller {

	public function index()
	{
		$api = new RestClient([
    		'base_url' => "https://ibnux.github.io/BMKG-importer", 
    		'format' => "json"
		]);
		$result = $api->get("cuaca/501320");
		$data['data'] = $result->decode_response();
		$data['name'] = "Gita Gutawa";
		$this->load->view('Bary_message',$data);


	}
}