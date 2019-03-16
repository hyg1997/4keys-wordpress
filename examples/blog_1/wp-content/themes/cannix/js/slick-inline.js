/*---------------------------------------*/
/* Slick Inline JS                       */
/*---------------------------------------*/

jQuery(document).ready(function($) {

	"use strict";
	
	// See how many slides we want to show
	var slidenum = $(".slider").attr("data-slides");

	if ( slidenum == 2 ) {

			$(".slider").slick({
				dots: true,
				infinite: true,
				autoplay: true,
				autoplaySpeed: 4000,
				speed: 800,
				slidesToShow: + slidenum,
					responsive: [
					{
						breakpoint: 1301,
						settings: {
							slidesToShow: 1,
						}
					},
					]
			});
		} else {

			$(".slider").slick({
				dots: false,
				infinite: true,
				autoplay: true,
				autoplaySpeed: 3000,
				speed: 800,
				slidesToShow: 1,
			}); 

		}
	$(".pre-content .post-carousel, .footer-content .post-carousel, .hero-content .post-carousel").slick({
		dots: false,
		arrows: true,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 3000,
		speed: 800,
		slidesToShow: 4,
		slidesToScroll: 2,
		responsive: [
		{
			breakpoint: 1160,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 961,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		},
		]
	});
	$(".slick-gallery").slick({
				dots: true,
				infinite: true,
				autoplay: true,
				autoplaySpeed: 3000,
				speed: 800,
			});
	});
