<?php
/**
 * Registers website support.
 *
 * @since WP2018 1.0
 */


// Register Menu locations.
register_nav_menus( array(
    'primary' => 'Primary Menu',
) );


/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );


/*
 * Enable support for Post Thumbnails on posts and pages.
 *
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 */
add_theme_support( 'post-thumbnails' );


/**
 * Add custom Post types archive to nav menus.
 *
 * @link https://www.wpdaxue.com/add-custom-post-types-archive-to-nav-menus.html
 */

// if( !class_exists('CustomPostTypeArchiveInNavMenu') ) {
// 	class CustomPostTypeArchiveInNavMenu {
// 		function CustomPostTypeArchiveInNavMenu() {
// 			add_action( 'admin_head-nav-menus.php', array( &$this, 'cpt_navmenu_metabox' ) );
// 			add_filter( 'wp_get_nav_menu_items', array( &$this,'cpt_archive_menu_filter'), 10, 3 );
// 		}
// 		function cpt_navmenu_metabox() {
// 			add_meta_box( 'add-cpt', __('自定义类型'), array( &$this, 'cpt_navmenu_metabox_content' ), 'nav-menus', 'side', 'default' );
// 		}
// 		function cpt_navmenu_metabox_content() {
// 			$post_types = get_post_types( array( 'show_in_nav_menus' => true, 'has_archive' => true ), 'object' );
// 			if( $post_types ) {
// 				foreach ( $post_types as &$post_type ) {
// 					$post_type->classes = array();
// 					$post_type->type = $post_type->name;
// 					$post_type->object_id = $post_type->name;
// 					$post_type->title = $post_type->labels->name . __( '存档' );
// 					$post_type->object = 'cpt-archive';
// 				}
// 				$walker = new Walker_Nav_Menu_Checklist( array() );
// 				echo '<div id="cpt-archive" class="posttypediv">';
// 				echo '<div id="tabs-panel-cpt-archive" class="tabs-panel tabs-panel-active">';
// 				echo '<ul id="ctp-archive-checklist" class="categorychecklist form-no-clear">';
// 				echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $post_types), 0, (object) array( 'walker' => $walker) );
// 				echo '</ul>';
// 				echo '</div><!-- /.tabs-panel -->';
// 				echo '</div>';
// 				echo '<p class="button-controls">';
// 				echo '<span class="add-to-menu">';
// 				echo '<input type="submit"' . disabled( $nav_menu_selected_id, 0 ) . ' class="button-secondary submit-add-to-menu right" value="'. __('添加至菜单') . '" name="add-ctp-archive-menu-item" id="submit-cpt-archive" />';
// 				echo '<span class="spinner"></span>';
// 				echo '</span>';
// 				echo '</p>';
// 			} else {
// 				echo '没有自定义类型';
// 			}
// 		}
// 		function cpt_archive_menu_filter( $items, $menu, $args ) {
// 			foreach( $items as &$item ) {
// 				if( $item->object != 'cpt-archive' ) continue;
// 				$item->url = get_post_type_archive_link( $item->type );
// 				if( get_query_var( 'post_type' ) == $item->type ) {
// 					$item->classes[] = 'current-menu-item';
// 					$item->current = true;
// 				}
// 			}
// 			return $items;
// 		}
// 	}
// 	$CustomPostTypeArchiveInNavMenu = new CustomPostTypeArchiveInNavMenu();
// }

/**
 * Protect dashboard login.
 */
/* add_action('login_enqueue_scripts','login_protection');
function login_protection(){
    if($_GET['site'] != 'aren')header('Location: '.home_url());
} */

/**
 * Add Meta Box
 */
// add_action( 'add_meta_boxes', 'course_bind' );
// function course_bind()
// {
//     add_meta_box( 'course-meta-box', '课程选择', 'show_courses', 'teacher', 'normal', 'high' );
// }
// function show_courses()
// {
//     global $post;
// 	$values = get_post_custom( $post->ID );
//     $select_courses = isset( $values['courses'] ) ? $values['courses'] : [];
// 	$query_args = array(
// 		'post_type' => 'course',
// 		'posts_per_page' => -1,
// 	);
// 	$preparation_query = new WP_Query( $query_args );
// 	if ( $preparation_query->have_posts() ){
//         echo '<div id="courses" class="meta-box_courses">';
//             while ( $preparation_query->have_posts() ) : $preparation_query->the_post();
//                 $key = get_the_ID();
//                 $name = get_the_title();
//                 $checked = in_array($key, $select_courses) ? 'checked' : '';
//                 echo '<div class="meta-box_courses-item"><input type="checkbox" name="courses[]" value="'.$key.'"' . $checked . '/><span>'.$name.'</span></div>';
//             endwhile;
//         echo '</div>';
// 	}
// }
// add_action( 'save_post', 'cd_meta_box_save' );
// function cd_meta_box_save( $post_id )
// {
//     // Bail if we're doing an auto save
//     if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

//     // if our current user can't edit this post, bail
//     if( !current_user_can( 'edit_post' ) ) return;

//     // now we can actually save the data
//     if( isset( $_POST['courses'] ) ){
// 		delete_post_meta($post_id, 'courses');
// 		foreach ($_POST['courses'] as $key => $value) {
// 			add_post_meta( $post_id, 'courses', $value );
// 		}
// 	}
// }

/**
 * 后台样式
 */
// function admin_mycss() {
// 	wp_enqueue_style( "admin-my", get_template_directory_uri() . "/assets/css/admin.css" );
// }
// add_action('admin_head', 'admin_mycss');