<?php

if ( ! defined( 'ABSPATH' ) ){ 
	exit;
 }

if ( current_user_can('manage_options') ) {
	
	if ( ! empty( $_POST['noti_submit'] ) && wp_verify_nonce( ($_POST['phoen_noti_enable_field']),'phoen_noti_enable' ) ) {

		
		$general_settings_enable =isset($_POST['phoen_noti_enable'])?sanitize_text_field($_POST['phoen_noti_enable']):"";
		$general_settings_interval =isset($_POST['phoen_noti_time_intvl'])?sanitize_text_field($_POST['phoen_noti_time_intvl']):"";
		$phoen_noti_position = isset($_POST['phoen_noti_position'])?sanitize_text_field($_POST['phoen_noti_position']):"";
		/*$pheoen_noti_backcolor = isset($_POST['pheoen_noti_backcolor'])?sanitize_text_field($_POST['pheoen_noti_backcolor']):"";
		$phoen_noti_borderradius = isset($_POST['phoen_noti_borderradius'])?sanitize_text_field($_POST['phoen_noti_borderradius']):"";
		$phoen_noti_bordercolor = isset($_POST['phoen_noti_bordercolor'])?sanitize_text_field($_POST['phoen_noti_bordercolor']):"";
		$pheoen_noti_image_bordercolor = isset($_POST['pheoen_noti_image_bordercolor'])?sanitize_text_field($_POST['pheoen_noti_image_bordercolor']):"";
		$pheoen_noti_message_font_size = isset($_POST['pheoen_noti_message_font_size'])?sanitize_text_field($_POST['pheoen_noti_message_font_size']):"";
		$pheoen_noti_message_font_color = isset($_POST['pheoen_noti_message_font_color'])?sanitize_text_field($_POST['pheoen_noti_message_font_color']):"";
		$pheoen_noti_product_color = isset($_POST['pheoen_noti_product_color'])?sanitize_text_field($_POST['pheoen_noti_product_color']):"";
		$pheoen_noti_product_size = isset($_POST['pheoen_noti_product_size'])?sanitize_text_field($_POST['pheoen_noti_product_size']):"";
		$pheoen_noti_time_size = isset($_POST['pheoen_noti_time_size'])?sanitize_text_field($_POST['pheoen_noti_time_size']):"";
		$pheoen_noti_title_extract = isset($_POST['pheoen_noti_title_extract'])?sanitize_text_field($_POST['pheoen_noti_title_extract']):"0";
		$pheoen_noti_time_color = isset($_POST['pheoen_noti_time_color'])?sanitize_text_field($_POST['pheoen_noti_time_color']):"";
		$pheoen_noti_image_borderradius = isset($_POST['pheoen_noti_image_borderradius'])?sanitize_text_field($_POST['pheoen_noti_image_borderradius']):"";
		$pheoen_noti_cross_background_color = isset($_POST['pheoen_noti_cross_background_color'])?sanitize_text_field($_POST['pheoen_noti_cross_background_color']):"";
		$pheoen_noti_cross_text_color = isset($_POST['pheoen_noti_cross_text_color'])?sanitize_text_field($_POST['pheoen_noti_cross_text_color']):"";
		$pheoen_noti_padding_top = isset($_POST['pheoen_noti_padding_top'])?sanitize_text_field($_POST['pheoen_noti_padding_top']):"";
		$pheoen_noti_padding_bottom = isset($_POST['pheoen_noti_padding_bottom'])?sanitize_text_field($_POST['pheoen_noti_padding_bottom']):"";*/
		
		$general_settings = array(
			"phoen_noti_enable"=>$general_settings_enable,
			"phoen_noti_time_intvl"=>$general_settings_interval,
			"phoen_noti_position"=>$phoen_noti_position,
			/*"pheoen_noti_backcolor"=>$pheoen_noti_backcolor,
			"phoen_noti_borderradius"=>$phoen_noti_borderradius,
			"phoen_noti_bordercolor"=>$phoen_noti_bordercolor,
			"pheoen_noti_image_bordercolor"=>$pheoen_noti_image_bordercolor,
			"pheoen_noti_message_font_size"=>$pheoen_noti_message_font_size,
			"pheoen_noti_message_font_color"=>$pheoen_noti_message_font_color,
			"pheoen_noti_product_color"=>$pheoen_noti_product_color,
			"pheoen_noti_product_size"=>$pheoen_noti_product_size,
			"pheoen_noti_time_size"=>$pheoen_noti_time_size,
			"pheoen_noti_title_extract"=>$pheoen_noti_title_extract,
			"pheoen_noti_time_color"=>$pheoen_noti_time_color,
			"pheoen_noti_image_borderradius"=>$pheoen_noti_image_borderradius,
			"pheoen_noti_cross_background_color"=>$pheoen_noti_cross_background_color,
			"pheoen_noti_cross_text_color"=>$pheoen_noti_cross_text_color,
			"pheoen_noti_padding_bottom"=>$pheoen_noti_padding_bottom,
			"pheoen_noti_padding_top"=>$pheoen_noti_padding_top,*/
		);
		
		update_option("phoen_notification_gen_settings",$general_settings);				
	}
	
	if ( ! empty( $_POST['noti_reset'] ) && wp_verify_nonce( ($_POST['phoen_noti_enable_field']),'phoen_noti_enable' ) ) {

			$general_settings = array(
					"phoen_noti_enable"=>"1",
					"phoen_noti_time_intvl"=>"7",
					'phoen_noti_position'=>"bottom_left",
					/*"pheoen_noti_backcolor"=>"rgba(251, 251, 251, 1)",
					"phoen_noti_borderradius"=>"10",
					"phoen_noti_bordercolor"=>"#ccc",
					"pheoen_noti_image_bordercolor"=>"#e1e0de",
					"pheoen_noti_message_font_size"=>"14",
					"pheoen_noti_message_font_color"=>"#262626",
					"pheoen_noti_product_color"=>"#e64b1f",
					"pheoen_noti_product_size"=>"15",
					"pheoen_noti_time_size"=>"12",
					'pheoen_noti_title_extract'=>"12",
					"pheoen_noti_time_color"=>"#535353",
					"pheoen_noti_cross_background_color"=>"#cdcdcd",
					"pheoen_noti_cross_text_color"=>"#fff",
					"pheoen_noti_image_borderradius"=>"10",
					"pheoen_noti_padding_top"=>"5",
					"pheoen_noti_padding_bottom"=>"5",*/
				);
		
		update_option("phoen_notification_gen_settings",$general_settings);	
	}
	
}

