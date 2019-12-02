@php
	$params = json_decode($get_post->params,true);
	$seo_keyword = isset($params['seo_keyword']) ? $params['seo_keyword'] : '';
	$seo_description = isset($params['seo_description']) ? $params['seo_description'] : '';
@endphp
@extends('user.layout.index')
@section('title', $get_post['title'])
@section('keywords', $seo_keyword)
@section('description', $seo_description)
{{--Style--}}
@section('style')
<style>
	.detail-posts img{
		height: initial!important;
		max-width: 100%!important;
	}
</style>
@endsection
@section('content')
<section class="detail-posts">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				{!! isset($breadcrumb) ? $breadcrumb : '' !!}
				<h1>{!!$get_post['title']!!}</h1>
				<div class="info">
					<span>(<i>Ngày: {{date('d/m/Y', strtotime($get_post['created_at']))}}</i>)</span>
				</div>
				<div class="content-posts" style="font-size: 13px;">
					<div style="font-weight: bold;">{!!$get_post['description']!!}</div>
					<div class="clearfix"></div>
					{!!$get_post['content']!!}
				</div>
				<hr>
				@if(!empty($list_post))
				<div class="title-post-relative">Bài viết liên quan:</div>
				<ul class="post-relative">
					@foreach($list_post as $item)
						@php
							if($item['slug'] == $get_post->slug){
								continue;
							}
						@endphp
						<li><a href="{{asset($item['slug'].'.html')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$item['title']}}</a></li>
					@endforeach
				</ul>
				<br>
				@endif
			</div>
			<div class="col-md-4">
				@include('user.page.sidebar')
			</div>
		</div>
	</div>
</section>
@endsection