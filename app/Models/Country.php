<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }
}
