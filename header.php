<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
  

    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
    <!-- <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Noto+Sans+JP:wght@100&family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <!-- WordPress管理画面などから設定した内容が反映される -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>