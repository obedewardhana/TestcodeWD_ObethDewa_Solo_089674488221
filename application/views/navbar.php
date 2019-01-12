<?php 
$is_logged_in=$this->session->userdata('logged_in');
$level=$this->session->userdata('user_level');
if($is_logged_in == true && $level == '1' ) { 
?>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('User') ?>">
            <img src="<?php echo base_url();?>assets/img/restoini.png" style="width: 130px; height: 50px; padding: 10px" alt="Resto ini">
          </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('Home') ?>">Beranda
              </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('Home') ?>">Daftar Pegawai
              </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php } elseif($is_logged_in == true && $level == '2' ) {
	?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
	  <div class="container">
	    <a class="navbar-brand" href="<?php echo site_url('User') ?>">
	            <img src="<?php echo base_url();?>assets/img/restoini.png" style="width: 130px; height: 50px; padding: 10px" alt="Resto ini">
	          </a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
	    <div class="collapse navbar-collapse" id="navbarResponsive">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item active">
	          <a class="nav-link" href="<?php echo site_url('Home') ?>">Beranda
	              </a>
	        </li>
	        <li class="nav-item active">
	          <a class="nav-link" href="<?php echo site_url('Login/logout') ?>">Logout
	              </a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

<?php } elseif($is_logged_in == true && $level == '3' ) {
	 ?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
	  <div class="container">
	    <a class="navbar-brand" href="<?php echo site_url('User') ?>">
	            <img src="<?php echo base_url();?>assets/img/restoini.png" style="width: 130px; height: 50px; padding: 10px" alt="Resto ini">
	          </a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
	    <div class="collapse navbar-collapse" id="navbarResponsive">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item active">
	          <a class="nav-link" href="<?php echo site_url('Home') ?>">Beranda
	              </a>
	        </li>
	        <li class="nav-item active">
	          <a class="nav-link" href="<?php echo site_url('Home') ?>">Pembayaran
	              </a>
	        </li>
	        <li class="nav-item active">
	          <a class="nav-link" href="<?php echo site_url('Login/logout') ?>">Logout
	              </a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

 <?php }  else {?> 


 	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
	  <div class="container">
	    <a class="navbar-brand" href="<?php echo site_url('User') ?>">
	            <img src="<?php echo base_url();?>assets/img/restoini.png" style="width: 130px; height: 50px; padding: 10px" alt="Resto ini">
	          </a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
	    <div class="collapse navbar-collapse" id="navbarResponsive">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item active">
	          <a class="nav-link" href="<?php echo site_url('Home') ?>">Beranda
	              </a>
	        </li>
	        <li class="nav-item active">
	          <a class="nav-link" href="<?php echo site_url('Login') ?>">Login
	              </a>
	        </li>
	        <li class="nav-item active">
	          <a class="nav-link" href="<?php echo site_url('Login/register') ?>">Register
	              </a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	 <?php }?>