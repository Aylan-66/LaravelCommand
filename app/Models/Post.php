<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function tag() {

		return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id')->withTimestamps();
		
	}

	public function scopeGetTagPost($query, $tag_id) {

		$tag = PostTag::GetTagPost($tag_id)->get();
		return $query->whereIn('id', $tag);

	}
}
