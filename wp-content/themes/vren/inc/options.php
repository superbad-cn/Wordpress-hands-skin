<?php
/**
 * Theme options.
 *
 * @since WP2018 1.0
 */


/**
 * Create placeholder.
 */
DEFINE("PLACEHOLDER", wp_upload_dir()['baseurl'] . '/placeholder/placeholder.png');

/**
 * Registers custom Post Type.
 */
// new Custom_Post_Type_Post($post_type = 'project', $plural = '案例', $single = '案例', $description = '', $has_archive = false, $rewrite = 'projects');
// new Custom_Taxonomy($taxonomy = 'project-category', $plural = '案例分类', $single = '案例分类', $post_types = array('project'));
// new Custom_Tag($tag = 'project-tag', $plural = '案例标签', $single = '案例标签', $post_types = array('project'));