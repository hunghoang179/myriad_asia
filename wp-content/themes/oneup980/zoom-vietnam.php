<?php
/**
 * Template Name: Zoom Viet Nam
 *
 * Show categories Zoom Viet Nam
 *
 */
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/bootstrap/demo.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/bootstrap/style.css" />
<script src="<?php bloginfo('template_directory'); ?>/bootstrap/modernizr.custom.97074.js"></script>        
<noscript><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/bootstrap/noJS.css"/></noscript>
<style type="text/css">
    .site-body {
        padding-top: 0 !important;
        padding-bottom: 0px;
    }
</style>
<?php $t = & peTheme(); ?>
<?php get_header(); ?>
<?php $t->layout->sidebar = isset($_REQUEST["pe-no-sb"]) ? "no" : "right"; ?>
<section class="pe-main-section pe-view-layout-block pe-view-layout-block-1 pe-style-light pe-bg-center " id="section-section1" style="padding: 12px 0px 0px; background-image: url(<?php bloginfo('template_directory'); ?>/img/country/vietnam/banner-zoomvn.png); background-position: 50% 52px; background-repeat: no-repeat;box-shadow: inset 0 0 0 160px rgba(75,75,75, 0.1), inset 0 0 0 160px rgba(75,75,75,0.2), 0 1px 2px rgba(0,0,0,0.1);  width: 1350px; margin: 0 auto;">
    <div class="pe-container" style="min-height: 240px;">  
        <div class="row">
            <div class="col-md-6">
                <div class="left-banner-zoom">
                    <div class="zoom-text">
                        <a href="<?php echo home_url();?>/country"><?php echo do_shortcode('[cml_text en="Zoom on Vietnam" fr="Zoom sur Vietnam"]') ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-banner-zoom">
