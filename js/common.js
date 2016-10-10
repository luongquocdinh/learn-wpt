var WinScroll;
var WinW;
var WinH;
var LoadEnd=false;


/*----------------------------------------------------------
  スマホ判定リダイレクト
----------------------------------------------------------*/
// if (navigator.userAgent.indexOf('iPhone') > 0 || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {
//   var hash=location.hash;
//   var path=location.pathname;
//   var host=location.hostname;
//   var reUrl="http://"+host+"/sp"+path;
//   //console.log(reUrl)
//   location.href =reUrl;
// }else if(navigator.userAgent.indexOf('iPad') > 0) {
//   var hash=location.hash;
//   var path=location.pathname;
//   var host=location.hostname;
//   var reUrl="http://"+host+"/sp"+path;
//   //console.log(reUrl)
//   //location.href =reUrl;
// }
if(navigator.userAgent.indexOf('iPad') > 0) {
  var iPad=true;
}else{
  var iPad=false;
}


/*----------------------------------------------------------
    初期表示設定
----------------------------------------------------------*/
jQuery.event.add(window,"load",function() {

  //cover
  setTimeout(function(){
    $("#cover").fadeOut(500);
    LoadEnd=true;
  },500);

  //PRODUCT
  if($("#products").length){
      setTimeout(function(){
        $("#products .visual").addClass("view");
        productsParaView();
      },200);
  }

  //CONCEPT
  if($("#concept").length){
      setTimeout(function(){
        $("#concept .visual").addClass("view");
        productsParaView();
      },200);
  }
  //NEWS
  if($("#news").length){
      setTimeout(function(){
        newsParaView();
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
    画面遷移設定
  ----------------------------------------------------------*/
  $('a.pageLink').click(function (e) {
    e.preventDefault();
    var target=$(this).attr("href");
    $("#cover").fadeIn(500);
    setTimeout(function(){
      location.href =target;
    },500);
  });


  /*----------------------------------------------------------
    SCROLL設定
  ----------------------------------------------------------*/
  $('.toTop').click(function (e) {
    e.preventDefault();
    $('html,body').animate({ scrollTop:0},800, 'easeInOutExpo');
  });


  /*----------------------------------------------------------
    ヘッダー設定
  ----------------------------------------------------------*/
  
  var nowCompany=false;
  if($("#header .header-block ul.globalNavi li:nth-child(4) a").hasClass('active')){
    nowCompany=true;
  }
  //GLOBAL MENU
  $("#header .header-block ul.globalNavi li:nth-child(1),#header .header-block ul.globalNavi li:nth-child(2),#header .header-block ul.globalNavi li:nth-child(3),#header .header-block ul.globalNavi li:nth-child(5),#header .header-block ul.globalNavi li:nth-child(6)").hover(
     function () {
      $(this).addClass("active");
      if(!nowCompany)$("#header .header-block ul.globalNavi li:nth-child(4)").find("a").removeClass("active");
      $("#header .header-block ul.globalNavi li").not($(this)).addClass("non");
      $("#header .pulldown03").removeClass("view");
      $("#header .pulldown02").removeClass("view");
      $("#header .pulldown01").removeClass("view");
      $("#wrapper").animate({ "opacity":1},{duration:300,easing: 'easeInOutQuart',complete: function() {
      }});
     },function () {
      $("#header .header-block ul.globalNavi li").removeClass("non");
      $("#header .header-block ul.globalNavi li").removeClass("active");
     }
  );
  //FOR HAIR DESIGNERプルダウン
  $("#header .header-block ul.subMenu li.submenu01 a").hover(
     function () {
      $("#header .header-block ul.subMenu li.submenu01 a").addClass("view");
      $("#header .pulldown01").addClass("view");
      $("#header .header-block ul.subMenu li.submenu02 a").removeClass("view");
      $("#header .pulldown02").removeClass("view");
      $("#header .header-block ul.subMenu li.submenu03 a").removeClass("view");
      $("#header .pulldown03").removeClass("view");
      $("#wrapper").stop().animate({ "opacity":0.5},{duration:300,easing: 'easeInOutQuart',complete: function() {
      }});
     },function () {

     }
  );
  $("#header .header-block ul.subMenu li.submenu02 a").hover(
     function () {
      $("#header .header-block ul.subMenu li.submenu01 a").removeClass("view");
      $("#header .pulldown01").removeClass("view");
     },function () {

     }
  );
  //GROUP SITEプルダウン
  // $("#header .header-block ul.subMenu li.submenu02 a").hover(
  //    function () {
  //     $("#header .header-block ul.subMenu li.submenu02 a").addClass("view");
  //     $("#header .pulldown02").addClass("view");
  //     $("#header .header-block ul.subMenu li.submenu01 a").removeClass("view");
  //     $("#header .pulldown01").removeClass("view");
  //     $("#header .header-block ul.subMenu li.submenu03 a").removeClass("view");
  //     $("#header .pulldown03").removeClass("view");
  //     $("#wrapper").animate({ "opacity":0.5},{duration:300,easing: 'easeInOutQuart',complete: function() {
  //     }});
  //    },function () {

  //    }
  // );
  //COMPANYプルダウン
  $("#header .header-block ul.globalNavi li:nth-child(4)").hover(
     function () {
      $(this).find("a").addClass("active");
      $("#header .header-block ul.globalNavi li").not($(this)).addClass("non");
      $("#header .header-block ul.subMenu li.submenu03 a").addClass("view");
      $("#header .pulldown03").addClass("view");
      $("#header .header-block ul.subMenu li.submenu02 a").removeClass("view");
      $("#header .pulldown02").removeClass("view");
      $("#header .header-block ul.subMenu li.submenu01 a").removeClass("view");
      $("#header .pulldown01").removeClass("view");
      $("#wrapper").animate({ "opacity":0.5},{duration:300,easing: 'easeInOutQuart',complete: function() {
      }});
     },function () {
      $("#header .header-block ul.globalNavi li").removeClass("non");
      $("#header .header-block ul.globalNavi li").removeClass("active");
     }
  );
  $("#header").hover(
     function () {
     },function () {
      if(!nowCompany)$("#header .header-block ul.globalNavi li:nth-child(4)").find("a").removeClass("active");
      $("#header .header-block ul.subMenu li a").removeClass("view");
      $("#header .pulldown").removeClass("view");
      $("#wrapper").stop().animate({ "opacity":1},{duration:300,easing: 'easeInOutQuart',complete: function() {
      }});
     }
  );
  //プルダウン横スライド////////////////////////
  $("#header .pulldown").each(function(i) {
    var allnum=$(this).find("li").length;
    //ひとつ448
    $(this).find("ul").width(allnum*448);
    //ウィンドウより大きいとき
    if($(this).find("ul").width()>WinW){
      $(this).mousemove( function(evt) {
        var mouseX=evt.clientX;
        var Zero=mouseX-WinW*0.5;
        var targetX=-mouseX*(($(this).find("ul").width()-WinW)/WinW)
        $(this).find("ul").css("left",targetX);
        //console.log("mouseX:"+mouseX+" Zero:"+Zero);
      });
    }
  });


  /*----------------------------------------------------------
    ARROW DOWN設定
  ----------------------------------------------------------*/
  // $('#top .scrolldown a,#products .detail .detail_header .scrolldown a,#concept .detail .detail_header .scrolldown a,#history .header .scrolldown a').hover(
  //    function () {
  //     $(this).find("span").animate({ "top":14,"opacity":0},{duration:300,easing: 'easeInOutQuart',complete: function() {
  //       $(this).css({"top":-14,"opacity":0}).animate({ "top":0,"opacity":1},{duration:300,easing: 'easeInOutQuart',complete: function() {
  //       }});
  //     }});
  //    },function () {
  //    }
  // );
  /*----------------------------------------------------------
    ARROW TOP設定
  ----------------------------------------------------------*/
  $('#footer .toTop').hover(
     function () {
      $(this).find("span").animate({ "top":-14,"opacity":0},{duration:300,easing: 'easeInOutQuart',complete: function() {
        $(this).css({"top":14,"opacity":0}).animate({ "top":0,"opacity":1},{duration:300,easing: 'easeInOutQuart',complete: function() {
        }});
      }});
     },function () {
     }
  );
  /*----------------------------------------------------------
    ARROW RIGHT設定
  ----------------------------------------------------------*/
  // $('#topBrand a.view,#topLinks .view a,#topNews .view a').hover(
  //    function () {
  //     $(this).find(".arrow_img").animate({ "left":12},{duration:300,easing: 'easeInOutQuart',complete: function() {
  //       $(this).css({"left":-12}).animate({ "left":0},{duration:300,easing: 'easeInOutQuart',complete: function() {
  //       }});
  //     }});
  //    },function () {
  //    }
  // );

  /*----------------------------------------------------------
    ARROW LEFT設定
  ----------------------------------------------------------*/
  // $('#products .mainvisual .btn_return a').hover(
  //    function () {
  //     $(this).find(".arrow_img").animate({ "left":-12},{duration:300,easing: 'easeInOutQuart',complete: function() {
  //       $(this).css({"left":12}).animate({ "left":0},{duration:300,easing: 'easeInOutQuart',complete: function() {
  //       }});
  //     }});
  //    },function () {
  //    }
  // );


  /*----------------------------------------------------------
    NEWS設定
  ----------------------------------------------------------*/
  if($("#news").length){
    $('#news .header .category').hover(
       function () {
        $(this).find(".pullDown").show();
        var height=$(this).find(".pullDown").height();
        $(this).find(".pullDown").css({"height":0,"opacity":1});
        $(this).find(".pullDown").animate({ "height":height},{duration:300,easing: 'easeOutQuart',complete: function() {
        }});
       },function () {
        $(this).find(".pullDown").animate({ "height":0},{duration:300,easing: 'easeInQuart',complete: function() {
          $(this).hide();
          $(this).css({"height":"auto","opacity":0});
        }});
       }
    );
    //プルダウン各項目
    $("#news .header .category .pullDown li").hover(
       function () {
        $(this).addClass("active");
        $("#news .header .category .pullDown li").not($(this)).addClass("non");
       },function () {
        $("#news .header .category .pullDown li").removeClass("non");
        $("#news .header .category .pullDown li").removeClass("active");

       }
    );
    //詳細ナビゲーション
    $('#news .detail_prev a').hover(
       function () {
        $(this).find(".arrow").stop().animate({ "left":-96},{duration:300,easing: 'easeInQuart',complete: function() {
            $('#news .detail_prev a .over').stop().animate({ "opacity":1},{duration:300,easing: 'easeOutQuart',complete: function() {
            }});
        }});
       },function () {
        $('#news .detail_prev a .over').animate({ "opacity":0},{duration:300,easing: 'easeOutQuart',complete: function() {
            $('#news .detail_prev a .arrow').css("left",96).animate({ "left":0},{duration:500,easing: 'easeOutQuart',complete: function() {
            }});
        }});
       }
    );
    $('#news .detail_next a').hover(
       function () {
        $(this).find(".arrow").stop().animate({ "left":96},{duration:300,easing: 'easeInQuart',complete: function() {
            $('#news .detail_next a .over').stop().animate({ "opacity":1},{duration:300,easing: 'easeOutQuart',complete: function() {
            }});
        }});
       },function () {
        $('#news .detail_next a .over').animate({ "opacity":0},{duration:300,easing: 'easeOutQuart',complete: function() {
            $('#news .detail_next a .arrow').css("left",-96).animate({ "left":0},{duration:500,easing: 'easeOutQuart',complete: function() {
            }});
        }});
       }
    );
  }

  /*----------------------------------------------------------
    PRODUCT設定
  ----------------------------------------------------------*/
  if($("#products").length){
    $('#products .header .category').hover(
       function () {
        $(this).find(".pullDown").show();
        var height=$(this).find(".pullDown").height();
        $(this).find(".pullDown").css({"height":0,"opacity":1});
        $(this).find(".pullDown").animate({ "height":height},{duration:300,easing: 'easeOutQuart',complete: function() {
        }});
       },function () {
        $(this).find(".pullDown").animate({ "height":0},{duration:300,easing: 'easeInQuart',complete: function() {
          $(this).hide();
          $(this).css({"height":"auto","opacity":0});
        }});
       }
    );
    //プルダウン各項目
    $("#products .header .category .pullDown li").hover(
       function () {
        $(this).addClass("active");
        $("#products .header .category .pullDown li").not($(this)).addClass("non");
       },function () {
        $("#products .header .category .pullDown li").removeClass("non");
        $("#products .header .category .pullDown li").removeClass("active");

       }
    );
    //詳細ナビゲーション
    $('#products .detail_prev a').hover(
       function () {
        $(this).find(".arrow").stop().animate({ "left":-96},{duration:300,easing: 'easeInQuart',complete: function() {
            $('#products .detail_prev a .over').stop().animate({ "opacity":1},{duration:300,easing: 'easeOutQuart',complete: function() {
            }});
        }});
       },function () {
        $('#products .detail_prev a .over').animate({ "opacity":0},{duration:300,easing: 'easeOutQuart',complete: function() {
            $('#products .detail_prev a .arrow').css("left",96).animate({ "left":0},{duration:500,easing: 'easeOutQuart',complete: function() {
            }});
        }});
       }
    );
    $('#products .detail_next a').hover(
       function () {
        $(this).find(".arrow").stop().animate({ "left":96},{duration:300,easing: 'easeInQuart',complete: function() {
            $('#products .detail_next a .over').stop().animate({ "opacity":1},{duration:300,easing: 'easeOutQuart',complete: function() {
            }});
        }});
       },function () {
        $('#products .detail_next a .over').animate({ "opacity":0},{duration:300,easing: 'easeOutQuart',complete: function() {
            $('#products .detail_next a .arrow').css("left",-96).animate({ "left":0},{duration:500,easing: 'easeOutQuart',complete: function() {
            }});
        }});
       }
    );
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
    OFFICE設定
  ----------------------------------------------------------*/
  // if($("#office").length){
  //   $('#office .header .category').hover(
  //      function () {
  //       $(this).find(".pullDown").show();
  //       var height=$(this).find(".pullDown").height();
  //       $(this).find(".pullDown").css({"height":0,"opacity":1});
  //       $(this).find(".pullDown").animate({ "height":height},{duration:300,easing: 'easeOutQuart',complete: function() {
  //       }});
  //      },function () {
  //       $(this).find(".pullDown").animate({ "height":0},{duration:300,easing: 'easeInQuart',complete: function() {
  //         $(this).hide();
  //         $(this).css({"height":"auto","opacity":0});
  //       }});
  //      }
  //   );
  //   //プルダウン各項目
  //   $("#office .header .category .pullDown li").hover(
  //      function () {
  //       $(this).addClass("active");
  //       $("#office .header .category .pullDown li").not($(this)).addClass("non");
  //      },function () {
  //       $("#office .header .category .pullDown li").removeClass("non");
  //       $("#office .header .category .pullDown li").removeClass("active");

  //      }
  //   );
  // }
  /*----------------------------------------------------------
    CONCEPT設定
  ----------------------------------------------------------*/
  if($("#concept").length){

    //スクロール
    $("#concept .detail .detail_header .scrolldown a").click(function (e) {
       e.preventDefault();
      $('html,body').animate({ scrollTop:WinH-170},1000, 'easeInOutExpo');
    });


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
    $("#contact .contents .form .column ul.conf li a").click(function (e) {
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
    OUT
  ----------------------------------------------------------*/
  if($("#our").length){
   $("#our .block .scrolldown a").each(function(e) {
      $(this).click(function (e) {
        e.preventDefault();
        var target=$(this).attr("href");
        var targetY = $("#"+target).offset().top;
        $('html,body').animate({ scrollTop:targetY},800, 'easeInOutExpo');
     });
   });
   $("#wrapper > #pageTop").hide();
  }

  /*----------------------------------------------------------
    ORDIVE特別対応
  ----------------------------------------------------------*/
  if($("#contents.product_detail").length){
    var code='<a href="../../guide/faq" class="pageLink btn_faq"><span>ヘアカラー使用上の注意点</span></a>';
    if($("#breadcrumb ul li").eq(2).find("a").text()=="ORDEVE"){
      $("#products").prepend(code);
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
      $("body").append('<div id="modalbg"></div><div id="modal"><div id="loadArea"></div><a href="#" class="close"></a></div>')
      $("#loadArea").append($(data).find(".entry"));
      $("#modalbg").fadeIn(500);
      setTimeout(function(){
        $("#modal").addClass("view");
      },200);
      //CLOSE
      $("#modalbg,#modal .close").click(function (e) {
         e.preventDefault();
         $("#modal").removeClass("view");
         $("#modalbg").fadeOut(500);
         setTimeout(function(){
           $("#modal").remove();
           $("#modalbg").remove();
         },500);
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
      //console.log(target-WinScroll+WinH+40-130+34-WinH*0.5-60)
      $("#news .detail_prev").css("top",target-WinScroll+WinH+40-130+34-WinH*0.5-60);
      $("#news .detail_next").css("top",target-WinScroll+WinH+40-130+34-WinH*0.5-60);
    }
    if(LoadEnd)newsParaView();
  }

  /*----------------------------------------------------------
    PRODUCT設定
  ----------------------------------------------------------*/
  if($("#products").length){
    //メインビジュアル
    $("#products .mainvisual .visual").height(WinH-40-130);
    $("#products .detail").css("margin-top",WinH-40-130);

    //
    if(WinScroll>100){
      $("#products .detail .detail_main").addClass("view");
      $("#products .detail .detail_header .scrolldown").stop().fadeOut(500);
    }else{
      $("#products .detail .detail_main").removeClass("view");
      $("#products .detail .detail_header .scrolldown").fadeIn(500);

    }
    //ナビゲーション
    if(WinScroll<WinH*0.5-40){
      $("#products .detail_prev").css("top",WinH+40-130+34-WinScroll);
      $("#products .detail_next").css("top",WinH+40-130+34-WinScroll);
    }else if(WinScroll>=WinH*0.5-40&&WinScroll<$("#wrapper").height()-$("#footer").height()-WinH+WinH*0.5-50){
      $("#products .detail_prev").css("top",WinH+40-130+34-WinH*0.5+40);
      $("#products .detail_next").css("top",WinH+40-130+34-WinH*0.5+40);
    }else{
      var target=$("#wrapper").height()-$("#footer").height()-WinH+WinH*0.5;
      //console.log(target-WinScroll+WinH+40-130+34-WinH*0.5+40)
      $("#products .detail_prev").css("top",target-WinScroll+WinH+40-130+34-WinH*0.5+40-50);
      $("#products .detail_next").css("top",target-WinScroll+WinH+40-130+34-WinH*0.5+40-50);
    }
    if(LoadEnd)productsParaView();

    
    //フェードアウト設定
    var deg=100/WinH;
    if(WinScroll<WinH){
      $("#products .mainvisual").css("opacity",(100-WinScroll*deg)/100);
    }else if(WinScroll>WinH){
      $("#products .mainvisual").css("opacity",0);
    }
  }

  /*----------------------------------------------------------
    COCEPT設定
  ----------------------------------------------------------*/
  if($("#concept").length){
    //メインビジュアル
    $("#concept .mainvisual .visual").height(WinH-40-130);
    $("#concept .detail").css("margin-top",WinH-40-130);

    //
    if(WinScroll>100){
      $("#concept .detail .detail_main").addClass("view");
      $("#concept .detail .detail_header .scrolldown").stop().fadeOut(500);
    }else{
      $("#concept .detail .detail_main").removeClass("view");
      $("#concept .detail .detail_header .scrolldown").fadeIn(500);

    }
    //フェードアウト設定
    var deg=100/WinH;
    if(WinScroll<WinH){
      $("#concept .mainvisual").css("opacity",(100-WinScroll*deg)/100);
    }else if(WinScroll>WinH){
      $("#concept .mainvisual").css("opacity",0);
    }
  }

  /*----------------------------------------------------------
    OUT
  ----------------------------------------------------------*/
  if($("#our").length){
   $("#our .block").height(WinH);
   $("#our .header").height(WinH-175);
   $("#our .block").each(function(i) {
      $(this).find(".textArea").css("top",($(this).height()-$(this).find(".textArea").height())*0.5)
   });
  }


  /*----------------------------------------------------------
    BEAUTY設定
  ----------------------------------------------------------*/
  if($("#beauty").length){
    $("#beauty .list .column a .over span").width(WinW*0.5);
    $("#beauty .list .column a .over span").css("display","table-cell")
    $("#beauty .list .column a .over span").height($("#beauty .list .column a").height());
    $("#beauty .list .column a .over").width(WinW*0.5);
    $("#beauty .list .column a .over").height($("#beauty .list .column a").height());

  }
}



/*----------------------------------------------------------
  表示設定
----------------------------------------------------------*/
function productsParaView(){
  $("#products .list .column").each(function(i) {
    var targetY = $(this).offset().top - WinH * 0.9;
    if (WinScroll > targetY) {
      //VIEW/////////////////////////////////
      $(this).addClass("show");
      // var target=$(this)
      // setTimeout(function(){
      //   target.addClass("show");
      // },100*i);
    }
  });
}
function newsParaView(){
  $("#news .list .column").each(function(i) {
    var targetY = $(this).offset().top - WinH * 0.9;
    if (WinScroll > targetY) {
      //VIEW/////////////////////////////////
      $(this).addClass("show");
      // var target=$(this)
      // setTimeout(function(){
      //   target.addClass("show");
      // },100*i);
    }
  });
}