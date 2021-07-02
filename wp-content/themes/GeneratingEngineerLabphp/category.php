<?php get_header(); ?>
<?php /*--- パンくずリスト --- */ ?>
      <div id="breadcrumb">
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="<?php echo home_url(); ?>" itemprop="url">
            <span span itemprop="title">TOPページ</span>
          </a> >
        </div>
        <?php /*--- カテゴリーが階層化している場合に対応させる --- */ ?>
        <?php $catid = $cat; /* 表示中のカテゴリーIDをセット */ ?>
        <?php $allcats = array(); /* 親カテゴリーをセットする配列を初期化しておく */ ?>
        <?php 
        while(!$catid==0) {    /* すべてのカテゴリーIDを取得し配列にセットするループ */
            $mycat = get_category($catid);     /* カテゴリーIDをセット */
            $catid = $mycat->parent;     /* 上で取得したカテゴリーIDの親カテゴリーをセット */
            array_push($allcats, $catid);
        }
        array_pop($allcats);
        $allcats = array_reverse($allcats);
        ?>
      <?php /*--- 親タグがある場合は表示させる --- */ ?>
      <?php foreach($allcats as $catid): ?>
      <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
      <a href="<?php echo get_category_link($catid); ?>" itemprop="url">
      <span itemprop="title"><?php echo get_cat_name($catid); ?></span>
      </a> >
      </div>
      <?php endforeach; ?>
      <?php /*--- タグ名の表示 --- */ ?>
      <div><?php single_cat_title(); ?></div>
      </div> <!--- end [breadcrumb] -->
      <main>
        <article class="article-list">
            <div class="article-list-contents">
              <!-- カテゴリ名のh2 -->
                <h2 class="article-category-name">
                 <?php $cat = get_the_category(); ?>
                  <?= $cat_name = $cat[0]->cat_name; ?>
                </h2>
                <ul class="article-list-items flex">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <li class="article-list-items-wrap blog-list__list-item">
                            <article class="article-items">
                                <a href="<?php the_permalink(); ?>" class="article-wrap blog-item">
                                    <p class="article-list-category">
                                      <!-- 記事についているカテゴリ名 -->
                                        <span href="" class="article-category-text">
                                        <?php $cat = get_the_category(); ?>
                                        <?= $cat_name = $cat[0]->cat_name; ?>
                                        </span>
                                      <!-- 記事についているカテゴリ名 -->
                                    </p>
                                    <p class="article-list-thumbnail blog-item__thumbnail">
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
                                <h4 class="article-list-title blog-item__title"><?php the_title(); ?></h4>
                                <!-- タイトル -->
                                <!-- タグ -->
                                <?php the_tags( '<ul class="article-list-tag"><li>', '</li><li>', '</li></ul>' ); ?>
                                <!-- タグ -->
                                <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                            </article>
                    </li>
                <?php endwhile; endif; ?>
                </ul>

                <!-- ページネーション -->
                <?php the_posts_pagination(
                  array(
                    'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
                    'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                    'prev_text'     => __( '前へ'), // 「前へ」リンクのテキスト
                    'next_text'     => __( '次へ'), // 「次へ」リンクのテキスト
                    'type'          => 'list', // 戻り値の指定 (plain/list)
                  )
                ); ?>
                <!-- ページネーション -->
            </div>
        </article>

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

        <aside class="business-banner">
            <div class="business-banner-wrap">
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