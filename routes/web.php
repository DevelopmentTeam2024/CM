<?php

// use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QutationController;
use App\Http\Controllers\WorkorderController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::redirect('/', 'inquiries');
Route::redirect('/dashboard', 'inquiries');


Route::middleware('auth')->group(function () {

    Route::get('/reports/generate', [ReportController::class, 'showForm'])->name('reports.form');
    Route::get('/reports/export', [ReportController::class, 'exportReport'])->name('reports.export');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('inquiries', controller: OrderController::class);
    Route::post('inquiries/create', [OrderController::class, 'store']);
    Route::get('inquiries/{inquiry}/{action}', [OrderController::class, 'getAction']);
    Route::post('inquiries/{inquiry}/current_status', [OrderController::class, 'currentStatus']);
    Route::resource('users', controller: UserController::class);
    Route::get('getCustomer/{code}', [OrderController::class, 'getCustomer']);
    Route::get('reports/tsr', [OrderController::class, 'getReport']);
    Route::post('reports/tsr', [OrderController::class, 'getReport']);

    Route::resource('projects', controller: ProjectController::class);

    Route::get('qutations', [QutationController::class, 'index']);
    Route::post('qutations/{order_id}', [QutationController::class, 'store']);
    Route::get('qutations/{qutation}', [QutationController::class, 'show']);
    Route::post('qutations/{qutation}', [QutationController::class, 'update']);
    Route::put('qutations/{qutation}', [QutationController::class, 'create']);

    Route::get('workorders', [WorkorderController::class, 'index']);

    Route::get('aiTest', function () {
        $ai = new App\Services\AIServices();
        $output = $ai->convertDescription('Hello');
        return response()->json(['converted_description' => $output]);
    });

    Route::get('artisan', function () {
        return view('artisan', ['result' => null]);
    });

    Route::post('artisan', function () {
        $command = Request::input('command');

        $exitCode = Artisan::call($command);

        $result = Artisan::output();

        return view('artisan', ['result' => $result, 'exitCode' => $exitCode]);
    });
});
require __DIR__ . '/auth.php';
