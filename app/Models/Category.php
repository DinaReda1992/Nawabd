<?php

namespace App\Models;

use App\Models\Blog;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'category_name'
    ];

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

    public function toSearchableArray()
    {
        return [
            'category_name' => $this->category_name,
        ];
    }
}
