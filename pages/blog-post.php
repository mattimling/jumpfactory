<?php get_template_part( 'components/header/header' ); ?>

<?php
$id = get_the_ID();
$categories = get_the_category();
$articles_options = get_field( 'articles', 'options' );
?>

<?php if ( class_exists( 'ACF' ) ) : ?>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) :
			the_post();
			$featured_image = get_field( 'featured_image' );
			$content = get_field( 'content' );
			?>

			<div class="flex flex-col gap-y-16 lg:gap-y-32 mb-16 lg:mb-32">
				<div class="w-full h-[100dvh] js-hero relative will-change-transform overflow-hidden">
					<div class="w-full h-full js-hero-media overflow-hidden origin-bottom pointer-events-none">
						<div class="w-full h-full js-hero-media-inner">
							<?= mi_get_image( $featured_image, 'xl', 'w-full h-full object-cover' ); ?>
						</div>
					</div>

					<!-- Title + Subtitle -->
					<div class="absolute bottom-0 left-0 p-8 lg:p-16 grid grid-cols-12 lg:gap-x-16 gap-y-8 js-hero-titles w-full">
						<h1 class="col-span-12 text-h2-3 text-beige break-words will-change-transform">
							<?= get_the_title(); ?>
						</h1>

						<h2 class="col-span-12 xl:col-span-6 text-h3 text-beige will-change-transform">
							<div class="flex [&_.sprtr:last-child]:hidden">
								<?php
								$articles_page = $articles_options['articles_page'];
								$article_category = $categories[0]->name;
								$article_category_link = $articles_page . strtolower( $article_category );
								?>

								<a href="<?= $article_category_link ?>" class="hover-opacity">
									<?= $article_category; ?>
								</a>
							</div>
						</h2>
					</div>
				</div>

				<!-- Content -->
				<div class="px-8 lg:px-16 flex flex-col gap-y-16 lg:gap-y-32">
					<?php if ( have_rows( 'content' ) ) : ?>
						<?php while ( have_rows( 'content' ) ) :
							the_row(); ?>

							<?php if ( get_row_layout() == 'text' ) :
								$text = get_sub_field( 'text' );
								?>
								<div class="article-text flex flex-col gap-y-8 js-element-blurin">
									<?= $text; ?>
								</div>
							<?php elseif ( get_row_layout() == 'image' ) :
								$image = get_sub_field( 'image' );
								?>
								<div class="js-element-blurin overflow-hidden rounded-[10px]">
									<?= mi_get_image( $image, 'xl', 'w-full' ); ?>
								</div>
							<?php elseif ( get_row_layout() == 'button' ) :
								$link = get_sub_field( 'link' );
								?>

								<div class="flex justify-start js-element-blurin">
									<?php get_template_part( 'components/acf-blocks/_button', null, array(
										'button' => $link,
										'class' => 'js-element-blurin'
									) ); ?>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>

				<!-- Prev / next article -->
				<?php
				$articles_options = get_field( 'articles', 'options' );
				?>

				<div class="px-8 lg:px-16 flex justify-between text-h4 uppercase text-red js-element-blurin">
					<?php
					$prev_post = get_previous_post();
					$next_post = get_next_post();
					?>

					<a href="<?= $prev_post ? get_permalink( $prev_post->ID ) : '#'; ?>" class="hover:text-blue transition-colors duration-300 <?= ! $prev_post ? 'opacity-30 pointer-events-none' : ''; ?>">
						<?= esc_html( $articles_options['prev_article_text'] ); ?>
					</a>

					<a href="<?= $next_post ? get_permalink( $next_post->ID ) : '#'; ?>" class="hover:text-blue transition-colors duration-300 <?= ! $next_post ? 'opacity-30 pointer-events-none' : ''; ?>">
						<?= esc_html( $articles_options['next_article_text'] ); ?>
					</a>
				</div>

				<!-- Related articles -->
				<?php if ( $articles_options['related_articles'] && ! empty( $categories ) ) : ?>
					<?php
					// Get the first category (you can change logic if needed)
					$related_cat_id = $categories[0]->term_id;

					$related_args = [ 
						'posts_per_page' => 3,
						'category__in' => [ $related_cat_id ],
						'post__not_in' => [ $id ],
						'post_status' => 'publish',
					];

					$related_query = new WP_Query( $related_args );
					?>

					<?php if ( $related_query->have_posts() ) : ?>
						<div class="px-8 lg:px-16 flex flex-col gap-y-16 lg:gap-y-32">
							<div class="text-h2 text-red js-element-blurin">
								<?= $articles_options['related_articles']; ?>
							</div>

							<div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-16 lg:max-2xl:[&>a:nth-child(3)]:hidden">
								<?php while ( $related_query->have_posts() ) :
									$related_query->the_post(); ?>

									<a href="<?= get_permalink(); ?>" class="group flex flex-col gap-8 text-blue js-element-blurin will-change-transform">
										<?php $thumb = get_field( 'featured_image' ); ?>

										<?php
										if ( $thumb ) : ?>
											<div class="overflow-hidden rounded-[10px] aspect-[4/3]">
												<?= mi_get_image( $thumb, 'xl', 'w-full h-full object-cover group-hover:scale-[1.05] transition-all duration-500 custom-ease-in-out' ); ?>
											</div>
										<?php endif; ?>

										<div class="text-h3 group-hover:text-red transition-colors duration-300 custom-ease-in-out">
											<?= get_the_title(); ?>
										</div>

										<div class="text-h5">
											<?= get_the_excerpt(); ?>
										</div>
									</a>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif; ?>

					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php else : ?>
	Theme needs ACF plugin to work properly
<?php endif; ?>

<?php get_template_part( 'components/footer/footer' ); ?>