<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(mixed $validated)
 */
class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'employees';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'position',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
