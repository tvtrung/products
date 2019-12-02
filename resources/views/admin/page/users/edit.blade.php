@extends('admin.index')
@section('content')
	<div class="page-content-wrapper">
	    <div class="page-content">
	        <h3 class="page-title">Add User</h3>
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
	        <form action="{{route('admin.user.update',['id'=>$row->id])}}" method="post" enctype="multipart/form-data">
		        <div class="row">
		        	<div class="col-md-6">
		        		<div class="portlet light bordered">
	                        <div class="portlet-body form">
	                            <div class="form-group">
	                                <label>Họ tên <span class="require-field">(*)</span></label>
	                                <div class="input-group">
	                                    <span class="input-group-addon">
	                                        <i class="fa fa-user"></i>
	                                    </span>
	                                    <input type="text" class="form-control" placeholder="Tên" name="name" value="{{$row->name}}"> 
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Email <span class="require-field">(*)</span></label>
	                                <div class="input-group">
	                                    <span class="input-group-addon">
	                                        <i class="fa fa-envelope"></i>
	                                    </span>
	                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{$row->email}}" disabled="disabled"> 
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Password <span class="require-field">(Để trống nếu không thay đổi password)</span></label>
	                                <div class="input-group">
	                                    <span class="input-group-addon">
	                                        <i class="fa fa-lock"></i>
	                                    </span>
	                                    <input type="password" class="form-control" placeholder="Password" name="password" value=""> 
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Re-Type Password <span class="require-field">(*)</span></label>
	                                <div class="input-group">
	                                    <span class="input-group-addon">
	                                        <i class="fa fa-lock"></i>
	                                    </span>
	                                    <input type="password" class="form-control" placeholder="Re-Type Password" name="repassword" value=""> 
	                                </div>
	                            </div>
	                            @if(Auth::user()->level == 1)
	                            <div class="form-group">
	                                <label>Chọn cấp User</label>
	                                <select class="bs-select form-control" name="user_level">
	                                <option value="1" @if($row->level == 1) selected="selected" @endif>Administrator</option>
	                                <option value="2" @if($row->level == 2) selected="selected" @endif>Editor</option>
                                    </select>
	                            </div>
	                            @endif
	                            <div class="form-actions right">
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