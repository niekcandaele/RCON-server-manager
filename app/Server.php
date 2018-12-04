<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ip', 'owner', 'rcon_port', 'rcon_password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'owner', 'id');
    }
}
