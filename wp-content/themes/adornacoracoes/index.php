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
     $args = array(
     'post_type' => 'exposicao',
     'posts_per_page' => 1,
     'meta_key' => 'data_inicio',
     'orderby' => 'meta_value_num',
     'meta_type' => 'DATE',
     'order' => 'DESC'
     );
     query_posts($args);
 ?>
 <?php
     while (have_posts()) : the_post();
     $image = get_field('exhibition_hero');
     $url = $image['url'];
     $alt = $image['alt'];
 ?>
 <div class="hero">
  <div id="hero_img" style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo $image['url']; ?>');">
      <div class="show-for-medium">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'my-custom-menu',
            'container_class' => 'custom-menu-class'));
        ?>
      </div>
      <div class="row">
        <div class="columns large-6">
          <div class="exhibition-module" onclick="location.href='<?php the_permalink(); ?>'">
            <div class="exhibition-module_text">
              <h4><?php the_field('exhibition_current', pll_current_language('slug')); ?></h4>
              <h1><?php the_title(); ?></h1>
                  <?php $post_object = get_field('exhibition_author');
                  if( $post_object ):
                  $post = $post_object;
                  setup_postdata( $post );?>
              <h2><?php the_title(); ?></h2>
                  <?php endif; ?>
                  <?php wp_reset_postdata(); ?>
              <p><?php the_field('data_inicio'); ?> – <?php the_field('data_fim'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>
<main>
  <div class="row mt90">
    <div class="columns large-12">
          <div class="grid" data-masonry>
               <?php
                   $args = array(
                   'post_type' => 'exposicao',
                       'post_per_page' => 4,
                       'meta_key' => 'data_inicio',
                       'orderby' => 'meta_value_num',
                       'meta_type' => 'DATE',
                       'order' => 'DESC',
                       'offset' => 1
                   );
                query_posts($args);
                    ?>
                    <?php
                    while (have_posts()) : the_post();
                    $image = get_field('exhibition_thumb');
                    $url = $image['url'];
                    $alt = $image['alt'];
                    ?>
                    <div class="grid-item">
                      <div class="exhibition-module" onclick="location.href='<?php the_permalink(); ?>'">
                        <?php if ( $image ) : ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        <?php endif; ?>
                          <div class="exhibition-module_text">
                            <h1><?php the_title(); ?></h1>
                            <?php
                              $collectiveExhibition = get_field("collective_exhibition");
                              if ($collectiveExhibition == "no") {?>
                                <?php $post_object = get_field('exhibition_author');
                                  if( $post_object ):
                                    $post = $post_object;
                                      setup_postdata( $post );?>
                              <h2><?php the_title(); ?></h2>
                                <?php endif; ?>
                                <?php wp_reset_postdata(); ?>
                             <?php } elseif ($collectiveExhibition == "yes") { ?>
                             <h2><?php the_field('exhibition_collective_exhibition', pll_current_language('slug')); ?></h2>
                            <?php } ?>
                            <p><?php the_field('data_inicio'); ?> – <?php the_field('data_fim'); ?></p>
                          </div>
                        </div>
                      </div>
            <?php endwhile;?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
  </div>
  <div class="row mt30">
    <div class="columns medium-offset-4 medium-4">
      <div id="exhibitions_see_all">
        <a href="<?php the_field('exhibition_choose_page', pll_current_language('slug')); ?>"><?php the_field('exhibition_see_all', pll_current_language('slug')); ?></a>
      </div>
    </div>
  </div>
  <div class="row mt60" id="index_artists">
    <div class="columns large-12">
      <div class="artists_slideshow">
      <?php
        $args = array(
          'post_type' => 'artista',
          'meta_value' => true,
          'orderby' => 'title',
          'order' => 'ASC',
          'posts_per_page' => '-1'
        );
        query_posts($args);
      ?>
      <?php while (have_posts()) : the_post();
        $image = get_field('artist_thumbnail');
        $url = $image['url'];
        $alt = $image['alt'];
      ?>
        <div class="artist_thumbnail_wrapper">
          <div onclick="location.href='<?php the_permalink(); ?>'" class="artist_thumbnail" style="background-image: url('<?php echo $image['url']; ?>');">
            <a><?php the_title(); ?></a>
          </div>
        </div>
      <?php endwhile;?>
      <?php wp_reset_query(); ?>
    </div>
    </div>
  </div>
</main>
<?php
get_footer();
