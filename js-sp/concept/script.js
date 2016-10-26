

/*----------------------------------------------------------
    初期表示設定
----------------------------------------------------------*/
jQuery.event.add(window,"load",function() {


});


/*----------------------------------------------------------
    初期設定
----------------------------------------------------------*/
$(function() {

 //Load player api asynchronously.
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
            height: '416',
            width: '740',
                videoId: 'JfYLHYqX7_E',
                playerVars: {
                    autohide: 2,
                    controls:0,
                    modestbranding:1,
                    rel:0,
                    start: 0,
                    color: 'white',
                    showinfo:0,
                    wmode: 'transparent',
                    loop:0,
                    enablejsapi: 1,
                    theme:'light'
                },
               events: {
           'onReady': onPlayerReady,
                   'onStateChange': onPlayerStateChange
               }
            });
        }
    // 再生が可能になると呼び出されます。
      function onPlayerReady(event) {
  
      }
      function onPlayerStateChange(event){
            switch(event.data){
                case YT.PlayerState.ENDED:
        /* 再生終了 */
          $(".btn_play").fadeIn(200,function(){});
                    break;
                case YT.PlayerState.PLAYING:
        /* 再生中 */

          $(".btn_play").fadeOut(500,function(){});
                    break;
                case YT.PlayerState.PAUSED:
        /* 一時停止 */
          $(".btn_play").fadeIn(500,function(){});
                    break;
                case YT.PlayerState.BUFFERING:
        /* バッファリング中 */
                    break;
                case YT.PlayerState.CUED:
        /* 頭出しされた */
                    break;
            }
      }
    window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;

    $(".btn_play").click(function(){
      //player.seekTo(30,true);
      $(this).fadeOut(500,function(){
        player.playVideo();
      });
      return false;
   });


  /*----------------------------------------------------------
     movie
  ----------------------------------------------------------*/
  $('#concept .mainvisual .visual a').click(function (e) {
     e.preventDefault();
     $(this).hide();
     $("#concept .mainvisual .visual").append('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/JfYLHYqX7_E?rel=0&wmode=transparent&showinfo=0&autohide=1&vq=hd720&autoplay=1" frameborder="0" allowfullscreen></iframe>')
  });


});
