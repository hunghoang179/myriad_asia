<?php
/**
 * Template Name: User Profile
 *
 * Allow users to update their profiles from Frontend.
 * 
 * creator by hunght
 * 
 * skype: hunghoang179
 */
/* Get user info. */
global $current_user, $wp_roles;
get_currentuserinfo();
?>
<?php $t = & peTheme(); ?>
<?php get_header(); ?>
    <?php $t->layout->sidebar = isset($_REQUEST["pe-no-sb"]) ? "no" : "right"; ?>
<div class="pe-container">
    <div class="row" style="margin: 55px 0 20px 0">
        <div  class="col-md-3">
            <ul id="sidemenu">
                <li>
                    <a href="#home-content" class="open"><i class="fa fa-user"></i><strong>Mon profil</strong></a>
                </li>

                <li>
                    <a href="#about-content"><i class="fa fa-heart"></i><strong>Mes Favoris</strong></a>
                </li>

                <li>
                    <a href="#ideas-content"><i class="fa fa-shopping-cart"></i><strong>Mes voyages</strong></a>
                </li>

                <li>
                    <a href="#contact-content"><i class="fa fa-share-alt-square"></i><strong>Parrainer un proche</strong></a>
                </li>
            </ul>
        </div>

        <div id="content" class="col-md-9">
            <div id="home-content" class="contentblock">
                <?php
                //echo do_shortcode("[userpro template=edit type=edit no_style=true layout=true no_header=true]"); 
                echo do_shortcode("[userpro template=view]");
                ?>
            </div><!-- @end #home-content -->

            <div id="about-content" class="contentblock hidden">
                <div id="sidebar">
<?php dynamic_sidebar('showfavoriteuser') ?>
                </div>
            </div><!-- @end #about-content -->

            <div id="ideas-content" class="contentblock hidden">


            </div><!-- @end #ideas-content -->

            <div id="contact-content" class="contentblock hidden">

            </div><!-- @end #contact-content -->
        </div><!-- @end #content -->
    </div><!-- @end #w -->
    </div>
    <script type="text/javascript">
        $(function () {
            $('#sidemenu a').on('click', function (e) {
                e.preventDefault();

                if ($(this).hasClass('open')) {
                    // do nothing because the link is already open
                } else {
                    var oldcontent = $('#sidemenu a.open').attr('href');
                    var newcontent = $(this).attr('href');

                    $(oldcontent).fadeOut('fast', function () {
                        $(newcontent).fadeIn().removeClass('hidden');
                        $(oldcontent).addClass('hidden');
                    });


                    $('#sidemenu a').removeClass('open');
                    $(this).addClass('open');
                }
            });
        });
    </script>
<?php get_footer(); ?>