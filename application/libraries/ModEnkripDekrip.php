<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * class ModEnkripDekrip
 *
 * @author     Mujiyatna <muji@bmt.co.id>
 * @copyright  2011 PT. Buana Media Teknologi
 * @link http://www.bmt.co.id
 */ 

 
class ModEnkripDekrip {
	public function __construct(){	
		$this->KEY = "3MTC748432RMCA383MTC7484";
		$this->alternate_key = false;	
	}
	
	public function hexToStr($hex) {
		$string='';
		$strlen = strlen($hex)-1;
		for ($i=0; $i < $strlen; $i+=2){
			$string .= chr(hexdec($hex[$i].$hex[$i+1]));
		}
		return $string;
	}
	public function encrypt($str){
		$key = $this->KEY;
		$input = $str;
		$ret = mcrypt_ecb(MCRYPT_3DES,$key,$input,MCRYPT_ENCRYPT); 
		return bin2hex($ret);
	}
	
	public function _decrypt($str){
		$key = $this->KEY;
		$input = $this->hexToStr($str);
		return mcrypt_ecb(MCRYPT_3DES,$key,$input,MCRYPT_DECRYPT);
	}

	public function decrypt($str){
		return $this->_decrypt(strtolower($str));
	}
    
    public function enkripData($str){
		$key = $this->KEY;
		$input = $str;
		$ret = mcrypt_ecb(MCRYPT_3DES,$key,$input,MCRYPT_ENCRYPT); 
		return bin2hex($ret);
	}
	
    public function enkripData64($str){
		$key = $this->KEY;
		$input = $str;
		$ret = mcrypt_ecb(MCRYPT_3DES,$key,$input,MCRYPT_ENCRYPT);
		return base64_encode($ret);
	}
	
    public function dekripData($str){
		$key = $this->KEY;
		$input = $this->hexToStr($str);
		return mcrypt_ecb(MCRYPT_3DES,$key,$input,MCRYPT_DECRYPT);
	}
    
	public function dekripData64($str){
		$key = $this->KEY;
		$input = base64_decode($str);
		return mcrypt_ecb(MCRYPT_3DES,$key,$input,MCRYPT_DECRYPT);
	}

}
