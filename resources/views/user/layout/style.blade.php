<meta charset="UTF-8">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="canonical" href="{{URL::current()}}" />
<meta name="robots" content="{{isset($configs_data['seo']['seo-robots'])?$configs_data['seo']['seo-robots']:''}}" />
<meta name="keywords" content="@yield('keywords')" />
<meta name="description" content="@yield('description')" />
<meta name="language" content="vietnamese" />
<meta name="copyright" content="Copyright © 2019 by sieuthilongmi.net" />
<meta name="distribution" content="Global" />
<meta name="author" content="sieuthilongmi.net" />
<meta name="REVISIT-AFTER" content="{{isset($configs_data['seo']['seo-revisit-after'])?$configs_data['seo']['seo-revisit-after']:''}}" />
<meta name="RATING" content="{{isset($configs_data['seo']['seo-rating'])?$configs_data['seo']['seo-rating']:''}}" />
{{--Facebook Like / Share--}}
<meta property="og:title" content="@yield('og_title')">
<meta property="og:description" content="@yield('og_description')">
<meta property="og:image" content="@yield('og_image')">
<meta property="og:url" content="@yield('og_url')">
<meta property="og:type" content="@yield('og_type')">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
@if(isset($ConfigsText['optimize']) && $ConfigsText['optimize'] != 1)
<link rel="stylesheet" type="text/css" href="/style/user/custom/bootstrap-4.0.0/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/style/user/custom/font-awesome-4.7.0/css/font-awesome.min.css">
{{-- <link rel="stylesheet" type="text/css" href="/style/user/custom/font-family/Roboto/font.css" > --}}
<link rel="stylesheet" type="text/css" href="/style/user/custom/menu-mobile/css/webslidemenu.css">
<link rel="stylesheet" type="text/css" href="/style/user/custom/menu-mobile/css/tree-menu.css">
<link rel="stylesheet" type="text/css" href="/style/user/custom/menu-mobile/css/style.css">
@if(false)
<link rel="stylesheet" href="/style/user/custom/owl-carousel/custom.css" >
<link rel="stylesheet" href="/style/user/custom/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="/style/user/custom/owl-carousel/owl.theme.css">
@endif
<link rel="stylesheet" type="text/css" href="/style/user/custom/css/mystyle.css">
@else
<style>
{!! file_get_contents(public_path('/style/user/custom/bootstrap-4.0.0/bootstrap.min.css')) !!}
{!! str_replace('../', '/style/user/custom/font-awesome-4.7.0/', file_get_contents(public_path('/style/user/custom/font-awesome-4.7.0/css/font-awesome.min.css'))) !!}
{{-- {!! str_replace('font/', '/style/user/custom/font-family/Roboto/font/', file_get_contents(public_path('/style/user/custom/font-family/Roboto/font.css'))) !!} --}}
{!! str_replace('../', '/style/user/custom/menu-mobile/', file_get_contents(public_path('/style/user/custom/menu-mobile/css/webslidemenu.css'))) !!}
{!! str_replace('../', '/style/user/custom/menu-mobile/', file_get_contents(public_path('/style/user/custom/menu-mobile/css/tree-menu.css'))) !!}
{!! str_replace('../', '/style/user/custom/menu-mobile/', file_get_contents(public_path('/style/user/custom/menu-mobile/css/style.css'))) !!}
@if(false)
{!! file_get_contents(public_path('/style/user/custom/owl-carousel/custom.css')) !!}
{!! file_get_contents(public_path('/style/user/custom/owl-carousel/owl.carousel.css')) !!}
{!! file_get_contents(public_path('/style/user/custom/owl-carousel/owl.theme.css')) !!}
@endif
{!! str_replace('../', '/style/user/custom/', file_get_contents(public_path('/style/user/custom/css/mystyle.css'))) !!}
</style>
@endif
@yield('style')