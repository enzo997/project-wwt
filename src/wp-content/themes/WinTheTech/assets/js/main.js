$ = jQuery;
$(function() {
    //Scroll Top
    $(document).ready(function(){
        // var top_desktop = $('#header').offset().top;
        // var top_mobile = $('#header').offset().top;
        // if (top_desktop > 100)
        //     $('.header-desktop').addClass('change-color');
        // else
        //     $('.header-desktop').removeClass('change-color');
        // //////////////////////////////////////////////////////
        // if (top_mobile > 50)
        //     $('.header-mobile').addClass('change-color');
        // else
        //     $('.header-mobile').removeClass('change-color');
        // $(window).scroll(function(event) {
        //     var top = $('html,body').scrollTop();
        //     console.log("on scroll");
        //     if (top > 100){
        //         console.log("on scroll to add class");
        //         $('.header-desktop').addClass('change-color');
        //     }
        //     else {
        //         console.log("on scroll to remove class");
        //         $('.header-desktop').removeClass('change-color');
        //     }
        // });
        // $(window).scroll(function(event) {
        //     var top = $('html,body').scrollTop();
        //     if (top > 50)
        //         $('.header-mobile').addClass('change-color');
        //     else
        //         $('.header-mobile').removeClass('change-color');
        // });
        $(window).scroll(function () { 
            var top = $('#header').offset().top;
            if(top > 100){
                $('#header').addClass('change-color');
                $('#header-mobile').addClass('change-color');
            }
            else{
                $('#header').removeClass('change-color');
                $('#header-mobile').removeClass('change-color');
            }
        });
        var top = $('#header').offset().top;
        if (top > 100){
            $('.header-desktop').addClass('change-color');
            $('.header-mobile').addClass('change-color');
        }
        else{
            $('.header-desktop').removeClass('change-color');
            $('.header-mobile').removeClass('change-color');
        }
        //////////////////////////////////////////////////////
    });
    //header-mobile
    $('.header-mobile .btn-bar').click(function(){
        $(this).toggleClass('active-menu-show'),$('.header-desktop').toggleClass('menu-nav-show'),
        $('body').toggleClass('no-Scroll');
    });
    //call-slick- home-top
    $('.home-page--cont-slider-title-h1').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        speed: 1300,
        arrows: true,
        dots: true,
        prevArrow: $('.home-page--col-group button.pre'),
        nextArrow: $('.home-page--col-group button.next'),
        appendDots: $('.home-page--col-group .slider-dots'),
        infinite: false
    });
    // $('.home-page--our-packages--group-content .row').slick({
    //     dots:true,
    //     arrows: false,
    //     autoplay: true,
    //     speed: 1300,
    //     infinite: true,
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     responsive: [
    //         {
    //             breakpoint: 1200,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 1,
    //             }
    //         },
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 1,
    //             }
    //         },
    //         {
    //             breakpoint: 426,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //             }
    //         }
            
    //     ]
    // }); 
    if($(window).width() < 768){
        $('.home-page--our-packages--group-content .row').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            arrows: false,
            dots: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    }else{
        $('.home-page--our-packages--group-content .row.slick-slider').slick('unslick');
    }
    $(window).resize(function () { 
        if($(window).width() < 768){
            $('.home-page--our-packages--group-content .row').not('.slick-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                arrows: false,
                dots: true,
                responsive: [
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        }else{
            $('.home-page--our-packages--group-content .row.slick-slider').slick('unslick');
        }
    });

     // JS select
    $('select').each(function() {
        var $this = jQuery(this);
        numberOfOptions = jQuery(this).children('option').length;
        var val = $(this).val();
        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled" id="display-selected"></div>');
        var $styledSelect = $this.next('div.select-styled');
        var $list = jQuery('<ul />', {
            'class': 'select-options',
            'id': 'display-option'
        }).insertAfter($styledSelect);
        for (var i = 0; i < numberOfOptions; i++) {
            var html = $this.children('option').eq(i).text();
            if (val == $this.children('option').eq(i).val()) {
                $styledSelect.text($this.children('option').eq(i).text());
            }
            jQuery('<li />', {
                html: html,
                rel: $this.children('option').eq(i).val(),
                class: (val == $this.children('option').eq(i).val()) ? 'active' : '',
            }).appendTo($list);
        }
        var $listItems = $list.children('li');
        $styledSelect.click(function(e) {
            e.stopPropagation();
            jQuery('div.select-styled.active').not(this).each(function() {
                jQuery(this).removeClass('active').next('ul.select-options').hide();
            });
            jQuery(this).toggleClass('active').next('ul.select-options').toggle();
            
        });
        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            if ((val != $(this).attr('rel') || $(this).attr('rel') == '') && !$(this).hasClass('active')) {
                $list.children('li').removeClass('active');
                $(this).addClass('active');
                $this.val($(this).attr('rel'));
                $this.trigger('change');
            }
            $list.hide();
        });
        jQuery(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });
    });
    // change color when choose option
    $('.select').on('change', function() {
        $(this).addClass('change-color');
    });
    //call.slick top scroll bottom-contact
    $('.btn-get-free-consultant').click(function() {
        $('html, body').animate({
            scrollTop: $(".home-page--contact-form").offset().top-200
        }, 2000);
        $('#display-option').addClass('active-display');
        $('#display-selected').addClass('active-simple')
    });
    //
    $('#display-active').click(function(){
        $('#display-option').removeClass('active-display');
        $('#display-selected').removeClass('active-simple')
    });
    $('#display-option li').click(function(){
        $('#display-option').removeClass('active-display');
        $('#display-selected').removeClass('active-simple')
    });
    $('#display-selected').click(function(){
        $('#display-option').removeClass('active-display');
    });
    custom_slick();
    
    //ANIMATION
    wow = new WOW(
        {
        boxClass:     'wow',      // default
        animateClass: 'animated', // default
        offset:       0,          // default
        mobile:       false,       // default
        live:         true        // default
        }
    )
    wow.init();

});
function custom_slick(){
    $('.slider-dots button').each(function (index, element) {
        let number = $(element).text();
        let fixNumber = '0'+ number;
        $(element).text(fixNumber);
    });
    $('.slider-dots').each(function (index, element) {
        let number = $(element).find('li:last-child button').text();
        let numberFix = number;
        $(element).parent().find('.c-dots').text(numberFix);
        $(element).find('.button.next').addClass('clear-next');
    }); 
    $('.slider-dots').each(function (index, element) {
        let number = $(element).find('li:first-child button').text();
        $(element).find('.button.pre').addClass('clear-pre');
    }); 
}
