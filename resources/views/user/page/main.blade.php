@extends('user.layout.index')
@section('title',isset($ConfigsTextSEO['home_title']) ? $ConfigsTextSEO['home_title'] : '')
@section('keywords',isset($ConfigsTextSEO['home_keyword']) ? $ConfigsTextSEO['home_keyword'] : '')
@section('description',isset($ConfigsTextSEO['home_description']) ? $ConfigsTextSEO['home_description'] : '')
@section('content')
@section('style')
@endsection
<main>
	<section class="block-posts">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="box-posts-cat">
						@if(!empty($get_cat))
						@foreach($get_cat as $item)
							@php
								$get_post = App\Posts::where('cat_id',$item['id'])->where('status',1)->orderBy('order','desc')->get();
								if(count($get_post) == 0){
									continue;
								}
							@endphp
							<div class="bg-title-cat">
								<div class="title-category">
									<a href="{{$item['slug']}}.html">{{$item['title']}}</a>
								</div>
							</div>
							@if(!empty($get_post))
							<div class="row">
								@foreach($get_post as $post)
									@php
										$title = $post['title'];
										$link = asset($post['slug']).'.html';
										$photo = json_decode($post['photo'], true)['photo'] ? json_decode($post['photo'], true)['photo'] : asset('style/images/no-photo.png');
										$description = $post['description'];
									@endphp
									<div class="col-md-6 col-lg-4 col-xl-3">
										<div class="box-post-item">
											<div class="post-item-1">
												<div class="img">
													<a href="{{$link}}">
														<img src="{{$photo}}" style="width: 100%;" alt="{{$title}}" />
													</a>
												</div>
												<div class="item-text">
													<div class="title">
														<h3 style="line-height: 20px;"><a href="{{$link}}">{{$title}}</a></h3>
													</div>
													<div class="info">
														<span>(<i>Ngày: {{date('d/m/Y',strtotime($post['created_at']))}}</i>)</span>
													</div>
													<div class="des">
														{!!strip_tags($description)!!}
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							<div class="border-bottom-orange"></div>
							@endif
							<br>
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
@endsection
@section('script')
@endsection