      <div class="jumbotron">
        <div class="container">
           <div class="row">
              <div class="col-md-6">                
                <h1>Halaman Registrasi</h1>
                <p>Sudah punya akun? <?php echo anchor('Login','Login disini.');?></p>
              </div>
               <div class="col-md-6 col-md-offset-6">
                <?php echo form_open('Login/register'); ?>
                 <form class="form-signin" action="<?php echo site_url('Login/register');?>" method="post">              
                                        <label for="username" class="sr-only">Username</label>   
                                        <input class="form-control" type="text" name="user_name"  placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>"  />
                                        <div style="color:#D04C4C"><?php echo form_error('user_name'); ?></div>

                                        <label for="email" class="sr-only">Email</label>   
                                        <input class="form-control" type="text" name="user_email"  placeholder="Email" value="<?php echo set_value('user_email'); ?>"  />      
                                        <div style="color:#D04C4C"><?php echo form_error('user_email'); ?></div>

                                        <input class="form-control" type="password" name="user_password" class="field-divided" placeholder="Password" id="txtNewPassword" value="<?php echo set_value('user_password'); ?>"  />
                                        <div style="color:#D04C4C"><?php echo form_error('user_password'); ?></div>
                                        
                                        <input class="form-control" type="password" name="cpassword" class="field-divided" placeholder="Confirm Password" id="txtConfirmPassword" onChange="checkPasswordMatch();" value="<?php echo set_value('cpassword'); ?>"  />
                                                                              
                                        <div style="color:#D04C4C" id="divCheckPasswordMatch"></div>
                                        <div style="color:#D04C4C"><?php echo form_error('cpassword'); ?></div>
                                        
                                        <select name="user_level" class="form-control" >
                                            <option style="display:none;" value="" disabled selected>Tipe User </option>
                                            <option value="2"<?php echo set_select('user_level','2', ( !empty($data) && $data == "2" ? TRUE : FALSE )); ?>>Pelayan</option>
                                            <option value="3"<?php echo set_select('user_level','3', ( !empty($data) && $data == "3" ? TRUE : FALSE )); ?>>Kasir</option>
                                            </select>

                                          <div style="color:#D04C4C"><?php echo form_error('user_level'); ?></div>
                                          &nbsp;
                                          <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

                 </form>
                 <?php echo form_close(); ?>
               </div>
         </div>
         </div>
      </div>


<script type="text/javascript">
    function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("<p>Password tidak sesuai, periksa password.</p>");
    else if (password = confirmPassword)
        $("#divCheckPasswordMatch").html("");
    }

    $(document).ready(function () {
       $("#txtConfirmPassword").keyup(checkPasswordMatch);
    });

</script>

    