<?php
/**
 * Header
 *
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Updates, News & People of Citigo">
  <meta name="keywords" content="citigo, kiotviet">
  <meta name="author" content="Hiep Ta | henry9.com | contact@henry9.com">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">

	<!-- Styles -->
	<?php wp_head(); ?>

	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
  
</head>

<body <?php body_class(); ?>>
	<div id="SiteContainer" class="site-container p-page">
		<div class="container">
			<div class="p-page__wrapper">
				<header id="SiteHeader" class="l-header l-header--sidebar">
					<button class="header-toggle js-header-toggle">
						<div class="toggle-icon">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</button>
					<nav class="header-nav js-header-nav">
						<h1 class="header-nav__logo">
							<a href="<?php echo home_url(); ?>">
								<img class="logo-image" src="<?php echo get_template_directory_uri() . '/assets/img/logo.png'; ?>" alt="Citigo logo">
								<span class="logo-title"></span>
							</a>
						</h1>
						<?php
							if(is_front_page()){
								if(has_nav_menu('home')){
				          wp_nav_menu(array(
										'menu_class' => 'header-nav__list js-header-nav__list',
										'container' 			=> 'ul',
										'fallback_cb'			=> false,
										'theme_location' => 'home',
				          ));
				        }
							}else{
								if(has_nav_menu('page')){
				          wp_nav_menu(array(
										'menu_class' => 'header-nav__list',
										'container' 			=> 'ul',
										'fallback_cb'			=> false,
										'theme_location' => 'page',
				          ));
				        }
							}
						?>
						<div class="header-nav__search">
							<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
								<div class="form-group">
							 		<input type="search" placeholder="Tìm kiếm" name="s" class="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
									<button type='submit' class="search-submit"><i class="fas fa-search"></i></button>
								</div>
							</form>
						</div>
					</nav>
				</header>