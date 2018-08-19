<?= Zest\View\View::view('nav'); ?>
<title><?= $args['name'] ?></title>
<div id='profile-plater'>
   <div class="row">
      <div class="col m12 s12">
          <div class="col s12 m6">
            <?php if (!empty($args['pImg']) || $args['pImg'] !== null) { ?> 
             <img src="<?=site_base_url()?>read/image/<?= $args['pImg'] ?>" id='profileImg'>
           <?php } else { ?>
             <img src="<?=site_base_url()?>image/user.jpg" id='profileImg'>
           <?php } ?> 
          </div>
          <div class="col s12 m6">
                <h1 class="align-center" id='profile-plater-h'><?=$args['name']?></h1>
                <p id='profile-plater-p'><?=$args['bio']?></p>
          </div>    
      </div>
   </div> 
</div> 
<div id='relax'></div>
<?= Zest\View\View::view('footer'); ?>