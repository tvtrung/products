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
</style>
<style type="text/css">
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
	    background: #347ab6;
	}
	.modal .modal-content .modal-title {
		color: #FFF!important;
	    font-size: 13px;
	    text-align: center;
	    font-weight: 400;
	    width: 100%;
	}
	.modal .modal-content .modal-footer{
		padding-top: 10px;
	    padding-bottom: 10px;
	}
</style>
@endsection
@section('content')
	<div class="page-content-wrapper">
	    <div class="page-content">
	        <h3 class="page-title">Liên hệ</h3>
	        <div class="portlet-body">
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
                            <th class="center" style="width: 40px">STT</th>
				            <th class="">Email</th>
				            <th class="">Nội dung</th>
				            <th class="center">Thời gian</th>
				            <th class="center" style="width: 150px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@if(!is_null($data))
				    	@php $i = 0;  @endphp
						@foreach($data as $item)
						@php $i++;  @endphp
				        <tr>
				        	<td class="center">{{ $i }}</td>
				            <td>{{ $item->email }}</td>
				            <td>{{ substr($item->content,0,70) }}...</td>
				            <td class="center">Ngày: {{date('d/m/Y h:m:s', strtotime($item->created_at))}}</td>
				            <td class="center btn-action" style="width: 120px;">
				            	<a href="#" data-id="{{ $item->id }}" onclick="return false;" class="btn btn-success m-btn m-btn--icon btn-view-detail"><span>Xem</span></a>
				            	<a href="#" data-toggle="modal" data-target="#m_modal" data-id='{{$item->id}}' class="btn btn-danger m-btn m-btn--icon ajax-btn-delete"><span>Xóa</span></a>
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
	    $('#sample_1').DataTable();
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.ajax-btn-delete').on('click', function(){
			var get_id = $(this).attr('data-id');
			var link_del = "{{route('admin.newletter.index')}}" + "/" + get_id + "/delete";
			$('#m_modal .modal-footer a').attr('href',link_del);
		});
		
	});	
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.table_faq tbody').on('click','tr .btn-view-detail', function(){
			var get_id = $(this).attr('data-id');
			$.ajax({
                type:"GET",
                url:"{{route('admin.newletter.index')}}" + "/" + get_id + "/view-detail",
                success: function(html){
                	$('#m_modal_view .modal-body').html(html);
                	$('#m_modal_view').modal('show');
                }
            });
		});
	});
</script>
@endsection