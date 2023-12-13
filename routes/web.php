<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;

Auth::routes();
route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);
});

Route::group(['middleware' => 'auth', 'cekstatus' => 'mahasiswa'], function () {
    //Route::get('/indexMaha', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('indexMhs');
    Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('indexMhs');
    Route::get('/mahasiswa/bimbingan', [App\Http\Controllers\MahasiswaController::class, 'bimbingan']);
    //-------------------
    Route::get('/mahasiswa/indexsempro', [App\Http\Controllers\PraSemproController::class, 'tampilindexsempro']);
    Route::get('/mahasiswa/calonbimbing', [App\Http\Controllers\PraSemproController::class, 'calonbimbing']);
    Route::post('/mahasiswa/buatdospem', [App\Http\Controllers\PraSemproController::class, 'buatdospem']);
    Route::get('/mahasiswa/progressempro', [App\Http\Controllers\PraSemproController::class, 'progressempro']);
    Route::get('/mahasiswa/buatjudulbaru', [App\Http\Controllers\PraSemproController::class, 'buatjudulbaru']);
    Route::post('/mahasiswa/buatjudul', [App\Http\Controllers\PraSemproController::class, 'buatjudul']);
    Route::get('/mahasiswa/hasiluji/{id}', [App\Http\Controllers\PraSemproController::class, 'hasiluji']);
    Route::get('/mahasiswa/jadwalsempro/{id}', [App\Http\Controllers\PraSemproController::class, 'jadwalsempro']);
    Route::get('/mahasiswa/berkassempro/{id}/upload', [App\Http\Controllers\PraSemproController::class, 'berkassempro']);
    Route::post('/mahasiswa/berkassempro/{id}/uploadberkasfix', [App\Http\Controllers\PraSemproController::class, 'uploadberkasfix']);
    //-------------------
    Route::get('/mahasiswa/indexsemhas', [App\Http\Controllers\PraSemhasController::class, 'tampilindexsemhas']);
    Route::get('/mahasiswa/progressemhas', [App\Http\Controllers\PraSemhasController::class, 'progressemhas']);
    Route::get('/mahasiswa/jadwalsemhas/{id}', [App\Http\Controllers\PraSemhasController::class, 'jadwalsemhas']);
    Route::get('/mahasiswa/berkassemhas/{id}/upload', [App\Http\Controllers\PraSemhasController::class, 'berkassemhas']);
    Route::post('/mahasiswa/berkassemhas/{id}/uploadsemhasfix', [App\Http\Controllers\PraSemhasController::class, 'uploadberkasfix']);
    //-------------------
    Route::get('/mahasiswa/indexsidang', [App\Http\Controllers\PraSidangController::class, 'tampilindexsidang']);
    Route::get('/mahasiswa/progressidang', [App\Http\Controllers\PraSidangController::class, 'progressidang']);
    Route::get('/mahasiswa/jadwalsidang/{id}', [App\Http\Controllers\PraSidangController::class, 'jadwalsidang']);
    Route::get('/mahasiswa/berkassidang/{id}/upload', [App\Http\Controllers\PraSidangController::class, 'berkassidang']);
    Route::post('/mahasiswa/berkassidang/{id}/uploadsidangfix', [App\Http\Controllers\PraSidangController::class, 'uploadberkasfix']);

    Route::get('/mahasiswa/cetak_pembimbing', [App\Http\Controllers\BerkasController::class, 'cetak_bimbing']);
});

