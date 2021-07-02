<footer>
       <div class="footer-contents" id="footer">
            <p class="footer-logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="ロゴ">
                </a>
            </p>
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
            <div class="footer-nav">
                <div class="footer-nav-contents flex">
                    <p>
                        <a href="">利用規約</a>
                    </p>
                    <p>
                        <a href="">個人情報の取り扱いについて</a>
                    </p>
                    <p>
                        <a href="">運営会社</a>
                    </p>
                    <p>
                        <a href="<?php echo home_url('/contact'); ?>">お問い合わせ</a>
                    </p>
                </div>
            </div>
            <small>© 2021 Lifedge</small>
       </div>
    </footer>
  <?php wp_footer(); ?>
 </body>
</html>