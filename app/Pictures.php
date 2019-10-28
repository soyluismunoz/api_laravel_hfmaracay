<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Queries\QueryFilter;

class Pictures extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'path',
        'filename',
    ];

    public function getUrlImageAttribute()
    {
      return 'storage/pictures/'.$this->image;
    }
      public function scopeFilterBy($query, QueryFilter $filters, array $data) {
          return $filters->applyTo($query, $data);
      }

}
