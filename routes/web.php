<?php
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Route de test de connexion DB (temporaire)
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        $dbName = DB::connection()->getDatabaseName();
        
        // Vérifier si les tables existent
        $tables = DB::select('SHOW TABLES');
        
        return response()->json([
            'status' => 'Connexion réussie!',
            'database' => $dbName,
            'tables' => $tables,
            'host' => config('database.connections.mysql.host'),
            'port' => config('database.connections.mysql.port'),
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'Erreur de connexion',
            'error' => $e->getMessage(),
            'host' => config('database.connections.mysql.host'),
            'port' => config('database.connections.mysql.port'),
        ], 500);
    }
});

Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::get('/about', [EventController::class, 'about'])->name('about');

Route::middleware(['auth'])->group(function () {
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

require __DIR__.'/auth.php';