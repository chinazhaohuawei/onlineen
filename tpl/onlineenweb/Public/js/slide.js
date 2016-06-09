(function($){
	$(function () {

		slide('.slide');

		function slide(element, btn, auto) {

			// 开关
			if ( typeof btn == 'undefined' ) {
				var btn = true;
			}
			if ( !btn ) {
				return false;
			}
			// 自动轮播
			if (auto === null) {
				var iTmer = setInterval(goRight, 4000);
			}else if( auto ){
				var iTmer = setInterval(goRight, 4000);
			}
			
			// 点击向左滚动
			var slide = $('.slide');
			$('.slide a:eq(0)').bind('click', function () {
				clearInterval(iTmer);
				if ( $('.slide ul').is(':animated') ) {
					return false;
				}
				var iLeft = $('.slide ul').offset().left + parseInt(slide.css('width'));
				if ($('.slide ul').offset().left >= 0) {
					iLeft = -parseInt(slide.css('width')) * (slide.find('li').length-1);
				}
				$('.slide ul').animate({'left': iLeft}, 'slow', function(){
					iTmer = setInterval(goRight, 4000);
				});
				return false;
			});
			// 点击向右滚动
			$('.slide a:eq(1)').bind('click', function () {
				clearInterval(iTmer);
				if ( $('.slide ul').is(':animated') ) {
					return false;
				}
				var iLeft = $('.slide ul').offset().left - parseInt(slide.css('width'));
				if ($('.slide ul').offset().left <= -parseInt(slide.css('width')) * (slide.find('li').length-1)) {
					iLeft = 0;
				}
				$('.slide ul').animate({'left': iLeft}, 'slow', function(){
					iTmer = setInterval(goRight, 4000);
				});
				return false;
			});

			function goRight() {
				if ( $('.slide ul').is(':animated') ) {
					return false;
				}
				var iLeft = $('.slide ul').offset().left;
				iLeft -= parseInt(slide.css('width'));
				if ( iLeft <= ($('.slide').width() - $('.slide ul').width()) ) {

					iLeft = 0;
				}

				$('.slide ul').animate({'left' : iLeft}, 'slow');
				return false;
			}
		}	
	});
})(jQuery);