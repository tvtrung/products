@php
	$arr_img = isset(json_decode($row->photo, 1)['photo']) ? json_decode($row->photo, 1)['photo'] : asset('style/images/no-photo.png');
	if(!is_null($row->params)){
		$json_params = json_decode($row->params,1);
		if(isset($json_params['seo_keyword'])){
			$seo_keyword = $json_params['seo_keyword'];
		}else{
			$seo_keyword = null;
		}
		if(isset($json_params['seo_description'])){
			$seo_description = $json_params['seo_description'];
		}else{
			$seo_description = null;
		}
	}else{
		$seo_keyword = null;
		$seo_description = null;
	}
@endphp
<div class="info-style">
<p><strong>Tiêu đề: </strong>{{$row->title}}</p>
<p><strong>Slug: </strong>{{$row->slug}}</p>
<p><strong>Thuộc danh mục: </strong>@if(!empty($get_title_cat)) {{$get_title_cat->title}} @endif</p>
<p><strong>Trạng thái: </strong>@if($row->status == 1) Hiện @else Ẩn @endif</p>
<p><strong>Sắp xếp: </strong>{{$row->order}}</p>
<p><strong>Thời gian tạo: </strong>{{$row->created_at}}</p>
<p><strong>Thời gian sửa: </strong>{{$row->updated_at}}</p>
<p><strong>Hình ảnh: </strong></p>
<p><img src="{{asset($arr_img)}}" style="max-width: 100%;"></p>
<p><strong>Mô tả: </strong></p>
<p>{!!$row->description!!}</p>
<p><strong>Nội dung:</strong></p>
<p>{!!$row->content!!}</p>
<p><strong>SEO Keyword:</strong></p>
<p>{!!$seo_keyword!!}</p>
<p><strong>SEO Description:</strong></p>
<p>{!!$seo_description!!}</p>
</div>
<style type="text/css">
	.info-style p{
		margin-top: 0;
		margin-bottom:5px;
		font-size: 13px;
	}
	img{
		max-width: 100%;
	}
</style>