<!--                    <div class="quotes-cmt">
                        <script type="text/javascript">
                            var today = new Date();
                            var first = new Date(today.getFullYear(), 0, 1);
                            var day = Math.round(((today - first) / 86400), 0);
                            var numquotes = 30;
                            quotes = new Array(numquotes + 1);

                            quotes[1] = "Tình yêu của các chàng trai không nằm ở trái tim mà nằm ở đôi mắt";
                            quotes[2] = "Chẳng bao giờ xảy ra chuyện ta yêu mà người con gái không hề hay biết &#8211; ta tin rằng mình đã tỏ tình một cách rõ ràng bằng một giọng nói, một cái chạm tay";
                            quotes[3] = " Muốn chinh phục người con gái ấy, bạn hãy làm cho nàng hiểu rằng nàng chẳng phải viên sỏi duy nhất trên bờ biển-Đừng bao giờ để người khác lấy đi những ước mơ của mình.Hãy làm theo những gì trái tim mình mách bảo";
                            quotes[4] = "Tình yêu trong xa cách ví như ngọn lửa trong gió. Gió thổi tắt ngọn lửa nhỏ và thổi bùng ngọn lửa lớn ";
                            quotes[5] = " Khi yêu, người ta thấy sự xa cách và thời gian chẳng là gì cả";
                            quotes[6] = "Khi một tâm hồn mở ra để đón tình yêu thì bỗng dưng có hàng ngàn cách để biểu lộ tình yêu ấy";
                            quotes[7] = "Khi hai người yêu nhau, họ không nhìn nhau mà họ cùng nhìn về một hướng";
                            quotes[8] = "Tình yêu nâng cao con người thoát khỏi sự tầm thường ";
                            quotes[9] = " Trên thế gian này chẳng có vị thần nào đẹp hơn thần mặt trời, chẳng có ngọn lửa nào kỳ diệu hơn ngọn lửa tình yêu";
                            quotes[10] = " Hãy để cho người chết đi tìm sự bất tử trong danh vọng và những người sống đi tìm sự bất tử trong tình yêu";
                            quotes[11] = "Chỉ có kẻ nào yêu mà không mong được yêu trả lại, mới chắc chắn là mình thật yêu ai hơn tất cả mà thôi ";
                            quotes[12] = "Tình yêu là một vị thần trẻ con. Hễ khi đã yêu thì dù là bậc thánh cũng biến thành một đứa trẻ con không hơn không kém ";
                            quotes[13] = "Tình yêu là sự rung cảm của một tâm hồn khi gặp một tâm hồn đồng điệu, là sự hòa nhịp của hai trái tim, làm người ta nhìn thấy mọi vật tươi đẹp hơn ";
                            quotes[14] = "Đang thật yêu bỗng căm ghét là còn yêu một cách âm thầm tha thiết ";
                            quotes[15] = "Chân lý cuối cùng của ở cuộc đời này là tình yêu có nghĩa là sống và sống là yêu ";
                            quotes[16] = "Được yêu, một sự kiện quan trọng biết bao! Yêu, càng trọng đại hơn nữa! Vì yêu, trái tim trở nên can đảm. Nó chỉ còn toàn những gì thuần khiết, chỉ dựa vào những gì cao thượng và lớn lao ";
                            quotes[17] = "Ái tình không nhìn bằng mắt mà bằng tâm hồn. Vì vậy, nhân loại khắc họa Thần Tình ái có hai cánh nhưng con mắt mù lòa ";
                            quotes[18] = "Một người đang yêu có hai trạng thái: hoặc là không nghi ngờ gì hết, hai là nghi ngờ tất cả ";
                            quotes[19] = " Yêu có nghĩa là đối xử với một ai đó tốt hơn tất cả mọi người, tốt hơn với cả chính bản thân mình ";
                            quotes[20] = "Sự đau khổ làm cho tâm hồn thêm nhẹ nhàng và thanh cao ";
                            quotes[21] = " Ai khổ vì yêu hãy yêu hơn nữa. Chết vì yêu là sống trong tình yêu";
                            quotes[22] = "Yêu vì mục đích được yêu là con người, nhưng yêu vì mục đích yêu là thiên thần ";
                            quotes[23] = " Giọt nước mắt đầu tiên của tình yêu giống như hạt kim cương; giọt nước mắt thứ nhì giống như hạt ngọc; giọt nước mắt thứ ba giống như những giọt nước mắt khác, không hơn không kém";
                            quotes[24] = "Thà rằng yêu em mà đau khổ còn hơn cả 1 đời ta không biết em ";
                            quotes[25] = "Hạnh phúc lớn nhất trên đời này là tin rằng mình được yêu ";
                            quotes[26] = " Biểu hiện đầu tiên của tình yêu chân thật ở người con trai là sự rụt rè, còn ở người con gái là sự táo bạo";
                            quotes[27] = "Tất cả những gì anh yêu sẽ mất đi một nửa thú vị nếu không có em để cùng chia sẻ ";
                            quotes[28] = " Em, chỉ mình em mới tạo cho anh cảm giác đang sống&#8230; Những người đàn ông khác bảo đã gặp được thiên thần nhưng anh đã thấy em và thế là đủ";
                            quotes[29] = " Thật thế, khó tìm ra được một tình yêu hoàn hảo. Để trở thành một người tình, bạn phải có liên tục sự tinh tế của một kẻ rất sáng suốt, sự linh động của một đứa trẻ, tính nhạy cảm của một nghệ sĩ, sự hiểu biết của một triết gia, sự thu nhận của một vị thánh, sự khoan dung của mộ học giả và lòng dũng cảm của một tín đồ";
                            quotes[30] = "Thời gian không dành cho tình yêu là thời gian lãng phí ";

                            var ran = (day % numquotes) + 1;
                            document.write(quotes[ran]);</script>
                    </div>-->
                    
                    <?php
                    global $wpdb;
                    $selected_category = '59'; // Put your parent category id here
                    $children = get_categories("child_of=$selected_category");
                    $inlist = "$selected_category";
                    foreach ($children as $cat) {
                        $inlist .= ',' . $cat->cat_ID;
                    }
                    $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID,
                comment_author, comment_date, comment_approved, comment_type,comment_author_url,
                    SUBSTRING(comment_content,1,100) AS com_excerpt
                FROM $wpdb->term_taxonomy as t1, $wpdb->posts, $wpdb->term_relationships as r1, $wpdb->comments
                WHERE comment_approved = '1'
                   AND comment_type = ''
                   AND ID = comment_post_ID
                   AND post_password = ''
                   AND ID = r1.object_id
                   AND r1.term_taxonomy_id = t1.term_taxonomy_id
                   AND t1.taxonomy = 'category'
                   AND t1.term_id IN ($inlist)
                ORDER BY rand() LIMIT 1";
                    $comments = $wpdb->get_results($sql);
                    $output = $pre_HTML;
                    $output .= "\n";
                    foreach ($comments as $comment) {
                        $output .= "<div class='content-cm-zoom'>\"" . substr(strip_tags($comment->com_excerpt), 0, 40)."...\"<br /><b>". strip_tags($comment->comment_author) ."</b><br />". strip_tags($comment->comment_date) ."</div><div class='link-cm'> <i class='fa fa-comments-o'></i><div class='box-link'><a href='".get_comments_link($comment->comment_post_ID)."'>Voir tous les avis</a></div></div>";
//                        $output .= "« ID"."#comments" . "\" title=\"Comment on ".$comment->post_title . "\">" . strip_tags($comment->com_excerpt)."... » Comment on ". strip_tags($comment->comment_author) ." , ". strip_tags($comment->comment_date) ."";
                    }
                    $output .= "\n";
                    $output .= $post_HTML;
                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $t->get_template_part("common", "layout-start"); ?>
