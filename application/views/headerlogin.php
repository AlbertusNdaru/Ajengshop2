<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Free shipping for standard order over $100
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						<?php echo $_SESSION['userdata']->email?>
					</span>
					<span style="margin-left:10px" class="topbar-email">
					<a href="<?php echo base_url()?>authuser/logout">Logout</a>
					</span>
					

				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="<?php echo base_url()?>penjualan" class="logo">
					<img src="<?php echo base_url('assets/member/')?>images/icons/Ajeng.png" alt="IMG-LOGO">
				
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="<?php echo base_url()?>penjualan">Home</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>penjualan/penjualan">Shop</a>
							</li>

							<li>
								<a href="product.html">Sale</a>
							</li>

							<li>
								<a href="cart.html">Features</a>
							</li>

							<li>
								<a href="blog.html">Blog</a>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="<?php echo base_url('assets/member/')?>images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						<?php echo $_SESSION['userdata']->nama_member?>
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="<?php echo base_url('assets/member/')?>images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span id="cartpending" class="header-icons-noti"></span>

						<!-- Header cart noti -->
						<div id="cartdetail" class="header-cart header-dropdown">
							

						
						</div>
					</div>
				</div>
			</div>
		</div>

		
<script>


</script>