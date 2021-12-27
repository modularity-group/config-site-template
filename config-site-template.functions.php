<?php defined("ABSPATH") or die;

function site_template_is_page() {
  global $post;
  return get_post_type($post) === 'page' || (is_front_page() && !is_home());
}

function site_template_is_blog() {
  global $post;
  return get_post_type($post) === 'post' && (is_home() || is_archive() || is_single());
}

function site_template_title($title, $sep) {
  global $paged, $page;
  if (is_feed()) return $title;
  $title.= get_bloginfo('name');
  $description = get_bloginfo('description', 'display');
  if ($description && (is_home() || is_front_page())) {
    $title = "$title $sep $description";
  }
  if ($paged >= 2 || $page >= 2) {
    $title = "$title $sep " . sprintf(__('Page %s'), max($paged, $page));
  }
  return $title;
}

function site_template_header() {
  ?>
    <header class="header">
      <div class="site-layout-container">
        <figure>
          <a href="<?= get_bloginfo('url'); ?>"><?= get_bloginfo("name"); ?></a>
        </figure>
      </div>
    </header>
  <?php
}

function site_template_footer() {
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

function site_template_footer_sidebar_register(){
  register_sidebar(array(
    'name' => 'Footer',
    'id' => 'footer',
    'description' => '',
    'before_widget' => '<div class="footer__widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ));
}

function site_template_content_page() {
  if (site_template_is_page() && have_posts()) {
    while (have_posts()) {
      the_post();
      the_content();
    }
  }
}

function site_template_content_error() {
  if (is_404()) {
    echo '<h1>' . __('Page not found.') . '</h1>';
  }
}

function site_template_content_search() {
  if (is_search()) {
    $query = new WP_Query(array('s' => get_search_query()));
    if ($query->have_posts()): ?>
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
      <p><?= __('Nothing found.'); ?></p>
    <?php endif;
  }
}

function site_template_content_posts() {
  if (site_template_is_blog() && !is_single() && have_posts()) {
    while (have_posts()) {
      the_post();
      ?>
        <div class="posts">
          <?php do_action('modularity_content_post') ?>
        </div>
      <?php
    }
  }
}

function site_template_content_post() {
  if (site_template_is_blog() && is_single() && have_posts()) {
    while (have_posts()) {
      the_post();
      do_action('modularity_content_post');
    }
  }
}

function site_template_post_content_title() {
  if (!is_single()):
    ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php
  else:
    ?><h1><?php the_title(); ?></h1><?php
  endif;
}

function site_template_post_content_meta() {
  ?>
    <p class="post__meta">
      <small class="author"><?php the_author(); ?></small><small class="separator">, </small><small class="date"><?php the_date(); ?></small>
    </p>
  <?php
}

function site_template_post_content_image() {
  if (!is_single()):
    ?>
      <div class="post__image">
        <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail(); ?>
        <?php endif; ?>
      </div>
    <?php
  endif;
}

function site_template_post_content_content() {
  if (!is_single()):
    ?>
      <div class="post__content">
        <?php the_content(); ?>
      </div>
    <?php
  else:
    the_content();
  endif;
}

function site_template_post_content_back() {
  if (is_single()):
    ?>
      <p class="post__back">
        <a href="/<?= get_category(wp_get_post_categories(get_the_ID())[0])->slug; ?>">←</a>
      </p>
    <?php
  endif;
}
