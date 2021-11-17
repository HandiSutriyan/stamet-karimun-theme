
<?php
get_header();
?>
 <section class="content">
      <article>
        <div class="forecast">
          <?php 
          if (have_posts()):
            while (have_posts()) : the_post();
          ?>
            <div class="news-article" style="margin-bottom: 100px">
              <div class="headline">
                <a href="<?php the_permalink() ?>"><h2><?php the_title();?></h2></a>
                <small class="post-meta"><?php echo get_the_date( 'j F Y', $postData[0]->ID)?> | oleh <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author();?></a></small>
              </div>
              <div class="post-text"><?php the_excerpt(__('(more…)')); ?></div>
          </div>
          <?php
            endwhile;
          else:
          ?>
            <h1>Maaf, konten tidak dapat ditemukan :(</h1>
            <p>Kembali ke <a href="<?php echo site_url(); ?>">Beranda</a></p>
          <?php
          endif;
          ?>
          
        </div>
      </article>
      <aside>
        <div class="card">
          <div class="container">
            <h4><b>Kategori</b></h4>
          </div>
          <div class="card-content">
            <?php echo the_category()?>
          </div>
        </div>
        <div class="card">
          <div class="container">
            <h4><b>Arsip</b></h4>
          </div>
          <!-- <img
            src="http://satelit.bmkg.go.id/IMAGE/ANIMASI/H08_EH_Kepri_m18.gif"
            alt="Citra Satelit"
            style="width: 100%"
          /> -->
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
<?php
get_footer( );
?>
