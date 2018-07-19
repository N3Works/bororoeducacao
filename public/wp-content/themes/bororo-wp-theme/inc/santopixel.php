<?php

//error_reporting( E_ALL );
//error_reporting( 0 );
error_reporting( E_ERROR | E_WARNING | E_PARSE );

/* ##################################################################################################################### */

/**
 * admin_remove_editor_init
 */
function admin_remove_editor_init() {
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} else if ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	} else {
		return;
	}

	$template_file = get_post_meta( $post_id, '_wp_page_template', TRUE );
	
	if (   $template_file == 'template-download.php'
		|| $template_file == 'template-redirect.php'
		) {
		remove_post_type_support( 'page', 'editor' );
	}

	//remove_post_type_support( 'page', 'thumbnail' );
}
add_action( 'init', 'admin_remove_editor_init' );

/**
 * frontend_paging_nav
 */
function frontend_paging_nav( $type = '' ) {
	global $wp_query;

	$isMedia = is_page() && substr( get_page_template(), - strlen( 'template-media.php' ) ) === 'template-media.php';
	$isPosts = is_page() && substr( get_page_template(), - strlen( 'template-posts.php' ) ) === 'template-posts.php';
	$isCompanies = is_page() && substr( get_page_template(), - strlen( 'template-companies.php' ) ) === 'template-companies.php';

	$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$numItens = ! empty( $numItens ) ? $numItens : get_option( 'posts_per_page' );
	
	if ( $isMedia ) {
		$wp_query = new WP_Query( array( 'post_type' => $type, 'posts_per_page' => $numItens ) );
	}
	if ( $isPosts ) {
		$wp_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $numItens ) );
	}
	if ( $isCompanies ) {
		$wp_query = new WP_Query( array( 'post_type' => 'tematica', 'posts_per_page' => $numItens ) );
	}

	if ( $wp_query->max_num_pages < 2 ) {
		if ( $isMedia ) {
			wp_reset_query();
		}

		return;
	}

	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args = array();
	$url_parts = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	if ( ! empty( $type ) ) {
		$format .= "?type={$type}";
	}
	
	$links = paginate_links(
		array(
			'base' => $pagenum_link,
			'format' => $format,
			'total' => $wp_query->max_num_pages,
			'current' => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="icon-arrow-left2"></i> Anterior',
			'next_text' => 'Próximo <i class="icon-arrow-right2"></i>'
		)
	);

	if ( $links ) {
		echo $links;
	}

	if ( $isMedia || $isPosts || $isCompanies ) {
		wp_reset_query();
	}

}

/**
* remove_menus
*/
function remove_menus() {
	//remove_menu_page( 'index.php' );				  //Dashboard
	//emove_menu_page( 'edit.php' );				   //Posts
	//remove_menu_page( 'upload.php' );				 //Media
	//remove_menu_page( 'edit.php?post_type=page' );	//Pages
	remove_menu_page( 'edit-comments.php' );		  //Comments
	//remove_menu_page( 'themes.php' );				 //Appearance
	//remove_menu_page( 'plugins.php' );				//Plugins
	//remove_menu_page( 'users.php' );				  //Users
	//remove_menu_page( 'tools.php' );				  //Tools
	//remove_menu_page( 'options-general.php' );		//Settings
}
add_action( 'admin_menu', 'remove_menus' );

/**
* archive_query_filter
*/
function archive_query_filter( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( is_archive() ) {
			$taxQuery = array();
			$currentPlatform = isset( $_GET['plataforma'] ) ? $_GET['plataforma'] : '';
			$currentTheme = isset( $_GET['tema'] ) ? $_GET['tema'] : '';
			$currentCategory = isset( $_GET['categoria'] ) ? $_GET['categoria'] : '';
			$currentVehicle = isset( $_GET['veiculo'] ) ? $_GET['veiculo'] : '';

			if ( ! empty( $currentPlatform ) ) {
				$taxQuery[] = array(
					'taxonomy' => 'plataformas',
					'field' => 'slug',
					'terms' => $currentPlatform
				);
			}

			if ( ! empty( $currentTheme ) ) {
				$taxQuery[] = array(
					'taxonomy' => 'temas',
					'field' => 'slug',
					'terms' => $currentTheme
				);
			}

			if ( ! empty( $currentCategory ) ) {
				$taxQuery[] = array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $currentCategory
				);
			}

			if ( sizeof( $taxQuery ) ) {
				$query->set( 'tax_query', $taxQuery );
			}

			if ( ! empty( $currentVehicle ) ) {
				$args = array(
					'name' => $currentVehicle,
					'post_type' => 'veiculos',
					'posts_per_page' => 1,
					'post_status' => 'publish'
				);

				$vehicles = get_posts( $args );

				if ( sizeof( $vehicles ) ) {
					$metaQuery = array(
						array(
							'key' => '_wpcf_belongs_veiculos_id',
							'value' => $vehicles[0]->ID
						)
					);

					$query->set( 'meta_query', $metaQuery );
				}
			}
		}
	}
}
add_action( 'pre_get_posts', 'archive_query_filter' );

