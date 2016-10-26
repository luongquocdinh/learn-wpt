<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>株式会社 MILBON</title>
    <meta name="description" content="株式会社MILBONのオフィシャルウェブサイトです">
    <meta name="keywords" content="MILBON,ミルボン,みるぼん,大阪,都島区,ヘア化粧品,パーマ剤,ヘアケア剤,ヘアカラー剤,スタイリング剤,ディーセス,オルディーブ,オルディーブボーテ,オージュア,リシオ,ニゼル,プラーミア,美容師,ヘアデザイナー,TAC開発システム,製品情報,IR情報,投資家情報,リクルート情報,会社情報">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:type" content="website">
    <meta property="og:title" content="株式会社 MILBON" />
    <meta property="og:url" content="http://www.milbon.co.jp/">
    <meta property="og:image" content="http://www.milbon.co.jp/img/ogp.png">
    <meta property="og:site_name" content="株式会社 MILBON">
    <meta property="og:description" content="株式会社MILBONのオフィシャルウェブサイトです">
    <base href="<?php echo esc_url(home_url('/')) ?>">
    <link rel="canonical" href="http://www.milbon.co.jp/">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-sp/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-sp/common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-sp/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-sp/concept/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-sp/beauty/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-sp/company/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-sp/company/office/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-sp/brand/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-sp/news/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css-sp/contact/style.css"/>
    <?php wp_head(); ?>
</head>

<body>
<!-- /////////////////////////////////////////////////////////////////////////
   header
//////////////////////////////////////////////////////////////////////////////-->
<header id="header">
    <div class="logo"><a href="./"><img src="<?php echo get_template_directory_uri(); ?>/images-sp/logo.png" height="40" width="200" alt="株式会社 MILBON"></a></div>
    <div id="menuButton">
        <button id="" class="hamburger hamburger--collapse" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
        </button>
    </div>
</header>
<!-- /////////////////////////////////////////////////////////////////////////
   navi
//////////////////////////////////////////////////////////////////////////////-->
<nav id="navi">
    <ul class="globalNavi">
        <li><a href="<?php echo esc_url(home_url('/')) ?> ">TRANG CHỦ</a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'concept';?>">TRIẾT LÝ</a></li>
        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'milbon-brands' ) ); ?>">SẢN PHẨM</a></li>
        <li class="menuCompany"><a href="#">COMPANY</a>
            <ul class="menuCompanyList">
                <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'company_gaiyou';?>">THÔNG TIN CÔNG TY</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'company_history';?>">LỊCH SỬ CÔNG TY</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'company_message';?>">THÔNG ĐIỆP</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'company_office';?>">CÁC CHI NHÁNH</a></li>
                <!-- <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'company_factory';?>">PRODUCTION POLICY</a></li> -->
            </ul>
        </li>
        <li><a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-news' )); ?>">TIN TỨC</a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'contact'; ?>">LIÊN HỆ</a></li>
    </ul>
    <ul class="subMenu">
        <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'beauty'; ?>">DÀNH CHO NHÀ TẠO MẪU TÓC</a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'brand_tenpan'; ?>">SẢN PHẨM CỦA MILBON</a></li>
<!--        <li><a href="./guide/faq.html">INFORMATION</a></li>-->
<!--        <li><a target="_blank" href="http://www.milbon.co.jp/ir/index.html"><span class="blank">IR SITE</span></a></li>-->
        <li><a target="_blank" href="http://www.milbon.com"><span class="blank">TRANG WEB GLOBAL</span></a></li>
<!--        <li><a target="_blank" href="http://www.milbon.co.jp/recruit/"><span class="blank">RECRUIT SITE 2017</span></a></li>-->
        <li><a target="_blank" href="https://www.facebook.com/Milbonvn"><span class="blank"   >FACEBOOK</span></a></li>
    </ul>
</nav>

<div id="wrapper">