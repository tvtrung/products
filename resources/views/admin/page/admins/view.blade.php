<div class="info-style">
<p><strong>Họ tên: </strong>{{$row->name}}</p>
<p><strong>Email: </strong>{{$row->email}}</p>
<p><strong>Trạng thái: </strong>@if($row->status == 1) Đã kích hoạt @else Chưa kích hoạt @endif</p>
<p><strong>Thời gian tạo: </strong>{{$row->created_at}}</p>
<p><strong>Thời gian cập nhật: </strong>{{$row->updated_at}}</p>
</div>
<style type="text/css">
	.info-style p{
		margin-top: 0;
		margin-bottom:5px;
		font-size: 13px;
	}
</style>