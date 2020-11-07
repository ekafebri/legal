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


Auth::routes();
Route::namespace('Landing')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::get('blog', 'HomeController@blog');
    Route::get('blog/event/{id}', 'HomeController@event');
    Route::get('blog/artikel/{id}', 'HomeController@artikel');
});
Route::namespace('Auth')->group(function () {
    Route::get('core', 'LoginController@index')->name('log');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('register', 'RegisterController@create')->name('register');
    Route::get('logout', 'LoginController@logout')->name('logout');
});
Route::middleware('auth:admin')->middleware('admin')->group(function () {
    // home
    Route::post('chart', 'HomeController@getDataChart')->name('chart');
    Route::post('chartmonth', 'HomeController@getDataChartMonth')->name('chartmonth');
    Route::get('home', 'HomeController@index')->name('home');
    // user
    Route::resource('admin', 'AdminController');
    Route::post('change/{admin}', 'AdminController@change')->name('change-password');
    Route::post('change/{user}', 'AdminController@change')->name('change-password');
    // client
    Route::resource('user-client', 'UserController');
    Route::get('client-konfirmasi', 'UserController@confirm');
    Route::get('client-konfirmasi/detail/{id}', 'UserController@confirmDetail');
    Route::post('user-client/terima/{id}', 'UserController@terima');
    Route::post('user-client/tolak/{id}', 'UserController@tolak');
    // perusahaan
    Route::resource('user-perusahaan', 'UserController');
    // lawyer
    Route::resource('user-lawyer', 'UserController');
    Route::get('pengajuan-lawyer', 'UserController@membership');
    Route::get('pengajuan-lawyer/detail/{id}', 'UserController@showmember');
    Route::get('user-lawyer/service/{user}', 'UserController@service');
    // notaris
    Route::resource('user-notaris', 'UserController');
    Route::get('user-notaris/filled/{user}', 'UserController@viewFilled');
    Route::put('user-notaris/filled/{user}', 'UserController@filled');
    Route::get('user-notaris/service/{user}', 'UserController@service');
    Route::put('user-layanan/update/{user}', 'UserController@serviceUpdate');
    // kantor hukum
    Route::resource('user-kantor-hukum', 'UserController');
    Route::get('user-kantor-hukum/service/{user}', 'UserController@service');
    // lawyer all in one
    Route::post('service-delete/{user}', 'UserController@deleteService');
    Route::post('service-add/{user}', 'UserController@addService');
    // search
    Route::get('user/cari', 'UserController@cari');
    Route::get('user/cari', 'UserController@cari');
    Route::get('user-client/cari', 'UserController@cari');
    Route::get('user-lawyer/cari', 'UserController@cari');
    Route::get('user-notaris/cari', 'UserController@cari');
    // service
    Route::resource('service', 'ServiceController');
    Route::resource('layanan', 'LayananController');
    Route::resource('pendampingan', 'PendampinganController');
    // kategori
    Route::resource('kategori-client', 'KategoriController');
    Route::resource('kategori-lawyer', 'KategoriController');
    // event
    Route::resource('events', 'EventsController');
    // slider
    Route::resource('slider-lawyer', 'SliderController');
    Route::resource('slider-client', 'SliderController');
    Route::resource('slider-iklan', 'SliderController');
    // settings
    Route::resource('privacy', 'PrivacyController');
    Route::resource('faq', 'FaqController');
    Route::resource('help', 'HelpController');
    Route::get('help-youtube/{id}/edit', 'HelpController@edit');
    Route::put('help-y-update/{id}', 'HelpController@updateYoutube');
    Route::resource('settings', 'SettingController');
    // artikel
    Route::resource('komentars', 'KomentarsController');
    Route::resource('chat', 'ChatController');
    Route::resource('artikel', 'ArtikelController');

    // peraturan
    Route::resource('peraturan', 'PeraturanController');
    Route::resource('peraturanDetail', 'PeraturanController');
    Route::post('peraturan-addfile/{id}', 'PeraturanController@addfile');
    Route::delete('peraturan-deleteFile/{params}/{id}', 'PeraturanController@deleteFile');
    // layanan
    Route::resource('tertulis', 'TertulisController');
    Route::resource('pendampingan', 'PendampinganController');
    Route::resource('konsultasi-history', 'KonsultasiController');
    Route::resource('konsultasi-ongoing', 'KonsultasiController');
    Route::resource('konsultasi-finish', 'KonsultasiController');
    Route::resource('pertemuan', 'PertemuanController');
    Route::resource('penawaran-lawyer', 'PenawaranController');
    Route::resource('penawaran-kantor', 'PenawaranController');
    Route::resource('legalitas', 'LegalitasController');
    Route::resource('mahkamahagung', 'MahkamahAgungController');
    // pembayaran
    Route::resource('pembayaran-berhasil', 'PembayaranController');
    Route::resource('pembayaran-pending', 'PembayaranController');
    Route::resource('pembayaran-expired', 'PembayaranController');
    // vicon
    Route::resource('vidcon', 'VidconController');
    Route::get('vicon', 'ViconController@index');
    Route::get('vicon/{vicon}', 'ViconController@show');
    Route::post('vicon/terima/{vicon}', 'ViconController@terima');
    Route::post('vicon/tolak/{vicon}', 'ViconController@tolak');
    // live chat
    Route::resource('report', 'ReportController');
    Route::get('download/{file}', 'ReportController@download');
    // change status
    Route::post('service/status/{service}', 'ServiceController@status');
    Route::post('slider/status/{slider}', 'SliderController@status');
    Route::post('kategori-client/status/{kategori}', 'KategoriController@statusClient');
    Route::post('kategori-lawyer/status/{kategori}', 'KategoriController@statusLawyer');
    Route::post('events/status/{events}', 'EventsController@status');
    Route::post('legalitas/status/{legalitas}', 'LegalitasController@status');
    Route::post('konsultasi/status/{konsultasi}', 'KonsultasiController@status');
    Route::post('artikel/status/{artikel}', 'ArtikelController@status');
    Route::post('peraturan/status/{peraturan}', 'PeraturanController@status');
    Route::post('penawaran/status/{penawaran}', 'PenawaranController@status');
    Route::post('pengajuan-lawyer/status/{user}', 'UserController@statuse');
    Route::post('user-client/status/{user}', 'UserController@status');
    Route::post('user-lawyer/status/{user}', 'UserController@status');
    Route::post('user-verified/{user}', 'UserController@verified');
});
Route::get('under', 'HomeController@under')->name('under');

