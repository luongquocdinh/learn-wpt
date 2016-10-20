

/*----------------------------------------------------------
    初期表示設定
----------------------------------------------------------*/
jQuery.event.add(window,"load",function() {


});

var nowMoniter=0;
var nowScroll=false;

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
    初期設定
  ----------------------------------------------------------*/
  $("#footer").hide();
  $('#pageTop a').click(function (e) {
    e.preventDefault();
    MoniterView(0);
    nowMoniter=0;
    pageResize();
  });
  $("#history .scrolldown a").click(function (e) {
    e.preventDefault();
    var target=nowMoniter+1;
    MoniterView(target)
    nowMoniter=target;
    pageResize();
  });
  document.onkeydown = function(e) {
    var shift, ctrl;
    
    // Mozilla(Firefox, NN) and Opera
    if (e != null) {
      keycode = e.which;
      ctrl    = typeof e.modifiers == 'undefined' ? e.ctrlKey : e.modifiers & Event.CONTROL_MASK;
      shift   = typeof e.modifiers == 'undefined' ? e.shiftKey : e.modifiers & Event.SHIFT_MASK;
      // イベントの上位伝播を防止
      e.preventDefault();
      e.stopPropagation();
    // Internet Explorer
    } else {
      keycode = event.keyCode;
      ctrl    = event.ctrlKey;
      shift   = event.shiftKey;
      // イベントの上位伝播を防止
      event.returnValue = false;
      event.cancelBubble = true;
    }
    
    // キーコードの文字を取得
    keychar = String.fromCharCode(keycode).toUpperCase();
    
    // 特殊キーコードの対応については次を参照
    // 処理の例
    if (keycode == 40) {
      e.preventDefault();
      if(nowMoniter<11){
      var target=nowMoniter+1;
      MoniterView(target)
      nowMoniter=target;
      pageResize();
      }
    }
  }

  /*----------------------------------------------------------
    ホイール設定
  ----------------------------------------------------------*/
  if($("#history").length){
    var save  = 0; // タイムスタンプ保存用
    var clock = 0; // タイムスタンプ比較用
    $('body').on('mousewheel', function(e) {
      if(!nowScroll){
        clock = e.timeStamp - save;
        save  = e.timeStamp;
        //if(clock < 10) return false; // 比較結果が50msより少ない場合はキャンセル
        // ここからイベントの処理
        //console.log(e.deltaY)
        if(e.deltaY >= 1) {
          // 上方向のスクロールアニメーション
          if(nowMoniter>0&&WinScroll<10){
            var target=nowMoniter-1;
            console.log("上方向のスクロールアニメーション"+target+" nowMoniter:"+nowMoniter);
            MoniterView(target)
            nowMoniter=target;
            pageResize();
          }
        } else {
          // 下方向のスクロールアニメーション
          if(nowMoniter<11){
            var target=nowMoniter+1;
            console.log("下方向のスクロールアニメーション"+target+" nowMoniter:"+nowMoniter);
            MoniterView(target)
            nowMoniter=target;
            pageResize();
          }
        }
      }
    });
  }
  /*----------------------------------------------------------
    history設定
  ----------------------------------------------------------*/
  if($("#history").length){

    //スクロール
    // $("#history .header .scrolldown a").click(function (e) {
    //    e.preventDefault();
    //    if(nowHistory=="header"){
    //     var target=$("#y1960").offset().top
    //    }else if(nowHistory=="y1960"){
    //     var target=$("#y1965").offset().top
    //    }else if(nowHistory=="y1965"){
    //     var target=$("#y1969").offset().top
    //    }else if(nowHistory=="y1969"){
    //     var target=$("#y1984").offset().top
    //    }else if(nowHistory=="y1984"){
    //     var target=$("#y1988").offset().top
    //    }else if(nowHistory=="y1988"){
    //     var target=$("#y2001").offset().top
    //    }else if(nowHistory=="y2001"){
    //     var target=$("#y2004").offset().top
    //    }else if(nowHistory=="y2004"){
    //     var target=$("#y2005").offset().top
    //    }else if(nowHistory=="y2005"){
    //     var target=$("#y2010").offset().top
    //    }else if(nowHistory=="y2010"){
    //     var target=$("#y2013").offset().top
    //    }else if(nowHistory=="y2013"){
    //     var target=$("#y2016").offset().top
    //    }else if(nowHistory=="y2016"){
    //     var target=$("#y2016").offset().top
    //    }
    //   $('html,body').animate({ scrollTop:target-40},1000, 'easeInOutExpo');
    // });


    $("#history .navigation ul li a").click(function (e) {
       e.preventDefault();
       var target=$(this).attr("href")
      MoniterView(target)
      nowMoniter=parseInt(target);
      pageResize();
    });
  }


});

/*----------------------------------------------------------
    画面表示
----------------------------------------------------------*/
function MoniterView(target,toItem){
  console.log("MoniterView:"+target);
  nowScroll=true;
  if(target==11){
    $("#history .scrolldown").fadeOut(500);
  }
  $("#history .scrollContents").stop().animate({ "top":-target*WinH},{duration:1200,easing: 'easeInOutQuart',complete: function() {
    nowScroll=false;

    //
    if(target==11){
      $("#footer").show();
      $("#history").height(WinH);
      $("#history .scrollContents").css({"position":"absolute","top":-WinH*11-40});
      $("#contents").css({"height":WinH-40,"min-height":WinH-40});
      
    }else{
      $("#footer").hide();
      $("#history").height("auto");
      $("#history .scrollContents").css({"position":"fixed","top":-target*WinH});
      $("#contents").css({"height":0,"min-height":0});
      $("#history .scrolldown").fadeIn(500);
    }
        //位置
    if(nowMoniter==0){
      var nextHistory="header"
    }else if(nowMoniter==1){
      var nextHistory="y1960";
    }else if(nowMoniter==2){
      var nextHistory="y1965";
    }else if(nowMoniter==3){
      var nextHistory="y1969";
    }else if(nowMoniter==4){
      var nextHistory="y1984";
    }else if(nowMoniter==5){
      var nextHistory="y1988";
    }else if(nowMoniter==6){
      var nextHistory="y2001";
    }else if(nowMoniter==7){
      var nextHistory="y2004";
    }else if(nowMoniter==8){
      var nextHistory="y2005";
    }else if(nowMoniter==9){
      var nextHistory="y2010";
    }else if(nowMoniter==10){
      var nextHistory="y2013";
    }else if(nowMoniter==11){
      var nextHistory="y2016";
    }
    $("#history .navigation ul li a").removeClass("active");
    $("#N"+nextHistory).addClass("active");
  }});

}
/*----------------------------------------------------------
    画面サイズ設定
----------------------------------------------------------*/

var nowHistory="header"
function pageResize(){

  /*----------------------------------------------------------
    history設定
  ----------------------------------------------------------*/
  if($("#history").length){
    $("#history .scrollContents").height(WinH*12);
    $("#history .header").height(WinH);
    $("#history .yearContents").height(WinH);
    $("#history .yearContents").each(function(e) {
      $(this).find(".textArea").css("top",(WinH-$(this).find(".textArea").height())*0.5);
    });

    //nowHistory=nextHistory;

    //ナビゲーション
    var nonArea=$("#history .navigation").height()+70-WinH;
    var target_y=$("#contents").height()-WinH-nonArea;
    console.log(WinScroll+"|"+target_y+"|"+nonArea);

    if(WinScroll>target_y){
      //$(".navigation").css({"position":"absolute","top":target_y})
    }else{
      $(".navigation").css({"position":"fixed","top":70})
    }

  }
}

