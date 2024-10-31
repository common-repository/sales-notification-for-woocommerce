<?php
 /**
 * Plugin Name: Sales Notification for Woocommerce
 * Plugin URI: https://www.phoeniixx.com/product/sales-notification-for-woocommerce/
 * Description: Sales Notification for Woocommerce is a plugin to show your recent orders on your website with name, location, product name. It will help to boost your sales. You can show the notification on all the pages. It allows you set the limit of recent ordersalso. 
 * Version: 1.1.4
 * Author: phoeniixx
 * Author URI: https://www.phoeniixx.com/
 * License: GPLv2 or later
 *Text Domain: phoen-prod-notification
 * WC requires at least: 2.6.0
 * WC tested up to: 3.8.0
 */
 
 if ( ! defined( 'ABSPATH' ) ){ 
	exit;
 }
 
define("PHOEN_SNW_PLUGIN_URL",plugin_dir_url( __FILE__ ));

define("PHOEN_SNW_PLUGIN_PATH",plugin_dir_path(__FILE__));
 
 /*
 --------------------------------------------------------------- Cheking if woocommerce is active or not -------------------------------------------------------------------
 */
 
 if(in_array('woocommerce/woocommerce.php',apply_filters('active_plugins',get_option( 'active_plugins' ) ))	){
 
	add_action('admin_menu', 'phoen_notification_menu');
		
		//Created Menu on dashboard

		function phoen_notification_menu() {
			
			add_menu_page(__('Sales Notification','phoen-prod-notification'), __('Sales Notification','phoen-prod-notification'),'manage_options','Phoen_Notification','phoen_notify_settings', PHOEN_SNW_PLUGIN_URL.'assets/images/logo.png' ,'56');
			
		}
		
		function phoen_notify_settings(){
			?>
			<div class="phoen_not_set wrap" id="phoen_not_set wrap">
			
				<?php
					if(isset($_GET['tab']))
					{
						$tab = sanitize_text_field( $_GET['tab'] );
						
					}
					else
					{
						
						$tab="";
						
					}
				?>
				
				<!--<h2> <?php _e('Notification Settings','phoen-prod-notification'); ?></h2>-->
				
				<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
				
					<a class="nav-tab <?php if($tab == 'general' || $tab == ''){ echo esc_attr( "nav-tab-active" ); } ?>" href="?page=Phoen_Notification&amp;tab=general"><?php _e('General','phoen-prod-notification'); ?></a>
					
					<a class="nav-tab <?php if($tab == 'style_setting' ){ echo esc_attr( "nav-tab-active" ); } ?>" href="?page=Phoen_Notification&amp;tab=style_setting"><?php _e('Styling','phoen-prod-notification'); ?></a>

					<a class="nav-tab <?php if($tab == 'product_setting' ){ echo esc_attr( "nav-tab-active" ); } ?>" href="?page=Phoen_Notification&amp;tab=product_setting"><?php _e('Product','phoen-prod-notification'); ?></a>
										
				</h2>
				
			</div>
			
			<?php
				if($tab=='general' || $tab == '')	{
						
					include_once(PHOEN_SNW_PLUGIN_PATH.'includes/enablenotification.php');
						
				} 
				
				if($tab=='product_setting') {
					
					include_once(PHOEN_SNW_PLUGIN_PATH.'includes/product_notification.php');
				
				}

				if($tab=='style_setting'){

					include_once(PHOEN_SNW_PLUGIN_PATH.'includes/style_notification.php');
				}
				
			}
		
/*---------------------------------------------------------  save the default settings for the notification options  -------------------------------------------------------

*/		
	register_activation_hook( __FILE__, 'phoen_notification_activate' );
		
		function phoen_notification_activate(){
			
			$get_setting = get_option("phoen_notification_gen_settings");
			
			$product_count = get_option("phoen_notif_pro_count");
			
			if(empty($get_setting)){
				
				$general_settings = array(
					"phoen_noti_enable"=>"1",
					"phoen_noti_time_intvl"=>"7",
					"phoen_noti_position"=>"bottom_left",
					
				);
	
				update_option("phoen_notification_gen_settings",$general_settings);
				
			}
			
			$get_product_settings = get_option("phoen_notif_pro_count");
			
			if(empty($get_product_settings)){
				
				$product_count ="10";
				
				update_option("phoen_notif_pro_count",$product_count);
				
			}

			$style_product_settings = get_option("phoen_notification_style_settings");

			if(empty($style_product_settings)){
				
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

		
	add_action("admin_enqueue_scripts","phoen_notification_admin_scripts");
		
		function phoen_notification_admin_scripts(){
			 
			$current_page = get_current_screen()->base;
			 
			if($current_page=="toplevel_page_Phoen_Notification"){
				
				wp_enqueue_style( 'phoen-notification-backendcss', PHOEN_SNW_PLUGIN_URL . 'assets/css/backend.css', false, '1.0.0' );
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_script( 'wp-color-picker-alpha', PHOEN_SNW_PLUGIN_URL.'assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '2.0', false );
				
			}
			
		}
		
		
	add_action("wp_head","phoen_notification_head_scripts");
		
		function phoen_notification_head_scripts(){
			
			wp_enqueue_script('phoen-notification-custom',PHOEN_SNW_PLUGIN_URL.'assets/js/custom.js',array('jquery'),true,true);
			// wp_enqueue_style( 'phoen-notification-frontcss', PHOEN_SNW_PLUGIN_URL . 'assets/css/front.css', false, '1.0.0' );
			
		}
		
		
	add_action("wp_footer","phoen_notification_message_style");
		
		function phoen_notification_message_style(){
			
			$style_settings = get_option("phoen_notification_style_settings");
			$general_settings = get_option("phoen_notification_gen_settings");
			
			global $wpdb, $woocommerce;
			$product_id="";
			$product_notifi=array();
			$product_category_list=array();
			$noti_data=array();
			$excerpt_limit = isset($style_settings['pheoen_noti_title_extract'])?$style_settings['pheoen_noti_title_extract']:"0";
				$countries_obj = new WC_Countries();
				$countries_array = $countries_obj->get_countries();
				$country_states_array = $countries_obj->get_states();
				
				$prod_count_notification = get_option("phoen_notif_pro_count");
				$date_recent_from = date("Y-m-d");
				$phoen_recent_order_querys_all = "
				SELECT 
					first_name_meta.meta_value as first_name,
					last_name_meta.meta_value as last_name,
					posts.post_status as ordr_status,
					billing_amount_meta.meta_value as billing_amount,  
					billing_email_meta.meta_value as billing_email,
					billing_address1_meta.meta_value as billing_address1,
					billing_address2_meta.meta_value as billing_address2,
					billing_phone_meta.meta_value as billing_phone_no,
					billing_country_meta.meta_value as billing_country, 
					billing_state_meta.meta_value as billing_state,
					posts.post_date as order_date,
					posts.ID AS ID
					
					FROM    {$wpdb->posts} AS posts
					LEFT JOIN {$wpdb->postmeta} AS first_name_meta ON(posts.ID = first_name_meta.post_id)
					LEFT JOIN {$wpdb->postmeta} AS last_name_meta ON(posts.ID = last_name_meta.post_id)
					LEFT JOIN {$wpdb->postmeta} AS billing_amount_meta ON(posts.ID = billing_amount_meta.post_id)
					LEFT JOIN {$wpdb->postmeta} AS billing_email_meta ON(posts.ID = billing_email_meta.post_id)
					LEFT JOIN {$wpdb->postmeta} AS billing_address1_meta ON(posts.ID = billing_address1_meta.post_id)
					LEFT JOIN {$wpdb->postmeta} AS billing_address2_meta ON(posts.ID = billing_address2_meta.post_id)
					LEFT JOIN {$wpdb->postmeta} AS billing_country_meta ON(posts.ID = billing_country_meta.post_id)
					LEFT JOIN {$wpdb->postmeta} AS billing_state_meta ON(posts.ID = billing_state_meta.post_id)
					LEFT JOIN {$wpdb->postmeta} AS billing_phone_meta ON(posts.ID = billing_phone_meta.post_id)
					
				WHERE 
					posts.post_status LIKE 'wc-%' 
					AND posts.post_type IN ( 'shop_order' ) 
					AND billing_amount_meta.meta_key IN ( '_order_total')
					
					AND last_name_meta.meta_key IN ( '_billing_last_name')
					AND first_name_meta.meta_key IN ( '_billing_first_name')
					AND billing_email_meta.meta_key IN ( '_billing_email')
					AND billing_address1_meta.meta_key IN ( '_billing_address_1')
					AND billing_address2_meta.meta_key IN ( '_billing_address_2')
					AND billing_country_meta.meta_key IN ( '_billing_country')
					AND billing_state_meta.meta_key IN ( '_billing_state')
					AND billing_phone_meta.meta_key IN ( '_billing_phone') 

				ORDER BY
					posts.ID DESC  LIMIT {$prod_count_notification}
			";
				$phoen_recent_order = $wpdb->get_results(  $phoen_recent_order_querys_all,ARRAY_A);
					
				if(!empty($phoen_recent_order)){
					$i=1;
					
					foreach($phoen_recent_order as $key =>$recent_order){
						$order = new WC_Order( $phoen_recent_order[$key]['ID'] );
						$items = $order->get_items();
						
						$product_id="";
						
						foreach ( $items as $item ) {
							$product_name = $item['name'];
							$product_id.= $item['product_id'];
							$product_id.= ",";
							$product_variation_id = $item['variation_id'];
						}
						$order_date = $phoen_recent_order[$key]['order_date'];
						$current_date = date("Y-m-d H:i:s");
						$time_ago='';
						$diff = abs(strtotime($current_date) - strtotime($order_date));
						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$minutes = round((strtotime($current_date) - strtotime($order_date)) /60);
						$seconds = strtotime($current_date) - strtotime($order_date);
						$hours = floor($diff / ( 60 * 60 ));
						$days = floor($hours/24);
						$time_ago='';
						if($seconds<60){
							$time_ago = $seconds." sec ago";
						}else if($minutes<60){
							if($minutes==1){
								$time_ago = $minutes." minute ago";
							}else{
								$time_ago = $minutes." minutes ago";
							}
						}else if($hours<24){
							if($hours==1){
								$time_ago = $hours." hour ago";		
							}else{
								$time_ago = $hours." hours ago";
							}
						}else{
							if($days==1){
								$time_ago = $days." day ago";
							}else{
								$time_ago = $days." days ago";
							}
						}
						
						$first_name = $phoen_recent_order[$key]['first_name'];
						$billing_city = $phoen_recent_order[$key]['billing_state'];
						$billing_country = $phoen_recent_order[$key]['billing_country'];
						$product_notifi[$i]['first_name'] =$phoen_recent_order[$key]['first_name'];
						$product_notifi[$i]['billing_state'] =$phoen_recent_order[$key]['billing_state'];
						$product_notifi[$i]['billing_country'] =$phoen_recent_order[$key]['billing_country'];
						$product_notifi[$i]['product_id'] =substr($product_id,0,-1);
						$product_notifi[$i]['time_ago'] =$time_ago;
						$i++;
						unset($product_id);
					}
					// then if you loop through them, you can get all the relevant data

					if(!empty($product_notifi)){
						$k=1;
						$j=0;
						foreach($product_notifi as $kew =>$prodt){
							$product_id = explode(",",$product_notifi[$kew]['product_id']);
							foreach($product_id as $keys =>$prod){
								$product_details =get_post($product_id[$keys]);
									
									$product_image_src =wp_get_attachment_image_src( get_post_thumbnail_id($product_id[$keys]), 'thumbnail_size' );
									
								$noti_data[$kew][$keys]['first_name'] =$product_notifi[$kew]['first_name'];
								$noti_data[$kew][$keys]['billing_state'] =$product_notifi[$kew]['billing_state'];
								$noti_data[$kew][$keys]['billing_country'] =$product_notifi[$kew]['billing_country'];
								$noti_data[$kew][$keys]['product_premalink'] =$product_details->guid;
								$noti_data[$kew][$keys]['product_title'] =$product_details->post_title;
								$noti_data[$kew][$keys]['product_image'] =isset($product_image_src[0])?$product_image_src[0]:wc_placeholder_img_src();
								$noti_data[$kew][$keys]['time_ago'] =$product_notifi[$kew]['time_ago'];
								$j++;
								$k+=$j;
								unset($product_category_list);
							}
							$k--;
							
						}

					}
				
					// $noti_data = rsort($noti_data);
					
					$prod_count_notification = get_option("phoen_notif_pro_count");
					
					$noti_filter = array();
					foreach($noti_data as $kews =>$data){
						$noti_filter = array_merge($noti_filter,$noti_data[$kews]);
					}
					$min =1;
					if(count($noti_filter)>$prod_count_notification){
						$max=$prod_count_notification;
					}else{
						$max=count($noti_filter);
					}
					$random_key = rand($min,$max);
					
					$noti_filters = array_slice($noti_filter,0,$prod_count_notification);
					
					$dd=1;
					foreach($noti_filters as $key =>$noti){						
						$noti_datas[$dd]['first_name'] =$noti_filters[$key]['first_name'];
						$noti_datas[$dd]['billing_state'] =$country_states_array[$noti_filters[$key]['billing_country']][$noti_filters[$key]['billing_state']];
						$noti_datas[$dd]['billing_country'] =$countries_array[$noti_filters[$key]['billing_country']];
						$noti_datas[$dd]['product_premalink'] =$noti_filters[$key]['product_premalink'];
						$noti_datas[$dd]['product_title'] =(strlen($noti_filters[$key]['product_title'])>$excerpt_limit)?substr($noti_filters[$key]['product_title'],0,$excerpt_limit)."...":$noti_filters[$key]['product_title'];
						$noti_datas[$dd]['product_image'] =$noti_filters[$key]['product_image'];
						$noti_datas[$dd]['time_ago'] =$noti_filters[$key]['time_ago'];
						$dd++;
					}
				}
				
				
			?>
			<div class='phoen_notifi_popup <?php echo isset($general_settings['phoen_noti_position']) && !empty($general_settings['phoen_noti_position'])?"phoen_".$general_settings['phoen_noti_position']:"phoen_bottom_left"?>' ></div>
			<script>
				var enable_notification = '';
					enable_notification ='<?php echo isset($general_settings['phoen_noti_enable']) && !empty($general_settings['phoen_noti_enable'])?$general_settings['phoen_noti_enable']:""?>';
				var notification_interval = '';
					notification_interval ='<?php echo isset($general_settings['phoen_noti_time_intvl']) && !empty($general_settings['phoen_noti_time_intvl'])?$general_settings['phoen_noti_time_intvl']*1000:""?>';
				var notification_class_position ='';
					notification_class_position='<?php echo isset($general_settings['phoen_noti_position']) && !empty($general_settings['phoen_noti_position'])?"phoen_".$general_settings['phoen_noti_position']:"phoen_bottom_left"?>';
				var notif_datas = '';
				<?php 
					if(!empty($noti_datas)){
				?>
					notif_datas='<?php echo htmlspecialchars_decode(json_encode($noti_datas))?>';
				<?php }?>
				var min=0;
				var max='';
				max ='<?php echo isset($max)&&!empty($max)?$max:"" ?>';
				
			</script>
			
			<style>
				
				.phoen_notifi_popup {
					background-color: <?php echo isset($style_settings['pheoen_noti_backcolor'])?$style_settings['pheoen_noti_backcolor']:"rgba(251,251,251,1)";?>;
					border-width: 1px;
					border-color: <?php echo isset($style_settings['phoen_noti_bordercolor'])?$style_settings['phoen_noti_bordercolor']:"#ccc";?>;
					border-style: solid;
					border-radius: <?php echo isset($style_settings['phoen_noti_borderradius']) || ($style_settings['phoen_noti_borderradius']==0) ?$style_settings['phoen_noti_borderradius']:"10"; ?>px; 
					font-size: 13px;
					left: 0;
					padding: 0;
					position: fixed;
					top: 0;
					z-index: 9999;
					bottom:auto;
					right:auto;
					width: 30%;
				}
				
				.phoen_notifi_popup.phoen_top_left {
					left: 50px;
					top: 50px;
				}
				
				.phoen_notifi_popup.phoen_top_right {
					left: auto;
					right: 50px;
					top: 50px;
				}
				
				.phoen_notifi_popup.phoen_bottom_left {
					bottom: 50px;
					left: 50px;
					top: auto;
				}
				
				.phoen_notifi_popup.phoen_bottom_right {
					bottom: 50px;
					left: auto;
					right: 50px;
					top: auto;
				}
				
				.phoen_notifi_popup span
				 {
					display: block;
					line-height: 1;
					color:<?php echo isset($phoen_design_setting['phoen_noti_text_color'])?$phoen_design_setting['phoen_noti_text_color']:"#000" ?>;
				}
				
				.phoen_notifi_popup a  {
					display: block;
					line-height: 1;
					color:<?php echo isset($phoen_design_setting['pheoen_noti_linkcolor'])?$phoen_design_setting['pheoen_noti_linkcolor']:"#000"; ?>;
				}
				
				.phoen_notifi_popup a:hover {
					text-decoration: none;
				}

				.phoen_notifi_popup #phoen_dialog_close[type="button"] {
					background-color: <?php echo isset($style_settings['pheoen_noti_cross_background_color'])?$style_settings['pheoen_noti_cross_background_color']:"#cdcdcd" ?>;
					background-image: none;
					border: medium none;
					border-radius: 50%;
					box-shadow: none;
					color: <?php echo isset($style_settings['pheoen_noti_cross_text_color'])?$style_settings['pheoen_noti_cross_text_color']:"#fff";?>;
					font-size: 16px;
					font-weight: 700;
					height: 25px;
					line-height: 1;
					padding: 0 0 2px;
					position: absolute;
					right: 10px;
					text-align: center;
					top: 5px;
					width: 25px;
				}

				.phoen_notifi_popup .phoen_noti_image img {
					border: 5px solid <?php echo isset($style_settings['pheoen_noti_image_bordercolor'])?$style_settings['pheoen_noti_image_bordercolor']:"#e1e0de";?>;
					border-radius: <?php echo isset($style_settings['pheoen_noti_image_borderradius']) || ($style_settings['pheoen_noti_image_borderradius']==0)?$style_settings['pheoen_noti_image_borderradius']:"10";?>px;
					height: 60px;
					padding: 0;
					width: 60px;
				}
				
				.phoen_notifi_popup .phoen_noti_image {
					display: inline-block;
					margin-right: 10px;
					padding: 7px 5px;
					text-align: center;
					vertical-align: middle;
					width: 20%;
				}

				.phoen_notifi_popup .pheon_noti_popmsg {
					width: 73%;
					padding: <?php echo isset($style_settings['pheoen_noti_padding_top'])?$style_settings['pheoen_noti_padding_top']:"5";?>px 0 <?php echo isset($style_settings['pheoen_noti_padding_bottom'])?$style_settings['pheoen_noti_padding_bottom']:"5";?>px 0;
				}
				
				.phoen_notifi_popup .phoen_noti_image {
					display: inline-block;
					vertical-align: middle;
				}



				.phoen_notifi_popup .pheon_noti_popmsg {
					display: inline-block;
					vertical-align: middle;
				}


				.phoen_notifi_popup span,
				.phoen_notifi_popup a  {
					display: block;
					line-height: 1;
				}

				.phoen_notifi_popup a {
					font-size: <?php echo isset($style_settings['pheoen_noti_product_size'])?$style_settings['pheoen_noti_product_size']."px":"15px"?>;
					font-weight: 600;
					margin: 8px 0 5px;
					text-transform: uppercase;
					color: <?php echo isset($style_settings['pheoen_noti_product_color'])?$style_settings['pheoen_noti_product_color']:"#e64b1f"?>;
				}

				.phoen_notifi_popup .phoen_noti_span2 {
					font-size: <?php echo isset($style_settings['pheoen_noti_time_size'])?$style_settings['pheoen_noti_time_size']."px":"12px"?>;
					opacity: 0.8;
					color: <?php echo isset($style_settings['pheoen_noti_time_color'])?$style_settings['pheoen_noti_time_color']:"#535353"?>;
					font-weight: 400;
				}

				.pheon_noti_popmsg .phoen_noti_span1 {
					font-size:<?php echo isset($style_settings['pheoen_noti_message_font_size'])?$style_settings['pheoen_noti_message_font_size']."px":"14px"?> ;
					color: <?php echo isset($style_settings['pheoen_noti_message_font_color'])?$style_settings['pheoen_noti_message_font_color']:"#262626"?>;
					font-weight: 600;
					width: 90%;
				}
				
				.phoen_notifi_popup.phoen_bottom_left {
					transform: translateY(150px);
					opacity: 0;
					transition: all 0.5s ease;
				}
				
				.phoen_notifi_popup.phoen_bottom_left.phoen_animation_popup {
					transform: translateY(0);
					opacity: 1;
					transition: all 0.5s ease;
				}
				
			
			</style>
				
			
			<?php 
		}
 }
