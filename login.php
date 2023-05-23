<?php include 'header-tanpa-menu.php'; ?>
<section class="vh-100 login-section-bg">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <img src="assets/images/logo-ub-samping.png" style="width:40%;"></img>

            <div class="content ">
                <!-- BEGIN LOGIN FORM -->
                <!-- {if $status eq 'notvalid' or $status eq 'notaktif'}
                <div class="forget-password">
                    <p style="color: #acff56">
                        Silahkan melakukan verifikasi dengan membuka tautan yang ada pada email Anda.
                    </p>
                </div>
                {else if $status eq 'valid'}
                <div class="forget-password">
                    <p style="color: #acff56">
                        Akun anda telah aktif, silahkan login untuk melanjutkan tahapan berikutnya.
                    </p>
                </div>
                {/if} -->
                <form class="login-form" action="{$host}site/login" method="post">
                    <!-- <h3 class="form-title">Sign In</h3> -->
                    <br>
                    <br>
                    <div class="alert alert-error hide">
                        <button class="close" data-dismiss="alert"></button>
                        <span>Enter any username and password.</span>
                    </div>
                    <input name="jenjang" type="hidden" value="1">
                    <div class="form-group">
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <!-- <label class="control-label visible-ie8 visible-ie9">Username</label> -->
                        <div class="input-icon">
                            <i class="icon-user"></i>
                            <input class="form-control placeholder-no-fix" type="text" autocomplete="off"
                                placeholder="Username / Email" name="username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <label class="control-label visible-ie8 visible-ie9">Password</label> -->
                        <div class="input-icon">
                            <i class="icon-lock"></i>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                                placeholder="Password" name="password" />
                        </div>
                    </div><br>
                        
                    <div class="form-actions">
                        <!--                    <label class="checkbox">
                                <input type="checkbox" name="remember" value="1" />Remember me
                            </label>-->
                        
                        
                        <button type="submit" class="btn-login" style="color: #fff !important;">
                            Login <i class="m-icon-swapright m-icon-white"></i>
                        </button>

                        <style>
                            .btn-regist{
                                background-color : #0e347f;
                                border-radius : 12px!important;
                                border: 2px solid #85171a;
                                padding : 7px;
                                
                            }
                        </style>
                        
                        
                    </div>
                    
                    
                    <br>
                        <br>
                        <div class="text-center">
                        <a class='btn btn-sm' style='color:black;'>Belum memiliki akun? <span style="color:#f38f2f;"> Daftar Disini</span></a>
                        </div>
                        <br>
                        <br>
                    
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'footer-tanpa.php'; ?>