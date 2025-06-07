<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;



Route::middleware('guest')->group(function () {
    Route::get('/termos', [SiteController::class, 'termos'])->middleware('permission:ver_termos')->name('termos');
    Route::post('/aceitar-termos', [SiteController::class, 'aceitarTermos'])->middleware('permission:aceitar_termos')->name('aceitar.termos');
    Route::get('/contrato', [SiteController::class, 'contrato'])->middleware('permission:ver_contrato')->name('contrato');
    Route::get('/fale-conosco', [SiteController::class, 'faleConosco'])->middleware('permission:fale_conosco')->name('fale.conosco');
});
