<?php
/**
* Category
* 
*/

get_header(); ?>

<?php 
	$category_title = "";
	if(is_category('news')){
		$category_title = "Tin tức";
		// $category_class = ""
	}else if(is_category('recruitment')){
		$category_title = "Tuyển dụng";
	}else if(is_category('promotion')){
		$category_title = "Quyết định";
	}else if(is_category('policy')){
		$category_title = "Chính sách";
	}else if(is_category('activity')){
		$category_title = "Hoạt động";
	}else if(is_category('entertainment')){
		$category_title = "Giải trí";
	}

?>


<div id="SiteBody" class="l-body h-shadow-1">
	<div id="SiteContent" class="l-content l-content--category l-content--<?php echo get_the_category()[0]->slug; ?>" data-js-module="home">
		<div class="l-content__wrapper">
			<ol class="c-breadcrumb">
			  <li class="c-breadcrumb__item"><a href="#">Trang chủ</a></li>
			  <li class="c-breadcrumb__item active">Tin tức</li>
			</ol>
			<div class="l-content__header">
				<h1 class="l-content__title s-color"><?php echo $category_title; ?></h1>
				<div class="l-content__subtitle"><?php echo category_description(); ?></div>
			</div>
			<div class="l-content__body">
				<?php if(have_posts()): ?>
					<div class="l-content__list-news">
						<?php while (have_posts()) : the_post(); ?>
							<div class="c-card c-card--news">
								<a href="<?php the_permalink(); ?>" class="c-card__thumbnail h-bg-cover">
									<div class="h-rectangle h-rectangle--r32">
										<div class="h-rectangle__inner h-bg-cover h-bgc--darker" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
									</div>
								</a>
								<div class="c-card__content">
									<h2 class="c-card__title"><a href="<?php the_permalink(); ?>" class="s-color"><?php the_title(); ?></a></h2>
									<div class="c-card__meta">
										<div class="single-meta"><i class="fas fa-calendar-alt"></i><span><?php echo get_the_date(); ?></span></div>
									</div>
									<div class="c-card__excerpt"><?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" class="s-color see-more see-more--news">Xem thêm</a>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif ?>
				
			</div>
			<div class="l-content__footer">
				<div class="d-flex justify-content-center">
					<div class="c-pagination">
						<?php 
							the_posts_pagination( array(
								  'mid_size' => 2,
								  'prev_text' => '<i class="fas fa-chevron-left"></i>',
								  'next_text' => '<i class="fas fa-chevron-right"></i>',
								  'screen_reader_text' => ''
								)
							);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>