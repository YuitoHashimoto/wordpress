<?php
/**
 * Template Name:umidasu-engineer */
?>
<?php get_header(); ?>
<?php /*--- パンくずリスト --- */ ?>
      <div id="breadcrumb">
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="<?php echo home_url(); ?>" itemprop="url">
            <span span itemprop="title">TOPページ</span>
          </a> > 生み出すエンジニアとは
        </div>
      <?php /*--- タグ名の表示 --- */ ?>
      <div><?php single_cat_title(); ?></div>
      </div>    <!--- end [breadcrumb] -->
<main>
        <section class="umidasu-wrap bc-01">
            <div class="umidasu-engineertoha">
                <h2>
                    生み出すエンジニアとは
                </h2>
                <p class="umdiasu-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/umidasu01.svg" alt="生み出すエンジニアとはのイラスト">
                </p>
                <p class="umidasu-text">
                    生み出すエンジニアとは、自分で企画、開発したプロダクトで社会に価値を提供できるエンジニアです。<br>
                    エンジニアとしてITスキルだけでなく、ビジネススキルも合わせ持ち、それらを融合させることで新たな価値を創り出します。
                </p>
                <p class="umidasu-text umidasu-text02">
                    これからはNoCodeを始めたとしたテクノロジーの進化により、<br>
                    ITスキルしか目を向けないエンジニアの価値は低下し、<br>
                    ITを活用してビジネスにつなげていけるエンジニアの社会的需要は向上していくことが予想されます。
                </p>
            </div>
        </section>

        <section class="umidasu-wrap bc-02">
            <div class="ummidasu-skill">
                <h2>
                    生み出すエンジニアのスキルセット
                </h2>
                <div class="skill-power flex">
                    <p class="skill-power-it">
                        IT力
                    </p>
                    <p class="skill-power-business">
                        ビジネス力
                    </p>
                </div>
                <div class="umdiasu-img">
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/umidasu02.svg" alt="生み出すエンジニアのスキルセット「IT」と「ビジネス力」のイラスト">
                    </p>
                    <p class="ummidasu-details">
                        詳しくは<a href="https://icd.ipa.go.jp/icd/icd/skill-dictionary/skillref" target="_blank">こちら</a>
                    </p>
                </div>

                <p class="umidasu-text">
                    これらのスキルを横断的に学び、プロダクト開発に必要な素地を身につけていきます。
                </p>

                <div class="skill-power skill-power-01-wrap">
                    <p class="skill-power-01">
                        0→1力
                    </p>
                </div>
                <div class="umdiasu-img" id="skill-power-01-img">
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/umidasu03.svg" alt="生み出すエンジニアのスキルセットのイラスト">
                    </p>
                    <p class="ummidasu-details">
                        詳しくは<a href="https://icd.ipa.go.jp/icd/icd/skill-dictionary/skillref" target="_blank">こちら</a>
                    </p>
                </div>
                <p class="umidasu-text">
                    磨き上げたスキルと想いを原始に価値あるプロダクトを生み出し、
                    日々検証を繰り返してブラッシュアップを行なっていきます。
                </p>
            </div>
        </section>

        <section class="umidasu-wrap bc-01">
            <div class="umidasu-level">
                <h2>
                    生み出すエンジニアのレベル
                </h2>
                <div class="umdiasu-img">
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/umidasu04.svg" alt="生み出すエンジニアのレベル">
                    </p>
                </div>
                <div class="umidasu-level-items">
                    <div class="umidasu-level-name flex">
                        <p>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/professional.png" alt="プロフェッショナルのロゴ">
                        </p>
                        <h3>
                            プロフェッショナル
                        </h3>
                    </div>
                    <p class="umidasu-level-text">
                        自身、または集団で企画、開発したプロダクトが関わる業界にとって不可欠なものとなっている。<br>
                        スキルマップ全般において卓越的なスキルが認められ、リーダー以下の指導ができる。<br>
                        高い視座を持ち、関わる業界全体を発展させることが期待される。<br>
                    </p>
                </div>
                <div class="umidasu-level-items">
                    <div class="umidasu-level-name flex">
                        <p>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/leader.png" alt="リーダーのロゴ">
                        </p>
                        <h3>
                            リーダー
                        </h3>
                    </div>
                    <p class="umidasu-level-text">
                        自身、または集団で企画、開発したプロダクトが関わる業界に認知され、継続的に収益を発生させている。<br>
                        スキルマップ全般において発展的なスキルが認められ、アドバンス以下の指導ができる。<br>
                        個の利益だけでなく、業界全体の利益を優先することが期待される。
                    </p>
                </div>
                <div class="umidasu-level-items">
                    <div class="umidasu-level-name flex">
                        <p>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/advance.png" alt="アドバンスのロゴ">
                        </p>
                        <h3>
                            アドバンス
                        </h3>
                    </div>
                    <p class="umidasu-level-text">
                        自身、または集団で企画、開発したプロダクトで継続的に収益を発生させている。<br>
                        スキルマップ全般において応用的なスキルが認められ、チャレンジャー以下の指導ができる。
                    </p>
                </div>
                <div class="umidasu-level-items">
                    <div class="umidasu-level-name flex">
                        <p>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/challenger.png" alt="チャンレンジャ-のロゴ">
                        </p>
                        <h3>
                            チャレンジャー
                        </h3>
                    </div>
                    <p class="umidasu-level-text">
                        自身で企画、開発したプロダクトの作成に向けて行動に移している。<br>
                        スキルマップのテクノロジーにおける応用的な技術が認められる。
                        自立してスキルを活用できる。
                    </p>
                </div>
                <div class="umidasu-level-items">
                    <div class="umidasu-level-name flex">
                        <p>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/beginner.png" alt="ビギナーのロゴ">
                        </p>
                        <h3>
                            ビギナー
                        </h3>
                    </div>
                    <p class="umidasu-level-text">
                        エンジニアの道に進み、日々研鑽を行なっている。<br>
                        スキルマップのテクノロジーにおける基礎的なスキルが認められる。<br>
                        指示の元でスキルを活用できる。
                    </p>
                </div>
                <div class="umidasu-level-items">
                    <div class="umidasu-level-name flex">
                        <p>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/fun.png" alt="ファンのロゴ">
                        </p>
                        <h3>
                            ファン
                        </h3>
                    </div>
                    <p class="umidasu-level-text">
                        生み出すエンジニアに憧れを持ち、エンジニアの道に進もうとしている。
                    </p>
                </div>
            </div>

            <p class="umidasu-message">
                生み出すエンジニアLABでは、生み出すエンジニアを増やすことを目的とし、<br>
                そのためのステップや役に立つ情報を発信していきます。
            </p>

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