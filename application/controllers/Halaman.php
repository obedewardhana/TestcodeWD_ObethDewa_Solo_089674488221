<?php
class Halaman extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index(){
      if($this->session->userdata('level')=='1'){
          $this->load->view('dashboard');
      }else{
          echo "Access Denied";
      }

  }

  function pelayan(){
    if($this->session->userdata('level')=='2'){
      $this->load->view('header');
      $this->load->view('navbar');
      $this->load->view('pelayan/home');
      $this->load->view('footer');
    }else{
        echo "Access Denied";
    }
  }

  function kasir(){
    if($this->session->userdata('level')=='3'){
      $this->load->view('header');
      $this->load->view('navbar');
      $this->load->view('kasir/home');
      $this->load->view('footer');
    }else{
        echo "Access Denied";
    }
  }

}
