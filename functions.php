<?php

//カスタムヘッダー画像の配置
// $custom_header_defaults = array(
    // 'default-image' => get_bloginfo('template_url').'img/logo.png',
    // 'header-text' => false, //ヘッダー画像上にテキストを被せる
// );

//カスタムヘッダー機能を有効にする
// add_theme_support('custom-header', $custom_header_defaults);


// カスタムメニュー使用
register_nav_menu('mainmenu', 'メインメニュー');


// カスタムメニューのaタグにクラスを付与
add_filter('walker_nav_menu_start_el', 'add_class_on_link', 10, 4);
function add_class_on_link($item_output, $item){
$css_class = esc_attr( $item->classes[0] );
if ($css_class) {
return preg_replace('/(<a.*?)/', '$1' . " class='" . $css_class . "'", $item_output);
}else{
return $item_output;
}
}


//ページネーション
function pagination($pages = '', $range = 2){

    $showitems = ($range * 2)+1; //表示するページ数（５ページを表示）

    global $paged;  //現在のページ値
    if(empty($paged)) $paged = 1; //デフォルトのページ


    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages; //全ページを取得
         if(!$pages){ //全ページ数がからの場合は、1とする

            $pages = 1;
         }
    } 

    if(1 != $pages) //全ページが１出ない場合はページネーションを表示する
    {
        echo "<div class =\"pagination\">\n";
        echo "<ul>\n";

        //Prev:現在のページ値が１より大きい場合に表示には前に戻るリンクを表示する
        if($paged > 1)echo "<li class=\"prevs\"><a href='".get_pagenum_link($paged - 1)."'>前へ</a></li>\n";

        //for分で１ページずつ表示数する
        for($i = 1; $i <= $pages; $i++){
            if(1 != $pages && ( !($i >= $paged + $range + 1 || $i <= $paged - $range -1) || $pages <= $showitems)){

                //三項演算子での条件分岐
                echo ($paged == $i ) ? "<li class=\"active\">".$i."</li>\n" : "<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
            }
        }

        //Next:　総ページより現在のページが小さい場合は非表示
            if($paged < $pages) echo "<li class=\"nexts\"><a href=\"".get_pagenum_link($paged + 1)."\">次へ</a></li>\n";
            echo "<ul>\n";
            echo "</div>\n";
        
        
        
    }
}

// ========================================
// カスタムフィールド
// ========================================
// 投稿ページへ表示するカスタムボックスを定義する
add_action('admin_menu', 'add_custom_inputbox');

// 追加した表示項目のデータ更新・保存のためのアクションフック
add_action('save_post', 'save_custom_postdata');


// 入力項目がどの投稿タイプのページに表示されるのかの設定
function add_custom_inputbox(){
    // 第一引数：編集画面のhtmlに挿入されるid属性名
    // 第二引数：管理画面に表示されすカスタムフィールド名
    // 第三引数：メタボックスの中に出力される関数名
    // 第四引数：管理画面に表示するカスタムフィールドの場所(postなら投稿、pageなら固定ページ)
    // 第五引数：配置される順序
    add_meta_box('top_img_id', 'トップ画像URL入力欄', 'custom_area', 'page', 'normal');

    add_meta_box('about_id', 'About入力欄', 'custom_area1', 'page', 'normal');
    add_meta_box('about_img_id', 'About画像URL入力欄', 'custom_area2', 'page', 'normal');

    add_meta_box('guide_id', '拝観案内入力欄', 'custom_area3', 'page', 'normal');

    add_meta_box('event_img_id', '年間行事画像URL入力欄', 'custom_area4', 'page', 'normal');
    add_meta_box('event_date_id', '年間行事日付タイトル入力欄', 'custom_area5', 'page', 'normal');


    add_meta_box('gallery_img_id', 'ギャラリー画像URL入力欄', 'custom_area6', 'page', 'normal');

    add_meta_box('access_address_id', 'アクセス入力欄', 'custom_area7', 'page', 'normal');
    
    add_meta_box('map_id', 'map入力欄', 'custom_area8', 'page', 'normal');

    add_meta_box('question_id', '質問入力欄', 'custom_area9', 'page', 'normal');
}

// 管理画面に表示される内容
// ==============================
// トップ画像
// ==============================
function custom_area(){
    global $post;

    echo 'トップ画像URL　：<input type="text" name="img-top" value="'.get_post_meta($post->ID, 'img-top', true).'">';
}

// ==============================
// About
// ==============================
function custom_area1(){
    global $post;

    echo 'コメント　：<textarea cols="50" rows="5" name="about_msg">'.get_post_meta($post->ID, 'about', true).'</textarea><br>';
}
// About画像
function custom_area2(){
    global $post;

    echo 'About画像URL　：<input type="text" name="img-about" value="'.get_post_meta($post->ID, 'img-about', true).'">';
}

