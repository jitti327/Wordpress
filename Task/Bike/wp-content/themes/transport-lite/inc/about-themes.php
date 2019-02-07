<?php
/**
 *Transport Lite About Theme
 *
 * @package Transport Lite
 */

//about theme info
add_action( 'admin_menu', 'transport_lite_abouttheme' );
function transport_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'transport-lite'), __('About Theme Info', 'transport-lite'), 'edit_theme_options', 'transport_lite_guide', 'transport_lite_mostrar_guide');   
} 

//Info of the theme
function transport_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'transport-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Transport Lite  is a Transport is a flexible, powerful and responsive WordPress theme designed for businesses that specializes in transport, shipping, logistics, warehousing, movers and packers. it is user friendly, easy to use and fully responsive free transport WordPress theme. also, this theme is compatible with WordPress latest version and most papular plugins.','transport-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'transport-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'transport-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'transport-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'transport-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'transport-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'transport-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'transport-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'transport-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'transport-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( TRANSPORT_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'transport-lite'); ?></a> | 
            <a href="<?php echo esc_url( TRANSPORT_LITE_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'transport-lite'); ?></a> | 
            <a href="<?php echo esc_url( TRANSPORT_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'transport-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>