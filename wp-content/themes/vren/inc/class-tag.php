<?php
/**
 * Registers Website tag.
 *
 * @since WP2018 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Custom_Tag {

	/**
	 * The name for the tag.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $tag;

	/**
	 * The plural name for the tag terms.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $plural;

	/**
	 * The singular name for the tag terms.
	 * @var 	string
	 * @access  public
	 * @since 	1.0.0
	 */
	public $single;

	/**
	 * The array of post types to which this tag applies.
	 * @var 	array
	 * @access  public
	 * @since 	1.0.0
	 */
	public $post_types;

	public function __construct ( $tag = '', $plural = '', $single = '', $post_types = array() ) {

		if ( ! $tag || ! $plural || ! $single ) return;

		// Post type name and labels
		$this->tag = $tag;
		$this->plural = $plural;
		$this->single = $single;
		if ( ! is_array( $post_types ) ) {
			$post_types = array( $post_types );
		}
		$this->post_types = $post_types;

		// Register tag
		add_action('init', array( $this, 'register_tag' ) );
	}

	/**
	 * Register new tag
	 * @return void
	 */
	public function register_tag () {

        $labels = array(
            'name' => $this->plural,
            'singular_name' => $this->single,
            'menu_name' => $this->plural,
        );

        $args = array(
        	'label' => $this->plural,
        	'labels' => apply_filters( $this->tag . '_labels', $labels ),
        	'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'meta_box_cb' => null,
            'show_admin_column' => true,
            'update_count_callback' => '',
            'query_var' => $this->tag,
            'rewrite' => true,
			'sort' => '',
        );

        register_taxonomy( $this->tag, $this->post_types, apply_filters( $this->tag . '_register_args', $args, $this->tag, $this->post_types ) );
    }

}
