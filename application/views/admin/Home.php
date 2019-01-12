<div class="jumbotron">
          <h1>Selamat Datang, <?php echo $this->session->userdata('user_name');?> !</h1>
</div>

<ul class="navbar-brand">
  <li>
    Menu Pemesanan
  </li>
  <li>
    Daftar Menu
  </li>
  <li>
    <a href="<?php echo site_url('User/logout');?>">Logout</a>
  </li>
</ul>