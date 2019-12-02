@if(!is_null($data))
<div class="title">Email:</div>
<div class="content">{{$data->email}}</div>
<div class="title">Nội dung:</div>
<div class="content">{!!$data->content!!}</div>
<div class="title">Ngày gửi:</div>
<div class="content">{{$data->created_at}}</div>
@endif