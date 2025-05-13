<?php if ( have_rows( get_page_or_parent_name(), 'options' ) ) : ?>
	<?php while ( have_rows( get_page_or_parent_name(), 'options' ) ) :
		the_row();
		?>

		<?php if ( have_rows( 'header' ) ) : ?>
			<?php while ( have_rows( 'header' ) ) :
				the_row();
				$location_icon = get_sub_field( 'location_icon' );
				$location_name = get_sub_field( 'location_name' );
				$main_logo = get_sub_field( 'main_logo' );
				$menu_logo = get_sub_field( 'menu_logo' );
				$close_logo = get_sub_field( 'close_logo' );
				$tagline = get_sub_field( 'tagline' );
				$text = $args['text'] ?? '';
				$path = $args['path'] ?? '';
				$class = $args['class'] ?? '';
				?>

				<div class="absolute top-0 left-0 w-full p-8 grid grid-cols-12 lg:gap-x-16 <?= $text; ?> <?= $path; ?> <?= $class; ?>">
					<!-- Location -->
					<div class="col-span-4 flex">
						<a href="<?= home_url( '/' ) ?>" class="flex self-start gap-x-2 items-center hover-opacity">
							<div class="w-[20px]">
								<?= $location_icon; ?>
							</div>

							<div class="font-agn text-[18px] leading-[0.8] relative top-[2px] max-lg:hidden uppercase">
								<?= $location_name; ?>
							</div>
						</a>
					</div>

					<!-- Logo -->
					<div class="col-span-4 flex justify-center">
						<?php
						$current_page = get_queried_object();
						$default_url = home_url( '/' );
						$link_url = $default_url;

						if ( is_page() ) {
							$parent_id = wp_get_post_parent_id( $current_page->ID );
							$link_url = $parent_id ? get_permalink( $parent_id ) : get_permalink( $current_page );
						}

						if ( is_single() && get_post_type() === 'post' ) {
							$articles_options = get_field( 'articles', 'options' );
							$articles_page_url = $articles_options['articles_page'];

							if ( $articles_page_url ) {
								$page_id = url_to_postid( $articles_page_url );
								if ( $page_id ) {
									$link_url = get_permalink( $page_id );
								}
							}
						}
						?>

						<a href="<?= esc_url( $link_url ); ?>" class="w-[50px] hover-opacity">
							<?= $main_logo; ?>
						</a>
					</div>

					<!-- Menu -->
					<div class="col-span-4 flex justify-end">
						<?php if ( $menu_logo && $close_logo ) : ?>
							<a href="#" class="w-[29px] js-hb-menu prevent-children relative hover-opacity">
								<span class="absolute top-0 left-0 js-hb-menu-open transition-opacity duration-1000">
									<?= $menu_logo; ?>
								</span>

								<span class="absolute top-0 left-0 js-hb-menu-close transition-opacity duration-1000 opacity-0">
									<?= $close_logo; ?>
								</span>
							</a>
						<?php endif; ?>

						<?php if ( $tagline ) : ?>
							<div class="font-agn text-[18px] leading-[0.8] relative top-[2px] max-lg:hidden uppercase">
								<?= $tagline; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>