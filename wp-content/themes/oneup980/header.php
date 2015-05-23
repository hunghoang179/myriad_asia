<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="site-wrapper">
 *
 * @package WordPress
 * @subpackage Theme
 * @since 1.0
 */
?><!DOCTYPE html>
<?php $t = & peTheme(); ?>
<?php $content = & $t->content; ?>
<?php $skin = $t->options->get("skin"); ?>
<?php $class = "skin_$skin"; ?>
<!--[if IE 7 ]><html class="desktop ie7 no-js <?php echo $class ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="desktop ie8 no-js <?php echo $class ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]><html class="desktop ie9 no-js <?php echo $class ?>" <?php language_attributes(); ?>><![endif]--> 
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js <?php echo $class ?>" <?php language_attributes(); ?>><!--<![endif]-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/bootstrap/3.3.4/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/bootstrap/3.3.4/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->


    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/bootstrap/3.3.4/font-awesome.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/bootstrap/3.3.4/animations.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/bootstrap/tooltip.css">
    <script src="<?php bloginfo('template_directory'); ?>/bootstrap/wow.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <?php if (is_page($page = 568)): ?>  
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/bootstrap/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/bootstrap/style.css" />
        <script src="<?php bloginfo('template_directory'); ?>/bootstrap/modernizr.custom.97074.js"></script>        
        <noscript><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/bootstrap/noJS.css"/></noscript>
    <?php endif; ?>
    <?php if (is_home() || is_front_page()): ?>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/bootstrap/jquery.fullPage.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/bootstrap/jquery.fullPage.css" />
        <script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
