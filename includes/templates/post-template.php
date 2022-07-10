<?php
/**
 * Template Name
 *
 */

function render_post_template( $id ) {

	$title = get_the_title( $id );
	$role  = get_post_meta( $id, 'role', true );
	$bio   = get_post_meta( $id, 'bio', true );
	$tool  = get_post_meta( $id, 'tool', true );

	?>

	<div id="bloomcu" class="bloom-post">

		<p class="bloom-post__title"><?php echo $title; ?></p>
		<p class="bloom-post__role"><?php echo $role ?></p>
		<p class="bloom-post__bio"><?php echo $bio; ?></p>

        <?php

		/**
		* Partial
		* ----------
		*/

		if ( $tool ) {

			render_partial( $tool );

		}
		?>

    </div>

	<?php
} ?>