// ==============================
// 拝観案内
// ==============================
function custom_area3(){
    global $post;

    echo '<table>';
    for($i = 1; $i <= 4; $i++){
        echo '<tr><td>info'.$i.':</td><td><input cols="50" rows="5" name="guide_info'.$i.'" value="'.get_post_meta($post->ID, 'guide_info'.$i, true).'"></td></tr>';
    }

    echo '</table>';
}

// ==============================
// 年間行事
// 年間行事画像
// ==============================
function custom_area4(){
    global $post;

    echo '年間行事画像URL　：<input type="text" name="img-event" value="'.get_post_meta($post->ID, 'img-event', true).'">';
}

// 年間行事日付・タイトル
function custom_area5(){
    global $post;


    // echo '日付　：<input type="text" name="event_date" value="'.get_post_meta($post->ID, 'event_date', true).'">';
    echo '<table>';

    // for($i = 1; $i <= 4; $i++){
    //     echo '<tr><td>info'.$i.':</td><td><input cols="50" rows="5" name="guide_info'.$i.'" value="'.get_post_meta($post->ID, 'guide_info'.$i, true).'"></td></tr>';
    // }
    for($f = 1; $f <= 5; $f++){
        echo '<tr><td>行事日付'.$f.':</td><td><input cols="50" rows="5"  name="event_date'.$f.'" value="'.get_post_meta($post->ID, 'event_date'.$f, true).'"></td>
        <td>行事タイトル'.$f.':</td><td><input name="event_title'.$f.'" value="'.get_post_meta($post->ID, 'event_title'.$f, true).'"></td></tr>';
        // echo '<tr><td>行事タイトル'.$f.':</td><td><input name="event_title'.$f.'" value="'.get_post_meta($post->ID, 'event_title'.$f, true).'"></td></tr>';
    }

    echo '</table>';
}

// ==============================
// ギャラリー
// ==============================
function custom_area6(){
    global $post;

    echo '<table>';

    for($i = 1; $i <= 5; $i++){
    echo '<tr><td>ギャラリー画像URL'.$i.'：</td><td><input type="text" name="img-gallery'.$i.'" value="'.get_post_meta($post->ID, 'img-gallery'.$i, true).'"></td>';

    }
    echo '</table>';
}

// ==============================
// アクセス
// ==============================
// 住所
function custom_area7(){
    global $post;

    echo '<table>';

    echo '<tr><td>住所入力欄　：<input type="text" name="access_address" value="'.get_post_meta($post->ID, 'access_address', true).'"></td></tr><br>
        <tr><td>電話番号入力欄　：<input type="text" name="access_tel" value="'.get_post_meta($post->ID, 'access_tel', true).'"></td></tr>';

    echo '</table>';

    echo '<table>';

        for($i = 1; $i <= 2; $i++){
    echo    '<tr><td>車でお越しの方方法入力欄'.$i.'：<input type="text" name="access_car'.$i.'" value="'.get_post_meta($post->ID, 'access_car'.$i, true).'"></td><br>
        <td>電車でお越しの方入力欄'.$i.'　：<input type="text" name="access_tra'.$i.'" value="'.get_post_meta($post->ID, 'access_tra'.$i, true).'"></td></tr>';
}

echo '</table>';
}

// map
function custom_area8(){
    global $post;

    echo 'map　：<textarea cols="50" rows="5" name="map">'.get_post_meta($post->ID, 'map', true).'</textarea><br>';
}


// ==============================
// 質問欄
// ==============================
function custom_area9(){
    global $post;

    echo '<table>';

    for($f = 1; $f <= 3; $f++){
        echo '<tr><td>質問'.$f.':</td><td><input cols="50" rows="5"  name="que'.$f.'" value="'.get_post_meta($post->ID, 'que'.$f, true).'"></td>
        <td>答え'.$f.':</td><td><input name="ans'.$f.'" value="'.get_post_meta($post->ID, 'ans'.$f, true).'"></td></tr>';
}

echo '</table>';
}




