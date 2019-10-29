<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $fillable = ['name', 'description', 'slug',];

    // Get posts related to the category
    public function Blogs(){	
    	return $this->hasMany(Blog::class);
    }
}
