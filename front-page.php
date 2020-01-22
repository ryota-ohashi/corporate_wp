<?php get_header(); ?>

<?php $img = "wp-content/themes/saishin_corporate/lib/img"?>

<div class="container">

    <div class="front__bg">
        <img src="<?php echo $img ?>/Saishin_loading_logo.jpg" alt="" class="front__bg__title">
    </div>

    <div class="front__top">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="<?php echo $img ?>/saishin_front_top_fade.jpg" alt="スーツの男"></div>
                <div class="swiper-slide"><img src="<?php echo $img ?>/saishin_front_top_fade2.jpg" alt="ビル"></div>
                <div class="swiper-slide"><img src="<?php echo $img ?>/saishin_front_top_fade3.jpg" alt="オフィスの机"></div>
            </div>
        </div>
        <h2 class="front__top__catchcopy">we<br>can reach<br>the ideal future.</h2>
    </div>

    <main class="contents">

        <section class="contents__news">
            <h2 class="contents__news__title">お知らせ</h2>
            <ul>
            <?php
                $args = array(
                    'posts_per_page' => 5 // 表示件数の指定
                );
                $posts = get_posts( $args );
                foreach ( $posts as $post ): // ループの開始
                setup_postdata( $post ); // 記事データの取得
                ?>
                <li class="contents__news__list">
                    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?></time>
					<?php the_category(''); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
                <?php
                endforeach; // ループの終了
                wp_reset_postdata(); // 直前のクエリを復元する
                ?>
            </ul>
            <a href="news" class="contents__news__link">NEWS ALL ≫</a>
            
        </section>

        <section class="contents__service">
            <h2 class="contents__service__title fade__in__out">サービス</h2>
            <p class="contents__service__subtitle fade__in__out">Saishinでは、最先端技術をお手軽に活用していただくための<br class="return">サービスを展開しています。</p>
            <ul class="contents__service__list">
                <li class="contents__service__list__item fade__in__out">
                    <img src="<?php echo $img ?>/saishin_it_solution_front.png" alt="パソコンにコードが書かれている">
                    <h3 class="contents__service__list__item__title">ITソリューション</h3>
                    <p class="contents__service__list__item__text">自社が抱える最先端のIT技術を櫛して問題解決へと導きます。</p>
                </li>
                <li class="contents__service__list__item fade__in__out">
                    <img src="<?php echo $img ?>/saishin_cons2_front.png" alt="机の上に資料を広げている">
                    <h3 class="contents__service__list__item__title">コンサルタント</h3>
                    <p class="contents__service__list__item__text">お客様の抱える問題に対して最適な提案を致します。</p>
                </li>
                <li class="contents__service__list__item fade__in__out">
                    <img src="<?php echo $img ?>/saishin_marke_front.png" alt="パソコン">
                    <h3 class="contents__service__list__item__title">マーケティング</h3>
                    <p class="contents__service__list__item__text">得意とする解析を軸に、効果的な広告やコンテンツマーケティングを行います。</p>
                </li>
                <li class="contents__service__list__item fade__in__out">
                    <img src="<?php echo $img ?>/saishin_web_front.png" alt="webサイトのフレーム">
                    <h3 class="contents__service__list__item__title">WEB構築</h3>
                    <p class="contents__service__list__item__text">WEBサイト制作からアプリ構築まで、お客様の要望を実現いたします。</p>
                </li>
            </ul>
            <a href="service" class="contents__service__link fade__in__out">READ MORE ≫</a>

        </section>
        <section class="contents__contact fade__in__out">
            <h2 class="contents__contact__title">お問い合わせ</h2>
            <p class="contents__contact__text">迷ったらまずお問い合わせ下さい。<br>お問い合わせ頂いた後、<br>営業日3日以内にご連絡させて頂きます。</p>
            <a href="contact" class="contents__contact__link">READ MORE <span>≫</span></a>
        </section>

    </main>
    
</div>


<?php get_footer(); ?>