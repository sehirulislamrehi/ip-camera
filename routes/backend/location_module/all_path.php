<?php

use App\Http\Controllers\Backend\LocationModule\Path\PathController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'all-path'], function(){

    //index
    Route::get("",[PathController::class,"index"])->name("path.all");

    //data
    Route::get("data",[PathController::class,"data"])->name("path.data");

    //add modal
    Route::get("add-modal",[PathController::class,"add_modal"])->name("path.add.modal");
    Route::post("add",[PathController::class,"add"])->name("path.add");

});

?>