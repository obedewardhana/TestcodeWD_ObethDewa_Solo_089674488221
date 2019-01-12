<?php
class Pelayan extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('Login');
    }
  }

  function index(){
      if($this->session->userdata('user_level')=='2'){
          $this->load->view('header');
          $this->load->view('navbar');
          $this->load->view('pelayan/home');
          $this->load->view('footer');
      }else{
          echo "Access Denied";
      }

  }

  function add_menu(){

        $menu_id = $this->input->post('menu_id',true);
        $menu_price = $this->input->post('menu_price',true);
        $menu_name = $this->input->post('menu_name',true);
        $menu_status = $this->input->post('menu_status',true);

                
        $this->form_validation->set_rules('menu_name', 'Nama', 'required');
        $this->form_validation->set_rules('menu_price', 'Harga', 'required');
        $this->form_validation->set_rules('menu_status', 'Status', 'required');

        $this->form_validation->set_message('required','%s Harus Diisi.');

        if ($this->form_validation->run() == TRUE) {
                if ($_FILES['image']['error'] != 4) {
                    $config['upload_path'] = 'uploads';
          $config['allowed_types'] = 'jpg|jpeg|gif|png';
          $config['max_size'] = '300000';
          $config['max_width']  = '3000';
          $config['max_height']  = '3000';      
            $this->upload->initialize($config); 

                    if (!$this->upload->do_upload()) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('Pelayan/add_menu');
                    } else {
                            $image = $this->upload->data();
                  $imgdata = file_get_contents($image['full_path']);
                    $data = array(
                'menu_name' => $menu_name,
                'menu_price' => $menu_price,
                'menu_status' => $menu_status,
                'menu_image' => $imgdata
                );
                
                   if ($this->menu_model->save($data)) {
                                $this->session->set_flashdata('success', 'Menu berhasil dibuat!');
                                redirect('Pelayan/Home');
                            } else {
                                $this->session->set_flashdata('error', 'Gagal, Coba Lagi!');
                                redirect('Pelayan/Home');
                            }
                        }
                    }
               
              } redirect('Pelayan');

        }

}