?>

<form method="post" name="phoen_noti_enable" class="pehoen_notification_settings">

	<?php 
	
			wp_nonce_field( 'phoen_noti_enable', 'phoen_noti_enable_field' ); 
		
			$general_settings = get_option("phoen_notification_gen_settings");
			 
	?>
		
	<table class="form-table">
		
		<tr>
			<th>
				
				<label for="phoen_noti_enable"><?php _e('Enable Sales Notification','phoen-prod-notification'); ?></label>
				
			</th>
			
			<th>
				
				<input class="phoen_enable_check" type="checkbox"  id="phoen_noti_enable" name="phoen_noti_enable" value="1" <?php echo esc_attr((!empty($general_settings['phoen_noti_enable']) && $general_settings['phoen_noti_enable'] == '1')?'checked':'');?> >
			
			</th>
			
			<th>
				
			</th>
		
		</tr>
		
		<tr>
			<th>
				
				<label for="phoen_noti_time_intvl"><?php _e('Notification Time Interval','phoen-prod-notification'); ?></label>
				
			</th>
			
			<th>
				
				<input class="phoen_noti_time_intvl" type="number" name="phoen_noti_time_intvl" min="0" max="100" value="<?php echo esc_attr((isset($general_settings['phoen_noti_time_intvl']))?$general_settings['phoen_noti_time_intvl']:'');?>" ><?php _e("sec","phoen-prod-notification") ?>
			
			</th>
		
		</tr>
		<tr>
			<th>
				<?php _e('Notification Position','phoen-prod-notification'); ?>
			</th>
			<td>
				<ul class="phoen_noti_position_list">
					<li>
						<input type="radio" name="phoen_noti_position" id="phoen_noti_position" value="top_left" <?php  echo esc_attr(isset($general_settings['phoen_noti_position']) && $general_settings['phoen_noti_position']=="top_left" ?"checked":"");?> /><span><?php _e('Top Left','phoen-prod-notification')?></span>
					</li>
					<li>
						<input type="radio" name="phoen_noti_position" id="phoen_noti_position" value="top_right" <?php  echo esc_attr(isset($general_settings['phoen_noti_position']) && $general_settings['phoen_noti_position']=="top_right" ?"checked":"");?> /><span><?php _e('Top Right','phoen-prod-notification')?></span>
					</li>
					<li>
						<input type="radio" name="phoen_noti_position" id="phoen_noti_position" value="bottom_left" <?php  echo esc_attr(isset($general_settings['phoen_noti_position']) && $general_settings['phoen_noti_position']=="bottom_left" ?"checked":"");?> /><span><?php _e('Bottom Left','phoen-prod-notification')?></span>
					</li>
					<li>		
						<input type="radio" name="phoen_noti_position" id="phoen_noti_position" value="bottom_right" <?php  echo esc_attr(isset($general_settings['phoen_noti_position']) && $general_settings['phoen_noti_position']=="bottom_right" ?"checked":"");?> /><span><?php _e('Bottom Right','phoen-prod-notification')?></span>
					</li>	
				</ul>	
				</td>
		</tr>
		
		
								
		<tr>
			<th>
				
				<input type="submit" class="button button-primary" value="<?php _e('Save','phoen-prod-notification') ?>" name="noti_submit">
				<input type="submit" class="button button-primary" value="<?php _e('Reset','phoen-prod-notification') ?>" name="noti_reset">
			
			</th>
		
		</tr>
	
	</table>
	
</form>