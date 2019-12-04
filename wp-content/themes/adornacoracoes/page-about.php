<?php
/**
 * Template Name: Sobre
 *
 * */

get_header(); ?>

<main style="height:100vh;">
    <div class="row mtnav">
        <div class="columns large-offset-3 large-6">
          <div id="about">
            <h3><?php the_field('about_space_title','options');?></h3>
            <p><?php the_field('about_bio');?></p>
          </div>
        </div>
        <div class="columns large-3">
          <h3><?php the_field('about_address_title','options');?></h3>
          <p class="mb0"><?php the_field('about_address','options');?></p>
          <a target="_blank" href="https://goo.gl/maps/Y8pC41TJQuj"><?php the_field('about_address_gmaps','options');?></a>
          <h3 class="mt28"><?php the_field('about_contacts_title','options');?></h3>
          <p><?php the_field('about_contacts','options');?></p>
        </div>
      </div>
      <div class="row">
        <div class="columns large-offset-9 large-3">
          <?php the_custom_logo();?>
        </div>
      </div>
</main>

<?php
get_footer(); ?>
