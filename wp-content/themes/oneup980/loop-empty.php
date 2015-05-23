<?php
/**
 * The empty loop is used where no posts match the search criteria 
 *
 * @package WordPress
 * @subpackage Theme
 * @since 1.0
 */
?><!-- no posts -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/404-css/css/style.css" type="text/css" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/404-css/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/404-css/js/introtzikas.js"></script>

<script type="text/javascript">
    //<![CDATA[
    $(document).ready(function () {
        $().introtzikas({
            line: 'white',
            speedwidth: 2000,
            speedheight: 1000,
            bg: '#474747',
            lineheight: 2
        });
    });
    //]]>
</script>
<style type="text/css">
    .icon-search{
        display: none;
    }
</style>
<div id="main">
    <!--	<br/>
            <p><?php _e("aaaYour search returned no results. Please try a different keyword or browse using categories & tags", 'Pixelentity Theme/Plugin'); ?></p>-->

    <div class="bg_overlay"></div><!-- Pattern -->

    <!-----start-wrap--------->
    <div class="wrap">
        <!-----start-content--------->
        <div class="content">
            <!-----start-logo--------->
            <div class="logo-404">
                <h1><a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/404-css/images/logo.png"/></a></h1>
                <span><img src="<?php bloginfo('template_directory'); ?>/404-css/images/signal.png"/>Oops! The Page you requested was not found!</span>
            </div>
            <!-----end-logo--------->
            <!-----start-search-bar-section--------->
            <div class="buttom">
                <div class="seach_bar">
                    <p>you can go to <span><a href="<?php echo get_home_url(); ?>">home</a></span> page or search here</p>
                    <!-----start-sear-box--------->
                    <div class="search_box">
                        <?php
                        if (get_option(THEME_SHORT_NAME . '_enable_top_search', 'enable') == 'enable') {
                            echo '<div>';
                            get_search_form();
                            echo '<input type="submit" value=""></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-----end-sear-bar--------->
        </div>
      
    </div>

    <!---------end-wrap---------->