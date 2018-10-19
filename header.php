<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Treville
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="hfeed site">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'treville' ); ?></a>

		<header id="masthead" class="site-header clearfix" role="banner">

                    <div id="cabecalhoIGc" class="flex-container">
                        <div id="allIGc" class="container">
                            <div id="logoIGc">
                                <a href="http://sites.igc.usp.br"><img src="/wp-content/themes/treville-igc-subsites/igcLogotipoColorido.png" /></a>
                            </div>
                            <div id="utilsIGc">
                                
                                
<form role="search" method="get" class="search-form" action="https://google.com/search">
    
        <label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'treville' ); ?></span>
                
		<input type="search" class="search-field"
			placeholder="<?php echo esc_attr_x( 'Procurar &hellip;', 'placeholder', 'treville' ); ?>"
			value="<?php echo get_search_query(); ?>" name="q"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'treville' ); ?>" />         
	</label>
	<button type="submit" class="search-submit">
		<span class="genericon-search"></span>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'treville' ); ?></span>
	</button>
        <input type="hidden" name="sitesearch" value="igc.usp.br">
    
</form>                                
                                
                                
                            </div>
                        </div>
                    </div>                    
                    
			<div class="header-main container clearfix">

				<div id="logo" class="site-branding clearfix">

                                    <?php treville_site_logo(); ?>
                                    <?php treville_site_title(); ?>
                                    <?php treville_site_description(); ?>

				</div><!-- .site-branding -->

				<div id="header-navigation" class="header-area">

					<?php if ( has_nav_menu( 'secondary' ) ) : ?>

						<nav id="top-navigation" class="secondary-navigation navigation clearfix" role="navigation">

							<?php
								// Display Top Navigation.
								wp_nav_menu( array(
									'theme_location' => 'secondary',
									'container_class' => 'top-navigation-menu-wrap',
									'menu_class' => 'top-navigation-menu',
								) );
							?>

						</nav><!-- #top-navigation -->

					<?php else :

						// Create empty wrapper for mobile menu.
						echo '<div class="top-navigation-menu-wrap"></div>';

					endif; ?>

					<?php do_action( 'treville_header_area' ); ?>

				</div>

			</div><!-- .header-main -->

			<?php if ( has_nav_menu( 'primary' ) ) : ?>

				<div id="main-navigation-wrap" class="main-navigation-wrap clearfix">

					<nav id="main-navigation" class="primary-navigation navigation container clearfix" role="navigation">

						<?php
							// Display Main Navigation.
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'main-navigation-menu',
							) );

							do_action( 'treville_header_search' );
						?>

					</nav><!-- #main-navigation -->

				</div>

			<?php endif; ?>

		</header><!-- #masthead -->

		<?php treville_header_image(); ?>

		<?php treville_slider(); ?>

		<?php treville_breadcrumbs(); ?>

		<div id="content" class="site-content container clearfix">
