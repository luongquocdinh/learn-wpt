

/*----------------------------------------------------------
    初期表示設定
----------------------------------------------------------*/
jQuery.event.add(window,"load",function() {

  var checkHomePage = $('body.home');
  if (checkHomePage.length) {
    //ローディング解除///////////////////////////////////////////////////
    setTimeout(function(){
      var load=0;
      setInterval(function(){
        if(load<100){
          load++;
        }
        $("#loading .bar p").text("loading..."+load+"%");
      },10);
      $("#loading .bar p").animate({ "left":980-90},{duration:1000,easing: 'easeInOutQuart',complete: function() {
       
      }});
      $("#loading .bar span").animate({ "width":980,"left":0},{duration:1000,easing: 'easeInOutQuart',complete: function() {
        $("#loading").addClass("out");
        setTimeout(function(){
          $("#loading").hide();
        },1000);
      }});

    },100);
  }

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
  $("#topBrand .slide-area .slide-inner .slide").width($("#topBrand .slide-area .slide-inner .slide .column").length*850);
  var maxSlide=$("#topBrand .slide-area .slide-inner .slide .column").length;
  //複製
  var dep=$("#topBrand .slide-area .slide-inner .slide").clone()
  dep.appendTo("#topBrand .slide-area .slide-inner");
  var dep=$("#topBrand .slide-area .slide-inner .slide").eq(0).clone()
  dep.appendTo("#topBrand .slide-area .slide-inner");
  var witdh=$("#topBrand .slide-area .slide-inner .slide").width()*3;
  $("#topBrand .slide-area .slide-inner").width(witdh);

  //初期位置
  var nowSlide=0;
  var firstPos=WinW*0.5-424-$("#topBrand .slide-area .slide-inner .slide").width();
  $("#topBrand .slide-area .slide-inner").css("left",firstPos-850*nowSlide);
  $(window).bind('orientationchange scroll load resize',function(){
    firstPos=WinW*0.5-424-$("#topBrand .slide-area .slide-inner .slide").width();
    $("#topBrand .slide-area .slide-inner").css("left",firstPos-850*nowSlide);
    //遷移
    $("#topBrand .slide-area .prev").width((WinW-900)*0.5+10);
    $("#topBrand .slide-area .next").width((WinW-900)*0.5+10);
  });
  $("#topBrand .slide-area .slide-inner .slide").each(function(){
    $(this).find(".column").eq(nowSlide).find(".visual").addClass('view');
    $(this).find(".column").eq(nowSlide).find(".site").addClass('view');
    $(this).find(".column").eq(nowSlide).find(".date").addClass('view');
  });
  $("#topBrand .slide-area .navi li").eq(nowSlide).find("a").addClass("active");
  
  //NEXT PREV
  $("#topBrand .slide-area .next").click(function (e) {
      e.preventDefault();
      BrandSlideMove(nowSlide+1)
  });
  $("#topBrand .slide-area .next").hover(
     function () {
      $(this).find("span").animate({ "left":50,"opacity":0},{duration:300,easing: 'easeInOutQuart',complete: function() {

      }});
     },function () {
      $(this).find("span").css({"left":-50,"opacity":0}).animate({ "left":0,"opacity":1},{duration:300,easing: 'easeInOutQuart',complete: function() {
        
      }});

     }
  );
  $("#topBrand .slide-area .prev").click(function (e) {
      e.preventDefault();
      BrandSlideMove(nowSlide-1)
  });
  $("#topBrand .slide-area .prev").hover(
     function () {
      $(this).find("span").animate({ "left":-50,"opacity":0},{duration:300,easing: 'easeInOutQuart',complete: function() {

      }});
     },function () {
      $(this).find("span").css({"left":50,"opacity":0}).animate({ "left":0,"opacity":1},{duration:300,easing: 'easeInOutQuart',complete: function() {
      }});
     }
  );
  var nowMoving=false;
  function BrandSlideMove(target){
    console.log(target+"|"+nowSlide+"|"+maxSlide)
    if(!nowMoving){
      nowMoving=true;
      //オーバー非表示
      $("#topBrand .slide-area .slide-inner .slide .column .over").hide();

      $("#topBrand .slide-area .navi li").find("a span").animate({ "opacity":0},{duration:300,easing: 'easeInOutQuart',complete: function() {
      }});
      setTimeout(function(){
        $("#topBrand .slide-area .navi li").find("a").removeClass("active");
      },300);

      $("#topBrand .slide-area .slide-inner .slide").each(function(){
        $(this).find(".column .visual").removeClass('view');
        $(this).find(".column .site").removeClass('view');
        $(this).find(".column .date").removeClass('view');
      });
      $("#topBrand .slide-area .prev").fadeOut(300);
      $("#topBrand .slide-area .next").fadeOut(300);
      $("#topBrand .slide-area .slide-inner").animate({ "left":firstPos-850*target},{duration:1000,easing: 'easeInOutQuart',complete: function() {

        //オーバー非表示
        $("#topBrand .slide-area .slide-inner .slide .column .over").show();
        
        nowMoving=false;
        $("#topBrand .slide-area .prev").fadeIn(300);
        $("#topBrand .slide-area .next").fadeIn(300);

        //最大値の場合
        if(target==maxSlide){
          target=0;
          $("#topBrand .slide-area .slide-inner").css("left",firstPos-850*target)
        }

        //最小値の場合
        if(target==-1){
          target=maxSlide-1;
          $("#topBrand .slide-area .slide-inner").css("left",firstPos-850*target)
        }

        $("#topBrand .slide-area .slide-inner .slide").each(function(){
          $(this).find(".column").eq(target).find(".visual").addClass('view');
          $(this).find(".column").eq(target).find(".site").addClass('view');
          $(this).find(".column").eq(target).find(".date").addClass('view');
        });

        nowSlide=target;

      }});

      setTimeout(function(){
        $("#topBrand .slide-area .navi li").find("a span").css("opacity",1);
        setTimeout(function(){
          $("#topBrand .slide-area .navi li").eq(target).find("a").addClass("active");
        },200);
      },500);
        
    }
  }

  /*----------------------------------------------------------
    LINK 設定
  ----------------------------------------------------------*/
  var nowLink="list01";
  var nowLinkOver=false;
  $("#topLinks ul.navi li a").click(function (e) {
      e.preventDefault();
      var target=$(this).attr("href");
      nowLink=target;
      $("#topLinks ul.navi li a").removeClass("active");
      $(this).addClass("active");
      $("#topLinks .list").stop().fadeOut(500);
      $("#topLinks .view li").stop().fadeOut(500);
      setTimeout(function(){
        $("#topLinks .list .column").removeClass("show");
        $("#topLinks ."+target).fadeIn(500);
        $("#topLinks .list .column").each(function(i) {
          var target=$(this);
          setTimeout(function(){
            target.addClass("show");
          },100*i);
        });
      },500);
      time=-5;
  });
  $("#topLinks .list").hover(
    function () {
      nowLinkOver=true;
    },
    function () {
      nowLinkOver=false;
      time=0;
    }
  );
  //自動切り替わり
  var time=0;
  setInterval(function(){
    time++;
    if(!nowLinkOver&&time>40){
      $("#topLinks ul.navi li a").removeClass("active");
      if(nowLink=="list01"){
        var target="list02";
        $("#topLinks ul.navi li").eq(1).find("a").addClass("active");
      }else if(nowLink=="list02"){
        var target="list03";
        $("#topLinks ul.navi li").eq(2).find("a").addClass("active");
      }else if(nowLink=="list03"){
        var target="list01";
        $("#topLinks ul.navi li").eq(0).find("a").addClass("active");
      }
      nowLink=target;
      $("#topLinks .list").stop().fadeOut(500);
      $("#topLinks .view li").stop().fadeOut(500);
      setTimeout(function(){
        $("#topLinks .list .column").removeClass("show");
        $("#topLinks ."+target).fadeIn(500);
        $("#topLinks .list .column").each(function(i) {
          var target=$(this);
          setTimeout(function(){
            target.addClass("show");
          },100*i);
        });
      },500);
      time=-5;
    }
  },100);

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
  if(iPad){
    $("#top").height(WinH*0.5);
    $("#top li").height(WinH*0.5);
    var deg=1200/700;
    if(WinW>WinH*deg*0.5){
      //console.log("横");
      $("#top li").css({"width":WinW,"height":WinW/deg,"margin-top":-(WinW/deg)*0.5,"margin-left":-WinW*0.5})
    }else{
      //console.log("縦")
      $("#top li").css({"width":WinH*deg*0.5,"height":WinH*0.5,"margin-top":-(WinH)*0.5,"margin-left":-(WinH*deg*0.5)*0.5})
    }
  }else{
    $("#top").height(WinH);
    $("#top li").height(WinH);
    var deg=1200/700;
    if(WinW>WinH*deg){
      //console.log("横");
      $("#top li").css({"width":WinW,"height":WinW/deg,"margin-top":-(WinW/deg)*0.5,"margin-left":-WinW*0.5})
    }else{
      //console.log("縦")
      $("#top li").css({"width":WinH*deg,"height":WinH,"margin-top":-(WinH)*0.5,"margin-left":-(WinH*deg)*0.5})
    }
  }

  if(LoadEnd)topParaView();

  //フェードアウト設定
  var deg=100/WinH;
  if(WinScroll<WinH){
    $("#top li").css("opacity",(100-WinScroll*deg)/100);
    $("#top h1").css("opacity",(100-WinScroll*deg)/100);
  }else if(WinScroll>WinH){
    $("#top li").css("opacity",0);
    $("#top h1").css("opacity",0);
  }
  if(WinScroll>20){
    $("#top .scrolldown").fadeOut(500);
  }else{
    $("#top .scrolldown").fadeIn(500);
  }

}



/*----------------------------------------------------------
  表示設定
----------------------------------------------------------*/
function topParaView(){
  $("#topLinks .list .column").each(function(i) {
    var targetY = $(this).offset().top - WinH * 0.9;
    if (WinScroll > targetY) {
      //VIEW/////////////////////////////////
      var target=$(this)
      setTimeout(function(){
        target.addClass("show");
      },100*i);
    }
  });
  $("#topNews .list .column").each(function(i) {
    var targetY = $(this).offset().top - WinH * 0.9;
    if (WinScroll > targetY) {
      //VIEW/////////////////////////////////
      var target=$(this)
      setTimeout(function(){
        target.addClass("show");
      },100*i);
    }
  });
}
$(document).on('ready', function() {
	$('a.pageLink.category-filter').on('click', function() {
		var data_slug = $(this).attr('data-slug');
		 $('form.form-filter-category').append($('<input/>', {
             type: 'hidden',
             name: 'cat-slug',
             value: data_slug
        }));
		 $('form.form-filter-category').submit();
	});
});