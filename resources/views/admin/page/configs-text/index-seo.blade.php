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
	                    <span>Cấu hình SEO</span>
	                </li>
	            </ul>
	        </div>
	        <h3 class="page-title">Thông tin cấu hình SEO</h3>
	        <br>
            @include('admin.page.general.message')
	        <div class="row">
	        	<div class="col-md-12">
	        		<form action="{{route('admin.configs-text-seo.update')}}" method="post" enctype="multipart/form-data">
	        			@csrf
				        <div class="row">
				        	<div class="col-md-12">
				        		<div class="portlet light bordered">
			                        <div class="portlet-body form">
			                        	<h3>Trang chủ</h3>
			                    		<div class="form-group">
			                                <label><b>Title</b></label>
			                                <textarea class="form-control" rows="2" name="home_title">{{isset($get_value['home_title']) ? $get_value['home_title'] : null}}</textarea>
			                            </div>
			                            <div class="form-group">
			                                <label><b>Keyword</b></label>
			                                <textarea class="form-control" rows="3" name="home_keyword">{{isset($get_value['home_keyword']) ? $get_value['home_keyword'] : null}}</textarea>
			                            </div>
			                            <div class="form-group">
			                                <label><b>Description</b></label>
			                                <textarea class="form-control" rows="7" name="home_description">{{isset($get_value['home_description']) ? $get_value['home_description'] : null}}</textarea>
			                            </div>
			                            <h3>Liên hệ</h3>
			                    		<div class="form-group">
			                                <label><b>Title</b></label>
			                                <textarea class="form-control" rows="2" name="contact_title">{{isset($get_value['contact_title']) ? $get_value['contact_title'] : null}}</textarea>
			                            </div>
			                            <div class="form-group">
			                                <label><b>Keyword</b></label>
			                                <textarea class="form-control" rows="3" name="contact_keyword">{{isset($get_value['contact_keyword']) ? $get_value['contact_keyword'] : null}}</textarea>
			                            </div>
			                            <div class="form-group">
			                                <label><b>Description</b></label>
			                                <textarea class="form-control" rows="7" name="contact_description">{{isset($get_value['contact_description']) ? $get_value['contact_description'] : null}}</textarea>
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