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
          <i class="material-icons prefix">password</i>
          <input id="password" type="text" class="validate" autocomplete="off">
          <label for="password">password</label>
        </div>
      </div>  
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <i class="material-icons prefix">password</i>
          <input id="confirm" type="text" class="validate" autocomplete="off">
          <label for="confirm">confirm</label>
        </div>
        <input id="token" type="text" class="validate" autocomplete="off" value="<?=$args['token']?>" hidden>
      </div>                 
    </div>
  </div>
      <div class='row'>
        <div class='col m12 s12'>
            <div class='col m3 s3'>
            <div class='col m3 s3 offset-m3'>
               <a class="btn waves-effect waves-light" type="submit" id="submit-reset-process" style="width:76px!important;height:35px!important"><span  class='verdana' style='font-size:12px!important'>Reset</span>
              </a>
            </div>
        </div> 
      </div>   
    </div>
  </div>  </div> </div> 

<?= Zest\View\View::view('footer'); ?>