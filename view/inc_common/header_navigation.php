	<header class="navbar navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
		
			<!-- logo -->
			<div class="navbar-brand">
				<a href="index.html">
					<img src="assets/images/logo@2x.png" width="88" alt="" />
				</a>
			</div>
			
			
			<!-- main menu -->
						
			<ul class="navbar-nav">
				<li>
					<a href="<?=site_url()?>">
						<i class="entypo-home"></i>
						<span class="title">Home</span>
					</a>
				</li>
				<li>
					<a href="<?=site_url()?>opac">
						<i class="entypo-book"></i>
						<span class="title">Online Catalog</span>
					</a>
				</li>
			</ul>
						
			
			<!-- notifications and other links -->
			<ul class="nav navbar-right pull-right">
				
				<!-- raw links -->
				
				
				<li>
					<a href="<?= $isLogin ? base_url().'logout' : base_url().'login' ?>">
						<?= $isLogin ? "Log Out" : "Log in"?> <i class="entypo-logout right"></i>
					</a>
				</li>
				
				
				<!-- mobile only -->
				<li class="visible-xs">	
				
					<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
					<div class="horizontal-mobile-menu visible-xs">
						<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
							<i class="entypo-menu"></i>
						</a>
					</div>
					
				</li>
				
			</ul>
	
		</div>
		
	</header>
