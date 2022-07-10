<?php
/**
 * Example Partial
 *
 */

function render_partial( $tool ) {

    if ( $tool ) { ?>
        <p class="bloom-post__tool">Favorite Tool: <?php echo $tool; ?></p>
    <?php } ?>

	<?php
} ?>
