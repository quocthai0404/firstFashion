@extends('layout')
@section('title', 'Product Detail')
@section('content')
@if(session('success'))
<script>
	alert("{{ session('success') }}");
</script>
@endif

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
			Men
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Lightweight Jacket
		</span>
	</div>
</div>


<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-7 p-b-30">
				<div class="p-l-25 p-r-30 p-lr-0-lg">
					<div class="wrap-slick3 flex-sb flex-w">
						<div class="wrap-slick3-dots"></div>
						<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

						<div class="slick3 gallery-lb">
							<div class="item-slick3" data-thumb="{{ asset('images/' . $product->product_src) }}">
								<div class="wrap-pic-w pos-relative">
									<img src="{{ asset('images/' . $product->product_src) }}" alt="IMG-PRODUCT">

									<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('images/' . $product->product_src) }}">
										<i class="fa fa-expand"></i>
									</a>
								</div>
							</div>
							@foreach($photos as $photo)
							<div class="item-slick3" data-thumb="{{ asset('images/product_photos/' . $photo->photo_src) }}">
								<div class="wrap-pic-w pos-relative">
									<img src="{{ asset('images/product_photos/' . $photo->photo_src) }}" alt="IMG-PRODUCT">

									<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('images/product_photos/' . $photo->photo_src) }}">
										<i class="fa fa-expand"></i>
									</a>
								</div>
							</div>
							@endforeach




						</div>
					</div>
				</div>
			</div>
			@php

			$brandMap = [
			1 => 'H&M',
			2 => 'Dickies',
			3 => 'Tiffany',
			4 => 'Vans'

			];
			$catMap = [
			1 => 'Pants',
			2 => 'Shirts',
			3 => 'Outerwears',
			4 => 'Shorts',
			5 => 'Watch',
			6 => 'Ear Ring',
			7 => 'Ring'

			];
			$brandName = isset($brandMap[$product->brand_id]) ? $brandMap[$product->brand_id] : 'Unknown';
			$CatName = isset($catMap[$product->cat_id]) ? $catMap[$product->cat_id] : 'Unknown';
			@endphp

			<div class="col-md-6 col-lg-5 p-b-30">
				<div class="p-r-50 p-t-5 p-lr-0-lg">
					<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						{{ $product->product_name }}
						<input type="hidden" name="user_id" id="user_id" value="">
					</h4>

					<span class="mtext-106 cl2">
						{{ $product->price }} $

					</span>

					<p class="stext-102 cl3 p-t-23">
						{{ $product->description }}

					</p>

					<!--  -->
					<div class="p-t-33">

						<div class="flex-w flex-r-m p-b-10">
							<div class="size-204 flex-w flex-m respon6-next">

								<form action="{{ route('add_to_cart', $product->id) }}" method="post">
									@csrf

									<div class="wrap-num-product flex-w m-r-20 m-tb-10">

										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>



									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" type="submit">
										Add To Cart
									</button>
								</form>
							</div>
							<br>
							<div style="padding-top: 10px;" class="size-204 flex-w flex-m respon6-next">
								<button class="flex-c-m stext-101 cl0 size-101 bg10 bor1 hov-btn1 p-lr-15 trans-04" id="compareButton" data-product-id="{{ $product->id }}">
									Compare
								</button>
							</div>

						</div>
					</div>

					<!--  -->
					<div class="flex-w flex-m p-l-100 p-t-40 respon7">

						<div class="flex-m bor9 p-r-10 m-r-11">
							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
								<i class="zmdi zmdi-favorite"></i>
							</a>
						</div>

						<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
							<i class="fa fa-google-plus"></i>
						</a>

					</div>

				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50 hidden-table" id="compareTable">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<thead>
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3"></th>

								</tr>
							</thead>




							<tbody>


							</tbody>


						</table>
					</div>


				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50 hidden-table" id="compareTableSelected">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table table-borderless">
							<thead class="thead-dark">
								<tr class="table-success">
									<th class="column-1" style="width: 150px;"></th>
									<th style="width: 350px; vertical-align: top;"><span id="infoProduct1Name" style="color: black; font-size: 20px;"></span></th>
									<th style="width: 250px; vertical-align: top;"><span id="infoProduct2Name" style="color: black; font-size: 20px;"></span></th>

								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="column-1" style="font-size:15px; color: black; font-weight: bold;">Photo: </td>
									<td ><span id="infoProduct1Src"></span></td>
									<td ><span id="infoProduct2Src"></span></td>
									
								</tr>
								
								<tr>
									<td class="column-1" style="font-size:15px; color: black; font-weight: bold;">Product Brand: </td>
									<td><span id="infoProduct1Brand"></span></td>
									<td><span id="infoProduct2Brand"></span></td>
									
								</tr>
								<tr>
									<td class="column-1" style="font-size:15px; color: black; font-weight: bold;">Product Category: </td>
									<td><span id="infoProduct1Category"></span></td>
									<td><span id="infoProduct2Category"></span></td>
									
								</tr>
								<tr>
									<td class="column-1" style="font-size:15px; color: black; font-weight: bold;">Product Price: </td>
									<td><span id="infoProduct1Price"></span></td>
									<td><span id="infoProduct2Price"></span></td>
									
								</tr>
								<tr>
									<td class="column-1" style="font-size:15px; color: black; font-weight: bold;">Product Gender: </td>
									<td><span id="infoProduct1Gender"></span></td>
									<td><span id="infoProduct2Gender"></span></td>
									
								</tr>
								<tr>
									<td class="column-1" style="font-size:15px; color: black; font-weight: bold;">Product Description: </td>
									<td><span id="infoProduct1Description"></span></td>
									<td><span id="infoProduct2Description"></span></td>
									
								</tr>
								<tr>
									<td colspan="3"  style="text-align: center;"><button class="flex-c-m stext-101 cl0 size-101 bg10 bor1 hov-btn1 p-lr-15 trans-04" id="close">Close</button></td>
								</tr>
								
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>



	</div>


