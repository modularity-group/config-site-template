<?php defined("ABSPATH") or die;

add_action("modularity", function(){
  require_once "config-site-template.template.php";
});

function config_base_template_header() {
  ?>
    <header class="header">
      <div class="site-layout-container">
        <figure>
          <a href="<?= get_bloginfo('url'); ?>"><?= get_bloginfo("name"); ?></a>
        </figure>
      </div>
    </header><footer class="footer">
      <div class="site-layout-container">
        <?php if (is_active_sidebar('footer')): ?>
          <div class="footer__widgets">
            <?php dynamic_sidebar('footer'); ?>
          </div>
        <?php endif; ?>
      </div>
    </footer>

  <?php
}
add_action("modularity_template_header", "config_base_template_header");

function config_base_template_footer() {
  ?>
    <footer class="footer">
      <div class="site-layout-container">
        <?php if (is_active_sidebar('footer')): ?>
          <div class="footer__widgets">
            <?php dynamic_sidebar('footer'); ?>
          </div>
        <?php endif; ?>
      </div>
    </footer>
  <?php
}
add_action("modularity_template_footer", "config_base_template_footer");

function config_site_template_content_search() {
  ?>
    <?php $query = new WP_Query(array('s' => get_search_query())); ?>
    <?php if ($query->have_posts()): ?>
      <div class="search__results">
        <ul>
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <span><?php the_excerpt(); ?></span>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    <?php else : ?>
      <p><?php _e('Dazu gab es leider keine Treffer.'); ?></p>
    <?php endif; ?>
  <?php
}
add_action("modularity_content_search", "config_site_template_content_search");

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


