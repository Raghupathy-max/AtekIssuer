<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed mobile_number
 * @property int|mixed otp
 * @method static where(string $string, int $int)
 */
class UsersSession extends Model
{
    use HasFactory;
}
