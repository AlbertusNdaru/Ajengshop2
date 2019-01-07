<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="<?php echo base_url().'penjualan/penjualan'?>" class="s-text13 active1">
									All
								</a>
							</li>
                            <?php foreach ($kategori->result() as $data) { ?>
							<li class="p-t-4">
								<a href="<?php echo base_url().'penjualan/penjualanbykategori?id='.$data->id_kategori?>" class="s-text13">
									<?php echo $data->jenis_barang?>
								</a>
							</li>
                            <?php }?>
						</ul>

						<!--  -->

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					

					<!-- Product -->
					<div class="row" style="display:flex;">
                    <?php foreach ($record->result() as $data) { ?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative <?php if ($data->status=='sale') { echo 'block2-labelsale';} else { echo 'block2-labelnew';}?>">
									<img src="<?php echo base_url('assets/img_product/').$data->foto?>" alt="IMG-PRODUCT" style="height: 250px;">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>
										

										<div class="btn w-size1 trans-0-4" style="position: absolute;width: 100%;top: 75%;">
											<!-- Button -->
											<button  onclick="addtocart('<?php echo $data->id_barang ?>','<?php if(isset($_SESSION['userdata'])){echo 'true';} else {echo 'false';}?>')" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
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
                        <?php }?>
                    </div>
                  

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
					<div align="center">
						<?php
						echo $this->pagination->create_links();
						
						?>
					</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <script>
    
    </script>