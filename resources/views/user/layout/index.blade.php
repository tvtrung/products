<!DOCTYPE html>
<html lang="vi">
<head>
	<noscript>
	   <meta http-equiv="refresh" content="0;url={{route('page.noscript')}}">
	</noscript>
	@include('user.layout.style')
</head>
<body>
	@include('user.layout.header')
	@yield('content')
	@include('user.layout.footer')
	@include('user.layout.script')
	@yield('script')
</body>
</html>