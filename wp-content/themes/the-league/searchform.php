<form method="get" id="searchform" action="<?php echo esc_url( home_url( '' ) ); ?>/">
	<input type="text" name="s" id="s" value="<?php esc_html_e( 'Search', 'the-league' ); ?>" onfocus='if (this.value == "<?php esc_html_e( 'Search', 'the-league' ); ?>") { this.value = ""; }' onblur='if (this.value == "") { this.value = "<?php esc_html_e( 'Search', 'the-league' ); ?>"; }' />
	<input type="hidden" id="searchsubmit" value="Search" />
</form>