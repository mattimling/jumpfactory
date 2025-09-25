<?php
$button = $args['button'] ?? '';
$class = $args['class'] ?? '';
$roller_checkout_param = $args['roller_checkout_param'] ?? '';
$open_popup = $args['open_popup'] ?? '';
?>

<div class="<?= $class; ?>">
	<div class="button-big">
		<span class="button-big-circle"></span>

		<?php if ( $roller_checkout_param ) : ?>
			<div class="button-big-inner cursor-pointer" <?= $roller_checkout_param; ?>>
			<?php else : ?>
				<a href="<?= ! $roller_checkout_param ? $button['url'] : '#'; ?>" class="button-big-inner <?= $open_popup ? 'js-popup-open prevent-children' : ''; ?>">
				<?php endif; ?>
				<span class="button-big-text">
					<?= $button['title'] ?>
				</span>
				<?php if ( $roller_checkout_param ) : ?>
			</div>
		<?php else : ?>
			</a>
		<?php endif; ?>
	</div>
</div>