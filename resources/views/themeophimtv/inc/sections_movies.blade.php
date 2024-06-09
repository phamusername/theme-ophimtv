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
                        @foreach ($item['data'] as $key => $movie)
                            @include('themes::themeophimtv.inc.sections_movies_item')
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
                    Trang<span class="font-medium mx-1">1</span>|
                    Tổng<span class="font-medium mx-1">{{ $count_movies }}</span>Kết quả</p>
            </div>
            <div class="mt-8">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                    <a class="z-10 bg-indigo-50 dark:bg-slate-700/10 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                        href="{{ $item['link'] }}">Xem thêm</a></li>
            </div>
        </div>
    </div>
</div>
