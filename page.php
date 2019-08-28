<?php get_header(); ?>

	<div class="container">
		
		<div class="bread-nav">
			<?php mytheme_breadcrumb(); ?>
		</div>

		<main class="single-container">

			<?php
			if (have_posts()) :
				while (have_posts()) :
					the_post();
			?>

			<section class="single">
				<div class="single-img">
					<?php if (has_post_thumbnail()) : ?>
					<?php the_post_thumbnail(true); ?>
					<?php else: ?>
					<?php endif; ?>
				</div>
				<h2 class="single-title"><?php the_title(); ?></h2>
				<div class="single-text">
					<?php the_content(); ?>
				</div>
			</section>

			<?php
				endwhile;
			else:
			?>

			<p>ページはありません！</p>

			<?php
			endif;
			?>

        </main>	
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>