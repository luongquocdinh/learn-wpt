

/*----------------------------------------------------------
    初期表示設定
----------------------------------------------------------*/
jQuery.event.add(window,"load",function() {


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
    history設定
  ----------------------------------------------------------*/
  if($("#history").length){

    //スクロール
    $("#history .header .scrolldown a").click(function (e) {
       e.preventDefault();
       if(nowHistory=="header"){
        var target=$("#y1960").offset().top
       }else if(nowHistory=="y1960"){
        var target=$("#y1965").offset().top
       }else if(nowHistory=="y1965"){
        var target=$("#y1969").offset().top
       }else if(nowHistory=="y1969"){
        var target=$("#y1984").offset().top
       }else if(nowHistory=="y1984"){
        var target=$("#y1988").offset().top
       }else if(nowHistory=="y1988"){
        var target=$("#y2001").offset().top
       }else if(nowHistory=="y2001"){
        var target=$("#y2004").offset().top
       }else if(nowHistory=="y2004"){
        var target=$("#y2005").offset().top
       }else if(nowHistory=="y2005"){
        var target=$("#y2010").offset().top
       }else if(nowHistory=="y2010"){
        var target=$("#y2013").offset().top
       }else if(nowHistory=="y2013"){
        var target=$("#y2016").offset().top
       }else if(nowHistory=="y2016"){
        var target=$("#y2016").offset().top
       }
      $('html,body').animate({ scrollTop:target-40},1000, 'easeInOutExpo');
    });


    $("#history .navigation ul li a").click(function (e) {
       e.preventDefault();
       var target=$($(this).attr("href")).offset().top

       $('html,body').animate({ scrollTop:target-40},1000, 'easeInOutExpo');
    });
  }


});

/*----------------------------------------------------------
    画面サイズ設定
----------------------------------------------------------*/

var nowHistory="header"
function pageResize(){

  /*----------------------------------------------------------
    history設定
  ----------------------------------------------------------*/
  if($("#history").length){
    $("#history .header").height(WinH-40);
    $("#history .yearContents").height(WinH);
    $("#history .yearContents").each(function(e) {
      $(this).find(".textArea").css("top",(WinH-$(this).find(".textArea").height())*0.5);
    });
    //位置
    if(WinScroll<WinH){
      var nextHistory="header"
    }else if(WinScroll>WinH&&WinScroll<=WinH*2-50){
      var nextHistory="y1960";
    }else if(WinScroll>WinH*2-50&&WinScroll<=WinH*3-50){
      var nextHistory="y1965";
    }else if(WinScroll>WinH*3-50&&WinScroll<=WinH*4-50){
      var nextHistory="y1969";
    }else if(WinScroll>WinH*4-50&&WinScroll<=WinH*5-50){
      var nextHistory="y1984";
    }else if(WinScroll>WinH*5-50&&WinScroll<=WinH*6-50){
      var nextHistory="y1988";
    }else if(WinScroll>WinH*6-50&&WinScroll<=WinH*7-50){
      var nextHistory="y2001";
    }else if(WinScroll>WinH*7-50&&WinScroll<=WinH*8-50){
      var nextHistory="y2004";
    }else if(WinScroll>WinH*8-50&&WinScroll<=WinH*9-50){
      var nextHistory="y2005";
    }else if(WinScroll>WinH*9-50&&WinScroll<=WinH*10-50){
      var nextHistory="y2010";
    }else if(WinScroll>WinH*10-50&&WinScroll<=WinH*11-50){
      var nextHistory="y2013";
      $("#history .header .scrolldown a").fadeIn(500);
    }else if(WinScroll>WinH*11-50&&WinScroll<=WinH*12-50){
      var nextHistory="y2016";
      $("#history .header .scrolldown a").fadeOut(500);
    }
    console.log(nowHistory);
    if(nextHistory!=nowHistory){
    }
    $("#history .navigation ul li a").removeClass("active");
    $("#N"+nowHistory).addClass("active");
    nowHistory=nextHistory;

    //ナビゲーション
    var nonArea=$("#history .navigation").height()+70-WinH;
    var target_y=$("#contents").height()-WinH-nonArea;
    console.log(WinScroll+"|"+target_y+"|"+nonArea);

    if(WinScroll>target_y){
      $(".navigation").css({"position":"absolute","top":target_y})
    }else{
      $(".navigation").css({"position":"fixed","top":70})
    }

  }
}

