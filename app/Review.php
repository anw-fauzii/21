<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'review';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'nama_pelapor', 'nama_perusahaan',
        'bidang_usaha', 'jenis', 
        'review_dok_1', 'review_dok_2','review_dok_3', 'review_dok_4', 
        'pelaporan_id', 'user_id'
    ];

    public function pelaporan()
    {
        return $this->belongsTo('App\Pelaporan');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
