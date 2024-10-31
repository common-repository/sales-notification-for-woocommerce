<?php

if ( ! defined( 'ABSPATH' ) ){ 
	exit;
 }

if ( current_user_can('manage_options') ) {
	
	if ( ! empty( $_POST['noti_style_submit'] ) && wp_verify_nonce( ($_POST['phoen_noti_style_field']),'phoen_noti_style' ) ) {

		
		$pheoen_noti_backcolor = isset($_POST['pheoen_noti_backcolor'])?sanitize_text_field($_POST['pheoen_noti_backcolor']):"";
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
		$pheoen_noti_padding_bottom = isset($_POST['pheoen_noti_padding_bottom'])?sanitize_text_field($_POST['pheoen_noti_padding_bottom']):"";
		
		$style_settings = array(
			"pheoen_noti_backcolor"=>$pheoen_noti_backcolor,
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
			"pheoen_noti_padding_top"=>$pheoen_noti_padding_top,
		);
		
		update_option("phoen_notification_style_settings",$style_settings);				
    }
    if ( ! empty( $_POST['noti_style_reset'] ) && wp_verify_nonce( ($_POST['phoen_noti_style_field']),'phoen_noti_style' ) ) {

        $style_settings = array(
                "pheoen_noti_backcolor"=>"rgba(251, 251, 251, 1)",
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
                "pheoen_noti_padding_bottom"=>"5",
            );
    
       update_option("phoen_notification_style_settings",$style_settings);	
   }

}

?>
	
<form method="post" name="phoen_noti_style" class="pehoen_notification_settings">

	<?php 
	
			wp_nonce_field( 'phoen_noti_style', 'phoen_noti_style_field' ); 
		
			$style_settings = get_option("phoen_notification_style_settings");
			 
	?>
