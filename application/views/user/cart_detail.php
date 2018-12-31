

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th style="width:15%;" class="column-2">Product</th>
							<th class="column-3">Harga</th>
							<th style="width:10%;"class="column-4 p-l-70">Jumlah</th>
                            <th class="column-5" >Total</th>
                            <th style="width:10%;"class="column-6">Delete</th>
						</tr>
                        <?php $totalsemua=0; foreach ($cartdetail->result() as $r) { ?>
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?php echo base_url('assets/img_product/').$r->foto?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><?php echo $r->nama_barang?></td>
							<td class="column-3">Rp <?php echo $r->harga?></td>
							<td class="column-4" >
							<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input readonly id="jml<?php echo $r->id_detail?>" class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="<?php echo $r->jumlah?>">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>														
							</td>
                            <td class="column-5">Rp <?php $total=$r->jumlah*$r->harga; echo $total?></td>
                            <td class="column-5" style="display:flex;margin: 45px 0px 10px 0px;">
								<button  onclick="updatecart('<?php echo $r->id_detail?>')" class="btn btn-primary hov s-text1 trans-0-4">
                                UPDATE
								</button>
								||
                                <button  onclick="deletecart('<?php echo $r->id_detail?>')" class="btn btn-danger hov s-text1 trans-0-4">
                                Delete
                                </button>
                            </td>
                        </tr>
                        <?php $totalsemua=$totalsemua+$total; }?>
					</table>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>
                    <input id="hidetotal" hidden value=" <?php echo $totalsemua?>">
					<span class="m-text21 w-size20 w-full-sm">
                    Rp <?php echo $totalsemua?>
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							There are no shipping methods available. Please double check your address, or contact us if you need any help.
						</p>

						<span class="s-text19">
							Calculate Shipping
						</span>

						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select style="width: 100%;" id="province_destination"  class="selection-2" name="province_destination"  onchange="get_city_destination(this);">
								
							</select>
						</div>

						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select style="width: 100%;" id="city_destination"  class="selection-2" name="city_destination">
							<option value=''>Pilih Kota</option>
							</select>
						</div>

						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select  style="width: 100%;" name="courier" id="courier">
								<option value="">Pilih Kurir</option>
								<option value="jne">JNE</option>
								<option value="tiki">TIKI</option>
								<option value="pos">POS</option>
							</select>
						</div>

						<div class="size14 trans-0-4 m-b-10">
							<!-- Button -->
							<button onclick="get_cost('501',city_destination.value,courier.value)" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Update Totals
							</button>
						</div>
					</div>
				</div>
				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span id="totalsemuanya" class="m-text21 w-size20 w-full-sm">
                    Rp <?php echo $totalsemua?>
					</span>
					<input hidden id="totalplusongkir" value="<?php echo $totalsemua?>">
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button onclick="cekout()" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>
				</div>
			</div>
		</div>
    </section>
    
    <script>

        function deletecart(id)
        {

           
            $.ajax({
                url  :"<?php echo base_url('penjualan/hapusdetail');?>",
                type : 'POST',
                data : {
                    id : id
                },
                success : function(data)
                {
                   window.location="<?php echo base_url().'penjualan/cartdetail'?>"
                }
            })
        }

		function updatecart(id)
        {

			var jml = $("#jml"+id+"").val();
            $.ajax({
                url  :"<?php echo base_url('penjualan/updatedetail');?>",
                type : 'POST',
                data : {
                    id : id,
					jml : jml
                },
                success : function(data)
                {
                   window.location="<?php echo base_url().'penjualan/cartdetail'?>"
                }
            })
        }

		function get_city()
		{
		$.ajax({
				url  :"<?php echo base_url('apiongkir/province');?>",
				type : 'POST',
				success : function(data)
				{

				var all_province = $.parseJSON(data);
				$("#province_destination").html("<option value=''>Pilih Provinsi</option>");
						$.each(all_province['rajaongkir']['results'], function (key, value) {
							$("#province_destination").append(
								"<option value='" + value.province_id + "'>" + value.province + "</option>"
							);
						});
				}
		})
		}

		function get_city_destination(sel)
		{
		$.ajax({
				url  :"<?php echo base_url('apiongkir/city');?>",
				type : 'POST',
				data : {id: sel.value},
				success : function(data)
				{
				var get_city = $.parseJSON(data);
				$("#city_destination").html("<option value=''>Pilih Kota</option>");
						$.each(get_city['rajaongkir']['results'], function (key, value) {
							$("#city_destination").append(
								"<option value='" + value.city_id + "'>" + value.type + " - " + value.city_name + "</option>"
							);
						});
				}
		})
		}

		function get_cost(city_origin, city_destination, courier) {

		console.log(city_origin);
		console.log(city_destination);
		console.log(courier);
		if(city_destination != '' && courier != '') {
			console.log('here');
		$.ajax({
		url  :"<?php echo base_url('apiongkir/cost');?>",
		type : 'POST',
		data : {
			city_origin : city_origin,
			city_destination : city_destination ,
			weight : 1 ,
			courier : courier
		},
		success : function(data)
		{
		var cost = $.parseJSON(data);   
					if(cost['rajaongkir']['results'][0]['costs'].length > 0) {
						$.each(cost['rajaongkir']['results'][0]['costs'], function(key, value) {
							pilihongkir(value.cost[0]['value'],courier)
						});
					}
				
		
		}
		})
		}
		}
		function pilihongkir(pilih,kurir) {
			if(pilih=="")
			{
				alert('Pengiriman Tidak Terjangkau')
			}
			else
			{
				var total=0;
				total = parseInt($('#hidetotal').val());
				pilih = parseInt(pilih);
				total = total+pilih ;
				$('#totalsemuanya').html('Rp '+total);
				$('#totalplusongkir').val(total);
			}
		
		}
    </script>