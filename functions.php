<?php

// ポストにサムネイルを追加する用
add_theme_support('post-thumbnails');

// メニュー用
add_theme_support('menus');

/* titleタグの出力 */
add_theme_support('title-tag');

//　改行の時に自動的にPタグが挿入されるのを防ぐ
remove_filter('the_content', 'wpautop'); 
remove_filter( 'the_excerpt', 'wpautop' );

//JavaScript読み込み
function twpp_enqueue_scripts() {
    wp_enqueue_script( 
      'main-script', 
      get_template_directory_uri() . '/lib/js/main.js',
      array(),
      false,
      true
    );
  }
add_action( 'wp_enqueue_scripts', 'twpp_enqueue_scripts' );

// パンくずリスト用
function mytheme_breadcrumb() {

	//フロントページでは表示しない
	if ( is_front_page() ) return false;
	
	//HOME>と表示
	echo '<li><a href="'.get_bloginfo('url').'" >ホーム</a></li>';
	$sep = '>';
	echo $sep;
 
	//投稿記事ページとカテゴリーページでの、カテゴリーの階層を表示
	$cats = '';
    $cat_id = '';
    
	if ( is_single() ) {
		$cats = get_the_category();
		if( isset($cats[0]->term_id) ) $cat_id = $cats[0]->term_id;
	}
	else if ( is_category() ) {
		$cats = get_queried_object();
		$cat_id = $cats->parent;
    }
    
	$cat_list = array();
	while ($cat_id != 0){
		$cat = get_category( $cat_id );
		$cat_link = get_category_link( $cat_id );
		array_unshift( $cat_list, '<a href="'.$cat_link.'">'.$cat->name.'</a>' );
		$cat_id = $cat->parent;
    }
    
	foreach($cat_list as $value){
		echo '<li>'.$value.'</li>';
		echo $sep;
	}
 
	//現在のページ名を表示
	if ( is_singular() ) {
		if ( is_attachment() ) {
			previous_post_link( '<li>%link</li>' );
			echo $sep;
		}
		the_title( '<li>', '</li>' );
	}
	else if ( is_home() ) echo '<li>ニュース</li>';
	else if ( is_archive() ) the_archive_title( '<li>', '</li>' );
	else if ( is_search() ) echo '<li>検索 : '.get_search_query().'</li>';
	else if ( is_404() ) echo '<li>ページが見つかりません</li>';
}

// フッターのコピーライト用
function get_copyright_date ($then) {
  $now = date('Y');
  if ($then < $now) {
    return $then.'–'.$now;
  } else {
    return $then;
  }
}
