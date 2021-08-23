<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function post() {

        return $this->belongsToMany(Post::class,  'post_tags', 'post_id', 'tag_id')->withTimestamps();
        
    }

    public function scopeGetTagPost($query, $tag_id) {

		return $query->where('name', $tag_id)->select('tags.id as tag_id');

	}
}
