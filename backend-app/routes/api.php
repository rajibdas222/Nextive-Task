<?php

    use App\Http\Controllers\API\AuthController;
    use App\Http\Controllers\API\BlogPostController;
    use App\Http\Controllers\API\CategoryController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::get('lists', [BlogPostController::class,'index']);

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('get_user', [AuthController::class, 'get_user']);
        Route::apiResource('posts', BlogPostController::class);
        Route::apiResource('categories', CategoryController::class);
    });
