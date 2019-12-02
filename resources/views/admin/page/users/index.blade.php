@extends('admin.index')
@section('style')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<style type="text/css">
	table tr td .btn{
		font-size: 13px;
	}
</style>
@endsection
@section('content')
	<div class="page-content-wrapper">
	    <div class="page-content">
	        <h3 class="page-title">List Users</h3>
	        <div class="portlet-body">
	        	@if(Auth::user()->level == 1)
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                            	<a href="{{route('admin.register')}}">
	                                <button class="btn sbold green"> Thêm mới
	                                    <i class="fa fa-plus"></i>
	                                </button>
                            	</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                	<div class="col-md-12">
                		@if(session('success'))
							<div class="alert alert-success update-alert">   
							<li>{{ session('success') }}</li>
							</div>
						@endif
                	</div>
                </div>
                @if(Auth::user()->level == 1)
                <h3>Administrator</h3>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;"> # </th>
                            <th> Tên </th>
                            <th> Email </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($data as $item)
                    	<?php if($item->level != 1) continue; ?>
                    	<tr>
                    		<td>{{$i++}}</td>
                    		<td>{{$item->name}}</td>
                    		<td>{{$item->email}}</td>
                    		<td class="text-center">
                    			<button type="button" class="btn btn-primary click-view" title="View" data-link="{{route('admin.user.view_detail',['id'=>$item->id])}}"><i class="fa fa-eye"></i></button>
                            	<a href="{{route('admin.user.edit',['id'=>$item->id])}}"><button type="button" class="btn yellow-crusta" title="Edit"><i class="fa fa-edit"></i></button></a>
                            	@if(Auth::user()->id != $item->id)
                            	<button type="button" class="btn red click-delete" title="Delete" data-link="{{route('admin.user.delete',['id'=>$item->id])}}"><i class="fa fa-trash"></i></button> 
                            	@endif
                    		</td>
                    	</tr>
                    	@endforeach
                    </tbody>
                </table>
                @endif
                <h3>Editor</h3>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;"> # </th>
                            <th> Tên </th>
                            <th> Email </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($data as $item)
                    	<?php if($item->level != 2) continue; ?>
                    	<?php 
                    		if(Auth::user()->level != 1){
	                    		$id_user = Auth::user()->id; 
	                    		if($item->id != $id_user ){
	                    			continue;
	                    		}
	                    	}
                    	?>
                    	<tr>
                    		<td>{{$i++}}</td>
                    		<td>{{$item->name}}</td>
                    		<td>{{$item->email}}</td>
                    		<td class="text-center">
                    			<button type="button" class="btn btn-primary click-view" title="View" data-link="{{route('admin.user.view_detail',['id'=>$item->id])}}"><i class="fa fa-eye"></i></button>
                            	<a href="{{route('admin.user.edit',['id'=>$item->id])}}"><button type="button" class="btn yellow-crusta" title="Edit"><i class="fa fa-edit"></i></button></a>
                            	@if(Auth::user()->id != $item->id)
                            	<button type="button" class="btn red click-delete" title="Delete" data-link="{{route('admin.user.delete',['id'=>$item->id])}}"><i class="fa fa-trash"></i></button> 
                            	@endif
                    		</td>
                    	</tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
	    </div>
	</div>
	{{-- Modal --}}
	<div class="modal fade" id="modal-basic" tabindex="-1" role="basic" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	                <h4 class="modal-title">Thông báo</h4>
	            </div>
	            <div class="modal-body">Bạn có chắc muốn xóa mục này?</div>
	            <div class="modal-footer">
	                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Hủy</button>
	                <a href="" class="a-delete"><button type="button" class="btn btn-danger">Xóa</button></a>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="modal fade" id="modal-basic-view" tabindex="-1" role="basic" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	                <h4 class="modal-title">Thông tin User</h4>
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

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript">
	$(document).ready(function() {
	    $('#sample_1').DataTable({
	    	"order": [[ 0, "asc" ]]
	    });
	    $('#sample_2').DataTable({
	    	"order": [[ 0, "asc" ]]
	    });
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.click-view').on('click', function(){
			var	get_link = $(this).data('link');
			$.ajax({
				type:'GET',
				url: get_link,
				success: function(html){
					$('#modal-basic-view .modal-body').html(html);
					$('#modal-basic-view').modal('show');
				},
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.click-delete').on('click', function(){
			var	get_link = $(this).data('link');
			var link_delete = get_link;
			$('.a-delete').attr('href',link_delete);
			$('#modal-basic').modal('show');
		});
	});
</script>

@endsection