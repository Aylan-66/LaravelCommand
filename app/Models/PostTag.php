<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    public function scopeGetTagPost($query, $tag_id) {

        $tag = Tag::GetTagPost($tag_id)->get();
        return $query->where('tag_id', $tag[0]["tag_id"])->select('post_tags.post_id as id');
      
    }

}
