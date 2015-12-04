<?php

namespace KnowTube;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'url', 'description', 'category_id'];

    public function scopeForUser($query, $user)
    {
        return $query->where(['user_id' => $user->id]);
    }

    public function category()
    {
        return $this->belongsTo('KnowTube\Category', 'category_id');
    }
}
