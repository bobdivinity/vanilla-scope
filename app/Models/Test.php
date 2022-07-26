<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Test extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected static function booted(): void
    {
        static::addGlobalScope('published', function (Builder $builder): void {
            $builder->where('published', true);
        });
    }

    public $timestamps = false;

    protected $table = 'test';

    protected $fillable = [
        'name',
        'position',
        'published',
    ];

    protected $casts = [
        'position' => 'integer',
        'published' => 'bool',
    ];

    public $sortable = [
        'order_column_name' => 'position',
        'sort_when_creating' => true,
    ];
}
