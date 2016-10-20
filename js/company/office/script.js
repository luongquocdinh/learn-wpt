

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
    NEWS設定
  ----------------------------------------------------------*/
  if($("#office").length){

        //初期位置
        var target=0*301
        //var target=targetNum*301-($(this).offset().top-$("#office .list .column").eq(0).offset().top)+70;
        //var target=$(this).offset().top-$("#office .list .column").eq(0).offset().top;
        $("#officeImage .slideArea ul").stop().animate({ "top":-target},800, 'easeInOutExpo');
        $("#officeImage").css({"top":370});

    //プルダウン各項目
    $("#office .list .column").hover(
       function () {

        $("#officeImage").css({"top":"50%"});
        $(this).find("a").addClass("active");
        $("#office .list .column").not($(this)).find("a").addClass("non");

        //画像
        var targetNum=$("#office .list .column").index(this);
        console.log(targetNum);
        var target=targetNum*301
        //var target=targetNum*301-($(this).offset().top-$("#office .list .column").eq(0).offset().top)+70;
        //var target=$(this).offset().top-$("#office .list .column").eq(0).offset().top;
        $("#officeImage .slideArea ul").stop().animate({ "top":-target},800, 'easeInOutExpo');

        $("#officeImage .slideArea ul li").removeClass("non");
        $("#officeImage .slideArea ul li").removeClass("active");
        $("#officeImage .slideArea ul li").eq(targetNum).addClass("active");
        $("#officeImage .slideArea ul li").not( $("#officeImage .slideArea ul li").eq(targetNum)).addClass("non");


       },function () {
        $("#office .list .column a").removeClass("non");
        $("#office .list .column a").removeClass("active");

       }
    );


    //詳細画像切り替え
    $('#office .contents .imageArea ul.image li').eq(0).find("a").addClass("active");
    $('#office .contents .imageArea ul.image li a').click(function (e) {
      e.preventDefault();
      var target=$(this).find("img").attr("src");
      $('#office .contents .imageArea ul.image li a').removeClass("active");
      $(this).addClass("active");
      $('#office .contents .imageArea .mainImage img').attr("src",target);
    });
  }


});

/*----------------------------------------------------------
    画面サイズ設定
----------------------------------------------------------*/
function pageResize(){
}

