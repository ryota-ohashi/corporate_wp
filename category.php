<?php get_header(); ?>

<div class="container">
	<div class="bread-nav">
		<?php mytheme_breadcrumb(); ?>
	</div>
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