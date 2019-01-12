<?php
class Kasir extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('Login');
    }
  }

  function index(){
      if($this->session->userdata('user_level')=='3'){
          $this->load->view('header');
          $this->load->view('navbar');
          $this->load->view('kasir/home');
          $this->load->view('footer');
      }else{
          echo "Access Denied";
      }

  }

}
