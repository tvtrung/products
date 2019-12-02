@php
	$params = json_decode($get_cat['params'],true);
	$seo_keyword = isset($params['seo_keyword']) ? $params['seo_keyword'] : '';
	$seo_description = isset($params['seo_description']) ? $params['seo_description'] : '';
@endphp
@extends('user.layout.index')
@section('title',$get_cat['title'])
{{-- @section('title',isset($configs_data['seo']['title-trangchu'])?$configs_data['seo']['title-trangchu']:'') --}}
@section('keywords',$seo_keyword)
@section('description',$seo_description)
@section('style')
<style type="text/css">
	.pagination{
		display: inline-flex;
    	margin-top: 20px;
	}
	.list-posts h1{
		margin-top: 0;
	    color: #f68b1e;
	    font-weight: bold;
	    font-size: 25px;
	}
</style>
@endsection
@section('content')
<section class="list-posts">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				{!! isset($breadcrumb) ? $breadcrumb : '' !!}
				<h1>{!!$get_cat['title']!!}</h1>
				@if(count($list_post))
					@foreach($list_post as $post)
					@php
						$title = $post['title'];
						$link = asset($post['slug']).'.html';
						$photo = json_decode($post['photo'], true)['photo'] ? json_decode($post['photo'], true)['photo'] : asset('style/images/no-photo.png');
						$description = $post['description'];
					@endphp
					<div class="box-post-item">
						<div class="post-item-2">
							<div class="row">
								<div class="col-6 col-md-4">
									<div class="img">
										<a href="{{$link}}">
											<img src="{{$photo}}" alt="{{$title}}" style="width: 100%;" />
										</a>
									</div>
								</div>
								<div class="col-6 col-md-8" style="padding-left: 0">
									<div class="title">
										<h3><a href="{{$link}}">{!!$title!!}</a></h3>
									</div>
									<div class="info">
										<span>(<i>Ngày: {{date('d/m/Y', strtotime($post['created_at']))}}</i>)</span>
									</div>
									<div class="des only-pc">
										{!!$post['description']!!}
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<div class="border-bottom-orange"></div>
					<div class="text-center">
						{{ $list_post->links() }}
					</div>
				@else
					<div style="font-size: 13px;">Chưa có bài viết nào!</div>
				@endif
			</div>
			<div class="col-md-4">
				@include('user.page.sidebar')
			</div>
		</div>
	</div>
</section>
@endsection