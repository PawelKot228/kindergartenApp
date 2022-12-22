<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    protected $guarded = ['id'];

    public function duties(): BelongsToMany
    {
        return $this->belongsToMany(Duty::class, 'employee_duty');
    }
}
