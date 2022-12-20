<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guardian extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Child::class);
    }
}
