

/*----------------------------------------------------------
    初期表示設定
----------------------------------------------------------*/
jQuery.event.add(window,"load",function() {

  //ローディング解除///////////////////////////////////////////////////
  setTimeout(function(){
    $("#loading").addClass("out");
      setTimeout(function(){
        $("#loading").hide();
      },1000);
  },1000);

});


/*----------------------------------------------------------
    初期設定
----------------------------------------------------------*/
$(function() {

  /*----------------------------------------------------------
    画面サイズ設定
  ----------------------------------------------------------*/
  pageResize();
  $(window).bind('orientationchange scroll load resize',function(){
    pageResize();
  });

  /*----------------------------------------------------------
    SCROLL設定
  ----------------------------------------------------------*/
  $('.scrolldown a').click(function (e) {
    e.preventDefault();
    $('html,body').animate({ scrollTop:WinH-40},800, 'easeInOutExpo');
  });

  /*----------------------------------------------------------
    BLAND SLIDE設定
  ----------------------------------------------------------*/
  $("#topBrand .flexslider").flexslider({
      animation: "slide",
      animationLoop: true,
      slideshowSpeed: 8000,
      slideshow:true
  });

  /*----------------------------------------------------------
    LINK 設定
  ----------------------------------------------------------*/
  $("#topLinks ul.navi  li  a").click(function (e) {
      e.preventDefault();
      var target=$(this).attr("href");
      $("#topLinks ul.navi li a").removeClass("active");
      $(this).addClass("active");
      $("#topLinks .list").stop().fadeOut(500);
      $("#topLinks .view li").stop().fadeOut(500);
      setTimeout(function(){
        $("#topLinks ."+target).fadeIn(500);
      },500);
  });
});



/*----------------------------------------------------------
    画面サイズ設定
----------------------------------------------------------*/
function pageResize(){
  WinScroll = $(window).scrollTop();
  WinW = $(window).width();
  WinH = window.innerHeight ? window.innerHeight : $(window).height();


  /*----------------------------------------------------------
    mainvisual設定
  ----------------------------------------------------------*/
  $("#top").height(WinH);
  $("#top li").height(WinH);
  var deg=750/1017;
  if(WinW>WinH*deg){
    //console.log("横");
    $("#top li").css({"width":WinW,"height":WinW/deg,"margin-top":-(WinW/deg)*0.5+45,"margin-left":-WinW*0.5})
  }else{
    //console.log("縦")
    $("#top li").css({"width":WinH*deg,"height":WinH,"margin-top":-(WinH)*0.5+45,"margin-left":-(WinH*deg)*0.5})
  }


}
