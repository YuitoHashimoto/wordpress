<?php
  $current_tags = get_the_tags();

  foreach($current_tags as $tag):
    $current_tag_list[] = $tag->term_id;
  endforeach ;
  $args = array(
    'post__not_in' => array($post -> ID),
    'posts_per_page'=> 3,
    'tag__in' => $current_tag_list,
    'orderby' => 'rand',
  );
  $query = new WP_Query($args);
?>
<aside class="detail-aside">
                <ul class="detail-aside-items flex">
                    <h3>関連記事</h3>
                    <?php if( $query -> have_posts() ): while ($query -> have_posts()): $query -> the_post(); ?>
                            <li class="detail-aside-items-wrap blog-list__list-item">
                                    <article class="detail-aside-article">
                                        <a href="<?php the_permalink(); ?>" class="detail-aside-article-wrap blog-item">
                                            <p class="detail-aside-article-category">
                                            <!-- 記事についているカテゴリ名 -->
                                                <span href="" class="detail-aside-article-category-text">
                                                <?php $cat = get_the_category(); ?>
                                                <?= $cat_name = $cat[0]->cat_name; ?>
                                                </span>
                                            <!-- 記事についているカテゴリ名 -->
                                            </p>
                                            <p class="detail-aside-article-thumbnail blog-item__thumbnail">
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
                                        <h4 class="detail-aside-article-title blog-item__title"><?php the_title(); ?></h4>
                                        <!-- タイトル -->
                                        <!-- タグ -->
                                        <?php the_tags( '<ul class="detail-aside-article-tag"><li>', '</li><li>', '</li></ul>' ); ?>
                                        <time datetime="" class=""><?php the_time('Y/m/d'); ?></time>
                                        <!-- タグ -->
                                    </article>
                            </li>
                            <?php endwhile; else:?>
                        <p>関連記事はありませんでした。</p>
                    <?php endif; ?>

<?php wp_reset_postdata(); ?>
                </ul>
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