<?php

use App\Http\Controllers\NotifyController;
use Illuminate\Support\Facades\Route;
Route::prefix('notify')->group(function(){
    Route::get('',[NotifyController::class,'index'])->name('notify.index');
    Route::get('/add',[NotifyController::class,'addForm'])->name('notify.add');
    Route::post('/add',[NotifyController::class,'saveAdd']);
    Route::get('/remove/{id}',[NotifyController::class,'remove'])->name('notify.remove');
    Route::get('/edit/{id}',[NotifyController::class,'editForm'])->name('notify.edit');
    Route::post('/edit/{id}',[NotifyController::class,'saveEdit']);
})

?>