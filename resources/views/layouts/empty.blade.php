<!DOCTYPE html>
<html lang="en">

	<head>
		@yield('meta_data')
	{{-- @include('site.include.head') --}}
	<link rel="stylesheet" href="{{ asset('panel/admin/css/app.css') }}">

	<script>
		$('#test').on('click', function(e){
			e.PreventDefault();
		})
	</script>
	</head>

	<body>
		<div id="23456">
			<!-- initiate header-->
		
				<div class="main-content pl-0 ">
					@yield('content')
				</div>
				 <!-- Back to top -->
				<a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
				
		</div>
		<!-- initiate scripts-->
		{{-- @include('site.include.script')	` --}}
		@stack('script')
	</body>

</html>