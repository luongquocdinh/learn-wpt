<!-- /////////////////////////////////////////////////////////////////////////
     contents
  //////////////////////////////////////////////////////////////////////////////-->
<div id="contents">

    <!-- /////////////////////////////////////////////////////////////////////////
       breadcrumb
    //////////////////////////////////////////////////////////////////////////////-->
    <nav id="breadcrumb">
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')) ?>" class="pageLink">TRANG CHỦ<span></span></a></li>
            <li><a href="../" class="pageLink">OUR PRODUCT<span></span></a></li>
        </ul>
    </nav>

        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
        

</div><!-- end contents -->