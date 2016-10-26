

/*----------------------------------------------------------
    初期表示設定
----------------------------------------------------------*/
jQuery.event.add(window,"load",function() {


});


/*----------------------------------------------------------
    初期設定
----------------------------------------------------------*/
$(function() {

  $("#faq01").fadeIn(500);
  $('#faq .navigation .navigationInner ul li a').click(function (e) {
    e.preventDefault();
    if(!$(this).hasClass('active')){
      $("#faq .navigation .navigationInner ul li a").removeClass('active');
      $(this).addClass('active');
      var target=$(this).attr("href");
      $("#faq .contents").hide()
      $(target).fadeIn(500);
    }
  });

  $('#faq .contents .column .q a').click(function (e) {
    e.preventDefault();
    if($(this).parent().parent().hasClass('active')){
      $(this).parent().parent().removeClass('active');
    }else{
      $(this).parent().parent().addClass('active');
    }
  });

  $('#faq .contents .column a.close').click(function (e) {
    e.preventDefault();
    if($(this).parent().hasClass('active')){
      $(this).parent().removeClass('active');
    }else{
      $(this).parent().addClass('active');
    }
  });


});
