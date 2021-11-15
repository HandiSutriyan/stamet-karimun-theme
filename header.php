<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="/assets/img/favicon.ico"
      type="image/x-icon"
    />
    <title>Stasiun Meteorologi RHA-Karimun</title>

    <?php wp_head(); ?>
  </head>
  <body>
  <header>
      <div class="banner" style="background-image: url('<?php echo get_theme_file_uri('/assets/img/header.jpg') ?>'); ">
        <div class="filter"></div>

        <div class="site-name">
        <a href="<?php echo site_url() ?>">
          <div class="logo">
            <img src="<?php echo get_theme_file_uri('/assets/img/bmkg.png') ?>" alt="Logo bmkg" width="100" />
          </div>
        </a>
          <div class="brand">
            <span class="instansi">
              Badan Meteorologi Klimatologi dan Geofisika</span
            >
            <br />
            <p class="station-name">
              Stasiun Meteorologi Kelas IV <br />
              Raja Haji Abdullah-Karimun
            </p>
          </div>
        </div>
      </div>
      <div class="topnav" id="myTopnav">
        <a href="<?php echo site_url() ?>">Beranda</a>
        <div class="dropdown">
          <button class="dropbtn">
            Profil
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="<?php echo site_url('/visi-misi') ?>">Visi Misi</a>
            <a href="">Tugas & Fungsi</a>
          </div>
        </div>
        <a href="">Cuaca</a>
        <a href="">Iklim</a>
        <a href="">Gempa & Tsunami</a>
        <div class="dropdown">
          <button class="dropbtn">
            Layanan Data
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="">Penelitian</a>
            <a href="">Komersial</a>
          </div>
        </div>
        <a href="">Indeks Kepuasan Masyarakat</a>
        <a
          href="javascript:void(0);"
          style="font-size: 15px"
          class="icon"
          onclick="myFunction()"
          >&#9776;</a
        >
      </div>
    </header>