<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(mixed $validated)
 */
class Format extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'formats';
    protected $fillable = [
        'code',
        'title',
    ];

    public function brands()
    : BelongsToMany
    {
        return $this->belongsToMany(Brand::class);
    }
}
