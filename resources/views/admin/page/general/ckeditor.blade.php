<script type="text/javascript" src="/style/editor/ckeditor/ckeditor.js"></script>
<script>
	$('.ckeditor').each(function(index, el) {
		var attr = $(this).attr('name');
		CKEDITOR.replace( attr, {
			filebrowserBrowseUrl: '{{route('upload_editor')}}',
			filebrowserImageBrowseUrl: '{{route('upload_editor') . "?type=Images"}}',
			filebrowserFlashBrowseUrl: '{{route('upload_editor') . "?type=Flash"}}',
			filebrowserUploadUrl: '{{ asset('/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
			filebrowserImageUploadUrl: '{{ asset('/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
			filebrowserFlashUploadUrl: '{{ asset('/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
		});
	});
</script>