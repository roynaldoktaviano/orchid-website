<?php

function mytheme_assets() {
    wp_enqueue_style(
      'mytheme-style',
      get_template_directory_uri() . '/style.css',
      [],
      time()
    );
  }
  add_action('wp_enqueue_scripts', 'mytheme_assets');
  