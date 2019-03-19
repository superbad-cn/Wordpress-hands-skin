<?php
/*
Plugin Name:        Wenprise Pinyin Slug
Plugin URI:         https://www.wpzhiku.com/wenprise-pinyin-slug/
Description:        自动转换 WordPress 中的中文文章别名、分类项目别名、图片文件名称为汉语拼音。
Version:            1.3.0
Author:             WordPress 智库
Author URI:         https://www.wpzhiku.com/
License:            MIT License
License URI:        http://opensource.org/licenses/MIT
*/

if (version_compare(phpversion(), '5.6.0', '<')) {

    // 显示警告信息
    if (is_admin()) {
        add_action('admin_notices', function ()
        {
            printf('<div class="error"><p>' . __('Wenprise Pinyin Slug 需要 PHP %1$s 以上版本才能运行，您当前的 PHP 版本为 %2$s， 请升级到 PHP 到 %1$s 或更新的版本， 否则插件没有任何作用。',
                    'wprs') . '</p></div>',
                '5.6.0', phpversion());
        });
    }

    return;
}

require_once( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' );