Route::group(['middleware' => 'auth', 'cekstatus' => 'dosen'], function () {
    //Route::get('/indexDosen', [App\Http\Controllers\DosenController::class, 'index'])->name('indexDosen');
    Route::get('/dosen', [App\Http\Controllers\DosenController::class, 'index'])->name('indexDosen');
    Route::get('/dosen/bimbingan', [App\Http\Controllers\DosenController::class, 'bimbingan']);
    Route::get('/dosen/catatanbim/{nim}', [App\Http\Controllers\DosenController::class, 'catatanbimbingan']);
    Route::get('/dosen/catatanbim/{nim}/{nidn}/baru', [App\Http\Controllers\DosenController::class, 'catatanbimbinganbaru']);
    Route::post('/dosen/catatanbim/{nim}/{nidn}/fix', [App\Http\Controllers\DosenController::class, 'catatanbimbinganfix']);
    //-------------------
    Route::get('/dosen/dftrmhssempro', [App\Http\Controllers\DosenController::class, 'dftrmhssempro']);
    Route::get('/dosen/mhssempro/{nim}/{id}', [App\Http\Controllers\DosenController::class, 'mhssempro']);
    Route::get('/dosen/mhssempro/{nim}/jadwalsempro/{id}', [App\Http\Controllers\DosenController::class, 'jadwalsempromhs']);
    Route::post('/dosen/mhssempro/{nim}/{id}/updatestatussempro', [App\Http\Controllers\DosenController::class, 'updateprasempro']);
    //-------------------
    Route::get('/dosen/dftrmhssemhas', [App\Http\Controllers\DosenController::class, 'dftrmhssemhas']);
    Route::get('/dosen/mhssemhas/{nim}/{id}', [App\Http\Controllers\DosenController::class, 'mhssemhas']);
    Route::get('/dosen/mhssemhas/{nim}/jadwalsemhas/{id}', [App\Http\Controllers\DosenController::class, 'jadwalsemhasmhs']);
    Route::post('/dosen/mhssemhas/{nim}/{id}/updatestatussemhas', [App\Http\Controllers\DosenController::class, 'updateprasemhas']);
    //-------------------
    Route::get('/dosen/dftrmhssidang', [App\Http\Controllers\DosenController::class, 'dftrmhssidang']);
    Route::get('/dosen/mhssidang/{nim}/{id}', [App\Http\Controllers\DosenController::class, 'mhssidang']);
    Route::get('/dosen/mhssidang/{nim}/jadwalsidang/{id}', [App\Http\Controllers\DosenController::class, 'jadwalsidangmhs']);
    Route::post('/dosen/mhssidang/{nim}/{id}/updatestatussidang', [App\Http\Controllers\DosenController::class, 'updateprasidang']);
    //-------------------
    Route::get('/dosen/seminar', [App\Http\Controllers\DosenController::class, 'dsnseminar']);
    Route::get('/dosen/bandingsempro', [App\Http\Controllers\DosenController::class, 'bandingsempro']);
    Route::get('/dosen/bandingsempro/{idp}', [App\Http\Controllers\DosenController::class, 'nilaisempro']);
    Route::post('/dosen/bandingsempro/buatnilai', [App\Http\Controllers\DosenController::class, 'fixnilaisempro']);

    Route::get('/dosen/bandingsemhas', [App\Http\Controllers\DosenController::class, 'bandingsemhas']);
    Route::get('/dosen/bandingsemhas/{idp}', [App\Http\Controllers\DosenController::class, 'nilaisemhas']);
    Route::post('/dosen/bandingsemhas/buatnilai', [App\Http\Controllers\DosenController::class, 'fixnilaisemhas']);

    Route::get('/dosen/bandingsidang', [App\Http\Controllers\DosenController::class, 'bandingsidang']);
    Route::get('/dosen/bandingsidang/{idp}', [App\Http\Controllers\DosenController::class, 'nilaisidang']);
    Route::post('/dosen/bandingsidang/buatnilai', [App\Http\Controllers\DosenController::class, 'fixnilaisidang']);
    //-------------------
});