Route::namespace('Advokat')->group(function () {
    Route::get('advokat', 'AuthController@index')->name('log-advokat');
    Route::post('advokat/login', 'AuthController@login');
    Route::get('advokat/register', 'AuthController@register');
    Route::post('advokat/register', 'AuthController@registerCreate');
    Route::get('advokat/forget', 'AuthController@forget');
    Route::post('advokat/forget', 'AuthController@forgetPost');
    Route::get('advokat/change/{email}/{token}', 'AuthController@change');
    Route::post('advokat/reset-password', 'AuthController@reset');
    Route::get('advokat/logout', 'AuthController@logout')->name('logout-advokat');
    Route::middleware('auth:users')->group(function () {
        Route::get('advokat/home', 'HomeController@index')->name('home-advokat');
        Route::get('advokat/kategori/{kategori}', 'HomeController@kategori');
        Route::get('advokat/sliderIklan/{id}', 'HomeController@sliderIklan');
        Route::get('advokat/sliderLawyer/{id}', 'HomeController@sliderLawyer');
        Route::get('advokat/detailArtikel/{id}', 'HomeController@detailArtikel');
        Route::get('advokat/event/{id}', 'HomeController@detailEvent');
        // layanan lawyer
        Route::get('advokat/legalitas/', 'HomeController@legalitas');
        Route::get('advokat/mahkamah-agung/', 'HomeController@mahkamahAgung');
        Route::get('advokat/peraturan/', 'HomeController@peraturan');
        Route::get('advokat/peraturan/{id}', 'HomeController@updatePeraturan');

        //nav-bar
        Route::get('advokat/pertanyaan', 'HomeController@pertanyaan');
        Route::get('advokat/pertanyaan/{id}', 'HomeController@detailPertanyaan');
        Route::get('advokat/riwayat', 'HomeController@riwayat');
        Route::get('advokat/profil', 'HomeController@profil');
        Route::get('advokat/update_profil', 'HomeController@update_profil');
        
        Route::get('advokat/bidang-hukum', 'HomeController@bidangHukum');
        Route::get('advokat/bidang-hukum/{id}', 'HomeController@edit');
        Route::post('advokat/edit_bidanghukum', 'HomeController@edit_bidanghukum');
        Route::get('advokat/FAQ', 'HomeController@FAQ');
        Route::get('advokat/bantuan', 'HomeController@bantuan');
        Route::get('advokat/kebijakan-privasi', 'HomeController@kebijakanPrivasi');

        //aktivitas
        Route::get('advokat/liveChat', 'HomeController@liveChat');
        Route::get('advokat/video-conference', 'HomeController@videoConference');
        Route::get('advokat/video-conference/{id}', 'HomeController@detailVideoConference');
        Route::get('advokat/artikel', 'HomeController@artikel');
        Route::get('advokat/artikel/{id}', 'HomeController@detailArtikelSaya');
        Route::get('advokat/pertemuan', 'HomeController@pertemuan');
        Route::get('advokat/pertemuan/{id}', 'HomeController@detailPertemuan');
        Route::get('advokat/report', 'HomeController@report');
        Route::get('advokat/pendampingan', 'HomeController@pendampingan');
        Route::get('advokat/pendampingan/{id}', 'HomeController@detailPendampingan');
        Route::get('advokat/tertulis', 'HomeController@tertulis');
        Route::get('advokat/tertulis/{id}', 'HomeController@detailTertulis');
        Route::get('advokat/tagihan', 'HomeController@tagihan');
        Route::get('advokat/buat-tagihan', 'HomeController@buatTagihan');
    });
});

