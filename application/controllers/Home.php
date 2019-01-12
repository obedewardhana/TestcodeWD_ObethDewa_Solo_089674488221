<?php 
defined('BASEPATH') or exit ("No Direct Script Access Allowed");

	class Home extends CI_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
			$this->load->helper(array('url','form','html'));
		}

		function index(){
		    $this->load->view('header');
		    $this->load->view('navbar');
		    $this->load->view('main');
		    $this->load->view('footer');
		}
		 
	}


?>