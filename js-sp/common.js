var WinScroll;
var WinW;
var WinH;

if (navigator.userAgent.indexOf('Android') > 0) {
  var AndroidFlag = true;
} else {
  var AndroidFlag = false;
}

/*----------------------------------------------------------
  スマホ判定リダイレクト
----------------------------------------------------------*/
if (navigator.userAgent.indexOf('iPhone') > 0 || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {
  var hash=location.hash;
  var path=location.pathname;
  var host=location.hostname;
  var reUrl="http://"+host+"/sp"+path;
  //console.log(reUrl)
  //location.href =reUrl;
}else if(navigator.userAgent.indexOf('iPad') > 0) {
  var hash=location.hash;
  var path=location.pathname;
  var host=location.hostname;
  var reUrl="http://"+host+"/sp"+path;
  //console.log(reUrl)
  //location.href =reUrl;
}

/*----------------------------------------------------------
    初期表示設定
----------------------------------------------------------*/
jQuery.event.add(window,"load",function() {

  //PRODUCT
  if($("#products").length){
      setTimeout(function(){
        $("#products .visual").addClass("view");
      },200);
  }

});


/*----------------------------------------------------------
    初期設定
----------------------------------------------------------*/
$(function() {
  
    /*----------------------------------------------------------
      LocalStorage
  ----------------------------------------------------------*/
  var LocalStorage="";
  LocalStorage=String(localStorage.getItem('milbon_url'));
  //console.log(localStorage);
  if(!$("#contact").length){
    localStorage.setItem('milbon_url', window.location.href);
  }else{
    $(':hidden[name="sendURL"]').val(localStorage.getItem('milbon_url'));
  }

  /*----------------------------------------------------------
    画面サイズ設定
  ----------------------------------------------------------*/
  Resize();
  $(window).bind('orientationchange scroll load resize',function(){
    Resize();
  });

  /*----------------------------------------------------------
    MENU
  ----------------------------------------------------------*/
  var OldScroll=0;
  $("#menuButton .hamburger").click(function (e) {
      e.preventDefault();
      $(this).toggleClass("is-active");
      if($(this).hasClass('is-active')){
        $("#navi").css({"position":"fixed","top":50});
        $("#navi").fadeIn(500);
        OldScroll=WinScroll;
        setTimeout(function(){
          $("#wrapper").css({"height":WinH,"overflow":"hidden"});
          $('html,body').animate({ scrollTop:0},10, 'easeInOutExpo');
           setTimeout(function(){
              $("#navi").css({"position":"absolute"});
           },100);
        },500);
      }else{
        $("#wrapper").css({"height":"auto","overflow":"auto"});
        $("#navi").css({"position":"fixed","top":-WinScroll+50});
        setTimeout(function(){
          $('html,body').stop().animate({ scrollTop:OldScroll},5, 'easeInOutExpo');
          setTimeout(function(){
            $("#navi").fadeOut(500);
          },100);
        },100);
      }
  });

  $('#navi ul.globalNavi li.menuCompany > a').click(function (e) {
    e.preventDefault();
    $(this).toggleClass("active");
    if($(this).hasClass('active')){
      $("#navi ul.globalNavi .menuCompanyList").show();
    }else{
      $("#navi ul.globalNavi .menuCompanyList").hide();
    }
  });
  /*----------------------------------------------------------
    SCROLL設定
  ----------------------------------------------------------*/
  $('#footer .toTop').click(function (e) {
    e.preventDefault();
    $('html,body').animate({ scrollTop:0},800, 'easeInOutExpo');
  });


  /*----------------------------------------------------------
    ヘッダー設定
  ----------------------------------------------------------*/



  /*----------------------------------------------------------
    ARROW DOWN設定
  ----------------------------------------------------------*/
  // $('#top .scrolldown a,#products .detail .detail_header .scrolldown a').click(function (e) {
  //    e.preventDefault();
  //     $(this).find(".arrow_img").animate({ "top":12},{duration:300,easing: 'easeInOutQuart',complete: function() {
  //       $(this).css({"top":-12}).animate({ "top":0},{duration:300,easing: 'easeInOutQuart',complete: function() {
  //       }});
  //     }});
  // });

  /*----------------------------------------------------------
    ARROW TOP設定
  ----------------------------------------------------------*/
  $('#footer .toTop').hover(
     function () {
      $(this).find(".arrow_img").animate({ "top":-12},{duration:300,easing: 'easeInOutQuart',complete: function() {
        $(this).css({"top":12}).animate({ "top":0},{duration:300,easing: 'easeInOutQuart',complete: function() {
        }});
      }});
     },function () {
     }
  );
  /*----------------------------------------------------------
    ARROW RIGHT設定
  ----------------------------------------------------------*/
  $('#topBrand a.view,#topLinks .view a,#topNews .view a').hover(
     function () {
      $(this).find(".arrow_img").animate({ "left":12},{duration:300,easing: 'easeInOutQuart',complete: function() {
        $(this).css({"left":-12}).animate({ "left":0},{duration:300,easing: 'easeInOutQuart',complete: function() {
        }});
      }});
     },function () {
     }
  );

  /*----------------------------------------------------------
    ARROW LEFT設定
  ----------------------------------------------------------*/
  $('#products .mainvisual .btn_return a').hover(
     function () {
      $(this).find(".arrow_img").animate({ "left":-12},{duration:300,easing: 'easeInOutQuart',complete: function() {
        $(this).css({"left":12}).animate({ "left":0},{duration:300,easing: 'easeInOutQuart',complete: function() {
        }});
      }});
     },function () {
     }
  );


  /*----------------------------------------------------------
    PRODUCT設定
  ----------------------------------------------------------*/
  if($("#products").length){
    $('#products .header .category').click(function (e) {
      e.preventDefault();
      if(!$(this).hasClass('active')){
        $(this).addClass("active");
        $(this).find(".pullDown").show();
        var height=$(this).find(".pullDown").height();
        $(this).find(".pullDown").css({"height":0,"opacity":1});
        $(this).find(".pullDown").animate({ "height":height},{duration:300,easing: 'easeOutQuart',complete: function() {
        }});

      }else{
        $(this).removeClass("active");
        $(this).find(".pullDown").animate({ "height":0},{duration:300,easing: 'easeInQuart',complete: function() {
          $(this).hide();
          $(this).css({"height":"auto","opacity":0});
        }});
      }
    });


    //モーダル表示
    $("#products .detail .detail_main .product_list .column a").click(function (e) {
       e.preventDefault();
       var target=$(this).attr("href");
       ProductLoad(target)
    });

    //スクロール
    $("#products .detail .detail_header .scrolldown a").click(function (e) {
       e.preventDefault();
      $('html,body').animate({ scrollTop:WinH-170},1000, 'easeInOutExpo');
    });
  }

   /*----------------------------------------------------------
    NEWS設定
  ----------------------------------------------------------*/
  if($("#news").length){
    $('#news .header .category .btn').click(function (e) {
      e.preventDefault();
      if(!$(this).parent().hasClass('active')){
        $(this).parent().addClass("active");
        $(this).parent().find(".pullDown").show();
        var height=$(this).parent().find(".pullDown").height();
        $(this).parent().find(".pullDown").css({"height":0,"opacity":1});
        $(this).parent().find(".pullDown").animate({ "height":height},{duration:300,easing: 'easeOutQuart',complete: function() {
        }});

      }else{
        $(this).parent().removeClass("active");
        $(this).parent().find(".pullDown").animate({ "height":0},{duration:300,easing: 'easeInQuart',complete: function() {
          $(this).hide();
          $(this).css({"height":"auto","opacity":0});
        }});
      }
    });
  }

   /*----------------------------------------------------------
    policy設定
  ----------------------------------------------------------*/
  if($("#policy").length){
    $('#policy .header .category .btn').click(function (e) {
      e.preventDefault();
      if(!$(this).parent().hasClass('active')){
        $(this).parent().addClass("active");
        $(this).parent().find(".pullDown").show();
        var height=$(this).parent().find(".pullDown").height();
        $(this).parent().find(".pullDown").css({"height":0,"opacity":1});
        $(this).parent().find(".pullDown").animate({ "height":height},{duration:300,easing: 'easeOutQuart',complete: function() {
        }});

      }else{
        $(this).parent().removeClass("active");
        $(this).parent().find(".pullDown").animate({ "height":0},{duration:300,easing: 'easeInQuart',complete: function() {
          $(this).hide();
          $(this).css({"height":"auto","opacity":0});
        }});
      }
    });
  }
   /*----------------------------------------------------------
    office設定
  ----------------------------------------------------------*/
  if($("#office").length){
    // $('#office .header .category .btn').click(function (e) {
    //   e.preventDefault();
    //   if(!$(this).parent().hasClass('active')){
    //     $(this).parent().addClass("active");
    //     $(this).parent().find(".pullDown").show();
    //     var height=$(this).parent().find(".pullDown").height();
    //     $(this).parent().find(".pullDown").css({"height":0,"opacity":1});
    //     $(this).parent().find(".pullDown").animate({ "height":height},{duration:300,easing: 'easeOutQuart',complete: function() {
    //     }});

    //   }else{
    //     $(this).parent().removeClass("active");
    //     $(this).parent().find(".pullDown").animate({ "height":0},{duration:300,easing: 'easeInQuart',complete: function() {
    //       $(this).hide();
    //       $(this).css({"height":"auto","opacity":0});
    //     }});
    //   }
    // });
  }


  /*----------------------------------------------------------
    CONTACT設定
  ----------------------------------------------------------*/
  if($("#contact").length){
    $("#contact .contents .attention .btn a").click(function (e) {
       e.preventDefault();
       if(!$(this).hasClass("view")){
        $(this).addClass('view');
        $("#contact .contents .attention .area").slideToggle();
       }else{
        $(this).removeClass('view');
        $("#contact .contents .attention .area").slideToggle();
       }
    });
    $("#contact .contents .attention .close a").click(function (e) {
       e.preventDefault();
        $("#contact .contents .attention .btn a").removeClass('view');
        $("#contact .contents .attention .area").slideToggle();
    });
    $("#contact .contents .form .column .conf a").click(function (e) {
       e.preventDefault();
       if(!$(this).hasClass("ok")){
        $(this).addClass('ok');
       }else{
        $(this).removeClass('ok');
       }
    });
    $("#contact .contents .form .column ul.subject_btn01 li a").click(function (e) {
       e.preventDefault();
       if(!$(this).hasClass("active")){
        $("#contact .contents .form .column ul.subject_btn01 li a").removeClass('active');
        $(this).addClass('active');
       }else{
        $(this).removeClass('active');
       }
    });

  }

  /*----------------------------------------------------------
    ORDIVE特別対応
  ----------------------------------------------------------*/
  if($("#products.product_detail").length){
    var code='<a href="/guide/faq" class="pageLink btn_faq"><span>ヘアカラー使用上の注意点</span></a>';
    if($("#products h1 img").attr("alt")=="ORDEVE"){
      $("#products .btn_about_product").after(code);
    }
  }

});

/*----------------------------------------------------------
  PRODUCT モーダル表示
----------------------------------------------------------*/
function ProductLoad(File){
  //通信開始
  $.ajax({
    url: File+".html?randam="+Math.random(100),type:'GET',dataType: 'html',timeout:10000,
    success: function(data) {
      $("body").append('<div id="modal"><div id="loadArea"></div><a href="#" class="close"></a></div>')
      $("#loadArea").append($(data).find(".entry"));
      if(AndroidFlag){
        $("#modal").css({"position":"absolute","top":0});
        $("#modal").show();
        $("#wrapper").css({"height":10,"overflow":"hidden"});
        $('html,body').animate({ scrollTop:0},{duration:10,easing: 'easeInOutExpo',complete: function() {
            $("#modal").css({"position":"absolute","top":0});
          }});
      }else{
        $("#modal").css({"position":"fixed","top":0});
        $("#modal").fadeIn(500);
        setTimeout(function(){
          $("#wrapper").css({"height":10,"overflow":"hidden"});
          //$('html,body').animate({ scrollTop:0},10, 'easeInOutExpo');
          $('html,body').animate({ scrollTop:0},{duration:10,easing: 'easeInOutExpo',complete: function() {
            $("#modal").css({"position":"absolute","top":0});
          }});
        },500);
      }
      OldScroll=WinScroll;


      // if($(this).hasClass('is-active')){
      //   $("#navi").css({"position":"fixed","top":50});
      //   $("#navi").fadeIn(500);
      //   OldScroll=WinScroll;
      //   setTimeout(function(){
      //     $("#wrapper").css({"height":WinH,"overflow":"hidden"});
      //     $('html,body').animate({ scrollTop:0},10, 'easeInOutExpo');
      //      setTimeout(function(){
      //         $("#navi").css({"position":"absolute"});
      //      },100);
      //   },500);
      // }else{
      //   $("#wrapper").css({"height":"auto","overflow":"auto"});
      //   $("#navi").css({"position":"fixed","top":-WinScroll+50});
      //   setTimeout(function(){
      //     $('html,body').stop().animate({ scrollTop:OldScroll},5, 'easeInOutExpo');
      //     setTimeout(function(){
      //       $("#navi").fadeOut(500);
      //     },100);
      //   },100);
      // }

      //CLOSE
      $("#modalbg,#modal .close").click(function (e) {
          e.preventDefault();
          if(AndroidFlag){
            $("#wrapper").css({"height":"auto","overflow":"auto"});
            $('html,body').stop().animate({ scrollTop:OldScroll},5, 'easeInOutExpo');
            $("#modal").remove();
          }else{
            $("#wrapper").css({"height":"auto","overflow":"auto"});
            $("#modal").css({"position":"fixed","top":-WinScroll+0});
            setTimeout(function(){
              $('html,body').stop().animate({ scrollTop:OldScroll},5, 'easeInOutExpo');
              setTimeout(function(){
                $("#modal").fadeOut(500);
                setTimeout(function(){
                  $("#modal").remove();
                },500);
              },100);
            },100);
          }
          
      });
    },
    error: function(data) {
      console.log("ERROR");
    },
    complete : function(data) {
    }
  });
}

/*----------------------------------------------------------
    画面サイズ設定
----------------------------------------------------------*/
function Resize(){
  WinScroll = $(window).scrollTop();
  WinW = $(window).width();
  WinH = window.innerHeight ? window.innerHeight : $(window).height();

  /*----------------------------------------------------------
    ヘッダー設定
  ----------------------------------------------------------*/
  //プルダウン
  $("#header .pulldown01 ul").width($("#header .pulldown01 ul li").length*448);
  $("#header .pulldown02 ul").width($("#header .pulldown02 ul li").length*448);

  /*----------------------------------------------------------
    NEWS設定
  ----------------------------------------------------------*/
  if($("#news").length){
    //ナビゲーション
    if(WinScroll>=0&&WinScroll<$("#wrapper").height()-$("#footer").height()-WinH+WinH*0.5-100){
      $("#news .detail_prev").css("top",WinH+40-130+34-WinH*0.5+40);
      $("#news .detail_next").css("top",WinH+40-130+34-WinH*0.5+40);
    }else{
      var target=$("#wrapper").height()-$("#footer").height()-WinH+WinH*0.5;
      console.log(target-WinScroll+WinH+40-130+34-WinH*0.5-60)
      $("#news .detail_prev").css("top",target-WinScroll+WinH+40-130+34-WinH*0.5-60);
      $("#news .detail_next").css("top",target-WinScroll+WinH+40-130+34-WinH*0.5-60);
    }
  }

  /*----------------------------------------------------------
    PRODUCT設定
  ----------------------------------------------------------*/
  if($("#products").length){
    //メインビジュアル
    // $("#products .mainvisual .visual").height(WinH-40-130);
    // $("#products .detail").css("margin-top",WinH-40-130);

    // //
    // if(WinScroll>100){
    //   $("#products .detail .detail_main").addClass("view");
    //   $("#products .detail .detail_header .scrolldown").stop().fadeOut(500);
    // }else{
    //   $("#products .detail .detail_main").removeClass("view");
    //   $("#products .detail .detail_header .scrolldown").fadeIn(500);
    // }
    // //ナビゲーション
    // if(WinScroll<WinH*0.5-40){
    //   $("#products .detail_prev").css("top",WinH+40-130+34-WinScroll);
    //   $("#products .detail_next").css("top",WinH+40-130+34-WinScroll);
    // }else if(WinScroll>=WinH*0.5-40&&WinScroll<$("#wrapper").height()-$("#footer").height()-WinH+WinH*0.5){
    //   $("#products .detail_prev").css("top",WinH+40-130+34-WinH*0.5+40);
    //   $("#products .detail_next").css("top",WinH+40-130+34-WinH*0.5+40);
    // }else{
    //   var target=$("#wrapper").height()-$("#footer").height()-WinH+WinH*0.5;
    //   console.log(target-WinScroll+WinH+40-130+34-WinH*0.5+40)
    //   $("#products .detail_prev").css("top",target-WinScroll+WinH+40-130+34-WinH*0.5+40);
    //   $("#products .detail_next").css("top",target-WinScroll+WinH+40-130+34-WinH*0.5+40);
    // }
  }
}
