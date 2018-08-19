<?= Zest\View\View::view('nav'); ?>
<title><?= $args['name'] ?></title>
<br>
  <div class="row">
    <div class="col s10 offset-s1">
      <div class="card">
        <div class="card-content">
            <span class="card-title center-align"><b><i class="material-icons prefix" style="font-size: 100px !important;">edit</i></b></span>
            <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <i class="material-icons prefix">nature_people</i>
                      <input id="name" type="text"  class="validate" value="<?= $args['name'] ?>">
                      <input type="text" id="id" value="<?= $args['id'] ?>" hidden >
                      <label for="name">Name</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <i class="material-icons prefix">people</i>
                      <input id="username-update" type="text" class="validate" value="<?= $args['username'] ?>" >
                      <label for="username-update">Username</label>
                    </div>
                  </div>        
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <i class="material-icons prefix">email</i>
                      <input id="email" type="email" class="validate" value="<?= $args['email'] ?>" >
                      <label for="email">Email</label>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
        <div class="card-action">
      <div class='row'>
        <div class="input-field col s8 offset-s2">
          <button class="btn waves-effect waves-light" type="submit" id="submit-update">Submit
          <i class="material-icons right" style="color: #fff">send</i>
          </button>
         </div> 
      </div>  
    </div>
    </div>

     <div class="card">
        <div class="card-content">
            <span class="card-title center-align"><b><i class="material-icons prefix" style="font-size: 100px !important;">security</i></b></span>
            <div class="row">
                <div class="col s12">   
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <i class="material-icons prefix">security</i>
                      <input id="password" type="password" class="validate">
                      <label for="password">Password</label>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <i class="material-icons prefix">security</i>
                      <input id="confirm" type="password" class="validate">
                      <label for="confirm">Password</label>
                    </div>
                  </div>                   
                </div>
              </div>
            </div>
        <div class="card-action">
      <div class='row'>
        <div class="input-field col s8 offset-s2">
          <button class="btn waves-effect waves-light" type="submit" id="submit-update-password">Submit
          <i class="material-icons right" style="color: #fff">send</i>
          </button>
         </div> 
      </div>  
    </div>
    </div>

      <div class="card">
        <div class="card-content">
            <span class="card-title center-align"><b><i class="material-icons prefix" style="font-size: 100px !important;">details</i></b></span>
            <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <input id="bio" type="text"  class="validate" value="<?= $args['bio'] ?>">
                      <label for="bio">Bio</label>
                    </div>
                  </div>        
                </div>
              </div>
            </div>
        <div class="card-action">
      <div class='row'>
        <div class="input-field col s8 offset-s2">
          <button class="btn waves-effect waves-light" type="submit" id="submit-detail">Submit
          <i class="material-icons right" style="color: #fff">send</i>
          </button>
         </div> 
      </div>  
    </div>
    </div>

     <!-- <div class="card">
          <form id='profile-img'>
           <div class="card-content">
              <span class="card-title center-align"><b><i class="material-icons prefix" style="font-size: 100px !important;">file_upload</i></b></span>
              <div class="row">
                  <div class="col s12">      
                    <div class="row">
                      <div class="input-field col s10 offset-s1">
                        <input type="file" name='profileImg' class="validate">
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
           <div class="card-action">
                <div class='row'>
                  <div class="input-field col s8 offset-s2">
                    <button class="btn waves-effect waves-light" type="submit" id="submit-profile">Submit
                    <i class="material-icons right" style="color: #fff">send</i>
                    </button>
                   </div> 
                </div>  
            </div>         
          </form>
         </div> -->


  </div>
</div>
<?= Zest\View\View::view('footer'); ?>