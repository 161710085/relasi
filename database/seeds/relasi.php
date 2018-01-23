<?php

use Illuminate\Database\Seeder;
use App\mahasiswa;
use App\wali;
use App\dosen;
use App\hobi;
class relasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('mahasiswas')->delete();
		DB::table('walis')->delete();

		/***********************************
		 *** SIAPKAN SEEDER DOSEN DISINI ***
		 ***********************************/
		DB::table('dosens')->delete();
DB::table('hobis')->delete();
		DB::table('mahasiswa_hobi')->delete();

	
	$dosen = dosen::create(array(
			'nama' => 'Yulianto',
			'nipd' => '1234567890'));

		$this->command->info('Data dosen telah diisi!');


		//

		/* Kita akan membuat 3 orang mahasiswa sebagai sampel
		 * Disinilah alasan kenapa saya membuat model terlebih dahulu
		 * Karena saya memanfaatkan model untuk mengcreate record
		*/

		# Mahasiswa Pertama bernama Noviyanto Rachmadi. Dengan NIM 1015015072.
		$novay = mahasiswa::create(array(
			'nama' => 'Noviyanto Rachmadi',
			'nim'  => '1015015072',
		'id_dosen' => $dosen->id));


		# Mahasiswa Kedua bernama Djaffar. Dengan NIM 1015015088.
		$dije = mahasiswa::create(array(
			'nama' => 'Djaffar',
			'nim'  => '1015015088',
		'id_dosen' => $dosen->id));
            
		# Mahasiswa Ketiga bernama Puji Rahayu. Dengan NIM 1015015078.
		$ayu = mahasiswa::create(array(
			'nama' => 'Puji Rahayu',
			'nim'  => '1015015078',
		'id_dosen' => $dosen->id));

		# Informasi ketika mahasiswa telah diisi.
		$this->command->info('mahasiswa telah diisi!');

		/*
		 * Disini kita akan menggunakan ketiga variabel yang kita
		 * deklarasikan diatas yaitu '$novay', '$dije', '$ayu'
		 * dengan cara mengambil id dari masing-masing variabel yang
		 * baru saja di isi.
		 */

		# Ciptakan wali si $novay
		wali::create(array(
			'nama'  => 'Achmad S',
			'id_mahasiswas' => $novay->id
		));
		# Ciptakan wali si $dije
		wali::create(array(
			'nama'  => 'Entahlah',
			'id_mahasiswas' => $dije->id
		));
		# Ciptakan wali si $ayu
		wali::create(array(
			'nama'  => 'Arianto',
			'id_mahasiswas' => $ayu->id
		));   
		$mandi_hujan = Hobi::create(array('hobi' => 'Mandi Hujan'));
		$baca_buku = Hobi::create(array('hobi' => 'Baca Buku'));

		# Hubungkan Mahasiswa dengan Hobinya masing-masing
		$novay->hobi()->attach($mandi_hujan->id);
		$novay->hobi()->attach($baca_buku->id);
		$dije->hobi()->attach($mandi_hujan->id);
		$ayu->hobi()->attach($baca_buku->id);
       
}}