<?php

namespace Ophim\ThemeOphimtv;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class ThemeOphimtvServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->setupDefaultThemeCustomizer();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'themes');

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('themes/ophimtv')
        ], 'ophimtv-assets');
    }

    protected function setupDefaultThemeCustomizer()
    {
        config(['themes' => array_merge(config('themes', []), [
            'ophimtv' => [
                'name' => 'OPHIMTV',
                'author' => 't.me/gggforyoy',
                'package_name' => 'ggg3/theme-ophimtv',
                'publishes' => ['ophimtv-assets'],
                'preview_image' => '',
                'options' => [
                    [
                        'name' => 'recommendations',
                        'label' => 'Phim đề cử',
                        'type' => 'code',
                        'hint' => 'display_label|find_by_field|value|limit|sort_by_field|sort_algo',
                        'value' => <<<EOT
                        Phim đề cử|is_recommended|1|10|view_week|desc
                        Phim HOT|is_copyright|0|10|view_week|desc
                        Phim ngẫu nhiên|random|random|10|view_week|desc
                        EOT,
                        'attributes' => [
                            'rows' => 5
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'per_page_limit',
                        'label' => 'Pages limit',
                        'type' => 'number',
                        'value' => 48,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'movie_related_limit',
                        'label' => 'Movies related limit',
                        'type' => 'number',
                        'value' => 24,
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-4',
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'latest',
                        'label' => 'Home Page',
                        'type' => 'code',
                        'hint' => 'display_label|relation|find_by_field|value|limit|show_more_url',
                        'value' => <<<EOT
                        Phim mới cập nhật||is_copyright|0|12|/danh-sach/phim-moi
                        EOT,
                        'attributes' => [
                            'rows' => 5
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'hotest',
                        'label' => 'Danh sách hot',
                        'type' => 'code',
                        'hint' => 'Label|relation|find_by_field|value|sort_by_field|sort_algo|limit|show_template (top_thumb|top_trending)',
                        'value' => <<<EOT
                        Trending|trending|||||6|top_trending
                        Top phim lẻ||type|single|view_week|desc|6|top_thumb
                        Top phim bộ||type|series|view_week|desc|6|top_thumb
                        Bảng xếp hạng||is_copyright|0|view_week|desc|6|top_thumb
                        EOT,
                        'attributes' => [
                            'rows' => 5
                        ],
                        'tab' => 'List'
                    ],
                    [
                        'name' => 'additional_css',
                        'label' => 'Additional CSS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom CSS'
                    ],
                    [
                        'name' => 'body_attributes',
                        'label' => 'Body attributes',
                        'type' => 'text',
                        'value' => 'class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900"',
                        'tab' => 'Custom CSS'
                    ],
                    [
                        'name' => 'additional_header_js',
                        'label' => 'Header JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'additional_body_js',
                        'label' => 'Body JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'additional_footer_js',
                        'label' => 'Footer JS',
                        'type' => 'code',
                        'value' => "",
                        'tab' => 'Custom JS'
                    ],
                    [
                        'name' => 'footer',
                        'label' => 'Footer',
                        'type' => 'code',
                        'value' => <<<EOT
                        <footer class="text-sm leading-6 mt-16 p-2 xl:p-0">
                            <div class="container mx-auto pt-2 pb-28 border-t border-slate-200 text-slate-500 dark:border-slate-200/5">
                                <p class="block"></p>
                                <p>Tất cả nội dung của trang web này được thu thập từ các trang web video chính thống trên Internet và không cung cấp phát trực tuyến chính hãng. Nếu quyền lợi của bạn bị vi phạm, vui lòng thông báo cho chúng tôi, chúng tôi sẽ xóa nội dung vi phạm kịp thời, cảm ơn sự hợp tác của bạn!</p>
                                <p></p>
                                <div class="sm:flex justify-between pt-2">
                                    <div class="mb-6 sm:mb-0 sm:flex">
                                        <p>Copyright © 2024</p>
                                        <p class="sm:ml-4 sm:pl-4 sm:border-l sm:border-slate-200 dark:sm:border-slate-200/5">
                                            <a class="hover:text-slate-900 dark:hover:text-slate-400 ajax-load" href="/gioi-thieu">Giới thiệu</a>
                                        </p>
                                        <p class="sm:ml-4 sm:pl-4 sm:border-l sm:border-slate-200 dark:sm:border-slate-200/5">
                                            <a class="hover:text-slate-900 dark:hover:text-slate-400 ajax-load" href="/khieu-nai-ban-quyen">Khiếu nại bản quyền</a>
                                        </p>
                                        <p class="sm:ml-4 sm:pl-4 sm:border-l sm:border-slate-200 dark:sm:border-slate-200/5">
                                            <a class="hover:text-slate-900 dark:hover:text-slate-400 ajax-load" href="/api-document">API</a>
                                        </p>
                                        <p class="sm:ml-4 sm:pl-4 sm:border-l sm:border-slate-200 dark:sm:border-slate-200/5">
                                            <a class="hover:text-slate-900 dark:hover:text-slate-400 ajax-load" href="/yeu-cau-phim">Yêu Cầu Phim</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        EOT,
                        'tab' => 'Custom HTML'
                    ],
                    [
                        'name' => 'ads_header',
                        'label' => 'Ads header',
                        'type' => 'code',
                        'value' => '',
                        'tab' => 'Ads'
                    ],
                    [
                        'name' => 'ads_catfish',
                        'label' => 'Ads catfish',
                        'type' => 'code',
                        'value' => '',
                        'tab' => 'Ads'
                    ],
                    [
                        'name' => 'show_fb_comment_in_single',
                        'label' => 'Show FB Comment In Single',
                        'type' => 'boolean',
                        'value' => false,
                        'tab' => 'FB Comment'
                    ]
                ],
            ]
        ])]);
    }
}
