<?php
/*
Template Name: News
*/
?>

<!-- ヘッダー -->
<?php get_header(); ?>

   <!-- メニュー -->
   <?php get_template_part('content', 'menu'); ?>

    <section class="p-newsContent">
        <div class="p-newsContent__header">
            <h1 class="c-title__main u-mt60 u-mb60">お知らせ一覧</h1>
        </div>
        <div class="p-newsContent__inner">
            <ul class="p-news__main">
                <!-- <li class="p-news__item">
                    <p>
                        <span class="p-news__date">2020年12月25日</span><br>
                        <a href="#" class="p-news__link">
                        <span class="p-news__title">サイトを開設しました。</span>
                        </a>
                    </p>
                </li>
                <li class="p-news__item">
                    <p>
                        <span class="p-news__date">2020年12月25日</span><br>
                        <a href="#" class="p-news__link">
                        <span class="p-news__title">サイトを開設しました。</span>
                        </a>
                    </p>
                </li>
                <li class="p-news__item">
                    <p>
                        <span class="p-news__date">2020年12月25日</span><br>
                        <a href="#" class="p-news__link">
                        <span class="p-news__title">サイトを開設しました。</span>
                        </a>
                    </p>
                </li>
                <li class="p-news__item">
                    <p>
                        <span class="p-news__date">2020年12月25日</span><br>
                        <a href="#" class="p-news__link">
                        <span class="p-news__title">サイトを開設しました。</span>
                        </a>
                    </p>
                </li> -->

                <!-- 記事のループ -->
                <?php if(have_posts()): ?>
                    <?php while(have_posts()) : the_post(); ?>

                    <article class="p-news__item">
                    <p>
                        <span class="p-news__date"><?php the_time("Y年m月j日"); ?></span><br>
                        <a href="<?php the_permalink(); ?>" class="p-news__link">
                        <span class="p-news__title"><?php the_title(); ?></span>
                        </a>
                    </p>
                </article>

                    <?php endwhile; //end while have_post?>

                    <?php endif; //end have_post?>
            </ul>
        </div>
    </section>

    <div class="c-pagination__container">
    <?php if(function_exists("pagination")) pagination($additional_loop->max_num_pages); ?>
    </div>





    <!-- フッター -->
    <?php get_footer(); ?>