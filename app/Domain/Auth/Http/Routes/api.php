<?php

Route::post('/', 'LoginController');
Route::post('with-{provider}', 'LoginWithProviderController');
Route::post('register', 'RegisterController');
