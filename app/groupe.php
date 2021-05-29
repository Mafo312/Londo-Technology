<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groupe extends Model
{
    //
    protected $fillable = [
        'nomGroupe', 'description', 'image'
    ];

    public function personnels()
    {
        return $this->hasMany('App\personnel');
    }
}
