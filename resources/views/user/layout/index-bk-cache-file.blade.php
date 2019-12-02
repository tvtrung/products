@if(isset($slug))
<?php
	$slug = isset($slug) ? $slug : '-';
	$cacheFile = 'cache-html/'.$slug.'.html';
	$cacheTime = 86400*24*365;
	if(file_exists($cacheFile) && $cacheTime > time() - filectime($cacheFile)){
		include $cacheFile;
	}else{
		ob_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	{{-- <noscript>
	   <meta http-equiv="refresh" content="0;url={{route('page.noscript')}}">
	</noscript> --}}
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
<?php
	file_put_contents($cacheFile, ob_get_contents());
	ob_end_flush();
	}
?>
@else
<!DOCTYPE html>
<html lang="vi">
<head>
	{{-- <noscript>
	   <meta http-equiv="refresh" content="0;url={{route('page.noscript')}}">
	</noscript> --}}
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
@endif