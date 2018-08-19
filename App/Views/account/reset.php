<?= Zest\View\View::view('nav'); ?>
<title>Reset</title>
<br><br>
<style type="text/css">
  .form {
    background-color: #fff!important;
  }
</style>
 <div class="row">
    <div class="col m8 s10 offset-m2 offset-s1 form">
          <div class='col m6 s6 offset-m5 offset-s3'>
             <h4>Reset Password</h4>
          </div>
      <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <i class="material-icons prefix">email</i>
          <input id="email" type="text" class="validate" autocomplete="off">
          <label for="email">Email</label>
        </div>
      </div>            
    </div>
  </div>
      <div class='row'>
        <div class='col m12 s12'>
            <div class='col m3 s3'>
            <div class='col m3 s3 offset-m3'>
               <a class="btn waves-effect waves-light" type="submit" id="submit-reset" style="width:76px!important;height:35px!important"><span  class='verdana' style='font-size:12px!important'>Reset</span>
              </a>
            </div>
        </div> 
      </div>   
    </div>
  </div>  </div> </div> 

<?= Zest\View\View::view('footer'); ?>