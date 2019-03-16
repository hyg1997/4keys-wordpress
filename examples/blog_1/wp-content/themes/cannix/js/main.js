jQuery(document).ready(function($){

    "use strict";

/*---------------------------------------*/
/* Sticky Header Nav                     */
/*---------------------------------------*/

     var nav = $('.site-header');
     var body = $('body');
     var search = $('.site-search');
     var headerheight = $(".site-header").outerHeight();
     var logoheight = $(".site-header .logo").outerHeight();
     var bodymargin = headerheight - logoheight;
    
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 480) {
            nav.addClass("fixed").css("margin-top", "-" + headerheight + "px" );
            body.addClass("body-fix").css("margin-top", "" + headerheight + "px" );
            search.css("margin-top", "-" + headerheight + "px" );
        } else {
            nav.removeClass("fixed").css("margin-top", "" );
            body.removeClass("body-fix").css("margin-top", "" );
            nav.removeClass("slideup");
            search.css("margin-top", "" );
        }
        if ($(this).scrollTop() > headerheight + 840) {
            nav.addClass("slidedown");
            nav.addClass("slideup");
        } else {
            nav.removeClass("slidedown");
        }
    });

/*---------------------------------------*/
/* Slide Menu Sidebar                    */
/*---------------------------------------*/

$(".sticky-menu i, .toggle-menu i, .slide-menu .close i").on('click', function() {
        $(".mobile-navigation").toggleClass("show");
        $("html").toggleClass("inactive");
        $(".body-fade").fadeToggle(400);

        // Check for an active search form and close it
        if($('.site-header .search-form').hasClass('show-search')) {
           $(".site-header .search-form").slideToggle(300);
           $(".site-header .search-form").toggleClass("show-search");
           // Toggle the close icon
           $('li.search i.fa-search').toggle();
          $('li.search i.fa-close').toggle();
        }
});

// Expand the parent/child menu
$('.slide-menu ul.primary-nav-sidebar li.menu-item-has-children > a').on('click', function(event){
    event.preventDefault();
   $(this).next('.sub-menu').slideToggle(200);
   $(this).toggleClass("close");
});

/*---------------------------------------*/
/* Search drop down                      */
/*---------------------------------------*/

  $("li.toggle-search i, .site-search i").on('click', function() {
        $(".site-search").fadeToggle(300);
        $(".site-search").toggleClass("show-search");

        // Focus the cursor on the search field when it's visible
        $(".site-search.show-search .search-field").focus();

        // Remove focus when not visible
        $('.site-search:not(.show-search) .search-field').blur();

        if($('.mobile-navigation').hasClass("show")) {
               $(".mobile-navigation").toggleClass("show");
               $(".body-fade").fadeToggle(300);
            }

});

/*---------------------------------------*/
/* ESC key close of open toggle elements */
/*---------------------------------------*/

$(document).keyup(function(e) { 
        if (e.keyCode == 27) { // esc keycode
            if($(".site-search").hasClass("show-search")) {
               $(".site-search").fadeToggle(300);
               $(".site-search").toggleClass("show-search");
            }
            if($('.mobile-navigation').hasClass("show")) {
               $(".mobile-navigation").toggleClass("show");
               $(".body-fade").fadeToggle(500);
            }
        }
    });

/*---------------------------------------*/
/* smooth scroll to top                  */
/*---------------------------------------*/
$(".backtotop").on('click', function(event){
    event.preventDefault();
    $('body,html').animate({
        scrollTop: 0 ,
        }, 1000
    );
});
/*---------------------------------------*/
/* smooth scroll anchor links            */
/*---------------------------------------*/
$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 800);
});

/*---------------------------------------*/
/* Wp Instagram Widget                   */
/*---------------------------------------*/

// Add .cols class equal to the number of items for each instance of the widget
$("footer ul.instagram-pics").each(function(){
var cols = $("li", this).length;
// If we have more than 6 we'll divide the number so we can create two rows of pics
if (cols > 6 ) {
    cols = cols / 2;
}
$(this).addClass("pics"+ cols +"");

});

});

