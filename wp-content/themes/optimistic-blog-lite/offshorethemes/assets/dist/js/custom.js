(function($) {

    "use strict";

    jQuery(document).ready(function() {

        //WOW initialize
        new WOW().init();

        // Empty Placeholder in top search
        $('.top-search-form-container .search-form input.search-field').removeAttr('placeholder');

        $('.main-navigation').meanmenu({
            meanMenuContainer: '.menu-container',
            meanScreenWidth: "769",
            meanRevealPosition: "left",
            menuExpand: "",
            menuContract: "",
        });

        // Sticky sidebar 

        jQuery('.sticky_portion').theiaStickySidebar({
            additionalMarginTop: 30
        });


        // Swiper Definitions
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 0,
            freeMode: false,
            nav: true,
            loop: true,

            autoplay: {
                delay: 3000,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            breakpoints: {
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
            },
        });

    });

    var swiper = new Swiper('.banner-style-two-container', {
        slidesPerView: 1,
        spaceBetween: 0,
        freeMode: true,
        nav: true,
        loop: true,

        autoplay: {
            delay: 5000,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    var swiper = new Swiper('.inpostgallery-container', {
        slidesPerView: 'auto',
        centeredSlides: false,
        spaceBetween: 0,
        nav: true,
        slidesPerView: 1,
        effect: 'slide',
        autoplay: {
            delay: 2000,
        },
        pagination: false,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    var swiper = new Swiper('.widget-rpag-gallery-container', {
        slidesPerView: 1,
        centeredSlides: false,
        spaceBetween: 0,
        nav: false,
        slidesPerView: 1,
        effect: 'slide',
        pagination: false,

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

    });

    // Masonry Grid Initialize
    $('.masonry-grid').masonry({
        itemSelector: '.grid-item',
    });

    setTimeout(function() {
        $('.masonry-grid').masonry({
            itemSelector: '.grid-item',
        });
    }, 5000);

    $('.banner-style-four-container').owlCarousel({
        items: 3,
        loop: true,
        margin: 1,
        nav: true,
        rtl: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            },
            1024: {

                items: 2
            },
            1200: {
                items: 3
            }
        }
    });

    $('.banner-style-four-box-width').owlCarousel({
        items: 2,
        loop: true,
        margin: 10,
        nav: true,
        rtl: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            },
            1024: {

                items: 2
            },
            1200: {
                items: 2
            }
        }
    });


    $('.related-post-carousel').owlCarousel({
        items: 2,
        loop: true,
        margin: 40,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            },
            1200: {
                items: 2
            }
        }
    });

    $('.related-post-carousel-three-cards').owlCarousel({
        items: 3,
        loop: true,
        margin: 40,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });

   
    try {
        // Autoplay youtube video
        var autoplay = '?autoplay=1';
        var youtube_src = $('.post-fvideo .covervid-wrapper iframe').attr('src');
        $('.post-fvideo .covervid-wrapper iframe').removeAttr('allow');
        if (youtube_src != null) {
            youtube_src = youtube_src.replace('?feature=oembed', '');
            youtube_src = youtube_src + autoplay;
            $('.post-fvideo .covervid-wrapper iframe').attr({ src: youtube_src, width: '100%', height: '100%' });
        }
    } catch (e) {}



})(jQuery);