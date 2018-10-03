import $ from 'jquery';
import AOS from 'aos';

(function ($) {
    $.fn.matchMaxHeight = function () {
        var items = $(this);
        $(items).attr('style', '');
        $(items).css({});
        var max = 0;
        for (var i = 0; i < items.length; i++) {
            max = max < $(items[i]).height() ?
                $(items[i]).height() : max;

        }
        $(items).css({'display': 'block', 'height': '' + max + 'px'});
    }
})(jQuery);

$(window).on("load", () => {
    starter.main.init();
    starter.main.resize();
    starter.main.autoscroll();
});

$(window).on("resize", () => {
    starter.main.resize();
    starter.main.orientationchange();
});

$(window).scroll(() => {
    starter.main.scroll();
    starter.main.menu_light();
});

const starter = {
    _var: {
        window_is_load: false,
        owl_products_retro : null,
        owl_products_modern : null,
    },

    main: {
        init: function () {
            starter.main.onClick();
            starter.main.onChange();
            starter.main.onSubmit();
            starter.main.owl();
            starter.main.twentytwenty();
            starter.main.orientationchange();
            starter.main
            // starter.main.selectbox();

            // starter.datepicker.init();

            AOS.init();
        },

        resize: function () {
            starter.effects.matchMaxHeight();
        },

        onClick: function () {
            $(document).on('click', '#products .retro .owl-carousel-prev', function(){
                starter._var.owl_products_retro.trigger('prev.owl.carousel');

                return false;
            });

            $(document).on('click', '#products .retro .owl-carousel-next', function(){
                starter._var.owl_products_retro.trigger('next.owl.carousel');

                return false;
            });

            $(document).on('click', '#products .modern .owl-carousel-prev', function(){
                starter._var.owl_products_modern.trigger('prev.owl.carousel');

                return false;
            });

            $(document).on('click', '#products .modern .owl-carousel-next', function(){
                starter._var.owl_products_modern.trigger('next.owl.carousel');

                return false;
            });

            $(document).on('click', '#top nav.navbar .hamburger', function(){
                // $('section#top').css({'overflow': 'visible'});
                $('.container-menu').toggleClass( "showed" );

                if( $(this).hasClass("is-active") )
                {
                    $(this).removeClass("is-active");
                } else {
                    $(this).addClass("is-active");
                }
                return false;
            });

            $(document).on('click', '.home .container-menu ul.navbar-nav li a', function(){
                var attri = $(this).data('href');

                if( $(attri).length > 0 )
                {
                    event.preventDefault();
                    history.pushState(null,null,$(this).attr("href"));

                    $('.container-menu').toggleClass( "showed" );
                    $('#top nav.navbar .hamburger').removeClass("is-active");

                    var offset = Math.abs($(attri).position().top);
                    $('html, body').animate({scrollTop:offset - 113}, 1000);

                    return false;
                } else {
                    //window.location.replace(url_home + $(this).attr("href"));
                }
                return true;
            });
        },

        onChange: function () {
        },

        onSubmit: function () {
        },

        scroll: function () {
            if ($(window).scrollTop() > 40) {
                $('section#top').addClass('small');
                $('.scroll-to-top').addClass('show-me');
            } else {
                $('section#top').removeClass('small');
                $('.scroll-to-top').removeClass('show-me');
            }
        },

        owl: function () {
            if ($("#products .retro .owl-carousel").length > 0) {
                starter._var.owl_products_retro = $("#products .retro .owl-carousel").owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1,
                            slideBy: 1,
                        },
                        992: {
                            items: 2,
                            slideBy: 1,
                        },
                        1200: {
                            items: 2,
                            slideBy: 1,
                        }
                    }
                });
            }
            if ($("#products .modern .owl-carousel").length > 0) {
                starter._var.owl_products_modern = $("#products .modern .owl-carousel").owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1,
                            slideBy: 1,
                        },
                        992: {
                            items: 2,
                            slideBy: 1,
                        },
                        1200: {
                            items: 2,
                            slideBy: 1,
                        }
                    }
                });
            }
        },

        twentytwenty: function () {
            if ($(".twentytwenty-container").length > 0) {
                $(".twentytwenty-container").twentytwenty({
                    default_offset_pct: 0.5, // How much of the before image is visible when the page loads
                    orientation: 'horizontal', // Orientation of the before and after images ('horizontal' or 'vertical')
                    before_label: 'January 2017', // Set a custom before label
                    after_label: 'March 2017', // Set a custom after label
                    no_overlay: true, //Do not show the overlay with before and after
                    move_slider_on_hover: false, // Move slider on mouse hover?
                    move_with_handle_only: true, // Allow a user to swipe anywhere on the image to control slider movement.
                    click_to_move: false // Allow a user to click (or tap) anywhere on the image to move the slider to that location.
                });
            }
        },

        autoscroll: function () {
            switch( window.location.pathname )
            {
                case '/zasady/':
                    var attri = '#rules';
                    break;
                case '/produkty/':
                    var attri = '#products';
                    break;
                case '/kontakt/':
                    var attri = '#contact';
                    break;
            }

            if( (attri != undefined) && ($(attri).length > 0))
            {
                var offset = Math.abs($(attri).position().top);

                $('html, body').animate({scrollTop:offset}, 1000);
            }

            starter._var.window_is_load = true;
        },

        menu_light: function(){
            if( starter._var.window_is_load ) {
                starter.main.menu_light_section('#baner');
                starter.main.menu_light_section('#rules');
                starter.main.menu_light_section('#products');
                starter.main.menu_light_section('#contact');
            }
        },

        menu_light_section: function( section ) {
            var height = $(window).scrollTop() + $(window).height() / 2;

            if ( $(section).length > 0 ) {
                if( height > $(section).position().top && height < $(section).position().top + $(section).height() ){
                    if( $('.container-menu ul.navbar-nav li a[data-href="'+section+'"]').length > 0 ) {
                        var ob = $('.container-menu ul.navbar-nav li a[data-href="'+section+'"]');
                        //ob.parent().addClass('active');
                        pathname = ob.attr("href");
                    } else {
                        pathname = '/';
                    }
                    if( location.pathname != pathname) {
                        event.preventDefault();
                        history.pushState(null,null,pathname);
                    }
                }
            }
        },

        selectbox: function () {
        },

        validator: {},

        orientationchange: function () {
            if (($(window).scrollTop() + $(window).height()) - $('section#top').height() > $('.twentytwenty-wrapper').height()) {
                $('section#baner .text-bottom').css({'position': 'absolute'});
            } else {
                $('section#baner .text-bottom').css({'position': 'fixed'});
            }
        },
    },

    getFields: function ($form) {
        const inputs = $form.find('.input');
        const textareas = $form.find('.textarea');
        const checkboxes = $form.find('.checkbox');
        const files = $form.find('.file');
        const fields = {};

        $.each(inputs, function (index, item) {
            fields[$(item).attr('name')] = $(item).val();
        });

        $.each(textareas, function (index, item) {
            fields[$(item).attr('name')] = $(item).val();
        });

        $.each(checkboxes, function (index, item) {
            if ($(item).prop('checked')) {
                fields[$(item).attr('name')] = $(item).val();
            }
        });

        $.each(files, function (index, item) {
            if (item.files[0]) {
                fields[$(item).attr('name')] = item.files[0];
            }
        })

        fields['_token'] = $form.find('input[name=_token]').val();

        return fields;
    },

    datepicker: {},

    effects: {}
}
