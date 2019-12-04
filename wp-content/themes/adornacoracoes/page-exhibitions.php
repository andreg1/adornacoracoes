<?php
/**
 * Template Name: Exposições
 *
 * */

get_header(); ?>
<main>
  <div class="row">
    <div class="columns large-12">
          <div class="grid" data-masonry>
               <?php
                   $args = array(
                   'post_type' => 'exposicao',
                       'post_per_page' => -1,
                       'meta_key' => 'data_inicio',
                       'orderby' => 'meta_value_num',
                       'meta_type' => 'DATE',
                       'order' => 'DESC'
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
</main>
<?php
get_footer(); ?>
