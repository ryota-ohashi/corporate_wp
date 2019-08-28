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

				<?php
				$share_url   = get_permalink();
				$share_title = get_the_title();
				?>
				<div class="single-meta">
					<p class="single-category"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
					<p class="single-date"><?php echo get_the_date(); ?></p>
				</div>
				<h1 class="single-title"><?php the_title(); ?></h1>
				<div class="single-text">
					<?php the_content(); ?>
				</div>
				<ul class="social-icons">
					<li class="icon"><a href="//twitter.com/share?text=<?=$share_title?>&url=<?=$share_url?>" title="Twitterでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;"><i class="fab fa-twitter"> Twitterでシェア</i></a></li>
					<li class="icon"><a href="//www.facebook.com/sharer.php?src=bm&u=<?=$share_url?>&t=<?=$share_title?>" title="Facebookでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=600');return false;"><i class="fab fa-facebook-f"> Facebookでシェア</i></a></li>
				</ul>
			</section>

			<?php
				endwhile;
			else:
			?>

			<p>記事はありません！</p>

			<?php
			endif;
			?>

			<?php
			$prevPost = get_adjacent_post(false, '', true); // 前の記事を取得
			$nextPost = get_adjacent_post(false, '', false); // 次の記事を取得
			$prevThumbnail = get_the_post_thumbnail($prevPost->ID, array(120,120) ); // 前の記事のサムネイル画像を取得
			$nextThumbnail = get_the_post_thumbnail($nextPost->ID, array(120,120) ); // 次の記事のサムネイル画像を取得
			
			if( $prevPost || $nextPost ){ // 前の記事か次の記事のどちらかが存在しているなら
				echo '<div class="prev-next-link">';
				previous_post_link( '%link', '<p class="prev-label">前の記事</p><div class="thumb-wrap">'.$prevThumbnail.'<p>%title</p></div>', false );
				next_post_link( '%link', '<p class="next-label">次の記事</p><div class="thumb-wrap">'.$nextThumbnail.'<p>%title</p></div>', false );
				echo '</div>';
			} 
			?>
        </main>	
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>