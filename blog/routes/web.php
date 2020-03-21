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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('cms.dashboard.index');
});

Route::get('/login', 'Autentikasi\LoginController@login')->name('login');
Route::post('/login-masuk', 'Autentikasi\LoginController@loginMasuk')->name('login-masuk');
Route::get('/registrasi', 'Autentikasi\LoginController@registrasi')->name('registrasi');
//CRUD Artikel

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'Autentikasi\LoginController@logout')->name('logout');

    Route::prefix('manajemen-pengguna')->group(function () {

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

    Route::middleware(['operator'])->prefix('kegiatan')->group(function () {
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

    Route::prefix('profile')->group(function () {
        Route::get('/', 'ProfileController@index')->name('profile.index');    //nampilin list artikel table
        Route::get('/buat', 'ProfileController@create')->name('profile.create');    //nampilin form tambah artikel
        Route::post('/simpan', 'ProfileController@store')->name('profile.store');   //simpan data artikel ke db
        Route::get('/edit/{id}', 'ProfileController@edit')->name('profile.edit'); //nampilin form edit artikel
        Route::post('/ubah/{id}', 'ProfileController@update')->name('profile.update');   //ubah data artikel ke db
        Route::get('/hapus/{id}', 'ProfileController@destroy')->name('profile.delete');  //hapus data artikel
    });
});

// //Route::resource('articles', 'ArtikelController');
// Route::get('/articles/buat', 'ArtikelController@create');
// Route::post('/articles/buat', 'ArtikelController@store')->name('articles.store');
// //  Route::put('/articles/{id}', 'ArtikelController@edit'
// Route::delete('/home/{id}','ArtikelController@destroy')->name('articles.destroy');
// Route::get('/articles/show/{id}','ArtikelController@show')->name('articles.show');;
// Route::get('/artikel', function () {
//     return view('cms.article.index');
// });

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
