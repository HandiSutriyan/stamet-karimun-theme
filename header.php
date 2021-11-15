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
    <title><?php bloginfo('name')." ".wp_title(); ?></title>
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
      <?php
       $args = array('theme_location' => 'primary');
       wp_nav_menu( $args );
       ?>
        <a
          href="javascript:void(0);"
          style="font-size: 15px"
          class="icon"
          onclick="myFunction()"
          >&#9776;</a
        >
      </div>
    </header>