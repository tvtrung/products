@php
	$arr_img = isset(json_decode($row->photo, 1)['photo']) ? asset(json_decode($row->photo, 1)['photo']) : asset('style/images/no-photo.png');
@endphp
<div class="info-style">
<p><strong>Tiêu đề: </strong>{{$row->title}}</p>
<p><strong>Trạng thái: </strong>@if($row->status == 1) Hiện @else Ẩn @endif</p>
<p><strong>Sắp xếp: </strong>{{$row->order}}</p>
<p><strong>Thời gian tạo: </strong>{{$row->created_at}}</p>
<p><strong>Thời gian sửa: </strong>{{$row->updated_at}}</p>
<p><strong>Hình ảnh: </strong></p>
<p><img src="{{asset($arr_img)}}" style="max-width: 100%;"></p>
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