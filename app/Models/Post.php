<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function tag() {

		return $this->belongsToMany(Post::class, 'post_tags', 'post_id', 'tag_id')->withTimestamps();
		
	}

	public function scopeGetTagPost($query, $input) {

		return $query->whereHas('tag', function (Builder $query) use ($input) {
			$query->whereIn('id', Tag::GetTagPost($input)->get());
		});

	}
}
