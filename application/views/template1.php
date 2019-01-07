<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/member/')?>images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/member/')?>css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
        <!-- Header desktop -->
        
        <?php
            if (isset($_SESSION['userdata']))
                {
                    include 'headerlogin.php';
                }
            else
                {
                    include 'headernologin.php';
                }
         ?>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="<?php echo base_url('assets/member/')?>images/icons/Ajeng.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="<?php echo base_url('assets/member/')?>images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="<?php echo base_url('assets/member/')?>images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url('assets/member/')?>images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url('assets/member/')?>images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url('assets/member/')?>images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
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
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.html">Home</a>
						<ul class="sub-menu">
							<li><a href="index.html">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.html">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Slide1 -->
    <?php echo $contents; ?>

	<!-- Shipping -->
	

	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="<?php echo base_url('assets/member/')?>images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="<?php echo base_url('assets/member/')?>images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="<?php echo base_url('assets/member/')?>images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="<?php echo base_url('assets/member/')?>images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="<?php echo base_url('assets/member/')?>images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets/member/')?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets/member/')?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets/member/')?>vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/member/')?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets/member/')?>vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets/member/')?>vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/member/')?>js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets/member/')?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets/member/')?>vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets/member/')?>vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/member/')?>js/main.js"></script>

</body>
</html>
<script>
total();
pending();
   var rest=[];
		function addtocart(id,user)
		{ 
			    var qty = $("#jml"+id+"").val();
				if(user=='true')
					{
						$.ajax({
						url  :"<?php echo base_url('penjualan/post_penjualan');?>",
						type : 'POST',
						data : {
							id_barang : id,
							jml : qty
						},
						success : function(data)
						{ 
							total();
							alert('Success Add to Cart');
						}
					});

					}
					else
					{
						$.ajax({
						url  :"<?php echo base_url('penjualan/poscartpending');?>",
						type : 'POST',
						data : {
							id_barang : id,
							jml: qty
						},
						success : function(data)
						{
							var cart=JSON.parse(data);
							var count = Object.keys(cart).length;
						totalpending(count);
						totalcartpending(cart);
						alert('Success Add to Cart');
						}
					});	
					}
			
              
		}
// function getstok(id)
// {
// 	$.ajax({
//                 url  :"<?php echo base_url('penjualan/stokbarang');?>",
//                 type : 'POST',
//                 data : {
//                     id_barang : id
//                 },
//                 success : function(data)
//                 {  // console.log(data);
// 				    if (data<=0)
// 					{
// 						$('#addto'+id+'').attr('hidden');
// 					}
// 					else
// 					{
// 						$('#addto'+id+'').removeAttr('hidden');	
// 					}
// 					 $('#stok'+id+'s').html('Stok Saat ini : '+data+'');
// 					 $('#stok'+id+'j').val(data);
//                 }
//             });	
// }
function pending()
{
	$.ajax({
                url  :"<?php echo base_url('penjualan/getchartpending');?>",
                type : 'POST',
               
                success : function(data)
                {
					 var cart=JSON.parse(data);
					 var count = Object.keys(cart).length;
			      totalpending(count);
				  totalcartpending(cart);
                }
            });	
}
function total()
{
	$.ajax({
        url:"<?php echo base_url('penjualan/get_totalchart');?>",
        type : "get",
        success : function(data)
        {             	
                $("#cartpending").html(
                    data
                );
             cart();
        
       
        }
    });
}


function cart()
{
	$.ajax({
        url:"<?php echo base_url('penjualan/cart');?>",
        type : "get",
        success : function(data)
        { if(data)
		   {
			var total=0;
			var cart = $.parseJSON(data);
			$("#cartdetail").empty();
			for (var i=0 ; i< cart.length;i++)
			{
                $("#cartdetail").append(
                    '<ul class="header-cart-wrapitem">'+
								'<li class="header-cart-item">'+
									'<div class="header-cart-item-img">'+
										'<img style="height: 80px;width: 80px;" src="<?php echo base_url("assets/")?>img_product/'+cart[i]['foto']+'" alt="IMG">'+
									'</div>'+

									'<div class="header-cart-item-txt">'+
										'<a href="#" class="header-cart-item-name">'+
										cart[i]['nama_barang']+
										'</a>'+

										'<span class="header-cart-item-info">'+
											+cart[i]['jumlah']+' x '+cart[i]['harga']+
										'</span>'+
									'</div>'+
								'</li>'+

							'</ul>'
			
                );

				total=total+cart[i]['jumlah']*+cart[i]['harga'];
			}

			$("#cartdetail").append(
			   '<div class="header-cart-total">'+
								'Total: Rp '+total+
							'</div>'+

							'<div class="header-cart-buttons">'+
								'<div class="header-cart-wrapbtn">'+

									'<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">'+
										'View Cart'+
									'</a>'+
								'</div>'+

								'<div class="header-cart-wrapbtn">'+

									'<button onclick="cek()" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">'+
										'Check Out'+
									'</button>'+
								'</div>'+
							'</div>'
			);
        
		   }

        }
    });

}

