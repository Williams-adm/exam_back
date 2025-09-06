<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DocumentType extends Model
{
    protected $fillable = [
        'type_doc',
    ];

    public function document(): HasOne
    {
        return $this->hasOne(Document::class);
    }
}
