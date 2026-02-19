    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\FormController;
    use App\Http\Controllers\CategoriController;
    use App\Http\Controllers\ProdukController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\TransaksiController;

    Route::get('/', [DashboardController::class, 'theFirst'])->name('theFirst')->middleware('auth');

    Route::get('/profile', [ProfileController::class, 'setProfile'])->middleware('auth');
    Route::put('/profile', [ProfileController::class, 'update'])->middleware('auth');
    Route::post('/profile', [ProfileController::class, 'store'])->middleware('auth');

    Route::middleware(['auth', 'admin'])->group(function () {
        //C
        Route::get('/category/create', [CategoriController::class, 'create']);
        Route::post('/category', [CategoriController::class, 'insert']);

        //R
        Route::get('/category', [CategoriController::class, 'index']);
        Route::get('/category/{id}', [CategoriController::class, 'show']);

        //U
        Route::get('/category/{id}/edit', [CategoriController::class, 'edit']);
        Route::put('/category/{id}', [CategoriController::class, 'update']);

        //D
        Route::delete('/category/{id}', [CategoriController::class, 'del']);
    });

    Route::get('/master', function() {
        return view('layout.master');
    });

    //PRODUCT (ORM)
    Route::resource('product', ProdukController::class);

    Route::middleware(['guest'])->group(function () {
        //auth regis
        Route::get('/register', [AuthController::class, 'fregister']);
        Route::post('/register', [AuthController::class, 'register']);
        
        //login
        Route::get('/login', [AuthController::class, 'flogin']);
        Route::post('/login', [AuthController::class, 'login'])->name('login');
    });

    //logout
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware(['auth'])->group(function () {
        //list transaksi
        Route::get('/transaksi', [TransaksiController::class, 'index']);
        Route::get('/transaksi/create', [TransaksiController::class, 'create']);
        Route::post('/transaksi', [TransaksiController::class, 'masuk']);

        Route::put('/transaksi/{id}', [TransaksiController::class, 'update']);
    });
