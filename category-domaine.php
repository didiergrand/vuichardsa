<?php get_header(); ?>
    <!-- Section Domaines -->
    <section class="domaines background-gray">
        <div class="container">
            <h2>Nos domaines d'activités</h2>
            <div class="domaines-grid">
                <?php
                $domaines = new WP_Query(array(
                    'post_type' => 'post',
                    'category_name' => 'domaine',
                    'posts_per_page' => 6
                ));

                if ($domaines->have_posts()) :
                    while ($domaines->have_posts()) : $domaines->the_post();
                ?>
                    <article class="domaine-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="image-container">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="domaine-content">
                        <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite</a>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>