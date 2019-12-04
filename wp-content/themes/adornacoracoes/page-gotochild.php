<?php
/*
Template Name: First Artist
*/
/*$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
echo $pagekids[1];
if ($pagekids) {
$firstchild = $pagekids[0];
wp_redirect(get_permalink($firstchild->ID));
} else {
// Do whatever templating you want as a fall-back.
}*/

$args = array(
    'post_type' => 'artista',
    'meta_value' => true,
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => '1',
);
query_posts($args);
while (have_posts()) : the_post();     
    $link = $post->ID;
    wp_redirect(get_permalink($link));
endwhile;
wp_reset_query();

?>