<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="http://whitethings.wp.xdomain.jp/wp-content/uploads/2019/08/favicon2.ico">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
	<header>
		<div class="header-top">
			<?php if ( is_home() || is_front_page() ) : ?>
				<h1 class="header-title">
					<a class="header-main-title" href="<?php echo home_url('/'); ?>">White Things</a>
				</h1>
			<?php else : ?>
				<p class="header-title">
					<a class="header-main-title" href="<?php echo home_url('/'); ?>">White Things</a>
				</p>	
			<?php endif; ?>
			<p class="header-subtitle">白い暮らしのつくりかた</p>
		</div>
		<div class="header-sp-menu">
			<ul class="sp-menu">
				<span class="line1"></span>
				<span class="line2"></span>
				<span class="line3"></span>
			</ul>
		</div>
		<nav class="gnav">
			<?php get_search_form(); ?>
			<p class="sp-menu-cat">【 カテゴリー 】</p>
			<?php wp_nav_menu(); ?>
			<ul class="social-icons">
				<li class="icon"><a href="//twitter.com/share?text=<?=$share_title?>&url=<?=$share_url?>" title="Twitterでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;"><i class="fab fa-twitter"></i></a></li>
				<li class="icon"><a href="//www.facebook.com/sharer.php?src=bm&u=<?=$share_url?>&t=<?=$share_title?>" title="Facebookでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=600');return false;"><i class="fab fa-facebook-f"></i></a></li>
			</ul>
		</nav>
	</header>