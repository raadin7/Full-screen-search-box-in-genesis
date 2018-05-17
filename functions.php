add_filter( 'wp_nav_menu_items', 'theme_menu_extras', 10, 2 );
function theme_menu_extras( $menu, $args ) {
	if ( 'primary' !== $args->theme_location )
		return $menu;
	ob_start();
	$menu  .= '<li class="nav-link-search">
				<a href="#search" class="toggle-search-box">
					<i class="fas fa-search"></i>
				</a>
			</li>
	' . $search . '</li>';
	return $menu;
}

if(is_admin()){

} else {
	wp_register_script('custom-js',get_stylesheet_directory_uri().'/js/search.js',array(),NULL,true);
wp_enqueue_script('custom-js');

$wnm_custom = array( 'stylesheet_directory_uri' => get_stylesheet_directory_uri() );
wp_localize_script( 'custom-js', 'directory_uri', $wnm_custom );
	add_action('wp_footer','ult_fs_search');

}

function ult_fs_search(){
	?>
	<div id="ult-fs-search">
		<button type="button" class="close">&times;</button>
		<form role="search" class="form-search" method="get" id="searchform" action="<?php echo home_url( '/' );?>" >
			<input type="text" value="" name="s" placeholder="Type Your Keywords Here" />
			<button type="submit" class="btn btn-primary">Search</button>
		</form>
	</div>
<?php
}
