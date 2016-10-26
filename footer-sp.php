<!-- /////////////////////////////////////////////////////////////////////////
   footer
//////////////////////////////////////////////////////////////////////////////-->
<footer id="footer">
    <div class="pageTop"><a href="#" class="toTop"><span>TRỞ VỀ ĐẦU TRANG</span></a></div>
    <div class="footer-inner">
        <ul>
<!--             <li><a href="./guide/require.html">ご利用条件</a></li>
            <li><a href="./guide/privacy.html">プライバシーポリシー</a></li> -->
            <li class="copyright">Copyright © 2016 Milbon.All rights reserved.</li>
        </ul>
    </div>
</footer>

</div><!-- end wrapper -->

<?php
if( get_the_category()[0]->name != 'office') :
        ?>
        <script src="<?php echo get_template_directory_uri(); ?>/js-sp/jquery.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js-sp/jquery.libs.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js-sp/common.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js-sp/index.js"></script>
<?php
    endif;
?>

<?php wp_footer(); ?>
</body>
</html>
