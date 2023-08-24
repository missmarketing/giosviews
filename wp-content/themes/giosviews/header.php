<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Montserrat&display=swap"
        rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="hfeed">
        <header id="header" role="banner">

            <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                <?php wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'orderby' => 'menu_order',
                    ]); ?>
                <!-- switcher de idiomas -->
                <div class="language-switcher">
                    <?php pll_the_languages( array( 'dropdown' => 1 ) ); ?>
                </div>
            </nav>

            <div class="mobile">
            <div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/imgs/logo-2.png" alt="Logo"></div>
                <div class="menu-button">
                    <svg class="vbp-header-menu-button__svg">
                        <line x1="0" y1="50%" x2="100%" y2="50%" class="top" shape-rendering="crispEdges" />
                        <line x1="0" y1="50%" x2="100%" y2="50%" class="middle" shape-rendering="crispEdges" />
                        <line x1="0" y1="50%" x2="100%" y2="50%" class="bottom" shape-rendering="crispEdges" />
                    </svg>
                </div>
                


                <div class="menu-mobile clearfix">

                    <nav id="menu-mobile" role="navigation" itemscope
                        itemtype="https://schema.org/SiteNavigationElement">
                        <?php wp_nav_menu([
                            'theme_location' => 'main-menu',
                            'orderby' => 'menu_order',
                            ]); ?>
                    </nav>

                    <div class="social">
                        <p class="connect">Connect</p>
                        <div class="icons">
                        <?php include TEMPLATEPATH.'/social-media-links.php'; ?>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <div id="container">
            <main id="content" role="main">