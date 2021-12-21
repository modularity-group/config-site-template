<?php do_action('modularity_document_start'); do_action('get_header'); ?>
<!doctype html><?php do_action('modularity_doctype_start'); ?>
<html <?php language_attributes(); ?>>
<head>
  <?php do_action('modularity_head_start'); ?>
  <meta charset="<?php bloginfo('charset'); ?>">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title><?php wp_title(' | ', true, 'right'); ?></title>
  <?php do_action('modularity_head_after_title'); ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <?php wp_head(); ?>
  <?php do_action('modularity_head_end'); ?>
</head>
<body <?php body_class(!is_front_page() ? 'not-home' : ''); ?>>
  <?php wp_body_open(); ?>
  <?php do_action('modularity_body_start'); ?>
  <?php do_action('modularity_template_header'); ?>

  <main class="post">
    <article class="site-layout-container">
      <?php do_action('modularity_content_before'); ?>
      <?php
        if (is_front_page() && is_home()) {
          do_action('modularity_template_blog');
        }
        elseif (is_front_page()) {
          do_action('modularity_template_home');
        }
        elseif (is_home()) {
          do_action('modularity_template_blog');
        }
        elseif (is_404()) {
          do_action('modularity_template_404');
        }
        elseif (is_search()) {
          do_action('modularity_template_search');
        }
        elseif (is_author()) {
          do_action('modularity_template_author');
        }
        elseif (is_singular('page')) {
          do_action('modularity_template_page');
        }
        elseif (is_singular('post')) {
          if (have_posts()): while (have_posts()): the_post();
            do_action('modularity_content_post');
          endwhile; endif;
        }
        elseif (is_post_type_archive('post') || is_archive()) {
          do_action('modularity_template_archive');
        }
        elseif (is_date()) {
          do_action('modularity_template_date');
        }
        else {
          do_action('modularity_template_other');
        }
      ?>
      <?php do_action('modularity_content_after'); ?>
    </article>
  </main>

  <?php

  do_action('modularity_template_footer');

  do_action('get_footer');

  wp_footer();

  do_action('modularity_body_end');

  ?>
  </body>
</html><?php do_action('modularity_document_end');
