<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=1200">
  <title>株式会社 MILBON</title>
  <meta name="description" content="株式会社MILBONのオフィシャルウェブサイトです">
  <meta name="keywords" content="MILBON,ミルボン,みるぼん,大阪,都島区,ヘア化粧品,パーマ剤,ヘアケア剤,ヘアカラー剤,スタイリング剤,ディーセス,オルディーブ,オルディーブボーテ,オージュア,リシオ,ニゼル,プラーミア,美容師,ヘアデザイナー,TAC開発システム,製品情報,IR情報,投資家情報,リクルート情報,会社情報">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta property="og:locale" content="ja_JP">
  <meta property="og:type" content="website">
  <meta property="og:title" content="株式会社 MILBON" />
  <meta property="og:url" content="http://www.milbon.co.jp/">
  <meta property="og:image" content="http://www.milbon.co.jp/img/ogp.png">
  <meta property="og:site_name" content="株式会社 MILBON">
  <meta property="og:description" content="株式会社MILBONのオフィシャルウェブサイトです">
  <link rel="canonical" href="http://www.milbon.co.jp/">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Upright:300,400,500,700&amp;subset=vietnamese" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
  <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
  <link href="<?php echo get_template_directory_uri(); ?>/css/common.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/css/brand/style.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/css/news/style.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/css/concept/style.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/css/contact/style.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/css/beauty/style.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/css/company/style.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/css/company/office/style.css" rel="stylesheet" type="text/css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="loading"><div class="title"><img src="<?php echo get_template_directory_uri(); ?>/images/top/loading_title_eng.png" alt="株式会社 MILBON" width="492"></div><div class="bar"><p>loading...100%</p><span></span></div></div>
  <div id="cover"></div>

<!-- /////////////////////////////////////////////////////////////////////////
   header
//////////////////////////////////////////////////////////////////////////////-->
<header id="header">
  <div class="header-block">
    <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" height="40" width="200" alt="株式会社 MILBON"></a></div>
    <ul class="globalNavi">
      <li><a class="active pageLink" href="<?php echo esc_url( home_url( '/' ) );?>">TRANG CHỦ<span></span></a></li>
      <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'concept';?>">TRIẾT LÝ<span></span></a></li>
      <li><a class="pageLink" href="<?php echo esc_url(get_post_type_archive_link( 'milbon-brands' )); ?>">SẢN PHẨM<span></span></a></li>
      <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'company_gaiyou';?>">CÔNG TY<span></span></a></li>
      <li><a class="pageLink" href="<?php echo esc_url(get_post_type_archive_link( 'milbon-news' )); ?>">TIN TỨC<span></span></a></li>
      <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'contact'; ?>">LIÊN HỆ<span></span></a></li>
    </ul>
    <ul class="subMenu">
      <li class="submenu01"><a href="<?php echo esc_url( home_url( '/' ) ) . 'beauty'; ?>">DÀNH CHO NHÀ TẠO MẪU TÓC</a></li>
