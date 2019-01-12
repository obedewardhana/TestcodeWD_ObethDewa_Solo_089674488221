<?php 
defined('BASEPATH') or exit ("No Direct Script Access Allowed");

	class Login extends CI_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
			$this->load->helper(array('url','form','html'));
            $this->load->library(array('table'));
            $this->load->library(array('form_validation'));
		}

		function index(){
			$this->load->view('header');
			$this->load->view('navbar');
		    $this->load->view('User_login');
		    $this->load->view('footer');
		}
		 
		function auth() {
            $data = array('user_email' => $this->input->post('user_email', TRUE),
                          'user_password' => $this->input->post('user_password', TRUE)
            );

                $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('user_password', 'Password', 'required');
                $this->form_validation->set_message('required','%s Harus Diisi.');

            if($this->form_validation->run()==TRUE){
            $hasil = $this->User_model->cek_user($data);

            if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['logged_in'] = TRUE;
                $sess_data['user_name'] = $sess->user_name;
                $sess_data['user_email'] = $sess->user_email;
                $sess_data['user_level'] = $sess->user_level;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('user_level')=='1') {
                redirect('admin/home');
            }
            elseif ($this->session->userdata('user_level')=='2') {
                redirect('Pelayan');
            }
            elseif ($this->session->userdata('user_level')=='3') {
                redirect('Kasir');
            }       
            }

            else{
                    $this->session->set_flashdata('msg', 'Email atau Password tidak cocok!');  
                    redirect('Login');
                }
            }

            else{
                 $this->load->view('header');
                	$this->load->view('navbar');
                    $this->load->view('User_login');
                    $this->load->view('footer');
            }
      
         }

		  function register(){
                
		        $this->form_validation->set_rules('user_name', 'Nama','required');
		        $this->form_validation->set_rules('user_email','Email','required|valid_email');
		        $this->form_validation->set_rules('user_password','Password','required');
		        $this->form_validation->set_rules('cpassword','Password','required|matches[user_password]');
		        $this->form_validation->set_message('required','%s Harus Diisi.');
                               
                if($this->form_validation->run()==FALSE){  
                	$this->load->view('header');
                	$this->load->view('navbar');
                    $this->load->view('User_register');
                    $this->load->view('footer');
                }
                else{
                    $data = array(
                        'user_name' => $this->input->post('user_name'),
                        'user_password' => md5($this->input->post('user_password')),
                        'user_email' => $this->input->post('user_email',true),
                        'user_level' => $this->input->post('user_level',true)

                    );
                    $this->User_model->insertmember($data);

                   $this->session->set_flashdata('success', 'Akun Berhasil Dibuat!');            
                    redirect('Login');
                    }
                    }
		 
		  function logout(){
		      $this->session->sess_destroy();
		      redirect('Home');
		  }
	}


?>