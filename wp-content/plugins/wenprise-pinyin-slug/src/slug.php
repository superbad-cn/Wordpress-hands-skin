<?php

use Overtrue\Pinyin\Pinyin;


/**
 * 文章别名保存之前，如果没有设置，自动转换为拼音
 *
 * @param $slug
 *
 * @return mixed
 */
add_filter('name_save_pre', function ($slug)
{

    // 手动编辑时，不自动转换为拼音
    if ($slug && $slug != '') {
        return $slug;
    }

    // 替换文章标题
    $title = wprs_slug_convert($_POST[ 'post_title' ]);

    return sanitize_title($title);
}, 10, 1);


add_filter('rest_pre_insert_post', 'wprs_rest_convert_slug', 10, 2);
add_filter('rest_pre_insert_page', 'wprs_rest_convert_slug', 10, 2);

/**
 * Rest Api 中，文章别名保存之前，如果没有设置，自动转换为拼音
 *
 * @param $prepared_post
 * @param $request
 *
 * @return mixed
 */
function wprs_rest_convert_slug($prepared_post, $request)
{
    // 获取文章标题
    $post_title = '';
    $saved_post = null;

    // 获取已保存文章
    if (isset($request[ 'id' ])) {
        $saved_post = get_post($request[ 'id' ]);
    }

    // 获取标题
    if (isset($request[ 'title' ])) {
        $post_title = $request[ 'title' ];
    } else {
        if (isset($request[ 'id' ])) {
            $post_title = $saved_post->post_title;
        }
    }

    // 1. 已发布状态下，如果设置了 slug，说明编辑了 slug，
    // 1.1 如果 slug 为空，说明删除了 slug 需要重新生成
    // 1.2 如果 slug 不为空，说明手动设置了 slug, 使用设置的 slug, 不自动生成
    if ($request[ 'status' ] == 'publish') {
        if (isset($request[ 'slug' ]) && $request[ 'slug' ] == '') {
            $prepared_post->post_name = wprs_slug_convert($post_title);
        }
    } else {

        // 如果上一个状态是已发布，说明执行的是 "切换到草稿" 的操作，这种情况下，不自动转换 slug
        if ( ! $saved_post || $saved_post->post_status != 'publish') {
            // 2. 其他状态下，如果没有设置 slug, 或 slug 为空，自动生成，如果设置了 slug ,依然不自动生成
            if ( ! isset($request[ 'slug' ]) || $request[ 'slug' ] == '') {
                $prepared_post->post_name = wprs_slug_convert($post_title);
            }
        }

    }

    return $prepared_post;
}


/**
 * 替换分类标题为拼音
 *
 * @param $slug
 *
 * @return mixed
 */
add_filter('pre_category_nicename', function ($slug)
{

    // 手动编辑时，不自动转换为拼音
    if ($slug) {
        return $slug;
    }

    // 替换文章标题
    $slug = wprs_slug_convert($_POST[ 'tag-name' ]);

    return sanitize_title($slug);
}, 10, 1);


/**
 * 添加分类时替换分类标题为拼音
 *
 * @param $data     array 需要保存到数据库中的数据
 * @param $term_id  int 分类项目 ID
 * @param $taxonomy string 分类法名称
 * @param $args     array 用户提交的数据
 *
 * @return array 修改后的需要保存到数据库中的数据
 */
add_filter('wp_insert_term_data', function ($data, $taxonomy, $args)
{

    // 手动编辑时，不自动转换为拼音
    if ($args[ 'slug' ] === '') {
        $data[ 'slug' ] = wp_unique_term_slug(wprs_slug_convert($data[ 'name' ]), (object)$args);
    }

    return $data;
}, 10, 3);


/**
 * 更新分类时分类标题为拼音
 *
 * @param $data     array 需要保存到数据库中的数据
 * @param $term_id  int 分类项目 ID
 * @param $taxonomy string 分类法名称
 * @param $args     array 用户提交的数据
 *
 * @return array 修改后的需要保存到数据库中的数据
 */
add_filter('wp_update_term_data', function ($data, $term_id, $taxonomy, $args)
{

    // 手动编辑时，不自动转换为拼音
    if ($args[ 'slug' ] === '') {
        $data[ 'slug' ] = wp_unique_term_slug(wprs_slug_convert($data[ 'name' ]), (object)$args);
    }

    return $data;
}, 10, 4);


/**
 * 替换文件名称为拼音
 *
 * @param $filename
 *
 * @return mixed
 */
add_filter('sanitize_file_name', function ($filename)
{

    // 手动编辑时，不自动转换为拼音
    $parts     = explode('.', $filename);
    $filename  = array_shift($parts);
    $extension = array_pop($parts);

    foreach ((array)$parts as $part) {
        $filename .= '.' . $part;
    }

    if (preg_match('/[\x{4e00}-\x{9fa5}]+/u', $filename)) {
        $filename = wprs_slug_convert($filename);
    }

    $filename .= '.' . $extension;

    return $filename;

}, 10, 1);


/**
 * 获取设置的值
 *
 * @param string $section 选项所属的设置区域
 * @param string $option  选项名称
 * @param string $default 找不到选项值时的默认值
 *
 * @return mixed
 */
if ( ! function_exists('wprs_plugin_get_option')) {
    function wprs_plugin_get_option($section, $option, $default = '')
    {

        $options = get_option($section);

        if (isset($options[ $option ])) {
            return $options[ $option ];
        }

        return $default;
    }

}


/**
 * 转换拼音的通用功能
 *
 * @param $name
 *
 * @return string 转换后的拼音
 */
if ( ! function_exists('wprs_slug_convert')) {
    function wprs_slug_convert($name)
    {

        $divider = wprs_plugin_get_option('wprs_pinyin_slug', 'divider', '-');
        $type    = wprs_plugin_get_option('wprs_pinyin_slug', 'type', 0);
        $length  = wprs_plugin_get_option('wprs_pinyin_slug', 'length', '');

        $pinyin = new Pinyin();

        if ($type == 0) {
            $slug = $pinyin->permalink($name, $divider);
        } else {
            $slug = $pinyin->abbr($name, $divider);
        }

        $slug = wprs_trim_slug($slug, $length, $divider);

        return $slug;

    }
}


/**
 * 裁剪文本
 *
 * @param      $input
 * @param      $length
 * @param bool $divider
 * @param bool $strip_html
 *
 * @return bool|string
 */
if ( ! function_exists('wprs_trim_slug')) {
    function wprs_trim_slug($input, $length, $divider = '-', $strip_html = true)
    {

        // strip tags, if desired
        if ($strip_html) {
            $input = strip_tags($input);
        }

        // no need to trim, already shorter than trim length
        if (strlen($input) <= $length || ! $length || $length == '') {
            return $input;
        }

        $trimmed_text = substr($input, 0, $length);

        // find last space within length
        if ($divider != '') {
            $last_space   = strrpos(substr($input, 0, $length), $divider);
            $trimmed_text = substr($input, 0, $last_space);
        }

        return $trimmed_text;
    }
}