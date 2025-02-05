<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package J.Vuichard_SA
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>
		</div>

		<?php
		// Vérifier si le post actuel est dans la catégorie 'menuiserie'
		if (has_category('domaine')) :
			// Récupérer les autres posts de la même catégorie, en excluant le post actuel
			$related_posts = new WP_Query(array(
				'post_type' => 'post',
				'category_name' => get_post_field('post_name', get_the_ID()),
				'posts_per_page' => 6,
				'post__not_in' => array(get_the_ID()) // Exclure le post actuel
			));

			if ($related_posts->have_posts()) : ?>
				<section class="realisations background-gray">
					<div class="container">
						<h2>Réalisations en <?php echo get_post_field('post_name', get_the_ID()); ?></h2>
						<div class="realisations-grid">
							<?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="read-more"><article class="domaine-card">
									<?php if (has_post_thumbnail()) : ?>
										<div class="image-container">
											<?php the_post_thumbnail('large'); ?>
										</div>
									<?php endif; ?>
									<div class="domaine-content">
										<h3><?php the_title(); ?></h3>									</div>
									</article>
								</a>
							<?php endwhile; ?>
						</div>
					</div>
				</section>
				<?php
				wp_reset_postdata();
			endif;
		endif;
		?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
