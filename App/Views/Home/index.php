<?= \Zest\View\View::view('nav'); ?>
<body>
	<div class='container-fluid'>
	<div class="row">
			<div class="col-6">	
			<img src="<?= site_base_url(); ?>image/zest.png" class="" id='logo'>	
			</div>	
			<div class="col-6">
			<div id='margin'></div>
			<h1 class='text-center'><?= printl('framework:home'); ?></h1>
		    <p class='text-center'><?= printl('app:home'); ?></p>		
			</div>							
		</div>
</div>
</body>	
<?= \Zest\View\View::view('footer'); ?>



