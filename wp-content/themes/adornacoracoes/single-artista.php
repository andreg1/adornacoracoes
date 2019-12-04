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

<main>
    <div class="row mtnav">
       <div class="columns large-offset-3 medium-7 large-5 long_text">
         <h1><?php the_title(); ?></h1>
            <div class="artist_text"><?php the_field('artist_text'); ?></div>
        </div>
        <?php
          $series = get_field('artist_series');
            if( $series ) :
        ?>
            <div class="columns medium-5 large-4">
              <?php
                foreach ($series as $serie) {
                  $post = $serie; setup_postdata($post);
              ?>
                <div class="series-module" onclick="location.href='<?php the_permalink(); ?>'">
                  <h1><?php the_title(); ?></h1>
                    <?php
                      $post_object = get_field('series_artist');
                      $post = $post_object;
        	             setup_postdata( $post ); ?>
                    <span><?php the_title(); ?>, </span>
                      <?php wp_reset_postdata(); ?>
                        <?php
                        $post = $serie; setup_postdata($post); ?>
                    <span><?php the_field('series_year'); ?></span>
                </div>
                  <?php }
                  wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="columns large-offset-3 medium-7 large-5">
            <!--<h3><?php the_field('artist_photo_title', 'options'); ?> <?php the_title(); ?></h3>-->
             <?php $image = get_field('artist_photo');
            if( !empty($image) ): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer(); ?>
