<?php
/**
 * Template Name: all-articles */
?>

<?php get_header(); ?>
<?php /*--- パンくずリスト --- */ ?>
      <div id="breadcrumb">
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="<?php echo home_url(); ?>" itemprop="url">
            <span span itemprop="title">TOPページ</span>
          </a> > すべての記事
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
        <h2 class="article-category-name">
            すべての記事
        </h2>
        <ul class="article-list-items flex">
            <!-- 最新記事の二番目以降の表示 -->
            <?php
            // ① ↓ 今現在のページ位置を取得
            $paged = (int) get_query_var('paged');

            $args = array(
            // ② get_option('posts_per_page') ← で管理画面で設定した、記事一覧で表示するページ数を取得
            'posts_per_page' => get_option('posts_per_page'),
            // ③ (int) get_query_var('paged') ← で取得した、$pagedを挿入
            'paged' => $paged,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish'
            );
            $the_query = new WP_Query($args);

            // 記事一覧のループスタート

            if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
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
                    <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                    <!-- タグ -->
                </article>
            </li>
            <?php endwhile; endif; wp_reset_postdata();?>
        </ul>
        <div class="pagination">
        <div class="list-box">
            <ul>
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $the_query = new WP_Query( array(
                'post_status' => 'publish',
                'post_type' => 'post', //　ページの種類（例、page、post、カスタム投稿タイプ名）
                'paged' => $paged,
                'posts_per_page' => 15, // 表示件数
                'orderby'     => 'date',
                'order' => 'DESC'
            ) );
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                    <?php
                    /*　ここにループさせるコンテンツを入れます　*/
                    ?>
                <?php
                endwhile;
            else:
                echo '<div><p>ありません。</p></div>';
            endif;
            ?>
            </ul>
        </div>
        
        <div class="pnavi">
            <?php //ページリスト表示処理
            global $wp_rewrite;
            $paginate_base = get_pagenum_link(1);
            if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                $paginate_format = '';
                $paginate_base = add_query_arg('paged','%#%');
            }else{
                $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                user_trailingslashit('page/%#%/','paged');
                $paginate_base .= '%_%';
            }
            echo paginate_links(array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $the_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '<',
                'next_text' => '>',
            ));
            ?>
        </div>
        </div>
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
</main>
<?php get_footer(); ?>