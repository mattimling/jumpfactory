<?php if ( have_rows( get_page_or_parent_name(), 'options' ) ) : ?>

	<?php while ( have_rows( get_page_or_parent_name(), 'options' ) ) :
		the_row();
		?>

		<div class="overflow-hidden">

			<?php if ( have_rows( 'footer' ) ) : ?>

				<?php while ( have_rows( 'footer' ) ) :
					the_row();

					$top_decoration = get_field( 'top_decoration', 'options' );
					$highlight_color = get_field( 'highlight_color', 'options' );

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
							<div class="col-span-12 md:col-span-6 xl:col-span-4 flex flex-col gap-y-5 md:items-end xl:items-center max-xl:order-4">

								<?php if ( have_rows( 'holidays', 'options' ) ) : ?>

									<?php while ( have_rows( 'holidays', 'options' ) ) :
										the_row();

										$title = get_sub_field( 'title' );
										$note = get_sub_field( 'note' );
										?>

										<div class="text-h4 uppercase md:text-right xl:text-center <?= $text_color; ?>">
											<?= $title; ?>
										</div>

										<?php if ( have_rows( 'dropdown', 'options' ) ) : ?>

											<div class="border-beige border-2 w-full max-w-[400px]">

												<select class="bg-charcoal border-transparent outline-none border-[15px] uppercase text-center w-full">

													<?php while ( have_rows( 'dropdown', 'options' ) ) :
														the_row();

														$text = get_sub_field( 'text' );
														?>

														<option>
															<?= $text; ?>
														</option>

													<?php endwhile; ?>

												</select>

											</div>

										<?php endif; ?>

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
										?>

										<div class="text-h4 uppercase <?= $text_color; ?>">
											<?= $title; ?>
										</div>

										<div class="md:text-right max-w-[400px] leading-[1.2]">
											<?= $text; ?>
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

	<?php endwhile; ?>

<?php endif; ?>