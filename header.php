<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
  <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ie/selectivizr-min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ie/rem.min.js"></script>
  <![endif]-->
</head>
<body <?php body_class(); ?>>

  <header class="top wrap">

    <?php if ( ! is_home() && is_front_page() ) : ?>
      <h1 class="sitename"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>"><?php bloginfo('title'); ?></a></h1>
    <?php else : ?>
      <p class="sitename"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>"><?php bloginfo('title'); ?></a></p>
    <?php endif; ?>

    <?php wp_nav_menu( array(
      'container' => 'nav',
      'container_class' => 'primary-menu',
      'theme_location' => 'header_primary'
    ) ); ?>

  </header>

  <section role="main" class="content">

    <div class="wrap">
