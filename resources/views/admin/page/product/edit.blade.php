@extends('admin.index')
@section('content')
	<div class="page-content-wrapper">
	    <div class="page-content">
	        <h3 class="page-title">Sửa sản phẩm</h3>
	        <div class="row">
	        	<div class="col-md-12">
	        		@if(session('success'))
						<div class="alert alert-success update-alert">   
						<li>{{ session('success') }}</li>
						</div>
					@endif
					@if (count($errors) > 0)
						<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</div>
					@endif
	        	</div>
	        </div>
	        <form action="{{route('admin.product.update',['id'=>$row->id])}}" method="post" enctype="multipart/form-data">
		        <div class="row">
		        	<div class="col-md-12">
		        		<div class="portlet light bordered">
	                        <div class="portlet-body form">
	                    		<div class="form-group">
	                                <label>Tiêu đề</label>
	                                <input type="text" class="form-control" placeholder="Tiêu đề" name="title" value="{{$row->title}}" > 
	                            </div>
	                            <div class="form-group">
	                                <label>Giá</label>
	                                <input type="text" class="form-control" placeholder="Giá" name="price" value="{{$row->price}}" > 
	                            </div>
	                            <div class="form-group">
	                                <label>Nội dung</label>
	                                <textarea class="form-control ckeditor" name="content">{{$row->content}}</textarea>
	                            </div>
	                            <div class="form-group">
	                                <label>Link</label>
	                                <input type="text" class="form-control" placeholder="Link" name="link" value="{{$row->link}}" >
	                            </div>
	                            <div class="form-group">
	                                <div class="checkbox-list">
	                                    <label class="checkbox-inline">
	                                        <input type="checkbox" @if($row->status == 1) checked="checked" @endif name="isActive"> Active
	                                    </label>
	                                </div>
	                            </div>
                                <div class="form-group">
	                                <label>Vị trí</label>
	                                <input type="number" min="1" class="form-control" name="order" value="{{$row->order}}" style="width: 100px;">
	                            </div>
	                            <div class="form-actions right">
	                                <button type="reset" class="btn default">Hủy</button>
	                                <button type="submit" class="btn green">Cập nhật</button>
	                            </div>
	                        </div>
	                    </div>
		        	</div>
		        </div>
		        <input type="hidden" value="{{ csrf_token() }}" name="_token">
	    	</form>
	    </div>
	</div>
@endsection
@section('script')
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