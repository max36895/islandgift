jQuery(document).ready(function ($) {

    $(".full-header").sticky({
        topSpacing: 0,
        wrapperClassName: 'full-header'
    });

    $('.mobile-toggle-menu').click(function(){


        var customHeaderHeight = jQuery(window).height();
     
        var menuHeight = jQuery('section.topBar').height();

        var mainMenuHeight = jQuery('.mainMenu').height();
     
        var windowPosition = (jQuery(window).scrollTop() - customHeaderHeight) + menuHeight;

        if($( "nav.mainMenu" ).hasClass('mobile-show')){
            $( ".mobile-toggle-menu").removeClass('mobile-open');
            $( "nav.mainMenu" ).removeClass('mobile-show');
            $('.topBar.full-header.is-sticky,.normal-menu').css({
                "position" : "fixed",
                "top" :0
             });

            if(!$( ".topBar.full-header" ).hasClass('is-sticky')){
                $('.topBar.full-header').css({
                    "position" : "absolute",
                    "bottom" :'0'
                });
            }


        }else{


            $( "nav.mainMenu" ).addClass('mobile-show');

            $( ".mobile-toggle-menu").addClass('mobile-open');

            if(jQuery('section.topBar').hasClass('full-header')){
         
                var windowPosition = (jQuery(window).scrollTop() - customHeaderHeight) + menuHeight;


                if(jQuery(window).scrollTop() == 0){

                    $('html,body').animate({ scrollTop: (customHeaderHeight - menuHeight)}, 'slow');

                }

            }else{
                var windowPosition = jQuery(window).scrollTop();
            }
                

                if(windowPosition > 0){
                    windowPosition = windowPosition;
                }else{
                    windowPosition = 0;
                }
                

                if(customHeaderHeight < (mainMenuHeight + menuHeight)){

                    $('.topBar.full-header.is-sticky,.normal-menu').css({
                            "position" : "absolute",
                            "top" :windowPosition
                        });
                }else{

                    $('.topBar.full-header.is-sticky,.normal-menu').css({
                        "position" : "fixed",
                        "top" :0,
                        "bottom":''
                    });
                }

             }
    });

    $('.image-wrapper').hover(function(){


        $(this).find('.mouse-effect').stop().animate({'opacity':'0.6'});
        $(this).find('.extra-links').stop().animate({'top':'50%'});

    },function(){


        $(this).find('.mouse-effect').stop().animate({'opacity':'0'});
        $(this).find('.extra-links').stop().animate({'top':'-50%'});

    });

    $("#portfolio-column-change a").click(function (event) {
        event.preventDefault();
        var view = $(this).attr("id");
        if (view == "three") {
            $(".holder.quicksand li").removeClass("four columns").addClass("one-third column");
            if ($data) {
                $("ul.holder.quicksand").removeAttr("style");
                $data.find("li").removeClass("four columns").addClass("one-third column")
            }
        } else {
            $(".holder.quicksand li").removeClass("one-third column").addClass("four columns");
            if ($data) {
                $("ul.holder.quicksand").removeAttr("style");
                $data.find("li").removeClass("one-third column").addClass("four columns")
            }
        }
    });

    $("a[rel^='prettyPhoto']").prettyPhoto();

    $(".ads img").addClass("img-frame");

    $('.footer .fr a').click(function(){
        $('html,body').animate({ scrollTop: 0}, 'slow');
    });


     // Set menu height
    
    var menuHeight = $('section.topBar').height();

    
   

    $('#main-menu li a, .menu-item li a').click(function(e){

        if($( "nav.mainMenu" ).hasClass('mobile-show')){
            $( ".mobile-toggle-menu").removeClass('mobile-open');
            $( "nav.mainMenu" ).removeClass('mobile-show');
            $('.topBar.full-header.is-sticky').css({
                "position" : "fixed",
                "top" :0
            });

        }

            var content = $(this).attr('href');
            var checkURL = content.match(/^#([^\/]+)$/i);
            if(checkURL){
                
                e.preventDefault();

                var goPosition = $(content).offset().top - (menuHeight - 10);

                $('html,body').animate({ scrollTop: goPosition}, 'slow');

            }

    });

    $('a.scrollable').click(function(e){

        e.preventDefault();

            var content = $(this).attr('href');
            var checkURL = content.match(/#([^\/]+)$/i);
            if(checkURL[0]){

                var goPosition = $('section'+checkURL[0]).offset().top - (menuHeight - 10);

                $('html,body').animate({ scrollTop: goPosition}, 'slow');

            }

    });

    $("#main-menu li").click(function () {
        $("#main-menu li").removeClass("active");
        $(this).addClass("active")
    });

    $(".filter li a").click(function (event) {
        event.preventDefault();
        var test = $(this).parent().attr("class");
        $(".filter li a").removeClass("main-btn").addClass("gray");
        $(this).removeClass("gray").addClass("main-btn");
    });
    
    $("#foot a").click(function () {
        $("#menu li").removeClass("active");
        $("#menu li:first").addClass("active")
    });

    var adjustParallax = function(){

        $('section.parallax').each(function(){

            var sectionParallax = "#"+$(this).attr('id');

            jQuery(sectionParallax).parallax("50%", "0.3");


        });
    }


    var $filterType = $("#filterOptions li.active a").attr("rel");
    var $holder = $("ul.quicksand");
    var $data = $holder.clone();
    $("#filterOptions li a").click(function (e) {
        $("#filterOptions li").removeClass("active");
        var $filterType = $(this).attr("rel");
        $(this).parent().addClass("active");
        if ($filterType == "all") var $filteredData = $data.find("li");
        else var $filteredData = $data.find("li[data-type~=" + $filterType + "]");
        $holder.quicksand($filteredData, {
            duration: 800,
            easing: "easeInOutQuad"
        }, function () {
            $("a[rel^='prettyPhoto']").prettyPhoto();

            adjustParallax();

            $('ul.quicksand').removeAttr('style');
            
             $('.image-wrapper').hover(function(){

                $(this).find('.mouse-effect').stop().animate({'opacity':'0.6'});
                $(this).find('.extra-links').stop().animate({'top':'50%'});

                },function(){


                $(this).find('.mouse-effect').stop().animate({'opacity':'0'});
                $(this).find('.extra-links').stop().animate({'top':'-50%'});

                });

        });
        return false;
    });





    var lastId, topMenu = $("#main-menu"),
    topMenuHeight = topMenu.outerHeight() + 500;
    menuItems = topMenu.find('a');

        scrollItems = menuItems.map(function () {

            content = $(this).attr("href");

            if(content){
                var checkURL = content.match(/^#([^\/]+)$/i);

                if(checkURL){

                    var item = $($(this).attr("href"));
                    if (item.length) return item

                }
            }
        });

        
    $(window).scroll(function () {
        var fromTop = $(this).scrollTop() + topMenuHeight;
        var cur = scrollItems.map(function () {
            if ($(this).offset().top < fromTop) return this
        });
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";
        if (lastId !== id) {
            lastId = id;
           menuItems.parent().removeClass("active").end().filter("[href=#" + id + "]").parent().addClass("active")
        }
    });

    
    $("#iso-column-change a").click(function (event) {
        event.preventDefault();
        var view = $(this).attr("id");
        if (view == "three") {
            $("#iso-portfolio li").removeClass("four columns").addClass("one-third column");
            $('#iso-portfolio').isotope('reLayout');
        } else {
            $("#iso-portfolio li").removeClass("one-third column").addClass("four columns");
            $('#iso-portfolio').isotope('reLayout');

        }

        adjustParallax();
    });


    var $container = $('#iso-portfolio');

    $('#iso-filter a').click(function(event){

        var selector = $(this).attr('rel');

        if(selector != "all"){
            selector = '.'+selector;
        }else{
            selector = '*';
        }

        $container.isotope({ filter: selector },function(){
        
            adjustParallax();


        });
         
        return false;
    });

     
});


jQuery(window).load(function () {

     jQuery(".mainSlider").flexslider({
        animation: "slide",
        animationLoop: true,
        directionNav: false,
        controlNav: true
    });


    jQuery('.nzs-isotype').isotope({
        itemSelector : '.nzs-iso-enabled'
     });

});


var scrollDetect = jQuery(window).scrollTop();

jQuery(window).scroll(function(){

    var lastTopPosition = jQuery('.topBar').css('top').replace('px','');

    var customHeaderHeight = jQuery(window).height();
 
        var menuHeight = jQuery('section.topBar').height();

        var mainMenuHeight = jQuery('.mainMenu').height();
 
        if(jQuery('section.topBar').hasClass('full-header')){
 
            var windowPosition = (jQuery(window).scrollTop() - customHeaderHeight) + menuHeight;

        }else{
        
            var windowPosition = jQuery(window).scrollTop();
        }

    


    if(jQuery('.topBar').css('position') == "absolute" && jQuery( "nav.mainMenu" ).hasClass('mobile-show')){

        var u = parseInt(lastTopPosition - windowPosition) + (menuHeight + mainMenuHeight);

        if(u < -75){
            jQuery('.mainMenu').removeClass('mobile-show');
            jQuery( ".mobile-toggle-menu").removeClass('mobile-open');
            jQuery('.topBar').css({
                        'position':'fixed',
                        'top':0,
                        'bottom':""
                    });
        }

    }

    if(scrollDetect > jQuery(window).scrollTop()){

        var p = parseInt(lastTopPosition - windowPosition);


        if(p >= 0){
            if(jQuery('section.topBar.nzs-mobile-menu').hasClass('full-header') ){

                if(lastTopPosition > windowPosition && windowPosition >= 0){
 
                    jQuery('.topBar').css({
                        'position':'fixed',
                        'top':0,
                        'bottom':""
                    });

                }

            }else{

                jQuery('.topBar.nzs-mobile-menu').css({
                    'position':'fixed',
                    'top':0,
                    'bottom':""
                });
            }
        }




    }else{

         



        if(jQuery('section.topBar').css('position') == 'fixed' && jQuery( "nav.mainMenu" ).hasClass('mobile-show')){

            if(customHeaderHeight < (mainMenuHeight + menuHeight)){
            jQuery('.topBar,.normal-menu').css({
                            "position" : "absolute",
                            "top" :windowPosition 
                        });
            }
        }


    }
    scrollDetect = jQuery(window).scrollTop();

});


jQuery(window).resize(function(){


    if(jQuery('.mobile-toggle-menu').css('display') == 'none' && jQuery('.mainMenu').hasClass('mobile-show')){
        jQuery('.mainMenu').removeClass('mobile-show');
        jQuery( ".mobile-toggle-menu").removeClass('mobile-open');
       jQuery('.normal-menu').css({
                        "position" : "fixed",
                        "top" :0,
                        "bottom":''
                    });
    }

    var resizeMenuHeight = jQuery('section.topBar').height();


    if(jQuery('.mobile-toggle-menu').css('display') == 'block' && jQuery('.mainMenu').hasClass('mobile-show')){

        jQuery('.topBar.full-header.is-sticky,.normal-menu').css({
                "position" : "fixed",
                "top" :0
             });

            if(!jQuery( ".topBar.full-header" ).hasClass('is-sticky')){
                jQuery('.topBar.full-header').css({
                    "position" : "absolute",
                    "bottom" :'0'
                });
            }

    }
    
    var lastTopPosition = jQuery('.topBar').css('top').replace('px','');


    jQuery('.nzs-isotype').isotope('reLayout',function(){
        
       jQuery('section.parallax').each(function(){

            var sectionParallax = "#"+jQuery(this).attr('id');

            jQuery(sectionParallax).parallax("50%", "0.3");


        });

    });
});

(function(){
    jQuery('.image-wrapper a.photo-up').live("click",function(){
        jQuery(this).parents('.image-wrapper').find('a.photo-box').trigger("click");
        return false;
    });
})(jQuery);


