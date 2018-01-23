<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\mahasiswa;
class dosen extends Model
{
  protected $table = 'dosens';

	# MASS ASSIGNMENT
	# Untuk membatasi attribut yang boleh di isi (Untuk keamanan)
	protected $fillable = array('nama', 'nipd');

	/*
	 * Relasi One-to-Many
	 * ==================
	 * Buat function bernama mahasiswa(), dimana model 'Dosen' akan memiliki 
	 * relasi One-to-Many terhadap model 'Mahasiswa' sebagai 'id_dosen'
	 */
	public function mahasiswa() {
		return $this->hasMany('App\mahasiswa', 'id_dosen');
	}

}