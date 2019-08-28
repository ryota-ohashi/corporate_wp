<?php get_header(); ?>

<div class="container">
	<div class="bread-nav">
		<?php mytheme_breadcrumb(); ?>
	</div>
	<?php
		$pickup = array(
			'meta_query' => array(
				array(	'key'=>'pickup',
					'value'=>'1'
				)
			)
		);
		$pickup_query = new WP_Query($pickup);
	?>

	<?php while ( $pickup_query->have_posts() ) : $pickup_query->the_post(); ?>
		<div class="pickup-post-img" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)">
			<a href="<?php the_permalink(); ?>" class="pickup-post">
				<h2 class="pickup-post-title"><?php the_title(); ?></h2>
			</a>
		</div>

	<?php endwhile; // end of the loop. ?>
	<?php wp_reset_postdata(); ?>

	<main class="posts-container">

		<?php
		if (have_posts()) :
			while (have_posts()) :
				the_post();
		?>

		<a href="<?php the_permalink(); ?>" class="post">
			
			<div class="post-img">
				<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail(true); ?>
				<?php else: ?>
				<?php endif; ?>
			</div>
			<div class="post-meta">
				<p class="post-category"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
				<p class="post-date"><?php echo get_the_date(); ?></p>
			</div>
			<h2 class="post-title"><?php the_title(); ?></h2>
		</a>
		

		<?php
			endwhile;
		else:
		?>

		<p>記事はありません！</p>

		<?php
		endif;
		?>

</main>
<?php get_sidebar(); ?>
</div>
<div class="posts-nav">
	<div class="pnav"><?php the_posts_pagination( array(
		'mid_size' => 10,
		'screen_reader_text' => ' ',
	)); ?></div>
</div>
<?php get_footer(); ?>