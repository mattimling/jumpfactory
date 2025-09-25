<?php
$popup_id = get_sub_field( 'popup_id' );
$content = get_sub_field( 'content' );
?>

<?php if ( $popup_id ) : ?>
	<div class="fixed top-0 left-0 w-full h-[100dvh] flex justify-center items-center js-popup opacity-0 invisible pointer-events-none -z-[1] [&.is-open]:opacity-100 [&.is-open]:visible [&.is-open]:pointer-events-auto [&.is-open]:z-[100] transition-all duration-200" data-popup-id="<?= $popup_id; ?>">
		<div class="bg-[black] opacity-75 absolute top-0 left-0 w-full h-full"></div>

		<div class="bg-beige text-charcoal relative z-50 py-[60px] px-[30px] md:px-[60px] rounded-[10px] drop-shadow-lg text-[15px] flex flex-col gap-y-3 leading-[1.3] Xmax-md:overflow-auto Xmax-md:h-[100dvh] Xmax-md:w-full">
			<a href="#" class="absolute top-0 right-0 p-5 hover:opacity-50 transition-all duration-200 js-popup-close prevent-children">
				<svg class="[&_path]:fill-charcoal" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M11.667 9.54594C12.0576 9.93647 12.0576 10.5696 11.667 10.9602L10.9599 11.6673C10.5694 12.0578 9.93624 12.0578 9.54572 11.6673L0.706881 2.82843C0.316356 2.4379 0.316356 1.80474 0.706881 1.41421L1.41399 0.707108C1.80451 0.316583 2.43768 0.316584 2.8282 0.707108L11.667 9.54594Z" fill="#EEE9D2" />
					<path d="M9.54594 0.706988C9.93647 0.316464 10.5696 0.316465 10.9602 0.706988L11.6673 1.41409C12.0578 1.80462 12.0578 2.43778 11.6673 2.82831L2.82843 11.6671C2.4379 12.0577 1.80474 12.0577 1.41421 11.6671L0.707108 10.96C0.316583 10.5695 0.316584 9.93635 0.707108 9.54582L9.54594 0.706988Z" fill="#EEE9D2" />
				</svg>
			</a>

			<div class="flex justify-center gap-x-3 popup-subscribe-form">
				<?= $content; ?>
			</div>
		</div>
	</div>
<?php endif; ?>