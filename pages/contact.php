<script src="<?php echo get_template_directory_uri(); ?>/js/contact/script.js"></script>
<div id="contents">

	<nav id="breadcrumb">
    <ul>
      <li><a href="../" class="pageLink">TOP<span></span></a></li>
      <li><a href="../contact/" class="pageLink">CONTACT<span></span></a></li>
    </ul>
  </nav>

  <section id="contact">
    <a href="<?php echo esc_url( home_url( '/' ) ) . 'brand_tenpan/';?>" class="btn_about_product pageLink">
      <span>ミルボン製品について</span>
    </a>
  	<header class="header">
      <h1>CONTACT</h1>
      <p>［ お問い合わせ<span> （製品や美容室について・その他のお問い合わせ）</span> ］</p>
    </header>

    <section class="contents">
      <div class="attention">
        <div class="btn"><a href="#" class=""><span>利用上のご注意</span></a></div>
          <div class="area" style="display: none;">
            <p>●当お問い合わせフォームは、製品・美容室・その他に関するお問い合わせに E-mailにより回答することを目的としています。<br>
            ●当社からのE-mailによる回答は、お客様個人宛にお送りするものです。これらのE-mailについての著作権は当社に帰属しており、 <br>当社の許可なく他のホームページや印刷物などへ転用したり、E- mailの内容の一部または全部を転用、二次利用したり、 その他の目的でご使用されることは固くお断り致します。<br>
            ●お問い合わせの内容によっては当社より回答を差し上げられない場合があります。また、内容によりましてはE-mailではなく <br>お電話で回答を差し上げる場合があります。また、お問い合わせの内容によっては、回答を差し上げるまでにお時間がかかることがあります。あらかじめ、ご了承ください。<br>
            ●お客様からいただいたE-mailアドレスが入力ミス等で間違っている場合や、システム障害などにより、メールを送受信できない場合には、 <br>回答できない場合があります。あらかじめご了承ください。<br>
            ●当社から発信したE-mailによる回答が届かない場合に、お電話で問い合わせさせていただく場合があります。あらかじめご了承ください。<br>
            ●当お問い合わせフォームをご利用の場合、当社ウェブサイトご利用条件にご同意いただいたものといたします。<br>
            ●ご記入いただきました情報は、お客様からのお問い合わせにお答えする以外の目的には使用いたしましません。 <br>また当該保存個人データの変更、修正、削除、利用停止、または開示のお申出があった場合は、 <br>ご本人確認のため、口頭、電話、書簡あるいはメールなどにて必要な情報の提出を求める場合がございます。<br>
            ●お問い合わせに対するご返信は、内容により事実確認を行うほか、土曜日、日曜日、祝日、夏季休暇、年末年始は拝見しておりませんので、 <br>回答に時間がかかる場合や回答しかねる場合がございます。あらかじめご了承ください。<br>
            ●このフォーム、メールアドレスを利用しての商品・サービスの売り込み等には、ご返信しかねます。あらかじめご了承ください。<br>
            以上の利用上のご注意をご承認いただいた上で、以下のフォームに必要事項をご記入の上、送信してください。</p>

            <p class="c">【弊社から返信メールが届かないお客さまへ】<br>
            弊社からの返信メールが、お客さまがお使いの端末の設定（※）により、迷惑メール（スパムメール）として 扱われている場合がございます。「迷惑メールフォルダ」や<br> 「削除フォルダ」等をご確認の上、迷惑メールに設定されてしまっている場合は、お手数ではございますが設定の変更をお願い致します。<br>
            ※携帯、スマートフォン、フリーメール、メールソフト、セキュリティソフトなどのメール処理の設定です。</p>
            <div class="close"><a href="#"><span>Close</span></a></div>
          </div>
      </div>

    	<div class="form">
        <form action="/contact/preview" method="post" novalidate="" name="form" id="UserIndexForm" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>    
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
              <div class="ok" style="display:none;"></div>
              <div class="miss" style="display:none;"><span>入力されていません</span></div>
            </div>
          </div>

          <div class="column">
            <ul class="twoColumn">
              <li>
                <div class="must"></div>
                <input type="text" id="name1" name="data[Contact][name1]" class="input01 inputRequired miss" placeholder="姓" value="">
                <div class="check">
                  <div class="ok" style="display:none;"></div>
                  <div class="miss" style="display:none;">入力されていません</div>
                </div>
              </li>
              <li>
                <div class="must"></div>
                <input type="text" id="name2" name="data[Contact][name2]" class="input01 inputRequired miss" placeholder="名" value="">
                <div class="check">
                  <div class="ok" style="display:none;"></div>
                  <div class="miss" style="display:none;">入力されていません</div>
                </div>
              </li>
              <div class="clear"></div>
            </ul>
          </div><!-- end column -->

          <div class="column">
            <div class="must"></div>
            <input type="text" id="mail1" name="data[Contact][mail1]" class="input01 inputRequired miss" placeholder="メールアドレス" value="">
            <div class="check">
              <div class="ok" style="display:none;"></div>
              <div class="miss" style="display:none;">入力されていません</div>
            </div>
          </div>

          <div class="column">
            <div class="must"></div>
            <input type="text" id="mail2" name="data[Contact][mail2]" class="input01 inputRequired miss" placeholder="メールアドレス確認用" value="">
            <div class="check">
              <div class="ok" style="display:none;"></div>
              <div class="miss" style="display:none;">入力されていません</div>
            </div>
          </div>

          <div class="column">
            <div class="must"></div>
            <input type="text" id="phone" name="data[Contact][tel]" class="input01 inputRequired miss" placeholder="お電話番号" value="">
            <div class="check">
              <div class="ok" style="display:none;"></div>
              <div class="miss" style="display:none;">入力されていません</div>
            </div>
          </div>

          <div class="column">
            <div class="must"></div>
            <textarea class="input02 inputRequired miss" name="data[Contact][inquery]" rows="10" placeholder="お問合せ内容"></textarea>
            <div class="check bottom">
              <div class="ok" style="display:none;"></div>
              <div class="miss" style="display:none;">入力されていません</div>
            </div>
          </div>

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
          </div>


          <div class="column">
            <input type="text" id="" name="data[Contact][postNumber]" class="input01" placeholder="郵便番号" value="">
          </div>
          
          <div class="column">
            <input type="text" id="" name="data[Contact][address]" class="input01" placeholder="ご住所" value="">
          </div>
          
          <div class="column">
            <div class="must t"></div>
            <ul class="conf">
              <li>送信確認</li>
              <li><a href="#" class="checkRequired2 sendConfirm">上記送信内容を確認したらチェックを入れてください</a></li>
              <input type="hidden" name="data[Contact][sendCheck]" id="sendCheck">
            </ul>
            <div class="check bottom">
              <div class="miss" style="display:none;"><span>入力されていません</span></div>
            </div>
          </div>

          <ul class="btn_set">
            <li><a href="http://www.milbon.co.jp/contact/" class="btn_reset">リセット</a></li>
            <li><input type="submit" class="btn_kakunin" value="内容を確認する" onclick="return validate();"></li>
          </ul>
        </form>
        </div>
    </section>
  </section>
</div>
