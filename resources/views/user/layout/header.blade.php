<header>
	<section class="header-top only-pc">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					@if(isset($ConfigsText['logo']) && isset($ConfigsText['show_logo']) && $ConfigsText['show_logo'] == 1 )
					<div class="logo">
						<a href="/"><img src="{{isset($ConfigsText['logo']) ? $ConfigsText['logo'] : ''}}" alt="logo"></a>
					</div>
					@endif
				</div>
				<div class="col-lg-8">
					@if(isset($ConfigsText['banner']) && isset($ConfigsText['show_banner']) && $ConfigsText['show_banner'] == 1 )
					<div class="banner-top">
						<a href="#" target="_blank">
						<img src="{{isset($ConfigsText['banner']) ? $ConfigsText['banner'] : ''}}" alt="Banner" />
						</a>
					</div>
					@endif
				</div>
			</div>
		</div>
	</section>
	<div class="menu-main">
		<div class="header-menu-t1"></div>
		<section class="header-menu">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="wsmenucontainer clearfix">
							<div class="overlapblackbg"></div>
							<div class="wsmobileheader clearfix"> <a id="wsnavtoggle" class="animated-arrow"><span></span></a> </div>
							<div class="header">
								<!--Main Menu HTML Code-->
								<nav id="" class="wsmenu clearfix">
									<ul class="mobile-sub wsmenu-list ul-1" >
										<li style="padding: 0;" class="title icon-home @if(url()->current() == url('/')) active @endif""><a style="padding: 0 15px;line-height: 55px;line-height: 55px;" href="{{url('/')}}"><img style="height: 20px;" src="{{asset('style/images/home.svg')}}" alt=""></a></li>
										@if(isset($get_menu_cat) && !empty($get_menu_cat))
										@foreach($get_menu_cat as $item)
										<?php 
											$get_url = $item['slug'];
										?>
										<li class="title {{ setActive($get_url.'.html', 'active') }} {{isset($slug_cat) && $slug_cat == $get_url ? 'active' : ''}}"><a href="{{$get_url}}.html">{{$item['title']}}</a></li>
										@endforeach
										@endif
										<li class="title {{isActive('page.contact','active') }}"><a href="{{route('page.contact')}}">Liên hệ</a></li>
										<li class="menu-search only-mobile">
	                                        <a href="#" class="last-menu" style="padding: 0 15px;line-height: 55px;line-height: 55px;"><img style="height: 20px;" src="{{asset('style/images/icon-search.png')}}" alt=""> <span class="only-mobile">Tìm kiếm</span></a>
	                                        <div class="megamenu halfdiv">
	                                            <form class="menu_form" method="get" action="<form class="menu_form" method="GET" action="{{route('page.search')}}">">
	                                                <input type="text" name="q" placeholder="Nhập nội dung tìm kiếm..." autocomplete="off">
	                                                <button type="submit" class="btn btn-info pull-right" style="font-size: 13px;padding: 3px 10px;">Tìm kiếm</button>
	                                            </form>
	                                        </div>
	                                    </li>
									</ul>
									<ul class="mobile-sub wsmenu-list ul-2">
										<li class="menu-search" style="padding: 0;">
	                                        <a href="#" class="last-menu" style="padding: 0 15px;line-height: 55px;line-height: 55px;"><img style="height: 20px;" src="{{asset('style/images/icon-search.png')}}" alt=""> <span class="only-mobile">Tìm kiếm</span></a>
	                                        <div class="megamenu halfdiv">
	                                            <form class="menu_form" method="GET" action="{{route('page.search')}}">
	                                                <input type="text" name="q" placeholder="Nhập nội dung tìm kiếm..." autocomplete="off">
	                                                <button type="submit" class="btn btn-info pull-right" style="font-size: 13px;padding: 3px 10px;">Tìm kiếm</button>
	                                            </form>
	                                        </div>
	                                    </li>
										<!-- <li class="only-mobile"><a href="#">Ngôn ngữ</a>
											<ul class="wsmenu-submenu">
												<li><a href="#">Tiếng Việt</a></li>
												<li><a href="#">English</a></li>
											</ul>
										</li> -->
									</ul>
								</nav>
								<!--Menu HTML Code--> 
							</div>
						</div>
					</div>
					<div class="col-sm-12 only-mobile">
						@if(isset($ConfigsText['logo']) ? $ConfigsText['logo'] : '')
						<div class="logo text-center">
							<a href="/"><img src="{{isset($ConfigsText['logo']) ? $ConfigsText['logo'] : ''}}" alt="logo" style="width: 140px;padding: 10px 0;"></a>
						</div>
						@endif
					</div>
				</div>
			</div>
		</section>
		<div class="header-menu-t2"></div>
	</div>
	<div class="banner-top text-center only-mobile">
		@if(isset($ConfigsText['banner']) ? $ConfigsText['banner'] : '')
		<div class="banner-top">
			<a href="#" target="_blank">
			<img src="{{isset($ConfigsText['banner']) ? $ConfigsText['banner'] : ''}}" alt="Banner" />
			</a>
		</div>
		@endif
	</div>
</header>