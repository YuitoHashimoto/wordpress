<?php get_header(); ?>
    <main>
        <article class="article-list">
            <div class="article-list-contents">
                <h2 class="article-category-name">

                <?php
                    // 現在クエリされてるオブジェクト取得
                    $selected_tag = get_queried_object();
                    // print_r ($selected_tag);
                ?>
                <?php
                    // 取得したオブジェクトからname情報取得
                    echo $selected_tag->name;
                ?>に関する記事

                <!-- <?php $tag = get_the_tags();?>
                <?php echo $tag[0]->name;
                ?>に関する記事 -->

                </h2>
                <ul class="article-list-items flex">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <li class="article-list-items-wrap blog-list__list-item">
                    <?php echo get_post_number( $post->post_type ); ?>
                            <article class="article-items">
                                <a href="<?php the_permalink(); ?>" class="article-wrap blog-item">
                                    <p class="article-list-category">
                                        <span href="" class="article-category-text">
                                            <?php $cat = get_the_category(); ?>
                                            <?= $cat_name = $cat[0]->cat_name; ?>
                                        </span>
                                    </p>
                                    <p class="article-list-thumbnail blog-item__thumbnail">
                                        <?php if(has_post_thumbnail()): ?>
                                            <img class="blog-item__thumbnail-image" src="<?php the_post_thumbnail_url('large'); ?>">
                                        <?php endif; ?>
                                        <span>
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/professional-02.svg" alt="プロフェッショナル">
                                        </span>
                                    </p>
                                </a>
                                <h4 class="article-list-title blog-item__title"><?php the_title(); ?></h4>
                                <?php the_tags( '<ul class="article-list-tag"><li>', '</li><li>', '</li></ul>' ); ?>
                                <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                            </article>
                    </li>
                <?php endwhile; endif; ?>
                </ul>
                <!-- ページネーション -->
                <?php the_posts_pagination(
                        array(
                        'mid_size'      => 1, // 現在ページの左右に表示するページ番号の数
                        'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                        'prev_text'     => __( '<'), // 「前へ」リンクのテキスト
                        'next_text'     => __( '>'), // 「次へ」リンクのテキスト
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