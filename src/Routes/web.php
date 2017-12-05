<?php

Route::namespace('Thuyennv\Showtimes')->as('showtimes::')->middleware('web')->group(function () {
    // Routes defined here have the web middleware applied
    // like the web.php file in a laravel project
    // They also have an applied controller namespace and a route names.

    Route::middleware('showtimes')->group(function () {
        // Routes defined here have the self-assigned middleware applied.
        // By default this middleware is empty.
    });
});
