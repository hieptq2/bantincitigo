<?php
/**
* Template Name: New members
*/

get_header(); ?>

<!-- page-honored-members -->

<div id="SiteBody" class="l-body h-shadow-1">
	<div id="SiteContent" class="l-content l-content--category l-content--member" data-js-module="page">
		<div class="l-content__wrapper">
			<ol class="c-breadcrumb">
			  <li class="c-breadcrumb__item"><a href="#">Trang chủ</a></li>
			  <li class="c-breadcrumb__item active">Thành viên mới</li>
			</ol>
			<div class="l-content__header">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1 class="l-content__title s-color"><?php the_title(); ?></h1>
					<div class="l-content__subtitle"><?php the_content(); ?></div>
				<?php endwhile; endif; ?>
			</div>
			<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 
					'post_type' => 'new_members', 
					'posts_per_page' => '1', 
					'paged' => $paged
				);
				$the_query = new WP_Query($args);
			?>
			<div class="l-content__body">
				<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();?>
					<div class="c-card c-card--people">
						<div class="c-card__header">
							<?php if(has_post_thumbnail()): ?>
								<div class="c-card__fet-image">
									<a href="<?php the_permalink(); ?>" class="h-rectangle h-rectangle--r31">
										<div class="h-rectangle__inner h-bg-cover" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
									</a>
								</div>
							<?php endif; ?>
							<h2 class="c-card__title"><a href="<?php the_permalink(); ?>" class="s-color"><?php the_title(); ?></a></h2>
							<div class="c-card__excerpt"><?php the_field('introduction'); ?></div>
						</div>
						<div class="c-card__content">
							<?php if(have_rows('award')): ?>
								<a href="<?php the_permalink(); ?>" class="c-list c-list--h-s-avatars">
									<?php while (have_rows('award')) : the_row(); ?>
										<div class="c-list__item">
											<div class="h-rectangle">
												<div class="h-rectangle__inner h-bdrd--circle h-bgc--darker h-bg-cover" style="background-image: url('<?php echo get_field('avatar', get_sub_field('award-winner')); ?>')"></div>
											</div>
										</div>
									<?php endwhile; ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile;next_posts_link( __( 'Older entries' ), $the_query->max_num_pages ); next_posts_link(); previous_posts_link(); wp_reset_postdata(); endif; ?>
			</div>
			<div class="l-content__footer">
				<div class="d-flex justify-content-center">
					<div class="c-pagination">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>