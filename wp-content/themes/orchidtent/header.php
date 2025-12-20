<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
  <div class="header-inner">

    <!-- LOGO -->
    <a href="#beranda" class="logo">
      <img src="http://orchid.local/wp-content/uploads/2025/12/logo-black-1.png" alt="ORCHID">
    </a>

    <!-- NAV -->
    <nav class="navbar">
      <a href="#beranda" class="nav-link active">Beranda</a>
      <a href="#solusi" class="nav-link">Solusi</a>
      <a href="#segmen" class="nav-link">Segmen</a>
      <a href="#testimoni" class="nav-link">Testimoni</a>
      <a href="#kontak" class="nav-link">Kontak</a>
    </nav>

    <!-- CTA -->
    <a href="https://wa.me/628xxxxxxxxx" class="btn-wa">WhatsApp</a>

    <!-- MOBILE TOGGLE -->
    <div class="burger">
      <span></span><span></span><span></span>
    </div>

  </div>
</header>
