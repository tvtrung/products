@php
	$arr_img = isset(json_decode($row->photo, 1)['photo']) ? json_decode($row->photo, 1)['photo'] : asset('style/images/no-photo.png');
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
	                    <a href="{{route('admin.posts-management.index')}}">Danh sách bài viết</a>
	                    <i class="fa fa-circle"></i>
	                </li>
	                <li>
	                    <span>Chỉnh sửa</span>
	                </li>
	            </ul>
	        </div>
	        <h3 class="page-title">Chỉnh sửa bài viết</h3>
	        @include('admin.page.general.message')
	        <div class="row">
	        	<div class="col-md-12">
	        		<form action="{{route('admin.posts-management.update',['id'=>$row->id])}}" method="post" enctype="multipart/form-data">
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
			                            <div class="form-group">
			                                <label>Mô tả <span class="require-field"></span></label>
			                                <textarea class="form-control" name="description" rows="5">{{$row->description}}</textarea>
			                            </div>
			                            <div class="form-group">
			                                <label>Nội dung <span class="require-field"></span></label>
			                                <textarea class="form-control ckeditor" name="content" rows="5">{{$row->content}}</textarea>
			                            </div>
			                            <div class="form-group">
			                            	<label>Hình ảnh</label><div class="clearfix"></div>
			                                <div class="fileinput fileinput-new" data-provides="fileinput">
			                                    <div class="fileinput-new thumbnail" style="height: 150px;">
			                                        <img src="{{asset($arr_img)}}" alt="" /> </div>
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
			                                <label>Chọn danh mục <span class="require-field">(*)</span></label>
			                                <select class="form-control" name="select-cat">
			                                	@foreach($list_categories_post as $item)
			                                		<option value="{{$item->id}}" @if($item->id == $row->cat_id) selected="selected" @endif>{{$item->title}}</option>
			                                	@endforeach
			                                </select>
			                            </div>
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
			                            <hr>
			                            <div class="form-group">
			                                <label>Keyword (SEO) <span class="require-field"></span></label>
			                                <textarea class="form-control" name="seo_keyword" rows="5">{{$seo_keyword}}</textarea>
			                            </div>
			                            <div class="form-group">
			                                <label>Description (SEO) <span class="require-field"></span></label>
			                                <textarea class="form-control" name="seo_description" rows="5">{{$seo_description}}</textarea>
			                            </div>
			                            <div class="form-actions right">
			                                <a href="{{route('admin.posts-management.index')}}"><button type="button" class="btn default">Quay lại</button></a>
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
	<script>
		$("input[type='text'].input-title").on('keyup', function() {
			$("input[name='slug']").val(to_slug($(this).val()));
		});
	</script>
	@include('admin/page.general.to_slug')
	@include('admin/page.general.ckeditor')
@endsection