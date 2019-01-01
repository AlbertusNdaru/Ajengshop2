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
								<a href="#" class="s-text13 active1">
									All
								</a>
							</li>
                            <?php foreach ($kategori->result() as $data) { ?>
							<li class="p-t-4">
								<a href="#" class="s-text13">
									<?php echo $data->jenis_barang?>
								</a>
							</li>
                            <?php }?>
						</ul>

						<!--  -->
						

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div>

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
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Default Sorting</option>
									<option>Popularity</option>
									<option>Price: low to high</option>
									<option>Price: high to low</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Price</option>
									<option>$0.00 - $50.00</option>
									<option>$50.00 - $100.00</option>
									<option>$100.00 - $150.00</option>
									<option>$150.00 - $200.00</option>
									<option>$200.00+</option>

								</select>
							</div>
						</div>

					
					</div>

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
		
					</div>
				</div>
			</div>
		</div>
    </section>
    <script>
    
    </script>