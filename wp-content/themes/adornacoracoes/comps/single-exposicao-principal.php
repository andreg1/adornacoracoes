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
<main>
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
          <div class="marker">
            <h4><?php the_field('exhibition_current', pll_current_language('slug')); ?></h4>
            <h1><?php the_title(); ?></h1>
              <?php $post_object = get_field('exhibition_author');
                  if( $post_object ):
                  $post = $post_object;
                  setup_postdata( $post );?>
                      <h2><?php the_title(); ?></h2>
                  <?php endif; ?>
              <?php wp_reset_postdata(); ?>
              <p><?php the_field('data_inicio'); ?>  &#8212;&nbsp;<?php the_field('data_fim'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="columns medium-offset-3 large-5 long_text mt60 mb60">
        <?php the_field('exhibition_text');?>
      </div>
    </div>
    <div class="row">
        <div class="columns large-12">
            <div class="grid-4">
              <?php
                $images = get_field('exhibition_gallery');
                $size = 'full';
                if( $images ):
                  $i=1;
                ?>
                <?php foreach( $images as $image ):
                ?>
                  <div class="grid-item-4">
                    <a data-open="exampleModal<?php echo $i; ?>">
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    </a>
                  </div>
                  <div class="full reveal" id="exampleModal<?php echo $i; ?>" data-reveal>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    <button class="close-button" data-close aria-label="Close modal" type="button" style="cursor:url('<?php the_field('cursor_reveal', 'option'); ?>'),auto!important;">
                      <span aria-hidden="true"></span>
                    </button>
                    <div class="series_controls_wrapper">
                      <p><?php echo $image['alt']; ?></p>
                    </div>
                  </div>
                  <?php $i++;?>
                <?php
                endforeach; ?>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="columns large-offset-4 large-7 long_text mt30 mb30">
                <?php the_field('exhibition_text_2');?>
        </div>
          <?php endwhile; ?>
      </div>
      <div class="row">
        <div class="columns large-offset-4 large-6">
          <div class="marker">
            <h1><?php the_title(); ?></h1>
              <?php $post_object = get_field('exhibition_author');
                  if( $post_object ):
                  $post = $post_object;
                  setup_postdata( $post );?>
                      <h2><?php the_title(); ?></h2>
                  <?php endif; ?>
              <?php wp_reset_postdata(); ?>
              <p><?php the_field('data_inicio'); ?>  &#8212;&nbsp;<?php the_field('data_fim'); ?></p>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="columns small-12">
            <div class="exhibition-container">
                 <?php
                     $args = array(
                     'post_type' => 'exposicao',
                         'post_per_page' => 2,
                         'meta_key' => 'data_inicio',
                         'orderby' => 'meta_value_num',
                         'meta_type' => 'DATE',
                         'order' => 'DESC',
                         'offset'=> 1
                     );
                  query_posts($args);
                      ?>
                      <?php
                      while (have_posts()) : the_post();
                      ?>
                      <div class="exhibition-module" onclick="location.href='<?php the_permalink(); ?>'">
                        <div class="exhibition-module_text">
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
              <?php endwhile;?>
              <?php wp_reset_query(); ?>
          </div>
      </div>
   </div>
</main>
