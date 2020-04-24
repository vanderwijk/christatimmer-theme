<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--
Website development by VanderWijk Consultancy - http://vanderwijk.nl
-->
<meta charset='<?php bloginfo( 'charset' ); ?>' />
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />
<meta name='application-name' content='<?php bloginfo('name'); ?>' />
<meta name='apple-mobile-web-app-title' content='<?php bloginfo('name'); ?>' />
<link rel='icon' type='image/x-icon' href='<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico' />
<link rel='apple-touch-icon' sizes='144x144' href='<?php echo get_stylesheet_directory_uri(); ?>/img/touch-icon-ipad-retina.png' />
<link rel='profile' href='http://gmpg.org/xfn/11' />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<div class="top" id="top">
			<div class="row">
				<div class="col">
					<div class="block">
						<button class="menu-toggle" id="menu-toggle"><?php _e( 'Menu', 'fran' ); ?></button>

<?php if ( !get_theme_mod ( 'show_search' ) == '' ) { ?>
						<form class="searchform" method="get" action="<?php echo home_url(); ?>/">
							<input type="text" placeholder="<?php _e('Search', 'fran'); ?>" name="s" />
							<input type="submit" value="&#xf179;" />
						</form>
<?php } ?>

						<nav class="nav" id="nav" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
							<?php wp_nav_menu( array( 'theme_location' => 'header', 'container' => false ) ); ?>
						</nav>

<?php if ( !get_theme_mod ( 'show_login' ) == '' ) {
	if ( is_user_logged_in() ) { ?>
		<a href="<?php echo wp_logout_url(); ?>" title="<?php _e('Logout', 'fran'); ?>" class="login-logout-link"><?php _e('Logout', 'fran'); ?></a>
	<?php } else { ?>
		<a href="<?php echo wp_login_url( get_permalink() ); ?>" title="<?php _e('Login', 'fran'); ?>" class="login-logout-link"><?php _e('Login', 'fran'); ?></a>
	<?php }
} ?>

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="block">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<h2 class="site-title"><?php bloginfo( 'name' ); ?></h2>
					</a>
					<a href="/abonnement/registreren/" class="nieuw">
						<img src="/wp-content/themes/christatimmer/img/nieuw.svg" alt="Nieuw" onerror="this.src='/wp-content/themes/christatimmer/img/nieuw.png'">
					</a>
					<a href="/cursus/billen-benen-buik-training/" class="gratis">
						<img src="/wp-content/themes/christatimmer/img/gratis.svg" alt="Gratis" onerror="this.src='/wp-content/themes/christatimmer/img/gratis.png'">
					</a>
					<a href="/abonnement/registreren/" class="korting">
						<img src="/wp-content/themes/christatimmer/img/korting.svg" alt="Korting" onerror="this.src='/wp-content/themes/christatimmer/img/korting.png'">
					</a>
				</div>
			</div>
		</div>
	</header>
<?php if ( ! dynamic_sidebar( 'intro' ) ) : endif ?>
	<div class="main" role="main">