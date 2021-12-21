
<main class="page">
  <article class="site-layout-container">
    <?php do_action('modularity_content_before'); ?>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
    <?php do_action('modularity_content_after'); ?>
  </article>
</main>