/**
* home_query_types_filter
*/
function home_query_types_filter( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( is_home() || is_front_page() ) {
			$query->set( 'post_type', array( 'veiculos', 'projetos', 'cases' ) );
		}
	}
}
add_action( 'pre_get_posts', 'home_query_types_filter' );

/**
* home_query_order_filter
*/
function home_query_order_filter( $orderby, $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( is_home() || is_front_page() ) {
			$orderby = 'position1, position2, '. $orderby;
		}
	}
	
	return $orderby;
}
add_filter( 'posts_orderby', 'home_query_order_filter', 100, 2 );

/**
* home_query_join_filter
*/
function home_query_join_filter( $join, $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( is_home() || is_front_page() ) {
			$join = "JOIN (SELECT @veiculos := 0) AS veiculos JOIN (SELECT @projetos := 0) AS projetos JOIN (SELECT @cases := 0) AS cases";
		}
	}

	return $join;
}

add_filter( 'posts_join', 'home_query_join_filter', 100, 2 );

/**
* home_query_select_filter
*/
function home_query_select_filter( $sql, $query ) {
	global $wpdb;

	if ( ! is_admin() && $query->is_main_query() ) {
		if ( is_home() || is_front_page() ) {
			$table = preg_replace( '/SELECT\s+SQL_CALC_FOUND_ROWS\s+([a-zA-Z0-9_]+)\..+/i', '${1}', $sql );
			$select = "IF({$table}.post_type='veiculos',LPAD(@veiculos:=@veiculos+1,3,'0'),IF({$table}.post_type='projetos',LPAD(@projetos:=@projetos+1,3,'0'),LPAD(@cases:=@cases+1,3,'0'))) AS position1, IF({$table}.post_type='veiculos',1,IF({$table}.post_type='projetos',2,3)) AS position2, {$table}.*";
			$sql = preg_replace( '/(SELECT\s+SQL_CALC_FOUND_ROWS\s+)(.+)(\s+FROM\s+.+)/i', "\${1}{$select}\${3}", $sql );
		}
	}

	return $sql;
}
add_filter( 'posts_request', 'home_query_select_filter', 10, 2 );

/* ##################################################################################################################### */

/**
 * get_month_text
 */
function get_month_text( $month ) {
	$return = '';

	switch ( $month ) {
		case 1 : $return = 'Janeiro'; break;
		case 2 : $return = 'Fevereiro'; break;
		case 3 : $return = 'Março'; break;
		case 4 : $return = 'Abril'; break;
		case 5 : $return = 'Maio'; break;
		case 6 : $return = 'Junho'; break;
		case 7 : $return = 'Julho'; break;
		case 8 : $return = 'Agosto'; break;
		case 9 : $return = 'Setembro'; break;
		case 10 : $return = 'Outubro'; break;
		case 11 : $return = 'Novembro'; break;
		case 12 : $return = 'Dezembro'; break;
	}

	return $return;
}

/**
 * get_weekday_text
 */
function get_weekday_text( $weekday ) {
	$return = '';

	switch ( $weekday ) {
		case 0 : $return = 'Domingo'; break;
		case 1 : $return = 'Segunda'; break;
		case 2 : $return = 'Terça'; break;
		case 3 : $return = 'Quarta'; break;
		case 4 : $return = 'Quinta'; break;
		case 5 : $return = 'Sexta'; break;
		case 6 : $return = 'Sábado'; break;
	}

	return $return;
}

