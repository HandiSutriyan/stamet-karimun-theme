<?php get_header() ?>

<section class="content">
  <article class='single-page'>
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
  <aside>
        <div class="card">
          <div class="container">
            <h4><b>Kategori</b></h4>
          </div>
          <div class="card-content">
            <ul class="cat_list">
              <?php
              $categories = get_categories();
              foreach($categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
              }
            ?>
            </ul>
          </div>
        </div>
        <div class="card">
          <div class="container">
            <h4><b>Arsip</b></h4>
          </div>
          <div class="card-content">
              <ul class="cat_list">
              <?php wp_get_archives('type=monthly'); ?>
              </ul>
          </div>
        </div>
        <div class="owl-carousel" id="buletin">
          <?php
          $buletin = new WP_Query( array( 
            'category_name' => 'buletin',
            'orderby'        => 'date',
            'posts_per_page' => '5',
            ) );
          if ($buletin->have_posts()):
            while($buletin->have_posts()):$buletin->the_post();
            ?>
            <div class="item">
              <a href="<?php the_permalink( ) ?>">
              <?php echo has_post_thumbnail() ? the_post_thumbnail('large'):"<img src=".get_theme_file_uri('/assets/img/no-image.jpg').">";?>
              </a>
            </div>
            <?php
            endwhile;
          else:
          ?>
          <div class="item">
            <img src="<?php echo get_theme_file_uri('/assets/img/buleti.png') ?>" alt="buletin" />
          </div>
          <div class="item">
          <img src="<?php echo get_theme_file_uri('/assets/img/buleti.png') ?>" alt="buletin" />
          </div>
          <div class="item">
          <img src="<?php echo get_theme_file_uri('/assets/img/buleti.png') ?>" alt="buletin" />
          </div>
          <?php
          endif;
          wp_reset_postdata();
          ?>
          
        </div>
        <div class="fb">
          <a class="twitter-timeline" data-lang="id" data-height="300" data-theme="light" href="https://twitter.com/bmkgkarimun?ref_src=twsrc%5Etfw">Tweets by bmkgkarimun</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          <a href="https://twitter.com/intent/tweet?screen_name=bmkgkarimun&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-show-count="false">Tweet to @bmkgkarimun</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </aside>
</section>

<?php get_footer() ?>