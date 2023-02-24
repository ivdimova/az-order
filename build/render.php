<?php
/**
 * AZ Order Block Display.
*/

namespace AZOrder;

use AZOrder\Shortcode; 
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php $az_order = Shortcode\az_order_display();
	echo $az_order; ?>
</div>
