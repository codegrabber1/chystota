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
		    <div class="container">
			<div class="row">
				<div class="col-2 order-3 col-sm-3 order-sm-3 col-md-7 order-md-2 ">
                    <div class="mobile-mnu d-md-none d-lg-none clearfix">
                        <a class="toggle-mnu  d-lg-none" href="#">
                            <span></span>
                        </a>
                    </div>
					<nav id="site-navigation" class="main-navigation">

						<?php
						wp_nav_menu( array(
							'theme_location'	=> 'menu-1',
							'menu_id'			=> 'primary-menu',
							'menu_class'		=> 'header__list',
							'container'			=> 'ul',
							// 'fallback_cb'    	=> '__return_empty_string',
		                    'depth'          	=> 0
						) );
						?>
                        <div class="soc-icons">
                            hello
                        </div>
					</nav><!-- #site-navigation -->
				</div>
				<div class="col-4 order-1 col-sm-4 order-sm-1 col-md-2 order-md-1">
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
				<div class="col-6 order-2 col-sm-5 order-sm-2 col-md-3 order-md-3">
					<ul class="header-info">
						<?php if( mcw_get_option( 'mcw_phone' ) ): ?>
						    <li class="show_phone"><?php echo mcw_get_option( 'mcw_phone' )?></li>
						<?php endif; ?>
						<?php if( mcw_get_option( 'mcw_phone_kyiv' ) ):?>
						    <li style="display: none"><?php echo mcw_get_option( 'mcw_phone_kyiv' )?></li>
						<?php endif;?>
                        <li>
                            <div class="ui dropdown">
                                <input type="hidden" name="gender">
                                <div class="ui top left pointing dropdown">
                                <div class="default text">
                                    <a href="#">Львів</a>

                                </div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item " data-value="lviv">Львів</a>
                                    <a class="item" data-value="kyiv">Киів</a>
                                </div>
                                </div>
                            </div>
                        </li>
					</ul>
				</div>
			</div>
		</div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
