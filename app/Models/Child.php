<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Child extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function guardian(): HasOne
    {
        return $this->hasOne(Guardian::class);
    }

    public function absences(): HasMany
    {
        return $this->hasMany(ChildAbsence::class);
    }
}
