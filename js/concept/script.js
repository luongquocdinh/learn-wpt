

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
     movie
  ----------------------------------------------------------*/
  $('#concept .mainvisual .visual a').click(function (e) {
     e.preventDefault();
     $(this).hide();
     $("#concept .mainvisual .visual").append('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/JfYLHYqX7_E?rel=0&wmode=transparent&showinfo=0&autohide=1&vq=hd720&autoplay=1" frameborder="0" allowfullscreen></iframe>')
  });


});
