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
	.width50{
		width: 50px!important;
	}
	.center{
		text-align: center;
	}
</style>
@endsection
@section('content')
	<div class="page-content-wrapper">
	    <div class="page-content">
	        <h3 class="page-title">Sản phẩm</h3>
	        <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                            	<a href="{{route('admin.product.create')}}">
	                                <button class="btn sbold green"> Thêm mới
	                                    <i class="fa fa-plus"></i>
	                                </button>
                            	</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                	<div class="col-md-12">
                		@if(session('success'))
							<div class="alert alert-success update-alert">   
							<li>{{ session('success') }}</li>
							</div>
						@endif
                	</div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 150px;"> STT </th>
                            <th> Tên sản phẩm </th>
                            <th> Giá </th>
                            <th class="text-center"> Trạng thái </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@if(isset($data))
                    	@foreach($data as $item)
				        <tr>
				        	<td class="center">
				        		<input type="number" min="0" name="order" data-link="{{route('admin.product.ajax_order',['id'=>$item->id])}}" class="order-ajax" data-id="{{$item->id}}" value="{{ $item->order }}"  style="width: 50px!important;">
				        	</td>
				            <td class="center">{{ $item->title }}</td>
				            <td class="center">{{ $item->price }}</td>
				            <td class="center">
				            	<label class="switch click-change">
                                    <input type="checkbox" class="switch-ajax" data-link="{{route('admin.product.switch_ajax',['id'=>$item->id])}}" value="{{$item->id}}" @if($item->status == 1) checked='checked' @endif>
                                </label>
				            </td>
				            <td class="center btn-action" style="width: 160px;">
                            	<button type="button" class="btn btn-primary click-view" title="View" data-link="{{route('admin.product.view',['id'=>$item->id])}}"><i class="fa fa-eye"></i></button>
                            	<a href="{{route('admin.product.edit',['id'=>$item->id])}}"><button type="button" class="btn yellow-crusta" title="Edit"><i class="fa fa-edit"></i></button></a>
                            	<button type="button" class="btn red click-delete" title="Delete" data-link="{{route('admin.product.delete',['id'=>$item->id])}}"><i class="fa fa-trash"></i></button> 
                            </td>
				        </tr>
						@endforeach
                       @endif
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
	                <h4 class="modal-title">Thông tin Sản phẩm</h4>
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
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
	$(document).ready(function() {
	    $('#sample_1').DataTable();
	});
</script>
<script type="text/javascript">
	{{--Ajax Hide/Show --}}
	$(document).ready(function() {
		$('.click-change .bootstrap-switch-handle-on, .click-change .bootstrap-switch-handle-off, .click-change .bootstrap-switch-label, .click-change input').on('click', function(){
			var get_link = $(this).closest('.click-change').find('input').data('link');
			$.ajax({
				type:'GET',
				url: get_link,
				success: function(html){
					console.log("OK");
				},
			});
		});
	});
</script>
{{--Ajax View --}}
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
{{--Ajax Delete --}}
<script type="text/javascript">
	$(document).ready(function() {
		$('.click-delete').on('click', function(){
			var	get_link = $(this).data('link');
			$('.a-delete').attr('href',get_link);
			$('#modal-basic').modal('show');
		});
	});
</script>
{{--Ajax Change Order --}}
<script type="text/javascript">
	$(":input.order-ajax").bind('keyup mouseup', function () {
          var get_link = $(this).data('link');
          var get_value = $(this).val();
          $.ajax({
          	type:"GET",
          	url: get_link,
          	data: "order=" + get_value,
          	success:function(html){}
          });
	});
</script>
@endsection