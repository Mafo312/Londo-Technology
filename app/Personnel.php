<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable = [
        'nomContact', 'prenom', 'profession', 'email', 'phone', 'photo', 'groupe_id', 'favoris'
    ];
    protected $guarded = [];

    public function groupe()
    {
        return $this->belongsTo('App\groupe');
    }
}
