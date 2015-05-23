<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (have_posts()) : while (have_posts()) : the_post();
        ?>

        <div>Title</div>
        <?php the_title(); ?>

        <div>Excerpt</div>
        <?php the_excerpt(); ?>

        <div>Tags</div>
        <?php the_tags('', ','); ?>

        <div>Category</div>
        <?php the_category(); ?>

    <?php endwhile;
else: ?>
    <p><?php _e('Nothing found.'); ?></p>
<?php endif; ?>