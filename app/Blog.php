<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'slug',
        'featured_img',
        'user_id',
        'category_id',
    ];

    
    // Get the user to whom the publication belongs.
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    // Get the Category to whom the publication belongs.
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    // Get tags related to the post
    public function tags(){
    	return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
}
