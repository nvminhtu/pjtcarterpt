;(function($) {
  
  var toggleMenuPC,
      toggleMenuSP,
      setDimension,
      setMenuChange,
      removebotForm,
      isMobile;

  "use strict";

  $(function(){
    if($(window).width()>767) {
      toggleMenuPC();
    } else {
      $('#rt-theme-menu').hide();
      $('#rt-theme-menu').removeClass('active');
      toggleMenuSP();
    }

    
    $(window).resize(function() {
      var $winWidth = $(window).width(),
          $navigation = $('#rt-theme-menu');
        
        if($winWidth > 767) {
          toggleMenuPC();
          $navigation.css("display","block");
        } else {
          var $subMenu = $('.menu-item-has-children');
          $navigation.hide();
          $subMenu.unbind("hover");
          $subMenu.find(".sub-menu").attr("style","");
          toggleMenuSP();  
        }
    });
    setDimension();
    removebotForm();
  })

  removebotForm = function(){
    var $winWidth = $(window).width();
    if($winWidth<640) {
      $(".gform_footer")
          .find("br").remove();
      $(".gform_footer").next().remove();
      $(".gform_wrapper form").next().remove();
    }
  }

  isMobile = function(){
    var useragents = [
      "iPhone",         //  Apple iPhone
      "iPod",           //  Apple iPod touch
      "Android",        //  1.5+ Android
      "dream",          //  Pre 1.5 Android
      "CUPCAKE",        //  1.5+ Android
      "blackberry9500", //  Storm
      "blackberry9530", //  Storm
      "blackberry9520", //  Storm v2
      "blackberry9550", //  Storm v2
      "blackberry9800", //  Torch
      "webOS",          //  Palm Pre Experimental
      "incognito",      //  Other iPhone browser
      "webmate",        //  Other iPhone browser
      "iPad"            //  Other iPad browser
    ],
    i = -1,
    len = arguments.length;
      
    for( ; ++ i < len; ){
      useragents.push(arguments[i]);
    }

    var
      pattern = new RegExp(useragents.join("|"), "i"),
      matchStr = UA.match(pattern);

    return matchStr? matchStr[0] : false;
  };

  setDimension = function(){
    $('#slider, #slider_area, .slide').css("height","250 !important");
    $(window).on("load resize",function(e){
      var ratioVideo = 315/560;
      var winWidth = $(".content .left").width();
      var height = winWidth*ratioVideo;
      $(".content .left iframe, .content .left object").css({
        "width": winWidth,
        "height": height
      });
      $(".content .left embed").css({
        "width": winWidth,
        "height": height
      });
      $(".content .left .addthis_toolbox iframe").css({
        "width": "auto",
        "height": "auto"
      });
      $(".content .left .addthis_button_tweet iframe").css({
        "width": "78px",
        "height": "20px"
      });
      
    });
    
;   
  }

  
  toggleMenuPC = function() {
    $navigation = $('#rt-theme-menu');

    //check SP
    var $winWidth = $(window).width();
    var $subMenu = $('.menu-item-has-children');

    $subMenu.hover(function(event) {
      $(this).find(".sub-menu").fadeIn("2000").css({
        "visibility": "visible",
        "top" : "45px"
      });
      
    },function(){
       $(this).find(".sub-menu").fadeOut("2000").css({
        "visibility": "hidden",
        "top" : "0px"
      });
    });
  }

  toggleMenuSP = function() {
    var $btn = $('.toggle_menu'),
        $navigation = $('#rt-theme-menu');

    $btn.off().click(function(){
      event.preventDefault();
      $navigation.toggleClass('active');
      if(!$navigation.hasClass('active')) {
        $navigation.slideUp(400);
      } else {
        $navigation.slideDown(400);
      }
    });

    //check SP
    var $winWidth = $(window).width();
    var $subMenu = $('.menu-item-has-children');

    $subMenu.find("a:first").off().click(function(event) {
      event.preventDefault();
      $(this).toggleClass('active');
        if(!$(this).hasClass('active')) {
          $(this).next().next().slideUp(400);
          var targetURL= $(this).attr("href");
          $(location).attr("href",targetURL).attr("target", "_blank");
        } else {
          $(this).next().next().slideDown(400);
        }
      //$(".sub-menu li a").removeClass('active');
    });

  }


})(jQuery);