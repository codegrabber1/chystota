<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chystota
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
    
	<?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="header">
        <div class="site-header">
		    <div class="container-fluid">
			<div class="row">
                <div class="col-7 order-2 col-sm-7 order-sm-2 col-md-3 order-md-3">
                    <ul class="header-info">
						<?php if( mcw_get_option( 'mcw_phone' ) ): ?>
                            <li class="show_phone ">
                                <a href="tel:<?php echo mcw_get_option( 'mcw_phone' )?>"><?php echo mcw_get_option( 'mcw_phone' )?></a></li>
						<?php endif; ?>
                        <li class="d-none d-sm-none d-md-none d-lg-block">
                            <div class="custom-select" >
                                <select id="Mobility">
                                    <option class="item" value="<?php echo mcw_get_option( 'mcw_phone' )?>">Львів</option>
                                    <option class="item" value="<?php echo mcw_get_option( 'mcw_phone_kyiv' )?>">Київ</option>
                                </select>
                            </div
                        </li>
                    </ul>
                    <div class="lang-switcher d-none d-sm-none d-md-none d-lg-block">
                        <div id="google_translate_element2"></div>
                        <!-- GTranslate: https://gtranslate.io/ -->
                        <a href="#" id="ua" onclick="doGTranslate('uk|uk');return false;" title="Ukrainian" class="active glink nturl notranslate">UA</a>
                        <span> | </span>
                        <a href="#" id="ru" onclick="doGTranslate('uk|ru');return false;" title="Russian" class="glink nturl notranslate">RU</a>

                    </div>
                </div>
                <div class="col-2 order-3 col-sm-2 order-sm-3 col-md-7 order-md-2">
                    <div class="mobile-mnu d-md-none d-lg-none clearfix">
                        <a class="toggle-mnu d-lg-none" href="#">
                            <span></span>
                        </a>
                    </div>
					<nav id="site-navigation" class="main-navigation">
                        <div class="cityname d-block d-sm-block d-md-none d-lg-none">
                            <div class="ui selection dropdown" id="citynames">
                                <div class="default text">Львів</div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div data-value="lviv" class="item">Львів</div>
                                    <div data-value="Kyiv" class="item">Київ</div>
                                </div>
                            </div>
                        </div>
                        <?php
						wp_nav_menu( array(
							'theme_location'	=> 'menu-1',
							'menu_id'			=> 'primary-menu',
							'menu_class'		=> 'header__list',
							'container'			=> 'ul',
							'depth'          	=> 0
						) );
						?>
                        <div class="soc-icons d-md-none d-lg-none">
                            <ul class="menu-social clearfix">
		                        <?php if( mcw_get_option( 'mcw_fb_url' ) ):?>
                                    <li><a href="<?php echo mcw_get_option( 'mcw_fb_url' )?>">
                                            <i class="fab fa-facebook"></i></a></li>
		                        <?php endif;?>
		                        <?php if( mcw_get_option( 'mcw_inst_url' ) ):?>
                                    <li><a href="<?php echo mcw_get_option( 'mcw_inst_url' )?>"><i class="fab fa-instagram"></i></a></li>
		                        <?php endif;?>
		                        <?php if( mcw_get_option( 'mcw_youtube_url' ) ):?>
                                    <li><a href="<?php echo mcw_get_option( 'mcw_youtube_url' )?>">
                                            <i class="fab fa-youtube"></i>
                                        </a></li>
		                        <?php endif;?>
                                <li><a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2859 3333" shape-rendering="geometricPrecision" width="18" height="18" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><path fill="#000" d="M2081 0c55 473 319 755 778 785v532c-266 26-499-61-770-225v995c0 1264-1378 1659-1932 753-356-583-138-1606 1004-1647v561c-87 14-180 36-265 65-254 86-398 247-358 531 77 544 1075 705 992-358V1h551z"/></svg>
                                        </a></li>
                            </ul>
                        </div>

                        <div class="lang-switcher d-md-none d-lg-none">
                            <div id="google_translate_element2"></div>
                            <!-- GTranslate: https://gtranslate.io/ -->
                            <a href="#" id="ua" onclick="doGTranslate('uk|uk');return false;" title="Ukrainian" class="active glink nturl notranslate">UA</a>
                            <span> | </span>
                            <a href="#" id="ru" onclick="doGTranslate('uk|ru');return false;" title="Russian" class="glink nturl notranslate">RU</a>

                        </div>
					</nav><!-- #site-navigation -->
				</div>
                <div class="col-3 order-1 col-sm-3 order-sm-1 col-md-2 order-md-1">
					<div class="site-branding">
						<div class="header-logo">
                            <p>
                                <?php if( mcw_get_option( 'mcw_logo_url' ) ):?>
                                    <a href="<?php echo home_url();?>"><img src="<?php echo mcw_get_option( 'mcw_logo_url' )?>" alt="<?php bloginfo('name')?>"></a>
                                <?php endif; ?>
                            </p>
                        </div>
					</div><!-- .site-branding -->
				</div>
			</div>
		</div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">