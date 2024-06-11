@extends('themes::themeophimtv.layout')

@section('content')
    <div class="container px-2 mx-auto">
        <div class="flex items-center p-4 border-b border-slate-900/10 dark:border-slate-50/[0.06]">
            <button type="button" class="text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300">
                <span class="sr-only">Trang Chủ</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                    class="w-6 h-6">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
            </button>
            <ol class="ml-4 flex text-sm leading-6 overflow-x-auto overflow-ellipsis whitespace-nowrap min-w-0">
                <li class="flex items-center" itemprop="itemListElement" itemscope="true"
                    itemtype="http://schema.org/ListItem">
                    <a itemprop="item" title="Trang chủ" class="ajax-load" href="/">
                        <span class="text-slate-500 hover:text-sky-500 dark:text-slate-400 dark:hover:text-slate-300"
                            itemprop="name">Trang chủ</span>
                        <meta itemprop="position" value="0" content="1">
                    </a>
                    <svg width="3" height="6" aria-hidden="true" class="mx-3 overflow-visible text-slate-400">
                        <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                    </svg>
                </li>
                @foreach ($currentMovie->categories as $category)
                    <li class="flex items-center" itemprop="itemListElement" itemscope="true"
                        itemtype="http://schema.org/ListItem">
                        <a itemprop="item" title="{{ $category->name }}" class="ajax-load" href="{{ $category->getUrl() }}">
                            <span class="text-slate-500 hover:text-sky-500 dark:text-slate-400 dark:hover:text-slate-300"
                                itemprop="name">{{ $category->name }}</span>
                            <meta itemprop="position" value="3" content="2">
                        </a>
                        <svg width="3" height="6" aria-hidden="true" class="mx-3 overflow-visible text-slate-400">
                            <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round"></path>
                        </svg>
                    </li>
                @endforeach
                @foreach ($currentMovie->regions as $region)
                    <li class="flex items-center" itemprop="itemListElement" itemscope="true"
                        itemtype="http://schema.org/ListItem">
                        <a itemprop="item" title="{{ $region->name }}" class="ajax-load" href="{{ $region->getUrl() }}">
                            <span class="text-slate-500 hover:text-sky-500 dark:text-slate-400 dark:hover:text-slate-300"
                                itemprop="name">{{ $region->name }}</span>
                            <meta itemprop="position" value="3" content="2">
                        </a>
                        <svg width="3" height="6" aria-hidden="true" class="mx-3 overflow-visible text-slate-400">
                            <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round"></path>
                        </svg>
                    </li>
                @endforeach
                <li class="flex items-center" itemprop="itemListElement" itemscope="true"
                    itemtype="http://schema.org/ListItem">
                    <a itemprop="item" title="{{ $currentMovie->name }}" class="ajax-load"
                        href="{{ $currentMovie->getUrl() }}">
                        <span class="text-slate-500 hover:text-sky-500 dark:text-slate-400 dark:hover:text-slate-300"
                            itemprop="name">{{ $currentMovie->name }}</span>
                        <meta itemprop="position" value="3" content="2">
                    </a>
                </li>
            </ol>
        </div>
        <div class="container mx-auto mt-2 px-8 py-2 w-full">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 space-y-2">
                    <div class="bg-gray-100 dark:bg-slate-800 p-2 rounded-2xl md:flex flex-wrap">
                        <div class="relative w-full h-full md:w-1/3 lg:w-1/6">
                            <span style="display:block;">
                                <img alt="{{ $currentMovie->name }} - {{ $currentMovie->origin_name }}"
                                    src="{{ $currentMovie->getThumbUrl() }}" decoding="async" class="rounded-md w-full"
                                    data-src="{{ $currentMovie->getThumbUrl() }}"
                                    style="background-size:cover;background-image:url(&quot;data:image/svg+xml;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+ip1sAAAAASUVORK5CYII=&quot;);background-position:0% 0%"></span>
                            <div
                                class="absolute bottom-0 space-x-2 text-center w-full bg-white dark:bg-black bg-opacity-40 dark:bg-opacity-80 py-2 m-0 rounded-t-none rounded-lg">
                                <div id="scroll_button" data-scroll="#list_episode"
                                    class="cursor-pointer hover:bg-opacity-80 bg-violet-500 text-gray-50 dark:text-gray-50 inline-block px-1 py-1 rounded">
                                    Xem Phim</div>
                                <div data-scroll="#data_link"
                                    class="scroll cursor-pointer hover:bg-opacity-80 bg-red-500 text-gray-50 dark:text-gray-50 inline-block px-1 py-1 rounded">
                                    Lấy Nguồn</div>
                                <div
                                    class="cursor-pointer hover:bg-opacity-80 bg-blue-500 text-gray-50 dark:text-gray-50 inline-block px-1 py-1 rounded">
                                    <a target="_blank" href="{{ $currentMovie->getUrl() }}"
                                        title="API Phim {{ $currentMovie->name }}" rel="noopener noreferrer">API</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-2/3 lg:w-5/6 pl-4 pt-0 mt-2 md:mt-0 text-sm md:text-base">
                            <div class="text-center rounded-md">
                                <h1 class="uppercase text-lg font-bold text-violet-500">{{ $currentMovie->name }}</h1>
                                <h2 class="italic text-sky-500">{{ $currentMovie->origin_name }}</h2>
                            </div>
                            <div
                                class="overflow-hidden lg:overflow-auto scrollbar:!w-1.5 scrollbar:!h-1.5 scrollbar:bg-transparent scrollbar-track:!bg-slate-100 scrollbar-thumb:!rounded scrollbar-thumb:!bg-slate-300 scrollbar-track:!rounded dark:scrollbar-track:!bg-slate-500/[0.16] dark:scrollbar-thumb:!bg-slate-500/50">
                                <table class="w-full text-left border-collapse">
                                    <tbody class="align-baseline">
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Trạng thái</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                {{ $currentMovie->episode_current }}</td>
                                        </tr>
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Số tập</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                {{ $currentMovie->episode_total }}</td>
                                        </tr>
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Thời Lượng</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                {{ $currentMovie->episode_time }}</td>
                                        </tr>
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Chất Lượng</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                {{ $currentMovie->quality }}</td>
                                        </tr>
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Ngôn Ngữ</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                {{ $currentMovie->language }}</td>
                                        </tr>
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Đạo
                                                Diễn</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                {!! count($currentMovie->directors)
                                                    ? $currentMovie->directors->map(function ($director) {
                                                            return '' . $director->name . '';
                                                        })->implode(', ')
                                                    : 'Đoán xem' !!}
                                            </td>
                                        </tr>
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Diễn Viên</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                {!! count($currentMovie->actors)
                                                    ? $currentMovie->actors->map(function ($actor) {
                                                            return '' . $actor->name . '';
                                                        })->implode(', ')
                                                    : 'Đoán xem' !!}
                                            </td>
                                        </tr>
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Danh sách</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                @if ($currentMovie->type == 'series')
                                                    Phim bộ
                                                @else
                                                    Phim lẻ
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Thể loại</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                {!! $currentMovie->categories->map(function ($category) {
                                                        return '' . $category->name . '';
                                                    })->implode(', ') !!}
                                            </td>
                                        </tr>
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Năm phát hành</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                {{ $currentMovie->publish_year }}
                                            </td>
                                        </tr>
                                        <tr class="border-t border-slate-200 dark:border-slate-400/20">
                                            <td translate="yes"
                                                class="py-1 pr-2 leading-5 text-sky-500 whitespace-nowrap dark:text-sky-400">
                                                Quốc gia</td>
                                            <td translate="yes"
                                                class="py-1 pl-2 leading-5 text-indigo-600 whitespace-normal dark:text-indigo-300">
                                                {!! $currentMovie->regions->map(function ($region) {
                                                        return '' . $region->name . '';
                                                    })->implode(', ') !!}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="sticky bottom-0 h-px -mt-px bg-slate-200 dark:bg-slate-400/20"></div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="w-full p-2 space-y-2 mx-auto bg-gray-100 dark:bg-slate-800 rounded-2xl">
                            <div class="card-collapse">
                                <button
                                    class="toggle-content flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-sky-900 bg-sky-300 dark:text-sky-400 dark:bg-sky-900 rounded-lg hover:bg-sky-200 focus:outline-none focus-visible:ring focus-visible:ring-sky-500 focus-visible:ring-opacity-75"
                                    type="button" aria-expanded="true"><span>Nội dung phim</span><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" class="transform rotate-180 w-5 h-5 text-sky-500">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </button>
                                <div class="card-collapse-content px-4 pt-4 pb-2 text-sm text-gray-500 dark:text-gray-200">
                                    <article id="content">
                                        {!! strip_tags($currentMovie->content) !!}
                                    </article>
                                </div>
                            </div>
                            <div class="card-collapse">
                                <button
                                    class="toggle-content flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-sky-900 bg-sky-300 dark:text-sky-400 dark:bg-sky-900 rounded-lg hover:bg-sky-200 focus:outline-none focus-visible:ring focus-visible:ring-sky-500 focus-visible:ring-opacity-75"
                                    type="button" aria-expanded="true"><span>Player</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-sky-500">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </button>
                                <div class="card-collapse-content-player px-4 pt-4 pb-2 text-sm text-gray-500 dark:text-gray-200 hidden">
                                    <iframe style="aspect-ratio: 16/9" id="video_player" class="w-full h-64" src="" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="mt-0 card-collapse" id="list_episode">
                                <button
                                    class="toggle-content flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-sky-900 bg-sky-300 dark:text-sky-400 dark:bg-sky-900 rounded-lg hover:bg-sky-200"
                                    type="button" aria-expanded="true"><span>Xem Phim</span><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" class="transform rotate-180 w-5 h-5 text-sky-500">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div class="card-collapse-content px-4 pt-4 pb-2 text-sm text-gray-500 dark:text-gray-200">
                                    <div class="w-full px-2 sm:px-0">
                                        <div>
                                            @foreach ($currentMovie->episodes->groupBy('server') as $server => $data)
                                                <div class="py-2 uppercase font-bold">Server:
                                                    <span class="text-violet-500">{{ $server }}</span>
                                                </div>
                                                <div class="grid grid-cols-3 md:grid-cols-6 lg:grid-cols-16 gap-2">
                                                    @foreach ($data->sortBy('name', SORT_NATURAL)->groupBy('name') as $name => $item)
                                                        @foreach ($item as $episode)
                                                            @if ($episode->type !== 'm3u8')
                                                            <a class="episode-link text-center overflow-hidden overflow-ellipsis whitespace-nowrap px-5 py-1 rounded shadow-md bg-gray-400 text-gray-50 hover:bg-violet-500 dark:bg-slate-600 dark:hover:bg-violet-600" title="{{ $name }}" href="{{ $episode->link }}">
                                                                {{ $name }}
                                                            </a>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Display format radio buttons -->
                            <!-- Display format radio buttons -->
                            <div class="card-collapse">
                                <button
                                    class="toggle-content flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-sky-900 bg-sky-300 dark:text-sky-400 dark:bg-sky-900 rounded-lg hover:bg-sky-200 focus:outline-none focus-visible:ring focus-visible:ring-sky-500 focus-visible:ring-opacity-75"
                                    \="" type="button" aria-expanded="true"
                                    aria-controls="headlessui-disclosure-panel-9"><span>Định dạng nguồn</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" class="transform rotate-180 w-5 h-5 text-sky-500">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </button>
                                <div class="card-collapse-content px-4 pt-4 pb-2 text-sm text-gray-500 dark:text-gray-200"
                                    id="data_link">
                                    <div class="lg:flex gap-x-2 mb-2">
                                        <label class="">Định dạng hiển thị: </label>
                                        <div class="form-check form-check-inline">
                                            <input id="showType1"
                                                class="type_show form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" name="typeShow" checked="" value="1">
                                            <label class="form-check-label inline-block text-sky-500"
                                                for="showType1">Tập|Link</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input id="showType2"
                                                class="type_show form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" name="typeShow" value="2">
                                            <label class="form-check-label inline-block text-sky-500"
                                                for="showType2">Tập|Slug|Link</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input id="showType3"
                                                class="type_show form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" name="typeShow" value="3">
                                            <label class="form-check-label inline-block text-sky-500"
                                                for="showType3">Link</label>
                                        </div>
                                    </div>

                                    <div class="lg:flex gap-x-2 mb-2">
                                        <label class="">Sắp xếp: </label>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true" id="sort"
                                            class="text-sky-500 hover:text-violet-500 cursor-pointer w-6 h-6 sort_data">
                                            <path
                                                d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 card-collapse">
                                <button
                                    class="toggle-content flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-sky-900 bg-sky-300 dark:text-sky-400 dark:bg-sky-900 rounded-lg hover:bg-sky-200 focus:outline-none focus-visible:ring focus-visible:ring-sky-500 focus-visible:ring-opacity-75"
                                    type="button" aria-expanded="true">
                                    <span>Nguồn Embed</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" class="transform rotate-180 w-5 h-5 text-sky-500">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div
                                    class="card-collapse-content relative px-4 pt-4 pb-2 text-sm text-gray-500 dark:text-gray-200">
                                    <div class="w-full max-w-3xl px-2 sm:px-0">
                                        <div class="flex p-1 space-x-1 bg-blue-900/20 rounded-xl" role="tablist"
                                            aria-orientation="horizontal">
                                            @foreach ($currentMovie->episodes->sortBy([['name', 'asc']])->groupBy('server') as $server => $data)
                                                <button
                                                    class="{{ $loop->index == 0 ? 'server p-2 text-sm leading-5 font-medium dark:text-blue-500 rounded-lg bg-white dark:bg-slate-900 shadow' : 'server p-2 text-sm leading-5 font-medium dark:text-blue-500 rounded-lg text-blue-700 hover:bg-white/[0.12] hover:text-white' }}"
                                                    data-server="{{ $server }}" data-type="embed" role="tab"
                                                    type="button"
                                                    aria-selected="{{ $loop->index == 0 ? 'true' : 'false' }}"
                                                    tabindex="{{ $loop->index == 0 ? '0' : '-1' }}">
                                                    {{ $server }}
                                                </button>
                                            @endforeach
                                        </div>
                                        <div class="pt-2">
                                            <div role="tabpanel" tabindex="0" aria-labelledby="headlessui-tabs-tab-12">
                                                <textarea id="area_embed"
                                                    class="form-control block w-full px-3 py-1.5 text-sm font-normal bg-white dark:bg-slate-900 bg-clip-padding border border-solid border-slate-700 rounded transition ease-in-out m-0 focus:border-blue-600 focus:outline-none"
                                                    rows="10" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 card-collapse">
                                <button
                                    class="toggle-content flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-sky-900 bg-sky-300 dark:text-sky-400 dark:bg-sky-900 rounded-lg hover:bg-sky-200 focus:outline-none focus-visible:ring focus-visible:ring-sky-500 focus-visible:ring-opacity-75"
                                    type="button" aria-expanded="true">
                                    <span>Nguồn m3u8</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" class="transform rotate-180 w-5 h-5 text-sky-500">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div
                                    class="card-collapse-content relative px-4 pt-4 pb-2 text-sm text-gray-500 dark:text-gray-200">
                                    <div class="w-full max-w-3xl px-2 sm:px-0">
                                        <div class="flex p-1 space-x-1 bg-blue-900/20 rounded-xl" role="tablist"
                                            aria-orientation="horizontal">
                                            @foreach ($currentMovie->episodes->sortBy([['name', 'asc']])->groupBy('server') as $server => $data)
                                                <button
                                                    class="{{ $loop->index == 0 ? 'server-m3u8 p-2 text-sm leading-5 font-medium dark:text-blue-500 rounded-lg bg-white dark:bg-slate-900 shadow' : 'server-m3u8 p-2 text-sm leading-5 font-medium dark:text-blue-500 rounded-lg text-blue-700 hover:bg-white/[0.12] hover:text-white' }}"
                                                    data-server="{{ $server }}" data-type="m3u8" role="tab"
                                                    type="button"
                                                    aria-selected="{{ $loop->index == 0 ? 'true' : 'false' }}"
                                                    tabindex="{{ $loop->index == 0 ? '0' : '-1' }}">
                                                    {{ $server }}
                                                </button>
                                            @endforeach
                                        </div>
                                        <div class="pt-2">
                                            <div role="tabpanel" tabindex="0" aria-labelledby="headlessui-tabs-tab-12">
                                                <textarea id="area_m3u8"
                                                    class="form-control block w-full px-3 py-1.5 text-sm font-normal bg-white dark:bg-slate-900 bg-clip-padding border border-solid border-slate-700 rounded transition ease-in-out m-0 focus:border-blue-600 focus:outline-none"
                                                    rows="10" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const episodeLinks = document.querySelectorAll('.episode-link');
            const videoPlayer = document.getElementById('video_player');
            const playerSection = document.querySelector('.card-collapse-content-player');

            episodeLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default anchor behavior
                    const videoUrl = this.getAttribute('href');
                    videoPlayer.setAttribute('src', videoUrl);
                    showPlayerSection();
                    scrollToPlayer();
                });
            });

            function showPlayerSection() {
                playerSection.style.display = 'block';
            }

            function scrollToPlayer() {
                const playerButton = document.querySelector('.card-collapse > button');
                window.scrollTo({
                    top: playerButton.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    </script>
    <script src="/themes/ophimtv/static/player/skin/juicycodes.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Pass the episodes data from PHP to JavaScript
            const episodes = @json($currentMovie->episodes->groupBy('server'));

            let serverEmbed = localStorage.getItem('selectedServerEmbed') || document.querySelector('.server')
                .dataset.server;
            let serverM3u8 = localStorage.getItem('selectedServerM3u8') || document.querySelector('.server-m3u8')
                .dataset.server;
            const buttonsEmbed = document.querySelectorAll('.server');
            const buttonsM3u8 = document.querySelectorAll('.server-m3u8');
            const textareaEmbed = document.getElementById('area_embed');
            const textareaM3u8 = document.getElementById('area_m3u8');
            const typeShowInputs = document.querySelectorAll('.type_show');
            let sortOrder = localStorage.getItem('sortOrder') || 'asc';

            // Restore selected typeShow
            const savedTypeShow = localStorage.getItem('selectedTypeShow');
            if (savedTypeShow) {
                document.querySelector(`input[name="typeShow"][value="${savedTypeShow}"]`).checked = true;
            }

            // Update sort icon based on saved sortOrder
            const sortIconPath = document.getElementById('sortIconPath');
            if (sortIconPath) {
                if (sortOrder === 'desc') {
                    sortIconPath.setAttribute('d',
                        'M3 17a1 1 0 000-2h11a1 1 0 100 2H3zM3 13a1 1 0 000-2h7a1 1 0 100 2H3zM3 9a1 1 0 100-2h4a1 1 0 100 2H3zM15 12a1 1 0 10-2 0v-5.586l-1.293 1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 001.414 1.414L15 6.414V12z'
                    );
                }
            }

            function render_data_link(server, type = 'embed') {
                let data = episodes[server];
                let result = '';

                // Check if data is defined
                if (!data) {
                    console.error(`No data found for server: ${server}`);
                    return;
                }

                let typeShow = document.querySelector('input[name="typeShow"]:checked').value;

                // Ensure the data is sorted
                data = data.sort((a, b) => a.name.localeCompare(b.name, undefined, {
                    numeric: true
                }));

                if (sortOrder === 'desc') {
                    data = [...data].reverse(); // Create a new reversed array
                }

                data.forEach(element => {
                    if (type === 'embed' && element.type !== 'm3u8') {
                        if (typeShow == '1') {
                            result += `${element.name}|${element.link}\n`;
                        } else if (typeShow == '2') {
                            result += `${element.name}|${element.slug}|${element.link}\n`;
                        } else if (typeShow == '3') {
                            result += `${element.link}\n`;
                        }
                    } else if (type === 'm3u8' && element.type === 'm3u8') {
                        if (typeShow == '1') {
                            result += `${element.name}|${element.link}\n`;
                        } else if (typeShow == '2') {
                            result += `${element.name}|${element.slug}|${element.link}\n`;
                        } else if (typeShow == '3') {
                            result += `${element.link}\n`;
                        }
                    }
                });

                if (type === 'embed') {
                    textareaEmbed.value = result;
                } else {
                    textareaM3u8.value = result;
                }
            }

            buttonsEmbed.forEach(button => {
                button.addEventListener('click', function() {
                    serverEmbed = this.getAttribute('data-server');
                    localStorage.setItem('selectedServerEmbed', serverEmbed);

                    // Remove active class from all buttons
                    buttonsEmbed.forEach(btn => {
                        btn.classList.remove('bg-white', 'dark:bg-slate-900', 'shadow');
                        btn.classList.add('text-blue-700', 'hover:bg-white/[0.12]',
                            'hover:text-white');
                    });

                    // Add active class to the clicked button
                    this.classList.add('bg-white', 'dark:bg-slate-900', 'shadow');
                    this.classList.remove('text-blue-700', 'hover:bg-white/[0.12]',
                        'hover:text-white');

                    // Update the textarea content
                    render_data_link(serverEmbed, 'embed');
                });
            });

            buttonsM3u8.forEach(button => {
                button.addEventListener('click', function() {
                    serverM3u8 = this.getAttribute('data-server');
                    localStorage.setItem('selectedServerM3u8', serverM3u8);

                    // Remove active class from all buttons
                    buttonsM3u8.forEach(btn => {
                        btn.classList.remove('bg-white', 'dark:bg-slate-900', 'shadow');
                        btn.classList.add('text-blue-700', 'hover:bg-white/[0.12]',
                            'hover:text-white');
                    });

                    // Add active class to the clicked button
                    this.classList.add('bg-white', 'dark:bg-slate-900', 'shadow');
                    this.classList.remove('text-blue-700', 'hover:bg-white/[0.12]',
                        'hover:text-white');

                    // Update the textarea content
                    render_data_link(serverM3u8, 'm3u8');
                });
            });

            typeShowInputs.forEach(input => {
                input.addEventListener('change', function() {
                    localStorage.setItem('selectedTypeShow', this.value);
                    render_data_link(serverEmbed, 'embed');
                    render_data_link(serverM3u8, 'm3u8');
                });
            });

            document.getElementById('sort').addEventListener('click', function() {
                sortOrder = (sortOrder === 'asc') ? 'desc' : 'asc';
                localStorage.setItem('sortOrder', sortOrder);

                // Toggle sort icon path
                if (sortOrder === 'asc') {
                    sortIconPath.setAttribute('d',
                        'M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z'
                    );
                } else {
                    sortIconPath.setAttribute('d',
                        'M3 17a1 1 0 000-2h11a1 1 0 100 2H3zM3 13a1 1 0 000-2h7a1 1 0 100 2H3zM3 9a1 1 0 100-2h4a1 1 0 100 2H3zM15 12a1 1 0 10-2 0v-5.586l-1.293 1.293a1 1 0 00-1.414-1.414l-3-3a1 1 0 001.414 1.414L15 6.414V12z'
                    );
                }

                render_data_link(serverEmbed, 'embed');
                render_data_link(serverM3u8, 'm3u8');
            });

            // Initial render for the selected or first server
            render_data_link(serverEmbed, 'embed');
            render_data_link(serverM3u8, 'm3u8');
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.scroll').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-scroll');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
    <script>
        document.getElementById('scroll_button').addEventListener('click', function() {
            document.querySelector(this.getAttribute('data-scroll')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>


    {{--    <script src="/themes/ophimtv/static/player/js/p2p-media-loader-core.min.js"></script> --}}
    {{--    <script src="/themes/ophimtv/static/player/js/p2p-media-loader-hlsjs.min.js"></script> --}}

    <script src="/themes/ophimtv/static/player/jwplayer.js"></script>
    {{--    <script src="/js/jwplayer-8.9.3.js"></script> --}}
    {{--    <script src="/js/hls.min.js"></script> --}}
    {{--    <script src="/js/jwplayer.hlsjs.min.js"></script> --}}


    <script>
        var episode_id = {{ $episode->id }};
        const wrapper = document.getElementById('player-loaded');
        const vastAds = "{{ Setting::get('jwplayer_advertising_file') }}";

        function chooseStreamingServer(el) {
            const type = el.dataset.type;
            const link = el.dataset.link.replace(/^http:\/\//i, 'https://');
            const id = el.dataset.id;

            const newUrl =
                location.protocol +
                "//" +
                location.host +
                location.pathname.replace(`-${episode_id}`, `-${id}`);

            history.pushState({
                path: newUrl
            }, "", newUrl);
            episode_id = id;

            Array.from(document.getElementsByClassName('streaming-server')).forEach(server => {
                server.classList.remove('bg-red-600');
            })
            el.classList.add('bg-red-600')

            renderPlayer(type, link, id);
        }

        function renderPlayer(type, link, id) {
            if (type == 'embed') {
                if (vastAds) {
                    wrapper.innerHTML = `<div id="fake_jwplayer"></div>`;
                    const fake_player = jwplayer("fake_jwplayer");
                    const objSetupFake = {
                        key: "{{ Setting::get('jwplayer_license') }}",
                        aspectratio: "16:9",
                        width: "100%",
                        file: "/themes/ophimtv/static/player/1s_blank.mp4",
                        volume: 100,
                        mute: false,
                        autostart: true,
                        advertising: {
                            tag: "{{ Setting::get('jwplayer_advertising_file') }}",
                            client: "vast",
                            vpaidmode: "insecure",
                            skipoffset: {{ (int) Setting::get('jwplayer_advertising_skipoffset') ?: 5 }}, // Bỏ qua quảng cáo trong vòng 5 giây
                            skipmessage: "Bỏ qua sau xx giây",
                            skiptext: "Bỏ qua"
                        }
                    };
                    fake_player.setup(objSetupFake);
                    fake_player.on('complete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe sandbox = "allow-same-origin allow-scripts" width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                        allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });
                    fake_player.on('adSkipped', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe sandbox = "allow-same-origin allow-scripts" width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                        allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });
                    fake_player.on('adComplete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe sandbox = "allow-same-origin allow-scripts" width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                        allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });
                } else {
                    if (wrapper) {
                        wrapper.innerHTML = `<iframe sandbox = "allow-same-origin allow-scripts" width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                        allowfullscreen="" allow='autoplay'></iframe>`
                    }
                }
                return;
            }

            if (type == 'm3u8' || type == 'mp4') {
                wrapper.innerHTML = `<div id="jwplayer"></div>`;
                const player = jwplayer("jwplayer");
                const objSetup = {
                    key: "{{ Setting::get('jwplayer_license') }}",
                    aspectratio: "16:9",
                    width: "100%",
                    file: link,
                    image: "{{ $currentMovie->getPosterUrl() }}",
                    autostart: true,
                    controls: true,
                    primary: "html5",
                    playbackRateControls: true,
                    playbackRates: [0.5, 0.75, 1, 1.5, 2],
                    // sharing: {
                    //     sites: [
                    //         "reddit",
                    //         "facebook",
                    //         "twitter",
                    //         "googleplus",
                    //         "email",
                    //         "linkedin",
                    //     ],
                    // },
                    volume: 100,
                    mute: false,
                    logo: {
                        file: "{{ Setting::get('jwplayer_logo_file') }}",
                        link: "{{ Setting::get('jwplayer_logo_link') }}",
                        position: "{{ Setting::get('jwplayer_logo_position') }}",
                    },
                    advertising: {
                        tag: "{{ Setting::get('jwplayer_advertising_file') }}",
                        client: "vast",
                        vpaidmode: "insecure",
                        skipoffset: {{ (int) Setting::get('jwplayer_advertising_skipoffset') ?: 5 }}, // Bỏ qua quảng cáo trong vòng 5 giây
                        skipmessage: "Bỏ qua sau xx giây",
                        skiptext: "Bỏ qua",
                        admessage: "Quảng cáo còn xx giây."
                    },
                    tracks: [{
                        "file": "/sub.vtt",
                        "kind": "captions",
                        label: "VN",
                        default: "true"
                    }],
                };

                if (type == 'm3u8') {
                    const segments_in_queue = 50;

                    var engine_config = {
                        debug: !1,
                        segments: {
                            forwardSegmentCount: 50,
                        },
                        loader: {
                            cachedSegmentExpiration: 864e5,
                            cachedSegmentsCount: 1e3,
                            requiredSegmentsPriority: segments_in_queue,
                            httpDownloadMaxPriority: 9,
                            httpDownloadProbability: 0.06,
                            httpDownloadProbabilityInterval: 1e3,
                            httpDownloadProbabilitySkipIfNoPeers: !0,
                            p2pDownloadMaxPriority: 50,
                            httpFailedSegmentTimeout: 500,
                            simultaneousP2PDownloads: 20,
                            simultaneousHttpDownloads: 2,
                            // httpDownloadInitialTimeout: 12e4,
                            // httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpDownloadInitialTimeout: 0,
                            httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpUseRanges: !0,
                            maxBufferLength: 300,
                            // useP2P: false,
                        },
                    };
                    // if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
                    //     var engine = new p2pml.hlsjs.Engine(engine_config);
                    //     player.setup(objSetup);
                    //     jwplayer_hls_provider.attach();
                    //     p2pml.hlsjs.initJwPlayer(player, {
                    //         liveSyncDurationCount: segments_in_queue, // To have at least 7 segments in queue
                    //         maxBufferLength: 300,
                    //         loader: engine.createLoaderClass(),
                    //     });
                    // } else {
                    player.setup(objSetup);
                    // }
                } else {
                    player.setup(objSetup);
                }

                player.addButton(
                    '<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-rewind2" viewBox="0 0 240 240" focusable="false"><path d="m 25.993957,57.778 v 125.3 c 0.03604,2.63589 2.164107,4.76396 4.8,4.8 h 62.7 v -19.3 h -48.2 v -96.4 H 160.99396 v 19.3 c 0,5.3 3.6,7.2 8,4.3 l 41.8,-27.9 c 2.93574,-1.480087 4.13843,-5.04363 2.7,-8 -0.57502,-1.174985 -1.52502,-2.124979 -2.7,-2.7 l -41.8,-27.9 c -4.4,-2.9 -8,-1 -8,4.3 v 19.3 H 30.893957 c -2.689569,0.03972 -4.860275,2.210431 -4.9,4.9 z m 163.422413,73.04577 c -3.72072,-6.30626 -10.38421,-10.29683 -17.7,-10.6 -7.31579,0.30317 -13.97928,4.29374 -17.7,10.6 -8.60009,14.23525 -8.60009,32.06475 0,46.3 3.72072,6.30626 10.38421,10.29683 17.7,10.6 7.31579,-0.30317 13.97928,-4.29374 17.7,-10.6 8.60009,-14.23525 8.60009,-32.06475 0,-46.3 z m -17.7,47.2 c -7.8,0 -14.4,-11 -14.4,-24.1 0,-13.1 6.6,-24.1 14.4,-24.1 7.8,0 14.4,11 14.4,24.1 0,13.1 -6.5,24.1 -14.4,24.1 z m -47.77056,9.72863 v -51 l -4.8,4.8 -6.8,-6.8 13,-12.99999 c 3.02543,-3.03598 8.21053,-0.88605 8.2,3.4 v 62.69999 z"></path></svg>',
                    "Forward 10 Seconds", () => player.seek(player.getPosition() + 10), "Forward 10 Seconds");
                player.addButton(
                    '<svg xmlns="http://www.w3.org/2000/svg" class="jw-svg-icon jw-svg-icon-rewind" viewBox="0 0 240 240" focusable="false"><path d="M113.2,131.078a21.589,21.589,0,0,0-17.7-10.6,21.589,21.589,0,0,0-17.7,10.6,44.769,44.769,0,0,0,0,46.3,21.589,21.589,0,0,0,17.7,10.6,21.589,21.589,0,0,0,17.7-10.6,44.769,44.769,0,0,0,0-46.3Zm-17.7,47.2c-7.8,0-14.4-11-14.4-24.1s6.6-24.1,14.4-24.1,14.4,11,14.4,24.1S103.4,178.278,95.5,178.278Zm-43.4,9.7v-51l-4.8,4.8-6.8-6.8,13-13a4.8,4.8,0,0,1,8.2,3.4v62.7l-9.6-.1Zm162-130.2v125.3a4.867,4.867,0,0,1-4.8,4.8H146.6v-19.3h48.2v-96.4H79.1v19.3c0,5.3-3.6,7.2-8,4.3l-41.8-27.9a6.013,6.013,0,0,1-2.7-8,5.887,5.887,0,0,1,2.7-2.7l41.8-27.9c4.4-2.9,8-1,8,4.3v19.3H209.2A4.974,4.974,0,0,1,214.1,57.778Z"></path></svg>',
                    "Rewind 10 Seconds", () => player.seek(player.getPosition() - 10), "Rewind 10 Seconds");

                const resumeData = 'OPCMS-PlayerPosition-' + id;

                player.on('ready', function() {
                    if (typeof(Storage) !== 'undefined') {
                        if (localStorage[resumeData] == '' || localStorage[resumeData] == 'undefined') {
                            console.log("No cookie for position found");
                            var currentPosition = 0;
                        } else {
                            if (localStorage[resumeData] == "null") {
                                localStorage[resumeData] = 0;
                            } else {
                                var currentPosition = localStorage[resumeData];
                            }
                            console.log("Position cookie found: " + localStorage[resumeData]);
                        }
                        player.once('play', function() {
                            console.log('Checking position cookie!');
                            console.log(Math.abs(player.getDuration() - currentPosition));
                            if (currentPosition > 180 && Math.abs(player.getDuration() - currentPosition) >
                                5) {
                                player.seek(currentPosition);
                            }
                        });
                        window.onunload = function() {
                            localStorage[resumeData] = player.getPosition();
                        }
                    } else {
                        console.log('Your browser is too old!');
                    }
                });

                player.on('complete', function() {
                    if (typeof(Storage) !== 'undefined') {
                        localStorage.removeItem(resumeData);
                    } else {
                        console.log('Your browser is too old!');
                    }
                })

                function formatSeconds(seconds) {
                    var date = new Date(1970, 0, 1);
                    date.setSeconds(seconds);
                    return date.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
                }
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const episode = '{{ $episode->id }}';
            let playing = document.querySelector(`[data-id="${episode}"]`);
            if (playing) {
                playing.click();
                return;
            }

            const servers = document.getElementsByClassName('streaming-server');
            if (servers[0]) {
                servers[0].click();
            }
        });
    </script>
@endpush
