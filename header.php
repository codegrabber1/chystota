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

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-2 order-sm-1 col-md-2 col-lg-7 order-sm-3">
					<nav id="site-navigation" class="main-navigation">
						<div class="mobile-mnu d-lg-none clearfix">
							<h1 class="site-title">
			                <a class="toggle-mnu d-lg-none" href="#">
			                    <span></span>
			                </a>
			                </h1>
		            	</div>
						<?php
						wp_nav_menu( array(
							'theme_location'	=> 'menu-1',
							'menu_id'			=> 'primary-menu',
							'menu_class'		=> 'sf-menu',
							'container'			=> 'ul',
							// 'fallback_cb'    	=> '__return_empty_string',
		                    'depth'          	=> 0
						) );
						?>
					</nav><!-- #site-navigation -->
				</div>
				<div class="col-xs-10 order-sm-2 col-md-4 col-lg-2 order-sm-1">
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
				<div class="col-xs-12 order-sm-3 col-md-6 col-lg-3 order-sm-2">
					<ul class="header-info">
						<?php if( mcw_get_option( 'mcw_phone' ) ): ?>
						<li class="show_phone"><?php echo mcw_get_option( 'mcw_phone' )?></li>
						<?php endif; ?>
						<?php if( mcw_get_option( 'mcw_phone_kyiv' ) ):?>
						<li style="display: none"><?php echo mcw_get_option( 'mcw_phone_kyiv' )?></li>
						<?php endif;?>
						<li><a href="#" class="active">Львів</a></li>
						<li><a href="#" class="">Киів</a></li>
					</ul>
				</div>
			</div>
		</div>



	</header><!-- #masthead -->

	<div id="content" class="site-content">
