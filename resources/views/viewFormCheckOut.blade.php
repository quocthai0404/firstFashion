@extends('layout')
@section('title', 'Check Out')
@section('content')
@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif
@if(session('successSignUp'))
<script>
    alert("{{ session('successSignUp') }}");
</script>
@endif

@php $subTotal = 0 @endphp
    @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $subTotal += $details['price'] * $details['quantity'] @endphp
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


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
    @if(session('cart'))
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class=" bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                        <form method="post" action="{{route('doneOrder')}}">
                            @csrf
                            <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Checkout    
                            </h4>
                            @if(Auth::check())
                                <input type="hidden" value="{{Auth::user()->id}}" name="userId">
                                <input type="hidden" value="{{$subTotal}}" name="subTotal">
                                <input type="hidden" value="{{$fax}}" name="fax">
                                <input type="hidden" value="{{$total}}" name="total">
                                <input type="hidden" value="{{$shipping}}" name="shipping">
                            @endif
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="userFullname" placeholder="Your FullName">
                                <img class="how-pos4 pointer-none" src="images/icons/user_icon.png" alt="ICON">
                            </div>

                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="userPhoneNumber" minlength="10" maxlength="10" 
                                placeholder="Your Phone Number"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                <img class="how-pos4 pointer-none" src="images/icons/password.png" alt="ICON">
                            </div>
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="userAddress" placeholder="Your Address">
                                <img class="how-pos4 pointer-none" src="images/icons/address3.png" alt="ICON">
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
                                Done
                            </button>
                        </form>
                    </div>


                </div>
            </div>


            
			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					<div class="flex-w flex-t p-b-5">
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




					<div class="flex-w flex-t p-t-15 p-b-1">
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

				</div>
			</div>
			
			
			


        </div>
        @endif
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
    $(".js-select2").each(function() {
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>

</html>
@endsection