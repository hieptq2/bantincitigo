<?php
/**
* Single Honored Members
* 
*/

get_header(); ?>

<div id="SiteBody" class="l-body h-shadow-1">
	<div id="SiteContent" class="l-content l-content--single l-content--honor" data-js-module="home">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="l-content__wrapper">
				<ol class="c-breadcrumb">
				  <li class="c-breadcrumb__item"><a href="<?php echo home_url(); ?>">Trang chủ</a></li>
				  <li class="c-breadcrumb__item"><a href="<?php echo home_url() . '/honored'; ?> ">Vinh danh</a></li>
				  <li class="c-breadcrumb__item active"><?php the_title(); ?></li>
				</ol>
				<div class="l-content__body">
					<div class="c-post c-post--member">
						<div class="c-post__header">
							<h1 class="c-post__title"><?php the_title(); ?></h1>
						</div>
						<div class="c-post__content">
							<?php the_field('introduction'); ?>
							<?php if(have_rows('award')): while (have_rows('award')) : the_row(); ?>
								<div class="c-post__single-person">
									<div class="row">
										<div class="col-12 col-md-4 mb-3 mb-md-0">
											<div class="c-card c-card--member">
												<div class="c-card__thumbnail h-bg-cover h-bgc--darker" style="background-image: url('<?php echo get_field('avatar', get_sub_field('award-winner')); ?>')"></div>
												<div class="c-card__content c-card__content--new-member">
													<h3 class="c-card__member-title"><?php echo get_the_title(get_sub_field('award-winner')); ?></h3>
													<div class="c-card__member-award s-color"><?php echo get_sub_field('award-name') ?></div>
													<div class="c-card__member-subtitle h-fz--sm mt-1 h-c-text--sub"><i><?php echo get_field('title', get_sub_field('award-winner')) // get_the_terms(get_sub_field('award-winner'), 'department')[0]->name; ?></i></div>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-8">
											<div class="c-card c-card--interview">
												<div class="interview-convo"><?php the_sub_field('award-interview'); ?></div>
												<div class="interview-ee">
													<div class="c-person">
														<div class="c-person__avatar">
															<div class="avatar-wrapper h-bg-cover" style="background-image: url('<?php echo get_field('avatar', get_sub_field('award-reviewer')); ?>');"></div>
														</div>
														<div class="c-person__content">
															<div class="c-person__title"><?php echo get_the_title(get_sub_field('award-reviewer')); ?></div>
															<div class="c-person__subtitle"><i><?php echo get_field('title', get_sub_field('award-reviewer')); ?></i></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
				<div class="l-content__footer">
					<h4 class="h-fw--600">Xem thêm các tháng trước</h4>
					<div class="c-card c-card--people c-card--sm">
						<div class="c-card__header">
							<h2 class="c-card__title"><a href="#" class="s-color">Danh sách khen thưởng tháng 9/2018</a></h2>
							<div class="c-card__excerpt">Tháng tám, người ta chờ đợi các cuộc hẹn café bên những quán nhỏ, hương hoa sữa đánh thức em khỏi mớ hỗn độn của ngổn ngang âu lo trong cuộc sống. Đột nhiên nhặt được một chiếc lá vàng rụng xuống dưới chân, để rồi giật mình rằng tiết thu đã về. </div>
						</div>
						<div class="c-card__content">
							<a href="#" class="c-list c-list--h-s-avatars c-list--sm">
								<div class="c-list__item"><div class="h-rectangle"><div class="h-rectangle__inner h-bdrd--circle h-bgc--darker" style="background-image: url('')"></div></div></div>
								<div class="c-list__item"><div class="h-rectangle"><div class="h-rectangle__inner h-bdrd--circle h-bgc--darker" style="background-image: url('')"></div></div></div>
								<div class="c-list__item"><div class="h-rectangle"><div class="h-rectangle__inner h-bdrd--circle h-bgc--darker" style="background-image: url('')"></div></div></div>
								<div class="c-list__item"><div class="h-rectangle"><div class="h-rectangle__inner h-bdrd--circle h-bgc--darker" style="background-image: url('')"></div></div></div>
								<div class="c-list__item"><div class="h-rectangle"><div class="h-rectangle__inner h-bdrd--circle h-bgc--darker" style="background-image: url('')"></div></div></div>
								<div class="c-list__item"><div class="h-rectangle"><div class="h-rectangle__inner h-bdrd--circle h-bgc--darker" style="background-image: url('')"></div></div></div>
								<div class="c-list__item"><div class="h-rectangle"><div class="h-rectangle__inner h-bdrd--circle h-bgc--darker" style="background-image: url('')"></div></div></div>
								<div class="c-list__item"><div class="h-rectangle"><div class="h-rectangle__inner h-bdrd--circle h-bgc--darker" style="background-image: url('')"></div></div></div>
							</a>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>