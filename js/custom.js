var $fullpage = $('#fullpage'),
    isNavPressed = false;

isTouchDevice = !!navigator.userAgent.match(/(iPhone|iPod|iPad|Android|playbook|silk|BlackBerry|BB10|Windows Phone|Tizen|Bada|webOS|IEMobile|Opera Mini)/);

$(window).on('load', function() {
    setTimeout(function() {
        $('body').removeClass('loaded');
    }, 300);

    $('.js-iframe').each(function (e) {
        var srcIframe = $(this).attr('data-src');
        $(this).attr('src', srcIframe);
    });
});


$(document).ready(function() {
    $(document).on('click', '#true_loadmore', function(e) {
        e.preventDefault();
       // $(this).text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page': current_page
        };
        $.ajax({
            url: myajax.url, // обработчик
            data: data, // данные
            type: 'POST', // тип запроса
            success: function(data) {
                if (data) {
                    // $('#true_loadmore').text('Загрузить ещё').parent().parent().find('#content_term').append(data); // вставляем новые посты
                    $('#true_loadmore').parent().parent().find('#content_term').append(data);
                    current_page++; // увеличиваем номер страницы на единицу
                    if (current_page == max_pages) $("#true_loadmore").remove(); // если последняя страница, удаляем кнопку
                } else {
                    $('#true_loadmore').remove(); // если мы дошли до последней страницы постов, скроем кнопку
                }
            }
        });
    });
    
    var jsImg = $('.js-img');
    new LazyLoad(jsImg, {
        root: null,
        rootMargin: '0px',
        threshold: 0
    });

    if(isTouchDevice){
        $('body').addClass('mob');
    }


    if(isTouchDevice || $(window).width() <= 1090){
        mobileSliderInit();
    }


    if (!isTouchDevice && $(window).width() > 1090) {

        window.sr3 = ScrollReveal();

        //1
        if($('.title-block-3').length > 0) {
            sr3.reveal('#fullpage .title-block-3  .screen1-item-5', { //border
                origin: "left",
                distance: "120px",
                duration: 1200,
                opacity: 0,
                easing: 'ease-in-out',
                cleanup: true
            });
            sr3.reveal('#fullpage .title-block-3 .screen1-item-2', {//water
                origin: "left",
                distance: "180px",
                duration: 1800,
                opacity: 0,
                easing: 'ease-in-out',
                cleanup: true
            });
            sr3.reveal('#fullpage .title-block-3 .screen3-item-1', {//bottle
                origin: "bottom",
                distance: "120px",
                duration: 1800,
                opacity: 0,
                easing: 'ease',
                cleanup: true
            });
            sr3.reveal('#fullpage .title-block-3 .screen3-item-2', {//fruits
                origin: "bottom",
                distance: "320px",
                duration: 1800,
                opacity: 0,
                easing: 'ease-in-out',
                cleanup: true
            });
            sr3.reveal('#fullpage .title-block-3 .screen1-item-4', {//leaves
                origin: "bottom",
                distance: "220px",
                duration: 1800,
                opacity: 0,
                easing: 'ease-in-out',
                cleanup: true
            });
            sr3.reveal('#fullpage .title-block-3 .screen1-item-8', {//bubbles
                origin: "bottom",
                duration: 1800,
                opacity: 0,
                delay: 300,
                easing: 'ease-in-out',
                cleanup: true
            });
            sr3.reveal('#fullpage .title-block-3 .screen1_text', {//text
                origin: "bottom",
                duration: 1800,
                opacity: 0,
                easing: 'ease-in-out',
                cleanup: true
            });
        }

    }


    if($('.fullpage-wrapper').length <= 0 && $(window).width() > 1090){
        createFullpage();
    }


    /* mobile menu */
    $('.burger').click(function () {
        $('body').toggleClass('menu-opened');
        $(this).toggleClass('opened');
        $('.menu-overlay').toggleClass('opened');
    });
    $('.menu-overlay').click(function () {
        $(this).removeClass('opened');
        $('body').removeClass('menu-opened');
        $('.burger').removeClass('opened');
    });
    //--


    $("[data-paroller-factor]").paroller();


    /* custom scroll */
    if($('.scroll-box').length > 0) {
        $('.scroll-box').mCustomScrollbar({
            axis: "y",
            autoExpandScrollbar: true,
            updateOnBrowserResize: true,
            autoDraggerLength: false,
            scrollButtons: {enable: false}
        });
    }
    if($('.scroll-box-2').length > 0) {
        $('.scroll-box-2').mCustomScrollbar({
            axis: "y",
            autoExpandScrollbar: true,
            updateOnBrowserResize: true,
            autoDraggerLength: false,
            scrollButtons: {enable: false}
        });
    }
    //--


    /* product slider */
    $('.product-slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.product-slider-nav',
        responsive: [
            {
                breakpoint: 610,
                settings: {
                    asNavFor: null,
                    arrows: true,
                    prevArrow: '<button type="button" class="slick-arrow slick-prev"></button>',
                    nextArrow: '<button type="button" class="slick-arrow slick-next"></button>'
                }
            }
        ]
    });
    $('.product-slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        asNavFor: '.product-slider-for',
        dots: false,
        arrows: true,
        centerMode: false,
        focusOnSelect: true,
        vertical: true,
        infinite: false,
        verticalSwiping: true,
        prevArrow: '<button type="button" class="slick-arrow slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-arrow slick-next"></button>',
        responsive: [
            {
                breakpoint: 610,
                settings: {
                    asNavFor: null
                }
            }
        ]
    });

    $('.product-slider-nav').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        if(slick.slideCount <= 3){
            $('.product-slider-nav').addClass('small');
        }
    });
    //--


    /* recommended slider */
    if($('.recommended-slider').length > 0){
        $('.recommended-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            centerMode: false,
            focusOnSelect: true,
            infinite: true,
            prevArrow: '<button type="button" class="slick-arrow slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-arrow slick-next"></button>',
            responsive: [
                {
                    breakpoint: 860,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    //--

    /* certificates slider */
    if($('.certificates-slider').length > 0){
        $('.certificates-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            centerMode: false,
            focusOnSelect: true,
            infinite: true,
            prevArrow: '<button type="button" class="slick-arrow slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-arrow slick-next"></button>',
            responsive: [
                {
                    breakpoint: 1090,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    //--


    /* opinions slider */
    if($('.opinions-slider').length > 0){
        $('.opinions-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            centerMode: false,
            focusOnSelect: true,
            infinite: true,
            prevArrow: '<button type="button" class="slick-arrow slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-arrow slick-next"></button>',
            responsive: [
                {
                    breakpoint: 1090,
                    settings: {
                        arrows: false
                    }
                }
            ]
        });
    }
    //--


    /* clients slider */
    if($('.clients-slider').length > 0){
        $('.clients-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            centerMode: false,
            focusOnSelect: true,
            infinite: true,
            prevArrow: '<button type="button" class="slick-arrow slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-arrow slick-next"></button>',
            responsive: [
                {
                    breakpoint: 1090,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 840,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 590,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    //--


    /* video in modal */
    var vidId = $("#video");
    var src;
    $('.video-link a').bind('click', function(e) {
        src = $(this).attr('href');
        vidId.attr("src",src);
        e.preventDefault();
        $('#videoModal').bPopup({
            modalColor: '#000',
            opacity: 0.5,
            transition: 'fadeIn',
            speed: 300,
            follow: [true, true],
            positionStyle: 'fixed',
            onClose: function() {
                var videoSrc = vidId.attr("src");
                vidId.attr("src","");
                vidId.attr("src",videoSrc);
            }
        });
        return false;
    });

    $('#videoModal').css({
        'top': '50%',
        'margin-top': '-'+$('#videoModal').height()/2+'px'
    });
    //--


    /* modals */
    $('.order-call').bind('click', function(e) {
        e.preventDefault();
        $('#call-modal').bPopup({
            modalColor: '#f6c756',
            opacity: 1,
            transition: 'fade',
            positionStyle: 'fixed',
            speed: 300,
            follow: [false, false],
            onOpen: function () {
                $('body').addClass('modal-open');
                $('#call-modal').addClass('opened');
            },
            onClose: function() {
                $('body').removeClass('modal-open');
                $('#call-modal').removeClass('opened');
            }
        });
        return false;
    });

    $('.btn-order').bind('click', function(e) {
        e.preventDefault();
        $('#order-modal').bPopup({
            modalColor: '#f6c756',
            opacity: 1,
            transition: 'fade',
            positionStyle: 'fixed',
            speed: 300,
            follow: [false, false],
            onOpen: function () {
                $('body').addClass('modal-open');
                $('#order-modal').addClass('opened');
            },
            onClose: function() {
                $('body').removeClass('modal-open');
                $('#order-modal').removeClass('opened');
            }
        });
        return false;
    });

    $(document).on("click touchstart", function (event) {
        if($('body').hasClass('modal-open') && $(event.target).closest(".call_form").length )
            return;
        if($('body').hasClass('modal-open')){
            if($('#call-modal').hasClass('opened')){
                $('#call-modal').bPopup().close();
                $('#call-modal').removeClass('opened');
            }
            if($('#order-modal').hasClass('opened')){
                $('#order-modal').bPopup().close();
                $('#order-modal').removeClass('opened');
            }
            $('body').removeClass('modal-open');

            $('.call_form').fadeIn(300).trigger('reset').find('.focus').removeClass('focus');
            $('.modal-success').fadeOut(300);
        }
    });
    //--


    /* focus input */
    $('.form-group input, .form-group textarea, .form-group label:not(:has(.focus))').click(function () {
        $(this).parents('.form-group').find('input').focus();
        $(this).parents('.form-group').find('label').addClass('focus');
    });
    $('.form-group input, .form-group textarea').blur(function () {
        if (!$(this).val() && !$(this).hasClass('error')) {
            setTimeout(function () {
                $(this).parents('.form-group').find('label.form__input-label').removeClass('focus');
            }, 100);
        }
    });
    //--


    /* validation */
    if($('.call_form form').length > 0) {
        $('.call_form form').each(function () {
            $(this).validate({

                highlight: function(element, errorClass, validClass) {
                    $('.form-group input').each(function () {
                        $(this).parents('.form-group').find('.form__input-label').addClass('focus');
                    });
                },

                unhighlight: function(element, errorClass, validClass) {
                    $('.form-group input').each(function () {
                        $(this).parents('.form-group').find('.form__input-label').addClass('focus');
                    });
                },

                rules: {
                    call_name: {
                        required: true
                    },
                    call_phone: {
                        required: true
                    }
                },
                messages: {
                    call_name: "Введите имя",
                    call_phone: "Введите корректный номер"
                },
                // submitHandler: function () {
                //     $('.call_form').fadeOut(300);
                //     $('.modal-success').fadeIn(300);
                //
                //     setTimeout(function () {
                //         if($('body').hasClass('modal-open') && $('.modal-success').is(':visible')) {
                //             if($('#call-modal').hasClass('opened')){
                //                 $('#call-modal').bPopup().close();
                //                 $('#call-modal').removeClass('opened');
                //             }
                //             if($('#order-modal').hasClass('opened')){
                //                 $('#order-modal').bPopup().close();
                //                 $('#order-modal').removeClass('opened');
                //             }
                //             $('body').removeClass('modal-open');
                //
                //             $('.call_form').fadeIn(300).trigger('reset').find('.focus').removeClass('focus');
                //             $('.modal-success').fadeOut(300);
                //         }
                //     }, 3000);
                // }
            });
        });
    }
    //--
    function func_close() {
        if($('body').hasClass('modal-open') && $('.modal-success').is(':visible')) {
            if($('#call-modal').hasClass('opened')){
                $('#call-modal').bPopup().close();
                $('#call-modal').removeClass('opened');
            }
            if($('#order-modal').hasClass('opened')){
                $('#order-modal').bPopup().close();
                $('#order-modal').removeClass('opened');
            }
            $('body').removeClass('modal-open');

            $('.call_form').fadeIn(300).trigger('reset').find('.focus').removeClass('focus');
            $('.modal-success').fadeOut(300);
        }
    }

    document.addEventListener('wpcf7mailsent', function (event) {
        // event.detail.contactFormId
        // console.log(event);
        $('.call_form').fadeOut(300);
        $('.modal-success').fadeIn(300);
        setTimeout(func_close, 3000);
    }, false);

    /* load products */
    // var listCount = $('.products-list_load li').length;
    //
    // var count = 0;
    //
    // $('.products-list_load li:nth-child(n+10)').css('display', 'none');
    //
    // $('.load-btn').on('click', function () {
    //
    //     $('.products-list_load li:not(:visible)').each(function (i) {
    //
    //         $(this).css('display', 'inline-block');
    //
    //         if($(this).index() == listCount-1) {
    //             $('.load-btn').fadeOut(100);
    //         }
    //
    //         count++;
    //
    //         if(count == 9) {
    //             count = 0;
    //             return false;
    //         }
    //     });
    //
    //     return false;
    //
    // });
    //--


    /* google map */
    if($('#map')[0]){

        google.maps.event.addDomListener(window, 'load', init);
        google.maps.event.addDomListener(window, "resize", init);

        google.maps.Marker.prototype.setLabel = function(label){
            this.label = new MarkerLabel({
                map: this.map,
                marker: this,
                text: label
            });
            this.label.bindTo('position', this, 'position');
        };

        var MarkerLabel = function(options) {
            this.setValues(options);
            this.span = document.createElement('span');
            this.span.className = 'map_label';
        };

        MarkerLabel.prototype = $.extend(new google.maps.OverlayView(), {
            onAdd: function() {
                this.getPanes().overlayImage.appendChild(this.span);
                var self = this;
                this.listeners = [
                    google.maps.event.addListener(this, 'position_changed', function() { self.draw();    })];
            },
            draw: function() {
                var text = String(this.get('text'));
                var position = this.getProjection().fromLatLngToDivPixel(this.get('position'));
                this.span.innerHTML = text;
                this.span.style.left = (position.x - 22 + (markerSize.x / 2)) + (text.length) - 10 + 'px';
                this.span.style.top = (position.y - markerSize.y + 29) + 'px';
            }
        });

        function init() {
            var mapOptions = {
                zoom: 16,
                scrollwheel: false,
                center: new google.maps.LatLng(coords_lat, coords_lng),
                disableDefaultUI: true
            };
            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(coords_lat, coords_lng),
                map: map,
                icon: map_icon
            });

        }
    }
    //--


    $('.full-page-nav').click(function () {
        isNavPressed = true;
    });


});

var slideTimeout, check = null;

function createFullpage() {
    if($('#fullpage')[0]) {

        $fullpage.fullpage({
            anchors: ['slide1', 'slide2', 'slide3', 'slide4', 'slide5', 'slide6'],
            css3: true,
            easing: 'easeInQuart',
            resize: true,
            scrollingSpeed: 1000,
            loopBottom: true,

            afterRender: function () {

                slideTimeout = setInterval(function () {
                    $.fn.fullpage.moveSectionDown();
                }, 6000);

            },

            afterLoad: function (anchorLink, index) {

                $.fn.fullpage.setAllowScrolling(false);
                $.fn.fullpage.setKeyboardScrolling(false);

                if (index == 1) {
                    $('.full-page-nav-buttons-outer > div').removeClass('active');
                    $('.full-page-nav-buttons-outer > div.slide1_page').addClass('active');
                }
                else{
                    $('.full-page-nav-buttons-outer > div.slide1_page').removeClass('active');
                }

            },

            onLeave: function (origin, destination, direction) {

                if(isNavPressed){
                    clearInterval(slideTimeout);

                    slideTimeout = setInterval(function () {
                        $.fn.fullpage.moveSectionDown();
                    }, 3000);

                    isNavPressed = false;
                }

                switch (destination) {
                    case 1:
                        ScrollReveal().destroy();
                        window.sr3 = ScrollReveal();

                        //3
                        sr3.reveal('#fullpage .title-block-3  .screen1-item-5', { //border
                            origin: "left",
                            distance: "120px",
                            duration: 1200,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr3.reveal('#fullpage .title-block-3 .screen1-item-2', {//water
                            origin: "left",
                            distance: "180px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr3.reveal('#fullpage .title-block-3 .screen3-item-1', {//bottle
                            origin: "bottom",
                            distance: "120px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease',
                            cleanup: true
                        });
                        sr3.reveal('#fullpage .title-block-3 .screen3-item-2', {//fruits
                            origin: "bottom",
                            distance: "320px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr3.reveal('#fullpage .title-block-3 .screen1-item-4', {//leaves
                            origin: "bottom",
                            distance: "220px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr3.reveal('#fullpage .title-block-3 .screen1-item-8', {//bubbles
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            delay: 300,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr3.reveal('#fullpage .title-block-3 .screen3_text', {//text
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });

                        break;

                    case 2:
                        ScrollReveal().destroy();
                        window.sr2 = ScrollReveal();

                        //2
                        sr2.reveal('#fullpage .title-block-2 .screen2-item-2', {//bottle
                            origin: "bottom",
                            distance: "120px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease',
                            cleanup: true
                        });
                        sr2.reveal('#fullpage .title-block-2 .screen2-item-1', {//wood
                            origin: "bottom",
                            distance: "180px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr2.reveal('#fullpage .title-block-2  .screen1-item-5', {//border
                            origin: "left",
                            distance: "120px",
                            duration: 1200,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr2.reveal('#fullpage .title-block-2 .screen1-item-8', {//bubbles
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            delay: 300,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr2.reveal('#fullpage .title-block-2 .screen1_text', {//text
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });

                        break;

                    case 3:
                        ScrollReveal().destroy();
                        window.sr1 = ScrollReveal();

                        sr1.reveal('#fullpage .title-block-1 .screen1-item-1', {//snow
                            origin: "bottom",
                            distance: "180px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr1.reveal('#fullpage .title-block-1 .screen1-item-2', {//water
                            origin: "left",
                            distance: "180px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr1.reveal('#fullpage .title-block-1 .screen1-item-3', {//blueberries
                            origin: "bottom",
                            distance: "120px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr1.reveal('#fullpage .title-block-1 .screen1-item-5', {//border
                            origin: "left",
                            distance: "120px",
                            duration: 1200,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr1.reveal('#fullpage .title-block-1 .screen1-item-6', {//bottle
                            origin: "bottom",
                            distance: "120px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease',
                            cleanup: true
                        });
                        sr1.reveal('#fullpage .title-block-1 .screen1-item-7', {//raspberries
                            origin: "bottom",
                            distance: "160px",
                            duration: 1500,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr1.reveal('#fullpage .title-block-1 .screen1-item-4', {//leaves
                            origin: "bottom",
                            distance: "220px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr1.reveal('#fullpage .title-block-1 .screen1-item-8', {//bubbles
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            delay: 300,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr1.reveal('#fullpage .title-block-1 .screen1_text', {//text
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });

                        break;

                    case 4:
                        ScrollReveal().destroy();
                        window.sr4 = ScrollReveal();

                        //4
                        sr4.reveal('#fullpage .title-block-4 .screen1-item-2', { //water
                            origin: "left",
                            distance: "180px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr4.reveal('#fullpage .title-block-4  .screen1-item-5', {//border
                            origin: "left",
                            distance: "120px",
                            duration: 1200,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr4.reveal('#fullpage .title-block-4 .screen4-item-1', {//tree
                            origin: "bottom",
                            distance: "200px",
                            duration: 1600,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr4.reveal('#fullpage .title-block-4 .screen4-item-2', {//bottle
                            origin: "bottom",
                            distance: "120px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease',
                            cleanup: true
                        });
                        sr4.reveal('#fullpage .title-block-4 .screen4-item-3', {//lemon
                            origin: "bottom",
                            distance: "120px",
                            duration: 1600,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr4.reveal('#fullpage .title-block-4 .screen4-item-4', {//glass
                            origin: "bottom",
                            distance: "220px",
                            duration: 1600,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr4.reveal('#fullpage .title-block-4 .screen4-item-5', {//bubbles
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            delay: 500,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr4.reveal('#fullpage .title-block-4 .screen1_text', {//text
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });

                        break;

                    case 5:
                        ScrollReveal().destroy();
                        window.sr5 = ScrollReveal();

                        //5
                        sr5.reveal('#fullpage .title-block-5 .screen5-item-1', { //bottle
                            origin: "bottom",
                            distance: "120px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease',
                            cleanup: true
                        });
                        sr5.reveal('#fullpage .title-block-5 .screen1-item-2', { //water
                            origin: "left",
                            distance: "180px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr5.reveal('#fullpage .title-block-5 .screen1-item-8', { //bubbles
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            delay: 300,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr5.reveal('#fullpage .title-block-5 .screen5_text', { //text
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });

                        break;

                    case 6:
                        ScrollReveal().destroy();
                        window.sr6 = ScrollReveal();

                        //6
                        sr6.reveal('#fullpage .title-block-6 .screen1-item-2', { //water
                            origin: "left",
                            distance: "180px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr6.reveal('#fullpage .title-block-6  .screen1-item-5', {//border
                            origin: "left",
                            distance: "120px",
                            duration: 1200,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr6.reveal('#fullpage .title-block-6 .screen6-item-1', { //mug
                            origin: "bottom",
                            distance: "220px",
                            duration: 1500,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr6.reveal('#fullpage .title-block-6 .screen5-item-1', { //bottle
                            origin: "bottom",
                            distance: "120px",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease',
                            cleanup: true
                        });
                        sr6.reveal('#fullpage .title-block-6 .screen1-item-8', { //bubbles
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            delay: 300,
                            easing: 'ease-in-out',
                            cleanup: true
                        });
                        sr6.reveal('#fullpage .title-block-6 .screen2_text', { //text
                            origin: "bottom",
                            duration: 1800,
                            opacity: 0,
                            easing: 'ease-in-out',
                            cleanup: true
                        });

                        break;
                }

                $('.full-page-nav-buttons-outer > div.slide' + origin + '_page').removeClass('active');
                $('.full-page-nav-buttons-outer > div.slide' + destination + '_page').addClass('active');

            }
        });
    }
}

function mobileSliderInit() {
    $('.mobile_slider:not(.slick-initialized)').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 10000
    });
}

var flag = null;
function checkScreen() {
    if(isTouchDevice || ($(window).width() <= 1090)){
        $('.b-head').removeClass('fixed');
        if(!$('#fullpage').hasClass('fp-destroyed') && $('#fullpage').hasClass('fullpage-wrapper')) {
            $.fn.fullpage.destroy('all');
            $('header').removeClass('fixed fixed_mob');
            clearInterval(slideTimeout);
        }
        mobileSliderInit();
        flag = 1;
    }
    if($(window).width() > 1090 || (isTouchDevice && window.screen.width > 1090)){
        if(flag == 1){
            $('.b-head').removeClass('fixed fixed_mob');
            createFullpage();
            flag = null;
        }

    }
}

window.addEventListener("orientationchange", function() {
    checkScreen();
});

$(window).on('scroll', function () {

    if($(document).scrollTop() > 0){
        $('header').addClass('fixed');
    }

    if($(document).scrollTop() == 0 && $(window).width() > 1090){
        $('header').removeClass('fixed');
    }
    else if ($(window).width() <= 1090){
        var top = $(this).scrollTop();
        var elem = $('header');
        if (top < 1) {
            elem.removeClass('fixed fixed_mob');
        } else {
            elem.addClass('fixed_mob');
        }
    }
    else if($(window).width() > 1090 && $('.page-404').length > 0){
        var top = $(this).scrollTop();
        var elem = $('header');
        if (top < 1) {
            elem.removeClass('fixed');
        } else {
            elem.addClass('fixed');
        }
    }

});

$(window).on('resize', function () {
    checkScreen();

    if($(window).width() > 1090 && $('body').hasClass('menu-opened')){
        $('.menu-overlay').removeClass('opened');
        $('body').removeClass('menu-opened');
        $('.burger').removeClass('opened');
    }

});


var direct = '';

function addEvent(elem, type, handler){
    if(elem.addEventListener){
        elem.addEventListener(type, handler, false);
    } else {
        elem.attachEvent('on'+type, handler);
    }
    return false;
}
function scrollDirection(){
    var weelEvt = (/Firefox/i.test(navigator.userAgent)) ? 'DOMMouseScroll' : 'mousewheel',
        el = document.body;
    addEvent(el, weelEvt, function(e){
        var evt = e.originalEvent ? e.originalEvent : e,
            delta = evt.detail ? evt.detail*(-40) : evt.wheelDelta;
        //console.log('Скроллим ' + (delta > 0 ? 'вверх' : 'вниз'));
        return (delta > 0 ? direct = 'up' : direct = 'down');
    });
}

$(function(){
    scrollDirection();
});


/* tabs */
(function($) {
    $(function() {

        $('ul.tabs li').click(function () {
            $('ul.tabs li').not(this).removeClass('current');
            $(this).addClass('current');
            $(this).parents('div.tabs-container').eq(0).find('>div.tab-box').removeClass('visible').hide().eq($(this).index()).addClass('visible').fadeIn(500).show();
            return false;
        });
    })
})(jQuery);
//--


/* scroll top */
$(function() {
    $.fn.scrollToTop = function() {
        $(this).hide();
        if ($(window).scrollTop() != "0") {
            $(this).fadeIn("slow")
        }
        var scrollDiv = $(this);
        $(window).scroll(function() {
            if ($(window).scrollTop() == "0") {
                $(scrollDiv).fadeOut("slow")
            } else {
                $(scrollDiv).fadeIn("slow")
            }
        });
        $(this).click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, "slow", function () {
                if($('#fullpage')[0] && $(window).width() > 1090){
                    $('.b-head').removeClass('fixed_mob fixed');
                    //$('body').removeClass('fp-destroyed');
                    //createFullpage();
                    //flag = null;
                }
            });

        })
    }
});
$(function() {
    $(".go_top").scrollToTop();
});
//--