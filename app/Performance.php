<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ActiveAir;

class Performance extends Model
{
    protected $fillable = [
        'day',
        'switched_on_hour',
        'switched_off_hour'
    ];

    public function activeAir()
    {
        return $this->belongsTo(ActiveAir::class);
    }
}
