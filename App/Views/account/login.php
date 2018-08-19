<?= Zest\View\View::view('nav'); ?>
<title>Login</title>
<br><br>
<style type="text/css">
  .form {
    background-color: #fff!important;
  }
</style>
 <div class="row">
    <div class="col m8 s10 offset-m2 offset-s1 form">
          <div class='col m6 s6 offset-m5 offset-s3'>
             <h4>Login</h4>
          </div>
      <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <i class="material-icons prefix">people</i>
          <input id="username-login" type="text" class="validate" autocomplete="off">
          <label for="username-login">Username</label>
        </div>
      </div>           
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <i class="material-icons prefix">security</i>
          <input id="password-login" type="password" class="validate">
          <label for="password-login">Password</label>
        </div>
      </div>  
    </div>
  </div>
      <div class='row'>
        <div class='col m12 s12'>
            <div class='col m3 s3'>
                 <a class='verdana' style=' color: #00576b!important;font-size:9px!important;'href='<?= site_base_url(); ?>account/signup'>Don't have account?</a>
             </div>   
            <div class='col m3 s3'>
                 <a href='<?= site_base_url(); ?>account/reset' class='verdana' style=' color: #00576b!important;font-size:9px!important;'>Forget Password</a>
            </div>
            <div class='col m3 s3 offset-m3'>
               <a class="btn waves-effect waves-light" type="submit" id="submit-login" style="width:76px!important;height:35px!important"><span  class='verdana' style='font-size:12px!important'>Login</span>
              </a>
            </div>
        </div> 
      </div>   
    </div>
  </div>  

<?= Zest\View\View::view('footer'); ?>