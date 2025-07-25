<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CampignController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\InspirasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesBrandController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ZakatController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $now = now();
    $yesterday = $now->copy()->subDay();
    $lastMonth = $now->copy()->subMonth();
    $lastYear = $now->copy()->subYear();

    // Hitung total donasi sebelumnya untuk perbandingan
    $donasi_kemarin = DB::table('transaksis')
        ->whereNotNull('order_id')
        ->where('status', 'settlement')
        ->whereDate('created_at', $yesterday->toDateString())
        ->sum('nominal');

    $donasi_bulan_lalu = DB::table('transaksis')
        ->whereNotNull('order_id')
        ->where('status', 'settlement')
        ->whereYear('created_at', $lastMonth->year)
        ->whereMonth('created_at', $lastMonth->month)
        ->sum('nominal');

    $donasi_tahun_lalu = DB::table('transaksis')
        ->whereNotNull('order_id')
        ->where('status', 'settlement')
        ->whereYear('created_at', $lastYear->year)
        ->sum('nominal');

    // Ambil data utama
    $data = DB::table('transaksis')
        ->selectRaw("
            SUM(CASE WHEN status = 'settlement' AND tipe_zakat = 'PROFESI' THEN nominal ELSE 0 END) as zakat_profesi,
            SUM(CASE WHEN status = 'settlement' AND tipe_zakat = 'SIMPANAN' THEN nominal ELSE 0 END) as zakat_simpanan,
            SUM(CASE WHEN status = 'settlement' AND tipe_zakat = 'PERDAGANGAN' THEN nominal ELSE 0 END) as zakat_perdagangan,
            SUM(CASE WHEN status = 'settlement' AND tipe_zakat = 'EMAS' THEN nominal ELSE 0 END) as zakat_emas,

            SUM(CASE WHEN status = 'settlement' AND order_id IS NOT NULL AND DATE(created_at) = ? THEN nominal ELSE 0 END) as donasi_hari_ini,
            SUM(CASE WHEN status = 'settlement' AND order_id IS NOT NULL AND DATE_FORMAT(created_at, '%Y-%m') = ? THEN nominal ELSE 0 END) as donasi_bulan_ini,
            SUM(CASE WHEN status = 'settlement' AND order_id IS NOT NULL AND YEAR(created_at) = ? THEN nominal ELSE 0 END) as donasi_tahun_ini
        ", [
            $now->toDateString(),
            $now->format('Y-m'),
            $now->year,
        ])
        ->first();

    // Fungsi bantu hitung persentase perubahan
    function calculateChange($now, $before)
    {
        if ($before == 0) return null;
        return round((($now - $before) / $before) * 100, 2);
    }

    // Kelompokkan data ke array terstruktur
    $datas = [
        'donasi' => [
            [
                'label' => 'Donasi Campaign Hari Ini',
                'value' => $data->donasi_hari_ini,
                'icon' => 'mdi-chart-line',
                'change' => calculateChange($data->donasi_hari_ini, $donasi_kemarin)
            ],
            [
                'label' => 'Donasi Campaign Bulan Ini',
                'value' => $data->donasi_bulan_ini,
                'icon' => 'mdi-bookmark-outline',
                'change' => calculateChange($data->donasi_bulan_ini, $donasi_bulan_lalu)
            ],
            [
                'label' => 'Donasi Campaign Tahun Ini',
                'value' => $data->donasi_tahun_ini,
                'icon' => 'mdi-calendar',
                'change' => calculateChange($data->donasi_tahun_ini, $donasi_tahun_lalu)
            ],
        ],
        'zakat' => [
            ['label' => 'Total Zakat Profesi', 'value' => $data->zakat_profesi],
            ['label' => 'Total Zakat Simpanan', 'value' => $data->zakat_simpanan],
            ['label' => 'Total Zakat Perdagangan', 'value' => $data->zakat_perdagangan],
            ['label' => 'Total Zakat Emas', 'value' => $data->zakat_emas],
        ]
    ];

    return view('component.dashboard', compact('datas'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/laravel', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/hero', [TestController::class, 'index'])->name('hero');
    Route::get('/campign', function () {
        return view('component.campign');
    });
    Route::get('/services-brand', function () {
        return view('component.services');
    });
    Route::get('/services-card', function () {
        return view('component.services-card');
    });
    Route::get('/berita', function () {
        return view('component.berita');
    });
    Route::get('/inspirasi', function () {
        return view('component.inspirasi');
    });
    Route::get('/message-user', function () {
        return view('component.message');
    });
    Route::get('/zakat-profesi', function () {
        return view('component.zakat-profesi');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('logout', [LoginController::class, 'logout']);
Route::get('register', [RegisteredUserController::class, 'create']);

Route::resource('heroAjax', HeroController::class);
Route::resource('beritaAjax', BeritaController::class);
Route::resource('inspirasiAjax', InspirasiController::class);
Route::resource('servicesAjax', ServicesController::class);
Route::resource('servicesBrandAjax', ServicesBrandController::class);
Route::resource('messageAjax', MessageController::class);
Route::resource('campignAjax', CampignController::class);
Route::resource('zakatAjax', ZakatController::class);


require __DIR__ . '/auth.php';
