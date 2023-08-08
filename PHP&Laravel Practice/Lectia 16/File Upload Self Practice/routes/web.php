<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

route::get('/', [FileController::class, "Index"]);

route::get('/add_file', [FileController::class, "StoreFilesForm"]);

route::post('/add_file', [FileController::class, "StoreFiles"]);