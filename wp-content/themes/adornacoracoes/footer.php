<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adornacoracoes
 */

?>

<footer>
  <div class="row">
    <?php echo do_shortcode('[mc4wp_form id="608"]'); ?>
  </div>
    <div class="row">
      <div class="columns large-3">
        <b>Adorna Corações</b>
        <p><?php the_field('about_address', pll_current_language('slug')); ?></p>
      </div>
      <div class="columns large-4">
        <b><?php the_field('about_contacts_title', pll_current_language('slug')); ?></b>
        <p><?php the_field('about_contacts', pll_current_language('slug')); ?></p>
      </div>
      <!--<div class="columns large-2">
        <?php the_custom_logo();?>
      </div>-->
      <div class="columns large-4">
        <b style="margin-bottom:-5px;"><?php the_field('social_media_title', pll_current_language('slug')); ?></b>
        <a style="margin-bottom:12px;" href="http://facebook.com/adorna-coracoes" target="_blank"><?php the_field('social_media_find', pll_current_language('slug')); ?></a>
        <b style="margin-bottom:-5px;"><?php the_field('attribute_title', pll_current_language('slug')); ?></b>
        <a href="http://cargocollective.com/joaobarroso" target="_blank">João Barroso</a>
      </div>
    </div>
</footer>

<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/bower_components/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/bower_components/what-input/dist/what-input.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/bower_components/foundation-sites/dist/js/foundation.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/min/app-min.js" type="text/javascript"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/plugins/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js" type="text/javascript"></script>
<style>html{visibility:visible;opacity:1;}</style>
</body>
</html>
