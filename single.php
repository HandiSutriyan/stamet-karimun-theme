<?php get_header() ?>

<?php
    while(have_posts()){
        the_post(); ?>
    
    <section class="content">
      <article>
        <div class="news-article" style="margin-bottom: 100px">
          <div class="headline">
            <h2><?php the_title();?></h2>
            <small class="post-meta"><?php echo get_the_date( 'j F Y', $postData[0]->ID)?> | oleh <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author();?></a></small>
          </div>
          <hr class="gline" />
          <div class="head-image">
            <?php echo has_post_thumbnail() ? the_post_thumbnail('single-post-thumbnail'):"";?>
          </div>
          <div class="post-text" style="text-align: justify"><?php the_content()?></div>
        </div>
<?php    
    }
?>

<!-- swiper -->
<div class="feed">
          <h3>Berita Lainnya</h3>
          <hr class="gline" />
          <div class="owl-carousel" id="news-feed">
            
            <?php
            $the_query = new WP_Query( 'posts_per_page=5' );
            while ($the_query -> have_posts()) : $the_query -> the_post();
            ?>
            <div class="news-feed">
              <!-- <img src="/assets/img/buleti.png" alt="berita" width="100%" /> -->
              <?php echo has_post_thumbnail() ? the_post_thumbnail('large'):"<img src=".get_theme_file_uri('/assets/img/no-image.jpg').">";?>
              <a href="<?php the_permalink() ?>">
                <div class="headline-feed">
                  <p>
                    <?php the_title(); ?>
                  </p>
                  <small><i>Oleh: <?php echo the_author_meta( 'display_name', $postData[0]->post_author ).' | '.get_the_date( 'j F Y', $postData[0]->ID) ?> </i></small>
                </div>
              </a>
            </div>
            <?php endwhile;
            wp_reset_postdata();?>

          </div>
        </div>
      </article>
      <aside>
        <div class="card">
          <div class="container">
            <h4><b>Citra Satelit</b></h4>
          </div>
          <img
            src="http://satelit.bmkg.go.id/IMAGE/ANIMASI/H08_EH_Kepri_m18.gif"
            alt="Citra Satelit"
            style="width: 100%"
          />
        </div>
        <div class="owl-carousel" id="buletin">
          <div class="item">
            <img src="<?php echo get_theme_file_uri('/assets/img/buleti.png') ?>" alt="buletin" />
          </div>
          <div class="item">
          <img src="<?php echo get_theme_file_uri('/assets/img/buleti.png') ?>" alt="buletin" />
          </div>
          <div class="item">
          <img src="<?php echo get_theme_file_uri('/assets/img/buleti.png') ?>" alt="buletin" />
          </div>
        </div>
        <div class="fb">
          <a class="twitter-timeline" data-lang="id" data-height="300" data-theme="light" href="https://twitter.com/bmkgkarimun?ref_src=twsrc%5Etfw">Tweets by bmkgkarimun</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          <a href="https://twitter.com/intent/tweet?screen_name=bmkgkarimun&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-show-count="false">Tweet to @bmkgkarimun</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </aside>
    </section>
<?php get_footer() ?>