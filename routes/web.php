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
use App\mahasiswa;
use App\wali;
use App\dosen;

Route::get('/', function () {
    return view('welcome');
});

Route::get('relasi-1', function() {

		# Temukan mahasiswa dengan NIM 1015015072
		$mahasiswa = mahasiswa::where('nim', '=', '1015015072')->first();

		# Tampilkan nama wali mahasiswa
		return $mahasiswa->wali->nama;

	});
Route::get('relasi-2', function() {

		# Temukan mahasiswa dengan NIM 1015015072
		$mahasiswa = mahasiswa::where('nim', '=', '1015015072')->first();

		# Tampilkan nama dosen pembimbing
		return $mahasiswa->dosen->nama;

	});
Route::get('relasi-3', function() {

		# Temukan dosen dengan yang bernama Yulianto
		$dosen = dosen::where('nama', '=', 'Yulianto')->first();

		# Tampilkan seluruh data mahasiswa didikannya
		foreach ($dosen->mahasiswa as $temp)
			echo '<li> Nama : ' . $temp->nama . ' <strong>' . $temp->nim . '</strong></li>';
	});
