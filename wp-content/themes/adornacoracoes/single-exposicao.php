<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package adornacoracoes
 */

 get_header(); ?>

 <?php
 $currentExhibition = get_field('current_exhibition');
   //$currentExhibition = false;
   if ($currentExhibition) {
     get_template_part('comps/single-exposicao-principal');
   }
   else {
     get_template_part('comps/single-exposicao-default');
   }
  ?>

<?php
get_footer();
