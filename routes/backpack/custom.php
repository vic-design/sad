<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    Route::crud('page', 'PageCrudController');
    Route::crud('article', 'ArticleCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::get('gallery', 'GalleryController@index');
}); // this should be the absolute last line of this file
