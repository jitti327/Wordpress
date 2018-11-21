<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php esc_html_x( 'Search for:', 'label', 'woodmart' ); ?></label>
		<input type="text" class="s" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'woodmart' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<input type="hidden" name="post_type" value="<?php echo esc_attr( woodmart_get_opt('search_post_type') ); ?>">
		<button type="submit" class="searchsubmit"><?php echo esc_html_x( 'Search', 'submit button', 'woodmart' ); ?></button>
	</div>
</form>