@php
	$type_image = "slider";
@endphp
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
	                    <a href="{{route('admin.posts-management.index')}}">Danh sách Slider</a>
	                    <i class="fa fa-circle"></i>
	                </li>
	                <li>
	                    <span>Thêm mới</span>
	                </li>
	            </ul>
	        </div>
	        <h3 class="page-title">Thêm Slider</h3>
	        <br>
            @include('admin.page.general.message')
	        <div class="row">
	        	<div class="col-md-12">
	        		<form action="{{route('admin.images.store',['type'=>$type_image])}}" method="post" enctype="multipart/form-data">
	        			@csrf
				        <div class="row">
				        	<div class="col-md-12">
				        		<div class="portlet light bordered">
			                        <div class="portlet-body form">
			                    		<div class="form-group">
			                                <label>Tiêu đề <span class="require-field">(*)</span></label>
			                                <div class="input-group">
			                                    <span class="input-group-addon">
			                                        <i class="fa fa-pencil"></i>
			                                    </span>
			                                    <input type="text" class="form-control input-title" placeholder="Tiêu đề" name="title" value="{{old('title')}}" autocomplete="off"> 
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <label>Mô tả <span class="require-field"></span></label>
			                                <textarea class="form-control" name="description" rows="5">{{old('description')}}</textarea>
			                            </div>
			                            <div class="form-group">
			                                <label>Nội dung <span class="require-field"></span></label>
			                                <textarea class="form-control ckeditor" name="content" rows="5">{{old('content')}}</textarea>
			                            </div>
			                            <div class="form-group">
			                            	<label>Hình ảnh</label><div class="clearfix"></div>
			                                <div class="fileinput fileinput-new" data-provides="fileinput">
			                                    <div class="fileinput-new thumbnail" style="height: 150px;">
			                                        <img src="{{asset('style/images/no-photo.png')}}" alt="" /> </div>
			                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
			                                    <div>
			                                        <span class="btn default btn-file">
			                                            <span class="fileinput-new"> Chọn Hình </span>
			                                            <span class="fileinput-exists"> Thay đổi </span>
			                                            <input type="file" name="photo">
			                                        </span>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <label>Liên kết</label>
			                                <div class="input-group">
			                                    <span class="input-group-addon">
			                                        <i class="fa fa-pencil"></i>
			                                    </span>
			                                    <input type="text" class="form-control" placeholder="Liên kết" name="link" value="{{old('link')}}" autocomplete="off"> 
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <label>Sắp xếp <span class="require-field">(*)</span></label>
			                                <div class="input-group">
			                                    <input type="number" min="1" value="{{$max_order + 1}}" class="form-control" name="order"> 
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <div class="checkbox-list">
			                                    <label class="checkbox-inline">
			                                        <input type="checkbox" checked="checked" name="status"> Hiển thị
			                                    </label>
			                                </div>
			                            </div>
			                            <hr>
			                            <div class="form-actions right">
			                                <a href="{{route('admin.posts-management.index')}}"><button type="button" class="btn default">Quay lại</button></a>
			                                <button type="submit" class="btn green">Thêm</button>
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