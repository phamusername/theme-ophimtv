@extends('themes::themeophimtv.layout')

@php
    use Ophim\Core\Models\Movie;

    $recommendations = Cache::remember('site.movies.recommendations', setting('site_cache_ttl', 5 * 60), function () {
        $lists = preg_split('/[\n\r]+/', get_theme_option('recommendations'));
        $data = [];
        foreach ($lists as $list) {
            if (trim($list)) {
                $list = explode('|', $list);
                [$label, $field, $val, $limit, $sortKey, $alg] = array_merge($list, [
                    'Phim hot',
                    'is_recommended',
                    '1',
                    10,
                    'view_total',
                    'desc',
                ]);
                try {
                    if ($field == 'random') {
                        $movies = Movie::inRandomOrder()->limit($limit)->get();
                    } else {
                        $movies = Movie::where($field, $val)->orderBy($sortKey, $alg)->limit($limit)->get();
                    }

                    $data[] = [
                        'label' => $label,
                        'data' => $movies,
                    ];
                } catch (\Exception $e) {
                    # code
                }
            }
        }

        if (count($data)) {
            return $data[0];
        }

        return $data;
    });

    $data = Cache::remember('site.movies.latest', setting('site_cache_ttl', 5 * 60), function () {
        $lists = preg_split('/[\n\r]+/', get_theme_option('latest'));
        $data = [];
        foreach ($lists as $list) {
            if (trim($list)) {
                $list = explode('|', $list);
                [$label, $relation, $field, $val, $limit, $link, $template] = array_merge($list, [
                    'Phim mới cập nhật',
                    '',
                    'type',
                    'series',
                    8,
                    '/',
                    'block_thumb',
                ]);
                try {
                    $data[] = [
                        'label' => $label,
                        'template' => $template,
                        'data' => Movie::when($relation, function ($query) use ($relation, $field, $val) {
                            $query->whereHas($relation, function ($rel) use ($field, $val) {
                                $rel->where($field, $val);
                            });
                        })
                            ->when(!$relation, function ($query) use ($field, $val) {
                                $query->where($field, $val);
                            })
                            ->limit($limit)
                            ->orderBy('updated_at', 'desc')
                            ->get(),
                        'link' => $link ?: '#',
                    ];
                } catch (\Exception $e) {
                }
            }
        }
        return $data;
    });

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
        <div class="container mx-auto mt-2 py-2 w-full">
            @include('themes::themeophimtv.inc.description_home')
            @foreach ($data as $item)
                @include('themes::themeophimtv.inc.sections_movies')
            @endforeach
        </div>
    </div>
@endsection
