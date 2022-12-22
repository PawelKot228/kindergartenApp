<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeDuties extends Pivot
{
    protected $guarded = ['id'];
}
