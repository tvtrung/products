@extends('admin.index')
@section('content')
	<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">Fanpage</h3>
        <form action="" method="post" enctype="multipart/form-data" id="submit-form-configs">
	        <div class="row">
	        	<div class="col-md-12">
	        		<div class="portlet light bordered">
	        			<h3>Iframe fanpage</h3>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <textarea class="form-control" name="iframe-fanpage" rows="5">{{isset($row['iframe-fanpage'])?$row['iframe-fanpage']:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="submit" class="btn green">Cập nhật</button>
                    </div>
	        	</div>
	        </div>
	        <input type="hidden" value="{{ csrf_token() }}" name="_token">
	        <input type="hidden" name="type" value="fanpage">
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
    {{-- <script src="/admin/assets/pages/scripts/components-code-editors.min.js" type="text/javascript"></script> --}}
	<script type="text/javascript">
        $(document).ready(function(e){
            $("#submit-form-configs").on('submit', function(e){
                e.preventDefault();
                console.log('ok');
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
@endsection