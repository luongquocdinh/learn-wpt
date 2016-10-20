
var nowMoniter=0;
var nowScroll=false;
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
    初期設定
  ----------------------------------------------------------*/
  $("#footer").hide();
  $('#pageTop a').click(function (e) {
    e.preventDefault();
    MoniterView(0);
    nowMoniter=0;
    pageResize();
  });
  $("#our .scrolldown a").click(function (e) {
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
      // 27 Esc
      // 8  BackSpace
      // 9  Tab
      // 32 Space
      // 45 Insert
      // 46 Delete
      // 35 End
      // 36 Home
      // 33 PageUp
      // 34 PageDown
      // 38 ↑
      // 40 ↓
      // 37 ←
      // 39 →
    // 処理の例
    if (keycode == 40) {
      e.preventDefault();
      if(nowMoniter<5){
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
        if(nowMoniter<5){
          var target=nowMoniter+1;
          console.log("下方向のスクロールアニメーション"+target+" nowMoniter:"+nowMoniter);
          MoniterView(target)
          nowMoniter=target;
          pageResize();
        }
      }
    }
  });

});
/*----------------------------------------------------------
    画面表示
----------------------------------------------------------*/
function MoniterView(target,toItem){
  console.log("MoniterView:"+target);
  nowScroll=true;
  if(target==5){
    $("#our .scrolldown").fadeOut(500);
  }
  $("#our").stop().animate({ "top":-target*WinH},{duration:1200,easing: 'easeInOutQuart',complete: function() {
    nowScroll=false;

    //
    if(target==5){
      $("#footer").show();
      $("#our").css({"position":"absolute","top":-WinH*5});
      $("#contents").css({"height":WinH-40,"min-height":WinH-40});
      
    }else{
      $("#footer").hide();
      $("#our").css({"position":"fixed","top":-target*WinH});
      $("#contents").css({"height":0,"min-height":0});
      $("#our .scrolldown").fadeIn(500);
    }
  }});

}
/*----------------------------------------------------------
    画面サイズ設定
----------------------------------------------------------*/
function pageResize(){
  if(iPad){
    $("#our").height(WinH*6);
    $("#our .block").height(WinH);
    $("#our .firstPos").css({"margin-top":-$("#our .firstPos").height()*0.5});
  }else{
    $("#our").height(WinH*6);
    $("#our .block").height(WinH);
    $("#our .firstPos").css({"margin-top":-$("#our .firstPos").height()*0.5});
  }


}

