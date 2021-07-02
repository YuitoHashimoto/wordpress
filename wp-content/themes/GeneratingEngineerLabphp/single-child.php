
<?php get_header(); ?>

<div id="primary" class="site-content">
		<div id="content" role="main">
    <?php /*--- パンくずリスト --- */ ?>
    <div id="breadcrumb">
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
    <a href="<?php echo home_url(); ?>" itemprop="url">
    <span itemprop="title">ホーム</span>
    </a> ›
    </div>
    <?php /*--- カテゴリーが階層化している場合に対応させる --- */ ?>
    <?php $postcat = get_the_category(); ?>
    <?php $catid = $postcat[0]->cat_ID; ?>
    <?php $allcats = array($catid); ?>
    <?php 
    while(!$catid==0) {    /* すべてのカテゴリーIDを取得し配列にセットするループ */
        $mycat = get_category($catid);     /* カテゴリーIDをセット */
        $catid = $mycat->parent;     /* 上で取得したカテゴリーIDの親カテゴリーをセット */
        array_push($allcats, $catid);
    }
    array_pop($allcats);
    $allcats = array_reverse($allcats);
    ?>
    <?php /*--- 親カテゴリーがある場合は表示させる --- */ ?>
    <?php foreach($allcats as $catid): ?>
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
    <a href="<?php echo get_category_link($catid); ?>" itemprop="url">
    <span itemprop="title"><?php echo get_cat_name($catid); ?></span>
    </a> ›
    </div>
    <?php endforeach; ?>
    <div><?php the_title(); ?></div>
    </div>    <!--- end [breadcrumb] -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <main class="single-background">
        <div class="box-contents flex">
            <article class="detail-contents">
                <div class="flex">
                    <div>
                        <!-- 記事についているカテゴリ名 -->
                        <p class="detail-category">
                            <span href="" class="detail-category-text">
                                <?php $cat = get_the_category(); ?>
                                <?= $cat_name = $cat[0]->cat_name; ?>
                            </span>
                        </p>
                        <!-- 記事についているカテゴリ名 -->
                        <!-- 日付 -->
                        <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                        <!-- 日付 -->
                    </div>
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                    </p>
                </div>
                <!-- タイトル -->
                <h2 class="article-list-title blog-item__title"><?php the_title(); ?></h2>
                <!-- タイトル -->
                <!-- タグ -->
                <?php the_tags( '<ul class="detail-list-tag"><li>', '</li><li>', '</li></ul>' ); ?>
                <!-- タグ -->
                <!-- サムネイル -->
                <p class="detail-thumbnail">
                <?php if(has_post_thumbnail()): ?>
                    <img class="blog-item__thumbnail-image" src="<?php the_post_thumbnail_url('large'); ?>">
                <?php endif; ?>
                </p>
                <!-- サムネイル -->
                <!-- ここに本文が入るphpを入れる -->
                <div class="blog-detail__body">
                <div class="blog-content"><?php echo the_content(); ?></div>
                </div>
            </article>
            <?php get_sidebar(); ?>
        </div>

        <section class="share">
            <h2 class="share__title">Share on</h2>
            <ul class="share__list">
              <li><a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="nofollow"><img src="<?= esc_url(get_theme_file_uri('img/ico-twitterSmall.svg')) ?>" alt="twitter"></a></li>
              <li><a href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>"><img src="<?= esc_url(get_theme_file_uri('img/ico-facebook.svg')) ?>" alt="facebook"></a></li>
              <li><a href="https://b.hatena.ne.jp/entry/<?php the_permalink(); ?>"><img src="<?= esc_url(get_theme_file_uri('img/ico-hatena.svg')) ?>" alt="hatena"></a></li>
            </ul>
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
    </main>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>