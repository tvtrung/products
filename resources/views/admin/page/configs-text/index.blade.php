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
	                    <span>Cấu hình</span>
	                </li>
	            </ul>
	        </div>
	        <h3 class="page-title">Thông tin cấu hình</h3>
	        <br>
            @include('admin.page.general.message')
	        <div class="row">
	        	<div class="col-md-12">
	        		<form action="{{route('admin.configs-text.update')}}" method="post" enctype="multipart/form-data">
	        			@csrf
				        <div class="row">
				        	<div class="col-md-12">
				        		<div class="portlet light bordered">
			                        <div class="portlet-body form">
			                        	<div class="form-group">
			                            	<label><b>Logo</b></label><div class="clearfix"></div>
			                            	<div class="form-group">
				                                <div class="checkbox-list">
				                                    <label class="checkbox-inline">
				                                        <input type="checkbox" name="show_logo" {{(isset($get_value['show_logo']) && $get_value['show_logo'] == 1 ) ? 'checked="checked"' : null}}> Hiển thị
				                                    </label>
				                                </div>
				                            </div>
			                                <div class="fileinput fileinput-new" data-provides="fileinput">
			                                    <div class="fileinput-new thumbnail" style="height: 150px;">
			                                        <img src="{{isset($get_value['logo']) ? asset($get_value['logo']) : asset('style/images/no-photo.png')}}" alt="" /> 
			                                    </div>
			                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
			                                    <div>
			                                        <span class="btn default btn-file">
			                                            <span class="fileinput-new"> Chọn Hình </span>
			                                            <span class="fileinput-exists"> Thay đổi </span>
			                                            <input type="file" name="logo">
			                                        </span>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="form-group">
			                            	<label><b>Banner Top</b></label><div class="clearfix"></div>
			                            	<div class="form-group">
				                                <div class="checkbox-list">
				                                    <label class="checkbox-inline">
				                                        <input type="checkbox" name="show_banner" {{(isset($get_value['show_banner']) && $get_value['show_banner'] == 1 ) ? 'checked="checked"' : null}}> Hiển thị
				                                    </label>
				                                </div>
				                            </div>
			                                <div class="fileinput fileinput-new" data-provides="fileinput">
			                                    <div class="fileinput-new thumbnail" style="height: 150px;">
			                                        <img src="{{isset($get_value['banner']) ? asset($get_value['banner']) : asset('style/images/no-photo.png')}}" alt="" /> 
			                                    </div>
			                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
			                                    <div>
			                                        <span class="btn default btn-file">
			                                            <span class="fileinput-new"> Chọn Hình </span>
			                                            <span class="fileinput-exists"> Thay đổi </span>
			                                            <input type="file" name="banner">
			                                        </span>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="form-group">
			                            	<label><b>Banner Aside</b></label><div class="clearfix"></div>
			                            	<div class="form-group">
				                                <div class="checkbox-list">
				                                    <label class="checkbox-inline">
				                                        <input type="checkbox" name="show_banner_aside" {{(isset($get_value['show_banner_aside']) && $get_value['show_banner_aside'] == 1 ) ? 'checked="checked"' : null}}> Hiển thị
				                                    </label>
				                                </div>
				                            </div>
			                                <div class="fileinput fileinput-new" data-provides="fileinput">
			                                    <div class="fileinput-new thumbnail" style="height: 150px;">
			                                        <img src="{{isset($get_value['banner_aside']) ? asset($get_value['banner_aside']) : asset('style/images/no-photo.png')}}" alt="" /> 
			                                    </div>
			                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
			                                    <div>
			                                        <span class="btn default btn-file">
			                                            <span class="fileinput-new"> Chọn Hình </span>
			                                            <span class="fileinput-exists"> Thay đổi </span>
			                                            <input type="file" name="banner_aside">
			                                        </span>
			                                    </div>
			                                </div>
			                            </div>
			                    		<div class="form-group">
			                                <label><b>Địa chỉ</b></label>
			                                <div class="input-group">
			                                    <span class="input-group-addon">
			                                        <i class="fa fa-pencil"></i>
			                                    </span>
			                                    <input type="text" class="form-control input-title" placeholder="Địa chỉ" name="address" value="{{isset($get_value['address']) ? $get_value['address'] : null}}" autocomplete="off"> 
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <label><b>Email</b></label>
			                                <div class="input-group">
			                                    <span class="input-group-addon">
			                                        <i class="fa fa-pencil"></i>
			                                    </span>
			                                    <input type="text" class="form-control input-title" placeholder="Email" name="email" value="{{isset($get_value['email']) ? $get_value['email'] : null}}" autocomplete="off"> 
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <label><b>Điện thoại</b></label>
			                                <div class="input-group">
			                                    <span class="input-group-addon">
			                                        <i class="fa fa-pencil"></i>
			                                    </span>
			                                    <input type="text" class="form-control input-title" placeholder="Điện thoại" name="phone" value="{{isset($get_value['phone']) ? $get_value['phone'] : null}}" autocomplete="off"> 
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <div class="checkbox-list">
			                                    <label class="checkbox-inline">
			                                        <input type="checkbox" name="optimize" {{(isset($get_value['optimize']) && $get_value['optimize'] == 1 ) ? 'checked="checked"' : null}}> Tối ưu
			                                    </label>
			                                </div>
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