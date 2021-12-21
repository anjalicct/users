<?php

use Illuminate\Support\Facades\Route;
use Anjalicct\User\controllers\UsersController;

    Route::resource('users', UsersController::class);

?>