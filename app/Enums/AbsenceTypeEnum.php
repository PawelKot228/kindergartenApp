<?php

namespace App\Enums;

enum AbsenceTypeEnum: string
{
    case medical = 'medical';
    case excused = 'excused';
    case unexcused = 'unexcused';
}
