<?php get_header(); ?>

<div class="container">
<main class="news">
		<div class="news__top">
			<h2 class="news__top__title">ニュース</h2>
		</div>

	<?php if( is_category() ): ?>
		<h3 class="news__cat"><?php single_cat_title(); ?></h3>
	<?php endif; ?>

		<?php
		if (have_posts()) : 
		?>
			<ul class="news__list">
			<?php 
				while (have_posts()) : the_post();
			?>
				<li class="news__list__item">				
					<time class="news__list__item__post-date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?></time>
					<?php the_category(''); ?>
					<a href="<?php the_permalink(); ?>" class="news__list__item__post"><?php the_title(); ?></a>				
				</li>
			<?php
				endwhile;
			?>
			</ul>
		<?php
		else:
		?>

		<p>お知らせはありません。</p>

		<?php
		endif;
		?>

		<div class="news__nav">
			<div class="pnav"><?php the_posts_pagination( array(
				'mid_size' => 7,
				'screen_reader_text' => ' ',
			)); ?></div>
		</div>

	</main>
</div>
<div class="posts-nav">
	<div class="pnav"><?php the_posts_pagination( array(
		'mid_size' => 10,
		'screen_reader_text' => ' ',
	)); ?></div>
</div>
<?php get_footer(); ?>