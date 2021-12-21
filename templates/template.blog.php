
<main class="page">
  <article class="site-layout-container">
    <?php do_action('modularity_content_before'); ?>
    <div class="posts">
      <?php if (have_posts()): while (have_posts()): the_post(); ?>

        <div class="post">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

          <p class="post__meta">
            <small class="author"><?php the_author(); ?></small>
            <small class="separator">, </small>
            <small class="date"><?= get_the_date(); ?></small>
          </p>

          <div class="post__excerpt">
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>">...</a>
          </div>
        </div>

      <?php endwhile; endif; ?>
    </div>
    <?php do_action('modularity_content_after'); ?>
  </article>
</main>
