<?php

use Illuminate\Support\Facades\Route;
use Ophim\ThemeOphimtv\Controllers\ThemeOphimtvController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
    ),
], function () {
    Route::get('/', [ThemeOphimtvController::class, 'index']);

    Route::get('/ajax-list-ep', [ThemeOphimtvController::class, 'getListEpisodeAjax'])
        ->name('movies.ajax_list_ep');


    Route::get('/playeropt', [ThemeOphimtvController::class, 'getPlayerOptAjax'])
        ->name('movies.ajax_playeropt');

    Route::get(setting('site_routes_category', '/the-loai/{category}'), [ThemeOphimtvController::class, 'getMovieOfCategory'])
        ->where(['category' => '.+', 'id' => '[0-9]+'])
        ->name('categories.movies.index');

    Route::get(setting('site_routes_region', '/quoc-gia/{region}'), [ThemeOphimtvController::class, 'getMovieOfRegion'])
        ->where(['region' => '.+', 'id' => '[0-9]+'])
        ->name('regions.movies.index');

    Route::get(setting('site_routes_tag', '/tu-khoa/{tag}'), [ThemeOphimtvController::class, 'getMovieOfTag'])
        ->where(['tag' => '.+', 'id' => '[0-9]+'])
        ->name('tags.movies.index');

    Route::get(setting('site_routes_types', '/danh-sach/{type}'), [ThemeOphimtvController::class, 'getMovieOfType'])
        ->where(['type' => '.+', 'id' => '[0-9]+'])
        ->name('types.movies.index');

    Route::get(setting('site_routes_actors', '/dien-vien/{actor}'), [ThemeOphimtvController::class, 'getMovieOfActor'])
        ->where(['actor' => '.+', 'id' => '[0-9]+'])
        ->name('actors.movies.index');

    Route::get(setting('site_routes_directors', '/dao-dien/{director}'), [ThemeOphimtvController::class, 'getMovieOfDirector'])
        ->where(['director' => '.+', 'id' => '[0-9]+'])
        ->name('directors.movies.index');

    Route::get(setting('site_routes_episode', '/phim/{movie}/{episode}-{id}'), [ThemeOphimtvController::class, 'getEpisode'])
        ->where(['movie' => '.+', 'movie_id' => '[0-9]+', 'episode' => '.+', 'id' => '[0-9]+'])
        ->name('episodes.show');

    Route::post(sprintf('/%s/{movie}/{episode}/report', config('ophim.routes.movie', 'phim')), [ThemeOphimtvController::class, 'reportEpisode'])->name('episodes.report');
    Route::post(sprintf('/%s/{movie}/rate', config('ophim.routes.movie', 'phim')), [ThemeOphimtvController::class, 'rateMovie'])->name('movie.rating');

    Route::get(setting('site_routes_movie', '/phim/{movie}'), [ThemeOphimtvController::class, 'getMovieOverview'])
        ->where(['movie' => '.+', 'id' => '[0-9]+'])
        ->name('movies.show');
    Route::get('/search/{search}', [ThemeOphimtvController::class, 'search'])->name('search');
    Route::get('/api-document', [ThemeOphimtvController::class, 'document'])->name('document');
    Route::get('/khieu-nai-ban-quyen', [ThemeOphimtvController::class, 'copyright'])->name('copyright');
    Route::get('/gioi-thieu', [ThemeOphimtvController::class, 'about'])->name('about');
    Route::get('/api/danh-sach/phim-moi-cap-nhat', [ThemeOphimtvController::class, 'phimMoiCapNhat']);
    Route::get('/api/phim/{slug}', [ThemeOphimtvController::class, 'getPhimBySlug']);

    // Add API routes for countries and categories
    Route::get('/api/quoc-gia', [ThemeOphimtvController::class, 'getQuocGia']);
    Route::get('/api/the-loai', [ThemeOphimtvController::class, 'getTheLoai']);
});
