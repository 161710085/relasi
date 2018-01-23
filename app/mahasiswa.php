<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\wali;
use App\dosen;
use App\hobi;
class mahasiswa extends Model
{
    protected $table = 'mahasiswas';

	# MASS ASSIGNMENT
	# Untuk membatasi attribut yang boleh di isi (Untuk keamanan)
	protected $fillable = array('nama', 'nim','id_dosen');

	/*
	 * Relasi One-to-One
	 * =================
	 * Buat function bernama wali(), dimana model 'Mahasiswa' memiliki relasi One-to-One
	 * terhadap model 'Wali' sebagai 'id_mahasiswa'
	 */
	public function wali() {
		return $this->hasOne('App\wali', 'id_mahasiswas');
	}

	# Relasi One-to-Many 
	public function dosen() {
		return $this->belongsTo('App\dosen', 'id_dosen');
	}

	# Relasi Many-to-Many 
	public function hobi() {
		return $this->belongsToMany('App\hobi', 'mahasiswa_hobi', 'id_mahasiswas', 'id_hobi');
    }
}