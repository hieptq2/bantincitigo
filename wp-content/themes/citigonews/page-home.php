<?php
/**
* Template Name: Home
*/

get_header(); ?>

<!-- page-home -->

<div id="SiteBody" class="l-body h-shadow-1">
	<div id="SiteContent" class="l-content l-content--home" data-js-module="home">
		<div class="l-content__wrapper">
			<div class="l-main-content">

				<!-- Home cover -->
				<?php 
					$home_cover = array(
						'post_type' => 'home_slider',
						'post_per_page' => -1
					);
					$home_cover__query = new WP_Query($home_cover);
				?>
				<?php if($home_cover__query->have_posts()) : $count = 0; ?>
					<div class="l-cover">
						<div id="Carousel__Home--cover" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner">
						  	<?php while ($home_cover__query->have_posts()) : $home_cover__query->the_post(); ?>
						  		<?php 
						  			$show 		= get_field('show');
						  			$image 		= get_field('image');
						  			$href 		= get_field('link_to');
						  			$open_in	= get_field('open_in');

						  			if($show):
						  		?>
								    <a href="<?php echo $href; ?>" 
								    	class="carousel-item<?php if($count == 0){ echo " active"; } ?>" 
								    	<?php if($open_in == "new-tab") echo ' target="_blank"' ?> >
								      <div class="h-rectangle h-rectangle--r21">
								      	<div class="h-rectangle__inner h-bg-cover" style="background-image: url('<?php the_field('image'); ?>')"></div>
								      </div>
								    </a>
							    <?php endif; $count++; ?>
							  <?php endwhile; ?>
						  </div>
						  <a class="l-cover__control l-cover__control--prev" href="#Carousel__Home--cover" role="button" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
						  <a class="l-cover__control l-cover__control--next" href="#Carousel__Home--cover" role="button" data-slide="next"><i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
				<?php wp_reset_postdata(); endif; ?>
				<!-- END Home cover -->

				<!-- Home news -->
				<?php 
					$post_category_news = array(
						'post_type' => 'post',
						'post_per_page' => 4,
						'category_name' => 'news'
					);
					$post_category_news__query = new WP_Query($post_category_news);
				?>
				<?php if($post_category_news__query->have_posts()): ?>
					<div id="Section__Home--news" class="l-home l-home--news">
						<div class="l-home__header h-bgc--gradient-blue">
							<h2 class="l-home__title"><a href="<?php echo home_url() . '/category/news'; ?>"><i class="title-icon far fa-newspaper"></i>Tin tức</a></h2>
						</div>
						<div class="l-home__content">
							<div class="l-home__list-news l-home__list-news--odds">
								<?php while($post_category_news__query->have_posts()) : $post_category_news__query->the_post(); ?>
									<div class="c-card c-card--news">
										<a href="#" class="c-card__thumbnail h-bg-cover">
											<div class="h-rectangle h-rectangle--r32">
												<div class="h-rectangle__inner h-bg-cover h-bgc--darker" style="background-image: url('<?php the_post_thumbnail_url() ?>');"></div>
											</div>
										</a>
										<div class="c-card__content">
											<h3 class="c-card__title"><a href="#" class="s-color"><?php the_title(); ?></a></h3>
											<div class="c-card__excerpt"><?php the_excerpt(); ?>
												<a href="<?php the_permalink() ?>" class="s-color see-more see-more--news">Xem thêm</a>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
						<div class="l-home__footer">
							<div class="text-center"><a href="<?php echo get_template_directory_uri() . '/category/news'; ?>" class="btn c-button c-button--default-outline px-4">Xem thêm tin tức</a></div>
						</div>
					</div>
				<?php wp_reset_postdata(); endif; ?>
				<!-- END Home news -->

				<!-- Home honor-->
				<?php 
					$post_honored_members = array(
						'post_type' => 'honored_members',
						'post_per_page' => 1
					);
					$post_honored_members__query = new WP_Query($post_honored_members);
				?>
				<?php if($post_honored_members__query->have_posts()): ?>
					<div id="Section__Home--honor" class="l-home l-home--honor">
						<div class="l-home__header h-bgc--gradient-yellow">
							<h2 class="l-home__title"><a href="<?php echo home_url() . '/honored-members/'; ?>"><i class="title-icon fas fa-award"></i>Vinh danh công dân</a></h2>
						</div>
						<div class="l-home__content">
							<?php while($post_honored_members__query->have_posts()) : $post_honored_members__query->the_post(); ?>
								<div class="row justify-content-center">
									<div class="col-md-10">
										<div class="l-home__post-content"><!-- s-color -->
											<?php the_field('introduction'); ?>
											<p class="text-center"><a href="<?php the_permalink(); ?>">Xem chi tiết</a></p>
										</div>
									</div>
								</div>
								<div class="l-home__list-honors">
									<?php if(have_rows('award')): ?>
										<div class="row">
											<?php while (have_rows('award')) : the_row(); 
												$member_award = get_sub_field('award-name');
												$post_objects = get_sub_field('award-winner');
											?>
												<div class="col-6 col-md-4">
													<div class="c-card c-card--member">
														<div class="c-card__thumbnail h-bg-cover h-bgc--darker" style="background-image: url('<?php echo get_field('avatar', $post_objects); ?>')"></div>
														<div class="c-card__content c-card__content--honored-member">
															<h3 class="c-card__member-title"><?php echo get_the_title($post_objects); ?></h3>
															<div class="c-card__member-award s-color"><?php echo $member_award; ?></div>
														</div>
													</div>
												</div>
											<?php endwhile;  ?>
										</div>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						</div>
						<div class="l-home__footer">
							<div class="text-center"><a href="<?php echo home_url() . '/honored-members/'; ?>" class="btn c-button c-button--default-outline px-4">Xem các tháng trước</a></div>
						</div>
					</div>
				<?php wp_reset_postdata(); endif; ?>
					
				<!-- END Home honor -->

				<!-- Home new member -->
				<?php 
					$post_new_members = array(
						'post_type' => 'new_members',
						'post_per_page' => 1
					);
					$post_new_members__query = new WP_Query($post_new_members);
				?>
				<?php if($post_new_members__query->have_posts()): ?>
					<div id="Section__Home--member" class="l-home l-home--member">
						<div class="l-home__header h-bgc--gradient-green">
							<h2 class="l-home__title"><a href="<?php echo home_url() . '/new-members/'; ?>"><i class="title-icon fas fa-user-check"></i>Công dân mới</a></h2>
						</div>
						<div class="l-home__content">
							<?php while($post_new_members__query->have_posts()) : $post_new_members__query->the_post(); ?>
								<div class="row justify-content-center">
									<div class="col-md-10">
										<div class="l-home__post-content text-center"><!-- s-color -->
											<p><?php the_field('introduction'); ?></p>
										</div>
									</div>
								</div>
								<div class="l-home__list-members">
									<div class="row">
										<?php $post_objects = get_field('new_members'); ?>
										<?php	if($post_objects): foreach($post_objects as $post_object): ?>
											<div class="col-6 col-md-4">
												<div class="c-card c-card--member">
													<div class="c-card__thumbnail h-bg-cover h-bgc--darker" style="background-image: url('<?php echo get_field('avatar', $post_object); ?>')"></div>
													<div class="c-card__content c-card__content--new-member">
														<h3 class="c-card__member-title s-color"><?php echo get_the_title($post_object); ?></h3>
														<div class="c-card__member-group"><?php echo get_the_terms($post_object->ID, 'department')[0]->name; ?></div>
													</div>
												</div>
											</div>
										<?php endforeach; endif; ?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
						<div class="l-home__footer">
							<div class="text-center"><a href="<?php echo home_url() . '/new-members/'; ?>" class="btn c-button c-button--default-outline px-4">Xem thêm các tin trước</a></div>
						</div>
					</div>
				<?php wp_reset_postdata(); endif; ?>
				<!-- END Home new member -->

				<!-- Home recruitment -->
				<?php 
					$post_category_recruitment = array(
						'post_type' => 'post',
						'post_per_page' => 2,
						'category_name' => 'recruitment'
					);
					$post_category_recruitment__query = new WP_Query($post_category_recruitment);
				?>
				<?php if($post_category_recruitment__query->have_posts()): ?>
					<div id="Section__Home--recruitment" class="l-home l-home--recruitment">
						<div class="l-home__header h-bgc--gradient-light-blue">
							<h2 class="l-home__title"><a href="<?php echo home_url() . '/category/recruitment'; ?>"><i class="title-icon fas fa-users"></i>Tuyển dụng</a></h2>
						</div>
						<div class="l-home__content">
							<div class="l-home__list-news-2">
								<div class="row">
									<?php while($post_category_recruitment__query->have_posts()) : $post_category_recruitment__query->the_post(); ?>
										<div class="col-12 col-md-6">
											<div class="c-card c-card--news-2">
												<a href="#" class="c-card__thumbnail h-bg-cover">
													<div class="h-rectangle h-rectangle--r21">
														<div class="h-rectangle__inner h-bg-cover h-bgc--darker" style="background-image: url('<?php the_post_thumbnail_url() ?>');"></div>
													</div>
												</a>
												<div class="c-card__content">
													<h3 class="c-card__title"><a href="#" class="s-color"><?php the_title(); ?></a></h3>
													<div class="c-card__info">
														<i class="info-icon fas fa-map-marker-alt"></i>
														<span class="info-data"><?php the_field('location'); ?></span>
													</div>
													<div class="c-card__info">
														<i class="info-icon fas fa-user-tag"></i>
														<span class="info-data"><?php the_field('level'); ?></span>
													</div>
												</div>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						</div>
						<div class="l-home__footer">
							<div class="text-center"><a href="<?php echo home_url() . '/category/recruitment'; ?>" class="btn c-button c-button--default-outline px-4">Xem thêm tin tuyển dụng</a></div>
						</div>
					</div>
				<?php wp_reset_postdata(); endif; ?>
				<!-- END Home recruitment -->

				<!-- Home promotion -->
				<?php 
					$post_category_promotion = array(
						'post_type' => 'post',
						'post_per_page' => 2,
						'category_name' => 'promotion'
					);
					$post_category_promotion__query = new WP_Query($post_category_promotion);
				?>
				<?php if($post_category_promotion__query->have_posts()): ?>
					<div id="Section__Home--promotion" class="l-home l-home--promotion">
						<div class="l-home__header h-bgc--gradient-cyan">
							<h2 class="l-home__title"><a href="<?php echo home_url() . '/category/promotion'; ?>"><i class="title-icon fas fa-edit"></i>Quyết định</a></h2>
						</div>
						<div class="l-home__content">
							<div class="l-home__list-news">
								<div class="row">
									<?php while($post_category_promotion__query->have_posts()) : $post_category_promotion__query->the_post(); ?>
										<div class="col-12 col-md-6">
											<div class="c-card c-card--news-2">
												<a href="<?php the_permalink(); ?>" class="c-card__thumbnail h-bg-cover">
													<div class="h-rectangle h-rectangle--r21">
														<div class="h-rectangle__inner h-bg-cover h-bgc--darker" style="background-image: url('<?php the_post_thumbnail_url() ?>');"></div>
													</div>
												</a>
												<div class="c-card__content">
													<h3 class="c-card__title h-fw--700"><a href="<?php the_permalink(); ?>" class="s-color"><?php the_title() ?></a></h3>
													<div class="c-card__info">
														<i class="info-icon fas fa-map-marker-alt"></i>
														<span class="info-data"><?php the_field('location'); ?></span>
													</div>
													<div class="c-card__info">
														<i class="info-icon fas fa-user-tag"></i>
														<span class="info-data"><?php the_field('position'); ?></span>
													</div>
												</div>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						</div>
						<div class="l-home__footer">
								<div class="text-center"><a href="<?php echo home_url() . '/category/promotion'; ?>" class="btn c-button c-button--default-outline px-4">Xem thêm quyết định</a></div>
							</div>
					</div>
				<?php wp_reset_postdata(); endif; ?>
				<!-- END Home promotion -->

				<!-- Home policy -->
				<?php 
					$post_category_policy = array(
						'post_type' => 'post',
						'post_per_page' => 2,
						'category_name' => 'policy'
					);
					$post_category_policy__query = new WP_Query($post_category_policy);
				?>
				<?php if($post_category_policy__query->have_posts()): ?>
					<div id="Section__Home--policy" class="l-home l-home--policy">
						<div class="l-home__header h-bgc--gradient-violet">
							<h2 class="l-home__title"><a href="<?php echo home_url() . '/category/policy'; ?>"><i class="title-icon fas fa-check-double"></i>Chính sách</a></h2>
						</div>
						<div class="l-home__content">
							<div class="l-home__list-news l-home__list-news--odds">
								<?php while($post_category_policy__query->have_posts()) : $post_category_policy__query->the_post(); ?>
									<div class="c-card c-card--news">
										<a href="<?php the_permalink(); ?>" class="c-card__thumbnail h-bg-cover">
											<div class="h-rectangle h-rectangle--r32">
												<div class="h-rectangle__inner h-bg-cover h-bgc--darker" style="background-image: url('<?php the_post_thumbnail_url() ?>');"></div>
											</div>
										</a>
										<div class="c-card__content">
											<h3 class="c-card__title"><a href="<?php the_permalink(); ?>" class="s-color"><?php the_title(); ?></a></h3>
											<div class="c-card__excerpt"><?php the_excerpt(); ?>
												<a href="<?php the_permalink(); ?>" class="s-color see-more see-more--news">Xem thêm</a>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
						<div class="l-home__footer">
							<div class="text-center"><a href="<?php echo home_url() . '/category/policy'; ?>" class="btn c-button c-button--default-outline px-4">Xem thêm các chính sách</a></div>
						</div>
					</div>
				<?php wp_reset_postdata(); endif; ?>
				<!-- END Home policy -->

				<!-- Home activity -->
				<?php 
					$post_category_activity = array(
						'post_type' => 'post',
						'post_per_page' => 2,
						'category_name' => 'activity'
					);
					$post_category_activity__query = new WP_Query($post_category_activity);
				?>
				<?php if($post_category_activity__query->have_posts()): ?>
				<div id="Section__Home--activity" class="l-home l-home--activity">
					<div class="l-home__header h-bgc--gradient-light-violet">
						<h2 class="l-home__title"><a href="<?php echo home_url() . '/category/activity'; ?>"><i class="title-icon fas fa-running"></i>Hoạt động</a></h2>
					</div>
					<div class="l-home__content">
						<div class="l-home__list-news l-home__list-news--odds">
							<?php while($post_category_activity__query->have_posts()) : $post_category_activity__query->the_post(); ?>
								<div class="c-card c-card--news">
									<a href="<?php the_permalink(); ?>" class="c-card__thumbnail h-bg-cover">
										<div class="h-rectangle h-rectangle--r32">
											<div class="h-rectangle__inner h-bg-cover h-bgc--darker" style="background-image: url('<?php the_post_thumbnail_url() ?>');"></div>
										</div>
									</a>
									<div class="c-card__content">
										<h3 class="c-card__title"><a href="<?php the_permalink(); ?>" class="s-color"><?php the_title(); ?></a></h3>
										<div class="c-card__excerpt"><?php the_excerpt(); ?>
											<a href="<?php the_permalink(); ?>" class="s-color see-more see-more--news">Xem thêm</a>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
					<div class="l-home__footer">
						<div class="text-center"><a href="<?php echo home_url() . '/category/activity'; ?>" class="btn c-button c-button--default-outline px-4">Xem thêm hoạt động</a></div>
					</div>
				</div>
				<?php wp_reset_postdata(); endif; ?>
				<!-- END Home activity -->

				<!-- Home entertainment -->
				<?php 
					$post_category_entertainment = array(
						'post_type' => 'post',
						'post_per_page' => 2,
						'category_name' => 'entertainment'
					);
					$post_category_entertainment__query = new WP_Query($post_category_entertainment);
				?>
				<?php if($post_category_entertainment__query->have_posts()): ?>
				<div id="Section__Home--entertainment" class="l-home l-home--entertainment">
					<div class="l-home__header h-bgc--gradient-orange">
						<h2 class="l-home__title"><a href="<?php echo home_url() . '/category/entertainment'; ?>"><i class="title-icon far fa-laugh"></i>Giải trí</a></h2>
					</div>
					<div class="l-home__content">
						<div class="l-home__list-news">
							<?php while($post_category_entertainment__query->have_posts()) : $post_category_entertainment__query->the_post(); ?>
								<div class="c-card c-card--news c-card--entertainment">
									<a href="<?php the_permalink(); ?>" class="c-card__thumbnail c-card__thumbnail--sm h-bg-cover">
										<div class="h-rectangle h-rectangle--r32">
											<div class="h-rectangle__inner h-bg-cover h-bgc--darker" style="background-image: url('<?php the_post_thumbnail_url() ?>');"></div>
										</div>
									</a>
									<div class="c-card__content">
										<h3 class="c-card__title"><a href="<?php the_permalink(); ?>" class="s-color"><?php the_title(); ?></a></h3>
										<div class="c-card__excerpt"><?php the_excerpt(); ?>
											<a href="<?php the_permalink(); ?>" class="s-color see-more see-more--news">Xem thêm</a>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
					<div class="l-home__footer">
						<div class="text-center"><a href="<?php echo home_url() . '/category/entertainment'; ?>" class="btn c-button c-button--default-outline px-4">Xem thêm giải trí</a></div>
					</div>
				</div>
				<?php wp_reset_postdata(); endif; ?>
				<!-- END Home entertainment -->

			</div>
		</div>
			
	</div>
</div>

<?php get_footer(); ?>