/**
 * get_random_string
 */
function get_random_string( $length ) {
	$validCharacters = '12345abcdefghijklmnopqrstuvwxyz678910';
	$validCharNumber = strlen( $validCharacters );
	$result = '';
	for ( $i = 0; $i < $length; $i++ ) {
		$index = mt_rand( 0, $validCharNumber - 1 );
		$result .= $validCharacters[$index];
	}
	return $result;
}

/**
 * hex2rgb
 */
function hex2rgb( $hex ) {
	$hex = str_replace( '#', '', $hex );

	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}

	$rgb = array( $r, $g, $b );
	return implode( ',', $rgb ); // returns the rgb values separated by commas
	//return $rgb; // returns an array with the rgb values
}

/**
 * frontend_get_text
 */
function frontend_get_text( $text, $limit ) {
	$text = explode( ' ', $text, $limit );
	
	if ( count( $text ) >= $limit ) {
		array_pop( $text );
		$text = implode( " ", $text ) .'...';
	}
	else {
		$text = implode( " ", $text );
	}

	$text = preg_replace( '`\[[^\]]*\]`','', $text );
	return $text;
}

/**
 * frontend_get_the_excerpt
 */
function frontend_get_the_excerpt( $limit ) {
	return frontend_get_text( get_the_excerpt(), $limit );
}

/**
 * frontend_get_the_content
 */
function frontend_get_the_content( $limit ) {
	$content = explode( ' ', get_the_content(), $limit );
	
	if ( count( $content ) >= $limit ) {
		array_pop( $content );
		$content = implode( " ", $content ) .'...';
	}
	else {
		$content = implode( " ", $content );
	}

	$content = preg_replace( '/\[.+\]/','', $content );
	$content = apply_filters( 'the_content', $content ); 
	$content = str_replace( ']]>', ']]&gt;', $content );
	
	return $content;
}

/**
 * frontend_get_the_excerpt_by_id
 */
function frontend_get_the_excerpt_by_id( $postId, $limit ) {
	$thePost = get_post( $postId );
	$theExcerpt = $thePost->post_content;
	$excerptLength = $limit;
	$theExcerpt = strip_tags( strip_shortcodes( $theExcerpt ) );
	$words = explode( ' ', $theExcerpt, $excerptLength + 1 );

	if ( count( $words ) > $excerptLength ) {
		array_pop( $words );
		array_push( $words, '…' );
		$theExcerpt = implode( ' ', $words );
	}

	return $theExcerpt;
}

/**
 * get_permalink_by_slug`
 */
function get_permalink_by_slug( $slug, $post_type = '' ) {
	$permalink = null;

	$args =	array(
		'name' => $slug,
		'max_num_posts' => 1
	);

	if ( '' != $post_type ) {
		$args = array_merge( $args, array( 'post_type' => $post_type ) );
	}

	$query = new WP_Query( $args );
	if( $query->have_posts() ) {
		$query->the_post();
		$permalink = get_permalink( get_the_ID() );
	}
	wp_reset_postdata();

	return $permalink;
}

/**
 * get_meta_values
 */
function get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {
	global $wpdb;

	if ( empty( $key ) )
		return;

	$r = $wpdb->get_col( $wpdb->prepare( "
		SELECT pm.meta_value FROM {$wpdb->postmeta} pm
		LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
		WHERE pm.meta_key = '%s' 
		AND p.post_status = '%s' 
		AND p.post_type = '%s'
	", $key, $status, $type ) );

	return $r;
}

/**
 * widget_script
 */
function widget_script() {
	global $pagenow;

	if ( 'widgets.php' === $pagenow )
		wp_enqueue_script( 'widget-script', get_template_directory_uri() . '/js/widget_script.js', array( 'jquery' ), false, true );
}
add_action( 'admin_init', 'widget_script' );

/**
 * ajaxurl
 */
function frontend_ajax_url() {
	?>
	<script type="text/javascript">
		var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ) ?>';
	</script>
	<?php
}
add_action( 'wp_head', 'frontend_ajax_url' );

/**
 * frontend_load_template_part
 */
function frontend_load_template_part( $template_name, $part_name = NULL ) {
	ob_start();
	get_template_part( $template_name, $part_name );
	$var = ob_get_contents();
	ob_end_clean();
	return $var;
}

/**
 * admin_login_logo
 */
function admin_login_logo() { ?>
	<style type="text/css">
		body.login,
		#wp-auth-check-wrap #wp-auth-check {
			background-color: #333;
		}
		body.login div#login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri() ?>/img/bororo25.png);
			background-size: 230px 32px;
			width: 230px;
			height: 32px;
			padding-bottom: 10px;
		}
		body.login #nav {
			display: none;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'admin_login_logo' );

