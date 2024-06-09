<div class="mb-4 w-full px-2 py-1 bg-gray-100 dark:bg-slate-800 rounded-md">
    <div class="text-white">
        <form id="form-filter" method="GET" action="/" class="lg:flex gap-2 items-center form-ajax">
            <div class="p-2 flex justify-between">
                <span class="text-violet-500 dark:text-white">Lọc Phim</span>
                <div class="open_filter block lg:hidden cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition ease-in-out" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path class="text-violet-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 13l-7 7-7-7m14-8l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            <div class="select_filter hidden lg:flex gap-2 items-center">
                <div class="p-2">
                    <select
                        class="bg-gray-200 dark:bg-slate-700 text-gray-600 dark:text-white p-2 rounded-md outline-none"
                        name="filter[sort]" form="form-filter" id="order">
                        <option value="">Sắp xếp</option>
                        <option value="update" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'update') selected @endif>Thời gian cập nhật
                        </option>
                        <option value="create" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'create') selected @endif>Thời gian đăng</option>
                        <option value="year" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'year') selected @endif>Năm sản xuất</option>
                        <option value="view" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'view') selected @endif>Lượt xem</option>
                    </select>
                </div>
                <div class="p-2">
                    <select name="filter[type]" form="form-filter"
                        class="bg-gray-200 dark:bg-slate-700 text-gray-600 dark:text-white p-2 rounded-md outline-none"
                        id="type">
                        <option value="">Định dạng</option>
                        <option value="series" @if (isset(request('filter')['type']) && request('filter')['type'] == 'series') selected @endif>Phim bộ</option>
                        <option value="single" @if (isset(request('filter')['type']) && request('filter')['type'] == 'single') selected @endif>Phim lẻ</option>
                    </select>
                </div>
                <div class="p-2">
                    <select name="filter[category]" form="form-filter"
                        class="bg-gray-200 dark:bg-slate-700 text-gray-600 dark:text-white p-2 rounded-md outline-none"
                        id="cat_id">
                        <option value="">Thể loại</option>
                        @foreach (\Ophim\Core\Models\Category::fromCache()->all() as $item)
                            <option value="{{ $item->id }}" @if (
                                (isset(request('filter')['category']) && request('filter')['category'] == $item->id) ||
                                    (isset($category) && $category->id == $item->id)) selected @endif>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2">
                    <select name="filter[region]" form="form-filter" class="bg-gray-200 dark:bg-slate-700 text-gray-600 dark:text-white p-2 rounded-md outline-none" id="city_id">
                        <option value="">Quốc gia</option>
                        @foreach (\Ophim\Core\Models\Region::fromCache()->all() as $item)
                            <option value="{{ $item->id }}" @if ((isset(request('filter')['region']) && request('filter')['region'] == $item->id) ||
                                (isset($region) && $region->id == $item->id)) selected @endif>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2">
                    <select name="filter[year]" form="form-filter" class="bg-gray-200 dark:bg-slate-700 text-gray-600 dark:text-white p-2 rounded-md outline-none" id="year">
                        <option value="">Năm</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}" @if (isset(request('filter')['year']) && request('filter')['year'] == $year) selected @endif>
                                {{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2">
                    <button form="form-filter" type="submit"
                        class="bg-violet-500 text-white p-1.5 rounded hover:bg-violet-400">
                        <span>Duyệt phim</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
