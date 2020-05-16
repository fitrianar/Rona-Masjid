<?php
   
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
//test


//routing buat user
Route::get('/', 'HomePageController@index')->name('index');
Route::get('/tentang-kami', 'HomePageController@tentangKami')->name('tentang-kami');
Route::get('/kontak', 'HomePageController@kontak')->name('kontak');
Route::post('/tambah-kontak', 'HomePageController@storeKontak')->name('store-kontak');
Route::post('/subscribe', 'BerlanggananController@store')->name('berlangganan-store');

Route::prefix('kegiatan')->group(function () { 
    Route::get('/', 'HomePageController@kegiatanIndex')->name('public-kegiatan-index');
    Route::get('/detail/{id}', 'HomePageController@kegiatanDetail')->name('public-detail-kegiatan'); //nampilin form edit artikel

});



Route::prefix('artikel')->group(function () { 
    Route::get('/', 'HomePageController@artikelIndex')->name('public-artikel-index');
    Route::get('/detail/{id}', 'HomePageController@artikelDetail')->name('public-detail-artikel');
});

Route::prefix('masjid')->group(function () { //belum
    Route::get('/', 'HomePageController@masjidIndex')->name('public-masjid-index');
    Route::get('/detail/{id}', 'HomePageController@masjidDetail')->name('public-detail-masjid');
});



Route::get('/login', 'Autentikasi\LoginController@login')->name('login');
Route::post('/login-masuk', 'Autentikasi\LoginController@loginMasuk')->name('login-masuk');
Route::get('/registrasi', 'Autentikasi\LoginController@registrasi')->name('registrasi');
Route::post('/registrasi-pengurus-store', 'Autentikasi\LoginController@storeRegistrasiPengurus')->name('registrasi-pengurus-store');
Route::get('/verifikasi-email/{email}', 'Autentikasi\LoginController@verifikasiAkun')->name('registrasi-pengurus-verifikasi');

//selesai



