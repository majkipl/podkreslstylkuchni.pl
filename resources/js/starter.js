import $ from 'jquery';
import AOS from 'aos';

(function ($) {
    $.fn.matchMaxHeight = function () {
        const items = $(this);
        $(items).attr('style', '');
        $(items).css({});
        let max = 0;
        for (let i = 0; i < items.length; i++) {
            max = max < $(items[i]).height() ?
                $(items[i]).height() : max;

        }
        $(items).css({'display': 'block', 'height': '' + max + 'px'});
    }
})(jQuery);

$(window).on("load", () => {
    starter.main.init();
    starter.main.autoscroll();
});

$(window).on("resize", () => {
    starter.main.orientationchange();
});

$(window).scroll(() => {
    starter.main.scroll();
    starter.main.menu_light();
});

const starter = {
    _var: {
        window_is_load: false,
        owl_products_retro: null,
        owl_products_modern: null,
        error: []
    },

    main: {
        init: function () {
            starter.main.onClick();
            starter.main.onChange();
            starter.main.onSubmit();
            starter.main.owl();
            starter.main.twentytwenty();
            starter.main.orientationchange();

            AOS.init();
        },

        onClick: function () {
            $(document).on('click', '#products .retro .owl-carousel-prev', function () {
                starter._var.owl_products_retro.trigger('prev.owl.carousel');

                return false;
            });

            $(document).on('click', '#products .retro .owl-carousel-next', function () {
                starter._var.owl_products_retro.trigger('next.owl.carousel');

                return false;
            });

            $(document).on('click', '#products .modern .owl-carousel-prev', function () {
                starter._var.owl_products_modern.trigger('prev.owl.carousel');

                return false;
            });

            $(document).on('click', '#products .modern .owl-carousel-next', function () {
                starter._var.owl_products_modern.trigger('next.owl.carousel');

                return false;
            });

            $(document).on('click', '#top nav.navbar .hamburger', function () {
                // $('section#top').css({'overflow': 'visible'});
                $('.container-menu').toggleClass("showed");

                if ($(this).hasClass("is-active")) {
                    $(this).removeClass("is-active");
                } else {
                    $(this).addClass("is-active");
                }
                return false;
            });

            $(document).on('click', '.home .container-menu ul.navbar-nav li a', function () {
                const attri = $(this).data('href');

                if ($(attri).length > 0) {
                    event.preventDefault();
                    history.pushState(null, null, $(this).attr("href"));

                    $('.container-menu').toggleClass("showed");
                    $('#top nav.navbar .hamburger').removeClass("is-active");

                    const offset = Math.abs($(attri).position().top);
                    $('html, body').animate({scrollTop: offset - 113}, 1000);

                    return false;
                }
                return true;
            });

            $(document).on("click", "button.button-uploads", function () {
                $(this).prev().find("input[type=file]").trigger("click");
            });

            $(document).on('click', '#form .submit', function () {
                $('#form form#save').submit();
                return false;
            });

            $(document).on('click', '#contact a.send', function () {
                $(this).closest('form').submit();
                return false;
            });
        },

        onChange: function () {
            $(document).on('change', '.input, .textarea, .checkbox, .file', function () {
                const item = $(this);
                const value = $(this).val().trim();
                const name = $(this).attr('name');

                if (item.hasClass('upload-file')) {
                    const fileUpload = item[0].files[0];
                    const fieldId = item.attr('id');

                    const errorDiv = $(`.error-${fieldId}`);

                    errorDiv.text('');

                    if (fileUpload) {
                        if (fileUpload.size <= 4 * 1024 * 1024) {
                            const extension = fileUpload.name.split('.').pop().toLowerCase();
                            if (['jpg', 'jpeg', 'png'].indexOf(extension) !== -1) {
                                let reader = new FileReader();
                                reader.onload = function (event) {
                                    $(`#${fieldId}_thumb`).attr('src', event.target.result).parent().removeClass('hidden').next().addClass('hidden');
                                }
                                reader.readAsDataURL(fileUpload);
                            }
                        }
                    }
                }

                const valid = () => {
                    switch (name) {
                        case 'name':
                            return starter.main.validator.isName(value, 'Imię i nazwisko');
                        case 'firstname':
                            return starter.main.validator.isName(value, 'Imię');
                        case 'lastname':
                            return starter.main.validator.isName(value, 'Nazwisko');
                        case 'email':
                            return starter.main.validator.isEmail(value, 'Adres e-mail');
                        case 'phone':
                            return starter.main.validator.isPhone(value, 'Telefon');
                        case 'address':
                            return starter.main.validator.isAddress(value, 'Ulica');
                        case 'address_nb':
                            return starter.main.validator.isAddressNb(value, 'Numer mieszkania');
                        case 'city':
                            return starter.main.validator.isCity(value, 'Miasto');
                        case 'zip':
                            return starter.main.validator.isZip(value, 'Kod pocztowy');
                        case 'legal_1':
                            return starter.main.validator.isLegal(item);
                        case 'legal_2':
                            return starter.main.validator.isLegal(item);
                        case 'legal_3':
                            return starter.main.validator.isLegal(item);
                        case 'legal_5':
                            return starter.main.validator.isLegal(item);
                        case 'message':
                            return starter.main.validator.isMessage(value, 'Wiadomość');
                        case 'img_receipt':
                            return starter.main.validator.isFile(item, 'Zdjęcie paragonu');
                        case 'img_ean':
                            return starter.main.validator.isFile(item, 'Zdjęcie kodu EAN');
                        case 'img_box':
                            return starter.main.validator.isFile(item, 'Zdjęcie pudełka');
                        default:
                            return true;
                    }
                }

                if (valid() !== true) {
                    $(`.error-${name}`).text(valid());
                    starter._var.error[name] = valid();
                } else {
                    $(`.error-${name}`).text('');
                    delete starter._var.error[name];
                }
            });
        },

        onSubmit: function () {
            $(document).on('submit', '#formContact form', function () {
                const fields = starter.getFields($(this).closest('form'));
                const url = $(this).closest('form').attr('action');

                axios({
                    method: 'post',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fields,
                }).then(function (response) {
                    $('#contact h3').html(response.data.results.message);
                    $('#contact .form').hide();
                }).catch(function (error) {
                    $(`.error-post`).text('');

                    if (error.response) {
                        Object.keys(error.response.data.errors).map((item) => {
                            $(`.error-${item}`).text(error.response.data.errors[item][0]);
                        });
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                });

                return false;
            });

            $(document).on('submit', '#form form', function () {
                $('.input, .textarea, .checkbox, .file').trigger('change');

                if (Object.keys(starter._var.error).length === 0) {
                    const fields = starter.getFields($(this).closest('form'));
                    const url = $(this).closest('form').attr('action');
                    const formData = new FormData();

                    for (const field in fields) {
                        formData.append(field, fields[field]);
                    }

                    axios({
                        method: 'post',
                        url: url,
                        headers: {
                            'content-type': 'multipart/form-data',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                    }).then(function (response) {
                        window.location = response.data.results.url;
                    }).catch(function (error) {
                        $(`.error-post`).text('');
                        if (error.response) {
                            Object.keys(error.response.data.errors).map((item) => {
                                $(`.error-${item}`).text(error.response.data.errors[item][0]);
                            });
                        } else if (error.request) {
                            console.log(error.request);
                        } else {
                            console.log('Error', error.message);
                        }
                    });
                } else {
                    $('.error-post').text('');
                    for (let key in starter._var.error) {
                        if (starter._var.error.hasOwnProperty(key)) {
                            let value = starter._var.error[key];
                            $('.error-' + key).text(value);
                        }
                    }
                }

                return false;
            });
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
            const $owlProductsRetro = $("#products .retro .owl-carousel");

            if ($owlProductsRetro.length > 0) {
                starter._var.owl_products_retro = $owlProductsRetro.owlCarousel({
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

            const $owlProductsModern = $("#products .modern .owl-carousel");

            if ($owlProductsModern.length > 0) {
                starter._var.owl_products_modern = $owlProductsModern.owlCarousel({
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
            const $twentytwenty = $(".twentytwenty-container");

            if ($twentytwenty.length > 0) {
                $twentytwenty.twentytwenty({
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
            let attri = undefined;

            switch (window.location.pathname) {
                case '/zasady/':
                    attri = '#rules';
                    break;
                case '/produkty/':
                    attri = '#products';
                    break;
                case '/kontakt/':
                    attri = '#contact';
                    break;
            }

            if ((attri !== undefined) && ($(attri).length > 0)) {
                const offset = Math.abs($(attri).position().top);

                $('html, body').animate({scrollTop: offset}, 1000);
            }

            starter._var.window_is_load = true;
        },

        menu_light: function () {
            if (starter._var.window_is_load) {
                starter.main.menu_light_section('#baner');
                starter.main.menu_light_section('#rules');
                starter.main.menu_light_section('#products');
                starter.main.menu_light_section('#contact');
            }
        },

        menu_light_section: function (section) {
            let height = $(window).scrollTop() + $(window).height() / 2;
            let pathname = '/';

            if ($(section).length > 0) {
                if (height > $(section).position().top && height < $(section).position().top + $(section).height()) {
                    if ($('.container-menu ul.navbar-nav li a[data-href="' + section + '"]').length > 0) {
                        const ob = $('.container-menu ul.navbar-nav li a[data-href="' + section + '"]');
                        pathname = ob.attr("href");
                    } else {
                        pathname = '/';
                    }
                    if (location.pathname !== pathname) {
                        event.preventDefault();
                        history.pushState(null, null, pathname);
                    }
                }
            }
        },

        selectbox: function () {
        },

        validator: {
            isName: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (value.length < 3 || value.length > 128) {
                    return `Pole ${name} musi mieć od 3 do 128 znaków.`;
                } else if (!/^[\p{L}\s-]+$/u.test(value)) {
                    return `Pole ${name} może zawierać tylko litery.`;
                } else {
                    return true;
                }
            },
            isEmail: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (value.length > 255) {
                    return `Pole ${name} może mieć maksymalnie 255 znaków.`;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                    return 'Wprowadź poprawny adres email.';
                } else {
                    return true;
                }
            },
            isPhone: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (!/^\+48(\s)?([1-9]\d{8}|[1-9]\d{2}\s\d{3}\s\d{3}|[1-9]\d{1}\s\d{3}\s\d{2}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{3}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{2}\s\d{3}|[1-9]\d{1}\s\d{4}\s\d{2}|[1-9]\d{2}\s\d{2}\s\d{2}\s\d{2}|[1-9]\d{2}\s\d{3}\s\d{2}|[1-9]\d{2}\s\d{4})$/.test(value)) {
                    return 'Wprowadź poprawny numer telefonu.';
                } else {
                    return true;
                }
            },
            isAddress: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (value.length > 255) {
                    return `Pole ${name} może mieć maksymalnie 255 znaków.`;
                } else {
                    return true;
                }
            },
            isAddressNb: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (value.length > 16) {
                    return `Pole ${name} może mieć maksymalnie 16 znaków.`;
                } else {
                    return true;
                }
            },
            isCity: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (value.length < 2 || value.length > 64) {
                    return `Pole ${name} musi mieć od 2 do 64 znaków.`;
                } else {
                    return true;
                }
            },
            isZip: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (!/^[0-9]{2}-[0-9]{3}$/.test(value)) {
                    return 'Wprowadź poprawny kod pocztowy.';
                } else {
                    return true;
                }
            },
            isLegal: (item) => {
                if (item.val() === "") {
                    return `Pole jest wymagane.`;
                } else if (!item.prop('checked')) {
                    return `Pole jest wymagane.`;
                } else {
                    return true;
                }
            },
            isMessage: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (value.length < 3 || value.length > 4096) {
                    return `Pole ${name} musi mieć od 3 do 4096 znaków.`;
                } else {
                    return true;
                }
            },
            isFile: (file, name) => {
                const extension = file[0]?.files[0]?.name.split('.').pop().toLowerCase();
                if (file[0].files.length === 0) {
                    return `Pole ${name} jest wymagane.`;
                } else if (file[0].files[0].size > 4 * 1024 * 1024) {
                    return `Rozmiar pliku nie może przekraczać 4 MB`;
                } else if (['jpg', 'jpeg', 'png'].indexOf(extension) === -1) {
                    return `Można wybrać tylko pliki graficzne JPG, JPEG lub PNG`;
                } else {
                    return true;
                }
            },
        },

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
