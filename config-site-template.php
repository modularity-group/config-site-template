<?php defined("ABSPATH") or die;

add_action("modularity", function(){
  require_once "config-site-template.template.php";
});

function config_base_template_header() {
  require_once "templates/template.header.php";
}
add_action("modularity_template_header", "config_base_template_header");

function config_base_template_footer() {
  require_once "templates/template.footer.php";
}
add_action("modularity_template_footer", "config_base_template_footer");

function config_base_template_content() {
  require_once "templates/template.content.php";
}
add_action("modularity_template_home", "config_base_template_content");
add_action("modularity_template_page", "config_base_template_content");

function config_base_template_blog() {
  require_once "templates/template.blog.php";
}
add_action("modularity_template_blog", "config_base_template_blog");
add_action("modularity_template_archive", "config_base_template_blog");

// function config_base_template_post() {
//   require_once "templates/template.post.php";
// }
// add_action("modularity_template_post", "config_base_template_post");

function config_base_template_search() {
  require_once "templates/template.search.php";
}
add_action("modularity_template_search", "config_base_template_search");

function config_base_template_404() {
  require_once "templates/template.404.php";
}
add_action("modularity_template_404", "config_base_template_404");

function config_base_template_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  $title .= get_bloginfo( 'name' );

  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  if ( $paged >= 2 || $page >= 2 )
    $title = "$title $sep " . sprintf( __( 'Page %s', 'modularity' ), max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'config_base_template_title', 10, 2 );


add_filter('excerpt_more', function($more) {
  return '';
});

add_filter('excerpt_length', function($length) {
  return 27;
}, 9999);

add_action('widgets_init', function(){
  register_sidebar(array(
    'name' => 'Footer',
    'id' => 'footer',
    'description' => '',
    'before_widget' => '<div class="footer__widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ));
});

/*
 * Post Content Template Actions
*/

function site_template_post_content_title() {
  ?><h1><?php the_title(); ?></h1><?php
}
add_action('modularity_content_post', 'site_template_post_content_title', 10);

function site_template_post_content_meta() {
  ?>
    <p class="post__meta">
      <small class="author"><?php the_author(); ?></small>
      <small class="separator">, </small>
      <small class="date"><?php the_date(); ?></small>
    </p>
  <?php
}
add_action('modularity_content_post', 'site_template_post_content_meta', 20);

function site_template_post_content_image() {
  ?>
    <div class="post__image">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail(); ?>
      <?php endif; ?>
    </div>
  <?php
}
add_action('modularity_content_post', 'site_template_post_content_image', 30);

function site_template_post_content_content() {
  ?>
    <div class="post__content">
      <?php the_content(); ?>
    </div>
  <?php
}
add_action('modularity_content_post', 'site_template_post_content_content', 40);

function site_template_post_content_back() {
  ?>
    <p class="post__back">
      <a href="/<?= get_category(wp_get_post_categories(get_the_ID())[0])->slug; ?>">←</a>
    </p>
  <?php
}
add_action('modularity_content_post', 'site_template_post_content_back', 50);


