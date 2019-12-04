<main>
  <div class="row" style="margin-bottom:26px;">
    <div class="columns medium-6">
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
      <div class="columns large-12">
          <div class="grid" data-masonry>
            <?php
              $images = get_field('exhibition_gallery');
              $size = 'full';
              if( $images ):
                $i=1;
              foreach( $images as $image ):
              ?>
                <div class="grid-item">
                  <a data-open="exampleModal<?php echo $i; ?>">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                  </a>
                </div>
                <div class="full reveal" id="exampleModal<?php echo $i; ?>" data-reveal data-animation-in="fade-in" data-animation-out"fadeout">
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                  <button class="close-button" data-close aria-label="Close modal" type="button">
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
      <div class="columns large-offset-2 large-8 long_text">
        <?php the_field('exhibition_text');?>
      </div>
    </div>
    <div class="row">
      <div class="columns large-offset-2 large-8 long_text">
              <?php the_field('exhibition_text_2');?>
      </div>
    </div>
</main>
