<?php defined("ABSPATH") or die;

require_once dirname(__FILE__) . "/config-site-template.functions.php";

add_action("modularity", function(){
  do_action('get_header'); ?><!doctype html>
  <html <?php language_attributes(); ?>>
    <head>
      <meta charset="<?php bloginfo('charset'); ?>">
      <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
      <title><?php wp_title(' | ', true, 'right'); ?></title>
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
      <?php wp_body_open(); ?>
      <main <?php post_class(); ?>>
        <?php do_action('modularity_before_content'); ?>
        <article class="site-layout-container">
          <?php do_action('modularity_content'); ?>
        </article>
      </main>
      <?php do_action('get_footer') ?>
      <?php do_action('wp_footer') ?>
    </body>
  </html><?php
});

add_filter('excerpt_more', function($more) { return ''; });

add_filter('excerpt_length', function($length) { return 27; }, 9999);

add_filter('wp_title', 'site_template_title', 10, 2);

add_action('widgets_init', 'site_template_footer_sidebar');

add_action("wp_body_open", "site_template_header");

add_action("wp_footer", "site_template_footer");

add_action('modularity_content', 'site_template_content_page');

add_action('modularity_content', 'site_template_content_error');

add_action('modularity_content', 'site_template_content_search');

add_action('modularity_content', 'site_template_content_posts');

add_action('modularity_content', 'site_template_content_post');

add_action('modularity_content_post', 'site_template_post_content_title', 10);

add_action('modularity_content_post', 'site_template_post_content_meta', 20);

add_action('modularity_content_post', 'site_template_post_content_image', 30);

add_action('modularity_content_post', 'site_template_post_content_content', 40);

add_action('modularity_content_post', 'site_template_post_content_back', 50);
