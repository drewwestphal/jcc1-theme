<?php 

if ( !is_admin() )
	wp_enqueue_style('sos-2c-r', get_bloginfo('template_url') . '/examples/2c-r.css'); 

	
class jcc {
	function init() {
		unregister_sidebar('sidebar-1');
		unregister_sidebar('sidebar-2');

		$sidebar_defaults = array(
			'before_widget'  =>   "\n\t\t\t" . '<li id="%1$s" class="widget %2$s">',
			'after_widget'   =>   "\n\t\t\t</li>\n",
			'before_title'   =>   "\n\t\t\t\t". '<h3 class="widgettitle">',
			'after_title'    =>   "</h3>\n"
		);

		register_sidebar(array_merge(array(
			'name' => 'Front Page',
			'id' => 'front-page',
		), $sidebar_defaults));	

		register_sidebar(array_merge(array(
			'name' => 'Pages',
			'id' => 'pages',
		), $sidebar_defaults));	

		register_sidebar(array_merge(array(
			'name' => 'News',
			'id' => 'news',
		), $sidebar_defaults));	

		register_sidebar(array_merge(array(
			'name' => 'Header',
			'id' => 'header',
		), $sidebar_defaults));	
	}
	
	function wp_head() {
		wp_enqueue_script('jquery');

	}
	
	function globalnav($depth = 0, $exclude = array()) {
		if ( $menu = str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages('title_li=&sort_column=menu_order&echo=0&depth=' . $depth . '&exclude=' . implode(',', (array) $exclude)) ) ) {
			$menu = substr(str_replace('</li>', '</li><li class="divider">&nbsp;</li>', $menu), 0, -25);
			$menu = '<ul>' . $menu . '</ul>';
		}
		$menu = '<div id="menu">' . $menu . "</div>\n";
		echo apply_filters( 'globalnav_menu', $menu ); // Filter to override default globalnav: globalnav_menu
	}
}

add_action('init', array('jcc', 'init'), 99);
add_action('wp_head', array('jcc', 'wp_head'), 0);

?>