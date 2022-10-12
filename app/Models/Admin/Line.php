<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $data)
 */
class Line extends Model
{
    use HasFactory;

    protected $table = 'lines';
    protected $fillable = [
        'title',
        'description',
    ];
}
