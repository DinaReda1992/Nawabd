<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use League\CommonMark\DocParser;
use League\CommonMark\HtmlRenderer;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentTaggable\Models\Tag;
use league\commonmark\Environment\Environment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;   

class Blog extends Model
{
    use HasFactory, Searchable , Taggable;

    protected $fillable = [
        'title' , 'content' , 'author', 'logo', 'createdBy', 'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

}