Route::namespace('User')->group(function () {
    Route::get('client', 'AuthController@index')->name('log-client');
    Route::post('client/login', 'AuthController@login');
    Route::get('client/register', 'AuthController@register');
    Route::post('client/register', 'AuthController@registerPost');
    Route::get('client/forget', 'AuthController@forget');
    Route::post('client/forget', 'AuthController@forgetPost');
    Route::get('client/change/{email}/{token}', 'AuthController@change');
    Route::post('client/reset-password', 'AuthController@reset');
    Route::get('client/logout', 'AuthController@logout')->name('logout-client');
    Route::middleware('auth:users')->group(function () {
        Route::get('client/home', 'HomeController@index')->name('home-client');
        Route::get('client/profil', 'HomeController@profil');
        Route::get('client/update_profile', 'HomeController@update_profile');
        Route::get('client/riwayat', 'HomeController@riwayat');
        Route::get('client/FAQ', 'HomeController@FAQ');
        Route::get('client/bantuan', 'HomeController@bantuan');
        Route::get('client/kebijakan-privasi', 'HomeController@kebijakanPrivasi');
        Route::get('client/cari', 'HomeController@cari');

        //riwayat konsultasi
        Route::get('client/report', 'HomeController@report');
        Route::get('client/pendampingan', 'HomeController@pendampingan');
        Route::get('client/videoconference', 'HomeController@videoconference');
        Route::get('client/pertemuan', 'HomeController@pertemuan');
        Route::get('client/tertulis', 'HomeController@tertulis');
        Route::get('client/tagihan', 'HomeController@tagihan');

        // detail home
        Route::get('client/chat', 'HomeController@chat');
        Route::get('client/detail_artikel/{id}', 'HomeController@detail_artikel');
        Route::get('client/detail_event/{id}', 'HomeController@detail_event');
        Route::get('client/detail_hukum/{id}', 'HomeController@detail_hukum');
        Route::get('client/detail_iklan/{id}', 'HomeController@detail_iklan');
        Route::get('client/detail_client/{id}', 'HomeController@detail_slider_client');
        Route::get('client/detail_lawyer/{id}', 'HomeController@detail_lawyer');
        Route::get('client/detail_lawyer_online/{id}', 'HomeController@detail_lawyer_online');
        Route::get('client/detail_lawyer_probono', 'HomeController@detail_lawyer_probono');
        Route::get('client/detail_pembuatan_PT', 'HomeController@detail_pembuatan_PT');
        Route::get('client/live_chat', 'HomeController@live_chat');

        //layanan favorit
        Route::get('client/detail_probono', 'HomeController@detail_probono');
        Route::get('client/legalitas', 'HomeController@legalitas');
        Route::get('client/peraturan', 'HomeController@peraturan');
        Route::get('client/peraturan/{id}', 'HomeController@updatePeraturan');

        //legalitas
        Route::get('client/pembuatan_PT', 'HomeController@pembuatan_PT');
    });
});

Route::get('v', function () {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
Route::get('c', function () {
    $exitCode = Artisan::call('config:clear');
    return 'Config cache cleared';
});
Route::get('r', function () {
    $exitCode = Artisan::call('route:clear');
    return 'Route cache cleared';
});
