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
	.center{
		text-align: center;
	}
	#m_modal_view .modal-body .title{
		font-weight: bold;
		font-size: 13px;
		color: #000;
	}
	#m_modal_view .modal-body .content{
		font-size: 13px;
		line-height: 25px;
	}
	.modal .modal-content .modal-header {
	    padding-top: 10px;
	    padding-bottom: 10px;
	}
	.modal .modal-content .modal-footer{
		padding-top: 10px;
	    padding-bottom: 10px;
	}
	.modal .modal-content .modal-header {
	    padding-top: 10px;
	    padding-bottom: 10px;
	    background: #347ab6;
	}
	.modal .modal-content .modal-title {
		color: #FFF!important;
	    font-size: 13px;
	    text-align: center;
	    font-weight: 400;
	    width: 100%;
	}
</style>
@endsection
@section('content')
	<div class="page-content-wrapper">
	    <div class="page-content">
	        <h3 class="page-title">Câu hỏi của Khách hàng</h3>
	        <div class="portlet-body">
	        	<div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                            	<a href="{{route('admin.faq.create')}}">
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
                <table class="table table-striped table-bordered table-hover table-checkable order-column table_faq" id="sample_1">
                    <thead>
                        <tr>
                            <th class="center">STT</th>
				            <th class="center">Tên</th>
				            <th class="center">Email</th>
				            <th class="center">Website</th>
				            <th class="center">Câu hỏi</th>
				            <th class="center">Thời gian</th>
				            <th class="center">Hiển thị</th>
				            <th class="center"></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@if(!is_null($data))
						@foreach($data as $item)
				        <tr>
				        	<td class="center"><input type="number" name="order" class="order-ajax" data-id="{{$item->id}}" value="{{ $item->order }}"  style="width: 50px!important;"></td>
				            <td class="fullname">{{ $item->name }}</td>
				            <td>{{ $item->email }}</td>
				            <td>{{ $item->website }}</td>
				            <td>{{ $item->question }}</td>
				            <td class="center" style="width: 130px;">Ngày: {{ date('d/m/Y', strtotime($item->created_at)) }}</td>
				            <td class="center">
				            	<label class="switch">
                                    <input type="checkbox" class="switch-ajax" value="{{$item->id}}" @if($item->status == 1) checked='checked' @endif>
                                    <span class="slider round"></span>
                                </label>
				            </td>
				            <td class="center btn-action" style="width: 160px;">
				            	<button type="button" class="btn btn-primary btn-view-detail" data-id="{{ $item->id }}" title="View""><i class="fa fa-eye"></i></button>
                            	<a href="{{route('admin.faq.edit',['id'=>$item->id])}}"><button type="button" class="btn yellow-crusta" title="Edit"><i class="fa fa-edit"></i></button></a>
                            	<button data-toggle="modal" data-target="#m_modal" type="button" class="btn red ajax-btn-delete" data-id='{{$item->id}}' title="Delete"><i class="fa fa-trash"></i></button> 
				            </td>
				        </tr>
						@endforeach
						@endif
                    </tbody>
                </table>
            </div>
	    </div>
	</div>
	<!--begin::Modal-->
	<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
				</div>
				<div class="modal-body">
					Bạn có chắc muốn xóa mục này?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<a href=""><button type="button" class="btn btn-danger">Xóa</button></a>
				</div>
			</div>
		</div>
	</div>
	<!--end::Modal-->
	<!--begin::Modal-->
	<div class="modal fade" id="m_modal_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nội dung chi tiết</h5>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
	<!--end::Modal-->
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
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.ajax-btn-delete').on('click', function(){
			var get_id = $(this).attr('data-id');
			var link_del = "{{route('admin.faq.index')}}" + "/" + get_id + "/delete";
			$('#m_modal .modal-footer a').attr('href',link_del);
		});
		
	});	
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.table_faq tbody').on('click','tr .switch-ajax', function(){
			$.ajax({
                type:"GET",
                url:"{{route('admin.faq.switch_ajax')}}",
                data:"id=" + $(this).val(),
                success: function(html){

                }
            });
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.table_faq tbody').on('click','tr .btn-view-detail', function(){
			var get_id = $(this).attr('data-id');
			$.ajax({
                type:"GET",
                url:"{{route('admin.faq.view_detail')}}",
                data:"id=" + get_id,
                success: function(html){
                	$('#m_modal_view .modal-body').html(html);
                	$('#m_modal_view').modal('show');
                }
            });
		});
	});
</script>
<script type="text/javascript">
	$(":input.order-ajax").bind('keyup mouseup', function () {
          var get_id = $(this).attr('data-id');
          var get_value = $(this).val();
          $.ajax({
          	type:"GET",
          	url: "{{route('admin.faq.ajax_order')}}",
          	data: 'id=' + get_id + '&value=' + get_value,
          	success:function(html){}
          });
	});
</script>
@endsection