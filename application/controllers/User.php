<?php 
defined('BASEPATH') or exit ("No Direct Script Access Allowed");

	class User extends CI_controller
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
		    $this->load->view('User_login');
		    $this->load->view('footer');
		}
		 
		function auth(){
		    $email    = $this->input->post('email',TRUE);
		    $password = md5($this->input->post('password',TRUE));
		    $validate = $this->User_model->validate($email,$password);
		    if($validate->num_rows() > 0){
		        $data  = $validate->row_array();
		        $name  = $data['user_name'];
		        $email = $data['user_email'];
		        $level = $data['user_level'];
		        $sesdata = array(
		            'username'  => $name,
		            'email'     => $email,
		            'level'     => $level,
		            'logged_in' => TRUE
		        );
		        $this->session->set_userdata($sesdata);
		        // akses login untuk admin
		        if($level=='1'){
		            redirect('Halaman');
		 
		        // akses login untuk pelayan
		        }elseif($level=='2'){
		            redirect('Halaman/pelayan');
		 
		        // akses login untuk kasir
		        }else{
		            redirect('Halaman/kasir');
		        }
		    }else{
		        echo $this->session->set_flashdata('msg','Email atau Password tidak cocok');
		        redirect('User');
		    }
		  }
		 
		  function logout(){
		      $this->session->sess_destroy();
		      redirect('User');
		  }
	}


?>