<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarLagu extends Model
{
    // Nama tabel (opsional kalau sudah sesuai konvensi)
    protected $table = 'daftar_lagu';
    
    // Primary key
    protected $primaryKey = 'id';
    
    // Non-aktifkan timestamps (created_at & updated_at)
    public $timestamps = false;
    
    // Field yang boleh di-mass assignment (create/update langsung)
    protected $fillable = [
        'judul',
        'artist',
        'album',
        'durasi_menit',
        'tahun_rilis'
    ];
    
    // Field yang tidak boleh di-mass assignment
    protected $guarded = ['id'];
}