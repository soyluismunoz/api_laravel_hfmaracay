<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $fillable = ['name', 'slug'];

    protected $hidden = ['pivot'];

    public function Blogs(){
    	return $this->morphedByMany(Blog::class, 'taggable')->withTimestamps();
    }
}
