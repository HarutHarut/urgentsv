; (function ($) {
    "use strict";

    $(document).ready(function () {
        $('body').on('click', '#pay-now', function(){
            var dataString = {};
            var self = $(this);
            dataString.amount = 100;
            dataString.currency = 'EUR';
            dataString.order_id = $(this).attr('data-orderid');
            axios.post('https://intervention-urgence24-7.com/fr/account/pay', dataString)
                .then(res => {
                    if(res.data != 'error'){
	                    RevolutCheckout(res.data.public_id).then(function (RC) {
			              RC.payWithPopup({
			                // (mandatory!) name of the cardholder
			                name: res.data.name,
			                // (optional) email of the customer
			                email: res.data.email,
			                // (optional) phone of the customer
			                phone: res.data.phone,
			                // Callback called when payment finished successfully
			                onSuccess() {
			                	var statusString = {};
			                	statusString.order_id = self.attr('data-orderid');
					            axios.post('https://intervention-urgence24-7.com/fr/account/set-status', statusString)
					            .then(res => {  
					            	Swal.fire({
	                        			position: 'top-center',
				                        icon: 'success',
				                        title: 'Thank you!',
				                        showConfirmButton: false,
				                        timer: 2000
				                    });
				                    self.parents('.itemm').remove();
                                    // setTimeout(function(){
                                        window.location = 'https://intervention-urgence24-7.com/fr/account';
                                    // },2000);
					            }).catch(res => { // Request error
				                    Swal.fire({
				            			position: 'top-center',
				                        icon: 'error',
				                        title: 'Something went worng !',
				                        showConfirmButton: false,
				                        timer: 2000
				                    })
				                });
			                },
			                // Callback in case some error happened
			                onError(message) {
			                	console.log('pay error', message);
			                  	Swal.fire({
                        			position: 'top-center',
			                        icon: 'warning',
			                        title: 'O No :(',
			                        showConfirmButton: false,
			                        timer: 2000
			                    })
			                },
			                // (optional) Callback in case user cancelled a transaction
			                onCancel() {
			                   Swal.fire({
                        			position: 'top-center',
			                        icon: 'error',
			                        title: 'Payment cancelled!',
			                        showConfirmButton: false,
			                        timer: 2000
			                    });
			                },
			              });
				        });
                	}else{ // Data error
	                    Swal.fire({
                			position: 'top-center',
	                        icon: 'error',
	                        title: 'Something went worng !',
	                        showConfirmButton: false,
	                        timer: 2000
	                    })
                	}
                }).catch(res => { // Request error
                    Swal.fire({
            			position: 'top-center',
                        icon: 'error',
                        title: 'Something went worng !',
                        showConfirmButton: false,
                        timer: 2000
                    })
                });
        });

        // Account main data update form send
        $('#updateMainDataForm').submit(function(e){
            e.preventDefault;
            var error = $(this).attr('data-error');
            var messageSend = $(this).attr('data-success');
            var dataString = $(this).serialize();   
            var self = $(this);    
            var url = $(this).attr('action');
            $.ajax({
                type: "POST",
                url: url,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: dataString,
            }).done(function (response) {
                if(response == 1){
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: messageSend,
                        showConfirmButton: false,
                        timer: 2000
                    })
                    $('.welcome strong').text(dataString.name);
                }else{
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: error,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }).fail(function () {
                Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: error,
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            return false;
        });

        // Account secondary data update form send
        $('#updateSecondaryDataForm').submit(function(e){
            e.preventDefault;
            var error = $(this).attr('data-error');
            var messageSend = $(this).attr('data-success');
            var dataString = $(this).serialize();   
            var self = $(this);    
            var url = $(this).attr('action');
            $.ajax({
                type: "POST",
                url: url,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: dataString,
            }).done(function (response) {
                if(response == 1){
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: messageSend,
                        showConfirmButton: false,
                        timer: 2000
                    })
                    $('.welcome strong').text(dataString.name);
                }else{
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: error,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }).fail(function () {
                Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: error,
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            return false;
        });

        // Terms And Conditrions Confirmation
        $('#TermsConfirmForm').submit(function(e){
            e.preventDefault();
            var self = $(this);
            var dataString = self.serialize();
            var url = self.attr('action');
            var method = self.attr('method');
            var success = self.attr('success');
            var error = self.attr('error');
            $.ajax({
                type: method,
                url: url,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: dataString,
            }).done(function (response) {
                if(response == 1){
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: success,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }else{
                    Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: error,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }).fail(function () {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: error,
                    showConfirmButton: false,
                    timer: 2000
                });
            });
            return false;
        });

        // Message Send
        $('#messageForm').submit(function(e){
            e.preventDefault();
            var self = $(this);
            var dataString = self.serialize();
            var url = self.attr('action');
            var method = self.attr('method');
            var success = self.attr('success');
            var error = self.attr('error');
            $.ajax({
                type: method,
                url: url,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: dataString,
            }).done(function (response) {
                if(response == 1){
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: success,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    self.find('input[type="text"],input[type="email"],input[type="number"],textarea').val('');
                }else{
                    Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: error,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }).fail(function () {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: error,
                    showConfirmButton: false,
                    timer: 2000
                });
            });
            return false;
        });

        // Change Description
        $('.changeDescriptionBtn').on('click', function(){
            $(this).parents('form').submit(function(e){
                e.preventDefault();
                var self = $(this);
                var dataString = self.serialize();
                var url = self.attr('action');
                var method = self.attr('method');
                var success = self.attr('success');
                var error = self.attr('error');
                $.ajax({
                    type: method,
                    url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: dataString,
                }).done(function (response) {
                    if(response == 1){
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: success,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        self.find('input[type="text"],input[type="email"],input[type="number"],textarea').val('');
                    }else{
                        Swal.fire({
                            position: 'top-center',
                            icon: 'warning',
                            title: error,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                }).fail(function () {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: error,
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
                return false;
            });
        });
        

        /**-----------------------------
         *  Navbar fix
         * ---------------------------*/
        $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a', function (e) {
            e.preventDefault();
        })
       
        /*-------------------------------------
            menu
        -------------------------------------*/
        $('.navbar-area .menu').on('click', function() {
            $(this).toggleClass('open');
            $('.navbar-area .navbar-collapse').toggleClass('sopen');
        });
    
        // mobile menu
        if ($(window).width() < 992) {
            $(".in-mobile").clone().appendTo(".sidebar-inner");
            $(".in-mobile ul li.menu-item-has-children").append('<i class="fas fa-chevron-right"></i>');
            $('<i class="fas fa-chevron-right"></i>').insertAfter("");

            $(".menu-item-has-children a").on('click', function(e) {
                // e.preventDefault();

                $(this).siblings('.sub-menu').animate({
                    height: "toggle"
                }, 300);
            });
        }

        var menutoggle = $('.menu-toggle');
        var mainmenu = $('.navbar-nav');
        
        menutoggle.on('click', function() {
            if (menutoggle.hasClass('is-active')) {
                mainmenu.removeClass('menu-open');
            } else {
                mainmenu.addClass('menu-open');
            }
        });

        /*--------------------------------------------
            Search Popup
        ---------------------------------------------*/
        var bodyOvrelay =  $('#body-overlay');
        var searchPopup = $('#search-popup');

        $(document).on('click','#body-overlay',function(e){
            e.preventDefault();
        bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click','.search',function(e){
            e.preventDefault();
            searchPopup.addClass('active');
        bodyOvrelay.addClass('active');
        });


        /*--------------------------------------------------
            select onput
        ---------------------------------------------------*/
        $(document).ready(function() {
            $('select').niceSelect();
        });

        /* -------------------------------------------------------------
         fact counter
         ------------------------------------------------------------- */
        $('.counter').counterUp({
            delay: 15,
            time: 2000
        });

        /* -----------------------------------------------------
            Variables
        ----------------------------------------------------- */
        var leftArrow = '<i class="fa fa-arrow-left"></i>';
        var leftAngle = '<i class="fa fa-angle-left"></i>';
        var rightArrow = '<i class="fa fa-arrow-right"></i>';
        var rightAngle = '<i class="fa fa-angle-right"></i>';

        
        /*------------------------------------------------
            banner-slider
        ------------------------------------------------*/
        $('.banner-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: false,
            smartSpeed:1500,
            items: 1,
            navText: [ leftArrow, rightArrow],
        });

        /*------------------------------------------------
            service-slider
        ------------------------------------------------*/
        $('.service-slider').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            smartSpeed:1500,
            items: 3,
            navText: [ leftAngle, rightAngle],
            responsive: {
                0: {
                    items: 1
                },
                426: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1100: {
                    items: 3
                },
            }
        });

        /*------------------------------------------------
            service-slider
        ------------------------------------------------*/
        $('.service-slider-2').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            center: true,
            smartSpeed:1500,
            items: 3,
            navText: [ leftAngle, rightAngle],
            responsive: {
                0: {
                    items: 1
                },
                426: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1100: {
                    items: 3
                },
            }
        });

        /*------------------------------------------------
            footer-slider
        ------------------------------------------------*/
        $('.footer-post-slider').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            items: 2,
            navText: [ leftAngle, rightAngle],
        });

        /*------------------------------------------------
            project-slider
        ------------------------------------------------*/
        $('.project-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            smartSpeed:1500,
            items: 4,
            navText: [ leftAngle, rightAngle],
            responsive: {
                0: {
                    items: 1
                },
                426: {
                    items: 2
                },
                767: {
                    items: 3
                },
                1100: {
                    items: 4
                },
                1600: {
                    items: 4
                },
            }
        });

        /*------------------------------------------------
            partner-slider
        ------------------------------------------------*/
        $('.partner-slider').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed:1500,
            items: 1,
            navText: [ leftAngle, rightAngle],
            responsive: {
                0: {
                    items: 1
                },
                426: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1100: {
                    items: 5
                },
            }
        });

        /*------------------------------------------------
            partner-slider-2
        ------------------------------------------------*/
        $('.partner-slider-2').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed:1500,
            items: 1,
            navText: [ leftAngle, rightAngle],
            responsive: {
                0: {
                    items: 1
                },
                426: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1100: {
                    items: 4
                },
            }
        });

        /*-------------------------------------------------
            wow js init
        --------------------------------------------------*/
        new WOW().init();

        /*------------------
           back to top
        ------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });

    });

    $(window).on("scroll", function() {
        /*---------------------------------------
        sticky menu activation && Sticky Icon Bar
        -----------------------------------------*/

        var mainMenuTop = $(".navbar-area");
        if ($(window).scrollTop() >= 1) {
            mainMenuTop.addClass('navbar-area-fixed');
        }
        else {
            mainMenuTop.removeClass('navbar-area-fixed');
        }
        
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
        }
    });


    // Preloader
    $(window).on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    // let specialOfferBanner = true

    // $('.special-offer-banner-bottom-block').click(function() {
    //     $('.special-offer-banner').fadeOut();
    //     specialOfferBanner = false;
    // });

    // $(window).on('scroll', function() {
    //     var scrollTop = $(window).scrollTop();
    //     var documentHeight = $(document).height();
    //     var windowHeight = $(window).height();
    //     var scrollPercent = (scrollTop / (documentHeight - windowHeight)) * 100;

    //     if (scrollPercent >= 30 && specialOfferBanner) {
    //         $('.special-offer-banner').fadeIn();
    //     } else {
    //         $('.special-offer-banner').fadeOut();
    //     }
    // });
    $('.testimonials-grid').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        prevArrow: $('.prev-arrow'),
        nextArrow: $('.next-arrow'),
    });

})(jQuery);