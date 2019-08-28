<?php get_header(); ?>

<div class="container">
	
	<main class="posts-container">
        <div class="search-result">
            <h2><?php the_search_query(); ?>の検索結果 : <?php echo $wp_query->found_posts; ?>件</h2>
        </div>
        <!-- 投稿情報 loop -->
        <?php if(have_posts()) : ?>
            <?php while(have_posts()):the_post() ?> 

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


            <?php endwhile; ?>
        <?php else: ?>
            <div class="search-result-none">
                <p>該当する記事がございません。</p>
            </div>
        <?php endif; ?>

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