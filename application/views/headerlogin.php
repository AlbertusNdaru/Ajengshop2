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
								<a href="<?php echo base_url()?>auth/loginadmin">Backend Admin</a>
							</li>
							<li>
								<a href="<?php echo base_url()?>auth/loginadmin">Super Admin</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="#" class="header-wrapicon1 dis-block dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('assets/member/')?>images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						<?php echo $_SESSION['userdata']->nama_member?>
						
					</a>
                        <ul class="dropdown-menu" style="background-color: white;border-radius: 7px;min-width: 100%;">
                            <li><a style="color:black; margin-left:5px;" href="<?php echo base_url().'transaksi/get_data_transaksi_by_id'?>">Riwayat Transaksi</a></li>                           
                        </ul>

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

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="<?php echo base_url()?>penjualan" class="logo-mobile">
				<img src="<?php echo base_url('assets/member/')?>images/icons/Ajeng.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
				<a href="#" class="header-wrapicon1 dis-block dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('assets/member/')?>images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						<?php echo $_SESSION['userdata']->nama_member?>
						
					</a>
					<ul class="dropdown-menu" style="background-color: white;border-radius: 7px;min-width: 100%;">
                            <li><a style="color:black; margin-left:5px;" href="<?php echo base_url().'transaksi/get_data_transaksi_by_id'?>">Riwayat Transaksi</a></li>                           
                        </ul>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
					  <img src="<?php echo base_url('assets/member/')?>images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span id="cartpending2" class="header-icons-noti"></span>

						<!-- Header cart noti -->
						<div id="cartdetail2" class="header-cart header-dropdown">
							

						
						</div>
						
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
			<ul class="main_menu">
							<li>
								<a href="<?php echo base_url()?>penjualan">Home</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>penjualan/penjualan">Shop</a>
							</li>
							<li>
								<a href="<?php echo base_url()?>auth/loginadmin">Backend Admin</a>
							</li>
							<li>
								<a href="<?php echo base_url()?>auth/loginadmin">Super Admin</a>
							</li>
						</ul>
			</nav>
		</div> <!--tutup header-->

		
<script>


</script>