// 投稿ボタンを押した際のデータ更新と保存
function save_custom_postdata($post_id){

    $about_msg = '';
    $guide_data = '';
    $map = '';
    $img_top = '';
    $img_about = '';
    $img_event = '';
    $event_title = '';
    $event_data = '';
    $img_gallery = '';
    $access_address = '';
    $access_tel = '';
    $access_car = '';
    $access_tra = '';
    $que = '';
    $ans = '';

    // Top-img
    if(isset($_POST['img-top'])){
        $img_top = $_POST['img-top'];
    }
    if($img_top != get_post_meta($post_id, 'img-top', true)){
        update_post_meta($post_id, 'img-top', $img_top);
    }elseif($img_top = ''){
        delete_post_meta($post_id, 'img-top', get_post_meta($post_id, 'img-top', true));
    }


    // About
    // カスタムフィールドに入力された情報を取り出す
    if(isset($_POST['about_msg'])){
        $about_msg = $_POST['about_msg'];
    }

    // 内容が変わっていた場合、保存していた情報を更新する
    if($about_msg != get_post_meta($post_id, 'about', true)){
        update_post_meta($post_id, 'about', $about_msg);
    }elseif($about_msg == ''){
        delete_post_meta($post_id, 'about', get_post_meta($post_id, 'about', true));
    }

    // About画像
    if(isset($_POST['img-about'])){
        $img_about = $_POST['img-about'];
    }
    if($img_about != get_post_meta($post_id, 'img-about', true)){
        update_post_meta($post_id, 'img-about', $img_about);
    }elseif($img_about = ''){
        delete_post_meta($post_id, 'img-about', get_post_meta($post_id, 'img-about', true));
    }

    // 年間行事
    // 年間行事画像
    if(isset($_POST['img-event'])){
        $img_event = $_POST['img-event'];
    }
    if($img_event != get_post_meta($post_id, 'img-event', true)){
        update_post_meta($post_id, 'img-event', $img_event);
    }elseif($img_event = ''){
        delete_post_meta($post_id, 'img-event', get_post_meta($post_id, 'img-event', true));
    }
     
    // 行事タイトル
    for($f = 1; $f <= 5; $f++){
        if(isset($_POST['event_title'.$f])){
            $event_title = $_POST['event_title'.$f];
        }
        if($event_title  != get_post_meta($post_id, 'event_title'.$f, true)){
            update_post_meta($post_id, 'event_title'.$f, $event_title);
        }elseif($event_title == ''){
            delete_post_meta($post_id, 'event_title'.$f, get_post_meta($post_id, 'event_title'.$f, true));
        }
    }
    // 行事日付
    for($i = 1; $i <= 5; $i++){
        if(isset($_POST['event_date'.$i])){
            $event_data = $_POST['event_date'.$i];
        }
        if($event_data  != get_post_meta($post_id, 'event_date'.$i, true)){
            update_post_meta($post_id, 'event_date'.$i, $event_data);
        }elseif($event_data == ''){
            delete_post_meta($post_id, 'event_date'.$i, get_post_meta($post_id, 'event_date'.$i, true));
        }
    }


    // 案内
    for($i = 1; $i <= 4; $i++){
        if(isset($_POST['guide_info'.$i])){
            $guide_data = $_POST['guide_info'.$i];
        }
        if($guide_data  != get_post_meta($post_id, 'guide_info'.$i, true)){
            update_post_meta($post_id, 'guide_info'.$i, $guide_data);
        }elseif($guide_data == ''){
            delete_post_meta($post_id, 'guide_info'.$i, get_post_meta($post_id, 'guide_info'.$i, true));
        }
    }

    // ギャラリー
    for($i = 1; $i <= 5; $i++){
        if(isset($_POST['img-gallery'.$i])){
            $img_gallery = $_POST['img-gallery'.$i];
        }
        if($img_gallery != get_post_meta($post_id, 'img-gallery'.$i, true)){
            update_post_meta($post_id, 'img-gallery'.$i, $img_gallery);
        }elseif($img_gallery == ''){
            delete_post_meta($post_id, 'img-gallery'.$i, get_post_meta($post_id, 'img-gallery'.$i, true));
        }
    }

    // 住所
    if(isset($_POST['access_address'])){
        $access_address = $_POST['access_address'];
    }
    if($access_address != get_post_meta($post_id, 'access_address', true)){
        update_post_meta($post_id, 'access_address', $access_address);
    }elseif($access_address = ''){
        delete_post_meta($post_id, 'access_address', get_post_meta($post_id, 'access_address', true));
    }

    // 電話
    if(isset($_POST['access_tel'])){
        $access_tel = $_POST['access_tel'];
    }
    if($access_tel != get_post_meta($post_id, 'access_tel', true)){
        update_post_meta($post_id, 'access_tel', $access_tel);
    }elseif($access_tel = ''){
        delete_post_meta($post_id, 'access_tel', get_post_meta($post_id, 'access_tel', true));
    }

    // 車
    for($i = 1; $i <= 2; $i++){
    if(isset($_POST['access_car'.$i])){
        $access_car = $_POST['access_car'.$i];
    }
    if($access_car != get_post_meta($post_id, 'access_car'.$i, true)){
        update_post_meta($post_id, 'access_car'.$i, $access_car);
    }elseif($access_car = ''){
        delete_post_meta($post_id, 'access_car'.$i, get_post_meta($post_id, 'access_car'.$i, true));
    }
}

    // 電車
    for($i = 1; $i <= 2; $i++){
    if(isset($_POST['access_tra'.$i])){
        $access_tra = $_POST['access_tra'.$i];
    }
    if($access_tra != get_post_meta($post_id, 'access_tra'.$i, true)){
        update_post_meta($post_id, 'access_tra'.$i, $access_tra);
    }elseif($access_tra = ''){
        delete_post_meta($post_id, 'access_tra'.$i, get_post_meta($post_id, 'access_tra'.$i, true));
    }
}




    // map
    if(isset($_POST['map'])){
        $map = $_POST['map'];
    }
    if($map != get_post_meta($post_id, 'map', true)){
        update_post_meta($post_id, 'map', $map);
    }elseif($map == ''){
        delete_post_meta($post_id, 'map', get_post_meta($post_id, 'map', true));
    }


    // 質問
    for($f = 1; $f <= 3; $f++){
        if(isset($_POST['que'.$f])){
            $que = $_POST['que'.$f];
        }
        if($que  != get_post_meta($post_id, 'que'.$f, true)){
            update_post_meta($post_id, 'que'.$f, $que);
        }elseif($que == ''){
            delete_post_meta($post_id, 'que'.$f, get_post_meta($post_id, 'que'.$f, true));
        }
    }
    // 行事日付
    for($i = 1; $i <= 3; $i++){
        if(isset($_POST['ans'.$i])){
            $ans = $_POST['ans'.$i];
        }
        if($ans != get_post_meta($post_id, 'ans'.$i, true)){
            update_post_meta($post_id, 'ans'.$i, $ans);
        }elseif($ans == ''){
            delete_post_meta($post_id, 'ans'.$i, get_post_meta($post_id, 'ans'.$i, true));
        }

}
}


