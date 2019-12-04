<?php
/**
 * Template Name: Imprensa
  */
get_header(); ?>

<main>
    <div class="row mtnav">
    <div class="columns medium-offset-3 hide-for-medium">
      <?php
        $args = array(
        'post_type' => 'artigos',
        'post_per_page' => -1,
        'orderby' => 'date'
        );
        query_posts($args);
        ?>
        <?php
        while (have_posts()) : the_post();?>
          <?php
            $source = get_field("article_source");
            if ($source == "print") { ?>
           <a class="exhibition-module" target="_blank" href="<?php the_field('article_print'); ?>">
           <?php } elseif ($source == "online") { ?>
           <a class="exhibition-module" target="_blank" href="<?php the_field('article_online'); ?>">
          <?php } ?>
            <div>
              <h1><?php the_title(); ?></h1>
              <?php if ($source == "print") { ?>
                <span class="press_online"></span>
              <?php } elseif ($source == "online") { ?>
                <span class="press_online"></span>
              <?php } ?>
              <!--<h3 class="mt28"><?php the_field('summary_title','options'); ?></h3>-->
              <p><?php the_field('article_text'); ?></p>
            </div>
          </a>
         <?php endwhile ?>
        <?php wp_reset_query(); ?>
      </div>
     <div class="hide-for-small-only exhibition-container columns large-offset-3 large-9">
      <div class="module-left-container">
          <?php
            $args = array(
            'post_type' => 'artigos',
            'post_per_page' => -1,
            'orderby' => 'date'
            );
            query_posts($args);
            ?>
            <?php
            while (have_posts()) : the_post();?>
            <?php if ($wp_query->current_post % 2 == 0): ?>
              <?php
                $source = get_field("article_source");
                if ($source == "print") { ?>
               <a class="exhibition-module" target="_blank" href="<?php the_field('article_print'); ?>">
               <?php } elseif ($source == "online") { ?>
               <a class="exhibition-module" target="_blank" href="<?php the_field('article_online'); ?>">
              <?php } ?>
                <div>
                  <h1><?php the_title(); ?></h1>
                  <?php if ($source == "print") { ?>
                    <span class="press_print"></span>
                  <?php } elseif ($source == "online") { ?>
                    <span class="press_online"></span>
                  <?php } ?>
                  <!--<h3 class="mt28"><?php the_field('summary_title','options'); ?></h3>-->
                  <p><?php the_field('article_text'); ?></p>
                </div>
              </a>
            <?php endif ?>
             <?php endwhile ?>
            <?php wp_reset_query(); ?>
          </div>
        <div class="module-right-container">
          <?php
            $args = array(
            'post_type' => 'artigos',
            'post_per_page' => -1,
            'orderby' => 'date'
            );
            query_posts($args);
            ?>
            <?php
            while (have_posts()) : the_post();?>
            <?php if ($wp_query->current_post % 2 != 0): ?>
              <?php
                $source = get_field("article_source");
                if ($source == "print") { ?>
               <a class="exhibition-module" target="_blank" href="<?php the_field('article_print'); ?>">
               <?php } elseif ($source == "online") { ?>
               <a class="exhibition-module" target="_blank" href="<?php the_field('article_online'); ?>">
              <?php } ?>
                <div>
                  <h1><?php the_title(); ?></h1>
                  <?php if ($source == "print") { ?>
                    <span class="press_print"></span>
                  <?php } elseif ($source == "online") { ?>
                    <span class="press_online"></span>
                  <?php } ?>
                <!--<h3 class="mt28"><?php the_field('summary_title','options'); ?></h3>-->
                  <p><?php the_field('article_text'); ?></p>
                </div>
              </a>
            <?php endif ?>
             <?php endwhile ?>
           </div>
<?php wp_reset_query(); ?>
   </div>
       </div>
</main>

<?php
get_footer(); ?>
