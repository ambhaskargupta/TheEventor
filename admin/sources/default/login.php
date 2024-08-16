<?php
$msg = '';
$url='';
if($logSts == "IN"){
    $msg = $lang['login_alrdy'];
    $formshow = 0;
    $url = 'index.php?sub=user&page=dashboard';
    echo '<a href="'.$url.'">Go to Dashboard</a>';
}
else{
$formshow = 1;
if(!empty($_POST['login'])){
    if(empty($_POST['u_name']) || empty($_POST['p_word'])){
       $msg = $lang['fill_all_details'];         
    }
    else{
        $u_name = $_POST['u_name'];
        $p_word = $_POST['p_word'];
        $data = $function->login($users,$u_name,$p_word);
        if($data==true){
            $lasql = "UPDATE $users SET last_login = '$currentDateTime' WHERE id = $_SESSION[u_id]";
            $lasqlrs = $function->sql_query($lasql);
            $fTime = $function->single_value("SELECT last_login FROM $users WHERE id = $_SESSION[u_id]");
            if(!empty($fTime)){
             $_SESSION['last_login'] = $fTime;
            }
            $formshow = 0;
            $url = 'index.php?sub=user&page=dashboard';
            $msg = '<div class="text-opa"><strong>Please Wait...</strong></div>';
            $msg .= '<div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="min-width: 0px;"></div>
                    </div>
                    <script>
                        var i = 0;
                        var t = 100;
                        function makeProgress(){
                            if(i < 100){
                                i = i + 1;
                                $(".progress-bar").css("width", i + "%").text(i + "%");
                                if(i == 50){
                                    t = 50;
                                }
                                if(i == 100){
                                    window.location.replace("'.$url.'");
                                }

                            }
                            setTimeout("makeProgress()", t ); 
                        }
                        makeProgress();
                    </script>';
            
            #echo '<script>setTimeout(function(){window.location.replace("'.$url.'")},3000);</script>';
        }
        else{
            $msg = $lang['login_failed'];
        }
    }
}
}
?>
<section class="section">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4">
            <div class="login-brand">
              <img src="assets/img/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
              <?php echo $msg; ?>
                <?php if($formshow == 1){ ?>
            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <div class="card-body">
                <form <?php echo $_SERVER['PHP_SELF'].'?sub='.$section.'&page='.$page;?>" method="POST" id="formdata">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="u_name" type="email" class="form-control" name="u_name" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block ">
                    	<label for="p_word" class="control-label">Password</label>
                      <div class="float-right">
                          <a href="auth-forgot-password.html" class="text-small" style="color:#2c328f;">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="p_word" type="password" class="form-control" name="p_word" tabindex="2" required><i class="fas fa-eye" id="p_word" onclick="showhide('#p_word',this)"></i>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                      <input id="submit" type="submit" name="login" class="btn btn-primary btn-lg btn-block" style="background-color:#2c328f;" tabindex="4" value="Login"/>
                  </div>
                </form>
              </div>
            </div>
               <?php } ?>
          </div>
        </div>
      </div>
    </section>
<style>
.login-brand{margin-bottom: 20px !important;}
.container {margin-left: initial !important;}
.text-opa{animation:opa 0.7s linear infinite;}
@keyframes opa{
    0%{
        opacity:0;
    }
    100%{
        opacity:1;
    }
}
                    </style>
</style>
<script type="text/javascript">        
//        <?php if($logSts != "IN"){ ?>
//                //fetch_local_stroage();
//                <?php } ?>
        
//        function fetch_local_stroage(){
//                $('#u_name').val(localStorage["userName"]);
//                $('#p_word').val(localStorage["password"]);
//                $('#submit').click();
//        }
</script> 