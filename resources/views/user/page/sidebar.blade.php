<div class="sidebar">
	@if(isset($ConfigsText['banner_aside']) && isset($ConfigsText['show_banner_aside']) && $ConfigsText['show_banner_aside'] == 1 )
	<div class="banner-top">
		<img src="{{isset($ConfigsText['banner_aside']) ? $ConfigsText['banner_aside'] : ''}}" alt="Banner Aside" />
	</div>
	@endif
</div>