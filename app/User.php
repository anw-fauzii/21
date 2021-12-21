<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table ='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'telp', 'password', 'nama_perusahaan', 'bidang_usaha', 'alamat', 'jabatan','status', 'roles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function pelaporan()
    {
        return $this->hasMany('App\Pelaporan');
    }

    public function review()
    {
        return $this->hasMany('App\Review');
    }

    public function pengaduan()
    {
        return $this->hasMany('App\Pengaduan');
    }
}
