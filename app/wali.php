<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\mahasiswa;
class wali extends Model
{
    # Tentukan nama tabel terkait
	protected $table = 'walis';

	# MASS ASSIGNMENT
	# Untuk membatasi attribut yang boleh di isi (Untuk keamanan)
	protected $fillable = array('nama', 'id_mahasiswas');

	/*
	 * Relasi One-to-One
	 * =================
	 * Sebaliknya, buat function bernama mahasiswa(), dimana model 'Wali' memiliki relasi One-to-One (belongsTo)
	 * sebagai timbal balik terhadap model 'Mahasiswa'
	 */
	public function mahasiswa() {
		return $this->belongsTo('App\mahasiswa', 'id_mahasiswas');
	}

}
