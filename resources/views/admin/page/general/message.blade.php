<div class="row">
	<div class="col-md-12">
		@if(session('success'))
			<div class="alert alert-success update-alert">   
			<li>{{ session('success') }}</li>
			</div>
		@endif
		@if(session('fail'))
			<div class="alert alert-danger update-alert">   
			<li>{{ session('fail') }}</li>
			</div>
		@endif
	</div>
	<div class="col-md-12">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</div>
		@endif
	</div>
</div>