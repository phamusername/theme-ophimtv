@extends('themes::themeophimtv.layout_core')

@php
    $menu = \Ophim\Core\Models\Menu::getTree();
    $logo = setting('site_logo', '');
    preg_match('@src="([^"]+)"@', $logo, $match);

    // will return /images/image.jpg
    $logo = array_pop($match);
@endphp

@push('header')
    <link href="{{ url('/') }}" rel="alternate" hreflang="vi">

    <script>
        try {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                    '(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.add('light')
            }
        } catch (_) {}
    </script>
    <style>
        .dark .close_menu_mb svg {
            fill: #d9d1d1;
        }

        .page-item.disabled .page-link {
            display: none !important;
        }
    </style>
    <link href="/themes/ophimtv/static/css/main.css" rel="stylesheet" media="all">
@endpush

@section('body')
    <div class="absolute z-20 top-0 inset-x-0 flex justify-center overflow-hidden pointer-events-none">
        <div class="w-[108rem] flex-none flex justify-end">
            <picture>
                <img src="/themes/ophimtv/static/img/bg-light.png" alt=""
                    class="w-[71.75rem] flex-none max-w-none dark:hidden">
            </picture>
            <picture>
                <img src="/themes/ophimtv/static/img/bg-dark.png" alt=""
                    class="w-[90rem] flex-none max-w-none hidden dark:block">
            </picture>
        </div>
    </div>
    @include('themes::themeophimtv.inc.header')
    @yield('content')
    {!! get_theme_option('footer') !!}
    @include('themes::themeophimtv.inc.header_mobile')
@endsection

@section('footer')
    @if (get_theme_option('ads_catfish'))
        <div id="catfish" style="width: 100%;position:fixed;bottom:0;left:0;z-index:222" class="mp-adz">
            <div style="margin:0 auto;text-align: center;overflow: visible;" id="container-ads">
                <div id="hide_catfish"><a
                        style="font-size:12px; font-weight:bold;background: #ff8a00; padding: 2px; color: #000;display: inline-block;padding: 3px 6px;color: #FFF;background-color: rgba(0,0,0,0.7);border: .1px solid #FFF;"
                        onclick="jQuery('#catfish').fadeOut();">Đóng quảng cáo</a></div>
                <div id="catfish_content" style="z-index:999999;">
                    {!! get_theme_option('ads_catfish') !!}
                </div>
            </div>
        </div>
    @endif
    <script>
        const Hn_Framework = {
            ele: '#content',
            url: window.location.href,
            _token: 'xAklGemYto9SjgFFwvVrfhC02BWLUju8tHTfy17O',
            settings: {
                dev: 1,
                top: 80,
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="/themes/ophimtv/static/js/main.js?ver=1.0.0" referrerpolicy="origin"></script>
    {!! setting('site_scripts_google_analytics') !!}
    <script>
        jQuery(document).ready(function () {
    let timeoutID = null;
    $("input[name=search]").keyup(function (e) {
        clearTimeout(timeoutID);
        var search = e.target.value;
        if (search.length <= 1) {
            $(".search-suggest").hide();
            return false;
        }
        timeoutID = setTimeout(() => searching(search), 0);
    });

    function searching(search) {
        $.ajax({
            type: "get",
            url: "/search/" + search,
            dataType: "json",
            success: function (response) {
                let results = "";
                $(".search-suggest").show();
                for (let i = 0; i < response.data.length; i++) {
                    const element = response.data[i];
                    let img = `<img src="${element["thumb_url"]}" alt="${element["name"]}">`;
                    let name = `<p>${element["name"]}</p>`;
                    results +=
                        '<div class="pt-2"><a href="' +
                        element["url"] +
                        '" class="hover:bg-zinc-700 border-b border-zinc-700 grid items-center grid-cols-12 mb-2 gapx-3""><div class="col-span-3 m-1"><img class="h-16 w-16 object-cover" src="' +
                        element["thumb_url"] +
                        '"></div><div class="col-span-9 m-1"><span class="block font-medium text-gray-200 text-sm">' +
                        element["name"] +
                        '</span><span class="block episode-font text-sm text-zinc-400">' +
                        element["episode_current"] +
                        "</span></div></a></div>";
                }
                results +=
                    '<a class="py-1 text-sm text-[#d98a5e] text-center w-full block hover:bg-zinc-700" href="/?search=' +
                    search +
                    '">Xem tất cả kết quả "' +
                    search +
                    '" </a>';
                $(".search-suggest").html(results);
            },
        });
    }
});
    </script>
@endsection
