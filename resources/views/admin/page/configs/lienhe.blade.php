@extends('admin.index')
@section('content')
	<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">Liên hệ</h3>
        <form action="" method="post" enctype="multipart/form-data" id="submit-form-configs-lienhe">
	        <div class="row">
	        	<div class="col-md-12">
	        		<div class="portlet light bordered">
	        			<h3>Địa chỉ 1</h3>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>Thông tin địa chỉ</label>
                                <textarea name="contact-addr-1" class="form-control" rows="5">{{isset($row['contact-addr-1'])?$row['contact-addr-1']:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="portlet light bordered">
	        			<h3>Địa chỉ 2</h3>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>Thông tin địa chỉ</label>
                                <textarea name="contact-addr-2" class="form-control" rows="5">{{isset($row['contact-addr-2'])?$row['contact-addr-2']:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                        	<div class="form-group">
                                <label>Tên công ty</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="contact-company-name" value="{{isset($row['contact-company-name'])?$row['contact-company-name']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hotline</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="contact-hotline" value="{{isset($row['contact-hotline'])?$row['contact-hotline']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="contact-email" value="{{isset($row['contact-email'])?$row['contact-email']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nội dung liên hệ</label>
                                <textarea name="contact-content" class="form-control ckeditor" rows="10">{{isset($row['contact-content'])?$row['contact-content']:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="portlet light bordered">
	        			<h3>Bản đồ 1</h3>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="contact-map-title-1" value="{{isset($row['contact-map-title-1'])?$row['contact-map-title-1']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Iframe</label>
                                <textarea name="contact-map-content-1" class="form-control" rows="5">{{isset($row['contact-map-content-1'])?$row['contact-map-content-1']:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="portlet light bordered">
	        			<h3>Bản đồ 2</h3>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="contact-map-title-2" value="{{isset($row['contact-map-title-2'])?$row['contact-map-title-2']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Iframe</label>
                                <textarea name="contact-map-content-2" class="form-control" rows="5">{{isset($row['contact-map-content-2'])?$row['contact-map-content-2']:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="submit" class="btn green">Cập nhật</button>
                    </div>
	        	</div>
	        </div>
	        <input type="hidden" value="{{ csrf_token() }}" name="_token">
	        <input type="hidden" name="type" value="lienhe">
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
            $("#submit-form-configs-lienhe").on('submit', function(e){
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
    <script type="text/javascript" src="/editor/ckeditor/ckeditor.js"></script>
    <script>
        $('.ckeditor').each(function(index, el) {
            var attr =$(this).attr('name');
            CKEDITOR.replace( attr, {
                filebrowserBrowseUrl: '{{route('upload_editor')}}',
                filebrowserImageBrowseUrl: '{{route('upload_editor') . "?type=Images"}}',
                filebrowserFlashBrowseUrl: '{{route('upload_editor') . "?type=Flash"}}',
                filebrowserUploadUrl: '{{ asset('/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                filebrowserImageUploadUrl: '{{ asset('/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                filebrowserFlashUploadUrl: '{{ asset('/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
            });
        });
    </script>
@endsection