<?php

// =============================================================================
// VIEWS/GLOBAL/_NAVBAR.PHP
// -----------------------------------------------------------------------------
// Outputs the navbar.
// =============================================================================

$navbar_position = x_get_navbar_positioning();
$logo_nav_layout = x_get_logo_navigation_layout();
$is_one_page_nav = x_is_one_page_navigation();

?>

<section class="header">
    <nav class="nav">
      <ul class="nav__bar">
        <li class="nav__item">
          <a class="nav__link" href="#"><i class="fa fa-bars nav__icon nav__trigger"></i></a>
        </li><!-- end nav__item -->
        <li class="nav__item nav__logo">
          <a class="nav__link" href="/"><img class="nav__img" src="https://www.startrighttoday.com/sites/default/files/styles/logo-256/public/sr_logo_horz_wht.png?itok=geGjSlbr" /></a>
        </li><!-- end nav__item -->
        <li class="nav__item pan pull--right">
          <a class="nav__link btn btn--nav" href="#"><i class="fa fa-phone"></i></a>
        </li><!-- end nav__item -->
        <li class="nav__item pan pull--right">
          <a class="nav__link btn btn--nav" href="#"><i class="fa fa-diamond"></i> Start</a>
        </li><!-- end nav__item -->
      </ul><!-- end nav__bar -->
      <div class="nav__tagline">Now Passion Pays Bills | 828.215.6564 | will@startrighttoday.com | M-F 8am - 4pm</div>
      <ul class="nav__menu">
        <li class="nav__menu__item nav__menu__item--secondary">
          <div class="nav__menu__heading" href="#">Discover</div>
        </li><!-- end nav__menu__item -->
        <li class="nav__menu__item nav__menu__item--secondary">
          <a class="nav__menu__link nav__menu__link--secondary" href="#">Testimonies</a>
        </li><!-- end nav__menu__item -->
        <li class="nav__menu__item nav__menu__item--secondary">
          <a class="nav__menu__link nav__menu__link--secondary" href="#">Clients</a>
        </li><!-- end nav__menu__item -->
        <li class="nav__menu__item nav__menu__item--secondary">
          <a class="nav__menu__link nav__menu__link--secondary" href="#">Compare</a>
        </li><!-- end nav__menu__item -->
        <li class="nav__menu__item nav__menu__item--secondary">
          <a class="nav__menu__link nav__menu__link--secondary" href="#">Expert</a>
        </li><!-- end nav__menu__item -->
        <li class="nav__menu__item nav__menu__item--secondary">
          <a class="nav__menu__link nav__menu__link--secondary" href="#">About</a>
        </li><!-- end nav__menu__item -->
        <li class="nav__menu__item nav__menu__item--secondary">
          <a class="nav__menu__link nav__menu__link--secondary" href="#">Resume</a>
        </li><!-- end nav__menu__item -->
        <li class="nav__menu__item nav__menu__item--secondary">
          <a class="nav__menu__link nav__menu__link--secondary" href="#">Advice</a>
        </li><!-- end nav__menu__item -->
        <li class="nav__menu__item nav__menu__item--secondary">
          <a class="nav__menu__link nav__menu__link--secondary" href="#">Contact | 828.215.6564</a>
        </li><!-- end nav__menu__item -->
        <li class="nav__menu__item nav__menu__item--secondary">
          <a class="nav__menu__link nav__menu__link--secondary" href="#">Help</a>
        </li><!-- end nav__menu__item -->
      </ul><!-- end nav__menu -->
    </nav><!-- end nav -->
  </section><!-- end header -->