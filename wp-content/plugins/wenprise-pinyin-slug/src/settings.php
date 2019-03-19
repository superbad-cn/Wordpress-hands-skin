<?php
/**
 * Wenprise Pinyin Slug 设置
 *
 * @author Amos Lee
 */
if ( ! class_exists('Wenprise_Pinyin_Slug_Settings')):

    class Wenprise_Pinyin_Slug_Settings
    {

        private $settings_api;

        function __construct()
        {
            $this->settings_api = new WeDevs_Settings_API;

            add_action('admin_init', [$this, 'admin_init']);
            add_action('admin_menu', [$this, 'admin_menu']);
        }

        function admin_init()
        {

            // set the settings
            $this->settings_api->set_sections($this->get_settings_sections());
            $this->settings_api->set_fields($this->get_settings_fields());

            // initialize settings
            $this->settings_api->admin_init();
        }

        function admin_menu()
        {
            add_options_page('别名转拼音', '别名转拼音', 'delete_posts', 'settings_api_test', [$this, 'plugin_page']);
        }

        function get_settings_sections()
        {
            $sections = [
                [
                    'id'    => 'wprs_pinyin_slug',
                    'title' => __('文章分类别名/文件名转拼音设置', 'wprs'),
                ],
            ];

            return $sections;
        }

        /**
         * 设置字段
         *
         * @return array settings fields
         */
        function get_settings_fields()
        {
            $settings_fields = [
                'wprs_pinyin_slug' => [
                    [
                        'name'              => 'divider',
                        'label'             => __('拼音分隔分隔符', 'wprs'),
                        'desc'              => __('可以是：_ 或 - 或 . &nbsp; 默认为 “-”，如过不需要分隔符，请留空', 'wprs'),
                        'placeholder'       => __('-', 'wprs'),
                        'default'           => '-',
                        'type'              => 'text',
                        'sanitize_callback' => 'sanitize_text_field',
                    ],
                    [
                        'name'    => 'type',
                        'label'   => __('转换方式', 'wprs'),
                        'desc'    => __('全拼或每个字的第一个字母', 'wprs'),
                        'type'    => 'select',
                        'default' => 0,
                        'options' => [
                            0 => '全拼',
                            1 => '第一个字母',
                        ],
                    ],
                    [
                        'name'    => 'length',
                        'label'   => __('别名长度限制', 'wprs'),
                        'desc'    => __('超过设置的长度后，会按照指定的长度截断转换后的拼音字符串。为保持拼音的完整性，如果设置了分隔符，会在最后一个分隔符后截断', 'wprs'),
                        'type'    => 'text',
                        'sanitize_callback' => 'sanitize_text_field',
                    ],
                ],
            ];

            return $settings_fields;
        }

        function plugin_page()
        {
            echo '<div class="wrap">';
            $this->settings_api->show_forms();
            echo '</div>';
        }

    }

endif;

new Wenprise_Pinyin_Slug_Settings();