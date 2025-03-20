<?php

$button = $args['button'] ?? '';
$class = $args['class'] ?? '';

?>

<div class="<?= $class; ?>">

	<div class="button-big">

		<span class="button-big-circle"></span>

		<a href="<?= $button['url'] ?>" class="button-big-inner">
			<span class="button-big-text">
				<?= $button['title'] ?>
			</span>
		</a>

	</div>

</div>