<?php
use Symfony\Component\HttpFoundation\Request;

?><!-- Back to top -->

		<a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>

		<!-- Jquery js-->
        @if(@$menu == "create-shocking-sales")
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		@else
		<script src="{{tenantAsset().'admin/assets/js/jquery-3.5.1.min.js'}}"></script>
		@endif



		<!-- Bootstrap4 js-->
		<script src="{{tenantAsset().'admin/assets/plugins/bootstrap/popper.min.js'}}"></script>
		{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/cjs/popper.min.js"></script> --}}
		<script src="{{tenantAsset().'admin/assets/plugins/bootstrap/js/bootstrap.min.js'}}"></script>
		{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script> --}}
		<!--Othercharts js-->
		<script src="{{tenantAsset().'admin/assets/plugins/othercharts/jquery.sparkline.min.js'}}"></script>

		<!-- Circle-progress js-->
		<script src="{{tenantAsset().'admin/assets/js/circle-progress.min.js'}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{tenantAsset().'admin/assets/plugins/rating/jquery.rating-stars.js'}}"></script>

		<!--Sidemenu js-->
		<script src="{{tenantAsset().'admin/assets/plugins/sidemenu/sidemenu.js'}}"></script>

		<!-- P-scroll js-->
		<script src="{{tenantAsset().'admin/assets/plugins/p-scrollbar/p-scrollbar.js'}}"></script>
		<script src="{{tenantAsset().'admin/assets/plugins/p-scrollbar/p-scroll1.js'}}"></script>
		<script src="{{tenantAsset().'admin/assets/plugins/p-scrollbar/p-scroll.js'}}"></script>

		@yield('js')
		<!-- Simplebar JS -->
		<script src="{{tenantAsset().'admin/assets/plugins/simplebar/js/simplebar.min.js'}}"></script>
		<!-- Custom js-->
		<script src="{{tenantAsset().'admin/assets/js/custom.js'}}"></script>
                <script src="{{tenantAsset().'admin/assets/js/toastr.min.js'}}"></script>
                <script src="{{ tenantAsset().'admin/assets/js/toastr.min.js' }}"></script>

                <!--  Datatable -->
                <script src="{{tenantAsset().'admin/assets/js/datatable/datatables.min.js'}}"></script>
	<!-- INTERNAL Popover js -->
		<script src="{{tenantAsset().'admin/assets/js/popover.js'}}"></script>

		<!-- INTERNAL Sweet alert js -->

		<script src="{{URL::asset('admin/assets/plugins/sweet-alert/jquery.sweet-modal.min.js')}}"></script>
		<script src="{{URL::asset('admin/assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
		<script src="{{URL::asset('admin/assets/js/sweet-alert.js')}}"></script>
		<script src="{{URL::asset('admin/assets/js/jquery.validate.min.js')}}"></script>
		<!-- INTERNAL Select2 js -->
		<script src="{{URL::asset('admin/assets/plugins/select2/select2.full.min.js')}}"></script>
		<!--INTERNAL telephoneinput js-->
		<script src="{{URL::asset('admin/assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
		<script src="{{URL::asset('admin/assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>


		<script type="text/javascript">
		var base_path = "{{url('/')}}";

	</script>





