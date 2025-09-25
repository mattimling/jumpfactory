<?php
$title = get_sub_field( 'title' );
?>

<div class="px-8 lg:px-16 flex flex-col gap-y-16">
	<div class="text-red">
		<?= $title; ?>
	</div>

	<div class="grid grid-cols-12 xl:gap-x-16 js-location-group">
		<div class="col-span-12 xl:col-span-8 flex flex-col gap-y-5">
			<?php if ( have_rows( 'offers' ) ) : ?>
				<?php while ( have_rows( 'offers' ) ) :
					the_row();
					$title = get_sub_field( 'title' );
					$text = get_sub_field( 'text' );
					?>

					<div class="js-faq will-change-transform js-element-blurin">
						<div class="text-h2 text-blue js-faq-toggle cursor-pointer hover:text-red transition-all duration-150 ease-in-out js-faq-toggle [&.is-active]:!text-red js-location-link" data-title="<?= $title; ?>">
							<?= $title; ?>
						</div>

						<div class="max-h-0 overflow-hidden js-faq-content transition-all duration-500 ease-custom-in-out text-red">
							<div class="py-8 will-change-transform">
								<div class="body-links-small">
									<?= $text; ?>
								</div>

								<?php if ( have_rows( 'prices' ) ) : ?>
									<div class="flex gap-3 lg:gap-8 flex-wrap mt-8">
										<?php while ( have_rows( 'prices' ) ) :
											the_row();
											$title = get_sub_field( 'title' );
											$hover_text = get_sub_field( 'hover_text' );
											$roller_checkout_param = get_sub_field( 'roller_checkout_param' );
											$link = get_sub_field( 'link' );
											$open_popup = get_sub_field( 'open_popup' );
											?>

											<?php if ( $roller_checkout_param ) : ?>
												<div class="cursor-pointer relative uppercase text-[15px] group lg:h-[44px]" <?= $roller_checkout_param; ?>>
												<?php else : ?>
													<a href="<?= ( $link && ! empty( $link['url'] ) ) ? esc_url( $link['url'] ) : '#'; ?>" class="relative uppercase text-[15px] group lg:h-[44px] <?= $open_popup ? 'js-popup-open prevent-children' : ''; ?>" <?= ( ! $link || empty( $link['url'] ) ) ? 'onclick="event.preventDefault();"' : '' ?>>
													<?php endif; ?>
													<div class="px-3 py-1 lg:px-5 lg:py-3 lg:group-hover:opacity-0 transition-opacity duration-300 border-[3px] border-red text-center">
														<?= $title; ?>
													</div>

													<div class="relative lg:-top-full left-0 bg-red text-beige w-full text-center px-3 py-1 lg:px-5 lg:py-3 lg:opacity-0 group-hover:opacity-100 transition-opacity duration-300 border-[3px] border-red lg:h-[46px] lg:-mt-[2px] flex justify-center items-center">
														<?= $hover_text; ?>
													</div>
													<?php if ( $roller_checkout_param ) : ?>
												</div>
											<?php else : ?>
												</a>
											<?php endif; ?>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<div class="max-xl:hidden xl:col-span-4">
			<?php if ( have_rows( 'offers' ) ) : ?>
				<div class="w-full relative aspect-[486/654]">
					<?php while ( have_rows( 'offers' ) ) :
						the_row();
						$title = get_sub_field( 'title' );
						$image = get_sub_field( 'image' );
						?>

						<div class="absolute rounded-[10px] overflow-hidden js-location-map transition-opacity duration-500 ease-custom-in-out w-full aspect-[486/654]" data-title="<?= $title; ?>">
							<?= mi_get_image( $image, 'xl', 'w-full h-full object-cover' ); ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>