      <div class="jumbotron">
        <div class="container">
           <div class="row">
              <div class="col-md-6">                
                <h1>Halaman Login</h1>
                <p>Belum punya akun? <?php echo anchor('Login/Register','Daftar disini.');?></p>
              </div>
               <div class="col-md-6 col-md-offset-6">
                <p>
                            <?php if ($this->session->flashdata('msg')): ?></br>
                                <div style="color: #fefefe; width: 400px; border-radius: 5px; margin: 0; text-align:center; padding: 5px; background-color: #D04C4C;">
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                            <?php endif;?>
                            <?php if ($this->session->flashdata('success')): ?>
                                <div style="color: #fefefe; width: 400px; border-radius: 5px; margin: 0; text-align:center; padding: 5px; background-color: #7EB62E;">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            </p>   
                 <form class="form-signin" action="<?php echo site_url('Login/auth');?>" method="post">              
                   <label for="email" class="sr-only">Email</label>    
                   <input type="email" name="user_email" class="form-control" placeholder="Email" id="email" value="<?php echo set_value('user_email'); ?>"/>
                   <div style="color:#D04C4C"><?php echo form_error('user_email'); ?></div>

                   <label for="password" class="sr-only">Password</label>
                   <input type="password" name="user_password" class="form-control" placeholder="Password" id="password" value="<?php echo set_value('user_password'); ?>" />
                   <div style="color:#D04C4C"><?php echo form_error('user_password'); ?></div>

                   <div class="checkbox">
                     <label>
                       <input type="checkbox" value="remember-me"> Ingat Saya
                     </label>
                   </div>
                   &nbsp;
                   <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                 </form>
               </div>
         </div>
         </div>
      </div>

    