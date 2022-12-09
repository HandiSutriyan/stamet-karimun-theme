
<?php
get_header();
?>
 <section class="content">
      <article>
        <div class="forecast">
            <h2>Prakiraan Cuaca Kabupaten Karimun</h2>
            <hr class="gline" />
            <div class="peta-container">
              <div class="row-tab" id="tgl-tab">
                <div class="tab active">Memuat</div>
                <div class="tab">Memuat</div>
                <div class="tab">Memuat</div>
              </div>
              <div class="peta" id="peta">
                <div class="loader">
                  <div class="lds-ripple"><div></div><div></div></div>
                </div>
              </div>
              <div class="row-tab" id="foot-tab">
                <div class="tab">00:00</div>
                <div class="tab">03:00</div>
                <div class="tab">06:00</div>
                <div class="tab">09:00</div>
                <div class="tab">12:00</div>
                <div class="tab">15:00</div>
                <div class="tab">18:00</div>
                <div class="tab">21:00</div>
              </div>
            </div>
          </div>
          <div class="warning">
            <div class="sign">
              <img
                src="<?php echo get_theme_file_uri('/assets/img/warning.png') ?>"
                alt="warning"
                width="40"
              /><br />
              Peringatan Dini Cuaca Ekstrem
            </div>
            <div class="warn-text">
              <?php
              $peringatan_dini = new WP_Query(array( 
                'category_name' => 'warning',
                'orderby'        => 'date',
                'posts_per_page' => '1'
              ));
              if ($peringatan_dini->have_posts()): 
                $peringatan_dini->the_post();
              ?>
              <b><a href="<?php the_permalink();?>"><?php the_title();?></a></b>
              <br />
              <br />
              <p><?php the_excerpt() ?></p>
              <?php
              else:
                ?>
              <b><a href="#">Belum Ada Peringatan Dini Cuaca Ekstrem</a></b>
              <br />
              <br />
              <p>Saat ini tidak terdapat peringatan dini terkait Cuaca Esktrem untuk wilayah Kabupaten Karimun dan sekitarnya.</p>
              <?php
              endif;
              wp_reset_postdata();
              ?>
            </div>
          </div>

         
          <!-- swiper -->
          <div class="owl-carousel owl-theme" id="news">
          <?php
          $post_thumb = new WP_Query(array( 
            'orderby'        => 'date',
            'posts_per_page' => '5',
           ));
           if($post_thumb->have_posts()):
              while($post_thumb->have_posts()){
                $post_thumb->the_post();
                $cat_name = get_the_category(get_The_ID())[0]->name;
                // Menampilkan berita dan artikel saja
                if($cat_name != 'Warning' && $cat_name != 'Buletin'):
                 ?>
                    <div class="news">
                    <?php echo has_post_thumbnail() ? the_post_thumbnail('large'):"<img src=".get_theme_file_uri('/assets/img/no-image.jpg').">";?>
                        <div class="filter"></div>
                        <a href="<?php the_permalink() ?>">
                            <div class="headline">
                            <h2>
                                <?php echo the_title(); ?>
                            </h2>
                            <small><i><?php echo get_the_date( 'j F Y')?> | oleh <?php the_author();?></i></small>
                            <div id="excerpt"><?php the_excerpt(__('(more…)')); ?></div>
                            </div>
                        </a>
                    </div>
                 <?php 
                endif;
              } 
            else:
            ?>
            <div class="news">
              <img src="/assets/img/berita.jpg" alt="berita" width="100%" />
              <div class="filter"></div>
              <a href="news.html">
                <div class="headline">
                  <h2>
                    Cuaca di Karimun, Pemain Layangan Harus Waspadai Petir dan
                    Puting Beliung
                  </h2>
                  <small><i>Oleh: Admin | 20 Januari 2021 </i></small>
                </div>
              </a>
            </div>
            <?php
            endif;
            wp_reset_postdata(); 
            ?>

          </div>
        </div>
      </article>
      <aside>
        <div class="card">
          <div class="container">
            <h4><b>Citra Satelit Kep. Riau</b></h4>
          </div>
          <img
            src="https://inderaja.bmkg.go.id/IMAGE/HIMA/H08_EH_Kepri.png?id=49986f8y2zmqxus106iaa8t"
            alt="Citra Satelit"
            style="width: 100%"
          />
        </div>
        <div class="card">
          <div class="container">
            <h4><b>Citra Radar Batam</b></h4>
          </div>
          <img
            src="https://inderaja.bmkg.go.id/Radar/BATA_SingleLayerCRefQC.png?id=61425mhidyyf3k4vvxx6dnf"
            alt="Citra Satelit"
            style="width: 100%"
          />
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
              <?php echo has_post_thumbnail() ? the_post_thumbnail('buletin-thumbnail'):"<img src=".get_theme_file_uri('/assets/img/no-image.jpg').">";?>
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
<?php
get_footer( );
?>
