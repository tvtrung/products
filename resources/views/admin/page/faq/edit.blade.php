@extends('admin.index')
@section('content')
	<div class="page-content-wrapper">
	    <div class="page-content">
	        <h3 class="page-title">Sửa câu hỏi</h3>
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
	        <form action="" method="post">
		        <div class="row">
		        	<div class="col-md-12">
		        		<div class="faq-content m-widget1">
							<div class="form-group m-form__group">
								<label for="input_name">Họ tên</label>
								<input type="text" name="fullname" value="{{$data['name']}}" class="form-control m-input" id="input_name" placeholder="Họ tên">
							</div>
							<div class="form-group m-form__group">
								<label for="input_email">Email</label>
								<input type="email" name="email" value="{{$data['email']}}" class="form-control m-input" id="input_email" placeholder="Email">
							</div>
							<div class="form-group m-form__group">
								<label for="input_website">Website</label>
								<input type="text" name="website" value="{{$data['website']}}" class="form-control m-input" id="input_website" placeholder="Website">
							</div>
							<div class="form-group m-form__group">
								<label for="input_question">Câu hỏi</label>
								<input type="text" name="question" value="{{$data['question']}}" class="form-control m-input" id="input_question" placeholder="Câu hỏi">
							</div>
							<div class="form-group m-form__group">
								<label for="input_answer">Câu trả lời</label>
								<textarea name="answer" class="form-control m-input ckeditor">{{$data['content']}}</textarea>
							</div>
							<div class="form-group m-form__group">
								<label for="input_email">Trạng thái: </label>
								<label class="switch">
                                    <input type="checkbox" class="click-ajax" name="status" @if($data['status'] == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>
							</div>
							<div class="form-group m-form__group">
								<label for="input_order">Thứ tự</label>
								<input type="number" min="0" name="order" class="form-control m-input" id="input_order" value="{{$data['order']}}" style="width: 150px;">
							</div>
							<div class="m-portlet__foot m-portlet__foot--fit">
								<br>
								<div class="m-form__actions">
									<a href="{{route('admin.faq.index')}}"><button type="button" class="btn btn-secondary">Quay lại</button></a>
									<button type="submit" class="btn btn-primary">Cập nhật</button>
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