<table class="form-table">
		
		
		
		<tr>
			<th>
				<label for="pheoen_noti_backcolor"><?php _e('Background Color','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="text" class="color-picker" data-alpha="true" name="pheoen_noti_backcolor" id="phoen_noti_backcolor" class="phoen_noti_color" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_backcolor'])?$style_settings['pheoen_noti_backcolor']:"");?>" />
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="pheoen_noti_padding"><?php _e('Padding','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="number"  min="0" name="pheoen_noti_padding_top" id="pheoen_noti_padding_top" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_padding_top'])?$style_settings['pheoen_noti_padding_top']:"");?>" placeholder="<?php _e('top','phoen-prod-notification'); ?>" /><?php _e('px','phoen-prod-notification'); ?>
				<input type="number"  min="0" name="pheoen_noti_padding_bottom" id="pheoen_noti_padding_bottom" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_padding_bottom'])?$style_settings['pheoen_noti_padding_bottom']:"");?>" placeholder="<?php _e('bottom','phoen-prod-notification'); ?>" /><?php _e('px','phoen-prod-notification'); ?>
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="phoen_noti_borderradius"><?php _e('Border Radius','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="number" min=0 name="phoen_noti_borderradius" id="phoen_noti_borderradius" value="<?php echo esc_attr(isset($style_settings['phoen_noti_borderradius'])?$style_settings['phoen_noti_borderradius']:"");?>" />
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="phoen_noti_bordercolor"><?php _e('Border Color','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="text" name="phoen_noti_bordercolor" id="phoen_noti_bordercolor" class="phoen_noti_color color-picker" value="<?php echo esc_attr(isset($style_settings['phoen_noti_bordercolor'])?$style_settings['phoen_noti_bordercolor']:"");?>" />
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="pheoen_noti_backcolor"><?php _e('Product Title Excerpt','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="number" min=0 name="pheoen_noti_title_extract" id="pheoen_noti_title_extract" class="phoen_noti_color" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_title_extract'])?$style_settings['pheoen_noti_title_extract']:"0");?>" />
				<p><?php _e(' eg: Woocommerce Variable...','phoen-prod-notification'); ?></p>
			</td>
		</tr>
	
		<tr>
			<th>
				<label for="pheoen_noti_image_bordercolor"><?php _e('Image Border Color','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="text" name="pheoen_noti_image_bordercolor" class="phoen_noti_color color-picker" id="pheoen_noti_image_bordercolor" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_image_bordercolor'])?$style_settings['pheoen_noti_image_bordercolor']:"");?>" />
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="pheoen_noti_image_bordercolor"><?php _e('Image Border Radius','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="number" name="pheoen_noti_image_borderradius" min=0  id="pheoen_noti_image_borderradius" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_image_borderradius'])?$style_settings['pheoen_noti_image_borderradius']:"10");?>" />
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="pheoen_noti_message_font_size"><?php _e('Message Font Size','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="number" name="pheoen_noti_message_font_size" class="phoen_noti_color" min =0  max=20 id="pheoen_noti_message_font_size" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_message_font_size'])?$style_settings['pheoen_noti_message_font_size']:"0");?>" /><?php _e('px','phoen-prod-notification'); ?>
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="pheoen_noti_message_font_color"><?php _e('Message Font color','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="text" name="pheoen_noti_message_font_color" class="phoen_noti_color color-picker" id="pheoen_noti_message_font_color" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_message_font_color'])?$style_settings['pheoen_noti_message_font_color']:"");?>" />
			</td>
		</tr>
		<tr>
			<th>
				<label for="pheoen_noti_product_color"><?php _e('Product Text Color','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="text" name="pheoen_noti_product_color" class="phoen_noti_color color-picker" id="pheoen_noti_product_color" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_product_color'])?$style_settings['pheoen_noti_product_color']:"");?>" />
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="pheoen_noti_product_size"><?php _e('Product Text Size','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="number" name="pheoen_noti_product_size" class="phoen_noti_color" id="pheoen_noti_product_size" min =0  max=20 value="<?php echo esc_attr(isset($style_settings['pheoen_noti_product_size'])?$style_settings['pheoen_noti_product_size']:"0");?>" /><?php _e('px','phoen-prod-notification'); ?>
			</td>
		</tr>
		<tr>
			<th>
				<label for="pheoen_noti_time_size"><?php _e('Time Text Size','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="number" name="pheoen_noti_time_size" class="phoen_noti_color " id="pheoen_noti_time_size"  min =0 max=20 value="<?php echo esc_attr(isset($style_settings['pheoen_noti_time_size'])?$style_settings['pheoen_noti_time_size']:"0");?>" /><?php _e('px','phoen-prod-notification'); ?>
			</td>
		</tr>
		<tr>
			<th>
				<label for="pheoen_noti_time_color"><?php _e('Time Text Color','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="text" name="pheoen_noti_time_color" class="phoen_noti_color color-picker" id="pheoen_noti_time_color" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_time_color'])?$style_settings['pheoen_noti_time_color']:"");?>" />
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="pheoen_noti_cross_background_color"><?php _e('Cross Background Color','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="text" name="pheoen_noti_cross_background_color" class="phoen_noti_color color-picker" id="pheoen_noti_cross_background_color" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_cross_background_color'])?$style_settings['pheoen_noti_cross_background_color']:"");?>" />
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="pheoen_noti_cross_text_color"><?php _e('Cross Text Color','phoen-prod-notification'); ?></label>
				
			</th>
			
			<td>
				<input type="text" name="pheoen_noti_cross_text_color" class="phoen_noti_color color-picker" id="pheoen_noti_cross_text_color" value="<?php echo esc_attr(isset($style_settings['pheoen_noti_cross_text_color'])?$style_settings['pheoen_noti_cross_text_color']:"");?>" />
			</td>
		</tr>
								
		<tr>
			<th>
				
				<input type="submit" class="button button-primary" value="<?php _e('Save','phoen-prod-notification') ?>" name="noti_style_submit">
				<input type="submit" class="button button-primary" value="<?php _e('Reset','phoen-prod-notification') ?>" name="noti_style_reset">
			
			</th>
		
		</tr>
	
	</table>
	
</form>