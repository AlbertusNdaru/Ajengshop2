<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url('assets/member/')?>images/xxx.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
							Happy Shopping
						</h2>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
							New Collection 
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="<?php echo base_url()?>penjualan/penjualan" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(<?php echo base_url('assets/member/')?>images/cxcx.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rollIn">
							Happy Shopping
						</h2>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="lightSpeedIn">
							New Collection 
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="<?php echo base_url()?>penjualan/penjualan" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(<?php echo base_url('assets/member/')?>images/image.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rotateInDownLeft">
							Happy Shopping
						</h2>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="rotateInUpRight">
							New Collection
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="<?php echo base_url()?>penjualan/penjualan" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Banner -->
	<div class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url('assets/member/')?>images/icon.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="<?php echo base_url().'penjualan/penjualanbykategori?id=KTG002'?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Pakaian Wanita
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url('assets/member/')?>images/icon3.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="<?php echo base_url().'penjualan/penjualanbykategori?id=KTG003'?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Accesories
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url('assets/member/')?>images/iconmen.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="<?php echo base_url().'penjualan/penjualanbykategori?id=KTG001'?>"  class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Pakaian Pria
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Our product -->
	<section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Our Products
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#new" role="tab">New</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Sale</a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content p-t-35">
					<div class="tab-pane fade show active" id="new" role="tabpanel">
						<div class="row">
                        <?php $no=1; foreach ($new->result() as $data) { ?>
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img style="height: 285px;" src="<?php echo base_url('assets/img_product/').$data->foto?>" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="btn w-size1 trans-0-4" style="position: absolute;width: 100%;top: 75%;">
												<!-- Button -->
												<button onclick="addtocart('<?php echo $data->id_barang ?>','<?php if(isset($_SESSION['userdata'])){echo 'true';} else {echo 'false';}?>')" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20" align="center">
									<a  href="<?php echo base_url().'penjualan/productdetail?id='.$data->id_barang?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $data->nama_barang?>
									</a>
									<div class="flex-w bo5 of-hidden w-size17" style="width: 155px;">
									<input onchange="enabledcek('<?php echo $data->id_barang?>')" type="checkbox" id="cek<?php echo $data->id_barang?>" name="scales" style="margin-top: 10%;">
									<button disabled id="left<?php echo $data->id_barang?>" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input id="jml<?php echo $data->id_barang?>" class="size8 m-text18 t-center num-product" type="number" name="num-product2" value="1">

									<button disabled id="right<?php echo $data->id_barang?>" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
									<span class="block2-price m-text6 p-r-5">
										Rp <?php echo number_format($data->harga,2)?>
									</span>
								</div>
								</div>
							</div>
                            <?php } ?>
							
						</div>
					</div>

					<div class="tab-pane fade " id="best-seller" role="tabpanel">
						<div class="row">
                        <?php $no=1; foreach ($bestseller->result() as $data) { ?>
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img style="height: 285px;" src="<?php echo base_url('assets/img_product/').$data->foto?>" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="btn w-size1 trans-0-4" style="position: absolute;width: 100%;top: 75%;">
												<!-- Button -->
												<button onclick="addtocart('<?php echo $data->id_barang ?>','<?php if(isset($_SESSION['userdata'])){echo 'true';} else {echo 'false';}?>')" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20" align="center">
									<a  href="<?php echo base_url().'penjualan/productdetail?id='.$data->id_barang?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $data->nama_barang?>
									</a>
									<div class="flex-w bo5 of-hidden w-size17" style="width: 155px;">
									<input onchange="enabledcek('<?php echo $data->id_barang?>')" type="checkbox" id="cek<?php echo $data->id_barang?>" name="scales" style="margin-top: 10%;">
									<button disabled id="left<?php echo $data->id_barang?>" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input id="jml<?php echo $data->id_barang?>" class="size8 m-text18 t-center num-product" type="number" name="num-product2" value="1">

									<button disabled id="right<?php echo $data->id_barang?>" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
									<span class="block2-price m-text6 p-r-5">
										Rp <?php echo number_format($data->harga,2)?>
									</span>
								</div>
								</div>
							</div>
                            <?php } ?>
							
						</div>
					</div>

					<div class="tab-pane fade show" id="sale" role="tabpanel">
						<div class="row">
                        <?php $no=1; foreach ($sale->result() as $data) { ?>
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img style="height: 285px;" src="<?php echo base_url('assets/img_product/').$data->foto?>" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="btn w-size1 trans-0-4" style="position: absolute;width: 100%;top: 75%;">
												<!-- Button -->
												<button onclick="addtocart('<?php echo $data->id_barang ?>','<?php if(isset($_SESSION['userdata'])){echo 'true';} else {echo 'false';}?>')" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
									<a  href="<?php echo base_url().'penjualan/productdetail?id='.$data->id_barang?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $data->nama_barang?>
									</a>
										<input hidden id="stok<?php echo $data->id_barang?>j" value="<?php echo $data->stok?>">
									<a id="stok<?php echo $data->id_barang?>s" class="block2-name dis-block s-text3 p-b-5">
										Stok Saat ini : <?php echo $data->stok?>
									</a>
										<span class="block2-price m-text6 p-r-5">
										<?php echo $data->harga ?>
										</span>
									</div>
								</div>
							</div>
                            <?php } ?>
							
						</div>
					</div>
					<!-- - -->
				</div>
			</div>
		</div>
	</section>
	<script>
		function addtocart(id)
		{
			
		}
    </script>