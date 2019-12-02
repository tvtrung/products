@extends('admin.layout.index')
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
	                    <span>Add Admin</span>
	                </li>
	            </ul>
	        </div>
	        <h3 class="page-title">Add Admin</h3>
	        @include('admin.page.general.message');
	        <form action="{{route('admin.admin-management.store')}}" method="post" enctype="multipart/form-data">
	        	@csrf
		        <div class="row">
		        	<div class="col-md-6">
		        		<div class="portlet light bordered">
	                        <div class="portlet-body form">
	                            <div class="form-group">
	                                <label>Họ tên</label>
	                                <div class="input-group">
	                                    <span class="input-group-addon">
	                                        <i class="fa fa-user"></i>
	                                    </span>
	                                    <input type="text" class="form-control" placeholder="Full name" name="name" value="{{old('fullname')}}"> 
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Email</label>
	                                <div class="input-group">
	                                    <span class="input-group-addon">
	                                        <i class="fa fa-envelope"></i>
	                                    </span>
	                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}"> 
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Mật khẩu <span class="require-field">(*)</span></label>
	                                <div class="input-group">
	                                    <span class="input-group-addon">
	                                        <i class="fa fa-lock"></i>
	                                    </span>
	                                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}"> 
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Nhập lại mật khẩu <span class="require-field">(*)</span></label>
	                                <div class="input-group">
	                                    <span class="input-group-addon">
	                                        <i class="fa fa-lock"></i>
	                                    </span>
	                                    <input type="password" class="form-control" placeholder="Re-Type Password" name="repassword" value="{{old('repassword')}}"> 
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Vai trò</label>
	                                <div class="input-group">
	                                    <select name="admin_role" class="form-control">
	                                    	<option value="1">Admin</option>
	                                    	<option value="2">Editor</option>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="checkbox-list">
	                                    <label class="checkbox-inline">
	                                        <input type="checkbox" checked="checked" name="isActive"> Active
	                                    </label>
	                                </div>
	                            </div>
	                            {{-- <div class="form-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="height: 150px;">
                                            <img src="/style/images/no-photo-available.png" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Chọn hình </span>
                                                <span class="fileinput-exists"> Thay đổi </span>
                                                <input type="file" name="avatar"> 
                                            </span>
                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                        </div>
                                    </div>
                                </div> --}}
	                            <div class="form-actions right">
	                                <button type="reset" class="btn default">Hủy</button>
	                                <button type="submit" class="btn green">Thêm</button>
	                            </div>
	                        </div>
	                    </div>
		        	</div>
		        </div>
	    	</form>
	    </div>
	</div>
@endsection