function cek()
{
	window.location="<?php echo base_url().'penjualan/cartdetail'?>";
}

function cekout()
 {
    var total = parseInt($("#totalplusongkir").val());
    if(total<=0 || total=='NaN'){
        alert("Tidak ada barang yg akan dibeli")
    }
    else
    {
        $.ajax({
        url  :"<?php echo base_url('penjualan/updatepenjualan');?>",
        type : 'POST',
        data : {
            total : total
        },
         success : function(data)
        {
			var validate = $.parseJSON(data);
           console.log(validate);
			if(validate.length>0)
			{
				var error="";
				for (var i=0 ; i<validate.length ; i++)
				{
					error=error+validate[i]['nama_barang']+' '+validate[i]['Error']+"\n";
				}
				if(validate.length==validate[0]['totalitem'])
				{
				alert(error);
				
				$.ajax({
					url  :"<?php echo base_url('penjualan/bataltransaksi');?>",
					type : 'POST',
					data : {
						id : validate[0]['id']
					},
					success : function(data)
					{
						alert("Stok untuk semua barang yang anda pesan tidak mencukupi \nPesanan Dibatalkan.");
						window.location="<?php echo base_url().'penjualan'?>";
					}
				});
				}
				else
				{
				alert(error);
				alert("Barang ready stok berhasil dimasukan pada pesanan anda.\nTerima Kasih Sudah Berbelanja di Ajeng Shop");
				window.location="<?php echo base_url().'penjualan'?>";
				}
				
			}
			else
			{
				alert("Terima Kasih Sudah Berbelanja di Ajeng Shop");
				window.location="<?php echo base_url().'penjualan'?>";
			}
         
          
        }
     })
    }
    
}
var data2; 
function totalpending(count)
{
	$("#cartpending1").html(
		count
	);        
}
function totalcartpending(data)
{
	       var total=0;
			//console.log(data);
			$("#cartdetail").empty();
			for (var cart in data)
			{
                $("#cartdetail").append(
                    '<ul class="header-cart-wrapitem">'+
								'<li class="header-cart-item">'+
									'<div class="header-cart-item-img">'+
										'<img style="height: 80px;width: 80px;" src="<?php echo base_url("assets/")?>img_product/'+data[cart]['foto']+'" alt="IMG">'+
									'</div>'+

									'<div class="header-cart-item-txt">'+
										'<a href="#" class="header-cart-item-name">'+
										data[cart]['nama']+
										'</a>'+

										'<span class="header-cart-item-info">'+
											+data[cart]['jml']+' x '+data[cart]['hrg']+
										'</span>'+
									'</div>'+
								'</li>'+

							'</ul>'
			
                );

				total=total+data[cart]['jml']*+data[cart]['hrg'];
			}
              data2= JSON.stringify(data);
			$("#cartdetail").append(
			   '<div class="header-cart-total">'+
								'Total: Rp '+total+
							'</div>'+

							'<div class="header-cart-buttons">'+
								

								'<div class="header-cart-wrapbtn">'+

									'<button onclick="cekoutpending('+total+')" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" style="position:absolute;">'+
										'Check Out'+
									'</button>'+
								'</div>'+
							'</div>'
			);
}         


function cekoutpending(total)
 {
    console.log(data2);
	var cekout= JSON.parse(data2);
	window.location="<?php echo base_url()?>authuser/logincekout";

    
 }
 function enabledcek(id)
		{
		 var ceked=$("#cek"+id+"");
		
			   if(ceked.is(':checked'))
			   {
				$("#left"+id+"").removeAttr('disabled');
				$("#right"+id+"").removeAttr('disabled');
			   }
			   else{
				$("#left"+id+"").attr('disabled','disabled');
				$("#right"+id+"").attr('disabled','disabled');
				$("#jml"+id+"").val('1');
			   }
		}
total();
get_city();


</script>
