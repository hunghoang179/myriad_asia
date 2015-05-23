<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<form action="<?php bloginfo('template_url') ?>/build_search.php" method="post" accept-charset="utf-8">
	<div>Search</div>
	<input type="text" name="keywordsearch" value="" id="title">

	<div>Category</div>
	<?php wp_dropdown_categories( 'show_option_all=All Categories' ); ?>

	<div>Tags</div>
	<select name="and-or" id="select-and-or">
		<option value="OR">Match ANY of the checkboxes (default)</option>
		<option value="AND">Match ALL of the checkboxes</option>
	</select>
	<div>
            <?php
            //if you want subsections just copy the chunk again
            echo "<h5>Sub Title</h5>";
            $cat_id = 59;
            $taxonomy = 'category';
            $args = array('child_of' => $cat_id, 'parent' => $cat_id, 'hide_empty' => 0, 'orderby' => ID);
            $tax_terms = get_terms($taxonomy, $args);
            if (count($tax_terms) > 0) {
                foreach ($tax_terms as $tax_term) {
                    $checkboxes = '<label><input type="checkbox" name="filter_cat[]" value="' . $tax_term->term_id . '"';
                    if (in_array($tax_term->term_id, $_REQUEST['filter_cat'])) {
                        $checkboxes .= 'checked="checked"';
                    }
                    $checkboxes .= ' />';
                    $checkboxes .= $tax_term->name;
                    $checkboxes .= '</label>';
                    echo $checkboxes;
                }
            }
            ?>
	</div>
	<p><input type="submit" value="Search"></p>
</form>