jQuery(document).ready(function ($) {

    miscFunctions()
    menuPanel()

    function miscFunctions() {

        if ($(".searchpanel").length) {
            $(".menu-bottom-row ul:not(.sub-menu)>li.menu-item:last-child a, .mobile-search-toggle i").on("click", function () {
                $("body").addClass("search-active")
            })

            $(".close-search").on("click", function () {
                $("body").removeClass("search-active")
            })
        }

        $(".team-profile-nav ul li a").on("click", function () {

            var target = this.attributes['target'].nodeValue
            jQuery(document).ready(function () {
                var body = jQuery("html, body"),
                    offset_distance = window.innerWidth > 600 ? 80 : 200
                body
                    .stop()
                    .animate({
                        scrollTop: jQuery($("#" + target)).offset().top - offset_distance
                    },
                        800,
                        "linear",
                        function () { }
                    );
            });
        })

        AOS.init({
            duration:1200,
        });
    }

    owlSlider()

    function owlSlider() {
        $(".banner-carousel").owlCarousel({
            loop: true,
            touchDrag: false,
            mouseDrag: false,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            margin: 16,
            nav: false,
            dots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items:1
                },
                1000: {
                    items: 1
                }
            }
        })
    }

    function menuPanel() {
        var a = $(".mobile-panel"),
            b = $(".menu-toggle")

        $('<i class="bi bi-chevron-left"></i>').prependTo("#menu-mobile .menu-item.menu-item-has-children .sub-menu")

        $(b).on('click', function () {
            $("body").addClass("menu-active")
        })

        $("#menu-mobile .menu-item.menu-item-has-children > a").on("click", function () {
            $(this).addClass("sub-menu-active")
        })

        $("#menu-mobile .sub-menu i").on("click", function(){
            var a = this.parentElement.previousElementSibling
            $(a).removeClass("sub-menu-active")
        })

        $(".mobile-panel > i").on("click", function(){
            $("body").removeClass("menu-active")
        })
    }
})