<!--       <li class="line"></li>
      <li class="submenu02"><a href="http://www.milbon.co.jp/ir/index.html" target="_blank">IR SITE</a></li>
      <li class="line"></li>
      <li class="submenu03"><a href="http://www.milbon.co.jp/recruit/" target="_blank">RECRUIT SITE</a></li> -->
    </ul>
  </div>
  <!-- pulldown:FOR HAIR DESIGNER -->
 <div class="pulldown pulldown01">
  <ul>
    <li>
      <a href="http://www.biyoshi-oen.jp/" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_hair_image01.jpg" height="126" width="224" alt="Education Guidance">
        <div class="defalt"><span>Education Guidance</span></div>
        <div class="over"><span>Education Guidance</span><p class="icon">VISIT SITE</p></div>
      </a>
    </li>
    <li>
      <a href="http://www.milbon-biyoshidoga.jp/" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_hair_image02.jpg" height="126" width="224" alt="びよーしどーが">
        <div class="defalt"><span>びよーしどーが</span></div>
        <div class="over"><span>びよーしどーが</span><p class="icon">VISIT SITE</p></div>
      </a>
    </li>
    <li>
      <a href="http://www.milbon.co.jp/photorevo_2016/" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_hair_image03.jpg" height="126" width="224" alt="MILBON PHOTO REVOLUTION">
        <div class="defalt"><span>MILBON PHOTO REVOLUTION</span></div>
        <div class="over"><span>MILBON PHOTO REVOLUTION</span><p class="icon">VISIT SITE</p></div>
      </a>
    </li>
    <li>
      <a href="http://www.milbon.co.jp/da_inspire/" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_hair_image04.jpg" height="126" width="224" alt="MILBON DA-INSPIRE-2016">
        <div class="defalt"><span>MILBON DA-INSPIRE-2016</span></div>
        <div class="over"><span>MILBON DA-INSPIRE-2016</span><p class="icon">VISIT SITE</p></div>
      </a>
    </li>
    <li>
      <a href="http://www.milbon.co.jp/designersnote/" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_hair_image05.jpg" height="126" width="224" alt="MILBON Designer’s NOTE">
        <div class="defalt"><span>MILBON Designer’s NOTE</span></div>
        <div class="over"><span>MILBON Designer’s NOTE</span><p class="icon">VISIT SITE</p></div>
      </a>
    </li>
    <li>
      <a href="http://www.milbon.co.jp/nextbeauty/" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_hair_image06.jpg" height="126" width="224" alt="MILBON “next beauty” ～美容のチカラ～">
        <div class="defalt"><span>MILBON “next beauty”<br>～美容のチカラ～</span></div>
        <div class="over"><span>MILBON “next beauty”<br>～美容のチカラ～</span><p class="icon">VISIT SITE</p></div>
      </a>
    </li>
    <li>
      <a href="https://www.youtube.com/channel/UCeur4Cp6yh4HjShtW3MjU2A" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_hair_image07.jpg" height="126" width="224" alt="MILBON CHANNEL">
        <div class="defalt"><span>MILBON CHANNEL</span></div>
        <div class="over"><span>MILBON CHANNEL</span><p class="icon">VISIT SITE</p></div>
      </a>
    </li>

    <li>
      <a href="http://www.milbon.co.jp/promotiontool/" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_hair_image08.jpg" height="126" width="224" alt="PROMOTION TOOL DOWNLOAD">
        <div class="defalt"><span>PROMOTION TOOL DOWNLOAD</span></div>
        <div class="over"><span>PROMOTION TOOL DOWNLOAD</span><p class="icon">VISIT SITE</p></div>
      </a>
    </li>
  </ul>
  </div>
  <!-- pulldown:COMAPNY -->
  <div class="pulldown pulldown03">
  <ul>
    <li>
      <a href="<?php echo esc_url( home_url( '/' ) ) . 'company_gaiyou';?>" class="pageLink">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_company_image01.jpg" height="126" width="224" alt="COMPANY PROFILE">
        <div class="defalt"><span>THÔNG TIN CÔNG TY</span></div>
        <div class="over"><span>THÔNG TIN CÔNG TY</span><p class="icon2">Xem thêm →</p></div>
      </a>
    </li>
    <li>
      <a href="<?php echo esc_url( home_url( '/' ) ) . 'company_history';?>" class="pageLink">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_company_image02.jpg" height="126" width="224" alt="OUR HISTORY">
        <div class="defalt"><span>LỊCH SỬ CÔNG TY</span></div>
        <div class="over"><span>LỊCH SỬ CÔNG TY</span><p class="icon2">Xem thêm →</p></div>
      </a>
    </li>
    <li>
      <a href="<?php echo esc_url( home_url( '/' ) ) . 'company_message';?>" class="pageLink">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_company_image03.jpg" height="126" width="224" alt="MESSAGE">
        <div class="defalt"><span>THÔNG ĐIỆP</span></div>
        <div class="over"><span>THÔNG ĐIỆP</span><p class="icon2">Xem thêm →</p></div>
      </a>
    </li>
    <li>
      <a href="<?php echo esc_url( home_url( '/' ) ) . 'company_office';?>" class="pageLink">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_company_image04.jpg" height="126" width="224" alt="CÁC CHI NHÁNH">
        <div class="defalt"><span>CÁC CHI NHÁNH</span></div>
        <div class="over"><span>CÁC CHI NHÁNH</span><p class="icon2">Xem thêm →</p></div>
      </a>
    </li>
<!--     <li>
      <a href="<?php echo esc_url( home_url( '/' ) ) . 'company_factory';?>" class="pageLink">
        <img src="<?php echo get_template_directory_uri(); ?>/images/header_company_image05.jpg" height="126" width="224" alt="PRODUCTION POLICY">
        <div class="defalt"><span>PRODUCTION POLICY</span></div>
        <div class="over"><span>PRODUCTION POLICY<p>［ 生産ポリシー ］</p></span><p class="icon2">VIEW MORE →</p></div>
      </a>
    </li> -->
  </ul>
  </div>
</header>

<div id="wrapper">
