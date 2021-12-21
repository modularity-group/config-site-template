
<main class="page search">
  <article class="site-layout-container">
    <?php do_action('modularity_content_before'); ?>
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
    <?php do_action('modularity_content_after'); ?>
  </article>
</main>
