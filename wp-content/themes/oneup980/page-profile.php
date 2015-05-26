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
    <div class="row e-pro-u">
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
            <div id="home-content" class="contentblock-u">                
                <?php
                wp_enqueue_script('jquery');
                wp_enqueue_script('jquery-ui-core');
                wp_enqueue_script('jquery-ui-datepicker');
                ?>
                <?php
                /* Load the registration file. */
                require_once( ABSPATH . WPINC . '/registration.php' );
                $error = array();
                /* If profile was saved, update profile. */
                if (have_posts()) : while (have_posts()) : the_post();
                        ?>
                        <div id="post-<?php the_ID(); ?>">
                            <div class="entry-content entry">
                                <?php the_content(); ?>
                                <?php if (!is_user_logged_in()) : ?>
                                    <p class="warning">
                                        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                                    </p><!-- .warning -->
                                <?php else : ?>
                                    <?php if (count($error) > 0) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
                                    <div class="col-md-3">    
                                        <div class="avatar-u-tem">
                                        <?php
                                        //echo do_shortcode('[avatar_upload] ');
                                        //echo do_shortcode('[avatar user="admin" size="150" align="left" link="file" /]');
                                        //echo do_shortcode('[avatar_upload user="admin"]');
                                        echo get_avatar($id_or_email, 200, $default, $alt);
                                        ?>  
                                        <button type="button" class="btn-edit-profile-user" data-toggle="modal" data-target="#myModal"><?php echo do_shortcode('[cml_text en="Modifier ma photo" fr="Edit photo"]') ?></button>
                                        <?php //echo get_simple_local_avatar($id_or_email, $size, $default, $alt) ?>
                                        </div>

                                    </div>
                                    <div class="col-md-6 profile-u-tem">
                                        <div class="title-ct">
                                            <strong><?php echo do_shortcode('[cml_text en="Firt name" fr="Prénom"]') ?></strong> 
                                        </div>
                                        <p><?php the_author_meta('first_name', $current_user->ID); ?></p>

                                        <div class="title-ct">
                                            <strong><?php echo do_shortcode('[cml_text en="Last name" fr="Nom"]') ?></strong> 
                                        </div>
                                        <p><?php the_author_meta('last_name', $current_user->ID); ?></p>

                                        <div class="title-ct">
                                            <strong><?php echo do_shortcode('[cml_text en="DOB" fr="Date de naissance"]') ?></strong> 
                                        </div>
                                        <p><?php the_author_meta('dob', $current_user->ID); ?></p>
                                        <div class="title-ct">
                                            <strong><?php echo do_shortcode('[cml_text en="Email" fr="Email"]') ?></strong> 
                                        </div>
                                        <p><?php the_author_meta('user_email', $current_user->ID); ?></p>
                                        <div class="title-ct">
                                            <strong><?php echo do_shortcode('[cml_text en="Phone number" fr="Téléphone"]') ?></strong> 
                                        </div>
                                        <p><?php the_author_meta('phone', $current_user->ID); ?></p>
                                        <div class="title-ct">
                                            <strong><?php echo do_shortcode('[cml_text en="Address" fr="Adresse"]') ?></strong> 
                                        </div>
                                        <p><?php the_author_meta('address', $current_user->ID); ?></p>
                                        <div class="title-ct">
                                            <strong><?php echo do_shortcode('[cml_text en="Zip code" fr="Code postal"]') ?></strong>
                                        </div>
                                        <p><?php the_author_meta('zipcode', $current_user->ID); ?></p>
                                        <div class="title-ct">
                                            <strong><?php echo do_shortcode('[cml_text en="City" fr="Ville"]') ?></strong>
                                        </div>
                                        <p> <?php the_author_meta('city', $current_user->ID); ?></p>
                                        <div class="title-ct">
                                            <strong><?php echo do_shortcode('[cml_text en="Country" fr="Pays"]') ?></strong> 
                                        </div>
                                        <p><?php the_author_meta('country', $current_user->ID); ?></p>

                                    </div>
                                <?php endif; ?>
                            </div><!-- .entry-content -->
                        </div><!-- .hentry .post -->
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="no-data">
                        <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
                    </p><!-- .no-data -->
                <?php endif; ?>
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
<script>
    jQuery(document).ready(function () {
        jQuery('#date').datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });
</script>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="">

        <!-- Modal content-->
        <div class="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo do_shortcode('[cml_text en="Edit Profile User" fr="Modifier mes informations"]') ?></h4>
            </div>
            <div class="modal-body">
                <form id="your-profile" action="" method="post" novalidate="novalidate"<?php
                /**
                 * Fires inside the your-profile form tag on the user editing screen.
                 *
                 * @since 3.0.0
                 */
                do_action('user_edit_form_tag');
                ?>>
                          <?php wp_nonce_field('update-user_' . $current_user->ID) ?>
                          <?php if ($wp_http_referer) : ?>
                        <input type="hidden" name="wp_http_referer" value="<?php echo esc_url($wp_http_referer); ?>" />
                    <?php endif; ?>
                    <p>
                        <input type="hidden" name="from" value="profile" />
                        <input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" />
                    </p>
                    <p class="form-username">
                        <label for="dob"><?php _e('Date of birth', 'profile'); ?></label>
                        <input class="text-input" name="dob" type="text" id="date" value="<?php the_author_meta('dob', $current_user->ID); ?>" />
                    </p>
                    <p class="form-username">
                        <label for="first-name"><?php _e('First Name', 'profile'); ?></label>
                        <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta('first_name', $current_user->ID); ?>" />
                    </p><!-- .form-username -->
                    <p class="form-username">
                        <label for="last-name"><?php _e('Last Name', 'profile'); ?></label>
                        <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta('last_name', $current_user->ID); ?>" />
                    </p><!-- .form-username -->
                    <p class="form-email">
                        <label for="email"><?php _e('E-mail *', 'profile'); ?></label>
                        <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta('user_email', $current_user->ID); ?>" />
                    </p><!-- .form-email -->
                    <p class="form-url">
                        <label for="url"><?php _e('Website', 'profile'); ?></label>
                        <input class="text-input" name="url" type="text" id="url" value="<?php the_author_meta('user_url', $current_user->ID); ?>" />
                    </p><!-- .form-url -->
                    <p class="form-password">
                        <label for="pass1"><?php _e('Password *', 'profile'); ?> </label>
                        <input class="text-input" name="pass1" type="password" id="pass1" />
                    </p><!-- .form-password -->
                    <p class="form-password">
                        <label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label>
                        <input class="text-input" name="pass2" type="password" id="pass2" />
                    </p><!-- .form-password -->
                    <p class="form-textarea">
                        <label for="description"><?php _e('Biographical Information', 'profile') ?></label>
                        <textarea name="description" id="description" rows="3" cols="50"><?php the_author_meta('description', $current_user->ID); ?></textarea>
                    </p><!-- .form-textarea -->

                    <?php
                    //action hook for plugin and extra fields
                    //do_action('edit_user_profile',$current_user);
                    ?>
                    <p class="form-submit">
                        <input type="hidden" name="action" value="update" />
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr($user_id); ?>" />

                        <?php submit_button(__('Update User')); ?>
                    </p><!-- .form-submit -->
                </form><!-- #adduser -->
                <?php // echo do_shortcode('[avatar_upload] '); ?>
            </div>

        </div>

    </div>
</div>
<?php get_footer(); ?>