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
	                    <span>Edit Admin</span>
	                </li>
	            </ul>
	        </div>
	        <h3 class="page-title">Edit Admin</h3>
	        @include('admin.page.general.message')
	        <div class="row">
	        	<div class="col-md-6">
	        		<form action="{{route('admin.admin-management.update',['id'=>$row->id])}}" method="post" enctype="multipart/form-data">
			        	@csrf
			        	<input type="hidden" name="update" value="info">
		        		<div class="portlet light bordered">
	                        <div class="portlet-body form">
	                        	<p><strong>Thay đổi thông tin</strong></p>
	                            <div class="form-group">
	                                <label>Họ tên</label>
	                                <div class="input-group">
	                                    <span class="input-group-addon">
	                                        <i class="fa fa-user"></i>
	                                    </span>
	                                    <input type="text" class="form-control" placeholder="Full name" name="name" value="{{$row['name']}}"> 
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Email</label>
	                                <div class="input-group">
	                                    <span class="input-group-addon">
	                                        <i class="fa fa-envelope"></i>
	                                    </span>
	                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{$row['email']}}" disabled="disabled"> 
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Vai trò</label>
	                                <div class="input-group">
	                                    <select name="admin_role" class="form-control">
	                                    	<option value="1" @if($row['role'] == 1) selected="selected" @endif>Admin</option>
	                                    	<option value="2" @if($row['role'] == 2) selected="selected" @endif>Editor</option>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="checkbox-list">
	                                    <label class="checkbox-inline">
	                                        <input type="checkbox" name="isActive" @if($row['status'] == 1) checked="checked" @endif> Active
	                                    </label>
	                                </div>
	                            </div>
	                            <div class="form-actions right">
	                                <button type="submit" class="btn green">Cập nhật</button>
	                            </div>
	                        </div>
	                    </div>
	                </form>
	        	</div>
	        	<div class="col-md-6">
	        		<form action="{{route('admin.admin-management.update',['id'=>$row->id])}}" method="post" enctype="multipart/form-data">
			        	@csrf
			        	<input type="hidden" name="update" value="password">
		        		<div class="portlet light bordered">
	                        <div class="portlet-body form">
	                        	<p><strong>Thay đổi mật khẩu</strong></p>
				        		<div class="form-group">
		                            <label>Mật khẩu <span class="require-field">(*)</span></label>
		                            <div class="input-group">
		                                <span class="input-group-addon">
		                                    <i class="fa fa-lock"></i>
		                                </span>
		                                <input type="password" class="form-control" placeholder="Password" name="password" value=""> 
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label>Nhập lại mật khẩu <span class="require-field">(*)</span></label>
		                            <div class="input-group">
		                                <span class="input-group-addon">
		                                    <i class="fa fa-lock"></i>
		                                </span>
		                                <input type="password" class="form-control" placeholder="Re-Type Password" name="repassword" value=""> 
		                            </div>
		                        </div>
		                        <div class="form-actions right">
		                            <button type="submit" class="btn green">Cập nhật</button>
		                        </div>
		                    </div>
		                </div>
		            </form>
	        	</div>
	        </div>
	    </div>
	</div>
@endsection