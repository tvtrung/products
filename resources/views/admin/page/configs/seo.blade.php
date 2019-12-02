@extends('admin.index')
@section('content')
	<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">SEO</h3>
        <form action="" method="post" enctype="multipart/form-data" id="submit-form-configs">
	        <div class="row">
	        	<div class="col-md-12">
	        		<div class="portlet light bordered">
	        			<h3>Title</h3>
	        			<div class="portlet-body form">
                            <div class="form-group">
                                <label>Trang chủ</label>
                               	<input type="text" class="form-control" name="title-trangchu" value="{{isset($row['title-trangchu'])?$row['title-trangchu']:''}}"> 
                            </div>
                            {{-- <div class="form-group">
                                <label>Giới thiệu</label>
                               	<input type="text" class="form-control" name="title-gioithieu" value="{{isset($row['title-gioithieu'])?$row['title-gioithieu']:''}}"> 
                            </div>
                            <div class="form-group">
                                <label>Bảng giá</label>
                               	<input type="text" class="form-control" name="title-banggia" value="{{isset($row['title-banggia'])?$row['title-banggia']:''}}"> 
                            </div>
                            <div class="form-group">
                                <label>Hướng dẫn</label>
                               	<input type="text" class="form-control" name="title-huongdan" value="{{isset($row['title-huongdan'])?$row['title-huongdan']:''}}"> 
                            </div>
                            <div class="form-group">
                                <label>Hỏi đáp</label>
                               	<input type="text" class="form-control" name="title-hoidap" value="{{isset($row['title-hoidap'])?$row['title-hoidap']:''}}"> 
                            </div> 
                            <div class="form-group">
                                <label>Liên hệ</label>
                               	<input type="text" class="form-control" name="title-lienhe" value="{{isset($row['title-lienhe'])?$row['title-lienhe']:''}}"> 
                            </div>--}}
                        </div>
                    </div>
                    <div class="portlet light bordered">
	        			<h3>SEO - Meta</h3>
	        			<div class="portlet-body form">
                            <div class="form-group">
                                <label>keywords</label>
                               	<input type="text" class="form-control" name="seo-keywords" value="{{isset($row['seo-keywords'])?$row['seo-keywords']:''}}"> 
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>description</label>
                                <textarea rows="5" class="form-control" name="seo-description">{{isset($row['seo-description'])?$row['seo-description']:''}}</textarea>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>robots</label>
                               	<input type="text" class="form-control" name="seo-robots" value="{{isset($row['seo-robots'])?$row['seo-robots']:''}}"> 
                            </div>
                        </div>
                       
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>language</label>
                               	<input type="text" class="form-control" name="seo-language" value="{{isset($row['seo-language'])?$row['seo-language']:''}}"> 
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>copyright</label>
                               	<input type="text" class="form-control" name="seo-copyright" value="{{isset($row['seo-copyright'])?$row['seo-copyright']:''}}"> 
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>distribution</label>
                               	<input type="text" class="form-control" name="seo-distribution" value="{{isset($row['seo-distribution'])?$row['seo-distribution']:''}}"> 
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>author</label>
                               	<input type="text" class="form-control" name="seo-author" value="{{isset($row['seo-author'])?$row['seo-author']:''}}"> 
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>REVISIT-AFTER</label>
                               	<input type="text" class="form-control" name="seo-revisit-after" value="{{isset($row['seo-revisit-after'])?$row['seo-revisit-after']:''}}"> 
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>RATING</label>
                               	<input type="text" class="form-control" name="seo-rating" value="{{isset($row['seo-rating'])?$row['seo-rating']:''}}"> 
                            </div>
                        </div>
                    </div>
                    <div class="portlet light bordered">
	        			<h3>Google Analytics</h3>
	        			<div class="portlet-body form">
                            <div class="form-group">
                                <label>Script</label>
                                <textarea class="form-control" name="google-analytics" rows="10">{{isset($row['google-analytics'])?$row['google-analytics']:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="portlet light bordered">
	        			<h3>Chat - Script</h3>
	        			<div class="portlet-body form">
                            <div class="form-group">
                                <label>Script</label>
                                <textarea class="form-control" name="chat-script" rows="10">{{isset($row['chat-script'])?$row['chat-script']:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="submit" class="btn green">Cập nhật</button>
                    </div>
	        	</div>
	        </div>
	        <input type="hidden" value="{{ csrf_token() }}" name="_token">
	        <input type="hidden" name="type" value="seo">
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