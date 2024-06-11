(function($) {
"use strict";

$('.grid').imagesLoaded( function() {
	
	
	// testimonials 1 slick slider
$(document).on('ready', function() {
  $(".testimonials1").slick({
    lazyLoad: 'ondemand', 
    infinite: true,
		arrows: false,
		dots: true,
		slidesToShow: 1,
    slidesToScroll: 1
  });
});

	// testimonials b slick slider
$(document).on('ready', function() {
  $(".testimonialsb").slick({
    lazyLoad: 'ondemand', 
    infinite: true,
		arrows: false,
		dots: true,
		slidesToShow: 1,
    slidesToScroll: 1
  });
});


// filter team
var $grid = $('.grid').isotope({
  itemSelector: '.element-item',
	masonry: {
  },
  getSortData: {
    name: '.name',
    symbol: '.symbol',
    number: '.number parseInt',
    category: '[data-category]',
    weight: function( itemElem ) {
      var weight = $( itemElem ).find('.weight').text();
      return parseFloat( weight.replace( /[\(\)]/g, '') );
    }
  }
});

// filter functions
var filterFns = {
  // show if number is greater than 50
  numberGreaterThan50: function() {
    var number = $(this).find('.number').text();
    return parseInt( number, 10 ) > 50;
  },
  // show if name ends with -ium
  ium: function() {
    var name = $(this).find('.name').text();
    return name.match( /ium$/ );
  }
};

// bind filter button click
$('#filters').on( 'click', 'button', function() {
  var filterValue = $( this ).attr('data-filter');
  // use filterFn if matches value
  filterValue = filterFns[ filterValue ] || filterValue;
  $grid.isotope({ filter: filterValue });
});


// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});
});  

//toggle button
$(document).ready(function () {
  $('.first-button').on('click', function () {
    $('.animated-icon1').toggleClass('open');
  });
});


//scroll to top button
$(document).ready(function() {
$(window).scroll(function() {
if ($(this).scrollTop() > 400) {
$('#toTopBtn').fadeIn();
} else {
$('#toTopBtn').fadeOut();
}
});
$('#toTopBtn').click(function() {
$("html, body").animate({
scrollTop: 0
}, 1000);
return false;
});
});


//hamburger nav
$(document).ready(function(){
  $('.nav-button').click(function(){
	$('body').toggleClass('nav-open');
  });
});

/* dropdown small screen navigation menu */
$(document).ready(function(){
$('.menu-item-has-children > span.icon').on('click', function () {
    var $this = $(this).parent();
    $this.toggleClass("dropdown");
});
});

//youtube popup video 
function newMagnificIframe(){
    var $start = 0;
    var $iframe = {
        patterns: {
            youtube: {
                index: 'youtu', 
                id: function(url) {   

                    var m = url.match( /^.*(?:youtu.be\/|v\/|e\/|u\/\w+\/|embed\/|v=)([^#\&\?]*).*/ );
                    if ( !m || !m[1] ) return null;

                        if(url.indexOf('t=') != - 1){

                            var $split = url.split('t=');
                            var hms = $split[1].replace('h',':').replace('m',':').replace('s','');
                            var a = hms.split(':');

                            if (a.length == 1){

                                $start = a[0]; 

                            } else if (a.length == 2){

                                $start = (+a[0]) * 60 + (+a[1]); 

                            } else if (a.length == 3){

                                $start = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 

                            }
                        }                                   

                        var suffix = '?autoplay=1';

                        if( $start > 0 ){

                            suffix = '?start=' + $start + '&autoplay=1';
                        }

                    return m[1] + suffix;
                },
                src: '//www.youtube.com/embed/%id%'
            },
            vimeo: {
                index: 'vimeo.com/', 
                id: function(url) {        
                    var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
                    if ( !m || !m[5] ) return null;
                    return m[5];
                },
                src: '//player.vimeo.com/video/%id%?autoplay=1'
            }
        }
    };
    return $iframe;    
}
$(document).ready(function() {
  $('.yt-video').magnificPopup({
    type: 'iframe',
		iframe: newMagnificIframe()
  });
});
   
  //preloader
  $('.preloader').fadeOut(700,function(){$(this).remove();})

//for closing mobile menu when page back
window.addEventListener('beforeunload', function (e) {
    $('.navbar-collapse').removeClass('show');
});

	 
})(jQuery);