<nav class="text-sm leading-6 font-semibold text-slate-700 dark:text-slate-200 relative" id="menu_header_mobile">
    <span class="absolute cursor-pointer close_menu_mb" style="top: 0px;right: 300px;">
        <svg xmlns="http://www.w3.org/2000/svg" style="width: 28px;height: 28px;" class="dark:bg-slate-800 bg-white"
            viewBox="0 0 352 512">
            <path
                d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" />
        </svg>
    </span>
    <ul class="list-decimal bg-white dark:bg-slate-800">
        @foreach ($menu as $item)
            @if (count($item['children']))
                <li>
                    <span class="hover:text-sky-500 dark:hover:text-sky-400">
                        <div class="relative inline-block text-left">
                            <div>
                                <button
                                    class="has_sub_menu inline-flex justify-center w-full text-sm font-medium rounded-md bg-opacity-20 hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                                    type="button" aria-haspopup="true" aria-expanded="true">{{ $item['name'] }}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true"
                                        class="w-5 h-5 ml-2 -mr-1 text-violet-400 hover:text-violet-800">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </button>
                                <div class="sub_menu_mobile origin-top-right mt-2 bg-white dark:bg-slate-800 divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" tabindex="0">
                                    <div class="px-1 py-1 flex flex-wrap" role="none">
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
