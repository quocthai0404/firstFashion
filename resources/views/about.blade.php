
@extends('layout')
@section('title', 'About Us')
@section('content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			About
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Story
						</h3>

						<p class="stext-113 cl6 p-b-26">
							We are a team of passionate fashion lovers who want to share our style and tips with the world.
						</p>

						<p class="stext-113 cl6 p-b-26">
							Are you looking for a reputable, quality and stylish fashion store? Come to FirstFashion, where you can find a variety of beautiful and suitable fashion products for all ages, preferences and budgets.
						</p>
						<p class="stext-113 cl6 p-b-26">
							FirstFashion is an online fashion store, founded in 2023 by a group of talented and passionate young designers. We always update the latest fashion trends and bring to customers high-quality, durable and comfortable products.						
						</p>
						<p class="stext-113 cl6 p-b-26">
							At FirstFashion, you can find different types of fashion products, from clothing, shoes, bags, accessories to perfume, cosmetics and jewelry. You can also choose from famous brands.
						</p>
						<p class="stext-113 cl6 p-b-26">
							Don’t miss the opportunity to own amazing fashion products from FirstFashion. Visit the website https://firstfashion.com.vn/ now to explore and shop to your heart’s content. FirstFashion - The number one fashion store for you!
						</p>
						<p class="stext-113 cl6 p-b-26">
							Any questions? Let us know in store at 35/6 D5 Street, Ward 25, Binh Thanh, Ho Chi Minh City 72308, Vietnam or call us on (+84) 12345678
						</p>

					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/about-01.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Mission
						</h3>

						<p class="stext-113 cl6 p-b-26">
							The fashion we bring caters to the age group of 20-40 years old. With a variety of clothing items, we will help you have the most attractive and radiant appearance. Our main fashion style is active, sporty, and suitable for outdoor activities, helping users to move comfortably and participate in outdoor activities in the most dynamic way.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
							</p>

							<span class="stext-111 cl8">
								- Trinh Bao's
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/about-02.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
		

@include('include.footer')
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
</body>
</html>
@endsection


	