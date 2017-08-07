<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = [ 'title', 'description', 'user_id' ];

	public function User()
    {
    	return $this->belongsTo('App\User');
    }

    public function scopeByUser($query, $id)
    {
        return $query->where('user_id', '=', $id);
    }
}
