<?php
/**
 * The template for displaying a direction preview (ajax) type view
 *
 * @package WordPress
 * @subpackage Theme
 * @since 1.0
 */
?>
<?php $t = & peTheme(); ?>
<?php list($conf) = $t->template->data(); ?>
<?php $settings = & $conf->settings; ?>

<?php $content = & $t->content; ?>
<?php $project = & $t->project; ?>
<?php $media = & $t->media; ?>
<?php $w = empty($settings->width) ? "auto" : $settings->width; ?>
<?php $h = empty($settings->height) ? "auto" : $settings->height; ?>
<?php $h = $h === "auto" && $w === "auto" ? 192 : $h; ?>
<?php $gx = $settings->gx; ?>
<?php $gy = $settings->gy; ?>
<?php $portID = "direction-" . $conf->id . "-" . $post->ID; ?>
<?php $filterable = $settings->filterable; ?>
<?php $flareGallery = "directionGallery" . $conf->id; ?>

<?php $ptype = empty($conf->data->post_type) ? false : $conf->data->post_type; ?>
<?php $nosb = in_array($ptype, array('post', 'page')); ?>

<div class="peIsotope portfolio">

    <div class="pe-scroller">
        <div class="pe-scroller-slide" id="<?php echo $portID; ?>">

            <div class="peIsotope portfolio pe-no-resize">

                <?php if ($filterable): ?>
                    <div class="pe-container filter">
                        <div>
                            <nav class="project-filter pe-menu-main">
                                <ul class="pe-menu peIsotopeFilter">                                    
                                    <?php $content->filter($settings->filterable, "", "", "<li>%s</li>"); ?>
                                </ul>									
                            </nav>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="peIsotopeContainer peIsotopeGrid pe-scroller-set-width" 
                     data-cell-width="<?php echo $w; ?>" 
                     data-cell-height="<?php echo $h; ?>"
                     data-cell-gx="<?php echo $gx; ?>"
                     data-cell-gy="<?php echo $gy; ?>"
                     data-sort="<?php echo $settings->sort; ?>"
                     >
                    <div class="row-fluid">
                        <div class="span12" id="pe-load-more-<?php echo $portID; ?>">

                            <?php $clayout = empty($settings->clayout) || $settings->clayout != "fixed" ? false : array(1, 1); ?>
                            <?php $count = 1; ?>

                            <?php while ($content->looping()): ?>
                                <?php $meta = & $content->meta(); ?>
                                <?php $img = $content->get_origImage(); ?>

                                <?php $portfolio = empty($meta->portfolio) ? false : $meta->portfolio; ?>

                                <?php $thumb = empty($meta->portfolio->image) ? $img : $meta->portfolio->image; ?>
                                <?php list($cols, $rows) = $clayout ? $clayout : (explode("x", empty($meta->portfolio->layout) ? "1x1" : $meta->portfolio->layout)); ?>
                                <?php $cw = $w * $cols + $gx * ($cols - 1); ?>
                                <?php $ch = $h * $rows + $gy * ($rows - 1); ?>
                                <?php $pw = $cw ? $cw : $ch; ?>
                                <?php $ph = $ch ? $ch : $cw; ?>
                                <?php $cw = $cw ? $cw : 2640; ?>
                                <?php $slug = esc_attr(basename(get_permalink())); ?>
                                <?php $link = $content->getLink(); ?>
                                <?php $slink = $nosb ? add_query_arg(array("pe-no-sb" => ""), $link) : $link; ?>
                                <div class="peIsotopeItem pe-load-more-item <?php $content->filterClasses($settings->filterable); ?>">
                                    <?php $ptitle = empty($direction->ptitle) ? get_the_title() : $direction->ptitle; ?>
                                    <?php
                                        $pdescription = empty($direction->pdescription) ? wp_trim_words(get_the_content(), 30) : $direction->pdescription;
                                    ?>
                                    <div class="row fix-mg" id="da-thumbs">
                                        <div class="col-md-4 da-thumbs"  id="da-thumbs">
                                            <div class="efect-x">
                                                <a href="<?php echo $link ?>">
                                                    <?php if ($thumb): ?>
                                                        <?php echo $t->image->resizedImg($thumb, $cw, $ch, $w != "auto"); ?>
                                                    <?php else: ?>
                                                        <?php echo $t->image->placeholder($pw, $ph); ?>
                                                    <?php endif; ?>                                                
                                                    <div>
                                                        <b><?php echo wp_kses_post($ptitle); ?></b><br/>
                                                        <?php echo str_replace('[cols][col class="1/2"]', '',wp_kses_post($pdescription)); ?>
                                                    </div>                                                   
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $count++; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Project Feed -->
        </div>
    </div>
</div>

<?php if ($settings->pager === "yes"): ?>
    <?php $content->pager(); ?>
<?php endif; ?>
    