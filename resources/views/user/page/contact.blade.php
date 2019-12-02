@extends('user.layout.index')
@section('title',isset($ConfigsTextSEO['contact_title']) ? $ConfigsTextSEO['contact_title'] : '')
@section('keywords',isset($ConfigsTextSEO['contact_keyword']) ? $ConfigsTextSEO['contact_keyword'] : '')
@section('description',isset($ConfigsTextSEO['contact_description']) ? $ConfigsTextSEO['contact_description'] : '')
@section('style')
@endsection
@section('content')
<section class="page-contact">
	<div class="content">
		<div class="container">
			@include('user.page.general.message')
			<div class="bread-crumb">
				<a href="/">Trang chủ</a>
				<i class="fa fa-angle-right" aria-hidden="true"></i>
				<span>Liên hệ</span>
			</div>
			<div class="row">
				<div class="col-xl-6 col-lg-6">
					<div class="box-info">
						<div class="title">Công ty TNHH Lady Lash</div>
						<div class="box-addr">
							<div class="row">
								<div class="col-sm-6">
									<ul class="address">
										<li>Hồ Chí Minh</li>
										<li>27 Út Tịch, Phường 4, Quận Tân Bình, Thành phố Hồ Chí Minh</li>
										<li>0909 24 14 95 - 0936 23 32 96 </li>
									</ul>
								</div>
								<div class="col-sm-6">
									<ul class="address">
										<li>Pháp</li>
										<li>761 Route de closel et claritere
											Faverges-De-La-Tour, Rhone-Alpes, France 38110</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="box-info">
						<div class="title">&nbsp;</div>
						<div class="box-support">
							<div style="font-weight: bold;">LÔNG MI GIẢ CAO CẤP luôn mong muốn trở thành người đầu tiên trong lĩnh vực giáo dục và đào tạo lĩnh vực chăm sóc sắc đẹp.</div>
							<div>
								Chuyện nghiệp, tận tình và áp dụng kỹ thuật hiện đại là những gì Lông MI Giả Cao Cấp đã mang đến cho nhiều khách hàng và học viên khi sử dụng dịch vụ hoặc học tập với chúng tôi.
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
			<br>
			<div class="row map">
				<div class="col-sm-6">
					<div class="title">Hồ Chí Minh</div>
					<div class="iframe-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2771.3058876089317!2d106.65766260292752!3d10.794580135579205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175293383b8f64f%3A0x362d57a54472e8e2!2zMjcgw5p0IFThu4tjaCwgUGjGsOG7nW5nIDQsIFTDom4gQsOsbmgsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1574759424843!5m2!1svi!2s" width="600" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					</div>
					<br>
				</div>
				<div class="col-sm-6">
					<div class="title">Pháp</div>
					<div class="iframe-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2792.0988861133496!2d5.511733314955077!3d45.58855683315896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478b228dd29f7da1%3A0x93d6f757391342c8!2s761%20Route%20de%20Closel%20et%20Clariti%C3%A8re%2C%2038110%20Faverges-de-la-Tour%2C%20Ph%C3%A1p!5e0!3m2!1svi!2s!4v1574759488071!5m2!1svi!2s" width="600" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="form-contact">
	<div class="container">
		<div class="row" style="
		align-items: center;
    	justify-content: center;
    	display: flex;">
			<div class="col-md-6">
				<div class="box">
					<div class="text-center">
						<strong>Gửi thông tin liên hệ</strong>
					</div>
					<form class="style-form" action="{{route('page.post-contact')}}" method="POST">
						@csrf
						<div class="form-group">
							<label>Họ tên:</label>
							<input type="text" class="form-control" placeholder="Họ tên" name="name" value="{{old('name')}}">
						</div>
						<div class="form-group">
							<label>Số điện thoại:</label>
							<input type="text" class="form-control" placeholder="Số điện thoại" name="phone" value="{{old('phone')}}">
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
						</div>
						<div class="form-group">
							<label>Nội dung:</label>
							<textarea class="form-control" placeholder="Nội dung" rows="8" name="content">{{old('content')}}</textarea>
						</div>
						<button type="submit" class="btn btn-warning">Gửi liên hệ</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<br>
@endsection