</section>


<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
	<div class="container">
		<div class="p-b-45">
			<h3 class="ltext-106 cl5 txt-center">
				Related Products
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">

				@foreach($productRelates as $productRelate)
				<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('images/' . $productRelate->product_src) }}" alt="IMG-PRODUCT">


						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{route('detailProduct', $productRelate->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">

									{{$productRelate->product_name}}
								</a>

								<span class="stext-105 cl3">
									{{$productRelate->price}} $
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src=" {{ asset('images/icons/icon-heart-01.png') }}" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src=" {{ asset('images/icons/icon-heart-02.png') }}" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach


			</div>
		</div>
	</div>
</section>


<!-- Footer -->
@include('include.footer')


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="zmdi zmdi-chevron-up"></i>
	</span>
</div>

<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
	<div class="overlay-modal1 js-hide-modal1"></div>

	<div class="container">
		<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
			<button class="how-pos3 hov3 trans-04 js-hide-modal1">
				<img src=" {{ asset('images/icons/icon-close.png') }}" alt="CLOSE">
			</button>

			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb=" {{ asset('images/product-detail-01.jpg') }}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset('images/product-detail-01.jpg') }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('images/product-detail-01.jpg') }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="  {{ asset('images/product-detail-02.jpg') }}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset('images/product-detail-02.jpg') }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('images/product-detail-02.jpg') }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb=" {{ asset('images/product-detail-03.jpg') }}">
									<div class="wrap-pic-w pos-relative">
										<img src=" {{ asset('images/product-detail-03.jpg') }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href=" {{ asset('images/product-detail-03.jpg') }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							Lightweight Jacket
						</h4>

						<span class="mtext-106 cl2">
							$58.79
						</span>

						<p class="stext-102 cl3 p-t-23">
							Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
						</p>

						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Size S</option>
											<option>Size M</option>
											<option>Size L</option>
											<option>Size XL</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Red</option>
											<option>Blue</option>
											<option>White</option>
											<option>Grey</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Add to cart
									</button>
								</div>
							</div>
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--===============================================================================================-->
<script src=" {{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src=" {{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src=" {{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src=" {{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src=" {{ asset('vendor/select2/select2.min.js') }}"></script>
<script>
	$(".js-select2").each(function() {
		$(this).select2({
			minimumResultsForSearch: 20,
			dropdownParent: $(this).next('.dropDownSelect2')
		});
	})
</script>
<!--===============================================================================================-->
<script src=" {{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src=" {{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src=" {{ asset('vendor/slick/slick.min.js') }}"></script>
<script src=" {{ asset('js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
<script>
	$('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src=" {{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
<script>
	$('.gallery-lb').each(function() { // the containers for all your galleries
		$(this).magnificPopup({
			delegate: 'a', // the selector for gallery item
			type: 'image',
			gallery: {
				enabled: true
			},
			mainClass: 'mfp-fade'
		});
	});
</script>
<!--===============================================================================================-->
<script src=" {{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
<script src=" {{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
<script>
	$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
		e.preventDefault();
	});

	$('.js-addwish-b2').each(function() {
		var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
		$(this).on('click', function() {
			swal(nameProduct, "is added to wishlist !", "success");

			$(this).addClass('js-addedwish-b2');
			$(this).off('click');
		});
	});

	$('.js-addwish-detail').each(function() {
		var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

		$(this).on('click', function() {
			swal(nameProduct, "is added to wishlist !", "success");

			$(this).addClass('js-addedwish-detail');
			$(this).off('click');
		});
	});

	/*---------------------------------------------*/

	$('.js-addcart-detail').each(function() {
		var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
		$(this).on('click', function() {
			swal(nameProduct, "is added to cart !", "success");
		});
	});
</script>
<!--===============================================================================================-->
<script src=" {{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script>
	$('.js-pscroll').each(function() {
		$(this).css('position', 'relative');
		$(this).css('overflow', 'hidden');
		var ps = new PerfectScrollbar(this, {
			wheelSpeed: 1,
			scrollingThreshold: 1000,
			wheelPropagation: false,
		});

		$(window).on('resize', function() {
			ps.update();
		})
	});
</script>
<!--===============================================================================================-->
<script src=" {{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
	document.getElementById('compareButton').addEventListener('click', function() {
		const productId = this.getAttribute('data-product-id');

		axios.get(`/get-related-products/${productId}`)
			.then(response => {
				const product = response.data;
				const compareTable = document.getElementById('compareTable');
				const tbody = compareTable.querySelector('tbody');
				tbody.innerHTML = '';

				product.forEach(item => {
					const row = document.createElement('tr');
					row.classList.add("table_row");
					const assetPath = `../images/${item.product_src}`;
					row.innerHTML = `
						<td class="column-1"><img src="${assetPath}" alt="${item.product_name}" width="60" height="90"></td>
						<td class="column-2">${item.product_name}</td>
						<td class="column-3"><button 
								class=" compareButtonSelected flex-c-m stext-101 cl0 size-101 bg10 bor1 hov-btn1 p-lr-15 trans-04"
								data-productList-id="${item.id}">
								Compare
								</button>
						</td>
					`;
					tbody.appendChild(row);
				});

				compareTable.classList.remove('hidden-table');
				const compareButtons = document.querySelectorAll('.compareButtonSelected');
				compareButtons.forEach(button => {
					button.addEventListener('click', function() {
						const compareTableSelected = document.getElementById('compareTableSelected');
						compareTable.classList.add('hidden-table');
						compareTableSelected.classList.remove('hidden-table');

						const idItemSelected = this.getAttribute('data-productList-id');
						console.log(idItemSelected);
						const product1 = product.find(i => i.id == productId);
						const product2 = product.find(i => i.id == idItemSelected);
						console.log(product1);
						console.log(product2);
						const brands = [
							{ id: 1, name: 'H&M' },
							{ id: 2, name: 'Dickies' },
							{ id: 3, name: 'Tiffany' },
							{ id: 4, name: 'Vans' }
						];
						const categories = [
							{ id: 1, name: 'Pants' },
							{ id: 2, name: 'Shirts' },
							{ id: 3, name: 'Outerwear' },
							{ id: 4, name: 'Shorts' }
						];

						
						
						if (product1.gender==1) {
							product1.gender = "For Men";
							product2.gender = "For Men";
						}else{
							product1.gender = "For Women";
							product2.gender = "For Women";
						}
						const brand = brands.find(brand => brand.id === product1.brand_id);
						if (brand) {
							product1.brand_id = brand.name;
						}

						
						const category = categories.find(category => category.id === product1.cat_id);
						if (category) {
							product1.cat_id = category.name;
							product2.cat_id = category.name;
						}

						const brand2 = brands.find(brand => brand.id === product2.brand_id);
						if (brand2) {
							product2.brand_id = brand2.name;
						}
						console.log(product1);
						console.log(product2);


						
						document.getElementById('infoProduct1Name').innerHTML= product1.product_name;
						const imgElement = document.createElement('img');
						const pathImg1=  `../images/${product1.product_src}`;
						imgElement.src = pathImg1;
						imgElement.style.width = '60px';
						imgElement.style.height = '90px';
						imgElement.style.border = '1px solid #ccc';
						infoProduct1Src.appendChild(imgElement);
						document.getElementById('infoProduct1Brand').innerHTML= product1.brand_id;
						document.getElementById('infoProduct1Category').innerHTML= product1.cat_id;
						document.getElementById('infoProduct1Price').innerHTML= product1.price;
						document.getElementById('infoProduct1Gender').innerHTML= product1.gender;
						document.getElementById('infoProduct1Description').innerHTML= product1.description;


						document.getElementById('infoProduct2Name').innerHTML= product2.product_name;
						const imgElement2 = document.createElement('img');
						const pathImg2=  `../images/${product2.product_src}`;
						imgElement2.src = pathImg2;
						imgElement2.style.width = '60px';
						imgElement2.style.height = '90px';
						imgElement2.style.border = '1px solid #ccc';
						infoProduct2Src.appendChild(imgElement2);
						document.getElementById('infoProduct2Brand').innerHTML= product2.brand_id;
						document.getElementById('infoProduct2Category').innerHTML= product2.cat_id;
						document.getElementById('infoProduct2Price').innerHTML= product2.price;
						document.getElementById('infoProduct2Gender').innerHTML= product2.gender;
						document.getElementById('infoProduct2Description').innerHTML= product2.description;


						document.getElementById('close').addEventListener('click', function(){
							compareTableSelected.classList.add('hidden-table');
							const infoProduct1Src = document.getElementById('infoProduct1Src');
    						infoProduct1Src.innerHTML = '';
							const infoProduct2Src = document.getElementById('infoProduct2Src');
    						infoProduct2Src.innerHTML = '';

						});
					});
				});



				
			})
			.catch(error => {
				console.error(error);
			});
		
	});

	
</script>

</body>

</html>
@endsection