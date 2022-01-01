 <!-- ヘッダー -->
 <div class="js-nav-trigger"></div>
     <header class="l-header js-float-menu">
         <div class="p-header">
             <div class="p-header__head">
                <p class="p-header__title">曹洞宗</p>
                <h1 class="p-header__logo"><a href="<?php echo home_url(); ?>" class="p-header__link">長谷寺</a></h1>
             </div>
             
 
             <!-- ハンバーガーメニュ -->
             <div class="p-header__mobileMenu-btn js-toggle-moblileMenu">
                 <span></span>
                 <span></span>
                 <span></span>
             </div>
             
 
             <!-- ヘッダーメニュー -->
             <nav class="p-nav js-toggle-mobileMenu-target">
                 <!-- <ul class="p-nav__menu js-nav-menu">
                     <li class="p-nav__menu-item"><a href="#about" class="p-nav__menu-link">長谷寺について</a></li>
                     <li class="p-nav__menu-item"><a href="#guide" class="p-nav__menu-link">拝観案内</a></li>
                     <li class="p-nav__menu-item"><a href="#event" class="p-nav__menu-link">年間行事</a></li>
                     <li class="p-nav__menu-item"><a href="#gallery" class="p-nav__menu-link">ギャラリー</a></li>
                     <li class="p-nav__menu-item"><a href="#access" class="p-nav__menu-link">アクセス</a></li>
                     <li class="p-nav__menu-item"><a href="#question" class="p-nav__menu-link">よくあるご質問</a></li>
                 </ul> -->

                 <?php wp_nav_menu(array(
                     'theme_location' => 'mainmenu',
                     'container' =>  '',
                     'menu_class' => 'p-nav__menu',
                     'items_wrap' => '<ul class="p-nav__menu">%3$s</ul>'));
                 ?>
             </nav>
         </div>
     </header>
