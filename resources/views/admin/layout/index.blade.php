<!DOCTYPE html>
<html>
<head>
	@include ('admin.layout.style')
	@yield('style')
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
	@include ('admin.layout.header')
		<div class="page-container">
			@include ('admin.layout.sidebar')
			@yield('content')
		</div>
	@include ('admin.layout.footer')
	@include ('admin.layout.script')
	@yield('script')
</body>
</html>