@extends('themes::themeophimtv.layout')

@php
    $years = Cache::remember(
        'all_years',
        \Backpack\Settings\app\Models\Setting::get('site_cache_ttl', 5 * 60),
        function () {
            return \Ophim\Core\Models\Movie::select('publish_year')->distinct()->pluck('publish_year')->sortDesc();
        },
    );
@endphp



@section('content')
    <div class="container px-2 mx-auto" id="content">
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
            <ol class="ml-4 flex text-sm leading-6 overflow-hidden overflow-ellipsis whitespace-nowrap min-w-0">
                <li class="flex items-center" itemprop="itemListElement" itemscope="true"
                    itemtype="http://schema.org/ListItem" href="/">
                    <a itemprop="item" title="Nguồn Phim Mới" href="/">
                        <span class="text-slate-500 hover:text-sky-500 dark:text-slate-400 dark:hover:text-slate-300"
                            itemprop="name">Trang Chủ
                        </span>
                        <meta itemprop="position" content="1">
                    </a><svg width="3" height="6" aria-hidden="true" class="mx-3 overflow-visible text-slate-400">
                        <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                    </svg>
                </li>
                <li class="flex items-center" itemprop="itemListElement" itemscope="true"
                    itemtype="http://schema.org/ListItem" href="/">
                    <a itemprop="item" title="{{ $section_name ?? 'Danh Sách Phim' }}" href="{{ url()->current() }}">
                        <span class="text-slate-500 hover:text-sky-500 dark:text-slate-400 dark:hover:text-slate-300"
                            itemprop="name"> {{ $section_name ?? 'Danh Sách Phim' }}
                        </span>
                        <meta itemprop="position" content="1">
                    </a><svg width="3" height="6" aria-hidden="true" class="mx-3 overflow-visible text-slate-400">
                        <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                    </svg>
                </li>
                <li class="flex items-center" itemprop="itemListElement" itemscope="true"
                    itemtype="http://schema.org/ListItem">
                    <a itemprop="item" class="ajax-load" title="Trang {{ $data->currentPage() }}" href="https://phim.nguonc.com/the-loai/hoat-hinh">
                        <span class="font-semibold text-slate-900 truncate dark:text-slate-200 hover:text-sky-500"
                            itemprop="name">Trang {{ $data->currentPage() }}</span>
                        <meta itemprop="position" value="end" content="3">
                    </a>
                </li>
            </ol>
        </div>
        <div class="container mx-auto mt-2 py-2 w-full">
            <h1
                class="mb-4 text-2xl uppercase font-semibold text-transparent bg-clip-text bg-gradient-to-r from-[#7367F0] to-[#cecbf0]">
                {{ $section_name ?? 'Danh Sách Phim' }}</h1>
            @include('themes::themeophimtv.inc.catalog_filter')
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-500 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-slate-800">
                                    <tr>
                                        <th scope="col"
                                            class="px-3 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Tên</th>
                                        <th scope="col"
                                            class="px-3 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Tình Trạng</th>
                                        <th scope="col"
                                            class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Định dạng</th>
                                        <th scope="col"
                                            class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Năm</th>
                                        <th scope="col"
                                            class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Quốc gia</th>
                                        <th scope="col"
                                            class="px-3 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Ngày cập nhật</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-gray-600">
                                    @foreach ($data as $key => $movie)
                                        @include('themes::themeophimtv.inc.catalog_sections_movies_item')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class=" px-4 py-3 flex items-center justify-between sm:px-6">
                    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-black dark:text-white">
                                Trang
                                <span class="font-medium mx-1">{{ $data->currentPage() }}</span>/
                                <span class="font-medium mx-1">{{ $data->lastPage() }}</span>|
                                Tổng<span class="font-medium mx-1">{{ $data->total() }}</span>Kết quả
                            </p>
                        </div>
                    </div>
                    {{ $data->appends(request()->all())->links('themes::themeophimtv.inc.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