/**
 * admin_login_logo_url
 */
function admin_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'admin_login_logo_url' );

/**
 * admin_login_logo_url_title
 */
function admin_login_logo_url_title() {
	return 'Bororó 25';
}
add_filter( 'login_headertitle', 'admin_login_logo_url_title' );

/**
* frontend_mail_from_name
*/
function frontend_mail_from_name() {
	$name = get_option( 'blogname' );
	$name = esc_attr( $name );
	return $name;
}

/**
* frontend_mail_from
*/
function frontend_mail_from()
{
	$email = get_option( 'admin_email' );
	$email = is_email( $email );
	return $email;
}
add_filter( 'wp_mail_from_name', 'frontend_mail_from_name' );
add_filter( 'wp_mail_from', 'frontend_mail_from' );

/**
* all_allow_email_login
*/
function all_allow_email_login( $user, $username, $password ) {
	if ( is_email( $username ) ) {
		$user = get_user_by_email( $username );
		if ( $user ) $username = $user->user_login;
	}

	return wp_authenticate_username_password( null, $username, $password );
}
add_filter( 'authenticate', 'all_allow_email_login', 20, 3 );

/**
 * admin_users_caps
 */
function admin_users_caps( $caps, $cap, $user_id, $args ) {
	foreach ( $caps as $key => $capability ) {
		if ( $capability != 'do_not_allow' )
			continue;
 
		switch ( $cap ) {
			case 'edit_user':
			case 'edit_users':
				$caps[$key] = 'edit_users';
				break;
			case 'delete_user':
			case 'delete_users':
				$caps[$key] = 'delete_users';
				break;
			case 'create_users':
				$caps[$key] = $cap;
				break;
		}
	}
 
	return $caps;
}
add_filter( 'map_meta_cap', 'admin_users_caps', 1, 4 );
remove_all_filters( 'enable_edit_any_user_configuration' );
add_filter( 'enable_edit_any_user_configuration', '__return_true' );

/**
 * admin_edit_permission_check
 */
function admin_edit_permission_check() {
	global $current_user, $profileuser;
	$screen = get_current_screen();
	get_currentuserinfo();

	if ( ! is_super_admin( $current_user->ID ) && in_array( $screen->base, array( 'user-edit', 'user-edit-network' ) ) ) { // editing a user profile
		if ( is_super_admin( $profileuser->ID ) ) { // trying to edit a superadmin while less than a superadmin
			wp_die( __( 'You do not have permission to edit this user.' ) );
		} elseif ( ! ( is_user_member_of_blog( $profileuser->ID, get_current_blog_id() ) && is_user_member_of_blog( $current_user->ID, get_current_blog_id() ) )) { // editing user and edited user aren't members of the same blog
			wp_die( __( 'You do not have permission to edit this user.' ) );
		}
	}
}
add_filter( 'admin_head', 'admin_edit_permission_check', 1, 4 );

/**
* hide admin bar
*/
add_filter( 'show_admin_bar', '__return_false' );

/**
 * nl2p
 */
function nl2p( $string, $class = '' ) {
	$paragraphs = '';

	foreach ( explode( "\n", $string ) as $line ) {
		if ( trim( $line ) ) {
			$paragraphs .= '<p'. ( ! empty( $class ) ? ( ' class="'. $class .'"' ) : '' ) .'>' . $line . '</p>';
		}
	}

	return $paragraphs;
}

/**
 * admin_large_menu
 */
