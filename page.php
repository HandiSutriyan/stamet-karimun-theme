<?php get_header() ?>

<?php
    while(have_posts()){
        the_post(); ?>
    
    <section class="content">
      <article>
        <div class="news-article" style="margin-bottom: 100px">
          <div class="headline">
            <h2><?php the_title();?></h2>
          </div>
          <hr class="gline" />

          <p><?php the_content()?></p>
         
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
          <!-- <img
            src="http://satelit.bmkg.go.id/IMAGE/HIMA/H08_EH_Kepri.png"
            alt="Citra Radar"
            style="width: 100%"
          /> -->
        </div>
        <div class="owl-carousel" id="buletin">
          <div class="item">
            <img src="/assets/img/buleti.png" alt="buletin" />
          </div>
          <div class="item">
            <img src="/assets/img/buleti.png" alt="buletin" />
          </div>
          <div class="item">
            <img src="/assets/img/buleti.png" alt="buletin" />
          </div>
        </div>
        <div class="fb">
          <img src="/assets/img/fb.jpg" alt="buletin" />
        </div>
      </aside>
    </section>


<?php    
    }
?>

<?php get_footer() ?>