@php
    $logo = setting('site_logo', '');
    $brand = setting('site_brand', '');
    $title = isset($title) ? $title : setting('site_homepage_title', '');
@endphp

<div
    class="sticky top-0 z-40 w-full flex-none transition-colors duration-500 lg:z-50 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] backdrop-blur bg-white/60 dark:bg-transparent">
    <div class="max-w-8xl mx-auto">
        <div class="py-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 mx-4 lg:mx-0">
            <div class="relative flex items-center">
                <div class="mr-3 flex-none overflow-hidden w-auto">
                    @if ($logo)
                        <span class="font-bold">
                            <a href="/">
                                {!! $logo !!}
                            </a>
                        </span>
                    @else
                        <span class="sr-only">
                            {!! $brand !!}
                        </span>
                    @endif
                </div>
                <div class="relative pointer-events-auto">
                    <div class="relative hidden xl:block">
                        <form class="group relative" id="search" name="search" method="get" action="/">
                            <svg width="20" height="20" fill="currentColor"
                                class="absolute left-3 top-1/2 -mt-2.5 text-slate-400 pointer-events-none group-focus-within:text-blue-500"
                                aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                                </path>
                            </svg>
                            <input type="text" value="{{ request('search') }}" name="search" id="keyword"
                                class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 dark:text-slate-100 placeholder-slate-400 rounded-full py-2 pl-10 ring-1 ring-slate-200 dark:ring-slate-800 shadow-sm dark:bg-slate-800 dark:highlight-white/5 dark:hover:bg-slate-700"
                                aria-label="Tìm kiếm phim" placeholder="Tìm kiếm phim...">
                        </form>
                        <div style="display: none;" class="search-suggest w-full text-center p-2 bg-zinc-800 absolute"></div>
                    </div>
                </div>
                <div class="relative flex ml-auto">
                    <nav class="text-sm leading-6 font-semibold text-slate-700 dark:text-slate-200" id="menu-header">
                        <ul class="flex space-x-8">
                            @foreach ($menu as $item)
                                @if (count($item['children']))
                                    <li>
                                        <span class="hover:text-sky-500 dark:hover:text-sky-400">
                                            <div class="relative inline-block text-left">
                                                <div>
                                                    <button
                                                        class="has_sub_menu inline-flex justify-center w-full text-sm font-medium rounded-md bg-opacity-20 hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                                                        type="button" aria-haspopup="true" aria-expanded="false">
                                                        {{ $item['name'] }}
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true"
                                                            class="w-5 h-5 ml-2 -mr-1 text-violet-400 hover:text-violet-800">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <div class="sub-menu absolute right-0 w-[450px] mt-8 origin-top-right bg-white dark:bg-slate-800 divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                        role="menu" tabindex="0">
                                                        <div class="px-1 py-1 grid grid-flow-rows grid-cols-3 justify-items-center" role="none">
                                                            @foreach ($item['children'] as $children)
                                                                <button
                                                                    class="hover:bg-violet-500 hover:text-white text-gray-900 dark:text-white group flex rounded-md text-sm"
                                                                    role="menuitem" tabindex="-1">
                                                                    <a class="px-4 py-2 ajax-load menu_item"
                                                                        href="{{ $children['link'] }}">{{ $children['name'] }}</a>
                                                                </button>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </span>
                                    </li>
                                @else
                                    <li>
                                        <a class="hover:text-sky-500 dark:hover:text-sky-400 ajax-load"
                                            href="{{ $item['link'] }}">{{ $item['name'] }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                    <div class="flex items-center border-l border-slate-200 ml-6 pl-6 dark:border-slate-800">
                        <label class="sr-only">Theme</label>
                        <div class="relative inline-block text-left">
                            <button
                                class="open_theme inline-flex justify-center w-full text-sm font-medium rounded-md bg-opacity-20 hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                                id="headlessui-menu-button-undefined" type="button" aria-haspopup="true"
                                aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true" class="dark:hidden w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        clip-rule="evenodd"></path>
                                </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" class="hidden dark:inline w-6 h-6">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                    </path>
                                </svg>
                            </button>
                            <ul class="option_theme absolute z-50 top-full right-0 bg-white rounded-lg ring-1 ring-slate-900/10 shadow-lg overflow-hidden w-36 py-1 text-sm text-slate-700 font-semibold dark:bg-slate-800 dark:ring-0 dark:highlight-white/5 dark:text-slate-300 mt-4"
                                role="menu" tabindex="0">
                                <li class="py-1 px-2 flex items-center cursor-pointer text-sky-500 dark:text-gray-50 hover:bg-slate-50 dark:hover:bg-slate-600 theme"
                                    data-theme="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" class="w-6 h-6 mr-2">
                                        <path fill-rule="evenodd"
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            clip-rule="evenodd"></path>
                                    </svg> Sáng
                                </li>
                                <li class="py-1 px-2 flex items-center cursor-pointer text-gray-600 dark:text-sky-500 hover:bg-slate-50 dark:hover:bg-slate-600 theme"
                                    data-theme="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" class="w-6 h-6 mr-2">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                        </path>
                                    </svg> Tối
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="relative ml-4 xl:hidden">
                    <button type="button" class="open-search ml-auto text-slate-500 w-8 h-8 -my-1 rounded-full">
                        <span class="sr-only">Search</span>
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m19 19-3.5-3.5"></path>
                            <circle cx="11" cy="11" r="6"></circle>
                        </svg>
                    </button>
                    <div class="form-search absolute right-0 mt-2 origin-top-right" role="menu" tabindex="0">
                        <form class="group relative form-ajax m-0" id="search" name="search" method="get"
                            action="/">
                            <svg width="20" height="20" fill="currentColor"
                                class="absolute left-3 top-1/2 -mt-2.5 text-slate-400 pointer-events-none group-focus-within:text-blue-500"
                                aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                                </path>
                            </svg>
                            <input type="text" value="{{ request('search') }}" name="search" id="keyword"
                                style="min-width: 200px" required
                                class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 dark:text-slate-100 placeholder-slate-400 py-2 pl-10 ring-1 ring-slate-200 dark:ring-slate-800 shadow-sm dark:bg-slate-800 dark:highlight-white/5 dark:hover:bg-slate-700"
                                aria-label="Tìm kiếm phim" placeholder="Tìm kiếm phim..." />
                        </form>
                        <div style="display: none;" class="search-suggest w-full text-center p-2 bg-zinc-800 absolute"></div>
                    </div>
                </div>
                <div class="ml-2 -my-1 xl:hidden">
                    <button type="button" id="open-menu"
                        class="text-slate-500 w-8 h-8 flex items-center justify-center hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300">
                        <span class="sr-only">Navigation</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('menuButton');
        const subMenu = document.getElementById('subMenu');

        menuButton.addEventListener('click', function () {
            subMenu.classList.toggle('active');
        });

        // Optional: Close the menu when clicking outside
        document.addEventListener('click', function (event) {
            if (!menuButton.contains(event.target) && !subMenu.contains(event.target)) {
                subMenu.classList.remove('active');
            }
        });
    });
</script>