function admin_large_menu() { ?>
	<style type="text/css">
		#adminmenuback, #adminmenuwrap, #adminmenu, #adminmenu .wp-submenu {
			width: 240px !important;
		}
		#wpcontent, #wpfooter {
			margin-left: 260px !important;
		}
		#adminmenu .wp-submenu {
			left: 240px !important;
		}
		#adminmenu .wp-has-current-submenu .wp-submenu,
		.no-js li.wp-has-current-submenu:hover .wp-submenu,
		#adminmenu a.wp-has-current-submenu:focus+.wp-submenu,
		#adminmenu .wp-has-current-submenu .wp-submenu.sub-open,
		#adminmenu .wp-has-current-submenu.opensub .wp-submenu {
			left: auto !important;
		}
	</style>
<?php }
add_action( 'admin_enqueue_scripts', 'admin_large_menu' );

/**
 * frontend_wp_theme_main_nav
 */
function frontend_wp_theme_main_nav( $intervalPosition, $initialLetter ) {
	$menus = wp_get_nav_menus();
	$letter = $initialLetter;
	$counter = 0;

	foreach ( $menus as $key => $value ) {
		if ( $value->slug == 'menu-principal' ) {
			$menu = $value;
			break;
		}
	}

	$items = wp_get_nav_menu_items( $menu->term_id );

	if ( sizeof( $items ) > 0) {
		
		foreach ( $items as $key => $value ) {
			//echo "<pre>" . print_r($value , 1) . "</pre>";
			if ($key >= $intervalPosition[0] && $key <= $intervalPosition[1]) {
				echo '<div class="nav-item nav-item-'.$letter.'">';
				echo '<a href="'. $value->url .'" title="'. $value->title .'" target="'. $value->target .'"><span>'. $value->title .'</span></a>';
				echo '</div>';
				$letter++;
			}
		}

	}
}

/**
 * frontend_wp_theme_footer_nav
 */
function frontend_wp_theme_footer_nav() {
	$menus = wp_get_nav_menus();

	foreach ( $menus as $key => $value ) {
		if ( $value->slug == 'menu-rodape' ) {
			$menu = $value;
			break;
		}
	}

	$items = wp_get_nav_menu_items( $menu->term_id );

	if ( sizeof( $items ) > 0 ) {
		echo '<ul class="list-inline links">';

		foreach ( $items as $key => $value ) {
			echo '<li>';
			echo '<a href="'. $value->url .'" target="_blank" title="'. $value->title .'">'. $value->title .'</a>';
			echo '</li>';
		}

		echo '</ul>';
	}
}

/**
* urlencode_santopixel
*/
function urlencode_santopixel( $text ) {
	$text = str_replace( ' ', '%20', $text );
	$text = str_replace( '#', '%23', $text );
	$text = str_replace( '&', '%26', $text );
	return $text;
}

/**
* textencode_santopixel
*/
function textencode_santopixel( $text ) {
	$text = html_entity_decode( $text );
	$text = str_replace( ' ', '%20', $text );
	$text = str_replace( '#', '%23', $text );
	$text = str_replace( '&', '%26', $text );
	return $text;
}

/**
* update_facebook_meta
*/
function update_facebook_meta( $postId, $post ) {
	$permalink = get_permalink( $postId );
	@file_get_contents( "https://graph.facebook.com/?scrape=true&id={$permalink}" );
}
add_action( 'publish_post', 'update_facebook_meta', 10, 2 );

/**
* get_image_id_by_url
*/
function get_image_id_by_url( $imageUrl ) {
	global $wpdb;

	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid = '$imageUrl'";
	$id = $wpdb->get_var( $query );

	return $id;
}

/**
* get_featured_image
*/
function get_featured_image( $size = 'full', $postId = '' ) {
	$postId = empty( $postId ) ? get_the_ID() : $postId;
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postId ), $size );
	return $image;
}

/**
* get_share_image
*/
function get_share_image( $postId ) {
	$metaImage = get_featured_image( '1200x', $postId );

	if ( ! $metaImage[3] || (int) $metaImage[2] < 300 ) {
		$metaImage = get_featured_image( '900x', $postId );
	}

	if ( ! $metaImage[3] || (int) $metaImage[2] < 300 ) {
		$metaImage = get_featured_image( '600x', $postId );
	}

	if ( (int) $metaImage[2] < 300 ) {
		$metaImage = get_template_directory_uri() .'/img/bororo-social.png';
	}
	else {
		$metaImage = $metaImage[0];
	}

	return $metaImage;
}

?>