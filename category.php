<?php get_header(); ?>
    <!-- Section realisations -->
    <section class="realisations background-gray">
        <div class="container">
            <?php
            // Obtenir la catégorie courante
            $category = get_queried_object();
            
            // Définir le titre en fonction de la catégorie
            $titles = array(
                'menuiserie' => 'Nos menuiseries',
                'charpente' => 'Nos charpentes',
                'realisation' => 'Nos réalisations'
            );
            
            $title = isset($titles[$category->slug]) ? $titles[$category->slug] : 'Nos ' . $category->name;
            ?>
            <h1><?php echo $title; ?></h1>
            <div class="realisations-grid">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                ?>
                    <a href="<?php the_permalink(); ?>">
                        <article class="domaine-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="image-container">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="domaine-content">
                            <h3><?php the_title(); ?></h3>
                        </div>
                        </article>
                    </a>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?> 