<div class="row fix-mg" id="da-thumbsx">
    <div class="title-zoom-pg">
        <h4>Je cherche de l’inspiration pour voyager au Vietnam</h4>
    </div>


    <form action="<?php echo esc_url(home_url("/")); ?>">
        <div class="col-md-10">
            <ul class="list-cate-zoom">
                <?php
                $category = get_category(get_query_var('cat'));
                $cat_id = 59;
                $taxonomy = 'category';
                $args = array('child_of' => $cat_id, 'parent' => $cat_id, 'hide_empty' => 0, 'orderby' => ID);
                $tax_terms = get_terms($taxonomy, $args);
                if (count($tax_terms) > 0) {
                    foreach ($tax_terms as $tax_term) {
                        ?>
                        <?php if ($tax_term->slug == 'daytour') { ?>
                            <style type="text/css">
                                .category-daytour{
                                    display: none;
                                }
                            </style>
                        <?php } ?>
                        <li class="category-<?php echo $tax_term->slug ?>">
                            <div class="da-thumbs"  id="da-thumbsx">
                                <div class="efect-xx">
                                    <?php //echo '<a href="' . get_category_link($tax_term->term_id) . '" title="' . sprintf(__("View all posts in %s"), $tax_term->name) . '" ' . '>';    ?>
                                    <a href="zoom-sur-le-vietnam/inspirations" title="<?php echo $tax_term->name ?>">
                                        <img src="<?php echo z_taxonomy_image_url($tax_term->term_id); ?>" />
                                        <?php
                                        $css = categoryCustomFields_GetCategoryCustomField($tax_term->term_id, 'css');
                                        foreach ($css as $css_field) {
                                            ?>
                                            <i class="<?php echo $css_field->field_value; ?>"></i>
                                        <?php } ?>
                                        <h6><?php echo $tax_term->name; ?></h6>

                                        <div>
                                            <?php echo $tax_term->description; ?>
                                            <input type="checkbox" value="<?php echo $tax_term->term_id ?>" name="cat[]" id="<?php echo $tax_term->name ?>"/>
                                        </div>
                                    </a>
                                    <?php //echo '</a>';    ?>      
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?> 
                <li>
                    <button style="background: #dd4a4d; color: #fff; text-align: center;width: 172px; height: 180px; padding: 75px 0;border: 0">
                        INSPIREZ-MOI
                    </button>
                </li>
            </ul>
        </div>
    </form>
    <div class="col-md-2">
        <ul class="list-cate-day-tour">
            <?php if ($cat_slug != 'daytour') { ?>
                <style type="text/css">
                    .category-not-day{
                        display: none;
                    }
                    .category-day-daytour{
                        display:block;
                    }
                </style>
            <?php } ?>
            <?php
            $category_ids = get_all_category_ids();
            foreach ($category_ids as $cat_id) {
                $cat_slug = get_cat_slug($cat_id);
                $cat_name = get_cat_name($cat_id);
                $cat_des = get_cat_desc($cat_id)
                ?>

                <li class="category-not-day category-day-<?php echo $cat_slug ?>">
                    <div class="da-thumbs"  id="da-thumbsx">
                        <div class="efect-xx">
                            <?php echo '<a href="' . get_category_link($cat_id) . '" title="' . sprintf(__("View all posts in %s"), $cat_name) . '" ' . '>'; ?>
                            <img src="<?php echo z_taxonomy_image_url($cat_id); ?>" />
                            <h6>
                                <?php
                                $css = categoryCustomFields_GetCategoryCustomField($cat_id, 'css');
                                foreach ($css as $css_field) {
                                    ?>
                                    <i style="font-size: 40px" class="<?php echo $css_field->field_value; ?>"></i><br />
                                <?php } ?>
                                <?php echo $cat_name ?></h6>
                            <div>
                                <?php echo $cat_des; ?>
                                <input type="checkbox" value="<?php echo $tax_term->term_id ?>" name="cat_select[]" id="<?php echo $cat_name ?>"/>
                            </div>
                            <?php echo '</a>'; ?>      
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
<!--        <img src="/hanoivoyage/wp-content/themes/oneup980/img/country/vietnam/vietnam-local.png" alt="Viet Nam Plance" class="img-rounded">-->
    </div>

</div>

<?php $t->get_template_part("common", "layout-end"); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/bootstrap/jquery.hoverdir.js"></script>	
<script type="text/javascript">
    $(function () {
        $(' #da-thumbsx > .efect-xx ').each(function () {
            $(this).hoverdir();
        });
    });
</script>

<?php get_footer(); ?>