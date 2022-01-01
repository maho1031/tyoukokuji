<?php
/*
Template Name: About
*/
?>

<!-- ヘッダー -->
<?php get_header(); ?>

   <!-- メニュー -->
   <?php get_template_part('content', 'menu'); ?>



    <section class="p-aboutContent">
        <!-- <div class="p-aboutContent__image"></div> -->
        <img src="<?php echo get_post_meta($post->ID, 'img-about', true); ?>" alt="" class="p-aboutContent__image">
        <div class="p-aboutContent__header">
            <h1 class="c-title__main u-mt60 u-mb60"><?php echo get_the_title(); ?></h1>
        </div>
        <div class="p-aboutContent__inner">
            <div class="p-aboutContent__text">
                <!-- <p class="p-aboutContent__description">
                    長谷寺は、1700年、が山形県に移住し、建立しました。<br>

                </p> -->
                <?php if(have_posts()) : //WordPressループ
                while (have_posts()) : the_post(); //繰り返し処理開始 ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php the_content(); ?>
                </div>
                <?php endwhile;  //繰り返し処理終了
                else : //ここから生地が見つからなかった場合の処理 ?>
                <div class="post">
                    <h2>記事はありません。</h2>
                    <p>お探しの記事は見つかりませんでした。</p>
                </div>
            <?php endif; //WordPressループ終了 ?>
            </div>
        <!-- </div> -->

    </section>





    <!-- フッター -->
   <?php get_footer(); ?>