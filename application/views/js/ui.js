$(function() {

	// phone nav buttons (close one when the other one is triggered)
	$('#navbarMenuButton').click(function(){
		$('#navbarSearch').collapse('hide')
	})
	$('#navbarSearchButton').click(function(){
		$('#navbarMenu').collapse('hide')
	})

  // search tabs
	$(".search-tabs li").click(function(e) {
	  e.preventDefault();
	  $(".search-tabs li").removeClass("active");
		$(this).addClass("active");
		
		if($(this).hasClass('brand') || $(this).hasClass('generic')) {
			$('.alphabets').removeClass('hide')
		} else {
			$('.alphabets').addClass('hide')
		}
	});
	// search radio in nav
	$('input[name="search-category"]').click(function(){
		if($(this).val() === 'brand' || $(this).val() === 'generic') {
			$('.alphabets').removeClass('remove')
		} else {
			$('.alphabets').addClass('remove')
		}
	})

	// home product slider
	$('#home-product-slider').slick({
	  slidesToScroll: 1,
		slidesToShow: 3,
	  autoplay: true,
	  autoplaySpeed: 1000,
		infinite: true,
    arrows: false,
		responsive: [
		 {
			 breakpoint: 480,
			 settings: {
				 slidesToShow: 2,
			 }
		 }
	 ]
	});

	// image viewer
	var viewer = ImageViewer();
	$('.gallery-items').click(function () {
		var imgSrc = this.src,
				highResolutionImage = $(this).data('high-res-img');

		viewer.show(imgSrc, highResolutionImage);
	});

	

	// end of ui.js
});
