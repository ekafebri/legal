<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//UNTUK USER 
Route::get('artikel/{id}/{user}', 'ArtikelController@share');
Route::namespace('Api')->middleware('api.key')->group(function () {
/*
|--------------------------------------------------------------------------
| AUTENTIFIKASI
*/
	Route::post('login', 'AuthController@login');
	Route::post('registrasi', 'AuthController@register');
	Route::post('registrasi-service', 'AuthController@registerService');
	Route::post('registrasi-upload', 'AuthController@registerUpload');
	Route::get('get-service', 'AuthController@service');
	Route::middleware('api.auth')->group(function () {
		/*
		|--------------------------------------------------------------------------
		| DATA BERANDA
		*/
		Route::post('events/all', 'HomeController@getEvent');
		Route::post('home', 'HomeController@home')->middleware('client');
		Route::post('home-lawyer', 'HomeController@homelawyer')->middleware('lawyer');
		Route::post('change-status', 'HomeController@changeStatus')->middleware('lawyer');
		Route::post('get-lawyer', 'HomeController@getLawyer')->middleware('client');		
		Route::post('get-notaris', 'HomeController@getNotaris')->middleware('client');		
		Route::post('get-kantor-hukum', 'HomeController@getKH')->middleware('client');		
		Route::post('detail-lawyer', 'HomeController@detailLawyer')->middleware('client');
		Route::post('detail-lawyer-probono', 'HomeController@detailLawyerProbono')->middleware('client');
		Route::post('search', 'HomeController@search')->middleware('client');
		Route::post('notifikasi', 'HomeController@notifikasi');
		/*
		|--------------------------------------------------------------------------
		| DATA ARTIKEL
		*/
		Route::get('artikel/all', 'ArtikelController@all');
		Route::post('artikel', 'ArtikelController@detail');
		Route::post('artikel/like', 'ArtikelController@like');
		Route::post('artikel/cari', 'ArtikelController@cari');
		Route::post('artikel/comment', 'ArtikelController@comment');
		Route::post('artikel/comment/delete', 'ArtikelController@commentDelete');
		Route::post('artikel/create', 'ArtikelController@create')->middleware('lawyer');
		Route::post('artikel/myartikel', 'ArtikelController@myartikel')->middleware('lawyer');
		Route::post('artikel/edit', 'ArtikelController@edit')->middleware('lawyer');
		Route::post('artikel/update', 'ArtikelController@update')->middleware('lawyer');
		Route::post('artikel/delete', 'ArtikelController@delete')->middleware('lawyer');
		/*
		|--------------------------------------------------------------------------
		| DATA PROFIL
		*/
		Route::post('verified', 'ProfilController@verifikasiClient')->middleware('client');		
		Route::post('myprofil', 'ProfilController@myprofil');		
		Route::post('mylayanan', 'ProfilController@editLayanan')->middleware('lawyer');		
		Route::post('profil/update', 'ProfilController@update');
		Route::post('profil/avatar', 'ProfilController@updateAvatar');
		Route::post('edit-layanan', 'ProfilController@editLayanan')->middleware('lawyer');
		Route::post('update-layanan', 'ProfilController@updateLayanan')->middleware('lawyer');
		Route::post('change-probono', 'ProfilController@changeProbono')->middleware('lawyer');
		Route::post('membership', 'ProfilController@pengajuanMember')->middleware('lawyer');
		Route::post('get-membership', 'ProfilController@getStatusMember')->middleware('lawyer');
		/*
		|--------------------------------------------------------------------------
		| DATA LAYANAN
		*/
		Route::post('lawyer-probono', 'LayananController@lawyerProbono')->middleware('client');		
		Route::post('lawyer-online', 'LayananController@lawyerOnline')->middleware('client');		
		Route::post('lawyer-kantor-hukum', 'LayananController@lawyerKh')->middleware('client');		
		Route::post('legalitas', 'LayananController@legalitas')->middleware('client');		
		Route::post('create/pertanyaan', 'LayananController@createPertanyaan')->middleware('client');		
		Route::post('create/pertanyaan-kantor-hukum', 'LayananController@createPertanyaanKH')->middleware('client');		
		Route::post('get-peraturan', 'LayananController@peraturanAll');		
		Route::post('peraturan-detail', 'LayananController@detailPeraturan');		
		Route::post('peraturan-list', 'LayananController@peraturanList');
		Route::post('get-kantor-hukum', 'LayananController@peraturanList');
		Route::post('konsultasi', 'LayananController@konsultasi')->middleware('client');
		Route::post('detail_konsultasi', 'LayananController@detailKonsultasi');
		Route::post('detail_report', 'LayananController@detailReport');
		Route::post('konsultasi-probono', 'LayananController@probono')->middleware('client');
		Route::post('expired', 'LayananController@expired');		
		Route::post('cancel-konsultasi', 'LayananController@cancelKonsultasi');		
		Route::post('finish-konsultasi', 'LayananController@finishKonsultasi');		
		Route::post('finish', 'LayananController@finish');		
		Route::post('konfirmasi', 'LayananController@konfirmasi')->middleware('client');
		Route::post('batalkan-konfirmasi', 'LayananController@batalKonfirmasi')->middleware('client');
		Route::post('chat', 'LayananController@chat');
		Route::post('get-chat', 'LayananController@getChat');
		Route::post('ajukan-vicon', 'LayananController@vicon')->middleware('client');
		Route::post('ajukan-tertulis', 'LayananController@tertulis')->middleware('client');
		Route::post('ajukan-pendampingan', 'LayananController@pendampingan')->middleware('client');
		Route::post('ajukan-pertemuan', 'LayananController@pertemuan')->middleware('client');
		Route::post('ajukan-report', 'LayananController@report')->middleware('lawyer');
		Route::post('get-layanan-lawyer', 'LayananController@getLayananLawyer')->middleware('client');
		Route::post('list-vicon', 'LayananController@getListVicon');
		Route::post('list-pendampingan', 'LayananController@getListPendampingan');
		Route::post('list-pertemuan', 'LayananController@getListPertemuan');
		Route::post('list-tertulis', 'LayananController@getListTertulis');
		Route::post('list-report', 'LayananController@getListReport');
		Route::post('list-vicon-byid', 'LayananController@getListViconByIdKonsult')->middleware('lawyer');
		Route::post('list-pendampingan-byid', 'LayananController@getListPendampinganByIdKonsult')->middleware('lawyer');
		Route::post('list-pertemuan-byid', 'LayananController@getListPertemuanByIdKonsult')->middleware('lawyer');
		Route::post('list-tertulis-byid', 'LayananController@getListTertulisByIdKonsult')->middleware('lawyer');
		Route::post('tolak-pengajuan', 'LayananController@tolakPengajuan')->middleware('lawyer');
		Route::post('setujui-pengajuan', 'LayananController@setujuiPengajuan')->middleware('lawyer');
		Route::post('mahkamahagung', 'LayananController@mahkamahagung')->middleware('lawyer');
		Route::post('somasi', 'LayananController@somasi')->middleware('lawyer');
		/*
		|--------------------------------------------------------------------------
		| DATA RIWAYAT
		*/
		Route::post('jawab', 'RiwayatController@jawabPertanyaan')->middleware('lawyer');		
		Route::post('my-pertanyaan', 'RiwayatController@mypertanyaan')->middleware('client');		
		Route::post('pertanyaan-detail', 'RiwayatController@detailPertanyaan');
		Route::post('pertanyaan-detail-lawyer', 'RiwayatController@detailPertanyaanLawyer')->middleware('lawyer');
		Route::post('pertanyaan-all', 'RiwayatController@allPertanyaan');		
		Route::post('history-konsultasi', 'RiwayatController@getKonsultasi');		
		Route::post('live-chat', 'RiwayatController@liveChat');
		// xendit
		Route::post('pembayaran-create', 'TransaksiController@create');		
		Route::post('all-invoice', 'TransaksiController@allInvoice');		
		Route::post('all-tagihan', 'TransaksiController@allTagihan');		
		Route::post('get-invoice', 'TransaksiController@getInvoice');
		Route::post('detail-vicon', 'TransaksiController@detailVicon');
		Route::post('detail-pendampingan', 'TransaksiController@detailPendampingan');
		Route::post('detail-tertulis', 'TransaksiController@detailTertulis');
		Route::post('detail-pertemuan', 'TransaksiController@detailPertemuan');
		// Route::post('simulateVa', 'TransaksiController@simulatePayVA')->middleware('xendit');		
		// Route::get('get-payment-available', 'TransaksiController@getPayment')->middleware('xendit');		
		// Route::post('ewallets', 'TransaksiController@ewallets')->middleware('xendit');		
		// Route::post('create-va', 'TransaksiController@createVa')->middleware('xendit');		
		// Route::post('cek-ewallet', 'TransaksiController@cekEwallet')->middleware('xendit');		
		// Route::post('get-va', 'TransaksiController@getVa')->middleware('xendit');	

	});
});
Route::post('callback', 'Api\TransaksiController@callback')->middleware('xendit');		
Route::get('province', 'Api\HomeController@province');		
Route::post('city', 'Api\HomeController@city');		
?>


