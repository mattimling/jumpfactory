<?php

$text = get_sub_field( 'text' );
$headline_type = get_sub_field( 'headline_type' );

if ( $text && ( $headline_type == 'H1' || $headline_type == 'H2' ) ) : ?>

	<div class="px-8 lg:px-16 js-element-blurin">

		<<?= strtolower( $headline_type ); ?> class="text-h1 text-red will-change-transform break-words">

			<?= $text; ?>

		</<?= strtolower( $headline_type ); ?>>

	</div>

<?php endif; ?>