Route::group(['middleware' => 'auth', 'cekstatus' => 'staff'], function () {
    //Route::get('/indexStaff', [App\Http\Controllers\StaffController::class, 'index'])->name('indexStaff');
    Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('indexStaff');
    //-------------------
    Route::get('/staff/seminar', [App\Http\Controllers\StaffController::class, 'tampilseminar']);
    //-------------------
    Route::get('/staff/jadwalsempro', [App\Http\Controllers\StaffController::class, 'tampilsempro']);
    Route::get('/staff/buatsemprobaru', [App\Http\Controllers\StaffController::class, 'buatsemprobaru']);
    Route::post('/staff/buatsempro', [App\Http\Controllers\StaffController::class, 'buatsempro']);
    Route::get('/staff/jadwalsempro/{id}/ubah', [App\Http\Controllers\StaffController::class, 'ubahsempro']);
    Route::post('staff/jadwalsempro/{id}/editsemprofix', [App\Http\Controllers\StaffController::class, 'editsemprofix']);

    Route::get('/staff/jadwalsempro/{id}/mhs', [App\Http\Controllers\StaffController::class, 'tampilsempromhs']);
    Route::get('/staff/jadwalsempro/{id}/enroll', [App\Http\Controllers\StaffController::class, 'enrollsempromhs']);
    Route::get('/staff/jadwalsempro/{ids}/enroll/{id}/fix', [App\Http\Controllers\StaffController::class, 'enrollsemprofix']);

    Route::get('/staff/jadwalsempro/{id}/dsnbanding/{idp}/{nim}', [App\Http\Controllers\StaffController::class, 'detailbandingsempro']);
    Route::get('/staff/jadwalsempro/{idp}/enrolldsn', [App\Http\Controllers\StaffController::class, 'enrollbandingsempro']);
    Route::post('/staff/jadwalsempro/fix', [App\Http\Controllers\StaffController::class, 'tambahdsnsempro']);
    //-------------------
    Route::get('/staff/jadwalsemhas', [App\Http\Controllers\StaffController::class, 'tampilsemhas']);
    Route::get('/staff/buatsemhasbaru', [App\Http\Controllers\StaffController::class, 'buatsemhasbaru']);
    Route::post('/staff/buatsemhas', [App\Http\Controllers\StaffController::class, 'buatsemhas']);
    Route::get('/staff/jadwalsemhas/{id}/ubah', [App\Http\Controllers\StaffController::class, 'ubahsemhas']);
    Route::post('staff/jadwalsemhas/{id}/editsemhasfix', [App\Http\Controllers\StaffController::class, 'editsemhasfix']);

    Route::get('/staff/jadwalsemhas/{id}/mhs', [App\Http\Controllers\StaffController::class, 'tampilsemhasmhs']);
    Route::get('/staff/jadwalsemhas/{id}/enroll', [App\Http\Controllers\StaffController::class, 'enrollsemhasmhs']);
    Route::get('/staff/jadwalsemhas/{ids}/enroll/{id}/fix', [App\Http\Controllers\StaffController::class, 'enrollsemhasfix']);

    Route::get('/staff/jadwalsemhas/{id}/dsnbanding/{idp}/{nim}', [App\Http\Controllers\StaffController::class, 'detailbandingsemhas']);
    Route::get('/staff/jadwalsemhas/{idp}/enrolldsn', [App\Http\Controllers\StaffController::class, 'enrollbandingsemhas']);
    Route::post('/staff/jadwalsemhas/fix', [App\Http\Controllers\StaffController::class, 'tambahdsnsemhas']);
    //-------------------
    Route::get('/staff/jadwalsidang', [App\Http\Controllers\StaffController::class, 'tampilsidang']);
    Route::get('/staff/buatsidangbaru', [App\Http\Controllers\StaffController::class, 'buatsidangbaru']);
    Route::post('/staff/buatsidang', [App\Http\Controllers\StaffController::class, 'buatsidang']);
    Route::get('/staff/jadwalsidang/{id}/ubah', [App\Http\Controllers\StaffController::class, 'ubahsidang']);
    Route::post('staff/jadwalsidang/{id}/editsidangfix', [App\Http\Controllers\StaffController::class, 'editsidangfix']);

    Route::get('/staff/jadwalsidang/{id}/mhs', [App\Http\Controllers\StaffController::class, 'tampilsidangmhs']);
    Route::get('/staff/jadwalsidang/{id}/enroll', [App\Http\Controllers\StaffController::class, 'enrollsidangmhs']);
    Route::get('/staff/jadwalsidang/{ids}/enroll/{id}/fix', [App\Http\Controllers\StaffController::class, 'enrollsidangfix']);

    Route::get('/staff/jadwalsidang/{id}/dsnbanding/{idp}/{nim}', [App\Http\Controllers\StaffController::class, 'detailbandingsidang']);
    Route::get('/staff/jadwalsidang/{idp}/enrolldsn', [App\Http\Controllers\StaffController::class, 'enrollbandingsidang']);
    Route::post('/staff/jadwalsidang/fix', [App\Http\Controllers\StaffController::class, 'tambahdsnsidang']);
    //-------------------
    Route::get('/staff/dosbing', [App\Http\Controllers\StaffController::class, 'indexdospem']);
    Route::get('/staff/detaildospem/{nim}/detail', [App\Http\Controllers\StaffController::class, 'detaildospem']);
    Route::post('/staff/detaildospem/{nim}/detailupdate', [App\Http\Controllers\StaffController::class, 'detaildospemupdate']);
    //-------------------
    Route::get('/staff/tampilmhsbaru', [App\Http\Controllers\StaffController::class, 'tampilmhsbaru']);
    Route::get('/staff/tampilmhssempro', [App\Http\Controllers\StaffController::class, 'tampilmhssempro']);
    Route::get('/staff/tampilmhssemhas', [App\Http\Controllers\StaffController::class, 'tampilmhssemhas']);
    Route::get('/staff/tampilmhssidang', [App\Http\Controllers\StaffController::class, 'tampilmhssidang']);
    Route::get('/staff/tampilmhspasca', [App\Http\Controllers\StaffController::class, 'tampilmhspasca']);
    Route::get('/staff/tambahmhs', [App\Http\Controllers\ImportController::class, 'tambahmhs']);
    Route::post('/import_parse', [App\Http\Controllers\ImportController::class, 'parseImport']);
    Route::get('/staff/cetak_jadwalsempro/{id}', [App\Http\Controllers\BerkasController::class, 'cetak_jadwalsempro']);
    Route::get('/staff/cetak_jadwalsemhas/{id}', [App\Http\Controllers\BerkasController::class, 'cetak_jadwalsemhas']);
    Route::get('/staff/cetak_jadwalsidang/{id}', [App\Http\Controllers\BerkasController::class, 'cetak_jadwalsidang']);

});
