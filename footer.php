<!-- /////////////////////////////////////////////////////////////////////////
     footer
  //////////////////////////////////////////////////////////////////////////////-->
  <div id="pageTop"><a href="#" class="toTop"><span>TRỞ VỀ ĐẦU TRANG</span></a></div>
  <footer id="footer">
    <div class="footer-inner">
      <h2><img src="<?php echo get_template_directory_uri(); ?>/images/top_new.png" width="349" alt="Find your beauty MILBON"></h2>
      <div class="menu-block">
        <ul class="menu footer-column01">
          <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) );?>">Trang chủ<span></span></a></li>
          <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'concept';?>">Triết lý<span></span></a></li>
          <li><a class="pageLink" href="<?php echo esc_url(get_post_type_archive_link( 'milbon-brands' )); ?>">Dòng sản phẩm<span></span></a></li>
          <li class="withSub"><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'company_gaiyou';?>">Công ty<span></span></a>
            <ul>
              <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'company_gaiyou';?>">Thông tin công ty</a></li>
              <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'company_history';?>">Lịch sử công ty</a></li>
              <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'company_message';?>">Thông điệp</a></li>
              <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'company_office';?>">Các chi nhánh</a></li>
            </ul>
          </li>
          <li><a class="pageLink" href="<?php echo esc_url(get_post_type_archive_link( 'milbon-news' )); ?>">Tin tức<span></span></a></li>
          <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'contact'; ?>">Liên hệ<span></span></a></li>
          <li><a class="pageLink" href="<?php echo esc_url( home_url( '/' ) ) . 'brand_tenpan/';?>">Về sản phẩm<span></span></a></li>
        </ul>
        <ul class="menu footer-column02">
          <li class="withSub"><a href="<?php echo esc_url( home_url( '/' ) ) . 'beauty'; ?>">Dành cho nhà tạo mẫu tóc<span></span></a>
          </li>
        </ul>
        <ul class="menu footer-column03">
          <li class="withSub pb nolink"><a href="#">Trang web global<span></span></a>
            <ul>
              <li><a target="_blank" href="http://www.milbon.com/ja/">Nhật Bản</a></li>
              <li><a target="_blank" href="http://www.milbon.com/en/">Mỹ</a></li>
              <li><a target="_blank" href="http://www.milbon.com/zh-cn/">Trung Quốc</a></li>
              <li><a target="_blank" href="http://www.milbon.com/ko/">Hàn Quốc</a></li>
              <li><a target="_blank" href="http://www.milbon.com/th/">Thái Lan</a></li>
            </ul>
          </li>
        </ul>
        <ul class="menu footer-column04">
          <li class="withSub nolink"><a href="#">Trang web dòng sản phẩm<span></span></a>
            <ul>
              <li><a target="_blank" href="http://global.milbon.com/">Milbon</a></li>
            </ul>
          </li>
          <li class="pb withSub nolink"><a href="#">SNS<span></span></a>
            <ul class="social-list">
              <li><a target="_blank" href="https://www.facebook.com/Milbonvn"><img alt="follow me on facebook" src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook30x30.png"></a></li>
              <li><a target="_blank" href="#"><img alt="follow me on instagram" src="https://c866088.ssl.cf3.rackcdn.com/assets/instagram30x30.png"></a></li>
              <li><a target="_blank" href="https://www.youtube.com/channel/UCeur4Cp6yh4HjShtW3MjU2A"><img alt="follow me on youtube" src="https://c866088.ssl.cf3.rackcdn.com/assets/youtube30x30.png"></a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <ul>
        <li class="copyright">Copyright © 2016 Milbon.All rights reserved.</li>
      </ul>
    </div>
  </footer>

</div><!-- end wrapper -->

<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.libs.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/index.js"></script>
</body>
</html>
