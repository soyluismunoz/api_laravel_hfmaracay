<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'iso2', 'iso3', 'prefix', 'name', 'continent', 'subcontinent', 'iso_currency', 'name_currency', 'flag'
  ];

  /**
   * Get the users that owns the country.
   */
  public function users()
  {
    return $this->belongsTo(User::class);
  }
}
