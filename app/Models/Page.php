<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Intervention\Image\ImageManagerStatic;

class Page extends Model implements HasMedia
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'slug', 'text', 'image'];

    public function setImageAttribute($value)
    {
        if($value) {
            if (Str::startsWith($value, 'data:image')) {
                $image = ImageManagerStatic::make($value)->encode('jpg', 100);
                $this->addMediaFromString($image)
                    ->usingFileName(md5($value.time()).'.jpg')
                    ->toMediaCollection('pages');
            }
        } else {
            $this->clearMediaCollection('pages');
        }
    }

    public function getImageAttribute()
    {
        return $this->getFirstMedia('pages') ? $this->getFirstMedia('pages')->getUrl() : null;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('pages')
            ->singleFile()
            ->useDisk('pages');
    }

}
