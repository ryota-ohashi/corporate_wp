<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php if( has_excerpt() ) {
	  echo get_the_excerpt();
	} else {
	  bloginfo('description');
	} ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Noto+Sans+JP&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>

<body>
	<header class="header">

		<div class="header__top">
			<!-- ブログページではサイト名をpタグに -->
			<?php if ( is_page('35') ) : ?>
				<p><a class="header__top__title" href="<?php echo home_url('/'); ?>"><?php bloginfo('name') ?></a></p>
			<?php else : ?>
				<h1><a class="header__top__title" href="<?php echo home_url('/'); ?>"><?php bloginfo('name') ?></a></h1>	
			<?php endif; ?>
		</div>

		<nav class="header__gnav">
			<?php wp_nav_menu(); ?>
		</nav>

		<div class="header__spmenu">
			<span class="header__spmenu__line line1"></span>
			<span class="header__spmenu__line line2"></span>
			<span class="header__spmenu__line line3"></span>
		</div>

	</header>
	<div class="bread-nav">
		<?php mytheme_breadcrumb(); ?>
	</div>