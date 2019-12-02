@extends('admin.index')
@section('content')
	<div class="page-content-wrapper">
    <div class="page-content">
        <form action="" method="post" enctype="multipart/form-data" id="submit-form-configs">
	        <div class="row">
	        	<div class="col-md-12">
	        		<div class="portlet light bordered">
                        <h3 class="page-title">Comments</h3>
	        			<div class="portlet-body form">
                            <div class="form-group">
                                <label>Facebook App ID</label>
                               	<input type="text" class="form-control" name="fb_app_id" value="{{isset($row['fb_app_id'])?$row['fb_app_id']:''}}"> 
                            </div>
                            <div class="form-group">
                                <label>Facebook Admin ID</label>
                               	<input type="text" class="form-control" name="fb_admins" value="{{isset($row['fb_admins'])?$row['fb_admins']:''}}"> 
                            </div>
                            <div style="color: red">(*) Ghi chú:</div>
                            <div style="color: red">- Nếu có giá trị Admin ID thì thẻ meta là : &#60;meta property="fb:admins" content="[id-admin]"&#47;&#62;</div>
                            <div style="color: red">- Nếu không có giá trị Admin ID thì thẻ meta là : &#60;meta property="fb:app_id" content="[id-app]"&#47;&#62;</div>
                            <div style="color: red">- Xóa hết giá trị nếu không muốn hiển thị bình luận</div>
                        </div>
                    </div>
                    <div class="portlet light bordered">
                        <h3 class="page-title">Like/Share</h3>
                        <div class="portlet-body form">
                            <div class="checkbox">
                              <label><input type="checkbox" name="btn_like" @if(isset($configs_data['fb_social']['btn_like']) && isset($configs_data['fb_social']['btn_like']) == 'on') checked="checked"  @endif> Hiển thị</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="submit" class="btn green">Cập nhật</button>
                    </div>
	        	</div>
	        </div>
	        <input type="hidden" value="{{ csrf_token() }}" name="_token">
	        <input type="hidden" name="type" value="fb_social">
    	</form>
    </div>
</div>
{{-- Modal --}}
<div class="modal fade" id="modal-basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Thông báo</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
	<script type="text/javascript">
        $(document).ready(function(e){
            $("#submit-form-configs").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.configs.update') }}',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        //Loading
                    },
                    success: function(html){
                        $('.modal-body').html("Cập nhật cấu hình thành công");
                        $('#modal-basic').modal('show');
                    }
                });
            });
        });
        </script>
    </script>
@endsection