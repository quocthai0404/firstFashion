
@extends('layout')
@section('title', 'For Men')
@section('content')
<div style="height: 10%;">

</div>
@if(session('success'))
<script>
	alert("{{ session('success') }}");
</script>
@endif

<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m m-tb-10">

				<a href="{{route('productMen')}}">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
						All Products
					</button>
				</a>
				
				@foreach($category as $item)
					
					<a href="{{route('filterCat', $item->id)}}">
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
						{{$item->cat_name}}
						</button>
					</a>
				@endforeach
				
			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
					<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
					<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Filter
				</div>
			</div>

			

			<!-- Filter -->
			<div class="dis-none panel-filter w-full p-t-10">
				<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
					
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Sort By
						</div>

						<form method="get" action="" id="FormId">
							
							<ul>
								<li >
									<input type="radio" name="price_order" value="low_to_high" id="low_to_high" >
									<label for="low_to_high" class="filter-link stext-106 trans-04">Price: Low to High</label>
								</li>

								<li class="p-b-6">
									<input type="radio" name="price_order" value="high_to_low" id="high_to_low">
									<label for="high_to_low" class="filter-link stext-106 trans-04">Price: High to Low</label>
								</li>
							</ul>
								<div class="mtext-102 cl2 p-b-15">
									Category
								</div>
							<ul>	
								<li class="p-b-6">
									<input type="radio" name="category" value="0" id="checkbox_All">
									<label for="checkbox_All" class="filter-link stext-106 trans-04">All</label>
								</li>
								
								<li class="p-b-6">
									<input type="radio" name="category" value="1" id="checkbox_pants">
									<label for="checkbox_pants" class="filter-link stext-106 trans-04">Pants</label>
								</li>

								<li class="p-b-6">
									<input type="radio" name="category" value="2" id="checkbox_shirts">
									<label for="checkbox_shirts" class="filter-link stext-106 trans-04">Shirts</label>
								</li>

								<li class="p-b-6">
									<input type="radio" name="category" value="3" id="checkbox_outerwears">
									<label for="checkbox_outerwears" class="filter-link stext-106 trans-04">Outerwears</label>
								</li>

								<li class="p-b-6">
									<input type="radio" name="category" value="4" id="checkbox_shorts">
									<label for="checkbox_shorts" class="filter-link stext-106 trans-04">Shorts</label>
								</li>
							</ul>

							<button id="buttonRequestSubmit">Filter Products</button>
						</form>

					</div>

					<div class="filter-col2 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Brand
						</div>

						<ul>
							

							
							@foreach($brands as $brand)
					
		
							<li class="p-b-6">
								<a href="{{route('filterBrand', $brand->id)}}" class="filter-link stext-106 trans-04">
									{{$brand->brand_name}}
								</a>
							</li>
							@endforeach

							
						</ul>
					</div>
					

				</div>
			</div>
		</div>
		

		<div class="row isotope-grid">
			@foreach ($products as $product)
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">

				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{ asset('images/' . $product->product_src) }}" alt="IMG-PRODUCT">

						
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="{{route('detailProduct', $product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								{{$product->product_name}}
							</a>

							<span class="stext-105 cl3">
								{{$product->price}} $
							</span>
						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								<img class="icon-heart1 dis-block trans-04" src="{{ asset('images/icons/icon-heart-01.png') }}" alt="ICON">
								<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('images/icons/icon-heart-02.png') }}" alt="ICON">
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach


		</div>

		<div class="flex-c-m flex-w w-full p-t-45">

			{{ $products->links() }}

		</div>
	</div>
</div>


@include('include.footer')


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="zmdi zmdi-chevron-up"></i>
	</span>
</div>



<!--===============================================================================================-->
<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script>
	$(".js-select2").each(function() {
		$(this).select2({
			minimumResultsForSearch: 20,
			dropdownParent: $(this).next('.dropDownSelect2')
		});
	})
</script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
<script>
	$('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
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
<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
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
<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
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
<script src="{{ asset('js/main.js') }}"></script>
<script>
       document.addEventListener("DOMContentLoaded", function () {
        const priceOrderInputs = document.querySelectorAll('input[name="price_order"]');
        const categoryInputs = document.querySelectorAll('input[name="category"]');
        const form = document.getElementById("FormId");

        document.getElementById("buttonRequestSubmit").addEventListener("click", function (event) {
            event.preventDefault();

            let selectedPriceOrder = "";
            let selectedCategory = "";

            priceOrderInputs.forEach(function (input) {
                if (input.checked) {
                    selectedPriceOrder = input.value;
                }
            });

            
            categoryInputs.forEach(function (input) {
                if (input.checked) {
                    selectedCategory = input.value;
                }
            });

            
            console.log("Selected Price Order: " + selectedPriceOrder);
            console.log("Selected Category: " + selectedCategory);
            const newAction = `/filterProduct/${selectedPriceOrder}/${selectedCategory}`;
            
            
            form.action = newAction;
            console.log(newAction);
            
            form.submit();
            
        });
    });

    </script>

</body>

</html>
@endsection

