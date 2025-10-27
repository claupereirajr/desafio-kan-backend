<?php

use App\Http\Controllers\BeneficiarioController;
use App\Models\Beneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('beneficiarios', BeneficiarioController::class);
