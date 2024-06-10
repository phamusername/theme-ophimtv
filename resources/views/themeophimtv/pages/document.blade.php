@extends('themes::themeophimtv.layout')
@php
    use Artesaos\SEOTools\Facades\SEOMeta;
    SEOMeta::setTitle('API - Dành cho nhà phát triển Website xem phim', false);
    SEOMeta::setDescription(
        'Công cụ API dành cho nhà phát triển website xem phim online có thể sử dụng dữ liệu tại Ổ Phim một cách dễ dàng, thuận tiện và nhanh chóng',
    );
@endphp
@section('content')
    <div class="container px-2 mx-auto">
        <div class="container mx-auto mt-2 px-8 py-2 w-full">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 space-y-2">
                    <div class="w-full">
                        <h1
                            class="mb-4 text-2xl uppercase font-semibold text-transparent bg-clip-text bg-gradient-to-r from-[#7367F0] to-[#cecbf0]">
                            API - Dành cho nhà phát triển Website xem phim</h1>
                        <div class="w-full space-y-2 mx-auto bg-gray-100 dark:bg-slate-800 rounded-2xl">
                            <div class="mt-0 card-collapse">
                                <button
                                    class="toggle-content flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-sky-900 bg-sky-300 dark:text-sky-400 dark:bg-sky-900 rounded-lg hover:bg-sky-200"
                                    type="button" aria-expanded="true">
                                    <span>Danh sách phim</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" class="transform rotate-180 w-5 h-5 text-sky-500">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div class="card-collapse-content px-4 pt-4 pb-2 text-sm text-gray-500 dark:text-gray-200">
                                    <div class="w-full max-w-3xl px-2 sm:px-0">
                                        <h2
                                            class="sm:text-xl text-lg text-slate-900 font-bold tracking-tight dark:text-slate-50 ">
                                            Phim mới cập nhật</h2>

                                        <div class="ml-4 my-2"><span
                                                class="px-1 py-0.5 mr-2 rounded-md bg-sky-500 text-white cursor-pointer">GET</span><span
                                                class="font-semibold text-indigo-500">https://{{ request()->getHost() }}/danh-sach/phim-moi-cap-nhat?page=${page}</span><span
                                                class="font-semibold text-red-500 disable">${slug}</span></div>

                                        <div class="ml-4 space-x-2"><span>Ví dụ:
                                                https://{{ request()->getHost() }}/danh-sach/phim-moi-cap-nhat?page=1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-0 card-collapse">
                                <button
                                    class="toggle-content flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-sky-900 bg-sky-300 dark:text-sky-400 dark:bg-sky-900 rounded-lg hover:bg-sky-200"
                                    type="button" aria-expanded="true">
                                    <span>Danh sách phim</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" class="transform rotate-180 w-5 h-5 text-sky-500">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div class="card-collapse-content px-4 pt-4 pb-2 text-sm text-gray-500 dark:text-gray-200">
                                    <div class="w-full max-w-3xl px-2 sm:px-0">
                                        <h2
                                            class="sm:text-xl text-lg text-slate-900 font-bold tracking-tight dark:text-slate-50 ">
                                            Thông tin Phim & Danh sách tập phim</h2>

                                        <div class="ml-4 my-2"><span
                                                class="px-1 py-0.5 mr-2 rounded-md bg-sky-500 text-white cursor-pointer">GET</span><span
                                                class="font-semibold text-indigo-500">https://{{ request()->getHost() }}/phim/${slug}</span><span
                                                class="font-semibold text-red-500 disable">${slug}</span></div>

                                        <div class="ml-4 space-x-2">
                                            <div class="ml-4 space-x-2">
                                                <span>Ví dụ:
                                                    https://{{ request()->getHost() }}/phim/hoa-thien-cot</span>
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
