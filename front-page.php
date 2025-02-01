<?php get_header(); ?>
<main id="primary" class="site-main">
    <!-- Hero Banner Section -->
    <section class="hero-banner">
        <?php if (get_header_image()) : ?>
            <img src="<?php echo esc_url(get_header_image()); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
        <?php endif; ?>
    </section>

    <!-- Section Actualités -->
    <?php
    $actualites = new WP_Query(array(
        'post_type' => 'post',
        'category_name' => 'actualite',
        'posts_per_page' => 3
    ));

    if ($actualites->have_posts()) : ?>
    <section class="actualites">
        <div class="container">
            <h2>Actualités</h2>
            <?php
            while ($actualites->have_posts()) : $actualites->the_post();
            ?>
                <article class="actualite-item">
                    <div class="actualite-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="actualite-content">
                        <h3><?php the_title(); ?></h3>
                        <?php the_content(); ?>
                        <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite</a>
                    </div>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- Section Domaines -->
    <section class="domaines">
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
                        <h3><?php the_title(); ?></h3>
                        <div class="domaine-content">
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

    <!-- Section Réalisations -->
    <section class="realisations">
        <div class="container">
            <h2>Nos Réalisations</h2>
            <div class="realisations-grid">
                <?php
                $realisations = new WP_Query(array(
                    'post_type' => 'post',
                    'category_name' => 'realisation',
                    'posts_per_page' => 16
                ));

                if ($realisations->have_posts()) :
                    while ($realisations->have_posts()) : $realisations->the_post();
                ?>
                    <article class="realisation-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="realisation-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
