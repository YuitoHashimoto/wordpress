<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no"/>
        <meta name="keywords" content="生み出すエンジニアLAB,オウンドメディア,生み出すエンジニア,LAB,"/>
        <meta name="description" content="生み出すエンジニアLABでは、生み出すエンジニアを増やすことを目的とし、そのためのステップや役に立つ情報を発信していきます。"/>
        <meta name="twitter:card" content="summary"/>
        <meta property="og:site_name" content="生み出すエンジニアLAB"/>
        <meta property="og:title" content="生み出すエンジニアLAB"/>
        <meta property="og:description" content="生み出すエンジニアLABでは、生み出すエンジニアを増やすことを目的とし、そのためのステップや役に立つ情報を発信していきます。"/>
        <link rel="icon" href="img/Favicon_color.svg"/>
        <link rel="apple-touch-icon" sizes="180x180" href="img/Favicon_color.svg">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
        <?php wp_head(); ?>
        <title>生み出すエンジニアLAB</title>
    </head>
<body>
    <header id="header" class="header">
        <div class="header-contents">
            <div class="header-item01 flex">
                <h1>
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="ロゴ">
                    </a>
                </h1>
                <!-- <div class="search-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt="検索-アイコン">
                </div> -->
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav class="globalMenuSp">
                    <ul class="globalMenuSp-list">
                        <li class="globalMenuSp-list-items"><a href="<?php echo home_url('/umidasu-engineer'); ?>">生み出すエンジニアとは</a></li>
                        <li class="globalMenuSp-list-items"><a href="<?php echo home_url('/all-articles'); ?>">すべての記事</a></li>
                        <li class="globalMenuSp-list-items"><a href="<?php echo home_url('category/work'); ?>">学び方・技術</a></li>
                        <li class="globalMenuSp-list-items"><a href="<?php echo home_url('category/life'); ?>">働き方・生き方</a></li>
                        <li class="globalMenuSp-list-items"><a href="<?php echo home_url('category/lifedge'); ?>">Lifedge</a></li>
                    </ul>
                    <section class="tag">
                        <div class="tag-contents" id="area-2">
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
                                    $term_list = get_terms('post_tag', Array('number' => 6));
                                    $result_list = [];
                                    foreach ($term_list as $term) {
                                    $u = (get_term_link( $term, 'post_tag' ));
                                    echo "<li><a href='".$u."'>".$term->name."</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </section>
                    <div class="line-add02">
                        <a href="https://lin.ee/jJupnGB" target="_blank" class="line-add02-wrap flex">
                            <p class="line-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/line-icon.svg" alt="LINEアイコン">
                            </p>
                            <p class="line-add02-text">
                                最新記事のお知らせをLINEで受け取る
                            </p>
                        </a>
                    </div>
                </nav>
            </div>
            <nav class="gnav flex none">
                <p class="gnav-buttom01">
                    <a href="<?php echo home_url('/umidasu-engineer'); ?>">
                        生み出すエンジニアとは
                    </a>
                </p>
                <ul class="gnav-list flex">
                    <li>
                        <a href="<?php echo home_url();?>/all-articles/">すべての記事</a>
                    </li>
                    <?php wp_list_categories('hide_empty=0&title_li='); ?>
                </ul>
            </nav>
        </div>
        <div class="line-add">
            <div class="line-add-wrap">
                <a href="https://lin.ee/jJupnGB" target="_blank">
                    <span>LINE</span>で<br>
                    お知らせを<br>
                    受け取る<br>
                </a>
            </div>
        </div>
    </header>