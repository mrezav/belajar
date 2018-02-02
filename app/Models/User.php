<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password','id_role','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsTo(Roles::class,'id_role');
    }

    public function lowongan(){
        return $this->hasMany('App\Models\Lowongan','user_id');
    }

    public function level_user($level){
        return ($this->roles['nama_role']);
    }

    public function verified()
    {
       return $this->token === null;
    }

    public function sendVerificationEmail()
    {
        $this->notify(new VerifyEmail($this));
    }

}
