@if(!is_null($data))
<div class="title">Họ tên:</div>
<div class="content">{{ $data->name }}</div>
<div class="title">Email:</div>
<div class="content">{{$data->email}}</div>
<div class="title">Website:</div>
<div class="content">{{$data->website}}</div>
<div class="title">Câu hỏi:</div>
<div class="content">{{$data->question}}</div>
<div class="title">Câu trả lời:</div>
<div class="content">{!!$data->content!!}</div>
<div class="title">Ngày tạo:</div>
<div class="content">{{ date('d/m/Y', strtotime($data->created_at)) }}</div>
<div class="title">Ngày cập nhật:</div>
<div class="content">{{ date('d/m/Y', strtotime($data->updated_at)) }}</div>
<div class="title">Trạng thái:</div>
<div class="content">@if($data->status == 1) Hiển thị @else Không hiển thị @endif </div>
@endif