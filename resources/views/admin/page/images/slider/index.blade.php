@php
	$val_search = isset($_GET['search']) ? $_GET['search'] : null;
	$val_status = isset($_GET['status']) ? $_GET['status'] : null;
	$select_action = [
		['value'=>'active','title'=>'Hiển thị'],
		['value'=>'inactive','title'=>'Ẩn'],
		['value'=>'delete','title'=>'Xóa']
	];
	$select_filter_status = [
		['value'=>'1','title'=>'Danh sách hiện thị'],
		['value'=>'0','title'=>'Danh sách ẩn'],
	];
	$type_image = "slider";
@endphp
@extends('admin.layout.index')
@section('style')
	<style type="text/css">
		.table-bordered, 
		.table-bordered>tbody>tr>td, 
		.table-bordered>tbody>tr>th, 
		.table-bordered>tfoot>tr>td, 
		.table-bordered>tfoot>tr>th, 
		.table-bordered>thead>tr>td, 
		.table-bordered>thead>tr>th{
			font-size: 13px;
		}
	</style>
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
	                    <span>Danh sách hình ảnh</span>
	                </li>
	            </ul>
	        </div>
	        <h3 class="page-title">Hình ảnh</h3>
	        <form action="{{route('admin.images.index',['type'=>$type_image])}}" method="GET" class="form-filter">
				<div class="row">
					<div class="col-md-3">
						<strong>Hành động</strong>
						<select class="form-control" name="action-select">
	                        <option value="">--Hành động--</option>
	                        @foreach($select_action as $item)
	                        	<option value="{{$item['value']}}">{{$item['title']}}</option>
	                        @endforeach
	                    </select>
					</div>
					<div class="col-md-3">
						<strong><small>Tìm kiếm</small></strong>
						<div class="">
							<input type="text" class="form-control" placeholder="Tìm kiếm" name="search" value="{{$val_search}}">
						</div>
					</div>
					<div class="col-md-3">
						<strong><small>Tìm theo trang thái</small></strong>
						<select class="form-control" name="status">
	                        <option value="">--Tìm theo trạng thái--</option>
	                        <option value="">Hiển thị tất cả</option>
	                        @if(!empty($select_filter_status))
	                        @foreach($select_filter_status as $item)
	                        	<option value="{{$item['value']}}" @if($item['value'] == $val_status) selected="selected" @endif>{{$item['title']}}</option>
	                        @endforeach
	                        @endif
	                    </select>
					</div>
				</div>
			</form>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="btn-group control-action-btn">
                    	<button type="button" class="btn btn-primary btn-action">Thực hiện</button>
                    </div>
				</div>
			</div>
			<br>
    		<div class="row">
    			<div class="col-md-12">
	                <div class="btn-group">
	                	<a href="{{route('admin.images.create',['type'=>$type_image])}}">
	                        <button class="btn sbold green"> Thêm mới
	                            <i class="fa fa-plus"></i>
	                        </button>
	                	</a>
	                </div>
    			</div>
    		</div>
    		<hr>
	        <div class="row">
	        	<div class="col-md-12">
                    @include('admin.page.general.message')
                    <div>Số lượng: {{$data_count}}</div>
	        		<div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;"></th>
                                        <th style="width: 50px;"> Sắp xếp </th>
                                        <th> Tiêu đề </th>
                                        <th style="width: 250px;"> Hình ảnh </th>
                                        <th style="width: 50px;" class="text-center"> Trạng thái </th>
                                        <th style="width: 120px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($data as $item)
                                	@php
										$arr_img = isset(json_decode($item->photo, 1)['photo']) ? asset(json_decode($item->photo, 1)['photo']) : asset('style/images/no-photo.png');
									@endphp
                                	<tr>
                                		<td>
				                            <input type="checkbox" class="checkboxes" name="checkboxes[]" value="{{$item->id}}" />
				                        </td>
                                		<td>{{$item->order}}</td>
                                		<td>{{$item->title}}</td>
                                		<td><img src="{{$arr_img}}" alt="Image" style="width:100px;"></td>
                                		<td>@if($item->status == 1)<span style="color: blue">Hiện</span> @else <span style="color: red">Ẩn</span>@endif</td>
                                		<td class="text-center">
                                    		<a href="#" class="click-to-view" data-id="{{$item->id}}" title="Xem"><span class="label label-sm label-success"><i class="fa fa-eye"></i></span></a>&nbsp;
                                    		<a href="{{route('admin.images.edit',['type'=>$type_image,'id'=>$item->id])}}"><span class="label label-sm label-warning" title="Sửa"><i class="fa fa-edit"></i></span></a>&nbsp;
                                    		<a href="#" class="click-to-delete" data-id="{{$item->id}}" data-title="{{$item->title}}" title="Xóa"><span class="label label-sm label-danger"><i class="fa fa-trash"></i></span></a>
                                    	</td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                        	{{ $data->appends(['search'=>$val_search, 'status'=>$val_status])->links() }}
                        </div>
                    </div>
                </div>
                <!-- END BORDERED TABLE PORTLET-->
            </div>
		</div>
	</div>

