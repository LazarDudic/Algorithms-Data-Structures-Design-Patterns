<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Forum\Actions\CreateTopicAction;


Route::post('/topics', CreateTopicAction::class);



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
