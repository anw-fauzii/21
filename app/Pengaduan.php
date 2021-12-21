<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    //
    protected $table = 'pengaduan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik', 'nama', 'telp', 'email', 'lokasi', 'deksripsi', 'img'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}
