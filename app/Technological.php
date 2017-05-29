<?php

namespace App;

use App\User;
use App\Building;
use Illuminate\Database\Eloquent\Model;

class Technological extends Model
{
	protected $fillable = [
        'name',
        'it_key'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function building()
    {
        return $this->hasMany(Building::class);
    }
}
