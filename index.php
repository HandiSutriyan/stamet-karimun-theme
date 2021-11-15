
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
                <div class="tab active">4 Oktober</div>
                <div class="tab">4 Oktober</div>
                <div class="tab">4 Oktober</div>
              </div>
              <div class="peta" id="peta">
                <!-- <img src="assets/img/peta cuaca.png" alt="buletin" /> -->
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
                src="/assets/img/warning.png"
                alt="warning"
                width="40"
              /><br />
              Peringatan Dini Cuaca Ekstrem
            </div>
            <div class="warn-text">
              <b
                >Berlaku selama 24 jam (31 Agustus 2021, 08.00 Wita - 01
                September 2021, 08.00 Wita)</b
              >
              <br />
              <br />
              <p>
                Waspada potensi tinggi gelombang laut yang dapat mencapai 2
                meter atau lebih di Laut Bali, Selat Bali bagian selatan, Selat
                Badung, Selat Lombok bagian selatan, dan Samudera Hindia selatan
                Bali.
              </p>
            </div>
          </div>

          <!-- swiper -->
          <div class="owl-carousel owl-theme" id="news">
            <div class="news">
              <img
                src="/assets/img/dokumentasi/pelatihan daring/berita2.JPG"
                alt="berita"
                width="100%"
              />
              <div class="filter"></div>
              <a href="news.html">
                <div class="headline">
                  <h2>
                    BMKG Serahkan 1000 Paket Beasiswa Pelatihan Vokasi Daring,
                    Bentuk Milenial Cerdas dan Terampil
                  </h2>
                  <small><i>Oleh: Admin | 20 Januari 2021 </i></small>
                </div>
              </a>
            </div>
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
            <div class="news">
              <img
                src="/assets/img/dokumentasi/vaksinasi/vaksinasi.JPG"
                alt="berita"
                width="100%"
              />
              <div class="filter"></div>
              <a href="news.html">
                <div class="headline">
                  <h2>
                    Kegiatan Vaksinasi Massal di Bandara Raja Haji Abdullah
                  </h2>
                  <small><i>Oleh: Admin | 20 Januari 2021 </i></small>
                </div>
              </a>
            </div>
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
          <img src="<?php echo get_theme_file_uri('/assets/img/fb.jpg') ?>" alt="buletin" />
        </div>
      </aside>
    </section>
<?php
get_footer( );
?>
