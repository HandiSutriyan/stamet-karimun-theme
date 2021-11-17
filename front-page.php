
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
                <div class="lds-ripple"><div></div><div></div></div>
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
              $peringatan_dini = new WP_Query( array( 'category_name' => 'warning' ) );
              if ($peringatan_dini->have_posts()):
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
              while(have_posts()){
                  the_post();
                 ?>
                    <div class="news">
                    <?php echo has_post_thumbnail() ? the_post_thumbnail('large'):"<img src=".get_theme_file_uri('/assets/img/no-image.jpg').">";?>
                        <div class="filter"></div>
                        <a href="<?php the_permalink() ?>">
                            <div class="headline">
                            <h2>
                                <?php the_title(); ?>
                            </h2>
                            <small><i>Oleh: <?php echo the_author_meta( 'display_name', $postData[0]->post_author ).' | '.get_the_date( 'j F Y', $postData[0]->ID) ?></i></small>
                            <p><?php the_excerpt(__('(more…)')); ?></p>
                            </div>
                        </a>
                    </div>
                 <? 
              }  
            ?>

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
          <?php
          $buletin = new WP_Query( array( 'category_name' => 'buletin' ) );
          if ($buletin->have_posts()):
            while($buletin->have_posts()):the_post();
            ?>
            <div class="item">
              <?php echo has_post_thumbnail() ? the_post_thumbnail('large'):"<img src=".get_theme_file_uri('/assets/img/no-image.jpg').">";?>
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
