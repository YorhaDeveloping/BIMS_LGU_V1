<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CTRLbuilding;
use App\Http\Controllers\Admin\CTRLrooms;
use App\Http\Controllers\Admin\CTRLmntnns;
use App\Http\Controllers\Admin\MapCtrl;
use App\Models\building;
use App\Models\room;
use App\Models\Admin\Maintenance;
use App\Http\Controllers\Admin\MetadataController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Users\CTRLMaintenance;
use App\Http\Controllers\CTRLReports;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route for the landing page
Route::get('/', function () {
    return view('welcome');
});



// redirects to specific dashboard based on the role of the user
Route::get('/dashboard', function () {
    if(Auth::user()->roles[0]->name == "admin")
    {
       // return Auth::user()->roles[0]->name;
        return view('admin.dashboard');
    }
    else
    {
        // return Auth::user()->roles[0]->name;
        return view('users.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::namespace('App\Http\Controllers')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function(){
Route::get('/reports', [CTRLReports::class, 'index'])->name('reports');
    Route::get('/reports/export', [CTRLReports::class, 'exportReports'])->name('reports.export');
});

// admin routes here
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function(){

    // add routes here for admin
    Route::resource('/users','UserController',['except' => ['create','store','destroy']]);

    //route for building
    Route::resource('building', 'CTRLbuilding');
    Route::get('/admin/bldg/create', [CTRLbuilding::class, 'create'])->name('admin.building.create');
    Route::get('/admin/building', [CTRLbuilding::class, 'index'])->name('admin.building.index');
    Route::get('/admin/bldg/{building}/edit', [CTRLbuilding::class, 'edit'])->name('admin.building.edit');
    Route::post('/building/store', [CTRLbuilding::class, 'store'])->name('admin.building.store');
    Route::get('admin/admin/building/search', [CTRLbuilding::class, 'search'])->name('admin.building.search');

    Route::post('/maintenance/{id}/approve', [CTRLmntnns::class, 'approve'])->name('maintenance.approve');
    Route::post('/maintenance/{id}/complete', [CTRLmntnns::class, 'complete'])->name('maintenance.complete');
    Route::post('/maintenance/{id}/reject', [CTRLmntnns::class, 'reject'])->name('maintenance.reject');
    Route::post('/building/{id}/archive', [CTRLbuilding::class, 'archive'])->name('building.archive');
    Route::post('/building/{id}/unarchive', [CTRLbuilding::class, 'unarchive'])->name('building.unarchive');


    Route::get('/building/{id}', [CTRLbuilding::class, 'show'])->name('building.show');

    //route for room
    Route::resource('room', 'CTRLrooms');
    Route::get('/admin/room', [CTRLrooms::class, 'create'])->name('admin.room.create');
    Route::get('/admin/room', [CTRLrooms::class, 'index'])->name('admin.room.index');



    //route for maintenance

    Route::get('/chart-data', 'ChartController@getData');

    Route::resource('maintenance', 'CTRLmntnns');
     Route::get('/maintenance/create', [CTRLmntnns::class, 'create'])->name('maintenance.create');
    Route::post('/maintenance', [CTRLmntnns::class, 'store'])->name('maintenance.store');
    Route::get('/maintenance/{id}', [CTRLmntnns::class, 'show'])->name('maintenance.show');
    Route::get('/maintenance/{id}/edit', [CTRLmntnns::class, 'edit'])->name('maintenance.edit');
    Route::put('/maintenance/{id}', [CTRLmntnns::class, 'update'])->name('maintenance.update');
    Route::get('/ongoing', [CTRLmntnns::class, 'ongoing'])->name('maintenance.ongoing');
    // Route::delete('/maintenance/{id}', [CTRLmntnns::class, 'destroy'])->name('maintenance.destroy');


    Route::get('/calendar', [CalendarController::class, 'index'])->name('admin.calendar.index');
    Route::get('/calendar/day/{day}', [CalendarController::class, 'clickDay'])->name('calendar.click');

    //MAP VIEW BUILDING LOCATOR
    Route::get('/map', [MapCtrl::class, 'map'])->name('map');

});


// users routes here
Route::namespace('App\Http\Controllers\Users')->prefix('users')->name('users.')->middleware('can:user-access')->group(function(){
    Route::resource('maintenance', 'CTRLMaintenance');
    Route::get('/maintenance/create', [CTRLMaintenance::class, 'create'])->name('maintenance.create');
   Route::post('/maintenance', [CTRLMaintenance::class, 'store'])->name('maintenance.store');
   Route::get('/maintenance/{id}', [CTRLMaintenance::class, 'show'])->name('maintenance.show');
   Route::get('/maintenance/{id}/edit', [CTRLMaintenance::class, 'edit'])->name('maintenance.edit');
   Route::put('/maintenance/{id}', [CTRLMaintenance::class, 'update'])->name('maintenance.update');
    Route::delete('/maintenance/{id}', [CTRLMaintenance::class, 'destroy'])->name('maintenance.destroy');
});

require __DIR__.'/auth.php';



