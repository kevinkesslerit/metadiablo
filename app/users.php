<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{

    protected $fillable = [
        'id', 'name', 'access', 'signature'
    ];

    public function users(){
        return $this->hasMany(users::class);
    }
}
