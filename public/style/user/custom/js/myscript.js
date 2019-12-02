$(document).ready(function() {
	function scroll_fixed_menu(){
	    var d_menu_top = $(".header-menu-t1").offset().top - $(window).scrollTop();
	    var height_menu = $('.header-menu').height();
	    //console.log(d_menu_top);
	    if(d_menu_top < 0){
	        $('.header-menu').addClass('header-menu-fixed');
	        $('.header-menu-t2').css('height',height_menu + "px");
	        //$("#wsnavtoggle").css("top", "0px");
	    }
	    else{
	        $('.header-menu').removeClass('header-menu-fixed');
	        $('.header-menu-t2').css('height',"0px");
	        //$("#wsnavtoggle").css("top",d_menu_top-5 + "px");
	    }
	};
	scroll_fixed_menu();
	$(document).scroll(function() {
	    scroll_fixed_menu();
	});
});
// $(document).ready(function() {
// 	var owl = $(".owl-carousel-1");
// 	owl.owlCarousel({
// 	itemsCustom : [
// 	[0, 2],
// 	[450, 2],
// 	[600, 2],
// 	[700, 3],
// 	[1000, 3],
// 	[1200, 3],
// 	[1400, 3],
// 	[1600, 3]
// 	],
// 	navigation : true,
// 	autoPlay:true,
// 	});
// 	$('.posts-carousel span.btn-left').click(function() {
// 	    owl.trigger('owl.prev');
// 	});
// 	$('.posts-carousel span.btn-right').click(function() {
// 	    owl.trigger('owl.next');
// 	})
// });
