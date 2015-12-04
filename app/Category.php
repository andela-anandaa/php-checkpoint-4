<?php

namespace KnowTube;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    public function resources()
    {
        return $this->hasMany('KnowTube\Resource', 'category_id');
    }
}
