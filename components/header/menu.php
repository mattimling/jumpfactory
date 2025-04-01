<?php if ( have_rows( get_page_or_parent_name(), 'options' ) ) : ?>

	<?php while ( have_rows( get_page_or_parent_name(), 'options' ) ) :
		the_row();
		?>

		<?php if ( have_rows( 'menu' ) ) : ?>

			<?php while ( have_rows( 'menu' ) ) :
				the_row();

				$background_color = get_sub_field( 'background_color' );
				$star_highlight_text = get_sub_field( 'star_highlight_text' );
				$star_highlight_color = get_sub_field( 'star_highlight_color' );
				$bg_color = '';

				$colors = [ 
					'Blue' => 'bg-blue',
					'Light Blue' => 'bg-lightBlue',
					'Red' => 'bg-red',
				];

				$bg_color = $colors[ $background_color ] ?? 'bg-red';

				?>

				<div class="fixed -top-full [&.is-open]:top-0 left-0 w-full h-[100dvh] z-10 flex flex-col justify-end will-change-transform transition-all duration-700 ease-custom-in-out js-menu [&.is-open_.js-menu-inner]:opacity-100 <?= $bg_color; ?>">

					<div class="p-8 lg:p-16 flex max-lg:flex-col-reverse max-lg:h-[80%] justify-between lg:items-end will-change-transform opacity-0 js-menu-inner transition-opacity duration-700 ease-custom-in-out">

						<?php

						function add_submenu_toggle_span( $item_output, $item, $depth, $args ) {
							if ( in_array( 'menu-item-has-children', $item->classes ) ) {
								// Insert the span before the closing </a>
								$item_output = str_replace( '</a>',
									'<div class="relative pointer-events-none">
                        <span class="js-submenu-plus ml-3 lg:ml-5 absolute top-[13%] left-0 transition-all duration-300 origin-center h-[63%] leading-[0.59]">+</span>
                    </div></a>',
									$item_output );
							}
							return $item_output;
						}

						add_filter( 'walker_nav_menu_start_el', 'add_submenu_toggle_span', 10, 4 );

						?>

						<div class="">

							<?php

							wp_nav_menu( array(
								'menu_class' => 'main-menu js-main-menu'
							) );

							?>

							<div class="text-h4 text-beige flex gap-x-8 mt-6 lg:mt-12 ml-1 [&_.is-active]:opacity-60">

								<a href="#" class="hover-opacity">
									DE
								</a>

								<a href="#" class="is-active hover-opacity">
									EN
								</a>

								<a href="#" class="hover-opacity">
									FR
								</a>

							</div>

						</div>

						<?php get_template_part( 'components/acf-blocks/_star_highlight', null, array(
							'text' => $star_highlight_text,
							'color' => $star_highlight_color,
						) ); ?>

					</div>

				</div>

			<?php endwhile; ?>

		<?php endif; ?>

	<?php endwhile; ?>

<?php endif; ?>