// ========================================
// カスタムウィジェット
// ========================================
// ウィジェットエリアを作成する関数がどれなのかを登録する
// add_action('widgets_init', 'my_widgets_area');
// ウィジェット自体の作成する関数がどれなのかを登録する
// add_action( 'widgets_init', function(){
//     register_widget( 'My_Widget' );
//     });


// ========================================
// js読み込み
// ========================================

function my_swiper_styles() {
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/swiper.min.css', array(), false, 'all');
  }
  add_action( 'wp_enqueue_scripts', 'my_swiper_styles');

// function register_script() {
//     //読み込むJavaScriptを登録する
//     wp_register_script( 'swiperjs', get_stylesheet_directory_uri() . '/js/swiper.min.js', array(), '', true );
//     wp_register_script( 'my_swiper01', get_stylesheet_directory_uri() . '/js/libs/hero-slider.js', array('jquery'), '', true );
//     }
//     function add_script() {
//     //登録したJavaScriptを以下の順番で読み込む
//     register_script();
//     wp_enqueue_script( 'swiperjs' );
//     wp_enqueue_script( 'my_swiper01' );
//     }
//     add_action( 'wp_enqueue_scripts', 'add_script' );


function twpp_enqueue_scripts() {
    wp_deregister_script( 'jquery'); 
    wp_enqueue_script( 
      'jquery', 
      get_theme_file_uri() . '/js/jquery-2.2.2.min.js',
      array(),
      '',
      false
    );

    wp_enqueue_script( 
        'swiper-script', 
        get_theme_file_uri('') . '/js/swiper.min.js',
        array(),
        '',
        false
      );

      wp_enqueue_script( 
        'swiper2-script', 
        get_theme_file_uri() . '/js/libs/hero-slider.js',
        array('jquery'),
        '',
        true
      );

      wp_enqueue_script( 
        'scroll-script', 
        get_theme_file_uri() . '/js/libs/scroll.js',
        array(),
        '',
        false
      );

      wp_enqueue_script( 
        'mobile-script', 
        get_theme_file_uri() . '/js/libs/mobile-menu.js',
        array('jquery'),
        '',
        false
      );

      wp_enqueue_script( 
        'tab-script', 
        get_theme_file_uri() . '/js/libs/tab.js',
        array(),
        '',
        true
      );

      wp_enqueue_script( 
        'footer-script', 
        get_theme_file_uri() . '/js/libs/fixfooter.js',
        array('jquery'),
        '',
        true
      );

      wp_enqueue_script( 
        'main-script', 
        get_theme_file_uri() . '/js/main.js',
        array(),
        '',
        false
      );
  }
  add_action( 'wp_enqueue_scripts', 'twpp_enqueue_scripts' );



