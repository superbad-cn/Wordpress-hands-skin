<?php
/**
 * Registers Website Post Type.
 *
 * @since WP2018 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Custom_Post_Type_Post {

	/**
	 * The name for the custom post type.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $post_type;

	/**
	 * The plural name for the custom post type posts.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $plural;

	/**
	 * The singular name for the custom post type posts.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $single;

	/**
	 * The description of the custom post type.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $description;
	public $has_archive;
	public $rewrite;

	public function __construct ( $post_type = '', $plural = '', $single = '', $description = '', $has_archive = '', $rewrite = '' ) {

		if ( ! $post_type || ! $plural || ! $single ) return;

		// Post type name and labels
		$this->post_type = $post_type;
		$this->plural = $plural;
		$this->single = $single;
		$this->description = $description;

		if($has_archive){
			$this->has_archive = $has_archive;
		} else {
			$this->rewrite = false;
		}

		if($rewrite){
			$this->rewrite = array('slug' => $rewrite,'with_front' => true);
		} else {
			$this->rewrite = true;
		}

		// Regsiter post type
		add_action( 'init' , array( $this, 'register_post_type' ) );

	}

	/**
	 * Register new post type
	 * @return void
	 */
	public function register_post_type () {

		$labels = array(
			'name' => $this->plural,
			'singular_name' => $this->single,
			'name_admin_bar' => $this->single,
			'add_new' => __( 'Add' ).$this->single,
			'add_new_item' => __( 'Add' ).$this->single,
		);

		$args = array(
			'labels' => apply_filters( $this->post_type . '_labels', $labels ),
			'description' => $this->description,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => $this->rewrite,
			'capability_type' => 'post',
			'has_archive' => $this->has_archive,
			'hierarchical' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ), /*'author','thumbnail','excerpt','page-attributes', 'comments'*/
			'menu_position' => 20,
			'menu_icon' => 'dashicons-admin-post',
		);

		register_post_type( $this->post_type, apply_filters( $this->post_type . '_register_args', $args, $this->post_type ) );
	}

}


class Custom_Post_Type_Page{

	/**
	 * The name for the custom post type.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $post_type;

	/**
	 * The plural name for the custom post type posts.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $plural;

	/**
	 * The singular name for the custom post type posts.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $single;

	/**
	 * The description of the custom post type.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $description;

	public $has_archive;
	public $rewrite;

	public function __construct ( $post_type = '', $plural = '', $single = '', $description = '', $has_archive = '', $rewrite = '' ) {

		if ( ! $post_type || ! $plural || ! $single ) return;

		// Post type name and labels
		$this->post_type = $post_type;
		$this->plural = $plural;
		$this->single = $single;
		$this->description = $description;

		if($has_archive){
			$this->has_archive = $has_archive;
		} else {
			$this->rewrite = false;
		}

		if($rewrite){
			$this->rewrite = array('slug' => $rewrite,'with_front' => true);
		} else {
			$this->rewrite = true;
		}

		// Regsiter post type
		add_action( 'init' , array( $this, 'register_post_type' ) );

	}

	/**
	 * Register new post type
	 * @return void
	 */
	public function register_post_type () {

		$labels = array(
			'name' => $this->plural,
			'singular_name' => $this->single,
			'name_admin_bar' => $this->single,
			'add_new' => _x( 'Add New ', '' ).$this->single,
			'add_new_item' => 'Add New '.$this->single,
		);

		$args = array(
			'labels' => apply_filters( $this->post_type . '_labels', $labels ),
			'description' => $this->description,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => $this->rewrite,
			'capability_type' => 'page',
			'has_archive' => $this->has_archive,
			'hierarchical' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'), /*'author','thumbnail','excerpt','page-attributes', 'comments'*/
			'menu_position' => 20,
			'menu_icon' => 'dashicons-admin-post',
		);

		register_post_type( $this->post_type, apply_filters( $this->post_type . '_register_args', $args, $this->post_type ) );
	}

}
