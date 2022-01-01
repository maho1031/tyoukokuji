
<!-- ヘッダー -->
<?php get_header(); ?>

   <!-- メニュー -->
   <?php get_template_part('content', 'menu'); ?>

    <section class="p-newsContent">
        <!-- <div class="p-newsContent__header-article">
            <h1 class="c-title__news u-mt60"><php the_title; ?></h1>
            <div class="p-newsContet__title u-mb60"><php the_time"m月j日"; ?></div>
        </div>
        <div class="p-newsContent__body-article">
            <p><php the_content; ?></p>
        </div> -->
        

        <?php if(have_posts()): ?>
            <?php while(have_posts()) : the_post(); ?>
            <article>
            <div class="p-newsContent__header-article">
                <h1 class="c-title__news u-mt60"><?php the_title(); ?></h1>
                <div class="p-newsContet__title u-mb60"><?php the_time("m月j日"); ?></div>
            </div>
            <div class="p-newsContent__body-article">
                <p><?php the_content(); ?></p>
            </div>
            </article>


        <?php endwhile; ?>

        <div class="pagination">
            <ul class="c-pagination__ul">
                <li class="prev"><?php previous_post_link('%link', '前の記事へ'); ?></li>
                <li class="top"><a href="https://www.wp-theme.maho-hattori.com/?cat=1">記事一覧へ</a></li>
                <li class="next"><?php next_post_link('%link', '次の記事へ'); ?></li>
            </ul>
        </div>

        <?php else : ?>
            <p>お探しの記事は見つかりませんでした。</p>

        <?php endif; ?>

    </section>





   <!-- フッター -->
   <?php get_footer(); ?>