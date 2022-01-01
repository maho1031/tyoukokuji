<?php
/*
Template Name: Home 〜トップページ〜
*/
?>

<!-- ヘッダー -->
<?php get_header(); ?>

    <!-- メニュー -->
    <?php get_template_part('content', 'menu'); ?>
    
     <main>
         <!-- メインイメージ -->
         <section class="p-hero u-mt16">
             <!-- <div class="p-hero__img"></div> -->
             <img src="<?php echo get_post_meta($post->ID, 'img-top', true); ?>" alt="" class="p-hero__img">
            </section>

        <!-- お知らせ -->
        <section class="p-news u-mt120" id="news">
            <div class="p-news__header appear down">
                    <h1 class="c-title__main u-mt16 u-mb60 item">お知らせ</h1>
            </div>
            
            <div class="p-news__container">
                <div class="p-news__inner">
                    <ul class="p-news__main">
                        
                            
                        <?php
                            global $post;
                            //投稿数
                            $args = array( 'posts_per_page' => 4 );
                            $myposts = get_posts( $args );

                            //ループで回す
                            foreach( $myposts as $post ) {
                            setup_postdata($post);
                            ?>

                            <li class="p-news__item">
                            <p>
                                <span class="p-news__date"><?php the_time("Y年m月j日"); ?></span><br>
                                <a href="<?php the_permalink(); ?>" class="p-news__link">
                                <span class="p-news__title"><?php the_title(); ?></span>
                                </a>
                            </p>
                            <?php
                                }
                                wp_reset_postdata();
                                ?>
                        </li>
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
                        </li> -->
                    </ul>

                    <div class="p-news__btncontainer u-mt30">
                        <div class="p-news__btn">
                            <a href="https://www.wp-theme.maho-hattori.com/?cat=1" class="c-btn c-btn__news">一覧はこちら</a>
                            <!-- <button class="c-btn c-btn__news"></button> -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 長谷寺について -->
        <section class="p-about u-pt100" id="about">
             <div class="p-about__header appear down">
                        <h1 class="c-title__main u-mt60 u-mb60 item">長谷寺について</h1>
                </div>

                <div class="p-about__inner">
                        <div class="p-about__imagecontainer u-mb30 appear right" style="overflow:hidden;">
                            <!-- <div class="p-about__image item"></div> -->
                            <img src="<?php echo get_post_meta($post->ID, 'img-about', true); ?>" alt="" class="p-about__img item">
                        </div>

                        <div class="p-about__text u-mt30">
                            <p class="c-title__sub">長谷寺の歴史</p>
                                <div class="p-about__description u-mt30">
                                <?php echo get_post_meta($post->ID, 'about', true); ?>
                                </div>

                            <div class="p-news__btncontainer u-mt30">
                                <div class="p-news__btn">
                                    <a href="https://www.wp-theme.maho-hattori.com/?page_id=10" class="c-btn c-btn__news">詳しくはこちら</a>
                                    <!-- <button class="c-btn c-btn__news">詳しくはこちら</button> -->
                                </div>
                            </div>
                        </div>
                </div>
        </section>

        <!-- 拝観案内 -->
        <section class="p-guide u-pt130" id="guide">
            <div class="p-guide__header appear down">
                <h1 class="c-title__main u-mt60 u-mb60 item">拝観案内</h1>
            </div>

            <div class="p-guide__inner">
                <div class="p-guide__item">
                    <dl class="p-guide__dl u-mb16">
                        <dt class="p-guide__dt">拝観時間</dt>
                        <dd class="p-guide__dd">

                            <p><?php echo get_post_meta($post->ID, 'guide_info1', true); ?></p>
                            <p><?php echo get_post_meta($post->ID, 'guide_info2', true); ?></p>
                            <!-- <p>3月〜11月　午前8時〜午後5時</p> -->
                            <!-- <p>12月〜2月　午前8時〜午後5時</p> -->
                        </dd>
                    </dl>
                </div>

                <div class="p-guide__item">
                    <dl class="p-guide__dl">
                        <dt class="p-guide__dt">御札・祈祷料</dt>
                        <dd class="p-guide__dd">
                            <p><?php echo get_post_meta($post->ID, 'guide_info3', true); ?></p>
                            <p><?php echo get_post_meta($post->ID, 'guide_info4', true); ?></p>
                            <!-- <p>紙札　4,000円</p> -->
                            <!-- <p>大木札　10,000円</p> -->
                        </dd>
                    </dl>
                </div>
            </div>

            <div class="p-guide__text">
                <p class="p-guide__comment">祈祷受付・詳細をご希望の方は、お電話にてお問い合わせをお願いします。</p>
            </div>
        </section>

        <!-- 年間行事 -->
        <section class="p-event u-pt130" id="event">
            <div class="p-event__header appear down">
                <h1 class="c-title__main u-mt60 u-mb60 item">年間行事</h1>
            </div>

                <div class="p-event__image">
                    <img src="<?php echo get_post_meta($post->ID, 'img-event', true); ?>" alt="">
                </div>
            
            <div class="p-event__inner">
                <ul class="p-event__main">
                    <li class="p-event__item u-pt30">
                        <p>
                            <span class="p-event__date"><?php echo get_post_meta($post->ID, 'event_date1', true); ?></span>
                            <br>
                            <span class="p-event__title"><?php echo get_post_meta($post->ID, 'event_title1', true); ?></span>
                            <!-- <span class="p-event__date">1月11日</span><br> -->
                            <!-- <span class="p-event__title">法話会</span> -->
                        </p>
                    </li>

                    <li class="p-event__item u-mt16">
                        <p>
                        <span class="p-event__date"><?php echo get_post_meta($post->ID, 'event_date2', true); ?></span>
                            <br>
                            <span class="p-event__title"><?php echo get_post_meta($post->ID, 'event_title2', true); ?></span>
                        </p>
                    </li>

                    <li class="p-event__item u-mt16">
                        <p>
                        <span class="p-event__date"><?php echo get_post_meta($post->ID, 'event_date3', true); ?></span>
                            <br>
                            <span class="p-event__title"><?php echo get_post_meta($post->ID, 'event_title3', true); ?></span>
                        </p>
                    </li>

                    <li class="p-event__item u-mt16">
                        <p>
                        <span class="p-event__date"><?php echo get_post_meta($post->ID, 'event_date4', true); ?></span>
                            <br>
                            <span class="p-event__title"><?php echo get_post_meta($post->ID, 'event_title4', true); ?></span>
                        </p>
                    </li>

                    <li class="p-event__item u-mt16">
                        <p>
                        <span class="p-event__date"><?php echo get_post_meta($post->ID, 'event_date5', true); ?></span>
                            <br>
                            <span class="p-event__title"><?php echo get_post_meta($post->ID, 'event_title5', true); ?></span>
                        </p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- ギャラリー -->
        <section class="p-gallery u-pt130" id="gallery">
            <div class="p-gallery__header appear down">
                <h1 class="c-title__main u-mt60 u-mb60 item">ギャラリー</h1>
            </div>

            <!-- <?php
                $slideargs = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'orderby'  => 'rand',
                'order'  => 'ASC',
                'posts_per_page' => 5
                );
                $the_query = new WP_Query($slideargs);
                ?> -->

            <!-- Slider main container -->
                    <div class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <!-- <div class="swiper-slide"><img src="images/swiper1.jpg" alt=""></div> -->
                            <div class="swiper-slide"><img src="<?php echo get_post_meta($post->ID, 'img-gallery1', true); ?>" alt=""></div>
                            <div class="swiper-slide"><img src="<?php echo get_post_meta($post->ID, 'img-gallery2', true); ?>" alt=""></div>
                            <div class="swiper-slide"><img src="<?php echo get_post_meta($post->ID, 'img-gallery3', true); ?>" alt=""></div>
                            <div class="swiper-slide"><img src="<?php echo get_post_meta($post->ID, 'img-gallery4', true); ?>" alt=""></div>
                            <div class="swiper-slide"><img src="<?php echo get_post_meta($post->ID, 'img-gallery5', true); ?>" alt=""></div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>

                   
                    <div class="p-gallery__item u-mt16">
                        <a href="" class="p-gallery__link">
                            <div class="p-gallery__icon">
                                <i class="fab fa-instagram p-gallery__icon-insta"></i>
                            </div>
                            <div class="p-gallery__text">
                                <p>長谷寺Instagramはこちらから</p>
                            </div>
                    </a>
                    </div>
        </section>

        <!-- アクセス -->
        <section class="p-access u-pt130" id="access">
            <div class="p-access__header appear down">
                <h1 class="c-title__main u-mt60 u-mb60 item">アクセス</h1>
            </div>
            <div class="p-access__inner">
                <div class="p-access__item">
                    <div class="p-access__text">
                        <ul class="p-access__ul">
                            <li class="p-access__li">
                                <p class="p-access__label">所在地</p>
                                <!-- <p>〒990-0892 山形県山形市中野96</p> -->
                                <p><?php echo get_post_meta($post->ID, 'access_address', true); ?></p>
                            </li>

                            <li class="p-access__li">
                                <p class="p-access__label">電話番号</p>
                                <p><?php echo get_post_meta($post->ID, 'access_tel', true); ?></p>
                                <!-- <p>023-691-1658</p> -->
                            </li>
                        </ul>
                    </div>
                    <div class="p-access__map u-mb16">
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100111.15710056102!2d140.2586792379904!3d38.361162723320376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f8bc875f8d2a5cd%3A0xf139d3f945d92819!2z6ZW36LC35a-6!5e0!3m2!1sja!2sjp!4v1610785521646!5m2!1sja!2sjp" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="p-access__gmap"></iframe> -->
                        <?php echo get_post_meta($post->ID, 'map', true); ?>
                    </div>
                </div>

                <div class="p-access__item">
                    <ul class="p-access__tabs">
                        <li class="p-access__tabBtn tabcar js-tab-trigger -active" id="tab1">お車で<br>お越しの方</li>
                        <li class="p-access__tabBtn tabtra js-tab-trigger" id="tab2">電車<br>でお越しの方</li>
                    </ul>

                    <div class="p-access__tabContents">
                        <div class="p-access__content js-tab-target -show" id="tab1">
                        <?php echo get_post_meta($post->ID, 'access_car1', true); ?><br>
                        <?php echo get_post_meta($post->ID, 'access_car2', true); ?><br>
                            <!-- 山形中央ICインターから車で約10分<br> -->
                            <!-- 駐車場：10台 -->
                        </div>

                        <div class="p-access__content js-tab-target" id="tab2">
                        <?php echo get_post_meta($post->ID, 'access_tra1', true); ?><br>
                        <?php echo get_post_meta($post->ID, 'access_tra2', true); ?><br>
                            <!-- 山形駅よりバス「寒河江駅前行き」で「中野」<br> -->
                            <!-- バス停下車徒歩3分 -->
                        </div>


                    </div>
                </div>
            </div>
        </section>

        <!-- よくあるご質問 -->
        <section class="p-question u-pt130" id="question">
            <div class="p-question__header appear down">
                <h1 class="c-title__main u-mt60 u-mb60 item">よくあるご質問</h1>
            </div>

            <div class="p-question__inner">
                <div class="p-question__item">
                    <p class="p-question__q">Q.<?php echo get_post_meta($post->ID, 'que1', true); ?></p>
                    <p class="p-question__a">A.<?php echo get_post_meta($post->ID, 'ans1', true); ?></p>
                    <!-- <p class="p-question__q">Q.駐車場はありますか？</p> -->
                    <!-- <p class="p-question__a">A.ございます。境内脇が駐車場となっております。</p> -->
                </div>

                <div class="p-question__item">
                    <p class="p-question__q">Q.<?php echo get_post_meta($post->ID, 'que2', true); ?></p>
                    <p class="p-question__a">A.<?php echo get_post_meta($post->ID, 'ans2', true); ?></p>
                    <!-- <p class="p-question__q">Q.ペットを連れての参拝はできますか？</p> -->
                    <!-- <p class="p-question__a">A.ペットを連れての参拝は、他の方の迷惑になる場合がございますので、ご遠慮下さい。</p> -->
                </div>

                <div class="p-question__item">
                    <p class="p-question__q">Q.<?php echo get_post_meta($post->ID, 'que3', true); ?></p>
                    <p class="p-question__a">A.<?php echo get_post_meta($post->ID, 'ans3', true); ?></p>
                    <!-- <p class="p-question__q">Q.喫煙所はありますか？</p> -->
                    <!-- <p class="p-question__a">A.境内すべて禁煙となっております。</p> -->
                </div>
            </div>
        </section>
     </main>

<?php get_footer(); ?>
<?php wp_footer(); ?>