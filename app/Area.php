<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
	use SoftDeletes;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */

  protected $fillable = ['name'];
  /**
  * Get the users that owns the economic activity.
  */
  public function users()
  {
    return $this->belongsTo(User::class);
  }
}