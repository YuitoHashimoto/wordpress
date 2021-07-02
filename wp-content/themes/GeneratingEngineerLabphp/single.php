
<?php get_header(); ?>

<div id="primary" class="site-content">
		<div id="content" role="main">
    <?php /*--- パンくずリスト --- */ ?>
    <div id="breadcrumb">
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
    <a href="<?php echo home_url(); ?>" itemprop="url">
    <span itemprop="title">TOPページ</span>
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
                <div class="detail-contents-flex">
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
                <section class="share">
                    <h2 class="share__title">この記事をシェアする</h2>
                    <ul class="share__list">
                    <li><a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="nofollow"><img src="<?= esc_url(get_theme_file_uri('images/ico-twitterSmall.svg')) ?>" alt="twitter"></a></li>
                    <li><a href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>"><img src="<?= esc_url(get_theme_file_uri('images/ico-facebook.svg')) ?>" alt="facebook"></a></li>
                    </ul>
                    <div class="addLine">
                        <a href="https://lin.ee/jJupnGB" target="_blank" class="addLine-wrap flex">
                            <p class="addLine-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/line-icon.svg" alt="LINEアイコン">
                            </p>
                            <p class="addLine-text">
                                最新記事のお知らせをLINEで受け取る
                            </p>
                        </a>
                    </div>
                </section>
            </article>
            <?php get_sidebar(); ?>
        </div>

        <section class="tag">
            <div class="tag-contents">
                <h3>人気タグから探す</h3>
                <?php the_tags( '<ul class="tag-list"><li>', '</li><li>', '</li></ul>' ); ?>
            </div>
        </section>
    </main>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>