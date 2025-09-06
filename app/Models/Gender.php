<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Gender extends Model
{
    protected $fillable = [
        'type_gen',
    ];

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }
}
