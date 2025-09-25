<?php if ( have_rows( get_page_or_parent_name(), 'options' ) ) : ?>
	<?php while ( have_rows( get_page_or_parent_name(), 'options' ) ) :
		the_row();
		?>

		<div class="overflow-hidden">
			<!-- News page / single - show empty div to fill up space -->
			<?php if ( get_page_or_parent_name() == 'News' ) : ?>
				<div class="bg-charcoal pb-8"></div>
			<?php endif; ?>

			<!-- Locations footer content -->
			<?php if ( have_rows( 'footer' ) ) : ?>
				<?php while ( have_rows( 'footer' ) ) :
					the_row();
					$top_decoration = get_sub_field( 'top_decoration' );
					$highlight_color = get_sub_field( 'highlight_color' );

					$colors = [ 
						'Blue' => 'text-blue',
						'Light Blue' => 'text-lightBlue',
						'Red' => 'text-red',
					];

					$text_color = $colors[ $highlight_color ] ?? 'text-red';
					?>

					<div class="relative js-element-blurin">
						<!-- Top Decoration -->
						<?php if ( $top_decoration ) : ?>
							<div class="px-8 lg:px-16 translate-y-1/3 relative z-0">
								<?= $top_decoration; ?>
							</div>
						<?php endif; ?>

						<!-- Info -->
						<div class="bg-charcoal text-beige text-[14px] p-8 lg:p-16 grid grid-cols-12 lg:gap-x-16 gap-y-16 relative z-[1]">
							<!-- 1 -->
							<div class="col-span-12 md:col-span-6 xl:col-span-4 flex flex-col gap-y-5 max-xl:order-1">
								<?php if ( have_rows( 'jump_experience', 'options' ) ) : ?>
									<?php while ( have_rows( 'jump_experience', 'options' ) ) :
										the_row();
										$title = get_sub_field( 'title' );
										?>

										<div class="text-h4 uppercase <?= $text_color; ?>">
											<?= $title; ?>
										</div>

										<?php if ( have_rows( 'menu', 'options' ) ) : ?>
											<div class="flex flex-col">
												<?php while ( have_rows( 'menu', 'options' ) ) :
													the_row();
													$link = get_sub_field( 'link' );
													?>
													<?= mi_get_link( $link, 'footer-link self-start uppercase leading-[1.5]' ); ?>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<!-- 2 -->
							<div class="col-span-12 md:col-span-6 xl:col-span-4 flex flex-col gap-y-5 xl:items-center max-xl:order-3">
								<?php if ( have_rows( 'regular_hours', 'options' ) ) : ?>
									<?php while ( have_rows( 'regular_hours', 'options' ) ) :
										the_row();
										$title = get_sub_field( 'title' );
										$schedule = get_sub_field( 'schedule' );
										$note = get_sub_field( 'note' );
										?>

										<div class="text-h4 uppercase <?= $text_color; ?>">
											<?= $title; ?>
										</div>

										<div class="xl:text-center leading-[1.5]">
											<?= $schedule; ?>
										</div>

										<div class="xl:text-center opacity-50 max-w-[350px] leading-[1.2]">
											<?= $note; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<!-- 3 -->
							<div class="col-span-12 md:col-span-6 xl:col-span-4 flex flex-col gap-y-5 md:items-end max-xl:order-2">
								<?php if ( have_rows( 'about_jf', 'options' ) ) : ?>
									<?php while ( have_rows( 'about_jf', 'options' ) ) :
										the_row();
										$title = get_sub_field( 'title' );
										?>

										<div class="text-h4 uppercase <?= $text_color; ?>">
											<?= $title; ?>
										</div>

										<?php if ( have_rows( 'menu', 'options' ) ) : ?>
											<div class="flex flex-col items-start md:items-end">
												<?php while ( have_rows( 'menu', 'options' ) ) :
													the_row();
													$link = get_sub_field( 'link' );
													?>
													<?= mi_get_link( $link, 'footer-link uppercase leading-[1.5]' ); ?>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<!-- 4 -->
							<div class="col-span-12 md:col-span-6 xl:col-span-4 flex flex-col gap-y-5 max-xl:order-5">
								<?php if ( have_rows( 'contact', 'options' ) ) : ?>
									<?php while ( have_rows( 'contact', 'options' ) ) :
										the_row();
										$title = get_sub_field( 'title' );
										$text = get_sub_field( 'text' );
										?>

										<div class="text-h4 uppercase <?= $text_color; ?>">
											<?= $title; ?>
										</div>

										<div class="leading-[1.5] flex flex-col gap-y-5 footer-links">
											<?= $text; ?>
										</div>

										<?php if ( have_rows( 'socials', 'options' ) ) : ?>
											<div class="flex gap-x-5 mt-1">
												<?php while ( have_rows( 'socials', 'options' ) ) :
													the_row();
													$icon = get_sub_field( 'icon' );
													$link = get_sub_field( 'link' );
													?>

													<?php if ( $link ) : ?>
														<a href="<?= $link['url']; ?>" class="footer-link" target="<?= $link['target']; ?>">
															<?= $icon; ?>
														</a>
													<?php endif; ?>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<!-- 5 -->
							<div class="col-span-12 md:col-span-6 xl:col-span-4 flex flex-col gap-y-5 md:items-end xl:items-center max-xl:order-4 footer-links">
								<?php if ( have_rows( 'holidays', 'options' ) ) : ?>
									<?php while ( have_rows( 'holidays', 'options' ) ) :
										the_row();
										$title = get_sub_field( 'title' );
										$open_popup_button = get_sub_field( 'open_popup_button' );
										$note = get_sub_field( 'note' );
										?>

										<div class="text-h4 uppercase md:text-right xl:text-center <?= $text_color; ?>">
											<?= $title; ?>
										</div>

										<a href="#holiday-popup" class="js-popup-open border-2 p-3 w-full max-w-[400px] text-center">
											<?= $open_popup_button; ?>
										</a>

										<div class="leading-[1.2] flex flex-col gap-y-5 footer-links md:text-right xl:text-center opacity-50">
											<?= $note; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<!-- 6 -->
							<div class="col-span-12 md:col-span-6 xl:col-span-4 flex flex-col gap-y-5 md:items-end max-xl:order-6">
								<?php if ( have_rows( 'subscribe', 'options' ) ) : ?>
									<?php while ( have_rows( 'subscribe', 'options' ) ) :
										the_row();
										$title = get_sub_field( 'title' );
										$text = get_sub_field( 'text' );
										$form_embed = get_sub_field( 'form_embed' );
										?>

										<div class="text-h4 uppercase <?= $text_color; ?>">
											<?= $title; ?>
										</div>

										<div class="md:text-right max-w-[400px] leading-[1.2]">
											<?= $text; ?>
										</div>

										<div class="footer-subscribe-form">
											<?= $form_embed; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php if ( have_rows( 'footer_copyright' ) ) : ?>
				<?php while ( have_rows( 'footer_copyright' ) ) :
					the_row();
					$logo_desktop = get_sub_field( 'logo_desktop' );
					$logo_mobile = get_sub_field( 'logo_mobile' );
					$star_highlight_text = get_sub_field( 'star_highlight_text' );
					$star_highlight_color = get_sub_field( 'star_highlight_color' );
					$copyright = get_sub_field( 'copyright' );
					?>

					<div class="bg-charcoal text-beige p-8 text-[14px] uppercase flex flex-col gap-y-5 relative z-[2]">
						<!-- Footer logo + star highlight -->
						<a href="#" class="relative js-footer-logo" onclick="event.preventDefault(); lenis.scrollTo(0, { duration: 1, easing: (t) => t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2 });">
							<div class="max-lg:hidden [&_path]:fill-beige">
								<?= $logo_desktop; ?>
							</div>

							<div class="lg:hidden [&_path]:fill-beige">
								<?= $logo_mobile; ?>
							</div>

							<div class="absolute top-1/2 left-1/2 pointer-events-none js-footer-star-highlight">
								<div class="-translate-x-1/2 -translate-y-1/2">
									<?php get_template_part( 'components/acf-blocks/_star_highlight', null, array(
										'text' => $star_highlight_text,
										'color' => $star_highlight_color,
									) ); ?>
								</div>
							</div>
						</a>

						<!-- Copyright -->
						<div class="grid grid-cols-12 gap-x-16 gap-y-4 md:gap-y-5 relative z-[1]">
							<div class="col-span-12 md:col-span-6 2xl:col-span-3 max-2xl:order-2 flex max-md:justify-start">
								<?= $copyright; ?>
							</div>

							<div class="col-span-12 2xl:col-span-6 max-2xl:order-1 flex justify-center gap-x-8 max-md:flex-col Xmax-md:items-center max-md:gap-y-4">
								<?php if ( have_rows( 'policies_menu' ) ) : ?>
									<?php while ( have_rows( 'policies_menu' ) ) :
										the_row();
										$link = get_sub_field( 'link' );
										?>
										<?= mi_get_link( $link, 'footer-link' ); ?>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<div class="col-span-12 md:col-span-6 2xl:col-span-3 flex justify-end gap-x-1 max-2xl:order-3 max-md:justify-start">
								<span>By</span>
								<a href="http://emelecollab.com/" class="footer-link" target="_blanks">
									Emele Collab
								</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<!-- Holidays popup -->
		<?php if ( have_rows( 'footer' ) ) : ?>
			<?php while ( have_rows( 'footer' ) ) :
				the_row();
				?>
				<?php if ( have_rows( 'holidays', 'options' ) ) : ?>
					<?php while ( have_rows( 'holidays', 'options' ) ) :
						the_row();
						?>
						<?php if ( have_rows( 'holidays_popup', 'options' ) ) : ?>
							<div class="fixed top-0 left-0 w-full h-[100dvh] flex justify-center items-center js-popup opacity-0 invisible pointer-events-none -z-[1] [&.is-open]:opacity-100 [&.is-open]:visible [&.is-open]:pointer-events-auto [&.is-open]:z-[100] transition-all duration-200" data-popup-id="holiday-popup">
								<div class="bg-[black] opacity-75 absolute top-0 left-0 w-full h-full"></div>

								<div class="bg-charcoal relative z-50 text-beige py-[60px] px-[30px] md:px-[60px] md:rounded-[10px] drop-shadow-lg text-[15px] flex flex-col gap-y-3 leading-[1.3] max-md:overflow-auto max-md:h-[100dvh] max-md:w-full">
									<a href="#" class="absolute top-0 right-0 p-5 hover:opacity-50 transition-all duration-200 js-popup-close prevent-children">
										<svg class="[&_path]:fill-beige" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11.667 9.54594C12.0576 9.93647 12.0576 10.5696 11.667 10.9602L10.9599 11.6673C10.5694 12.0578 9.93624 12.0578 9.54572 11.6673L0.706881 2.82843C0.316356 2.4379 0.316356 1.80474 0.706881 1.41421L1.41399 0.707108C1.80451 0.316583 2.43768 0.316584 2.8282 0.707108L11.667 9.54594Z" fill="#EEE9D2" />
											<path d="M9.54594 0.706988C9.93647 0.316464 10.5696 0.316465 10.9602 0.706988L11.6673 1.41409C12.0578 1.80462 12.0578 2.43778 11.6673 2.82831L2.82843 11.6671C2.4379 12.0577 1.80474 12.0577 1.41421 11.6671L0.707108 10.96C0.316583 10.5695 0.316584 9.93635 0.707108 9.54582L9.54594 0.706988Z" fill="#EEE9D2" />
										</svg>
									</a>

									<?php while ( have_rows( 'holidays_popup', 'options' ) ) :
										the_row();
										$title = get_sub_field( 'title' );
										$date = get_sub_field( 'date' );
										?>
										<div class="flex justify-center gap-x-3 max-md:grid max-md:grid-cols-2">
											<div class="md:text-right">
												<?= $title; ?>
											</div>
											<div class="opacity-50 text-left">
												<?= $date; ?>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>