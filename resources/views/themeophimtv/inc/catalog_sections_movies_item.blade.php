<tr>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <div class="flex-shrink-0 w-12">
                <span class="rounded-md" style="display:block; height: 100%; overflow: hidden">
                    <img alt="{{ $movie->name }} - {{ $movie->origin_name }}" src="{{ $movie->getThumbUrl() }}"
                        decoding="async" class="" data-src="{{ $movie->getThumbUrl() }}"
                        style="background-size:cover;background-image:url(&quot;data:image/svg+xml;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+ip1sAAAAASUVORK5CYII=&quot;);background-position:0% 0%"></span>
            </div>
            <div class="ml-4">
                <a title="{{ $movie->name }} - {{ $movie->origin_name }}" class="ajax-load"
                    href="{{ $movie->getUrl() }}">
                    <h3
                        class="font-medium max-w-md overflow-hidden overflow-ellipsis whitespace-nowrap text-violet-500 hover:text-sky-500">
                        {{ $movie->name }}
                    </h3>
                    <h4
                        class="text-sm max-w-md overflow-hidden overflow-ellipsis whitespace-nowrap text-gray-500 dark:text-gray-200">
                        {{ $movie->origin_name }}
                    </h4>
                </a>
            </div>
        </div>
    </td>
    <td class="px-3 py-4 whitespace-nowrap">
        <span
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-green-700 dark:bg-slate-900 dark:text-green-400">
            {{ $movie->episode_current }}
        </span>
    </td>
    <td class="px-3 py-4 whitespace-nowrap">
        @if ($movie->type == 'series')
            <div class="text-sm text-violet-500 dark:text-slate-100 leading-5 rounded-full mb-2 px-2 text-center">Phim
                bộ</div>
        @else
            <div class="text-sm text-violet-500 dark:text-slate-100 leading-5 rounded-full mb-2 px-2 text-center">Phim
                Lẻ</div>
        @endif
    </td>
    <td class="px-3 py-4 whitespace-nowrap">
        <div class="text-sm text-violet-500 dark:text-slate-100 leading-5 rounded-full mb-2 px-2 text-center">
            {{ $movie->publish_year }}</div>
    </td>
    <td class="px-3 py-4 whitespace-nowrap">
        {!! $movie->regions->map(function ($region) {
                return '<div class="text-sm text-violet-500 dark:text-slate-100 leading-5 rounded-full mb-2 px-2 text-center" >' . $region->name . '</div>';
            })->implode('') !!}
    </td>
    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $movie->updated_at }}</td>
</tr>
