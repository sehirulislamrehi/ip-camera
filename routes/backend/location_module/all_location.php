<?php

use App\Http\Controllers\Backend\LocationModule\Location\LocationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'all-location'], function(){

    //index
    Route::get("",[LocationController::class,"index"])->name("all.location");

    //data
    Route::get("data",[LocationController::class,"data"])->name("location.data");

    //add modal
    Route::get("add-modal",[LocationController::class,"add_modal"])->name("location.add.modal");
    Route::post("add",[LocationController::class,"add"])->name("location.add");

    //edit modal
    Route::get("edit-modal/{id}",[LocationController::class,"edit_modal"])->name("location.edit.modal");
    Route::post("edit/{id}",[LocationController::class,"edit"])->name("location.edit");

}); 

?>