{{-- Modal --}}
<div class="modal fade modal-delete" id="modal-delete" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Thông báo</h4>
            </div>
            <div class="modal-body" style="color: #ed6b75;">Bạn có chắc muốn xóa <strong><span class="text"></span></strong>?</div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Hủy</button>
                <a href="" class="a-delete"><button type="button" class="btn btn-danger">Xóa</button></a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-view" id="modal-view" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Thông tin chi tiết</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{{--Ajax Delete --}}
<script type="text/javascript">
	$(document).ready(function() {
		$('.click-to-delete').on('click', function(e){
			e.preventDefault();
			var url = '{{route('admin.images.delete',['type'=>$type_image,'id'=>'::id'])}}';
			var	get_id = $(this).data('id');
			url = url.replace('::id',get_id);
			var get_title = $(this).data('title');
			$('.modal-delete .text').html(get_title);
			$('.modal-delete .a-delete').attr('href',url);
			$('#modal-delete').modal('show');
		});
	});
</script>
{{--Ajax View --}}
<script type="text/javascript">
	$(document).ready(function() {
		$('.click-to-view').on('click', function(e){
			e.preventDefault();
			var url = '{{route('admin.images.ajax_view',['type'=>$type_image,'id'=>'::id'])}}';
			var	get_id = $(this).data('id');
			url = url.replace('::id',get_id);
			$.ajax({
				type:'GET',
				url: url,
				success: function(html){
					$('#modal-view .modal-body').html(html);
					$('#modal-view').modal('show');
				},
			});
		});
	});
</script>
<script>
	$(document).on('click','.btn-action',function(){
		var val_action = $('select[name=action-select]').val();
		if(val_action == 'delete'){
			var data_select = null;
			var arr_size_select = [0];
			$( "input[name^=checkboxes]:checked" ).each(function( index ) {
	            data_select = $(this).val();
	            arr_size_select.push(data_select);
	        })
	        url_select = "{{route('admin.images.update-select-box-delete',['type'=>$type_image,'params'=>':params'])}}"
	        url_select = url_select.replace(":params", arr_size_select);
	        window.location.href = url_select;
	        return;
		}	
		if(val_action == 'active'){
			var data_select = null;
			var arr_size_select = [0];
			$( "input[name^=checkboxes]:checked" ).each(function( index ) {
	            data_select = $(this).val();
	            arr_size_select.push(data_select);
	        })
	        url_select = "{{route('admin.images.update-select-box-active',['type'=>$type_image,'params'=>':params'])}}"
	        url_select = url_select.replace(":params", arr_size_select);
	        window.location.href = url_select;
	        return;
		}
		if(val_action == 'inactive'){
			var data_select = null;
			var arr_size_select = [0];
			$( "input[name^=checkboxes]:checked" ).each(function( index ) {
	            data_select = $(this).val();
	            arr_size_select.push(data_select);
	        })
	        url_select = "{{route('admin.images.update-select-box-inactive',['type'=>$type_image,'params'=>':params'])}}"
	        url_select = url_select.replace(":params", arr_size_select);
	        window.location.href = url_select; 
	        return;
		}
		$('form.form-filter').submit();
	})
</script>
@endsection