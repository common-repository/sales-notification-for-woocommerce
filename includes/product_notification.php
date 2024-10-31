<?php

if ( ! defined( 'ABSPATH' ) ){ 
	exit;
 }
	
if ( current_user_can('manage_options') ) {
	
	if ( ! empty( $_POST ) && wp_verify_nonce( ($_POST['phoen_noti_product_field']),'phoen_noti_product' ) ) {
		
		$product_count = isset($_POST['phoen_prod_not'])?sanitize_text_field($_POST['phoen_prod_not']):"";
		
		update_option("phoen_notif_pro_count",$product_count);
		
	}
}
?>

<form method="post" name="phoen_noti_design" class="pehoen_notification_settings">

	<?php wp_nonce_field( 'phoen_noti_product', 'phoen_noti_product_field' ); ?>
	
	<br/>
	
	<?php

		$product_count =get_option("phoen_notif_pro_count");
		 
	?>
		
	<table class="form-table">
	
			<tr >
			<th scope="row">
			
				<label for="phoen_prod_not"><?php _e('Recent Order Product Show On Notification','phoen-prod-notification'); ?></label>
		
			</th>
			
			<td>
			
				<input type="number" class="small-text" value="<?php echo esc_attr(!empty($product_count)?$product_count:1);?>" id="phoen_prod_not" min="1" step="1" name="phoen_prod_not">
				
			</td>
			
			
			</tr>				
		<tr>
			<th>
				
				<input type="submit" class="button button-primary" value="<?php _e('Save','phoen-prod-notification') ?>" name="phoen_notif_product">
					
			</th>
		
		</tr>
	
	</table>
	
</form>