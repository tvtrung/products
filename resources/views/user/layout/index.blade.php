<!DOCTYPE html>
<html lang="vi">
<head>
	<noscript>
	   <meta http-equiv="refresh" content="0;url={{route('page.noscript')}}">
	</noscript>
	@include('user.layout.style')
	{!! isset($ConfigsTextAdvanced['text_head']) && $ConfigsTextAdvanced['text_head'] != null ? $ConfigsTextAdvanced['text_head'] : null !!}
</head>
<body>
	{!! isset($ConfigsTextAdvanced['text_body']) && $ConfigsTextAdvanced['text_body'] != null ? $ConfigsTextAdvanced['text_body'] : null !!}
	@include('user.layout.header')
	@yield('content')
	@include('user.layout.footer')
	@include('user.layout.script')
	@yield('script')
	{!! isset($ConfigsTextAdvanced['text_footer']) && $ConfigsTextAdvanced['text_footer'] != null ? $ConfigsTextAdvanced['text_footer'] : null !!}
</body>
</html>