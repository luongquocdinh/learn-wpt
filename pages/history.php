<style>
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
            <li><a href="../" class="pageLink">TOP<span></span></a></li>
            <li><a href="../company/gaiyou" class="pageLink">COMPANY<span></span></a></li>
            <li><a href="../company/history" class="pageLink">OUR HISTORY<span></span></a></li>
        </ul>
    </nav>

        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
</div><!-- end contents -->