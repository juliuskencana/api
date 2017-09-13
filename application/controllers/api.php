<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->library('ModEnkripDekrip');
		$ret = array(
			'1' => 'julius', 
			'2' => 'kencana', 
			'3' => 'depok', 
			'4' => '20170908102650', 
			'5' => 'Male', 
			);
		$text = "hello word";
		$encryptor = new ModEnkripDekrip();
		$test = json_encode(array("id" => 1, "pesan" => $text, "data" => array('4324','fdsfsd','gfg')));
		echo $encryptor->enkripData($test);
		// echo "<br>";
		// echo $encryptor->dekripData($test);
	}
}
