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
    
    
	<?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
 
<div id="page" class="site">
    <header id="masthead" class="header">
        <div class="site-header">
            <div class="logo-block order-1" >
		        <?php if( mcw_get_option( 'mcw_logo_url' ) ):?>
                    <a href="<?php echo home_url();?>"><img src="<?php echo mcw_get_option( 'mcw_logo_url' )?>" alt="<?php bloginfo('name')?>"></a>
		        <?php endif; ?>
            </div><!--#Brand zone-->

            <div class="menu-block order-3 order-sm-3 order-md-2" >

                <nav id="site-navigation" class="main-navigation">
                    <?php
                        wp_nav_menu( array(
                            'theme_location'	=> 'menu-1',
                            'menu_id'			=> 'primary-menu',
                            'menu_class'		=> 'menu__list',
                            'container'			=> 'ul',
                            'depth'          	=> 0
                        ) );
                    ?>

                </nav><!-- #site-navigation -->
           </div>

            <div class="city-head order-2 order-sm-2 order-md-3" >
                <ul class="header-info">
			        <?php if( mcw_get_option( 'mcw_phone' ) ): ?>
                        <li class="show_phone active">
                            <a href="tel:<?php echo mcw_get_option( 'mcw_phone' )?>"><?php echo mcw_get_option( 'mcw_phone' )?></a>
                        </li>
			        <?php endif; ?>
                    <li class="d-none d-sm-none d-md-none d-lg-block">
                        <div class="custom-select" >
                            <select id="Mobility" class="ui dropdown">
                                <option class="item" value="<?php echo mcw_get_option( 'mcw_phone' )?>"><?php  _e('Львов', 'chystota');?></option>
                                <option class="item" value="<?php echo mcw_get_option( 'mcw_phone_kyiv' )?>"><?php  _e('Киев', 'chystota');?></option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="lang-switcher d-none d-sm-none d-md-none d-lg-block order-md-4" >
		        <?php echo mcw_polylang_languages()?>
            </div>

            <div class="mobile-mnu d-md-block d-lg-none order-5">
                <a class="toggle-mnu d-lg-none" href="#">
                    <span></span>
                </a>
            </div>
            <!-- Mobile phones-->
            <div class="mobile-menu">
                <div class="cityname d-block d-sm-block d-md-block d-lg-none">
                    <div class="custom-select" >
                        <select id="mobil" class="ui dropdown">
                            <option class="item" value="<?php echo mcw_get_option( 'mcw_phone' )?>"><?php echo __('Львов', 'chystota');?></option>
                            <option class="item" value="<?php echo mcw_get_option( 'mcw_phone_kyiv' )?>"><?php echo __('Киев', 'chystota');?></option>
                        </select>
                    </div>
                </div>
	            <?php
                    wp_nav_menu( array(
                        'theme_location'	=> 'menu-1',
                        'menu_id'			=> 'primary-menu',
                        'menu_class'		=> 'menu__list',
                        'container'			=> 'ul',
                        'depth'          	=> 0
                    ) );
	            ?>
                <div class="soc-icons d-md-block d-lg-none">
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

                <div class="lang-switcher d-md-block d-lg-none">
		            <?php echo mcw_polylang_languages()?>
                </div>
            </div>
        </div>
	</header><!-- #masthead -->

    
    <!-- <div id="geocity" class="display: none">
        <div class='cityLink'>
            <p>Your cite is :</p>
            <ul>
                <li><a href="#" data-option="Львів" class="ihs-city active">Львів</a></li>
                <li><a href="#" data-option="Київ" class="cityName">Ні, Київ</a></li>
            </ul>
        </div>
    </div> -->
    
	<div id="content" class="site-content">
   