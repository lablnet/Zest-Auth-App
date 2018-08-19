<?= Zest\View\View::view('nav'); ?>
<title>Signup</title>
<br><br>
<style type="text/css">
  .form {
    background-color: #fff!important;
  }
</style>
 <div class="row">
    <div class="col m8 s10 offset-m2 offset-s1 form">
          <div class='col m6 s6 offset-m5 offset-s3'>
             <h4>Signup</h4>
          </div>
<div class="row">
    <div class="col s12">
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <i class="material-icons prefix">nature_people</i>
          <input id="name" type="text"  class="validate">
          <label for="name">Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <i class="material-icons prefix">people</i>
          <input id="username-signup" type="text" class="validate">
          <label for="username-signup">Username</label>
        </div>
      </div>        
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>      
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <i class="material-icons prefix">security</i>
          <input id="password-signup" type="password" class="validate">
          <label for="password-signup">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s10 offset-s1">
           <i class="material-icons prefix">security</i>
          <input id="confirm" type="password" class="validate">
          <label for="confirm">Password-Repeat</label>
        </div>
      </div>    
    </div>
  </div>
               <p>By clicking signup, you agree to our terms</p>
               <hr><br>
      <div class='row'>
        <div class='col m12 s12'>
            <div class='col m6 s6'>
                 <a class='verdana' style=' color: #00576b!important;font-size:12px!important;'href='<?= site_base_url(); ?>account/login'>Already have account?</a>
             </div>   
            <div class='col m6 s6 offset-m10'>
               <a class="btn waves-effect waves-light" type="submit" id="submit-signup" style="width:76px!important;height:35px!important"><span  class='verdana' style='font-size:12px!important'>Signup</span>
              </a>
            </div>
        </div> 
      </div> 


</div>
</div>
<?= Zest\View\View::view('footer'); ?>