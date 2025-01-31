<?php

use BondarDe\Lox\Http\Controllers\TinyMceFilesController;
use BondarDe\Lox\Http\Controllers\Web\Sso\SsoCallbackController;
use BondarDe\Lox\Http\Controllers\Web\Sso\SsoRedirectController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features as FortifyFeatures;

if (FortifyFeatures::enabled('sso')) {
    Route::group(['middleware' => ['web']], function () {
        Route::get('login/{provider}', SsoRedirectController::class)->name('sso.redirect');
        Route::any('login/{provider}/callback', SsoCallbackController::class)->name('sso.callback')
            ->withoutMiddleware(VerifyCsrfToken::class);
    });
}
Route::get('tinymce/{file}', TinyMceFilesController::class)->where('file', '.*');
