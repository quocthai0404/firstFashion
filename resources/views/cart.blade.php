
@extends('layout')
@section('title', 'Shopping Cart')
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

		<span class="stext-109 cl4">
			Shoping Cart
		</span>
	</div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2"></th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
							</tr>

							

							@php $subTotal = 0 @endphp
							@if(session('cart'))
							@foreach(session('cart') as $id => $details)
							@php $subTotal += $details['price'] * $details['quantity'] @endphp
							<tr data-id="{{ $id }}" class="table_row">
								<td data-th="Product" class="column-1">
									<div class="how-itemcart1">
										<img src="{{ asset('images') }}/{{ $details['product_src'] }}">

									</div>
								</td>
								<td class="column-2">{{ $details['product_name'] }}</td>
								<td class="column-3" data-th="Price">$ {{ $details['price'] }}.00</td>
								<td data-th="Quantity" class="column-4">
									<input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1">

								</td>
								<td data-th="Subtotal" class="column-5">
									$ {{ $details['price'] * $details['quantity'] }}.00 &nbsp; <button class="btn btn-dark btn-sm cart_remove"><i class="fa fa-trash"></i></button>
								</td>



							</tr>
							@endforeach
							@php
							$fax = $subTotal/10;
							$shipping = 20;
							if($subTotal>500){
							$shipping=0;
							}
							$total = $subTotal+$fax+$shipping;
							@endphp
							@endif
						</table>
					</div>


				</div>
			</div>

			
			@if(session('cart'))
			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					<div class="flex-w flex-t  p-b-5">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								${{$subTotal}}.00
							</span>
						</div>

					</div>
					<div class="flex-w flex-t  p-b-5">

						<div class="size-208">
							<span class="stext-110 cl2">
								Fax:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								${{$fax}}
							</span>
						</div>
					</div>
					<div class="flex-w flex-t bor12 p-b-5">
						<div class="size-208">
							<span class="stext-110 cl2">
								Shipping:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								${{$shipping}}.00
							</span>
						</div>

					</div>




					<div class="flex-w flex-t p-t-15 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								${{$total}}
							</span>
						</div>
					</div>

						<a href="{{route('viewFormCheckOut')}}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</a>
					
					

				</div>
			</div>
			
			
			@endif
		</div>
	</div>
</form>





<!-- Footer -->
@include('include.footer')


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="zmdi zmdi-chevron-up"></i>
	</span>
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
<script src=" {{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
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
<script type="text/javascript">
   
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>

<!--===============================================================================================-->
<script src=" {{ asset('js/main.js') }}"></script>

</body>

</html>
@endsection
