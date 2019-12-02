@extends('admin.layout.index')
@section('style')
@endsection
@section('content')
	<div class="page-content-wrapper">
	    <div class="page-content">
	    	<div class="page-bar">
	            <ul class="page-breadcrumb">
	                <li>
	                    <a href="{{route('admin.dashboard')}}">Home</a>
	                    <i class="fa fa-circle"></i>
	                </li>
	                <li>
	                    <span>Cấu hình Nâng cao</span>
	                </li>
	            </ul>
	        </div>
	        <h3 class="page-title">Thông tin cấu hình Nâng cao</h3>
	        <br>
            @include('admin.page.general.message')
	        <div class="row">
	        	<div class="col-md-12">
	        		<form action="{{route('admin.configs-text-advanced.update')}}" method="post" enctype="multipart/form-data">
	        			@csrf
				        <div class="row">
				        	<div class="col-md-12">
				        		<div class="portlet light bordered">
			                        <div class="portlet-body form">
			                    		<div class="form-group">
			                                <label><b>Nội dung header</b></label>
			                                <textarea class="form-control" rows="10" name="text_head">{{isset($get_value['text_head']) ? $get_value['text_head'] : null}}</textarea>
			                            </div>
			                            <div class="form-group">
			                                <label><b>Nội dung body</b></label>
			                                <textarea class="form-control" rows="10" name="text_body">{{isset($get_value['text_body']) ? $get_value['text_body'] : null}}</textarea>
			                            </div>
			                            <div class="form-group">
			                                <label><b>Nội dung footer</b></label>
			                                <textarea class="form-control" rows="10" name="text_footer">{{isset($get_value['text_footer']) ? $get_value['text_footer'] : null}}</textarea>
			                            </div>
			                            <div class="form-actions right">
			                                <button type="submit" class="btn green">Cập nhật</button>
			                            </div>
			                        </div>
			                    </div>
				        	</div>
				        </div>
			    	</form>
                </div>
                <!-- END BORDERED TABLE PORTLET-->
            </div>
		</div>
	</div>
@endsection
@section('script')
	@include('admin/page.general.ckeditor')
@endsection