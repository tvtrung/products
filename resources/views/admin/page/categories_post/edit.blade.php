@php
	if(!is_null($row->params)){
		$json_params = json_decode($row->params,1);
		if(isset($json_params['seo_keyword'])){
			$seo_keyword = $json_params['seo_keyword'];
		}else{
			$seo_keyword = null;
		}
		if(isset($json_params['seo_description'])){
			$seo_description = $json_params['seo_description'];
		}else{
			$seo_description = null;
		}
	}else{
		$seo_keyword = null;
		$seo_description = null;
	}
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
	                    <a href="{{route('admin.categories-post-management.index')}}">Danh mục bài viết</a>
	                    <i class="fa fa-circle"></i>
	                </li>
	                <li>
	                    <span>Chỉnh sửa</span>
	                </li>
	            </ul>
	        </div>
	        <h3 class="page-title">Chỉnh sửa danh mục</h3>
	        @include('admin.page.general.message')
	        <div class="row">
	        	<div class="col-md-12">
	        		<form action="{{route('admin.categories-post-management.update',['id'=>$row->id])}}" method="post">
	        			@csrf
				        <div class="row">
				        	<div class="col-md-6">
				        		<div class="portlet light bordered">
			                        <div class="portlet-body form">
			                    		<div class="form-group">
			                                <label>Tiêu đề <span class="require-field">(*)</span></label>
			                                <div class="input-group">
			                                    <span class="input-group-addon">
			                                        <i class="fa fa-pencil"></i>
			                                    </span>
			                                    <input type="text" class="form-control input-title" placeholder="Tiêu đề" name="title" value="{{$row->title}}" autocomplete="off"> 
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <label>Slug <span class="require-field">(*)</span></label>
			                                <div class="input-group">
			                                    <span class="input-group-addon">
			                                        <i class="fa fa-pencil"></i>
			                                    </span>
			                                    <input type="text" class="form-control" placeholder="Slug" name="slug" readonly="readonly" value="{{$row->slug}}"> 
			                                </div>
			                            </div>
			                            <input type="hidden" name="parent" value="0">
			                            <div class="form-group">
			                                <label>Sắp xếp <span class="require-field">(*)</span></label>
			                                <div class="input-group">
			                                    <input type="number" min="1" value="{{$row->order}}" class="form-control" name="order"> 
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <div class="checkbox-list">
			                                    <label class="checkbox-inline">
			                                        <input type="checkbox" @if($row->status == 1) checked="checked" @endif name="status"> Hiển thị
			                                    </label>
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <label>Keyword (SEO) <span class="require-field"></span></label>
			                                <textarea class="form-control" name="seo_keyword" rows="5">{{$seo_keyword}}</textarea>
			                            </div>
			                            <div class="form-group">
			                                <label>Description (SEO) <span class="require-field"></span></label>
			                                <textarea class="form-control" name="seo_description" rows="5">{{$seo_description}}</textarea>
			                            </div>
			                            <div class="form-actions right">
			                                <a href="{{route('admin.categories-post-management.index')}}"><button type="button" class="btn default">Quay lại</button></a>
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
	<script type="text/javascript">
		$("input[type='text'].input-title").on('keyup', function() {
			$("input[name='slug']").val(to_slug($(this).val()));
		 });
		function to_slug(str){
		    str = str.toLowerCase();     
		    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
		    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
		    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
		    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
		    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
		    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
		    str = str.replace(/(đ)/g, 'd');
		 
		    // Xóa ký tự đặc biệt
		    str = str.replace(/([^0-9a-z-\s])/g, '');
		 
		    // Xóa khoảng trắng thay bằng ký tự -
		    str = str.replace(/(\s+)/g, '-');
		 
		    // xóa phần dự - ở đầu
		    str = str.replace(/^-+/g, '');
		 
		    // xóa phần dư - ở cuối
		    str = str.replace(/-+$/g, '');
		 
		    // return
		    return str;
		}
	</script>
@endsection