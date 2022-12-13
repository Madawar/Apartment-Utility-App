<?php

use App\Http\Controllers\ProfileController;
use App\Models\House;
use App\Models\Utility;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return Inertia('Houses', [
        'houses' => House::paginate(5)->through(function ($house) {
            return [
                'id' => $house->id,
                'house_number' => $house->house_number,
                'tenant' => $house->tenant->name,
                'remarks' => $house->remarks,
                'status' => "Status",
                'created_at' => $house->created_at,
                'updated_at' => $house->updated_at,
            ];
        }),
    ]);
});

Route::get('/tenants', function () {
    return Inertia('Tenants');
});

Route::get('/bills', function () {

    return Inertia('Bills');
});

Route::get('house/reading/{id}', function () {

    return Inertia('Reading', [
        'utilities' => Utility::all(),
    ]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
