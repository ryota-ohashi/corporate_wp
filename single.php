<?php get_header(); ?>

	<div class="container">

		<main class="single">

			<div class="single__top">
				<h2 class="single__top__title">ニュース</h2>
			</div>

			<?php
			if (have_posts()) :
				while (have_posts()) :
					the_post();
			?>

			<section class="single__article">

				<?php
				$share_url   = get_permalink();
				$share_title = get_the_title();
				?>
				<div class="single__article__meta">
					<p class="single__article__meta__category"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
					<p class="single__article__meta__date"><?php echo get_the_date(); ?></p>
				</div>
				<h1 class="single__article__title"><?php the_title(); ?></h1>
				<div class="single__article__text">
					<?php the_content(); ?>
				</div>
				<ul class="single__article__social">
					<li class="single__article__social__icon"><a href="//twitter.com/share?text=<?=$share_title?>&url=<?=$share_url?>" title="Twitterでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;"><i class="fab fa-twitter"></i></a></li>
					<li class="single__article__social__icon"><a href="//www.facebook.com/sharer.php?src=bm&u=<?=$share_url?>&t=<?=$share_title?>" title="Facebookでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=600');return false;"><i class="fab fa-facebook-f"></i></a></li>
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
				echo '<div class="single__link">';
				previous_post_link( '%link', '<p class="single__link__prev-label">前の記事</p><div class="thumb-wrap">'.$prevThumbnail.'<p class="prev-title">%title</p></div>', false );
				next_post_link( '%link', '<p class="single__link__next-label">次の記事</p><div class="thumb-wrap">'.$nextThumbnail.'<p class="next-title">%title</p></div>', false );
				echo '</div>';
			} 
			?>
		</main>	
	</div>
<?php get_footer(); ?>