	jQuery(document).ready(function(){
		
		var notif_datass='';

			notif_datass = jQuery.parseJSON(notif_datas);
			
				if(enable_notification==1){
						if(notif_datass!=null){
							// jQuery("#phoen_not_pop").remove();
							var random_key = Math.floor(Math.random() * max) + 1;
							var output="<div id='phoen_not_pop'>";
								  output+="<input type='button' name='phoen_dialog_close' id='phoen_dialog_close' value='x'  class='phoen_dialog_close'/><span class='phoen_noti_image'><img src='"+notif_datass[random_key]['product_image']+"' /></span><div class='pheon_noti_popmsg'><span class='phoen_noti_span1'>"
								  output+="Somewhere in "+notif_datass[random_key]['billing_state']+" , "+notif_datass[random_key]['billing_country']+" , purchased a <a href='"+notif_datass[random_key]['product_premalink']+"'>"+notif_datass[random_key]['product_title']+"</a><span class='phoen_noti_span2'>" +notif_datass[random_key]['time_ago'];
								  output+="</span></div>";
								  jQuery(".phoen_notifi_popup").append(output);
								  jQuery(".phoen_notifi_popup").addClass("phoen_animation_popup");
								  jQuery(".phoen_dialog_close").on("click",function(){
									jQuery(".phoen_notifi_popup").removeClass("phoen_animation_popup");
									jQuery("#phoen_not_pop").fadeOut();
									clearTimeout(setnotification_interval);
								})
									 setTimeout(function(){
										  jQuery("#phoen_not_pop").fadeOut();
										  jQuery(".phoen_notifi_popup").removeClass("phoen_animation_popup");
										}, (notification_interval)/2)
										
								 var setnotification_interval= setTimeout(function() {
																
																notification_data();
															jQuery(".phoen_notifi_popup").removeClass(".phoen_animation_popup");
															}, notification_interval);				 
						}								
				}
			
				
				function notification_data(){
					// jQuery(".phoen_notifi_popup").addClass(".phoen_animation_popup");
					// jQuery("#phoen_not_pop").remove();
					jQuery("#phoen_not_pop").css('display','none');
					var random_key = Math.floor(Math.random() * max) + 1;
									
					var output="<div id='phoen_not_pop'>";
					  output+="<input type='button' name='phoen_dialog_close' id='phoen_dialog_close' value='x'  class='phoen_dialog_close'/><span class='phoen_noti_image'><img src='"+notif_datass[random_key]['product_image']+"' /></span><div class='pheon_noti_popmsg'><span class='phoen_noti_span1'>"
					  output+="Somewhere in "+notif_datass[random_key]['billing_state']+" , "+notif_datass[random_key]['billing_country']+" , purchased a <a href='"+notif_datass[random_key]['product_premalink']+"'>"+notif_datass[random_key]['product_title']+"</a><span class='phoen_noti_span2'>" +notif_datass[random_key]['time_ago'];
					  output+="</span></div>";
					  jQuery(".phoen_notifi_popup").append(output);
					  jQuery(".phoen_notifi_popup").addClass("phoen_animation_popup");
					  jQuery(".phoen_dialog_close").on("click",function(){
						jQuery(".phoen_notifi_popup").removeClass("phoen_animation_popup");
						jQuery("#phoen_not_pop").fadeOut();
						clearTimeout(setnotification_interval);
						
					})
					
					setTimeout(function(){
							  jQuery("#phoen_not_pop").fadeOut();
							  jQuery(".phoen_notifi_popup").removeClass("phoen_animation_popup");
							  jQuery("#phoen_not_pop").remove();
							  
							}, (notification_interval)/2)
					
					 var setnotification_interval= setTimeout(function() {
													
													notification_data();
													
												
												}, notification_interval);
				
									
				}
		
	})