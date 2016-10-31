<style>
    #wrapper{
        overflow: visible;
    }
    #pageTop{
        display: none;
    }
    #history #pageTop{
        display: block;
    }
</style>
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
            <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'company_gaiyou';?>" class="pageLink">CÔNG TY<span></span></a></li>
            <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'company_history';?>" class="pageLink">LỊCH SỬ CÔNG TY<span></span></a></li>
        </ul>
    </nav>
    <br />
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
</div><!-- end contents -->
