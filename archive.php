
<?php
get_header();
?>
 <section class="content">
      <article>
        <div class="head-page">
            <?php
            if (is_category()):
                single_cat_title('Postingan pada Kategori ', true);
              elseif (is_tag()):
                single_cat_title('Postingan pada Tag ', true);
              elseif (is_author()):
                the_post();
                echo "Arsip Postingan: ".get_the_author();
                rewind_posts();
              elseif (is_day()):
                echo "Arsip Harian: ".get_the_date('j F Y');
              elseif (is_month()):
                echo "Arsip Bulan: ".get_the_date('F Y');
              elseif(is_year()):
                echo "Arsip Tahun: ".get_the_date('Y');
              else:
                echo "Arsip Postingan";
              endif;
            ?>
             <hr class="gline" />
        </div>
        <div class="forecast">
          <?php 
          if (have_posts()):
            while (have_posts()) : the_post();
          ?>
            <div class="news-article" style="margin-bottom: 20px">
              <div class="headline">
                <a href="<?php the_permalink() ?>"><h2><?php the_title();?></h2></a>
                <small class="post-meta"><?php echo get_the_date( 'j F Y', $postData[0]->ID)?> | oleh <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author();?></a></small>
              </div>
              <div class="post-text"><?php the_excerpt(__('(more…)')); ?></div>
          </div>
          <hr class="post-line">
          <?php
            endwhile;
          else:
          ?>
            <p class="notif">Maaf, tidak dapat ditemukan :(</p>
            <p>Kembali ke <a href="<?php echo site_url(); ?>">Beranda</a></p>
          <?php
          endif;
          wp_reset_postdata();
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