//Data routing CMS
Route::prefix('adminpanel')->group(function () {

    Route::group(['middleware' => 'auth'], function () {
        Route::post('/logout', 'Autentikasi\LoginController@logout')->name('logout');
        Route::get('/logou-v2', 'Autentikasi\LoginController@logout')->name('logout-v2');

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::prefix('profile')->group(function () {
            Route::get('/', 'ProfileController@index')->name('profile-index');
            Route::post('/update/{id}', 'ProfileController@update')->name('profile.update');    
            Route::get('/ubah-password', 'ProfileController@editPassword')->name('profile-edit-password');
            Route::post('/update-password/{id}', 'ProfileController@updatePassword')->name('profile-update-password');    
        });

        Route::middleware(['admin'])->prefix('hubungi-kami')->group(function () {
            Route::get('/', 'HubungiKamiController@index')->name('hubungi-kami-index');
            Route::get('/datatables', 'HubungiKamiController@datatables')->name('hubungi-kami-datatables');
            Route::get('/{id}/balas', 'HubungiKamiController@balas')->name('hubungi-kami-balas');
            Route::post('/{id}/balas-pesan', 'HubungiKamiController@postBalas')->name('hubungi-kami-balas-post');

        });

        Route::middleware(['admin'])->prefix('manajemen-pengguna')->group(function () {

            Route::prefix('pengurus')->group(function () {
                Route::get('/', 'PengurusController@index')->name('pengurus.index');    //nampilin list artikel table
                Route::get('/buat', 'PengurusController@create')->name('pengurus.create');    //nampilin form tambah artikel
                Route::post('/simpan', 'PengurusController@store')->name('pengurus.store');   //simpan data artikel ke db
                Route::get('/edit/{id}', 'PengurusController@edit')->name('pengurus.edit'); //nampilin form edit artikel
                Route::post('/ubah/{id}', 'PengurusController@update')->name('pengurus.update');   //ubah data artikel ke db
                Route::get('/hapus/{id}', 'PengurusController@destroy')->name('pengurus.delete');  //hapus data artikel
            });

            Route::prefix('member')->group(function () {
                Route::get('/', 'MemberController@index')->name('member.index');    //nampilin list artikel table
                Route::get('/buat', 'MemberController@create')->name('member.create');    //nampilin form tambah artikel
                Route::post('/simpan', 'MemberController@store')->name('member.store');   //simpan data artikel ke db
                Route::get('/edit/{id}', 'MemberController@edit')->name('member.edit'); //nampilin form edit artikel
                Route::post('/ubah/{id}', 'MemberController@update')->name('member.update');   //ubah data artikel ke db
                Route::get('/hapus/{id}', 'MemberController@destroy')->name('member.delete');  //hapus data artikel
                
            });
        });

        Route::prefix('masjid')->group(function () {
            Route::get('/', 'MasjidController@index')->name('masjid.index');    //nampilin list artikel table
            Route::get('/buat', 'MasjidController@create')->name('masjid.create');    //nampilin form tambah artikel
            Route::post('/simpan', 'MasjidController@store')->name('masjid.store');   //simpan data artikel ke db
            Route::get('/edit/{id}', 'MasjidController@edit')->name('masjid.edit'); //nampilin form edit artikel
            Route::post('/ubah/{id}', 'MasjidController@update')->name('masjid.update');   //ubah data artikel ke db
            Route::get('/hapus/{id}', 'MasjidController@destroy')->name('masjid.delete');  //hapus data artikel
        });

        Route::prefix('artikel')->group(function () {
            Route::get('/', 'ArtikelController@index')->name('article.index');    //nampilin list artikel table
            Route::get('/datatables', 'ArtikelController@datatables')->name('article.datatables');
            Route::get('/buat', 'ArtikelController@create')->name('article.create');    //nampilin form tambah artikel
            Route::post('/simpan', 'ArtikelController@store')->name('article.store');   //simpan data artikel ke db
            Route::get('/edit/{id}', 'ArtikelController@edit')->name('article.edit'); //nampilin form edit artikel
            Route::post('/ubah/{id}', 'ArtikelController@update')->name('article.update');   //ubah data artikel ke db
            Route::get('/hapus/{id}', 'ArtikelController@destroy')->name('article.delete');  //hapus data artikel
        });

        Route::prefix('kegiatan')->group(function () {
            Route::get('/', 'KegiatanController@index')->name('kegiatan.index');    //nampilin list artikel table
            Route::get('/buat', 'KegiatanController@create')->name('kegiatan.create');    //nampilin form tambah artikel
            Route::post('/simpan', 'KegiatanController@store')->name('kegiatan.store');   //simpan data artikel ke db
            Route::get('/edit/{id}', 'KegiatanController@edit')->name('kegiatan.edit'); //nampilin form edit artikel
            Route::post('/ubah/{id}', 'KegiatanController@update')->name('kegiatan.update');   //ubah data artikel ke db
            Route::get('/hapus/{id}', 'KegiatanController@destroy')->name('kegiatan.delete');  //hapus data artikel
        });

        Route::prefix('kategori')->group(function () {
            Route::get('/fetch', 'KategoriController@fetch')->name('kategori-fetch');
            Route::get('/fetch-all', 'KategoriController@fetchAll')->name('kategori-fetch-all');
        });

        Route::middleware(['operator'])->prefix('fasilitas')->group(function () {
            Route::get('/', 'FasilitasController@index')->name('fasilitas.index');    //nampilin list artikel table
            Route::get('/buat', 'FasilitasController@create')->name('fasilitas.create');    //nampilin form tambah artikel
            Route::post('/simpan', 'FasilitasController@store')->name('fasilitas.store');   //simpan data artikel ke db
            Route::get('/edit/{id}', 'FasilitasController@edit')->name('fasilitas.edit'); //nampilin form edit artikel
            Route::post('/ubah/{id}', 'FasilitasController@update')->name('fasilitas.update');   //ubah data artikel ke db
            Route::get('/hapus/{id}', 'FasilitasController@destroy')->name('fasilitas.delete');  //hapus data artikel
        });

        Route::prefix('profile-masjid')->group(function () {
            Route::get('/', 'ProfileMasjidController@index')->name('profile-masjid.index');    //nampilin list artikel table
            Route::post('/update/{id}', 'ProfileMasjidController@update')->name('profile-masjid.update');   //simpan data artikel ke db
        });
    });

});


// Auth::routes();

