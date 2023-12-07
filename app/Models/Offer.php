<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BeLongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Offer extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    public const PLACEHOLDER_IMAGE_PATH = 'images/placeholder.jpeg';
    protected $fillable = [
        'title',
        'price',
        'description',
        'author_id',
        'status'
    ];
    public function categories(): BeLongsToMany
    {
      return $this->beLongsToMany(Category::class);
    }
    public function locations(): BeLongsToMany
    {
      return $this->beLongsToMany(Location::class);
    }
    public function author(): BeLongsTo
    {
      return $this->beLongsTo(User::class);
    }

    public function getImageUrlAttribute(): string
    {
      return $this->hasMedia()
      ? $this->getFirstMediaUrl()
      : self::PLACEHOLDER_IMAGE_PATH;
    }
}
