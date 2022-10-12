<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(mixed $validated)
 */
class PackageKind extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'packages';
    protected $fillable = [
        'code',
        'title',
        'description',
    ];
}
