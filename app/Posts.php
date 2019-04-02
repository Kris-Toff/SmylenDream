<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'title',
        'author',
        'status',
        'featured_image',
        'content',
        'slug',
        'short_description',
        'body'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function generateSlug($title)
    {
        $slug = str_slug($title, '-');

        $relatedSlugs = $this->getRelatedSlug($slug);

        if (! $relatedSlugs->contains('slug', $slug))
        {
            return $slug;
        }

        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $relatedSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    public function getRelatedSlug($slug)
    {
        return Posts::select('slug')->where('slug', 'like', '%'.$slug.'%')->get();
    }

    public function getExtension($filename)
    {
        $extension = explode('.', $filename);

        return $extension[1];
    }
}