//				anchors: ['firstPage', 'secondPage', '3rdPage', '4rdPage'],
//				navigation: true,
//				navigationPosition: 'right',
//				navigationTooltips: ['First page', 'Second page', '3rdPage', 'Third and last page'],
//				responsive: 900
			});
		});
	</script>        
    <?php endif; ?>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php $t->header->title(); ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="format-detection" content="telephone=no" />

        <!--[if lt IE 9]>
        <script type="text/javascript">/*@cc_on'abbr article aside audio canvas details figcaption figure footer header hgroup mark meter nav output progress section summary subline time video'.replace(/\w+/g,function(n){document.createElement(n)})@*/</script>
        <![endif]-->
        <script type="text/javascript">if (Function('/*@cc_on return document.documentMode===10@*/')()) {
                document.documentElement.className += ' ie10';
            }
        </script>
        <script type="text/javascript">(function (H) {
                H.className = H.className.replace(/\bno-js\b/, 'js')
            })(document.documentElement)</script>
        <script type="text/javascript">
                    (function (u, i) {
                        if (u[i]('Safari') > -1 && u[i]('Mobile') === -1 && u[i]('Chrome') === -1) {
                            document.documentElement.className += ' safari';
                        }
                    }(navigator.userAgent, 'indexOf'));
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                //Default Action
                $(".tab_content").hide(); //Hide all content
                $("ul.tabs li:first").addClass("active").show(); //Activate first tab
                $(".tab_content:first").show(); //Show first tab content

                //On Click Event
                $("ul.tabs li").click(function () {
                    $("ul.tabs li").removeClass("active"); //Remove any "active" class
                    $(this).addClass("active"); //Add "active" class to selected tab
                    $(".tab_content").hide(); //Hide all tab content
                    var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                    $(activeTab).fadeIn(); //Fade in the active content
                    return false;
                });
            });
            
            $(document).ready(function () {
                //Default Action
                $(".tab_content_gas").hide(); //Hide all content
                $("ul.tabs-gas li:first").addClass("active").show(); //Activate first tab
                $(".tab_content_gas:first").show(); //Show first tab content

                //On Click Event
                $("ul.tabs-gas li").click(function () {
                    $("ul.tabs-gas li").removeClass("active"); //Remove any "active" class
                    $(this).addClass("active"); //Add "active" class to selected tab
                    $(".tab_content_gas").hide(); //Hide all tab content
                    var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                    $(activeTab).fadeIn(); //Fade in the active content
                    return false;
                });
            });
        </script>
        <script type="text/javascript">
            function DropDown(el) {
                this.hunght = el;
                this.initEvents();
            }
            DropDown.prototype = {
                initEvents: function () {
                    var obj = this;

                    obj.hunght.on('click', function (event) {
                        $(this).toggleClass('active');
                        event.stopPropagation();
                    });
                }
            };

            $(function () {

                var hunght = new DropDown($('#hunght'));

                $(document).click(function () {
                    // all dropdowns
                    $('.wrapper-dropdown-5').removeClass('active');
                });

            });

        </script>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!-- favicon -->
        <link rel="shortcut icon" href="<?php echo $t->options->get("favicon") ?>" />

        <?php $t->font->load(); ?>

        <!-- wp_head() -->

        <?php $t->header->wp_head(); ?>

        <script>
            new WOW().init();
        </script>

    </head>

    <?php $bclasses = $t->transparent() ? 'pe-header-transparent' : ''; ?>
    <?php $bclasses .= $t->layout->content != 'fullwidth' ? '' : ' pe-page-fullwidth'; ?>
    <?php $bclasses .= $t->stickyFooter() ? ' pe-sticky-footer' : '' ?>
    <?php $bclasses .= $t->hasBgVideo() ? ' pe-has-bg-video' : '' ?>

    <body <?php $content->body_class($bclasses); ?>>
        <div class="site-loader"></div>

        <!--wrapper for boxed version-->

        <div class="site-wrapper">
            <div class="head-wrapper">
                <?php if (true): ?>
                    <div class="pe-menu-sticky">
                        <!--main bar-->
                        <div class="pe-container"> 
                            <header class="row-fluid">
                                <div class="span12">
                                    <!-- logo -->
                                    <a class="logo" href="<?php echo home_url(); ?>" title="<?php _e("Home", 'Pixelentity Theme/Plugin'); ?>" >
                                        <?php $logo = $t->options->get("logo"); ?>
                                        <?php if (!empty($logo)) : ?>
                                            <?php $t->image->retina($logo); ?>
                                        <?php else : ?>
                                            <img src="<?php echo $t->image->blank(160, 60); ?>">
                                        <?php endif; ?>
                                    </a>
                                    <?php if (false && defined('ICL_LANGUAGE_CODE')): // if WPML is installed, add the lang menu here ?>
                                        <div class="pe-wpml-lang-selector">
                                            <?php do_action('icl_language_selector'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <!--main navigation-->
                                    <nav class="pe-menu-main" style="padding-top: 24px !important">
                                        <?php $t->menu->show("main"); ?>
                                    </nav>
                                </div>
                            </header><!-- end header  -->
                            <div class="right-header">                                

                                <?php if (is_user_logged_in()) { ?>
                                    <section class="main">
                                        <div class="wrapper-demo">
                                            <div id="hunght" class="wrapper-dropdown-5" tabindex="1">
                                                <?php
                                                global $current_user;
                                                get_currentuserinfo();
                                                $username = $current_user->user_login;
                                                echo get_avatar($id_or_email, $size, $default, $alt);
                                                echo '<span style="margin-left:10px">' . substr($username, 0, 8) . '</span>';
                                                ?>
                                                <ul class="dropdown">
                                                    <li><a href="<?php echo get_edit_user_link($user_id) ?> "><i class="fa fa-user"></i>Profile</a></li>
        <!--                                                    <li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>-->
                                                    <li><a href="<?php echo wp_logout_url(get_permalink()); ?>"><i class="fa fa-times"></i>Log out</a></li>
                                                </ul>
                                            </div>
                                            ​</div>
                                    </section>                                
                                <?php } else { ?>
                                    <div class="md-login-cus">
                                        <?php add_modal_login_link(); ?>
                                    </div>
                                <?php } ?>
                                <div class="ct-pr">| <a href="<?php echo home_url(); ?>/contact">Contact</a></div>
                                <?php
                                if (get_option(THEME_SHORT_NAME . '_enable_top_search', 'enable') == 'enable') {
                                    echo '<div class="widget_search">';
                                    get_search_form();
                                    echo '</div>';
                                }
                                ?>
                                <div class="select-language">                                    
                                    <?php
                                    cML_show_flags(array('' => ''));
                                    ?>  
                                </div>

                            </div>

                        </div><!--end container-->
                    </div><!--end sticky bar-->
                <?php endif; ?>	
            </div> <!-- end head wrapper -->
            <?php do_action("pe_theme_after_header"); ?>
            


