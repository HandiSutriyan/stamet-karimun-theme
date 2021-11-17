<?php get_header() ?>

<section class="content">
  <article class='page'>
    <div class="news-article" style="margin-bottom: 100px">
      <?php
        while(have_posts()){
          the_post(); ?>
           <div class="headline">
            <h2><?php the_title();?></h2>
          </div>
          <hr class="gline" />
          <p><?php the_content()?></p>
      <?php    
          }
      ?>
    </div>
  </article>
</section>

<?php get_footer() ?>