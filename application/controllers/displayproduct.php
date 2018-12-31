<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Displayproduct extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('model_barang');
	}

	function index()
    {     
        
       
		$this->template->load('template1','user/home2');

    }
}
?>