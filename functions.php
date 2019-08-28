<?php

// サイドバー追加
register_sidebar(
  array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

// ポストにサムネイルを追加する用
add_theme_support('post-thumbnails');

// メニュー用
add_theme_support('menus');

//JavaScript読み込み
function twpp_enqueue_scripts() {
    wp_enqueue_script( 
      'main-script', 
      get_template_directory_uri() . '/main.js',
      array(),
      false,
      true
    );
  }
  add_action( 'wp_enqueue_scripts', 'twpp_enqueue_scripts' );


class My_Widget_Recent_Posts extends WP_Widget {
 
//   ウィジェット管理画面上に表示させるウィジェット名 
  function My_Widget_Recent_Posts() {
      parent::WP_Widget( false, $name = '最近の投稿 (アイキャッチ画像)' );
  }

  function widget( $args, $instance ) {
      $cache = wp_cache_get( 'widget_recent_posts', 'widget' );

      if ( !is_array( $cache ) ) {
          $cache = array();
      }
      if ( ! isset( $args['widget_id'] ) ) {
          $args['widget_id'] = $this->id;
      }
      if ( isset( $cache[ $args['widget_id'] ] ) ) {
          echo $cache[ $args['widget_id'] ];
          return;
      }

      ob_start();
      extract( $args );

      $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Posts' ) : $instance['title'], $instance, $this->id_base );

      if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) {
          $number = 10;
      }

      $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

      $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );

      if ( $r->have_posts() ) {

?>
          <?php echo $before_widget; ?>

          <!-- ウィジェットの表示部分の処理 -->
          <?php if ( $title ) echo $before_title . $title . $after_title; ?>
          <ul>
          <?php while ( $r->have_posts() ) : $r->the_post(); ?>

              <!-- サムネイル画像の表示 -->
              <ul class="recent-posts">
                <li>
                    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail( null, array( 80, 80 ) ); ?></a>
                </li>
                <li style="margin-left: 10px">
                    <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
                <?php if ( $show_date ) : ?>
                    <br><span class="post-date"><?php echo get_the_date(); ?></span>
                <?php endif; ?>
                </li>
              </ul>

          <?php endwhile; ?>
          </ul>
          <?php echo $after_widget; ?>
<?php
          wp_reset_postdata();

          }

          $cache[ $args['widget_id'] ] = ob_get_flush();
          wp_cache_set( 'widget_recent_posts', $cache, 'widget' );
      }

      function update( $new_instance, $old_instance ) {
          $instance              = $old_instance;
          $instance['title']     = strip_tags($new_instance['title']);
          $instance['number']    = (int) $new_instance['number'];
          $instance['show_date'] = (bool) $new_instance['show_date'];
          $this->flush_widget_cache();

          $alloptions = wp_cache_get( 'alloptions', 'options' );

          if ( isset( $alloptions['widget_recent_entries'] ) ) {
              delete_option( 'widget_recent_entries' );
          }

          return $instance;

      }

      function flush_widget_cache() {
          wp_cache_delete( 'widget_recent_posts', 'widget' );
      }

      /* ウィジェットの設定フォーム */
      function form( $instance ) {
          $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
          $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
          $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;

?>
          <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

          <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
          <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

          <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
          <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>

<?php
      }

}
add_action( 'widgets_init', create_function( '', 'return register_widget( "My_Widget_Recent_Posts" );' ) );

// 次ページ、前ページにアイキャッチを表示
add_filter('next_post_link', 'next_post_link_attributes');
add_filter('previous_post_link', 'prev_post_link_attributes');
 
function next_post_link_attributes($output) {
    $injection = 'class="next-link"';
    return str_replace('<a href=', '<a '.$injection.' href=', $output);
}
function prev_post_link_attributes($output) {
    $injection = 'class="prev-link"';
    return str_replace('<a href=', '<a '.$injection.' href=', $output);
}

// パンくずリスト用
function mytheme_breadcrumb() {

    //HOMEでは表示しない
    // if ( is_home() || is_front_page() ) return false;

	//HOME>と表示
	$sep = '>';
	echo '<li><a href="'.get_bloginfo('url').'" >HOME</a></li>';
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
	else if( is_archive() ) the_archive_title( '<li>', '</li>' );
	else if( is_search() ) echo '<li>検索 : '.get_search_query().'</li>';
	else if( is_404() ) echo '<li>ページが見つかりません</li>';
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
