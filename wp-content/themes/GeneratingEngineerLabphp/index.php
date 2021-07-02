<?php get_header(); ?>
    <main>
        <section class="first-view">
            <div class="first-view-contents">
                <div class="first-view-items flex">
                    <div class="first-view-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="ロゴ">
                    </div>
                    <h2>
                        生み出すエンジニアを<br>
                        目指す人のためのメディア
                    </h2>
                </div>
                <p class="umidasu-buttom">
                    <a href="<?php echo home_url('/umidasu-engineer'); ?>">
                        生み出すエンジニアとは
                    </a>
                </p>
            </div>
        </section>

        <section class="tag">
            <div class="tag-contents">
                <h3>人気タグから探す</h3>
                <ul class="tag-list">
                    <?php
                        $term_list = get_terms('post_tag',Array('orderby' => 'name' ));
                        $term_list = get_terms('post_tag',Array('format' => 'list' ));
                        $term_list = get_terms('post_tag',Array('separator' => '\n' ));
                        $term_list = get_terms('post_tag', Array('order' => 'ASC'));
                        $term_list = get_terms('post_tag', Array('exclude' => 'null'));
                        $term_list = get_terms('post_tag', Array('include' => 'null'));
                        $term_list = get_terms('post_tag', Array('link' => 'view'));
                        $term_list = get_terms('post_tag', Array('taxonomy' => 'post_tag'));
                        $term_list = get_terms('post_tag', Array('number' => 15));
                        $result_list = [];
                        foreach ($term_list as $term) {
                        $u = (get_term_link( $term, 'post_tag' ));
                        echo "<li><a href='".$u."'>".$term->name."</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </section>

        <article class="new-article">
            <div class="new-article-contents">
                <div class="new-article-items01 flex">
                    <div class="new-article-title">
                        <h2>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/new-article-title.svg" alt="最新記事">
                        </h2>
                        <p>
                            生み出すエンジニアLABから最新の情報をお届け！
                        </p>
                    </div>
                    <ul class="postdate">
                        <?php
                            $args = array(
                                'posts_per_page' => 1, // 表示件数の指定
                            );
                            $posts = get_posts( $args );
                            foreach ( $posts as $post ): // ループの開始
                            setup_postdata( $post ); // 記事データの取得
                            ?>
                            <li class="postdate-items blog-list__list-item">
                                    <article class="article-01">
                                        <a href="<?php the_permalink(); ?>" class="article-01-wrap blog-item">
                                            <p class="article-01-category">
                                            <!-- 記事についているカテゴリ名 -->
                                                <span href="" class="article-01-category-text">
                                                <?php $cat = get_the_category(); ?>
                                                <?= $cat_name = $cat[0]->cat_name; ?>
                                                </span>
                                            <!-- 記事についているカテゴリ名 -->
                                            </p>
                                            <p class="article-01-thumbnail blog-item__thumbnail">
                                            <!-- サムネイル -->
                                                <?php if(has_post_thumbnail()): ?>
                                                    <img class="blog-item__thumbnail-image" src="<?php the_post_thumbnail_url('large'); ?>">
                                                <?php endif; ?>
                                                <span>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                                                </span>
                                            <!-- サムネイル -->
                                            </p>
                                        </a>
                                        <!-- タイトル -->
                                        <h4 class="article-01-title blog-item__title"><?php the_title(); ?></h4>
                                        <!-- タイトル -->
                                        <!-- タグ -->
                                        <?php the_tags( '<ul class="article-01-tag"><li>', '</li><li>', '</li></ul>' ); ?>
                                        <!-- タグ -->
                                        <!-- 日付 -->
                                        <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                                        <!-- 日付 -->
                                    </article>
                            </li>
                            <?php
                            endforeach; // ループの終了
                            wp_reset_postdata(); // 直前のクエリを復元する
                        ?>
                    </ul>
                </div>
                <ul class="new-article-items02 flex">
                    <!-- 最新記事の二番目以降の表示 -->
                    <?php
                        $args = array(
                            // 記事を3つ表示
                            'numberposts' => 3,
                            'post_type' => 'カスタム投稿タイプ名',
                            // 2個目以降の指定
                            'offset' => 1,
                            );
                        $posts = get_posts( $args );
                        foreach ( $posts as $post ): // ループの開始
                        setup_postdata( $post ); // 記事データの取得
                        ?>
                        <li class="new-article-items02-wrap blog-list__list-item">
                                <article class="article-02">
                                    <a href="<?php the_permalink(); ?>" class="article-02-wrap blog-item">
                                        <p class="article-02-category">
                                        <!-- 記事についているカテゴリ名 -->
                                            <span href="" class="article-02-category-text">
                                            <?php $cat = get_the_category(); ?>
                                            <?= $cat_name = $cat[0]->cat_name; ?>
                                            </span>
                                        <!-- 記事についているカテゴリ名 -->
                                        </p>
                                        <p class="article-02-thumbnail blog-item__thumbnail">
                                        <!-- サムネイル -->
                                            <?php if(has_post_thumbnail()): ?>
                                                <img class="blog-item__thumbnail-image" src="<?php the_post_thumbnail_url('large'); ?>">
                                            <?php endif; ?>
                                            <span>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                                            </span>
                                        <!-- サムネイル -->
                                        </p>
                                    </a>
                                    <!-- タイトル -->
                                    <h4 class="article-02-title blog-item__title"><?php the_title(); ?></h4>
                                    <!-- タイトル -->
                                    <!-- タグ -->
                                    <?php the_tags( '<ul class="article-02-tag"><li>', '</li><li>', '</li></ul>' ); ?>
                                    <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                                    <!-- タグ -->
                                </article>
                        </li>
                        <?php
                        endforeach; // ループの終了
                        wp_reset_postdata(); // 直前のクエリを復元する
                    ?>
                </ul>
                <div class="new-article-list">
                    <a href="">最新記事の一覧</a>
                </div>
            </div>
        </article>

        <article class="featured-articles">
            <div class="featured-articles-contents">
                <div class="featured-articles-items01 flex">
                    <article class="article-01 featured-articles-pc-tablet">
                    <?php
                        $the_query = new WP_Query( array(
                            'orderby' => 'rand',
                            'posts_per_page' => '1',
                            ) );
                        if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) :
                            $the_query->the_post();
                    ?>
                        <a href="<?php the_permalink(); ?>" class="article-01-wrap blog-item">
                            <p class="article-01-category">
                            <!-- 記事についているカテゴリ名 -->
                                <span href="" class="article-01-category-text">
                                <?php $cat = get_the_category(); ?>
                                <?= $cat_name = $cat[0]->cat_name; ?>
                                </span>
                            <!-- 記事についているカテゴリ名 -->
                            </p>
                            <p class="article-01-thumbnail blog-item__thumbnail">
                            <!-- サムネイル -->
                                <?php if(has_post_thumbnail()): ?>
                                    <img class="blog-item__thumbnail-image" src="<?php the_post_thumbnail_url('large'); ?>">
                                <?php endif; ?>
                                <span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                                </span>
                            <!-- サムネイル -->
                            </p>
                        </a>
                        <!-- タイトル -->
                        <h4 class="article-01-title blog-item__title"><?php the_title(); ?></h4>
                        <!-- タイトル -->
                        <!-- タグ -->
                        <?php the_tags( '<ul class="article-01-tag"><li>', '</li><li>', '</li></ul>' ); ?>
                        <!-- タグ -->
                        <!-- 日付 -->
                        <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                                        <!-- 日付 -->
                    <?php
                    endwhile;
                    else:
                    ?>	
                    <?php
                    endif;
                    ?>
                    </article>
                    <div class="featured-articles-title">
                        <h2>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/featured-articles-title.svg" alt="おすすめ記事">
                        </h2>
                        <p>
                            生み出すエンジニアLABからおすすの記事をご紹介！
                        </p>
                    </div>

                    <?php wp_reset_postdata(); ?>
                    <article class="article-01 featured-articles-mobile">
                    <?php
                        $the_query = new WP_Query( array(
                            'orderby' => 'rand',
                            'posts_per_page' => '1',
                            ) );
                        if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) :
                            $the_query->the_post();
                    ?>
                        <a href="<?php the_permalink(); ?>" class="article-01-wrap blog-item">
                            <p class="article-01-category">
                            <!-- 記事についているカテゴリ名 -->
                                <span href="" class="article-01-category-text">
                                <?php $cat = get_the_category(); ?>
                                <?= $cat_name = $cat[0]->cat_name; ?>
                                </span>
                            <!-- 記事についているカテゴリ名 -->
                            </p>
                            <p class="article-01-thumbnail blog-item__thumbnail">
                            <!-- サムネイル -->
                                <?php if(has_post_thumbnail()): ?>
                                    <img class="blog-item__thumbnail-image" src="<?php the_post_thumbnail_url('large'); ?>">
                                <?php endif; ?>
                                <span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                                </span>
                            <!-- サムネイル -->
                            </p>
                        </a>
                        <!-- タイトル -->
                        <h4 class="article-01-title blog-item__title"><?php the_title(); ?></h4>
                        <!-- タイトル -->
                        <!-- タグ -->
                        <?php the_tags( '<ul class="article-01-tag"><li>', '</li><li>', '</li></ul>' ); ?>
                        <!-- タグ -->
                        <!-- 日付 -->
                        <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                                        <!-- 日付 -->
                    <?php
                    endwhile;
                    else:
                    ?>
                    <?php
                    endif;
                    ?>
                    </article>
                </div>
                <ul class="featured-articles-items02 flex">
                    <?php
                        $the_query = new WP_Query( array(
                            'orderby' => 'rand',
                            'posts_per_page' => '3',
                            ) );
                        if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) :
                        $the_query->the_post();
                    ?>
                    <li class="featured-articles-items02-wrap blog-list__list-item">
                        <article class="article-02">
                        <a href="<?php the_permalink(); ?>" class="article-02-wrap blog-item">
                            <p class="article-02-category">
                            <!-- 記事についているカテゴリ名 -->
                                <span href="" class="article-02-category-text">
                                <?php $cat = get_the_category(); ?>
                                <?= $cat_name = $cat[0]->cat_name; ?>
                                </span>
                            <!-- 記事についているカテゴリ名 -->
                            </p>
                            <p class="article-02-thumbnail blog-item__thumbnail">
                            <!-- サムネイル -->
                                <?php if(has_post_thumbnail()): ?>
                                    <img class="blog-item__thumbnail-image" src="<?php the_post_thumbnail_url('large'); ?>">
                                <?php endif; ?>
                                <span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                                </span>
                            <!-- サムネイル -->
                            </p>
                        </a>
                        <!-- タイトル -->
                        <h4 class="article-02-title blog-item__title"><?php the_title(); ?></h4>
                        <!-- タイトル -->
                        <!-- タグ -->
                        <?php the_tags( '<ul class="article-02-tag"><li>', '</li><li>', '</li></ul>' ); ?>
                        <!-- タグ -->
                        <!-- 日付 -->
                        <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                        <!-- 日付 -->
                        </article>
                    </li>
                    <?php endwhile; else:?>
                    <?php endif;?>
                </ul>
            </div>
        </article>

        <article class="event-articles">
            <div class="event-articles-contents">
                <div class="event-articles-items01 flex">
                    <div class="event-articles-title">
                        <h2>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/event-articles-title.svg" alt="イベント記事">
                        </h2>
                        <p>
                            イベント情報をお届け！気になるイベントがあれば参加しよう！
                        </p>
                    </div>
                    <ul class="postdate">

                    <?php
                        global $post;
                        $tag_slug = 'event'; // タグのスラッグ
                        $tag_posts = get_posts(array(
                        'post_type' => 'post', // 投稿タイプ
                        // 'tag_id' => 1,  // タグIDを番号で指定する場合
                        'tag' => 'event', // タグをスラッグで指定する場合
                        'posts_per_page' => 1, // 表示件数
                        'orderby' => 'date', // 基準になる表示順
                        'order' => 'DESC' // 昇順・降順
                        ));
                        if($tag_posts):
                        foreach($tag_posts as $post):
                        setup_postdata($post);
                    ?>
                        <li class="postdate-items blog-list__list-item">
                                <article class="article-01">
                                    <a href="<?php the_permalink(); ?>" class="article-01-wrap blog-item">
                                        <p class="article-01-category">
                                        <!-- 記事についているカテゴリ名 -->
                                            <span href="" class="article-01-category-text">
                                                <?php $cat = get_the_category(); ?>
                                                <?= $cat_name = $cat[0]->cat_name; ?>
                                            </span>
                                        <!-- 記事についているカテゴリ名 -->
                                        </p>
                                        <p class="article-01-thumbnail blog-item__thumbnail">
                                        <!-- サムネイル -->
                                            <?php if(has_post_thumbnail()): ?>
                                                <img class="blog-item__thumbnail-image" src="<?php the_post_thumbnail_url('large'); ?>">
                                            <?php endif; ?>
                                            <span>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                                            </span>
                                        <!-- サムネイル -->
                                        </p>
                                    </a>
                                    <!-- タイトル -->
                                    <h4 class="article-01-title blog-item__title"><?php the_title(); ?></h4>
                                    <!-- タイトル -->
                                    <!-- タグ -->
                                    <?php the_tags( '<ul class="article-01-tag"><li>', '</li><li>', '</li></ul>' ); ?>
                                    <!-- タグ -->
                                    <!-- 日付 -->
                                    <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                                    <!-- 日付 -->
                                </article>
                        </li>
                        <?php endforeach; endif;
                        // ループ後のリセット処理
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
                <ul class="event-articles-items02 flex">
                    <li class="event-articles-items02-wrap">
                        <article class="article-02">
                            <a href="" class="article-02-wrap">
                                <p class="article-02-category">
                                    <span href="" class="article-02-category-text">
                                        働き方・生き方
                                    </span>
                                </p>
                                <p class="article-02-thumbnail">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail.png" alt="[記事のタイトル]サムネイル">
                                    <span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                                    </span>
                                </p>
                                <h4 class="article-02-title">記事タイトル</h4>
                                <ul class="article-02-tag">
                                    <li><span href="">#イベント</span></li>
                                    <li><span href="">#EnginnerMix</span></li>
                                    <li><span href="">#インタビュー</span></li>
                                    <li><span href="">#EnginnerMix</span></li>
                                </ul>
                                <time datetime="" class="">2021/6/1</time>
                            </a>
                        </article>
                    </li>
                    <li class="event-articles-items02-wrap">
                        <article class="article-02">
                            <a href="" class="article-02-wrap">
                                <p class="article-02-category">
                                    <span href="" class="article-02-category-text">
                                        働き方・生き方
                                    </span>
                                </p>
                                <p class="article-02-thumbnail">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail.png" alt="[記事のタイトル]サムネイル">
                                    <span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                                    </span>
                                </p>
                                <h4 class="article-02-title">記事タイトル</h4>
                                <ul class="article-02-tag">
                                    <li><span href="">#イベント</span></li>
                                    <li><span href="">#EnginnerMix</span></li>
                                    <li><span href="">#インタビュー</span></li>
                                    <li><span href="">#EnginnerMix</span></li>
                                </ul>
                                <time datetime="" class="">2021/6/1</time>
                            </a>
                        </article>
                    </li>
                    <li class="event-articles-items02-wrap">
                        <article class="article-02">
                            <a href="" class="article-02-wrap">
                                <p class="article-02-category">
                                    <span href="" class="article-02-category-text">
                                        働き方・生き方
                                    </span>
                                </p>
                                <p class="article-02-thumbnail">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail.png" alt="[記事のタイトル]サムネイル">
                                    <span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                                    </span>
                                </p>
                                <h4 class="article-02-title">記事タイトル</h4>
                                <ul class="article-02-tag">
                                    <li><span href="">#イベント</span></li>
                                    <li><span href="">#EnginnerMix</span></li>
                                    <li><span href="">#インタビュー</span></li>
                                    <li><span href="">#EnginnerMix</span></li>
                                </ul>
                                <time datetime="" class="">2021/6/1</time>
                            </a>
                        </article>
                    </li>
                </ul>
                <div class="event-articles-list">
                    <a href="">イベント一覧へ</a>
                </div>
            </div>
        </article>

        <aside class="top-business-banner">
            <div class="top-business-banner-wrap">
                <ul>
                    <li>
                        <a href="">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/banner.png" alt="バナー">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/banner.png" alt="バナー">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/banner.png" alt="バナー">
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

    </main>
<?php get_footer(); ?>