jQuery(window).load(function() {
    jQuery('.flexslider').flexslider({
        animation: "fade",
        prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        start: function(slider) {
            jQuery('.flexslider').removeClass('loading');
        }
    });
});
jQuery(document).ready(function(e) {
    jQuery(".btn_animation_click").click(function() {
        jQuery(this).addClass('btn_animation_click_active');
        setTimeout(function() {
            jQuery(".btn_animation_click").removeClass('btn_animation_click_active');
        }, 300);
    });
});
jQuery(document).ready(function(e) {
    jQuery('.footer-col > h4').append('<span class="toggle"></span>');
    if (jQuery(this).find('span').attr('class') == 'toggle opened') {
        jQuery(this).find('span').removeClass('opened').parents('.footer-col').find('.footer-col-content').slideToggle(300);
    }
    jQuery('.footer-col h4').on("click", function() {
        if (jQuery(this).find('span').attr('class') == 'toggle opened') {
            jQuery(this).find('span').removeClass('opened').parents('.footer-col').find('.footer-col-content').slideToggle(300);
        } else {
            jQuery(this).find('span').addClass('opened').parents('.footer-col').find('.footer-col-content').slideToggle(300);
        }
    });
    jQuery('.footer-col>.footer-col-content>ul').filter(function() {
        if (jQuery(this).children("li").length == 0) {
            jQuery(this).parents('.footer-col').addClass('display_none_more');
        }
    });
});
jQuery(function() {
    jQuery('body').append('<div id="back-top"><i class="fa fa-angle-up"></i></div>');
    jQuery('#back-top').hide();
    if (jQuery(this).offset() > 200) {
        jQuery('#back-top').fadeIn();
    } else {
        jQuery('#back-top').fadeOut();
    }
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 200) {
            jQuery('#back-top').fadeIn();
        } else {
            jQuery('#back-top').fadeOut();
        }
    });
    jQuery(window).load(function() {
        if (jQuery(this).scrollTop() > 200) {
            jQuery('#back-top').fadeIn();
        } else {
            jQuery('#back-top').fadeOut();
        }
    });
    jQuery('#back-top').click(function() {
        jQuery('body,html').stop(false, false).animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});
$(".menu_left").click(function() {
    $(".menu_position_mobile").toggle();
});
jQuery(document).ready(function() {
    $('.menu_dropdown').find('li.parent').append('<strong></strong>');
    $('.menu_dropdown li.parent strong').on("click", function() {
        if ($(this).attr('class') == 'opened') {
            $(this).removeClass().parent('li.parent').find('> ul').slideUp('fast');
        } else {
            $(this).addClass('opened').parent('li.parent').find('> ul').slideDown('fast');
        }
        $('ul.menu_dropdown>li.parent>ul').filter(function() {
            if ($(this).children("li").length == 0) {
                $(this).parents('li.parent').addClass('display_none_more');
            }
        });
    });
});
jQuery('.map-container').click(function() {
    jQuery(this).find('iframe').addClass('clicked')
}).mouseleave(function() {
    jQuery(this).find('iframe').removeClass('clicked')
});
$('#owl-our_logo').owlCarousel({
    loop: true,
    margin: 5,
    pagination: false,
    items: 7,
    nav: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    autoplaySpeed: 1500,
    autoplay: true,
    dots: false,
    loop: true,
    paginationNumbers: false,
    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    responsiveClass: true,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 4
        },
        1000: {
            items: 7
        }
    }
});
$('#owl-pro_detail').owlCarousel({
    loop: true,
    margin: 3,
    pagination: false,
    items: 5,
    nav: true,
    loop: true,
    paginationNumbers: false,
    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    responsiveClass: true,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
});
    jQuery(".formcm").hide();
        jQuery(".formcm_con").hide();
        jQuery(document).ready(function () {
            jQuery(".showhide").click(function(){
                jQuery(".formcm").fadeToggle(200);
            });
            jQuery(".comment-comment-reply").click(function(){
                    jQuery(this).parents('.reply').find('.formcm_con').fadeToggle(200);
            });
        }); 
  jQuery(function() {
     jQuery("img.lazy").lazyload({
         effect : "fadeIn"
     });

  });