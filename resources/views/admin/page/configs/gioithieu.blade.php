@extends('admin.index')
@section('content')
	<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">Tiêu chí</h3>
        <form action="" method="post" enctype="multipart/form-data" id="submit-form-configs-gioithieu">
	        <div class="row">
	        	<div class="col-md-12">
	        		<div class="portlet light bordered">
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>Tiêu đề tiêu chí</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="title" value="{{isset($row['title'])?$row['title']:''}}"> 
                                </div>
                            </div>
                            <h3>Tiêu chí 1</h3>
                            <div class="form-group">
                                <label>STT</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="stt1" value="{{isset($row['stt1'])?$row['stt1']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề dòng 1</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="title-line-one-1" value="{{isset($row['title-line-one-1'])?$row['title-line-one-1']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề dòng 2</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="title-line-two-1" value="{{isset($row['title-line-two-1'])?$row['title-line-two-1']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                            	<label>Icon</label><div class="clearfix"></div>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="height: 150px;">
                                        <img src="/uploads/configs/{{isset($row['icon-1'])?$row['icon-1']:''}}" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> Chọn Hình </span>
                                            <span class="fileinput-exists"> Thay đổi </span>
                                            <input type="file" name="icon-1">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea rows="6" name="content-1" class="form-control ckeditor">{{isset($row['content-1'])?$row['content-1']:''}}</textarea>
                            </div>
                            <h3>Tiêu chí 2</h3>
                            <div class="form-group">
                                <label>STT</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="stt2" value="{{isset($row['stt2'])?$row['stt2']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề dòng 1</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="title-line-one-2" value="{{isset($row['title-line-one-2'])?$row['title-line-one-2']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề dòng 2</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="title-line-two-2" value="{{isset($row['title-line-two-2'])?$row['title-line-two-2']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                            	<label>Icon</label><div class="clearfix"></div>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="height: 150px;">
                                        <img src="/uploads/configs/{{isset($row['icon-2'])?$row['icon-2']:''}}" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> Chọn Hình </span>
                                            <span class="fileinput-exists"> Thay đổi </span>
                                            <input type="file" name="icon-2">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea rows="6" name="content-2" class="form-control ckeditor">{{isset($row['content-2'])?$row['content-2']:''}}</textarea>
                            </div>
                            <h3>Tiêu chí 3</h3>
                            <div class="form-group">
                                <label>STT</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="stt3" value="{{isset($row['stt3'])?$row['stt3']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề dòng 1</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="title-line-one-3" value="{{isset($row['title-line-one-3'])?$row['title-line-one-3']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề dòng 2</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <input type="text" class="form-control" name="title-line-two-3" value="{{isset($row['title-line-two-3'])?$row['title-line-two-3']:''}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                            	<label>Icon</label><div class="clearfix"></div>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="height: 150px;">
                                        <img src="/uploads/configs/{{isset($row['icon-3'])?$row['icon-3']:''}}" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> Chọn Hình </span>
                                            <span class="fileinput-exists"> Thay đổi </span>
                                            <input type="file" name="icon-3">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea rows="6" name="content-3" class="form-control ckeditor">{{isset($row['content-3'])?$row['content-3']:''}}</textarea>
                            </div>

                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="submit" class="btn green">Cập nhật</button>
                    </div>
	        	</div>
	        </div>
	        <input type="hidden" value="{{ csrf_token() }}" name="_token">
	        <input type="hidden" name="type" value="gioithieu">
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
            $("#submit-form-configs-gioithieu").on('submit', function(e){
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