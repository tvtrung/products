<div class="info-style">
<p><strong>Họ tên: </strong>{{$row->name}}</p>
<p><strong>Điện thoại: </strong>{{$row->phone}}</p>
<p><strong>Email: </strong>{{$row->email}}</p>
<p><strong>Trạng thái: </strong>@if($row->status == 1) Đã xử lý @else Chưa xử lý @endif</p>
<p><strong>Thời gian tạo: </strong>{{$row->created_at}}</p>
<p><strong>Nội dung: </strong></p>
<p>{{$row->content}}</p>
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