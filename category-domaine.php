<?php get_header(); ?>
    <!-- Section Domaines -->
    <section class="domaines background-gray">
        <div class="container">
            <h1>Nos domaines d'activités</h1>
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
                    <article class="domaine-card" onclick="window.location.href='<?php the_permalink(); ?>'">  
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="image-container">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="domaine-content">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
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