
<div id="contents">

	<nav id="breadcrumb">
    <ul>
      <li><a href="../" class="pageLink">TOP<span></span></a></li>
      <li><a href="../contact/" class="pageLink">CONTACT<span></span></a></li>
    </ul>
  </nav>

  <section id="contact">
    <a href="../brand/tenpan.html" class="btn_about_product pageLink">
      <span>ミルボン製品について</span>
    </a>
  	<header class="header">
      <h1>CONTACT</h1>
      <p>［ お問い合わせ<span> （製品や美容室について・その他のお問い合わせ）</span> ］</p>
    </header>

    <section class="contents">
    	<div class="form">
        <!--<form action="./check.html" method="get">-->
        <form action="/contact/preview" method="post" novalidate="" name="form" id="UserIndexForm" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>          <!-- お問い合わせ項目 -->
          
          <!-- 送信元URL -->
          <input type="hidden" id="sendURL" name="data[Contact][sendURL]" value="">
          <div class="column">
            <div class="subject_title">お問い合わせ項目</div>
            <ul class="subject_btn01">
              <li><a href="#" class="checkRequired contactType1">商品や美容室についてのお問い合わせ</a></li>
              <li><a href="#" class="checkRequired contactType2">その他についてのお問い合わせ</a></li>
              <input type="hidden" id="contactType" name="data[Contact][type]" value="" ?="">
            </ul>
            <ul class="subject_btn02">
              <li><a href="../contact/ir"><span>IR・株式についてのお問い合わせ</span></a></li>
              <li><a href="../contact/recruit"><span>リクルートについてのお問い合わせ</span></a></li>
            </ul>
            <div class="must t"></div>
            <div class="check">
              <div class="ok" style="display:none;"></div><!-- ←入力チェック OKの場合出力 -->
              <div class="miss" style="display:none;"><span>入力されていません</span></div><!-- ←入力チェック 誤りがあるの場合出力 -->
            </div>
          </div><!-- end column -->

          <div class="column">
            <ul class="twoColumn">
              <li>
                <div class="must"></div>
                <input type="text" id="name1" name="data[Contact][name1]" class="input01 inputRequired miss" placeholder="姓" value="">
                <div class="check">
                  <div class="ok" style="display:none;"></div><!-- ←入力チェック OKの場合出力 -->
                  <div class="miss" style="">入力されていません</div><!-- ←入力チェック 誤りがあるの場合出力 -->
                </div>
              </li>
              <li>
                <div class="must"></div>
                <input type="text" id="name2" name="data[Contact][name2]" class="input01 inputRequired miss" placeholder="名" value=""><!-- ←入力チェック 誤りがあるの場合classにmiss出力 -->
                <div class="check">
                  <div class="ok" style="display:none;"></div><!-- ←入力チェック OKの場合出力 -->
                  <div class="miss" style="">入力されていません</div><!-- ←入力チェック 誤りがあるの場合出力 -->
                </div>
              </li>
              <div class="clear"></div>
            </ul>
          </div><!-- end column -->

          <div class="column">
            <div class="must"></div>
            <input type="text" id="mail1" name="data[Contact][mail1]" class="input01 inputRequired miss" placeholder="メールアドレス" value="">
            <div class="check">
              <div class="ok" style="display:none;"></div><!-- ←入力チェック OKの場合出力 -->
              <div class="miss" style="">入力されていません</div><!-- ←入力チェック 誤りがあるの場合出力 -->
            </div>
          </div><!-- end column -->

          <div class="column">
            <div class="must"></div>
            <input type="text" id="mail2" name="data[Contact][mail2]" class="input01 inputRequired miss" placeholder="メールアドレス確認用" value=""><!-- ←入力チェック 誤りがあるの場合classにmiss出力 -->
            <div class="check">
              <div class="ok" style="display:none;"></div><!-- ←入力チェック OKの場合出力 -->
              <div class="miss" style="">入力されていません</div><!-- ←入力チェック 誤りがあるの場合出力 -->
            </div>
          </div><!-- end column -->

          <div class="column">
            <div class="must"></div>
            <input type="text" id="phone" name="data[Contact][tel]" class="input01 inputRequired miss" placeholder="お電話番号" value="">
            <div class="check">
              <div class="ok" style="display:none;"></div><!-- ←入力チェック OKの場合出力 -->
              <div class="miss" style="">入力されていません</div><!-- ←入力チェック 誤りがあるの場合出力 -->
            </div>
          </div><!-- end column -->
          
          <div class="column">
            <div class="must"></div>
            <textarea class="input02 inputRequired miss" name="data[Contact][inquery]" rows="10" placeholder="お問合せ内容"></textarea>
            <div class="check bottom">
              <div class="ok" style="display:none;"></div><!-- ←入力チェック OKの場合出力 -->
              <div class="miss" style="">入力されていません</div><!-- ←入力チェック 誤りがあるの場合出力 -->
            </div>
          </div><!-- end column -->


          <div class="column">
            <ul class="twoColumn">
              <li>
                <input type="text" id="" name="data[Contact][year]" class="input03" placeholder="生年" value="">
                <input type="text" id="" name="data[Contact][month]" class="input04" placeholder="月" value="">
                <input type="text" id="" name="data[Contact][day]" class="input05" placeholder="日" value="">
              </li>
              <li>
                <ul class="radio">
                  <li class="q">性別</li>
                  <li class="radio01"><input type="radio" name="radio01" value="男"><a href="radio01" class="">男</a></li>
                  <li class="radio02"><input type="radio" name="radio02" value="女"><a href="radio02" class="active">女</a></li>
                  <input type="hidden" id="sexValue" name="data[Contact][sexValue]">
                </ul>
              </li>
              <div class="clear"></div>
            </ul>
          </div><!-- end column -->


          <div class="column">
            <input type="text" id="" name="data[Contact][postNumber]" class="input01" placeholder="郵便番号" value="">
          </div><!-- end column -->
          
          <div class="column">
            <input type="text" id="" name="data[Contact][address]" class="input01" placeholder="ご住所" value="">
          </div><!-- end column -->
          
          
          <div class="column">
            <div class="must t"></div>
            <ul class="conf">
              <li>送信確認</li>
              <li><a href="#" class="checkRequired2 sendConfirm">上記送信内容を確認したらチェックを入れてください</a></li><!-- ←入力チェック 誤りがあるの場合aタグにclass="miss"出力 -->
              <input type="hidden" name="data[Contact][sendCheck]" id="sendCheck">
            </ul>
            <div class="check bottom">
              <div class="miss" style="display:none;"><span>入力されていません</span></div><!-- ←入力チェック 誤りがあるの場合出力 -->
            </div>
          </div><!-- end column -->

          <ul class="btn_set">
            <li><a href="http://www.milbon.co.jp/contact/" class="btn_reset">リセット</a></li>
            <li><input type="submit" class="btn_kakunin" value="内容を確認する" onclick="return validate();"></li>
          </ul>
        </form>        <!--</form>-->
        </div>
    </section>
  </section>
</div>